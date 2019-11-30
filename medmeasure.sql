-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 30 nov. 2019 à 16:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `idUtilisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`email`, `mdp`, `type`, `idUtilisateur`) VALUES
('admin@admin.fr', 'admin', 'Administrateur', '1'),
('test2@test.fr', 'unmotdepasse', 'Gestionnaire', '3'),
('test3@test.fr', 'mdp', 'Pilote', '4'),
('test4@test.fr', '05a671c66aefea124cc08b76ea6d30bb', 'Pilote', '7'),
('test5@test.fr', 'test5', 'Pilote', '5'),
('test6@test.fr', 'test6', 'Pilote', '6'),
('test@test.fr', 'mdp', 'Pilote', '2');

-- --------------------------------------------------------

--
-- Structure de la table `testcomplet`
--

DROP TABLE IF EXISTS `testcomplet`;
CREATE TABLE IF NOT EXISTS `testcomplet` (
  `idTestComplet` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `Numero_Test` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Frequence` int(11) NOT NULL,
  `PerceptionAuditive` int(11) NOT NULL,
  `StimulusVisuel` int(11) NOT NULL,
  `TemperaturePeau` int(11) NOT NULL,
  `RecoTonalite` int(11) NOT NULL,
  `id_boitier` int(11) NOT NULL,
  `ScoreTotal` int(11) NOT NULL,
  PRIMARY KEY (`idTestComplet`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testcomplet`
--

INSERT INTO `testcomplet` (`idTestComplet`, `idUtilisateur`, `Numero_Test`, `Date`, `Frequence`, `PerceptionAuditive`, `StimulusVisuel`, `TemperaturePeau`, `RecoTonalite`, `id_boitier`, `ScoreTotal`) VALUES
(1, 1, 0, '2019-11-03', 89, 30, 300, 34, 2000, 0, 70),
(2, 2, 0, '2019-11-18', 67, 37, 224, 21, 1570, 0, 88),
(3, 3, 0, '2019-11-14', 113, 22, 509, 37, 870, 0, 54),
(4, 4, 0, '2019-11-01', 89, 37, 440, 22, 3620, 0, 74),
(5, 5, 0, '2019-11-25', 78, 34, 415, 25, 1200, 0, 66),
(6, 6, 0, '2019-11-29', 102, 20, 769, 29, 740, 0, 47);

-- --------------------------------------------------------

--
-- Structure de la table `testpartiel`
--

DROP TABLE IF EXISTS `testpartiel`;
CREATE TABLE IF NOT EXISTS `testpartiel` (
  `idTestPartiel` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `Numero_Test` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Frequence` int(11) NOT NULL,
  `PerceptionAuditive` int(11) NOT NULL,
  `StimulusVisuel` int(11) NOT NULL,
  `id_boitier` int(11) NOT NULL,
  `ScoreTotal` int(11) NOT NULL,
  PRIMARY KEY (`idTestPartiel`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testpartiel`
--

INSERT INTO `testpartiel` (`idTestPartiel`, `idUtilisateur`, `Numero_Test`, `Date`, `Frequence`, `PerceptionAuditive`, `StimulusVisuel`, `id_boitier`, `ScoreTotal`) VALUES
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
(11, 4, 0, '2019-07-26', 90, 33, 150, 0, 92);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `dateEnvoi` date NOT NULL,
  `contenu` varchar(250) NOT NULL,
  PRIMARY KEY (`idTicket`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `intitule`, `reponse`, `idUtilisateur`, `statut`, `dateEnvoi`, `contenu`) VALUES
(1, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1, 0, '2019-11-05', '\r\n\r\n\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n'),
(2, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 4, 0, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(3, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 4, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(4, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 6, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(5, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 6, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(6, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 2, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(7, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 1, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(8, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 5, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r'),
(9, '  Regum tuis ponere tuis nec.', '\r\n\r\nSed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.\r\n\r\n', 7, 1, '2019-11-05', 'Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.\r');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) DEFAULT NULL,
  `prenom` varchar(256) DEFAULT NULL,
  `DN` date NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `AdresseVoie` varchar(50) NOT NULL,
  `AdresseVille` varchar(50) NOT NULL,
  `AdresseCP` int(11) NOT NULL,
  `Tel` varchar(50) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `DN`, `Sexe`, `AdresseVoie`, `AdresseVille`, `AdresseCP`, `Tel`) VALUES
(1, 'Hugues', 'Hugues', '2000-10-15', 'Homme', '26 rue de la paix', 'Issy', 78350, '0605040203'),
(2, 'Sarah', 'Sarah', '1999-01-01', 'Femme', '75 rue albert', 'Vanves', 95860, '0405060708'),
(3, 'My-linh', 'My-linh', '1968-08-22', 'Femme', '96 rue charles henrie', 'Clamart', 98750, '0102030405'),
(4, 'Peter', 'Peter', '1950-12-01', 'Homme', '56 avenue des moutons', 'Meudon', 45607, '0804060512'),
(5, 'Adrien', 'Adrien', '1980-04-15', 'Homme', '56 boulevard henrie', 'fdsdfsfd', 45144, '0605040203'),
(6, 'Ludivine', 'Ludivine', '1970-03-26', 'Femme', '33 rue des champs', 'Sèvres', 92310, '0508091245'),
(7, 'JOHN', 'Doe', '2019-11-28', 'Homme', '11 rue des sablons', 'Paris', 33700, '0650493912');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
