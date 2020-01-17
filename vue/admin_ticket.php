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
<html>
<meta charset="utf-8">
  <title><?php echo _ADMIN; ?></title>
  <link rel="stylesheet" href="css/css_admin.css">
  <link rel="stylesheet" href="css/css_ticket.css">
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
          <p> <?php echo _NBTICKETS; ?> <?= htmlspecialchars($data['nbTicket']) ?></p>
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
          <p><?php echo _TICKETSENCOURS; ?> <?= htmlspecialchars($data['nbTicket']) ?></p>
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
          <p><?php echo _TICKETSTRAITES; ?> <?= htmlspecialchars($data['nbTicket']) ?> </p>
          <?php
          }
          $nbTicketValide->closeCursor();
          ?>
        </div>
      </div>
    </div>
  <p><?php echo _RECAPTICKETS; ?></p>
  <div class="container-fluid">
    <center>
      <table border='1' cellpadding='5' cellpacing='9'>
        <tr class="entete">
          <td><?php echo _NOMUTILISATEUR; ?></td>
          <td><?php echo _DATETICKET; ?></td>
          <td><?php echo _INTITULE; ?></td>
          <td class="test"><?php echo _REPONSE; ?></td>
          <td><?php echo _STATUT; ?></td>
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
            <select class="Statut" name="Statut" id="Statut">
            <?php if (strcmp (htmlspecialchars($data['statut']),"1") == 0)
            {
            ?>
                <option value="1" selected><?php echo _TERMINE; ?></option>
                <option value="0" ><?php echo _ENCOURS; ?></option>
            <?php
            }
            else
            {
            ?>
                <option value="1" ><?php echo _TERMINE; ?></option>
                <option value="0" selected><?php echo _ENCOURS; ?></option>
            <?php
            }
            ?>
            </select>
            <input type="hidden"  name="idTicket" value="<?= htmlspecialchars($data['idTicket']) ?>">
            <button class="check" type="submit" name="modifier"><i class="fa fa-check"></i></button>
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
