<?php
if ($_SESSION["type"]=="Administrateur"){
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/css_adminfaq.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=admin_user">Gestion Utilisateur</a>
      <a href="index.php?page=admin_faq">Gestion FAQ</a>
      <a href="index.php?page=admin_ticket">Gestion Tickets</a>
      <a href="index.php?deco=deconnexion">Deconnexion</a>
    </div>
    <div class="texte">
      <img src="images/image_admin.jpg" alt="Image pour la page admin">
    </div>
  </header>
  <body>
  <p>Récapitulatif des questions de la FAQ</p>

  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td>Numéro question</td>
        <td>Intitulé</td>
        <td>Reponse</td>
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

  <p>Création d'une nouvelle question</p>
  <center>
    <form method="POST" action="index.php?page=admin_faq">
      <fieldset>
          <legend>Formulaire de la création d'une question</legend>
            <label for="question">Intitulé de la question</label>
            <textarea name="question"></textarea>
            <label for="reponse">Reponse de la question</label>
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
