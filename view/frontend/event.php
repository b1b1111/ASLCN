<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php'); 
?>

<h2 id="link_chapter" ><a href="<?= $_POST['URL_PATH'] ?>calendrier/">Retour au calendrier</a></h2>

<div class="news">
    <h3>
        <?php echo html_entity_decode($post['name']) ?>
    </h3>

    <div id="content_news"> 
        <p>
            <?php echo html_entity_decode($post['description']) ?>
        </p>
    </div>  

    <div id="start_rencontre"> 
        <p>
            <?php echo html_entity_decode($post['start']) ?>
        </p>
    </div>  

    <div id="end_rencontre"> 
        <p>
            <?php echo html_entity_decode($post['end']) ?>
        </p>
    </div>   
     
</div>

