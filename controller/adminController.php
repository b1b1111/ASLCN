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

    public function pres() {
        if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
        $gett = (int) $_GET['t'];
        $sessionid = $_SESSION['id'];
        $getid = (int) $_GET['id'];
        $check = $this->postManager->getEventId($getid);
        if($check->rowCount() == 1) {
            if($gett == 1) {
                $check_pres = $this->postManager->checkPres($getid,$sessionid);
                $del = $this->postManager->deleteAbs($getid,$sessionid);
                if($check_pres->rowCount() == 1) {
                    $del = $this->postManager->deletePres($getid,$sessionid);
                } else {
                    $ins = $this->postManager->insertPres($getid, $sessionid);
                }
                
            } 
            else if($gett == 2) {
                $check_abs = $this->postManager->checkAbs($getid,$sessionid);
                $del = $this->postManager->deletePres($getid,$sessionid);
                if($check_abs->rowCount() == 1) {
                    $del = $this->postManager->deleteAbs($getid,$sessionid);
                } else {
                    $ins = $this->postManager->insertAbs($getid, $sessionid);
                }
            }
            header('Location: '. $_POST['URL_PATH'] . "calendrier" . "/" . 'viewEvent?id=' . $getid);
        } else {
            exit('Erreur fatale. <a href="#">Revenir à l\'accueil</a>');
        }
        } else {
        exit('Erreur fatale. <a href="#">Revenir à l\'accueil</a>');
        }
         
    }
 
}
