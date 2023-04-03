<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => "email harus diisi",
            'email.email'       => "format email salah",
            'email.exists'      => "email tidak ditemukan",
            'password.required' => "password harus diisi",
            'password.max'      => "maximal password adalah 8 character",
        ];
    }
}
