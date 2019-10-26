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

    $requpdate = "UPDATE Utilisateur SET Prenom = ?, Nom = ?, DN = ?, Sexe = ?, AdresseVoie = ?, AdresseVille = ?, AdresseCP = ?, Tel = ? WHERE idUtilisateur = 1";
    $reqprepare = mysqli_prepare($connexion,$requpdate);

    $prenom = $_POST['Prenom']; #on récupère le nom que l'utilisateur va écrire
    $nom = $_POST['Nom'];
    $dn = $_POST['DN'];
    $sexe = $_POST['Sexe'];
    $adresse_voie = $_POST['AdresseVoie'];
    $adresse_ville = $_POST['AdresseVille'];
    $adresse_cp = $_POST['AdresseCP'];
    $tel = $_POST['Tel'];
    mysqli_stmt_bind_param($reqprepare,'ssssssss', $prenom, $nom, $dn, $sexe, $adresse_voie, $adresse_ville, $adresse_cp, $tel);   #nb de S pour le nb de ?
    mysqli_stmt_execute($reqprepare); #le serveur execute la requête demandée

    $requete = "SELECT * FROM Utilisateur WHERE idUtilisateur = 1";
    $resultat = mysqli_query($connexion,$requete);

    while($ligne = mysqli_fetch_row($resultat)) {
        echo "<tr>";
        for ($i = 0;$i < 9; $i++) {
            echo "<td>".$ligne[$i]."</td>";
        }
        echo "</tr>";
    }
    
    mysqli_close($connexion);
    header ('Location: Modification-profil.php'); #redirection
?>