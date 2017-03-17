<?php
    session_name("SessionTest" );
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }

// Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage



// On l'affichage des pages


//Gestion du formulaire de connexion
require('utilities/printForms.php');
require('utilities/logInOut.php');
require('database/database.php');
require('utilities/utilisateur.php');
$dbh = Database::connect();

//traitement des contenus de formulaires
if(isset($_GET["todo"])) {
    if($_GET["todo"] == "login"){
    logIn($dbh);}
}
if(isset($_GET["todo"])) {
    if($_GET["todo"] == "logout"){
    logOut($dbh);}
}    
require('utilities/utils.php');    

//Verification de la validité de GET
if(!isset($_GET['page'])){
    $_GET['page']='welcome';
}

$askedPage = $_GET['page'];

//Verification que la page est bien autorisée
$authorized = checkPage($askedPage);

if($authorized){
    $pageTitle = getPageTitle($askedPage);
}
else{
    $askedPage = 'erreur';
     $pageTitle = "erreur";
}
generateHTMLHeader($pageTitle, "style.css");

// affichage de formulaires
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    printLogoutForm();
} else {
    printLoginForm($askedPage);
}


generateMenu();

echo<<<END
            <div id="content">
                <div>
                    <h1>$pageTitle</h1>
                </div>
END;
// Problème pour inscription,désinscription et changement de mot de passe car ce n'est pas dans content
if($askedPage=='changePassword'){
    require("formulaire/changePassword.php");
}
else{ if($askedPage=='deleteUser'){
    require("formulaire/deleteUser.php");
}
else{ if($askedPage=='register'){
    require("formulaire/register.php");
}else{
require("content/content_$askedPage.php");}}}
echo "</div>";


////// Ajout d'un utilisateur sur la base
//inserer($dbh,'logi','Trump','Donald','0','0',null,'1970-01-09');

//// Interrogation de la base de données
//tri($dbh,'prenom');

//$test = Utilisateur::insererUtilisateur($dbh, 'a', 'a', 'Donald', '0', '0', null, null,"style.css");
//var_dump($test);
//if(Utilisateur::testerMdp($dbh,'log','1')){
//    echo"vrai";
//}
//Utilisateur::getUtilisateur($dbh, 'fifi');


$dbh=null;

generateHTMLFooter();