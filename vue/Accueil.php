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
      </form>

      <div class="reseaux">
        <p>Connectez-vous également via les réseaux sociaux !</p>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v5.0&appId=572612350206643&autoLogAppEvents=1"></script>

        <div id="boutonsReseau">
          <div class="fb-login-button" onlogin='window.location.reload(true)' data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true" scope="email"></div>
          <img class="boutonReseau" src="https://cdn.cms-twdigitalassets.com/content/dam/developer-twitter/images/sign-in-with-twitter-gray.png">
        </div>
        <div id="status"></div>
      </div>

      

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
