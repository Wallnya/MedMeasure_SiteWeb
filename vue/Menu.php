<?php
if ($_SESSION["type"]=="Pilote"){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>MedMeasure</title>
  <link rel="stylesheet" href="css/DesignMenu.css" />
</head>

<header>

  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user">Accueil</a>
    <a href="index.php?page=faq">FAQ</a>
    <a href="index.php?deco=deconnexion">Deconnexion</a>
  </div>
  <div class="texte">
    <img src="images/cockpit.jpg" alt="Image pour la page user">
  </div>

</header>

<body>
  <div class="Profil">
    <?php
    while ($data = $datauser->fetch())
    {
    ?>
    <p> <?= htmlspecialchars($data['nom']) ?>
    <?= htmlspecialchars($data['prenom']) ?></p>
    <?php
    }
    $datauser->closeCursor();
    ?>
    <form method="POST" action="index.php?page=user" id="formInscription">
      <button type="submit" name="modifProfil" class="btnProfil">
        <div class="ModificationProfil">
          Modifier le profil
        </div>
      </button>
    </form>
  </div>
  <!--BOUTON ENVOYER UN TICKET/MESSAGE A L ADMIN-->

  <form action="Page Test.html">
    <button type="submit" class="btnTest">

      <div class="Test">
        Test
      </div>

    </button>
  </form>
  <form action="">
    <button type="submit" class="btnRésultats">

      <div class="Resultat">
        Dernier résultat
      </div>

    </button>
  </form>
  <form action="">
    <button type="submit" class="btnRésultats">

      <div class="Resultat">
        Historique des résultats
      </div>

    </button>
  </form>
</body>
</html>
<?php
 }
 else {
  header('Location: index.php');
 }
 ?>