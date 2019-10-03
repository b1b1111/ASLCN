<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<p class="paragraphe"> Vous êtes administrateur <?php echo $_SESSION['pseudo']; ?>.</p>
<a class="back_link" href="<?= $_POST['URL_PATH'] ?>profil"> Retour au profil</a>

<div id="list_point">
      <h2 class="adminH2">tableau des points</h2>
      <p class="adminParagraphe"><em>Modifier les points d'équipe.</em></p>

      <?php
      foreach($post as $team) { ?>
      <?php echo $team['teamName'] ?>
      <a class="calendar__button" href="<?= $_POST['URL_PATH'] ?>administration/editTeam/<?= $team['id'] ?>/prepare">M</a>
      <?php } ?>

</div>

<table class="table-responsive">
      <thead>
      <tr>
            <th>Equipe</th>
            <th>Points</th>
      </tr>
      </thead>
      <?php {
      foreach($post as $team) {
            echo "<tbody>";
                  echo "<tr>";
                  echo "<td>" . $team['teamName'] . "</td>"; 
                  echo "<td>" . $team['teamPoint'] . "</td>";   
                  echo "</tr>";
            echo "</tbody>";   
      }   
      } ?>
</table>

