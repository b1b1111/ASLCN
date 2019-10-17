<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>
<link href="<?= $_POST['URL_PATH'] ?>public/css/picture.css" type="text/css" rel="stylesheet"/>



<?php  if($_SESSION['id'] == true) { ?>

<div id="conversation"> 
    <form action="" method="post" id="form_picture">
        <p>
            <label for="pseudo"><span class="number">1</span>&nbsp;Pseudo</label><br /> 
            <input type="text" value="<?php echo $_SESSION['pseudo']; ?>" name="pseudo" id="pseudo" /><br />

        <label for="message"><span class="number">2</span>&nbsp;Un p'tit mot ?</label><br />
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer" />
        </p>
        </form>

    <div class="msg_picture">
        <?php
        while ($donnees = $reponse->fetch()) {  
        
          echo '<p class="p_picture" ><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> ' . ' - ' . htmlspecialchars($donnees['message']) . '</p>';
        }
        $reponse->closeCursor();
        ?>
    </div>
</div>

<?php } ?>

<div class='container'>
  <div class='card-left'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/joachim.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
        <p>La remontée des kékéhuetes, énorme !!</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/sisco.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Tu nous manque vieux. Mais tu avais l'air de te faire chier avec nous ...</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/4ever.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Ouiii la cuillère en bois les gars :)</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/gland.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Allez donne tous sur la grande ligne droite !</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/petanque.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Première sortie pour les petits Aslciniens, santé !</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/the_wall.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Voila, ça c'est se donner pour le sport.</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/sam.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>J'espère que cette superbe raquette repose fièrement sur un mur.</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/soirée.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Parce que les fingers games c'était sacrément chouette quand même.</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/maillot.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Un tropher pour le plus beau maillot cette année ?</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/toon.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Le fidèle casque à pointes. Direction le Berlin.</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/benantoch.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>C'était pour quoi déjà ce logo ? :D</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/logo.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Parce qu'il faut bien un début a cette histoire.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/champions.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Bravo aux 4 gars 1 fille pour cette première année.</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/fab.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Une asso de gars taillés pour la compèt.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/lycée.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Un grand merci au lycée michelet</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='<?= $_POST['URL_PATH'] ?>public/images/souvenirs/capillo.jpg' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Cap ou pas cap ?</p>
    </div>
  </div>
</div>
