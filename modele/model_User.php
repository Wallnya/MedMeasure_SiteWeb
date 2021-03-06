<?php
  function getDataUser($id){
    $db = dbConnect();
    $req = $db->prepare('SELECT nom, prenom FROM utilisateur WHERE idUtilisateur= ?');
    $req->execute(array($id));
    return $req;
  }

  function getCountTestUser($id){
    $db = dbConnect();
    $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel WHERE idUtilisateur= ?');
    $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet WHERE idUtilisateur=?');
    $req1 -> execute(array($id));
    $req2 -> execute(array($id));

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getCountTestCheckUser($id){
    $db = dbConnect();
    $req1 = $db->prepare('SELECT count(idTestPartiel) as nbtestPartiel FROM testpartiel WHERE score >="75" and idUtilisateur= ?');
    $req2 = $db->prepare('SELECT count(idTestComplet) as nbtestComplet FROM testcomplet WHERE score >="75" and idUtilisateur=?');
    $req1 -> execute(array($id));
    $req2 -> execute(array($id));

    $invNum = $req1 -> fetch(PDO::FETCH_ASSOC);
    $nbTestPartiel = $invNum['nbtestPartiel'];

    $invNum1 = $req2 -> fetch(PDO::FETCH_ASSOC);
    $nbTestComplet = $invNum1['nbtestComplet'];

    $total = $nbTestPartiel + $nbTestComplet;
    return $total;
  }

  function getLastTestPartielUser($id){
    $db = dbConnect();
    $req = $db->prepare('SELECT max(date) AS date_max_partiel FROM testpartiel WHERE idUtilisateur=?');
    $req -> execute(array($id));
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
    $req = $db->prepare('SELECT max(date) AS date_max_complet FROM testcomplet WHERE idUtilisateur= ?');
    $req -> execute(array($id));
    $invNum = $req -> fetch(PDO::FETCH_ASSOC);
    $date = $invNum['date_max_complet'];
    if ($date ==""){
      return "0000-00-00";
    }
    else{
      return $date;
    }
  }


  function getUserProfil($id){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM utilisateur where idUtilisateur= ?');
    $req->execute(array($id));
    return $req;
  }

  function getModifProfil($id,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel){
    $db = dbConnect();
    $req = $db->prepare('UPDATE Utilisateur SET Nom = ?, Prenom = ?, DN = ?, Sexe = ?, AdresseVoie = ?, AdresseVille = ?, AdresseCP = ?, Tel = ? WHERE idUtilisateur = '.$id);
    $req->execute(array($nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel));
    $modify = $req->fetch();
    return $modify;
  }

  function getDernierTypeTest($id){
    $db = dbConnect();
    $req1 = $db->prepare('SELECT max(date) as resultatpartiel FROM testpartiel  where idUtilisateur=?');
    $req2 = $db->prepare('SELECT max(date) as resultatcomplet FROM testcomplet  where idUtilisateur=?');
    $req1 -> execute(array($id));
    $req2 -> execute(array($id));

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
    $chaine = "SELECT * FROM $nomtable where date = (select max(date) from $nomtable where idUtilisateur=?)";
    $req = $db->prepare($chaine);
    $req -> execute(array($id));
    return $req;
  }

  function getTest($idtest,$type,$id){
    $db = dbConnect();
    $nomtest = "idTest".$type;
    $nomtable = "test".$type;
    $chaine = "SELECT * FROM $nomtable where $nomtest=? and idUtilisateur=?";
    $req = $db->prepare($chaine);
    $req -> execute(array($idtest,$id));
      return $req;
  }
