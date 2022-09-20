<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
     protected $fillable = [
        "codigo_student",
        "nombre",
        "apellido",
        "email",
        "escolaridad",
        "foto_perfil",
        "password",
        "codigo_votacion",
        "codigo_status",
        "id_grado"
     ];
         /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
      'password',

  ];
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
      'profile_photo_url',
  ];
  public function adminlte_image(){
      return 'https://picsum.photos/300/300';
  }
  public function adminlte_desc(){
      return 'administrador';
  }
  public function adminlte_profile_url(){
      return 'profile/username';
  }
}
