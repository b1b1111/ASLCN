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
            <th>Present</th>
            <th>Absent</th>
            <th>Valider</th>
        </tr>
    </thead>
    <?php {
        echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $p['name'] . "</td>"; 
                echo "<td>" . "  <form method='post' action=''>  " . '<input type="radio" name="present" value="oui" />' . "<label for='oui'>" . $p['name'] . "</label>" . "</td>"; 
                echo "<td>" . '<input type="radio" name="present" value="non" />' . "<label for='non'>" . $p['name'] . "</label>" . "</td>";
                echo "<td>" . '<input type="submit" value="valider" />' . "</form>" . "</td>";
            echo "</tr>";
        echo "</tbody>";   
        } ?>   
</table>

<?php } ?>

