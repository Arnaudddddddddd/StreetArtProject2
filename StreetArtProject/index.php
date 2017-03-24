<?php

session_name("SessionTest");
// ne pas mettre d'espace dans le nom de session !
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}


require('utilities/printForms.php');
require('utilities/logInOut.php');
require('database/database.php');
require('utilities/utilisateur.php');
$dbh = Database::connect();

//traitement des contenus de formulaires
if (isset($_GET["todo"])) {
    if ($_GET["todo"] == "login") {
        logIn($dbh);
    }
}
if (isset($_GET["todo"])) {
    if ($_GET["todo"] == "logout") {
        logOut($dbh);
    }
}
require('utilities/utils.php');

$prewlcm = TRUE;

//Verification de la validité de GET
if (!isset($_GET['page'])) {
    require('content/content_prewelcome.php');
    $prewlcm = FALSE;
    $_GET['page'] = 'welcome';
}

$askedPage = $_GET['page'];

//Verification que la page est bien autorisée: utilities/utils.php/checkPage
$authorized = checkPage($askedPage);

if ($authorized) {
    $pageTitle = getPageTitle($askedPage);
} else {
    $askedPage = 'erreur';
    $pageTitle = "erreur";
}
generateHTMLHeader($pageTitle, "style.css");

if ($prewlcm) {
    // affichage de formulaires
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
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
    if ($askedPage == 'changePassword') {
        require("formulaire/changePassword.php");
    } else {
        if ($askedPage == 'deleteUser') {
            require("formulaire/deleteUser.php");
        } else {
            if ($askedPage == 'register') {
                require("formulaire/register.php");
            } else {
                require("content/content_$askedPage.php");
            }
        }
    }
    echo "</div>";
}


$dbh = null;

generateHTMLFooter();
