<?php
namespace App\MongoDB;

use MongoDB\{Client, Collection as MongoCollection};

class Collection extends MongoCollection {
    function __construct(string $collectionName = null) {
        $db = (new Client("mongodb://localhost:27017"))->{env('MONGO_DATABASE')};
        $calledClass = strtolower(get_called_class());

        if (!$collectionName)
            $collectionName = strpos($calledClass, '\\') === false ?
                $calledClass : substr($calledClass, strrpos($calledClass, '\\') + 1).'s';

        parent::__construct($db->getManager(), $db->getDatabaseName(), $collectionName);
    }
}
