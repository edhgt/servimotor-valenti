<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->constrained();
            $table->foreignId('modelo_id')->constrained();
            $table->foreignId('color_id')->constrained('colores');
            $table->foreignId('tipo_vehiculo_id')->constrained('tipos_vehiculo');
            $table->foreignId('tipo_motor_id')->constrained('tipos_motor');
            $table->foreignId('tipo_transmision_id')->constrained('tipos_transmision');
            $table->foreignId('cliente_id')->constrained();
            $table->string('vin')->nullable();
            $table->string('placa')->unique();
            $table->integer('anio');
            $table->integer('kilometraje_actual');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
