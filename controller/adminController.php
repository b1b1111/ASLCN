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


    // Supprimer un chapitre
    public function deletePostAdmin($id) {
        $deletedPost = $this->postManager->deletePost($id);
        header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminChapter');
    }

    // Approuver un commentaire
    public function approuveCommentAdmin($id) {
        
        $approuve = $this->CommentManager->approuveComment($id);   
        header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminComment');  
    }

    // Supprimer un commentaire
    public function deleteCommentAdmin($id) {
               
        $supprime = $this->CommentManager->deleteComment($id);
        header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminComment');   
    }
}
