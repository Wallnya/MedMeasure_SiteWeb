<?php
if ($_SESSION["type"]=="Pilote"){
?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignMenu.css" />
    <link rel="stylesheet" href="css/header2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/deconnexionFacebook.js"></script>
  </head>

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=user">Accueil</a>
      <a href="index.php?page=faq">FAQ</a>
      <a style="cursor:pointer" onclick="test();">Déconnexion</a>
      <!-- href="index.php?deco=deconnexion" -->
      <button class="test">FR</button>
      <button class="test">EN</button>
    </div>
  </header>
  <script>

  </script>
  <body>
    <div class="formulaire-login">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <?php
      while ($data = $datauser->fetch())
      {
        ?>
        <p> <?= htmlspecialchars($data['nom']) ?>
          <?= htmlspecialchars($data['prenom']) ?>
          - Pilote </p>
          <?php
        }
        $datauser->closeCursor();
        ?>
        <div class="container-fluid-ticket">
          <div class="rectangle-donnee-ticket">
            <div class="rectangle-ticket">
              <img src="images/notes-medical-solid.svg" alt="logo test">
              <p>Nombre de tests: <?= $nbtest?></p>
            </div>
            <div class="rectangle-ticket">
              <i class="fa fa-check"></i>
              <p>Tests réussis: <?= $nbvalide ?></p>
            </div>
            <div class="rectangle-ticket">
              <i class="fa fa-calendar"></i>
              <p>Date du dernier test partiel <?= $datepartiel ?></p>
            </div>
            <div class="rectangle-ticket">
              <i class="fa fa-hourglass"></i>
              <p>Date du dernier test complet <?= $datecomplet ?></p>
            </div>
          </div>
          <div class="gauche">
            <p>
              <div class="formulaire">
                Prêt pour un test ?
                <form method="POST" action="index.php?page=user" id="formInscription">
                <button type="submit" name="test" id="test">C'est parti</button>
              </div>
            </p>
          </div>
          <div class="droite">
            <div class="formulaireBouton">
                <button type="submit" name="modifProfil">Modifier le profil</button>
                <button type="submit" name="ticket" id="ticket">Envoyer un ticket</button>
                <button type="submit" name="Dernierresultat" id="Dernierresultat" onclick="myFunction()">Dernier resultat</button>
                <button type="submit" name="histo" id="histo" onclick="myFunction()">Historique</button>
              </div>
            </form>
          </div>
        </div>
        <script>
        function myFunction(){
          <?php if ($nbtest == 0){?>
            document.getElementById("Dernierresultat").disabled = true;
            document.getElementById("histo").disabled = true;
        <?php } else { ?>
          document.getElementById("Dernierresultat").disabled = false;
          document.getElementById("histo").disabled = false;

<?php } ?>
        }
      </script>
      </body>
      </html>
      <?php
    }
    else {
      //header('Location: index.php');
    }
    ?>
