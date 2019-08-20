<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php'); 
?>

<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>
<div id="inscription" >
    <h2>Inscription</h2>
    <form method="POST" action="" id="form_inscription">
    
        <label for="pseudo"></label>
        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />

        <label for="mail"></label>
        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />

        <label for="mdp"></label>
        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />

        <br />
        <input type="submit" name="forminscription" value="Je m'inscris" />
    
    </form>
    <br />
    <?php
    if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
    }
    ?>
</div>
