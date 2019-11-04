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

    $ret        = false;
    $img_blob   = '';
    $img_taille = 0;
    $img_type   = '';
    $img_nom    = '';
    $taille_max = 250000;
    $ret        = is_uploaded_file($_FILES['image']['tmp_name']);
    echo $_FILES['image'];

    if (!$ret) {
        echo "Problème de transfert";
        return false;
    } else {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['image']['size'];
        
        if ($img_taille > $taille_max) {
            echo "Trop gros !";
            return false;
        }

        $img_type = $_FILES['image']['type'];
        $img_nom  = $_FILES['image']['name'];
        //include("modification.php");

        //stocker le contenu binaire dans une variable
        $img_blob = file_get_contents ($_FILES['image']['tmp_name']);

        //enregistrer dans la base MySQL
        $req = "INSERT INTO Images (" . 
                                "img_nom, img_taille, img_type, img_blob " .
                                ") VALUES (" .
                                "'" . $img_nom . "', " .
                                "'" . $img_taille . "', " .
                                "'" . $img_type . "', " .
                                "'" . addslashes ($img_blob) . "') "; // N'oublions pas d'échapper le contenu binaire
        $ret = mysql_query ($req) or die (mysql_error ());
    }
    
    mysqli_close($connexion);
    //header ('Location: Modification-profil.php'); #redirection
?>