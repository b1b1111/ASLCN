<?php $title = 'ASLCN'; ?>
<?php require('header.php');
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p><br />

<a href="<?= $_POST['URL_PATH'] ?>administration">Retour au sommaire de la page administration.</a>

<ul id="list_post">
        <h2 class="adminH2">Liste des chapitres</h2>
        <p class="adminParagraphe"><em>Modifier ou supprimer les chapitres.</em></p>

        <?php while($a = $posts->fetch()) { ?>

        <br /><li><?= $a['id'] ?> : <?= $a['title']?><br />
        <a class="btn_suppr" onclick="SupprPost()"href="<?= $_POST['URL_PATH'] ?>administration/deletePost/<?= $a['id'] ?>">Supprimer</a>
        &nbsp;&nbsp;
        <a class="admin_modif" href="<?= $_POST['URL_PATH'] ?>administration/editPost/<?= $a['id'] ?>/prepare">Modification</a></li>
        <?php } ?>
  </ul>

