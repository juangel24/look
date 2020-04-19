<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\Usuario;
use Illuminate\Support\Str;
use Session;
use Hash;
use App\Tmegusta;
use App\mmegusta;
use App\TComentarios;
use App\Tfotos;
use App\Modelos\Seguidores;
class inicioController extends Controller
{
    //

    function likes(Request $request){

        $id = $request->id;
        $agregado = Products::all()->find($id);

        $producto = new Producto($id,$agregado['nombre'],$agregado['descripcion'],$agregado['precio'],$agregado['img']);
        $arreglo = Session::get('productos')->push($producto);
        return $arreglo;

    }

    function pifi(){
        
        $fo=Tfotos::with('usuario')->get();
        return view('ayuda',compact('fo'));
    }

    function coment(Request $request){
        $id = $request->id;
        $ty=TComentarios::with('usuario')->where('publicacion_id','=',$id)->get();
        return $ty;
    }

    function enviar(Request $request){
        $usu=$request->usu;
        $comen=$request->commen;
        $id = $request->id;
        $comentario= new TComentarios();
        $comentario->usuario_id=$usu;
        $comentario->publicacion_id=$id;
        $comentario->comentario=$comen;
        $comentario->save();
        $ty=TComentarios::with('usuario')->where('publicacion_id','=',$id)->get();
        return $ty;
    }

    function megusta(){
         $s=[];
        $megst=mmegusta::with('megusta')->get();
        $megst1=mmegusta::with('megusta1')->get();
        //likes
        $y=mmegusta::with('megusta')->where('publicacion_id','=','103')->get();
        //comentrios
        $ty=TComentarios::with('usuario')->where('publicacion_id','=','103')->get();
        $seg=Seguidores::where('usuario_id','=','33')->get();
        $t=$seg->groupBy('seguidor_id')->toArray();
        foreach ($seg as $k => $c)
        {
            $s[]=['seguidores'=>$c['seguidor_id']];
        }
        $fo=Tfotos::with('usuario')->get();
        dd($fo);
    }
}
