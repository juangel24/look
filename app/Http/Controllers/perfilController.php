<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Modelos\Usuario;
use App\Modelos\Publicaciones;
/*use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;*/
use Session;
use DB;
use DateTime;
use Str;

class perfilController extends Controller
{
    /*public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }*/
    public function uploadphoto(Request $r){

        $usuarios = session::get('usuario');
        $lala = $usuarios->id;
        if($r->hasFile('profileimage')){
            $file = $r->file('profileimage');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/profile_photos/',$name);
            $usuario = new Usuario();
            $usuario = Usuario::where('usuarios.id','=',$lala)->first();
            $usuario->imagen = 'img/profile_photos/'.$name;
            $usuario->save();
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
        $idu = $id->id;
        $usuario = Usuario::select("usuarios.imagen")->where('usuarios.id','=',$usuarios)->first();
        $posts = Publicaciones::select("imagen","id","descripcion")->where("usuario_id","=",$idu)->orderby('created_at','desc')->get();
        $cantidad = Publicaciones::select("publicaciones.id")->where("usuario_id","=",$idu)->count();
        return view('perfil.perfil',compact('usuario','cantidad'))->with('post',$posts);
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

    function viewUpdateProfile () {
        $usuario = Session::get('usuario');
        return view('perfil/perfilUpdated', compact('usuario'));
    }

    function updateProfile1(Request $request) {
        if($request->profileimages != null){
                $file = $request->file('profileimages');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/img/profile_photos/',$name);
                $usuarios = Session::get('usuario');
                $usuarioImgUpdated = Usuario::find($usuarios->id);
                $usuarioImgUpdated->imagen = ('/img/profile_photos/'.$name);
                $usuarioImgUpdated->save();

                $vato = Session::get('usuario');
                $u = DB::table('usuarios')->where('id', $vato->id)->first();
                
                Session::forget('usuario');

                $usu = Session::put('usuario', $u);
                $usu = Session::save('usuario', $u);
                $usu = Session::get('usuario');
                
                return redirect('/updateProfile')
                    ->with('user', $usu);
            }
            date_default_timezone_set('America/Monterrey');
            $this->validate($request, [
                'firstNameUpdate' => 'required|min:3|max:60',
                'lastnameupdate' => 'required|min:3|max:60',
                'userUpdated' => 'required|min:6|max:20',
                'descriptionUpdate' => 'required|min:6|max:1000'],
    
                // Texto de las validaciones
                ['firstNameUpdate.required' => 'Ingrese sus nombres',
                'firstNameUpdate.max' => 'Solo se permiten 60 caracteres',
                'firstNameUpdate.min' => 'Debe tener mínimo 3 caracteres',
                'firstNameUpdate.min' => 'Debe tener mínimo 6 caracteres',
                'lastnameupdate.required' => 'Ingrese sus apellidos',
                'lastnameupdate.max' => 'Solo se permiten 60 caracteres',
                'lastnameupdate.min' => 'Debe tener mínimo 3 caracteres',
                'userUpdate.required' => 'Ingrese un usuario',
                'userUpdated.max' => 'Solo se permiten 20 caracteres',
                'userUpdated.min' => 'Debe tener mínimo 3 caracteres',
                'descriptionUpdate.required' => 'Ingrese una descripción',
                'descriptionUpdate.max' => 'La contraseña debe tener máximo 1000 caracteres']);
    
                // 'userUpdated.min' => 'Debe tener mínimo 3 caracteres']);
    
            $usuarios = Session::get('usuario'); 
    
            $usuarioUpdated = Usuario::find($usuarios->id);
            $usuarioUpdated->nombres = $request->firstNameUpdate;
            $usuarioUpdated->apellidos = $request->lastnameupdate;
            $usuarioUpdated->usuario = $request->userUpdated;
            $usuarioUpdated->contrasenia = $usuarios->contrasenia;
            $usuarioUpdated->descripcion = $request->descriptionUpdate;
            $usuarioUpdated->updated_at = new DateTime();
            $usuarioUpdated->save();
    
            $user = Session::get('usuario');
            $u = DB::table('usuarios')->where('correo', $user->correo)->first();
    
            Session::forget('usuario');
    
            $usu = Session::put('usuario', $u);
            $usu = Session::save('usuario', $u);
            $usu = Session::get('usuario');
    
            return redirect('/profile')
                ->with('usu', $usu);
        }
    
        function updateProfile2 (Request $request) {
            date_default_timezone_set('America/Monterrey');
            // $this->validate($request, [
            //     'emailUpdate' => 'required',
            //     'phoneUpdate' => 'required|integer|min:10',
            //     'genderUpdate' => 'required',
            //     'dateUpdate' => 'required'],
    
            //     // Texto de las validaciones
            //     ['emailUpdate.required' => 'Ingrese un correo',
            //     'phoneUpdate.required' => 'Ingrese un número telefónico',
            //     'phoneUpdate.min' => 'El número telefónico debe tener 10 caracteres',
            //     'genderUpdate.required' => 'Seleccione su género',
            //     'dateUpdate.required' => 'Seleccione su fecha de nacimiento']);
    
            $correo = $request->emailUpdate;
            
            $vato = DB::table('usuarios')->where('correo', $correo)->first();
            // dd($vato);
                
            if($vato){
                return redirect()
                ->back()
                ->with('repeatedEmail', 'hey')
                ->withInput();
            } 
    
            $usuario = Session::get('usuario');
    
            $usuarioUpdated = Usuario::find($usuario->id);
            $usuarioUpdated->nombres = $usuario->nombres;
            $usuarioUpdated->apellidos = $usuario->apellidos;
            $usuarioUpdated->usuario = $usuario->usuario;
            $usuarioUpdated->contrasenia = $usuario->contrasenia;
            $usuarioUpdated->descripcion = $usuario->descripcion;
            $usuarioUpdated->correo = $request->emailUpdate;
            // $usuario->telefono = $request->phoneUpdate;
            $usuarioUpdated->sexo = $request->genderUpdate;
            $usuarioUpdated->fecha_nacimiento = $request->dateUpdate;
            $usuarioUpdated->updated_at = new DateTime();
            $usuarioUpdated->save();
            
            Session:flush();
            Session::forget('usuario');

            $u = DB::table('usuarios')->where('correo', $request->emailUpdate)->first();
            
            $usu = Session::put('usuario', $u);
            $usu = Session::save('usuario', $u);
            $usu = Session::get('usuario');
            // dd($usu);
            return redirect('/profile')
                ->with('usu', $usu);
        }

        function viewOtherProfile($id){
            $usuario = DB::table('usuarios')->where('usuario', $id)->first();
            $otheruser = DB::table('usuarios')
            ->select("usuarios.imagen","usuarios.nombres","usuarios.apellidos","usuarios.descripcion")
            ->where("usuarios.id",$usuario->id)->first();
            $posts = Publicaciones::select("imagen","id","descripcion")->where("usuario_id","=",$usuario->id)->orderby('created_at','desc')->get();
            $cantidad = Publicaciones::select("publicaciones.id")->where("usuario_id","=",$usuario->id)->count();
            return view('perfil.otherProfile',compact('usuario','cantidad'))->with('post',$posts);
        }
}
