<?php

namespace Database\Factories;

use App\Models\TipoVehiculo;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TipoVehiculo>
 */
class TipoVehiculoFactory extends Factory
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
            'nombre' => fake()->unique()->vehicle()
        ];
    }
}
