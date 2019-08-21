/**
 * Alert mise en ligne d'un commentaire
 */
function Message() {
    var msg="Votre commentaire est en ligne";
    console.log(msg)
    alert(msg);
}

/**
 * Alert confirmation de la suppresion d'un commentaire
 */
function SupprCom() {
    var msg="Vous avez supprimer un commentaire";
    console.log(msg)
    alert(msg);
}

/**
 * Alert approuve d'un commentaire
 */
function ConfirmApp() {
      var msg="Vous avez approuvez le commentaire";
      alert(msg);
}

/**
 * Alert nouveau chapitre en ligne
 */
function ConfirmChapt() {
    var msg="Votre nouveau chapitre est en ligne";
    alert(msg);
}

/**
 * Alert confirmation de suppression d'un article
 */
function SupprPost() {
    var msg="Vous avez supprimer un article";
    alert(msg);
}

/**
 * Alert confirmation de modification d'un article
 */
function ModifPost() {
    var msg="Votre chapitre est modifié";
    alert(msg);
}

/**
 * Alert confirmation de signalement d'un commentaire.
 */
function Signal() {
    var msg="Vous avez signalé un commentaire";
    alert(msg);
}

/**
 * Alert confirmation de création du nouveau mot de passe
 */
function NewMdp() {
    var msg="Votre mot de passe est mis à jour";
    alert(msg);
}

/**
 * Alert confirmation d'envoie du mail
 */
function SendMail() {
    var msg="Votre email est envoyé";
    alert(msg);
}

function change_color(n)
{
	// Modification des Class :
	var i;
	for (i=1; i<5; i++){
		if(i==n){ // on ajoute la class offre_current
			document.getElementById('color_' + i).className = "navcolor color_current";
		} else {
			document.getElementById('color_' + i).className = "navcolor";
		}
	}
	return false;
}