<?php

namespace Model;

require_once("model/manager.php");
class chatManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();  
    }

    /*****************************************TEAM************************************************* */
    /********************************************************************************************** */

    public function miniChat() {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
        $req->execute(array($_POST['pseudo'], $_POST['message'])); 
    }

    public function postChat() {
        $db = $this->newManager->dbConnect();
        $reponse = $db->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
        return $reponse;
    }

}

?>