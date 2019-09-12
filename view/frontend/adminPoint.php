<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>

<ul id="list_post">
        <h2 class="adminH2">Liste des équipes</h2>
        <p class="adminParagraphe"><em>Points de fin de séance</em></p>

        <?php while($posts = $post->fetch()) { ?>

        <br /><li><?= $posts['teamName']?><br />
        
        <a class="btn_valid" href="<?= $_POST['URL_PATH'] ?>administration/editPoint/<?= $posts['id'] ?>/prepare">Valider</a></li>
        <?php } ?>
  </ul>