/* Mettre le nom en majuscules */

var nom = document.getElementById("nom");
nom.onchange = nomEnMaj;

function nomEnMaj() {
	nom.value = nom.value.toUpperCase();
}


/* Mettre la première lettre du prénom en majuscules */

var prenom = document.getElementById("prenom");
prenom.onchange = prenomEnMaj;

function prenomEnMaj() {
	// Pour les noms composés
	var tabprenom1 = prenom.value.split('-');
	var i = 0;
	while (tabprenom1[i]) {

		tabprenom1[i] = PremiereLettreEnMaj(tabprenom1[i]);
		i++;
	}
	prenommaj = tabprenom1.join('-');

	// Pour les noms multiples
	var tabprenom2 = prenommaj.split(' ');
	var i = 0;
	while (tabprenom2[i]) {

		tabprenom2[i] = PremiereLettreEnMaj(tabprenom2[i]);
		i++;
	}
	prenommaj = tabprenom2.join(' ');

	prenom.value = prenommaj;
}

function PremiereLettreEnMaj(chaine) {
	return chaine.substr(0, 1).toUpperCase() + chaine.substr(1, chaine.length);
}


/** Messages personnalisés **/

var bouton = document.getElementById('boutonInscription');
bouton.onclick = verifValidite;


function verifValidite() {

	/* Correspondance des mdp */
	var mdp1 = document.getElementById('mdp');
	var mdp2 = document.getElementById('mdp2');
	mdp2.setCustomValidity('');
	if (mdp1.value != mdp2.value) {
		mdp2.setCustomValidity('Les mots de passe ne correspondent pas.');
		mdp2.value = "";
	}

	/* Pattern du mdp */
	mdp1.setCustomValidity('');

	if (mdp1.checkValidity() == false) {
		mdp1.setCustomValidity('Veuillez saisir un mot de passe de 8 et 20 caractères et contenant au moins : une majuscule, une minuscule et un chiffre.');
	};

	/* Pattern du nom */
	var nom = document.getElementById('nom');
	nom.setCustomValidity(''); // Pour réinitialiser : sinon quand on revalide après une erreur, le message d'erreur reste et impossible de valider

	if (nom.checkValidity() == false) {
		nom.setCustomValidity('Veuillez saisir un nom sans chiffre ni symbole autre que espace, tiret et accent.');
	};

	/* Pattern du prénom */
	var prenom = document.getElementById('prenom');
	prenom.setCustomValidity('');

	if (prenom.checkValidity() == false) {
		prenom.setCustomValidity('Veuillez saisir un prénom sans chiffre ni symbole autre que espace, tiret et accent.');
	};

	/* Pattern de l'adresse mail */
	var email = document.getElementById('email');
	email.setCustomValidity('');

	if (email.checkValidity() == false) {
		email.setCustomValidity('Veuillez saisir une adresse e-mail correcte.');
	};

	/* Sélection du sexe */
	var sexe = document.getElementById('sexe');
	sexe.setCustomValidity('');

	if (sexe.checkValidity() == false) {
		sexe.setCustomValidity('Veuillez sélectionner votre sexe.');
	};

	/* Sélection de la DN */
	var dn = document.getElementById('dn');
	dn.setCustomValidity('');

	if (dn.checkValidity() == false) {
		dn.setCustomValidity('Veuillez renseigner votre date de naissance.');
	};

	/* Adresse */
	var adresse = document.getElementById('adresse');
	adresse.setCustomValidity('');

	if (adresse.checkValidity() == false) {
		adresse.setCustomValidity('Veuillez renseigner votre adresse.');
	};

	/* Ville */
	var ville = document.getElementById('ville');
	ville.setCustomValidity('');

	if (ville.checkValidity() == false) {
		ville.setCustomValidity('Veuillez saisir une ville sans chiffre ni symbole autre que espace, tiret et accent.');
	};

	/* Pattern du code postal */
	var cp = document.getElementById('cp');
	cp.setCustomValidity('');

	if (cp.checkValidity() == false) {
		cp.setCustomValidity('Veuillez renseigner un code postal de 5 chiffres.');
	};

	/* Pattern du numéro de téléphone */
	var tel = document.getElementById('tel');
	tel.setCustomValidity('');

	if (tel.checkValidity() == false) {
		tel.setCustomValidity('Veuillez renseigner un numéro de téléphone de 10 chiffres.');
	};

	/* Confirmation CGU */
	var cgu = document.getElementById('cgu');
	cgu.setCustomValidity('');

	if (cgu.checkValidity() == false) {
		cgu.setCustomValidity('Veuillez confirmer les Conditions Générales d\'utilisation.');
	};
}
