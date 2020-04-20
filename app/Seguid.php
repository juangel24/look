<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Usuario;
class Seguid extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'seguidores';
    public $timestamps = false;
    protected $fillable = ['id','usuario_id','seguidor_id'];

    public function seguidor(){
        return $this->belongsToMany(Usuario::class,'seguidor_id');
    }
}
