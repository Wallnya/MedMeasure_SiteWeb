<?php
  $serveur = "localhost";
  $login = "root";
  $mdp = "";
  $connexion = mysqli_connect($serveur,$login,$mdp)
  or die ("Connexion au serveur $serveur impossible pour $login");
  $bd = "medmeasure";
  mysqli_select_db($connexion,$bd)
  or die ("Impossible d'accéder à la base de données");



  $id = $_POST['idUtilisateur'];
  if (isset($_POST['modifier'])){
    $requpdate = "UPDATE Connexion SET Type = ? WHERE idUtilisateur = ".$id;
    $reqprepare = mysqli_prepare($connexion,$requpdate);

    $type = $_POST['Type'];
    mysqli_stmt_bind_param($reqprepare,'s', $type);
    mysqli_stmt_execute($reqprepare);
  }


  if (isset($_POST['supprimer'])){
    $query = "DELETE FROM connexion WHERE idUtilisateur = ".$id;

    $stmt1 = mysqli_prepare($connexion, $query);
    if ( !$stmt1 ) {
      die('mysqli error: '.mysqli_error($connexion));
    }
    mysqli_stmt_bind_param($stmt1, 'ss',$id,$numero_test);
    if ( !mysqli_execute($stmt1) ) {
      die( 'stmt error: '.mysqli_stmt_error($stmt1) );
    }

    $query = "DELETE FROM testpartiel WHERE idUtilisateur = ".$id;
    $stmt1 = mysqli_prepare($connexion, $query);
    if ( !$stmt1 ) {
      die('mysqli error: '.mysqli_error($connexion));
    }
    mysqli_stmt_bind_param($stmt1, 'ss',$id,$numero_test);
    if ( !mysqli_execute($stmt1) ) {
      die( 'stmt error: '.mysqli_stmt_error($stmt1) );

    $query = "DELETE FROM utilisateur WHERE idUtilisateur = ".$id;
    $stmt1 = mysqli_prepare($connexion, $query);
    if ( !$stmt1 ) {
      die('mysqli error: '.mysqli_error($connexion));
    }
    mysqli_stmt_bind_param($stmt1, 'ss',$id,$numero_test);
    if ( !mysqli_execute($stmt1) ) {
      die( 'stmt error: '.mysqli_stmt_error($stmt1) );
    }
  }
}


$idFAQ = $_POST['idFAQ'];

if (isset($_POST['supprimerFAQ'])){
  $query = "DELETE FROM FAQ WHERE idFAQ = ".$idFAQ;

  $stmt1 = mysqli_prepare($connexion, $query);
  if ( !$stmt1 ) {
    die('mysqli error: '.mysqli_error($connexion));
  }
  mysqli_stmt_bind_param($stmt1, 's',$idFAQ);
  if ( !mysqli_execute($stmt1) ) {
    die( 'stmt error: '.mysqli_stmt_error($stmt1) );
  }
}



if (isset($_POST['modifierFAQ'])){
  echo "test";
  echo $idFAQ;
  $requpdate = "UPDATE FAQ SET reponse = ? WHERE idFAQ = ".$idFAQ;
  $reqprepare = mysqli_prepare($connexion,$requpdate);

  $contenu = $_POST['message'];
  echo $contenu;
  mysqli_stmt_bind_param($reqprepare,'s', $contenu);
  mysqli_stmt_execute($reqprepare);
}


  mysqli_close($connexion);
  header ('Location: admin.php');
?>
