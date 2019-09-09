<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>

<body>  
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
      <div id="txt">Les informations sur l'équipe ...</div>
     
</body>  