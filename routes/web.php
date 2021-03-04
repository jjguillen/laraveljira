<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalizacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí están las rutas del proyecto
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Web principal
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Administración
Route::prefix('admin')->middleware('auth')->group(function () {

    // Rutas para categorias
    Route::resource('/categorias', CategoriaController::class)->parameters([
        'categorias' => 'categoria'
    ]);

    // Rutas para productos
    Route::resource('/productos', ProductoController::class)->parameters([
        'productos' => 'producto'
    ]);;

    // Rutas para localizaciones
    Route::resource('/localizaciones', LocalizacionController::class)->parameters([
        'localizaciones' => 'localizacion'
    ]);

    // Ruta para el inventario
    Route::get('/inventario', function () {
        return view('admin.inventario');
    });
});