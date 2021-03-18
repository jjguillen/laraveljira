<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Localizacion;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::where('codigo', 'LIKE', "%$request->buscar%")
            ->orWhere('modelo', 'LIKE', "%$request->buscar%")
            ->paginate(5);
        Log::info('Muestra la vista de los productos buscados');
        return view('producto.listado', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Redireccion a la plantilla producto.nuevo pasandole todas las localizaciones y categorias');
        return view('producto.nuevo', ['localizaciones' => Localizacion::all(), 'categorias' => Categoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'modelo' => 'required',
            'fabricante' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required',
            'estado' => 'required',
            'localizacion' => 'required',
            'categoria' => 'required'
        ]);
        Log::info('Validacion del request de producto');

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $filenameToStore = 'procucto_ ' . $request->codigo . '.' . $extension;
            $request->file('imagen')->storeAs('public/imagenes_productos', $filenameToStore);
            Log::info('Comprueba el archivo imagen y la sube a la carpeta imagenes_productos');
        }

        Producto::create([
            'codigo' => $request->codigo,
            'modelo' => $request->modelo,
            'fabricante' => $request->fabricante,
            'descripcion' => $request->descripcion,
            'imagen' => $filenameToStore ?? null,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'localizacion_id' => $request->localizacion,
            'categoria_id' => $request->categoria,
        ]);
            Log::notice('Creacion del nuevo producto correctamente');
        return redirect(url('/admin/productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        Log::info('Redireccion a la plantilla producto.detalle');
        return view('producto.detalle', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        Log::info('Redireccion a la plantilla producto.editar pasandole el producto y todas las localizaciones');
        return view('producto.editar', ['producto' => $producto, 'localizaciones' => Localizacion::all(), 'categorias' => Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'modelo' => 'required',
            'fabricante' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required',
            'estado' => 'required',
            'localizacion' => 'required'
        ]);
        Log::info('Validacion del request de producto');


        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $filenameToStore = 'procucto_ ' . $request->codigo . '.' . $extension;
            $request->file('imagen')->storeAs('public/imagenes_productos', $filenameToStore);
            Log::info('Comprueba el archivo imagen y la sube a la carpeta imagenes_productos');
        }

        $producto->update([
            'codigo' => $request->codigo,
            'modelo' => $request->modelo,
            'fabricante' => $request->fabricante,
            'descripcion' => $request->descripcion,
            'imagen' => $filenameToStore ?? null,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'localizacion' => $request->localizacion
        ]);
        Log::notice('Actualizacion del producto correctamente');


        return redirect(url('admin/productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        Log::notice('Borrado el producto correctamente');
        return redirect(url('admin/productos'));
    }

    /**
     * Generate and stream a PDF file with specified resources.
     * After it is generated, the user decides if download it or not.
     */
    public function createPDF()
    {
        $data = Producto::paginate(50);

        // los 'productos' son los datos que se pasan a la vista 'producto.inventario_pdf'
        view()->share('productos', $data);

        // se crea el fichero
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('producto.inventario_pdf', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);
        Log::notice('Creacion del PDF del producto correctamente');

        return $pdf->stream();
    }
}
