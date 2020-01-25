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
    <link rel="stylesheet" href="css/css_ticketUser.css" />
    <script type="text/javascript" src="js/deconnexionFacebook.js"></script>

  </head>

  <header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user"><?php echo _ACCUEIL?></a>
    <a href="index.php?page=faq"><?php echo _BOUTONSFAQ?></a>
    <a style="cursor:pointer" onclick="deconnexionFB();"><?php echo _DECONNEXION?></a>
    <form method="POST" action="index.php?page=user">
      <button type="submit" class="test" name="FR">FR</button>
      <button type="submit" class="test" name="EN">EN</button>
    </form>
  </div>
  <div class="texte">
    <img src="images/question.jpg" alt="Image pour la FAQ">
  </div>
</header>

<body>

<form class="formulaireTicket" method="POST" action="index.php?page=ticket">
        <textarea name="intitule" placeholder="<?php echo _QUESTIONOBJECT?>"></textarea>
        <textarea name="contenu" placeholder="<?php echo _DETAILQUESTION?>" style="height:200px"></textarea>

        <input type="submit" name="EnvoyerTicket" value="<?php echo _ENVOYER?>">
</form>


  <div class="container-fluid">
  <p><?php echo _RECAPTICKETS; ?></p>
    <center>
      <table cellpadding='10' cellpacing='9'>
        <tr class="entete">
          <td><?php echo _DATETICKET; ?></td>
          <td><?php echo _INTITULE; ?></td>
          <td class="test"><?php echo _CONTENU; ?></td>
        </tr>
      <?php
      while ($data = $ticket->fetch())
      {
      ?>
      <tr>
          <td>
            <?= htmlspecialchars($data['dateEnvoi']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['intitule']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['contenu']) ?>
          </td>
      </tr>
      <?php
      }
      $ticket->closeCursor();
      ?>
      </table>
    </center>
  </div>
        


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
