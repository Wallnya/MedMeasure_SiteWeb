<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  $bd="medmeasure";

  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");

  $requete="select * from utilisateur";
  $resultat=mysqli_query($connexion,$requete);
  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";

  echo "<tr><td></td><td>Nom</td><td>Prenom</td><td>Date de Naissance</td><td>Sexe</td><td>Adresse voie</td><td>Adresse Ville</td>
  <td>Code Postal</td><td>Téléphone</td></tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for ($i =0;$i<9;$i++){
        echo "<td>".$ligne[$i]."</td>";
    }
  }
  echo"</table></center>";

  ?>
  <p>Gestion des utilisateurs</p>
  <?php
    $requete="select * from connexion";
    $resultat=mysqli_query($connexion,$requete);
    echo "<center><table border='1' cellpadding='5' cellpacing='9'>";

    echo "<tr><td>Email</td><td>Mot de passe</td><td>Type</td></tr>";
    while($ligne=mysqli_fetch_row($resultat)){
      echo "<tr>";
      for ($i =0;$i<3;$i++){
        echo "<td>".$ligne[$i];
        if ($i == 2 ){
          echo "<a href=\"supprimerUtilisateur.php\"><i class=\"fa fa-trash\"></i></a>";
          echo "<a href=\"modifierUtilisateur.php\"><i class=\"fa fa-pencil\"></i></a>";
        }
        echo "</td>";
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
      echo "<button type=\"button\" class=\"collapsible\">Utilisateur".$data['idUtilisateur']."</button>";
      echo "<div class=\"content\">";
      //On récupère le numéro du test ainsi que les différentes valeurs.
      $requete2="select numero_test, date,frequence from testpartiel where idUtilisateur = ".$data['idUtilisateur'];
      $resultat2=mysqli_query($connexion,$requete2);
      //On affiche le tout dans un tableau
      while($ligne=mysqli_fetch_row($resultat2)){
          //On crée un bouton collapse pour chaque test.
          echo "<button type=\"button\" class=\"collapsible\">Test partiel n°".$ligne[0]."</button>";
          echo "<div class=\"content\">";
          echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
          echo "<tr><td>Numéro du test partiel</td></td><td>Date du test</td><td>fréquence</td><td></td></tr>";
          echo "<tr>";
          for ($i =0;$i<3;$i++){
              echo "<td>".$ligne[$i]."</td>";
          }
          /*A REVOIR POUR QUE CA SOIT JOLI!!!!*/
          echo "<td><a href=\"supprimerdonnes.php?id=".$data['idUtilisateur']."&numero_test=".$ligne[0]."'\"><i class=\"fa fa-trash\"></i></a></td>";
          echo "</tr>
            </table>
            </center>
            </div>";
      }
      echo"</div>";
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
