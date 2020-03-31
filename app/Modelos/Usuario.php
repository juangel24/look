<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    public $timestamps = true;
    protected $fillable = ['id','correo','contrasenia','nombres','apellidos','fecha_nacimiento','sexo','imagen'];

}
