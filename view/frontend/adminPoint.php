<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>

<ul id="list_point">
        <h2 class="adminH2">tableau des points</h2>
        <p class="adminParagraphe"><em>Modifier les points d'équipe.</em></p>

        <?php foreach($post as $a) { ?>

        <br /><li><?= $a['id'] ?> : <?= $a['teamName']?><br />
       
        <a class="admin_modif" href="<?= $_POST['URL_PATH'] ?>administration/editTeam/<?= $a['id'] ?>/prepare">Modification</a></li>
        <?php } ?>
  </ul>

