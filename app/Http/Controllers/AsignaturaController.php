<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignaturaController extends Controller
{

    public function index($id){
        $asignaturas = DB::table('asignaturas')->where('idCiudad', $id)->get();
        $universidad = DB::table('destinos')->where('id', $id)->get()->first();
        return view('asignatura', ['asignaturas' => $asignaturas, 'universidad' => $universidad]);


    }
}
