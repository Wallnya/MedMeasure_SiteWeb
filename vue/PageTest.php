<?php
if ($_SESSION["type"] == "Pilote") {

  if (isset($_SESSION['lang'])) {
    if ($_SESSION['lang'] == "en")
      include "langues/en.inc";
    else if ($_SESSION['lang'] == "fr") {
      include "langues/fr.inc";
    }
  } else {
    include "langues/fr.inc";
  }
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignTest.css" />
    <link rel="stylesheet" href="css/header2.css" />

  </head>

  <body>
    <header>
      <div class="barre_navigation">
        <img src="images/MedMeasure.png" alt="logo de MedMeasure">
        <a href="index.php?page=user"><?php echo _ACCUEIL ?></a>
        <a href="index.php?page=faq"><?php echo _BOUTONSFAQ ?></a>
        <a style="cursor:pointer" href="index.php?deco=deconnexion"><?php echo _DECONNEXION; ?></a>
        <form method="POST" action="index.php?page=user&traitement=test">
          <button type="submit" class="test" name="FR">FR</button>
          <button type="submit" class="test" name="EN">EN</button>
        </form>
      </div>
    </header>
    <form>
      <button type="submit" name="testSuivi" id="testSuivi" class="testSuivi" onclick="myFunction()">
        <div class="tests">
          <strong><?php echo _TESTDESUIVI ?></strong>
          <p>
            <img src="images/RythmeCardiaque.png">
            <?php echo _RYTHMECARDIAQUE ?>
          </p>
          <p>
            <img src="images/PerceptionAuditive.png">
            <?php echo _PERCEPTIONAUDITIVE ?>
          </p>
          <p>
            <img src="images/StimulusVisuel.png">
            <?php echo _STIMULUSVISUEL ?>
          </p>
        </div>
      </button>
    </form>
    <form>
      <button type="submit" name="testComplet" id="testComplet" class="testComplet" onclick="myFunction()">
        <div class="tests">
          <strong><?php echo _TESTCOMPLET ?></strong>
          <p>
            <img src="images/RythmeCardiaque.png">
            <?php echo _RYTHMECARDIAQUE ?>

          </p>
          <p>
            <img src="images/PerceptionAuditive.png">
            <?php echo _PERCEPTIONAUDITIVE ?>
          </p>
          <p>
            <img src="images/StimulusVisuel.png">
            <?php echo _STIMULUSVISUEL ?>
          </p>
          <p>
            <img src="images/Température.png">
            <?php echo _TEMPERATUREPEAU ?>
          </p>
          <p>
            <img src="images/ReconnaissanceTonalité.png">
            <?php echo _RECOTONALITE ?>
          </p>
        </div>
      </button>
    </form>
    <script>
      function myFunction() {
        document.getElementById("testSuivi").disabled = true;
        document.getElementById("testComplet").disabled = true;
      }
    </script>
  </body>

  </html>
<?php
} else {
  header('Location: index.php');
}
?>
