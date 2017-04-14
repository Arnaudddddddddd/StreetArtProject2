<?php

$image = $_GET["todo"];
$link = "images/".$image.".jpg";
$resultat = Image::getImageId($dbh,$_GET["iD"]);

    echo <<<END
<table>
    <tr>
        <td>
END;
         print '<img src="'.$link.'"/>';

echo "         
        </td>
        <td>
            <strong>".$resultat->nom."</strong>
            <div>Utilisateur: ".$resultat->utilisateur."</div><br>
            <div>".$resultat->description."</div>";    

