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
        $ListaCiudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Granada', 'Zaragoza', 'Bilbao', 'Málaga', 'Valladolid', 'Salamanca', 'Alicante', 'Córdoba', 'Oviedo', 'Santander', 'Murcia', 'Burgos', 'León', 'Santiago de Compostela', 'Pamplona', 'San Sebastián'];
        $ciudad=$this->faker->randomElement($ListaCiudades);
        $planconv=['1 cuatrimestre', 'Curso completo'];
        return [
            //
            'nombreCiudad' => $ciudad,
            'nombreUniversidad' => 'Universidad de ' . $ciudad,
            'especialidad' => $this->faker->name(),
            'plan' => $this->faker->randomElement($planconv),
        ];
    }
}
