<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            alert()->error('Maaf', 'Anda harus login dahulu');
            return redirect('/login');
        }
        
        return $next($request);
    }
}
