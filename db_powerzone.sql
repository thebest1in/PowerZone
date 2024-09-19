-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 01:43
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_powerzone`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `num` int(11) NOT NULL,
  `dateAbonnement` date DEFAULT NULL,
  `idAb` int(11) DEFAULT NULL,
  `idgroupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`num`, `dateAbonnement`, `idAb`, `idgroupe`) VALUES
(1, '2023-05-14', 3, 1),
(2, '2023-05-14', 1, 1),
(3, '2023-05-14', 6, 1),
(4, '2023-05-14', 6, 2),
(5, '2023-05-14', 6, 2),
(6, '2023-05-14', 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `idAct` int(11) NOT NULL,
  `nomAct` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`idAct`, `nomAct`) VALUES
(1, 'yoga'),
(2, 'crossFit'),
(3, 'zumba'),
(4, 'boxing');

-- --------------------------------------------------------

--
-- Structure de la table `activites_moniteur`
--

CREATE TABLE `activites_moniteur` (
  `codeM` int(11) NOT NULL,
  `idAct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `codeA` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`codeA`, `nom`, `prenom`, `dateNaissance`, `tel`, `num`) VALUES
(1, 'bouzidi', 'ali', '1994-06-17', 2446574, 1),
(2, 'chakir', 'fatima', '2004-01-26', 24475434, 2),
(3, 'el amrani', 'omar', '2000-03-23', 5576874, 3),
(4, 'es-samlali', 'fatima', '2003-11-20', 73311133, 4),
(5, 'janati', 'mohamed', '2002-03-16', 35457665, 5),
(6, 'es-samlali', 'hamza', '2007-04-23', 35765564, 6);

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `idAn` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `contenue` varchar(2000) DEFAULT NULL,
  `idAct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`idAn`, `title`, `dateDebut`, `dateFin`, `contenue`, `idAct`) VALUES
(1, 'nouveau cours de yoga', '2023-05-01', '2023-06-01', 'Rejoignez notre nouveau cours de yoga pour améliorer votre souplesse et réduire votre stress', 1),
(2, 'complétition de crossFit', '2023-05-15', '2023-06-16', 'Participez à notre complétition annuelle de crossFit pour tester vos limites et gagner des prix incroyables', 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `nom`, `prenom`, `tel`, `date_naissance`) VALUES
(1, 'es-samlali', 'fatima', 35465755, '2003-11-20'),
(2, 'es-samlali', 'hamza', 135764352, '2007-04-23');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idgroupe` int(11) NOT NULL,
  `nomgroupe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `nomgroupe`) VALUES
(1, 'débutants'),
(2, 'intermédiaires'),
(3, 'avancés');

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE `moniteur` (
  `codeM` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `moniteur`
--

INSERT INTO `moniteur` (`codeM`, `nom`, `prenom`, `tel`) VALUES
(1, 'cherkaoui', 'omar', 552353),
(2, 'ziani', 'hiba', 32568795),
(3, 'el amrani', 'mohamed', 235797349);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `numP` int(11) NOT NULL,
  `dateP` date DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`numP`, `dateP`, `montant`, `num`) VALUES
(1, '2023-05-28', 1700, 1),
(2, '2023-05-14', 150, 2),
(3, '2023-05-14', 170, 3),
(4, '2023-05-28', 170, 4),
(5, '2023-05-14', 170, 5),
(6, '2023-05-14', 150, 6);

-- --------------------------------------------------------

--
-- Structure de la table `sence`
--

CREATE TABLE `sence` (
  `idS` int(11) NOT NULL,
  `jour` varchar(20) DEFAULT NULL,
  `heurFin` float DEFAULT NULL,
  `heurDebut` float DEFAULT NULL,
  `idgroupe` int(11) DEFAULT NULL,
  `codeM` int(11) DEFAULT NULL,
  `idAct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sence`
--

INSERT INTO `sence` (`idS`, `jour`, `heurFin`, `heurDebut`, `idgroupe`, `codeM`, `idAct`) VALUES
(1, 'lundi', 13, 12.3, 1, 2, 4),
(2, 'mercredi', 15.3, 14, 2, 1, 1),
(3, 'samedi', 18, 16, 3, 3, 2),
(4, 'jeudi', 22, 20, 2, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `idAct` int(11) NOT NULL,
  `idAb` int(11) NOT NULL,
  `prixActuel` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`idAct`, `idAb`, `prixActuel`) VALUES
(1, 1, 150),
(1, 2, 400),
(1, 3, 1700),
(2, 4, 120),
(3, 5, 150),
(4, 6, 170);

-- --------------------------------------------------------

--
-- Structure de la table `typeabonnements`
--

CREATE TABLE `typeabonnements` (
  `idAb` int(11) NOT NULL,
  `nomAb` varchar(20) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeabonnements`
--

INSERT INTO `typeabonnements` (`idAb`, `nomAb`, `duree`) VALUES
(1, 'mensuel yoga', 1),
(2, 'trimestriel yoga', 3),
(3, 'annuel yoga', 12),
(4, 'mensuel crossFit', 1),
(5, 'mensuel zumba', 1),
(6, 'mensuel boxing', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `role`, `email`, `password`) VALUES
(1, 'alami', 'ali', 'admin', 'users1@gmail.com', 'pass1'),
(2, 'azlafi', 'aya', 'directeur', 'users3@gmail.com', 'pass3'),
(3, 'es-samlali', 'fatima', 'gestionnaire', 'users2@gmail.com', 'pass2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`num`),
  ADD KEY `idgroupe` (`idgroupe`),
  ADD KEY `idAb` (`idAb`);

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`idAct`);

--
-- Index pour la table `activites_moniteur`
--
ALTER TABLE `activites_moniteur`
  ADD PRIMARY KEY (`codeM`,`idAct`),
  ADD KEY `idAct` (`idAct`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`codeA`),
  ADD KEY `num` (`num`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`idAn`),
  ADD KEY `idAct` (`idAct`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idgroupe`);

--
-- Index pour la table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`codeM`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`numP`),
  ADD KEY `num` (`num`);

--
-- Index pour la table `sence`
--
ALTER TABLE `sence`
  ADD PRIMARY KEY (`idS`),
  ADD KEY `idgroupe` (`idgroupe`),
  ADD KEY `codeM` (`codeM`),
  ADD KEY `idAct` (`idAct`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`idAct`,`idAb`),
  ADD KEY `idAb` (`idAb`);

--
-- Index pour la table `typeabonnements`
--
ALTER TABLE `typeabonnements`
  ADD PRIMARY KEY (`idAb`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `codeA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `idAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idgroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `moniteur`
--
ALTER TABLE `moniteur`
  MODIFY `codeM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `numP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sence`
--
ALTER TABLE `sence`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `typeabonnements`
--
ALTER TABLE `typeabonnements`
  MODIFY `idAb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_ibfk_1` FOREIGN KEY (`idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnements_ibfk_2` FOREIGN KEY (`idAb`) REFERENCES `typeabonnements` (`idAb`) ON DELETE CASCADE;

--
-- Contraintes pour la table `activites_moniteur`
--
ALTER TABLE `activites_moniteur`
  ADD CONSTRAINT `activites_moniteur_ibfk_1` FOREIGN KEY (`codeM`) REFERENCES `moniteur` (`codeM`) ON DELETE CASCADE,
  ADD CONSTRAINT `activites_moniteur_ibfk_2` FOREIGN KEY (`idAct`) REFERENCES `activites` (`idAct`) ON DELETE CASCADE;

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`num`) REFERENCES `abonnements` (`num`) ON DELETE CASCADE;

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`idAct`) REFERENCES `activites` (`idAct`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`num`) REFERENCES `abonnements` (`num`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sence`
--
ALTER TABLE `sence`
  ADD CONSTRAINT `sence_ibfk_1` FOREIGN KEY (`idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE CASCADE,
  ADD CONSTRAINT `sence_ibfk_2` FOREIGN KEY (`codeM`) REFERENCES `moniteur` (`codeM`) ON DELETE CASCADE,
  ADD CONSTRAINT `sence_ibfk_3` FOREIGN KEY (`idAct`) REFERENCES `activites` (`idAct`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`idAct`) REFERENCES `activites` (`idAct`) ON DELETE CASCADE,
  ADD CONSTRAINT `tarif_ibfk_2` FOREIGN KEY (`idAb`) REFERENCES `typeabonnements` (`idAb`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
