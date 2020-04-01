<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuario;
use Session;
class perfilController extends Controller
{
    public function uploadphoto(Request $r){

        $usuarios = session::get('usuario.id');
       /* $this->validate($r,[
            'imagen' => '
            requitred|image|mimes:jpeg,png,jpg|max:2048'
        ]);*/
        //$imagen = Usuario::all();
        if($r->hasFile('imagen')){
            $file = $r->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/profile_photos/',$name);
           
            $usuario->imagen = $r->input('imagen');
            $usuario->imagen = $name;
            
            $usuario->save();
            return redirect('/profile');
        }
    }
    public function profile(){
        $usuario = Usuario::first();
        return view('perfil.perfil',compact('usuario'));
    }
   /* public function perfil(){
        $usuarios = Usuario::all();
        return view('perfil.perfil',compact('usuarios'));
    }*/

}
