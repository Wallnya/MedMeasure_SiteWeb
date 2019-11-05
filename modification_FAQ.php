<?php
$serveur = "localhost";
$login = "root";
$mdp = "";
$connexion = mysqli_connect($serveur,$login,$mdp)
or die ("Connexion au serveur $serveur impossible pour $login");
$bd = "medmeasure";
mysqli_select_db($connexion,$bd)
or die ("Impossible d'accéder à la base de données");

$idFAQ = $_POST['idFAQ'];
if (isset($_POST['modifierFAQ'])){
  $requpdate = "UPDATE faq SET reponse = ? WHERE idFAQ = ".$idFAQ;
  $reqprepare = mysqli_prepare($connexion,$requpdate);

  $contenu = $_POST['message'];
  mysqli_stmt_bind_param($reqprepare,'s', $contenu);
  mysqli_stmt_execute($reqprepare);
}


if (isset($_POST['supprimerFAQ'])){
  $query = "DELETE FROM faq WHERE idFAQ = ".$idFAQ;

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
mysqli_close($connexion);
//header ('Location: admin_faq.php');
?>
