-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 19 Janvier 2015 à 22:01
-- Version du serveur: 5.5.40
-- Version de PHP: 5.4.36-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `meetspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `PROJECTS`
--

CREATE TABLE IF NOT EXISTS `PROJECTS` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `VISIBILITY` enum('PUBLIC','PRIVATE') NOT NULL,
  `RMQ` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `SUBSCRIBE`
--

CREATE TABLE IF NOT EXISTS `SUBSCRIBE` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `USER` int(255) NOT NULL,
  `PROJECT` int(255) NOT NULL,
  `STATUS` enum('MANAGER','CONTRIBUTOR') NOT NULL,
  `AUTHOR` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER` (`USER`,`PROJECT`),
  KEY `PROJECT` (`PROJECT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `NICKNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `USER_DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `USERS`
--

INSERT INTO `USERS` (`ID`, `NICKNAME`, `PASSWORD`, `MAIL`, `USER_DESCRIPTION`) VALUES
(52, 'test', 'test', 'test', ''),
(55, 'test4', 'test4', 'test4', ''),
(56, 'test5', 'test5', 'test5', ''),
(57, 'test5', 'test5', 'test5', ''),
(58, 'testexec1', 'testexec1', 'testexec1', ''),
(59, 'testexec2', 'testexec2', 'testexec2', ''),
(60, 'testExec9', 'testExec9', 'testExec9', ''),
(61, 'testExec10', 'testExec10', 'testExec10', ''),
(62, 'testExec11', 'testExec11', 'testExec11', ''),
(63, 'testExec12', 'testExec12', 'testExec12', ''),
(64, 'test12', 'test12', 'test12', ''),
(65, 'test13', 'test13', 'test13', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `SUBSCRIBE`
--
ALTER TABLE `SUBSCRIBE`
  ADD CONSTRAINT `SUBSCRIBE_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `USERS` (`ID`),
  ADD CONSTRAINT `SUBSCRIBE_ibfk_2` FOREIGN KEY (`PROJECT`) REFERENCES `PROJECTS` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
