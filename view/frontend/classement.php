<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php'); 
?>

    <form id="form_classement">
        <select name="team" onchange="ShowRank(this.value)">  
        <option value="">Selectionner une epreuve :</option>  
        <option value="1">4 gars 1 fille</option>  
        <option value="2">En avant les glands</option>  
        <option value="3">Skipailh BZH</option>  
        <option value="4">Capillo</option> 
        <option value="5">The Wall</option>
        <option value="6">4'Ever</option>
        <option value="7">???</option>
        <option value="8">Les kékéhuetes</option> 
        </select>  
    </form> 

    <br>  
    <div id="txt"></div>
      
    <table class="table-responsive">
        <thead>
            <tr>
                <th class="position">Classement</th>
                <th>Equipe</th>
                <th>Points</th>
            </tr>
        </thead>
        <?php {
            foreach($post as $team) {
                echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $team['teamRank'] . "</td>";
                    echo "<td>" . $team['teamName'] . "</td>"; 
                    echo "<td>" . $team['teamPoint'] . "</td>";   
                    echo "</tr>";
                echo "</tbody>";   
            }   
        } ?>
    </table>