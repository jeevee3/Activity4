<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Registration routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Alias "add-user" routes pointing to register controller methods
Route::get('/add-user', [AuthController::class, 'showRegisterForm'])->name('users.add');
Route::post('/add-user', [AuthController::class, 'register'])->name('users.add.submit');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout route (POST for security)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route, protected by auth middleware
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

