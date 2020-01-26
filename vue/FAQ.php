<?php

if (isset($_SESSION['lang'])){
  if($_SESSION['lang'] == "en")
  include "langues/en.inc";
  else if ($_SESSION['lang'] == "fr"){
    include "langues/fr.inc";
  }
}
else{
  include "langues/fr.inc";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>MedMeasure</title>
  <link rel="stylesheet" href="css/DesignFAQ.css" />
</head>
<header>
  <div class="barre_navigation">
    <img src="images/MedMeasure.png" alt="logo de MedMeasure">
    <a href="index.php?page=user">Accueil</a>
    <a href="index.php?page=faq">FAQ</a>
    <a href="index.php?deco=deconnexion">Déconnexion</a>
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
    <strong>D'autres questions ?</strong> Contactez-nous à l'adresse suivant <strong>MedMeasure@gmail.com</strong> ou par téléphone au <strong>01 23 45 67 89</strong>
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
  </script>
</body>
</html>
