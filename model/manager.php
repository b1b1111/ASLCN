<?php

namespace Model;

class Manager
{
    protected function dbConnect()
    {
        
        $db = new \PDO('mysql:host=webagencawben.mysql.db;dbname=webagencawben;charset=utf8;port=3306', 'webagencawben', 'Ben0ubenou');
        return $db;
    }
}
