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

    public function editTeamAdmin($teamPoint) {  
        $post = $this->postManager->updateTeam($teamPoint);     
    }

    public function editTeamPrepare($id) {
        $post = $this->postManager->getTeam($id);  
        require 'view/frontend/editTeam.php';        
    }

  
}
