<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\Usuario;
use Illuminate\Support\Str;
use Session;
use Hash;
use App\Seguid;
use App\Tmegusta;
use App\mmegusta;
use App\TComentarios;
use App\Tfotos;
use Illuminate\Support\Facades\View;
use App\Modelos\Seguidores;

use App\Modelos\Publicaciones;

use Illuminate\Support\Collection;

class inicioController extends Controller
{
    //


    function likes(Request $request)
    {
        $aux = Session::get('usuario');
        $usuario = $aux->id;

        $id = $request->id;
        $usu = $request->usu;
        $like = 1;
        $likes = new mmegusta();
        $likes->usuario_id = $usuario;
        $likes->publicacion_id = $id;
        $likes->like = $like;
        $likes->save();
        $y = mmegusta::with('megusta1')->where('publicacion_id', '=', $id)->get();
        return $y;
    }

    function dislike(Request $request)
    {
        $aux = Session::get('usuario');
        $usuario = $aux->id;

        $id = $request->id;
        $usu = $request->usu;
        $yes = mmegusta::where('publicacion_id', '=', $id)->where('usuario_id', '=', $usuario)->first();
        $yes->delete();
        $y = mmegusta::with('megusta1')->where('publicacion_id', '=', $id)->get();
        return $y;
    }
    function verlikes(Request $request)
    {

        $id = $request->id;

        $y = mmegusta::with('megusta1')->where('publicacion_id', '=', $id)->get();
        return $y;
    }

    function index()
    {
        $aux = Session::get('usuario');
        $usuario = $aux->id;
        $megst1 = mmegusta::with('megusta1')->get();
        $todos = Collection::make($megst1);
        $t = $todos->groupBy('publicacion_id')->toArray();
        $rv = [];
        foreach ($t as $k => $c) {
            $rv[] = [
                'id' => $c[0]["publicacion_id"], 'cantidad' => count($c), 'producto' => $c[0]
            ];
        }
        $fo = Tfotos::with('usuario')->get();
        //dd($fo, $rv);

        $sv = [];
        foreach ($fo as $k => $c) {
            foreach ($rv as $k => $r) {
                if ($r['id'] == $c->id) {
                    $sv[] = [
                        'cantidad' => $r['cantidad'], 'producto' => $c->id
                    ];
                }
            }
        }
        $gg = [];

        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($sv as $f => $r) {

                if ($r["producto"] == $c->id) {

                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $au = true;
                    $fo[$k]->likes =  $r['cantidad'];
                }
            }
            if ($au == false) {
                $gg[] = [
                    'foto' => $fo[$k], 'cantidad' => 0
                ];
                $fo[$k]->likes = 0;
            }
        }
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($megst1 as $f => $r) {

                if ($r->publicacion_id == $c->id and $r->usuario_id == $usuario) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $fo[$k]->can = "no";
                    $au = true;
                }


                
            } if ($au == false) {
                $gg[] = [
                    'foto' => $fo[$k], 'cantidad' => 0
                ];
                $fo[$k]->can = "si";
            }
        }

        $fos = [];
        $segi = Seguid::where('usuario_id', '=', $usuario)->get();
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($segi as $f => $r) {

                if ($r->seguidor_id == $c->usuario_id) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $au = true;
                    $fos[] = $c;
                }


                if ($au == false) {
                }
            }
        }
        $sugerencia=[];
         $segi = Seguid::where('usuario_id', '=', $usuario)->get();
        $segi2 = Usuario::all();
        foreach ($segi2 as $k => $c) {
            $au = false;
            foreach ($segi as $f => $r) {
                
                if ($r->seguidor_id == $c->id  ) {
                    $au = true;
                   
                }
            }
            if ($au == false and $c->id!=$usuario ) {
                $sugerencia[]=$c;
            }
        }
        $fos = Collection::make($fos);
        
        $fo = $fos;
 


        return view('home', compact('fo', 'rv', 'sv', 'sugerencia'));
       
    }

    function coment(Request $request)
    {
        $id = $request->id;
        $ty = TComentarios::with('usuario')->where('publicacion_id', '=', $id)->get();
        return $ty;
    }

    function enviar(Request $request)
    {
        $aux = Session::get('usuario');
        $usuario = $aux->id;
        $usu = $request->usu;
        $comen = $request->commen;
        $id = $request->id;
        $comentario = new TComentarios();
        $comentario->usuario_id = $usuario;
        $comentario->publicacion_id = $id;
        $comentario->comentario = $comen;
        $comentario->save();
        $ty = TComentarios::with('usuario')->where('publicacion_id', '=', $id)->get();
        return $ty;
    }
    function visita($id)
    {
        
        $usu = session::get('usuario');
        $usuarios = $usu->id;
        $visitar;
        (int)$visitar=(int)$id;
        // dd($usuarios);
        $id = session::get('usuario');
        $idu = $id->id;

        
        //aqui se sabe cuantos likes tiene cada foto 
        $megst1 = mmegusta::with('megusta1')->get();
        $todos = Collection::make($megst1);
        $t = $todos->groupBy('publicacion_id')->toArray();
        $rv = [];
        foreach ($t as $k => $c) {
            $rv[] = [
                'id' => $c[0]["publicacion_id"], 'cantidad' => count($c), 'producto' => $c[0]
            ];
        }
        //Aqui terminina lo de cuantos likes tiene cada foto

        //aqui me traigo todas las fotos con sus respectivos usuarios
        $fo = Tfotos::with('usuario')->get();
        //dd($fo, $rv);
        $sv = [];
        foreach ($fo as $k => $c) {
            foreach ($rv as $k => $r) {
                if ($r['id'] == $c->id) {
                    $sv[] = [
                        'cantidad' => $r['cantidad'], 'producto' => $c->id
                    ];
                }
            }
        }
        $gg = [];
        //aqui a las fotos que me traigo le creo la variable like que contiene los likes que ha resivido y los saco con ayuda de la variable $sv
        ##fotos con likes
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($sv as $f => $r) {

                if ($r["producto"] == $c->id) {

                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $au = true;
                    $fo[$k]->likes =  $r['cantidad'];
                }
            }
            if ($au == false) {
                $gg[] = [
                    'foto' => $fo[$k], 'cantidad' => 0
                ];
                $fo[$k]->likes = 0;
            }
        }
        ########################################################################

        //aqui veo que fotos les he dalo like, para saber si le podre dar like o dislike en la view :D
        #ver que foto le e dado like
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($megst1 as $f => $r) {

                if ($r->publicacion_id == $c->id and $r->usuario_id == $usuarios) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $au = true;
                    $fo[$k]->can =  "no";
                }


                if ($au == false) {
                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => 0
                    ];
                    $fo[$k]->can = "si";
                }
            }
        }
        ###############################################################################


        //aqui me fijo a quien sigo para solo publicar fotos de personas que sigo ok?
        $aux = Session::get('usuario');
        $usuario = $aux->id;
        $yes = mmegusta::where('publicacion_id', '=', 103)->where('usuario_id', '=', $usuario)->first();
        $fos = [];
        $segi = Seguid::where('usuario_id', '=', $usuario)->get();
        $yeah=$fo;
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($segi as $f => $r) {

                if ($r->seguidor_id == $c->usuario_id) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $au = true;
                    
                }

            }
            if ($au == false) {
                $fos[] = $c;
            }
        }

        $fos = Collection::make($fos);
        //dd($fo, $fos);
        $fo = $fos;
        # traigo las publicaciones que son mias
        $posts = Publicaciones::select("imagen","id","descripcion")->where("usuario_id","=",$visitar)->orderby('created_at','desc')->get();
       
        $pifi=$posts;
        //aqui compararemos las fotos que son mias y si les pueo dar like o nel
        foreach ($yeah as $k => $c) {
            $au = false;
            foreach ($pifi as $f => $r) {

                if ($r->id == $c->id) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $au = true;
                    $pifi[$f]->likes=$c->likes;
                    $pifi[$f]->can=$c->can;
                }

            }
        
        }
        $posts=$pifi;

        $usuarios = session::get('usuario');
        $idu = $usuarios->id;

        $usuario = Usuario::where("id", "=", $visitar)->get();
        //dd($usuario);
        $otheruser = DB::table('usuarios')
            ->select("usuarios.imagen", "usuarios.nombres", "usuarios.apellidos", "usuarios.descripcion")
            ->where("usuarios.id", $usuario[0]->id)->first();
        $cantidad = Publicaciones::select("publicaciones.id")->where("usuario_id", "=", $usuario[0]->id)->count();

        $seguidos = Seguidores::select("usuario_id")->where("usuario_id", "=", $usuario[0]->id)->count();
        $seguidores = Seguidores::select("seguidor_id")->where("seguidor_id", "=", $usuario[0]->id)->count();

        /*$validacion = Seguidores::select("*")->where("usuario_id", "=", $idu)->Where("seguidor_id","=",$usuario->id)->first();
        //dd($validacion);
            if ($validacion){
                return view('perfil.otherProfile',compact('usuario','cantidad','seguidos','seguidores'))->with('post',$posts)->with("validacion","polo");
                //return 1;
            }*/
        return view('perfil.visita', compact('usuario', 'cantidad', 'seguidos', 'seguidores'))->with('post', $posts);
        //return 0;

    }
    function megusta()
    {
        /*$s=[];
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
        }


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


        dd($gg);*/

        $megst1 = mmegusta::with('megusta1')->get();
        $todos = Collection::make($megst1);
        $t = $todos->groupBy('publicacion_id')->toArray();
        $rv = [];
        foreach ($t as $k => $c) {
            $rv[] = [
                'id' => $c[0]["publicacion_id"], 'cantidad' => count($c), 'producto' => $c[0]
            ];
        }
        $fo = Tfotos::with('usuario')->get();
        //dd($fo, $rv);

        $sv = [];
        foreach ($fo as $k => $c) {
            foreach ($rv as $k => $r) {
                if ($r['id'] == $c->id) {
                    $sv[] = [
                        'cantidad' => $r['cantidad'], 'producto' => $c->id
                    ];
                }
            }
        }
        $gg = [];
        ##fotos con likes
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($sv as $f => $r) {

                if ($r["producto"] == $c->id) {

                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $au = true;
                    $fo[$k]->likes =  $r['cantidad'];
                }
            }
            if ($au == false) {
                $gg[] = [
                    'foto' => $fo[$k], 'cantidad' => 0
                ];
                $fo[$k]->likes = 0;
            }
        }

        #ver que foto le e dado like
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($megst1 as $f => $r) {

                if ($r->publicacion_id == $c->id and $r->usuario_id == 1) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => $r['cantidad']
                    ];
                    $au = true;
                    $fo[$k]->can =  "no";
                }


                if ($au == false) {
                    $gg[] = [
                        'foto' => $fo[$k], 'cantidad' => 0
                    ];
                    $fo[$k]->can = "si";
                }
            }
        }

        $aux = Session::get('usuario');
        $usuario = $aux->id;
        $yes = mmegusta::where('publicacion_id', '=', 103)->where('usuario_id', '=', $usuario)->first();
        $fos = [];
        $segi = Seguid::where('usuario_id', '=', $usuario)->get();
        foreach ($fo as $k => $c) {
            $au = false;
            foreach ($segi as $f => $r) {

                if ($r->seguidor_id == $c->usuario_id) {
                    //dd($r->publicacion_id==$c->id and $r->usuario_id===1);
                    $au = true;
                    
                }

            }
            if ($au == false) {
                $fos[] = $c;
            }
        }

        $fos = Collection::make($fos);
        dd($fo, $fos);
        $fo = $fos;
    }z
}
