<?php
if (isset($_SESSION['lang'])){
  if($_SESSION['lang'] == "en")
       include "langues/en.inc";
  else if ($_SESSION['lang'] == "fr"){
    include "langues/fr.inc";
  }
}
else{
  include "langues/en.inc";
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignConnexion.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Facebook -->
    <script src="js/connexionFacebook.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <body>
    <div id="gauche">
      <p>
      <i class="fa fa-search-plus">  <?php echo _RESULTATS; ?></i><br><br>
      <i class="fa fa-bar-chart-o">  <?php echo _PROGRESSION; ?></i><br><br>
      <i class="fa fa-comments">  <?php echo _CONNAITREPLUS; ?></i><br><br>
      <i class="fa fa-check">  <?php echo _APTITUDE; ?></i><br><br>
      </p>
    </div>
    <div id="droite">
      <form method="POST" action="index.php">
        <label for="mail"></label>
        <input type="text" name="mail" id="mail" placeholder="Adresse mail"/>
        <label for="mdp"></label>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"/>
        <input type="submit" name="connexion" value="Se connecter">

      <div class="reseaux">
        <p><?php echo _RESEAUX; ?></p>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v5.0&appId=572612350206643&autoLogAppEvents=1"></script>

        <div id="boutonsReseau">
          <div class="fb-login-button" onlogin='window.location.reload(true)' data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true" scope="email"></div>
          <img alt="Bouton twitter" class="boutonReseau" src="https://cdn.cms-twdigitalassets.com/content/dam/developer-twitter/images/sign-in-with-twitter-gray.png">
        </div>
        <div id="status"></div>
      </div>
    </form>



      <div class="logodescription">
        <img class="logo" src="images/MedMeasureLogo.png" alt="Logo"/>
        <div class="desc">
        <?php echo _AVENTURE; ?><br><br>
          <div class="lien">
          <?php echo _JOIN; ?>
            <a href="index.php?page=inscription"> <input type="submit" name="inscription" value="S'incrire"> </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
