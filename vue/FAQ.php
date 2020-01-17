<?php

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
  <link rel="stylesheet" href="css/DesignFAQ.css" />
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
  <?php
  while ($data2 = $faq->fetch())
  {
    ?>
    <button type="button" class="collapsible"><?= htmlspecialchars($data2['intitule']) ?></button>
    <div class="content">
      <p><?= htmlspecialchars($data2['reponse']) ?></p>
    </div>
    <?php
  }
  $faq->closeCursor();
  ?>
  <div class="contact">
    <strong><?php echo _AUTRESQUESTIONS?></strong> <?php echo _CONTACTMAIL?> <strong><?php echo _MAILMEDMEASURE?></strong> <?php echo _CONTACTTEL?> <strong><?php echo _TELMEDMEASURE?></strong>
  </div>

  <script>
  var coll = document.getElementsByClassName("collapsible");
  var i;
  for (i = 0; i < coll.length; i++)
  {
    coll[i].addEventListener("click", function()
    {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight)
      {
        content.style.maxHeight = null;
      }
      else
      {
        content.style.maxHeight = content.scrollHeight + "px";
      }
    });
  }

  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
  </script>
</body>
</html>
