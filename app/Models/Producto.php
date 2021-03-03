<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'model',
        'fabricante',
        'descripcion',
        'imagen',
        'stock',
        'estado',
        'localizacion_id',
        'categoria_id'
    ];

    public function localizacion(){
        return $this->belongsTo(Localizacion::class);;
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);;
    }
}
