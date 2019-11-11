<?php
session_start();

if(isset($_POST['mail']) and isset($_POST['mdp'])){
  $serveur = "localhost";
  $login ="root";
  $MDP = "";

  #connexion au serveur de la base données
  $connexion = mysqli_connect($serveur,$login,$MDP)
  or die ("Connexion au serveur $serveur impossible pour $login");

  #nom de la base de données
  $bd = "medmeasure";

  #connexion à la base de données
  mysqli_select_db($connexion,$bd)
  or die ("Impossible d'accéder à la base de données");

  $Email = $_POST['mail'];
  $MotDePasse = $_POST['mdp'];
  $type = "";
  $id=0;

  $requete="Select idUtilisateur, type from connexion where email = ? and mdp = ?";
  $reqprepare = mysqli_prepare($connexion,$requete);

  mysqli_stmt_bind_param($reqprepare,'ss',$Email,$MotDePasse);

  $resultat = mysqli_stmt_execute($reqprepare);
  /* Lecture des variables résultantes */
  mysqli_stmt_bind_result($reqprepare, $id,$type);
  /* Récupération des valeurs */
  mysqli_stmt_fetch($reqprepare);

  if (isset($resultat)){
    $_SESSION['id'] = $id;
    if ($type == "Administrateur"){
      $_SESSION['type'] = "Administrateur";
      header ('Location: admin.php');
    }
    else if ($type == "Gestionnaire"){
      $_SESSION['type'] = "Gestionnaire";
      header ('Location: gestionnaire.php');
    }
    else if ($type == "Utilisateur"){
      $_SESSION['type'] = "Utilisateur";
      header ('Location: accueil.php');
    }
    //Problème dans la connexion
    else{
      header ('Location: Accueil.php');
    }
  }
  mysqli_close($connexion);
}
?>
