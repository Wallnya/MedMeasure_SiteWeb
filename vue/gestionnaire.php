<?php
if ($_SESSION["type"]=="Gestionnaire"){
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo _GESTIONNAIRE ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="./css/style_gestionnaire.css">
  <link rel="stylesheet" href="./css/header3.css">

  <link rel="stylesheet" href="./css/diagramme.css">
  <link rel="stylesheet" href="./css/histogramme.css">

</head>

<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=gestionnaire&traitement=sexe"><?php echo _ACCUEIL ?></a>
    <a style="cursor:pointer" href="index.php?deco=deconnexion"><?php echo _DECONNEXION; ?></a>
    <form method="POST">
      <button type="submit" class="test" name="FR">FR</button>
      <button type="submit" class="test" name="EN">EN</button>
    </form>
  </div>
  <div class="texte">
    <img src="images/gestion.png" alt="Image pour la page resultat">
  </div>
</header>

<body>
  <br/><br/><br/><br/><br/><br/><br/>
  <!-- Menu -->
  <div id="recherche" class="onglets">
    <form method="POST" style="margin:auto" action="index.php?page=gestionnaire&traitement=recherche">
      <button class="onglet" type="submit" name="recherchenom" id="validerFiltre"
      style="<?php if (isset($_POST["recherchenom"])) echo "background: #82A0B5" ?>">
      <?php echo _RECHERCHERPILOTE ?>
      </button>
    </form>
    <form method="POST" style="margin:auto" action="index.php?page=gestionnaire&traitement=sexe">
      <button class="onglet" type="submit" name="statprofil" id="validerFiltre"
      style="<?php if (isset($_POST["statprofil"])) echo "background: #82A0B5" ?>">
      <?php echo _STATISTIQUES ?><br/><?php echo _PROFIL ?>
      </button>
    </form>
    <form method="POST" style="margin:auto" action="index.php?page=gestionnaire&traitement=test">
      <button class="onglet" type="submit" name="stattest" id="validerFiltre"
      style="<?php if (isset($_POST["stattest"])) echo "background: #82A0B5" ?>">
      <?php echo _STATISTIQUES ?><br/><?php echo _TEST ?>
      </button>
    </form>
  </div>

  <?php
  if (isset($_POST["recherchenom"])){
    #connexion à la base de données
    ?>
    <!-- Recherche -->
    <div class="filtres">
      <form method="GET" action="index.php?page=gestionnaire&traitement=recherche" style="margin:auto;">
        <div style="display:flex;margin-top:20px">
          <div style="float:left;margin-left:5px;margin-right:5px">
            <input style="font-size:16px" type="text" name="search" placeholder="<?php echo _RECHERCHERUSER?>"
            <?php if (isset($_GET["search"])) echo "value='".$_GET["search"]."'" ?>)>
          </div>
          <div style="float:right; margin:auto;margin-left:5px;margin-right:5px">
            <button type="submit" class="Rechercher" name="validerRecherche" id="validerRecherche">Rechercher</button>
          </div>
        </div>
        <input type="hidden" name = "page" value="gestionnaire"></input>
        <input type="hidden" name = "traitement" value="recherche"></input>
      </form>
    </div>

    <?php

    if ((isset($_GET['validerRecherche']) && !empty($_GET['search']) && $_GET['search'] !== '  ') || isset($_GET['validerRecherche2'])) {
      if ($nbUser == 0) {
        ?>
        <div style="margin-top:30px">
          <div style="text-align:center">
            <label><?php echo _NORESULT ?> "<?php echo $_GET["search"]; ?>".</label>
          </div>
        </div>
        <?php
      } else {
        ?>

        <div style="margin-top:30px">
          <div style="text-align:center">
            <label><?php echo _RESULTATRECHERCHEPILOTE ?></label>
          </div>
          <div class="filtres">
            <form method="get" action="index.php?page=gestionnaire&traitement=recherche&validerRecherche=&search=<?php echo $_GET["search"]; ?>" style="margin:auto;margin-top:5px">
              <div style="display:flex;">
                <div style="float:left;margin-left:5px;margin-right:5px">
                  <select style="width:200px; height:30px; font-size: 15px;" name="user">
                    <?php foreach ($listeUser as $user) { ?>
                      <option value="<?php echo $user['prenom']." ".$user['nom']?>" <?php if (isset($_GET["user"]) && $_GET["user"] == $user['prenom']." ".$user['nom']) echo "selected"; ?>>
                        <?=$user['prenom']?> <?=$user['nom']?>
                      </option>;
                    <?php } ?>
                  </select>
                </div>
                <input type="hidden" name="search" value="<?php echo $_GET["search"]; ?>">
                <div style="float:right; margin:auto;margin-left:5px;margin-right:5px">
                  <button type="submit" class="Rechercher" name="validerRecherche2" id="validerRecherche2">Valider</button>
                </div>
              </div>
              <input type="hidden" name = "page" value="gestionnaire"></input>
              <input type="hidden" name = "traitement" value="recherche"></input>
            </form>
          </div>
        </div>

        <?php

      }
    }
    if (isset($_GET['validerRecherche2']) && $_GET['validerRecherche2'] == "") {
      if ($nb1 != 0) {
        echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
        echo "<tr class=\"entete\"><td>Date du test COMPLET</td><td>Fréquence</td><td>Perception Auditive</td>
        <td>Stimulus Visuel</td><td>Temperature de la peau</td> <td>Reconnaissance de la tonalité</td><td>Score</td><td></td></tr>";
        echo "<tr>";
        foreach ($listeUser2 as $user) {?>
          <td>
            <?= htmlspecialchars($user['date']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['Frequence']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['PerceptionAuditive']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['StimulusVisuel']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['TemperaturePeau']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['RecoTonalite']) ?>
          </td>
          <td>
            <?= htmlspecialchars($user['score']) ?>
          </td>
        </td>
      </form>
    </tr>
  <?php } ?>
</table>
</center>
<br>
<?php
}

if ($nb2 != 0) {
  echo "<div class=\"container-fluid\">";

  echo "<center><table border='1' cellpadding='5' cellpacing='9'>";
  echo "<tr class=\"entete\"><td>Date du test PARTIEL </td><td>Fréquence</td><td>Perception Auditive</td>
  <td>Stimulus Visuel</td><td>Score</td><td></td></tr>";
  echo "<tr>";
  foreach ($listeUser3 as $user2) {?>
    <td>
      <?= htmlspecialchars($user2['date']) ?>
    </td>
    <td>
      <?= htmlspecialchars($user2['Frequence']) ?>
    </td>
    <td>
      <?= htmlspecialchars($user2['PerceptionAuditive']) ?>
    </td>
    <td>
      <?= htmlspecialchars($user2['StimulusVisuel']) ?>
    </td>
    <td>
      <?= htmlspecialchars($user2['score']) ?>
    </td>
  </td>
</form>

</tr>

<?php } ?>
</table>
</center>
<?php
}
}
echo "</div>";
}
if (isset($_POST["statprofil"]) || (!isset($_POST["recherchenom"]) && !isset($_POST["statprofil"]) && !isset($_POST["stattest"]))){
  ?>

  <!-- Graphique sexe -->
  <input type="hidden" id="pcFemmes" value="<?php echo round(($femme/$nbTotal)*100) ?>">
  <input type="hidden" id="pcHommes" value="<?php echo round(($homme/$nbTotal)*100) ?>">

  <!-- Graphique âge -->
  <input type="hidden" id="pcAge1" value="<?php echo round(($nbAge20/$nbTotal)*100) ?>">
  <input type="hidden" id="pcAge2" value="<?php echo round(($nbAge2030/$nbTotal)*100) ?>">
  <input type="hidden" id="pcAge3" value="<?php echo round(($nbAge3040/$nbTotal)*100) ?>">
  <input type="hidden" id="pcAge4" value="<?php echo round(($nbAge4050/$nbTotal)*100) ?>">
  <input type="hidden" id="pcAge5" value="<?php echo round(($nbAge5060/$nbTotal)*100) ?>">
  <input type="hidden" id="pcAge6" value="<?php echo round(($nbAge60/$nbTotal)*100) ?>">

  <!-- Graphique score partiel -->
  <input type="hidden" id="pcPartiel1" value="<?php echo round(($nbPartiel025/$nbPartiel)*100) ?>">
  <input type="hidden" id="pcPartiel2" value="<?php echo round(($nbPartiel2550/$nbPartiel)*100) ?>">
  <input type="hidden" id="pcPartiel3" value="<?php echo round(($nbPartiel5075/$nbPartiel)*100) ?>">
  <input type="hidden" id="pcPartiel4" value="<?php echo round(($nbPartiel75100/$nbPartiel)*100) ?>">

  <!-- Graphique score complet -->
  <input type="hidden" id="pcComplet1" value="<?php echo round(($nbComplet025/$nbComplet)*100) ?>">
  <input type="hidden" id="pcComplet2" value="<?php echo round(($nbComplet2550/$nbComplet)*100) ?>">
  <input type="hidden" id="pcComplet3" value="<?php echo round(($nbComplet5075/$nbComplet)*100) ?>">
  <input type="hidden" id="pcComplet4" value="<?php echo round(($nbComplet75100/$nbComplet)*100) ?>">

  <!-- Graphique score total -->
  <input type="hidden" id="pcTotal1" value="<?php echo round(($nbPartiel025+$nbComplet025)/($nbPartiel+$nbComplet)*100) ?>">
  <input type="hidden" id="pcTotal2" value="<?php echo round(($nbPartiel2550+$nbComplet2550)/($nbPartiel+$nbComplet)*100) ?>">
  <input type="hidden" id="pcTotal3" value="<?php echo round(($nbPartiel5075+$nbComplet5075)/($nbPartiel+$nbComplet)*100) ?>">
  <input type="hidden" id="pcTotal4" value="<?php echo round(($nbPartiel75100+$nbComplet75100)/($nbPartiel+$nbComplet)*100) ?>">
  
  <!-- Filtres -->
  <div class="filtres">
    <form method="post" action="index.php?page=gestionnaire&traitement=sexe" style="margin:auto;">
      <div style="display:flex;">
        <div style="float:left;margin-left:5px;margin-right:5px">
          <label for="sexe"></label>
          <select name="sexe" style="width:200px; height:30px; font-size: 15px;" id="sexe">
            <option value=""><?php echo _SELECTSEXE ?></option>
            <option value="Homme" <?php if (isset($_POST["sexe"]) && $_POST["sexe"] == "Homme") echo "selected"; ?>><?php echo _HOMME ?></option>
            <option value="Femme" <?php if (isset($_POST["sexe"]) && $_POST["sexe"] == "Femme") echo "selected"; ?>><?php echo _FEMME ?></option>
          </select>
        </div>
        <div style="float:right; margin:auto;margin-left:5px;margin-right:5px">
          <button type="submit" name="validerFiltre" id="validerFiltre"><?php echo _VALIDER ?></button>
        </div>
      </div>
    </form>
  </div>

  <div class="container">
    <div id="chart" data-pie="piedata1" data-pie-label="Sexe des pilotes" style="margin: 20px 50px 20px 50px"></div>
    <div id="chart-2" data-pie="piedata2" data-pie-label="Âge des pilotes" style="margin: 20px 50px 20px 50px"></div>
    <br/>
    <div id="chart-3" data-pie="piedata3" data-pie-label="Score total" style="margin: 20px 50px 20px 50px"></div>
    <div id="chart-4" data-pie="piedata4" data-pie-label="Score des tests partiels" style="margin: 20px 50px 20px 50px"></div>
    <div id="chart-5" data-pie="piedata5" data-pie-label="Score des tests complets" style="margin: 20px 50px 20px 50px"></div>
  </div>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
  <script  src="./js/script-diagramme.js"></script>


  <?php
}
if (isset($_POST["stattest"])){
  ?>
  <!-- Filtres -->
  <div class="filtres">
    <form method="post" action="index.php?page=gestionnaire&traitement=test" style="margin:auto">
      <div style="display:flex;">
        <div style="float:left;margin-left:5px;margin-right:5px">
          <label for="test"></label>
          <select name="test" style="width:200px; height:30px; font-size: 15px;" id="test">
            <option value="" selected><?php echo _MESURE ?></option>
            <option value="freq" <?php if (isset($_POST["test"]) && $_POST["test"] == "freq") echo "selected"; ?>><?php echo _RYTHMECARDIAQUE ?></option>
            <option value="audio" <?php if (isset($_POST["test"]) && $_POST["test"] == "audio") echo "selected"; ?>><?php echo _PERCEPTIONAUDITIVE ?></option>
            <option value="visio" <?php if (isset($_POST["test"]) && $_POST["test"] == "visio") echo "selected"; ?>><?php echo _STIMULUSVISUEL ?></option>
            <option value="peau" <?php if (isset($_POST["test"]) && $_POST["test"] == "peau") echo "selected"; ?>><?php echo _TEMPERATUREPEAU ?></option>
            <option value="ton" <?php if (isset($_POST["test"]) && $_POST["test"] == "ton") echo "selected"; ?>><?php echo _RECOTONALITE ?></option>
          </select>
        </div>
        <div style="float:right; margin:auto;margin-left:5px;margin-right:5px">
          <button type="submit" name="validerFiltre" id="validerFiltre"><?php echo _VALIDER ?></button>
        </div>
      </div>

      <?php
      $nbTest = $nbPartiel + $nbComplet;

      $pcFrequence1 = round(($nbFrequence1/$nbTest)*100);
      $pcFrequence2 = round(($nbFrequence2/$nbTest)*100);
      $pcFrequence3 = round(($nbFrequence3/$nbTest)*100);
      $pcFrequence4 = round(($nbFrequence4/$nbTest)*100);
      $pcFrequence5 = round(($nbFrequence5/$nbTest)*100);
      $pcFrequence6 = round(($nbFrequence6/$nbTest)*100);

      $pcPerceptionAuditive1 = round(($nbPerceptionAuditive1/$nbTest)*100);
      $pcPerceptionAuditive2 = round(($nbPerceptionAuditive2/$nbTest)*100);

      $pcStimulusVisuel1 = round(($nbStimulusVisuel1/$nbTest)*100);
      $pcStimulusVisuel2 = round(($nbStimulusVisuel2/$nbTest)*100);
      $pcStimulusVisuel3 = round(($nbStimulusVisuel3/$nbTest)*100);
      $pcStimulusVisuel4 = round(($nbStimulusVisuel4/$nbTest)*100);
      $pcStimulusVisuel5 = round(($nbStimulusVisuel5/$nbTest)*100);
      $pcStimulusVisuel6 = round(($nbStimulusVisuel6/$nbTest)*100);

      $pcTemperaturePeau1 = round(($nbTemperaturePeau1/$nbComplet)*100);
      $pcTemperaturePeau2 = round(($nbTemperaturePeau2/$nbComplet)*100);
      $pcTemperaturePeau3 = round(($nbTemperaturePeau3/$nbComplet)*100);
      $pcTemperaturePeau4 = round(($nbTemperaturePeau4/$nbComplet)*100);
      $pcTemperaturePeau5 = round(($nbTemperaturePeau5/$nbComplet)*100);
      $pcTemperaturePeau6 = round(($nbTemperaturePeau6/$nbComplet)*100);

      $pcReconnaissanceTonalite1 = round(($nbReconnaissanceTonalite1/$nbComplet)*100);
      $pcReconnaissanceTonalite2 = round(($nbReconnaissanceTonalite2/$nbComplet)*100);
      $pcReconnaissanceTonalite3 = round(($nbReconnaissanceTonalite3/$nbComplet)*100);
      $pcReconnaissanceTonalite4 = round(($nbReconnaissanceTonalite4/$nbComplet)*100);
      $pcReconnaissanceTonalite5 = round(($nbReconnaissanceTonalite5/$nbComplet)*100);
      $pcReconnaissanceTonalite6 = round(($nbReconnaissanceTonalite6/$nbComplet)*100);
      $pcReconnaissanceTonalite7 = round(($nbReconnaissanceTonalite7/$nbComplet)*100);
      $pcReconnaissanceTonalite8 = round(($nbReconnaissanceTonalite8/$nbComplet)*100);
      ?>
    </form>
  </div>


  <div id="chart"  style="margin-bottom: 100px">
    <ul id="numbers">
      <li><span>100%</span></li>
      <li><span>90%</span></li>
      <li><span>80%</span></li>
      <li><span>70%</span></li>
      <li><span>60%</span></li>
      <li><span>50%</span></li>
      <li><span>40%</span></li>
      <li><span>30%</span></li>
      <li><span>20%</span></li>
      <li><span>10%</span></li>
      <li><span>0%</span></li>
    </ul>

    <?php

    if (!isset($_POST["test"]) || $_POST["test"] == ""){
      ?>
      <ul id="bars"></ul>
      <div class="titre-histo">
        <div style="text-align:center;"><?php echo _CHOIXMESURE ?></div>
      </div>
      <?php
    }
    if (isset($_POST["test"])){
      if ($_POST["test"] == "freq"){
        ?>
        <ul id="bars">
          <li><div data-percentage="<?php echo $pcFrequence1 ?>" class="bar"></div><span>< 40 bpm</span></li>
          <li><div data-percentage="<?php echo $pcFrequence2 ?>" class="bar"></div><span>40 - 60 bpm</span></li>
          <li><div data-percentage="<?php echo $pcFrequence3 ?>" class="bar"></div><span>60 - 80 bpm</span></li>
          <li><div data-percentage="<?php echo $pcFrequence4 ?>" class="bar"></div><span>80 - 100 bpm</span></li>
          <li><div data-percentage="<?php echo $pcFrequence5 ?>" class="bar"></div><span>100 - 120 bpm</span></li>
          <li><div data-percentage="<?php echo $pcFrequence6 ?>" class="bar"></div><span>> 120 bpm</span></li>
        </ul>
        <div class="titre-histo">
          <div style="text-align:center;"><?php echo _REPARTITIONRYTHMECARDIAQUE ?></div>
        </div>
        <?php
      }

      if ($_POST["test"] == "audio"){
        ?>
        <ul id="bars">
          <li style="width:300px">
            <div style="width:90%" data-percentage="<?php echo $pcPerceptionAuditive1 ?>" class="bar"></div>
            <span>< 35 dBA</span>
          </li>
          <li style="width:300px">
            <div style="width:90%" data-percentage="<?php echo $pcPerceptionAuditive2 ?>" class="bar"></div>
            <span>> 35 dBA</span>
          </li>
        </ul>
        <div class="titre-histo">
          <div style="text-align:center;"><?php echo _REPARTITIONPERCEPTIONAUDITIVE ?></div>
        </div>
        <?php
      }
      if ($_POST["test"] == "visio"){
        ?>
        <ul id="bars">
          <li><div data-percentage="<?php echo $pcStimulusVisuel1 ?>" class="bar"></div><span>< 200 ms</span></li>
          <li><div data-percentage="<?php echo $pcStimulusVisuel2 ?>" class="bar"></div><span>200 - 400 ms</span></li>
          <li><div data-percentage="<?php echo $pcStimulusVisuel3 ?>" class="bar"></div><span>400 - 600 ms</span></li>
          <li><div data-percentage="<?php echo $pcStimulusVisuel4 ?>" class="bar"></div><span>600 - 800 ms</span></li>
          <li><div data-percentage="<?php echo $pcStimulusVisuel5 ?>" class="bar"></div><span>800 - 1000 ms</span></li>
          <li><div data-percentage="<?php echo $pcStimulusVisuel6 ?>" class="bar"></div><span>1000 - 1200 ms</span></li>
        </ul>
        <div class="titre-histo">
          <div style="text-align:center;"><?php echo _REPARTITIONSTIMULUSVISUEL ?></div>
        </div>
        <?php
      }
      if ($_POST["test"] == "peau"){
        ?>
        <ul id="bars">
          <li><div data-percentage="<?php echo $pcTemperaturePeau1 ?>" class="bar"></div><span>< 20°C</span></li>
          <li><div data-percentage="<?php echo $pcTemperaturePeau2 ?>" class="bar"></div><span>20 - 25°C</span></li>
          <li><div data-percentage="<?php echo $pcTemperaturePeau3 ?>" class="bar"></div><span>25 - 30°C</span></li>
          <li><div data-percentage="<?php echo $pcTemperaturePeau4 ?>" class="bar"></div><span>30 - 35°C</span></li>
          <li><div data-percentage="<?php echo $pcTemperaturePeau5 ?>" class="bar"></div><span>35 - 40°C</span></li>
          <li><div data-percentage="<?php echo $pcTemperaturePeau6 ?>" class="bar"></div><span>> 40°C</span></li>
        </ul>
        <div class="titre-histo">
          <div style="text-align:center;"><?php echo _REPARTITIONTEMPERATUREPEAU ?></div>
        </div>
        <?php
      }
      if ($_POST["test"] == "ton"){
        ?>
        <ul id="bars">
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite1 ?>" class="bar"></div><span>< 130 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite2 ?>" class="bar"></div><span>130 - 775 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite3 ?>" class="bar"></div><span>775 - 1420 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite4 ?>" class="bar"></div><span>1420 - 2065 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite5 ?>" class="bar"></div><span>2065 - 2710 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite6 ?>" class="bar"></div><span>2710 - 3355 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite7 ?>" class="bar"></div><span>3355 - 4000 Hz</span></li>
          <li><div data-percentage="<?php echo $pcReconnaissanceTonalite8 ?>" class="bar"></div><span>> 4000 Hz</span></li>
        </ul>
        <div class="titre-histo">
          <div style="text-align:center;"><?php echo _REPARTITIONRECOTONALITE ?></div>
        </div>
        <?php
      }
    }

    ?>

  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./js/script-histogramme.js"></script>

  <?php
}
?>

</body>
</html>

<?php
}
else {
header('Location: index.php');
}
?>
