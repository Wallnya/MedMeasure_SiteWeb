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
          $type=htmlspecialchars($_POST['Type']);
          $id=htmlspecialchars($_POST['idUtilisateur']);
          modifyUser($type,$id);
        }
      }
    }
    else if (isset($_POST['supprimer'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        $id=htmlspecialchars($_POST['idUtilisateur']);
        deleteUser($id);
      }
    }
    else if (isset($_POST['bannir'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        $id=htmlspecialchars($_POST['idUtilisateur']);
        banUser($id);
      }
    }
    if (isset($_POST['modifierValide'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        if (isset($_POST["Valide"])){
          $id=htmlspecialchars($_POST['idUtilisateur']);
          $valide=htmlspecialchars($_POST['Valide']);
          modifyValide($valide,$id);
        }
      }
    }
    else if(isset($_POST['supprimerTestPartiel'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        $id=htmlspecialchars($_POST['idUtilisateur']);
        $idtest=htmlspecialchars($_POST['idtest']);
        deleteTestPartiel($id,$idtest);
      }
    }
    else if(isset($_POST['supprimerTestComplet'])){
      if (isset($_POST['idUtilisateur']) && $_POST['idUtilisateur'] > 0) {
        $id=htmlspecialchars($_POST['idUtilisateur']);
        $idtest=htmlspecialchars($_POST['idtest']);
        deleteTestComplet($id,$idtest);
      }
    }
    else {
      dataUser();
    }
  }
  else if ($_GET['page']=='admin_ticket'){
    if (isset($_POST['modifier'])){
      if (isset($_POST['idTicket']) && $_POST['idTicket'] > 0) {
        $statut=htmlspecialchars($_POST['idUtilisateur']);
        $idTicket=htmlspecialchars($_POST['idtest']);
        modifyTicket($statut,$idTicket);
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
          $message=htmlspecialchars($_POST['message']);
          $idFAQ=htmlspecialchars($_POST['idFAQ']);
          modifyFAQ($message,$idFAQ);
        }
      }
    }
    else if (isset($_POST['supprimer'])){
      if (isset($_POST['idFAQ']) && $_POST['idFAQ'] > 0) {
        $idFAQ=htmlspecialchars($_POST['idFAQ']);
        deleteFAQ($idFAQ);
      }
    }
    else if (isset($_POST['enregistrerFAQ'])){
      if (isset($_POST["question"]) && isset($_POST["reponse"])){
        $question=htmlspecialchars($_POST['question']);
        $reponse=htmlspecialchars($_POST['reponse']);
        addFAQ($question,$reponse);
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
        $id=htmlspecialchars($_SESSION['id']);
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $dn=htmlspecialchars($_POST['dn']);
        $sexe=htmlspecialchars($_POST['sexe']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $ville=htmlspecialchars($_POST['ville']);
        $cp=htmlspecialchars($_POST['cp']);
        $tel=htmlspecialchars($_POST['tel']);
        modif_profil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel);
      }
    }
    else if (isset($_GET['traitement'])){
      if ($_GET['traitement'] == "modifProfil"){
        if (isset($_POST["modifProfil"])){
        $id=htmlspecialchars($_SESSION['id']);
        page_modif_profil($id);
      }
    }
      else if ($_GET['traitement'] == "Dernierresultat"){
        // if(isset($_POST['Dernierresultat'])){
          $id=htmlspecialchars($_SESSION['id']);
          page_dernierresultat($id);
        //}
      }
      else if ($_GET['traitement'] == "histo"){
        if (isset($_GET['bouton']) && $_GET['bouton'] == "details"){
          if(isset($_POST['detail'])){
            if (isset($_POST['type']) && isset($_POST['idTest'])){
              $id=htmlspecialchars($_SESSION['id']);
              $type=htmlspecialchars($_POST['type']);
              $idTest=htmlspecialchars($_POST['idTest']);
              page_resultat($type,$idTest,$id);
            }
          }
        }
        else{
          $id=htmlspecialchars($_SESSION['id']);
          page_historique($id);
        }
      }
      else if ($_GET['traitement'] == "ticket"){
         //if(isset($_POST['ticket'])){
          page_ticket($_SESSION['id']);
        //}
      }
    }

    else if (isset($_POST['test'])){
      $id=htmlspecialchars($_SESSION['id']);
      page_test($id);
    }

    else{
      $id=htmlspecialchars($_SESSION['id']);
      page_user($id);
    }
  }
  /********************************/
  /*      GESTIONNAIRE            */
  /********************************/
  else if ($_GET['page'] == 'gestionnaire'){
    if (isset($_GET['traitement']) && ($_GET['traitement'] == 'sexe')){
      if (isset($_POST["sexe"]) && $_POST["sexe"] !== '')
          donnee_sexe_select_gestionnaire($_POST["sexe"]);
      else
        page_gestionnaire();
    }
    else if (isset($_GET['traitement']) && $_GET['traitement'] == 'test'){
          $_POST["stattest"] = true;
          page_gestionnaire();
    }
    else if (isset($_GET['traitement']) && $_GET['traitement'] == 'recherche'){
      $_POST['recherchenom'] = true;
          page_gestionnaire();
    }
    else{
      page_gestionnaire();
    }
  }

  /********************************/
/*            TICKET            */
/********************************/
else if ($_GET['page']=='ticket'){
   if (isset($_POST['EnvoyerTicket'])){
    if (isset($_POST["intitule"]) && isset($_POST["contenu"])){
      addTicket($_POST['intitule'],$_POST['contenu']);
    }
  }
  page_ticket();

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
        $id=htmlspecialchars($_SESSION['id']);
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $dn=htmlspecialchars($_POST['dn']);
        $sexe=htmlspecialchars($_POST['sexe']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $ville=htmlspecialchars($_POST['ville']);
        $cp=htmlspecialchars($_POST['cp']);
        $tel=htmlspecialchars($_POST['tel']);
        $email=htmlspecialchars($_POST['email']);
        $mdp=htmlspecialchars($_POST['mdp']);
        $case=htmlspecialchars($_POST['case']);
        checkUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp,$case);
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
    $email=htmlspecialchars($_POST['mail']);
    $mdp=htmlspecialchars($_POST['mdp']);
    connexion($email,$mdp);
  }
  accueil();
}
else{
  $_SESSION = Array();
  session_destroy();
  session_start();
  accueil();
}
