<?php
namespace App\MongoDB;

use MongoDB\{Client, Collection as MongoCollection};

class Collection extends MongoCollection {
    function __construct(string $collectionName = null) {
        $user = config('database.mongodb.username');
        $pass = config('database.mongodb.password');
        $cluster = config('database.mongodb.cluster');
        $database = config('database.mongodb.database');

        $db = (new Client("mongodb+srv://". $user .":". $pass ."@". $cluster))
            ->{$database};
        $calledClass = strtolower(get_called_class());

        if (!$collectionName)
            $collectionName = strpos($calledClass, '\\') === false ?
                $calledClass : substr($calledClass, strrpos($calledClass, '\\') + 1).'s';

        parent::__construct($db->getManager(), $db->getDatabaseName(), $collectionName);
    }
}
