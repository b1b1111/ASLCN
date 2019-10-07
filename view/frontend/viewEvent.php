<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
require('controller/edit.php');
?>
<link href="<?= $_POST['URL_PATH'] ?>public/css/presence.css" type="text/css" rel="stylesheet"/>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>calendrier">Retour au calendrier</a>

<div class="container">

  <h1>Evènement
    <small><?= h($event->getName()); ?></small>
  </h1>

<form action="" method="post" class="form">
  <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="teamName">Equipe</label>
            <input id="teamName" type="text" disabled required class="form-control" name="teamName" value="<?= isset($data['teamName']) ? h($data['teamName']) : ''; ?>">
            <?php if (isset($errors['teamName'])): ?>
                <small class="form-text text-muted"><?= $errors['teanName']; ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Titre</label>
            <input id="name" type="text" disabled required class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : ''; ?>">
            <?php if (isset($errors['name'])): ?>
                <small class="form-text text-muted"><?= $errors['name']; ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="date">Date</label>
            <input id="date" type="date" disabled required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
            <?php if (isset($errors['date'])): ?>
                <small class="form-text text-muted"><?= $errors['date']; ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start">Démarrage</label>
            <input id="start" type="time" disabled required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>">
            <?php if (isset($errors['start'])): ?>
                <small class="form-text text-muted"><?= $errors['start']; ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="end">Fin</label>
            <input id="end" type="time" disabled required class="form-control" name="end" placeholder="HH:MM" value="<?= isset($data['end']) ? h($data['end']) : ''; ?>">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" disabled id="description" class="form-control"><?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</form>

<article class="event"> 
  <header>
    <a href=""><img src="https://via.placeholder.com/150"/></a>
    <h1>Rencontre des bests</h1>
  </header>
 
  <div class="content">
    <div class="data">
      <span class="time">19h72</span>
      <span class="registered"><span class="number">12</span> personnes participent</span>
    </div>
    <div class="date">
      <div class="day">06</div>
      <div class="month">juillet</div>
    </div>
  </div>
  
  <footer>
    <button class="decline">Décliner</button>
    <button class="join">Rejoindre</button>
  </footer>
</article>

</div>

        <p id="p3">blabla</p>

<div id="messages">

<?php

// on se connecte à notre base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=aslcn', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['submit'])){ // si on a envoyé des données avec le formulaire

    if(!empty($_POST['pseudo'])){ // si les variables ne sont pas vides
    
        $pseudo = mysql_real_escape_string($_POST['pseudo']); // on sécurise nos données

        // puis on entre les données en base de données :
        $insertion = $bdd->prepare('INSERT INTO messages VALUES("", :pseudo)');
        $insertion->execute(array(
            'pseudo' => $pseudo,
        ));

    }
    else{
        echo "Vous avez oublié de remplir un des champs !";
    }


    if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

        $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier
    
        // on récupère les messages ayant un id plus grand que celui donné
        $requete = $db->prepare('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
        $requete->execute(array("id" => $id));
    
        $messages = null;
    
        // on inscrit tous les nouveaux messages dans une variable
        while($donnees = $requete->fetch()){
            $messages .= "<p id=\"" . $donnees['id'] . "\">" . $donnees['pseudo'] . "</p>";
        }
    
        echo $messages; // enfin, on retourne les messages à notre script JS
    
    }
} ?>
</div>

	<form method="POST" action="">
        Pseudo : <input type="text" name="pseudo" id="pseudo" /><br />
	    <input type="submit" name="submit" value="Prejent ?" id="envoi" />
	</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="/aslcn/public/js/presence.js"></script>
<script src="/aslcn/public/js/pres.js"></script>