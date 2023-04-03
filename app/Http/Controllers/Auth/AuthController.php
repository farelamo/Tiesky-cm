<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
Use Alert;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(AuthRequest $request)
    {
        if(Auth::Attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ])){
            toast('Selamat datang ' . Auth::user()->name, 'success');
            return redirect('/dashboard/product');
        }

        alert()->error('Maaf','Password Salah');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        
        alert()->success('Success','Anda berhasil logout');
        return redirect('/login');
    }
}
