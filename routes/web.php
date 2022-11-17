<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('escritorio', [DashboardController::class, 'index'])->middleware('data');

Route::get('escritorio/productos',                      [ProductoController::class, 'index'])->name('productos.index');
Route::get('escritorio/productos#crear',                [ProductoController::class, 'create'])->name('productos.create');
Route::post('escritorio/productos',                     [ProductoController::class, 'store'])->name('productos.store');
Route::get('escritorio/productos/{producto}',           [ProductoController::class, 'show'])->name('productos.show');
Route::get('escritorio/productos/{producto}/#editar',   [ProductoController::class, 'show'])->name('productos.show');
Route::put('escritorio/productos/{producto}',           [ProductoController::class, 'update'])->name('productos.update');
Route::delete('escritorio/productos/{producto}',        [ProductoController::class, 'delete'])->name('productos.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
