<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Aquí las rutas nuevas
Route::get('/admin', function () {
    return "Bienvenido a admin";
});


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::group(['prefix' => 'categorias'], function () {
        Route::resource('/', CategoriaController::class)->except('edit');
    });

    Route::group(['prefix' => 'productos'], function () {
        Route::resource('/', ProductoController::class);
        Route::get('/localizacionAsignada', [ProductoController::class, 'localizacionAsignada']);
        Route::get('/asignarLocalizacion', [ProductoController::class, 'asignarLocalizacion']);
    });

    Route::group(['prefix' => 'localizaciones'], function () {
        Route::resource('/', LocalizacionController::class)->except('edit');
    });

    Route::get('/inventario', function () {
        return view('admin.inventario');
    });
});
