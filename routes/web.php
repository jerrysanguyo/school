<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RfidController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login'])
    ->name('login');

Route::resource('parent', StudentParentController::class);
Route::resource('user', UserController::class);
Route::resource('detail', StudentDetailController::class);
Route::resource('district', DistrictController::class);
Route::resource('barangay', BarangayController::class);
Route::resource('school', SchoolController::class);
Route::resource('rfid', RfidController::class);