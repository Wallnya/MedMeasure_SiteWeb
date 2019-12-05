<?php
if ($_SESSION["type"]=="Administrateur"){
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <title>Page de l'administrateur</title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/css_ticket.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <header>
    <div class="barre_navigation">
      <img src="images/MedMeasure.png" alt="logo de MedMeasure">
      <a href="index.php?page=admin_user">Gestion Utilisateur</a>
      <a href="index.php?page=admin_faq">Gestion FAQ</a>
      <a href="index.php?page=admin_ticket">Gestion Tickets</a>
      <a href="index.php?deco=deconnexion">Déconnexion</a>
      <button class="test">FR</button>
      <button class="test">EN</button>
    </div>
    <div class="texte">
      <img src="images/image_admin.jpg" alt="Image pour la page admin">
    </div>
  </header>
  <body>
    <div class="container-fluid-ticket">
      <div class="rectangle-donnee-ticket">
        <div class="rectangle-ticket">
          <i class="fa fa-comment"></i>
          <?php
          while ($data = $nbTicket->fetch())
          {
          ?>
          <p> Nombre de tickets : <?= htmlspecialchars($data['nbTicket']) ?></p>
          <?php
          }
          $nbTicket->closeCursor();
          ?>
        </div>
        <div class="rectangle-ticket">
          <i class="fa fa-envelope-open"></i>
          <?php
          while ($data = $nbTicketEnCours->fetch())
          {
          ?>
          <p>Tickets en cours : <?= htmlspecialchars($data['nbTicket']) ?></p>
          <?php
          }
          $nbTicketEnCours->closeCursor();
          ?>
        </div>
        <div class="rectangle-ticket">
          <i class="fa fa-envelope"></i>
          <?php
          while ($data = $nbTicketValide->fetch())
          {
          ?>
          <p>Tickets traités: <?= htmlspecialchars($data['nbTicket']) ?> </p>
          <?php
          }
          $nbTicketValide->closeCursor();
          ?>
        </div>
      </div>
    </div>
  <p>Récapitulatif des Tickets</p>
  <div class="container-fluid">
    <center>
      <table border='1' cellpadding='5' cellpacing='9'>
        <tr class="entete">
          <td>Nom de l'utilisateur</td>
          <td>Date d'envoi</td>
          <td>Intitulé</td>
          <td>Réponse</td>
          <td>Statut</td>
        </tr>
      <?php
      while ($data = $ticket->fetch())
      {
      ?>
      <tr>
          <td>
            <?= htmlspecialchars($data['prenom']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['dateEnvoi']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['intitule']) ?>
          </td>
          <td>
            <?= htmlspecialchars($data['contenu']) ?>
          </td>
          <td>
            <form method="POST" action="index.php?page=admin_ticket">
            <select name="Statut" id="Statut">
            <?php if (strcmp (htmlspecialchars($data['statut']),"1") == 0)
            {
            ?>
                <option value="1" selected>Terminé</option>
                <option value="0" >En cours</option>
            <?php
            }
            else
            {
            ?>
                <option value="1" >Terminé</option>
                <option value="0" selected>En cours</option>
            <?php
            }
            ?>
            </select>
            <input type="hidden"  name="idTicket" value="<?= htmlspecialchars($data['idTicket']) ?>">
            <button type="submit" name="modifier"><i class="fa fa-check"></i></button>
          </form>
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
  </html>
<?php
 }
 else {
  header('Location: index.php');
 }
 ?>
