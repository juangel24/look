<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class loginController extends Controller
{
    function viewLogin(){
        return view('access/login');
    }
    function login(Request $request){
        $correo = $request->get('correo');
        $pass = $request->get('password');
        // dd($usuario);
        $vato = DB::table('usuarios')->where('correo', $correo)->first();
        // dd($vato);
        if($vato){
            $confirmarpass = $vato->contrasenia;
            $confirmar = $vato->correo;

            if (Hash::check($pass, $confirmarpass) && $confirmar == $correo) {
                $user = Session::put('usuario', $vato);
                $user = Session::save('usuario', $vato);
                
            return redirect('/')
                    ->with('conected', 'Su cuenta se inició correctamente')
                    ->with('user', $user);
            }
        }

        if ($correo == null && $pass == null) {
           return redirect('/')
                ->with('hacker', 'Hacker Detectado!...');
        }
       
        return redirect('/home')
                ->with('userIncorrecto', 'Cuenta o Contraseña incorrectas');  
    }

    function viewRegister(){
        return view('access/register');
    }

    function register(Request $request){
        dd($request);
        $con = $request->get('password');
        $password = Hash::make($con);
        $token = Str::random(60);
    }

    function prueba(){
        return view('welcome');
    }
}
