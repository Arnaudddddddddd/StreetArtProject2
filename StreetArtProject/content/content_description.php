<?php

$image = $_GET["todo"];
$link = "images/".$image.".jpg";
$resultat = Image::getImageId($dbh,$_GET["iD"]);

    echo <<<END
<table>
    <tr>
        <td>
END;
$largeur = 600;
$hauteur = Image::hauteurProportionnelle($resultat, $largeur);
         print '<img src="'.$link.'" width="$'.$largeur.'px" height="'.$hauteur.'px"/>';

echo "         
        </td>
        <td style='padding-left:20px;'>
            <strong>".$resultat->nom."</strong>
            <div>Utilisateur: ".$resultat->utilisateur."</div><br>
            <div>".$resultat->description."</div>";    

