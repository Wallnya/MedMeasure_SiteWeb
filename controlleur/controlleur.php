<?php
require('modele/model_AdminUser.php');
require('modele/model_AdminEtFAQ.php');
require('modele/model_AdminTicket.php');
require('modele/model_User.php');
require('modele/model_UserHistorique.php');
require('modele/model_Connexion.php');
require('modele/model_Inscription.php');

function page_gestionnaire(){
  require('vue/gestionnaire.php');
}
function modifyUser($type,$id){
  $modify = getModifyUser($type,$id);
  header('Location: index.php?page=admin_user');
}

function cgu(){
  require('vue/cgu.php');
}

function login(){
  require('vue/inscription.php');
}

function checkUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp){
  $check = getCheckUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp);
  if ($check == 0){
    header('Location: index.php');
  }
  else{
    header('Location: index.php?page=inscription');
  }
}

function deleteUser($id){
  $delete = getDeleteUser($id);
  header('Location: index.php?page=admin_user');
}

function  deleteTestPartiel($idUtilisateur,$idtest){
  $deletetestpartiel = getDeleteTestPartiel($idUtilisateur,$idtest);
  header('Location: index.php?page=admin_user');
}

function  deleteTestComplet($idUtilisateur,$idtest){
  $deletetestcomplet = getDeleteTestComplet($idUtilisateur,$idtest);
  header('Location: index.php?page=admin_user');
}

function dataUser(){
  $user = getUser();
  $dataconnexion = getDataConnexion();
  $testpartiel = getTestPartiel();
  $nbuser = getCountUser();
  $nbpilote = getCountPilote();
  $nbTest = getCountTest();
  $nbTestReussis = getCountTestReussis();
  $total = getTestPartiel2();
  $total2 = getTestComplet2();
  require('vue/admin_user.php');
}

function dataTicket(){
  $ticket = getTicket();
  $nbTicket = getCountTicket();
  $nbTicketEnCours = getCountTicketEnCours();
  $nbTicketValide = getCountTicketValide();
  require('vue/admin_ticket.php');
}

function modifyTicket($statut,$id){
  $modify = getModifyTicket($statut,$id);
  header('Location: index.php?page=admin_ticket');
}

function dataFAQ(){
  $faq = getFAQ();
  require('vue/admin_faq.php');
}

function modifyFAQ($texte,$id){
  $modify = getModifyFAQ($texte,$id);
  header('Location: index.php?page=admin_faq');
}

function deleteFAQ($id){
  $delete = getDeleteFAQ($id);
  header('Location: index.php?page=admin_faq');
}

function addFAQ($question,$reponse){
  $add = getAddFAQ($question,$reponse);
  header('Location: index.php?page=admin_faq');
}

function page_user($id){
  $datauser = getDataUser($id);
  $nbtest = getCountTestUser($id);
  $nbvalide = getCountTestCheckUser($id);
  $datepartiel = getLastTestPartielUser($id);
  $datecomplet = getLastTestCompletUser($id);
  require('vue/Menu.php');
}

function page_dernierresultat($id){
  $resultat = getDernierTypeTest($id);
  $resultatTest = getDernierTest($id,$resultat);
  require('vue/resultat-test-partiel.php');
}

function page_historique($id){
  $nbTest = getNbTestPerUser($id);
  $tabTest = getDateScoreForUser($id);
  require('vue/Historique.php');
}

function page_test($id){
  require('vue/PageTest.php');
}

function page_modif_profil($id){
  $user = getUserProfil($id);
  require('vue/Modification-profil.php');
}
function modif_profil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel){
  $modifprofil = getModifProfil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel);
  header('Location: index.php?page=user');
}
function page_faq(){
  $faq = getFAQ();
  require('vue/FAQ.php');
}

function accueil(){
  require('vue/Accueil.php');
}

function connexion($email,$mdp){
  $connexion = getConnexion($email,md5($mdp));
  if (isset($connexion)){
    while ($data = $connexion->fetch()){
      $_SESSION['id'] = $data['idUtilisateur'];
      if ($data['type'] == "Administrateur"){
        $_SESSION['type'] = "Administrateur";
        header ('Location: index.php?page=admin_user');
      }
      else if ($data['type'] == "Gestionnaire"){
        $_SESSION['type'] = "Gestionnaire";
        header ('Location: index.php?page=gestionnaire');
      }
      else if ($data['type'] == "Pilote"){
        $_SESSION['type'] = "Pilote";
        header ('Location: index.php?page=user');
      }
    }
  }
  else{
    header('Location: index.php');
  }
}

function deconnexion(){
  $_SESSION = array();
  session_destroy();
  header('Location: index.php');
  exit;
}
