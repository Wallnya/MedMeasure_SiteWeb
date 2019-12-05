<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Historique des résultats</title>
            <link rel="stylesheet" href="css/css_historique.css">
    </head>
    <body>
        <header>
            <div class="barre_navigation">
                <img src="images/MedMeasure.png" alt="logo de MedMeasure">
                <a href="index.php?page=user">Accueil</a>
                <a href="index.php?page=faq">FAQ</a>
                <a href="index.php?deco=deconnexion">Déconnexion</a>
                <button class="test">FR</button>
                <button class="test">EN</button
            </div>
        </header>
        <div id="titre">Historique des résultats</div>
        <section id="graph">
            <div>
                <h3>Evolution des scores</h3>
                <div id="area-chart"></div>
            </div>
        </section>
        <section id="histo">
            <h3>Historique </h3>
            <div id="listeHisto">
                <ol>
                <?php foreach($tabTest as list($valeur1,$valeur2)){  ?>
                    <li style='color:blue'>
                    <?php echo $valeur1. " : ". $valeur2;?>
                        points <a href='#'>- Détails</a>
                <?php  }?>
                </li>
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
    </script>
</html>
