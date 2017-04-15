<?php

$utilisateur = $_SESSION['login'];
global $pageTitle;
if ($pageTitle == "Mes images") {
    if ($_SESSION['admin'] == false) {
        $resultat = Image::getImageUtilisateur($dbh, $utilisateur);
        //var_dump($resultat);
        if (isset($resultat)) {
            //var_dump($resultat);
            echo '<div id="gallery1" style="margin:0px auto; display:none;">';
            foreach ($resultat as $name) {
                //print($name);
                echo <<<CHAINE_DE_FIN
                    <a ref="http://google.fr">
                        <img alt="$name"
                            src="miniatures/mini_$name.jpg"
                            data-image="images/$name.jpg"
                            data-description="This is $name"
                        >
                    </a>
CHAINE_DE_FIN;
            }
            echo <<<CHAINE_DE_FIN
                </div>

                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery("#gallery1").unitegallery({
                            gallery_theme: "tiles",
                            tiles_type: "nested",
                            tile_link_newpage:false,
                            tile_show_link_icon: true
                        });
                    });
                </script>
CHAINE_DE_FIN;
        } else {
            echo "<div>Vous n'avez pas soumis de photos</div>";
        }
    }
    if ($_SESSION['admin'] == true) {
        $resultat = Image::getAllImages($dbh);
        //var_dump($resultat);
        echo '<div id="gallery1" style="margin:0px auto; display:none;">';
        foreach ($resultat as $name) {
            echo <<<CHAINE_DE_FIN
                    <a ref="http://google.fr">
                        <img alt="$name"
                            src="miniatures/mini_$name.jpg"
                            data-image="images/$name.jpg"
                            data-description="This is $name"
                        >
                    </a>
CHAINE_DE_FIN;
            }
            echo <<<CHAINE_DE_FIN
                </div>

                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery("#gallery1").unitegallery({
                            gallery_theme: "tiles",
                            tiles_type: "nested",
                            tile_link_newpage:false,
                            tile_show_link_icon: true
                        });
                    });
                </script>
CHAINE_DE_FIN;
    }
}


