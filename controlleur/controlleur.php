<?php

require('modele/model.php');

function modifyUser($type,$id)
{
  $modify = getModifyUser($type,$id);

  header('Location: index.php?page=admin_user');

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

function dataUser()
{
  $user = getUser();
  $dataconnexion = getDataConnexion();
  $testpartiel = getTestPartiel();
  $nbuser = getCountUser();
  $nbpilote = getCountPilote();
  $nbTestReussis = getCountTestReussis();
  $nbTest = getCountTest();
  require('vue/admin_user.php');
}

function dataTicket()
{
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

function modifyFAQ($texte,$id)
{
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
  require('vue/Menu.php');
}

function page_modif_profil($id){
  $user = getUserProfil($id);
  require('vue/Modification-profil.php');
}
function modif_profil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel){
  $modifprofil = getModifProfil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel);
  header('Location: index.php?page=user');
}

function accueil(){
  require('vue/Accueil.php');
}

function connexion($email,$mdp){
  $connexion = getConnexion($email,$mdp);
  if (isset($connexion)){
      while ($data = $connexion->fetch()){
       $_SESSION['id'] = $data['idUtilisateur'];
       if ($data['type'] == "Administrateur"){
         $_SESSION['type'] = "Administrateur";
         header ('Location: index.php?page=admin_user');
       }
       else if ($data['type'] == "Gestionnaire"){
         $_SESSION['type'] = "Gestionnaire";
         header ('Location: gestionnaire.php');
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

function deconnexion()
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
    exit;
}
