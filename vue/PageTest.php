<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="css/DesignTest.css" />
    <link rel="stylesheet" href="css/header2.css" />
    <script type="text/javascript" src="js/deconnexionFacebook.js"></script>

  </head>

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=user"><?php echo _ACCUEIL?></a>
      <a href="index.php?page=faq"><?php echo _BOUTONSFAQ?></a>
      <a style="cursor:pointer" onclick="deconnexionFB();"><?php echo _DECONNEXION?></a>
      <button class="test">FR</button>
      <button class="test">EN</button>
    </div>
  </header>
  <form action="">
    <button type="submit" class="btn1">
      <div class="Test1">
        <strong><?php echo _TESTDESUIVI?></strong>
        <p>
          <img src="images/RythmeCardiaque.png">
          <?php echo _RYTHMECARDIAQUE?>
        </p>
        <p>
          <img src="images/PerceptionAuditive.png">
          <?php echo _PERCEPTIONAUDITIVE?>
        </p>
        <p>
          <img src="images/StimulusVisuel.png">
          <?php echo _STIMULUSVISUEL?>
        </p>
      </div>
    </button>
  </form>
  <form action="">
    <button type="submit" class="btn2">
      <div class="Test1">
        <strong><?php echo _TESTCOMPLET?></strong>
        <p>
          <img src="images/RythmeCardiaque.png">
          <?php echo _RYTHMECARDIAQUE?>

        </p>
        <p>
          <img src="images/PerceptionAuditive.png">
          <?php echo _PERCEPTIONAUDITIVE?>
        </p>
        <p>
          <img src="images/StimulusVisuel.png">
          <?php echo _STIMULUSVISUEL?>
        </p>
        <p>
          <img src="images/Température.png">
          <?php echo _TEMPERATUREPEAU?>
        </p>
        <p>
          <img src="images/ReconnaissanceTonalité.png">
          <?php echo _RECOTONALITE?>
        </p>
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
