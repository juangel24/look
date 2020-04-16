<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller {
    function view() {
        $other_users = DB::select('select id, usuario, nombres, apellidos, imagen '.
        'from usuarios where id != ?', [Session::get('usuario')->id]);

        return view('chat', compact('other_users'));
    }
}
