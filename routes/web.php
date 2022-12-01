<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('escritorio',                          [DashboardController::class, 'index'])->name('dashboard');
    Route::get('escritorio#productos',                [ProdukctoController::class, 'index'])->name('productos.index');
    Route::get('escritorio/productos/crear',          [ProductoController::class, 'create'])->name('productos.create');
    Route::post('escritorio/productos',               [ProductoController::class, 'store'])->name('productos.store');
    Route::get('escritorio/productos/{id}',           [ProductoController::class, 'show'])->name('productos.show');
    Route::get('escritorio/productos/{id}',           [ProductoController::class, 'edit'])->name('productos.edit');
    Route::patch('escritorio/productos/{id}',         [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('escritorio/productos/{id}',        [ProductoController::class, 'destroy'])->name('productos.delete');
    Route::get('escritorio/productos/form/cancel',    [ProductoController::class, 'cancel'])->name('productos.cancel');

    Route::get('escritorio/productos/buy/{producto}', [CompraController::class, 'buyProduct'])->name('productos.buy');
    Route::get('escritorio#compras',                  [CompraController::class, 'buyProduct'])->name('compras.index');

    Route::get('escritorio/generate/bills', [FacturaController::class, 'generateBills'])->middleware('role:admin')->name('compras.buy');
    Route::get('escritorio/show/bill/{id}', [FacturaController::class, 'showBill'])->name('compras.show');
});

Auth::routes();

// Route::get('http://localhost:8000/#login', [DashboardController::class, 'index'])->

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
