<?php

namespace Benjamin\Aslcn\Controller;

require_once('model/CommentManager.php');
require_once('model/postManager.php');
require_once('model/classementManager.php');

class adminController {

   function __construct() {
      $this->CommentManager = new \Benjamin\Aslcn\Model\CommentManager();
      $this->postManager = new \Benjamin\Aslcn\Model\postManager();  
   }  

    // Créer un chapitre
    public function postAdmin($name, $description, $start, $end) {    
        $post = $this->postManager->addPost($name, $description, $start, $end);
        header('Location: '. $_POST['URL_PATH'] . 'administration');
    }
        
    // Modifier un chapitre
    public function editPostAdmin($id, $title, $content) {  
        $edit_article = $this->postManager->updatePost($id, $title, $content); 
        if($edit_article) {
            $confirm = "Votre article est bien modifié!";  
        }      
    }

    // Modifier chapitre
    public function editPostPrepare($id) {
        $post = $this->postManager->getPost($id);  
        require 'view/frontend/editPost.php';        
    }

    // Approuver un chapitre
    public function approuvePostAdmin($id) {
        $approuve = $this->postManager->approuvePost($id);   
        header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminChapter');  
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
