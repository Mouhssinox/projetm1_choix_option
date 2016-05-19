-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Mai 2016 à 00:36
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetm1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `identifiant` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`identifiant`, `mdp`) VALUES
('1', '1'),
('s15023828', 'm1'),
('admin', '1');

-- --------------------------------------------------------

--
-- Structure de la table `choix_etudiant`
--

CREATE TABLE IF NOT EXISTS `choix_etudiant` (
  `ine` int(10) NOT NULL,
  `id_option` int(30) NOT NULL,
  `choix_etudiant` int(20) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `choix_etudiant`
--

INSERT INTO `choix_etudiant` (`ine`, `id_option`, `choix_etudiant`, `score`) VALUES
(1, 2, 3, 1122),
(1, 1, 1, 1096),
(1, 3, 2, 1184),
(2, 1, 3, 2),
(2, 2, 1, 2),
(2, 3, 2, 2),
(3, 1, 3, 3),
(3, 2, 1, 3),
(3, 3, 2, 3),
(4, 1, 3, 4),
(4, 2, 1, 4),
(4, 3, 2, 4),
(5, 1, 3, 5),
(5, 2, 1, 5),
(5, 3, 2, 5),
(6, 1, 3, 6),
(6, 2, 1, 6),
(6, 3, 2, 6),
(24, 1, 3, 1000),
(24, 2, 2, 1200),
(24, 3, 1, 1600),
(23, 1, 1, 1550),
(23, 2, 2, 1600),
(23, 3, 3, 1200),
(22, 1, 2, 1200),
(22, 2, 3, 1800),
(22, 3, 1, 1100),
(21, 1, 2, 1700),
(21, 2, 1, 1550),
(21, 3, 3, 1050),
(20, 1, 1, 1100),
(20, 2, 2, 1250),
(20, 3, 3, 1090),
(19, 1, 2, 1100),
(19, 2, 3, 1990),
(19, 3, 1, 1600),
(18, 1, 1, 1500),
(18, 2, 2, 1440),
(18, 3, 3, 1666);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `ine` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  site int(10),
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  `option_valide` int(11) DEFAULT NULL,
  `option_tente_1` int(11) DEFAULT NULL,
  `option_tente_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ine`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `nom` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `maximum` int(30) NOT NULL,
  `numero_option` varchar(30) NOT NULL,
  `id_option` int(30) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_option`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`nom`, `site`, `maximum`, `numero_option`, `id_option`) VALUES
('IAA', 'luminy', 4, '1', 1),
('IA', 'luminy', 7, '1', 2),
('AD', 'luminy', 2, '1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `options_ouvertes`
--

CREATE TABLE IF NOT EXISTS `options_ouvertes` (
  `nom_opt` varchar(60) NOT NULL,
  `site_opt` varchar(30) NOT NULL,
  `max_etu_opt` int(3) NOT NULL,
  `id_option` varchar(20) NOT NULL,
  `dateDebInsc_op` varchar(15) NOT NULL,
  `dateFinInsc_op` varchar(15) NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_ouvertes`
--

INSERT INTO `options_ouvertes` (`nom_opt`, `site_opt`, `max_etu_opt`, `id_option`, `dateDebInsc_op`, `dateFinInsc_op`) VALUES
('koki', 'luminy', 19, 'test', '2016-05-11', '2016-05-12'),
('Intelligence artificiellee', 'luminy', 35, 'ENSIN6U7', '2016-05-11', '2016-05-12'),
('Geometrie algorithmique', 'St-Charles', 40, 'ENSIN6U4', '2016-05-11', '2016-05-12'),
('rrrr', 'luminy', 50, 'ENSIN6U8', '2016-05-04', '2016-05-28'),
('Programmation fonctionnelle', 'St-Charles', 30, 'ENSIN6U9', '2016-05-03', '2016-05-13'),
('Programmation logique', 'Aix en provence', 56, 'ENSIN6U10', '2016-05-03', '2016-05-13'),
('Projet informatique applique', 'Luminy', 60, 'ENSIN6U11', '2016-05-04', '2016-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `id_option` int(30) NOT NULL,
  `ine` int(10) NOT NULL,
  PRIMARY KEY (`id_option`,`ine`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resultats`
--

INSERT INTO `resultats` (`id_option`, `ine`) VALUES
(1, 18),
(1, 20),
(1, 22),
(1, 23),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 21),
(3, 19),
(3, 24);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
