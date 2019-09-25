<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>
<link href="<?= $_POST['URL_PATH'] ?>public/css/profil.css" type="text/css" rel="stylesheet"/>
<?php 
if($_SESSION['id'] == 0) {
?>
    <div id="text_inscription">
        <h2>Inscription</h2>

        <p class="paragraphe" >Pour vous inscrire suivez le lien - <a href="<?= $_POST['URL_PATH'] ?>profil/inscription">Inscription</a></p>
        
    </div>

    <div id="text_connexion">
        <h2>Connexion</h2>

        <p class="paragraphe">Pour vous connecter - <a href="<?= $_POST['URL_PATH'] ?>profil/connexion">Connexion</a><br />
        Vous avez oubliez votre mot de passe ? Merci de suivre ce lien - <a href="<?= $_POST['URL_PATH'] ?>profil/recuperation">Recupération du mot de passe</a>
        </p>
    </div>   
<?php
}
else {
?>

    <div id="profil">
        <h2>Profil de <?php echo $_SESSION['pseudo']; ?></h2>
        
        <?php
            if(isset($_SESSION['id']) == $_SESSION['id']) { ?> <br />


<nav class="profil_menu">
   <input type="checkbox" href="#" class="profil_menu-open" name="profil_menu-open" id="profil_menu-open" />
   <label class="profil_menu-open-button" for="profil_menu-open">
    <span class="lines line-1"></span>
    <span class="lines line-2"></span>
    <span class="lines line-3"></span>
  </label>

   <a href="<?= $_POST['URL_PATH'] ?>calendrier/addEvent" class="profil_menu-item blue"><img src="../aslcn/public/images/icons/add.png" alt="icon_add"/></a>
   <a href="<?= $_POST['URL_PATH'] ?>profil/editPresence/<?= $_SESSION['id'] ?>/pres" class="profil_menu-item green"><img src="../aslcn/public/images/icons/update.png" alt="icon_update"/></a>
   <a href="<?= $_POST['URL_PATH'] ?>profil/editProfil" class="profil_menu-item red"><img src="../aslcn/public/images/icons/profil.png" alt="icon_profil"/></a>
   <a href="<?= $_POST['URL_PATH'] ?>profil/deconnexion" class="profil_menu-item purple"> <img src="../aslcn/public/images/icons/deco.png" alt="icon_deco"/> </a>
</nav>
  
<?php } ?>

<?php  if($_SESSION['admin'] == true) { ?>
    <br />
    <a id="link_admin" href="<?= $_POST['URL_PATH'] ?>administration">Accéder à l'espace administration</a>

<?php } ?>
</div>
<?php } ?>


