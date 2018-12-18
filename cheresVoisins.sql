-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 04 déc. 2018 à 20:28
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cheresVoisins`
--

-- --------------------------------------------------------

--
-- Structure de la table `DATE`
--

CREATE TABLE `DATE` (
  `DATE_DEBUT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PROPOSE`
--

CREATE TABLE `PROPOSE` (
  `ID_P` int(10) NOT NULL,
  `IDSERVICE_P` decimal(10,0) NOT NULL,
  `IDUSER_P` int(10) UNSIGNED NOT NULL,
  `DATE_fIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `IdSERVICE` int(10) NOT NULL,
  `PRIxNEUF` decimal(50,0) DEFAULT NULL,
  `MOTS_CLEF` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `LIEnPHOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `idC` int(10) UNSIGNED NOT NULL,
  `nomC` varchar(40) NOT NULL,
  `prenomC` varchar(20) NOT NULL,
  `adresseC` varchar(40) NOT NULL,
  `cpC` char(5) NOT NULL,
  `villeC` varchar(40) NOT NULL,
  `mailC` varchar(50) NOT NULL,
  `passwordC` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`idC`, `nomC`, `prenomC`, `adresseC`, `cpC`, `villeC`, `mailC`, `passwordC`) VALUES
(3, 'chourki', 'abdellah', '60 le gang m', '34050', 'montpellier', 'abdellahchoukri@gmail.com', '123'),
(4, 'choukri', 'abdel', '34 rue du commerce', '34080', 'lyon', 'teste@gmail.com', '555');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `DATE`
--
ALTER TABLE `DATE`
  ADD PRIMARY KEY (`DATE_DEBUT`);

--
-- Index pour la table `PROPOSE`
--
ALTER TABLE `PROPOSE`
  ADD PRIMARY KEY (`ID_P`,`IDUSER_P`,`IDSERVICE_P`,`DATE_fIN`),
  ADD KEY `IDUSER_FK` (`IDUSER_P`),
  ADD KEY `DATE_P_PK` (`DATE_fIN`);

--
-- Index pour la table `SERVICE`
--
ALTER TABLE `SERVICE`
  ADD PRIMARY KEY (`IdSERVICE`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`idC`),
  ADD UNIQUE KEY `mailC` (`mailC`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `idC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `PROPOSE`
--
ALTER TABLE `PROPOSE`
  ADD CONSTRAINT `DATE_P_PK` FOREIGN KEY (`DATE_fIN`) REFERENCES `DATE` (`DATE_DEBUT`),
  ADD CONSTRAINT `IDUSER_FK` FOREIGN KEY (`IDUSER_P`) REFERENCES `UTILISATEUR` (`idC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
