<?php
function getTicket(){
  $db = dbConnect();
  $req = $db->prepare('SELECT idTicket, intitule, contenu, statut, prenom, dateEnvoi FROM ticket natural join utilisateur');
  $req->execute();
  return $req;
}

function getModifyTicket($statut,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Ticket SET Statut = ? WHERE idTicket = ?');
  $req->execute(array($statut,$id));
  $modify = $req->fetch();
  return $modify;
}

function getCountTicket(){
  $db = dbConnect();
  $req = $db->prepare('SELECT count(idTicket) as nbTicket FROM ticket');
  $req->execute();
  return $req;
}

function getCountTicketEnCours(){
  $db = dbConnect();
  $req = $db->prepare('SELECT count(idTicket) as nbTicket FROM ticket where statut="0"');
  $req->execute();
  return $req;
}

function getCountTicketValide(){
  $db = dbConnect();
  $req = $db->prepare('SELECT count(idTicket) as nbTicket FROM ticket where statut="1"');
  $req->execute();
  return $req;
}
