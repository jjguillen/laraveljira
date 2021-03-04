<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('localizacion.listado', ['localizaciones' => Localizacion::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localizacion.nuevo');
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
            'ciudad' => 'required',
            'nombre_edificio' => 'required',
            'direccion_edificio' => 'required',
            'numero_sala' => 'required|numeric|min:0',
        ]);

        $localizacion = new Localizacion;
        $localizacion->ciudad = $request->ciudad;
        $localizacion->nombre_edificio = $request->nombre_edificio;
        $localizacion->direccion_edificio = $request->direccion_edificio;
        $localizacion->numero_sala = $request->numero_sala;
        $localizacion->save();

        return redirect()->action([LocalizacionController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Localizacion $localizacion)
    {
        return view('localizacion.detalle', ['localizacion' => $localizacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Localizacion $localizacion)
    {
        return view('localizacion.editar', ['localizacion' => $localizacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizacion $localizacion)
    {
        $validated = $request->validate([
            'ciudad' => 'required',
            'nombre_edificio' => 'required',
            'direccion_edificio' => 'required',
            'numero_sala' => 'required|numeric|min:0',
        ]);

        $localizacion->ciudad = $request->ciudad;
        $localizacion->nombre_edificio = $request->nombre_edificio;
        $localizacion->direccion_edificio = $request->direccion_edificio;
        $localizacion->numero_sala = $request->numero_sala;
        $localizacion->save();

        return redirect()->action([LocalizacionController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localizacion $localizacion)
    {
        $localizacion->delete();
        return redirect()->action([LocalizacionController::class, 'index']);
    }
}
