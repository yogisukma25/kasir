<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routing untuk Perusahaan
Route::resource('companies', CompanyController::class);

// Routing untuk Barang
Route::resource('items', ItemController::class);

// Routing untuk Transaksi
Route::resource('transactions', TransactionController::class);

// Routing untuk Keuangan
Route::get('finances', [FinanceController::class, 'index'])->name('finances.index');
Route::post('finances', [FinanceController::class, 'update'])->name('finances.update');

require __DIR__.'/auth.php';