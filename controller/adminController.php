<?php

namespace Controller;

require_once('model/CommentManager.php');
require_once('model/postManager.php');
require_once('model/classementManager.php');

class adminController {

   function __construct() {
      $this->CommentManager = new \Model\CommentManager();
      $this->postManager = new \Model\postManager();  
   }  

   // Modifier un chapitre
   public function editTeamAdmin($id, $teamName, $teamPoint, $rank) {  
    $edit_team = $this->postManager->updateTeam($id, $teamName, $teamPoint, $rank); 
    if($edit_team) {
        $confirm = "Les points sont bien attribués à l'équipe.";  
    }      
}
    // Modifier chapitre
    public function editTeamPrepare($id) {
        $post = $this->postManager->getTeam($id);  
        require 'view/frontend/editPost.php';        
    }
}
