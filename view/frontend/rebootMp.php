<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php'); 
?>


<div align="center">
    <h2>Réinitialisation du mot de passe</h2>
    <div align="left">
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Mot de passe :</label>
        <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
        <label>Confirmation - mot de passe :</label>
        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
        <input type="submit" value="Mettre à jour mon profil"/>
    </form>
    <?php if(isset($msg)) { echo '<font color="red">'.$msg."</font>"; } ?>
    </div>
</div>
