<?php
$utilisateur=$_SESSION['login'];
$images = Image::getImageUtilisateur($dbh, $utilisateur);
var_dump($images);
global $pageTitle;
if ($pageTitle == "Mes images") {
    Image::getImageUtilisateur($dbh, $utilisateur);
//    var_dump($images);
}
else{
    
}
