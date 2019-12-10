<?php
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
  $req = $db->prepare('SELECT idUtilisateur, type, banni FROM connexion  where email = ? and mdp = ?');
  $req->execute(array($email,$mdp));
  return $req;
}
