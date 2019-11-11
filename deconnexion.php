<?php
    session_start();
    if(isset($_SESSION["id"])){
        unset($_SESSION["id"]);
        session_destroy();
    }
    if(isset($_SESSION["type"])){
        unset($_SESSION["type"]);
        session_destroy();
    }
    header('location: Accueil.php');
?>
