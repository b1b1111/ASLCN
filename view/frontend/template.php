<header>
    <input type='checkbox' id='head_menu'>
        <label class='menu' for='head_menu'>
            <div class='barry'>
                <span class='bar'></span>
                <span class='bar'></span>
                <span class='bar'></span>
                <span class='bar'></span>
            </div>
                
            <ul>
            <?php  if(!isset($_SESSION['id']) || $_SESSION['id'] == 0) { ?>
                <li><a id='home' href='http://aslcn.fr/index'>Accueil</a></li>
                <li><a id='contact' href='http://aslcn.fr/contact'>Contact</a></li>
                <li><a id='class' href='http://aslcn.fr/classement'>Classement</a></li>
                <li><a id='picture' href='http://aslcn.fr/picture'>Souvenirs</a></li>
                <li><a id='team' href='http://aslcn.fr/galerie'>Team</a></li>
                <li><a id='profil' href='http://aslcn.fr/profil'>Profil</a></li>
            <?php 
            }
            else {
            ?>
                <li><a id='home' href='http://aslcn.fr/index'>Accueil</a></li>
                <li><a id='calendrier' href='http://aslcn.fr/calendrier'>Calendrier</a></li>
                <li><a id='contact' href='http://aslcn.fr/contact'>Contact</a></li>
                <li><a id='class' href='http://aslcn.fr/classement'>Classement</a></li>
                <li><a id='picture' href='http://aslcn.fr/picture'>Souvenirs</a></li>
                <li><a id='team' href='http://aslcn.fr/galerie'>Team</a></li>
                <li><a id='profil' href='http://aslcn.fr/profil'>Profil</a></li>
            <?php } ?>
            </ul>
        </label>

    <div class="header_content">
            <h1><a href="http://aslcn.fr/">ASLCN</a></h1>
            <h2>Association Sportive et Ludique des Copains Nantais</h2>
        </div>
   
</header>

        <script src="https://cdn.tiny.cloud/1/376mz5siri1y6bnkll7l26kltznbqkwp9mi2aorxqpadvuxj/tinymce/5/tinymce.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script src="<?= $_POST['URL_PATH'] ?>public/js/alert.js"></script>
        <script src="<?= $_POST['URL_PATH'] ?>public/js/verif.js"></script> 
        <script src="<?= $_POST['URL_PATH'] ?>public/js/classement.js"></script>
        <script src="<?= $_POST['URL_PATH'] ?>public/fullcalendar/lib/jquery.min.js"></script>
        <script src="<?= $_POST['URL_PATH'] ?>public/fullcalendar/lib/moment.min.js"></script>
        <script src="<?= $_POST['URL_PATH'] ?>public/fullcalendar/fullcalendar.min.js"></script>
        
    </body>
    
</html>