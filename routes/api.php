<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);
Route::get('/getUsers', [UserController::class, 'getUsers']);
Route::post('/registration', [UserController::class, 'registration']);
Route::post('/transfer/{id}', [UserController::class, 'transfer']);
Route::put('/user/{id}', [UserController::class, 'update']);
