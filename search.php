<?php
  $serveur = "localhost";
  $login = "root";
  $mdp = "";

  #connexion au serveur de la base de données
  $connexion = mysqli_connect($serveur,$login,$mdp)
  or die ("Connexion au serveur $serveur impossible pour $login");

  #nom de la base de données
  $bd = "medmeasure";

  #connexion à la base de données
  mysqli_select_db($connexion,$bd)
  or die ("Impossible d'accéder à la base de données");

  $output = '';
  if (isset($_GET['search']) && !empty($_GET['search']) && $_GET['search'] !== ' ') {
    $search = $_GET['search'];
    $query = mysqli_query($connexion, "SELECT * FROM Utilisateur WHERE Nom LIKE '%$search%' OR Prenom LIKE '%$search%'") or die(mysqli_error());
    $result = mysqli_num_rows($query);
    if ($result == 0) {
      $output = 'Pas de résultat pour <b>"'.$search.'"</b>';
    }
    else {
      while ($row = mysqli_fetch_array($query)) {
        $prenom = $row['Prenom'];
        $nom = $row['Nom'];

        $output = $prenom.$nom;
      }
    }
  }
  else {
    header('Location: gestionnaire.php');
  }
  print($output);
  ?>