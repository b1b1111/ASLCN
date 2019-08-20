<?php

namespace Benjamin\Aslcn\Controller;

require_once('model/CommentManager.php');
class commentController {

    function __construct() {
        $this->CommentManager = new \Benjamin\Aslcn\Model\CommentManager(); 
    }

    // Nouveau commentaire
    public function addComment($post_id, $author, $content) {
        $comments = $this->CommentManager->postComment($post_id, $author, $content);
        
    }

    // Signaler un commentaire
    public function alertComment($id) {
        $alertedComment = $this->CommentManager->reportComment($id);  
        $alert = $_POST['alert'];    
        header('Location: '. $_POST['URL_PATH'] . 'chapitres'); 
    }

    // Créer un event
    public function createEvent($name, $description, $start, $end) {     
        $post = $this->CommentManager->addEvent($name, $description, $start, $end);
    }

}