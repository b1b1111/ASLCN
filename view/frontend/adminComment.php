<?php $title = 'ASLCN'; ?>
<?php require('header.php');
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p><br />

<a href="<?= $_POST['URL_PATH'] ?>administration">Retour au sommaire de la page administration.</a>

<ul id="list_comment">
      <h2 class="adminH2">Liste des commentaires</h2>
      <p class="adminParagraphe" ><em>Validez ou supprimer les commentaires.</em></p>

      <?php while($c = $comments->fetch()) { ?>

      <li><?= $c['id'] ?> : <?= $c['author'] ?> : <?= $c['content'] ?> <br />
      <?php 
      if ($c['approuve'] == 0) { ?>
      <a class="btn_valid" onclick="ConfirmApp()" href="<?= $_POST['URL_PATH'] ?>administration/confirm/<?= $c['id'] ?>">Approuver</a>
      <?php } ?>
      <?php if ($c['approuve'] == 1) {
      } ?>
      <?php if ($c['alert'] == 1) { ?>
      <p class="admin_signal">Commentaire signalé !</p>
      <?php } ?>
      &nbsp;&nbsp;
      <a class="btn_suppr" onclick="SupprCom()" href="<?= $_POST['URL_PATH'] ?>administration/deleteComment/<?= $c['id'] ?>">Supprimer</a></li><br />
      <?php } ?>
  </ul>
