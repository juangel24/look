<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tfotos;
use App\Modelos\Usuario;
class mmegusta extends Model
{
    // 

    Protected $primaryKey='id';
    Protected $table='megusta';
    public $timestamps=false;
 
    //
    

    public function megusta()
    {
        return $this->belongsTo(Tfotos::class, 'publicacion_id', 'id');
    }

    public function megusta1()
    {
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }

}
