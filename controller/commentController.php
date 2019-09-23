<?php

namespace Controller;

require_once('model/CommentManager.php');
class commentController {

    function __construct() {
        $this->CommentManager = new \Model\CommentManager(); 
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

    



}