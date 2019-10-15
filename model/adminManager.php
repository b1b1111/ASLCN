<?php

namespace Model;

require_once("model/manager.php");
class adminManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();  
    }

    /*****************************************TEAM************************************************* */
    /********************************************************************************************** */
    
    public function getTeams() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM team ORDER BY teamPoint DESC"); 
        $req->execute();  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function getTeam($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM team WHERE id= ?"); 
        $req->execute(array($id));  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function updateTeam($id, $teamPoint) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE team SET teamPoint = ? WHERE id = ?');
        $post = $request->execute(array($teamPoint, $id));   
        return $post; 
    }


}