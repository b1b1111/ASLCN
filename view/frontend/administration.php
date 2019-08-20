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




