<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $fillable = ['user_id', 'destino_id', 'status', 'preference_order'];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con Destino
    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id');
    }
}
