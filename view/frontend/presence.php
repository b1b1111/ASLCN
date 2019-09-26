<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>profil"> Retour au profil</a>

<?php foreach($post as $p) { ?>

<form id="modif_presence" method="post" action="profil/editPresence/<?= $p['id'] ?>">

    <p><?= $p['name'] ?></p>

    <label for="present">Present</label>
    <input type="radio" id="presence" name="present" value="present"="<?= $p['present'] ?>" />&nbsp;&nbsp;
    <label for="absent">Absent</label>
    <input type="radio" id="absence" name="present" value="absent"="<?= $p['absent'] ?>" />&nbsp;&nbsp;
    <input type="submit" class="btn_valid" value="Valider" onclick="ModifPres()">
    
</form>

<table class="table-responsive">
    <thead>
        <tr>
            <th>Evenement</th>
            <th>Présent</th>
            <th>Absent</th>
            <th>Valider</th>
        </tr>
    </thead>
    <?php {
        echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $p['name'] . "</td>"; 
                echo "<td>" . "  <form method='post' action=''>  " . '<input type="radio" name="presents" value="oui" />' . "<label for='oui'>" . $p['presents'] . "</label>" . "</td>"; 
                echo "<td>" . '<input type="radio" name="presents" value="non" />' . "<label for='non'>" . $p['absents'] . "</label>" . "</td>";
                echo "<td>" . '<input type="submit" value="valider" />' . "</form>" . "</td>";
            echo "</tr>";
        echo "</tbody>";   
        } ?>   
</table>

<?php } ?>

