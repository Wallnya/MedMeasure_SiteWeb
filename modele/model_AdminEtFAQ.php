<?php
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

function getFAQ(){
  $db = dbConnect();
  $req = $db->query('SELECT * FROM FAQ');
  return $req;
}
