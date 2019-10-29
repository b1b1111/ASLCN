<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>

<div id="table_class">

    <table class="table-responsive1">
        <thead>
            <tr>
                <th class="position_fixed">Classement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                </tr>
                <td>2</td>
                </tr>
                <td>3</td>
                </tr>
                <td>4</td>
                </tr>
                <td>5</td>
                </tr>
                <td>6</td>
                </tr>
                <td>7</td>
                </tr>
                <td>8</td>
            </tr>
        </tbody>
    </table>
      
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

</div>

<h5>Tableau des points</h5>

<table>
    <thead>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>Rémi *</th>
        <th>Forfait</th>
    </thead>
    <tbody>
        <tr>
            <td>20</td>
            <td>16</td>
            <td>13</td>
            <td>11</td>
            <td>9</td>
            <td>7</td>
            <td>6</td>
            <td>5</td>
            <td>2</td>
            <td>0</td>
        </tr>
    </tbody>
</table>

<p class="p_classement">
    (Suivants la séance proposée les points peuvent légèrements varier)<br /><br />
    * le « Rémi sans famille » est un joueur seul de son équipe qui vient quand même s'amuser et glaner 2 points pour la bonne cause (4 points si le Rémi finit sur le podium de la rencontre)<br /><br />
    ** Il faut au moins être 2 joueurs d'une équipe par rencontre pour gagner les points...
</p>