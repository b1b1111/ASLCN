<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>

<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>
<div id="inscription" >
    <h2>Inscription</h2>
    <form method="POST" action="" id="form_inscription">
    
        <label for="pseudo"></label>
        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />

        <label for="team"></label>
        <input type="text" placeholder="Votre équipe" id="teamName" name="teamName" value="<?php if(isset($teamName)) { echo $teamName; } ?>" />

        <label for="idteam"></label>
        <input type="text" placeholder="" id="idteam" name="idteam" value="<?php if(isset($id_team)) { echo $id_team; } ?>" />

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
