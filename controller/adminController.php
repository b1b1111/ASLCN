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

   public function editTeamAdmin($id, $teamName, $teamPoint, $teamRank) {  
    $edit_team = $this->postManager->updateTeam($id, $teamName, $teamPoint, $teamRank); 
    if($edit_team) {
        $confirm = "Les points sont bien attribués à l'équipe.";  
    }      
}
    
    public function editTeamPrepare() {
        $post = $this->postManager->getTeam();  
        require 'view/frontend/editTeam.php';        
    }
}
