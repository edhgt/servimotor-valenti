<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

use App\Models\Cliente;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\TipoMotor;
use App\Models\TipoTransmision;
use App\Models\TipoVehiculo;
use App\Models\User;
use App\Models\Vehiculo;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            // User::factory(10)->create();
    
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

            Marca::factory(random_int(1, 50))->create();
            Modelo::factory(random_int(1, 50))->create();
            Color::factory(random_int(1, 50))->create();
            TipoVehiculo::factory(5)->create();
            TipoMotor::factory(5)->create();
            TipoTransmision::factory()->create();

            Cliente::factory(random_int(1, 50))
                ->has(Vehiculo::factory()->count(2))
                ->create();
        }


        $this->call([
            UserAdminSeeder::class,
            SucursalSeeder::class,
        ]);
    }
}
