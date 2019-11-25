<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8" />
          <title>MedMeasure</title>
          <link rel="stylesheet" href="DesignMenu.css" />
     </head>

        <header>

                <div class="barre_navigation">
                  <img src="MedMeasure.png" alt="logo de MedMeasure">
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
                                <div class="Profil">


                                        <?php
                                         $serveur = "localhost";
                                         $login ="root";
                                         $MDP = "";
                                         
                                         #connexion au serveur de la base données
                                         $connexion = mysqli_connect($serveur,$login,$MDP)
                                         or die ("Connexion au serveur $serveur impossible pour $login");
                                         
                                         #nom de la base de données
                                         $bd = "medmeasure";
                                         
                                         #connexion à la base de données
                                         mysqli_select_db($connexion,$bd)
                                         or die ("Impossible d'accéder à la base de données");
                                         
                                         $requete="SELECT nom, prenom FROM utilisateur WHERE idUtilisateur=1";
                                         
                                         $NomPrenom = mysqli_query($connexion,$requete);
                                         $ligne = mysqli_fetch_row($NomPrenom);

                                         echo $ligne[0];
                                         echo " ";
                                         echo $ligne[1];


                                         mysqli_close($connexion);
                                        ?>
                                            <form action="">
                                                    <button type="submit" class="btnProfil">
                                        
                                                        <div class="ModificationProfil">
                                                            Modifier le profil
                                                        </div>
                    
                                                    </button>
                                            </form>

                                </div>

                                <form action="Page Test.html">
                                        <button type="submit" class="btnTest">
                            
                                            <div class="Test">
                                                Test
                                            </div>
        
                                        </button>
                                </form>


                            <form action="">
                                <button type="submit" class="btnRésultats">
                    
                                    <div class="Resultat">
                                        Dernier résultat
                                    </div>

                                </button>
                            </form>

                            <form action="">
                                <button type="submit" class="btnRésultats">
                    
                                    <div class="Resultat">
                                        Historique des résultats    
                                    </div>

                                </button>
                            </form>

                        </body>

        <footer>

            <a href="PageFAQ.html">FAQ</a> - Support - MedMeasure@gmail.com - Contact : 01 23 45 67 89

        </footer>
</html>