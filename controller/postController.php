<?php

namespace Controller;

require_once('model/postManager.php');
require_once('model/CommentManager.php');
class postController {

    function __construct() {
        $this->postManager = new \Model\postManager();  
        $this->commentManager = new \Model\CommentManager();  
    }

    //Page accueil
    public function getPosts($id) {
        $posts = $this->postManager->getEvOrder($id);
        require 'view/frontend/accueil.php';
    }

    //Affiche le calendrier.
    public function printCalendar() {
        $post = $this->postManager->getMembers();
        require('view/frontend/viewCalendar.php');
    }

    //Affiche la creation d'un event.
    public function addEvent() {
        require('view/frontend/addEvent.php');
    }

    //Affiche la modification d'un event.
    public function editEvent() {
        require('view/frontend/editEvent.php');
    }

    //Affiche un event.
    public function viewEvents($getid) {
        $post = $this->postManager->getEventId($getid);  
    }

    // Afficher un evenement.
    public function showCalendar($id) {
        $post = $this->postManager->getPost($id);
        $posts = $this->postManager->getAllUser();
        require 'view/frontend/event.php'; 
    }

   //Envoie de mail
   public function contact() {
        
    if(isset($_POST['mailform'])) {
        if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) {
            //Version d'encodage mail.
            $header="MIME-Version: 1.0\r\n";
            $header.='From:"ASLCN"<aslcn44000@gmail.com>'."\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';
            
            $message='
            <html>
                <body>
                    <div align="center">
                        
                        <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
                        <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
                        <br />
                        '.nl2br($_POST['message']).'
                        <br />
                    
                    </div>
                </body>
            </html>
            ';
            
            mail('aslcn44000@gmail.com', "Contact - ASLCN", $message, $header);
        }
    }

    if(isset($message))
    {
        header('Location: '. $_POST['URL_PATH'] . 'contact'); 
        exit;
    }
    
    $this->postManager->getPosts();
    require 'view/frontend/contact.php'; 
    }

    /**
     * Formulaire d'inscription a l'espace membre.
     */
    public function inscription() {
        if(isset($_POST['forminscription'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $teamName = htmlspecialchars($_POST['teamName']);
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = sha1($_POST['mdp']);

            if(!empty($_POST['pseudo']) AND !empty($_POST['teamName']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])) {
                $pseudolength = strlen($pseudo);
                $req = $this->postManager->getPseudo($pseudo);
                if($pseudolength <= 255) {
                    if($req == 0) {
                        $req = $this->postManager->getTeamsName($teamName);
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $reqmail = $this->postManager->getMail($mail);
                                if($reqmail == 0) {
                                    $insertmbr = $this->postManager->getMembre($pseudo, $teamName, $mail, $mdp);
                                    $erreur = "Votre compte a bien été créé ! <a href=\"http://localhost/aslcn/profil\">Me connecter</a>";
                                } 
                                else {
                                $erreur = "Adresse mail déjà utilisée !";
                                }
                        } 
                        else {
                            $erreur = "Votre adresse mail n'est pas valide !";
                        }
                    }
                    else {
                    $erreur = "Pseudo déjà utilisé !";
                    }
                }
                else {
                $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
                }
            } 
            else {
            $erreur = "Tous les champs doivent être complétés !";
            }
        }
        $this->postManager->getPosts();
        require 'view/frontend/inscription.php';
    }

    /**
     * Formulaire de connexion a l'espace membre.
     */
    public function connexion() {
        if(isset($_POST['formconnexion'])) {
            $mailconnect = htmlspecialchars($_POST['mailconnect']);
            $mdpconnect = sha1($_POST['mdpconnect']);

            if(!empty($mailconnect) AND !empty($mdpconnect)) {
            $req = $this->postManager->userExist($mailconnect, $mdpconnect);
                if($req) {
                    $user = $this->postManager->getUser($mailconnect, $mdpconnect);
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['teamName'] = $user['teamName'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['admin'] = !!$user['admin'];
                    header('Location: '. $_POST['URL_PATH'] . 'profil?id='.$user['id']);
                } 
                else {
                    $erreur = "Mauvais mail ou mot de passe !";
                }
            } 
            else {
            $erreur = "Tous les champs doivent être complétés !";
            }
        }
        
        $this->postManager->getPosts();
        require 'view/frontend/connexion.php'; 
    }


    /**
     * Page du profil membre.
     */
    public function profil(){
        $req = $this->postManager->editMembre();
        if(isset($_GET['id']) AND $_GET['id'] > 0) {
            $getid = intval($_GET['id']);
        }
        require 'view/frontend/profil.php';
    }

    /**
     * Page de modification du profil.
     */
    public function editProfil() {
        $req = $this->postManager->editMembre();
        if(isset($_SESSION['id'])) {
            $user = $this->postManager->editMembre();
            if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
            $this->postManager->editPseudo();
            header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            }
            if(isset($_POST['newteam']) AND !empty($_POST['newteam']) AND $_POST['newteam'] != $user['teamName']) {
            $this->postManager->editTeam();
            header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            }
            if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
            $this->postManager->editMail();
            header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            }
            if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
            if($mdp1 == $mdp2) {
                $this->postManager->editMdp();
                header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
            } else {
                $msg = "Vos deux mot de passe ne correspondent pas !";
            }
            }
        }
        else {
            header('Location: '. $_POST['URL_PATH'] . 'profil');
        }

        require 'view/frontend/editProfil.php';
    }

    /**
     * Récupération du mot de passe.
     */
    public function recupMdp() {
        if(isset($_POST['formRecup'],$_POST['mailconnect'])) {

            if(!empty($_POST['mailconnect'])) {
                $mailconnect = htmlspecialchars($_POST['mailconnect']);
                if(filter_var($mailconnect,FILTER_VALIDATE_EMAIL)) { 
                $mailexist_count = $this->postManager->getMailconnect($mailconnect);
                if($mailexist_count == 1) {
                    $user = $this->postManager->recupUser($mailconnect);

                    $_SESSION['mailconnect'] = $mailconnect;
                    $recup_code = "";
                    for($i=0; $i < 8; $i++) { 
                        $recup_code .= mt_rand(0,9);
                    }
                    $_SESSION['recup_code'] == $recup_code;

                    $mail_recup_exist = $this->postManager->prepareMail($mailconnect);
                    if($mail_recup_exist == 1) {
                        
                    } else {
                        
                        $recup_insert = $this->postManager->updateCode($recup_code,$mailconnect);
                    }
                    
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['mail'] = $user['mail'];
                    $header="MIME-Version: 1.0\r\n";
                    $header.='From:"ASLCN"<benjamin.lefebvre04@gmail.com>'."\n";
                    $header.='Content-Type:text/html; charset="utf-8"'."\n";
                    $header.='Content-Transfer-Encoding: 8bit';
                    $message = '
                    <html>
                    <head>
                        <title>Récupération de mot de passe - ASLCN</title>
                        <meta charset="utf-8" />
                    </head>
                    <body>
                        <font color="#303030";>
                        <div align="center">
                            <table width="600px">
                            <tr>
                                <td>
                                
                                <div align="center">Bonjour <b>'.$_SESSION['pseudo'].'</b>,</div>
                                Voici votre code de récupération: <b>'.$recup_code.'</b>
                        
                                A bientôt sur <a href="http://localhost/aslcn%20ok/index/">ASLCN</a> !
                                
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                <font size="2">
                                    Ceci est un email automatique, merci de ne pas y répondre
                                </font>
                                </td>
                            </tr>
                            </table>
                        </div>
                        </font>
                    </body>
                    </html>
                    ';
                    mail($mailconnect, "Récupération de mot de passe - ASLCN", $message, $header);

                    header('Location: '. $_POST['URL_PATH'] . 'profil' . '/' . 'reboot?id='.$user['id']);
                } 
                else {
                    $erreur = "Cette adresse mail n'est pas enregistrée";
                }
            }
            else {
                $error = "Adresse mail invalide";
            }
            } 
            else {
                $error = "Veuillez entrer votre adresse mail";
            }
        }
        
        $this->postManager->getPosts();
        require 'view/frontend/recuperation.php'; 
    }

    /**
     * Verification code recuperation mdp.
     */
    public function connexionRecup() {
        if(isset($_POST['formRecup'])) {
            $mdpRecup = ($_POST['mdpRecup']);

            if(!empty($mdpRecup)) {
            $req = $this->postManager->userRecup($mdpRecup);
                if($req) {
                    $user = $this->postManager->getUserRecup($mdpRecup);
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['teamName'] = $user['teamName'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['admin'] = !!$user['admin'];
                    header('Location: '. $_POST['URL_PATH'] . 'profil' . '/' . 'editMP'); 
                } 
                else {
                    $erreur = "Mauvais mail ou mot de passe !";
                }
            } 
            else {
            $erreur = "Tous les champs doivent être complétés !";
            }
        }
        
        $this->postManager->getPosts();
        require 'view/frontend/reboot.php';
    }

    /**
     * Page de renouvellement du mot de passe.
     */
    public function editMP($getid) {
        $req = $this->postManager->getUsers($getid);    
        if(isset($_SESSION['id'])) {
            if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
                if($mdp1 == $mdp2) {
                    $this->postManager->editMdp();
                    header('Location: '. $_POST['URL_PATH'] .'profil?id=' . $_SESSION['id']);
                } 
                else {
                    $msg = "Vos deux mot de passe ne correspondent pas !";
                }
            }
        }
        require 'view/frontend/rebootMp.php';
    }


    /**
     * Deconnexion du profil
     */
    public function deconnexion() {
        $req = $this->postManager->getPosts();
        header('Location: '. $_POST['URL_PATH'] . 'profil');
        require 'view/frontend/deconnexion.php';
    }


    /**
     * Espace modifications des points administration.
     */
    public function adminPoint() {
        $post = $this->postManager->getTeams(); 
        require 'view/frontend/administration.php';
    }

    /**
     * Galerie equipe.
     */
    public function portfolio() {
        require 'view/frontend/portfolio.php';
    }

    public function error() {
        $posts = $this->postManager->getPosts();
        require 'view/frontend/404.php';
    }

    public function classement() {
        $post = $this->postManager->getTeams();
        require 'view/frontend/classement.php';
    }

    public function presence($id) {
        $post = $this->postManager->getEvents();
        $membre = $this->postManager->getMember($id);
        require 'view/frontend/presence.php';
    } 

    public function postPresence($present, $absent) {    
        $post = $this->postManager->addPresence($present, $absent);
        header('Location: '. $_POST['URL_PATH'] . 'profil');
    }

    public function editPres($id, $idmembres) {
        $post = $this->postManager->updatePres($id, $idmembres);
    }
    
}