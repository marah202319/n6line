-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Juin 2017 à 22:34
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

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
  `fichier` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `contenu`, `fichier`, `date`) VALUES
(1, 'Premiere actualite', 'Ceci est la première actualité de notre site', '', '2017-05-16'),
(2, 'Deuxieme actualité', 'Ceci est la deuxième actualité de notre site', '', '2017-05-27'),
(3, 'Troisieme actualité', 'Jamais deux sans trois !', '', '2017-05-31'),
(4, 'Pour pas changer', 'Et une quatrième actualité', '', '2017-05-01'),
(5, 'Un titre original', 'avec un contenu original', '', '2017-05-11');

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
-- Structure de la table `anciens`
--

CREATE TABLE `anciens` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `filliere` varchar(100) NOT NULL,
  `fonction` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anciens`
--

INSERT INTO `anciens` (`id`, `nom`, `prenom`, `filliere`, `fonction`) VALUES
(1, 'hamza', 'hedraf', 'Informatique et réseaux', 'etudiant '),
(2, 'albert', 'einstien', 'Automatique et systèmes embarqués', 'etudiant'),
(3, 'hamza', 'azaro', 'Mécanique', 'etudiant '),
(4, 'albert', 'bastober', 'Textile', 'etudiant');

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
  `nom` varchar(100) NOT NULL,
  `id_admin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `id_admin`) VALUES
(1, 'Groupe des IR', 1),
(2, 'Groupe des AS', 2),
(3, 'Groupe des IR', 1),
(4, 'Groupe des AS', 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `contenu` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messtrans`
--

CREATE TABLE `messtrans` (
  `idexp` int(11) NOT NULL,
  `iddesti` int(11) NOT NULL,
  `idmessage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 1),
(1, 3),
(1, 5),
(2, 2),
(456, 4);

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
  `date` date NOT NULL,
  `adresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `connecte` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `uha`, `@xmpp`, `nom`, `prenom`, `date`, `adresse`, `mdp`, `connecte`) VALUES
(1, 'alexandre@uha.fr', 'alexandre@xmpp.fr', 'colicchio', 'alexandre', '1996-10-20', '19 rue des VERGERS 68100 Mulhouse', 'gfbfds45gs26', 0),
(456, 'jean@uha.fr', 'jean@xmpp.fr', 'fdqbfsfd', 'jean', '1990-06-15', '58 rue des VERGERS 68100 Mulhouse', 'wvdf57', 0),
(2, 'alexandre.colicchio@uha.fr', 'alexandre.colicchio@xmpp.fr', 'colicchio', 'Alexandre', '1994-05-15', '18 rue de l\'économie 68200 mulhouse', 'azerty', 0);

--
-- Index pour les tables exportées
--

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
-- Index pour la table `messtrans`
--
ALTER TABLE `messtrans`
  ADD PRIMARY KEY (`idexp`,`iddesti`,`idmessage`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`iduti`,`idact`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
