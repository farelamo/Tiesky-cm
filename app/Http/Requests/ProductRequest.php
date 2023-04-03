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
            'name'        => 'required|max:100',
            'category_id' => 'required|exists:categories,id',
            'brand_id'    => 'required|exists:categories,id',
            'short_desc'  => 'required|max:150',
            'desc'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => "nama produk harus diisi",
            'name.max'             => "maximal nama produk adalah 100 character",
            'category_id.required' => "kategori produk harus dipilih",
            'category_id.exists'   => "kategori produk yang dipilih tidak tersedia",
            'brand_id.required'    => "brand produk yang harus dipilih",
            'brand_id.exists'      => "brand produk yang dipilih tidak tersedia",
            'short_desc.required'  => "deskripsi singkat harus diisi",
            'short_desc.max'       => "maximal deskripsi adalah 150 character",
            'desc.required'        => "deskripsi harus diisi",
        ];
    }
}
