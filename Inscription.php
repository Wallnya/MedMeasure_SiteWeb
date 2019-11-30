<?php 

    include('include/connexion.php'); 

    /* Quand formulaire validé, on ajoute :
        - L'utilisateur dans la table utilisateur
        - Les identifiants de l'utilisateur dans la table connexion */

    if (isset($_POST["boutonInscription"]))
    {

        // On regarde si l'email est déjà utilisée
        $reqVerif = $db -> query("SELECT * FROM connexion WHERE Email = '".$_POST['email']."';");
        $count = $reqVerif->rowCount(); // On compte le nombre de lignes réponse
       
        if ($count == 0){

            // Ajout à la table utilisateur
            $reqAjoutUtilisateur = $db -> prepare("
            INSERT INTO Utilisateur(Nom, Prenom, DN, Sexe, AdresseVoie, AdresseVille, AdresseCP, Tel)
            VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)
            ");
                
            $reqAjoutUtilisateur -> execute(array(
                "value1" => $_POST['nom'],
                "value2" => $_POST['prenom'],
                "value3" => $_POST['dn'],
                "value4" => $_POST['sexe'],
                "value5" => $_POST['adresse'],
                "value6" => $_POST['ville'],
                "value7" => $_POST['cp'],
                "value8" => $_POST['tel']
                ));

            $reqAjoutUtilisateur -> closeCursor();

            // On récupère l'id qui vient d'être créé
            $reqid = $db -> query("SELECT idUtilisateur 
                                FROM utilisateur
                                ORDER BY idUtilisateur DESC LIMIT 1");
            $reqid -> setFetchMode(PDO::FETCH_ASSOC);

            foreach ($reqid as $ligne){ 
                $id = $ligne['idUtilisateur'];
            }

            
            // Ajout à la table connexion
            $reqAjoutConnexion = $db -> prepare("
            INSERT INTO Connexion(email, mdp, type, idUtilisateur)
            VALUES (:value1, :value2, :value3, :value4)
            ");
                
            $reqAjoutConnexion -> execute(array(
                "value1" => $_POST['email'],
                "value2" => md5($_POST['mdp']),
                "value3" => "Pilote",
                "value4" => $id
                ));

            $reqAjoutConnexion -> closeCursor();


        } else {
            echo "Cette adresse email est déjà utilisée.";
        }  
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


        <form method=post action=# id="formInscription">

            <div class="section">
                <h3>Informations de connexion</h3>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required/>
                </div>
                <div>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" minlength="8" maxlength="20" value="azeazeaze" required/>
                </div>
                <div>
                    <label for="mdp2">Confirmer le mot de passe</label>
                    <input type="password" name="mdp2" id="mdp2" minlength="8" maxlength="20" value="azeazeaze" required/>
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
                    <div class="checkbox" id="sexe">
                        <input type="radio" name="sexe" id="sexeH" value="H" required/>
                        <label for="sexeH">Homme</label>
                        <input type="radio" name="sexe" id="sexeF" value="F" required/>
                        <label for="sexeF">Femme</label>
                    </div>
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
                <input type="checkbox" name="cgu" id="cgu" value="cgu" required/>
                <label for="cgu">J'ai lu et j'accepte les <a href="">conditions générales d'utilisation</a></label>
            </div>

            <div>
                <button type="submit" name="boutonInscription" id="boutonInscription">S'inscrire</button>
            </div>	
        </form>

   
        <script type="text/javascript" src="js/inscription.js"></script>
    </body>
</html>

