<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
 
class Seguidores extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'seguidores';
    public $timestamps = false;
    protected $fillable = ['id','usuario_id','seguidor_id'];

    public function seguidor(){
        return $this->belongsTo(App\Modelos\Usuarios::class,'seguidor_id');
    }
}
