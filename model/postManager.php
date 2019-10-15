<?php

namespace Model;

require_once("model/manager.php");
class postManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();  
    }


    /*********************************GET PROFIL************************************************** */
    public function getAllUser() {
        $db = $this->newManager->dbConnect();
        $request = $db->query('SELECT * FROM membres ORDER BY id DESC');    
        return $request;
    }

    public function getMail($mail) {
        $db = $this->newManager->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM membres WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailExiste = $reqmail->rowCount();
        return $mailExiste;
    }

    public function getUniqCode($uniqCode) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE uniqCode = ?");
        $req->execute(array($uniqCode));
        $codeUnique = $req->rowCount();
        return $codeUnique;
    }

    public function getPseudo($pseudo) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE pseudo = ?");
        $req->execute(array($pseudo));
        $pseudoExist = $req->rowCount();
        return $pseudoExist;
    }

    public function getTeamsName($teamName) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE teamName = ?");
        $req->execute(array($teamName));
        return $req;
    }

    public function getTeamsId($id_team) {
        $db = $this->newManager->dbConnect();
        $post = $db->prepare("SELECT * FROM membres WHERE id_team = ?");
        $post->execute(array($id_team));
        return $post;
    }

    public function getMembre($pseudo, $teamName, $mail, $mdp) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("INSERT INTO membres(pseudo, teamName, mail, mdp) VALUES(?, ?, ?, ?)");
        $req->execute(array($pseudo, $teamName, $mail, $mdp));
    }

    public function userExist($mailconnect, $mdpconnect) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
        $req->execute(array($mailconnect, $mdpconnect));
        $userexist = $req->rowCount();
        return !!$userexist;
    }

 /*********************************RECUP CODE************************************************ */
    public function userRecup($mdpRecup) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mdp = ?");
        $req->execute(array($mdpRecup));
        $userexist = $req->rowCount();
        return !!$userexist;
    }

    public function getUserRecup($mdpRecup) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mdp = ?");
        $req->execute(array($mdpRecup));
        $user = $req->fetch();
        return $user;
    }

    public function recupMP($mailconnect) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mail = ?");
        $req->execute(array($mailconnect));
        $userexist = $req->rowCount();
        return !!$userexist;
    }

    public function getUser($mailconnect, $mdpconnect) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
        $req->execute(array($mailconnect, $mdpconnect));
        $user = $req->fetch();
        return $user;
    }

    public function recupUser($mailconnect) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE mail = ?");
        $req->execute(array($mailconnect));
        $user = $req->fetch();
        return $user;
    }

    public function getUsers($getid) {
        $db = $this->newManager->dbConnect();
        $requser = $db->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        return $userinfo;
    }

    /*****************************************EDIT PROFIL***************************************** */

    public function editMembre() {
        $db = $this->newManager->dbConnect();
        $requser = $db->prepare("SELECT * FROM membres WHERE 1");
        $requser->execute();
        $user = $requser->fetch();
        return $user;
    }

    /**
     * Edition pseudo
     */

    public function editPseudo() {
        $db = $this->newManager->dbConnect();
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $db->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
    }

     /**
     * Edition teamName
     */

    public function editTeam() {
        $db = $this->newManager->dbConnect();
        $newteam = htmlspecialchars($_POST['newteam']);
        $insertteam = $db->prepare("UPDATE membres SET teamName = ? WHERE id = ?");
        $insertteam->execute(array($newteam, $_SESSION['id']));
    }

    /**
     * Edition du mail.
     */
    
    public function editMail() {
        $db = $this->newManager->dbConnect();
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $db->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
    }

    /**
     * Edition du mot de passe
     */

    public function editmdp() {
        $mdp1 = sha1($_POST['newmdp1']);
        $db = $this->newManager->dbConnect();
        $insertmdp = $db->prepare("UPDATE membres SET mdp = ? WHERE id = ?");
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
    }

    /***************************************** RECUP MDP******************************************* */

    public function modifMdp() {
        $mdp1 = sha1($_POST['newmdp1']);
        $db = $this->newManager->dbConnect();
        $insertmdp = $db->prepare("UPDATE membres SET mdp = ?");
        $insertmdp->execute(array($mdp1));
    }

    public function verifReq($verif_code) {
        $db = $this->newManager->dbConnect();
        $verif_req = $db->prepare('SELECT * FROM membres WHERE mail = ? AND mdp = ?');
        $verif_req->execute(array($_SESSION['mailconnect'], $verif_code));
        $verifReq = $verif_req->rowCount();
        return $verifReq;
    }

    public function prepareMail($mailconnect) {
        $db = $this->newManager->dbConnect();
        $mail_recup_exist = $db->prepare('SELECT id FROM membres WHERE mail = ?');
        $mail_recup_exist->execute(array($mailconnect));
        $mail_recup_exist = $mail_recup_exist->rowCount();
    }

    public function updateCode($recup_code,$mailconnect) {
        $db = $this->newManager->dbConnect();
        $recup_insert = $db->prepare('UPDATE membres SET mdp = ? WHERE mail = ?');
        $recup_insert->execute(array($recup_code,$mailconnect));
    }

    public function insertCode($mailconnect,$recup_code) {
        $db = $this->newManager->dbConnect();
        $recup_insert = $db->prepare('INSERT INTO membres(mail,mdp) VALUES (?, ?)');
        $recup_insert->execute(array($mailconnect,$recup_code));
    }

    public function getMailconnect($mailconnect) {
        $db = $this->newManager->dbConnect();
        $mailexist = $db->prepare('SELECT id,pseudo FROM membres WHERE mail = ?');
        $mailexist->execute(array($mailconnect));
        $mailexist_count = $mailexist->rowCount();
        return $mailexist_count;
    }

    /*****************************************MEMBRE*********************************************** */
    /********************************************************************************************** */
    public function getMembers() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM membres ORDER BY teamName"); 
        $req->execute();  
        $membre = $req->fetchAll(); 
        return $membre;
    }

    public function getMember($id) {
        $db = $this->newManager->dbConnect(); 
        $membre= $db->prepare("SELECT * FROM membres WHERE id = ?"); 
        $membre->execute(array($id));  
        return $membre;
    }
}