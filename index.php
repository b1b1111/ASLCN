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

    else if($url[1] == 'viewEvent') {
        $postController->viewEvent();
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
        $postController->getClassement();
    }
    else {
        $postController->classement($url[0]);
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

    else if($url[1] == 'presence') {
        $postController->presence();
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
        $postController->adminPoint();
    }

    else if ($url[1] == 'editTeam' && is_numeric($url[2]))  {
        if ($url[3] == 'prepare') {  
            $adminController->editTeamPrepare($url[2]);
        }
        else { 
            $teamPoint = $_POST['teamPoint'];
            $adminController->editTeamAdmin($url[2], $teamPoint);
            header('Location: '. $_POST['URL_PATH'] . 'administration'); 
        }
    }
} 

else {
    echo ('notfound');
}