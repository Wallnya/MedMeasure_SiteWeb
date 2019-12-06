<?php
function getCheckUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp){
  $db = dbConnect();
  // On regarde si l'email est déjà utilisée
  $reqVerif = $db -> query("SELECT * FROM connexion WHERE email = '".$email."';");
  $count = $reqVerif->rowCount(); // On compte le nombre de lignes réponse
  if ($count == 0){
    // Ajout à la table utilisateur
    $reqAjoutUtilisateur = $db -> prepare("
    INSERT INTO Utilisateur(Nom, Prenom, DN, Sexe, AdresseVoie, AdresseVille, AdresseCP, Tel)
    VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)
    ");
    $reqAjoutUtilisateur -> execute(array(
      "value1" => $nom,
      "value2" => $prenom,
      "value3" => $dn,
      "value4" => $sexe,
      "value5" => $adresse,
      "value6" => $ville,
      "value7" => $cp,
      "value8" => $tel
    ));
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
      INSERT INTO Connexion(email, mdp, type, idUtilisateur)
      VALUES (:value1, :value2, :value3, :value4)
      ");
      $reqAjoutConnexion -> execute(array(
        "value1" => $email,
        "value2" => md5($mdp),
        "value3" => "Pilote",
        "value4" => $id
      ));
      $reqAjoutConnexion -> closeCursor();
    }
    return $count;
  }
