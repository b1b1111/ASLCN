function surligne(champ, erreur) {
    if(erreur)
        champ.style.backgroundColor = "rgb(228, 127, 101)";
    else
        champ.style.backgroundColor = "";
}

function verifMail(mail) {
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(mail.value))
   {
      surligne(mail, true);
      return false;
   }
   else
   {
      surligne(mail, false);
      return true;
   }
}

function verifPassword(password)
{
   if(password.value.length < 3 || password.value.length > 25)
   {
      surligne(password, true);
      return false;
   }
   else
   {
      surligne(password, false);
      return true;
   }
}

function verifForm(f)
{
   var mailOk = verifMail(f.mail);
   var passwordOk = verifPassword(f.password);
   
   if(mailOk && passwordOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

