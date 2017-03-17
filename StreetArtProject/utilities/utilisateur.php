<?php
class Utilisateur {
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $naissance;
    public $promotion;
    public $email;
    public $feuille;
 
    public function __toString() {
        return "[".$this->login."]"." ".$this->prenom." "."<b>".$this->nom."</b> né le ".explode('-',$this->naissance)[2].'/'.explode('-',$this->naissance)[1].'/'.explode('-',$this->naissance)[0]." <b>".$this->email."</b>";
    }
    
    public static function getUtilisateur($dbh,$login){
    $query = "SELECT * FROM `utilisateurs` WHERE `login`='$login'";
    $sth = $dbh->prepare($query);
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
    $sth->execute();
    $user = $sth->fetch();
    $sth->closeCursor();
    if($sth->rowCount()>0){
        return $user;
    }
    else{
        return null;
    }
    }
    
    public static function insererUtilisateur($dbh,$login,$nom,$prenom,$mdp,$promotion,$email,$naissance,$feuille){
    $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
    $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
    if($sth->rowCount()>0){
        return true;
    }
    else{
        return false;
    }
    
    }

    public static function testerMdp($dbh,$login,$mdp){
        $newMdp = SHA1($mdp);
//        var_dump($newMdp);
        $query="SELECT * FROM `utilisateurs` WHERE `mdp` ='".$newMdp."'AND `login`='".$login."'";
//        echo $query;
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        return $sth->rowCount()>0;
    }
}

?>


