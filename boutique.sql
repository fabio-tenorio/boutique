-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 12 Avril 2021 à 16:41
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
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
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `id_theme`, `id_utilisateur`, `titrearticle`, `article`, `datearticle`, `id_produit`, `id_reservation`, `id_fournisseur`) VALUES
(1, 1, 2, 'Nouveauté sèche cheveu Babyliss', 'Blablabla', '2021-03-04', 0, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `avis` varchar(255) DEFAULT NULL,
  `id_utitilisateur` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
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
  `adresselivraison` varchar(255) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `adresselivraison`, `id_commande`) VALUES
(1, 'Marseille', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `datecommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande-client`
--

CREATE TABLE `commande-client` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nomtitulairecb` varchar(255) NOT NULL,
  `numerocb` int(25) NOT NULL,
  `validitecb` date NOT NULL,
  `code3chifcb` int(11) NOT NULL,
  `adresselivraison` varchar(255) NOT NULL,
  `fraisexpedition` decimal(4,2) NOT NULL,
  `datecom` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `typeconv` varchar(255) NOT NULL,
  `titreconv` varchar(255) NOT NULL,
  `descriptifconv` text NOT NULL,
  `dateconv` datetime NOT NULL
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
-- Contenu de la table `droit`
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
-- Contenu de la table `fournisseur`
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
-- Structure de la table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `id_commande` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantiteproduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `Nouveaute-promo`
--

CREATE TABLE `Nouveaute-promo` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nouveaute` varchar(255) NOT NULL,
  `promo` varchar(255) NOT NULL
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
  `reference` varchar(55) DEFAULT NULL,
  `titreproduit` varchar(255) DEFAULT NULL,
  `produit` text,
  `stock` int(11) DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  `dateproduit` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_categorie` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `id_avis` int(11) DEFAULT NULL,
  `imageproduit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `stock`, `prix`, `dateproduit`, `id_categorie`, `id_fournisseur`, `id_avis`, `imageproduit`) VALUES
(1, '100', 'crème pour les mains', 'Une crème hydratante est un produit cosmétique qui hydrate la peau et empêche sa déshydratation en reconstituant le film hydrolipidique, protection naturelle de la peau éliminée par le savon durant la toilette', 24, '19.50', '2021-03-02 00:00:00', 0, 0, NULL, 'palette.jpg'),
(30, '1349751', 'kit manucure', 'La manucure ou le manucure est un soin de beauté destiné à embellir les mains et les ongles réalisé par un ou une prothésiste ongulaire.', 50, '30.00', '2021-04-10 23:53:13', NULL, NULL, NULL, 'kitmanucure.jpg'),
(43, '5616', 'lissage brésilien', 'Le lissage brésilien est un traitement des cheveux', 1, '70.99', '2021-04-11 02:10:35', NULL, NULL, NULL, 'lissagebresilien.jpg'),
(44, '58462', 'vernis pour les ongles', 'Vernis désigne généralement une substance transparente, sèche, permanente et brillante', 80, '15.99', '2021-04-11 02:12:34', NULL, NULL, NULL, 'vernisongle.jpg'),
(45, '678212', 'tatouage éphémère', 'Un tatouage est un dessin décoratif et/ou symbolique permanent effectué sur la peau', 120, '12.30', '2021-04-11 02:13:54', NULL, NULL, NULL, 'tatouage.jpg'),
(47, '56', 'coupe + shampoing homme', 'La coiffure est un art', 1, '17.00', '2021-04-11 02:18:55', NULL, NULL, NULL, 'coupehomme.webp'),
(48, '54546', 'coupe + shampoing femme', 'La coiffure est un art pour arranger les cheveux, éventuellement de modifier leur aspect extérieur.', 1, '20.00', '2021-04-11 02:20:49', NULL, NULL, NULL, 'coupefemme.jpg'),
(49, '37852', 'tondeuse', 'Une tondeuse est, dans le domaine de la coiffure un outil servant à couper les cheveux.', 20, '35.29', '2021-04-11 02:22:29', NULL, NULL, NULL, 'tondeuse.jpg');

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
-- Structure de la table `reponsemes`
--

CREATE TABLE `reponsemes` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `descritptifrep` text NOT NULL,
  `daterep` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_produit` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_utilisateur`, `titrereservation`, `typeevenement`, `intervenant`, `datedebut`, `datefin`, `heuredebut`, `heurefin`, `id_produit`, `id_fournisseur`) VALUES
(70, 16, 'pose d\'ongles', NULL, NULL, '2021-04-07 12:00:00', NULL, NULL, NULL, NULL, NULL),
(72, 16, 'fete des meres', NULL, NULL, '2021-04-08 16:00:00', NULL, NULL, NULL, NULL, NULL),
(73, 16, 'maquillage', NULL, NULL, '2021-05-28 11:00:00', NULL, NULL, NULL, NULL, NULL),
(75, 16, 'soin des mains', NULL, NULL, '2021-04-10 11:00:00', NULL, NULL, NULL, NULL, NULL),
(77, 18, 'soin des pieds', NULL, NULL, '2021-04-09 15:00:00', NULL, NULL, NULL, NULL, NULL),
(78, 18, 'soin des mains', NULL, NULL, '2021-04-09 12:00:00', NULL, NULL, NULL, NULL, NULL);

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
-- Contenu de la table `theme`
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
  `motpasse` varchar(255) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `datenaissance` date DEFAULT NULL,
  `dateinscription` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_droit`, `login`, `motpasse`, `prenom`, `nom`, `mail`, `telephone`, `datenaissance`, `dateinscription`) VALUES
(14, 1, 'client_quatre', '$2y$10$jl3j8MCwwB3AehgZhKelZu4u9pbfcAUyFu7MQEoNis9XPBDgCXDjm', 'client', 'quatre', 'clientquatre@boutique.fr', '6666666666', NULL, NULL),
(15, 1, 'iris', 'UkbNhHwApyRhB0KP', 'iris', 'debian-sys-maint', 'iris@boutique.fr', '45647879', NULL, NULL),
(16, 1, 'fabio', '$2y$10$n8r18D/1tsMquItpQbrPNuRpX8oiaFIyAv1FrOpDihk7F.DbXHcLy', 'Fabio', 'Tenorio', 'fabio@boutique.fr', '123456789', NULL, NULL),
(17, 200, 'admin', '$2y$10$I/AsLWR5YWhiOWraKaWzEuhNrZVrABgsYgnTK03zZJ6VqgkLyL/FG', 'admin', 'aaa', 'admin@boutique.fr', '123456789', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `commande-client`
--
ALTER TABLE `commande-client`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD UNIQUE KEY `id` (`id`);

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
-- Index pour la table `Nouveaute-promo`
--
ALTER TABLE `Nouveaute-promo`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `reponsemes`
--
ALTER TABLE `reponsemes`
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commande-client`
--
ALTER TABLE `commande-client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT pour la table `Nouveaute-promo`
--
ALTER TABLE `Nouveaute-promo`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reponsemes`
--
ALTER TABLE `reponsemes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
