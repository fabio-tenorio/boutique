-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 18 fév. 2021 à 12:26
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
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id`, `nom`) VALUES
(1, 'membre'),
(10, 'client'),
(100, 'salarie'),
(200, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `descriptifmes` text NOT NULL,
  `datemes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `disponibilite` datetime NOT NULL
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
  `id_categorie` int(11) NOT NULL,
  `titrepdt` varchar(255) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `descriptifpdt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `id_categorie`, `titrepdt`, `prix`, `descriptifpdt`) VALUES
(1, 1, 'crememain', '19.50', 'Le panier affichera le stock réel à partir de la somme des produits avec le même id catégorie du pdt'),
(2, 2, 'vernirouge', '15.00', 'merveilleux'),
(3, 3, 'vernirose', '12.00', 'splendide'),
(4, 1, 'crememain', '19.50', '200 ml'),
(5, 1, 'crememain', '19.50', '200 ml'),
(6, 1, 'crememain', '19.50', '200 ml'),
(7, 1, 'crememain', '19.50', '200 ml'),
(8, 2, 'vernirouge', '15.00', 'merveilleux'),
(9, 2, 'vernirouge', '15.00', 'merveilleux'),
(10, 100, 'sechecheveux', '150.00', 'extra'),
(11, 100, 'sechecheveux', '150.00', 'extra'),
(12, 101, 'coupeongle', '25.00', 'dangereux'),
(13, 102, 'rasoir', '69.00', 'yes'),
(14, 103, 'tondeuse', '99.00', 'tendance'),
(15, 102, 'rasoir', '69.00', 'yes'),
(16, 102, 'rasoir', '69.00', 'yes'),
(17, 200, 'soinfetedesmeres', '50.00', 'une merveille'),
(18, 201, 'lissagebresilien', '75.00', 'pile poils'),
(19, 202, 'manucure', '45.00', 'bien'),
(20, 203, 'taouageephemere', '15.00', 'jusqu\'au bout des ongles');

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
  `id_droit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `typeevenement` varchar(255) NOT NULL,
  `titreresa` varchar(255) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `heuredebut` datetime NOT NULL,
  `heurefin` datetime NOT NULL,
  `descriptifresa` text NOT NULL,
  `intervenant` int(11) NOT NULL
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
  `dateanniversaire` datetime NOT NULL,
  `dateinscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_droit`, `login`, `motpasse`, `prenom`, `nom`, `mail`, `telephone`, `dateanniversaire`, `dateinscription`) VALUES
(1, 1, 'fabio', 'fabio', 'fabio', 'tenario', 'tenario@orange.fr', 0, '2021-02-01 10:27:01', '2021-02-18 10:28:55'),
(2, 200, 'admin', 'admin', 'admin', 'admin', 'admin@orange.fr', 0, '2021-02-02 10:29:22', '2021-02-18 10:32:05'),
(3, 100, 'moderateur', 'moderateur', 'moderateur', 'moderateur', 'moderateur@orange.fr', 0, '2021-02-03 10:32:28', '2021-02-18 10:33:05'),
(4, 10, 'oli', 'oli', 'oli', 'oli', 'oli@orange.fr', 0, '2021-02-04 10:34:11', '2021-02-18 10:34:44'),
(5, 1, 'membre', 'membre', 'membre', 'membre', 'membre@orange.fr', 0, '2021-02-05 10:34:52', '2021-02-18 10:35:40'),
(6, 10, 'client', 'client', 'client', 'client', 'client@orange.fr', 0, '2021-02-06 10:35:42', '2021-02-18 10:36:21'),
(7, 10, 'client1', 'client1', 'client1', 'client1', 'client1', 0, '2021-02-07 10:37:15', '2021-02-18 10:38:02'),
(8, 1, 'membre1', 'membre1', 'membre1', 'membre1', 'membre1', 0, '2021-02-08 10:38:15', '2021-02-18 10:38:50'),
(9, 100, 'salarie', 'salarie', 'salarie', 'salarie', 'salarie@orange.fr', 0, '2021-02-09 10:39:53', '2021-02-18 10:40:32'),
(10, 100, 'intervenantext1', 'intervenantext1', 'intervenantext1', 'intervenantext1', 'interveantext1@orange.fr', 0, '2021-02-10 10:40:36', '2021-02-18 10:41:32'),
(11, 100, 'intervenantext', 'intervenantext', 'intervenantext', 'intervenantext', 'interveantext@orange.fr', 0, '2021-02-10 10:40:36', '2021-02-18 10:41:59');

--
-- Index pour les tables déchargées
--

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
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `panierhistoriqueadmin`
--
ALTER TABLE `panierhistoriqueadmin`
  ADD UNIQUE KEY `aaa` (`aaa`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `reponsemes`
--
ALTER TABLE `reponsemes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reponsemes`
--
ALTER TABLE `reponsemes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
