<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/home', function () {
    return view('home');
});


Route::get('/', [PostController::class, 'index']);

Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit',[PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}',[PostController::class, 'destroy']);

Route::resource('posts', PostController::class)
    ->only(['store', 'edit', 'update', 'destroy']);
