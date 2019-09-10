<?php $title = 'ASLCN'; ?>
<?php require('header.php');
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p><br />

<a href="<?= $_POST['URL_PATH'] ?>administration">Retour au sommaire de la page administration.</a>



