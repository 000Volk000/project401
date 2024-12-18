<?php

namespace Tests\Feature;

use App\Models\Destino;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AsignaturaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_asignatura(): void
    {

        // Data to create the asignatura (including idCiudad as a foreign key)
        $data = [
            'nombre' => 'Matematica',
            'idCiudad' => '1',  // Assuming idCiudad is the foreign key to Destino
        ];

        // Send a POST request to create the asignatura
        $response = $this->post(route('asignaturas.store'), $data);

        // Assert that the response redirects to the 'asignaturas.index' route
        $response->assertRedirect(route('asignaturas.index'));

        // Assert that the asignatura is in the database
        $this->assertDatabaseHas('asignaturas', [
            'nombre' => 'Matematica',
            'idCiudad' => '1',  // Ensure the correct foreign key is set
        ]);
    }
}
