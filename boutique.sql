-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 02 mars 2021 à 16:54
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
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `titrearticle` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `datearticle` date NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `id_fournisseurpartenaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

CREATE TABLE `categorieproduit` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `titrecategorie` varchar(255) NOT NULL,
  `id_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieproduit`
--

INSERT INTO `categorieproduit` (`id`, `id_produit`, `titrecategorie`, `id_droit`) VALUES
(1, 1, 'Produit soin', 200),
(2, 200, 'Prestation', 200);

-- --------------------------------------------------------

--
-- Structure de la table `commande-client`
--

CREATE TABLE `commande-client` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nomtitulairecb` varchar(255) NOT NULL,
  `numeroCB` int(25) NOT NULL,
  `validiteCB` date NOT NULL,
  `code3chiffresCB` int(11) NOT NULL,
  `adresselivraison` varchar(255) NOT NULL,
  `fraisexpedition` decimal(4,2) NOT NULL,
  `datecommmande` date NOT NULL
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
(100, 'salarie'),
(200, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurpartenaire`
--

CREATE TABLE `fournisseurpartenaire` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `nomfournisseur` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `message` text NOT NULL,
  `datemessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `datepanier` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panierhistoriqueadmin`
--

CREATE TABLE `panierhistoriqueadmin` (
  `aaa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `titreproduit` varchar(255) NOT NULL,
  `produit` text NOT NULL,
  `avis` varchar(255) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `disponibilite` datetime NOT NULL,
  `dateproduit` datetime NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_fournisseurpartenaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `avis`, `prix`, `disponibilite`, `dateproduit`, `id_categorie`, `id_fournisseurpartenaire`) VALUES
(1, 1, 'crememain', 'Le panier affichera le stock réel à partir de la somme des produits avec le même id catégorie du pdt', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(2, 2, 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(3, 3, 'vernirose', 'splendide', '', '12.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(4, 1, 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(5, 1, 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(6, 1, 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(7, 1, 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(8, 2, 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(9, 2, 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(10, 100, 'sechecheveux', 'extra', '', '150.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(11, 100, 'sechecheveux', 'extra', '', '150.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(12, 101, 'coupeongle', 'dangereux', '', '25.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(13, 102, 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(14, 103, 'tondeuse', 'tendance', '', '99.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(15, 102, 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(16, 102, 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(17, 200, 'soinfetedesmeres', 'une merveille', '', '50.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(18, 201, 'lissagebresilien', 'pile poils', '', '75.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(19, 202, 'manucure', 'bien', '', '45.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(20, 203, 'taouageephemere', 'jusqu\'au bout des ongles', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `datereponse` date NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `titrereservation` varchar(255) NOT NULL,
  `reservation` text NOT NULL,
  `typeevenement` varchar(255) NOT NULL,
  `intervenant` int(11) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `heuredebut` datetime NOT NULL,
  `heurefin` datetime NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_fournisseurpartenaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `visibilitetheme` int(11) NOT NULL,
  `titretheme` varchar(255) NOT NULL,
  `descriptiftheme` text NOT NULL,
  `datetheme` date NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motpasse` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` int(25) NOT NULL,
  `dateanniversaire` date NOT NULL,
  `dateinscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_droit`, `login`, `motpasse`, `prenom`, `nom`, `mail`, `telephone`, `dateanniversaire`, `dateinscription`) VALUES
(1, 1, 'fabio', 'fabio', 'fabio', 'tenario', 'tenario@orange.fr', 0, '2021-02-01', '2021-02-18'),
(2, 200, 'admin', 'admin', 'admin', 'admin', 'admin@orange.fr', 0, '2021-02-02', '2021-02-18'),
(3, 100, 'moderateur', 'moderateur', 'moderateur', 'moderateur', 'moderateur@orange.fr', 0, '2021-02-03', '2021-02-18'),
(4, 10, 'oli', 'oli', 'oli', 'oli', 'oli@orange.fr', 0, '2021-02-04', '2021-02-18'),
(5, 1, 'membre', 'membre', 'membre', 'membre', 'membre@orange.fr', 0, '2021-02-05', '2021-02-18'),
(6, 10, 'client', 'client', 'client', 'client', 'client@orange.fr', 0, '2021-02-06', '2021-02-18'),
(7, 10, 'client1', 'client1', 'client1', 'client1', 'client1', 0, '2021-02-07', '2021-02-18'),
(8, 1, 'membre1', 'membre1', 'membre1', 'membre1', 'membre1', 0, '2021-02-08', '2021-02-18'),
(9, 100, 'salarie', 'salarie', 'salarie', 'salarie', 'salarie@orange.fr', 0, '2021-02-09', '2021-02-18'),
(10, 100, 'intervenantext1', 'intervenantext1', 'intervenantext1', 'intervenantext1', 'interveantext1@orange.fr', 0, '2021-02-10', '2021-02-18'),
(11, 100, 'intervenantext', 'intervenantext', 'intervenantext', 'intervenantext', 'interveantext@orange.fr', 0, '2021-02-10', '2021-02-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `commande-client`
--
ALTER TABLE `commande-client`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `fournisseurpartenaire`
--
ALTER TABLE `fournisseurpartenaire`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `panierhistoriqueadmin`
--
ALTER TABLE `panierhistoriqueadmin`
  ADD UNIQUE KEY `aaa` (`aaa`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
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
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande-client`
--
ALTER TABLE `commande-client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT pour la table `fournisseurpartenaire`
--
ALTER TABLE `fournisseurpartenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
