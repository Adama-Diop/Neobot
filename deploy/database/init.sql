-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 oct. 2026 à 12:52
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

-- --------------------------------------------------------

--
-- Structure de la table `base`
--

CREATE TABLE `base` (
  `id` int(11) NOT NULL,
  `locomotion` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `base`
--

INSERT INTO `base` (`id`, `locomotion`, `img`, `description`, `prix`) VALUES
(0, 'roulant', '', 'Rapide et fluide, parfaite pour se déplacer sans effort.', 3400.00),
(1, 'bipede', '', 'Classique et équilibré, parfait pour toutes les aventures.', 6000.00),
(2, 'rampant', '', 'Agile et compacte, idéale pour explorer les endroits difficiles d’accès.', 1800.00);

-- --------------------------------------------------------

--
-- Structure de la table `bras`
--

CREATE TABLE `bras` (
  `id` int(11) NOT NULL,
  `ref` varchar(5) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bras`
--

INSERT INTO `bras` (`id`, `ref`, `img`, `description`, `prix`) VALUES
(1, 'RB10', 'view/img/bras/RB10-bleu.png', 'Simple et polyvalent pour un usage quotidien.', 300.00),
(2, 'RB20', 'view/img/bras/RB20-bleu.png', 'Bras articulé offrant une grande mobilité.', 380.00),
(3, 'RB30', 'view/img/bras/RB30-bleu.png', 'Bras robuste conçu pour les tâches physiques.', 415.00),
(4, 'RB40', 'view/img/bras/RB40-bleu.png', 'Bras fin et précis pour les travaux délicats.', 472.00),
(5, 'RB50', 'view/img/bras/RB50-bleu.png', 'Main en pince pour saisir facilement les objets.', 322.00),
(6, 'RB60', 'view/img/bras/RB60-bleu.png', 'Main articulée avec cinq doigts pour plus de précision.', 500.00);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `mdp`, `email`, `date_inscription`, `role`) VALUES
(1, 'neobot', '$2y$10$MToxRN6Z98V2IteeOEcgdelBsWHw3z8Ujd4Ry2BlrKFe0.zIGfax2', 'neobot@gmail.com', '2026-06-04 14:48:09', 'admin'),
(2, 'Adama', '$2y$10$sTDS8N3mLWLFMl54G8QiQeHNNQeii9yeS6JwR99qGHl4TdyBjnwya', 'adamadiop2015@outlook.com', '2026-06-04 14:48:09', 'client'),
(3, 'test', '$2y$10$YtyZslwlMyRHYW9PeoTG5.fDFkSHRo2FVAJBrXGifh.uJA.Efft1a', 'test@test.com', NULL, 'client'),
(5, 'neobote', '$2y$10$xhof4pAityTVW8c5jrP9Wu0pX/s7NIurkufZhj4acPdfD4vNAyiVi', 'test@test.fr', NULL, 'client'),
(6, 'test2', '$2y$10$GdvUgRfnP/w032xHVuE8fuwjc5gQj9UE0SXBVn1wNxfW9woPZ/DPa', 'test2@gmail.com', NULL, 'client'),
(8, 'test3', '$2y$10$KxNxjFjiQ7n6IJPzXxMxQuMPjnME6OHwcP7yOWgPoIw9xKedILSAm', 'test3@gmail.com', NULL, 'client'),
(9, 'test4', '$2y$10$XT9GBUTOig8Uvtg.jfxUpOxrqM3GMfBNMcZRrsNFSanjaOwkMNzoO', 'test4@gmail.com', NULL, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `corps`
--

CREATE TABLE `corps` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `corps`
--

INSERT INTO `corps` (`id`, `ref`, `img`, `description`, `prix`) VALUES
(1, 'RC10', 'view/img/corps/RC10-bleu.png', 'Compact et arrondi, idéal pour un robot classique.', 2285.00),
(2, 'RC20', 'view/img/corps/RC20-bleu.png', 'Armure renforcée pour un look plus robuste.', 2350.00),
(3, 'RC30', 'view/img/corps/RC30-bleu.png', 'Corps sphérique avec un cœur lumineux central.', 2600.00),
(4, 'RC40', 'view/img/corps/RC40-bleu.png', 'Design moderne avec une large protection frontale.', 2622.00),
(5, 'RC50', 'view/img/corps/RC50-bleu.png', 'Léger et élégant avec une silhouette sportive.', 2899.99),
(6, 'RC60', 'view/img/corps/RC60-bleu.png', 'Corps renforcé avec un panneau lumineux.', 3100.00);

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` int(11) NOT NULL,
  `couleur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO `couleurs` (`id`, `couleur`) VALUES
(1, '#F54927'),
(2, '#7B2CBF'),
(3, '#2563EB'),
(4, '#16A34A'),
(5, '#FACC15'),
(6, '#111827');

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalites`
--

CREATE TABLE `fonctionnalites` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id`, `nom`, `description`, `prix`) VALUES
(1, 'Microphone', 'Capture audio', 150.00),
(2, 'Reconnaissance vocale', 'Permet de comprendre la voix', 140.00),
(3, 'Détection de bruit', 'Détecte les sons environnants', 300.00),
(4, 'Caméra', 'Capture des images', 900.00),
(5, 'Vision 3D', 'Analyse visuelle en trois dimensions', 1284.99),
(6, 'Reconnaissance faciale', 'Reconnaît les visages', 599.99),
(7, 'Capteur de distance', 'Mesure la distance des objets', 200.00),
(8, 'Capteur infrarouge', 'Détecte les infrarouges', 733.00),
(9, 'Lidar', 'Mesure les distances par laser', 512.99),
(10, 'Radar', 'Détecte des objets par ondes radio', 2000.00),
(11, 'Capteur de température', 'Mesure la température', 450.00),
(12, 'Capteur d’humidité', 'Mesure l’humidité', 450.00),
(13, 'Capteur de luminosité', 'Mesure la lumière ambiante', 320.00);

-- --------------------------------------------------------

--
-- Structure de la table `jambes`
--

CREATE TABLE `jambes` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jambes`
--

INSERT INTO `jambes` (`id`, `ref`, `img`, `description`, `prix`) VALUES
(1, 'RJ10', 'view/img/jambes/RJ10-bleu.png', 'Grandes jambes stables pour un robot robuste.', 810.00),
(2, 'RJ20', 'view/img/jambes/RJ20-bleu.png', 'Jambes fines et classiques pour un look élégant.', 788.00),
(3, 'RJ30', 'view/img/jambes/RJ30-bleu.png', 'Jambes puissantes avec des pieds larges.', 834.99),
(4, 'RJ40', 'view/img/jambes/RJ40-bleu.png', 'Jambes légères et rapides pour plus d\'agilité.', 861.00),
(5, 'RJ50', 'view/img/jambes/RJ50-bleu.png', 'Roues intégrées pour des déplacements rapides.', 712.00),
(6, 'RJ60', 'view/img/jambes/RJ60-bleu.png', 'Trois pieds articulés pour une excellente stabilité.', 830.00);

-- --------------------------------------------------------

--
-- Structure de la table `robots`
--

CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_base` int(11) NOT NULL,
  `id_tete` int(11) NOT NULL,
  `id_corps` int(11) NOT NULL,
  `id_bras` int(11) NOT NULL,
  `id_jambes` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `description` text NOT NULL,
  `couleur_tete` varchar(10) NOT NULL DEFAULT 'bleu',
  `couleur_corps` varchar(10) NOT NULL DEFAULT 'bleu',
  `couleur_bras` varchar(10) NOT NULL DEFAULT 'bleu',
  `couleur_jambes` varchar(10) NOT NULL DEFAULT 'bleu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `robots`
--

INSERT INTO `robots` (`id`, `nom`, `date_creation`, `id_base`, `id_tete`, `id_corps`, `id_bras`, `id_jambes`, `id_client`, `description`, `couleur_tete`, `couleur_corps`, `couleur_bras`, `couleur_jambes`) VALUES
(12, 'Robot1modification', '2026-10-09 14:35:38', 1, 6, 5, 6, 3, 1, '', 'bleu', 'bleu', 'bleu', 'bleu'),
(13, 'Robot2', '2026-10-11 19:04:21', 1, 4, 3, 2, 6, 1, 'mieux que le robot 1', 'bleu', 'bleu', 'bleu', 'bleu'),
(17, 'Robottest2', '2026-10-12 12:20:37', 2, 2, 2, 2, 2, 6, '', 'bleu', 'bleu', 'bleu', 'bleu'),
(18, 'ROBOT3', '2026-10-12 13:49:39', 0, 2, 1, 5, 2, 6, 'test robot', 'bleu', 'bleu', 'bleu', 'bleu'),
(22, 'robot admin', '2026-10-13 14:22:45', 0, 1, 1, 1, 1, 1, '', 'bleu', 'bleu', 'bleu', 'bleu'),
(23, 'robot multicolore', '2026-10-13 20:16:19', 1, 6, 3, 6, 2, 9, '', 'bleu', 'bleu', 'bleu', 'bleu'),
(24, 'mon robot', '2026-10-13 20:25:09', 1, 2, 1, 3, 1, 9, '', 'bleu', 'vert', 'rose', 'jaune'),
(25, 'chat rose', '2026-10-13 22:20:28', 1, 6, 3, 4, 3, 9, '', 'rose', 'rose', 'rose', 'rose'),
(26, 'coucou', '2026-10-14 10:35:39', 1, 6, 4, 2, 5, 1, '', 'vert', 'vert', 'vert', 'jaune'),
(27, 'salut', '2026-10-14 11:36:23', 1, 6, 1, 3, 2, 1, '', 'violet', 'rose', 'vert', 'violet');

-- --------------------------------------------------------

--
-- Structure de la table `robot_fonctionnalites`
--

CREATE TABLE `robot_fonctionnalites` (
  `id_robot` int(11) NOT NULL,
  `id_fonctionnalite` int(11) NOT NULL,
  `prix_applique` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `robot_fonctionnalites`
--

INSERT INTO `robot_fonctionnalites` (`id_robot`, `id_fonctionnalite`, `prix_applique`) VALUES
(13, 1, 150.00),
(13, 4, 900.00),
(13, 8, 733.00),
(13, 10, 2000.00),
(13, 13, 320.00),
(17, 2, 140.00),
(17, 6, 599.99),
(17, 7, 200.00),
(18, 8, 733.00),
(18, 10, 2000.00),
(18, 12, 450.00),
(18, 13, 320.00),
(22, 1, 150.00),
(22, 6, 599.99),
(22, 9, 512.99),
(22, 10, 2000.00),
(22, 11, 450.00),
(22, 13, 320.00),
(23, 7, 200.00),
(23, 8, 733.00),
(23, 9, 512.99),
(23, 11, 450.00),
(24, 4, 900.00),
(24, 12, 450.00),
(25, 3, 300.00),
(25, 5, 1284.99),
(25, 6, 599.99),
(26, 7, 200.00),
(26, 10, 2000.00),
(26, 11, 450.00),
(26, 13, 320.00),
(27, 4, 900.00),
(27, 6, 599.99),
(27, 7, 200.00),
(27, 12, 450.00),
(27, 13, 320.00);

-- --------------------------------------------------------

--
-- Structure de la table `tete`
--

CREATE TABLE `tete` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tete`
--

INSERT INTO `tete` (`id`, `ref`, `img`, `description`, `prix`) VALUES
(1, 'RT10', 'view/img/tete/RT10-bleu.png', 'Classique et souriante, avec une petite antenne.', 1099.99),
(2, 'RT20', 'view/img/tete/RT20-bleu.png', 'Dynamique avec une visière originale et expressive.', 0.00),
(3, 'RT30', 'view/img/tete/RT30-bleu.png', 'Moderne avec deux grands yeux lumineux.', 0.00),
(4, 'RT40', 'view/img/tete/RT40-bleu.png', 'Minimaliste avec un écran large et élégant.', 0.00),
(5, 'RT50', 'view/img/tete/RT50-bleu.png', 'Futuriste avec une forme ronde et un œil central.', 0.00),
(6, 'RT60', 'view/img/tete/RT60-bleu.png', 'Adorable avec des oreilles de chat.', 0.00);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`pseudo`);

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
-- Index pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `robots_ibfk_1` (`id_corps`),
  ADD KEY `robots_ibfk_2` (`id_bras`),
  ADD KEY `robots_ibfk_3` (`id_jambes`),
  ADD KEY `robots_ibfk_5` (`id_tete`),
  ADD KEY `robots_ibfk_6` (`id_base`);

--
-- Index pour la table `robot_fonctionnalites`
--
ALTER TABLE `robot_fonctionnalites`
  ADD PRIMARY KEY (`id_robot`,`id_fonctionnalite`),
  ADD KEY `id_fonctionnalite` (`id_fonctionnalite`);

--
-- Index pour la table `tete`
--
ALTER TABLE `tete`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `base`
--
ALTER TABLE `base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `bras`
--
ALTER TABLE `bras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `corps`
--
ALTER TABLE `corps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `jambes`
--
ALTER TABLE `jambes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `tete`
--
ALTER TABLE `tete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `robots`
--
ALTER TABLE `robots`
  ADD CONSTRAINT `robots_ibfk_1` FOREIGN KEY (`id_corps`) REFERENCES `corps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `robots_ibfk_2` FOREIGN KEY (`id_bras`) REFERENCES `bras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `robots_ibfk_3` FOREIGN KEY (`id_jambes`) REFERENCES `jambes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `robots_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `robots_ibfk_5` FOREIGN KEY (`id_tete`) REFERENCES `tete` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `robots_ibfk_6` FOREIGN KEY (`id_base`) REFERENCES `base` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `robot_fonctionnalites`
--
ALTER TABLE `robot_fonctionnalites`
  ADD CONSTRAINT `robot_fonctionnalites_ibfk_1` FOREIGN KEY (`id_robot`) REFERENCES `robots` (`id`),
  ADD CONSTRAINT `robot_fonctionnalites_ibfk_2` FOREIGN KEY (`id_fonctionnalite`) REFERENCES `fonctionnalites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
