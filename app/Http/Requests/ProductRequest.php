<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       => 'required|max:100',
            'short_desc' => 'required|max:150',
            'desc'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => "nama product harus diisi",
            'name.max'             => "maximal nama product adalah 100 character",
            'short_desc.required'  => "deskripsi singkat harus diisi",
            'short_desc.max'       => "maximal deskripsi adalah 150 character",
            'desc.required'        => "deskripsi harus diisi",
        ];
    }
}
