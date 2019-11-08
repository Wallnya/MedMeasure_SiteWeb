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
mysqli_select_db($connexion,*bd)
or die ("Impossible d'accéder à la base de données");

$Email = $_POST['mail'];
$MotDePasse = $_POST['mdp'];


$requete="Select from connexion where Email=? and Mdp=?";
$reqprepare = mysqli_prepare($connexion,$requete);

mysqli_stmt_bind_param($reqprepare,'ssssssss',$Email,$MotDePasse)

$resultat = mysqli_query($reqprepare);

if (count($resultat)==0){
    echo 'Erreur';
}
else{
    echo 'connecter';
}

mysql_close();
?>