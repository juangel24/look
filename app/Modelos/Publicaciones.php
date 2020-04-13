<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'publicaciones';
    public $timestamps = true;
    protected $fillable = ['id','usuario_id','imagen','descripcion'];
    
    public function usuario(){
        return $this->belongsTo(App\Modelos\Usuario::class,'usuario_id','id');
    }
    /*public function comentarios()
        {
            return $this->hasMany(App\Modelos\Comentarios::class);
        }*/
    public function likes(){
        return $this->hasMany(App\Modelos\Megusta::class,'publicacion_id','id');
    }
  
}
