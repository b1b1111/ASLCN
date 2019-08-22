<?php

namespace Benjamin\Aslcn\Model;

require_once("model/manager.php");
class classementManager extends manager  {

    function __construct() {
        $this->newManager = new \Benjamin\Aslcn\Model\Manager();      
    }

    public function pointTeam() {
        $db = $this->newManager->dbConnect();
        $request = $db->query('SELECT * FROM team');
        
        while ($team = $request->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.
        
        echo $team['teamName'], ' a ', $team['teamPoint'], ' et occupe le rang ', $team['rank'];
        }
    }

    /**
     * Exécute une requête COUNT() et retourne le teamNamebre de résultats retourné.
     */
    public function count() {
      return $this->_db->query('SELECT COUNT(*) FROM team')->fetchColumn();
    }
    
    /**
     * On veut voir si tel Team ayant pour id $info existe.
     */
    public function exists($info) {
      if (is_int($info)) {
        return (bool) $this->_db->query('SELECT COUNT(*) FROM team WHERE id = '.$info)->fetchColumn();
      }
      // Sinon, c'est qu'on veut vérifier que le teamName existe ou pas.
      $q = $this->_db->prepare('SELECT COUNT(*) FROM team WHERE teamName = :teamName');
      $q->execute([':teamName' => $info]);
      
      return (bool) $q->fetchColumn();
    }

    /**
     * Recupère la team et son ID
     * Sinon récuperation avec le teamName de la team.
     */
    
    public function get($info) {
      if (is_int($info)) {
        $q = $this->_db->query('SELECT id, teamName, teamPoint FROM team WHERE id = '.$info);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Team($donnees);
      }
      else {
        $q = $this->_db->prepare('SELECT id, teamName, teamPoint FROM team WHERE teamName = :teamName');
        $q->execute([':teamName' => $info]);
      
        return new Team($q->fetch(PDO::FETCH_ASSOC));
      }
    }

    /**
     * Retourne la liste des personnages dont le teamName n'est pas $teamName.
     * Le résultat sera un tableau d'instances de Personnage.
     */
    
    public function getList($teamName) {
      $persos = [];
      
      $q = $this->_db->prepare('SELECT id, teamName, teamPoint FROM team WHERE teamName <> :teamName ORDER BY teamName');
      $q->execute([':teamName' => $teamName]);
      
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
        $persos[] = new Team($donnees);
      }
      
      return $persos;
    }

    /**
     * Prépare une requête de type UPDATE.
     * Assignation des valeurs à la requête.
     * Exécution de la requête.
     */
    
    public function update(Team $perso) {
      $q = $this->_db->prepare('UPDATE team SET teamPoint = :teamPoint WHERE id = :id');
      
      $q->bindValue(':teamPoint', $perso->teamPoint(), PDO::PARAM_INT);
      $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
      
      $q->execute();
    }
}
