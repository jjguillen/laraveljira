<?php
namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Http\Resources\LocalizacionResource;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Localizacion;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
class ApiController extends BaseController

{
    public function paginate_localilizacion(){
        $localizacion=Localizacion::paginate(10);
        return $this->sendResponse(LocalizacionResource::collection($localizacion));
    }
    public function paginate_producto(){
        $producto=Producto::paginate(10);
        return $this->sendResponse(ProductoResource::collection($producto));
    }
    public function all_producto(){
        $producto=Producto::all();
        return $this->sendResponse(ProductoResource::collection($producto));
    }
    public function paginate_categoria(){
        $categoria=Categoria::paginate(10);
        return $this->sendResponse(CategoriaResource::collection($categoria));
    }


    public function producto_store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
        'codigo'=>"required",
        'modelo'=>"required",
        'fabricante'=>"required",
        'descripcion'=>"required",
        'imagen',
        'stock'=>"required",
        'estado'=>"required",
        'localizacion_id'=>"required",
        'categoria_id'=>"required"
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product = Producto::create($input);
        return $this->sendResponse(new ProductoResource($product), 'Producto created successfully.');
    }

    public function localizacion_store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ciudad'=>"required",
            'nombre_edificio'=>"required",
            'direccion_edificio'=>"required",
            'numero_sala'=>"required"
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $localizacion = Localizacion::create($input);
        return $this->sendResponse(new LocalizacionResource($localizacion), 'Localizacion created successfully.');
    }
    public function categoria_store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre'=>"required"
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $categoria = Categoria::create($input);
        return $this->sendResponse(new CategoriaResource($categoria), 'Categoria created successfully.');
    }

    public function show_product_codigo($codigo)
    {
        $product = Producto::where("codigo",$codigo)->get();
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse(new ProductoResource($product), 'Producto retrieved successfully.');
    }

    public function show_product_categoria(Categoria $categoria)
    {
        $product = Producto::where("id",$categoria->id)->get();
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse(new ProductoResource($product), 'Producto retrieved successfully.');
    }




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
                return $this->sendResponse([], 'Producto deleted successfully.');
    }



}
