-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 juin 2020 à 07:35
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `binome`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `NUM_BAT` int(11) NOT NULL,
  `NOM_BAT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`NUM_BAT`, `NOM_BAT`) VALUES
(1, 'Batiment A'),
(2, 'Batiment B'),
(3, 'Batiment C');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `NUM_CHAMBRE` int(11) NOT NULL,
  `NUM_BAT` int(11) NOT NULL,
  `TYPE_CHAMBRE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`NUM_CHAMBRE`, `NUM_BAT`, `TYPE_CHAMBRE`) VALUES
(1, 1, 'collectif'),
(2, 1, 'collectif'),
(3, 1, 'individuel'),
(4, 1, 'collectif'),
(5, 1, 'collectif'),
(10, 1, 'collectif'),
(11, 1, 'collectif'),
(12, 2, 'individuel'),
(13, 2, 'individuel'),
(14, 2, 'collectif'),
(15, 2, 'individuel'),
(16, 1, 'collectif'),
(17, 2, 'individuel'),
(18, 1, 'individuel'),
(19, 2, 'individuel'),
(20, 2, 'individuel'),
(22, 3, 'collectif'),
(23, 3, 'collectif');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `NUM_DEP` char(10) NOT NULL,
  `NOM_DEP` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`NUM_DEP`, `NOM_DEP`) VALUES
('1', 'Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `NUM_ETUDIANT` int(11) NOT NULL,
  `NUM_CHAMBRE` int(11) DEFAULT NULL,
  `NUM_DEP` char(10) DEFAULT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TEL` varchar(30) DEFAULT NULL,
  `DATE_NAISS` date NOT NULL,
  `BOURSE` varchar(40) DEFAULT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `MATRICULE` varchar(20) NOT NULL,
  `CHAMBRE` varchar(20) DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`NUM_ETUDIANT`, `NUM_CHAMBRE`, `NUM_DEP`, `NOM`, `PRENOM`, `EMAIL`, `TEL`, `DATE_NAISS`, `BOURSE`, `ADRESSE`, `MATRICULE`, `CHAMBRE`, `type`) VALUES
(1, 10, NULL, 'DABO', 'pape', 'ldab@ldab.com', '77 444 22 55', '1997-04-02', '40 000', 'Dakar', '2014 DA PA 0001', '010-0090', 'loge'),
(2, 12, NULL, 'DANFAKHA', 'Fatoumata', 'nene@nene.com', '77 343 00 80', '1998-01-20', '40 000', 'Dakar', '2014 DA KA 0002', '012-0023', 'loge'),
(3, NULL, NULL, 'LO', 'Khalil', 'khalil@gmail.com', '77 649 67 00', '2000-08-06', '20 000', 'Mbour', '2014 LO IL 0003', 'Non logé(e)', 'non_loge'),
(4, 14, NULL, 'SALL', 'Salimata', 'sali@gmail.com', '77 343 00 64', '1992-01-10', '40 000', 'Dakar', '2014 DA KA 0002', '012-0023', 'loge'),
(5, NULL, NULL, 'DRAME', 'Khadim', 'drame@gmal.com', '77 649 67 00', '2000-08-06', '20 000', 'Mbour', '2014 LO IL 0003', 'Non logé(e)', 'non_loge'),
(6, NULL, '1', 'Ndiaye', 'Amina', 'amina@gmail.com', '76 535 23 54', '1999-09-21', '20 000', 'Tamba', '2015 ND NA 1014', NULL, 'non_loge'),
(7, NULL, '1', 'Sy', 'Fallou', 'falou@gmail.com', '76 635 23 54', '1999-02-11', NULL, 'Touba', '2015 SY FA 1060', NULL, 'non_boursier'),
(8, NULL, '1', 'SARR', 'Fatou', 'fatou@gmail.com', '77 635 23 50', '1997-02-01', '40 000', 'Louga', '2014 RR FA 1105', '002-0032', 'loge'),
(9, NULL, '1', 'Man', 'Abdou', 'abdou@gmail.com', '77 635 23 33', '1999-02-20', NULL, 'Dakar', '2014 RE AB 0155', NULL, 'non_boursier'),
(10, 10, NULL, 'Pouye', 'Saliou', 'pouye@gmail.com', '77 444 22 55', '1996-06-08', '40 000', 'Dakar', '2014 DA PA 0001', '010-0090', 'loge'),
(11, NULL, '1', 'Ndiaye', 'Amina', 'amina@gmail.com', '76 535 23 54', '1999-09-21', '20 000', 'Tamba', '2015 ND NA 1014', NULL, 'non_loge'),
(12, NULL, '1', 'Sy', 'Fallou', 'falou@gmail.com', '76 635 23 54', '1999-02-11', NULL, 'Touba', '2015 SY FA 1060', NULL, 'non_boursier'),
(13, NULL, '1', 'SARR', 'Fatou', 'fatou@gmail.com', '77 635 23 50', '1997-02-01', '40 000', 'Louga', '2014 RR FA 1105', '002-0032', 'loge'),
(14, NULL, '1', 'Fall', 'Abdou', 'abdou@gmail.com', '77 635 23 33', '1999-02-20', NULL, 'Dakar', '2014 RE AB 0155', NULL, 'non_boursier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`NUM_BAT`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`NUM_CHAMBRE`),
  ADD KEY `FK_SE_TROUVE` (`NUM_BAT`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`NUM_DEP`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`NUM_ETUDIANT`),
  ADD KEY `FK_APPARTIENT` (`NUM_DEP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `NUM_CHAMBRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `NUM_ETUDIANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_SE_TROUVE` FOREIGN KEY (`NUM_BAT`) REFERENCES `batiment` (`NUM_BAT`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_APPARTIENT` FOREIGN KEY (`NUM_DEP`) REFERENCES `departement` (`NUM_DEP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
