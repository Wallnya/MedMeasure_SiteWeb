<?php 

    include('include/connexion.php'); 

    if (isset($_POST["boutonInscription"]))
    {
        $reqAjoutConnexion = $db -> prepare("
        INSERT INTO Connexion(email, mdp, type, idUtilisateur)
        VALUES (:value1, :value2, :value3, :value4)
        ");
            
        $reqAjoutConnexion -> execute(array(
            "value1" => $_POST['email'],
            "value2" => $_POST['mdp'],
            "value3" => "Pilote",
            "value4" => 1
            ));

        $reqAjoutConnexion -> closeCursor();	
            
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/inscription.css">
        <title>Inscription</title>
    </head>
    <body>
        <header>
            Inscription
        </header>

       

        <form method=post action=#>
            <?php
                print_r($_POST);
            ?>
            <div class="section">
                <h3>Informations de connexion</h3>
                <div>
                    <label for="mail">Email</label>
                    <input type="email" name="email" id="mail"/>
                </div>
                <div>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp"/>
                </div>
                <div>
                    <label for="mdp2">Confirmer le mot de passe</label>
                    <input type="password" name="mdp2" id="mdp2"/>
                </div>
            </div>

            <div class="section">
                <h3>Informations personnelles</h3>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" />
                </div>
                <div>
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom"/>
                </div>
                <div>
                    <label>Sexe</label>
                    <div class="checkbox">
                        <input type="radio" name="sexe" id="sexeH" value="H"/>
                        <label for="sexeH">Homme</label>
                        <input type="radio" name="sexe" id="sexeF" value="F"/>
                        <label for="sexeF">Femme</label>
                    </div>
                </div>
                <div>
                    <label for="DN">Date de naissance</label>
                    <input type="date" name="DN" id="DN"/>
                </div>
            
                
                <div>
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" id="adresse" />
                </div>
                <div>
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" id="ville" />
                </div>
                <div>
                    <label for="cp">Code postal</label>
                    <input type="text" name="cp" id="cp" />
                </div>
                
                <div>
                    <label for="tel">Téléphone</label>
                    <input type="text" name="tel" id="tel" />
                </div>
            </div>    

            <div class="checkbox_cgu">
                <input type="checkbox" name="cgu" id="cgu" value="cgu"/>
                <label for="cgu">J'ai lu et j'accepte les conditions générales d'utilisation</label>
            </div>

            <div>
                <button type="submit" name="boutonInscription">S'inscrire</button>
            </div>	
        </form>

   

    </body>
</html>

