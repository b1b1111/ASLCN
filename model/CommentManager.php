<?php

namespace Model;

require_once("model/manager.php");
class CommentManager extends manager {

    function __construct() {
        $this->newManager = new \Model\Manager();      
    }

    //Retourne tous les commentaires
    public function getAllComments() {

        $db = $this->newManager->dbConnect();
        $comments = $db->query('SELECT id, author, content, alert, approuve, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');

        return $comments;
    }

    //Retourne les commentaires d'un 
    public function getComments($post_id) {

        $db = $this->newManager->dbConnect();
        $comments = $db->prepare('SELECT id, author, content, alert, approuve, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));

        return $comments;
    }

    // Creation d'un commentaire
    public function postComment($post_id, $author, $content) {
        $db = $this->newManager->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $comments->execute(array($post_id, $author, $content));
    }

    // Signaler un commentaire.
    public function reportComment($id) {
        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET alert = 1 WHERE id = ?');
        $request->execute(array($id));
    }

    // Modifier un commentaire
    public function updateComment($id, $content) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE comments SET content = ?, comment_date = NOW() WHERE id = ?');
        $comment = $request->execute(array($content, $id));
        // Résultat
        return $comment;
    }

    // Appouver un commentaire
    public function approuveComment($id) {
        
        $db = $this->newManager->dbConnect();
        $req = $db->prepare('UPDATE comments SET approuve = 1 WHERE id = ?');
        $req->execute(array($id));
    }

    // Supprimer un commentaire
    public function deleteComment($id) {
        
        $db = $this->newManager->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $supprime = $req->execute(array($id));
        return $supprime;
    }

        //Retourne tous les commentaires
    public function getTeam() {

        $db = $this->newManager->dbConnect();
        $comments = $db->query('SELECT * FROM team WHERE 1');

        return $comments;
    }

    public function updateTeam($id, $teamName, $teamPoint, $rank) {

        $db = $this->newManager->dbConnect();
        $request = $db->prepare('UPDATE team SET id = ?, teamName = ?, teamPoint = ?, rank = ?, WHERE 1');
        $upTeam = $request->execute(array($id, $teamName, $teamPoint, $rank));
        // Résultat
        return $upTeam;
    }


}