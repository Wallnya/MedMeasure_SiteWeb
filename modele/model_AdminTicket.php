<?php
function getTicket(){
  $db = dbConnect();
  $req = $db->query('SELECT idTicket, intitule, contenu, statut, prenom, dateEnvoi FROM ticket natural join utilisateur');
  return $req;
}

function getModifyTicket($statut,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Ticket SET Statut = ? WHERE idTicket = '.$id);
  $req->execute(array($statut));
  $modify = $req->fetch();

  return $modify;
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
