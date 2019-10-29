<?php $title = 'ASLCN'; ?>
<?php require('html.php'); ?>
<?php require('template.php'); ?>

<?php $_SESSION['id'] ?>
	<h2 id="contact_title">Formulaire de contact</h2><br />
	<form method="POST" action="" id="contact_form">
		<?php if(!isset($_SESSION['id']) || $_SESSION['id'] == 0) { 
		?>
		<input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />

		<?php
		}
		else {
		?>
		<input type="text" name="nom" placeholder="<?= $_SESSION['pseudo'] ?>" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
		<?php } ?>

		<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" onclick="verifMail(this)" /><br /><br />

		<textarea name="message" placeholder="Votre message" cols="20" rows="10"><?php 
				if(isset($_POST['message'])) { 
					echo $_POST['message']; 
				} 
			
				?></textarea><br /><br />
		
		<input id="btn_contact"  type="submit" value="Envoyer" name="mailform" onclick="SendMail()" />
		
	</form>
