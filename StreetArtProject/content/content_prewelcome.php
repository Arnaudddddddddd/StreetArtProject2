<style>
    body{
        background-image: url("https://s-media-cache-ak0.pinimg.com/originals/37/1b/1b/371b1b871c9bc1eda638828d934df276.jpg");
        background-position: center;
    }
    div.centre {
        position:absolute;
        left: 50%;
        top: 50%;
        width: 1000px;
        height: 200px;
        margin-left: -500px; /* Cette valeur doit être la moitié négative de la valeur du width */
        margin-top: -100px; /* Cette valeur doit être la moitié négative de la valeur du height */
    }
    nav.navbar-perso{
        background-color: transparent;
        border-color: transparent;
    }
    a.triangle {
    width: 0;
    height: 0;
    border-left: 54px solid transparent;
    border-right: 54px solid transparent;
    border-top: 90px solid #FF9100;
    }
    .titresite{
        color:#FF9100;
        font-size: 50px;
    }
</style>

<div class="centre">
    <div class="col-md-12 text-center">
        <span class="titresite">Bienvenue sur notre site</span>
    </div>
</div>

<nav class="navbar navbar-perso navbar-fixed-bottom">
  <div class="container">
      <div class="col-md-13 text-center">
          <a class="btn triangle" href="index.php?page=welcome" role="button"></a>
    </div>
  </div>
</nav>