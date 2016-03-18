-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 12 Mars 2016 à 13:14
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `confgest`
--

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `id_con` int(11) NOT NULL,
  `code_con` varchar(10) DEFAULT NULL,
  `libelle_con` varchar(120) DEFAULT NULL,
  `description_con` text,
  `etat_con` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conference`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_per` int(11) NOT NULL,
  `sexe_per` varchar(1) DEFAULT NULL,
  `nom_per` varchar(25) DEFAULT NULL,
  `prenom_per` varchar(50) DEFAULT NULL,
  `email_per` varchar(100) DEFAULT NULL,
  `telephone_per` varchar(15) DEFAULT NULL,
  `fonction_per` varchar(50) DEFAULT NULL,
  `datecre_per` date DEFAULT NULL,
  `etat_per` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id_ses` int(11) NOT NULL,
  `llibelle_ses` varchar(100) DEFAULT NULL,
  `dateprevue_ses` date NOT NULL,
  `description_ses` text,
  `etat_ses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_util` int(11) NOT NULL,
  `nom_util` varchar(25) DEFAULT NULL,
  `motde_passe_util` varchar(25) DEFAULT NULL,
  `niveau_d_acce_util` int(11) DEFAULT NULL,
  `date_connexion_util` date DEFAULT NULL,
  `id_per` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id_con`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_per`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_ses`);

  --
-- Index pour la table `session_conference`
--
ALTER TABLE `session_conference`
  ADD PRIMARY KEY (`id_sc`);

--
-- Index pour la table `participer_conference`
--
ALTER TABLE `participer_conference`
  ADD PRIMARY KEY (`id_pconf`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_util`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  --
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_ses` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `session_conference`
--
ALTER TABLE `session_conference`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `participer_conference`
--
ALTER TABLE `participer_conference`
  MODIFY `id_pconf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT;

  



ALTER TABLE `session_conference`
ADD FOREIGN KEY (id_con) REFERENCES conference (id_con);


ALTER TABLE `session_conference`
ADD FOREIGN KEY (id_ses) REFERENCES sessions (id_ses);

 ALTER TABLE `participer_conference`
ADD FOREIGN KEY (id_per) REFERENCES personne (id_per);

ALTER TABLE `participer_conference`
ADD FOREIGN KEY (id_sc) REFERENCES session_conference (id_sc);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
