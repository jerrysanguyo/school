<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\StudentParentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login'])
    ->name('login');

Route::resource('parent', StudentParentController::class);
Route::resource('user', UserController::class);