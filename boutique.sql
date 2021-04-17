-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 17 Avril 2021 à 22:36
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
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `titrecategorie` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titrecategorie`) VALUES
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
  `id_utilisateur` int(11) DEFAULT NULL,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `codepostal` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `id_utilisateur`, `prenom`, `nom`, `mail`, `telephone`, `codepostal`) VALUES
(2, 17, 'admin', 'aaa', 'admin@boutique.fr', '123456789', '12345'),
(3, 16, 'Fabio', 'Tenorio', 'fabio@boutique.fr', '123456789', '12345'),
(4, 18, 'narizinho', 'nabuco', 'narizinho@boutique.fr', '123456789', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `datecommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `datecommande`, `token`, `total`) VALUES
(8, 2, '2021-04-15 23:17:30', 'tok_1IgcZ2GAVfFRDcyqaf15CxWM', '90.49'),
(9, 2, '2021-04-15 23:21:44', 'tok_1Igcd8GAVfFRDcyqqa3xq4rs', '54.60'),
(10, 2, '2021-04-15 23:23:20', 'tok_1IgcehGAVfFRDcyqMsU9wIXr', '17.00'),
(11, 3, '2021-04-16 00:37:35', 'tok_1IgdoXGAVfFRDcyqdE7CZWFq', '78.00'),
(12, 3, '2021-04-16 14:51:08', 'tok_1Igr8YGAVfFRDcyqI8xQYKWe', '97.50'),
(13, 3, '2021-04-17 17:55:31', 'tok_1IhGUXGAVfFRDcyqLN6OHxKF', '30.00'),
(14, 3, '2021-04-17 17:57:13', 'tok_1IhGWBGAVfFRDcyqrIJLnVB1', '36.90'),
(15, 3, '2021-04-17 17:58:51', 'tok_1IhGXmGAVfFRDcyqCm2R1Db4', '47.97'),
(16, 3, '2021-04-17 22:27:48', 'tok_1IhKk2GAVfFRDcyq3uzcLqqO', '79.50');

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

--
-- Contenu de la table `lignecommande`
--

INSERT INTO `lignecommande` (`id_commande`, `id_produit`, `quantiteproduit`) VALUES
(5, 30, 2),
(6, 1, 4),
(6, 43, 1),
(7, 43, 1),
(8, 43, 1),
(8, 1, 1),
(9, 47, 1),
(9, 50, 2),
(10, 47, 1),
(11, 1, 4),
(12, 1, 5),
(13, 30, 1),
(14, 45, 3),
(15, 44, 3),
(16, 1, 1),
(16, 30, 2);

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
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `titreproduit`, `produit`, `stock`, `prix`, `dateproduit`, `id_categorie`, `imageproduit`) VALUES
(1, '100', 'crème pour les mains', 'Une crème hydratante est un produit cosmétique qui hydrate la peau et empêche sa déshydratation en reconstituant le film hydrolipidique, protection naturelle de la peau éliminée par le savon durant la toilette', 4, '19.50', '2021-03-02 00:00:00', 100, 'crememains.jpg'),
(30, '1349751', 'kit manucure', 'La manucure ou le manucure est un soin de beauté destiné à embellir les mains et les ongles réalisé par un ou une prothésiste ongulaire.', 19, '30.00', '2021-04-10 23:53:13', 1500, 'kitmanucure.jpg'),
(43, '5616', 'lissage brésilien', 'Le lissage brésilien est un traitement des cheveux', 1, '70.99', '2021-04-11 02:10:35', 1, 'lissagebresilien.jpg'),
(44, '58462', 'vernis pour les ongles', 'Vernis désigne généralement une substance transparente, sèche, permanente et brillante', 74, '15.99', '2021-04-11 02:12:34', 500, 'vernisongle.jpg'),
(45, '678212', 'tatouage éphémère', 'Un tatouage est un dessin décoratif et/ou symbolique permanent effectué sur la peau', 109, '12.30', '2021-04-11 02:13:54', 50, 'tatouage.jpg'),
(47, '56', 'coupe + shampoing homme', 'La coiffure est un art', 1, '17.00', '2021-04-11 02:18:55', 1, 'coupehomme.webp'),
(48, '54546', 'coupe + shampoing femme', 'La coiffure est un art pour arranger les cheveux, éventuellement de modifier leur aspect extérieur.', 1, '20.00', '2021-04-11 02:20:49', 1, 'coupefemme.jpg'),
(49, '37852', 'tondeuse', 'Une tondeuse est, dans le domaine de la coiffure un outil servant à couper les cheveux.', 20, '35.29', '2021-04-11 02:22:29', 1500, 'tondeuse.jpg'),
(50, '4687', 'palette de maquillage', 'Le maquillage est l utilisation de produits cosmétiquesa pour l embellissement du visage, notamment de sa peau, et la modification des traits du visage et du corps pour la création de personnages au cinéma ou au théâtre. ', 78, '18.80', '2021-04-14 00:54:58', 500, 'palette.jpg'),
(51, '3', 'soin des mains', 'blanchir le bout de l ongle à l aide d un vernis blanc. Ensuite, vernir tout l ongle d une couche de vernis légèrement transparent comportant une petite touche de rose.', 1, '30.00', '2021-04-15 23:31:36', 1, 'soindesmains.jpg'),
(52, '5', 'soin des pieds', 'La pédicurie est une spécialité destinée aux soins du pied : traitement des affections de la peau et des ongles, etc. C est une des facettes du métier de pédicure-podologue.', 1, '15.00', '2021-04-15 23:40:06', 1, 'soindespieds.jpg'),
(53, '8', 'forfait fête des mères', 'La fête des Mères1 est une fête annuelle célébrée en l honneur des mères dans de nombreux pays. À cette occasion, les enfants offrent des cadeaux à leur mère, des gâteaux, des fleurs ou des objets que ils ont confectionnés à l école ou à la maison.', 1, '50.00', '2021-04-15 23:47:48', 1, 'fetemeres.jpg'),
(54, '78', 'sèche cheveux', 'Le sèche-cheveux, plus connu sous le nom séchoir à cheveux au Canada francophone, est un appareil électromécanique conçu pour sécher les cheveux au moyen d air chaud ou froid.', 25, '115.50', '2021-04-16 11:00:59', 1500, 'sechecheveux.webp'),
(55, '43', 'massage', 'Le massage, ou la massothérapie, est l application d un ensemble de techniques manuelles qui visent le mieux-être des personnes grâce à l exécution de mouvements des mains sur les différents tissus vivants.', 1, '50.00', '2021-04-16 11:21:34', 10, 'massage.jpg'),
(63, '45', 'tatouage sur les ongles', 'Il est possible de se faire tatouer les ongles ! Une tendance un peu dingue qui nous intrigue.', 1, '20.00', '2021-04-16 12:02:52', 1, 'tatouageongle.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `titrereservation` varchar(255) NOT NULL,
  `typeevenement` varchar(255) DEFAULT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime DEFAULT NULL,
  `heuredebut` datetime DEFAULT NULL,
  `heurefin` datetime DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_utilisateur`, `titrereservation`, `typeevenement`, `datedebut`, `datefin`, `heuredebut`, `heurefin`, `id_produit`) VALUES
(70, 16, 'pose d\'ongles', NULL, '2021-04-07 12:00:00', NULL, NULL, NULL, NULL),
(72, 16, 'fete des meres', NULL, '2021-04-08 16:00:00', NULL, NULL, NULL, NULL),
(73, 16, 'maquillage', NULL, '2021-05-28 11:00:00', NULL, NULL, NULL, NULL),
(75, 16, 'soin des mains', NULL, '2021-04-10 11:00:00', NULL, NULL, NULL, NULL),
(77, 18, 'soin des pieds', NULL, '2021-04-09 15:00:00', NULL, NULL, NULL, NULL),
(78, 18, 'soin des mains', NULL, '2021-04-09 12:00:00', NULL, NULL, NULL, NULL),
(79, 16, 'maquillage', NULL, '2021-04-19 10:00:00', NULL, NULL, NULL, NULL),
(80, 16, 'soin complet', NULL, '2021-04-20 13:00:00', NULL, NULL, NULL, NULL),
(81, 17, 'pose d\'ongles', NULL, '2021-04-19 12:00:00', NULL, NULL, NULL, NULL),
(82, 17, 'soin des pieds', NULL, '2021-04-23 16:00:00', NULL, NULL, NULL, NULL),
(83, 17, 'soin des pieds', NULL, '2021-04-22 14:00:00', NULL, NULL, NULL, NULL),
(84, 17, 'soin des pieds', NULL, '2021-04-22 10:00:00', NULL, NULL, NULL, NULL),
(85, 17, 'soin ete', NULL, '2021-04-16 08:00:00', NULL, NULL, NULL, NULL),
(86, 16, 'fete des meres', NULL, '2021-04-16 11:00:00', NULL, NULL, NULL, NULL);

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
(16, 200, 'fabio', 'UkbNhHwApyRhB0KP', 'Fabio', 'Tenorio', 'fabio@boutique.fr', '123456789', NULL, NULL),
(17, 200, 'admin', 'UkbNhHwApyRhB0KP', 'admin', 'admin', 'admin@boutique.fr', '123456789', NULL, NULL),
(18, 1, 'narizinho', '$2y$10$Utc7Ru9EKhprNMizncRHDeMISUxWb8BK6NBcHtWrrvWetz9ygVqUe', 'narizinho', 'nabuco', 'narizinho@boutique.fr', '123456789', NULL, '2021-04-15 00:56:02');

--
-- Index pour les tables exportées
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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
