<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<h2><a href="<?= $_POST['URL_PATH'] ?>administration">Retour à l'administration'</a></h2>

<h2 class="adminH2">Points de séance</h2>

    <?php while($a = $post->fetch()) { ?>

    <form id="modif_articles" method="post" action="administration/editTeam
    /<?= $a['id'] ?>">

        <br /><label for="teamName"><?= $a['teamName'] ?></label>&nbsp;&nbsp;<br />
        <input type="text" class="point" name="point" value="<?= $a['teamPoint'] ?>" />&nbsp;&nbsp;
        <input type="submit" class="btn_valid" value="Valider" onclick="ModifPost()">
        
    </form>

    <?php } ?>