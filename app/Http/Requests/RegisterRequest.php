<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => "required|unique:users|string|max:255",
            'email' => "required|unique:users|string|email|max:255",
            'password' => "required|confirmed",
            'vatRegistration' => "required|numeric|unique:users|regex:/^3[0-9]{14}$/",
            'phone' => "required|unique:users|regex:/^05[0-9]{8}$/"
        ];
    }
}
