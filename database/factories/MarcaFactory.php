<?php

namespace Database\Factories;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Provider\FakeCar;

/**
 * @extends Factory<Marca>
 */
class MarcaFactory extends Factory
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
            'nombre' => fake()->unique()->vehicleBrand()
        ];
    }
}
