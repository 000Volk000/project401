<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DestinosRequest;

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
        $destinosel = new Destino();
        $destinos=Destino::all();
        return view('destino.create',compact(['destinos','destinosel']));
    }
    public function store(DestinosRequest $request){
        $destino = $request->validated();
        $destino = new Destino();
        $destino->nombreCiudad= $request->nombreCiudad;
        $destino->nombreUniversidad= $request->nombreUniversidad;
        $destino->especialidad= $request->especialidad;
        $destino->plan=$request->plan;
        $destino->save();
        return redirect('/')->with('success', 'Destino created successfully.');
    }
    public function edit($id){
        $destinosel=Destino::find($id);
        $destinos=Destino::all();
        return view('destino.edit',compact(['destinosel','destinos']));
    }

    public function update(DestinosRequest $request,$id){
        $destino = $request->validated();
        $destino=Destino::find($id);
        $destino->nombreCiudad= $request->nombreCiudad;
        $destino->nombreUniversidad= $request->nombreUniversidad;
        $destino->especialidad= $request->especialidad;
        $destino->plan=$request->plan;
        $destino->save();
        return redirect('/')->with('success', 'Destino modified successfully.');
    }
    public function delete($id){
        $destino = DB::table('destinos')->where('id', $id)->delete();
        $destinos = Destino::all();

        return Redirect::route('destinos.admin')
            ->with('success', 'Destino deleted successfully');
    }
}
