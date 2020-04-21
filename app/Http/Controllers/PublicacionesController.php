<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Modelos\Publicaciones;              
use App\Modelos\Seguidores; 
 
use DB;
class PublicacionesController extends Controller
{
    public function posts(Request $r){
            $validation = Validator::make($r->all(), [
                'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'imagen' => 'required'
               ]);
            if($validation->passes())
            {
                $image = $r->file('imagen');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $id = session::get('usuario');
                    $idu = $id->id;
                    $post = Publicaciones::create([
                        "usuario_id" => $idu,
                        "imagen" =>  'img/publicaciones/'.$new_name,
                        "descripcion" => $r->get('descripcion')
                    ]);
                    $post->save();
                    $image->move(public_path('img/publicaciones'), $new_name);
                    Session::flash('mensaje', 'Foto Subida correctamente');
                    return  redirect('/profile');;
            }
            else
            {
                Session::flash('mensajerror', 'Hubo un error al subir una foto');
                return  redirect('/profile');
            }
    }
    public function post(Request $r, $id){
        //$id_post = Publicaciones::find($r->input('id_post'));
        $id = session::get('usuario');
        $idu = $id->id;
        $posts = Publicaciones::select("imagen","id")->where("usuario_id","=",$idu)->get();
        return view("perfil.showpost",compact("posts"));
    }
    public function post1(Request $r){
        $id_post = $r->get('id_post');
        dd($id_post);
    }

    public function deletepost($id){
        $proveedores = Publicaciones::destroy($id);
        return redirect("/profile");
    }
    public function seguidor(Request $r){

        $id_seguidor = $r->id;
        $usuario = session::get('usuario');
        $id = $usuario->id;
        DB::select("call followers ('$id','$id_seguidor')"); 
        return Seguidores::select("seguidor_id")->where("seguidor_id","=",$id_seguidor)->count();
    }
    public function unfollow($id){
        //dd($id);
        $usuarios = session::get('usuario');
        $idu = $usuarios->id;
        //dd($idu);
        //$usuario = DB::table('usuarios')->where('usuario', $id)->first();
        
        $seguidores = Seguidores::where("usuario_id","=",$idu)
        ->where("seguidor_id","=",$id);
        $seguidores->delete();
             //return view('perfil.otherProfile',compact('usuario','cantidad','seguidos','seguidores','variable'))->with('post',$posts);
        
        return redirect()->back();
    }


   
    public function verificarSeguidores($id){
        /*$id_seguidor = $r->id;
        dd($id_seguidor);*/
        $usuarios = session::get('usuario');
        $idu = $usuarios->id;
        $usuario = DB::table('usuarios')->where('usuario', $id)->first();
        $posts = Publicaciones::select("imagen","id","descripcion")->where("usuario_id","=",$usuario->id)->orderby('created_at','desc')->get();
        $cantidad = Publicaciones::select("publicaciones.id")->where("usuario_id","=",$usuario->id)->count();
        $seguidos = Seguidores::select("usuario_id")->where("usuario_id","=",$usuario->id)->count();
        $seguidores = Seguidores::select("seguidor_id")->where("seguidor_id","=",$usuario->id)->count();


        $validacion = DB::table("seguidores")
           ->select("usuario_id","seguidor_id")
           ->where("usuario_id", "=", $idu)->Where("seguidor_id","=",$usuario->id)->first();

            //dd($validacion);
                if ($validacion){
                    return view('perfil.otherProfile',compact('usuario','cantidad','seguidos','seguidores'))->with('post',$posts)->with("validacion",$validacion);
                    //return redirect("/profile");
                    //return 1;
                }
                return view('perfil.otherProfile',compact('usuario','cantidad','seguidos','seguidores'))->with('post',$posts);
                //return 0
                
    
    }
}