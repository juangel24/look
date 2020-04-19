<?php

namespace App\Http\Controllers;

use App\MongoDB\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class ChatController extends Controller {
    private $messages = null;

    function __construct() {
        $this->messages = new Message;
    }

    function index() {
        $other_users = DB::select('select id, usuario, nombres, apellidos, imagen '.
        'from usuarios where id != ?', [Session::get('usuario')->id]);

        return view('chat', compact('other_users'));
    }

    function getMessages($user_id) {
        $session_id = Session::get('usuario')->id;
        /*$condition = [
            'from' => ['$in' => [$session_id, $user_id]],
            'to' => ['$in' => [$session_id, $user_id]]
        ];

        return $this->messages->find($condition)->toArray();*/

        // Código temporal - Problema: No se pueden aplicar los filtros
        $messages = $this->messages->find()->toArray();
        $user_messages = [];

        foreach ($messages as $msg) {
            if (
                ($msg->from == $session_id && $msg->to == $user_id) ||
                ($msg->from == $user_id && $msg->to == $session_id)
            ) {
                $msg->msg = decrypt($msg->msg);
                array_push($user_messages, $msg);
            }
        }

        return $user_messages;
    }

    function sendMessage(Request $request) {
        $from = Session::get('usuario')->id;
        $to = $request->receiver_id;
        $message_text = encrypt($request->message);
        $message = [
            'from' => $from,
            'to' => $to,
            'msg' => $message_text,
            'is_read' => false,
            'datetime' => Carbon::now()->format('d-m-Y h:i A')
        ];

        $this->messages->insertOne($message);

         // pusher
        $options = [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to];
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}