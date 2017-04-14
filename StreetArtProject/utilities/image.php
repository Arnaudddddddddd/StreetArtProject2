<?php

class Image {
    public $id;
    public $utilisateur;
    public $nom;
    public $adresse;
    public $lat;
    public $lng;
    public $description;
    
    
    public static function insererImage($dbh,$utilisateur,$nom,$adresse,$lat,$lng,$description){
    $sth = $dbh->prepare("INSERT INTO `images` (`utilisateur`, `nom`, `adresse`, `lat`, `lng`,`description`) VALUES(?,?,?,?,?,?)");
    $sth->execute(array($utilisateur, htmlspecialchars($nom),$adresse,$lat,$lng,$description));
    $id_nouveau = $dbh->lastInsertId();
    if($sth->rowCount()>0){
        return $id_nouveau;
    }
    else{
        return null;
    }
    }
    
    
    public static function getImageId($dbh,$id){
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
    
    public static function getLastID($dbh){
    $query = "SELECT * FROM `images` WHERE `nom`='$nom'";
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
    
    public static function getId($dbh,$nom){
    $query = "SELECT * FROM `images` WHERE `nom`='$nom'";
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
    
    public static function getAllImages($dbh){
    $reponse = "SELECT * FROM `images`";
    $sth = $dbh->prepare($reponse);
    $sth->execute();
    while ($donnees = $sth->fetch()){
        $nomPhoto = $donnees['nom'].$donnees['id'];
        $array[]=$nomPhoto;
    }
    if(isset($array)){
        return $array;
    }}
    
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
    $reponse = "SELECT * FROM `images` WHERE `utilisateur`='$utilisateur'";
    $sth = $dbh->prepare($reponse);
    $sth->execute();
// On affiche chaque entrée une à une
    while ($donnees = $sth->fetch()){
        $nomPhoto = $donnees['nom'].$donnees['id'];
        $array[]=$nomPhoto;
}
    $sth->closeCursor(); // Termine le traitement de la requête
    if(isset($array)){
        return $array;    
    }}
    
    
    }     
    
    