<?php
$_POST['utilisateur']=$_SESSION['login'];
$form_values_valid = false;
if (isset($_POST["nom"]) && $_POST["nom"] != "" &&
        isset($_POST["utilisateur"]) && $_POST["utilisateur"] != "" &&
        isset($_POST["subAdresse"]) && $_POST["subAdresse"] != "" &&
        isset($_POST["lat"]) && $_POST["lat"] != "" &&
        isset($_POST["lng"]) && $_POST["lng"] != "" &&
        isset($_POST["description"]) && $_POST["description"] != "") {
    // code de traitement    
    $dbh = Database::connect();
    $test = Image::getImage($dbh, $_POST['nom']);
    var_dump($test);
    if ($test == null) {
        $verif = Image::insererImage($dbh,$_POST['utilisateur'], $_POST['nom'], $_POST['subAdresse'], $_POST['lat'], $_POST['lng'],$_POST['description'], 'style.css');
        $id = $verif;
        if ($verif!=0) {
            $_POST['id']=$id;
            var_dump($_POST);
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
        if (move_uploaded_file($_FILES['fichier']['tmp_name'], '/Applications/XAMPP/xamppfiles/htdocs/StreetArtProject2/StreetArtProject/images/' . $_POST['nom'].$_POST['id'].'.jpg')) {
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

<table> 
<tr style="padding-left:10px"> 
<td>        
<form action="index.php?page=submit" style="height: 470px;" method="post" enctype="multipart/form-data">

  <p>
  <label for="nom">Nom:</label>
  <input id="nom" type="text" required name="nom">
 </p>
   
  <p>
  <label for="subAdresse">Adresse:</label>
  <input id="subAdresse" type="text" required name="subAdresse" >
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
  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
  <div>Taille du fichier limitée à 1 Mo</div>
  <input type="file" name="fichier"/>   
  <br>
  <label for="description">Description</label>
  <input id="description" type="text" name="description"> 
  <br>
  <input type="submit" value="Soumettre">
</form>
</td>      
<td>
 <div class="container">
            <br><br>
            <form class="form-inline">
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse">
                </div>
                <button class="btn btn-danger" id="btn-geocode">Récupérer les coordonnées</button>
            </form>
            <br>
            <form class="form-inline">
                <button class="btn btn-success" style="padding-left=10px;" id="btn-geoloc">Me géolocaliser</button>                
            </form>
            <br>
            <form class="form-inline">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" placeholder="latitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" placeholder="longitude">
                </div>
                <button class="btn btn-info" id="btn-carte">Afficher sur la carte</button>
            </form>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="map-canvas" style="height:400px"></div>
            </div>
        </div>   
</td>    
</tr> 
</table>      

    
</html>
    
CHAINE_DE_FIN;
}   
    

