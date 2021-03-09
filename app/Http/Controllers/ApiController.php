<?php
namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Localizacion;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\CategoriaController;
class ApiController extends Controller
{
    public function api_add_producto(Request $request)
    {
        $producto = new Producto;
        $producto->codigo = $request->codigo;
        $producto->modelo = $request->modelo;
        $producto->fabricante = $request->fabricante;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $filenameToStore ?? null;
        $producto->stock = $request->stock;
        $producto->save();

        //En lugar de devolver una vista, devuelvo si se ha realizado la acción
        return response(['producto' => new ProductoResource($producto),
                             'message' => 'Created successfully'], 201);
    }
    public function api_delete_producto_por_codigo(Producto $producto)
    {
                $this->authorize('delete', $producto);
                $producto->delete();
                return response(['message' => 'Deleted successfully'], 201);

    }



}
