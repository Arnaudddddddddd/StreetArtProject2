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
<div class='centrage'>
    <h2>Formulaire d'identification</h2>
    <form class="form-inline" action="index.php?page=welcome&todo=login" method="post">
        <p><i>Complétez le formulaire. Les champs marqué d'un </i><em>*</em> sont <em>obligatoires</em></p>
        <fieldset>
            <legend>S'identifier</legend>
            <label class="sr-only" for="exampleInputEmail3">Login<em>*</em></label>
            <!--placeholder: indication grisée 
            //required: il faut renseigner le champs sinon la validation est bloquée
            //autofocus: le curseur est positionné dans cette case au chargement de la page-->
            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Login" name="login" required><br>
            <label class="sr-only" for="exampleInputPassword3">Mot de passe</label>
            <!--// type="tel": bascule le clavier sur un smartphone
            // pattern: expression régulière à vérifier pour pouvoir valider-->
            <input type="password" class="form-control" name="mdp" id="exampleInputPassword3" placeholder="Mot de passe" required><br>
        </fieldset>

        <p><button type="submit" class="btn btn-default">S'identifier</button></p>
    </form>
</div>