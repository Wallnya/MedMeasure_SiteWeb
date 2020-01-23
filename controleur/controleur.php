<?php
require('modele/model_AdminUser.php');
require('modele/model_AdminEtFAQ.php');
require('modele/model_AdminTicket.php');
require('modele/model_User.php');
require('modele/model_UserHistorique.php');
require('modele/model_Connexion.php');
require('modele/model_Inscription.php');
require('modele/model_Gestionnaire.php');
require('modele/model_Ticket.php');


function page_ticket(){
  $ticket = getTicket();
  require('vue/Ticket.php');
}

function addTicket($intitule,$contenu){
  $add = createTicket($intitule,$contenu);
  header('Location: index.php?page=ticket');
}

/********************************/
/*            ADMIN             */
/********************************/
function banUser($id){
  $modify = getBanUser($id);
  header('Location: index.php?page=admin_user');
}

function modifyUser($type,$id){
  $modify = getModifyUser($type,$id);
  header('Location: index.php?page=admin_user');
}

function modifyValide($valide,$id){
  $modify = getModifyValide($valide,$id);
  header('Location: index.php?page=admin_user');
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

/********************************/
/*            USER              */
/********************************/
function page_resultat($type,$idtest,$id){
  $resultat = $type;
  $resultatTest = getTest($idtest,$type,$id);
  require('vue/resultat-test-partiel.php');
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

/********************************/
/*      GESTIONNAIRE            */
/********************************/
function page_gestionnaire(){
  $nbTotal = getNbUtilisateur();
  $femme = getSexeFemme();
  $homme = getSexeHomme();

  $nbAge20 = getAge20();
  $nbAge2030 = getAge2030();
  $nbAge3040 = getAge3040();
  $nbAge4050 = getAge4050();
  $nbAge5060 = getAge5060();
  $nbAge60 = getAge60();

  $nbPartiel = getNbPartiel();
  $nbPartiel025 = getNbPartiel25();
  $nbPartiel2550 = getNbPartiel2550();
  $nbPartiel5075 = getNbPartiel5075();
  $nbPartiel75100 = getNbPartiel75();

  $nbComplet = getNbComplet();
  $nbComplet025 = getNbComplet25();
  $nbComplet2550 = getNbComplet2550();
  $nbComplet5075 = getNbComplet5075();
  $nbComplet75100 = getNbComplet75();

  $nbFrequence1 = getFrequence1();
  $nbFrequence2 = getFrequence2();
  $nbFrequence3 = getFrequence3();
  $nbFrequence4 = getFrequence4();
  $nbFrequence5 = getFrequence5();
  $nbFrequence6 = getFrequence6();

  $nbPerceptionAuditive1 = getAuditif1();
  $nbPerceptionAuditive2 = getAuditif2();

  $nbStimulusVisuel1 = getVisuel1();
  $nbStimulusVisuel2 = getVisuel2();
  $nbStimulusVisuel3 = getVisuel3();
  $nbStimulusVisuel4 = getVisuel4();
  $nbStimulusVisuel5 = getVisuel5();
  $nbStimulusVisuel6 = getVisuel6();

  $nbTemperaturePeau1 = getPeau1();
  $nbTemperaturePeau2 = getPeau2();
  $nbTemperaturePeau3 = getPeau3();
  $nbTemperaturePeau4 = getPeau4();
  $nbTemperaturePeau5 = getPeau5();
  $nbTemperaturePeau6 = getPeau6();

  $nbReconnaissanceTonalite1 = getTonalite1();
  $nbReconnaissanceTonalite2 = getTonalite2();
  $nbReconnaissanceTonalite3 = getTonalite3();
  $nbReconnaissanceTonalite4 = getTonalite4();
  $nbReconnaissanceTonalite5 = getTonalite5();
  $nbReconnaissanceTonalite6 = getTonalite6();
  $nbReconnaissanceTonalite7 = getTonalite7();
  $nbReconnaissanceTonalite8 = getTonalite8();
  require('vue/gestionnaire.php');
}

/*function donnee_sexe_gestionnaire(){
  $nbTotal = getNbUtilisateur();
  $femme = getSexeFemme();
  $homme = getSexeHomme();
}*/

function donnee_age_gestionnaire(){
  $nbAge20 = getAge20();
  $nbAge2030 = getAge2030();
  $nbAge3040 = getAge3040();
  $nbAge4050 = getAge4050();
  $nbAge5060 = getAge5060();
  $nbAge60 = getAge60();
}

function donne_partiel_gestionnaire(){
  $nbPartiel = getNbPartiel();
  $nbPartiel025 = getNbPartiel25();
  $nbPartiel2550 = getNbPartiel2550();
  $nbPartiel5075 = getNbPartiel5075();
  $nbPartiel75100 = getNbPartiel75();
}

function donne_complet_gestionnaire(){
  $nbComplet = getNbComplet();
  $nbComplet025 = getNbComplet25();
  $nbComplet2550 = getNbComplet2550();
  $nbComplet5075 = getNbComplet5075();
  $nbComplet75100 = getNbComplet75();
}



function donnee_sexe_select_gestionnaire($sexe){
  $nbTotal = getNbUtilisateurSexe($sexe);
  $femme = getSexeFemmeSelec($sexe);
  $homme = getSexeHommeSelec($sexe);

  $nbAge20 = getAgeSexe20($sexe);
  $nbAge2030 = getAgeSexe2030($sexe);
  $nbAge3040 = getAgeSexe3040($sexe);
  $nbAge4050 = getAgeSexe4050($sexe);
  $nbAge5060 = getAgeSexe5060($sexe);
  $nbAge60 = getAgeSexe60($sexe);

  $nbPartiel = getNbPartielSexe($sexe);
  $nbPartiel025 = getNbPartielSexe25($sexe);
  $nbPartiel2550 = getNbPartielSexe2550($sexe);
  $nbPartiel5075 = getNbPartielSexe5075($sexe);
  $nbPartiel75100 = getNbPartielSexe75($sexe);

  $nbComplet = getNbCompletSexe($sexe);
  $nbComplet025 = getNbCompletSexe25($sexe);
  $nbComplet2550 = getNbCompletSexe2550($sexe);
  $nbComplet5075 = getNbCompletSexe5075($sexe);
  $nbComplet75100 = getNbCompletSexe75($sexe);

  require('vue/gestionnaire.php');


}
function donnee_sexe_age_gestionnaire($sexe){
  $nbAge20 = getAgeSexe20($sexe);
  $nbAge2030 = getAgeSexe2030($sexe);
  $nbAge3040 = getAgeSexe3040($sexe);
  $nbAge4050 = getAgeSexe4050($sexe);
  $nbAge5060 = getAgeSexe5060($sexe);
  $nbAge60 = getAgeSexe60($sexe);
}

function donne_sexe_partiel_gestionnaire($sexe){
  $nbPartiel = getNbPartielSexe($sexe);
  $nbPartiel025 = getNbPartielSexe25($sexe);
  $nbPartiel2550 = getNbPartielSexe2550($sexe);
  $nbPartiel5075 = getNbPartielSexe5075($sexe);
  $nbPartiel75100 = getNbPartielSexe75($sexe);
}

function donne_sexe_complet_gestionnaire($sexe){
  $nbComplet = getNbCompletSexe($sexe);
  $nbComplet025 = getNbCompletSexe25($sexe);
  $nbComplet2550 = getNbCompletSexeSexe2550($sexe);
  $nbComplet5075 = getNbCompletSexe5075($sexe);
  $nbComplet75100 = getNbCompletSexe75($sexe);
}

function donne_mesures(){
  $nbFrequence1 = getFrequence1();
  $nbFrequence2 = getFrequence2();
  $nbFrequence3 = getFrequence3();
  $nbFrequence4 = getFrequence4();
  $nbFrequence5 = getFrequence5();
  $nbFrequence6 = getFrequence6();

  $nbPerceptionAuditive1 = getAuditif1();
  $nbPerceptionAuditive2 = getAuditif2();

  $nbStimulusVisuel1 = getVisuel1();
  $nbStimulusVisuel2 = getVisuel2();
  $nbStimulusVisuel3 = getVisuel3();
  $nbStimulusVisuel4 = getVisuel4();
  $nbStimulusVisuel5 = getVisuel5();
  $nbStimulusVisuel6 = getVisuel6();

  $nbTemperaturePeau1 = getPeau1();
  $nbTemperaturePeau2 = getPeau2();
  $nbTemperaturePeau3 = getPeau3();
  $nbTemperaturePeau4 = getPeau4();
  $nbTemperaturePeau5 = getPeau5();
  $nbTemperaturePeau6 = getPeau6();

  $nbReconnaissanceTonalite1 = getTonalite1();
  $nbReconnaissanceTonalite2 = getTonalite2();
  $nbReconnaissanceTonalite3 = getTonalite3();
  $nbReconnaissanceTonalite4 = getTonalite4();
  $nbReconnaissanceTonalite5 = getTonalite5();
  $nbReconnaissanceTonalite6 = getTonalite6();
  $nbReconnaissanceTonalite7 = getTonalite7();
  $nbReconnaissanceTonalite8 = getTonalite8();

  require('vue/gestionnaire.php');

}

function donne_cardiaque(){
  $nbFrequence1 = getFrequence1();
  $nbFrequence2 = getFrequence2();
  $nbFrequence3 = getFrequence3();
  $nbFrequence4 = getFrequence4();
  $nbFrequence5 = getFrequence5();
  $nbFrequence6 = getFrequence6();
}

function donne_auditif(){
  $nbPerceptionAuditive1 = getAuditif1();
  $nbPerceptionAuditive2 = getAuditif2();
}

function donne_visuel(){
  $nbStimulusVisuel1 = getVisuel1();
  $nbStimulusVisuel2 = getVisuel2();
  $nbStimulusVisuel3 = getVisuel3();
  $nbStimulusVisuel4 = getVisuel4();
  $nbStimulusVisuel5 = getVisuel5();
  $nbStimulusVisuel6 = getVisuel6();
}

function donne_peau(){
  $nbTemperaturePeau1 = getPeau1();
  $nbTemperaturePeau2 = getPeau2();
  $nbTemperaturePeau3 = getPeau3();
  $nbTemperaturePeau4 = getPeau4();
  $nbTemperaturePeau5 = getPeau5();
  $nbTemperaturePeau6 = getPeau6();
}

function donne_tonalite(){
  $nbReconnaissanceTonalite1 = getTonalite1();
  $nbReconnaissanceTonalite2 = getTonalite2();
  $nbReconnaissanceTonalite3 = getTonalite3();
  $nbReconnaissanceTonalite4 = getTonalite4();
  $nbReconnaissanceTonalite5 = getTonalite5();
  $nbReconnaissanceTonalite6 = getTonalite6();
  $nbReconnaissanceTonalite7 = getTonalite7();
  $nbReconnaissanceTonalite8 = getTonalite8();
}

/********************************/
/*          CGU                 */
/********************************/
function cgu(){
  require('vue/cgu.php');
}

/********************************/
/*          INSCRIPTION         */
/********************************/
function login(){
  require('vue/inscription.php');
}

function checkUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp,$ges){
  $check = getCheckUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp,$ges);
  if ($check == 0){
    header('Location: index.php');
  }
  else{
    header('Location: index.php?page=inscription');
  }
}
/********************************/
/*          FAQ                 */
/********************************/
function page_faq(){
  $faq = getFAQ();
  require('vue/FAQ.php');
}
/********************************/
/*          ACCUEIL             */
/********************************/
function accueil(){
  require('vue/Accueil.php');
}
/********************************/
/*          CONNEXION           */
/********************************/
function connexion($email,$mdp){
  $connexion = getConnexion($email,hash('sha256', $mdp));
  if (isset($connexion)){
    while ($data = $connexion->fetch()){
      /*Si tu n'es pas banni*/
      if ($data['banni'] == 0 && $data['valide'] == 1){
        $_SESSION['id'] = $data['idUtilisateur'];
        if ($data['type'] == "Administrateur"){
          $_SESSION['type'] = "Administrateur";
          header ('Location: index.php?page=admin_user');
        }
        else if ($data['type'] == "Gestionnaire"){
          $_SESSION['type'] = "Gestionnaire";
          header ('Location: index.php?page=gestionnaire&traitement=sexe');
        }
        else if ($data['type'] == "Pilote"){
          $_SESSION['type'] = "Pilote";
          header ('Location: index.php?page=user');
        }
      }
    }
  }
  else{
    header('Location: index.php');
  }
}
/********************************/
/*          DECONNEXION         */
/********************************/
function deconnexion(){
  $_SESSION = array();
  session_destroy();
  header('Location: index.php');
  exit;
}
