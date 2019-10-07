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
    $postController->getPosts($url);
} 

else if ($url[0] == 'mentions') {
    $postController->mentions();
} 

/*--------------------------------------CALENDRIER----------------------------------------*/
else if($url[0] == 'calendrier') {
    if (empty($url[1])) {
        $postController->printCalendar();
    }

    else if($url[1] == 'viewEvent') {
         
        if (!empty($url[2]) && $url[2] == 'createComment') {

            $pseudo = $_POST['pseudo'];
            $adminController->ajaxPres($pseudo);
            header('Location: '. $_POST['URL_PATH'] . $url[0] . '/' . $url[1]);
        } 
        $adminController->viewPres($url[1]);   
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

/*--------------------------------------CONTACT----------------------------------------*/
else if($url[0] == 'present') {
    $adminController->getAllEv();
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

    else if($url[1] == 'connexion') {
        $postController->connexion();
    }

    else if($url[1] == 'inscription') {
        $postController->inscription();
    } 

    else if($url[1] == 'editProfil') {
        $postController->editProfil();
    }

    else if ($url[1] == 'editPres' && is_numeric($url[2])) {
        if ($url[3] == 'pres') {
            $adminController->getEv($url[2]);
        }  
           
        else { 
            $presents = $_POST['presents'];
            $absents = $_POST['absents'];
            $adminController->editEv($url[2], $presents, $absents);
        }
    }

    else if($url[1] == "deconnexion") {
        $postController->deconnexion();
    }

    else if($url[1] == "recuperation") {
        $postController->recupMdp();
    }

    else if($url[1] == "reboot") {
        $postController->connexionRecup();
    }

    else if($url[1] == 'editMP') {
        $postController->editMP($url[1]);
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