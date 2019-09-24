<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>


<a href="<?= $_POST['URL_PATH'] ?>profil">Retour à la page d'accueil du profil</a>

<div id="form_connexion" >
    <h2>Recupération mot de passe</h2><br /><br />
    <p class="paragraphe">Un email avec un code de récupération vient de vous être envoyé</p>
    
    <form method="POST" action="" name="Verify">
        <input type="password" name="mdpRecup" placeholder="Code de verification" />
        <br /><br />
        <input type="submit" name="formRecup" value="Modifiez le mot de passe" />
        </form>
    <?php
    if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
    }
    ?>
</div>

