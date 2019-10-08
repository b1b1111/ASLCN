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

    public function getMember($id) {
        $db = $this->newManager->dbConnect(); 
        $membre= $db->prepare("SELECT * FROM membres WHERE id = ?"); 
        $membre->execute(array($id));  
        return $membre;
    }

    /*******************************************MESSAGE***************************************** */

    public function ajaxSysPres($pseudo, $message) {
        $db = $this->newManager->dbConnect(); 
        $insertion = $db->prepare('INSERT INTO messages VALUES("", :pseudo, :message)');
        $insertion->execute(array(
            'pseudo' => $pseudo,
            'message' => $message
        ));
    }

    public function ajaxMessage($id) {
        $db = $this->newManager->dbConnect(); 
        $requete = $db->prepare('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
        $requete->execute(array("id" => $id));
        return $requete;
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

    public function getEventPres($getid) {
        $db = $this->newManager->dbConnect(); 
        $check = $db->prepare('SELECT id FROM events WHERE id = ?');
        $check->execute(array($getid));
        return $check;
    }

    public function getEvOrder($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM events WHERE id= ? ORDER BY start"); 
        $req->execute(array($id));  
        $event = $req->fetchAll(); 
        return $event;
    }

    public function getEv($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM events WHERE id= ?"); 
        $req->execute(array($id));  
        $event = $req->fetchAll(); 
        return $event;
    }
        
    public function vote($id_event) {
        $id_event = (int)$id_event;
        $db = $this->newManager->dbConnect();
        $query = $db->mysql_query("SELECT vote FROM events WHERE id='$id_event'");
        while($rows=mysql_fetch_assoc($query)) {
            echo $rows['vote'];
        }
    }

    public function updateEv($id, $presents, $absents) {
        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE events SET presents = ?, absents = ? WHERE id = ?');
        $post = $request->execute(array($presents, $absents, $id));   
        return $post; 
    }

    public function deletEv($id) {
        $db = $this->newManager->dbConnect();
        $request = $db->prepare('DELETE FROM events WHERE events.id = ?');
        $post = $request->execute(array($id));   
        return $post; 
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

    /*****************************************PRESENCE********************************************* */
    /********************************************************************************************** */

    public function getAllPres() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM membres ORDER BY pseudo"); 
        $req->execute(array());  
        return $req;
    }

    public function getPresence($id_event,$user_id) {
        $db = $this->newManager->dbConnect(); 
        $check_pres = $db->prepare('SELECT id FROM presences WHERE id_event = ? AND id_membre = ?');
        $check_pres->execute(array($id_event,$user_id));
        return $check_pres;
    }

    public function getPres($id) {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM membres WHERE id= ?"); 
        $req->execute(array($id));  
        $post = $req->fetchAll(); 
        return $post;
    }

    public function pres() {
        $db = $this->newManager->dbConnect(); 
        $req= $db->prepare("SELECT * FROM presences ORDER BY id_membre"); 
        $req->execute(array()); 
        return $req;
    }
    
    public function getTablePres($id) {
        $db = $this->newManager->dbConnect();
        $request = $db->prepare('SELECT *
        FROM membres
        RIGHT JOIN events
        ON events.id = presences.id_membre');
        $request->execute(array($id)); 
        $post = $request->fetchAll();   
        return $post; 
    }
}

