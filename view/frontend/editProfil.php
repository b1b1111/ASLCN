<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>profil"> Retour au profil</a>

<div align="center">
    <h2>Edition de mon profil</h2>
    <div align="center">
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Pseudo :</label>
        <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $_SESSION['pseudo']; ?>" /><br /><br />
        <label>Nom d'équipe :</label>
        <input type="text" name="newteam" placeholder="Equipe" value="<?php echo $_SESSION['teamName']; ?>" /><br /><br />
        <label>Mail :</label>
        <input type="text" name="newmail" placeholder="Mail" value="<?php echo $_SESSION['mail']; ?>" /><br /><br />
        <label>Mot de passe :</label>
        <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
        <label>Confirmation - mot de passe :</label>
        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
        <input type="submit" value="Mettre à jour mon profil"/>
    </form>
    <?php if(isset($msg)) { echo '<font color="red">'.$msg."</font>"; } ?>
    </div>
</div>

