<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php'); 
?>



<form id="modif_presence" method="post" action="profil/editPres/<?= $post['id'] ?>">

    <p class="paragraphe"><?php echo $_SESSION['pseudo']; ?> Merci de noter si vous êtes présent ou non.</p>
    <p><?= $post['name'] ?></p>
    

    <label for="present">Present</label>
    <input type="radio" id="presence" name="present" value="present"="<?= $post['present'] ?>" />&nbsp;&nbsp;
    <label for="absent">Absent</label>
    <input type="radio" id="absence" name="absent" value="absent"="<?= $post['absent'] ?>" />&nbsp;&nbsp;
    <input type="submit" class="btn_valid" value="Valider" onclick="ModifPres()">
    
</form>



