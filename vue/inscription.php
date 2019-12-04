<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/inscription.css">
        <title>Inscription</title>
    </head>
    <body>
        <form method="POST" action="index.php?page=inscription" id="formInscription">
          <div class="formulaire-login">
            <div class="formulaire">
              <div class="section">
                <img class ="logo" src="images/MedMeasureLogo.png" alt="Logo" />
                  <h3>Informations de connexion</h3>
                  <div>
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" required/>
                  </div>
                  <div>
                      <label for="mdp">Mot de passe</label>
                      <input type="password" name="mdp" id="mdp" minlength="8" maxlength="20" required/>
                  </div>
                  <div>
                      <label for="mdp2">Confirmer le mot de passe</label>
                      <input type="password" name="mdp2" id="mdp2" minlength="8" maxlength="20" required/>
                  </div>
              </div>

              <div class="section">
                  <h3>Informations personnelles</h3>
                  <div>
                      <label for="nom">Nom</label>
                      <input type="text" name="nom" id="nom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
                  </div>
                  <div>
                      <label for="prenom">Prénom</label>
                      <input type="text" name="prenom" id="prenom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
                  </div>

                  <div>
                      <label>Sexe</label>
                      <select name="sexe" id="sexe">
                        <option value="Homme" >Homme</option>
                        <option value="Femme" >Femme</option>
                      </select>
                  </div>
                  <div>
                      <label for="dn">Date de naissance</label>
                      <input type="date" name="dn" id="dn" required/>
                  </div>
                  <div>
                      <label for="adresse">Adresse</label>
                      <input type="text" name="adresse" id="adresse" required />
                  </div>
                  <div>
                      <label for="ville">Ville</label>
                      <input type="text" name="ville" id="ville" pattern="[a-zA-ZÀ-ÿ -]+" required />
                  </div>
                  <div>
                      <label for="cp">Code postal</label>
                      <input type="text" name="cp" id="cp" pattern="[0-9]{5}" size="5" required/>
                  </div>

                  <div>
                      <label for="tel">Téléphone</label>
                      <input type="tel" name="tel" id="tel" pattern="[0-9]{10}" required/>
                  </div>
              </div>

              <div class="checkbox_cgu">
                  <label for="cgu">J'ai lu et j'accepte les <a href="index.php?page=cgu">conditions générales d'utilisation</a></label>
                  <input type="checkbox" name="cgu" id="cgu" value="cgu" required/>
              </div>

              <div>
                  <button type="submit" name="boutonInscription" id="boutonInscription">S'inscrire</button>
              </div>
            </div>
          </div>
        </form>
        <script type="text/javascript" src="js/inscription.js"></script>
    </body>
</html>
