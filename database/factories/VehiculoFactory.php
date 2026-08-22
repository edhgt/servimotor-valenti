<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Provider\FakeCar;

use App\Models\Cliente;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\TipoMotor;
use App\Models\TipoTransmision;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;

/**
 * @extends Factory<Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new FakeCar($this->faker));

        return [
            'marca_id' => Marca::inRandomOrder()->first()->id,
            'modelo_id' => Modelo::inRandomOrder()->first()->id,
            'color_id' => Color::inRandomOrder()->first()->id,
            'tipo_vehiculo_id' => TipoVehiculo::inRandomOrder()->first()->id,
            'tipo_motor_id' => TipoMotor::inRandomOrder()->first()->id,
            'tipo_transmision_id' => TipoTransmision::inRandomOrder()->first()->id,
            'cliente_id' => Cliente::factory(),
            'vin' => fake()->vin(),
            'placa' => fake()->vehicleRegistration(),
            'anio' => fake()->biasedNumberBetween(1990, date('Y'), 'sqrt'),
            'kilometraje_actual' => fake()->randomFloat(1000, 100000)
        ];
    }
}
