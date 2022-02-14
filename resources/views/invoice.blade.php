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
        <div class="py-10 w-full"></div>
        <div class="my-4 flex justify-between">
            <div>
            <ul>
                <li class="my-2">{{ $invoice->customer->name }}</li>
                <li class="my-2">{{ $invoice->customer->address }}</li>
                <li class="my-2">{{ $invoice->customer->phone }}</li>
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
                        <td class="border-l border-gray-300 text-center">
                            <p>{{ $invoiceItem->item->nameAr }}</p>
                            <p>{{ $invoiceItem->item->nameEn }}</p>
                        </td>
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
        <p class="text-center mt-3">{{ __('You can view this invoice @ ')}} <a href="{{route('invoices.print', $invoice->uuid)}}">{{route('invoices.print', $invoice->uuid)}}</a></p>
    </div>
</body>

</html>
