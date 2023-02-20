<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
    protected $fillable = [
        'nombre_buscado', 'porcentaje_buscado', 'estado_ejecucion',
    ];

    protected $casts = [
        'estado_ejecucion' => 'array'
    ];
}
