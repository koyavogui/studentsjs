-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 mars 2021 à 11:46
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_attendance`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `idProfesseur` int(11) NOT NULL,
  `dateCours` date NOT NULL DEFAULT current_timestamp(),
  `heuredebutCours` time NOT NULL,
  `heuredefinCours` time NOT NULL DEFAULT current_timestamp(),
  `statusducours` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `idProfesseur`, `dateCours`, `heuredebutCours`, `heuredefinCours`, `statusducours`) VALUES
(4, 1, '2021-02-21', '09:29:23', '09:29:23', 1),
(5, 1, '2021-02-22', '09:30:51', '09:30:51', 1),
(6, 1, '2021-02-23', '09:32:35', '23:59:59', 1),
(8, 1, '2021-02-24', '01:39:22', '01:39:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idStudent` int(11) NOT NULL,
  `nomStudent` varchar(100) NOT NULL,
  `prenomStudent` varchar(100) NOT NULL,
  `genreStudent` varchar(10) NOT NULL,
  `emailStudent` varchar(20) NOT NULL,
  `contactStudent` varchar(15) NOT NULL,
  `motdepassStudent` varchar(100) NOT NULL,
  `imgStudent` varchar(100) NOT NULL,
  `idProfesseurs` int(11) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idStudent`, `nomStudent`, `prenomStudent`, `genreStudent`, `emailStudent`, `contactStudent`, `motdepassStudent`, `imgStudent`, `idProfesseurs`, `create_at`, `update_at`) VALUES
(12, 'KOYA', 'Michel', 'masculin', 'tean.koya@gmail.com', '08880004', '$2y$10$z.U.Zqet0fefZOsTIvurGujAWT9Ey0U1zBLChMANTNeu.ESkyiB0S', '', 1, '2021-02-22 00:00:00', '2021-02-22 11:50:22'),
(14, 'SEKELETON', 'Michel', 'masculin', 'simplon@gmail.com', '088800015', '$2y$10$z.U.Zqet0fefZOsTIvurGujAWT9Ey0U1zBLChMANTNeu.ESkyiB0S', '', 1, '2021-02-22 00:00:00', '2021-02-22 11:50:22');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `numParticiper` int(10) NOT NULL,
  `idcours` int(10) NOT NULL,
  `idStudent` int(10) NOT NULL,
  `statutParticiper` int(2) NOT NULL,
  `motifParticiper` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`numParticiper`, `idcours`, `idStudent`, `statutParticiper`, `motifParticiper`, `create_at`) VALUES
(4, 8, 12, 1, '', '2021-02-24 01:44:24'),
(5, 8, 14, 1, '', '2021-02-24 03:35:10'),
(6, 8, 14, 1, '', '2021-02-23 03:35:10');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `idProfesseurs` int(10) NOT NULL,
  `nomProfesseurs` varchar(100) NOT NULL,
  `prenomsProfesseurs` varchar(100) NOT NULL,
  `contactProfesseurs` varchar(100) NOT NULL,
  `emailProfesseurs` varchar(100) NOT NULL,
  `motdepasseProfesseurs` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`idProfesseurs`, `nomProfesseurs`, `prenomsProfesseurs`, `contactProfesseurs`, `emailProfesseurs`, `motdepasseProfesseurs`, `create_at`, `update_at`) VALUES
(1, 'Appiah', 'Marcelin', '0708880004', 'kappiah@gmail.com', '$2y$10$z.U.Zqet0fefZOsTIvurGujAWT9Ey0U1zBLChMANTNeu.ESkyiB0S', '2021-02-22 00:00:00', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idStudent`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`numParticiper`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`idProfesseurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `participer`
--
ALTER TABLE `participer`
  MODIFY `numParticiper` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `idProfesseurs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
