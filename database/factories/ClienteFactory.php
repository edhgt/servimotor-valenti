<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'dpi' => fake()->numerify('#############'),
            'nit' => fake()->numerify('########'),
            'telefono' => fake()->phoneNumber(),
            'correo' => fake()->email(),
            'direccion' => fake()->address(),
        ];
    }
}
