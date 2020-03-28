<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuarios;
class perfilController extends Controller
{
    public function uploadphoto(Request $r){
        if($r->hasFile('imagen')){
            $file = $r->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$name);
            return $name;
            $usuario = new Usuarios();
            $usuario->imagen = $r->input('imagen');
            return 'me la rrrrrifo';
        }
    }
}
