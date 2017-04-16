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
        background-image: url("images/fondecranmotif.jpeg");
        border: 3px black double;
        border-radius: 10px;
    }

    body{
        background-image: url("images/CollageStreetArt.jpeg");
    }

</style>

<div class="fondecran">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="centrage">
                    <br>
                    <h2>Formulaire d'identification</h2>
                    <form class="form-inline" action="index.php?page=welcome&todo=login" method="post">
                        <p><i>Complétez le formulaire. Les champs marqués par </i><em>*</em> sont <em>obligatoires</em></p><br>
                        <fieldset>
                            <legend>Identifiez-vous</legend>
                            <label for="exampleInputEmail3">Login</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Login" name="login" required><br>
                            <label for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control" name="mdp" id="exampleInputPassword3" placeholder="Mot de passe" required><br>
                        </fieldset>
                        <p><button type="submit" class="btn btn-default">Sign in</button></p>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br>
</div>