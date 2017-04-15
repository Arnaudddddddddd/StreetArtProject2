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
                    <a href="http://localhost/StreetArtProject2/StreetArtProject/index.php?page=description&todo=$name&iD=9">
                        <img alt="$name"
                            src="images/$name.jpg"
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
                            tile_enable_image_effect:true,
                            tile_image_effect_type: "sepia",
                            tile_enable_overlay: true,
                            tile_show_link_icon: true,
                            tile_link_newpage: false,
                            tiles_min_columns: 1,
                            tiles_max_columns: 3
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
                    <a href="http://localhost/StreetArtProject2/StreetArtProject/index.php?page=description&todo=$name&iD=9">
                        <img alt="$name"
                            src="images/$name.jpg"
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
                            tile_enable_image_effect:true,
                            tile_image_effect_type: "sepia",
                            tile_enable_overlay: true,
                            tile_show_link_icon: true,
                            tile_link_newpage: false,
                            tiles_min_columns: 1,
                            tiles_max_columns: 3
                        });
                    });
                </script>
CHAINE_DE_FIN;
    }
}


