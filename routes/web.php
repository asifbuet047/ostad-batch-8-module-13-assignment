<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get("/", fn() => view('dashboard'));

Route::get('/signup', [UserController::class, 'viewRegistrationForm']);

Route::post('/signup', [UserController::class, 'storeUserIntoDB']);

Route::get('/login', [UserController::class, 'viewLoginPage']);

Route::post('/login', [UserController::class, 'loginUser']);
