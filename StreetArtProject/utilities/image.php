<?php

class Image {
    public $id;
    public $nom;
    public $adresse;
    public $lat;
    public $lng;
    
    
    public static function insererImage($dbh,$id,$nom,$adresse,$lat,$lng){
    $sth = $dbh->prepare("INSERT INTO `images` (`id`, `nom`, `adresse`, `lat`, `lng`) VALUES(?,?,?,?,?)");
    $sth->execute(array($id,$nom,$adresse,$lat,$lng));
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
    $sth->closeCursor();
    if($sth->rowCount()>0){
        return $picture;
    }
    else{
        return null;
    }
    }
}