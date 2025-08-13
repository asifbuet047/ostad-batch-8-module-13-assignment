<?php

use Illuminate\Support\Facades\Route;


Route::get("/", fn() => view('dashboard'));

Route::get('/signup', fn() => view("signup_page"));
