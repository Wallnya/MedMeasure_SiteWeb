<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/css_adminfaq.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <header>
    <div class="barre_navigation">
      <a href="#deconnexion">Deconnexion</a>
      <a href="admin.php">Gestion Utilisateur</a>
      <a href="admin_faq.php">Gestion FAQ</a>
      <a href="admin_ticket.php">Gestion Tickets</a>
    </div>
    <div class="texte">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      Page de l'administrateur - Gestion
    </div>
  </header>
  <body>
  <p>Récapitulatif des questions de la FAQ</p>
<?php
  $connexion = mysqli_connect("localhost","root","")
  or die ("Tu es nul. Recommence.");

  $bd="medmeasure";

  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");

  $requete="select * from ticket";
  $resultat=mysqli_query($connexion,$requete);
  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
  echo "<tr class=\"entete\"><td>Numéro ticket</td><td>Utilisateur</td><td>Date d'envoie</td><td>Intitulé</td><td>Contenu</td><td>Statut</td></tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for($i=0;$i<6;$i++){
      if ($i == 1){
        $requete2="select nom from utilisateur where idUtilisateur=".$ligne[$i];
        $resultat2=mysqli_query($connexion,$requete2);
        $ligne2=mysqli_fetch_row($resultat2);
        echo "<td>".$ligne2[0]."</td>";
      }
      else if ($i != 5){
        echo "<td>".$ligne[$i]."</td>";
      }

      else {
        echo "<td>";
        echo "<form action=\"modification_ticket.php\" method=\"POST\">";
      if ($ligne[5]=='1') {
        echo "<select name=\"Statut\" id=\"Statut\">
          <option value=\"1\" selected>Terminé</option>
          <option value=\"0\">En cours</option>
        </select>";
      }
      else {
        echo "<select name=\"Statut\" id=\"Statut\">
          <option value=\"1\" >Terminé</option>
          <option value=\"0\" selected>En cours</option>
        </select>";
      }
      echo "<input type=\"hidden\" name=\"idTicket\" value=\"".$ligne[0]."\">";
      echo "<button type=\"submit\" name=\"modifier\"><i class=\"fa fa-pencil\"></i></button>";
      echo"</form>";
      echo "</td>";
    }
  }
    echo "</tr>";
  }
  echo"</table></center>";
?>
  <?php  mysqli_close($connexion);?>

</body>
  <?php Include("footer.html"); ?>
</html>
