<?php

function logIn($dbh){
    $test1 = Utilisateur::getUtilisateur($dbh,$_POST['login']);
    if($test1){
    $test2 = Utilisateur::testerMdp($dbh,$_POST['login'],$_POST['mdp']);}
    if($test1==true && $test2==true){
        $_SESSION['loggedIn']=true;
    }
}

function logOut(){
    $_SESSION['loggedIn']=false;
    session_unset();
    session_destroy();
}