<?php

namespace Tests\Feature;

use App\Models\Destino;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestinosTest extends TestCase
{
    public function test_create(): void
    {
        $this->withoutMiddleware();
        //Data to insert on the database destinos
        $datos1 = [
            'nombreCiudad' => 'Test_1',
            'nombreUniversidad' => 'Universidad de Test_1',
            'especialidad' => 'informatica',
            'plan' => '1 cuatrimestre'
        ];
        //Save the data on the database
        $create1 = $this->post('/storeDest', $datos1);
        //Check if redirects to the main page
        $create1->assertRedirect('/');
        //Check if the data is on the database
        $this->assertDatabaseHas('destinos', $datos1);

        //Data to insert on the database destinos
        $datos2 = [
            'nombreCiudad' => 'Test_2',
            'nombreUniversidad' => 'Universidad de Test_2',
            'especialidad' => 'informatica',
            'plan' => '1 cuatrimestre'
        ];
        //Save the data on the database
        $create2 = $this->post('/storeDest', $datos2);
        //Check if redirects to the main page
        $create2->assertRedirect('/');
        //Check if the data is on the database
        $this->assertDatabaseHas('destinos', $datos2);
    }

    public function test_modify()
    {
        $this->withoutMiddleware();
        //Data of the current destination to modify, we will modify the first that we created in the previous test
        $datos1 = Destino::where('nombreCiudad', 'Test_1')->first();
        //Data to modify the destination
        $datos1->nombreCiudad = 'Test_1_Modified';
        $datos1->nombreUniversidad = 'Universidad de Test_1_Modified';
        //Save the data on the database
        $modify1 = $this->put('/ModDest/' . $datos1->id, $datos1->toArray());
        //Check if redirects to the main page
        $modify1->assertRedirect('/');
        //Check if the data modified is on the database
        $this->assertDatabaseHas('destinos', ['id' => $datos1->id,
            'nombreCiudad' => $datos1->nombreCiudad,
            'nombreUniversidad' => $datos1->nombreUniversidad,
            'especialidad' => $datos1->especialidad,
            'plan' => $datos1->plan]);

        //Data of the current destination to modify, we will modify the second that we created in the previous test
        $datos2 = Destino::where('nombreCiudad', 'Test_2')->first();
        //Data to modify the destination
        $datos2->nombreCiudad = 'Test_2_Modified';
        $datos2->nombreUniversidad = 'Universidad de Test_2_Modified';
        //Save the data on the database
        $modify2 = $this->put('/ModDest/' . $datos2->id, $datos2->toArray());
        //Check if redirects to the main page
        $modify2->assertRedirect('/');
        //Check if the data modified is on the database
        $this->assertDatabaseHas('destinos', ['id' => $datos2->id,
            'nombreCiudad' => $datos2->nombreCiudad,
            'nombreUniversidad' => $datos2->nombreUniversidad,
            'especialidad' => $datos2->especialidad,
            'plan' => $datos2->plan]);
    }

    public function test_delete()
    {
        $this->withoutMiddleware();
        //Select the first destination created in the previous tests
        $datos1 = Destino::where('nombreCiudad', 'Test_1_Modified')->first();
        //Delete the destination
        $delete1 = $this->get('/delete/' . $datos1->id);
        //Check if redirects to the main page
        $delete1->assertRedirect('/');
        //Check if the data is not on the database
        $this->assertDatabaseMissing('destinos', ['id' => $datos1->id,
            'nombreCiudad' => $datos1->nombreCiudad,
            'nombreUniversidad' => $datos1->nombreUniversidad,
            'especialidad' => $datos1->especialidad,
            'plan' => $datos1->plan]);

        //Select the second destination created in the previous tests
        $datos2 = Destino::where('nombreCiudad', 'Test_2_Modified')->first();
        //Delete the destination
        $delete2 = $this->get('/delete/' . $datos2->id);
        //Check if redirects to the main page
        $delete2->assertRedirect('/');
        //Check if the data is not on the database
        $this->assertDatabaseMissing('destinos', ['id' => $datos2->id,
            'nombreCiudad' => $datos2->nombreCiudad,
            'nombreUniversidad' => $datos2->nombreUniversidad,
            'especialidad' => $datos2->especialidad,
            'plan' => $datos2->plan]);
    }
}
