<style>
    p {
  margin-top: 0px;
}
 
fieldset {
  margin-bottom: 15px;
  padding: 10px;
}
 
legend {
  padding: 0px 3px;
  font-weight: bold;
  font-variant: small-caps;
}
 
label {
  width: 110px;
  display: inline-block;
  vertical-align: top;
  margin: 6px;
}
 
em {
  font-weight: bold;
  font-style: normal;
  color: #f00;
}
 
input:focus {
  background: #eaeaea;
}
 
input, textarea {
  width: 249px;
}
 
textarea {
  height: 100px;
}
 
select {
  width: 254px;
}
 
input[type=checkbox] {
  width: 10px;
}
 
input[type=submit] {
  width: 150px;
  padding: 10px;
}

.centrage{
    text-align: center;
}
</style>

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

<div class="centrage">
    <h2>Changer le mot de passe</h2>
    <form action="index.php?page=changePassword" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
        <p><i>Complétez le formulaire. Les champs marqués par </i><em>*</em> sont <em>obligatoires</em></p><br>
        <fieldset>
            <legend>Modifiez votre mot de passe</legend>
            <label for="login">Login<em>*</em></label>
            <input type="text" id="login" placeholder="Login" name="login" required><br><br>
            <label for="password0">Ancien mot de passe<em>*</em></label>
            <input type="password" name="up0" id="password0" placeholder="Ancien" required><br><br>
            <label for="password1">Nouveau mot de passe<em>*</em></label>
            <input type="password" name="up1" id="password1" placeholder="Nouveau" required><br><br>
            <label for="password2">Confirmer votre nouveau mot de passe<em>*</em></label>
            <input type="password" name="up1" id="password2" placeholder="Confirmer" required><br>
        </fieldset>
        <p><button type="submit" class="btn btn-default">Valider</button></p>
    </form>
</div>
CHAINE_DE_FIN;
}    
    
?>