<?php

namespace Controller;

require_once('model/adminManager.php');

class adminController {

   function __construct() {
      $this->adminManager = new \Model\adminManager();    
   }  

    /**
     * Espace modifications des points administration.
     */
    public function adminPoint() {
        $post = $this->adminManager->getTeams(); 
        require 'view/frontend/administration.php';
    }

    /***********************************TEAM******************************************** */

    public function editTeamAdmin($id, $teamPoint) {    
        $edit_point = $this->adminManager->updateTeam($id, $teamPoint);
        if($edit_point) {
            $confirm = "Les points sont bien modifiés";
        }
    }

    public function editTeamPrepare($id) {
        $post = $this->adminManager->getTeam($id);  
        require 'view/frontend/editTeam.php';        
    }

    /***********************************CLASSEMENT*************************************** */

    public function classement() {
        $post = $this->adminManager->getTeams();
        require 'view/frontend/classement.php';
    }
    

}
