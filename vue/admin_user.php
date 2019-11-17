<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="admin.php">Gestion Utilisateur</a>
      <a href="admin_faq.php">Gestion FAQ</a>
      <a href="admin_ticket.php">Gestion Tickets</a>
      <a href="deconnexion.php">Deconnexion</a>
    </div>
    <div class="texte">
      <img src="images/image_admin.jpg" alt="Image pour la page admin">
    </div>
  </header>
  <body>
  <p>Récapitulatif des données générales</p>
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td>Nom</td>
        <td>Prenom</td>
        <td>Date de Naissance</td>
        <td>Sexe</td>
        <td>Adresse</td>
        <td>Ville</td>
        <td>Code Postal</td>
        <td>Téléphone</td>
      </tr>
      <?php
      while ($data = $user->fetch())
      {
      ?>
      <tr>
        <td>
          <?= htmlspecialchars($data['nom']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['prenom']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['DN']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['Sexe']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['AdresseVoie']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['AdresseVille']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['AdresseCP']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data['Tel']) ?>
        </td>
      </tr>
      <?php
      }
      $user->closeCursor();
      ?>
    </table>
  </center>

  <p>Gestion des utilisateurs</p>
  <center>
    <table border='1' cellpadding='5' cellpacing='9'>
      <tr class="entete">
        <td>Email</td>
        <td>Mot de passe</td>
        <td>Type</td>
      </tr>
      <?php ob_start(); ?>
    <?php
    while ($data2 = $dataconnexion->fetch())
    {
    ?>
    <tr>
        <td>
          <?= htmlspecialchars($data2['email']) ?>
        </td>
        <td>
          <?= htmlspecialchars($data2['mdp']) ?>
        </td>
        <td>
          <form method="POST" action="index.php">
          <select name="Type" id="Type">
          <?php if (strcmp (htmlspecialchars($data2['type']),"Administrateur") == 0)
          {
          ?>
              <option value="Administrateur" selected>Administrateur</option>
              <option value="Gestionnaire" >Gestionnaire</option>
              <option value="Pilote">Pilote</option>
          <?php
          }
          else if (strcmp (htmlspecialchars($data2['type']),"Gestionnaire") == 0)
          {
          ?>
              <option value="Administrateur" >Administrateur</option>
              <option value="Gestionnaire" selected>Gestionnaire</option>
              <option value="Pilote">Pilote</option>
          <?php
          }
          else
          {
          ?>
              <option value="Administrateur" >Administrateur</option>
              <option value="Gestionnaire" >Gestionnaire</option>
              <option value="Pilote" selected>Pilote</option>
          <?php
          }
          ?>
          </select>
          <input type="hidden"  name="idUtilisateur" value="<?= htmlspecialchars($data2['idUtilisateur']) ?>">
          <button type="submit"  onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')" name="supprimer"><i class="fa fa-trash"></i></button>
          <button type="submit" name="modifier"><i class="fa fa-check"></i></button>
        </td>
      </form>
    </tr>
    <?php
    }
    $dataconnexion->closeCursor();
    ?>
    </table>
  </center>
  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>
</body>
</html>
