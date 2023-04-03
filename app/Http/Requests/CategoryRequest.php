<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "nama product harus diisi",
            'name.max'      => "maximal nama product adalah 100 character",
        ];
    }
}