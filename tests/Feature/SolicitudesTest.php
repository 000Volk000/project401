<?php

namespace Tests\Feature;

use App\Models\Destino;
use App\Models\Solicitud;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SolicitudesTest extends TestCase
{
    use DatabaseTransactions;
    public function test_request(): void
    {
        $this->withoutMiddleware();
        //Create a new university destination to request on
        $destino = [
            'nombreCiudad' => 'Test_1',
            'nombreUniversidad' => 'Universidad de Test_1',
            'especialidad' => 'informatica',
            'plan' => '1 cuatrimestre'
        ];
        $this->post('/storeDest', $destino);
        //Get the id of the created destination
        $destinoId = Destino::where('nombreCiudad', 'Test_1')->first()->id;
        //Simulate the login of the user admin
        Auth::loginUsingId(1);
        //Request the destination
        $this->get('/solicitud/' . $destinoId);
        //Check if the request is on the database
        $this->assertDatabaseHas('solicitudes', ['destino_id' => $destinoId, 'status' => 'pendiente']);
    }

    public function test_modify_status()
    {
        $this->withoutMiddleware();
        //Create a new university destination to request on
        $destino = [
            'nombreCiudad' => 'Test_1',
            'nombreUniversidad' => 'Universidad de Test_1',
            'especialidad' => 'informatica',
            'plan' => '1 cuatrimestre'
        ];
        $this->post('/storeDest', $destino);
        $destinoId = Destino::where('nombreCiudad', 'Test_1')->first()->id;
        //Simulate the login of estudiant
        Auth::loginUsingId(3);
        //Request the destination
        $this->get('/solicitud/' . $destinoId);
        //Get the id of the created request
        $solicitudId = Solicitud::where('destino_id', $destinoId)->first()->id;
        //Simulate that the user with id 3, cancels the request
        $this->post('/cancelarSolicitud/' . $destinoId);
        //Check if the request is on the database
        $this->assertDatabaseHas('solicitudes', ['id' => $solicitudId, 'status' => 'cancelado']);
        //Simulate that the user with id 3, renews the request
        $this->post('/solicitudes/renovar/' . $destinoId);
        //Check if the request is on the database
        $this->assertDatabaseHas('solicitudes', ['id' => $solicitudId, 'status' => 'pendiente']);
        //Simulate the login of the user admin
        Auth::loginUsingId(1);
        //Simulate that the admin approves the request
        $this->post('/solicitudes/aprobar/' . $solicitudId);
        //Check if the request is on the database
        $this->assertDatabaseHas('solicitudes', ['id' => $solicitudId, 'status' => 'aprobada']);
    }
}
