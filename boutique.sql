-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 13 avr. 2021 à 10:07
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Soins internes'),
(50, 'Soin externe'),
(100, 'Produit de soin'),
(500, 'Produit de beauté'),
(1000, 'Fantaisie'),
(1500, 'Materiel');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `mail`, `telephone`) VALUES
(1, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `datecommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fraisexpedition` decimal(6,2) NOT NULL,
  `codepostal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id`, `nom`) VALUES
(1, 'membre'),
(10, 'client'),
(200, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `id_commande` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantiteproduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `reference` varchar(55) DEFAULT NULL,
  `titreproduit` varchar(255) DEFAULT NULL,
  `produit` text,
  `stock` int(11) DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  `dateproduit` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_categorie` int(11) DEFAULT NULL,
  `imageproduit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `stock`, `prix`, `dateproduit`, `id_categorie`, `imageproduit`) VALUES
(1, '100', 'crème pour les mains', 'Une crème hydratante est un produit cosmétique qui hydrate la peau et empêche sa déshydratation en reconstituant le film hydrolipidique, protection naturelle de la peau éliminée par le savon durant la toilette', 24, '19.50', '2021-03-02 00:00:00', 0, 'palette.jpg'),
(30, '1349751', 'kit manucure', 'La manucure ou le manucure est un soin de beauté destiné à embellir les mains et les ongles réalisé par un ou une prothésiste ongulaire.', 50, '30.00', '2021-04-10 23:53:13', NULL, 'kitmanucure.jpg'),
(43, '5616', 'lissage brésilien', 'Le lissage brésilien est un traitement des cheveux', 1, '70.99', '2021-04-11 02:10:35', NULL, 'lissagebresilien.jpg'),
(44, '58462', 'vernis pour les ongles', 'Vernis désigne généralement une substance transparente, sèche, permanente et brillante', 80, '15.99', '2021-04-11 02:12:34', NULL, 'vernisongle.jpg'),
(45, '678212', 'tatouage éphémère', 'Un tatouage est un dessin décoratif et/ou symbolique permanent effectué sur la peau', 120, '12.30', '2021-04-11 02:13:54', NULL, 'tatouage.jpg'),
(47, '56', 'coupe + shampoing homme', 'La coiffure est un art', 1, '17.00', '2021-04-11 02:18:55', NULL, 'coupehomme.webp'),
(48, '54546', 'coupe + shampoing femme', 'La coiffure est un art pour arranger les cheveux, éventuellement de modifier leur aspect extérieur.', 1, '20.00', '2021-04-11 02:20:49', NULL, 'coupefemme.jpg'),
(49, '37852', 'tondeuse', 'Une tondeuse est, dans le domaine de la coiffure un outil servant à couper les cheveux.', 20, '35.29', '2021-04-11 02:22:29', NULL, 'tondeuse.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `titrereservation` varchar(255) NOT NULL,
  `typeevenement` varchar(255) DEFAULT NULL,
  `intervenant` varchar(55) DEFAULT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime DEFAULT NULL,
  `heuredebut` datetime DEFAULT NULL,
  `heurefin` datetime DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_utilisateur`, `titrereservation`, `typeevenement`, `intervenant`, `datedebut`, `datefin`, `heuredebut`, `heurefin`, `id_produit`) VALUES
(70, 16, 'pose d\'ongles', NULL, NULL, '2021-04-07 12:00:00', NULL, NULL, NULL, NULL),
(72, 16, 'fete des meres', NULL, NULL, '2021-04-08 16:00:00', NULL, NULL, NULL, NULL),
(73, 16, 'maquillage', NULL, NULL, '2021-05-28 11:00:00', NULL, NULL, NULL, NULL),
(75, 16, 'soin des mains', NULL, NULL, '2021-04-10 11:00:00', NULL, NULL, NULL, NULL),
(77, 18, 'soin des pieds', NULL, NULL, '2021-04-09 15:00:00', NULL, NULL, NULL, NULL),
(78, 18, 'soin des mains', NULL, NULL, '2021-04-09 12:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `motpasse` varchar(255) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `datenaissance` date DEFAULT NULL,
  `dateinscription` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_droit`, `login`, `motpasse`, `prenom`, `nom`, `mail`, `telephone`, `datenaissance`, `dateinscription`) VALUES
(14, 1, 'client_quatre', '$2y$10$jl3j8MCwwB3AehgZhKelZu4u9pbfcAUyFu7MQEoNis9XPBDgCXDjm', 'client', 'quatre', 'clientquatre@boutique.fr', '6666666666', NULL, NULL),
(15, 1, 'iris', 'UkbNhHwApyRhB0KP', 'iris', 'debian-sys-maint', 'iris@boutique.fr', '45647879', NULL, NULL),
(16, 1, 'fabio', '$2y$10$n8r18D/1tsMquItpQbrPNuRpX8oiaFIyAv1FrOpDihk7F.DbXHcLy', 'Fabio', 'Tenorio', 'fabio@boutique.fr', '123456789', NULL, NULL),
(17, 200, 'admin', '$2y$10$I/AsLWR5YWhiOWraKaWzEuhNrZVrABgsYgnTK03zZJ6VqgkLyL/FG', 'admin', 'aaa', 'admin@boutique.fr', '123456789', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
