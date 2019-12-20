<?php
function getModifyUser($type,$id){
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET Type = ? WHERE idUtilisateur = ?');
  $req->execute(array($type,$id));
  $modify = $req->fetch();
  return $modify;
}

function getModifyValide($valide,$id){
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET Valide = ? WHERE idUtilisateur = ?');
  $req->execute(array($valide,$id));
  $modify = $req->fetch();
  return $modify;
}

function getDeleteUser($id){
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM connexion WHERE idUtilisateur = ?');
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM testpartiel WHERE idUtilisateur = ?');
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');
  $req->execute(array($id));
  $delete = $req->fetch();
  return $delete;
}

function getDeleteTestPartiel($idUtilisateur,$idtest){
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM testpartiel WHERE idUtilisateur = ? and numero_test = ?');
  $req->execute(array($idUtilisateur,$idtest));
  $delete = $req->fetch();
  return $delete;
}

function getDeleteTestComplet($idUtilisateur,$idtest){
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM testcomplet WHERE idUtilisateur = ? and numero_test = ?');
  $req->execute(array($idUtilisateur,$idtest));
  $delete = $req->fetch();
  return $delete;
}

function getUser(){
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM utilisateur');
  $req->execute();
  return $req;
}

function getDataConnexion(){
  $db = dbConnect();
  $req = $db->prepare('SELECT idUtilisateur,email,type, valide FROM connexion');
  $req->execute();
  return $req;
}

function getTestPartiel(){
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM `testpartiel` order by idUtilisateur, numero_test');
  $req->execute();
  return $req;
}

function getCountUser(){
  $db = dbConnect();
  $req = $db->prepare('SELECT count(idUtilisateur) as uti FROM utilisateur');
  $req->execute();
  return $req;
}

function getCountPilote(){
  $db = dbConnect();
  $req = $db->prepare('SELECT count(idUtilisateur) as uti FROM utilisateur where idUtilisateur in (select idUtilisateur from connexion where type="Pilote")');
  $req->execute();
  return $req;
}

function getCountTestReussis(){
  $db = dbConnect();
  $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel where score >= "75"');
  $req1->execute();
  $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet where score >= "75"');
  $req2->execute();

  $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
  $nbTestPartiel = $invNum['nbtestPartiel'];

  $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
  $nbTestComplet = $invNum1['nbtestComplet'];

  $total = $nbTestPartiel + $nbTestComplet;
  return $total;
}

function getCountTest(){
  $db = dbConnect();
  $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel');
  $req1->execute();
  $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet');
  $req2->execute();

  $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
  $nbTestPartiel = $invNum['nbtestPartiel'];

  $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
  $nbTestComplet = $invNum1['nbtestComplet'];

  $total = $nbTestPartiel + $nbTestComplet;
  return $total;
}

function getTestPartiel2(){
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM testpartiel INNER JOIN utilisateur where testpartiel.idUtilisateur = utilisateur.idUtilisateur order by testpartiel.idUtilisateur, testpartiel.numero_test');
  $req->execute();
  return $req;
}

function getTestComplet2(){
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM testcomplet INNER JOIN utilisateur where testcomplet.idUtilisateur = utilisateur.idUtilisateur order by testcomplet.idUtilisateur, testcomplet.numero_test');
  $req->execute();
  return $req;
}

function getBanUser($id){
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET banni = ? WHERE idUtilisateur = ?');
  $req->execute(array('1'));
  $modify = $req->fetch();
  return $modify;
}
?>
