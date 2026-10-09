-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 oct. 2026 à 15:33
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `neobot`
--
CREATE DATABASE IF NOT EXISTS `neobot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `neobot`;

-- --------------------------------------------------------

--
-- Structure de la table `bras`
--

CREATE TABLE `bras` (
  `id` int(11) NOT NULL,
  `ref` varchar(5) NOT NULL,
  `mains` tinyint(1) NOT NULL,
  `id_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bras`
--

INSERT INTO `bras` (`id`, `ref`, `mains`, `id_couleur`) VALUES
(1, 'XP30', 1, 0),
(2, 'XP40', 0, 0),
(3, 'XP50', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `date_inscription` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `mdp`, `email`, `date_inscription`) VALUES
(1, 'neobot', '$2y$10$MToxRN6Z98V2IteeOEcgdelBsWHw3z8Ujd4Ry2BlrKFe0.zIGfax2', 'neobot@gmail.com', '2026-06-04 14:48:09'),
(2, 'Adama', '$2y$10$sTDS8N3mLWLFMl54G8QiQeHNNQeii9yeS6JwR99qGHl4TdyBjnwya', 'adamadiop2015@outlook.com', '2026-06-04 14:48:09'),
(3, 'test', '$2y$10$YtyZslwlMyRHYW9PeoTG5.fDFkSHRo2FVAJBrXGifh.uJA.Efft1a', 'test@test.com', NULL),
(5, 'neobote', '$2y$10$xhof4pAityTVW8c5jrP9Wu0pX/s7NIurkufZhj4acPdfD4vNAyiVi', 'test@test.fr', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `corps`
--

CREATE TABLE `corps` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `id_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `corps`
--

INSERT INTO `corps` (`id`, `ref`, `id_couleur`) VALUES
(1, 'WnP0', 0),
(2, 'ZW01', 0),
(3, 'ZG02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` int(11) NOT NULL,
  `couleur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jambes`
--

CREATE TABLE `jambes` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `bipede` tinyint(1) NOT NULL,
  `id_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jambes`
--

INSERT INTO `jambes` (`id`, `ref`, `bipede`, `id_couleur`) VALUES
(1, 'XP930', 1, 0),
(2, 'XP-60', 0, 0),
(3, 'XP-70', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `robots`
--

CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_corps` int(11) NOT NULL,
  `id_bras` int(11) NOT NULL,
  `id_jambes` int(11) NOT NULL,
  `professionnel` tinyint(1) NOT NULL,
  `microphone` tinyint(1) NOT NULL,
  `reconnaissance_voc` tinyint(1) NOT NULL,
  `detection_bruit` tinyint(1) NOT NULL,
  `camera` tinyint(1) NOT NULL,
  `vision_3d` tinyint(1) NOT NULL,
  `reconnaissance_fac` tinyint(1) NOT NULL,
  `capt_distance` tinyint(1) NOT NULL,
  `capt_infrarouge` tinyint(1) NOT NULL,
  `lidar` tinyint(1) NOT NULL,
  `radar` tinyint(1) NOT NULL,
  `temperature` tinyint(1) NOT NULL,
  `humidite` tinyint(1) NOT NULL,
  `luminosite` tinyint(1) NOT NULL,
  `id_couleur` varchar(20) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tete`
--

CREATE TABLE `tete` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tete`
--

INSERT INTO `tete` (`id`, `ref`) VALUES
(1, 'WRP0'),
(2, 'HP_25'),
(3, 'HY-65');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bras`
--
ALTER TABLE `bras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `corps`
--
ALTER TABLE `corps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jambes`
--
ALTER TABLE `jambes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tete`
--
ALTER TABLE `tete`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bras`
--
ALTER TABLE `bras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `corps`
--
ALTER TABLE `corps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jambes`
--
ALTER TABLE `jambes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tete`
--
ALTER TABLE `tete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
