<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
require('controller/add.php');
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>calendrier"> Retour au calendrier</a>

<div class="container">

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        Merci de corriger vos erreurs
      </div>
    <?php endif; ?>

  <h1>Ajouter un évènement</h1>
  <form action="" method="post" class="form">
      <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
    <div class="form-group">
      <button class="btn btn-event">Ajouter l'évènement</button>
    </div>
  </form>
</div>