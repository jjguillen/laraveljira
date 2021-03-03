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

Route::get('/', function(){
    return view('welcome');
});

// Web principal
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Administración
Route::prefix('admin')->middleware('auth')->group(function () {

    // Rutas para categorias
    Route::group(['prefix' => 'categorias'], function () {
        Route::resource('/', CategoriaController::class)->except('edit');
    });

    // Rutas para productos
    Route::group(['prefix' => 'productos'], function () {
        Route::resource('/', ProductoController::class);
    });

    // Rutas para localizaciones
    Route::group(['prefix' => 'localizaciones'], function () {
        Route::resource('/', LocalizacionController::class)->except('edit');
    });

    // Ruta para el inventario
    Route::get('/inventario', function () {
        return view('admin.inventario');
    });
});
