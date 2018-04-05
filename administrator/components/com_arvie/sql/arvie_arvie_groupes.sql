-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Décembre 2017 à 09:23
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arvie`
--

-- --------------------------------------------------------

--
-- Structure de la table `arvie_arvie_groupes`
--

CREATE TABLE `arvie_arvie_groupes` (
  `id` int(11) NOT NULL,
  `groupe_parent` int(11) DEFAULT NULL,
  `nom` varchar(40) NOT NULL,
  `est_groupe_interet` tinyint(1) NOT NULL DEFAULT '0',
  `est_public` tinyint(1) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `arvie_arvie_groupes`
--

INSERT INTO `arvie_arvie_groupes` (`id`, `groupe_parent`, `nom`, `est_groupe_interet`, `est_public`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, NULL, 'Arvie', 0, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 1, 'Louis-Armand', 0, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 2, 'BTS', 0, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 3, 'SIO 1', 0, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 1, 'Sport', 1, 1, 'sport', 1, '0000-00-00 00:00:00', 0, '2017-12-18 08:17:16', 416, 0),
(6, 5, 'Basket', 1, 1, 'basket', 1, '0000-00-00 00:00:00', 0, '2017-12-18 08:17:23', 416, 0),
(7, 3, 'SIO 2', 0, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(8, 2, 'Lycée', 0, 0, 'lycee', 1, '2017-12-18 08:04:53', 417, '0000-00-00 00:00:00', 0, 0),
(10, 5, 'AS', 1, 1, 'as', 1, '2017-12-18 08:16:53', 416, '0000-00-00 00:00:00', 0, 0),
(11, 10, 'AS Musculation', 1, 1, 'as-musculation', 1, '2017-12-18 08:18:15', 416, '0000-00-00 00:00:00', 0, 0),
(12, 10, 'AS Foot Salle', 1, 1, 'as-foot-salle', 1, '2017-12-18 08:18:32', 416, '0000-00-00 00:00:00', 0, 0),
(13, 8, 'TS1', 0, 0, 'ts1', 1, '2017-12-18 08:23:03', 417, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `arvie_arvie_groupes`
--
ALTER TABLE `arvie_arvie_groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`groupe_parent`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `arvie_arvie_groupes`
--
ALTER TABLE `arvie_arvie_groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `arvie_arvie_groupes`
--
ALTER TABLE `arvie_arvie_groupes`
  ADD CONSTRAINT `arvie_arvie_groupes_ibfk_1` FOREIGN KEY (`groupe_parent`) REFERENCES `arvie_arvie_groupes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
