<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DestinosController extends Controller
{
    //
    public function index(){
        $destinos = Destino::all();
        return view('welcome', ['destinos' => $destinos]);
    }
    public function show($id){
        $destino = DB::table('destinos')->where('id', $id)->first();
        return view('show', ['destino' => $destino]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $destino = new Destino($request);
        $destino->save();

        return Redirect::route('destinos.admin')
            ->with('success', 'Destino creado correctamente.');
    }
    public function edit($id){
        $destino = DB::table('destinos')->where('id', $id)->first();
        return view('edit', ['destino' => $destino]);
    }
    public function delete($id){
        $destino = DB::table('destinos')->where('id', $id)->delete();
        $destinos = Destino::all();

        return Redirect::route('destinos.admin')
            ->with('success', 'Destino deleted successfully');
    }
}
