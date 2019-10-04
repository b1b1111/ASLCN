<?php

namespace Controller;

require_once('model/CommentManager.php');
require_once('model/postManager.php');
class commentController {

    function __construct() {
        $this->CommentManager = new \Model\CommentManager();
        $this->postManager = new \Model\postManager();  
        $this->newManager = new \Model\Manager();  
    }

    // Nouveau commentaire
    public function addComment($post_id, $user_id, $content) {
        $comments = $this->CommentManager->postComment($post_id, $user_id, $content); 
    }

    // Signaler un commentaire
    public function alertComment($id) {
        $alertedComment = $this->CommentManager->reportComment($id);  
        $alert = $_POST['alert'];    
        header('Location: '. $_POST['URL_PATH'] . 'chapitres'); 
    }

      
}