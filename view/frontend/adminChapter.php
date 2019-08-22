<?php $title = 'ASLCN'; ?>
<?php require('header.php');
?>

<?php require('html.php'); ?>
<?php require('template.php'); ?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p><br />

<a href="<?= $_POST['URL_PATH'] ?>administration">Retour au sommaire de la page administration.</a>

<fieldset>
      <legend>Classement des équipes</legend>
      <p>
<?php
$teams = $manager->getList($team->nom());

if (empty($teams))
{
  echo 'Vous n\'avez pas selectionné d\'équipe';
}

else
{
  foreach ($teams as $unteam)
    echo '<a href="?setPoint=', $unteam->id(), '">', htmlspecialchars($unteam->teamName()), '</a> (teamPoint : ', $unteam->teamPoint(), ')<br />';
}
?>
      </p>
    </fieldset>

