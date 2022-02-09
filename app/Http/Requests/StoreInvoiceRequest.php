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
            'customer.address' => "required_if:customerId,new",
            'customer.phone' => "required_if:customerId,new",
            'subtotal' => "required",
            'total' => "required",
            'vat' => "required",
            'customer.name' => "required_if:customerId,new",
            'customer.vatRegistration' => "nullable|numeric"
        ];
    }
}
