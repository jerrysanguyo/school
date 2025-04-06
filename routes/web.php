<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\Auth\ApiLoginController;
use App\Http\Middleware\ExternalUserAuth;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [UserController::class, 'login'])
    ->name('login');
Route::post('/login/check', [UserController::class, 'loginCheck'])
    ->name('login.check');
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');

Route::get('/auth/verify', [ApiLoginController::class, 'verify']);

// If i'll be using API token for authentication
// it should be web if login through this it should be auth
Route::middleware(['auth', 'check.user.role'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        // route resource
        Route::resources([
            'user'  => UserController::class,
            'parent' => StudentParentController::class,
            'detail' => StudentDetailController::class,
            'district' => DistrictController::class,
            'barangay' => BarangayController::class,
            'school' => SchoolController::class,
            'rfid' => RfidController::class,
        ]);
    });

Route::middleware(['auth', 'check.user.role'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        
    });

Route::middleware(['web', 'check.user.role'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });