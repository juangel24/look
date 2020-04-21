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
        $user_id = Session::get('usuario')->id;
        $users = $this->messages->usersIds($user_id);
        $other_users = [];

        if (count($users)) {
            $spaces = trim( str_repeat('?,', count($users)), ',');
            $other_users = DB::select("select id, usuario, nombres, apellidos, imagen ".
            "from usuarios where id IN ($spaces)", $users);
        }

        return view('chat', compact('other_users'));
    }

    function getMessages(int $receiver_id) {
        $user_id = Session::get('usuario')->id;

        $messages = $this->messages->get($user_id, $receiver_id);

        for($i = 0; $i < count($messages); $i++)
            $messages[$i]->msg = decrypt($messages[$i]->msg);

        return $messages;
    }

    function sendMessage(Request $request) {
        $from = Session::get('usuario')->id;
        $to = intval($request->receiver_id);
        $message_text = encrypt($request->message);
        $message = [
            'from' => $from,
            'to' =>  $to,
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

        $data = ['from' => $from, 'to' => [$to,]];
        $pusher->trigger('look', 'chat', $data);
    }

    function sendMessages(Request $request) {
        $from = intval($request->user_id);
        $receivers = array_map('intval', $request->selectedIds);
        $content = encrypt($request->msgContent);
        $inserts = [];

        foreach ($receivers as $id) {
            array_push($inserts, [
                'from' => $from,
                'to' =>  $id,
                'msg' => $content,
                'is_read' => false,
                'datetime' => Carbon::now()->format('d-m-Y h:i A')
            ]);
        }

        $this->messages->insertMany($inserts);

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

        $data = ['from' => $from, 'to' => $receivers];
        $pusher->trigger('look', 'chat', $data);
    }

    function searchUsers(Request $request) {
        $username = strtolower($request->val);
        $exceptions = $request->exceptions_ids;
        $spaces = trim( str_repeat('?,', count($exceptions)), ',');

        $users = DB::select("SELECT id, imagen, LOWER(usuario) AS username FROM usuarios ".
            "WHERE usuario LIKE '%$username%' ".
            "AND id NOT IN ($spaces) ".
            'LIMIT 5', $exceptions);

        return json_encode($users);
    }
}
