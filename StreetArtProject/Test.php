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
        background-color: white;
    }

    .fondecran{
        background-image: url(https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTZ3VwMkdoUTl1RW8);
    }

</style>

<?php
require 'utilities/utils.php';
generateHTMLHeader('test', 'perso');
?>
<div class="fondecran">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class=""></div>
            </div>
            <div class="col-md-6">
                <div class="centrage">
                    <br>
                    <h2>Changer le mot de passe</h2>
                    <form class="form-inline" action="index.php?page=changePassword" method="post"
                          oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
                        <p><i>Complétez le formulaire. Les champs marqués par </i><em>*</em> sont <em>obligatoires</em></p><br>
                        <fieldset>
                            <legend>Modifiez votre mot de passe</legend>
                            <label for="login">Login<em>*</em></label>
                            <input type="text" class="form-control" id="login" placeholder="Login" name="login" required><br><br>
                            <label for="password0">Ancien mot de passe<em>*</em></label>
                            <input type="password" class="form-control" name="up0" id="password0" placeholder="Ancien" required><br><br>
                            <label for="password1">Nouveau mot de passe<em>*</em></label>
                            <input type="password" class="form-control" name="up1" id="password1" placeholder="Nouveau" required><br><br>
                            <label for="password2">Confirmer votre nouveau mot de passe<em>*</em></label>
                            <input type="password" class="form-control" name="up1" id="password2" placeholder="Confirmer" required><br>
                        </fieldset>
                        <p><button type="submit" class="btn btn-default">Valider</button></p>
                    </form>
                    <br>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <br>
</div>
</body>