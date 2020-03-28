<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Modelos\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Hash;

class loginController extends Controller
{
    function viewLogin(){
        return view('access/login');
    }
    function login(Request $request){
        $correo = $request->get('correo');
        $pass = $request->password;
        // dd($pass);
        $vato = DB::table('usuarios')->where('correo', $correo)->first();

        if($vato){
            $usuario = Usuario::find($vato->id);
            $passwordX = $usuario->contrasenia;
            
            $confirmarpass = $vato->contrasenia;
            $confirmar = $vato->correo;
            
            if($vato){
                $confirmarpass = $vato->password;
                $confirmar = $vato->correo;
    
                if (Hash::check($pass, $confirmarpass) && $confirmar == $usuario) {
                    $user = Session::put('usuario', $vato);
                    $user = Session::save('usuario', $vato);
                    
                return redirect('/')
                        ->with('conected', 'Su cuenta se inició correctamente')
                        ->with('user', $user);
                }
            }
        }

        if ($correo == null or $pass == null) {
           return redirect('/')
                ->with('hacker', 'Hacker Detectado!...');
        }
        
        return redirect('/')
                ->with('userIncorrecto', 'Cuenta o Contraseña incorrectas');  
    }

    function viewRegister(){
        return view('access/register');
    }

    function register(Request $request){
        if ($request->passwordR != $request->confirmPasswordR){
            return redirect('/register')
                    ->with('incorrecto', 'Las contraseñas deben ser iguales');
        }
        
        $con = $request->get('passwordR');
        // $password = Hash::make($con);
        $password = password_hash($con,PASSWORD_DEFAULT);
        $token = Str::random(60);
        // dd($password);
        
        $usuario = new Usuario();
        $usuario->correo = $request->correoR;
        $usuario->contrasenia = $password;
        // $usuario->api_token = $token;
        $usuario->nombres = $request->first_name;
        $usuario->apellidos = $request->last_name;
        // $usuario->timestamps;
        $usuario->fecha_nacimiento = $request->date;
        $usuario->sexo = $request->gender;
        $usuario->save();
        
        $usu = Session::put('usuario', $usuario);
        $usu = Session::get('usuario', $usuario);
        
		return redirect('/home')
                    ->with('correcto', 'Su cuenta se creó correctamente');
    }

    function prueba(){
        return view('welcome');
    }
}
