<?php
echo "HELLO";

function transfert() {
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
        return true;
    }
}
?>