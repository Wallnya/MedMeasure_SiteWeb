-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 22 nov. 2019 à 11:21
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

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
-- Structure de la table `testpartiel`
--

CREATE TABLE `testpartiel` (
  `idTestPartiel` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `numero-test` int(11) NOT NULL,
  `date` date NOT NULL,
  `frequence` int(11) NOT NULL,
  `perception-auditive` int(11) NOT NULL,
  `stimulus-visuel` int(11) NOT NULL,
  `idBoitier` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `testpartiel`
--

INSERT INTO `testpartiel` (`idTestPartiel`, `idUtilisateur`, `numero-test`, `date`, `frequence`, `perception-auditive`, `stimulus-visuel`, `idBoitier`, `score`) VALUES
(1, 1, 2, '2019-10-12', 60, 29, 30, 23, 50);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `testpartiel`
--
ALTER TABLE `testpartiel`
  ADD PRIMARY KEY (`idTestPartiel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `testpartiel`
--
ALTER TABLE `testpartiel`
  MODIFY `idTestPartiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
