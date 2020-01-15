<?php
if ($_SESSION["type"]=="Administrateur"){
  ?>
  <!DOCTYPE html>
  <html>
  <meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/header1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=admin_user">Gestion Utilisateur</a>
      <a href="index.php?page=admin_faq">Gestion FAQ</a>
      <a href="index.php?page=admin_ticket">Gestion Tickets</a>
      <a href="index.php?deco=deconnexion">Déconnexion</a>
      <button class="test">FR</button>
      <button class="test">EN</button>
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
        <p> Nombre utilisateurs : <?= htmlspecialchars($data['uti']) ?></p>
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
        <p>Nombre de pilotes : <?= htmlspecialchars($data['uti']) ?></p>
        <?php
      }
      $nbpilote->closeCursor();
      ?>
    </div>
    <div class="rectangle">
      <img src="images/notes-medical-solid.svg" alt="logo test">
      <p>Nombre de tests : <?= $nbTest ?> </p>
    </div>
    <div class="rectangle">
      <i class="fa fa-check"></i>
      <p>Tests réussis : <?= $nbTestReussis ?></p>
    </div>
  </div>
</div>
<p>Récapitulatif des données générales</p>
<div class="container-fluid">
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td>Nom</td>
        <td>Prenom</td>
        <td>Date de Naissance</td>
        <td>Sexe</td>
        <td>Adresse</td>
        <td>Ville</td>
        <td>Code Postal</td>
        <td>Téléphone</td>
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

<p>Gestion des utilisateurs</p>
<div class="container-fluid">
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td>Email</td>
        <td>Type</td>
        <td>Validé ?</td>
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
                  <option value="Administrateur" selected>Administrateur</option>
                  <option value="Gestionnaire" >Gestionnaire</option>
                  <option value="Pilote">Pilote</option>
                  <?php
                }
                else if (strcmp (htmlspecialchars($data2['type']),"Gestionnaire") == 0)
                {
                  ?>
                  <option value="Administrateur" >Administrateur</option>
                  <option value="Gestionnaire" selected>Gestionnaire</option>
                  <option value="Pilote">Pilote</option>
                  <?php
                }
                else
                {
                  ?>
                  <option value="Administrateur" >Administrateur</option>
                  <option value="Gestionnaire" >Gestionnaire</option>
                  <option value="Pilote" selected>Pilote</option>
                  <?php
                }
                ?>
              </select>
              <input type="hidden"  name="idUtilisateur" value="<?= htmlspecialchars($data2['idUtilisateur']) ?>">
              <button type="submit"  onClick="return confirm('Êtes-vous sûr de vouloir BANNIR cet utilisateur?')" name="bannir"><i class="fa fa-ban"></i></button>
              <button type="submit"  onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')" name="supprimer"><i class="fa fa-trash"></i></button>
              <button type="submit" name="modifier"><i class="fa fa-check"></i></button>
            </td>
            <td>
              <select name="Valide" id="Valide">
                <?php if (strcmp (htmlspecialchars($data2['valide']),"0") == 0)
                {
                  ?>
                  <option value="0" selected>Non validé</option>
                  <option value="1" >Validé</option>
                  <?php
                }
                else if (strcmp (htmlspecialchars($data2['valide']),"1") == 0)
                {
                  ?>
                  <option value="0" >Non validé</option>
                  <option value="1" selected>Validé</option>
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
  <p>Gestion des tests partiels</p>
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
      echo "<tr class=\"entete\"><td>Date du test</td><td>Fréquence</td><td>Perception Auditive</td>
      <td>Stimulus Visuel</td> <td>Score</td><td></td></tr>";
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
  <p>Gestion des tests complets</p>
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
      echo "<tr class=\"entete\"><td>Date du test</td><td>Fréquence</td><td>Perception Auditive</td>
      <td>Stimulus Visuel</td><td>Temperature de la peau</td> <td>Reconnaissance de la tonalité</td><td>Score</td><td></td></tr>";
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
