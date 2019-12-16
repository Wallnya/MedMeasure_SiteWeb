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
<body>
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
<?php
  if (isset($_GET['search']) && !empty($_GET['search']) && $_GET['search'] !== '  ') {
  $search = $_GET['search'];
  $query = mysqli_query($connexion, "SELECT * FROM utilisateur WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%'") or die(mysqli_error());
  $result = mysqli_num_rows($query);
  if ($result == 0) {
      $output = 'Pas de résultat pour <b>"'.$search.'"</b>';
  }
  else {
      echo "<select onchange=\"change(this.value)\">";
      while ($row = mysqli_fetch_array($query)) {
        ?>
        <option id=<?=$row['nom']?> value=<?=$row['nom']?>><?=$row['nom']?><?=$row['prenom']?></option>;
  <?php    }
      echo "</select>";
  }
  }

?>
</body>
<script>

function change(element)
{
  alert(element);
}
 </script>

</html>
