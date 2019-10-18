<?php
    $serveur = "localhost";
    $login = "root";
    $mdp = "";

    #connexion au serveur de la base de données
    $connexion = mysqli_connect($serveur,$login,$mdp)
    or die ("Connexion au serveur $serveur impossible pour $login");

    #nom de la base de données
    $bd = "test";

    #connexion à la base de données
    mysqli_select_db($connexion,$bd)
    or die ("Impossible d'accéder à la base de données");

    $requpdate = "UPDATE Utilisateur SET nom = ? WHERE idUtilisateur = 2";
    $reqprepare = mysqli_prepare($connexion,$requpdate);

    $nom = $_POST['name']; #on récupère le nom que l'utilisateur va écrire
    mysqli_stmt_bind_param($reqprepare,'s', $nom); #nb de S pour le nb de ?
    mysqli_stmt_execute($reqprepare); #le serveur execute la requête demandée

    mysqli_close($connexion);

    header('Location: Modification-profil.html'); #rediriger
?>