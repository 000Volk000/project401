<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
{

    public function index(){
        $userId = Auth::id();

        // Fetch all destinations and join with the solicitudes table to get the request status and preference_order
        $destinos = Destino::leftJoin('solicitudes', function($join) use ($userId) {
            $join->on('destinos.id', '=', 'solicitudes.destino_id')
                ->where('solicitudes.user_id', '=', $userId);
        })
            ->select('destinos.*', 'solicitudes.status as solicitud_status', 'solicitudes.preference_order') // Include preference_order in the select
            ->get();

        // Check if there are any approved solicitudes for the user
        $solicitudesAprobadas = Solicitud::where('user_id', $userId)
            ->where('status', 'aprobada')
            ->exists();

        // Pass the destinos and solicitudesAprobadas flag to the view
        return view('profesor', compact('destinos', 'solicitudesAprobadas'));
    }
}
