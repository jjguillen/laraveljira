<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos', [
            'productos' => Producto::all()
        ]);
    }

    public function localizacion()
    {
        return $this->belongsTo(Localizacion::class, 'index');
    }
}
