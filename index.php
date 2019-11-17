<?php
require('controlleur/controlleur.php');
if (isset($_POST['modifier'])){
        if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
          if (isset($_POST["Type"])){
                modifyUser($_POST["Type"],$_POST['idUtilisateur']);
              }
              else{
                echo 'salut';
              }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
}
else if (isset($_POST['supprimer'])){
  if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
    deleteUser($_POST['idUtilisateur']);
  }
}
else {
  dataUser();
}
