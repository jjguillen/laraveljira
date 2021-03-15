<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalizacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ciudad'=>$this->ciudad,
            'nombre_edificio'=> $this->nombre_edificio,
            'direccion_edificio'=>$this->direccion_edificio,
            'numero_sala'=>$this->numero_sala,
        ];
    }
}
