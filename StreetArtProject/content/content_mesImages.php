<?php
$utilisateur=$_SESSION['login'];
global $pageTitle;
if ($pageTitle == "Mes images") {
    $resultat = Image::getImageUtilisateur($dbh, $utilisateur);
}
var_dump($resultat);

