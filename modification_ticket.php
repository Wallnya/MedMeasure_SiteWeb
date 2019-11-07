<?php
$serveur = "localhost";
$login = "root";
$mdp = "";
$connexion = mysqli_connect($serveur,$login,$mdp)
or die ("Connexion au serveur $serveur impossible pour $login");
$bd = "medmeasure";
mysqli_select_db($connexion,$bd)
or die ("Impossible d'accéder à la base de données");

$idTicket = $_POST['idTicket'];
$statut = $_POST['Statut'];
$requpdate = "UPDATE Ticket SET statut = ? WHERE idTicket = ".$idTicket;

$reqprepare = mysqli_prepare($connexion,$requpdate);
mysqli_stmt_bind_param($reqprepare,'s', $statut);
mysqli_stmt_execute($reqprepare);

mysqli_close($connexion);
header ('Location: admin_ticket.php');
?>
