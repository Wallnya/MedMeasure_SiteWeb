<!DOCTYPE html>
<html lang="en" >
<meta charset="UTF-8">
<title>Dernier Résultat</title>
<link rel="stylesheet" href="./css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user">Accueil</a>
    <a href="index.php?page=faq">FAQ</a>
    <a href="index.php?deco=deconnexion">Déconnexion</a>
  </div>
  <div class="texte">
    <img src="images/Avion06.jpg" alt="Image pour la page resultat">
  </div>
</header>

<body>
  <div class="main">
    <?php if ($resultat=="partiel") {?>
      <label for="panel_size">Résultat du test partiel</label>
      <?php
    }
    else
    {?>
      <label for="panel_size">Résultat du test complet</label>
      <?php
    }
    ?>
    <?php
    while ($data = $resultatTest->fetch())
    {
      ?>
      <p> Date : <?php echo htmlspecialchars($data['date']) ?> </p>

      <input
      type="range"
      name="participants"
      min="0"
      max="100"
      value="<?php echo htmlspecialchars($data['score']) ?>"
      >
      <span class="rangeslider__tooltip" id ="range-tooltip"></span>
      <input name="cliquez-ici" type="button" style="display:none;" id="click" value="cliquez ici" onclick="document.location.href='https://www.doctolib.fr'">

      <p> Rythme cardiaque : <?php echo htmlspecialchars($data['Frequence']) ?> bpm </p>
      <p> Perception auditive : <?php echo htmlspecialchars($data['PerceptionAuditive']) ?> dBA </p>
      <p> Réaction à un stimulus visuel : <?php echo htmlspecialchars($data['StimulusVisuel']) ?> ms </p>
      <?php if ($resultat=="complet") {?>
        <p> Température superficielle de la peau : <?php echo htmlspecialchars($data['TemperaturePeau']) ?>°C </p>
        <p> Reconnaissance de la tonalité : <?php echo htmlspecialchars($data['RecoTonalite']) ?> Hz </p>
      <?php } ?>
      <?php
    }
    $resultatTest->closeCursor();
    ?>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://andreruffert.github.io/rangeslider.js/assets/rangeslider.js/dist/rangeslider.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js'></script><script  src="./js/script.js"></script>
</body>
</html>
