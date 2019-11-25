<?php 

    include('include/connexion.php'); 
    
    // Selon qui est connecté : $id = ???
    $id = 1;

    // Liste des tests de l'utilisateur, triés par date
    $reqTest = $db -> query("SELECT date, score
                                    FROM testPartiel
                                    WHERE idUtilisateur = '".$id."'
                                    UNION
                                    SELECT date, score
                                    FROM testComplet
                                    WHERE idUtilisateur = '".$id."'
                                    ORDER BY date;");

    $reqTest -> setFetchMode(PDO::FETCH_ASSOC);
    
    $nbTest = $reqTest->rowCount();

    foreach ($reqTest as $test) 
	{
        $tabTestDate[] = $test['date'];
        $tabTestScore[] = $test['score'];
    }
    
?>  
    
    
    <!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Historique des résultats</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://cdn.oesmith.co.uk/morris-0.5.1.css'>
            <link rel="stylesheet" href="css/inscription.css">

    </head>

    <body>

        <header>
            Historique des résultats
        </header>


        <section style="text-align: center">
            <div>
                <h3>Evolution des scores</h3>
                <div id="area-chart"></div>
            </div>
        </section>

        <section>
            <h3>Historique </h3>
            <ol>
            <?php
            
                for($i= 1; $i <= $nbTest; $i++) {

                    $reqTestPartiel = $db -> query("SELECT date, score
                                            FROM testPartiel
                                            WHERE idUtilisateur = '".$id."'
                                            AND date = '".$tabTestDate[$i-1]."'
                                            AND score = '".$tabTestScore[$i-1]."'");

                    $nbTestPartiel = $reqTestPartiel->rowCount();

                    if($nbTestPartiel > 0){
                        echo "<li style='color:blue'>".$tabTestDate[$i-1]." : ".$tabTestScore[$i-1]." points (test partiel) <a href='#'>- Détails</a></li>";
                    } else {
                        echo "<li style='color:green'>".$tabTestDate[$i-1]." : ".$tabTestScore[$i-1]." points (test complet) <a href='#'>- Détails</a></li>";
                    }  
                }

            ?>
            </ol>

        </section>
    </body>
    


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>
    <!--script  src="js/historique.js"></script-->

    <script>
        var data = [

            <?php

            // Affichage dynamique des données pour le graphique
            for($i= 1; $i < $nbTest; $i++) { 

                // Affichage de la forme { y: '1', a: 85}, le test 1 a un score de 85
                echo "{ y: '".$tabTestDate[$i-1]."', a: ".$tabTestScore[$i-1]."},";
                
            }

            // Affichage du dernier test sans virgule à la fin
            echo "{ y: '".$tabTestDate[$nbTest-1]."', a: ".$tabTestScore[$nbTest-1]."}";

            ?>
            /*{ y: '2015', a: 65},
            { y: '2016', a: 50},
            { y: '2017', a: 75},
            { y: '2018', a: 80},
            { y: '2019', a: 90},
            { y: '2020', a: 85},
            { y: '2021', a: 82},
            { y: '2022', a: 52},
            { y: '2023', a: 86},
            { y: '2024', a: 62}*/
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
            lineColors:['red']
            };

            config.element = 'area-chart';
            Morris.Area(config);

    </script>

</html>