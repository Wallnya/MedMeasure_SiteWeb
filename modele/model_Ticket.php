<?php
function createTicket($id,$intitule,$contenu){
  $db = dbConnect();
  $req = $db->prepare('INSERT INTO ticket(idTicket,idUtilisateur,dateEnvoi,intitule,contenu,statut) VALUES (?,?,?,?,?,?)');
  #récupération du max
  $stmt = $db->prepare("SELECT max(idTicket) AS max_id FROM ticket");
  $stmt -> execute();
  $invNum = $stmt -> fetch();
  $max_id = $invNum['max_id']+1;
  //$max_id = 12;
  #et incrémentation du max
  $date = date("Y-m-d");
  $stat = 0;
  $req->execute(array($max_id,$id,$date,$intitule,$contenu,$stat));
  $add = $req->fetch();
  return $add;
}

function getTicketPerso($id){
  $db = dbConnect();
  $req = $db->prepare('SELECT dateEnvoi,intitule,contenu FROM ticket WHERE idUtilisateur = ?');
  $req->execute([ $id ]);
  return $req;
}
?>
