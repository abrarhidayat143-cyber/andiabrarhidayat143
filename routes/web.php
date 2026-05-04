<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController; // Tambahkan ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/products', [ProductController::class, 'store']);

// Taruh route untuk To-Do List di sini
Route::post('/tasks', [TaskController::class, 'store']);