<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::get('register', [AuthController::class, 'register'])->name('register');


// Admin Dashboard
Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
