<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');

/**
 * if team === 1 
 *      team += 20
 * else if team == 2 
 *      team += 15
 * else if team == 3
 *      team += 12
 * else if team == 4
 *      team += 10 ...
 */

?>

<body>  
      <form>  
         <select name="team" onchange="ShowRank(this.value)">  
            <option value="">Selectionner une équipe :</option>  
            <option value="1">4 gars 1 fille</option>  
            <option value="2">En avant les glands</option>  
            <option value="3">Skipailh BZH</option>  
            <option value="4">Capillo</option> 
            <option value="5">The Wall</option>
            <option value="4">4'Ever</option>
            <option value="4">Les kékéhuetes</option>
            <option value="4">???</option> 
         </select>  
      </form>  
      <br>  
      <div id="txt">Les informations sur l'équipe seront listées ici ...</div>  
   </body>  