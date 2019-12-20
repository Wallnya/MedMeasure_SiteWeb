<?php
function getNbTestPerUser($id){
  $db = dbConnect();
  $reqTest = $db -> prepare("SELECT date, score
                                  FROM testPartiel
                                  WHERE idUtilisateur = ?
                                  UNION
                                  SELECT date, score
                                  FROM testComplet
                                  WHERE idUtilisateur = ?
                                  ORDER BY date;");
  $reqTest->execute(array($id,$id));

  $reqTest -> setFetchMode(PDO::FETCH_ASSOC);
  $nbTest = $reqTest->rowCount();
  return $nbTest;
}

function getDateScoreForUser($id){
  $db = dbConnect();
  $reqTest = $db -> prepare("SELECT date, score
                                  FROM testPartiel
                                  WHERE idUtilisateur = ?
                                  UNION
                                  SELECT date, score
                                  FROM testComplet
                                  WHERE idUtilisateur = ?
                                  ORDER BY date");
  $reqTest->execute(array($id,$id));

  $nbTest = $reqTest->rowCount();
  $a = array();
  while ($data = $reqTest->fetch()){
    $temp = array();
    array_push ($temp,$data['date']);
    array_push ($temp,$data['score']);

    $date = $data['date'];
    $score = $data['score'];
    $req = $db -> prepare("SELECT idTestPartiel as idp FROM testPartiel WHERE date= ? and score = ? and idUtilisateur = ?");
    $req->execute(array($date,$score,$id));
    $req2 = $db -> prepare("SELECT idTestComplet as idc FROM testComplet WHERE date= ? and score = ? and idUtilisateur = ?");
    $req2->execute(array($date,$score,$id));

    $invNum1 = $req -> fetch(PDO::FETCH_ASSOC);
    $invNum2 = $req2 -> fetch(PDO::FETCH_ASSOC);

    $r1 = $invNum1['idp'];
    $r2 = $invNum2['idc'];

    if ($r1 ==""){
      array_push($temp,"complet");
      array_push($temp,$r2);
    }
    else{
      array_push($temp,"partiel");
      array_push($temp,$r1);
    }
    array_push($a,$temp);
  }
  return $a;
}
