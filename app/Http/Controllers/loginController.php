<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $this->validate($request, [
            'correo' => 'required|max:30',
            'password' => 'required|min:4|max:12',],

            // Texto de las validaciones
            ['correo.required' => 'Ingrese un usuario',
            'correo.max' => 'El usuario debe tener máximo 30 caracteres',
            'password.required' => 'Ingrese una contraseña',
            'password.min' => 'La contraseña debe tener mínimo 4 caracteres',
            'password.max' => 'La contraseña debe tener máximo 12 caracteres']);

        $correo = $request->get('correo');
        $pass = $request->password;
        // dd($pass);
        $vato = DB::table('usuarios')->where('correo', $correo)
                ->orWhere('usuario', $correo)->first();

        if(!$vato){

            return redirect('/')
                    ->with('noUser', 'hey')
                    ->withInput();
        }

        if(!Hash::check($request->password, $vato->contrasenia)){
            return redirect('/')
                    ->with('wrongPass', 'hey')
                    ->withInput();
        }

        if($vato){
            $confirmarpass = $vato->contrasenia;
            $confirmar = $vato->correo;

            if($vato){

                $confirmarpass = $vato->contrasenia;
                $confirmMail = $vato->correo;
                $confirmUser = $vato->usuario;

                if (Hash::check($pass, $confirmarpass) && $confirmMail == $correo || $confirmUser == $correo) {
                    $user = Session::put('usuario', $vato);
                    $user = Session::save('usuario', $vato);
                    $user = Session::get('usuario');
                    // dd($user->id);
                    return redirect('home');
                }
            }
        }

        return redirect('')->withInput();
    }

    function viewRegister(){
        return view('access/register');
    }

    function register(Request $request){

        // Validaciones
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'correoR' => 'required|max:100',
            'user' => 'required|min:6|max:20',
            'passwordR' => 'required|min:4|max:12',
            'confirmPasswordR' => 'required|min:4|max:12',
            'date' => 'required',
            'gender' => 'required'],

            // Texto de las validaciones
            ['first_name.required' => 'Ingrese sus nombres',
            'first_name.max' => 'Solo se permiten 100 caracteres',
            'last_name.required' => 'Ingrese sus apellidos',
            'last_name.max' => 'Solo se permiten 100 caracteres',
            'correoR.required' => 'Ingrese un correo',
            'correoR.max' => 'Solo se permiten 100 caracteres',
            'user.required' => 'Ingrese un usuario',
            'user.min' => 'El usuario debe tener mínimo 6 caracteres',
            'user.max' => 'El usuario debe tener máximo 20 caracteres',
            'passwordR.required' => 'Ingrese un contraseña',
            'passwordR.min' => 'La contraseña debe tener mínimo 4 caracteres',
            'passwordR.max' => 'La contraseña debe tener máximo 12 caracteres',
            'confirmPasswordR.required' => 'Ingrese un contraseña',
            'confirmPasswordR.min' => 'La contraseña debe tener mínimo 4 caracteres',
            'confirmPasswordR.max' => 'La contraseña debe tener máximo 12 caracteres',
            'date.required' => 'Ingrese su fecha de nacimiento',
            'gender.required' => 'Ingrese su sexo']);

        $img = 'img/profile_photos/user.png';
        $correo = $request->correoR;
        $vato = DB::table('usuarios')->where('correo', $correo)->first();

        if($vato){
            return redirect('/register')
                    ->with('repeatUser', 'hey')
                    ->withInput();
        }

        if ($request->passwordR != $request->confirmPasswordR){
            return redirect('/badregister')
                    ->with('incorrecto', 'Las contraseñas deben ser iguales');
        }

        $con = $request->get('passwordR');
        // $password = Hash::make($con);
        $password = password_hash($con,PASSWORD_DEFAULT);
        $token = Str::random(60);

        $usuario = new Usuario();
        $usuario->correo = $request->correoR;
        $usuario->usuario = $request->user;
        $usuario->contrasenia = $password;
        // $usuario->api_token = $token;
        $usuario->nombres = $request->first_name;
        $usuario->apellidos = $request->last_name;
        $usuario->timestamps;
        $usuario->fecha_nacimiento = $request->date;
        $usuario->sexo = $request->gender;
        $usuario->imagen = $img;

        $usuario->save();

        $usu = Session::put('usuario', $usuario);
        $usu = Session::get('usuario', $usuario);

		return redirect('home');
    }



    function logout(){
        Session::forget('usuario');
        return redirect('/');
    }

    function prueba(){
        return view('welcome');
    }
}
