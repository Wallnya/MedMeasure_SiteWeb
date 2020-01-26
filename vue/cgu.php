<?php
if (isset($_SESSION['lang'])) {
  if ($_SESSION['lang'] == "en")
    include "langues/en.inc";
  else if ($_SESSION['lang'] == "fr") {
    include "langues/fr.inc";
  }
} else {
  include "langues/en.inc";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/css_cgu.css">
  <title><?php echo _CGU ?></title>
</head>

<body>
  <div class="formulaire-CGU">
    <div class="formulaire">
      <div>
        <label for="email"><?php echo _ARTICLE1TITLE ?></label>
        <br>
        <p><?php echo _ARTICLE1 ?>
        </p>
      </div>
      <div>
        <label for="email"><?php echo _ARTICLE2TITLE ?></label>
        <br>
        <p><?php echo _ARTICLE2 ?></p>
      </div>
      <div>
        <label for="email"><?php echo _ARTICLE3TITLE ?></label>
        <br>
        <p><?php echo _ARTICLE31 ?><br><br>
          <?php echo _ARTICLE32 ?><br>
          <?php echo _ARTICLE33 ?><br>
          <?php echo _ARTICLE34 ?><br><br>


          <?php echo _ARTICLE35 ?></p>
      </div>
      <div>
        <label for="email"><?php echo _ARTICLE4TITLE ?></label>
        <br>
        <p><?php echo _ARTICLE41 ?>
          <br><br><?php echo _ARTICLE42 ?><br><br>
          <?php echo _ARTICLE43 ?>

          <br><br><?php echo _ARTICLE44 ?></p>
      </div>
      <div>
        <div>
          <label for="email"><?php echo _ARTICLE5TITLE ?></label>
          <br>
          <p><?php echo _ARTICLE51 ?>
            <br>
            <br>
            <?php echo _ARTICLE52 ?></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
