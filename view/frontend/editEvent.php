<?php
$title = 'ASLCN';
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
      <button class="btn btn-event">Modifier l'évènement</button>
      <button class="btn btn-event">Supprimer l'évènement</button>
    </div>
  </form>
</div>
