<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Destino extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    //
    protected $fillable = [
        'nombreCiudad',
        'nombreAsignatura',
        'nombreUniversidad',
        'especialidad',
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'destino_id');
    }

}
