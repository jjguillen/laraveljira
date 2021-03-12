<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Localizacion;

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
        return view('producto.listado', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $filenameToStore = 'procucto_ ' . $request->codigo . '.' . $extension;

            $request->file('imagen')->storeAs('public/imagenes_productos', $filenameToStore);
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
        return view('producto.detalle', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
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

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $filenameToStore = 'procucto_ ' . $request->codigo . '.' . $extension;

            $request->file('imagen')->storeAs('public/imagenes_productos', $filenameToStore);
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
        return redirect(url('admin/productos'));
    }
}
