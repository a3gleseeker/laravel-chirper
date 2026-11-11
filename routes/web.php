<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/home', function () {
    return view('home');
});


Route::get('/', [PostController::class, 'index']);