<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'image_url' => 'required|string',
            'email' => 'required|email|max:255|unique:users|email:rfc,dns',
            'password' => 'required|string|min:8|regex:/[0-9]/|confirmed',
            'accept' => 'required|accepted|boolean',
        ];
    }
}
