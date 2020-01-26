<?php
if ($_SESSION["type"] == "Pilote") {
	if (isset($_SESSION['lang'])) {
		if ($_SESSION['lang'] == "en")
			include "langues/en.inc";
		else if ($_SESSION['lang'] == "fr") {
			include "langues/fr.inc";
		}
	} else {
		include "langues/fr.inc";
	}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/inscription.css">
		<title><?php echo _PROFIL ?></title>
	</head>

	<body>
		<form action='index.php?page=user' method='POST' enctype="multipart/form-data">
			<?php
			while ($data = $user->fetch()) {
			?>
				<div class="formulaire-login">
					<div class="formulaire">
						<div class="section">
							<img class="logo" src="images/MedMeasureLogo.png" alt="Logo" />
							<h3><?php echo _INFOPERSO ?></h3>
							<div>
								<label for="nom"><?php echo _NOM ?></label>
								<input type="text" value="<?= htmlspecialchars($data['nom']) ?>" name="nom" id="nom" pattern="[a-zA-ZÀ-ÿ -]+" required />
							</div>
							<div>
								<label for="prenom"><?php echo _PRENOM ?></label>
								<input type="text" value="<?= htmlspecialchars($data['prenom']) ?>" name="prenom" id="prenom" pattern="[a-zA-ZÀ-ÿ -]+" required />
							</div>

							<div>
								<label><?php echo _SEXE ?></label>
								<select name="sexe" id="sexe">
									<?php if (strcmp(htmlspecialchars($data['Sexe']), "Homme") == 0) {
									?>
										<option value="Homme" selected><?php echo _HOMME ?></option>
										<option value="Femme"><?php echo _FEMME ?></option>
									<?php
									} else if (strcmp(htmlspecialchars($data['Sexe']), "Femme") == 0) {
									?>
										<option value="Homme"><?php echo _HOMME ?></option>
										<option value="Femme" selected><?php echo _FEMME ?></option>
									<?php
									} else {
									?>
										<option value="Homme"><?php echo _HOMME ?></option>
										<option value="Femme"><?php echo _FEMME ?></option>
									<?php
									}
									?>
								</select>

							</div>
							<div>
								<label for="dn"><?php echo _DATENAISSANCE ?></label>
								<input type="date" value="<?= htmlspecialchars($data['DN']) ?>" name="dn" id="dn" required />
							</div>
							<div>
								<label for="adresse"><?php echo _ADRESSE ?></label>
								<input type="text" value="<?= htmlspecialchars($data['AdresseVoie']) ?>" name="adresse" id="adresse" required />
							</div>
							<div>
								<label for="ville"><?php echo _VILLE ?></label>
								<input type="text" value="<?= htmlspecialchars($data['AdresseVille']) ?>" name="ville" id="ville" pattern="[a-zA-ZÀ-ÿ -]+" required />
							</div>
							<div>
								<label for="cp"><?php echo _CODEPOSTAL ?></label>
								<input type="text" value="<?= htmlspecialchars($data['AdresseCP']) ?>" name="cp" id="cp" pattern="[0-9]{5}" size="5" required />
							</div>

							<div>
								<label for="tel"><?php echo _TELEPHONE ?></label>
								<input type="tel" value="<?= htmlspecialchars($data['Tel']) ?>" name="tel" id="tel" pattern="[0-9]{10}" required />
							</div>
						</div>
					<?php
				}
				$user->closeCursor();
					?>
					<button type="submit" name="boutonEnregistrer"><?php echo _ENREGISTRER ?></button>
					<button type="submit" name="boutonAnnuler"><?php echo _ANNULER ?></button>
					</div>
				</div>
		</form>
	</body>

	</html>
<?php
} else {
	header('Location: index.php');
}
?>
