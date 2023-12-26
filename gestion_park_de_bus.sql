-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 22 Février 2020 à 20:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestion_park_de_bus`
--
CREATE DATABASE IF NOT EXISTS `gestion_park_de_bus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestion_park_de_bus`;

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--
-- Création :  Mar 21 Janvier 2020 à 10:50
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `id_bus` varchar(30) NOT NULL,
  `id_parc` varchar(30) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `nom_chaufeur` text NOT NULL,
  PRIMARY KEY (`id_bus`),
  KEY `id_parc` (`id_parc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bus`
--

INSERT INTO `bus` (`id_bus`, `id_parc`, `nb_place`, `nom_chaufeur`) VALUES
('AA1BB2', '1', 41, 'Amadou MBodj'),
('AA2BB3', '2', 42, 'modi'),
('AA3BB4', '3', 43, 'NDIAYE'),
('CC1DD2', '4', 51, 'Seydou'),
('CC2DD3', '5', 52, 'kalidou'),
('CC3DD4', '1', 45, 'Ablaye');

-- --------------------------------------------------------

--
-- Structure de la table `carnet_ticket`
--
-- Création :  Mer 19 Février 2020 à 15:52
--

DROP TABLE IF EXISTS `carnet_ticket`;
CREATE TABLE IF NOT EXISTS `carnet_ticket` (
  `id_carnet` varchar(30) NOT NULL,
  `id_bus` varchar(30) NOT NULL,
  PRIMARY KEY (`id_carnet`),
  KEY `id_bus` (`id_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `carnet_ticket`
--

INSERT INTO `carnet_ticket` (`id_carnet`, `id_bus`) VALUES
('A1', 'AA1BB2'),
('A10', 'AA1BB2'),
('A2', 'AA1BB2'),
('A3', 'AA1BB2'),
('A6', 'AA1BB2'),
('A4', 'AA2BB3'),
('A5', 'AA2BB3');

-- --------------------------------------------------------

--
-- Structure de la table `liaison_passage`
--
-- Création :  Mer 19 Février 2020 à 15:58
--

DROP TABLE IF EXISTS `liaison_passage`;
CREATE TABLE IF NOT EXISTS `liaison_passage` (
  `id_bus` varchar(30) NOT NULL,
  `nb_monte` int(11) NOT NULL,
  `nb_descend` int(11) NOT NULL,
  `nb_reste` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `id_station` varchar(30) NOT NULL,
  KEY `id_bus` (`id_bus`,`id_station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liaison_passage`
--

INSERT INTO `liaison_passage` (`id_bus`, `nb_monte`, `nb_descend`, `nb_reste`, `nb_place`, `id_station`) VALUES
('AA1BB2', 41, 0, 0, 41, 'Carefour madrid'),
('AA1BB2', 10, 10, 31, 41, 'BMD'),
('AA1BB2', 15, 20, 21, 41, 'Big market'),
('AA1BB2', 41, 36, 0, 41, 'Poteau trois'),
('AA1BB2', 10, 10, 31, 41, 'Carefour bamako'),
('AA1BB2', 10, 12, 9, 41, 'Big market'),
('AA1BB2', 10, 10, 10, 41, 'Big market'),
('AA1BB2', 10, 10, 10, 41, 'carefour madrid'),
('AA1BB2', 15, 10, 15, 41, 'BIG MARKET'),
('AA1BB2', 10, 10, 10, 41, 'PK'),
('AA1BB2', 10, 10, 25, 41, 'BIG MARKET');

-- --------------------------------------------------------

--
-- Structure de la table `park`
--
-- Création :  Lun 17 Février 2020 à 23:43
--

DROP TABLE IF EXISTS `park`;
CREATE TABLE IF NOT EXISTS `park` (
  `id_park` int(11) NOT NULL,
  `nb_bus` int(11) NOT NULL,
  PRIMARY KEY (`id_park`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `park`
--

INSERT INTO `park` (`id_park`, `nb_bus`) VALUES
(1, 40),
(2, 30),
(3, 45),
(4, 11),
(5, 20),
(6, 10),
(7, 10),
(8, 10);

-- --------------------------------------------------------

--
-- Structure de la table `revenue_bus`
--
-- Création :  Jeu 20 Février 2020 à 04:11
--

DROP TABLE IF EXISTS `revenue_bus`;
CREATE TABLE IF NOT EXISTS `revenue_bus` (
  `idbus` varchar(30) NOT NULL,
  `rv2` int(11) NOT NULL,
  PRIMARY KEY (`idbus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `revenue_bus`
--

INSERT INTO `revenue_bus` (`idbus`, `rv2`) VALUES
('AA1BB2', 15550),
('AA2BB3', 100);

-- --------------------------------------------------------

--
-- Structure de la table `revenue_carnet`
--
-- Création :  Jeu 20 Février 2020 à 04:10
--

DROP TABLE IF EXISTS `revenue_carnet`;
CREATE TABLE IF NOT EXISTS `revenue_carnet` (
  `idc` varchar(30) NOT NULL,
  `rv1` int(11) NOT NULL,
  `idb` varchar(30) NOT NULL,
  PRIMARY KEY (`idc`),
  KEY `idb` (`idb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `revenue_carnet`
--

INSERT INTO `revenue_carnet` (`idc`, `rv1`, `idb`) VALUES
('A1', 5450, 'AA1BB2'),
('A10', 10000, 'AA1BB2'),
('A2', 50, 'AA1BB2'),
('A3', 50, 'AA1BB2'),
('A4', 50, 'AA2BB3'),
('A5', 50, 'AA2BB3'),
('A6', 0, 'AA1BB2');

-- --------------------------------------------------------

--
-- Structure de la table `station`
--
-- Création :  Mer 19 Février 2020 à 17:27
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `id_station` varchar(30) NOT NULL,
  PRIMARY KEY (`id_station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`id_station`) VALUES
('24'),
('Big market'),
('BMD'),
('Carefour bamako'),
('Carefour madrid'),
('PK'),
('Poteau trois');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--
-- Création :  Mer 19 Février 2020 à 16:15
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id_tickets` varchar(30) NOT NULL,
  `id_carnet` varchar(30) NOT NULL,
  `etat` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id_tickets`),
  KEY `id_carnet` (`id_carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tickets`
--

INSERT INTO `tickets` (`id_tickets`, `id_carnet`, `etat`, `prix`) VALUES
('0001', 'A1', 'vendue', 50),
('0002', 'A1', 'vendue', 50),
('0003', 'A1', 'vendue', 50),
('0004', 'A1', 'vendue', 50),
('0005', 'A1', 'vendue', 50),
('0006', 'A2', 'vendue', 50),
('0007', 'A3', 'vendue', 50),
('0008', 'A1', 'vendue', 50),
('0009', 'A1', 'vendue', 5000),
('0010', 'A1', 'vendue', 50),
('0011', 'A4', 'vendue', 50),
('0012', 'A5', 'vendue', 50),
('0015', 'A1', 'vendue', 100),
('0016', 'A10', 'vendue', 10000);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--
-- Création :  Sam 22 Février 2020 à 19:04
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` varchar(30) NOT NULL,
  `mdp_user` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `mdp_user` (`mdp_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `mdp_user`) VALUES
('Lassito_HS', '12345'),


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
