-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 30 nov. 2019 à 19:48
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

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
  `mdp` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`email`, `mdp`, `type`, `idUtilisateur`) VALUES
('admin@admin.fr', '21232f297a57a5a743894a0e4a801fc3', 'Administrateur', 1),
('test@test.fr', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', 'Pilote', 2),
('test2@test.fr', '7daf939b91ca6416e5b5c7c96ca5c075', 'Gestionnaire', 3),
('test3@test.fr', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', 'Pilote', 4),
('test5@test.fr', 'e3d704f3542b44a621ebed70dc0efe13', 'Pilote', 5),
('test6@test.fr', '4cfad7076129962ee70c36839a1e3e15', 'Pilote', 6),
('test4@test.fr', '05a671c66aefea124cc08b76ea6d30bb', 'Pilote', 7);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFAQ` int(11) NOT NULL,
  `intitule` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idFAQ`, `intitule`, `reponse`) VALUES
(1, 'fdsfdsfds', '00000000000'),
(2, 'nnnnnnnnnnnnnn', '14245454454'),
(9, '', 'fdsfsdfsdfds'),
(10, 'Je suis une question', 'fdsfdsfsfsd'),
(12, 'fhsdkjds', 'sasasa'),
(15, 'dsq', 'dsq'),
(16, 'je suis une très longue quesiton parce que je veux voir ce que ça donne d\'écrire une longue question t\'as vue', 'Et je suis aussi uen très longue réponse car je dois voir ce que ça donne d\'avoir une très longue réponse tu vois même si c\'est âs très intéressant commeré ponse. ');

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
(1, 1, 0, '2019-11-03', 89, 30, 300, 34, 2000, 70),
(2, 2, 0, '2019-11-18', 67, 37, 224, 21, 1570, 88),
(3, 3, 0, '2019-11-14', 113, 22, 509, 37, 870, 54),
(4, 1, 0, '2019-11-01', 89, 37, 440, 22, 3620, 74),
(5, 5, 0, '2019-11-25', 78, 34, 415, 25, 1200, 66),
(6, 6, 0, '2019-11-29', 102, 20, 769, 29, 740, 47);

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
(1, 1, 0, '2019-10-14', 102, 36, 270, 0, 67),
(2, 1, 1, '2019-09-17', 56, 22, 330, 0, 78),
(3, 3, 0, '2019-10-09', 76, 33, 240, 0, 86),
(4, 7, 0, '2019-09-12', 87, 36, 890, 0, 38),
(5, 7, 1, '2019-12-12', 84, 28, 570, 0, 55),
(6, 3, 1, '2019-11-21', 113, 39, 120, 0, 57),
(7, 5, 0, '2019-08-19', 66, 42, 450, 0, 60),
(8, 5, 1, '2019-07-03', 90, 21, 670, 0, 58),
(9, 6, 0, '2019-07-01', 68, 35, 350, 0, 82),
(10, 6, 1, '2019-06-03', 124, 21, 210, 0, 77),
(11, 1, 0, '2019-07-26', 90, 33, 150, 0, 92);

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
(1, 1, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(2, 2, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(3, 2, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(4, 3, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(5, 4, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(6, 5, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(7, 6, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0),
(8, 8, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1),
(9, 1, '2019-11-05', '  Regum tuis ponere tuis nec.', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(256) DEFAULT NULL,
  `prenom` varchar(256) DEFAULT NULL,
  `DN` date NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `AdresseVoie` varchar(50) NOT NULL,
  `AdresseVille` varchar(50) NOT NULL,
  `AdresseCP` int(11) NOT NULL,
  `Tel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `DN`, `Sexe`, `AdresseVoie`, `AdresseVille`, `AdresseCP`, `Tel`) VALUES
(1, 'Hugues', 'Hugues', '2000-10-15', 'Homme', '26 rue de la paix', 'Issy', 78350, '0605040203'),
(2, 'Parapluie', 'Jeanne', '1999-01-01', 'Femme', '75 rue albert', 'Vanves', 95860, '0405060708'),
(3, 'My-linh', 'My-linh', '1968-08-22', 'Femme', '96 rue charles henrie', 'Clamart', 98750, '0102030405'),
(4, 'Peter', 'Peter', '1950-12-01', 'Homme', '56 avenue des moutons', 'Meudon', 45607, '0804060512'),
(5, 'Adrien', 'Adrien', '1980-04-15', 'Homme', '56 boulevard henrie', 'fdsdfsfd', 45144, '0605040203'),
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
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `testcomplet`
--
ALTER TABLE `testcomplet`
  MODIFY `idTestComplet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `testpartiel`
--
ALTER TABLE `testpartiel`
  MODIFY `idTestPartiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
