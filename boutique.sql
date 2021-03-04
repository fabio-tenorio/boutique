-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 04 mars 2021 à 16:47
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
  `id_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `id_theme`, `id_utilisateur`, `titrearticle`, `article`, `datearticle`, `id_produit`, `id_reservation`, `id_fournisseur`) VALUES
(1, 1, 2, 'Nouveauté sèche cheveu Babyliss', 'Blablabla', '2021-03-04', 0, 0, 5);

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
  `id_utilisateur` int(11) NOT NULL,
  `nomtitulaireCB` varchar(55) NOT NULL,
  `numeroCB` varchar(25) NOT NULL,
  `validiteCB` date NOT NULL,
  `code3chiffresCB` int(11) NOT NULL,
  `adresselivraison` varchar(255) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `id_utilisateur`, `nomtitulaireCB`, `numeroCB`, `validiteCB`, `code3chiffresCB`, `adresselivraison`, `id_panier`, `id_commande`) VALUES
(1, 6, 'client', '2137777777', '2022-04-26', 111, 'Marseille', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `fraisexpedition` decimal(4,2) NOT NULL,
  `datecommande` date NOT NULL,
  `id_panier` int(11) NOT NULL
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
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nomfournisseur` varchar(255) NOT NULL,
  `codepostale` varchar(25) NOT NULL,
  `statut` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nomfournisseur`, `codepostale`, `statut`) VALUES
(1, 'Sonia', '13012', 'Interne'),
(2, 'Desanges', '13002', 'Actif'),
(3, 'Bijoux Aubagne', '13380', 'Premium'),
(4, 'Foulard marseillais', '13013', 'Actif'),
(5, 'Babyliss', '75001', 'Actif'),
(6, 'L\'Oréal', '75012', 'Actif'),
(7, 'Martine Création', '13190', 'Actif'),
(8, 'Lancaster Monaco', '98000', 'Actif'),
(9, 'Isabelle Fantaisie', '84000', 'Premium'),
(16, 'Blabla', '13001', 'Inactif'),
(17, 'Blabla', '13001', 'Litige'),
(18, 'Bibibi', '13007', 'Faillite');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
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
  `reference` varchar(55) NOT NULL,
  `titreproduit` varchar(255) NOT NULL,
  `produit` text NOT NULL,
  `avis` varchar(255) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `disponibilite` datetime NOT NULL,
  `dateproduit` datetime NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `avis`, `prix`, `disponibilite`, `dateproduit`, `id_categorie`, `id_fournisseur`) VALUES
(1, '100', 'crememain', 'Le panier affichera le stock réel à partir de la somme des produits avec le même id catégorie du pdt', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(2, '200', 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(3, '300', 'vernirose', 'splendide', '', '12.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(4, '100', 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(5, '100', 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(6, '100', 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(7, '100', 'crememain', '200 ml', '', '19.50', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(8, '200', 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(9, '200', 'vernirouge', 'merveilleux', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(10, '1000', 'sechecheveux', 'extra', '', '150.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(11, '1000', 'sechecheveux', 'extra', '', '150.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(12, '1001', 'coupeongle', 'dangereux', '', '25.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(13, '1002', 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(14, '1003', 'tondeuse', 'tendance', '', '99.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(15, '1002', 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(16, '1002', 'rasoir', 'yes', '', '69.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 0, 0),
(17, '1', 'soinfetedesmeres', 'une merveille', '', '50.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 1, 1),
(18, '2', 'lissagebresilien', 'pile poils', '', '75.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 1, 1),
(19, '3', 'manucure', 'bien', '', '45.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 1, 1),
(20, '4', 'taouageephemere', 'jusqu\'au bout des ongles', '', '15.00', '2021-03-02 00:00:00', '2021-03-02 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `datereponse` date NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `titrereservation` varchar(255) NOT NULL,
  `reservation` text NOT NULL,
  `typeevenement` varchar(255) NOT NULL,
  `intervenant` varchar(55) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `heuredebut` datetime NOT NULL,
  `heurefin` datetime NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `visibilitetheme` varchar(25) NOT NULL,
  `titretheme` varchar(255) NOT NULL,
  `descriptiftheme` text NOT NULL,
  `datetheme` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `id_droit`, `visibilitetheme`, `titretheme`, `descriptiftheme`, `datetheme`, `id_utilisateur`) VALUES
(1, 0, 'Public', 'Prendre soin de ses mains', 'blablabla', '2021-03-04', 2),
(2, 0, 'Prive', 'Vente privée sèche cheveux Babyliss Pro', 'Présentation exclusive du dernier sèche cheveux ', '2021-03-04', 2),
(3, 0, 'Public', 'Techniques massages des pieds', 'Blablabla', '2021-03-04', 9),
(4, 0, 'Public', 'Tatouage éphémère sur ongles', 'Blablabla', '2021-03-04', 2),
(5, 0, 'Prive', 'Blablabla', 'Blablabla', '2021-03-04', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `motpasse` varchar(55) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `datenaissance` date NOT NULL,
  `dateinscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_droit`, `login`, `motpasse`, `prenom`, `nom`, `mail`, `telephone`, `datenaissance`, `dateinscription`) VALUES
(1, 1, 'fabio', 'fabio', 'fabio', 'tenario', 'tenario@orange.fr', '0100000001', '2021-02-01', '2020-12-06'),
(2, 200, 'admin', 'admin', 'admin', 'admin', 'admin@orange.fr', '0100000002', '2021-02-02', '2020-01-05'),
(3, 100, 'moderateur', 'moderateur', 'moderateur', 'moderateur', 'moderateur@orange.fr', '0100000003', '2021-02-03', '2021-02-18'),
(4, 10, 'oli', 'oli', 'oli', 'oli', 'oli@orange.fr', '0100000004', '2021-02-04', '2021-02-18'),
(5, 1, 'membre', 'membre', 'membre', 'membre', 'membre@orange.fr', '0100000005', '2020-07-12', '2021-02-18'),
(6, 10, 'client', 'client', 'client', 'client', 'client@orange.fr', '1100000002', '2021-02-06', '2020-10-11'),
(7, 10, 'client1', 'client1', 'client1', 'client1', 'client1@gmail.fr', '0300000002', '2021-02-07', '2021-02-18'),
(8, 1, 'membre1', 'membre1', 'membre1', 'membre1', 'membre1', '3100000002', '2021-06-14', '2020-10-11'),
(9, 100, 'salarie', 'salarie', 'salarie', 'salarie', 'salarie@orange.fr', '0400000002', '2021-02-09', '2021-02-18'),
(10, 100, 'intervenantext1', 'intervenantext1', 'intervenantext1', 'intervenantext1', 'interveantext1@orange.fr', '0200000012', '2021-02-10', '2021-02-18'),
(11, 100, 'intervenantext', 'intervenantext', 'intervenantext', 'intervenantext', 'interveantext@orange.fr', '0200000002', '2021-02-10', '2021-02-18'),
(12, 10, 'client2', 'client2', 'client2', 'client2', 'client2@orange.fr', '1400000002', '2021-03-01', '2021-03-04'),
(13, 10, 'client3', 'client3', 'client3', 'client3', 'client3@gmail.com', '1100000009', '2021-03-01', '2021-03-14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
