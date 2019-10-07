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

    public function editEv($id, $presents, $absents) {
        $edit_ev = $this->postManager->updateEv($id, $presents, $absents);
        if($edit_ev) {
            $confirm = "Tu as bien noté tes présences";
        }
    }

    public function getMembre() {
        $membre = $this->postManager->getMembres();
        require 'view/frontend/presence.php';
    }

    public function getEv($id) {
        $event = $this->postManager->getEv($id);
        require 'view/frontend/presence.php';
    }

    public function getAllEv() {
        $event = $this->postManager->getEvents();
        require 'view/frontend/pres.php';
    }

    public function delEv($id) {
        $post = $this->postManager->deleteEv($id);
        require 'view/frontend/editEvent.php';
    }


    public function ajaxPres($pseudo) {
        if(isset($_POST['submit'])){ // si on a envoyé des données avec le formulaire

            if(!empty($_POST['pseudo'])){ // si les variables ne sont pas vides
            
                $pseudo = mysql_real_escape_string($_POST['pseudo']); // on sécurise nos données
        
                // puis on entre les données en base de données :
                $insertion = $this->postManager->ajaxSysPres($pseudo);
        
            }

            else{
                echo "Tu as oublié de noter ton pseudo !";
            }
        
        }    
    }
}
