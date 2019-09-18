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
        </tr>
    </thead>
    <?php {
        foreach($post as $e) {
            echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $e['name'] . "</td>";
                echo "<td>" . $e['start'] . "</td>";  
                echo "</tr>";
            echo "</tbody>";   
        }   
    } ?>
</table>