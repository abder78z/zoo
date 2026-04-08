-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 08 avr. 2026 à 11:51
-- Version du serveur : 8.0.45
-- Version de PHP : 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `reference_race` int NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `reference_race`, `date_de_naissance`, `sexe`, `pseudo`, `commentaire`, `image`) VALUES
(2, 2, '2020-03-15', 'F', 'Marty', 'Zebre tres rapide', 'zebre.jpg'),
(3, 4, '2019-08-20', 'M', 'Flipper', 'Tres joueur', 'images-manquantes-articles-2.jpg'),
(4, 5, '2026-03-04', 'M', 'Samy', 't-rex très actif', 'cover-r4x3w1200-659e9aebb9308-image-1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int NOT NULL,
  `identifiant` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fonction` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `identifiant`, `mot_de_passe`, `fonction`) VALUES
(1, 'jdupont', 'admin123', 'Directeur'),
(2, 'cmartin', 'test123', 'Employe');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `id` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_enclos` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `capacite_maximale` int NOT NULL,
  `taille` int DEFAULT NULL,
  `presence_eau` tinyint(1) NOT NULL DEFAULT '0',
  `responsable_enclos` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `nom_enclos`, `capacite_maximale`, `taille`, `presence_eau`, `responsable_enclos`) VALUES
('A01', 'Savane', 10, 500, 0, 1),
('B02', 'Bassin', 6, 300, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE `especes` (
  `id` int NOT NULL,
  `nom_race` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `type_nourriture` enum('Carnivore','Herbivore','Omnivore') COLLATE utf8mb4_general_ci NOT NULL,
  `duree_de_vie` int NOT NULL,
  `animal_aquatique` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `especes`
--

INSERT INTO `especes` (`id`, `nom_race`, `type_nourriture`, `duree_de_vie`, `animal_aquatique`) VALUES
(2, 'Zebre', 'Herbivore', 25, 0),
(4, 'Dauphin', 'Carnivore', 30, 1),
(5, 'Dinosaure', 'Carnivore', 20, 0),
(6, 'uehgnf', 'Herbivore', 123, 1);

-- --------------------------------------------------------

--
-- Structure de la table `loc_animaux`
--

CREATE TABLE `loc_animaux` (
  `id` int NOT NULL,
  `reference_animal` int NOT NULL,
  `reference_enclos` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `loc_animaux`
--

INSERT INTO `loc_animaux` (`id`, `reference_animal`, `reference_enclos`, `date_arrivee`, `date_sortie`) VALUES
(2, 2, 'A01', '2024-02-01', NULL),
(3, 3, 'B02', '2024-03-05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` enum('H','F') COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fonction` enum('Directeur','Employe') COLLATE utf8mb4_general_ci NOT NULL,
  `salaire` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `prenom`, `date_de_naissance`, `sexe`, `login`, `mot_de_passe`, `fonction`, `salaire`) VALUES
(1, 'Dupont', 'Jean', '1980-05-12', 'H', 'jdupont', 'admin123', 'Directeur', 3200.50);

-- --------------------------------------------------------

--
-- Structure de la table `soigneurs`
--

CREATE TABLE `soigneurs` (
  `id` int NOT NULL,
  `reference_personnel` int NOT NULL,
  `reference_race` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_animaux_especes` (`reference_race`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enclos_responsable` (`responsable_enclos`);

--
-- Index pour la table `especes`
--
ALTER TABLE `especes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loc_animaux_animal` (`reference_animal`),
  ADD KEY `fk_loc_animaux_enclos` (`reference_enclos`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `soigneurs`
--
ALTER TABLE `soigneurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soigneurs_personnel` (`reference_personnel`),
  ADD KEY `fk_soigneurs_espece` (`reference_race`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `especes`
--
ALTER TABLE `especes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `soigneurs`
--
ALTER TABLE `soigneurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `fk_animaux_especes` FOREIGN KEY (`reference_race`) REFERENCES `especes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `fk_enclos_responsable` FOREIGN KEY (`responsable_enclos`) REFERENCES `personnels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD CONSTRAINT `fk_loc_animaux_animal` FOREIGN KEY (`reference_animal`) REFERENCES `animaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loc_animaux_enclos` FOREIGN KEY (`reference_enclos`) REFERENCES `enclos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `soigneurs`
--
ALTER TABLE `soigneurs`
  ADD CONSTRAINT `fk_soigneurs_espece` FOREIGN KEY (`reference_race`) REFERENCES `especes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_soigneurs_personnel` FOREIGN KEY (`reference_personnel`) REFERENCES `personnels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
