<?php
if ($_SESSION["type"]=="Administrateur"){
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
<html lang="fr">
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/css_adminfaq.css">
  <link rel="stylesheet" href="css/header1.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/deconnexionFacebook.js"></script>

  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=admin_user"><?php echo _UTILISATEURS; ?></a>
      <a href="index.php?page=admin_faq"><?php echo _FAQ; ?></a>
      <a href="index.php?page=admin_ticket"><?php echo _TICKETS; ?></a>
      <a style="cursor:pointer" onclick="deconnexionFB();"><?php echo _DECONNEXION; ?></a>
      <form method="POST" action="index.php?page=admin_faq">
        <button type="submit" class="test" name="FR">FR</button>
        <button type="submit" class="test" name="EN">EN</button>
      </form>
    </div>
    <div class="texte">
      <img src="images/image_admin.jpg" alt="Image pour la page admin">
    </div>
  </header>
  <body>
  <p><?php echo _QUESTIONS; ?></p>
  <div class="container-fluid">
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td><?php echo _NUMBERQUESTION; ?></td>
        <td><?php echo _INTITULE; ?></td>
        <td><?php echo _REPONSE; ?></td>
      </tr>
    <?php
    while ($data2 = $faq->fetch())
    {
    ?>
    <tr>
        <td>
          <?= htmlspecialchars($data2['idFAQ']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data2['intitule']) ?>
        </td>
        <td>
          <form method="POST" action="index.php?page=admin_faq">
            <input type="text" name="message" value="<?= htmlspecialchars($data2['reponse']) ?>">
            <input type="hidden"  name="idFAQ" value="<?= htmlspecialchars($data2['idFAQ']) ?>">
            <button type="submit"  onClick="return confirm('Êtes-vous sûr de vouloir supprimer ce message?')" name="supprimer"><i class="fa fa-trash"></i></button>
            <button type="submit" name="modifier"><i class="fa fa-check"></i></button>
          </form>
        </td>
    </tr>
    <?php
    }
    $faq->closeCursor();
    ?>
    </table>
  </center>
</div>

  <p><?php echo _NOUVELLEQUESTION; ?></p>
  <center>
    <form class="formulaireFAQ" method="POST" action="index.php?page=admin_faq">
      <fieldset>
          <legend><?php echo _FORMNOUVELLEQUESTION; ?></legend>
            <label for="question"><?php echo _INTITULENOUVELLEQUESTION; ?></label>
            <textarea name="question"></textarea>
            <label for="reponse"><?php echo _REPONSENOUVELLEQUESTION; ?></label>
            <textarea name="reponse"></textarea>
            <br>
            <button type="submit" name="enregistrerFAQ"><i class="fa fa-save"></i></button>
        </fieldset>
    </form>
  </center>
</body>
</html>
<?php
 }
 else {
  header('Location: index.php');
 }
 ?>
