<?php
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

    $date = $data['date'];
    $score = $data['score'];
    $req = $db -> query("SELECT idTestPartiel as idp FROM testPartiel WHERE date='$date' and score = $score and idUtilisateur = $id");
    $req2 = $db -> query("SELECT idTestComplet as idc FROM testComplet WHERE date='$date' and score = $score and idUtilisateur = $id");

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
