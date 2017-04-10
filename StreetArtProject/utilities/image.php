<?php

class Image {
    public $id;
    public $utilisateur;
    public $nom;
    public $adresse;
    public $lat;
    public $lng;
    
    
    public static function insererImage($dbh,$id,$utilisateur,$nom,$adresse,$lat,$lng){
    $sth = $dbh->prepare("INSERT INTO `images` (`id`,`utilisateur`, `nom`, `adresse`, `lat`, `lng`) VALUES(?,?,?,?,?,?)");
    $sth->execute(array($id,$utilisateur, htmlspecialchars($nom),$adresse,$lat,$lng));
    if($sth->rowCount()>0){
        return true;
    }
    else{
        return false;
    }
    }
    
    
    public static function getImage($dbh,$id){
    $query = "SELECT * FROM `images` WHERE `id`='$id'";
    $sth = $dbh->prepare($query);
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Image');
    $sth->execute();
    $picture = $sth->fetch();
    
    if($sth->rowCount()>0){
        return $picture;
    }
    else{
        return null;
    }
    }
    
    public static function getImageUtilisateur($dbh,$utilisateur){
//    $query = "SELECT * FROM `images` WHERE `utilisateur`='$utilisateur'";
//    $sth = $dbh->prepare($query);
//    $sth->setFetchMode(PDO::FETCH_CLASS, 'Image');
//    $sth->execute();
//    $picture = $sth->fetch();
//    $sth->closeCursor();
//    if($sth->rowCount()>0){
//        return $picture;
//    }
//    else{
//        return null;
//    }   
// On récupère tout le contenu de la table jeux_video
$reponse = $dbh->query("SELECT * FROM `images` WHERE `utilisateur`='$utilisateur'");
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch()){
    $array[]=$donnees['nom'];
}

$reponse->closeCursor(); // Termine le traitement de la requête
return $array;    
    }
    
    
    }     
    
    