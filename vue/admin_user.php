<?php
if ($_SESSION["type"]=="Administrateur"){
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
  <html>
  <meta charset="utf-8">
  <title><?php echo _ADMIN; ?></title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/header1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=admin_user"><?php echo _UTILISATEURS; ?></a>
      <a href="index.php?page=admin_faq"><?php echo _FAQ; ?></a>
      <a href="index.php?page=admin_ticket"><?php echo _TICKETS; ?></a>
      <a style="cursor:pointer" href="index.php?deco=deconnexion"><?php echo _DECONNEXION; ?></a>
      <form method="POST" action="index.php?page=admin_user">
        <button type="submit" class="test" name="FR">FR</button>
        <button type="submit" class="test" name="EN">EN</button>
      </form>
    </div>
    <div class="texte">
      <img src="images/image_admin.jpg" alt="Image pour la page admin">
    </div>
  </header>
  <body>


<div class="container-fluid">
  <div class="rectangle-donnee">
    <div class="rectangle">
      <i class="fa fa-users"></i>

      <?php
      while ($data = $nbuser->fetch())
      {
        ?>
        <p> <?php echo _NBUTILISATEURS; ?> <?= htmlspecialchars($data['uti']) ?></p>
        <?php
      }
      $nbuser->closeCursor();
      ?>
    </div>
    <div class="rectangle">
      <i class="fa fa-plane"></i>
      <?php
      while ($data = $nbpilote->fetch())
      {
        ?>
        <p><?php echo _NBPILOTES; ?> <?= htmlspecialchars($data['uti']) ?></p>
        <?php
      }
      $nbpilote->closeCursor();
      ?>
    </div>
    <div class="rectangle">
      <img src="images/notes-medical-solid.svg" alt="logo test">
      <p><?php echo _NBTESTS; ?> <?= $nbTest ?> </p>
    </div>
    <div class="rectangle">
      <i class="fa fa-check"></i>
      <p><?php echo _NBTESTSREUSSIS; ?> <?= $nbTestReussis ?></p>
    </div>
  </div>
</div>
<p><?php echo _DONNEESGENERALES; ?></p>
<div class="container-fluid">
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td><?php echo _NOM; ?></td>
        <td><?php echo _PRENOM; ?></td>
        <td><?php echo _DATENAISSANCE; ?></td>
        <td><?php echo _SEXE; ?></td>
        <td><?php echo _ADRESSE; ?></td>
        <td><?php echo _VILLE; ?></td>
      <td><?php echo _CODEPOSTAL; ?></td>
        <td><?php echo _TELEPHONE; ?></td>
      </tr>
      <?php
      while ($data = $user->fetch())
      {
        ?>
        <tr>
          <td>
            <?= htmlspecialchars($data['nom']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['prenom']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['DN']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['Sexe']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['AdresseVoie']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['AdresseVille']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['AdresseCP']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['Tel']) ?>
          </td>
        </tr>
        <?php
      }
      $user->closeCursor();
      ?>
    </table>
  </center>
</div>

<p><?php echo _GESTIONUTILISATEURS; ?></p>
<div class="container-fluid">
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td><?php echo _EMAIL; ?></td>
        <td><?php echo _TYPE; ?></td>
        <td><?php echo _VALIDEQ; ?></td>
      </tr>
      <?php
      while ($data2 = $dataconnexion->fetch())
      {
        ?>
        <tr>
          <td>
            <?= htmlspecialchars($data2['email']) ?>
          </td>
          <td>
            <form method="POST" action="index.php?page=admin_user">
              <select name="Type" id="Type">
                <?php if (strcmp (htmlspecialchars($data2['type']),"Administrateur") == 0)
                {
                  ?>
                  <option value="Administrateur" selected><?php echo _ADMINISTRATEUR; ?></option>
                  <option value="Gestionnaire" ><?php echo _GESTIONNAIRE; ?></option>
                  <option value="Pilote"><?php echo _PILOTE; ?></option>
                  <?php
                }
                else if (strcmp (htmlspecialchars($data2['type']),"Gestionnaire") == 0)
                {
                  ?>
                  <option value="Administrateur"><?php echo _ADMINISTRATEUR; ?></option>
                  <option value="Gestionnaire" selected><?php echo _GESTIONNAIRE; ?></option>
                  <option value="Pilote"><?php echo _PILOTE; ?></option>
                  <?php
                }
                else
                {
                  ?>
                  <option value="Administrateur" ><?php echo _ADMINISTRATEUR; ?></option>
                  <option value="Gestionnaire" ><?php echo _GESTIONNAIRE; ?></option>
                  <option value="Pilote" selected><?php echo _PILOTE; ?></option>
                  <?php
                }
                ?>
              </select>
              <input type="hidden"  name="idUtilisateur" value="<?= htmlspecialchars($data2['idUtilisateur']) ?>">
              <button type="submit"  onClick="return confirm('<?php echo _BANNIR?>')" name="bannir"><i class="fa fa-ban"></i></button>
              <button type="submit"  onClick="return confirm('<?php echo _DELETEUSER?>')" name="supprimer"><i class="fa fa-trash"></i></button>
              <button type="submit" name="modifier"><i class="fa fa-check"></i></button>
            </td>
            <td>
              <select name="Valide" id="Valide">
                <?php if (strcmp (htmlspecialchars($data2['valide']),"0") == 0)
                {
                  ?>
                  <option value="0" selected><?php echo _NONVALIDE; ?></option>
                  <option value="1" ><?php echo _VALIDE; ?></option>
                  <?php
                }
                else if (strcmp (htmlspecialchars($data2['valide']),"1") == 0)
                {
                  ?>
                  <option value="0" ><?php echo _NONVALIDE; ?></option>
                  <option value="1" selected><?php echo _VALIDE; ?></option>
                  <?php
                }
                  ?>
              </select>
              <button type="submit" name="modifierValide"><i class="fa fa-check"></i></button>
            </td>
          </form>
        </tr>
        <?php
      }
      $dataconnexion->closeCursor();
      ?>
    </table>
  </center>
</div>
<br>
<div class="container-fluid">
  <p><?php echo _GESTIONTESTSPARTIELS; ?></p>
  <div class="container-fluid">
    <?php
    $numero_utilisateur = array();
    while ($data = $total->fetch()){
      if (in_array($data['idUtilisateur'],$numero_utilisateur) == False){
        echo "</div>";
        array_push($numero_utilisateur,$data['idUtilisateur']);
        echo "<button type=\"button\" class=\"collapsible\">".$data['nom']."</button>";
        echo "<div class=\"content\">";
      } ?>

      <form method="POST" action="index.php?page=admin_user">

      <?php
      echo "<button type=\"button\" class=\"collapsible\">Test partiel n°".$data['numero_test']."</button>";
      echo "<div class=\"content\">";
      echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
      echo "<tr class=\"entete\"><td>"._DATETEST."</td><td>"._RYTHMECARDIAQUE."</td><td>"._PERCEPTIONAUDITIVE."</td>
      <td>"._STIMULUSVISUEL."</td> <td>Score</td><td></td></tr>";
      echo "<tr>";
      ?>
      <td>
        <?= htmlspecialchars($data['date']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['Frequence']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['PerceptionAuditive']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['StimulusVisuel']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['score']) ?>
      </td>
      <td>
        <input type="hidden"  name="idUtilisateur" value="<?= htmlspecialchars($data['idUtilisateur']) ?>">
        <input type="hidden"  name="idtest" value="<?= htmlspecialchars($data['numero_test']) ?>">
        <button type="submit" name="supprimerTestPartiel"><i class="fa fa-trash"></i></button>
      </td>
    </form>
    </tr>
  </table>
</center>
</div>
<?php
}
$total->closeCursor();
?>
</div>


<br>
<div class="container-fluid">
  <p><?php echo _GESTIONTESTSCOMPLETS; ?></p>
    <?php
    $numero_utilisateur = array();
    while ($data = $total2->fetch()){
      if (in_array($data['idUtilisateur'],$numero_utilisateur) == False){
        echo "</div>";
        array_push($numero_utilisateur,$data['idUtilisateur']);
        echo "<button type=\"button\" class=\"collapsible\">".$data['nom']."</button>";
        echo "<div class=\"content\">";
      } ?>

      <form method="POST" action="index.php?page=admin_user">

      <?php
            echo "<button type=\"button\" class=\"collapsible\">Test complet n°".$data['Numero_Test']."</button>";
      echo "<div class=\"content\">";
      echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
      echo "<tr class=\"entete\"><td>"._DATETEST."</td><td>"._RYTHMECARDIAQUE."</td><td>"._PERCEPTIONAUDITIVE."</td>
      <td>"._STIMULUSVISUEL."</td><td>"._TEMPERATUREPEAU."</td> <td>"._RECOTONALITE."</td><td>Score</td><td></td></tr>";
      echo "<tr>";
      ?>
      <td>
        <?= htmlspecialchars($data['date']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['Frequence']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['PerceptionAuditive']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['StimulusVisuel']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['TemperaturePeau']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['RecoTonalite']) ?>
      </td>
      <td>
        <?= htmlspecialchars($data['score']) ?>
      </td>
      <input type="hidden"  name="idUtilisateur" value="<?= htmlspecialchars($data['idUtilisateur']) ?>">
      <input type="hidden"  name="idtest" value="<?= htmlspecialchars($data['numero_test']) ?>">
      <td><button type="submit" name="supprimerTestComplet"><i class="fa fa-trash"></i></button>
</td>
</form>

    </tr>
  </table>
</center>
</div>
<?php
}
$total2->closeCursor();
?>
</div>
</div>

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
</div>

</body>
</html>
<?php
}
else {
  header('Location: index.php');
}
?>
