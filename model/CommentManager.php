<?php

namespace Model;

require_once("model/manager.php");
class CommentManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();      
    }

    public function getTeams() {

        $db = $this->newManager->dbConnect();
        $comments = $db->query('SELECT * FROM team WHERE 1');

        return $comments;
    }

}