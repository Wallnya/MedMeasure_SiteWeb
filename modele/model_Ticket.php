<?php
function createTicket($intitule,$contenu){
  $db = dbConnect();
  $req = $db->prepare('INSERT INTO ticket(idTicket,idUtilisateur,dateEnvoi,intitule,contenu,statut) VALUES (?,?,?,?,?,?)');
  #récupération du max
  $stmt = $db->prepare("SELECT max(idTicket) AS max_id FROM ticket");
  $stmt -> execute();
  $invNum = $stmt -> fetch();
  $max_id = $invNum['max_id']+1;
  //$max_id = 12;
  #et incrémentation du max
  $idU = 7;
  $date = date("Y-m-d");
  $stat = 0;
  $req->execute(array($max_id,$idU,$date,$intitule,$contenu,$stat));
  $add = $req->fetch();
  return $add;
}
?>
