<?php

namespace Controller;

require_once('model/postManager.php');
require_once('model/CommentManager.php');

class adminController {

   function __construct() {
      $this->postManager = new \Model\postManager();  
      $this->CommentManager = new \Model\CommentManager();  
   }  

    /***********************************TEAM******************************************** */

    public function editTeamAdmin($id, $teamPoint) {    
        $edit_point = $this->postManager->updateTeam($id, $teamPoint);
        if($edit_point) {
            $confirm = "Les points sont bien modifiés";
        }
    }

    public function editTeamPrepare($id) {
        $post = $this->postManager->getTeam($id);  
        require 'view/frontend/editTeam.php';        
    }

     /***********************************PRESENCE******************************************** */

    public function getAllPres() {
        $post = $this->postManager->getAllPres();
        require 'view/frontend/viewEvent.php';
    }

    public function pres($id) {
        $req = $this->postManager->getTablePres($id);
    }

    public function viewPres($id) {
        $req = $this->postManager->pres();
        require 'view/frontend/viewEvent.php';
    }

    public function getPres($id) {
        $post = $this->postManager->getTablePres($id);
        require 'view/frontend/presence.php';
    }

    public function insertPresence($id, $id_event, $id_membre) {
        $req = $this->postManager->insertPres($id, $id_event, $id_membre);
    }
    /***********************************EVENTS******************************************** */

    public function getEv($id) {
        $event = $this->postManager->getEv($id);
        require 'view/frontend/pres.php';
    }


    public function getAllEv() {
        $evenement = $this->postManager->getEvents();
        require 'view/frontend/pres.php';
    }

}
