<?php
if ($_SESSION["type"]=="Pilote"){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/inscription.css">
		<title>Profil</title>
	</head>

	<body>
		<form action='index.php?page=user' method='POST' enctype="multipart/form-data">
			<?php
			while ($data = $user->fetch())
			{
				?>
				<div class="formulaire-login">
					<div class="formulaire">
						<div class="section">
							<img class ="logo" src="images/MedMeasureLogo.png" alt="Logo" />
							<h3>Informations personnelles</h3>
							<div>
								<label for="nom">Nom</label>
								<input type="text" value ="<?= htmlspecialchars($data['nom']) ?>" name="nom" id="nom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
							</div>
							<div>
								<label for="prenom">Prénom</label>
								<input type="text" value ="<?= htmlspecialchars($data['prenom']) ?>"name="prenom" id="prenom" pattern="[a-zA-ZÀ-ÿ -]+" required/>
							</div>

							<div>
								<label>Sexe</label>
								<select name="sexe" id="sexe" >
									<?php if (strcmp (htmlspecialchars($data['Sexe']),"Homme") == 0)
									{
										?>
										<option value="Homme" selected>Homme</option>
										<option value="Femme" >Femme</option>
										<?php
									}
									else if (strcmp (htmlspecialchars($data['Sexe']),"Femme") == 0)
									{
										?>
										<option value="Homme" >Homme</option>
										<option value="Femme" selected>Femme</option>
										<?php
									}
									else
									{
										?>
										<option value="Homme" >Homme</option>
										<option value="Femme" >Femme</option>
										<?php
									}
									?>
								</select>

							</div>
							<div>
								<label for="dn">Date de naissance</label>
								<input type="date" value ="<?= htmlspecialchars($data['DN']) ?>" name="dn" id="dn" required/>
							</div>
							<div>
								<label for="adresse">Adresse</label>
								<input type="text" value ="<?= htmlspecialchars($data['AdresseVoie']) ?>" name="adresse" id="adresse" required />
							</div>
							<div>
								<label for="ville">Ville</label>
								<input type="text" value ="<?= htmlspecialchars($data['AdresseVille']) ?>" name="ville" id="ville" pattern="[a-zA-ZÀ-ÿ -]+" required />
							</div>
							<div>
								<label for="cp">Code postal</label>
								<input type="text" value ="<?= htmlspecialchars($data['AdresseCP']) ?>" name="cp" id="cp" pattern="[0-9]{5}" size="5" required/>
							</div>

							<div>
								<label for="tel">Téléphone</label>
								<input type="tel" value ="<?= htmlspecialchars($data['Tel']) ?>" name="tel" id="tel" pattern="[0-9]{10}" required/>
							</div>
						</div>
						<?php
					}
					$user->closeCursor();
					?>
					<button type="submit" name ="boutonEnregistrer">Enregistrer</button>
					<button type="submit" name ="boutonAnnuler">Annuler</button>

				</form>
			</body>
			</html>
			<?php
		}
		else {
			header('Location: index.php');
		}
		?>
