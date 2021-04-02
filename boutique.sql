-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 02 avr. 2021 à 13:30
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

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
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
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
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

DROP TABLE IF EXISTS `categorie`;
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

DROP TABLE IF EXISTS `client`;
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

DROP TABLE IF EXISTS `commande`;
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
-- Structure de la table `commande-client`
--

DROP TABLE IF EXISTS `commande-client`;
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

DROP TABLE IF EXISTS `conversation`;
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

DROP TABLE IF EXISTS `droit`;
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

DROP TABLE IF EXISTS `fournisseur`;
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

DROP TABLE IF EXISTS `message`;
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

DROP TABLE IF EXISTS `Nouveaute-promo`;
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

DROP TABLE IF EXISTS `panier`;
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

DROP TABLE IF EXISTS `panierhistoriqueadmin`;
CREATE TABLE `panierhistoriqueadmin` (
  `aaa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `reference` varchar(55) NOT NULL,
  `titreproduit` varchar(255) NOT NULL,
  `produit` text NOT NULL,
  `stock` int(25) DEFAULT NULL,
  `prix` decimal(6,2) NOT NULL,
  `dateproduit` datetime NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `id_avis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `stock`, `prix`, `dateproduit`, `id_categorie`, `id_fournisseur`, `id_avis`) VALUES
(1, '100', 'crememain', 'Le panier affichera le stock réel à partir de la somme des produits avec le même id catégorie du pdt', NULL, '19.50', '2021-03-02 00:00:00', 0, 0, NULL),
(2, '200', 'vernirouge', 'merveilleux', NULL, '15.00', '2021-03-02 00:00:00', 0, 0, NULL),
(3, '300', 'vernirose', 'splendide', NULL, '12.00', '2021-03-02 00:00:00', 0, 0, NULL),
(4, '100', 'crememain', '200 ml', NULL, '19.50', '2021-03-02 00:00:00', 0, 0, NULL),
(5, '100', 'crememain', '200 ml', NULL, '19.50', '2021-03-02 00:00:00', 0, 0, NULL),
(6, '100', 'crememain', '200 ml', NULL, '19.50', '2021-03-02 00:00:00', 0, 0, NULL),
(7, '100', 'crememain', '200 ml', NULL, '19.50', '2021-03-02 00:00:00', 0, 0, NULL),
(8, '200', 'vernirouge', 'merveilleux', NULL, '15.00', '2021-03-02 00:00:00', 0, 0, NULL),
(9, '200', 'vernirouge', 'merveilleux', NULL, '15.00', '2021-03-02 00:00:00', 0, 0, NULL),
(10, '1000', 'sechecheveux', 'extra', NULL, '150.00', '2021-03-02 00:00:00', 0, 0, NULL),
(11, '1000', 'sechecheveux', 'extra', NULL, '150.00', '2021-03-02 00:00:00', 0, 0, NULL),
(12, '1001', 'coupeongle', 'dangereux', NULL, '25.00', '2021-03-02 00:00:00', 0, 0, NULL),
(13, '1002', 'rasoir', 'yes', NULL, '69.00', '2021-03-02 00:00:00', 0, 0, NULL),
(14, '1003', 'tondeuse', 'tendance', NULL, '99.00', '2021-03-02 00:00:00', 0, 0, NULL),
(15, '1002', 'rasoir', 'yes', NULL, '69.00', '2021-03-02 00:00:00', 0, 0, NULL),
(16, '1002', 'rasoir', 'yes', NULL, '69.00', '2021-03-02 00:00:00', 0, 0, NULL),
(17, '1', 'soinfetedesmeres', 'une merveille', NULL, '50.00', '2021-03-02 00:00:00', 1, 1, NULL),
(18, '2', 'lissagebresilien', 'pile poils', NULL, '75.00', '2021-03-02 00:00:00', 1, 1, NULL),
(19, '3', 'manucure', 'bien', NULL, '45.00', '2021-03-02 00:00:00', 1, 1, NULL),
(20, '4', 'taouageephemere', 'jusqu\'au bout des ongles', NULL, '15.00', '2021-03-02 00:00:00', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
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

DROP TABLE IF EXISTS `reponsemes`;
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

DROP TABLE IF EXISTS `reservation`;
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
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_utilisateur`, `titrereservation`, `typeevenement`, `intervenant`, `datedebut`, `datefin`, `heuredebut`, `heurefin`, `id_produit`, `id_fournisseur`) VALUES
(1, 15, 'maquillage', NULL, NULL, '2021-03-25 12:00:00', NULL, NULL, NULL, NULL, NULL),
(2, 15, 'soin des mains', NULL, NULL, '2021-03-24 11:00:00', NULL, NULL, NULL, NULL, NULL),
(3, 15, 'maquillage', NULL, NULL, '2021-03-25 08:00:00', NULL, NULL, NULL, NULL, NULL),
(5, 15, 'soin complet', NULL, NULL, '2021-03-26 09:00:00', NULL, NULL, NULL, NULL, NULL),
(7, 15, 'fete des meres', NULL, NULL, '2021-03-26 12:00:00', NULL, NULL, NULL, NULL, NULL),
(9, 15, 'soin rentree', NULL, NULL, '2021-03-27 16:00:00', NULL, NULL, NULL, NULL, NULL),
(10, 15, 'pose d\'ongles', NULL, NULL, '2021-03-28 13:00:00', NULL, NULL, NULL, NULL, NULL),
(11, 17, 'soin complet', NULL, NULL, '2021-03-27 10:00:00', NULL, NULL, NULL, NULL, NULL),
(29, 17, 'fete des meres', NULL, NULL, '2021-03-31 10:00:00', NULL, NULL, NULL, NULL, NULL),
(30, 17, 'soin des mains', NULL, NULL, '2021-04-02 04:00:00', NULL, NULL, NULL, NULL, NULL),
(31, 17, 'pose d\'ongles', NULL, NULL, '2021-04-03 12:00:00', NULL, NULL, NULL, NULL, NULL),
(32, 15, 'soin complet', NULL, NULL, '2021-04-01 02:00:00', NULL, NULL, NULL, NULL, NULL),
(33, 15, 'fete des meres', NULL, NULL, '2021-03-29 06:00:00', NULL, NULL, NULL, NULL, NULL),
(34, 15, 'maquillage', NULL, NULL, '2021-04-04 06:00:00', NULL, NULL, NULL, NULL, NULL),
(35, 15, 'pose d\'ongles', NULL, NULL, '2021-04-01 17:00:00', NULL, NULL, NULL, NULL, NULL),
(36, 15, 'maquillage', NULL, NULL, '2021-04-01 10:00:00', NULL, NULL, NULL, NULL, NULL),
(37, 15, 'maquillage', NULL, NULL, '2021-04-01 12:00:00', NULL, NULL, NULL, NULL, NULL),
(38, 15, 'nouvelle annee', NULL, NULL, '2021-04-03 11:00:00', NULL, NULL, NULL, NULL, NULL),
(39, 15, 'maquillage', NULL, NULL, '2021-04-03 14:00:00', NULL, NULL, NULL, NULL, NULL),
(40, 15, 'pose d\'ongles', NULL, NULL, '2021-04-03 15:00:00', NULL, NULL, NULL, NULL, NULL),
(41, 15, 'fete des meres', NULL, NULL, '2021-03-30 19:00:00', NULL, NULL, NULL, NULL, NULL),
(42, 16, 'pose d\'ongles', NULL, NULL, '2021-04-02 13:00:00', NULL, NULL, NULL, NULL, NULL),
(43, 16, 'maquillage', NULL, NULL, '2021-04-03 14:00:00', NULL, NULL, NULL, NULL, NULL),
(44, 16, 'pose d\'ongles', NULL, NULL, '2021-04-04 15:00:00', NULL, NULL, NULL, NULL, NULL),
(45, 16, 'pose d\'ongles', NULL, NULL, '2021-04-03 13:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
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

DROP TABLE IF EXISTS `utilisateurs`;
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
  `dateinscription` date DEFAULT NULL
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
-- AUTO_INCREMENT pour les tables déchargées
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
