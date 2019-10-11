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