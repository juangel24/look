<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Megusta extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'megusta';
    public $timestamps = false;
    protected $fillable = ['id','usuario_id','publicacion_id','like'];

    public function posts(){
        return $this->belongsTo(Aoo\Modelos\Publicaciones::class,'publicacion_id','id');
    }
}
