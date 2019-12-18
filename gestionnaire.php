<!DOCTYPE html>
<html lang="en" >
  <meta charset="UTF-8">
  <title>Gestionnaire</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="./css/style.css">
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

    $requete = "SELECT count(*) FROM utilisateur";
    $requete2 = "SELECT count(*) FROM utilisateur WHERE Sexe = 'Femme'";
    $requete2_bis = "SELECT count(*) FROM utilisateur WHERE Sexe = 'Homme'";
    $resultat = mysqli_query($connexion,$requete);
    $resultat2 = mysqli_query($connexion,$requete2);
    $resultat2_bis = mysqli_query($connexion,$requete2_bis);
    $nombre_utilisateurs = mysqli_fetch_row($resultat);
    $nombre_femmes = mysqli_fetch_row($resultat2);
    $nombre_hommes = mysqli_fetch_row($resultat2_bis);

    $pourcentage_femmes = round(($nombre_femmes[0]/$nombre_utilisateurs[0])*100);
    $pourcentage_hommes = round(($nombre_hommes[0]/$nombre_utilisateurs[0])*100);

    $requete3 = "SELECT count(*) FROM testpartiel";
    $requete4 = "SELECT count(*) FROM testpartiel WHERE score < 30";
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
    $requete7 = "SELECT count(*) FROM testcomplet WHERE score < 30";
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

    $requete9 = "SELECT count(*) FROM testpartiel WHERE Frequence <= 39";
    $requete10 = "SELECT count(*) FROM testpartiel WHERE Frequence BETWEEN 40 and 59";
    $requete11 = "SELECT count(*) FROM testpartiel WHERE Frequence BETWEEN 60 and 79";
    $requete12 = "SELECT count(*) FROM testpartiel WHERE Frequence BETWEEN 80 and 99";
    $requete13 = "SELECT count(*) FROM testpartiel WHERE Frequence BETWEEN 100 and 119";

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

    $requete14 = "SELECT count(*) FROM testcomplet WHERE Frequence <= 39";
    $requete15 = "SELECT count(*) FROM testcomplet WHERE Frequence BETWEEN 40 and 59";
    $requete16 = "SELECT count(*) FROM testcomplet WHERE Frequence BETWEEN 60 and 79";
    $requete17 = "SELECT count(*) FROM testcomplet WHERE Frequence BETWEEN 80 and 99";
    $requete18 = "SELECT count(*) FROM testcomplet WHERE Frequence BETWEEN 100 and 119";
    $requete19 = "SELECT count(*) FROM testcomplet WHERE Frequence BETWEEN 120 and 140";
    $requete20 = "SELECT count(*) FROM testpartiel WHERE Frequence BETWEEN 120 and 140";

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


    $requete21 = "SELECT count(*) FROM testpartiel WHERE PerceptionAuditive <= 35";
    $requete22 = "SELECT count(*) FROM testpartiel WHERE PerceptionAuditive >= 36";

    $resultat21 = mysqli_query($connexion,$requete21);
    $resultat22 = mysqli_query($connexion,$requete22);

    $tests_partiels_perception_auditive_35 = mysqli_fetch_row($resultat21);
    $tests_partiels_perception_auditive_36 = mysqli_fetch_row($resultat22);

    $requete23 = "SELECT count(*) FROM testcomplet WHERE PerceptionAuditive <= 35";
    $requete24= "SELECT count(*) FROM testcomplet WHERE PerceptionAuditive >= 36";

    $resultat23 = mysqli_query($connexion,$requete23);
    $resultat24 = mysqli_query($connexion,$requete24);
    
    $tests_complets_perception_auditive_35 = mysqli_fetch_row($resultat23);
    $tests_complets_perception_auditive_36 = mysqli_fetch_row($resultat24);

    $score_perception_auditive_35 = round((($tests_partiels_perception_auditive_35[0]+$tests_complets_perception_auditive_35[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_perception_auditive_36 = round((($tests_partiels_perception_auditive_36[0]+$tests_complets_perception_auditive_36[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    

    $requete25 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel <= 200";
    $requete26 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel BETWEEN 201 and 400";
    $requete27 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel BETWEEN 401 and 600";
    $requete28 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel BETWEEN 601 and 800";
    $requete29 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel BETWEEN 801 and 1000";

    $resultat25 = mysqli_query($connexion,$requete25);
    $resultat26 = mysqli_query($connexion,$requete26);
    $resultat27 = mysqli_query($connexion,$requete27);
    $resultat28 = mysqli_query($connexion,$requete28);
    $resultat29 = mysqli_query($connexion,$requete29);
    $tests_partiels_stimulus_200 = mysqli_fetch_row($resultat25);
    $tests_partiels_stimulus_400 = mysqli_fetch_row($resultat26);
    $tests_partiels_stimulus_600 = mysqli_fetch_row($resultat27);
    $tests_partiels_stimulus_800 = mysqli_fetch_row($resultat28);
    $tests_partiels_stimulus_1000 = mysqli_fetch_row($resultat29);

    $requete30 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel <= 200";
    $requete31 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel BETWEEN 201 and 400";
    $requete32 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel BETWEEN 401 and 600";
    $requete33 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel BETWEEN 601 and 800";
    $requete34 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel BETWEEN 801 and 1000";
    $requete35 = "SELECT count(*) FROM testcomplet WHERE StimulusVisuel BETWEEN 1001 and 1200";
    $requete36 = "SELECT count(*) FROM testpartiel WHERE StimulusVisuel BETWEEN 1001 and 1200";

    $resultat30 = mysqli_query($connexion,$requete30);
    $resultat31 = mysqli_query($connexion,$requete31);
    $resultat32 = mysqli_query($connexion,$requete32);
    $resultat33 = mysqli_query($connexion,$requete33);
    $resultat34 = mysqli_query($connexion,$requete34);
    $resultat35 = mysqli_query($connexion,$requete35);
    $resultat36 = mysqli_query($connexion,$requete36);
    $tests_complets_stimulus_200 = mysqli_fetch_row($resultat30);
    $tests_complets_stimulus_400 = mysqli_fetch_row($resultat31);
    $tests_complets_stimulus_600 = mysqli_fetch_row($resultat32);
    $tests_complets_stimulus_800 = mysqli_fetch_row($resultat33);
    $tests_complets_stimulus_1000 = mysqli_fetch_row($resultat34);
    $tests_complets_stimulus_1200 = mysqli_fetch_row($resultat35);
    $tests_partiels_stimulus_1200 = mysqli_fetch_row($resultat36);

    $score_stimulus_200 = round((($tests_partiels_stimulus_200[0]+$tests_complets_stimulus_200[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_stimulus_400 = round((($tests_partiels_stimulus_400[0]+$tests_complets_stimulus_400[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_stimulus_600 = round((($tests_partiels_stimulus_600[0]+$tests_complets_stimulus_600[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_stimulus_800 = round((($tests_partiels_stimulus_800[0]+$tests_complets_stimulus_800[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_stimulus_1000 = round((($tests_partiels_stimulus_1000[0]+$tests_complets_stimulus_1000[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);
    $score_stimulus_1200 = round((($tests_partiels_stimulus_1200[0]+$tests_complets_stimulus_1200[0])/($nombre_tests_partiels[0]+$nombre_tests_complets[0]))*100);

    $requete37 = "SELECT count(*) FROM testcomplet WHERE TemperaturePeau BETWEEN 20 and 24";
    $requete38 = "SELECT count(*) FROM testcomplet WHERE TemperaturePeau BETWEEN 25 and 29";
    $requete39 = "SELECT count(*) FROM testcomplet WHERE TemperaturePeau BETWEEN 30 and 34";
    $requete40 = "SELECT count(*) FROM testcomplet WHERE TemperaturePeau BETWEEN 35 and 40";

    $resultat37 = mysqli_query($connexion,$requete37);
    $resultat38 = mysqli_query($connexion,$requete38);
    $resultat39 = mysqli_query($connexion,$requete39);
    $resultat40 = mysqli_query($connexion,$requete40);

    $tests_complets_temp_25 = mysqli_fetch_row($resultat37);
    $tests_complets_temp_30 = mysqli_fetch_row($resultat38);
    $tests_complets_temp_35 = mysqli_fetch_row($resultat39);
    $tests_complets_temp_40 = mysqli_fetch_row($resultat40);

    $score_temp_25 = round(($tests_complets_temp_25[0]/$nombre_tests_complets[0])*100);
    $score_temp_30 = round(($tests_complets_temp_30[0]/$nombre_tests_complets[0])*100);
    $score_temp_35 = round(($tests_complets_temp_35[0]/$nombre_tests_complets[0])*100);
    $score_temp_40 = round(($tests_complets_temp_40[0]/$nombre_tests_complets[0])*100);
    
    $requete41 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 130 and 775";
    $requete42 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 776 and 1420";
    $requete43 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 1421 and 2065";
    $requete44 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 2066 and 2710";
    $requete45 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 2711 and 3355";
    $requete46 = "SELECT count(*) FROM testcomplet WHERE RecoTonalite BETWEEN 3356 and 4000";


    $resultat41 = mysqli_query($connexion,$requete41);
    $resultat42 = mysqli_query($connexion,$requete42);
    $resultat43 = mysqli_query($connexion,$requete43);
    $resultat44 = mysqli_query($connexion,$requete44);
    $resultat45 = mysqli_query($connexion,$requete45);
    $resultat46 = mysqli_query($connexion,$requete46);
    $tests_complets_tonalite_775 = mysqli_fetch_row($resultat41);
    $tests_complets_tonalite_1420 = mysqli_fetch_row($resultat42);
    $tests_complets_tonalite_2065 = mysqli_fetch_row($resultat43);
    $tests_complets_tonalite_2710 = mysqli_fetch_row($resultat44);
    $tests_complets_tonalite_3355 = mysqli_fetch_row($resultat45);
    $tests_complets_tonalite_4000 = mysqli_fetch_row($resultat46);

    $score_tonalite_775 = round(($tests_complets_tonalite_775[0]/$nombre_tests_complets[0])*100);
    $score_tonalite_1420 = round(($tests_complets_tonalite_1420[0]/$nombre_tests_complets[0])*100);
    $score_tonalite_2065 = round(($tests_complets_tonalite_2065[0]/$nombre_tests_complets[0])*100);
    $score_tonalite_2710 = round(($tests_complets_tonalite_2710[0]/$nombre_tests_complets[0])*100);
    $score_tonalite_3355 = round(($tests_complets_tonalite_3355[0]/$nombre_tests_complets[0])*100);
    $score_tonalite_4000 = round(($tests_complets_tonalite_4000[0]/$nombre_tests_complets[0])*100);


    if (isset($_POST["sexe"]) == 'Femmes') {
      $query2 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score < 30");
      $nb_tests_partiels_30_femmes = mysqli_fetch_row($query2);
      $query3 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score < 30");
      $nb_tests_complets_30_femmes = mysqli_fetch_row($query3);
      $query4 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score BETWEEN 30 AND 60");
      $nb_tests_partiels_60_femmes = mysqli_fetch_row($query4);
      $query5 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score BETWEEN 30 AND 60");
      $nb_tests_complets_60_femmes = mysqli_fetch_row($query5);
      $query6 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score >= 75");
      $nb_tests_partiels_75_femmes = mysqli_fetch_row($query6);
      $query7 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score >= 75");
      $nb_tests_complets_75_femmes = mysqli_fetch_row($query7);

      $query8 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score < 30
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score < 30");
      $nb_30_femmes = mysqli_num_rows($query8);
      $query9 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score BETWEEN 30 AND 60
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score BETWEEN 30 AND 60");
      $nb_60_femmes = mysqli_num_rows($query9);
      $query10 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score <= 75
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme') AND score <=75");
      $nb_75_femmes = mysqli_num_rows($query10);

      $query11 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme')");
      $nb_femmes_tests_partiels = mysqli_fetch_row($query11);
      $query12 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme')");
      $nb_femmes_tests_complets = mysqli_fetch_row($query12);
      $query13 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme')
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Femme')");
      $nb_femmes_tests = mysqli_num_rows($query13);

      $pourcentage_femmes_tests_partiels_30 = round(($nb_tests_partiels_30_femmes[0]/$nb_femmes_tests_partiels[0])*100);
      $pourcentage_femmes_tests_partiels_60 = round(($nb_tests_partiels_60_femmes[0]/$nb_femmes_tests_partiels[0])*100);
      $pourcentage_femmes_tests_partiels_75 = round(($nb_tests_partiels_75_femmes[0]/$nb_femmes_tests_partiels[0])*100);

      $pourcentage_femmes_tests_complets_30 = round(($nb_tests_complets_30_femmes[0]/$nb_femmes_tests_complets[0])*100);
      $pourcentage_femmes_tests_complets_60 = round(($nb_tests_complets_60_femmes[0]/$nb_femmes_tests_complets[0])*100);
      $pourcentage_femmes_tests_complets_75 = round(($nb_tests_complets_75_femmes[0]/$nb_femmes_tests_complets[0])*100);

      $pourcentage_femmes_30 = round(($nb_30_femmes[0]/$nb_femmes_tests)*100);
      $pourcentage_femmes_60 = round(($nb_60_femmes[0]/$nb_femmes_tests)*100);
      $pourcentage_femmes_75 = round(($nb_75_femmes[0]/$nb_femmes_tests)*100);
    }

    if (isset($_POST["sexe"]) == 'Hommes') {
      $query2 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score < 30");
      $nb_tests_partiels_30_hommes = mysqli_fetch_row($query2);
      $query3 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score < 30");
      $nb_tests_complets_30_hommes = mysqli_fetch_row($query3);
      $query4 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score BETWEEN 30 AND 60");
      $nb_tests_partiels_60_hommes = mysqli_fetch_row($query4);
      $query5 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score BETWEEN 30 AND 60");
      $nb_tests_complets_60_hommes = mysqli_fetch_row($query5);
      $query6 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score >= 75");
      $nb_tests_partiels_75_hommes = mysqli_fetch_row($query6);
      $query7 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score >= 75");
      $nb_tests_complets_75_hommes = mysqli_fetch_row($query7);

      $query8 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score < 30
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score < 30");
      $nb_30_hommes = mysqli_num_rows($query8);
      $query9 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score BETWEEN 30 AND 60
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score BETWEEN 30 AND 60");
      $nb_60_hommes = mysqli_num_rows($query9);
      $query10 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score <= 75
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme') AND score <=75");
      $nb_75_hommes = mysqli_num_rows($query10);

      $query11 = mysqli_query($connexion, "SELECT count(*) FROM testpartiel WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme')");
      $nb_hommes_tests_partiels = mysqli_fetch_row($query11);
      $query12 = mysqli_query($connexion, "SELECT count(*) FROM testcomplet WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme')");
      $nb_hommes_tests_complets = mysqli_fetch_row($query12);
      $query13 = mysqli_query($connexion, "SELECT idUtilisateur FROM testpartiel
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme')
      UNION 
      SELECT idUtilisateur
      FROM testcomplet
      WHERE idUtilisateur IN (SELECT idUtilisateur FROM utilisateur WHERE Sexe='Homme')");
      $nb_hommes_tests = mysqli_num_rows($query13);

      $pourcentage_hommes_tests_partiels_30 = round(($nb_tests_partiels_30_hommes[0]/$nb_hommes_tests_partiels[0])*100);
      $pourcentage_hommes_tests_partiels_60 = round(($nb_tests_partiels_60_hommes[0]/$nb_hommes_tests_partiels[0])*100);
      $pourcentage_hommes_tests_partiels_75 = round(($nb_tests_partiels_75_hommes[0]/$nb_hommes_tests_partiels[0])*100);

      $pourcentage_hommes_tests_complets_30 = round(($nb_tests_complets_30_hommes[0]/$nb_hommes_tests_complets[0])*100);
      $pourcentage_hommes_tests_complets_60 = round(($nb_tests_complets_60_hommes[0]/$nb_hommes_tests_complets[0])*100);
      $pourcentage_hommes_tests_complets_75 = round(($nb_tests_complets_75_hommes[0]/$nb_hommes_tests_complets[0])*100);

      $pourcentage_hommes_30 = (($nb_30_hommes[0]/$nb_hommes_tests)*100);
      $pourcentage_hommes_60 = (($nb_60_hommes[0]/$nb_hommes_tests)*100);
      $pourcentage_hommes_75 = (($nb_75_hommes[0]/$nb_hommes_tests)*100);
    }

?>

<input type="hidden" id="pourcentage_femmes" value="<?php echo $pourcentage_femmes ?>">
<input type="hidden" id="pourcentage_hommes" value="<?php echo $pourcentage_hommes ?>">
<input type="hidden" id="score_tests_partiels_30" value="<?php echo $score_tests_partiels_30 ?>">
<input type="hidden" id="score_tests_partiels_60" value="<?php echo $score_tests_partiels_60 ?>">
<input type="hidden" id="score_tests_complets_30" value="<?php echo $score_tests_complets_30 ?>">
<input type="hidden" id="score_tests_complets_60" value="<?php echo $score_tests_complets_60 ?>">
<input type="hidden" id="score_total_30" value="<?php echo $score_total_30 ?>">
<input type="hidden" id="score_total_60" value="<?php echo $score_total_60 ?>">

<input type="hidden" id="pourcentage_femmes_tests_partiels_30" value="<?php echo $pourcentage_femmes_tests_partiels_30 ?>">
<input type="hidden" id="pourcentage_femmes_tests_partiels_60" value="<?php echo $pourcentage_femmes_tests_partiels_60 ?>">
<input type="hidden" id="pourcentage_femmes_tests_partiels_75" value="<?php echo $pourcentage_femmes_tests_partiels_75 ?>">
<input type="hidden" id="pourcentage_femmes_tests_complets_30" value="<?php echo $pourcentage_femmes_tests_complets_30 ?>">
<input type="hidden" id="pourcentage_femmes_tests_complets_60" value="<?php echo $pourcentage_femmes_tests_complets_60 ?>">
<input type="hidden" id="pourcentage_femmes_tests_complets_75" value="<?php echo $pourcentage_femmes_tests_complets_75 ?>">
<input type="hidden" id="pourcentage_femmes_30" value="<?php echo $pourcentage_femmes_30 ?>">
<input type="hidden" id="pourcentage_femmes_60" value="<?php echo $pourcentage_femmes_60 ?>">
<input type="hidden" id="pourcentage_femmes_75" value="<?php echo $pourcentage_femmes_75 ?>">

<input type="hidden" id="pourcentage_hommes_tests_partiels_30" value="<?php echo $pourcentage_hommes_tests_partiels_30 ?>">
<input type="hidden" id="pourcentage_hommes_tests_partiels_60" value="<?php echo $pourcentage_hommes_tests_partiels_60 ?>">
<input type="hidden" id="pourcentage_hommes_tests_partiels_75" value="<?php echo $pourcentage_hommes_tests_partiels_75 ?>">
<input type="hidden" id="pourcentage_hommes_tests_complets_30" value="<?php echo $pourcentage_hommes_tests_complets_30 ?>">
<input type="hidden" id="pourcentage_hommes_tests_complets_60" value="<?php echo $pourcentage_hommes_tests_complets_60 ?>">
<input type="hidden" id="pourcentage_hommes_tests_complets_75" value="<?php echo $pourcentage_hommes_tests_complets_75 ?>">
<input type="hidden" id="pourcentage_hommes_30" value="<?php echo $pourcentage_hommes_30 ?>">
<input type="hidden" id="pourcentage_hommes_60" value="<?php echo $pourcentage_hommes_60 ?>">
<input type="hidden" id="pourcentage_hommes_75" value="<?php echo $pourcentage_hommes_75 ?>">


<form method="get" action = "gestionnaire.php" class="topnav">
    <div class="search-dropdown">
    <input type="text" name="search" placeholder="Recherche d'utilisateur">
    <button type="submit" class="Rechercher">Rechercher</button>
    <?php
      if (isset($_GET['search']) && !empty($_GET['search']) && $_GET['search'] !== '  ') {
        $search = $_GET['search'];
        $query = mysqli_query($connexion, "SELECT * FROM utilisateur WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%'") or die(mysqli_error());
        $result = mysqli_num_rows($query);
        if ($result == 0) {
          $output = 'Pas de résultat pour <b>"'.$search.'"</b>';
        }
        else {
          echo "<select onchange=\"change(this.value)\">";
          while ($row = mysqli_fetch_array($query)) {
            ?>
             <option id=<?=$row['nom']?> value=<?=$row['nom']?>><?=$row['nom']?><?=$row['prenom']?></option>;
  <?php    }
          echo "</select>";
        }
      }
  ?>
  <script>

function change(element)
{
  alert(element);
}
 </script>
 
  </div>
</form> 
<div class="filtres">
    <form method="post" action="gestionnaire.php">
  
     <p>
         <label for="sexe"></label><br />
         <select onchange="change2(this.value)" style="width:200px; height:30px; font-size: 15px;" id="sexe">
                 <option value="Sexe">Sexe</option>
              <option value="Femmes">Femmes</option>
              <option value="Hommes">Hommes</option>
         </select>
     </p> 
  </form>

 </form>
 <form method="post" action="traitement.php">
    <p>
        <label for="Test"></label><br />
        <select name="Test" style="width:200px; height:30px; font-size: 15px;" id="test">
            <option value="Test" selected>Test</option>
            <option value="rythme cardiaque">Rythme cardiaque</option>
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

    <!--<ul id="bars">
      <li><div data-percentage="<?php echo $score_perception_auditive_35 ?>" class="bar"></div><span> < 35 dBA</span></li>
      <li><div data-percentage="<?php echo $score_perception_auditive_36 ?>" class="bar"></div><span> > 35 dBA</span></li>
      </li>
    </ul> -->

    <!-- <ul id="bars">
      <li><div data-percentage="<?php echo $score_stimulus_200 ?>" class="bar"></div><span> < 200 ms</span></li>
      <li><div data-percentage="<?php echo $score_stimulus_400 ?>" class="bar"></div><span> 200 - 400 ms</span></li>
      <li><div data-percentage="<?php echo $score_stimulus_600 ?>" class="bar"></div><span> 400 - 600 ms</span></li>
      <li><div data-percentage="<?php echo $score_stimulus_800 ?>" class="bar"></div><span> 600 - 800 ms</span></li>
      <li><div data-percentage="<?php echo $score_stimulus_1000 ?>" class="bar"></div><span> 800 - 1000 ms</span></li>
      <li><div data-percentage="<?php echo $score_stimulus_1200 ?>" class="bar"></div><span> 1000 - 1200 ms</span>
      </li>
    </ul> -->

    <!-- <ul id="bars">
      <li><div data-percentage="<?php echo $score_temp_25 ?>" class="bar"></div><span> 20 - 25°C</span></li>
      <li><div data-percentage="<?php echo $score_temp_30 ?>" class="bar"></div><span> 25 - 30°C</span></li>
      <li><div data-percentage="<?php echo $score_temp_35 ?>" class="bar"></div><span> 30 - 35°C</span></li>
      <li><div data-percentage="<?php echo $score_temp_40 ?>" class="bar"></div><span> 35 - 40°C</span></li>
      </li>
    </ul> -->

    <!-- <ul id="bars">
      <li><div data-percentage="<?php echo $score_tonalite_775 ?>" class="bar"></div><span> 130 - 775 Hz</span></li>
      <li><div data-percentage="<?php echo $score_tonalite_1420 ?>" class="bar"></div><span> 775 - 1420 Hz</span></li>
      <li><div data-percentage="<?php echo $score_tonalite_2065 ?>" class="bar"></div><span> 1420 - 2065 Hz</span></li>
      <li><div data-percentage="<?php echo $score_tonalite_2710 ?>" class="bar"></div><span> 2065 - 2710 Hz</span></li>
      <li><div data-percentage="<?php echo $score_tonalite_3355 ?>" class="bar"></div><span> 2710 - 3355 Hz</span></li>
      <li><div data-percentage="<?php echo $score_tonalite_4000 ?>" class="bar"></div><span> 3355 - 4000 Hz</span>
      </li>
    </ul> -->
  </div>

  <div class="titre-histo">
  <center>Répartition des fréquences cardiaques</center>
  <!-- <center>Répartition des perceptions auditives</center>
  <center>Répartition des réactions à un stimulus visuel</center>
  <center>Répartition des températures de la peau</center>
  <center>Répartition des reconnaissances de tonalité</center> -->
  </div>

  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./js/script-histogramme.js"></script>

</body>

</html>