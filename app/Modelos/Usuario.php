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
    public function seguidores(){
        return $this->hasMany(App\Modelos\Seguidores::class);
    }
    public function seguidos(){
        return $this->hasMany(App\Modelos\Seguidores::class);
    }
    
    /*public function followers()
    {
        return $this->belongsToMany(Usuario::class, 'seguidores', 'usuario_id', 'seguidor_id');
    }
    public function followings()
    {
        return $this->belongsToMany(Usuario::class, 'seguidores', 'seguidor_id', 'usuario_id');
    }*/
}
