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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Twitter --> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
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
        <input type="submit" name="connexion" value="<?php echo _CONNEXION?>">

      <div class="reseaux">
        <p><?php echo _RESEAUX; ?></p>
        <div id="boutonsReseau">
          <a id="facebook-button" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>Se connecter avec Facebook</a>
          <script type="text/javascript" src="js/connexionFacebook.js"></script>
          <a id="twitter-button" class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i>Se connecter avec Twitter</a>
          <script type="text/javascript" src="js/connexionTwitter.js"></script> <!-- Ne pas le bouger de place ! -->
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
            <a href="index.php?page=inscription"> <input type="submit" name="inscription" value="<?php echo _INSCRIPTION?>"> </a>
          </div>
          <form method="POST">
            <button type="submit" class="test" name="FR">FR</button>
            <button type="submit" class="test" name="EN">EN</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
