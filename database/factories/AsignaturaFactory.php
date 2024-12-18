<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $asignaturas = ['Estructura de Datos', 'Introducción a la Programación', 'Física', 'Cálculo', 'Álgebra'];
        return [
            //
            'nombre' => $this->faker->randomElement($asignaturas),
            'idCiudad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
