<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
        <header>
    <div class="barre_navigation">
      <a href="#deconnexion">Deconnexion</a>
      <a href="#accueil">Accueil</a>
    </div>
    <div class="texte">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      Page de l'administrateur - Gestion
    </div>
  </header>
  <body>
  <p>Récapitulatif des données générales</p>
<?php
  $connexion = mysqli_connect("localhost","root","")
  or die ("Tu es nul. Recommence.");

  $bd="test";

  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");

  $requete="select * from personnel";
  $resultat=mysqli_query($connexion,$requete);
  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";

  echo "<tr><td></td><td>nom</td><td>prenom</td></tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for ($i =0;$i<3;$i++){
        echo "<td>".$ligne[$i]."</td>";
    }
  }
  echo"</table></center>";

  ?>
  <p>Récapitulatif pour chaque utilisateur</p>
  <?php
  //Récupération totale de la table
  $requete="select * from testpartiel";
  $resultat=mysqli_query($connexion,$requete);
  //Liste permettant de savoir quels utilisateur ont été vu
  $numero_utilisateur = array();
  //On boucle sur les résultats de la table en générale
  while ($data = mysqli_fetch_assoc($resultat)) {
    //Est-ce que la liste contient l'utilisateur / est-ce qu'il a déjà un bouton
    //Si non
    if (in_array($data['idUtilisateur'],$numero_utilisateur) == False){
      //On ajoute à la liste
      array_push($numero_utilisateur,$data['idUtilisateur']);
      //et on lui crée le bouton associé.
      echo "  <button type=\"button\" class=\"collapsible\">Utilisateur".$data['idUtilisateur']."</button>";
      echo "<div class=\"content\">";
      //On récupère le numéro du test ainsi que les différentes valeurs.
      $requete2="select numero_test, frequence from testpartiel where idUtilisateur = ".$data['idUtilisateur'];
      $resultat2=mysqli_query($connexion,$requete2);
      //On affiche le tout dans un tableau
      echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
      echo "<tr><td>Numéro du test partiel</td></td><td>fréquence</td></tr>";
      while($ligne=mysqli_fetch_row($resultat2)){
          echo "<tr>";
          for ($i =0;$i<2;$i++){
              echo "<td>".$ligne[$i]."</td>";
          }
          echo "</tr>";
      }
      echo"</table>
      </center>
      </div>";
    }//fin if
    //S'il fait parti de la liste, c'est qu'on a déjà créé son bouton
    //donc on ne s'en occupe pas.
  }
    ?>
  <script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
  </script>

  <?php  mysqli_close($connexion);?>

</body>
  <?php Include("footer.html"); ?>

</html>
