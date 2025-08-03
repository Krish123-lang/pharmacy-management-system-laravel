<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot_post', [AuthController::class, 'forgot_post'])->name('forgot_post');
Route::get('reset/{token}', [AuthController::class, 'getReset'])->name('getReset');
Route::post('reset/{token}', [AuthController::class, 'postReset'])->name('postReset');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Admin Dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/customers', [CustomerController::class, 'customers'])->name('customers');
    Route::get('admin/customers/add', [CustomerController::class, 'add_customers'])->name('add_customers');
    Route::post('admin/customers/add', [CustomerController::class, 'insert_add_customers'])->name('insert_add_customers');
    Route::get('admin/customers/edit/{customer}', [CustomerController::class, 'edit_customers'])->name('edit_customers');
    Route::put('admin/customers/edit/{customer}', [CustomerController::class, 'update_customers'])->name('update_customers');
    Route::delete('admin/customers/delete/{customer}', [CustomerController::class, 'delete_customers'])->name('delete_customers');

    Route::get('admin/medicines', [MedicineController::class, 'index'])->name('medicines');
    Route::get('admin/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
    Route::post('admin/medicines/store', [MedicineController::class, 'store'])->name('medicines.store');
    Route::get('admin/medicines/edit/{medicine}', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::put('admin/medicines/update/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
    Route::delete('admin/medicines/destroy/{medicine}', [MedicineController::class, 'destroy'])->name('medicines.destroy');

    Route::get('admin/stocks', [StockController::class, 'index'])->name('stocks');
    Route::get('admin/stocks/create', [StockController::class, 'create'])->name('stocks.create');
    Route::post('admin/stocks/store', [StockController::class, 'store'])->name('stocks.store');
    Route::get('admin/stocks/edit/{stock}', [StockController::class, 'edit'])->name('stocks.edit');
    Route::put('admin/stocks/update/{stock}', [StockController::class, 'update'])->name('stocks.update');
    Route::delete('admin/stocks/destroy/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');

});
