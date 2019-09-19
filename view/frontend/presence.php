<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php'); 
?>

<table class="table-responsive">
    <thead>
        <tr>
            <th>Evenement</th>
            <th>Date</th>
            <th>Présent</th>
            <th>Absent</th>
            <th>Valider</th>
        </tr>
    </thead>
    <?php {
        foreach($post as $e) {
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>" . $e['name'] . "</td>";
                    echo "<td>" . $e['start'] . "</td>"; 
                    echo "<td>" . "  <form method='post' action=''>  " . '<input type="radio" name="present" value="oui" />' . "<label for='oui'>" . 'oui' . "</label>" . "</td>"; 
                    echo "<td>" . '<input type="radio" name="present" value="nom" />' . "<label for='non'>" . 'non' . "</label>" . "</td>";
                    echo "<td>" . '<input type="submit" value="valider" />' . "</form>" . "</td>";
                echo "</tr>";
            echo "</tbody>";   
        }   
    } ?>
</table>