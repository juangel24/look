<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $primaryKey = 'id'; 
    protected $table = 'comentarios';
    public $timestamps = true;
    protected $fillable = ['id','usuario_id','publicacion_id'];
    
    public function usuario(){
    return $this->belongsTo(App\Modelos\Usuario::class,'usuario_id','id');
    }
    public function publicaciones(){
        return $this->belongsTo(App\Modelos\Publicaciones::class,'publicacion_id','id');
        }
}