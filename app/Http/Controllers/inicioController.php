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

use Illuminate\Support\Collection;
class inicioController extends Controller
{
    //

    function likes(Request $request){

        $id = $request->id;
        $usu=$request->usu;
        $like=1;
        $likes= new mmegusta();
        $likes->usuario_id=$usu;
        $likes->publicacion_id=$id;
        $likes->like=$like;
        $likes->save();
        $y=mmegusta::with('megusta1')->where('publicacion_id','=',$id)->get();
        return $y;



    }
    function verlikes(Request $request){

        $id = $request->id;
        
        $y=mmegusta::with('megusta1')->where('publicacion_id','=',$id)->get();
        return $y;



    }

    function pifi(){
        $megst1=mmegusta::with('megusta1')->get();
        $todos = Collection::make($megst1);
        $t = $todos->groupBy('publicacion_id')->toArray();
         $rv=[];
         foreach ($t as $k => $c)
         {
             $rv[]=[
                 'id'=>$c[0]["publicacion_id"],'cantidad'=> count($c),'producto'=>$c[0]
             ];
         }
        $fo=Tfotos::with('usuario')->get();
        //dd($fo, $rv);

        $sv=[];
        foreach ($fo as $k => $c)
        {
            foreach ($rv as $k => $r)
        {
            if($r['id']==$c->id)
            {
            $sv[]=[
                'cantidad'=> $r['cantidad'],'producto'=>$c->id
            ];}
        }
        }
        $gg=[];

        foreach ($fo as $k => $c)
        {
            $au=false;
            foreach ($sv as $f => $r)
        {
            
            if($r["producto"]==$c->id)
            {
               
            $gg[]=[
                'foto'=>$fo[$k],'cantidad'=> $r['cantidad']
            ];$au=true;
            $fo[$k]->likes=  $r['cantidad'];}
               
        }
        if($au==false){
        $gg[]=[
            'foto'=>$fo[$k],'cantidad'=> 0
        ];
        $fo[$k]->likes= 0;}
        }
        $sde= Collection::make($gg);
        
        return view('ayuda',compact('fo','rv', 'sv','sde'));
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
        //$megst=mmegusta::with('megusta')->get();
        $megst1=mmegusta::with('megusta1')->get();
        //likes
        //$y=mmegusta::with('megusta')->where('publicacion_id','=','103')->get();
        //comentrios
       // $ty=TComentarios::with('usuario')->where('publicacion_id','=','103')->get();
        //$seg=Seguidores::where('usuario_id','=','33')->get();
       // $t=$seg->groupBy('seguidor_id')->toArray();
       /* foreach ($seg as $k => $c)
        {
            $s[]=['seguidores'=>$c['seguidor_id']];
        }*/


        //$productos = Session::get('productos');
        $todos = Collection::make($megst1);
       $t = $todos->groupBy('publicacion_id')->toArray();
        $rv=[];
        foreach ($t as $k => $c)
        {
            $rv[]=[
                'id'=>$c[0]["publicacion_id"],'cantidad'=> count($c),'producto'=>$c[0]
            ];
        }
        $fo=Tfotos::with('usuario')->get();
        $sv=[];
        foreach ($fo as $k => $c)
        {
            foreach ($rv as $k => $r)
        {
            if($r['id']==$c->id)
            {
            $sv[]=[
                'cantidad'=> $r['cantidad'],'producto'=>$c->id
            ];}
            
        }
        }
        $gg=[];

        foreach ($fo as $k => $c)
        {
            $au=false;
            foreach ($sv as $f => $r)
        {
            
            if($r["producto"]==$c->id)
            {
               
            $gg[]=[
                'foto'=>$fo[$k],'cantidad'=> $r['cantidad']
            ];$au=true;}
               
        }
        if($au==false)
        $gg[]=[
            'foto'=>$fo[$k],'cantidad'=> 0
        ];
        }
        dd($gg);

        //el 33 esta harcoreado, igual se cambiara con la variabla de secion
        $ssss=Seguidores::where('usuario_id','=','33')->get();
        

        dd($gg);
    }
}
