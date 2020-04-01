<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuario;
use Session;
use DB;
class perfilController extends Controller
{
    public function uploadphoto(Request $r){

        $usuarios = session::get('usuario.id');

        if($r->hasFile('imagen')){
            $file = $r->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/profile_photos/',$name);
            $usuario = Usuario::select("usuarios.id")->where('usuarios.id','=',$usuarios)->first();
            $usuario->imagen = $r->input('imagen');
            $usuario->imagen = $name;
            $usuario->save();
            return redirect('/profile');
        }
    }
    public function profile(){
        $usuarios = session::get('usuario.id');
        $usuario = Usuario::select("usuarios.id")->where('usuarios.id','=',$usuarios)->first();
        return view('perfil.perfil',compact('usuario'));
    }
   /* public function perfil(){
        $usuarios = Usuario::all();
        return view('perfil.perfil',compact('usuarios'));
    }*/

}
