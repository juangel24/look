<?php
namespace App\MongoDB;

class Message extends Collection {
    // Mensajes entre dos usuarios
    function get(int $from, int $to) {
        $condition = [
            '$and' => [
                ['from' => ['$in' => [$from, $to]]],
                ['to' => ['$in' => [$from, $to]]]
            ]
        ];

        return $this->find($condition)->toArray();
    }

    // Usuarios con conversacion y cant de mensajes no leídos
    function usersIds(int $user_id) {
        $pipeline = [
            [ '$match'=> [
                    '$or'=> [
                        [ 'from'=> $user_id ],
                        [ 'to'=> $user_id ]
                    ]
                ]
            ],
            [ '$project'=> [
                    'user_id'=> [
                        '$cond'=> [
                            'if'=> [ '$eq'=> ['$from', $user_id] ],
                            'then'=> '$to',
                            'else'=> '$from'
                        ]
                    ],
                    'not_read' => [
                        '$cond'=> [
                            'if'=> ['$eq'=> ['$to', $user_id]],
                            'then'=> ['$cond'=> [
                                'if'=> ['$eq'=> ['$is_read', false]],
                                'then'=> 1,
                                'else'=> 0
                            ]],
                            'else'=> 0
                        ]
                    ],
                ]
            ],
            [ '$group'=> [
                    '_id'=> '$user_id',
                    'not_read' => [ '$sum' => '$not_read' ]
                ]
            ]
        ];

        $result = iterator_to_array($this->aggregate($pipeline));

        return $result;
    }

    // Confirmar lecura de mensajes
    function updateRead(int $sender, int $read_by) {
        $filter = [
            '$and' => [
                ['from' => $sender],
                ['to' => $read_by]
            ]
        ];

        $update = [ '$set'=> [ 'is_read'=> true ] ];

        $this->updateMany($filter, $update);
    }
}
