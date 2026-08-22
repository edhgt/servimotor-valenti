<?php

namespace Database\Factories;

use App\Models\TipoMotor;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TipoMotor>
 */
class TipoMotorFactory extends Factory
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
            'nombre' => fake()->unique()->vehicleFuelType()
        ];
    }
}
