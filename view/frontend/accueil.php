<?php
$title = 'ASLCN';
require('header.php');
require('html.php');
require('template.php');
?>
<link href="<?= $_POST['URL_PATH'] ?>public/css/slideshow.css" type="text/css" rel="stylesheet"/>

<section id="section_one">

    <div id="presentation">
        <h1>Bonjour, </h1>
        <p>
            Bienvenue sur le site de l'ASLCN <br />
            
        <h5 class="signature">ASLCN</h5>
        
    </div>

</section>

<div class="separator" ></div>

<section id="section_two">

    <div id="resum">
        <h1 id="title_resum">L'Association </h1>
        <p>
        <div class="container" id="container">
        <div class="caption" id="slider-caption">
            <div class="caption-heading">
            <h1>Lorem Ipsum</h1>
            </div>
            <div class="caption-subhead"><span>dolor sit amet, consectetur adipiscing elit. </span></div><a class="btn" href="#">Sit Amet</a>
        </div>
        <div class="left-col" id="left-col">
            <div id="left-slider"></div>
        </div>
        <ul class="nav">
            <li class="slide-up"> <a href="#"><</a></li>
            <li class="slide-down"> <a id="down_button" href="#">></a></li>
        </ul>
        </div>

    </div>

</section>

<section id="section_three">

    <div id="resum_ranking">
        <h1 id="title_ranking">Prochaine rencontre</h1>
        <p>
          
            Ut suscipit nisl quam, non bibendum urna semper ut.

    </div>

</section>

<footer>

    <div>
        <div id="bio">
          
        </div>
    </div>
</footer>

<script src="/aslcn/public/js/slideshow.js"></script>