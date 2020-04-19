<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Usuario;
class TComentarios extends Model
{
    Protected $primaryKey='id';
    Protected $table='comentarios';
    //

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
        }
    
} 
