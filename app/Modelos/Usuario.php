<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    public $timestamps = true;
    protected $fillable = ['id','correo','usuario','contrasenia','descripcion','nombres','apellidos','fecha_nacimiento','sexo','imagen'];

    public function publicaciones()
        {
            return $this->hasMany(App\Modelos\Publicaciones::class, 'usuario_id', 'id');
        }
}
