-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Juin 2017 à 17:02
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `n6line`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `contenu`, `position`, `fichier`, `date`) VALUES
(120, '', 'sdfdsf', '', '', '2017-06-07 15:20:10'),
(118, 'fddffd', 'fdsfff', 'df', '', '2017-06-07 15:18:09'),
(113, '', 'fjjhgj', '', '', '2017-06-07 14:52:50'),
(112, '', 'Salut :) ', '', '', '2017-06-07 10:45:14'),
(114, '', 'Super :)', '', '', '2017-06-07 15:00:17'),
(119, 'dsf', 'dgsgsd', 'dgsg', '', '2017-06-07 15:18:55'),
(117, '', 'dfsdfsfs', '', '', '2017-06-07 15:17:57');

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`id`, `fonction`) VALUES
(456, 'Secretaire'),
(456, 'Secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idUtil` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartient`
--

INSERT INTO `appartient` (`idUtil`, `idGroup`) VALUES
(1, 1),
(456, 2),
(24535, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `idutil` int(11) NOT NULL,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `idutil`, `contenu`, `date`) VALUES
(25, 2, 'fsdfds', '2017-06-07 13:37:01'),
(24, 2, 'gdgdf', '2017-06-07 13:31:04'),
(23, 2, 'gfdgfddgf', '2017-06-07 13:19:26'),
(22, 2, 'Ok', '2017-06-07 13:17:53'),
(21, 2, 'DFSFSDDSa', '2017-06-07 13:17:48'),
(20, 2, 'DFSFSDS', '2017-06-07 13:17:42'),
(19, 2, 'AAA', '2017-06-07 13:17:37'),
(18, 2, 'gdfgfdf', '2017-06-07 13:09:46'),
(26, 2, 'dgsgfdg', '2017-06-07 14:13:19'),
(27, 2, 'C\'est cool ;) ', '2017-06-07 14:17:29'),
(28, 2, 'C\'est super ', '2017-06-07 14:18:21'),
(29, 2, 'ffdg', '2017-06-07 14:18:26'),
(30, 2, ':)', '2017-06-07 14:20:28'),
(31, 2, 'OK', '2017-06-07 14:27:38'),
(32, 2, 'Tu dois être la ', '2017-06-07 14:28:05'),
(33, 2, 'Coucou c\'est maman ', '2017-06-07 14:41:12'),
(34, 2, 'Coucou c\'est maman ', '2017-06-07 14:44:06'),
(35, 2, '\'\'', '2017-06-07 14:44:13'),
(36, 2, 'Ok ', '2017-06-07 14:44:22'),
(37, 2, 'dfsdf', '2017-06-07 14:45:21'),
(38, 2, 'fdgdf', '2017-06-07 14:45:34'),
(39, 2, '\'\'\'', '2017-06-07 14:49:37'),
(40, 2, 'ok', '2017-06-07 14:50:51'),
(41, 2, 'Met toi au deb', '2017-06-07 14:51:00'),
(42, 2, '\'\'', '2017-06-07 14:51:15'),
(43, 2, ';', '2017-06-07 14:51:21'),
(44, 2, ';)', '2017-06-07 14:51:26'),
(45, 2, 'ghh', '2017-06-07 14:52:54'),
(46, 456, 'yrhffh', '2017-06-07 14:54:11'),
(47, 456, 'C\'est jean qui a commenté cette fois ci ;) ', '2017-06-07 14:54:28'),
(57, 1, 'Ok', '2017-06-07 15:19:02'),
(54, 456, 'ok', '2017-06-07 15:14:43'),
(59, 1, 'GFJOFDJ', '2017-06-07 15:23:36'),
(63, 456, 'dsfsd', '2017-06-07 15:31:29'),
(65, 456, 'egege', '2017-06-07 16:38:42');

-- --------------------------------------------------------

--
-- Structure de la table `commente`
--

CREATE TABLE `commente` (
  `id` int(11) NOT NULL,
  `idact` int(11) NOT NULL,
  `idcom` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commente`
--

INSERT INTO `commente` (`id`, `idact`, `idcom`) VALUES
(1, 112, 18),
(2, 112, 19),
(3, 112, 20),
(4, 112, 21),
(5, 112, 22),
(6, 111, 23),
(7, 112, 24),
(8, 112, 25),
(9, 112, 26),
(10, 112, 29),
(11, 112, 30),
(12, 111, 22),
(13, 112, 32),
(14, 112, 38),
(15, 112, 22),
(16, 112, 41),
(17, 112, 43),
(18, 112, 44),
(19, 113, 45),
(20, 113, 46),
(30, 119, 57),
(38, 120, 65),
(27, 114, 54),
(32, 120, 59),
(36, 119, 63);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `promotion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `promotion`, `filiere`) VALUES
(1, '2016/2019', '1A-IR');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `idUtil` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idAdmi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`idUtil`, `idEtudiant`, `idAdmi`) VALUES
(1, 1, 0),
(456, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`) VALUES
(1, 'Amoureux des fleurs'),
(1, 'Amoureux des fleurs'),
(2, 'Amoureux des Bryans');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idutil` int(11) NOT NULL,
  `idact` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `chemin`, `idutil`, `idact`) VALUES
(25, './uploaded/et.jpg', 456, 121);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `contenu` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `fichier`, `date`) VALUES
(1, 'ghshghdhgdf', '', '2017-06-21 04:16:46'),
(2, 'nregndfnfgnfd', '', '2017-06-20 08:25:29'),
(3, 'bgbsgsbs', '', '2017-06-21 00:00:00'),
(4, 'message', '', '2017-06-21 00:00:00'),
(5, 'brgbgrf', '', '2017-06-01 15:07:39'),
(6, 'hdgfhdfghfdghdfgh', '', '2017-06-01 15:12:08'),
(7, 'gsgdfgsfd', '', '2017-06-01 16:23:02'),
(8, 'gsdfgsdf', '', '2017-06-01 16:23:07'),
(9, 'sgdfgsfdgsd', '', '2017-06-01 16:23:11'),
(10, 'salut', '', '2017-06-01 16:23:54'),
(11, 'Coucou\r\n', '', '2017-06-01 16:24:16'),
(12, 'Coucou tes la\r\n', '', '2017-06-01 16:27:20'),
(13, 'coucou', '', '2017-06-01 16:27:41'),
(14, 'ca marche ?', '', '2017-06-01 16:27:53'),
(15, 'hey', '', '2017-06-01 16:31:27'),
(16, 'CA MARCHE', '', '2017-06-01 16:32:00'),
(17, 'Coucou tes la ?', '', '2017-06-01 16:33:44'),
(18, 'Oui ! Jsuis la\r\nComment ca va ?', '', '2017-06-01 16:34:00'),
(19, 'Yo mec !', '', '2017-06-02 07:13:19'),
(20, 'Salut ca va ?\r\n', '', '2017-06-02 08:19:25'),
(21, 'Oui et toi ?', '', '2017-06-02 08:19:36');

-- --------------------------------------------------------

--
-- Structure de la table `messtrans`
--

CREATE TABLE `messtrans` (
  `idexp` int(11) NOT NULL,
  `iddesti` int(11) NOT NULL,
  `idmessage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messtrans`
--

INSERT INTO `messtrans` (`idexp`, `iddesti`, `idmessage`) VALUES
(2, 1, 5),
(2, 1, 6),
(2, 1, 8),
(2, 1, 11),
(2, 2, 7),
(2, 456, 9),
(2, 456, 10),
(2, 456, 18),
(2, 456, 19),
(2, 456, 21),
(456, 1, 13),
(456, 1, 14),
(456, 1, 15),
(456, 2, 12),
(456, 2, 16),
(456, 2, 17),
(456, 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `iduti` int(11) NOT NULL,
  `idact` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`iduti`, `idact`) VALUES
(1, 119),
(1, 120),
(2, 112),
(2, 113),
(456, 114),
(456, 115),
(456, 117),
(456, 118);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `uha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `@xmpp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `connecte` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `uha`, `@xmpp`, `nom`, `prenom`, `age`, `adresse`, `description`, `mdp`, `connecte`) VALUES
(1, 'alexandre@uha.fr', 'alexandre@xmpp.fr', 'colicchio', 'alexandre', 23, '19 rue des VERGERS 68100 Mulhouse', '', 'gfbfds45gs26', 0),
(456, 'jean@uha.fr', 'jean@xmpp.fr', 'fdqbfsfd', 'jean', 23, '58 rue des VERGERS 68100 Mulhouse', 'ydwhdgfhxfhg', 'wvdf57', 1),
(2, 'alexandre.colicchio@uha.fr', 'alexandre.colicchio@xmpp.fr', 'colicchio', 'Alexandre', 23, '18 rue de l\'économie 68200 mulhouse', 'gsfqgqsgsdgsdq', 'azerty', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idUtil`,`idGroup`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commente`
--
ALTER TABLE `commente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`idUtil`,`idEtudiant`,`idAdmi`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messtrans`
--
ALTER TABLE `messtrans`
  ADD PRIMARY KEY (`idexp`,`iddesti`,`idmessage`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`iduti`,`idact`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `commente`
--
ALTER TABLE `commente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
