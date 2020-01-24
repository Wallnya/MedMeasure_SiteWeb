<?php
if ($_SESSION["type"]=="Pilote"){
  if (isset($_SESSION['lang'])){
    if($_SESSION['lang'] == "en")
    include "langues/en.inc";
    else if ($_SESSION['lang'] == "fr"){
      include "langues/fr.inc";
    }
  }
  else{
    include "langues/en.inc";
  }

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
      <a href="index.php?page=user"><?php echo _ACCUEIL; ?></a>
      <a href="index.php?page=faq"><?php echo _BOUTONSFAQ; ?></a>
      <a style="cursor:pointer" onclick="deconnexionFB();"><?php echo _DECONNEXION; ?></a>
      <form method="POST" action="index.php?page=user">
        <button type="submit" class="test" name="FR">FR</button>
        <button type="submit" class="test" name="EN">EN</button>
      </form>
    </div>
  </header>

  <body>
    <div class="presentationPilote">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <?php
      while ($data = $datauser->fetch())
      {
        ?>
        <p> <?= htmlspecialchars($data['nom']) ?>
          <?= htmlspecialchars($data['prenom']) ?>
          <?php echo _PILOTE2; ?> </p>
          <?php
        }
        $datauser->closeCursor();
        ?>
        <div class="container-fluid-message">
          <div class="rectangle-donnee-message">
            <div class="rectangle-message">
              <img src="images/notes-medical-solid.svg" alt="logo test">
              <p><?php echo _NBTESTS; ?><?= $nbtest?></p>
            </div>
            <div class="rectangle-message">
              <i class="fa fa-check"></i>
              <p><?php echo _NBTESTSREUSSIS; ?><?= $nbvalide ?></p>
            </div>
            <div class="rectangle-message">
              <i class="fa fa-calendar"></i>
              <p><?php echo _DATEDERNIERTESTPARTIEL; ?><?= $datepartiel ?></p>
            </div>
            <div class="rectangle-message">
              <i class="fa fa-hourglass"></i>
              <p><?php echo _DATEDERNIERTESTCOMPLET; ?><?= $datecomplet ?></p>
            </div>
          </div>
          <div class="gauche">
            <p>
              <div class="formulaire">
                <?php echo _PRETPOURUNTEST; ?>
                <form method="POST" action="index.php?page=user&traitement=test" id="formInscription">
                  <button type="submit" name="test" id="test"> <?php echo _LETSGO; ?></button>
                </form>
              </div>
            </p>
          </div>
          <div class="droite">
            <div class="formulaireBouton">
              <form method="POST" action="index.php?page=user&traitement=modifProfil" id="formInscription">
                <button type="submit" name="modifProfil"><?php echo _MODIFIERPROFIL; ?></button>
              </form>
              <form method="POST" action="index.php?page=user&traitement=ticket" id="formInscription">
                <button type="submit" name="ticket" id="ticket"><?php echo _ENVOYERTICKET; ?></button>
              </form>
              <form method="POST" action="index.php?page=user&traitement=Dernierresultat" id="formInscription">
                <button type="submit" name="Dernierresultat" id="Dernierresultat" onclick="myFunction()"><?php echo _DERNIERRESULTAT; ?></button>
              </form>
              <form method="POST" action="index.php?page=user&traitement=histo" id="formInscription">
                <button type="submit" name="histo" id="histo" onclick="myFunction()"><?php echo _HISTORIQUE; ?></button>
              </form>

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
        </div>
      </body>
      </html>
      <?php
    }
    else {
      header('Location: index.php');
    }
    ?>
