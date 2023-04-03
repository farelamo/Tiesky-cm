<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function error($message)
    {
        alert()->error('Maaf', $message);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        try{

            Category::create(['name' => $request->name]);

            alert()->success('Success', 'Data berhasil ditambahkan');
            return redirect('/dashboard/category');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        if(!$category) {
            alert()->error('Maaf','Kategori tidak ditemukan');
            return redirect()->back()->withInput();
        }

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = Category::where('id', $id)->first();
        if(!$category) {
            alert()->error('Maaf','category tidak ditemukan');
            return redirect()->back()->withInput();
        }

        try{

            $category->update(['name' => $request->name]);

            alert()->success('Success', 'Data berhasil diupdate');
            return redirect('/dashboard/category');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        if(!$category){
            alert()->error('Maaf', 'Category tidak ditemukan');
            return redirect('/dashboard/category');
        }

        try{

            $category->delete();
            alert()->success('Success', 'Data berhasil dihapus');
            return redirect('/dashboard/category');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
