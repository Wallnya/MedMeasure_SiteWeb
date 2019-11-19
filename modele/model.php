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
function getTestPartiel()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM `testpartiel` order by idUtilisateur, numero_test');

    return $req;
}

function getTicket(){
  $db = dbConnect();
  $req = $db->query('SELECT * FROM ticket');
  return $req;
}

function getFAQ(){
  $db = dbConnect();
  $req = $db->query('SELECT * FROM FAQ');
  return $req;
}

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

function getModifyUser($type,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Connexion SET Type = ? WHERE idUtilisateur = '.$id);
  $req->execute(array($type));
  $modify = $req->fetch();

  return $modify;
}

function getModifyTicket($statut,$id)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE Ticket SET Statut = ? WHERE idTicket = '.$id);
  $req->execute(array($statut));
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

function getConnexion($email,$mdp){
  $db = dbConnect();
  $req = $db->prepare('SELECT idUtilisateur, type FROM connexion  where email = ? and mdp = ?');
  $req->execute(array($email,$mdp));
  return $req;
}

function getCheckUser($email,$nom,$prenom,$dn,$sexe,$adresse,$ville,$cp,$tel,$mdp){
  $db = dbConnect();
  // On regarde si l'email est déjà utilisée
  $reqVerif = $db -> query("SELECT * FROM connexion WHERE email = '".$email."';");
  $count = $reqVerif->rowCount(); // On compte le nombre de lignes réponse
  if ($count == 0){
      // Ajout à la table utilisateur
      $reqAjoutUtilisateur = $db -> prepare("
      INSERT INTO Utilisateur(Nom, Prenom, DN, Sexe, AdresseVoie, AdresseVille, AdresseCP, Tel)
      VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)
      ");
      $reqAjoutUtilisateur -> execute(array(
          "value1" => $nom,
          "value2" => $prenom,
          "value3" => $dn,
          "value4" => $sexe,
          "value5" => $adresse,
          "value6" => $ville,
          "value7" => $cp,
          "value8" => $tel
          ));
      $reqAjoutUtilisateur -> closeCursor();
      // On récupère l'id qui vient d'être créé
      $reqid = $db -> query("SELECT idUtilisateur
                          FROM utilisateur
                          ORDER BY idUtilisateur DESC LIMIT 1");
      $reqid -> setFetchMode(PDO::FETCH_ASSOC);
      foreach ($reqid as $ligne){
          $id = $ligne['idUtilisateur'];
      }
      // Ajout à la table connexion
      $reqAjoutConnexion = $db -> prepare("
      INSERT INTO Connexion(email, mdp, type, idUtilisateur)
      VALUES (:value1, :value2, :value3, :value4)
      ");
      $reqAjoutConnexion -> execute(array(
          "value1" => $email,
          "value2" => md5($mdp),
          "value3" => "Pilote",
          "value4" => $id
          ));
      $reqAjoutConnexion -> closeCursor();
  }
  return $count;
}
