<?php

$page_list = array(
    array(
        "name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter"),
    array("name" => "news",
        "title" => "Dernières nouvelles",
        "menutitle" => "Les dernières nouvelles"),
    array("name" => "register",
        "title" => "S'inscrire",
        "menutitle" => "S'inscrire"),
    array("name" => "changePassword",
        "title" => "Changer le mot de passe",
        "menutitle" => "Changer le mot de passe"),
    array("name" => "submit",
        "title" => "Soumettre une image",
        "menutitle" => "Soumettre"),
    array("name" => "deleteUser",
        "title" => "Se désinscrire",
        "menutitle" => "Se désinscrire"));

function checkPage($askedPage) {
    $boolean = false;
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $askedPage) {
            $boolean = true;
        }
    }
    return $boolean;
}

function getPageTitle($nom) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $nom) {
            return $page['title'];
        }
    }
}

function generateMenu() {
//        <!-- Collect the nav links, forms, and other content for toggling -->
    echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
CHAINE_DE_FIN;
    global $pageTitle;
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['title'] == $pageTitle and $page['title'] != "Se désinscrire" and $page['title'] != "S'inscrire"and $page['title'] != "Changer le mot de passe" and $page['title'] != "Soumettre une image") {
            echo '<li class="active"><a href="index.php?page=' . $page['name'] . '">' . $page['menutitle'] . '</a></li>';
        }
        if ($page['title'] != $pageTitle and $page['title'] != "Se désinscrire" and $page['title'] != "S'inscrire" and $page['title'] != "Changer le mot de passe" and $page['title'] != "Soumettre une image") {
            echo '<li><a href="index.php?page=' . $page['name'] . '">' . $page["menutitle"] . '</a></li>';
        }

        if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
            if ($page['title'] == "Se désinscrire" and $pageTitle == "Se désinscrire") {
                echo '<li class="active"><a href="index.php?page=deleteUser">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Se désinscrire" and $pageTitle != "Se désinscrire") {
                echo '<li><a href="index.php?page=deleteUser">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Changer le mot de passe" and $pageTitle == "Changer le mot de passe") {
                echo '<li class="active"><a href="index.php?page=changePassword">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Changer le mot de passe" and $pageTitle != "Changer le mot de passe") {
                echo '<li><a href="index.php?page=changePassword">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Soumettre une image" and $pageTitle == "Soumettre une image") {
                echo '<li class="active"><a href="index.php?page=submit">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Soumettre une image" and $pageTitle != "Soumettre une image") {
                echo '<li><a href="index.php?page=submit">' . $page['menutitle'] . '</a></li>';
            }
        }
        if (!isset($_SESSION["loggedIn"]) or ! $_SESSION["loggedIn"]) {
            if ($page['title'] == "S'inscrire") {
                if ($pageTitle == "S'inscrire") {
                    echo '<li class="active"><a href="index.php?page=register">' . $page['menutitle'] . '</a></li>';
                }
                if ($pageTitle != "S'inscrire") {
                    echo '<li><a href="index.php?page=register">' . $page['menutitle'] . '</a></li>';
                }
            }
        }
    }


    echo <<<CHAINE_DE_FIN

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
CHAINE_DE_FIN;
}

function generateHTMLHeader($title, $style) {
    echo<<<CHAINE_DE_FIN
<!DOCTYPE html>
   <html>

    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Nom de l'auteur"/>
        <meta name="keywords" content="Mots clefs relatifs à cette page"/>
        <meta name="description" content="Descriptif court"/>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/code.js"></script>
        <script src="js/perso.js"></script>
        <title>$title</title>
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" type="text/css" href="perso.css" />
        <link href="css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <style>
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
         height: 100%;
            margin: 0;
            padding: 0;
        }
        </style>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
    </head>
    <body>
CHAINE_DE_FIN;
}

function generateHTMLFooter() {
    echo"</body>";
    echo"</html>";
}
