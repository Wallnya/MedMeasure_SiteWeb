<!DOCTYPE html>
<html lang="en" >
  <meta charset="UTF-8">
  <title>Gestionnaire</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/diagramme.css">
  <link rel="stylesheet" href="./css/histogramme.css">

<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="accueil.php">Accueil</a>
    <a href="deconnexion.php">Déconnexion</a>
  </div>
  <div class="texte">
    <img src="images/gestion.png" alt="Image pour la page resultat">
  </div>
</header>

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

?>

<form method="get" action = "gestionnaire2.php" class="topnav">
<div class="search-dropdown">
<input type="text" name="search" placeholder="Recherche d'utilisateur">
<button type="submit" class="Rechercher">Rechercher</button>

<script>

function click_me(element)
 {
      try
   {//pour ie
  document.getElementById(element).click();
   }catch(e)
   {//pour ff
    var evt = document.createEvent("MouseEvents"); // créer un événement souris
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);  // intiailser l'évennement déja crée par un click
    var cb = document.getElementById(element); // pointe sur l'élement
    cb.dispatchEvent(evt);  // envoyer l'événement vers l'élement
   }
 }

</script>

<?php
  if (isset($_GET['search']) && !empty($_GET['search']) && $_GET['search'] !== '  ') {
  $search = $_GET['search'];
  $query = mysqli_query($connexion, "SELECT * FROM utilisateur WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%'") or die(mysqli_error());
  $result = mysqli_num_rows($query);
  if ($result == 0) {
      $output = 'Pas de résultat pour <b>"'.$search.'"</b>';
  }
  else {
      echo "<select onchange=\"click_me('element')\">";
      while ($row = mysqli_fetch_array($query)) {
      echo "<option value=\"nom\">".$row['nom'].' '.$row['prenom']."</option>";
      }
      echo "</select>";
  }
  }

?>
<body>
</body>

</html>