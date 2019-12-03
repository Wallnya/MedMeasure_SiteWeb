<!DOCTYPE html>
<html lang="en" >
  <meta charset="UTF-8">
  <title>Gestionnaire</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="./css/style2.css">
  <link rel="stylesheet" href="./css/diagramme.css">
  <link rel="stylesheet" href="./css/histogramme.css">

<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="accueil.php">Accueil</a>
    <a href="deconnexion.php">Déconnexion</a>
  </div>
  <div class="texte">
    <img src="images/gestion.png" alt="Image pour la page resultat">
  </div>
</header>


<?php
		$serveur = "localhost";
		$login = "root";
    $mdp = "";

		#connexion au serveur de la base de données
		$connexion = mysqli_connect($serveur,$login,$mdp)
    or die ("Connexion au serveur $serveur impossible pour $login");

		#nom de la base de données
    $bd = "medmeasure";

		#connexion à la base de données
		mysqli_select_db($connexion,$bd)
    or die ("Impossible d'accéder à la base de données");

    $requete = "SELECT count(*) FROM Utilisateur";
    $requete2 = "SELECT count(*) FROM Utilisateur WHERE Sexe = 'Femme'";
    $requete2_bis = "SELECT count(*) FROM Utilisateur WHERE Sexe = 'Homme'";
    $resultat = mysqli_query($connexion,$requete);
    $resultat2 = mysqli_query($connexion,$requete2);
    $resultat2_bis = mysqli_query($connexion,$requete2_bis);
    $nombre_utilisateurs = mysqli_fetch_row($resultat);
    $nombre_femmes = mysqli_fetch_row($resultat2);
    $nombre_hommes = mysqli_fetch_row($resultat2_bis);

    $pourcentage_femmes = round(($nombre_femmes[0]/$nombre_utilisateurs[0])*100);
    $pourcentage_hommes = round(($nombre_hommes[0]/$nombre_utilisateurs[0])*100);

    $requete3 = "SELECT count(*) FROM testpartiel";
    $requete4 = "SELECT count(*) FROM testpartiel WHERE score <= 30";
    $requete5 = "SELECT count(*) FROM testpartiel WHERE score BETWEEN 30 and 60";
    $resultat3 = mysqli_query($connexion,$requete3);
    $resultat4 = mysqli_query($connexion,$requete4);
    $resultat5 = mysqli_query($connexion,$requete5);
    $nombre_tests_partiels = mysqli_fetch_row($resultat3);
    $nb_tests_partiels_30 = mysqli_fetch_row($resultat4);
    $nb_tests_partiels_60 = mysqli_fetch_row($resultat5);

    $score_tests_partiels_30 = round(($nb_tests_partiels_30[0]/$nombre_tests_partiels[0])*100);
    $score_tests_partiels_60 = round(($nb_tests_partiels_60[0]/$nombre_tests_partiels[0])*100);

    $requete6 = "SELECT count(*) FROM testcomplet";
    $requete7 = "SELECT count(*) FROM testcomplet WHERE score <= 30";
    $requete8 = "SELECT count(*) FROM testcomplet WHERE score BETWEEN 30 and 60";
    $resultat6 = mysqli_query($connexion,$requete6);
    $resultat7 = mysqli_query($connexion,$requete7);
    $resultat8 = mysqli_query($connexion,$requete8);
    $nombre_tests_complets = mysqli_fetch_row($resultat6);
    $nb_tests_complets_30 = mysqli_fetch_row($resultat7);
    $nb_tests_complets_60 = mysqli_fetch_row($resultat8);

    $score_tests_complets_30 = round(($nb_tests_complets_30[0]/$nombre_tests_complets[0])*100);
    $score_tests_complets_60 = round(($nb_tests_complets_60[0]/$nombre_tests_complets[0])*100);

    $score_total_30 = round((($nb_tests_partiels_30[0]+$nb_tests_complets_30[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_total_60 = round((($nb_tests_partiels_60[0]+$nb_tests_complets_60[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);

    $requete9 = "SELECT count(*) FROM testpartiel WHERE frequence <= 39";
    $requete10 = "SELECT count(*) FROM testpartiel WHERE frequence BETWEEN 40 and 59";
    $requete11 = "SELECT count(*) FROM testpartiel WHERE frequence BETWEEN 60 and 79";
    $requete12 = "SELECT count(*) FROM testpartiel WHERE frequence BETWEEN 80 and 99";
    $requete13 = "SELECT count(*) FROM testpartiel WHERE frequence BETWEEN 100 and 119";

    $resultat9 = mysqli_query($connexion,$requete9);
    $resultat10 = mysqli_query($connexion,$requete10);
    $resultat11 = mysqli_query($connexion,$requete11);
    $resultat12 = mysqli_query($connexion,$requete12);
    $resultat13 = mysqli_query($connexion,$requete13);
    $tests_partiels_freq_40 = mysqli_fetch_row($resultat9);
    $tests_partiels_freq_60 = mysqli_fetch_row($resultat10);
    $tests_partiels_freq_80 = mysqli_fetch_row($resultat11);
    $tests_partiels_freq_100 = mysqli_fetch_row($resultat12);
    $tests_partiels_freq_120 = mysqli_fetch_row($resultat13);

    $requete14 = "SELECT count(*) FROM testcomplet WHERE frequence <= 39";
    $requete15 = "SELECT count(*) FROM testcomplet WHERE frequence BETWEEN 40 and 59";
    $requete16 = "SELECT count(*) FROM testcomplet WHERE frequence BETWEEN 60 and 79";
    $requete17 = "SELECT count(*) FROM testcomplet WHERE frequence BETWEEN 80 and 99";
    $requete18 = "SELECT count(*) FROM testcomplet WHERE frequence BETWEEN 100 and 119";
    $requete19 = "SELECT count(*) FROM testcomplet WHERE frequence BETWEEN 120 and 140";
    $requete20 = "SELECT count(*) FROM testpartiel WHERE frequence BETWEEN 120 and 140";

    $resultat14 = mysqli_query($connexion,$requete14);
    $resultat15 = mysqli_query($connexion,$requete15);
    $resultat16 = mysqli_query($connexion,$requete16);
    $resultat17 = mysqli_query($connexion,$requete17);
    $resultat18 = mysqli_query($connexion,$requete18);
    $resultat19 = mysqli_query($connexion,$requete19);
    $resultat20 = mysqli_query($connexion,$requete20);
    $tests_complets_freq_40 = mysqli_fetch_row($resultat14);
    $tests_complets_freq_60 = mysqli_fetch_row($resultat15);
    $tests_complets_freq_80 = mysqli_fetch_row($resultat16);
    $tests_complets_freq_100 = mysqli_fetch_row($resultat17);
    $tests_complets_freq_120 = mysqli_fetch_row($resultat18);
    $tests_complets_freq_140 = mysqli_fetch_row($resultat19);
    $tests_partiels_freq_140 = mysqli_fetch_row($resultat20);

    $score_freq_40 = round((($tests_partiels_freq_40[0]+$tests_complets_freq_40[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_freq_60 = round((($tests_partiels_freq_60[0]+$tests_complets_freq_60[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_freq_80 = round((($tests_partiels_freq_80[0]+$tests_complets_freq_80[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_freq_100 = round((($tests_partiels_freq_100[0]+$tests_complets_freq_100[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_freq_120 = round((($tests_partiels_freq_120[0]+$tests_complets_freq_120[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_freq_140 = round((($tests_partiels_freq_140[0]+$tests_complets_freq_140[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);

?>

<input type="hidden" id="pourcentage_femmes" value="<?php echo $pourcentage_femmes ?>">
<input type="hidden" id="pourcentage_hommes" value="<?php echo $pourcentage_hommes ?>">
<input type="hidden" id="score_tests_partiels_30" value="<?php echo $score_tests_partiels_30 ?>">
<input type="hidden" id="score_tests_partiels_60" value="<?php echo $score_tests_partiels_60 ?>">
<input type="hidden" id="score_tests_complets_30" value="<?php echo $score_tests_complets_30 ?>">
<input type="hidden" id="score_tests_complets_60" value="<?php echo $score_tests_complets_60 ?>">
<input type="hidden" id="score_total_30" value="<?php echo $score_total_30 ?>">
<input type="hidden" id="score_total_60" value="<?php echo $score_total_60 ?>">

<form method="get" action = "./search.php" class="topnav">
    <input type="text" name="search" placeholder="Recherche d'utilisateur">
    <button type="submit" class="Rechercher">Rechercher</button>
</form>
<div class="filtres">
    <form method="post" action="gestionnaire.php">

     <p>
         <label for="sexe"></label><br />
         <select name="sexe" style="width:200px; height:30px; font-size: 15px;" id="sexe">
                 <option value="Sexe" selected>Sexe</option>
              <option value="Femme">Femme</option>
              <option value="Homme">Homme</option>
         </select>
     </p>
  </form>

  <form method="post" action="traitement.php">
    <p>
        <label for="score"></label><br />
        <select name="score" style="width:200px; height:30px; font-size: 15px;" id="score">
                <option value="Score" selected>Score</option>
                <option value="50"> < 30 </option>
             <option value="100"> < 60</option>
             <option value="150"> > 75 </option>
        </select>
    </p>
 </form>
 <form method="post" action="traitement.php">
    <p>
        <label for="Test"></label><br />
        <select name="Test" style="width:200px; height:30px; font-size: 15px;" id="test">
            <option value="Test" selected>Test</option>
            <option value="Rythme cardiaque">Rythme cardiaque</option>
            <option value="perception auditive">Perception auditive</option>
            <option value="stimulus visuel">Réaction à un stimulus visuel</option>
            <option value="temperature peau">Température de la peau</option>
            <option value="reconnaissance tonalite">Reconnaissance de la tonalité</option>
        </select>
    </p>
 </form>
</div>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
    <div id="chart-2" data-pie="piedata2" data-pie-label="Sexe des pilotes"></div>
    <div id="chart" data-pie="piedata" data-pie-label="Score total"></div>
</br>
    <div id="chart-3" data-pie="piedata3" data-pie-label="Score des tests partiels"></div>
    <div id="chart-4" data-pie="piedata4" data-pie-label="Score des tests complets"></div>
    </div>
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
    <script  src="./js/script-diagramme.js"></script>



<!-- partial:index.partial.html -->
<div id="chart">
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

    <ul id="bars">
      <li><div data-percentage="<?php echo $score_freq_40 ?>" class="bar"></div><span> < 40 bpm</span></li>
      <li><div data-percentage="<?php echo $score_freq_60 ?>" class="bar"></div><span>40 - 60 bpm</span></li>
      <li><div data-percentage="<?php echo $score_freq_80 ?>" class="bar"></div><span>60 - 80 bpm</span></li>
      <li><div data-percentage="<?php echo $score_freq_100 ?>" class="bar"></div><span>80 - 100 bpm</span></li>
      <li><div data-percentage="<?php echo $score_freq_120 ?>" class="bar"></div><span>100 - 120 bpm</span></li>
      <li><div data-percentage="<?php echo $score_freq_140 ?>" class="bar"></div><span>120 - 140 bpm</span>
      </li>
    </ul>
  </div>

  <div class="titre-histo">
  <center>Répartition des fréquences cardiaques</center>
  </div>

  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./js/script-histogramme.js"></script>

</body>

</html>
