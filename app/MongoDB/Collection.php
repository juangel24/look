<?php
namespace App\MongoDB;

use MongoDB\{Client, Collection as MongoCollection};

class Collection extends MongoCollection {
    function __construct(string $collectionName = null) {
        $user = env('MONGODB_USER');
        $pass = env('MONGODB_PASS');
        $cluster = env('MONGODB_CLUSTER');

        $db = (new Client("mongodb+srv://". $user .":". $pass ."@". $cluster))
            ->{env('MONGODB_DATABASE')};
        $calledClass = strtolower(get_called_class());

        if (!$collectionName)
            $collectionName = strpos($calledClass, '\\') === false ?
                $calledClass : substr($calledClass, strrpos($calledClass, '\\') + 1).'s';

        parent::__construct($db->getManager(), $db->getDatabaseName(), $collectionName);
    }
}
