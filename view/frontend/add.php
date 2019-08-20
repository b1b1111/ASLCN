<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<div class="container">

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        Merci de corriger vos erreurs
      </div>
    <?php endif; ?>

<h1>Ajouter un évènement</h1>   
  <form id="form_articles" method="post" action="create">
        <label for="name">Titre de la rencontre</label><br />
        <input type="text" class="title" name="title"/><br /><br />
        
        <label for="date">Date</label>
        <input type="date" name="date"><br />

        <label for="start">Début de rencontre</label>
        <input type="time" name="start"><br />

        <label for="end">Fin de rencontre</label>
        <input type="time" name="end"><br />

        <label for="date">Description</label>
        <textarea id="full-featured" name="description" contenteditable="true"></textarea><br />
        
        <button class="btn_valid" onclick="ConfirmChapt()">Editer chapitre</button><br /><br />
  </form>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>