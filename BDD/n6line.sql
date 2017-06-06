-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 04 Juin 2017 à 18:37
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
(34, 'gzegergez', 'gergez', '', '', '2017-06-03 14:20:57'),
(35, 'vetvevfd', 'vdfvdfvd', '', '', '2017-06-03 14:23:33'),
(36, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:24:25'),
(37, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:25:21'),
(38, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:25:38'),
(39, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:26:19'),
(40, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:27:19'),
(41, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:28:41'),
(42, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:29:12'),
(43, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:29:28'),
(44, 'vdvqsvsqdv', 'sqvsqdvq', '', '', '2017-06-03 14:30:25'),
(45, 'vaezrvfeqvfdvfd', 'vfdsvfdvvdfs', '', '', '2017-06-03 14:30:37'),
(46, 'vsvqvqvsv', 'vsdfvds', '', '', '2017-06-03 14:31:08'),
(47, 'vsvqvqvsv', 'vsdfvds', '', '', '2017-06-03 14:31:26'),
(48, 'vvdsfvdsfv', 'vdsfvdsf', '', '', '2017-06-03 14:33:24'),
(49, 'verrve', 'veververv', '', '', '2017-06-03 14:33:46'),
(33, 'bggdbdfgbd', 'bfgdbfdg', '', '', '2017-06-03 14:20:10'),
(32, 'vqfdfsvfvsdfv', 'dsfvdsvds', '', '', '2017-06-03 14:17:35'),
(31, 'bgdbgfbdgfbgfd', 'bfdbfdgbfdg', '', '', '2017-06-03 14:14:50');

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
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 62);

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
(2, 'alexandre.colicchio@uha.fr', 'alexandre.colicchio@xmpp.fr', 'colicchio', 'Alexandre', 23, '18 rue de l\'économie 68200 mulhouse', 'gsfqgqsgsdgsdq', 'azerty', 1);

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
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`idUtil`,`idEtudiant`,`idAdmi`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
