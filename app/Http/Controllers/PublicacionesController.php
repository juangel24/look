<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Modelos\Publicaciones;              
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
}