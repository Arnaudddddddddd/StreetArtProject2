<?php
$utilisateur=$_SESSION['login'];
global $pageTitle;
if ($pageTitle == "Mes images"){
    if($_SESSION['admin']==false) {
    $resultat = Image::getImageUtilisateur($dbh, $utilisateur);
    
    if(isset($resultat)){
        var_dump($resultat);
}
    else{
        echo "<div>Vous n'avez pas soumis de photos</div>";
    }}
    if($_SESSION['admin']==true){
       $resultat = Image::getAllImages($dbh); 
       var_dump($resultat);
    }
}


