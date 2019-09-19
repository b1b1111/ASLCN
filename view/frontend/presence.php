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
        </tr>
    </thead>
    <?php {
        foreach($post as $e) {
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>" . $e['name'] . "</td>";
                    echo "<td>" . $e['start'] . "</td>"; 
                    echo "<td>" . '<input type="submit" value="Présent" />' . "</td>"; 
                    echo "<td>" . '<input type="submit" value="Absent" />' . "</td>";
                echo "</tr>";
            echo "</tbody>";   
        }   
    } ?>
</table>