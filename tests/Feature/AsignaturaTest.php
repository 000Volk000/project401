<?php

namespace Tests\Feature;
use App\Models\Asignatura;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AsignaturaTest extends TestCase{
    use DatabaseTransactions;
    public function test_create_asignatura(): void{
        $this->withoutMiddleware();
        Auth::loginUsingId(1);
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
            'idCiudad' => '1', // Ensure the correct foreign key is set
        ]);
    }

    public function test_update_asignatura(): void{
        $this->withoutMiddleware();
        Auth::loginUsingId(1);
        $data = [
            'nombre' => 'Matematica',
            'idCiudad' => '1',  // Assuming idCiudad is the foreign key to Destino
        ];
        $this->post('asignatura.store', $data);
        $data = [
            'nombre' => 'Arquitectura',
            'idCiudad' => '2',  // Assuming idCiudad is the foreign key to Destino
        ];
        $id = DB::table('asignaturas')->insertGetId(['nombre' => 'Matematica', 'idCiudad' => '1']);
        $response = $this->patch('/asignaturas/' . $id, $data);
        $this->assertDatabaseHas('asignaturas', [
            'nombre' => 'Arquitectura',
            'idCiudad' => '2', // Ensure the correct foreign key is set
        ]);
    }

    public function test_delete_asignatura(): void{
        $this->withoutMiddleware();
        Auth::loginUsingId(1);
        $data = [
            'nombre' => 'Matematica',
            'idCiudad' => 1,
        ];
        $this->post('asignatura.store', $data);
        $id = DB::table('asignaturas')->insertGetId(['nombre' => 'Matematica', 'idCiudad' => '1']);
        $response = $this->delete('/asignaturas/' . $id);
        $this->assertDatabaseMissing('asignaturas', [
            'id' => $id,
            'nombre' => 'Matematica',
            'idCiudad' => 1,
        ]);
    }
}
