<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'nombre_completo' => trim("{$this->nombres} {$this->apellidos}"),
            'dpi' => $this->dpi,
            'nit' => $this->nit,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'vehiculos_count' => $this->whenCounted('vehiculos'),
            'vehiculos' => VehiculoResource::collection($this->whenLoaded('vehiculos')),
        ];
    }
}
