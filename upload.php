<?php
if (isset($_POST['submit'])) {  #fi l'utilisateur appuie sur le bouton
    $file = $_FILES['file'];

    #informations du fichier chargé
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name']; #direction/localisation du fichier
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName); #extention, nom du fichier sans .jpeg par ex
    $fileActualExt = strtolower(end($fileExt)); #string to lower case

    $allowed = array('jpg', 'jpeg', 'pdf', 'png'); #quels fichiers sont autorisés
     if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) { #si il n'y a pas d'erreur lors du chargement du fichier
            if ($fileSize < 1000000) { #taille maximum du fichier 1million kB
                $fileNameNew = $uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: Modification-profil.php?uploadsuccess");
            }
            else {
                echo "Votre fichier est trop grand";
            }
        }
        else {
            echo "Erreur lors du chargement de votre fichier";
        }
     }
     else {
         echo "Vous ne pouvez pas charger des fichiers de ce type";
     }
}
?>