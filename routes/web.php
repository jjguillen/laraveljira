<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\UtilsController;

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

// Web principal - inventario
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [ProductoController::class, 'index'])->name('dashboard');

// Administración
Route::prefix('admin')->middleware('auth')->group(function () {

    // Rutas para categorias
    Route::resource('/categorias', CategoriaController::class)->parameters([
        'categorias' => 'categoria'
    ]);

    // Rutas para productos
    Route::get('/productos/pdf', [ProductoController::class, 'createPDF']);
    Route::resource('/productos', ProductoController::class)->parameters([
        'productos' => 'producto'
    ]);;

    // Rutas para localizaciones
    Route::get('/localizaciones/{id}/productos', [LocalizacionController::class, 'viewProds']);
    Route::resource('/localizaciones', LocalizacionController::class)->parameters([
        'localizaciones' => 'localizacion'
    ]);
});
