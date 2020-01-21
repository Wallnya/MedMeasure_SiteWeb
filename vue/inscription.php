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
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/inscription.css">
        <title><?php echo _INSCRIPTION?></title>
    </head>
    <body>
        <form method="POST" action="index.php?page=inscription" id="formInscription">
          <div class="formulaire-login">
            <div class="formulaire">
              <div class="section">
                <img class ="logo" src="images/MedMeasureLogo.png" alt="Logo" />
                  <h3><?php echo _INFOCONNEXION?></h3>
                  <div>
                      <label for="test"><?php echo _INSCRIPTIONTITLE , _GESTIONNAIRE?></label>
                      <input type='checkbox' name='case' value='on'>
                  </div>
                  <div>
                      <label for="email"><?php echo _EMAIL?></label>
                      <input type="email" name="email" id="email" required/>
                  </div>
                  <div>
                      <label for="mdp"><?php echo _MOTDEPASSE?></label>
                      <input type="password" name="mdp" id="mdp" minlength="8" maxlength="20" required/>
                  </div>
                  <div>
                      <label for="mdp2"><?php echo _CONFIRMEMDP?></label>
                      <input type="password" name="mdp2" id="mdp2" minlength="8" maxlength="20" required/>
                  </div>
              </div>

              <div class="section">
                  <h3><?php echo _INFOPERSO?></h3>
                  <div>
                      <label for="nom"><?php echo _NOM?></label>
                      <input type="text" name="nom" id="nom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
                  </div>
                  <div>
                      <label for="prenom"><?php echo _PRENOM?></label>
                      <input type="text" name="prenom" id="prenom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
                  </div>

                  <div>
                      <label><?php echo _SEXE?></label>
                      <select name="sexe" id="sexe">
                        <option value="Homme" ><?php echo _HOMME?></option>
                        <option value="Femme" ><?php echo _FEMME?></option>
                      </select>
                  </div>
                  <div>
                      <label for="dn"><?php echo _DATENAISSANCE?></label>
                      <input type="date" name="dn" id="dn" required/>
                  </div>
                  <div>
                      <label for="adresse"><?php echo _ADRESSE?></label>
                      <input type="text" name="adresse" id="adresse" required />
                  </div>
                  <div>
                      <label for="ville"><?php echo _VILLE?></label>
                      <input type="text" name="ville" id="ville" pattern="[a-zA-ZÀ-ÿ -]+" required />
                  </div>
                  <div>
                      <label for="cp"><?php echo _CODEPOSTAL?></label>
                      <input type="text" name="cp" id="cp" pattern="[0-9]{5}" size="5" required/>
                  </div>

                  <div>
                      <label for="tel"><?php echo _TELEPHONE?></label>
                      <input type="tel" name="tel" id="tel" pattern="[0-9]{10}" required/>
                  </div>
              </div>

              <div class="checkbox_cgu">
                  <label for="cgu"><?php echo _LUETACCEPTE?> <a href="index.php?page=cgu"><?php echo _CONDITIONS?></a></label>
                  <input type="checkbox" name="cgu" id="cgu" value="cgu" required/>
              </div>

              <div>
                  <button type="submit" name="boutonInscription" id="boutonInscription"><?php echo _INSCRIPTION?></button>
              </div>
            </div>
          </div>
        </form>
        <script type="text/javascript" src="js/inscription.js"></script>
    </body>
</html>
