--
-- Base de données :  `arvie`
--

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_abonnements`
--

CREATE TABLE `#__arvie_abonnements` (
  `id` int(11) NOT NULL,
  `abonne` int(11) NOT NULL,
  `suivi` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_abonnements`
--

INSERT INTO `#__arvie_abonnements` (`id`, `abonne`, `suivi`, `date`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 14, 2, '2017-12-10 00:00:00', '', 1, '2017-12-10 12:00:00', 0, '2018-04-27 09:49:59', 416, 0),
(2, 14, 3, '2017-12-10 00:00:00', '', 1, '2017-12-10 12:00:00', 0, '2018-04-27 09:50:15', 416, 0),
(3, 10, 4, '2017-12-10 00:00:00', '', 1, '2017-12-10 12:00:00', 0, '2018-04-27 09:50:34', 416, 0),
(4, 2, 3, '2018-04-19 00:00:00', '', 1, '2018-04-19 00:00:00', 0, '2018-04-19 14:52:51', 416, 0),
(5, 2, 4, '2018-04-19 00:00:00', '', 1, '2018-04-19 00:00:00', 0, '2018-04-19 14:53:04', 416, 0),
(6, 5, 15, '2018-04-20 00:00:00', '', 1, '2018-04-19 14:59:22', 416, '0000-00-00 00:00:00', 0, 0),
(7, 5, 3, '2018-04-20 00:00:00', '', 1, '2018-04-20 06:50:20', 416, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_discussions`
--

CREATE TABLE `#__arvie_discussions` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_discussions`
--

INSERT INTO `#__arvie_discussions` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, '-', '-', 0, '2018-04-17 18:37:31', 416, '2018-04-19 16:24:09', 416, 0),
(1, 'Epreuves écrites du BTS-SIO 2018', 'epreuves-ecrites-du-bts-sio-2018', 1, '2018-04-17 18:37:31', 416, '2018-04-24 13:40:58', 416, 0),
(2, 'Portfolio pour l\'épreuve E6', 'portfolio-pour-l-epreuve-e6', 1, '2018-04-20 06:47:52', 416, '2018-04-20 06:49:30', 416, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_evenements`
--

CREATE TABLE `#__arvie_evenements` (
  `id` int(11) NOT NULL,
  `publication` int(11) NOT NULL,
  `date_event` datetime NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_evenements`
--

INSERT INTO `#__arvie_evenements` (`id`, `publication`, `date_event`, `lieu`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 1, '2017-10-12 00:00:00', 'Lycée Louis Armand', '', 1, '2017-10-12 00:00:00', 0, '2018-04-25 14:45:17', 416, 0),
(2, 7, '2017-10-16 18:30:00', 'Mairie du XVe', '', 1, '2018-04-25 14:57:51', 416, '2018-04-25 15:02:26', 416, 0),
(3, 8, '2018-04-12 12:00:00', 'Lycée Louis Armand', '', 1, '2018-04-25 17:45:04', 416, '2018-04-25 18:02:11', 416, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_groupes`
--

CREATE TABLE `#__arvie_groupes` (
  `id` int(11) NOT NULL,
  `groupe_parent` int(11) DEFAULT NULL,
  `nom` varchar(40) NOT NULL,
  `est_groupe_interet` tinyint(1) NOT NULL DEFAULT '0',
  `est_public` tinyint(1) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_groupes`
--

INSERT INTO `#__arvie_groupes` (`id`, `groupe_parent`, `nom`, `est_groupe_interet`, `est_public`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, 0, '-', 0, 0, '-', 0, '0000-00-00 00:00:00', 416, '2018-04-18 08:28:25', 416, 0),
(1, 1, 'Arvie', 0, 0, 'arvie', 1, '0000-00-00 00:00:00', 416, '2018-04-18 08:28:25', 416, 0),
(2, 1, 'Louis-Armand', 0, 0, 'louis-armand', 1, '0000-00-00 00:00:00', 416, '2018-04-18 08:28:50', 416, 0),
(3, 2, 'BTS', 0, 0, 'bts', 1, '0000-00-00 00:00:00', 417, '2018-04-18 17:21:00', 416, 0),
(4, 3, 'SIO 1', 0, 0, 'sio-1', 1, '0000-00-00 00:00:00', 417, '2018-04-18 08:29:19', 416, 0),
(5, 1, 'Sport', 1, 0, 'sport', 1, '0000-00-00 00:00:00', 419, '2018-04-16 17:09:21', 416, 0),
(6, 5, 'Basket', 1, 0, 'basket', 1, '0000-00-00 00:00:00', 419, '2018-04-16 17:09:46', 416, 0),
(7, 3, 'SIO 2', 0, 0, 'sio-2', 1, '0000-00-00 00:00:00', 417, '2018-04-18 08:29:44', 416, 0),
(8, 3, 'MUC 1', 0, 0, 'muc', 1, '2018-04-19 07:24:37', 417, '0000-00-00 00:00:00', 0, 0),
(9, 3, 'MUC 2', 0, 0, 'muc-2', 1, '2018-04-19 07:53:31', 417, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_groupe_utilisateur_map`
--

CREATE TABLE `#__arvie_groupe_utilisateur_map` (
  `id` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `groupe` int(11) NOT NULL,
  `date_deb` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_fin` datetime DEFAULT NULL,
  `role` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_groupe_utilisateur_map`
--

INSERT INTO `#__arvie_groupe_utilisateur_map` (`id`, `utilisateur`, `groupe`, `date_deb`, `date_fin`, `role`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', 1, '2018-04-26 17:18:10', 0, '2018-04-26 16:08:39', 416, 0),
(2, 3, 7, '0000-00-00 00:00:00', NULL, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 2, 7, '0000-00-00 00:00:00', NULL, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 4, 7, '0000-00-00 00:00:00', NULL, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 6, 2, '2016-09-01 00:00:00', NULL, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 7, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, '', 1, '2018-04-26 17:31:54', 0, '2018-04-26 15:32:02', 416, 0),
(7, 8, 2, '2018-04-17 00:00:00', '0000-00-00 00:00:00', 1, '', 1, '2018-04-26 17:18:40', 0, '2018-04-26 15:18:44', 416, 0),
(8, 9, 2, '2018-04-17 00:00:00', '0000-00-00 00:00:00', 1, '', 1, '2018-04-26 17:18:25', 0, '2018-04-26 15:18:28', 416, 0),
(9, 10, 4, '2018-04-17 00:00:00', NULL, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(10, 11, 4, '2018-04-17 00:00:00', NULL, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(11, 12, 4, '2018-04-17 00:00:00', NULL, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(12, 14, 4, '0000-00-00 00:00:00', NULL, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(13, 15, 7, '0000-00-00 00:00:00', NULL, 2, '', 1, '2018-04-17 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_messages`
--

CREATE TABLE `#__arvie_messages` (
  `id` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `discussion` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_messages`
--

INSERT INTO `#__arvie_messages` (`id`, `auteur`, `discussion`, `contenu`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 2, 2, 'Google site est une bonne solution pour créer son portfolio.', '', 1, '2018-04-22 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 10, 2, 'J\'ai eu quelques soucis avec WordPress.', '', 1, '2018-04-22 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 1, 2, 'Compte-tenu de votre connaissance de Joomla, l\'utilisation de ce CMS serait une bonne alternative.', '', 1, '2018-04-22 17:25:51', 416, '2018-04-26 15:47:51', 416, 0),
(4, 9, 1, 'Prévoir d\'arriver 30 mn au moins avant les épreuves.', '', 1, '2018-04-23 14:35:01', 416, '2018-04-24 13:08:58', 416, 0),
(5, 14, 1, 'N\'oubliez pas vos effaceurs, gommes et règles !', '', 1, '2018-04-25 13:50:28', 416, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_metiers`
--

CREATE TABLE `#__arvie_metiers` (
  `id` int(11) NOT NULL,
  `label` varchar(40) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_metiers`
--

INSERT INTO `#__arvie_metiers` (`id`, `label`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, '-', '-', 0, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(1, 'Informatique', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'Economie', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_metier_groupe_map`
--

CREATE TABLE `#__arvie_metier_groupe_map` (
  `id` int(11) NOT NULL,
  `metier` int(11) NOT NULL,
  `groupe` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_metier_groupe_map`
--

INSERT INTO `#__arvie_metier_groupe_map` (`id`, `metier`, `groupe`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 1, 4, '', 1, '0000-00-00 00:00:00', 0, '2018-04-27 09:28:06', 416, 0),
(2, 1, 7, '', 1, '0000-00-00 00:00:00', 0, '2018-04-27 09:28:20', 416, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_parrains`
--

CREATE TABLE `#__arvie_parrains` (
  `id` int(11) NOT NULL,
  `parrain` int(11) NOT NULL,
  `filleul` int(11) NOT NULL,
  `date_deb` date NOT NULL DEFAULT '0000-00-00',
  `date_fin` date NOT NULL DEFAULT '0000-00-00',
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_parrains`
--

INSERT INTO `#__arvie_parrains` (`id`, `parrain`, `filleul`, `date_deb`, `date_fin`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 3, 14, '2017-09-07', '2018-07-06', '', 1, '2018-04-24 00:00:00', 0, '2018-04-27 09:47:11', 416, 0),
(2, 2, 12, '2017-09-07', '2018-07-06', '', 1, '2018-04-27 09:43:41', 416, '0000-00-00 00:00:00', 0, 0),
(3, 4, 10, '2017-09-07', '2018-07-06', '', 1, '2018-04-27 09:46:51', 416, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_publications`
--

CREATE TABLE `#__arvie_publications` (
  `id` int(11) NOT NULL,
  `publication_parent` int(11) DEFAULT '0',
  `groupe` int(11) NOT NULL DEFAULT '1',
  `auteur` int(11) NOT NULL DEFAULT '1',
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date_publi` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `est_public` tinyint(1) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_publications`
--

INSERT INTO `#__arvie_publications` (`id`, `publication_parent`, `groupe`, `auteur`, `titre`, `texte`, `date_publi`, `est_public`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, NULL, 1, 1, '-', '', '0000-00-00 00:00:00', 0, '', 0, '2018-04-20 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(1, 0, 1, 1, 'Projet ArVie', '<p>Le projet ArVie est actuellement développé par les étudiants TSIO2 SLAM au Lycée Louis-Armand.</p>', '2017-10-05 00:00:00', 1, '', 1, '0000-00-00 00:00:00', 0, '2018-04-24 14:43:19', 416, 0),
(2, 0, 6, 2, 'Champion de basket', '<p>Je suis devenu champion du monde aujourd\'hui.</p>', '2017-12-14 00:00:00', 1, '', 1, '0000-00-00 00:00:00', 0, '2018-04-20 13:29:40', 416, 0),
(3, 1, 7, 2, 'Soutien en PHP', '<p>Je propose d\'aider ceux qui ont des problèmes en PHP.</p>', '2017-12-18 00:00:00', 1, '', 1, '0000-00-00 00:00:00', 0, '2018-04-27 10:02:13', 416, 0),
(4, 1, 7, 3, 'Les souris disparaissent', '<p>Une souris a disparue en salle SIO2.</p>', '2018-04-02 00:00:00', 1, '', 1, '2018-04-24 15:46:57', 0, '2018-04-27 09:56:53', 416, 0),
(5, 1, 7, 4, 'Bien dormir', '<p>Bonjour je vous conseille à tous de dormir 8h par jour MINIMUM ce qui améliore vos synapses (c\'est ce que je fais perso et ça marche pas mal)</p>', '2017-12-16 00:00:00', 1, '', 1, '0000-00-00 00:00:00', 0, '2018-04-27 09:56:07', 416, 0),
(6, 0, 4, 10, 'Recherche de stage TSIO1', '<p>Comment s\'organiser pour la recherche de stage.</p>', '2018-04-02 00:00:00', 0, '', 1, '2018-04-20 09:39:55', 416, '2018-04-27 09:54:05', 416, 0),
(7, 0, 1, 6, 'Remise des diplômes BTS', '<p>Remise des diplômes BTS à la mairie du XVe.</p>', '2017-09-21 00:00:00', 0, '', 1, '2018-04-25 14:56:40', 416, '0000-00-00 00:00:00', 0, 0),
(8, 0, 5, 3, 'Rencontre sportive', '<p>Un rencontre sportive est organisée au lycée Louis-Armand. Elle est ouverte à tous les lycéen et étudiants de BTS.</p>', '2018-04-09 00:00:00', 0, '', 1, '2018-04-25 17:43:37', 416, '2018-04-25 17:44:23', 416, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_roles`
--

CREATE TABLE `#__arvie_roles` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_roles`
--

INSERT INTO `#__arvie_roles` (`id`, `label`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, '-', '-', 0, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(1, 'Professeur', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'Élève', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'Délégué', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Suppléant', '', 1, '2018-04-26 11:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'Proviseur', '', 1, '2018-04-16 17:45:43', 416, '0000-00-00 00:00:00', 0, 0),
(6, 'Chef de travaux', '', 1, '2018-04-17 09:19:43', 416, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_utilisateurs`
--

CREATE TABLE `#__arvie_utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `date_naiss` date NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_utilisateurs`
--

INSERT INTO `#__arvie_utilisateurs` (`id`, `email`, `prenom`, `nom`, `mobile`, `date_naiss`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(0, 'noname@arvie.org', '-', '-', '', '1980-04-01', 'ingrid-note', 0, '2017-10-19 16:32:12', 416, '2018-04-16 18:01:39', 416, 0),
(1, 'inote@arvie.org', 'Ivan', 'NOTE', '', '1980-04-01', 'ingrid-note', 1, '2017-10-19 16:32:12', 416, '2018-04-20 09:27:52', 416, 0),
(2, 'jcode@arvie.org', 'Jean', 'CODE', '', '1998-03-01', 'code', 1, '2017-10-19 16:32:12', 416, '2018-04-16 17:41:13', 416, 0),
(3, 'phochon@arvie.org', 'Paul', 'HOCHON', '', '1996-10-01', 'brugnetzz', 1, '2017-10-19 16:32:12', 416, '2018-04-17 09:14:04', 416, 0),
(4, 'mtudor@arvie.org', 'Marie', 'TUDOR', '', '1996-05-09', 'dros', 1, '2017-10-19 16:32:12', 416, '2018-04-17 09:13:35', 416, 0),
(5, 'ibarbier@arvie.org', 'Iris', 'BARBIER', '', '1999-02-17', 'barbier', 1, '2018-04-17 09:38:03', 416, '2018-04-27 13:14:24', 417, 0),
(6, 'hboss@arvie.org', 'Hugo', 'BOSS', '', '1955-10-05', 'dupond', 1, '2017-12-10 17:25:09', 416, '2018-04-16 17:44:18', 416, 0),
(7, 'abrun@arvie.org', 'André', 'BRUN', '', '1971-12-16', 'brun', 1, '2018-04-17 09:16:00', 416, '2018-04-17 00:00:00', 0, 0),
(8, 'apages@arvie.org', 'Albert', 'PAGES', '', '1979-09-02', 'pages', 1, '2018-04-17 09:23:12', 416, '2018-04-17 09:24:57', 416, 0),
(9, 'jferrand@arvie.org', 'Julie', 'FERRAND', '', '1968-05-01', 'ferrand', 1, '2018-04-17 09:24:17', 416, '2018-04-20 09:31:15', 416, 0),
(10, 'mtresor@arvie.org', 'Marius', 'TRESOR', '', '1998-03-17', 'tresor', 1, '2018-04-17 09:35:12', 416, '2018-04-17 09:36:23', 416, 0),
(11, 'alesmains@arvie.org', 'Angel', 'LESMAINS', '', '1998-08-11', 'lesmains', 1, '2018-04-17 09:36:05', 416, '2018-04-17 00:00:00', 0, 0),
(12, 'vmoulin@arvie.org', 'Victor', 'MOULIN', '', '1999-06-18', 'moulin', 1, '2018-04-17 09:37:14', 416, '2018-04-17 00:00:00', 0, 0),
(14, 'sfrais@arvie.org', 'Sami', 'FRAIS', '', '1998-04-09', 'frais', 1, '2018-04-17 10:08:25', 416, '2018-04-17 00:00:00', 0, 0),
(15, 'kboulez@arvie.org', 'Karima', 'BOULEZ', '', '1999-04-17', 'boulez', 1, '2018-04-17 00:00:00', 0, '2018-04-17 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_utilisateur_discu_map`
--

CREATE TABLE `#__arvie_utilisateur_discu_map` (
  `id` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `discussion` int(11) NOT NULL,
  `est_admin` tinyint(1) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_utilisateur_discu_map`
--

INSERT INTO `#__arvie_utilisateur_discu_map` (`id`, `utilisateur`, `discussion`, `est_admin`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 1, 1, 0, '', 1, '2018-04-26 13:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 2, 2, 0, '', 1, '2018-04-26 13:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 3, 2, 0, '', 1, '2018-04-27 10:19:24', 416, '0000-00-00 00:00:00', 0, 0),
(4, 4, 2, 0, '', 1, '2018-04-27 10:19:46', 416, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__arvie_utilisateur_even_map`
--

CREATE TABLE `#__arvie_utilisateur_even_map` (
  `id` int(11) NOT NULL,
  `participant` int(11) NOT NULL,
  `evenement` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `#__arvie_utilisateur_even_map`
--

INSERT INTO `#__arvie_utilisateur_even_map` (`id`, `participant`, `evenement`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, 10, 3, '', 1, '2018-04-27 10:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 14, 2, '', 1, '2018-04-27 10:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 3, 3, '', 1, '2018-04-27 10:20:30', 416, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `#__arvie_abonnements`
--
ALTER TABLE `#__arvie_abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suivi` (`suivi`),
  ADD KEY `abonne` (`abonne`);

--
-- Index pour la table `#__arvie_discussions`
--
ALTER TABLE `#__arvie_discussions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__arvie_evenements`
--
ALTER TABLE `#__arvie_evenements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publication` (`publication`) USING BTREE;

--
-- Index pour la table `#__arvie_groupes`
--
ALTER TABLE `#__arvie_groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`groupe_parent`);

--
-- Index pour la table `#__arvie_groupe_utilisateur_map`
--
ALTER TABLE `#__arvie_groupe_utilisateur_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe` (`groupe`),
  ADD KEY `role` (`role`),
  ADD KEY `utilisateur` (`utilisateur`);

--
-- Index pour la table `#__arvie_messages`
--
ALTER TABLE `#__arvie_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `discussion` (`discussion`);

--
-- Index pour la table `#__arvie_metiers`
--
ALTER TABLE `#__arvie_metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__arvie_metier_groupe_map`
--
ALTER TABLE `#__arvie_metier_groupe_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metier` (`metier`),
  ADD KEY `groupe` (`groupe`);

--
-- Index pour la table `#__arvie_parrains`
--
ALTER TABLE `#__arvie_parrains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filleuil` (`filleul`),
  ADD KEY `parrain` (`parrain`),
  ADD KEY `filleul` (`filleul`);

--
-- Index pour la table `#__arvie_publications`
--
ALTER TABLE `#__arvie_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `parent` (`publication_parent`),
  ADD KEY `groupe` (`groupe`);

--
-- Index pour la table `#__arvie_roles`
--
ALTER TABLE `#__arvie_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__arvie_utilisateurs`
--
ALTER TABLE `#__arvie_utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__arvie_utilisateur_discu_map`
--
ALTER TABLE `#__arvie_utilisateur_discu_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion` (`discussion`),
  ADD KEY `utilisateur` (`utilisateur`);

--
-- Index pour la table `#__arvie_utilisateur_even_map`
--
ALTER TABLE `#__arvie_utilisateur_even_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenement` (`evenement`),
  ADD KEY `participant` (`participant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `#__arvie_abonnements`
--
ALTER TABLE `#__arvie_abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `#__arvie_discussions`
--
ALTER TABLE `#__arvie_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__arvie_evenements`
--
ALTER TABLE `#__arvie_evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `#__arvie_groupes`
--
ALTER TABLE `#__arvie_groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `#__arvie_groupe_utilisateur_map`
--
ALTER TABLE `#__arvie_groupe_utilisateur_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `#__arvie_messages`
--
ALTER TABLE `#__arvie_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `#__arvie_metiers`
--
ALTER TABLE `#__arvie_metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__arvie_metier_groupe_map`
--
ALTER TABLE `#__arvie_metier_groupe_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__arvie_parrains`
--
ALTER TABLE `#__arvie_parrains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `#__arvie_publications`
--
ALTER TABLE `#__arvie_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `#__arvie_roles`
--
ALTER TABLE `#__arvie_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `#__arvie_utilisateurs`
--
ALTER TABLE `#__arvie_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `#__arvie_utilisateur_discu_map`
--
ALTER TABLE `#__arvie_utilisateur_discu_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `#__arvie_utilisateur_even_map`
--
ALTER TABLE `#__arvie_utilisateur_even_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `#__arvie_abonnements`
--
ALTER TABLE `#__arvie_abonnements`
  ADD CONSTRAINT `#__arvie_abonnements_ibfk_1` FOREIGN KEY (`abonne`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_abonnements_ibfk_2` FOREIGN KEY (`suivi`) REFERENCES `#__arvie_utilisateurs` (`id`);

--
-- Contraintes pour la table `#__arvie_evenements`
--
ALTER TABLE `#__arvie_evenements`
  ADD CONSTRAINT `#__arvie_evenements_ibfk_1` FOREIGN KEY (`publication`) REFERENCES `#__arvie_publications` (`id`);

--
-- Contraintes pour la table `#__arvie_groupes`
--
ALTER TABLE `#__arvie_groupes`
  ADD CONSTRAINT `#__arvie_groupes_ibfk_1` FOREIGN KEY (`groupe_parent`) REFERENCES `#__arvie_groupes` (`id`);

--
-- Contraintes pour la table `#__arvie_groupe_utilisateur_map`
--
ALTER TABLE `#__arvie_groupe_utilisateur_map`
  ADD CONSTRAINT `#__arvie_groupe_utilisateur_map_ibfk_1` FOREIGN KEY (`groupe`) REFERENCES `#__arvie_groupes` (`id`),
  ADD CONSTRAINT `#__arvie_groupe_utilisateur_map_ibfk_2` FOREIGN KEY (`role`) REFERENCES `#__arvie_roles` (`id`),
  ADD CONSTRAINT `#__arvie_groupe_utilisateur_map_ibfk_3` FOREIGN KEY (`utilisateur`) REFERENCES `#__arvie_utilisateurs` (`id`);

--
-- Contraintes pour la table `#__arvie_messages`
--
ALTER TABLE `#__arvie_messages`
  ADD CONSTRAINT `#__arvie_messages_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_messages_ibfk_2` FOREIGN KEY (`discussion`) REFERENCES `#__arvie_discussions` (`id`);

--
-- Contraintes pour la table `#__arvie_metier_groupe_map`
--
ALTER TABLE `#__arvie_metier_groupe_map`
  ADD CONSTRAINT `#__arvie_metier_groupe_map_ibfk_1` FOREIGN KEY (`metier`) REFERENCES `#__arvie_metiers` (`id`),
  ADD CONSTRAINT `#__arvie_metier_groupe_map_ibfk_2` FOREIGN KEY (`groupe`) REFERENCES `#__arvie_groupes` (`id`);

--
-- Contraintes pour la table `#__arvie_parrains`
--
ALTER TABLE `#__arvie_parrains`
  ADD CONSTRAINT `#__arvie_parrains_ibfk_1` FOREIGN KEY (`filleul`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_parrains_ibfk_2` FOREIGN KEY (`parrain`) REFERENCES `#__arvie_utilisateurs` (`id`);

--
-- Contraintes pour la table `#__arvie_publications`
--
ALTER TABLE `#__arvie_publications`
  ADD CONSTRAINT `#__arvie_publications_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_publications_ibfk_2` FOREIGN KEY (`publication_parent`) REFERENCES `#__arvie_publications` (`id`),
  ADD CONSTRAINT `#__arvie_publications_ibfk_3` FOREIGN KEY (`groupe`) REFERENCES `#__arvie_groupes` (`id`);

--
-- Contraintes pour la table `#__arvie_utilisateur_discu_map`
--
ALTER TABLE `#__arvie_utilisateur_discu_map`
  ADD CONSTRAINT `#__arvie_utilisateur_discu_map_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_utilisateur_discu_map_ibfk_2` FOREIGN KEY (`discussion`) REFERENCES `#__arvie_discussions` (`id`);

--
-- Contraintes pour la table `#__arvie_utilisateur_even_map`
--
ALTER TABLE `#__arvie_utilisateur_even_map`
  ADD CONSTRAINT `#__arvie_utilisateur_even_map_ibfk_1` FOREIGN KEY (`participant`) REFERENCES `#__arvie_utilisateurs` (`id`),
  ADD CONSTRAINT `#__arvie_utilisateur_even_map_ibfk_2` FOREIGN KEY (`evenement`) REFERENCES `#__arvie_evenements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
