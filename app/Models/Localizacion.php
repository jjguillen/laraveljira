<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    use HasFactory;

    protected $table = 'localizaciones';

    protected $fillable = [
        'ciudad',
        'nombre_edificio',
        'direccion_edificio',
        'numero_sala'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
