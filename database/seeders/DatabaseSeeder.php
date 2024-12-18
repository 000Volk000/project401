<?php

namespace Database\Seeders;

use App\Models\Destino;
use App\Models\User;
use App\Models\Asignatura;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@uco.es',
            'password' => '1234',
            'especialidad' => 'Informática',
            'rol' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Arturo',
            'email' => 'arturo@uco.es',
            'password' => '1234',
            'especialidad' => 'Informática',
            'rol' => 'profesor',
        ]);

        User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@uco.es',
            'password' => '1234',
            'especialidad' => 'Informática',
            'rol' => 'estudiante',
        ]);


        Destino::factory(10)->create([
            'especialidad' => 'Informatica',
        ]);

        Asignatura::factory(50)->create();

    }
}
