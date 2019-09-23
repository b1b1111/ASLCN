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

    public function editPresence($id, $present, $absent) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("UPDATE membres SET present = ?, absent = ? WHERE id= ?"); 
        $req->execute(array($id, $present, $absent));  
        $membre = $req->fetchAll(); 
        return $membre;
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

    /*****************************************EVENT************************************************ */
    /********************************************************************************************** */

    public function getEvents() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM events ORDER BY start"); 
        $req->execute();  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function getEventId($getid) {
        $db = $this->newManager->dbConnect();   
        $check = $db->prepare('SELECT id FROM events WHERE id = ?');
        $check->execute(array($getid));
        return $check;
    }

    /*****************************************PRESENCE********************************************* */
    /********************************************************************************************** */

    /*********************************PRESENCE************************************ */

    public function checkPres($getid,$sessionid) {
        $db = $this->newManager->dbConnect();  
        $check_pres = $db->prepare('SELECT id FROM presences WHERE id_events = ? AND id_membres = ?');
        $check_pres->execute(array($getid,$sessionid));
        return $check_pres;
    }

    public function insertPres($getid, $sessionid) {
        $db = $this->newManager->dbConnect();  
        $ins = $db->prepare('INSERT INTO presences (id_events, id_membres) VALUES (?, ?)');
        $ins->execute(array($getid, $sessionid));
        return $ins;
    }

    public function deletePres($getid,$sessionid) {
        $db = $this->newManager->dbConnect();
        $del = $db->prepare('DELETE FROM presences WHERE id_events = ? AND id_membres = ?');
        $del->execute(array($getid,$sessionid));
        return $del;
    }

    public function selectPres($id) {
        $db = $this->newManager->dbConnect();
        $pres = $db->prepare('SELECT id FROM presences WHERE id_events = ?');
        $pres->execute(array($id));
        return $pres;
    }

    /*********************************ABSENCE************************************ */
    public function deleteAbs($getid,$sessionid) {
        $db = $this->newManager->dbConnect();  
        $del = $db->prepare('DELETE FROM absences WHERE id_events = ? AND id_membres = ?');
        $del->execute(array($getid,$sessionid));
        return $del;
    }

    public function checkAbs($getid,$sessionid) {
        $db = $this->newManager->dbConnect();
        $check_abs = $db->prepare('SELECT id FROM absences WHERE id_events = ? AND id_membres = ?');
        $check_abs->execute(array($getid,$sessionid));
        return $check_abs;
    }

    public function insertAbs($getid, $sessionid) {
        $db = $this->newManager->dbConnect();
        $ins = $db->prepare('INSERT INTO absences (id_events, id_membres) VALUES (?, ?)');
        $ins->execute(array($getid, $sessionid));
        return $ins;
    }

    public function selectAbs($id) {
        $db = $this->newManager->dbConnect();
        $abs = $db->prepare('SELECT id FROM absences WHERE id_events = ?');
        $abs->execute(array($id));
        return $abs;
    }

    /*****************************************TEAM************************************************* */
    /********************************************************************************************** */

    public function getTeams() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM team ORDER BY teamPoint DESC"); 
        $req->execute();  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function getTeam($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM team WHERE id= ?"); 
        $req->execute(array($id));  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function updateTeam($id, $teamPoint) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE team SET teamPoint = ? WHERE id = ?');
        $post = $request->execute(array($teamPoint, $id));   
        return $post; 
    }

    /*****************************************SCORE************************************************ */
    /********************************************************************************************** */

    public function getScore($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM score WHERE id= ?"); 
        $req->execute(array($id));  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function addPresence($present, $absent) {
        $db = $this->newManager->dbConnect();
        $request = $db->prepare('INSERT INTO membres (present, absent) VALUES (?, ?)');
        $request->execute(array($present, $absent));
    }

}

