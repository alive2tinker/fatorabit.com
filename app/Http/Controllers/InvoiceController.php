<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\ItemResource;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Invoices/Index', [
            'invoices' => InvoiceResource::collection(Auth::user()->invoices()->orderby('created_at', 'desc')->paginate(10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Invoices/Create', [
            'items' => ItemResource::collection(Auth::user()->items),
            'customers' => Auth::user()->customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        if (!Auth::user()->can('create', Invoice::class)) {
            return redirect()->back()->withErrors('invalid subscription');
        }
        DB::transaction(function () use ($request) {
            $customer = null;
            if ($request->has('customerId') && is_numeric($request->input('customerId'))) {
                $customer = Customer::find($request->input('customerId'));
            } else {
                $customer = Customer::create([
                    'name' => $request->input('customer')['name'],
                    'address' => $request->input('customer')['address'],
                    'phone' => $request->input('customer')['phone'],
                    'vatRegistration' => $request->input('customer')['vatRegistration'],
                    'user_id' => Auth::user()->id
                ]);
            }
            $invoice = Auth::user()->invoices()->create([
                'subtotal' => $request->input('subtotal'),
                'vatTotal' => $request->input('vat'),
                'total' => $request->input('total'),
                'title' => $request->input('title'),
                'notes' => $request->input('notes'),
                'reference' => "INV-" . Carbon::now()->format('yymd-h-m'),
                'customer_id' => $customer->id
            ]);

            foreach ($request->input('items') as $invoiceItem) {
                $invoice->items()->create([
                    'item_id' => $invoiceItem['item']['id'],
                    'quantity' => $invoiceItem['quantity'],
                    'subtotal' => $invoiceItem['subtotal'],
                    'vat' => $invoiceItem['vat'],
                    'total' => $invoiceItem['total']
                ]);
            }

            activity()
                ->causedBy(Auth::user())
                ->performedOn($invoice)
                ->log('edited');
        });

        return redirect()->route('invoices.index')->with('success', trans('Invoice created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return Inertia::render('Invoices/Show', [
            'invoice' => new InvoiceResource($invoice)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return Inertia::render('Invoices/Edit', [
            'invoice' => $invoice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->only('subtotal', 'vatTotal', 'total', 'title', 'to', 'toContact', 'address', 'notes'));

        return redirect()->route('invoices.index')->with('success', trans('invoice updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        foreach ($invoice->items as $invoiceItem) {
            $invoiceItem->delete();
        }
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', trans('invoice deleted successfully'));
    }

    public function print(Invoice $invoice)
    {
        return view('invoice', [
            'invoice' => $invoice,
            'qrcode' => GenerateQrCode::fromArray([
                new Seller($invoice->user->name), // seller name
                new TaxNumber($invoice->user->vatRegistration), // seller tax number
                new InvoiceDate($invoice->created_at->format('Y-m-d\TH:i:s\Z')), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
                new InvoiceTotalAmount($invoice->total), // invoice total amount
                new InvoiceTaxAmount($invoice->vatTotal) // invoice tax amount
                // TODO :: Support others tags
            ])->render()
        ]);
    }

    public function printPdf(Invoice $invoice)
    {
        //new code
        $filename = $invoice->customer->phone . " invoice";

        Browsershot::url(route('invoices.print', $invoice->uuid))
            ->noSandbox()
            ->waitUntilNetworkIdle()
            ->save(storage_path("app/invoices/$filename.pdf"));

        return Storage::disk('invoices')->download("$filename.pdf");
    }
}
