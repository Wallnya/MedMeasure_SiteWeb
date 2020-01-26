<?php
if (isset($_SESSION['lang'])){
  if($_SESSION['lang'] == "en")
       include "langues/en.inc";
  else if ($_SESSION['lang'] == "fr"){
    include "langues/fr.inc";
  }
}
else{
  include "langues/fr.inc";
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
          <input type="submit" name="connexionTwitter" value="Se connecter avec Twitter">
          <input type="submit" name="connexionFacebook" value="Se connecter avec Facebook">

      </form>

      <img class ="logo" src="images/MedMeasureLogo.png" alt="Logo" />
      <p>
        Découvrez l'aventure MedMeasure pour connaître vos résultats en temps réel sur votre aptitude de vol<br><br>
        Rejoignez nous aujourd'hui ! <br>
        <a href="index.php?page=inscription"> <input type="submit" name="inscription" value="S'incrire"> </a>
      </p>
    </div>
</html>
