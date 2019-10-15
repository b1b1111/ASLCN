<?php

namespace Controller;

require_once('model/chatManager.php');

class chatController {

    function __construct() {
      $this->chatManager = new \Model\chatManager();    
    } 
    
    public function chat() {
        $posts = $this->chatManager->miniChat();
        $reponse = $this->chatManager->postChat();
        require 'view/frontend/picture.php';
    }

}

?>