<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>

<div id="form_connexion" >
    <h2>Connexion</h2><br /><br />
    
    <form method="POST" action="" name="Verif" onsubmit="return verifForm(this)" >
        <input type="email" name="mailconnect" placeholder="Mail" onblur="verifMail(this)" />
        <input type="password" name="mdpconnect" placeholder="Mot de passe" onblur="verifPassword(this)" />
        <br /><br />
        <input type="submit" name="formconnexion" value="Se connecter" />
        </form>
    <?php
    if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
    }
    ?>
</div>

<p class="paragraphe" >Vous avez oubliez votre mot de passe ? Merci de suivre ce lien - <a href="<?= $_POST['URL_PATH'] ?>profil/recuperation">Recupération du mot de passe</a></p> 
       

<script src="/public/js/verif.js"></script>
