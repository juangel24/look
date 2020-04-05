<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuario;
use App\Modelos\Publicaciones;
/*use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;*/
use Session;
use DB;
class perfilController extends Controller
{
    /*public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }*/
    public function uploadphoto(Request $r){

        $usuarios = session::get('usuario.id');

        if($r->hasFile('profileimage')){
            $file = $r->file('profileimage');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/profile_photos/',$name);
            $usuario = new Usuario();
            $usuario = Usuario::where('usuarios.id','=',$usuarios)->first();
            $usuario->imagen = $r->input('profileimage');
            $usuario->imagen = $name;
            $usuario->update();
            return redirect('/profile');
        }
    }
    public function profile(){
       // $usuarios = session::get('usuario.id');
        //$usuarios = session::get('usuario.imagen');
        $usu = session::get('usuario');
        $usuarios = $usu->id;
        // dd($usuarios);
        $id = session::get('usuario');
        $idu = $id->imagen;
        $usuario = Usuario::select("usuarios.imagen")->where('usuarios.id','=',$usuarios)->first();
        $post = Publicaciones::select("publicaciones.imagen")->where("usuario_id","=",$idu)->get();
        // dd($usuario);
        //return $post;
        return view('perfil.perfil',compact('usuario','post'));
    }
    /*public function uploadphotodropbox(Request $r){
        $usuarios = session::get('usuario.id');
        $file = $r->file('imagen');
        if($r->hasFile('imagen')){
           $ruta_enlace= Store::disk('dropbox')->put('/',$r->file('imagen'));
           $url = Storage::disk('dropbox')->url($ruta_enlace);
           $response_enlace = $this->dropbox->createSharedLinkWithSettings(
               $ruta_enlace,["requested_visibility"=> "public"]
           );
           $url_enlace = str_replace("dl=0","raw=1",$response_enlace['url']);
           $usuario = Usuario::where('usuarios.id','=',$usuarios)->first();
           $usuario->imagen = $r->input('imagen');
           $usuario->imagen = $url_enlace;
           $usuario->imagen = $ruta_enlace;
           return $usuario;
           $usuario->update();
           return redirect('/profile');
        }
    }*/
   /* public function perfil(){
        $usuarios = Usuario::all();
        return view('perfil.perfil',compact('usuarios'));
    }*/

}
