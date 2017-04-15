<style>
    body{
        background-image: url('images/fondecranmotif.jpeg')
    }
</style>

<?php

$image = $_GET["todo"];
$link = "images/".$image.".jpg";
$id=$_GET["iD"];
$resultat = Image::getImageId($dbh,$_GET["iD"]);
if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
}
else{
    $delete=false;
}
$test = Image::estAUtilisateur($dbh,$_SESSION['login'],$_GET["iD"]);         

//Si c'est l'image de l'utilisateur, on affiche un bouton pour supprimer la photo
if($test or $_SESSION['admin']==true){
        if(!$delete){
    echo <<<CHAINE_DE_FIN
    <form class="form-inline" action="index.php?page=description&todo=$image&iD=$id&delete=true" method="post">
        <p><button type="submit" class="btn btn-default">Delete</button></p>
    
CHAINE_DE_FIN;
}
}
//Si c'est l'image de l'utilisateur, et qu'il a demandé à la supprimer, on lance le php
if($test and $delete){
    $verif = Image::supprimer($dbh, $_GET["iD"]);
    if($verif){
        echo "<meta http-equiv='Refresh' content='1; URL=http://localhost/StreetArtProject2/StreetArtProject/index.php?page=welcome'>";
        unlink($link);
        unlink('miniatures/mini_'.$image.'.jpg');   
    }
}
if(!$delete){
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
}

