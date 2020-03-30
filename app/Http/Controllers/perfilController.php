<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuario;
class perfilController extends Controller
{
    public function uploadphoto(Request $r){

        //$imagen = Usuario::all();
        if($r->hasFile('imagen')){
            $file = $r->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$name);
            $usuario = new Usuario();
            $usuario->imagen = $r->input('imagen');
            $usuario->imagen = $name;
            
            $usuario->save();
            return redirect('/profile');
        }
    }
   /* public function perfil(){
        $usuarios = Usuario::all();
        return view('perfil.perfil',compact('usuarios'));
    }*/
}
