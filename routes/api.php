<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/user/login', [AuthController::class, 'loginUser']);
Route::get('/user/getAll', [UserController::class, 'getUsers']);
