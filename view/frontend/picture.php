<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>
<link href="<?= $_POST['URL_PATH'] ?>public/css/picture.css" type="text/css" rel="stylesheet"/>

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
        
            echo '<p class="p_picture" ><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> ' . htmlspecialchars($donnees['message']) . '</p>';
        }
        $reponse->closeCursor();
        ?>
    </div>
</div>

<div class='container'>
  <div class='card-left'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/551852/pexels-photo-551852.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/1011334/pexels-photo-1011334.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Quisque cursus, metus vitae pharetra auctor.</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/35828/soap-bubble-colorful-ball-soapy-water.jpg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Ut eu diam at pede suscipit sodales.</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/701855/pexels-photo-701855.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Donec lacus nunc, viverra nec, blandit vel, egestas et, augue.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/668295/pexels-photo-668295.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/63238/pexels-photo-63238.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Ut eu diam at pede suscipit sodales.</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/997725/pexels-photo-997725.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/585581/pexels-photo-585581.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Quisque cursus, metus vitae pharetra auctor.</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/532561/pexels-photo-532561.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/279376/pexels-photo-279376.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Integer lacinia sollicitudin massa. Cras metus.</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/701855/pexels-photo-701855.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-left'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/262577/pexels-photo-262577.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Ut eu diam at pede suscipit sodales.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/978342/pexels-photo-978342.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class='card-bottom'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/305831/pexels-photo-305831.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Quisque cursus, metus vitae pharetra auctor.</p>
    </div>
  </div>
  <div class='card-top'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/355728/pexels-photo-355728.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Donec lacus nunc, viverra nec, blandit vel, egestas et, augue.</p>
    </div>
  </div>
  <div class='card-right'>
    <div class='card-image'>
      <img src='https://images.pexels.com/photos/775907/pexels-photo-775907.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260' alt="img_galerie"/>
    </div>
    <div class='card-text'>
      <p>Ut eu diam at pede suscipit sodales.</p>
    </div>
  </div>
</div>
