<?php
$utilisateur=$_SESSION['login'];
global $pageTitle;
if ($pageTitle == "Mes images") {
    Image::getImageUtilisateur($dbh, $utilisateur);
}
else{
    
}
