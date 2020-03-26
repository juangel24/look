<?php
namespace App\Connections;

use MongoDB\Client as Mongo;

class MongoDB {
    private $mongo;

    function __construct() {
        $this->mongo = new Mongo("mongodb://localhost:27017");
    }

    function test() {
        $collection = $this->mongo->chat->persons;
        $result = $collection->find()->toArray();

        dd($result);
    }
}
