<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitMeasureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::post('categories', [CategoryController::class, 'store']);

    Route::resource('suppliers',  SupplierController::class);
    Route::resource('unit_measures', UnitMeasureController::class);

    Route::resource('warehouses', WarehouseController::class);
    Route::resource('stock', StockMovementController::class)->except('show');

    Route::get('stock/history', [StockMovementController::class, 'history'])->name('stock.history');
    Route::get('stock/pending', [StockMovementController::class, 'pending'])->name('stock.pending');
    Route::get('stock/register/{productId}', [StockMovementController::class, 'registerStock'])->name('stock.registerStock');
    Route::post('stock/store', [StockMovementController::class, 'storeRegisteredStock'])->name('stock.storeRegisteredStock');
    Route::get('/positions-by-warehouse/{warehouseId}', [StockMovementController::class, 'getPositionsByWarehouse']);
    Route::post('stock/add', [StockMovementController::class, 'addStock'])->name('stock.add');
});

require __DIR__.'/auth.php';
