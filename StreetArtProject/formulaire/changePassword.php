<?php
$change_Password=false;


//var_dump($_POST);
if(isset($_POST["login"]) && $_POST["login"] != "" && 
   isset($_POST["up0"]) && $_POST["up0"] != "" &&     
   isset($_POST["up"]) && $_POST["up"] != "" && 
   isset($_POST["up2"]) && $_POST["up2"] != "" ){
    $dbh = Database::connect();
    $test = Utilisateur::getUtilisateur($dbh, $_POST['login']);
    $test1 =  Utilisateur::testerMdp($dbh, $_POST["login"], $_POST["up0"]);
    if ($test !=null && $test1!=0){
    $sth = $dbh->prepare("UPDATE `utilisateurs` SET mdp='".SHA1($_POST['up'])."' WHERE login = '".$_POST['login']."'");
    $sth->execute();
    $change_Password = true;
    }
    $dbh=null;
}

if($change_Password == true){
    echo "<div>Changement de mot de passe réussi</div>";
}

if(!$change_Password){
 echo <<<CHAINE_DE_FIN

<!DOCTYPE html>   
   <html>
     
<form action="index.php?page=changePassword" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="login">login:</label>
  <input id="login" type="text" required name="login">
 </p>
    
  
  <label for="password0">Old Password:</label>
  <input id="password0" type="password" required name="up0">
 </p>
   
 <p>
  <label for="password1">New Password:</label>
  <input id="password1" type="password" required name="up">
 </p>
 <p>
  <label for="password2">Confirm new password:</label>
  <input id="password2" type="password" name="up2">
 </p>
  <input type="submit" value="Valider">
</form>
    
</html>
    
CHAINE_DE_FIN;
}    
    
?>
