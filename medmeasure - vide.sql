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
('admin@admin.fr', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Administrateur', 1, 0, 1, NULL, NULL);


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
(1, 'Admin', 'Admin', '2000-10-15', 'Homme', '26 rue de la paix', 'Issy', 78350, '0605040203');


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
