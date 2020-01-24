<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignConnexion.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Facebook -->
    <script type="text/javascript" src="js/connexionFacebook.js"></script>
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
      <i class="fa fa-search-plus">  Suivez vos résultats</i><br><br>
      <i class="fa fa-bar-chart-o">  Découvrez votre progression en temps réel.</i><br><br>
      <i class="fa fa-comments">  Discutez pour en connaître plus</i><br><br>
      <i class="fa fa-check">  Et montrez que vous êtes toujours apte à piloter!</i><br><br>
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
        <p>Connectez-vous également via les réseaux sociaux !</p>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v5.0&appId=572612350206643&autoLogAppEvents=1"></script>
        <div id="boutonsReseau">
          <div class="fb-login-button" onlogin='window.location.reload(true)' data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true" scope="email"></div>
          <a id="twitter-button" class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i>Se connecter avec Twitter</a>
          <script type="text/javascript" src="js/connexionTwitter.js"></script> <!-- Ne pas le bouger de place ! -->
        </div>
        <div id="status"></div>
      </div>
    </form>
      <div class="logodescription">
        <img class="logo" src="images/MedMeasureLogo.png" alt="Logo"/>
        <div class="desc">
          Découvrez l'aventure MedMeasure pour connaître vos résultats en temps réel sur votre aptitude de vol<br><br>
          <div class="lien">
            Rejoignez nous aujourd'hui !
            <a href="index.php?page=inscription"> <input type="submit" name="inscription" value="S'incrire"> </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
