<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Taruh di sini
Route::post('/products', [ProductController::class, 'store']);
