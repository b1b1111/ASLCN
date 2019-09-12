<?php
    function view_menu() {

        $tab_link_menu = array("index", "calendrier", "contact", "classement", "galerie", "profil");
        $tab_text_menu = array("Accueil", "Calendrier", "Contact", "Classement", "Galerie", "Connexion");

        if ($_SESSION['id'] != 0) {
            $tab_link_menu = array("index", "calendrier", "contact", "classement", "galerie", "profil");
            $tab_text_menu = array("Accueil", "Calendrier", "Contact", "Classement", "Galerie", "Profil");

            if($_SESSION['admin'] == true) {
                $tab_link_menu = array("index", "calendrier", "contact", "classement", "galerie", "profil", "administration");
                $tab_text_menu = array("Accueil", "Calendrier", "Contact", "Classement", "Galerie", "Profil", "Administration");
            }
        }

        $info = pathinfo($_SERVER['PHP_SELF']);

        $menu = "\n<div id=\"menu\">\n      <ul id=\"tabs\">\n";
        
            //boucle sur les deux tableaux
            foreach($tab_link_menu as $cle=>$link) {
                $menu .="<li";

                    if($info['basename'] == $link)
                        $menu .="class=\"active\"";

                    $menu .= "><a href=\"" . $_POST['URL_PATH'] . $link . "\">" . $tab_text_menu[$cle] . "</a></li>\n";
            }
            
            $menu .= "</ul>\n</div>";

            return $menu;
    }
?>

<?php
    function view_classement() {
        
        $tab_name = array("4 gars 1 fille", "En avant les glands", "Skipailh BZH", "Capillo", "The Wall", "4'Ever", "Les kékéhuetes", "8ème");

        $info = pathinfo($_SERVER['PHP_SELF']);

        $tab = "\n<div id=\"tabClassement\">\n      <ul id=\"tabs\">\n";
        
            foreach($tab_name as $cle=>$link) {
                $tab .="<li";

                    if($info['basename'] == $link)
                        $tab .="class=\"active\"";

                    $tab .= "><a href=\"" . $_POST['URL_PATH'] . $link . "\">" . $tab_name[$cle] . "</a></li>\n";
            }
           
            
            $tab .= "</ul>\n</div>";

            return $tab;
    }
?>