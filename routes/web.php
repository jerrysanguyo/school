<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login'])
    ->name('login');
Route::resource('user', UserController::class);