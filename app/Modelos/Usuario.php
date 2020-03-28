<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    public $timestamps = false;
}
