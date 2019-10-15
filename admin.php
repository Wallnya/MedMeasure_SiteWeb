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
      Page de l'administrateur
    </div>
  </header>
  <?php
  $connexion = mysqli_connect("localhost","root","")
  or die ("Tu es nul. Recommence.");

  $bd="test";

  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");

  $requete="select * from personnel";
  $resultat=mysqli_query($connexion,$requete);
  echo "<body>";
  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";

  echo "<tr><td></td><td>nom</td><td>prenom</td></tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for ($i =0;$i<3;$i++){
        echo "<td>".$ligne[$i]."</td>";
    }
  }
  echo"</table></center>";
  mysqli_close($connexion);?>

  <?php Include("footer.html"); ?>
<!--<footer>MedMeasure - FAQ - SUPPORT - MedMeasure@gmail.com - Contact : 01 23 45 56 78</footer>-->
</html>
