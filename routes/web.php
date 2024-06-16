<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\ProfileController;


// use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login', [App\Http\Controllers\DashboardController::class, 'login'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [App\Http\Controllers\DashboardController::class, 'register'])->name('register');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
Route::post('/account/transfer', [App\Http\Controllers\AccountController::class, 'transfer'])->name('account.transfer');
Route::get('/customer-service', [App\Http\Controllers\CustomerServiceController::class, 'index'])->name('customer_service.index');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Route::get('/users', [UserController::class, 'index']);