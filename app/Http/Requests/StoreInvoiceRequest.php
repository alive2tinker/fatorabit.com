<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'items.*.item' => "required",
            'items.*.quantity' => "required",
            'items.*.subtotal' => "required",
            'items.*.vat' => "required",
            'items.*.total' => "required",
            'title' => "required",
            'address' => "required",
            'toContact' => "required",
            'subtotal' => "required",
            'total' => "required",
            'vat' => "required",
            'to' => "required",
            'customerVat' => "required|numeric"
        ];
    }
}
