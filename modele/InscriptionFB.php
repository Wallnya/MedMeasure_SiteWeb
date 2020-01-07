<?php
session_start();

    $errormanagement = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $db = new PDO('mysql:host=localhost;dbname=medmeasure', 'root', '', $errormanagement);
    $idFB = $_POST['id'];
    $emailFB = $_POST['email'];
    $prenomFB = $_POST['prenom'];
    $nomFB = $_POST['nom'];

    /*$idFB = "628521815";
    $emailFB = "adresse2@mail.fr";
    $prenomFB = "sarah";
    $nomFB = "heo";*/

    $errormanagement = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  	$db = new PDO('mysql:host=localhost;dbname=medmeasure', 'root', '', $errormanagement);
        print_r($_POST);


    // On regarde si le compte Facebook est déjà dans la base
    $reqVerif = $db -> prepare("SELECT * FROM connexion WHERE idReseau = ?;");
    $reqVerif -> execute(array($idFB));
    $count = $reqVerif->rowCount(); // On compte le nombre de lignes réponse

    if ($count == 0){

        /***********************************************************************************************************
         * DANS LA BDD : METTRE NULL COMME VALEUR PAR DEFAUT POUR TOUS LES CHAMPS (table Utilisateur et Connexion) *
         ***********************************************************************************************************/

        // Ajout à la table utilisateur
        $reqAjoutUtilisateur = $db -> prepare("
        INSERT INTO Utilisateur(Nom, Prenom, DN, Sexe, AdresseVoie, AdresseVille, AdresseCP, Tel)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $reqAjoutUtilisateur -> execute(array($nomFB, $prenomFB, null, null, null, null, null, null));
        $reqAjoutUtilisateur -> closeCursor();

        // On récupère l'id qui vient d'être créé
        $reqid = $db -> query("SELECT idUtilisateur
                            FROM utilisateur
                            ORDER BY idUtilisateur DESC LIMIT 1");
        $reqid -> setFetchMode(PDO::FETCH_ASSOC);

        foreach ($reqid as $ligne){
            $id = $ligne['idUtilisateur'];
        }

        // Ajout à la table connexion
        $reqAjoutConnexion = $db -> prepare("
        INSERT INTO Connexion(email, mdp, type, idUtilisateur, TypeConnexion, idReseau)
        VALUES (?, ?, ?, ?, ?, ?)
        ");

        $reqAjoutConnexion -> execute(array($emailFB, null, "Pilote", $id, "Facebook", $idFB));
        $reqAjoutConnexion -> closeCursor();
    }


    $reqAjoutUtilisateur2 = $db -> prepare("SELECT idUtilisateur, type from connexion where idReseau = ?");
    $nbReconnaissanceTonalite6 = $reqAjoutUtilisateur2 -> execute(array($idFB));
    $invNum = $reqAjoutUtilisateur2 -> fetch(PDO::FETCH_ASSOC);
    $_SESSION["id"] = $invNum['idUtilisateur'];
    $_SESSION["type"] = $invNum['type'];
    $reqAjoutUtilisateur2 -> closeCursor();
    $reponse = array('id' => $_SESSION["id"], 'type' => $_SESSION["type"]);
    header('Content-Type; application/json');
    echo json_encode($reponse);
?>
