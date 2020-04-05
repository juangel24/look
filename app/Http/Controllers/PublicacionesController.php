<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Modelos\Publicaciones;              
class PublicacionesController extends Controller
{
    public function posts(Request $r){
        $image = $r->file('imagen');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $id = session::get('usuario.id');
            $post = Publicaciones::create([
                "usuario_id" => $id,
                "imagen" => $new_name,
                "descripcion" => $r->get('descripcion')
            ]);
            $validation = Validator::make($r->all(), [
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
               ]);
            if($validation->passes())
            {
                    
                    $image->move(public_path('img/publicaciones'), $new_name);
                    return response()->json([
                    'message'   => 'Tu imágen se subió correctamente',
                    'upload_image' => '<img src="/img/publicaciones/'.$new_name.'" class="img-fluid" width="200px" height="200px" />',
                    'class_name'  => 'alert-success'
                    ]);
            }
            else
            {
            return response()->json([
            'message'   => 'Hubo un error al subir su imágen',
            'upload_image' => '',
            'class_name'  => 'alert-danger'
            ]);
            }
           /*if($r->hasFile('imagen')){
                $file = $r->file('imagen');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/img/publicaciones/',$name);
                $post = new Publicaciones();
                $post = Publicaciones::where('usuarios_id','=',$id)->first();
                $post->imagen = $r->file('imagen');
                $post->imagen = $name;
                $post->save();
           }
        return redirect('/profile');
        }*/
       
    }
}