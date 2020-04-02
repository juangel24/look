<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modelos\Publicaciones;              
class PublicacionesController extends Controller
{
    public function posts(Request $r){
        $id = session::get('usuario.id');
        $post = Publicaciones::create([
            "usuario_id" => $id,
            "imagen" => $r->input('imagen'),
            "descripcion" => $r->get('descripcion')
        ]);
        if($r->hasFile('imagen')){
            $file = $r->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/posts/',$name);
            $post = new Publicaciones();
            $post = Publicaciones::where('usuarios_id','=',$id)->first();
            $post->imagen = $r->file('imagen');
            $post->imagen = $name;
            $post->save();
            
        }
        return redirect('/profile');
    }
}
