<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMotor extends Model
{
    /** @use HasFactory<\Database\Factories\TipoMotorFactory> */
    use HasFactory;

    protected $table = 'tipos_motor';

    protected $fillable = ['nombre'];
}
