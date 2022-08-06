<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directivas extends Model
{
    use HasFactory;
     protected $fillable = ['nombres', 'apellidos','votos','Grado','seccion','puesto', 'imagen'];
}
