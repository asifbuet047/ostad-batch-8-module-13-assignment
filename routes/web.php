<?php

use App\Http\Controllers\UserController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get("/", [UserController::class, 'showDashboard'])->name('dashboard');

Route::get('/signup', [UserController::class, 'viewRegistrationForm'])->name("signup");

Route::post('/signup', [UserController::class, 'storeUserIntoDB']);

Route::get('/login', [UserController::class, 'viewLoginPage'])->name('login');

Route::post('/login', [UserController::class, 'loginUser']);

Route::get('/logout', [UserController::class, 'logoutUser']);

Route::get('/hello', function () {
    $data = [1, 2];
    return view('hello', [
        'data' => App::environment()
    ]);
});

Route::get('/counter', Counter::class);
