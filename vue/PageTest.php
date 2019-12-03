<!DOCTYPE html>
<html>
<?php
if ($_SESSION["type"]=="Pilote"){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignTest.css" />
  </head>

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=user">Accueil</a>
      <a href="index.php?page=faq">FAQ</a>
      <a href="index.php?deco=deconnexion">Deconnexion</a>
    </div>
  </header>
  <form action="">
    <button type="submit" class="btn1">
      <div class="Test1">
        <strong>Test de suivi</strong>
        <p>
          <img src="images/RythmeCardiaque.png">
          Rythme cardiaque
        </p>
        <p>
          <img src="images/PerceptionAuditive.png">
          Perception auditive
        </p>
        <p>
          <img src="images/StimulusVisuel.png">
          Réaction à un stimulus visuel
        </p>
      </div>
    </button>
  </form>
  <form action="">
    <button type="submit" class="btn2">
      <div class="Test1">
        <strong>Test complet</strong>
        <p>
          <img src="images/RythmeCardiaque.png">
          Rythme cardiaque

        </p>
        <p>
          <img src="images/PerceptionAuditive.png">
          Perception auditive
        </p>
        <p>
          <img src="images/StimulusVisuel.png">
          Réaction à un stimulus visuel
        </p>
        <p>
          <img src="images/Température.png">
          Température de la peau
        </p>
        <p>
          <img src="images/ReconnaissanceTonalité.png">
          Reconnaissance de tonalité
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
