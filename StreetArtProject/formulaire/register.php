
<?php

$form_values_valid = false;


if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["email"]) && $_POST["email"] != "" &&
        isset($_POST["promotion"]) && $_POST["promotion"] != "" &&
        isset($_POST["naissance"]) && $_POST["naissance"] != "" &&
        isset($_POST["email"]) && $_POST["email"] != "" &&
        isset($_POST["nom"]) && $_POST["nom"] != "" &&
        isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "" &&
        isset($_POST["up2"]) && $_POST["up2"] != "") {
    // code de traitement    
    $dbh = Database::connect();
    $test = Utilisateur::getUtilisateur($dbh, $_POST['login']);
    if ($test == null && $_POST["up"]==$_POST["up2"]) {
        $verif = Utilisateur::insererUtilisateur($dbh, $_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['up'], $_POST['promotion'], $_POST['email'], $_POST['naissance'], 'style.css');
        
        if ($verif) {
            $form_values_valid = true;
        }
    }
    // si le traitement réussit, on passe $form_value_valid à true

    $dbh = null;
}

if (!$form_values_valid) {
    echo <<<CHAINE_DE_FIN

<!DOCTYPE html>   
   <html>
     
<form action="index.php?page=register" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="login">Login:</label>
  <input id="login" type="text" required name="login">
 </p>
    
  <p>
  <label for="nom">Nom:</label>
  <input id="nom" type="text" required name="nom">
 </p>
   
  <p>
  <label for="prenom">Prenom:</label>
  <input id="prenom" type="text" required name="prenom" >
   </p>
   
  <p>
  <label for="naissance">Date de naissance:</label>
  <input id="naissance" type="date" required name="naissance">
 </p>
    
  <p>
  <label for="email">Email:</label>
  <input id="email" type="email" required name="email">
 </p>
  
    <p>
  <label for="promotion">Promotion:</label>
  <input id="promotion" type="number" required name="promotion">
 </p> 
   
 <p>
  <label for="password1">Password:</label>
  <input id="password1" type="password" required name="up">
 </p>
 <p>
  <label for="password2">Confirm password:</label>
  <input id="password2" type="password" name="up2">
 </p>
  <input type="submit" value="Create account">
</form>
    
</html>
    
CHAINE_DE_FIN;
}   
    




