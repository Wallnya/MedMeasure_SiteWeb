<?php
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
if ($_SESSION["type"]=="Pilote"){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo _TITREHISTORIQUE?></title>
            <link rel="stylesheet" href="css/css_historique.css">
            <link rel="stylesheet" href="css/header2.css" />
    </head>
    <body>
        <header>
            <div class="barre_navigation">
                <img src="images/MedMeasure.png" alt="logo de MedMeasure">
                <a href="index.php?page=user"><?php echo _ACCUEIL?></a>
                <a href="index.php?page=faq"><?php echo _BOUTONSFAQ?></a>
                <a style="cursor:pointer" href="index.php?deco=deconnexion"><?php echo _DECONNEXION; ?></a>
                <form method="POST" action="index.php?page=user&traitement=histo">
                  <button type="submit" class="test" name="FR">FR</button>
                  <button type="submit" class="test" name="EN">EN</button>
                </form>
            </div>
        </header>
        <div id="titre"><?php echo _TITREHISTORIQUE?></div>
        <section id="graph">
            <div>
                <h3><?php echo _EVOLUTIONSCORE?></h3>
                <div id="area-chart"></div>
            </div>
        </section>
        <section id="histo">
            <h3><?php echo _HISTORIQUE?> </h3>
            <div id="listeHisto">
                <ol>
                <?php foreach($tabTest as list($valeur1,$valeur2,$valeur3,$valeur4)){  ?>
                    <li style='color:black'>
                    <?php echo $valeur1. " : ". $valeur2;?>
                    <?php echo _POINTS?> <form method="POST" action="index.php?page=user&traitement=histo&bouton=details">
                          <input type="hidden"  name="type" value="<?= $valeur3 ?>">
                          <input type="hidden"  name="idTest" value="<?= $valeur4 ?>">
                          <button class="button" name="detail">- <?php echo _DETAILS?></buttons>
                        </form>
                      </li>
                <?php  }?>
                </ol>
            </div>
        </section>
    </body>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>
    <script>
        var data = [
                   <?php foreach($tabTest as list($valeur1,$valeur2)){ ?>
                      { y: '<?= $valeur1 ?>', a: <?= $valeur2 ?>},
                      <?php } ?>
            ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Score total'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff',],
            pointStrokeColors: ['black'],
            lineColors:['#ff42d0']
            };
            config.element = 'area-chart';
            Morris.Area(config);

function Go()
{
document.monForm.submit();
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
    </script>
</html>
<?php
}
else {
header('Location: index.php');
}
?>
