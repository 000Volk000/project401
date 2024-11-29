<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DestinoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $asignaturas = ['Estructura de Datos', 'Introducción a la Programación', 'Física', 'Cálculo', 'Álgebra'];
        $ciudad = $this->faker->city();
        return [
            //
            'nombreCiudad' => $ciudad,
            'nombreAsignatura' => $this->faker->randomElement($asignaturas),
            'nombreUniversidad' => 'Universidad de ' . $ciudad,
            'especialidad' => $this->faker->name(),
        ];
    }
}
