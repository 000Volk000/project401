<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitud::where('status', 'pendiente')->get();
        return view('solicitud', compact('solicitudes'));
    }




    public function solicitudesAprobadas(){
        // Get only the solicitudes that have 'aprobada' status
        $solicitudes = Solicitud::where('status', 'aprobada')->get();

        // Pass the solicitudes to the view
        return view('aprobadas', compact('solicitudes'));
    }

    // Método para aprobar una solicitud
    public function aprobar($id)
    {
        // Iniciar una transacción para asegurar que ambos cambios se realicen correctamente
        DB::beginTransaction();

        try {
            // Aprobar la solicitud seleccionada
            $solicitud = Solicitud::findOrFail($id);
            $solicitud->status = 'Aprobada';
            $solicitud->save();

            // Cambiar el estado de todas las demás solicitudes a 'Rechazada' para el mismo usuario
            Solicitud::where('user_id', $solicitud->user_id)
                ->where('id', '!=', $id)
                ->update(['status' => 'Rechazada']);
            Solicitud::where('destino_id', $solicitud->destino_id)
                ->where('rol', '==', $solicitud->rol)
                ->update(['status' => 'Rechazada']);

            // Confirmar los cambios
            DB::commit();

            return redirect()->route('solicitud')->with('success', 'Solicitud aprobada y las demás rechazadas.');

        } catch (\Exception $e) {
            // Si ocurre un error, revertir la transacción
            DB::rollBack();
            return redirect()->route('solicitud')->with('error', 'Ocurrió un error al procesar la solicitud.');
        }
    }


    public function store($destinoId)
    {
        $userId = Auth::id();
        $rol = DB::table('users')->where('id', $userId)->value('rol');

        // Step 1: Get the highest preference order for the user and increment it
        $lastPreferenceOrder = Solicitud::where('user_id', $userId)
            ->where('status', 'pendiente') // Only consider pending solicitudes
            ->max('preference_order'); // Get the last preference order

        // Step 2: Set the new preference order (increment by 1)
        $newPreferenceOrder = $lastPreferenceOrder + 1;

        // Step 3: Create the new solicitud with the next available preference order
        $solicitud = Solicitud::create([
            'user_id' => $userId,
            'destino_id' => $destinoId,
            'status' => 'pendiente',
            'rol' => $rol,
            'preference_order' => $newPreferenceOrder,
        ]);

        if ($solicitud) {
            // Step 4: Reorder all the 'pendiente' solicitudes for the user
            $this->reorderSolicitudes($userId);

            return redirect()->route('estudiante')->with('status', 'Solicitud creada');
        }

        return redirect()->route('estudiante')->with('error', 'Error al crear solicitud');
    }

    // Cancel the solicitud
    public function cancelarSolicitud($destinoId)
    {
        $userId = Auth::id();

        // Get the solicitud for the given destino and user
        $solicitud = Solicitud::where('user_id', $userId)
            ->where('destino_id', $destinoId)
            ->first();

        if ($solicitud) {
            // Step 1: Change the status to 'cancelado' and set preference_order to 0
            $solicitud->update([
                'status' => 'cancelado',
                'preference_order' => 0,
            ]);

            // Step 2: Reorder the remaining solicitudes (only pendiente status)
            $this->reorderSolicitudes($userId);

            return redirect()->route('estudiante')->with('status', 'Solicitud cancelada');
        }

        return redirect()->route('estudiante')->with('error', 'Solicitud no encontrada');
    }

    // Helper function to reorder 'pendiente' solicitudes for the user
    private function reorderSolicitudes($userId)
    {
        // Get all solicitudes with 'pendiente' status, sorted by preference_order
        $pendientes = Solicitud::where('user_id', $userId)
            ->where('status', 'pendiente')
            ->orderBy('preference_order', 'asc') // Order by current preference_order
            ->get();

        // Reassign preference_order starting from 1
        foreach ($pendientes as $index => $solicitud) {
            $solicitud->update([
                'preference_order' => $index + 1, // Reorder starting from 1
            ]);
        }
    }

    public function renovarSolicitud($destinoId)
    {
        $userId = Auth::id();

        // Find the canceled solicitud for the destination
        $solicitud = Solicitud::where('user_id', $userId)
            ->where('destino_id', $destinoId)
            ->where('status', 'cancelado')
            ->first();

        if ($solicitud) {
            // Renew the solicitud, setting the status back to 'pendiente' and assigning a new preference order
            $newPreferenceOrder = Solicitud::where('user_id', $userId)->max('preference_order') + 1;
            $solicitud->update([
                'status' => 'pendiente',
                'preference_order' => $newPreferenceOrder
            ]);

            return redirect()->route('estudiante')->with('status', 'Solicitud renovada');
        }

        return redirect()->route('estudiante')->with('error', 'No se pudo renovar la solicitud');
    }



}
