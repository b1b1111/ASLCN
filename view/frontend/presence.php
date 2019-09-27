<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>profil"> Retour au profil</a>

<?php foreach($post as $p) { ?>

<table class="table-responsive">
    <thead>
        <tr>
            <th>Evenement</th>
            <th>Nom</th>
            <th>Valider</th>
        </tr>
    </thead>
    <?php {
        echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $p['id_event'] . "</td>"; 
                echo "<td>" . $p['id_membre'] . "</td>"; 
                echo "<td>" . '<input type="submit" value="valider" />' . "</form>" . "</td>";
            echo "</tr>";
        echo "</tbody>";   
        } ?>   
</table>

<?php } ?>

