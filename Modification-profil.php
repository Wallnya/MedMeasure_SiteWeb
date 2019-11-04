<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <title>Profil</title>
	</head>

	<body>
		<header>
			<center>Profil</center>
			<div class="boutonaccueil" ><button>Accueil</button></div>
			<div class="logo">
				<img src="images/logo-medmeasure.png" alt="image">
			</div>
		</header>
		<div class="Infos">
			<b><center>Informations personnelles</center></b>
		</div>


		<form action='modification.php' method='POST'>

		<?php
		$serveur = "localhost";
		$login = "root";
		$mdp = "";
		
		#connexion au serveur de la base de données
		$connexion = mysqli_connect($serveur,$login,$mdp)
		or die ("Connexion au serveur $serveur impossible pour $login");
		
		#nom de la base de données
		$bd = "medmeasure";
		
		#connexion à la base de données
		mysqli_select_db($connexion,$bd)
		or die ("Impossible d'accéder à la base de données");
		
		$requete = "SELECT * FROM Utilisateur WHERE idUtilisateur = 1";
		$resultat = mysqli_query($connexion,$requete);

		$ligne = mysqli_fetch_row($resultat);

		

		echo "<div method=\"POST\" action=\"upload.php\" enctype=\"multipart/form-data\">
		<center>Télécharger une nouvelle image:
		<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"250000\">
		<input type=\"file\" name=\"image\" id=\"image\">
		</center>";
		

	

		echo "<hr size=\"1\" width=\"50%\" color=\"gainsboro\">";

		echo "<label for=\"Prenom\">Prénom:</label>
		<input type=\"text\" id=\"Prenom\" name=\"Prenom\" required minlength=\"1\" size=\"20\" value=\"".$ligne[2]."\">";

		echo "<hr size=\"1\" width=\"50%\" color=\"gainsboro\">
		<br>";

		echo "<div>
		<label for=\"Nom\">Nom:</label>
		<input type=\"text\" id=\"Nom\" name=\"Nom\" required minlength=\"1\" size=\"20\" value=\"".$ligne[1]."\">
		</div>";

		echo "<hr size=\"1\" width=\"50%\" color=\"gainsboro\">";
		if ($ligne[4]=='Femme') {
			echo "<label for=\"Sexe\">Sexe</label>
			<select name=\"Sexe\" id=\"Sexe\">
				<option value=\"Femme\" selected>Femme</option>
				<option value=\"Homme\">Homme</option>    
			</select>
	
			<hr size=\"1\" width=\"50%\" color=\"gainsboro\">
			<br>";
		}
		else {
			echo "<label for=\"Sexe\">Sexe</label>
			<select name=\"Sexe\" id=\"Sexe\">
			<option value=\"Femme\">Femme</option>
			<option value=\"Homme\" selected >Homme</option>    
			</select>

			<hr size=\"1\" width=\"50%\" color=\"gainsboro\">
			<br>";
		}
		

		echo "<label for=\"AdresseVoie\">Adresse:</label>
		<input type=\"text\" id=\"AdresseVoie\" name=\"AdresseVoie\" required minlength=\"1\" size=\"30\" value=\"".$ligne[5]."\">

		<br>

		<label for=\"AdresseCP\">Code postal:</label>
		<input type=\"text\" id=\"AdresseCP\" name=\"AdresseCP\" required minlength=\"1\" size=\"15\" value=\"".$ligne[7]."\">

		<br>

		<label for=\"AdresseVille\">Ville:</label>
		<input type=\"text\" id=\"AdresseVille\" name=\"AdresseVille\" required minlength=\"1\" size=\"20\" value=\"".$ligne[6]."\">

		<hr size=\"1\" width=\"50%\" color=\"gainsboro\">

		<label for=\"DN\">Date de naissance : </label>
		<input type=\"date\" max =\"2005-01-01\" min =\"1960-01-01\" name=\"DN\" value=\"".$ligne[3]."\">

		<hr size=\"1\" width=\"50%\" color=\"gainsboro\">

		<label for=\"Tel\">Téléphone:</label>
		<input type=\"text\" id=\"Tel\" name=\"Tel\" required minlength=\"1\" size=\"15\" value=\"".$ligne[8]."\">";

		mysqli_close($connexion);
		?>

		<hr size="1" width="50%" color="gainsboro">
		<br>

		<button type="submit" name ="boutonEnregistrer">Enregistrer</button>
	</form>
	</body>

	<footer>
		<center>MedMeasure - FAQ - Support - MedMeasure@gmail.com - Contact : 01 23 45 67 89</center>
	</footer>
</html>