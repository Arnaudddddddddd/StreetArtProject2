<?php


$form_values_valid = false;
if (isset($_POST["id"]) && $_POST["id"] != "" &&
        isset($_POST["nom"]) && $_POST["nom"] != "" &&
        isset($_POST["adresse"]) && $_POST["adresse"] != "" &&
        isset($_POST["lat"]) && $_POST["lat"] != "" &&
        isset($_POST["lng"]) && $_POST["lng"] != "") {
    // code de traitement    
    $dbh = Database::connect();
    $test = Image::getImage($dbh, $_POST['id']);
    var_dump($test);
    if ($test == null) {
        $verif = Image::insererImage($dbh, $_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['lat'], $_POST['lng'], 'style.css');
        
        if ($verif) {
            $form_values_valid = true;
        }
    }
    // si le traitement réussit, on passe $form_value_valid à true

    $dbh = null;
}

if (!empty($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
// Le fichier a bien été téléchargé
// Par sécurité on utilise getimagesize plutot que les variables $_FILES
    list($larg, $haut, $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);
//    echo $larg . " " . $haut . " " . $type . " " . $attr;
// JPEG => type=2
    if ($type == 2) {
        if (move_uploaded_file($_FILES['fichier']['tmp_name'], '/Applications/XAMPP/xamppfiles/htdocs/StreetArtProject2/StreetArtProject/images/' . $_POST['nom'].'.jpg')) {
            echo "Copie réussie";
        } else {
            echo "Echec de la copie";
        }
    } else {
        echo "Mauvais type de fichier ";
    }
}

if (!$form_values_valid) {
    echo <<<CHAINE_DE_FIN

   
<div class="container">
  <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>          
            <form class="form-inline">
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse">
                </div>
                <button class="btn btn-danger" id="btn-geocode">Récupérer les coordonnées</button>
                <button class="btn btn-success"  id="btn-geoloc">Me géolocaliser</button>
            </form>
            <br><br>
  <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-1"></div>      
            <form class="form-inline">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" placeholder="latitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" placeholder="longitude">
                </div>
                
            </form>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="map-canvas" style="height:400px"></div>
            </div>
        </div>        
</form>     
<form name="submitForm" action="index.php?page=submit" method="post" enctype="multipart/form-data">
 <p>
  <label for="id">Id:</label>
  <input id="id" type="int" required name="id">
 </p>

  <p>
  <label for="nom">Nom:</label>
  <input id="nom" type="text" required name="nom">
 </p>
   
  <p>
  <label for="adresse">Adresse:</label>
  <input id="adresse" type="text" required name="adresse" >
   </p>
   
  <p>
  <label for="lat">Latitude:</label>
  <input id="lat" type="float" required name="lat">
 </p>
    
  <p>
  <label for="lng">Longitude:</label>
  <input id="lng" type="float" required name="lng">
    </p>
  <br>
  <input type="file" name="fichier"/>   
  <br>
  <input type="submit" value="Soumettre">
</form>
    
</html>
    
CHAINE_DE_FIN;
}   
    

