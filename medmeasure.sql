-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 07 jan. 2020 à 17:32
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `medmeasure`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `email` varchar(50) NOT NULL,
  `mdp` varchar(300) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `banni` tinyint(1) NOT NULL DEFAULT 0,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `TypeConnexion` varchar(255) DEFAULT NULL,
  `idReseau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`email`, `mdp`, `type`, `idUtilisateur`, `banni`, `valide`, `TypeConnexion`, `idReseau`) VALUES
('admin@admin.fr', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Administrateur', 1, 0, 1, NULL, NULL),
('test@test.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Pilote', 2, 1, 1, NULL, NULL),
('test2@test.fr', '60303ae22b998861bce3b28f33eec1be758a213c86c93c076dbe9f558c11c752', 'Gestionnaire', 3, 0, 0, NULL, NULL),
('test3@test.fr', 'fd61a03af4f77d870fc21e05e7e80678095c92d808cfb3b5c279ee04c74aca13', 'Pilote', 4, 0, 1, NULL, NULL),
('test5@test.fr', 'a140c0c1eda2def2b830363ba362aa4d7d255c262960544821f556e16661b6ff', 'Pilote', 5, 0, 1, NULL, NULL),
('test6@test.fr', 'ed0cb90bdfa4f93981a7d03cff99213a86aa96a6cbcf89ec5e8889871f088727', 'Pilote', 6, 0, 1, NULL, NULL),
('test4@test.fr', 'a4e624d686e03ed2767c0abd85c14426b0b1157d2ce81d27bb4fe4f6f01d688a', 'Pilote', 7, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFAQ` int(11) NOT NULL,
  `intitule` varchar(250) NOT NULL,
  `reponse` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idFAQ`, `intitule`, `reponse`) VALUES
(1, 'Comment lancer un test sur le site ?', 'Depuis le menu, sélectionnez dans le menu déroulant le test que vous souhaitez faire.'),
(2, 'Comment effectuer les mesures demandées avec l\'appareil électronique ainsi que les différents capteurs ?', '........'),
(3, 'Quels sont les tests effectués ?', 'Il y a deux types de test: \r\nLe test complet qui comprend les mesures du rythme cardiaque, de la perception auditive, de la température de la peau, du temps de réaction à un stimulus visuel et de la reconnaissance de tonalité.\r\nLe test partiel qui comprend les mesures du rythme cardiaque, de la perception auditive et du temps de réaction à un stimulus visuel.'),
(4, 'Combien de temps mes données sont-elles enregistrées ?', 'Vos résultats restent enregistrés pendant 6 mois.'),
(5, 'xc', 'cxcxcx');

-- --------------------------------------------------------

--
-- Structure de la table `testcomplet`
--

CREATE TABLE `testcomplet` (
  `idTestComplet` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `Numero_Test` int(11) NOT NULL,
  `date` date NOT NULL,
  `Frequence` int(11) NOT NULL,
  `PerceptionAuditive` int(11) NOT NULL,
  `StimulusVisuel` int(11) NOT NULL,
  `TemperaturePeau` int(11) NOT NULL,
  `RecoTonalite` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testcomplet`
--

INSERT INTO `testcomplet` (`idTestComplet`, `idUtilisateur`, `Numero_Test`, `date`, `Frequence`, `PerceptionAuditive`, `StimulusVisuel`, `TemperaturePeau`, `RecoTonalite`, `score`) VALUES
(2, 2, 0, '2019-11-18', 67, 37, 224, 21, 1570, 88),
(3, 3, 0, '2019-11-14', 113, 22, 509, 37, 870, 54),
(4, 1, 1, '2019-11-01', 89, 37, 440, 22, 3620, 74),
(5, 5, 0, '2019-11-25', 78, 34, 415, 25, 1200, 25);

-- --------------------------------------------------------

--
-- Structure de la table `testpartiel`
--

CREATE TABLE `testpartiel` (
  `idTestPartiel` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `numero_test` int(11) NOT NULL,
  `date` date NOT NULL,
  `Frequence` int(11) NOT NULL,
  `PerceptionAuditive` int(11) NOT NULL,
  `StimulusVisuel` int(11) NOT NULL,
  `id_boitier` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testpartiel`
--

INSERT INTO `testpartiel` (`idTestPartiel`, `idUtilisateur`, `numero_test`, `date`, `Frequence`, `PerceptionAuditive`, `StimulusVisuel`, `id_boitier`, `score`) VALUES
(2, 1, 1, '2019-09-17', 56, 22, 330, 0, 78),
(3, 3, 0, '2019-10-09', 76, 33, 240, 0, 86),
(4, 7, 0, '2019-09-12', 87, 36, 890, 0, 38),
(5, 7, 1, '2019-12-12', 84, 28, 570, 0, 55),
(8, 5, 1, '2019-07-03', 90, 21, 670, 0, 58),
(9, 6, 0, '2019-07-01', 68, 35, 350, 0, 82),
(10, 6, 1, '2019-06-03', 124, 21, 210, 0, 77);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `dateEnvoi` date NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `contenu` varchar(250) NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `idUtilisateur`, `dateEnvoi`, `intitule`, `contenu`, `statut`) VALUES
(1, 1, '2019-11-05', '  Regum tuis ponere tuis nec.', 'Sed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.', 1),
(2, 2, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(3, 2, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(4, 3, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(5, 4, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(6, 5, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(7, 6, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(9, 1, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(256) DEFAULT NULL,
  `prenom` varchar(256) DEFAULT NULL,
  `DN` date DEFAULT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  `AdresseVoie` varchar(50) DEFAULT NULL,
  `AdresseVille` varchar(50) DEFAULT NULL,
  `AdresseCP` int(11) DEFAULT NULL,
  `Tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `DN`, `Sexe`, `AdresseVoie`, `AdresseVille`, `AdresseCP`, `Tel`) VALUES
(1, 'Hugues', 'Hugues', '2000-10-15', 'Homme', '26 rue de la paix', 'Issy', 78350, '0605040203'),
(2, 'Parapluie', 'Jeanne', '1999-01-01', 'Femme', '75 rue albert', 'Vanves', 95860, '0405060708'),
(3, 'My-linh', 'My-linh', '1968-08-22', 'Femme', '96 rue charles henrie', 'Clamart', 98750, '0102030405'),
(4, 'Peter', 'Peter', '1950-12-01', 'Homme', '56 avenue des moutons', 'Meudon', 45607, '0804060512'),
(5, 'Duponteee', 'r', '1980-04-15', 'Homme', '56 boulevard henrie', 'fdsdfsfd', 45144, '0605040203'),
(6, 'Ludivine', 'Ludivine', '1970-03-26', 'Femme', '33 rue des champs', 'Sèvres', 92310, '0508091245'),
(7, 'JOHN', 'Doe', '2019-11-28', 'Homme', '11 rue des sablons', 'Paris', 33700, '0650493912');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFAQ`);

--
-- Index pour la table `testcomplet`
--
ALTER TABLE `testcomplet`
  ADD PRIMARY KEY (`idTestComplet`);

--
-- Index pour la table `testpartiel`
--
ALTER TABLE `testpartiel`
  ADD PRIMARY KEY (`idTestPartiel`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `testcomplet`
--
ALTER TABLE `testcomplet`
  MODIFY `idTestComplet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `testpartiel`
--
ALTER TABLE `testpartiel`
  MODIFY `idTestPartiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
