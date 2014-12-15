-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Décembre 2014 à 16:50
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `MEETSPACE`
--

-- --------------------------------------------------------

--
-- Structure de la table `PROJECTS`
--

CREATE TABLE IF NOT EXISTS `PROJECTS` (
`ID` int(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `VISIBILITY` enum('PUBLIC','PRIVATE') NOT NULL,
  `RMQ` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `PROJECTS`
--

INSERT INTO `PROJECTS` (`ID`, `NAME`, `DESCRIPTION`, `VISIBILITY`, `RMQ`) VALUES
(1, 'My Project', 'Here is a little test.  That''s my project, baby !', 'PUBLIC', '');

-- --------------------------------------------------------

--
-- Structure de la table `SUBSCRIBE`
--

CREATE TABLE IF NOT EXISTS `SUBSCRIBE` (
`ID` int(255) NOT NULL,
  `USER` int(255) NOT NULL,
  `PROJECT` int(255) NOT NULL,
  `STATUS` enum('MANAGER','CONTRIBUTOR') NOT NULL,
  `RMQ` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
`ID` int(255) NOT NULL,
  `NICKNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `RMQ` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `USERS`
--

INSERT INTO `USERS` (`ID`, `NICKNAME`, `PASSWORD`, `RMQ`) VALUES
(11, 'maxime_GUI', '$2y$10$4dhVITFVZr5N1cWwZDsbsuq.irpKiNPWVtAPMtrZm0fWGTC/WARt6\n', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `PROJECTS`
--
ALTER TABLE `PROJECTS`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `SUBSCRIBE`
--
ALTER TABLE `SUBSCRIBE`
 ADD PRIMARY KEY (`ID`), ADD KEY `USER` (`USER`,`PROJECT`), ADD KEY `PROJECT` (`PROJECT`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `PROJECTS`
--
ALTER TABLE `PROJECTS`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `SUBSCRIBE`
--
ALTER TABLE `SUBSCRIBE`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
