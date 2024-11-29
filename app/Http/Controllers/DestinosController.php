<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\User;
use Illuminate\Http\Request;

class DestinosController extends Controller
{
    //
    public function index(){
        $destinos = Destino::all();
        return view('welcome', ['destinos' => $destinos]);
    }
}
