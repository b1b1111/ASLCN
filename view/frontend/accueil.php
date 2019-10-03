<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>
<div class="body">
    <div id="slider">
        <figure>
            <img src="../aslcn/public/images/slider/img1.jpg" alt="banner1">
            <img src="../aslcn//public/images/slider/img2.jpg" alt="banner2">
            <img src="../aslcn/public/images/slider/img3.jpg" alt="banner3">
            <img src="../aslcn/public/images/slider/img4.jpg" alt="banner4">
            <img src="../aslcn/public/images/slider/img5.jpg" alt="banner5">   
        </figure>
    </div>

<div class="separator" ></div>

<section id="section_two">

    <div id="resum">
        <h1 id="title_resum">L'Association </h1>
        
        <p>L'ASCN, ce n'est pas un fleuve, oh non ! c'est une compétition et tu en fais partie ...
        Tu vas avoir l'occasion de donner de ta personne dans l'effort et l'allégresse, dans le cadre d'un championnat multisports, un soir par semaine, d'octobre à juin. 
        </p>
        <p>Mais pas toutes les semaines, faut pas déconner! On a quand même une vie, une famille, du linge à sécher, des séries à terminer, un footing à caler, un peu de boulot accessoirement et peut-être une grosse fin de soirée au Berlin à gérer ...
        </p>
        <p>Maintenant, pose-toi les bonnes questions, fais le point sur ta condition physique, Prépare de suite Monsieur ou Madame à ne plus te voir le mercredi soir, achète une paire de running et surtout echauffe toi ça va piquer !!!
        </p>

    </div>

</section>

<section id="section_three">

    <aside id="list_section_three">
        <ul>   
            <li>
                <div class="logo_section_three">
                    <a href="<?= $_POST['URL_PATH'] ?>calendrier">
                        <img src="../aslcn/public/images/icons/calendar.png"/>
                    </a>
                    <h2>Une rencontre ?</h2>
                </div> 
            </li>                   
            <li>
                <div class="logo_section_three">
                    <a href="<?= $_POST['URL_PATH'] ?>classement">
                        <img src="../aslcn/public/images/icons/podium.png"/>
                    </a>
                    <h2>Le classement ?</h2>
                </div>
            </li>   
            <li>
                <div class="logo_section_three">
                    <a href="<?= $_POST['URL_PATH'] ?>contact"><img src="../aslcn/public/images/icons/mail.png"/></a>
                    <h2>Une question ?</h2>
                </div>
            </li>            
        </ul>         
    </aside>

</section>

<footer>
    <div>
        <p><a href="<?= $_POST['URL_PATH'] ?>mentions">Mentions légales</a> - site made with <img src="../aslcn/public/images/icons/icon_love.png" alt="icon_love"> by benjamin lefebvre</p>
    </div>
</footer>
</div>