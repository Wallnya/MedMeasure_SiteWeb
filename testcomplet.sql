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
-- Structure de la table `testcomplet`
--

CREATE TABLE `testcomplet` (
  `idTestComplet` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `numero-test` int(11) NOT NULL,
  `date` date NOT NULL,
  `frequence` int(11) NOT NULL,
  `perception-auditive` int(11) NOT NULL,
  `stimulus-visuel` int(11) NOT NULL,
  `temperature-peau` int(11) NOT NULL,
  `reco-tonalite` int(11) NOT NULL,
  `idBoitier` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `testcomplet`
--

INSERT INTO `testcomplet` (`idTestComplet`, `idUtilisateur`, `numero-test`, `date`, `frequence`, `perception-auditive`, `stimulus-visuel`, `temperature-peau`, `reco-tonalite`, `idBoitier`, `score`) VALUES
(1, 1, 1, '2019-10-23', 80, 1290, 12, 33, 70, 2, 80);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
