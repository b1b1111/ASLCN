<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<h2><a href="<?= $_POST['URL_PATH'] ?>administration">Retour à l'administration'</a></h2>

<h2 class="adminH2">Points de séance</h2>

    <form id="modif_articles" method="post" action="administration/editPost/<?= $post['id'] ?>">

        <label for="teamName">Equipe</label><br />
        <input type="number" class="point" name="point" value="<?= $post['teamPoint'] ?>" /><br /><br />

        <input type="submit" class="btn_valid" value="Valider" onclick="ModifPost()">
        
  </form>