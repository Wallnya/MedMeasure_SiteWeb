<!DOCTYPE html>
<html lang="en" >
  <meta charset="UTF-8">
  <title>Dernier Résultat</title>
  <link rel="stylesheet" href="./css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="accueil.php">Accueil</a>
    <a href="deconnexion.php">Déconnexion</a>
  </div>
  <div class="texte">
    <img src="images/Avion06.jpg" alt="Image pour la page resultat">
  </div>
</header>

<body>
<!-- partial:index.partial.html -->
<!--
  rangeslider.js
  https://github.com/andreruffert/rangeslider.js
  by André Ruffert - @andreruffert
-->

<?php
		$serveur = "localhost";
		$login = "root";
    $mdp = "";
    
		#connexion au serveur de la base de données
		$connexion = mysqli_connect($serveur,$login,$mdp)
    or die ("Connexion au serveur $serveur impossible pour $login");
    
		#nom de la base de données
    $bd = "medmeasure";
    
		#connexion à la base de données
		mysqli_select_db($connexion,$bd)
    or die ("Impossible d'accéder à la base de données");

    $test = "partiel";
    
    if ($test=="partiel") {
      $requete = "SELECT * FROM testpartiel WHERE idUtilisateur = 1";
    }
    else {
      $requete = "SELECT * FROM testcomplet WHERE idUtilisateur = 1";
    }
    $resultat = mysqli_query($connexion,$requete);
    
    $ligne = mysqli_fetch_row($resultat);

?>

<div class="main">
  <?php
    if ($test=="partiel") {
      echo "<label for=\"panel_size\">Résultat du test partiel</label>";
    }
    else {
      echo "<label for=\"panel_size\">Résultat du test complet</label>";
    }
    ?>
  <p> Date : <?php echo htmlspecialchars($ligne[3]) ?> </p>
  <input
      type="range"
      name="participants"
      min="0"
      max="100"
      <?php
      if ($test=="partiel") {
        echo "value=".htmlspecialchars($ligne[8])."";
      }
      else {
        echo "value=".htmlspecialchars($ligne[10])."";
      }
      ?>
  >
  <span class="rangeslider__tooltip" id ="range-tooltip"></span>
  <input name="cliquez-ici" type="button" style="display:none;" id="click" value="cliquez ici" onclick="document.location.href='https://www.doctolib.fr'">

  <p> Rythme cardiaque : <?php echo htmlspecialchars($ligne[4]) ?> bpm </p>
  <p> Perception auditive : <?php echo htmlspecialchars($ligne[5]) ?> dBA </p>
  <p> Réaction à un stimulus visuel : <?php echo htmlspecialchars($ligne[6]) ?> ms </p>

  <?php
  if ($test=="partiel") {
    echo "<div hidden>
    <p> Température superficielle de la peau :".htmlspecialchars($ligne[7])."°C </p>
    <p> Reconnaissance de la tonalité :".htmlspecialchars($ligne[8])."Hz </p>
    </div>";
  }
  else {
    echo "<p> Température superficielle de la peau :".htmlspecialchars($ligne[7])."°C</p>";
    echo "<p> Reconnaissance de la tonalité :".htmlspecialchars($ligne[8])."Hz </p>";
  }
  ?>


</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://andreruffert.github.io/rangeslider.js/assets/rangeslider.js/dist/rangeslider.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js'></script><script  src="./js/script.js"></script>

</body>
</html>