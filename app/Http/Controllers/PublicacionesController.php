<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Modelos\Publicaciones;              
use App\Modelos\Seguidores; 
use App\Modelos\Megusta;   
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
                return  redirect('/profile');;
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
    public function likes(Request $r){
        $post_id = $r['postid'];
        $is_like = $r['isLike'] === true;
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = session::get('usuario');
        $uid = $user->id;
        
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
        ///Publicaciones::select("publicaciones.id")->where("usuario_id","=",$usuario->id)->count();
        return Seguidores::select("seguidor_id")->where("usuario_id","=",$usuario->id)->count();
    }
}