<?php

namespace Controller;

require_once('model/classementManager.php');

class classementController {

  private $_point;
  private $id;
  private $teamName;
  private $teamPoint;
  private $rank;


  // Déclarations des constantes en rapport avec la force.
  const POINT_INITIAL = 0;
  const POINT_FIRST = 20;
  const POINT_SECOND = 15;
  const POINT_THIRD = 12;
  const POINT_FOURTH = 10;
  const POINT_FIFTH = 8;
  const POINT_SIXTH = 6;
  const POINT_SEVENTH = 5;
  const POINT_EIGHTH = 4;

  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
    $this->classementManager = new \Model\classementManager();  
  }

    public function editPoint(classementController $team) {
        return $team->recupPoint();
    }

    public function recupPoint() {
        if($this->_point === 1) {
            return self::POINT_FIRST;
        }

        if($this->_point === 2) {
            return self::POINT_SECOND;
        }

        if($this->_point === 3) {
            return self::POINT_THIRD;
        }

        if($this->_point === 4) {
            return self::POINT_FOURTH;
        }

        if($this->_point === 5) {
            return self::POINT_FIFTH;
        }

        if($this->_point === 6) {
            return self::POINT_SIXTH;
        }

        if($this->_point === 7) {
            return self::POINT_SEVENTH;
        }

        if($this->_point === 8) {
            return self::POINT_EIGHTH;
        }
    }

    /**
     * Liste des getters
     * méthode chargée de renvoyer la valeur d'un attribut.
     */

    public function id() {
        return $this->_id;
    }

    public function teamName() {
        return $this->_teamName;
    }

    public function teamPoint() {
        return $this->_teamPoint;
    }

    public function rank() {
        return $this->_rank;
    }

    
    public function setPoint($point) {
        $teamPoint = $this->classementManager->pointTeam();
        // On vérifie qu'on nous donne bien soit une « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
        if (in_array($point, [self::POINT_INITIAL, self::POINT_FIRST, self::POINT_SECOND, self::POINT_THIRD, self::POINT_FOURTH, self::POINT_FIFTH, self::POINT_SIXTH, self::POINT_SEVENTH, self::POINT_EIGHTH]))
        {
        $this->_point = $point;
        }
    }
  
    /**
     * Liste des setters.
     * méthode chargée d'assigner une valeur à un attribut
     */
    public function setId($id) {
      // On convertit l'argument en nombre entier.
      // Si c'en était déjà un, rien ne changera.
      // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $id = (int) $id;
        
        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0) {
            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->_id = $id;
        }
    }

    public function setTeamName($teamName) {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($teamName)) {
            $this->_teamName = $teamName;
        }
    }

    public function setRank($rank) {
        $rank = (int) $rank;
        
        if ($rank >= 1 && $rank <= 8) {
            $this->_rank = $rank;
        }
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
            // On appelle le setter.
                $this->$method($value);
            }
        }
    }
}


