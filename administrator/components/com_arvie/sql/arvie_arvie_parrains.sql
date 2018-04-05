-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 déc. 2017 à 09:39
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arvie`
--

DROP TABLE IF EXISTS `arvie_arvie_parrains`;

-- --------------------------------------------------------

--
-- Structure de la table `arvie_arvie_parrains`
--

CREATE TABLE `arvie_arvie_parrains` (
  `id` int(11) NOT NULL,
  `parrain` int(11) NOT NULL,
  `filleul` int(11) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arvie_arvie_parrains`
--

INSERT INTO `arvie_arvie_parrains` (`id`, `parrain`, `filleul`, `date_deb`, `date_fin`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 3, 5, '2017-09-04', '2018-06-05', '', 1, '2017-12-18 08:13:20', 416, '0000-00-00 00:00:00', 0, 0),
(2, 4, 2, '2017-09-12', '2018-07-04', '', 1, '2017-12-18 08:13:52', 416, '0000-00-00 00:00:00', 0, 0),
(3, 1, 3, '2017-09-04', '2018-07-02', '', 1, '2017-12-18 08:35:29', 416, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arvie_arvie_parrains`
--
ALTER TABLE `arvie_arvie_parrains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filleuil` (`filleul`),
  ADD KEY `parrain` (`parrain`),
  ADD KEY `filleul` (`filleul`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arvie_arvie_parrains`
--
ALTER TABLE `arvie_arvie_parrains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
