<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
require_once('model/postManager.php');
?>

      <form id="form_classement">
         <select name="team" onchange="ShowRank(this.value)">  
            <option value="">Selectionner une équipe :</option>  
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
      <div id="txt">Le classement des équipes</div>
      
      <table class="table-responsive">
      
        <thead>
            <tr>
                <th>Equipe</th>
                <th>Points</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>4 gars 1 fille</td>
                <td>0</td>
                <td>1er</td>
            </tr>
            <tr>
                <td>En avant les glands</td>
                <td>0</td>
                <td>2ème</td>
            </tr>
            <tr>
                <td>Skipailh BZH</td>
                <td>0</td>
                <td>3ème</td>
            </tr>
            <tr>
                <td>Capillo</td>
                <td>0</td>
                <td>4ème</td>
            </tr>
            <tr>
                <td>The Wall</td>
                <td>0</td>
                <td>5ème</td>
            </tr>
            <tr>
                <td>4'Ever</td>
                <td>0</td>
                <td>6ème</td>
            </tr>
            <tr>
                <td>Les kékéhuetes</td>
                <td>0</td>
                <td>7ème</td>
            </tr>
            <tr>
                <td>???</td>
                <td>0</td>
                <td>8ème</td>
            </tr>
        </tbody>
        
		<td><? echo $row['teamName']; ?></td>
		<td><? echo $row['teamPoint']; ?></td>
      <td><? echo $row['rank']; ?></td>
    
    </table>
     
