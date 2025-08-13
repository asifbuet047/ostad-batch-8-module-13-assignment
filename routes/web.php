<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get("/", fn() => view('dashboard'));

Route::get('/signup', [UserController::class, 'viewRegistrationForm'])->name('signup');

Route::post('/signup', [UserController::class, 'storeUserIntoDB'])->name('user.store');

Route::get('/login', fn() => view('login_page'));
