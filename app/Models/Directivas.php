<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directivas extends Model
{
    use HasFactory;
     protected $fillable = [
        'id',
        'nombres', 
        'apellidos',
        'votos',
        'Grado',
        'seccion',
        'puesto', 
        'imagen', 
        'foto_perfil',
        "codigo_student",
        "nombre",
        "apellido",
        "email",
        "escolaridad",
        "foto_perfil",
        "password",
        "codigo_votacion",
        "codigo_status",
        "id_grado",
    ];
}
