<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required | string',
            'adminKey'=>'required | string',
            'name'=>'required |string | max:100',
            'phone'=>'required | max:11 ' ,
            'password'=>'required | string  |confirmed ',
            'password_confirmation'=>'required | string ',
            'Adminpassword'=>'required | string ',
        ];
    }
}
