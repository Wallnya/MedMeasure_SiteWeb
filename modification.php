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

    if (isset($_POST['boutonEnregistrer'])){
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
}

$message = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    echo "test";
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path))
      {
        $message ='File is successfully uploaded.';
        //enregistrer dans la base MySQL
        $req = "INSERT INTO Images (" .
                                "img_nom, img_taille, img_type, img_blob " .
                                ") VALUES (" .
                                "'" . $fileName . "', " .
                                "'" . $fileSize . "', " .
                                "'" . $fileType . "', " .
                                "'" . addslashes ($fileTmpPath) . "') "; // N'oublions pas d'échapper le contenu binaire
        $ret = mysql_query ($req) or die (mysql_error ());
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
    mysqli_close($connexion);
    header ('Location: Modification-profil.php'); #redirection
?>
