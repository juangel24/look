<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function searchProfile(Request $request){
        // return $request;
        $data = DB::table('usuarios')
            ->select(
                'usuarios.id', 'usuarios.usuario','usuarios.nombres', 
                'usuarios.apellidos', 'usuarios.imagen')
            ->orWhere('usuario', 'LIKE', '%'.$request->search.'%')
            ->orWhere('nombres', 'LIKE', '%'.$request->search.'%')
            ->get();
        // $data
        return $data;
    }

    function pruebon(){
        return view('base/pruebon');
    }
}
