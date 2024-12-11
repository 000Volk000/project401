<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 *
 * @property $id
 * @property $nombre
 * @property $idCiudad
 * @property $created_at
 * @property $updated_at
 *
 * @property Destino $destino
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asignatura extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'idCiudad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destino()
    {
        return $this->belongsTo(\App\Models\Destino::class, 'idCiudad', 'id');
    }
    
}
