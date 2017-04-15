<style>
    body{
        background-image: url("images/prewelcome.jpeg");
        background-position: center;
    }
    div.centre {
        position:absolute;
        left: 50%;
        top: 50%;
        width: 1000px;
        height: 200px;
        margin-left: -500px; /* Cette valeur doit être la moitié négative de la valeur du width */
        margin-top: -80px; /* Cette valeur doit être la moitié négative de la valeur du height */
    }
    nav.navbar-perso{
        background-color: transparent;
        border-color: transparent;
    }
    .titresite{
        color: #768766;
        font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    }
    .cliquezici{
        color: #768766;
        font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    }
</style>

<div class="centre">
    <div class="col-md-12 text-center">
        <h1 class="titresite">Bienvenue sur notre site</h1> </br>
        <h3 class="cliquezici">Cliquez ci-dessous</h3>
    </div>
</div>

<nav class="navbar navbar-perso navbar-fixed-bottom">
  <div class="container">
      <div class="col-md-13 text-center">
          <a class="btn" href="index.php?page=welcome" role="button">
              <img src="images/triangletransp.png" alt="triangle" height="150">
          </a>
    </div>
  </div>
</nav>