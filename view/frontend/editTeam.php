<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<h2><a href="<?= $_POST['URL_PATH'] ?>administration">Retour à l'administration</a></h2>

    <h2 class="adminH2">Points de séance</h2>

    <?php foreach($post as $team) { ?>

    <form id="modif_articles" method="post" action="administration/editTeam/<?= $team['id'] ?>">

        <label for="teamPoint">Point de l'équipe</label>
        <input type="text" class="teamPoint" name="teamPoint" value="<?= $team['teamPoint'] ?>" />
        <input type="submit" class="btn_valid" value="Modifier" onclick="ModifPost()"/>
    </form>

    <?php } ?>