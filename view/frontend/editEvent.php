<?php
require '../controller/edit.php';

render('header', ['title' => $event->getName()]);
?>

<div class="container">

  <h1>Editer l'évènement
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

<?php render('footer'); ?>