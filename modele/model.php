<?php
function getUser()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM utilisateur');

    return $req;
}


function getDataConnexion()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM connexion');

    return $req;
}

function getModifyUser($type,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET Type = ? WHERE idUtilisateur = '.$id);
  $req->execute(array($type));
  $modify = $req->fetch();

  return $modify;
}

function getDeleteUser($id)
{
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM connexion WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM testpartiel WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  $req = $db->prepare('DELETE FROM utilisateur WHERE idUtilisateur = '.$id);
  $req->execute(array($id));
  $delete = $req->fetch();
  return $delete;
}

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
