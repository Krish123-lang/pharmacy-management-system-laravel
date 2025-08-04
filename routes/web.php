<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Auth Routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot_post', [AuthController::class, 'forgot_post'])->name('forgot_post');
Route::get('reset/{token}', [AuthController::class, 'getReset'])->name('getReset');
Route::post('reset/{token}', [AuthController::class, 'postReset'])->name('postReset');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registerSave', [AuthController::class, 'registerSave'])->name('registerSave');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Admin Dashboard
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('admin/')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('customers', [CustomerController::class, 'customers'])->name('customers');
        Route::get('customers/add', [CustomerController::class, 'add_customers'])->name('add_customers');
        Route::post('customers/add', [CustomerController::class, 'insert_add_customers'])->name('insert_add_customers');
        Route::get('customers/edit/{customer}', [CustomerController::class, 'edit_customers'])->name('edit_customers');
        Route::put('customers/edit/{customer}', [CustomerController::class, 'update_customers'])->name('update_customers');
        Route::delete('customers/delete/{customer}', [CustomerController::class, 'delete_customers'])->name('delete_customers');

        Route::get('medicines', [MedicineController::class, 'index'])->name('medicines');
        Route::get('medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
        Route::post('medicines/store', [MedicineController::class, 'store'])->name('medicines.store');
        Route::get('medicines/edit/{medicine}', [MedicineController::class, 'edit'])->name('medicines.edit');
        Route::put('medicines/update/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
        Route::delete('medicines/destroy/{medicine}', [MedicineController::class, 'destroy'])->name('medicines.destroy');

        Route::get('stocks', [StockController::class, 'index'])->name('stocks');
        Route::get('stocks/create', [StockController::class, 'create'])->name('stocks.create');
        Route::post('stocks/store', [StockController::class, 'store'])->name('stocks.store');
        Route::get('stocks/edit/{stock}', [StockController::class, 'edit'])->name('stocks.edit');
        Route::put('stocks/update/{stock}', [StockController::class, 'update'])->name('stocks.update');
        Route::delete('stocks/destroy/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');

        Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers');
        Route::get('suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
        Route::post('suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::get('suppliers/edit/{supplier}', [SupplierController::class, 'edit'])->name('suppliers.edit');
        Route::put('suppliers/update/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::delete('suppliers/destroy/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

        Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('invoices/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::put('invoices/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('invoices/destroy/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');

        Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases');
        Route::get('purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
        Route::post('purchases/store', [PurchaseController::class, 'store'])->name('purchases.store');
        Route::get('purchases/edit/{purchase}', [PurchaseController::class, 'edit'])->name('purchases.edit');
        Route::put('purchases/update/{purchase}', [PurchaseController::class, 'update'])->name('purchases.update');
        Route::delete('purchases/destroy/{purchase}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');

        Route::get('account', [DashboardController::class, 'account'])->name('account');
        Route::put('update_account/{user}', [DashboardController::class, 'update_account'])->name('update.account');

    });
});
