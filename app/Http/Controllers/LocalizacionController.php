<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info('Muestra la lista de localizaciones');
        $localizaciones = Localizacion::where('ciudad', 'LIKE', "%$request->buscar%")
            ->orWhere('nombre_edificio', 'LIKE', "%$request->buscar%")
            ->paginate(5);
        return view('localizacion.listado', ['localizaciones' => $localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Redireccion a la vista localizacion.nuevo');
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
        Log::notice('Añadido una nueva localizacion correctamente');

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
        Log::info('Redireccion a la vista localizacion.detalle pasandole la localizacion');
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
        Log::info('Redireccion a la vista localizacion.editar pasandole la localizacion pasandole la localizacion');
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
        Log::info('Verificacion del Request');

        $localizacion->ciudad = $request->ciudad;
        $localizacion->nombre_edificio = $request->nombre_edificio;
        $localizacion->direccion_edificio = $request->direccion_edificio;
        $localizacion->numero_sala = $request->numero_sala;
        $localizacion->save();
        Log::notice('Actualizacion de la localizacion correcta');

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
        Log::notice('Eliminado correctamente la localizacion');
        return redirect()->action([LocalizacionController::class, 'index']);
    }
}
