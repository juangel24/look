<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tmegusta;

use App\Modelos\Usuario;
class Tfotos extends Model
{

    Protected $primaryKey='id';
    Protected $table='publicaciones';
    // 
    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
        }
    
    
}
