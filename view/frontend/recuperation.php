<?php 
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>
<h1>Mot de passe oublié</h1>
        
    <form method="POST" action="">
        <input type="email" name="mailconnect" placeholder="Mail" />
        <br /><br />
        <input type="submit" name="formRecup" value="Réinitialiser votre mot de passe." />
        </form>
    <?php
    if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
    }
    ?>