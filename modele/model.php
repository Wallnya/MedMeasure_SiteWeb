<?php

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


function getTestPartiel2(){
  $db = dbConnect();
  $req1 = $db->query('SELECT * FROM testpartiel INNER JOIN utilisateur where testpartiel.idUtilisateur = utilisateur.idUtilisateur order by testpartiel.idUtilisateur, testpartiel.numero_test');
  return $req1;
}

function getTestComplet2(){
  $db = dbConnect();
  $req1 = $db->query('SELECT * FROM testcomplet INNER JOIN utilisateur where testcomplet.idUtilisateur = utilisateur.idUtilisateur order by testcomplet.idUtilisateur, testcomplet.numero_test');
  return $req1;
}

function getNbTestPerUser($id){
  $db = dbConnect();
  $reqTest = $db -> query("SELECT date, score
                                  FROM testPartiel
                                  WHERE idUtilisateur = '".$id."'
                                  UNION
                                  SELECT date, score
                                  FROM testComplet
                                  WHERE idUtilisateur = '".$id."'
                                  ORDER BY date;");

  $reqTest -> setFetchMode(PDO::FETCH_ASSOC);
  $nbTest = $reqTest->rowCount();
  return $nbTest;
}

function getDateScoreForUser($id){
  $db = dbConnect();
  $reqTest = $db -> query("SELECT date, score
                                  FROM testPartiel
                                  WHERE idUtilisateur = $id
                                  UNION
                                  SELECT date, score
                                  FROM testComplet
                                  WHERE idUtilisateur = $id
                                  ORDER BY date");
  $nbTest = $reqTest->rowCount();
  $a = array();
  while ($data = $reqTest->fetch()){
    $temp = array();
    array_push ($temp,$data['date']);
    array_push ($temp,$data['score']);
        array_push($a,$temp);
  }
  return $a;
}

function getUser()
{
  $db = dbConnect();
  $req = $db->query('SELECT * FROM utilisateur');

  return $req;
}

function getUserProfil($id)
{
  $db = dbConnect();
  $req = $db->query('SELECT * FROM utilisateur where idUtilisateur='.$id);

  return $req;
}

function getDernierTypeTest($id){
  $db = dbConnect();
  $req1 = $db->query('SELECT max(date) as resultatpartiel FROM testpartiel  where idUtilisateur='.$id);
  $req2 = $db->query('SELECT max(date) as resultatcomplet FROM testcomplet  where idUtilisateur='.$id);

  $invNum1 = $req1 -> fetch(PDO::FETCH_ASSOC);
  $invNum2 = $req2 -> fetch(PDO::FETCH_ASSOC);

  $r1 = $invNum1['resultatpartiel'];
  $r2 = $invNum2['resultatcomplet'];

  $today_dt = date_create($r1);
  $expire_dt = date_create($r2);

  if ($r1 ==""){
    return "complet";
  }
  else if ($r2 ==""){
    return "partiel";
  }
  if ($expire_dt < $today_dt) {
    return "partiel";
  }
  else{
    return "complet";
  }
}

function getDernierTest($id,$type){
  $db = dbConnect();
  $nomtable = "test".$type;
  $chaine = "SELECT * FROM $nomtable where date = (select max(date) from $nomtable where idUtilisateur=$id)";
  $req = $db->query($chaine);
  return $req;
}

function getDataConnexion()
{
  $db = dbConnect();
  $req = $db->query('SELECT * FROM connexion');

  return $req;
}
function getTestPartiel()
{
  $db = dbConnect();
  $req = $db->query('SELECT * FROM `testpartiel` order by idUtilisateur, numero_test');

  return $req;
}

function getTicket(){
  $db = dbConnect();
  $req = $db->query('SELECT * FROM ticket');
  return $req;
}

function getFAQ(){
  $db = dbConnect();
  $req = $db->query('SELECT * FROM FAQ');
  return $req;
}

function getModifyFAQ($texte,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE FAQ SET reponse = ? WHERE idFAQ = '.$id);
  $req->execute(array($texte));
  $modify = $req->fetch();

  return $modify;
}

function getDeleteFAQ($id)
{
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM FAQ WHERE idFAQ = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  return $delete;
}

function getAddFAQ($question,$reponse){
  $db = dbConnect();
  $req = $db->prepare('INSERT INTO faq(idFAQ,intitule,reponse) VALUES (?,?,?)');

  #récupération du max
  $stmt = $db->prepare("SELECT max(idFAQ) AS max_id FROM FAQ");
  $stmt -> execute();
  $invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
  $max_id = $invNum['max_id'];
  #et incrémentation du max
  $max_id= $max_id+1;

  $req->execute(array($max_id,$question,$reponse));
  $add = $req->fetch();
  return $add;
}

function getModifyUser($type,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET Type = ? WHERE idUtilisateur = '.$id);
  $req->execute(array($type));
  $modify = $req->fetch();

  return $modify;
}

function getModifyTicket($statut,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Ticket SET Statut = ? WHERE idTicket = '.$id);
  $req->execute(array($statut));
  $modify = $req->fetch();

  return $modify;
}

function getDeleteUser($id)
{
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM connexion WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM testpartiel WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM utilisateur WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  return $delete;
}

function dbConnect()
{
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=medmeasure;charset=utf8', 'root', '');
    return $db;
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}

function getConnexion($email,$mdp){
  $db = dbConnect();
  $req = $db->prepare('SELECT idUtilisateur, type FROM connexion  where email = ? and mdp = ?');
  $req->execute(array($email,$mdp));
  return $req;
}

function getCheckUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp){
  $db = dbConnect();
  // On regarde si l'email est déjà utilisée
  $reqVerif = $db -> query("SELECT * FROM connexion WHERE email = '".$email."';");
  $count = $reqVerif->rowCount(); // On compte le nombre de lignes réponse
  if ($count == 0){
    // Ajout à la table utilisateur
    $reqAjoutUtilisateur = $db -> prepare("
    INSERT INTO Utilisateur(Nom, Prenom, DN, Sexe, AdresseVoie, AdresseVille, AdresseCP, Tel)
    VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)
    ");
    $reqAjoutUtilisateur -> execute(array(
      "value1" => $nom,
      "value2" => $prenom,
      "value3" => $dn,
      "value4" => $sexe,
      "value5" => $adresse,
      "value6" => $ville,
      "value7" => $cp,
      "value8" => $tel
    ));
    $reqAjoutUtilisateur -> closeCursor();
    // On récupère l'id qui vient d'être créé
    $reqid = $db -> query("SELECT idUtilisateur
      FROM utilisateur
      ORDER BY idUtilisateur DESC LIMIT 1");
      $reqid -> setFetchMode(PDO::FETCH_ASSOC);
      foreach ($reqid as $ligne){
        $id = $ligne['idUtilisateur'];
      }
      // Ajout à la table connexion
      $reqAjoutConnexion = $db -> prepare("
      INSERT INTO Connexion(email, mdp, type, idUtilisateur)
      VALUES (:value1, :value2, :value3, :value4)
      ");
      $reqAjoutConnexion -> execute(array(
        "value1" => $email,
        "value2" => md5($mdp),
        "value3" => "Pilote",
        "value4" => $id
      ));
      $reqAjoutConnexion -> closeCursor();
    }
    return $count;
  }


  function getCountUser(){
    $db = dbConnect();
    $req = $db->query('SELECT count(idUtilisateur) as uti FROM utilisateur');
    return $req;
  }

  function getCountPilote(){
    $db = dbConnect();
    $req = $db->query('SELECT count(idUtilisateur) as uti FROM utilisateur where idUtilisateur in (select idUtilisateur from connexion where type="Pilote")');
    return $req;
  }

  function getCountTestReussis(){
    $db = dbConnect();
    $req1 = $db->query('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel where score >= "75"');
    $req2 = $db->query('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet where score >= "75"');

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getCountTest(){
    $db = dbConnect();
    $req1 = $db->query('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel');
    $req2 = $db->query('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet');

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getCountTicket(){
    $db = dbConnect();
    $req = $db->query('SELECT count(idTicket) as nbTicket FROM ticket');
    return $req;
  }

  function getCountTicketEnCours(){
    $db = dbConnect();
    $req = $db->query('SELECT count(idTicket) as nbTicket FROM ticket where statut="0"');
    return $req;
  }

  function getCountTicketValide(){
    $db = dbConnect();
    $req = $db->query('SELECT count(idTicket) as nbTicket FROM ticket where statut="1"');
    return $req;
  }

  function getDataUser($id){
    $db = dbConnect();
    $req = $db->query('SELECT nom, prenom FROM utilisateur WHERE idUtilisateur='.$id);
    return $req;
  }

  function getCountTestUser($id){
    $db = dbConnect();
    $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel WHERE idUtilisateur='.$id);
    $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet WHERE idUtilisateur='.$id);
    $req1 -> execute();
    $req2 -> execute();

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getCountTestCheckUser($id){
    $db = dbConnect();
    $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel WHERE score >="75" and idUtilisateur='.$id);
    $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet WHERE score >="75" and idUtilisateur='.$id);
    $req1 -> execute();
    $req2 -> execute();

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getLastTestPartielUser($id){
    $db = dbConnect();
    $req = $db->query('SELECT max(date) AS date_max_partiel FROM testpartiel WHERE idUtilisateur='.$id);
    $invNum = $req -> fetch(PDO::FETCH_ASSOC);
    $date = $invNum['date_max_partiel'];
    if ($date ==""){
      return "0000-00-00";
    }
    else{
      return $date;
    }
  }

  function getLastTestCompletUser($id){
    $db = dbConnect();
    $req = $db->query('SELECT max(date) AS date_max_complet FROM testcomplet WHERE idUtilisateur='.$id);
    $invNum = $req -> fetch(PDO::FETCH_ASSOC);
    $date = $invNum['date_max_complet'];
    if ($date ==""){
      return "0000-00-00";
    }
    else{
      return $date;
    }
  }


  function getModifProfil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel){
    $db = dbConnect();
    $req = $db->prepare('UPDATE Utilisateur SET Nom = ?, Prenom = ?, DN = ?, Sexe = ?, AdresseVoie = ?, AdresseVille = ?, AdresseCP = ?, Tel = ? WHERE idUtilisateur = '.$id);
    $req->execute(array($nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel));
    $modify = $req->fetch();
    return $modify;
  }
