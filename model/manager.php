<?php

namespace Benjamin\Aslcn\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=aslcn;charset=utf8', 'root', '');
        return $db;
    }
}