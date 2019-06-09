-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 08 Juin 2019 à 16:10
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thomas`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`) VALUES
(1, 'HTML, CSS'),
(2, 'PHP');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `etablissement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id`, `nom`, `date_debut`, `date_fin`, `etablissement`) VALUES
(1, 'Serveur', '2018-07-01', '2018-08-31', 'Lycée Gustave Eiffel (Bordeaux)');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_diplome` date DEFAULT NULL,
  `etablissement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `nom`, `date_diplome`, `etablissement`) VALUES
(1, 'BAC STI2D SIN', '2018-07-01', 'Lycée Gustave Eiffel (Bordeaux)');

-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `moi`
--

CREATE TABLE `moi` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `travail` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `qui_je_suis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `moi`
--

INSERT INTO `moi` (`id`, `prenom`, `nom`, `date_de_naissance`, `travail`, `mail`, `numero`, `qui_je_suis`) VALUES
(1, 'Thomas', 'Thierry', '2000-04-14', 'Etudiant en informatique', 'thomas.thierry@ynov.com', '06 77 88 55 44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend, libero non pharetra dapibus, turpis diam placerat ante, eu molestie orci nisi eget massa. Aenean vulputate orci elementum mollis fermentum. Donec sollicitudin egestas dolor, eu rutrum massa interdum ut. In eu pretium mi, eu dapibus quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vitae orci quis risus lacinia egestas non at dui. Fusce et dui felis. Praesent posuere faucibus turpis placerat fermentum. Donec vitae facilisis enim. Morbi dapibus lobortis erat eu pulvinar. Ut placerat lobortis nisi, vitae dapibus dolor mollis ac. Donec semper maximus metus quis dictum. Maecenas sed efficitur lacus. Aliquam eget elit et eros varius posuere pharetra vel nibh. Etiam congue diam sit amet metus tincidunt placerat.');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `description`) VALUES
(1, 'CV connecté', 'Ici-même'),
(2, 'Plante connectée', 'Plante connectée grâce à une raspberry.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moi`
--
ALTER TABLE `moi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `moi`
--
ALTER TABLE `moi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
