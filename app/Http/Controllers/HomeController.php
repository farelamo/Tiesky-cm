<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class HomeController extends Controller
{

    public function index()
    {
        return view('landing.home',[
            "products" => Product::paginate(8),
        ]);
    }

    public function about()
    {
        return view('landing.about');
    }
    
    public function contact()
    {
        return view('landing.contact');
    }

    public function catalog()
    {
        return view('landing.catalog',[
            "products" => Product::all(),
        ]);
    }

}