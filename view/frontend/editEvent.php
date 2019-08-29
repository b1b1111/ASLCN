<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
require('controller/edit.php');
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>calendrier">Retour au calendrier</a>

<div class="container">

  <h1>Modifier l'évènement
    <small><?= h($event->getName()); ?></small>
  </h1>

  <form action="" method="post" class="form">
      <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
    <div class="form-group">
      <button class="btn btn-primary">Modifier l'évènement</button>
      <button class="btn btn-primary">Supprimer l'évènement</button>
    </div>
  </form>
</div>
