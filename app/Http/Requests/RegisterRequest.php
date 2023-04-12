<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // 'image_url' => 'required|string|regex:/\.(jpg|png)$/i',
            'image_url' => 'required|string',
            'email' => 'required|email|max:255|unique:users|email:rfc,dns',
            'password' => 'required|string|min:8|regex:/[0-9]/|confirmed',
            'accept' => 'required',
        ];
    }
}
