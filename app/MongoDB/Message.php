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

    // Usuarios con los que un usu especifico tiene conversacion
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
                            'if'=> [
                                '$eq'=> [ '$from', $user_id ]
                            ],
                            'then'=> '$to',
                            'else'=> '$from'
                        ]
                    ]
                ]
            ],
            [ '$group'=> ['_id'=> '$user_id'] ]
        ];

        $result = iterator_to_array($this->aggregate($pipeline));

        return array_column($result, '_id');
    }
}
