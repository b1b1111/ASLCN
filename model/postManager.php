<?php

namespace Model;

require_once("model/manager.php");
class postManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();  
    }

    public function getPosts() {

        $db = $this->newManager->dbConnect();
        
        $request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY id DESC');    
        return $request;
    }

    public function getPost($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('SELECT * FROM events WHERE id = ?');

        $request->execute(array($id));
        $post = $request->fetch();
        return $post;
    }

    // Création d'un nouveau chapitre
    public function addPost($name, $description, $start, $end) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('INSERT INTO events (name, description, start, end) VALUES (?, ?, ?, ?)');
        $request->execute(array($name, $description, $start, $end));
    }

    // Appouver un chapitre
    public function approuvePost($id) {
        
        $db = $this->newManager->dbConnect();
        $req = $db->prepare('UPDATE posts SET approuve = 1 WHERE id = ?');
        $req->execute(array($id));
    }

    // Modification d'un chapitre
    public function updatePost($id, $title, $content) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $post = $request->execute(array($title, $content, $id));
        return $post;    
    }

    // Supprimer un chapitre
    public function deletePost($id) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = ?');
        $suppr = $request->execute(array($id));
        return $suppr;
    }

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

    public function getTeamName($teamName) {
        $db = $this->newManager->dbConnect();
        $req = $db->prepare("SELECT * FROM membres WHERE teamName = ?");
        $req->execute(array($teamName));
        return $req;
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

    /**
     * Fonction recup code.
     */
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

    public function editMembre() {
        $db = $this->newManager->dbConnect();
        $requser = $db->prepare("SELECT * FROM membres WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
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

    /**
     * Edition du mot de passe
     */

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

    /*****************************************TEAM************************************************* */
    /********************************************************************************************** */

    public function getTeam($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM team WHERE id = ?"); 
        $req->execute(array($id));  
        $post = $req->fetch(); 
        return $post;
    }

    // Modification d'un chapitre
    public function updateTeam($id, $teamName, $teamPoint, $teamRank) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE team SET teamName = ?, teamPoint = ?, teamRank = ? WHERE id = ?');
        $post = $request->execute(array($id, $teamName, $teamPoint, $teamRank));
        return $post;    
    }
}

