<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Exception;

class BrandController extends Controller
{
    public function error($message)
    {
        alert()->error('Maaf', $message);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        $brands = Brand::select('id', 'name')->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandRequest $request)
    {
        try{

            Brand::create(['name' => $request->name]);

            alert()->success('Success', 'Data berhasil ditambahkan');
            return redirect('/dashboard/brand');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        if(!$brand) {
            alert()->error('Maaf','Brand tidak ditemukan');
            return redirect()->back()->withInput();
        }

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {

        $brand = Brand::where('id', $id)->first();
        if(!$brand) {
            alert()->error('Maaf','brand tidak ditemukan');
            return redirect()->back()->withInput();
        }

        try{

            $brand->update(['name' => $request->name]);

            alert()->success('Success', 'Data berhasil diupdate');
            return redirect('/dashboard/brand');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->first();
        if(!$brand){
            alert()->error('Maaf', 'brand tidak ditemukan');
            return redirect('/dashboard/brand');
        }

        try{

            $brand->delete();
            alert()->success('Success', 'Data berhasil dihapus');
            return redirect('/dashboard/brand');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
