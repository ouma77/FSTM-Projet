-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 jan. 2020 à 16:52
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admini`
--

CREATE TABLE `admini` (
  `id_ad` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admini`
--

INSERT INTO `admini` (`id_ad`, `pseudo`, `code`) VALUES
(1, 'fst', '123');

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id_cal` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `intitulé` varchar(255) NOT NULL,
  `thème` varchar(255) NOT NULL,
  `date_db` datetime(6) NOT NULL,
  `date_fn` datetime(6) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_ev` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `intitulé` varchar(255) NOT NULL,
  `thème` varchar(255) NOT NULL,
  `date_db` datetime(6) NOT NULL,
  `date_fn` datetime(6) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `organisatuer`
--

CREATE TABLE `organisatuer` (
  `id_org` int(11) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `profession` varchar(45) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prénom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `organisatuer`
--

INSERT INTO `organisatuer` (`id_org`, `mail`, `profession`, `nom`, `prénom`) VALUES
(1, 'haha@gmail.com', 'hahaha', 'Chatri', 'Fatiha');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_ev` int(255) NOT NULL,
  `id_salle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`id_ad`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_cal`),
  ADD KEY `id_org` (`id_org`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_ev`),
  ADD KEY `organisateur` (`id_org`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `organisatuer`
--
ALTER TABLE `organisatuer`
  ADD PRIMARY KEY (`id_org`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD KEY `id_ev` (`id_ev`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admini`
--
ALTER TABLE `admini`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id_cal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `organisatuer`
--
ALTER TABLE `organisatuer`
  MODIFY `id_org` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`id_org`) REFERENCES `organisatuer` (`id_org`),
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `organisateur` FOREIGN KEY (`id_org`) REFERENCES `organisatuer` (`id_org`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `events` FOREIGN KEY (`id_ev`) REFERENCES `events` (`id_ev`),
  ADD CONSTRAINT `salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

