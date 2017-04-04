<?php

$change_Password=false;

//var_dump($_POST);
if(isset($_POST["login"]) && $_POST["login"] != "" &&      
   isset($_POST["up"]) && $_POST["up"] != ""){
    $dbh = Database::connect();
    $test = Utilisateur::getUtilisateur($dbh, $_POST['login']);
    $test1 =  Utilisateur::testerMdp($dbh, $_POST["login"], $_POST["up"]);
    //var_dump($test1);
    if ($test !=null && $test1!=0){
    $sth = $dbh->prepare("DELETE FROM `utilisateurs` WHERE `login`='".$_POST['login']."'");
    $sth->execute();
    $change_Password = true;
    }
    $dbh=null;
}

if($change_Password){
    echo "<div>Votre compte a été supprimé</div>";
    echo "<meta http-equiv='Refresh' content='1; URL=http://localhost/StreetArtProject2/StreetArtProject/index.php?page=welcome&todo=logout'>";
}

if(!$change_Password){
 echo <<<CHAINE_DE_FIN

<!DOCTYPE html>   
   <html>
     
<form action="index.php?page=deleteUser" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="login">Login:</label>
  <input id="login" type="text" required name="login">
 </p>
 <p>
  <label for="password1">Password:</label>
  <input id="password1" type="password" required name="up">
 </p>
  <input type="submit" value="Valider">
</form>
    
</html>
    
CHAINE_DE_FIN;
}