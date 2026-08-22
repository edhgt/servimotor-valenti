<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'marca_id',
        'modelo_id',
        'color_id',
        'tipo_vehiculo_id',
        'tipo_motor_id',
        'tipo_transmision_id',
        'cliente_id',
        'vin',
        'placa',
        'anio',
        'kilometraje_actual',
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function tipoVehiculo(): BelongsTo
    {
        return $this->belongsTo(TipoVehiculo::class);
    }

    public function tipoMotor(): BelongsTo
    {
        return $this->belongsTo(TipoMotor::class);
    }

    public function tipoTransmision(): BelongsTo
    {
        return $this->belongsTo(TipoTransmision::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
