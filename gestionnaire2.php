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

</input>
</div>
</form>

<?php

echo "<div class=\"tableau\">";
  $requete="SELECT * FROM utilisateur WHERE nom='Ludivine'";
  $resultat=mysqli_query($connexion,$requete);
  $requete2="SELECT count(*) FROM testPartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine')";
  $requete3="SELECT count(*) FROM testComplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine')";
  $requete4="SELECT count(*) FROM testPartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine') AND score > 75";
  $requete5="SELECT count(*) FROM testComplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine') AND score > 75";
  $requete6="SELECT score FROM testPartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine')";
  $requete7="SELECT score FROM testComplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE nom='Ludivine')";
  $resultat2=mysqli_query($connexion,$requete2);
  $resultat3=mysqli_query($connexion,$requete3);
  $resultat4=mysqli_query($connexion,$requete4);
  $resultat5=mysqli_query($connexion,$requete5);
  $resultat6=mysqli_query($connexion,$requete6);
  $resultat7=mysqli_query($connexion,$requete7);
  $tests_partiels_pilote = mysqli_fetch_row($resultat2);
  $tests_complets_pilote = mysqli_fetch_row($resultat3);
  $tests_partiels_reussis = mysqli_fetch_row($resultat4);
  $tests_complets_reussis = mysqli_fetch_row($resultat5);
  $score_tests_partiels = mysqli_fetch_row($resultat6);
  $score_tests_complets = mysqli_fetch_row($resultat7);
  $tests_pilote = $tests_partiels_pilote[0]+$tests_complets_pilote[0];
  $tests_reussis = $tests_partiels_reussis[0]+$tests_complets_reussis[0];
  $moyenne_score = ($score_tests_partiels[0]+$score_tests_complets[0])/$tests_pilote;
  echo "<table border='1' cellpadding='5' cellpacing='9'>";
  echo "<tr class=\"entete\">
  <td>id</td>
  <td>Nom</td>
  <td>Prenom</td>
  <td>Date de Naissance</td>
  <td>Nombre de tests effectuées</td>
  <td>Nombre de tests réussis</td>
  <td>Moyenne des scores</td>
  </tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for ($i = 0; $i < 4; $i++){
        echo "<td>".$ligne[$i]."</td>";
    }
    echo "<td>".$tests_pilote."</td>";
    echo "<td>".$tests_reussis."</td>";
    echo "<td".$moyenne_score."</td>";
  }
  echo"</table>";
  echo "</div>";

?>


<script>

function change(element)
{
  alert(element);
  $.ajax ({
      type: 'GET',
      url: 'gestionnaire2.php',
      data: {element},
      datatype: script,
      cache: false,
      success: function(data){
        alert(data);;
      }
    })
  
}
 </script>

</body>


</html>
