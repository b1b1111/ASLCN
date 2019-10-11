<?php

namespace Controller;

require_once('model/postManager.php');

class adminController {

   function __construct() {
      $this->postManager = new \Model\postManager();    
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

    /***********************************EVENTS******************************************** */

    public function getAllEv() {
        $evenement = $this->postManager->getEvents();
        require 'view/frontend/pres.php';
    }

    public function getAllVote($id_event) {
        $evenement = $this->postManager->getVote($id_event);
        require 'view/frontend/pres.php';
    }
}
