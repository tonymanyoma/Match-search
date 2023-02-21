<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diccionario extends Model
{
    protected $fillable = [
        'departamento', 'localidad', 'municipio','nombre','anos_activo', 'tipo_persona', 'tipo_cargo'
    ];
}
