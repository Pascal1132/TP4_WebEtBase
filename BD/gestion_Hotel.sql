-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 20 Avril 2020 à 19:03
-- Version du serveur :  10.1.44-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_Hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `numeroChambre` int(11) NOT NULL,
  `nombreLits` int(11) NOT NULL,
  `typeChambre_fk` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `chambres`
--

INSERT INTO `chambres` (`numeroChambre`, `nombreLits`, `typeChambre_fk`) VALUES
(59, 2, 'Deluxe'),
(666, 666, 'Deluxe');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `numeroReservation` int(11) NOT NULL,
  `dateArrivee` date NOT NULL,
  `dateDepart` date NOT NULL,
  `numeroChambre_fk` int(11) NOT NULL,
  `numeroUtilisateur_fk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`numeroReservation`, `dateArrivee`, `dateDepart`, `numeroChambre_fk`, `numeroUtilisateur_fk`) VALUES
(24, '2020-04-08', '2020-04-09', 666, 2);

-- --------------------------------------------------------

--
-- Structure de la table `typesChambre`
--

CREATE TABLE `typesChambre` (
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `typesChambre`
--

INSERT INTO `typesChambre` (`type`, `description`) VALUES
('Deluxe', 'Deux douches\r\nVerres de vins à volontés\r\nWifi gratuit\r\nDéjeuner et dîner fournis'),
('Économique', 'Lits non confortable,\r\nPas de Wifi/Internet,\r\nTélévision 480p,\r\nPas de serviette,\r\nPas de savon'),
('Standard', 'cafetière\r\ndouche avec petits savons doux\r\ncuisinière');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `numeroUtilisateur` int(255) NOT NULL,
  `nomUtilisateur` varchar(255) NOT NULL,
  `adresseUtilisateur` varchar(255) NOT NULL,
  `villeUtilisateur` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`numeroUtilisateur`, `nomUtilisateur`, `adresseUtilisateur`, `villeUtilisateur`) VALUES
(1, 'Georges Desmarais', '125 avenue De la Tourte', 'Saint-jean sur le richelieu'),
(2, 'Anthony Bassal', '85 avenue De La tourte', 'Toutière'),
(3, 'Jérémie Bergeron', '76 boulevard des ruisseaux', 'Jean-Coutu'),
(4, 'Pascal Parent', '82 Boulevard de l\'avenir', 'Laval');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`numeroChambre`),
  ADD KEY `typeChambre_fk` (`typeChambre_fk`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`numeroReservation`),
  ADD KEY `numeroUtilisateur_fk` (`numeroUtilisateur_fk`),
  ADD KEY `numeroChambre_fk` (`numeroChambre_fk`);

--
-- Index pour la table `typesChambre`
--
ALTER TABLE `typesChambre`
  ADD PRIMARY KEY (`type`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`numeroUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `numeroReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `numeroUtilisateur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`typeChambre_fk`) REFERENCES `typesChambre` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`numeroUtilisateur_fk`) REFERENCES `utilisateurs` (`numeroUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`numeroChambre_fk`) REFERENCES `chambres` (`numeroChambre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
