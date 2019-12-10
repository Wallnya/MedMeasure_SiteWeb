<?php
require('controlleur/controlleur.php');
session_start();
if (isset($_GET['page'])) {
  /********************************/
  /*            ADMIN             */
  /********************************/
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
    else if (isset($_POST['bannir'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        banUser($_POST['idUtilisateur']);
      }
    }
    if (isset($_POST['modifierValide'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        if (isset($_POST["Valide"])){
          modifyValide($_POST["Valide"],$_POST['idUtilisateur']);
        }
      }
    }
    else if(isset($_POST['supprimerTestPartiel'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        deleteTestPartiel($_POST['idUtilisateur'],$_POST['idtest']);
      }
    }
    else if(isset($_POST['supprimerTestComplet'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        deleteTestComplet($_POST['idUtilisateur'],$_POST['idtest']);
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
  /********************************/
  /*            USER              */
  /********************************/
  else if ($_GET['page']== 'user'){
    if (isset($_POST["boutonEnregistrer"])){
      if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['sexe']) &&
      isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['tel'])){
        modif_profil($_SESSION['id'],$_POST['nom'],$_POST['prenom'],$_POST['dn'],$_POST['sexe'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['tel']);
      }
    }
    else if (isset($_POST["modifProfil"])){
      page_modif_profil($_SESSION['id']);
    }
    else if (isset($_POST['test'])){
      page_test($_SESSION['id']);
    }
    else if(isset($_POST['Dernierresultat'])){
      page_dernierresultat($_SESSION['id']);
    }
    else if(isset($_POST['histo'])){
      page_historique($_SESSION['id']);
    }
    else if(isset($_POST['detail'])){
      if (isset($_POST['type']) && isset($_POST['idTest'])){
        page_resultat($_POST['type'],$_POST['idTest'],$_SESSION['id']);
      }
    }
    else{
      page_user($_SESSION['id']);
    }
  }
  /********************************/
  /*      GESTIONNAIRE            */
  /********************************/
  else if ($_GET['page'] == 'gestionnaire'){
      page_gestionnaire();
  }
  /********************************/
  /*            FAQ               */
  /********************************/
  else if ($_GET['page']== 'faq'){
      page_faq();
  }
  /********************************/
  /*          INSCRIPTION         */
  /********************************/
  else   if ($_GET['page'] == 'inscription'){
    if (isset($_POST["boutonInscription"])){
      if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['sexe']) &&
      isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['tel']) && isset($_POST['mdp'])){
        checkUser($_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['dn'],$_POST['sexe'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['tel'],$_POST['mdp'],$_POST['case']);
      }
      deconnexion();
      accueil();
    }
    else{
      login();
    }
  }
  /********************************/
  /*          CGU                 */
  /********************************/
  else if ($_GET['page']== 'cgu'){
      cgu();
  }
}


/********************************/
/*          DECONNEXION         */
/********************************/
else if (isset($_GET['deco'])) {
  if ($_GET['deco']== 'deconnexion'){
    deconnexion();
  }
}
/********************************/
/*          CONNEXION           */
/********************************/
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
