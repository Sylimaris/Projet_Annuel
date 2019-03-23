-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 23 mars 2019 à 23:12
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddboucherie`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `IdClient` int(11) NOT NULL,
  `passwordClient` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `nomClient` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `prenomClient` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `mailClient` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `telClient` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `adresseClient` varchar(200) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`IdClient`, `passwordClient`, `nomClient`, `prenomClient`, `mailClient`, `telClient`, `adresseClient`) VALUES
(1, 'toto', 'Leonardon', 'Thomas', 'Th@mail.fr', '0123456789', 'Savari');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `IdCommande` int(11) NOT NULL,
  `prix` float DEFAULT NULL,
  `datePaiement` date DEFAULT NULL,
  `validation` int(11) DEFAULT NULL,
  `IdClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
  `IdProduit` int(11) NOT NULL,
  `animal` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `partie` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `prixKg` float DEFAULT NULL,
  `note` float DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `IdCommande` int(11) NOT NULL,
  `IdVendeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Vendeur`
--

CREATE TABLE `Vendeur` (
  `IdVendeur` int(11) NOT NULL,
  `passwordVendeur` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `nomVendeur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `prenomVendeur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nomFerme` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `mailVendeur` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nbVentes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Vendeur`
--

INSERT INTO `Vendeur` (`IdVendeur`, `passwordVendeur`, `nomVendeur`, `prenomVendeur`, `nomFerme`, `mailVendeur`, `nbVentes`) VALUES
(1, 'toto', 'Cougnenc', 'PB', 'Willump&Co', 'Willump&Co@mail.fr', 0),
(3, 'toto', 'PB', 'pb', 'poitiers', 'Th@mail.fr', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`IdClient`),
  ADD UNIQUE KEY `mailClient` (`mailClient`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`IdCommande`),
  ADD KEY `refidclient` (`IdClient`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`IdProduit`),
  ADD KEY `IdCommande` (`IdCommande`),
  ADD KEY `IdVendeur` (`IdVendeur`);

--
-- Index pour la table `Vendeur`
--
ALTER TABLE `Vendeur`
  ADD PRIMARY KEY (`IdVendeur`),
  ADD UNIQUE KEY `mailVendeur` (`mailVendeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `IdCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `IdProduit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Vendeur`
--
ALTER TABLE `Vendeur`
  MODIFY `IdVendeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `refidclient` FOREIGN KEY (`IdClient`) REFERENCES `Client` (`IdClient`);

--
-- Contraintes pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`IdCommande`) REFERENCES `Commande` (`IdCommande`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`IdVendeur`) REFERENCES `Vendeur` (`IdVendeur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
