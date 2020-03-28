<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    public $timestamps = false;
    //protected $fillable = ['id','correo','contrasenia','nombres','apellidos','fecha_nacimiento','sexo','privado','iamgen'];
}
