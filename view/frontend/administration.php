<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>

<p class="linkAdmin">
    <a href="<?= $_POST['URL_PATH'] ?>administration/adminPoint" class="btn_valid" >Administration des points par équipes</a>
</p>



