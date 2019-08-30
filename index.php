<?php
session_start();

use Controller\adminController;

$_POST['URL_PATH'] = 'http://localhost/aslcn/';

require_once('controller/postController.php');
require_once('controller/commentController.php');
require_once('controller/adminController.php');

    $postController = new \Controller\postController();
    $commentController = new \Controller\commentController();
    $adminController = new \Controller\adminController(); 
    
$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

/*--------------------------------------ACCUEIL----------------------------------------*/
if (empty($url)) {
    $postController->getPosts();
} 

/*--------------------------------------CALENDRIER----------------------------------------*/
else if($url[0] == 'calendrier') {
    if (empty($url[1])) {
        $postController->printCalendar();
    }

    else if($url[1] == 'addEvent') {
        $postController->addEvent();
    }

    else if($url[1] == 'editEvent') {
        $postController->editEvent();
    } 
 
} 

/*--------------------------------------CONTACT----------------------------------------*/
else if($url[0] == 'contact') {
    $postController->contact();
} 

/*--------------------------------------PORTFOLIO----------------------------------------*/
else if($url[0] == 'galerie') {
    $postController->portfolio();
} 

/*--------------------------------------CLASSEMENT----------------------------------------*/

else if($url[0] == 'classement') {
    if(!empty($url[1])) {
        $postController->getClassement($url[1]);
    }
    else {
        $postController->classement();
    }
}
/*--------------------------------------ESPACE MEMBRE----------------------------------------*/
/**
 * Connexion espace membre
 */

else if($url[0] == 'profil') {
    if(empty($url[1])) {
    $postController->profil();
    }

    else if($url[1] == 'connexion') {
        $postController->connexion();
    }

    else if($url[1] == 'inscription') {
        $postController->inscription();
    } 

    else if($url[1] == 'editProfil') {
        $postController->editProfil();
    }

    else if($url[1] == "deconnexion") {
        $postController->deconnexion();
    }

    else if($url[1] == "recuperation") {
        $postController->recupMdp($mailexist);
    }

    else if($url[1] == "reboot") {
        $postController->connexionRecup();
    }

    else if($url[1] == 'editMP') {
        $postController->editMP($getid);
    }
} 

/*------------------------------------ADMINISTRATION------------------------------------*/

/*-----------------Accueil administration---------------------*/
else if($url[0] == 'administration') {
    if(empty($url[1])) { 
        $postController->administration();
    }

    else if($url[1] == 'adminComment') {
        $postController->adminComment();
    }

    else if($url[1] == 'adminChapter') {
        $postController->adminChapter();
    }

    /*-----------------Approuve Comment---------------------*/
    else if (($url[1] == 'confirm')&&(is_numeric($url[2]))) {  
        $adminController->approuveCommentAdmin($url[2]);
    }

    else if (($url[1] == 'alert')&&(is_numeric($url[2]))) {
        // appele function alert comment
        $commentController->alertComment($url[2]);
    }

    /*-----------------Delete Comment---------------------*/
    else if (($url[1] == 'deleteComment')&&(is_numeric($url[2]))) {
        $adminController->deleteCommentAdmin($url[2]);
    }

    /*-----------------Approuve chapter---------------------*/
    else if (($url[1] == 'confirmPoint')&&(is_numeric($url[2]))) {  
        $commentController->editPoint($url[2]);
    }

    /*-----------------Modified chapter---------------------*/
    else if ($url[1] == 'editPost' && is_numeric($url[2]))  {
        if ($url[3] == 'prepare') {
            $adminController->editPostPrepare($url[2]);
        }
        else { 
            $title = $_POST['title'];
            $content = $_POST['content'];
            $adminController->editPostAdmin($url[2], $title, $content);
            header('Location: '. $_POST['URL_PATH'] . 'administration' . '/' . 'adminChapter'); 
        }
    }

    /*-----------------Delete chapter---------------------*/
    else if (($url[1] == 'deletePost')&&(is_numeric($url[2]))) {
        $adminController->deletePostAdmin($url[2]);
    }

    /*else if ($url[1] == 'create') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $adminController->postAdmin($name, $description, $start, $end);
        
    } */

} 

else {
    echo ('notfound');
}