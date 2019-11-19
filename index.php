<?php
require('controlleur/controlleur.php');
session_start();
if (isset($_GET['page'])) {
  if ($_GET['page']== 'admin_user'){
      if (isset($_POST['modifier'])){
              if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
                if (isset($_POST["Type"])){
                      modifyUser($_POST["Type"],$_POST['idUtilisateur']);
                    }
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
  }
  else if ($_GET['page']=='admin_ticket'){
    if (isset($_POST['modifier'])){
            if (isset($_POST['idTicket']) && $_POST['idTicket'] > 0) {
                modifyTicket($_POST["Statut"],$_POST['idTicket']);
            }
    }
    else{
      dataTicket();
    }
  }
  else if ($_GET['page']=='admin_faq'){
    if (isset($_POST['modifier'])){
            if (isset($_POST['idFAQ']) && $_POST['idFAQ'] > 0) {
              if (isset($_POST["message"])){
                    modifyFAQ($_POST["message"],$_POST['idFAQ']);
                  }
            }
    }
    else if (isset($_POST['supprimer'])){
      if (isset($_POST['idFAQ']) && $_POST['idFAQ'] > 0) {
        deleteFAQ($_POST['idFAQ']);
      }
    }
    else if (isset($_POST['enregistrerFAQ'])){
      if (isset($_POST["question"]) && isset($_POST["reponse"])){
        addFAQ($_POST['question'],$_POST['reponse']);
      }
    }
    else {
      dataFAQ();
    }
  }
  else if ($_GET['page']== 'user'){
    test();
  }
  if ($_GET['page'] == 'inscription'){
    if (isset($_POST["boutonInscription"])){
      if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['sexe']) &&
      isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['mdp'])){
        checkUser($_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['dn'],$_POST['sexe'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['tel'],$_POST['mdp']);
      }
      accueil();
    }
    else{
      login();
    }
  }
}

else if (isset($_GET['deco'])) {
  if ($_GET['deco']== 'deconnexion'){
    deconnexion();
  }
}
else if (isset($_POST['connexion'])){
  if (isset($_POST['mail']) && isset($_POST['mdp'])){
    connexion($_POST['mail'],$_POST['mdp']);
  }
  accueil();
}
else{
  $_SESSION = Array();
  session_destroy();
  session_start();
  accueil();
}