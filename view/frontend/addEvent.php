<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
render('header', ['title' => 'Ajouter un évènement']);
require('controller/add.php');
?>

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
      <button class="btn btn-primary">Ajouter l'évènement</button>
    </div>
  </form>
</div>
<?php render('footer'); ?>