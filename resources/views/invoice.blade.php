<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invoice->title }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div class="max-w-3xl mx-auto py-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="flex justify-between">
            <div class="flex">
                <svg version="1.1" class="w-14 h-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 409.221 409.221" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 409.221 409.221">
                    <path d="m115.921,208.425c0-5.523 4.477-10 10-10h56.421c5.523,0 10,4.477 10,10s-4.477,10-10,10h-56.421c-5.523,0-10-4.477-10-10zm10,54.838h56.421c5.523,0 10-4.477 10-10s-4.477-10-10-10h-56.421c-5.523,0-10,4.477-10,10s4.477,10 10,10zm32.2-159.536c0-19.248 20.421-34.326 46.49-34.326 26.068,0 46.488,15.078 46.488,34.326s-20.42,34.326-46.488,34.326c-26.069,0-46.49-15.078-46.49-34.326zm20,0c0,6.762 11.329,14.326 26.49,14.326 15.16,0 26.488-7.563 26.488-14.326s-11.328-14.326-26.488-14.326c-15.162-1.42109e-14-26.49,7.564-26.49,14.326zm-52.2,81.176h56.421c5.523,0 10-4.477 10-10s-4.477-10-10-10h-56.421c-5.523,0-10,4.477-10,10s4.477,10 10,10zm157.381,155.665h-32.818c-5.522,0-10,4.477-10,10s4.478,10 10,10h32.818c5.522,0 10-4.477 10-10s-4.478-10-10-10zm59.627-330.568v389.221c0,5.523-4.478,10-10,10h-256.637c-5.523,0-10-4.477-10-10v-389.221c0-5.523 4.477-10 10-10h36.662c5.523,0 10,4.477 10,10v14.327h16.662v-14.327c0-5.523 4.477-10 10-10h36.663c5.523,0 10,4.477 10,10v14.327h16.663v-14.327c0-5.523 4.478-10 10-10h36.662c5.522,0 10,4.477 10,10v14.327h16.663v-14.327c0-5.523 4.478-10 10-10h36.661c5.523,0 10.001,4.477 10.001,10zm-20,10h-16.661v14.327c0,5.523-4.478,10-10,10h-36.663c-5.522,0-10-4.477-10-10v-14.327h-16.662v14.327c0,5.523-4.478,10-10,10h-36.663c-5.523,0-10-4.477-10-10v-14.327h-16.663v14.327c0,5.523-4.477,10-10,10h-36.662c-5.523,0-10-4.477-10-10v-14.327h-16.663v369.221h236.637v-369.221zm-39.627,178.425h-32.818c-5.522,0-10,4.477-10,10s4.478,10 10,10h32.818c5.522,0 10-4.477 10-10s-4.478-10-10-10zm0,44.838h-32.818c-5.522,0-10,4.477-10,10s4.478,10 10,10h32.818c5.522,0 10-4.477 10-10s-4.478-10-10-10zm0,48.653h-157.381c-5.523,0-10,4.477-10,10s4.477,10 10,10h157.381c5.522,0 10-4.477 10-10s-4.478-10-10-10z" />
                </svg>
                <h1 class="text-xl font-semibold mt-3">{{ $invoice->user->name }}</h1>
            </div>
            <h1 class="text-4xl font-bold text-gray-700">{{ __('Invoice') }}</h1>
        </div>
        <hr class="my-3 border border-gray-500">
        <div class="my-4 flex justify-between">
            <div>
            <ul>
                <li class="my-2">{{ $invoice->to }}</li>
                <li class="my-2">{{ $invoice->address }}</li>
                <li class="my-2">{{ $invoice->toContact }}</li>
            </ul>
            </div>
            <div>
                <ul>
                    <li>{{ __('Date: ') . $invoice->created_at->format('d/m/Y')}} </li>
                    <li>{{ __('Reference Number: ') . $invoice->reference }}</li>
                    <li>{{ __('VAT Number: ') . $invoice->user->vatRegistration }}</li>
                </ul>
            </div>
        </div>
        <hr class="my-3 border border-gray-500">
        <table class="border border-gray-300 w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-300">{{ __('Item') }}</th>
                    <th class="border-b border-gray-300">{{ __('Subtotal') }}</th>
                    <th class="border-b border-gray-300">{{ __('VAT') }}</th>
                    <th class="border-b border-gray-300">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $invoiceItem)
                    <tr>
                        <td class="border-l border-gray-300 text-center">{{ $invoiceItem->item->name }}</td>
                        <td class="border-l border-gray-300 text-center">{{ $invoiceItem->subtotal }}</td>
                        <td class="border-l border-gray-300 text-center">{{ $invoiceItem->vat }}</td>
                        <td class="border-l border-gray-300 text-center">{{ $invoiceItem->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="border border-gray-300 my-4 w-1/3">
            <tr>
                <th class="border-l border-b border-gray-300 py-2 text-center">{{ __('Subtotal') }}</th>
                <td class="border-b border-gray-300 py-2 text-center">{{ $invoice->subtotal }}</td>
            </tr>
            <tr>
                <th class="border-l border-b border-gray-300 py-2 text-center">{{ __('VAT') }}</th>
                <td class="border-b border-gray-300 py-2 text-center">{{ $invoice->vatTotal }}</td>
            </tr>
            <tr>
                <th class="border-l border-b border-gray-300 py-2 text-center">{{ __('Total') }}</th>
                <td class="border-b border-gray-300 py-2 text-center">{{ $invoice->total }}</td>
            </tr>
        </table>
        <p class="my-4">{!! $invoice->notes !!}</p>
        <div class="flex justify-center">
            <img src="{{ $qrcode }}" alt="">
        </div>
        <div class="max-w-xl mx-auto py-4 bg-gray-200 rounded-md mt-5"><p class="text-gray-600 text-center">{{ __('this invoice was created with love by') }} <a href="/">{{ __('Fatorabit') }}</a></p></div>
        <p class="text-center">{{ __('You can view this invoice @ ')}} <a href="{{route('invoices.print', $invoice->uuid)}}">{{route('invoices.print', $invoice->uuid)}}</a></p>
    </div>
</body>

</html>
