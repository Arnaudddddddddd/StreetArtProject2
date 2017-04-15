<?php

$utilisateur = $_SESSION['login'];
global $pageTitle;
if ($pageTitle == "Mes images") {
    if ($_SESSION['admin'] == false) {
        $resultat = Image::getImageUtilisateur2($dbh, $utilisateur);
        //var_dump($resultat);
        if (isset($resultat)) {
            //var_dump($resultat);
            echo '<div id="gallery1" style="margin:0px auto; display:none;">';
            foreach ($resultat as $res_aux){
                //var_dump($res_aux);
                $name = $res_aux["nom"];
                $id = $res_aux["id"];
                //print_r($id);
                echo <<<CHAINE_DE_FIN
                    <a href="http://localhost/StreetArtProject2/StreetArtProject/index.php?page=description&todo=$name&iD=$id">
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
        $resultat = Image::getAllImages2($dbh);
        //var_dump($resultat);
        echo '<div id="gallery1" style="margin:0px auto; display:none;">';
        foreach ($resultat as $res_aux){
                //var_dump($res_aux);
                $name = $res_aux["nom"];
                $id = $res_aux["id"];
                //print_r($id);
                echo <<<CHAINE_DE_FIN
                    <a href="http://localhost/StreetArtProject2/StreetArtProject/index.php?page=description&todo=$name&iD=$id">
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


