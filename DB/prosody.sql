-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 22 Janvier 2015 à 22:21
-- Version du serveur: 5.5.40
-- Version de PHP: 5.4.36-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `prosody`
--

-- --------------------------------------------------------

--
-- Structure de la table `prosody`
--

CREATE TABLE IF NOT EXISTS `prosody` (
  `host` text,
  `user` text,
  `store` text,
  `key` text,
  `type` text,
  `value` mediumtext,
  KEY `prosody_index` (`host`(20),`user`(20),`store`(20),`key`(20))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prosody`
--

INSERT INTO `prosody` (`host`, `user`, `store`, `key`, `type`, `value`) VALUES
('meetspace.itinet.fr', 'adjevi', 'roster', 'guillaume@meetspace.itinet.fr', 'json', '{"groups":{"Buddies":true},"subscription":"both"}'),
('meetspace.itinet.fr', 'adjevi', 'roster', 'pierrick@meetspace.itinet.fr', 'json', '{"groups":{"Buddies":true},"subscription":"both"}'),
('meetspace.itinet.fr', 'adjevi', 'roster', 'pending', 'json', '{}'),
('meetspace.itinet.fr', 'adjevi', 'roster', '', 'json', '{"__hash":[false,{"version":10}]}'),
('meetspace.itinet.fr', 'maxime', 'roster', 'adjevi@meetspace.itinet.fr', 'json', '{"subscription":"both","name":"","groups":{"Meetspace":true},"persist":false}'),
('meetspace.itinet.fr', 'maxime', 'roster', 'guillaume@meetspace.itinet.fr', 'json', '{"subscription":"both","name":"","groups":{"Meetspace":true},"persist":false}'),
('meetspace.itinet.fr', 'maxime', 'roster', 'pierrick@meetspace.itinet.fr', 'json', '{"subscription":"both","name":"","groups":{"Meetspace":true},"persist":false}'),
('meetspace.itinet.fr', 'maxime', 'roster', 'pending', 'json', '{}'),
('meetspace.itinet.fr', 'maxime', 'roster', '', 'json', '{"__hash":[false,{"version":true}]}'),
('meetspace.itinet.fr', 'guillaume', 'vcard', 'name', 'string', 'vCard'),
('meetspace.itinet.fr', 'guillaume', 'vcard', 'attr', 'json', '{"xmlns":"vcard-temp"}'),
('meetspace.itinet.fr', 'guillaume', 'private', 'storage:jappix:options', 'json', '{"name":"storage","attr":{"xmlns":"jappix:options"},"__array":[{"attr":{"type":"sounds","xmlns":"jappix:options"},"name":"option","__array":["1"]},{"attr":{"type":"geolocation","xmlns":"jappix:options"},"name":"option","__array":["0"]},{"attr":{"type":"roster-showall","xmlns":"jappix:options"},"name":"option","__array":["1"]},{"name":"option","attr":{"type":"no-xhtml-images","xmlns":"jappix:options"}},{"name":"option","attr":{"type":"groupchatpresence","xmlns":"jappix:options"}},{"name":"option","attr":{"type":"integratemedias","xmlns":"jappix:options"}},{"name":"option","attr":{"type":"localarchives","xmlns":"jappix:options"}},{"name":"option","attr":{"type":"presence-status","xmlns":"jappix:options"}}]}'),
('meetspace.itinet.fr', 'pierrick', 'roster', 'maxime@meetspace.itinet.fr', 'json', '{"name":"","subscription":"both","persist":false,"groups":{"Meetspace":true,"Buddies":true}}'),
('meetspace.itinet.fr', 'pierrick', 'roster', 'adjevi@meetspace.itinet.fr', 'json', '{"name":"","subscription":"both","persist":false,"groups":{"Meetspace":true,"Buddies":true}}'),
('meetspace.itinet.fr', 'pierrick', 'roster', 'guillaume@meetspace.itinet.fr', 'json', '{"groups":{"Meetspace":true,"Buddies":true},"subscription":"both"}'),
('meetspace.itinet.fr', 'pierrick', 'roster', 'pending', 'json', '{}'),
('meetspace.itinet.fr', 'pierrick', 'roster', '', 'json', '{"__hash":[false,{"version":true}]}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'maxime@meetspace.itinet.fr', 'json', '{"groups":{"Meetspace":true},"subscription":"both","persist":false,"name":""}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'adjevi@meetspace.itinet.fr', 'json', '{"groups":{"Meetspace":true},"subscription":"both","name":"","persist":false}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'toto@meetspace.itinet.fr', 'json', '{"ask":"subscribe","groups":{},"subscription":"from"}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'test@meetspace.itinet.fr', 'json', '{"groups":{"Meetspace":true},"subscription":"both"}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'pending', 'json', '{}'),
('meetspace.itinet.fr', 'guillaume', 'roster', 'pierrick@meetspace.itinet.fr', 'json', '{"groups":{"Meetspace":true},"subscription":"both","name":"","persist":false}'),
('meetspace.itinet.fr', 'guillaume', 'roster', '', 'json', '{"__hash":[false,{"version":true}]}'),
('meetspace.itinet.fr', 'pierrickv', 'private', 'storage:jappix:options', 'json', '{"attr":{"xmlns":"jappix:options"},"name":"storage","__array":[{"attr":{"type":"sounds","xmlns":"jappix:options"},"name":"option","__array":["0"]},{"attr":{"type":"geolocation","xmlns":"jappix:options"},"name":"option","__array":["0"]},{"attr":{"type":"roster-showall","xmlns":"jappix:options"},"name":"option","__array":["0"]}]}'),
('meetspace.itinet.fr', 'pierrickv', 'vcard', 'name', 'string', 'vCard'),
('meetspace.itinet.fr', 'pierrickv', 'vcard', 'attr', 'json', '{"xmlns":"vcard-temp"}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
