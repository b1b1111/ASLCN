<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php'); 
?>

<?php foreach($post as $p) { ?>

<form id="modif_presence" method="post" action="profil/editPres/<?= $p['id'] ?>">

    <p class="paragraphe"><?php echo $_SESSION['pseudo']; ?> Merci de noter si vous êtes présent ou non.</p>
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
            <th>Nom</th>
            <th>Présent</th>
            <th>Absent</th>
            <th>Valider</th>
        </tr>
    </thead>
    <?php {
        echo "<tbody>";
            echo "<tr>";
                echo "<td>" . $p['name'] . "</td>";
                echo "<td>" . $p['pseudo'] . "</td>"; 
                echo "<td>" . "  <form method='post' action='create'>  " . '<input type="radio" name="presents" value="oui" />' . "<label for='oui'>" . $p['presents'] . "</label>" . "</td>"; 
                echo "<td>" . '<input type="radio" name="presents" value="non" />' . "<label for='non'>" . $p['absents'] . "</label>" . "</td>";
                echo "<td>" . '<input type="submit" value="valider" />' . "</form>" . "</td>";
            echo "</tr>";
        echo "</tbody>";   
        } ?>   
</table>

<?php } ?>

