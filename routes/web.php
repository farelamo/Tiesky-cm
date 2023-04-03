<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/kontak', [HomeController::class, 'contact']);
Route::get('/katalog', [HomeController::class, 'catalog']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::prefix('/dashboard')->group(function () {
        Route::resource('/product', ProductController::class)->except(['show']);
        Route::resource('/brand', BrandController::class)->except(['show']);
        Route::resource('/client', ClientController::class)->except(['show']);
        Route::resource('/category', CategoryController::class)->except(['show']);
    });
});
