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
        text-align:center;
    }
</style>

<?php
$change_Password = false;


//var_dump($_POST);
if (isset($_POST["login"]) && $_POST["login"] != "" &&
        isset($_POST["up0"]) && $_POST["up0"] != "" &&
        isset($_POST["up"]) && $_POST["up"] != "" &&
        isset($_POST["up2"]) && $_POST["up2"] != "") {
    $dbh = Database::connect();
    $test = Utilisateur::getUtilisateur($dbh, $_POST['login']);
    $test1 = Utilisateur::testerMdp($dbh, $_POST["login"], $_POST["up0"]);
    if ($test != null && $test1 != 0) {
        $sth = $dbh->prepare("UPDATE `utilisateurs` SET mdp='" . SHA1($_POST['up']) . "' WHERE login = '" . $_POST['login'] . "'");
        $sth->execute();
        $change_Password = true;
    }
    $dbh = null;
}

if ($change_Password == true) {
    echo "<div>Changement de mot de passe réussi</div>";
}

if (!$change_Password) {
    echo <<<CHAINE_DE_FIN

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
    
CHAINE_DE_FIN;
}
?>
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

<div class='centrage'>
    <h2>Formulaire de participation au point γ</h2>
    <form action="index.php?page=changePassword" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
        <p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
        <fieldset>
            <legend>Contact</legend>
            <label for="nom">Nom <em>*</em></label>
            <!--placeholder: indication grisée 
            //required: il faut renseigner le champs sinon la validation est bloquée
            //autofocus: le curseur est positionné dans cette case au chargement de la page-->
            <input id="nom" placeholder="Olivier Serre" autofocus="" required=""><br>
            <label for="telephone">Portable</label>
            <!--// type="tel": bascule le clavier sur un smartphone
            // pattern: expression régulière à vérifier pour pouvoir valider-->
            <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}"><br>
            <label for="email">Email <em>*</em></label>
            <input id="email" type="email" placeholder="prenom.nom@polytechnique.edu" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu"><br>
        </fieldset>
        <fieldset>
            <legend>Information personnelles</legend>
            <label for="age">Age<em>*</em></label>
            <!--// type="number": bascule le clavier sur un smartphone-->
            <input id="age" type="number" placeholder="xx" pattern="[0-9]{2}" required=""><br>
            <label for="sexe">Sexe</label>
            <select id="sexe">
                <option value="F" name="sexe">Femme</option>
                <option value="H" name="sexe">Homme</option>
            </select><br>
            <label for="comments">Pourquoi voulez-vous vous impliquer dans l'organisation du point γ?</label>
            <textarea id="comments"></textarea>
        </fieldset>

        <fieldset>
            <legend>Choisissez vos binets favoris</legend>
            <label for="chatnoir"><input id="chatnoir" type="checkbox" name="binet" value="chat"> Chat Noir</label>
            <label for="oenologie"><input id="oenologie" type="checkbox" name="binet" value="vin"> Œnologie</label>
            <label for="bobar"><input id="bobar" type="checkbox" name="binet" value="bob"> Bôbar</label>
            <label for="Xpara"><input id="Xpara" type="checkbox" name="binet" value="para"> X-Para</label>
            <label for="khomiss"><input id="khomiss" type="checkbox" name="binet" value="???"> Khômiss</label>
            <label for="politix"><input id="politix" type="checkbox" name="binet" value="politix"> PolitiX</label>
            <label for="raid"><input id="raid" type="checkbox" name="binet" value="raid"> Binet Raid</label>
            <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta"> X-soirées</label>
        </fieldset>
        <p><input type="submit" value="Soummettre"></p>
    </form>
</div>