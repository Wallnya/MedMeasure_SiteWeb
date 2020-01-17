<!DOCTYPE html>
<html>
<?php
if ($_SESSION["type"]=="Pilote"){
  if (isset($_SESSION['lang'])){
    if($_SESSION['lang'] == "en")
        include "langues/en.inc";
    else if ($_SESSION['lang'] == "fr"){
      include "langues/fr.inc";
    }
  }
  else{
    include "langues/en.inc";
  }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>MedMeasure</title>
    <link rel="stylesheet" href="css/css_ticket.css" />
    <script type="text/javascript" src="js/deconnexionFacebook.js"></script>

  </head>

  <header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user"><?php echo _ACCUEIL?></a>
    <a href="index.php?page=faq"><?php echo _BOUTONSFAQ?></a>
    <a style="cursor:pointer" onclick="deconnexionFB();"><?php echo _DECONNEXION?></a>
    <button class="test">FR</button>
    <button class="test">EN</button>
  </div>
  <div class="texte">
    <img src="images/question.jpg" alt="Image pour la FAQ">
  </div>
</header>

<body>

<form method="POST" action="index.php?page=ticket">
        <textarea name="intitule" placeholder="<?php echo _QUESTIONOBJECT?>"></textarea>
        <textarea name="contenu" placeholder="<?php echo _DETAILQUESTION?>" style="height:200px"></textarea>

        <input type="submit" name="EnvoyerTicket" value="<?php echo _ENVOYER?>">
</form>

</body>
<script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
<?php
}
else {
header('Location: index.php');
}
?>
