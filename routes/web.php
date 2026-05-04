<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/products', [ProductController::class, 'store']);

Route::get('/tasks', [TaskController::class, 'index']);      
Route::post('/tasks', [TaskController::class, 'store']);     
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']); 