<?php
$serveur = "localhost";
$login ="root";
$MDP = "";

#connexion au serveur de la base données
$connexion = mysqli_connect($serveur,$login,$MDP)
or die ("Connexion au serveur $serveur impossible pour $login");

#nom de la base de données
$bd = "medmeasure";

#connexion à la base de données
mysqli_select_db($connexion,$bd)
or die ("Impossible d'accéder à la base de données");

$requete="SELECT nom, prenom FROM utilisateur WHERE idUtilisateur=1";

$NomPrenom = mysqli_query($connexion,$requete);
$ligne = mysqli_fetch_row($resultat);


mysqli_close($connexion);
?>