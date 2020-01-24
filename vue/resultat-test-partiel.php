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
<html lang="en" >
<meta charset="UTF-8">
<title>Dernier Résultat</title>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="css/header3.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script type="text/javascript" src="js/deconnexionFacebook.js"></script>


<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user"><?php echo _ACCUEIL?></a>
    <a href="index.php?page=faq"><?php echo _BOUTONSFAQ?></a>
    <a style="cursor:pointer" href="index.php?deco=deconnexion"><?php echo _DECONNEXION; ?></a>
    <form method="POST" action="index.php?page=user&traitement=Dernierresultat">
      <button type="submit" class="test" name="FR">FR</button>
      <button type="submit" class="test" name="EN">EN</button>
    </form>
  </div>
  <div class="texte">
    <img src="images/Avion06.jpg" alt="Image pour la page resultat">
  </div>
</header>

<body>
  <div class="main">
    <?php if ($resultat=="partiel") {?>
      <label for="panel_size"><?php echo _RESULTATTESTPARTIEL?></label>
      <?php
    }
    else
    {?>
      <label for="panel_size"><?php echo _RESULTATTESTCOMPLET?></label>
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
      <input name="cliquez-ici" type="button" style="display:none;" id="click" value="<?php echo _CLICK?>" onclick="document.location.href='https://www.doctolib.fr'">

      <p> <?php echo _RYTHMECARDIAQUE?> : <?php echo htmlspecialchars($data['Frequence']) ?> bpm </p>
      <p> <?php echo _PERCEPTIONAUDITIVE?> : <?php echo htmlspecialchars($data['PerceptionAuditive']) ?> dBA </p>
      <p> <?php echo _STIMULUSVISUEL?> : <?php echo htmlspecialchars($data['StimulusVisuel']) ?> ms </p>
      <?php if ($resultat=="complet") {?>
        <p> <?php echo _TEMPERATUREPEAU?> : <?php echo htmlspecialchars($data['TemperaturePeau']) ?>°C </p>
        <p> <?php echo _RECOTONALITE?> : <?php echo htmlspecialchars($data['RecoTonalite']) ?> Hz </p>
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

<?php
}
else {
header('Location: index.php');
}
?>
