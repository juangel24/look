<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tfotos;
class Tmegusta extends Model
{

    Protected $primaryKey='id';
    Protected $table='megusta';
    public $timestamps=false;

    //
    

    public function megusta()
    {
        return $this->belongsTo(Tfotos::class, 'publicacion_id', 'id');
    }

    


    
}
 