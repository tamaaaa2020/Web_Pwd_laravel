<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/post', [AuthController::class, 'login'])->name('login.post');
Route::post('/register/post', [AuthController::class, 'register'])->name('register.post');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');


Route::get('/home', [HomeController::class, 'showdashboardform'])->name('home');


Route::get('/Play', function () {
    return view('Play');
});
