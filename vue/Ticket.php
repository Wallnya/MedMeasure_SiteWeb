<!DOCTYPE html>
<html>
<?php
if ($_SESSION["type"]=="Pilote"){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/DesignTicket.css" />
  </head>

  <header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user">Accueil</a>
    <a href="index.php?page=faq">FAQ</a>
    <a href="index.php?deco=deconnexion">Déconnexion</a>
    <button class="test">FR</button>
    <button class="test">EN</button>
  </div>
  <div class="texte">
    <img src="images/question.jpg" alt="Image pour la FAQ">
  </div>
</header>

<body>

<form method="POST" action="index.php?page=ticket">
        <textarea name="intitule" placeholder="Quel est l'objet de votre question ?"></textarea>
        <textarea name="contenu" placeholder="Merci de détailler votre question." style="height:200px"></textarea>

        <input type="submit" name="EnvoyerTicket" value="Envoyer">
</form>

</body>

</html>
<?php
}
else {
header('Location: index.php');
}
?>
