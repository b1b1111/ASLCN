<?php

namespace Controller;

require_once('model/postManager.php');
require_once('model/classementManager.php');

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

    public function editPresence($id, $present, $absent) {
        $edit_pres = $this->postManager->updatePres($id, $present, $present);
        if($edit_pres) {
            $confirm = "Tu as bien noté tes présences";
        }
    }

    public function getPres($id) {
        $post = $this->postManager->getTablePres($id);
    }

    public function getAllPres() {
        $req = $this->postManager->getAllPres();
        require 'view/frontend/viewEvent.php';
    }

    public function pres($id) {
        $post = $this->postManager->getTablePres($id);
    }

    public function editPresPrepare($idEvent, $idMembre, $id) {
        $post = $this->postManager->updatePres($idEvent, $idMembre, $id);
        require 'view/frontend/presence.php';
    }
    /***********************************EVENTS******************************************** */

    public function editEv($id, $presents, $absents) {
        $edit_ev = $this->postManager->updateEv($id, $presents, $absents);
        if($edit_ev) {
            $confirm = "Tu as bien noté tes présences";
        }
    }

    public function getEv($id) {
        $event = $this->postManager->getEv($id);
        require 'view/frontend/presence.php';
    }

    public function getAllEv() {
        $event = $this->postManager->getEvents();
        require 'view/frontend/viewEvent.php';
    }

    public function delEv($id) {
        $post = $this->postManager->deleteEv($id);
        require 'view/frontend/editEvent.php';
    }
}
