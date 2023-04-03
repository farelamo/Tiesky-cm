<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function error($message)
    {
        alert()->error('Maaf', $message);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        $products = Product::select('id', 'name', 'short_desc')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];

        Validator::make($request->all(), $rules, $messages = 
        [
            'photo.required' => 'gambar harus diisi',
            'photo.mimes'    => 'gambar harus berupa jpg, png atau jpeg',
            'photo.max'      => 'maximum gambar adalah 5 MB',
        ])->validate();
        
        try{

            $imageFile      = $request->file('photo');
            $image          = time() . '-' . $imageFile->getClientOriginalName();
            Storage::putFileAs('public/images', $imageFile, $image);

            Product::create([
                'name'       => $request->name,
                'short_desc' => $request->short_desc,
                'desc'       => $request->desc,
                'photo'      => $image,
            ]);

            alert()->success('Success', 'Data berhasil ditambahkan');
            return redirect('/dashboard/product');
        }catch(Exception $e){
            if(Storage::disk('local')->exists('public/images/' . $image)){
                Storage::delete('public/images/' . $image);
            }
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        if(!$product) {
            alert()->error('Maaf','product tidak ditemukan');
            return redirect()->back()->withInput();
        }

        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {

        $product = Product::where('id', $id)->first();
        if(!$product) {
            alert()->error('Maaf','product tidak ditemukan');
            return redirect()->back()->withInput();
        }

        $updateData = [
            'name'       => $request->name,
            'short_desc' => $request->short_desc,
            'desc'       => $request->desc,
        ];

        if($request->hasFile('photo')){

            $rules = [
                'photo' => 'mimes:jpg,png,jpeg|max:5048',
            ];

            Validator::make($request->all(), $rules, $messages = 
            [
                'photo.mimes' => 'gambar harus berupa jpg, png atau jpeg',
                'photo.max'   => 'maximum gambar adalah 5 MB',
            ])->validate();

            $imageFile      = $request->file('photo');
            $image          = time() . '-' . $imageFile->getClientOriginalName();
            Storage::putFileAs('public/images', $imageFile, $image);

            $updateData['photo'] = $image;
        }

        try{

            $product->update($updateData);

            alert()->success('Success', 'Data berhasil diupdate');
            return redirect('/dashboard/product');
        }catch(Exception $e){
            if($request->hasFile('photo')){
                if($updateData->photo){
                    if(Storage::disk('local')->exists('public/images/' . $updateData->photo)){
                        Storage::delete('public/images/' . $updateData->photo);
                    }
                }
            }
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        if(!$product){
            alert()->error('Maaf', 'product tidak ditemukan');
            return redirect('/dashboard/product');
        }

        try{

            if($product->photo){
                if(Storage::disk('local')->exists('public/images/' . $product->photo)){
                    Storage::delete('public/images/' . $product->photo);
                }
            }

            $product->delete();
            alert()->success('Success', 'Data berhasil dihapus');
            return redirect('/dashboard/product');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
