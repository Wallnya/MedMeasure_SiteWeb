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

  $requete="select * from faq";
  $resultat=mysqli_query($connexion,$requete);
  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
  echo "<tr class=\"entete\"><td>Numéro question</td><td>Intitulé</td><td>Reponse</td></tr>";
  while($ligne=mysqli_fetch_row($resultat)){
    echo "<tr>";
    for ($i =0;$i<3;$i++){
      if ($i==2){
        echo "<form action=\"modification_FAQ.php\" method=\"POST\"><td>";
        echo "<input type=\"text\" name=\"message\" value=\"".$ligne[$i]."\">";
        echo "<input type=\"hidden\" name=\"idFAQ\" value=\"".$ligne[0]."\">";
        echo "<button type=\"submit\" name=\"supprimerFAQ\"><i class=\"fa fa-trash\"></i></button>";
        echo "<button type=\"submit\" name=\"modifierFAQ\"><i class=\"fa fa-pencil\"></i></button>";
        echo "</td>";
      }
      else{
        echo "<td>".$ligne[$i]."</td>";

      }
       echo"</form>";
    }
  }
  echo"</table></center>";
?>
<p>Création d'une nouvelle question</p>
<center>
<?php echo "<form action=\"modification_FAQ.php\" method=\"POST\">";?>
<fieldset>
    <legend>Formulaire de la création d'une question</legend>
      <label for="question">Intitulé de la question</label>
      <textarea name="question"></textarea>
      <label for="reponse">Reponse de la question</label>
      <textarea name="reponse"></textarea>
      <br>
      <button type="submit" name="enregistrerFAQ"><i class="fa fa-save"></i></button>
  </fieldset>
  <?php echo"</form>";?>
</center>

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
