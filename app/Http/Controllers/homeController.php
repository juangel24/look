<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function searchProfile(Request $request){
        // return $request;
        $data = DB::table('usuarios')
            ->select('usuarios.nombres', 'usuarios.apellidos', 'usuarios.imagen')
            ->where('nombres', 'LIKE', '%'.$request->search.'%')
            ->orWhere('apellidos', 'LIKE', '%'.$request->search.'%')
            ->get();
        return $data;
    }
}
