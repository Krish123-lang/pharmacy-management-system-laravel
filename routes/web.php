<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Admin Dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
