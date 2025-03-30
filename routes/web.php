<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers',  SupplierController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stock', StockMovementController::class)->except('show');
    Route::get('/stock/history', [StockMovementController::class, 'history'])->name('stock.history');

    Route::get('/categories/list', [CategoryController::class, 'list'])->name('categories.list');
});

require __DIR__.'/auth.php';
