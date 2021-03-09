<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\LocalizacionResource;
use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use App\Models\Localizacion;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Localizacion
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::get('/localizacion', function () {
    return LocalizacionResource::collection(Localizacion::paginate());
});

Route::get('/producto/{codigo}', function ($codigo) {
    return new ProductoResource(Producto::findOrFail($codigo));
});

Route::get('/producto', function () {
    return ProductoResource::collection(Producto::paginate());
});

Route::get('/categoria', function () {
    return CategoriaResource::collection(Categoria::paginate());
});
Route::get('/categoria/{categoria}', function () {
    return CategoriaResource::collection(Categoria::all());
});api_add
Route::middleware('auth:sanctum')->post('/producto', [ApiController::class, 'api_add_producto']);
Route::middleware('auth:sanctum')->delete('/producto/codigo/delete/{restauraapiStorente}', [RestauranteController::class, 'apiDelete']);

