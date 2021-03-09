<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
           "codigo"=>$this->codigo,
           "modelo"=>$this->modelo,
           "fabricante"=>$this->fabricante,
           "descripcion"=>$this->descripcion,
           "imagen"=>$this->imagen,
           "stock"=>$this->stock,
           "estado"=>$this->estado,
           "localizacion_id"=>$this->localizacion_id,
           "categoria_id"=>$this->categoria_id
        ];
    }
}
