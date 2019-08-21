<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>

<p class="linkAdmin">
    <a href="<?= $_POST['URL_PATH'] ?>administration/adminComment" class="btn_valid" >Validez ou supprimer les commentaires</a>
</p>

<p class="linkAdmin">
    <a href="<?= $_POST['URL_PATH'] ?>administration/adminChapter" class="btn_valid" >Modifier ou supprimer les chapitres</a>
</p>

<h1>Ajouter un évènement</h1>   
  <form id="form_articles" method="post" action="administration/create">
        <label for="name">Titre de la rencontre</label><br />
        <input type="text" class="name" name="name"/><br /><br />
        
        <label for="date">Date</label>
        <input type="date" name="date"><br />

        <label for="start">Début de rencontre</label>
        <input type="time" name="start"><br />

        <label for="end">Fin de rencontre</label>
        <input type="time" name="end"><br />

        <label for="description">Description</label>
        <textarea id="full-featured" name="description"></textarea><br />
        
        <button class="btn_valid" onclick="ConfirmChapt()">Poster l'évènement</button><br /><br />
  </form>

<script>
  tinymce.init({
    selector: '#full-featured, #full-feat'
  });
</script>



