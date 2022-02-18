<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Models\Note;
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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvoiceResource::collection(Auth::user()->invoices()->orderby('created_at', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Invoices/Create', [
            'items' => ItemResource::collection(Auth::user()->items)
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
        Log::info("here is the customerId field {$request->has('customerId')}");
        Log::debug('here is the API customer', (array) $request->input('customer'));
        $invoice = DB::transaction(function () use ($request) {
            $customer = null;
            $note = null;

            if($request->has('customerId') && is_numeric($request->input('customerId'))){
                $customer = Customer::find($request->input('customerId'));
            }else{
                $customer = Customer::create([
                    'name' => $request->input('customer')['name'],
                    'address' => $request->input('customer')['address'],
                    'phone' => $request->input('customer')['phone'],
                    'vatRegistration' => $request->input('customer')['vatRegistration'],
                    'user_id' => Auth::user()->id
                ]);
            }

            if($request->input('noteId') === 'new'){
                $note = Note::create([
                    'title' => $request->input('note')['title'],
                    'body' => $request->input('note')['description'],
                    'user_id' => Auth::user()->id
                ]);
            }else{
                $note = Note::find($request->input('noteId'));
            }

            $invoice = Auth::user()->invoices()->create([
                'subtotal' => $request->input('subtotal'),
                'vatTotal' => $request->input('vat'),
                'total' => $request->input('total'),
                'title' => $request->input('title'),
                'customer_id' => $customer->id,
                'notes' => $request->input('notes'),
                'note_id' => $note->id,
                'reference' => "INV-".Carbon::now()->format('Y-m-dh:i:s'),
            ]);

            $invoice->update([
                'qrcode' => GenerateQrCode::fromArray([
                new Seller($invoice->user->name), // seller name
                new TaxNumber($invoice->user->vatRegistration), // seller tax number
                new InvoiceDate($invoice->created_at->format('Y-m-d\TH:i:s\Z')), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
                new InvoiceTotalAmount($invoice->total), // invoice total amount
                new InvoiceTaxAmount($invoice->vatTotal) // invoice tax amount
                // TODO :: Support others tags
            ])->render()

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

            return $invoice;

        });

        Log::debug('invoice details before sending back', (array) $invoice);

        return response()->json($invoice, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
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
        $filename = $invoice->toContact . " invoice";

        Browsershot::url(route('invoices.print', $invoice->uuid))
        ->noSandbox()
        ->waitUntilNetworkIdle()
        ->save(storage_path("app/invoices/$filename.pdf"));

        return Storage::disk('invoices')->download("$filename.pdf");
    }
}
