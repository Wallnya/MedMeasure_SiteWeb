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
        array_push($a,$temp);
  }
  return $a;
}
