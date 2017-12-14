-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 déc. 2017 à 17:03
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

-- --------------------------------------------------------

--
-- Structure de la table `arvie_arvie_utilisateurs`
--

CREATE TABLE `arvie_arvie_utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `mobile` int(12) DEFAULT NULL,
  `date_naiss` date NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arvie_arvie_utilisateurs`
--

INSERT INTO `arvie_arvie_utilisateurs` (`id`, `email`, `prenom`, `nom`, `mobile`, `date_naiss`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 'emmanuel.derome@gmail.com', 'Emmanuel', 'Derome', NULL, '1960-10-03', '', 1, '2017-10-19 16:32:12', 416, '2017-10-19 16:32:12', 416, 0),
(2, 'f.salimou@hotmail.fr', 'Salimou', 'Fofana', NULL, '1998-03-01', '', 1, '2017-10-19 16:32:12', 416, '2017-10-19 16:32:12', 416, 0),
(3, 'gregory.brugnet@gmail.com', 'Gregory', 'Brugnet', NULL, '1996-10-01', '', 1, '2017-10-19 16:32:12', 416, '2017-10-19 16:32:12', 416, 0),
(4, 'n.peugnet@free.fr', 'Nicolas', 'Peugnet', NULL, '1996-05-09', '', 1, '2017-10-19 16:32:12', 416, '2017-10-19 16:32:12', 416, 0),
(5, 'rahari.anja@gmail.com', 'Anja', 'Raharijaonarivelo', 666, '1997-06-15', 'raharijaonarivelo', 1, '2017-10-19 16:32:12', 416, '2017-11-16 15:58:09', 416, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arvie_arvie_utilisateurs`
--
ALTER TABLE `arvie_arvie_utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arvie_arvie_utilisateurs`
--
ALTER TABLE `arvie_arvie_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
