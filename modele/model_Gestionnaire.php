<?php
function getNbUtilisateur(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb  FROM utilisateur;");
  $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getSexeFemme(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE Sexe = 'Femme'");
  $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getSexeHomme(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb  FROM utilisateur WHERE Sexe = 'Homme';");
  $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge20(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 20");
  $nbAge020 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge2030(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 20 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 30");
  $nbAge2030 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge3040(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 30 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 40");
  $nbAge3040 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge4050(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 40 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 50");
  $nbAge4050 =   $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge5060(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 50 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 60");
  $nbAge5060 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAge60(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 60");
  $nbAge60 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartiel(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel;");
  $nbPartiel = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartiel25(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel WHERE score < 25;");
  $nbPartiel025 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartiel2550(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel WHERE score >= 25 and score < 50;");
  $nbPartiel2550 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartiel5075(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel WHERE score >= 50 and score < 75;");
  $nbPartiel5075 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartiel75(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel WHERE score >= 75;");
  $nbPartiel75100 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbComplet(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet;");
  $nbComplet = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbComplet25(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE score < 25;");
  $nbComplet025 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbComplet2550(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE score >= 25 and score < 50;");
  $nbComplet2550 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbComplet5075(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE score >= 50 and score < 75;");
  $nbComplet5075 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbComplet75(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE score >= 75;");
  $nbComplet75100 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}


/**********************************************/
/*                Avec Sexe                   */
/**********************************************/

function getNbUtilisateurSexe($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getSexeFemmeSelec($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE Sexe = 'Femme' and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getSexeHommeSelec($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE Sexe = 'Homme' and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe20($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 20 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe2030($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 20 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 30 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe3040($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 30 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 40 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe4050($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 40 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 50 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe5060($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 50 and TIMESTAMPDIFF(year,DN,CURRENT_DATE) < 60 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getAgeSexe60($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM utilisateur WHERE TIMESTAMPDIFF(year,DN,CURRENT_DATE) >= 60 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartielSexe($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel INNER JOIN utilisateur ON testpartiel.idUtilisateur = utilisateur.idUtilisateur WHERE Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartielSexe25($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel INNER JOIN utilisateur ON testpartiel.idUtilisateur = utilisateur.idUtilisateur WHERE score < 25 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartielSexe2550($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel INNER JOIN utilisateur ON testpartiel.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 25 and score < 50 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartielSexe5075($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel INNER JOIN utilisateur ON testpartiel.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 50 and score < 75 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbPartielSexe75($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel INNER JOIN utilisateur ON testpartiel.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 75 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbCompletSexe($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet INNER JOIN utilisateur ON testcomplet.idUtilisateur = utilisateur.idUtilisateur WHERE Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbCompletSexe25($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet INNER JOIN utilisateur ON testcomplet.idUtilisateur = utilisateur.idUtilisateur WHERE score < 25 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbCompletSexe2550($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet INNER JOIN utilisateur ON testcomplet.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 25 and score < 50 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbCompletSexe5075($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet INNER JOIN utilisateur ON testcomplet.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 50 and score < 75 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getNbCompletSexe75($sexe){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet INNER JOIN utilisateur ON testcomplet.idUtilisateur = utilisateur.idUtilisateur WHERE score >= 75 and Sexe = ?;");
  $requete->execute(array($sexe));
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}


/**********************************************/
/*              Nombre test                   */
/**********************************************/
function getNbTestPartiel(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testpartiel;");
  $nbPartiel = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getNbTestComplet(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet;");
  $nbComplet = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}


/**********************************************/
/*              Cardiaque                     */
/**********************************************/

function getFrequence1(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence < 40) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence < 40);");
  $nbFrequence1 = $requete -> execute();
  return $nbFrequence1;
}

function getFrequence2(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence >= 40 and Frequence < 60) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence >= 40 and Frequence < 60);");
  $nbFrequence2 = $requete -> execute();
  return $nbFrequence2;
}

function getFrequence3(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence >= 60 and Frequence < 80) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence >= 60 and Frequence < 80);");
  $nbFrequence3 = $requete -> execute();
  return $nbFrequence3;
}

function getFrequence4(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence >= 80 and Frequence < 100) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence >= 80 and Frequence < 100);");
  $nbFrequence4 = $requete -> execute();
  return $nbFrequence4;
}

function getFrequence5(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence >= 100 and Frequence < 120) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence >= 100 and Frequence < 120);");
  $nbFrequence5 = $requete -> execute();
  return $nbFrequence5;
}

function getFrequence6(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE Frequence >= 120) + (SELECT count(*)  as nb FROM testcomplet WHERE Frequence >= 120);");
  $nbFrequence6 = $requete -> execute();
  return $nbFrequence6;
}

/**********************************************/
/*              Auditif                       */
/**********************************************/

function getAuditif1(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE PerceptionAuditive < 35) + (SELECT count(*)  as nb FROM testcomplet WHERE PerceptionAuditive < 35);");
  $nbPerceptionAuditive1 = $requete -> execute();
  return $nbPerceptionAuditive1;
}

function getAuditif2(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE PerceptionAuditive >= 35) + (SELECT count(*)  as nb FROM testcomplet WHERE PerceptionAuditive >= 35);");
  $nbPerceptionAuditive2 = $requete -> execute();
  return $nbPerceptionAuditive2;
}

/**********************************************/
/*              Visuel                        */
/**********************************************/
function getVisuel1(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel < 200) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel < 200);");
  $nbStimulusVisuel1 = $requete -> execute();
  return $nbStimulusVisuel1;
}
function getVisuel2(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel >= 200 and StimulusVisuel < 400) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel >= 200 and StimulusVisuel < 400);");
  $nbStimulusVisuel2 = $requete -> execute();
  return $nbStimulusVisuel2;
}
function getVisuel3(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel >= 400 and StimulusVisuel < 600) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel >= 400 and StimulusVisuel < 600);");
  $nbStimulusVisuel3 = $requete -> execute();
  return $nbStimulusVisuel3;
}
function getVisuel4(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel >= 600 and StimulusVisuel < 800) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel >= 600 and StimulusVisuel < 800);");
  $nbStimulusVisuel4 = $requete -> execute();
  return $nbStimulusVisuel4;
}
function getVisuel5(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel >= 800 and StimulusVisuel < 1000) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel >= 800 and StimulusVisuel < 1000);");
  $nbStimulusVisuel5 = $requete -> execute();
  return $nbStimulusVisuel5;
}
function getVisuel6(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT (SELECT count(*)  as nb FROM testpartiel WHERE StimulusVisuel >= 1000) + (SELECT count(*)  as nb FROM testcomplet WHERE StimulusVisuel >= 1000);");
  $nbStimulusVisuel6 = $requete -> execute();
  return $nbStimulusVisuel6;
}

/**********************************************/
/*              Peau                          */
/**********************************************/
function getPeau1(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau < 20;");
  $nbTemperaturePeau1 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getPeau2(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau >= 20 and TemperaturePeau < 25;");
  $nbTemperaturePeau2 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getPeau3(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau >= 25 and TemperaturePeau < 30;");
  $nbTemperaturePeau3 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getPeau4(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau >= 30 and TemperaturePeau < 35;");
  $nbTemperaturePeau4 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getPeau5(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau >= 35 and TemperaturePeau < 40;");
  $nbTemperaturePeau5 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}
function getPeau6(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE TemperaturePeau >= 40;");
  $nbTemperaturePeau6 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

/**********************************************/
/*              Tonalité                      */
/**********************************************/
function getTonalite1(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite < 130;");
  $nbReconnaissanceTonalite1 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite2(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 130 and RecoTonalite < 775;");
  $nbReconnaissanceTonalite2 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite3(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 775 and RecoTonalite < 1420;");
  $nbReconnaissanceTonalite3 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite4(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 1420 and RecoTonalite < 2065;");
  $nbReconnaissanceTonalite4 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite5(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 2065 and RecoTonalite < 2710;");
  $nbReconnaissanceTonalite5 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite6(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 2710 and RecoTonalite < 3355;");
  $nbReconnaissanceTonalite6 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite7(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 3355 and RecoTonalite < 4000;");
  $nbReconnaissanceTonalite7 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

function getTonalite8(){
  $db = dbConnect();
  $requete = $db -> prepare("SELECT count(*)  as nb FROM testcomplet WHERE RecoTonalite >= 4000;");
  $nbReconnaissanceTonalite8 = $requete -> execute();
  $invNum = $requete -> fetch(PDO::FETCH_ASSOC);
  return $invNum['nb'];
}

/*RECHERCHE DES PILOTES*/
function getNbPilotePossibles($recherche){
  $db = dbConnect();
  $errormanagement = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  $listeUser = $db -> prepare("SELECT * FROM utilisateur WHERE nom LIKE ? or prenom LIKE ?;");
  $listeUser -> execute(array('%'.$recherche.'%','%'.$recherche.'%'));
  $listeUser -> setFetchMode(PDO::FETCH_ASSOC);
  $nbUser = $listeUser -> rowCount();
  return $nbUser;
}

function getListePilotesPossibles($recherche){
  $db = dbConnect();
  $errormanagement = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  $listeUser = $db -> prepare("SELECT * FROM utilisateur WHERE nom LIKE ? or prenom LIKE ?;");
  $listeUser -> execute(array('%'.$recherche.'%','%'.$recherche.'%'));
  $listeUser -> setFetchMode(PDO::FETCH_ASSOC);
  return $listeUser;
}

function getNbPilotesRecherche($recherche){
  $db = dbConnect();
  if ($recherche != ""){
    $appelation_user = explode(" ", $recherche);
    $listeUser2 = $db -> prepare("SELECT date, Frequence, PerceptionAuditive, StimulusVisuel, TemperaturePeau, RecoTonalite, score FROM testcomplet WHERE idUtilisateur = (select idUtilisateur from utilisateur where nom LIKE ? or prenom LIKE ?);");
    $req = $listeUser2 -> execute(array($appelation_user[1],$appelation_user[0]));
    $nb = $listeUser2 -> rowCount();
    return $nb;
  }
  else{
    return 0;
  }
}

function getListePiloteRecherche($recherche){
  $db = dbConnect();
  if ($recherche != ""){
    $appelation_user = explode(" ", $recherche);
    $listeUser2 = $db -> prepare("SELECT date, Frequence, PerceptionAuditive, StimulusVisuel, TemperaturePeau, RecoTonalite, score FROM testcomplet WHERE idUtilisateur = (select idUtilisateur from utilisateur where nom LIKE ? or prenom LIKE ?);");
    $req = $listeUser2 -> execute(array($appelation_user[1],$appelation_user[0]));
    $listeUser2 -> setFetchMode(PDO::FETCH_ASSOC);
    return $listeUser2;
  }else{
    return 0;
  }
}

function getResultatPartiel($recherche){
  $db = dbConnect();
  if ($recherche != ""){
    $appelation_user = explode(" ", $recherche);
    $listeUser3 = $db -> prepare("SELECT date, Frequence, PerceptionAuditive, StimulusVisuel, score FROM testpartiel WHERE idUtilisateur = (select idUtilisateur from utilisateur where nom LIKE ? or prenom LIKE ?);");
    $req = $listeUser3 -> execute(array($appelation_user[1],$appelation_user[0]));
    $nb = $listeUser3 -> rowCount();
    return $nb;
  }
  else{
    return 0;
  }
}

function getResultatComplet($recherche){
  $db = dbConnect();
  if ($recherche != ""){
    $appelation_user = explode(" ", $recherche);
    $listeUser3 = $db -> prepare("SELECT date, Frequence, PerceptionAuditive, StimulusVisuel, score FROM testpartiel WHERE idUtilisateur = (select idUtilisateur from utilisateur where nom LIKE ? or prenom LIKE ?);");
    $req = $listeUser3 -> execute(array($appelation_user[1],$appelation_user[0]));
    $listeUser3 -> setFetchMode(PDO::FETCH_ASSOC);
    return $listeUser3;
  }else{
    return 0;
  }
}

?>
