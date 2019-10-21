<?php
  	$id=$_GET['id'];
    $numero_test=$_GET['numero_test'];
    echo $id;
    echo $numero_test;
    $connexion = mysqli_connect("localhost","root","")
    or die ("Tu es nul. Recommence.");

    $bd="medmeasure";

    mysqli_select_db($connexion,$bd)
    or die ("Toujours pas.");

    $query = "DELETE FROM testpartiel WHERE idUtilisateur = ? and numero_test = ?";
    $stmt1 = mysqli_prepare($connexion, $query);
    if ( !$stmt1 ) {
      die('mysqli error: '.mysqli_error($connexion));
    }
    mysqli_stmt_bind_param($stmt1, 'ss',$id,$numero_test);
    if ( !mysqli_execute($stmt1) ) {
      die( 'stmt error: '.mysqli_stmt_error($stmt1) );
    }

    mysqli_close($connexion);
    header('Location: admin.php');
?>
