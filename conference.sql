-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Mars 2016 à 21:24
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conference`
--

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `id_con` int(11) NOT NULL,
  `code_con` varchar(10) NOT NULL,
  `libelle_con` varchar(120) NOT NULL,
  `description_con` text NOT NULL,
  `id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conference`
--

INSERT INTO `conference` (`id_con`, `code_con`, `libelle_con`, `description_con`, `id_salle`) VALUES
(1, 'J2ee_conf', 'J2EE', 'cours java', 9),
(2, 'sal12:13', 'Big Data', 'Master the technics of big data', 2),
(6, 'Conf_elec', 'Electronic embarquÃ© conference', 'Ã©lectroniques', 2),
(8, 'Chimie_con', 'Chimie matÃ©riaux', 'conference in chimical', 4),
(11, 'php-conf', 'conf-pdo', 'maitriser le pdo', 2);

-- --------------------------------------------------------

--
-- Structure de la table `participer_conference`
--

CREATE TABLE `participer_conference` (
  `id_pconf` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `id_sc` int(11) NOT NULL,
  `typeparticipant_pconf` varchar(25) DEFAULT NULL,
  `date_pconf` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_per` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL,
  `sexe_per` varchar(1) DEFAULT NULL,
  `nom_per` varchar(25) DEFAULT NULL,
  `prenom_per` varchar(50) DEFAULT NULL,
  `email_per` varchar(100) DEFAULT NULL,
  `telephone_per` varchar(15) DEFAULT NULL,
  `fonction_per` varchar(50) DEFAULT NULL,
  `datecre_per` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id_per`, `username`, `password`, `sexe_per`, `nom_per`, `prenom_per`, `email_per`, `telephone_per`, `fonction_per`, `datecre_per`) VALUES
(19, 'slouma', 'marouan', 'H', 'marouan', 'Marouan', 'mar.mour@ymail.com', '0664433412', 'Admin', '2016-03-30 16:52:19'),
(23, 'marouan', 'marouan', 'M', 'mar', 'jjhjhjh', 'marouen@gmail.com', '4578962', 'admin', '2016-03-30 19:21:49'),
(27, 'zidna', 'zidna', 'H', 'zidna', 'ibrahim', 'zidna.com', '0664433412', 'Chef de projet', '2016-03-30 16:53:41'),
(28, 'ramzi', 'ramzi', 'H', 'Safia', 'Marouan', 'ramzi@y.com', '0664433412', 'Chef de projet', '2016-03-30 19:23:01');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(100) NOT NULL,
  `nb_places_salle` int(30) NOT NULL,
  `type_salle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `nb_places_salle`, `type_salle`) VALUES
(1, 'fggfg', 45, 'amphie'),
(2, 'salle info', 22, 'petite salle'),
(3, 'code', 40, 'desc'),
(4, 'Electronic salle', 50, 'Petite amphie'),
(9, 'Amphie 3', 135, 'grande amphie'),
(10, 'salle de confÃ©rence', 75, 'grande salle');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id_ses` int(11) NOT NULL,
  `libelle_ses` varchar(100) DEFAULT NULL,
  `dateprevue_ses` date NOT NULL,
  `description_ses` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id_ses`, `libelle_ses`, `dateprevue_ses`, `description_ses`) VALUES
(1, 'science naturelle', '2016-03-31', 'session science'),
(2, 'Session Science', '2016-04-22', 'session en cours'),
(3, 'J2EE session', '1970-01-01', 'master j2ee technics'),
(4, 'J2EE session', '1970-01-01', 'master java entreprise'),
(7, 'Electronic conference session', '0000-00-00', 'electronic technics'),
(9, 'info session', '2016-03-31', 'maitriser informatique avancÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `session_conference`
--

CREATE TABLE `session_conference` (
  `id_sc` int(11) NOT NULL,
  `id_con` int(11) NOT NULL,
  `id_ses` int(11) NOT NULL,
  `dateeffective_sc` datetime NOT NULL,
  `etat_sc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session_conference`
--

INSERT INTO `session_conference` (`id_sc`, `id_con`, `id_ses`, `dateeffective_sc`, `etat_sc`) VALUES
(1, 1, 4, '2016-03-31 00:00:00', 'valide'),
(3, 2, 2, '2016-04-08 00:00:00', 'pas validÃ©'),
(4, 8, 2, '2016-03-31 00:00:00', 'en cours'),
(5, 6, 7, '2016-04-19 00:00:00', 'formation');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id_con`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `participer_conference`
--
ALTER TABLE `participer_conference`
  ADD PRIMARY KEY (`id_pconf`),
  ADD KEY `id_per` (`id_per`),
  ADD KEY `id_sc` (`id_sc`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_per`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_ses`);

--
-- Index pour la table `session_conference`
--
ALTER TABLE `session_conference`
  ADD PRIMARY KEY (`id_sc`),
  ADD KEY `id_con` (`id_con`),
  ADD KEY `id_ses` (`id_ses`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `participer_conference`
--
ALTER TABLE `participer_conference`
  MODIFY `id_pconf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_ses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `session_conference`
--
ALTER TABLE `session_conference`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);

--
-- Contraintes pour la table `participer_conference`
--
ALTER TABLE `participer_conference`
  ADD CONSTRAINT `participer_conference_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personne` (`id_per`),
  ADD CONSTRAINT `participer_conference_ibfk_2` FOREIGN KEY (`id_sc`) REFERENCES `session_conference` (`id_sc`);

--
-- Contraintes pour la table `session_conference`
--
ALTER TABLE `session_conference`
  ADD CONSTRAINT `session_conference_ibfk_1` FOREIGN KEY (`id_con`) REFERENCES `conference` (`id_con`),
  ADD CONSTRAINT `session_conference_ibfk_2` FOREIGN KEY (`id_ses`) REFERENCES `sessions` (`id_ses`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
