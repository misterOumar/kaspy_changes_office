-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 fév. 2024 à 15:54
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdkaspychangesoffice`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

DROP TABLE IF EXISTS `achats`;
CREATE TABLE IF NOT EXISTS `achats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_achat` date NOT NULL,
  `montant_achat` float NOT NULL,
  `utilisateur` varchar(250) NOT NULL,
  `carte` varchar(205) NOT NULL,
  `date_creation` text NOT NULL,
  `user_creation` varchar(250) NOT NULL,
  `navigateur_creation` varchar(250) NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` varchar(250) NOT NULL,
  `date_modif` date NOT NULL,
  `user_modif` varchar(250) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(205) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

DROP TABLE IF EXISTS `annees`;
CREATE TABLE IF NOT EXISTS `annees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `annees` varchar(20) NOT NULL,
  `date_debut` varchar(50) DEFAULT NULL,
  `date_fin` varchar(50) DEFAULT NULL,
  `ecole` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(70) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annees` (`annees`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `annees`, `date_debut`, `date_fin`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024', '2023-10-10', '2023-10-27', 'hec_cocody', '2023-10-12 16:57:57', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Fir', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-23 23:17:24', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `bureaux`
--

DROP TABLE IF EXISTS `bureaux`;
CREATE TABLE IF NOT EXISTS `bureaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `responsable` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `raison_sociale` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `sigle` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `slogan` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `tel1` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `tel2` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `fixe` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `fax` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `bp` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `site_internet` varchar(105) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `pays` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ville` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `activites` varchar(105) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `forme_juridique` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `rccm` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `compte_contribuable` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `regime_imposition` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `centre_impôts` varchar(105) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `capital_social` double NOT NULL DEFAULT '0',
  `compte_Bancaire` varchar(105) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `monnaie` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `n_agrement_1` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `n_agrement_2` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `pied_page` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `logo_etats` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `logo_reçu_inscription` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `logo_pc` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `annee_academique` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ecole` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `navigateur_creation` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ordinateur_creation` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ip_creation` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `navigateur_modif` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ordinateur_modif` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ip_modif` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`),
  KEY `responsable` (`responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Gestion des magasins';

--
-- Déchargement des données de la table `bureaux`
--

INSERT INTO `bureaux` (`id`, `libelle`, `responsable`, `raison_sociale`, `adresse`, `sigle`, `slogan`, `tel1`, `tel2`, `fixe`, `fax`, `email`, `bp`, `site_internet`, `pays`, `ville`, `activites`, `forme_juridique`, `rccm`, `compte_contribuable`, `regime_imposition`, `centre_impôts`, `capital_social`, `compte_Bancaire`, `monnaie`, `n_agrement_1`, `n_agrement_2`, `pied_page`, `logo_etats`, `logo_reçu_inscription`, `logo_pc`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'siege_abatta', 'AndOs', 'Siège Abatta', 'Angré', 'HEC', 'Nous facilitons vos transactions', '4165449489', '5444545545', '255455', '', 'email@.com', '535651651 BP ABJ 02', '', 'Angola', '', 'ecole', 'SA', '58748486498', '2464899c', 'RNI', 'yop2', 0, '', 'xof', '', '', 'hec 2022 | kaspyiis school \r\nnew tech | all right reserved\r\nby kaspyiis', 'logo.png', 'logo_1664903921.jpg', 'logo_1706280932.jpeg', '2024', 'siege_abatta', '2022-04-17 10:05:40', '', '', '', '', '2023-12-30 13:12:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, 'point_relais_bingerville', 'Salomon', 'Point relais de bingerville', 'Bingerville', 'HEC', 'Nous facilitons vos transactions', '4165449489', '5444545545', '255455', '', 'email@.com', '535651651 BP ABJ 02', '', 'Angola', '', 'ecole', 'SA', '58748486498', '2464899c', 'RNI', 'yop2', 0, '', 'xof', '', '', 'hec 2022 | kaspyiis school \r\nnew tech | all right reserved\r\nby kaspyiis', 'logo.png', 'logo_1664903921.jpg', 'logo_1706280932.jpeg', '2024', 'siege_abatta', '2022-04-17 10:05:40', '', '', '', '', '2023-12-30 13:12:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
CREATE TABLE IF NOT EXISTS `caisse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(50) NOT NULL,
  `libelle` varchar(15) NOT NULL,
  `montant` varchar(250) NOT NULL,
  `magasin` varchar(25) NOT NULL,
  `date_creation` varchar(50) NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(50) NOT NULL,
  `ordinateur_creation` varchar(50) NOT NULL,
  `ip_creation` varchar(50) NOT NULL,
  `date_modif` varchar(50) NOT NULL,
  `user_modif` varchar(30) NOT NULL,
  `navigateur_modif` varchar(50) NOT NULL,
  `ordinateur_modif` varchar(30) NOT NULL,
  `ip_modif` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `date`, `type_operation`, `libelle`, `montant`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-19', 'Sortie', 'test', '20005', 'siege_abatta', '2024-01-19 18:08:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-19 18:20:51', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-20', 'Entrée', 'hello', '1000000', 'siege_abatta', '2024-01-20 19:24:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-20 19:24:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '2024-01-31', 'Entrée', 'appro reççu mar', '73533', 'siege_abatta', '2024-01-31 21:37:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-31 21:37:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'FxlabsDesktop', '127.0.0.1'),
(4, '2023-01-04', 'Entrée', 'Appro vers Silu', '36000', 'siege_abatta', '2024-01-31 21:38:23', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-31 21:38:23', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'FxlabsDesktop', '127.0.0.1'),
(5, '2024-02-01', 'Entrée', 'RDF', '21400', 'siege_abatta', '2024-02-01 09:12:05', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 09:12:05', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(7, '2024-02-01', 'Entrée', 'TRG', '254000', 'siege_abatta', '2024-02-01 12:24:30', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 12:24:30', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, '2024-02-02', 'Entrée', 'TYYRHHB', '2540', 'siege_abatta', '2024-02-02 16:05:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-02 16:05:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `caisse_interne_transactions`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `caisse_interne_transactions`;
CREATE TABLE IF NOT EXISTS `caisse_interne_transactions` (
`date` varchar(150)
,`op` varchar(3)
,`type_transaction` varchar(50)
,`Libelle` varchar(50)
,`ENTREE` double
,`SORTIE` double
,`SOLDE` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `caisse_mg`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `caisse_mg`;
CREATE TABLE IF NOT EXISTS `caisse_mg` (
`date` date
,`op` varchar(2)
,`actions` varchar(50)
,`Libelle` varchar(47)
,`ENTREE` double
,`SORTIE` double
,`SOLDE` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `caisse_ria`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `caisse_ria`;
CREATE TABLE IF NOT EXISTS `caisse_ria` (
`date` varchar(150)
,`op` varchar(3)
,`actions` varchar(50)
,`Libelle` varchar(40)
,`ENTREE` double
,`SORTIE` double
,`SOLDE` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `caisse_wu`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `caisse_wu`;
CREATE TABLE IF NOT EXISTS `caisse_wu` (
`date` varchar(10)
,`op` varchar(2)
,`type_transaction` varchar(20)
,`Libelle` varchar(50)
,`ENTREE` double
,`SORTIE` double
,`SOLDE` double
);

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

DROP TABLE IF EXISTS `cartes`;
CREATE TABLE IF NOT EXISTS `cartes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(250) NOT NULL,
  `date_achat` date NOT NULL,
  `type_carte` varchar(2580) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_creation` date NOT NULL,
  `user_creation` varchar(250) NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) NOT NULL,
  `user_modif` varchar(250) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_carte` (`type_carte`(250)) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=758 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id`, `customer_id`, `date_achat`, `type_carte`, `status`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(179, '1', '2024-01-29', 'UBA', '0', '2024-01-29', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-29 15:38:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(180, '2', '2024-01-29', 'UBA', '1', '2024-01-29', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-30 20:28:37', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(181, '3', '2024-01-29', 'UBA', '1', '2024-01-29', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 12:57:39', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(182, '4', '2024-01-29', 'UBA', '0', '2024-01-29', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-29 15:38:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(183, '5', '2024-01-29', 'UBA', '1', '2024-01-29', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 12:54:51', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(184, '10', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(185, '11', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(186, '12', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(187, '13', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(188, '14', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(189, '15', '2024-01-31', 'test', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(190, '16', '2024-01-31', 'test', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:42:29', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(191, '17', '2024-01-31', 'test', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:42:29', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(192, '18', '2024-01-31', 'test', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:42:29', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(193, '19', '2024-01-31', 'test', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:42:29', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(194, '20', '2024-01-31', 'test', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 14:42:29', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(195, '19043863', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(196, '19043864', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(197, '19043865', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(198, '19043866', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(199, '19043867', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(200, '19043868', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(201, '19043869', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(202, '19043870', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(203, '19043871', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(204, '19043872', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(205, '19043873', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(206, '19043874', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(207, '19043875', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(208, '19043876', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(209, '19043877', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(210, '19043878', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(211, '19043879', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(212, '19043880', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(213, '19043881', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(214, '19043882', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(215, '19043883', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(216, '19043884', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(217, '19043885', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(218, '19043886', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(219, '19043887', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(220, '19043888', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(221, '19043889', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(222, '19043890', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(223, '19043891', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(224, '19043892', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(225, '19043893', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(226, '19043894', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(227, '19043895', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(228, '19043896', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(229, '19043897', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(230, '19043898', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(231, '19043899', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(232, '19043900', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(233, '19043901', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(234, '19043902', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(235, '19043903', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(236, '19043904', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(237, '19043905', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(238, '19043906', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(239, '19043907', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(240, '19043908', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(241, '19043909', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(242, '19043910', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(243, '19043911', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(244, '19043912', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:21:07', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(245, '19043913', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(246, '19043914', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(247, '19043915', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(248, '19043916', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(249, '19043917', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(250, '19043918', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(251, '19043919', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(252, '19043920', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(253, '19043921', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(254, '19043922', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(255, '19043923', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(256, '19043924', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(257, '19043925', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(258, '19043926', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(259, '19043927', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(260, '19043928', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(261, '19043929', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(262, '19043930', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(263, '19043931', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(264, '19043932', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(265, '19043933', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(266, '19043934', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(267, '19043935', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(268, '19043936', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(269, '19043937', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(270, '19043938', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(271, '19043939', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(272, '19043940', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(273, '19043941', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(274, '19043942', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(275, '19043943', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(276, '19043944', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(277, '19043945', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(278, '19043946', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(279, '19043947', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(280, '19043948', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(281, '19043949', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(282, '19043950', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(283, '19043951', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(284, '19043952', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(285, '19043953', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(286, '19043954', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(287, '19043955', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(288, '19043956', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(289, '19043957', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(290, '19043958', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(291, '19043959', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(292, '19043960', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(293, '19043961', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(294, '19043962', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:22:26', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(295, '19043712', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(296, '19043713', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(297, '19043714', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(298, '19043715', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(299, '19043716', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(300, '19043717', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(301, '19043718', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(302, '19043719', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(303, '19043720', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(304, '19043721', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(305, '19043722', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(306, '19043723', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(307, '19043724', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(308, '19043725', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(309, '19043726', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(310, '19043727', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(311, '19043728', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(312, '19043729', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(313, '19043730', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(314, '19043731', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(315, '19043732', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(316, '19043733', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(317, '19043734', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(318, '19043735', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(319, '19043736', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(320, '19043737', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(321, '19043738', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(322, '19043739', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(323, '19043740', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(324, '19043741', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(325, '19043742', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(326, '19043743', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(327, '19043744', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(328, '19043745', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(329, '19043746', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(330, '19043747', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(331, '19043748', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(332, '19043749', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(333, '19043750', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(334, '19043751', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(335, '19043752', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(336, '19043753', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(337, '19043754', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(338, '19043755', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(339, '19043756', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(340, '19043757', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(341, '19043758', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(342, '19043759', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(343, '19043760', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(344, '19043761', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(345, '19043762', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(346, '19043763', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(347, '19043764', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(348, '19043765', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(349, '19043766', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(350, '19043767', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(351, '19043768', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(352, '19043769', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(353, '19043770', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(354, '19043771', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(355, '19043772', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(356, '19043773', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(357, '19043774', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(358, '19043775', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(359, '19043776', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(360, '19043777', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(361, '19043778', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(362, '19043779', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(363, '19043780', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(364, '19043781', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(365, '19043782', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(366, '19043783', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(367, '19043784', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(368, '19043785', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(369, '19043786', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(370, '19043787', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(371, '19043788', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1');
INSERT INTO `cartes` (`id`, `customer_id`, `date_achat`, `type_carte`, `status`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(372, '19043789', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(373, '19043790', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(374, '19043791', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(375, '19043792', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(376, '19043793', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(377, '19043794', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(378, '19043795', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(379, '19043796', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(380, '19043797', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(381, '19043798', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(382, '19043799', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(383, '19043800', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(384, '19043801', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(385, '19043802', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(386, '19043803', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(387, '19043804', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(388, '19043805', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(389, '19043806', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(390, '19043807', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(391, '19043808', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(392, '19043809', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(393, '19043810', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(394, '19043811', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(395, '19043812', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(396, '19043813', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(397, '19043814', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(398, '19043815', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(399, '19043816', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(400, '19043817', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(401, '19043818', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(402, '19043819', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(403, '19043820', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(404, '19043821', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(405, '19043822', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(406, '19043823', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(407, '19043824', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(408, '19043825', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(409, '19043826', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(410, '19043827', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(411, '19043828', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(412, '19043829', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(413, '19043830', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(414, '19043831', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(415, '19043832', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(416, '19043833', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(417, '19043834', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(418, '19043835', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(419, '19043836', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(420, '19043837', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(421, '19043838', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(422, '19043839', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(423, '19043840', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(424, '19043841', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(425, '19043842', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(426, '19043843', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(427, '19043844', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(428, '19043845', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(429, '19043846', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(430, '19043847', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(431, '19043848', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(432, '19043849', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(433, '19043850', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(434, '19043851', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(435, '19043852', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(436, '19043853', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(437, '19043854', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(438, '19043855', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(439, '19043856', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(440, '19043857', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(441, '19043858', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(442, '19043859', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(443, '19043860', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(444, '19043861', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(445, '19043862', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(446, '19043863', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(447, '19043864', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(448, '19043865', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(449, '19043866', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(450, '19043867', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(451, '19043868', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(452, '19043869', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(453, '19043870', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(454, '19043871', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(455, '19043872', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(456, '19043873', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(457, '19043874', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(458, '19043875', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(459, '19043876', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(460, '19043877', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(461, '19043878', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(462, '19043879', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(463, '19043880', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(464, '19043881', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(465, '19043882', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(466, '19043883', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(467, '19043884', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(468, '19043885', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(469, '19043886', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(470, '19043887', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(471, '19043888', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(472, '19043889', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(473, '19043890', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(474, '19043891', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(475, '19043892', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(476, '19043893', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(477, '19043894', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(478, '19043895', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(479, '19043896', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(480, '19043897', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(481, '19043898', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(482, '19043899', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(483, '19043900', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(484, '19043901', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(485, '19043902', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(486, '19043903', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(487, '19043904', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(488, '19043905', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(489, '19043906', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(490, '19043907', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(491, '19043908', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(492, '19043909', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(493, '19043910', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(494, '19043911', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(495, '19043912', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(496, '19043913', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(497, '19043914', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(498, '19043915', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(499, '19043916', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(500, '19043917', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(501, '19043918', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(502, '19043919', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(503, '19043920', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(504, '19043921', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(505, '19043922', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(506, '19043923', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(507, '19043924', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(508, '19043925', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(509, '19043926', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(510, '19043927', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(511, '19043928', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(512, '19043929', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(513, '19043930', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(514, '19043931', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(515, '19043932', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(516, '19043933', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(517, '19043934', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(518, '19043935', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(519, '19043936', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(520, '19043937', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(521, '19043938', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(522, '19043939', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(523, '19043940', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(524, '19043941', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(525, '19043942', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(526, '19043943', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(527, '19043944', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(528, '19043945', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(529, '19043946', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(530, '19043947', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(531, '19043948', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(532, '19043949', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(533, '19043950', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(534, '19043951', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(535, '19043952', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(536, '19043953', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(537, '19043954', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(538, '19043955', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(539, '19043956', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(540, '19043957', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(541, '19043958', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(542, '19043959', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(543, '19043960', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(544, '19043961', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(545, '19043962', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(546, '19043963', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(547, '19043964', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(548, '19043965', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(549, '19043966', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(550, '19043967', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(551, '19043968', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(552, '19043969', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(553, '19043970', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(554, '19043971', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(555, '19043972', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(556, '19043973', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(557, '19043974', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(558, '19043975', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(559, '19043976', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(560, '19043977', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(561, '19043978', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(562, '19043979', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(563, '19043980', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(564, '19043981', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1');
INSERT INTO `cartes` (`id`, `customer_id`, `date_achat`, `type_carte`, `status`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(565, '19043982', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(566, '19043983', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(567, '19043984', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(568, '19043985', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(569, '19043986', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(570, '19043987', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(571, '19043988', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(572, '19043989', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(573, '19043990', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(574, '19043991', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(575, '19043992', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(576, '19043993', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(577, '19043994', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(578, '19043995', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(579, '19043996', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(580, '19043997', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(581, '19043998', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(582, '19043999', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(583, '19044000', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(584, '19044001', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(585, '19044002', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(586, '19044003', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(587, '19044004', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(588, '19044005', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(589, '19044006', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(590, '19044007', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(591, '19044008', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(592, '19044009', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(593, '19044010', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(594, '19044011', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(595, '19044012', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(596, '19044013', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(597, '19044014', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(598, '19044015', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(599, '19044016', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(600, '19044017', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(601, '19044018', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(602, '19044019', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(603, '19044020', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(604, '19044021', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(605, '19044022', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(606, '19044023', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(607, '19044024', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(608, '19044025', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(609, '19044026', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(610, '19044027', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(611, '19044028', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(612, '19044029', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(613, '19044030', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(614, '19044031', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(615, '19044032', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(616, '19044033', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(617, '19044034', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(618, '19044035', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(619, '19044036', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(620, '19044037', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(621, '19044038', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(622, '19044039', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(623, '19044040', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(624, '19044041', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(625, '19044042', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(626, '19044043', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(627, '19044044', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(628, '19044045', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(629, '19044046', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(630, '19044047', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(631, '19044048', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(632, '19044049', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(633, '19044050', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(634, '19044051', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(635, '19044052', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(636, '19044053', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(637, '19044054', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(638, '19044055', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(639, '19044056', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(640, '19044057', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(641, '19044058', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(642, '19044059', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(643, '19044060', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(644, '19044061', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(645, '19044062', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(646, '19044063', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(647, '19044064', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(648, '19044065', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(649, '19044066', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(650, '19044067', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(651, '19044068', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(652, '19044069', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(653, '19044070', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(654, '19044071', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(655, '19044072', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(656, '19044073', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(657, '19044074', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(658, '19044075', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(659, '19044076', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(660, '19044077', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(661, '19044078', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(662, '19044079', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(663, '19044080', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(664, '19044081', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(665, '19044082', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(666, '19044083', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(667, '19044084', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(668, '19044085', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(669, '19044086', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(670, '19044087', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(671, '19044088', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(672, '19044089', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(673, '19044090', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(674, '19044091', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(675, '19044092', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(676, '19044093', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(677, '19044094', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(678, '19044095', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(679, '19044096', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(680, '19044097', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(681, '19044098', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(682, '19044099', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(683, '19044100', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(684, '19044101', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(685, '19044102', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(686, '19044103', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(687, '19044104', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(688, '19044105', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(689, '19044106', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(690, '19044107', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(691, '19044108', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(692, '19044109', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(693, '19044110', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(694, '19044111', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(695, '19044112', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(696, '19044113', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(697, '19044114', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(698, '19044115', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(699, '19044116', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(700, '19044117', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(701, '19044118', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(702, '19044119', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(703, '19044120', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(704, '19044121', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(705, '19044122', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(706, '19044123', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(707, '19044124', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(708, '19044125', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(709, '19044126', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(710, '19044127', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(711, '19044128', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(712, '19044129', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(713, '19044130', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(714, '19044131', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(715, '19044132', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(716, '19044133', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(717, '19044134', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(718, '19044135', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(719, '19044136', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(720, '19044137', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(721, '19044138', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(722, '19044139', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(723, '19044140', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(724, '19044141', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(725, '19044142', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(726, '19044143', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(727, '19044144', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(728, '19044145', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(729, '19044146', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(730, '19044147', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(731, '19044148', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(732, '19044149', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(733, '19044150', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(734, '19044151', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(735, '19044152', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(736, '19044153', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(737, '19044154', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(738, '19044155', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(739, '19044156', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(740, '19044157', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(741, '19044158', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(742, '19044159', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(743, '19044160', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(744, '19044161', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(745, '19044162', '2024-01-31', 'UBA', '0', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:25:38', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(746, '19043691', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(747, '19043692', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(748, '19043693', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(749, '19043694', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(750, '19043695', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(751, '19043696', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(752, '19043697', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(753, '19043698', '2024-01-31', 'UBA', '1', '2024-01-31', 'OUMAR', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(756, '000023658', '2024-02-24', 'VISA', '0', '2024-02-01', 'KASP KESSE', '0000-00-00', 'DESKTOP-5J84HQK', '2012-07-00', '2024-02-01 15:29:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(757, '0000019235', '2024-02-02', 'MASTER-CARD', '0', '2024-02-02', 'KASP KESSE', '0000-00-00', 'DESKTOP-5J84HQK', '2012-07-00', '2024-02-02 16:04:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `changes`
--

DROP TABLE IF EXISTS `changes`;
CREATE TABLE IF NOT EXISTS `changes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `devise` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `montant1` varchar(250) NOT NULL,
  `taux` varchar(250) NOT NULL,
  `montant2` varchar(250) NOT NULL,
  `client` varchar(2580) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_creation` date NOT NULL,
  `user_creation` varchar(250) NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) NOT NULL,
  `user_modif` varchar(250) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `changes`
--

INSERT INTO `changes` (`id`, `date`, `devise`, `type`, `montant1`, `taux`, `montant2`, `client`, `telephone`, `adresse`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(6, '2024-01-15', 'EURO', 'Vente', '100000', '0.25', '25000', 'ABOLE JEAN', '014025658', 'yopougon121', '2024-01-15', 'KASP KESSE', '0000-00-00', 'DESKTOP-5J84HQK', '2012-07-00', '2024-01-19 19:45:24', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(7, '2024-01-16', 'EURO', 'Achat', '200000', '0.25', '50000', 'AHOUE JACQUES', '014025658', 'BINGERVILLE', '2024-01-16', 'KASP KESSE', '0000-00-00', 'DESKTOP-5J84HQK', '2012-07-00', '2024-01-16 15:23:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, '2024-02-08', 'USD', 'Achat', '58965', '0.25', '14741.25', 'ABOLE JEAN', '014025658', 'yopougon', '2024-02-08', 'KASP KESSE', '0000-00-00', 'DESKTOP-5J84HQK', '2012-07-00', '2024-02-09 10:44:10', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `n_piece` varchar(70) NOT NULL,
  `nature_depense` varchar(75) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `fournisseur` varchar(75) NOT NULL,
  `montant` double NOT NULL,
  `mode_reglement` varchar(40) NOT NULL,
  `annee_academique` varchar(20) NOT NULL,
  `magasin.` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(250) NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nature_depense` (`nature_depense`),
  KEY `mode_reglement` (`mode_reglement`),
  KEY `fournisseur` (`fournisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `dates`, `n_piece`, `nature_depense`, `designation`, `fournisseur`, `montant`, `mode_reglement`, `annee_academique`, `magasin.`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-11', '00000001', 'frais de comptable', 'test', 'SODECI', 50000000000, 'Wave', '2021-2022', 'hec yopougon', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-26', '', 'frais de comptable', 'jjhjj', 'SOCECE', 52222, 'Orange Money', '2021-2022', 'hec yopougon', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'HP-15eg0033nk-WFI7', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(75) NOT NULL,
  `adresse` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `interlocuteur` varchar(75) NOT NULL,
  `annee_academique` varchar(20) NOT NULL,
  `ecole` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(255) NOT NULL,
  `ordinateur_creation` varchar(255) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(255) NOT NULL,
  `ordinateur_modif` varchar(255) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Raison_sociale` (`raison_sociale`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `raison_sociale`, `adresse`, `email`, `tel`, `interlocuteur`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(2, 'SOCECE', 'Abidjan', '', '07070707', 'service', '2022-2023', 'hec_cocody', '2022-09-23 06:53:40', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-10-08 21:45:55', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1'),
(8, 'SODECI', 'abidjan', 'sodeci@gmail.com', '07070708', 'Sodeci', '2024-2025', 'hec_cocody', '2023-10-08 19:51:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1', '2023-10-08 21:46:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(150) NOT NULL,
  `users` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type_compte` int NOT NULL,
  `sex` varchar(15) NOT NULL,
  `adresse` varchar(75) NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `matricule` varchar(45) NOT NULL,
  `date_naissance` date NOT NULL,
  `n_piece` varchar(45) NOT NULL,
  `nationnalite` varchar(75) NOT NULL,
  `situation_matrimoniale` varchar(70) NOT NULL,
  `fonction` varchar(75) NOT NULL,
  `details_fonction` varchar(150) NOT NULL,
  `nombre_enfants` varchar(35) NOT NULL,
  `permis_conduire` varchar(45) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `connected` tinyint(1) NOT NULL DEFAULT '0',
  `bloqued` tinyint(1) NOT NULL DEFAULT '1',
  `valide_compte` tinyint(1) NOT NULL DEFAULT '0',
  `otp` varchar(10) NOT NULL,
  `date_connexion` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `ordinateur_modif` varchar(255) NOT NULL,
  `navigateur_modif` varchar(255) NOT NULL,
  `ip_modif` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permission` (`type_compte`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nom_prenom`, `users`, `password`, `type_compte`, `sex`, `adresse`, `tel1`, `tel2`, `email`, `matricule`, `date_naissance`, `n_piece`, `nationnalite`, `situation_matrimoniale`, `fonction`, `details_fonction`, `nombre_enfants`, `permis_conduire`, `photo`, `connected`, `bloqued`, `valide_compte`, `otp`, `date_connexion`, `date_modif`, `ordinateur_modif`, `navigateur_modif`, `ip_modif`) VALUES
(2, 'KESSE', 'KASP KESSE', '$2y$12$HJfDAfdiIgfYrLsTg07cYOE9IHEtRzdDsTUhNR6AU34zRU3bSpbfC', 104, 'H', '', '', '', 'kasp@gmail.com', '', '2022-09-21', '', 'ivoirienne', 'Marié', 'expert', '', '', 'ABCze', 'KASP KESSE_1663222930.png', 1, 0, 1, '', '2024-02-14 15:52:35', '2022-09-26 14:28:08', 'design.test', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '127.0.0.1'),
(8, 'KOMENAN SAMUEL N', 'KOMENAN SAMUEL N', '$2y$12$s9ab9KMay74I15L4E49U7uqZk5b8UWzLfQiI.QyRTX.vx4Rq78GsG', 75, 'Homme', 'yopougon', '0704208252', '', 'samuelnickanor66@gmail.com', '', '0000-00-00', '', '', '', 'DEVOPS', '', '', '', 'user_default.jpg', 1, 0, 1, '$2y$12$QPj', '2024-01-23 08:06:18', '2024-01-23 07:42:04', 'DESKTOP-5J84HQK', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '127.0.0.1'),
(9, 'Edlande', 'Edlande', '$2y$12$yKWx5R7.Hu7Ap8JeNUC5t.K4oVd20vHcHVW04bgl9Jz6Tb/4RtJcu', 75, 'Femme', 'Beago', '0102452212', '', 'nicksam053@gmail.com', '', '2024-02-15', '', '', '', 'Comptable', '', '', '', 'Edlande_1707213721.jpg', 0, 0, 1, '$2y$12$Wbm', '2024-02-06 10:02:01', '2024-02-06 10:02:01', 'DESKTOP-5J84HQK', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `mobile_money`
--

DROP TABLE IF EXISTS `mobile_money`;
CREATE TABLE IF NOT EXISTS `mobile_money` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(70) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `mode_reglements`
--

DROP TABLE IF EXISTS `mode_reglements`;
CREATE TABLE IF NOT EXISTS `mode_reglements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `annee_academique` varchar(20) NOT NULL,
  `ecole` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(255) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `mode_reglements`
--

INSERT INTO `mode_reglements` (`id`, `nom`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(6, 'Orange Money', '2024-2025', 'hec_cocody', '2022-09-22 14:18:20', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 'design.test', '127.0.0.1', '2023-09-23 01:17:25', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1'),
(15, 'Moov Money', '2024-2025', 'hec_cocody', '2023-09-23 01:19:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1', '2023-10-02 11:13:40', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1'),
(16, 'Wave', '2024-2025', 'hec_cocody', '2023-09-23 01:19:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1', '2023-09-23 01:19:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1'),
(17, 'Cheque', '2024-2025', 'hec_cocody', '2023-09-23 01:19:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1', '2023-09-23 01:19:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1'),
(18, 'Espèce', '2024-2025', 'hec_cocody', '2023-09-23 01:19:55', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1', '2023-09-23 01:19:55', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `moneygram`
--

DROP TABLE IF EXISTS `moneygram`;
CREATE TABLE IF NOT EXISTS `moneygram` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_heure` varchar(50) NOT NULL,
  `num_ref` varchar(100) NOT NULL DEFAULT 'N/A',
  `code_aut` varchar(255) NOT NULL,
  `id_user` varchar(100) NOT NULL DEFAULT 'N/A',
  `id_pvente` int NOT NULL,
  `montant` double DEFAULT NULL,
  `frais` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `taxe` double NOT NULL,
  `type_operation` varchar(50) NOT NULL,
  `dates` date NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `moneygram`
--

INSERT INTO `moneygram` (`id`, `date_heure`, `num_ref`, `code_aut`, `id_user`, `id_pvente`, `montant`, `frais`, `total`, `taxe`, `type_operation`, `dates`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2023-Aug-18 09:17:00', '87204407', '4175', 'NKOUA00', 2, -88699.93, 0, -88699.93, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2023-Aug-18 13:21:11', '44838763', '8211', 'NKOUA00', 2, -350071.91, 0, -350071.91, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '2023-Aug-18 13:48:23', '85219412', '8483', 'NKOUA00', 2, -386048.08, 0, -386048.08, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(4, '2023-Aug-18 13:59:59', '29180582', '9005', 'NKOUA00', 2, -32141.9, 0, -32141.9, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(5, '2023-Aug-18 16:10:47', '86371740', '11105', 'NKOUA00', 2, -189719.25, 0, -189719.25, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(6, '2023-Aug-18 16:15:37', '34513476', '11154', 'NKOUA00', 2, -918339.9, 0, -918339.9, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(7, '2023-Aug-18 16:24:34', '55878948', '11244', 'NKOUA00', 2, -50003.61, 0, -50003.61, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(8, '2023-Aug-18 16:27:09', '26500054', '11271', 'NKOUA00', 2, -400187.85, 0, -400187.85, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(9, '2023-Aug-18 17:43:22', '70886490', '12432', 'NKOUA00', 2, -23004.41, 0, -23004.41, 250, 'Reçu', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(10, '2023-Aug-18 12:19:23', '75472733', '0', 'NKOUA00', 2, 478967.82, 13475, 492442.82, 250, 'Envoyé', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(11, '2023-Aug-18 14:51:12', '49109534', '0', 'NKOUA00', 2, 676370.17, 11000, 687370.17, 250, 'Envoyé', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(12, '2023-Aug-18 16:21:36', '60164255', '0', 'NKOUA00', 2, 63345.07, 3500, 66845.07, 250, 'Envoyé', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1'),
(13, '2023-Aug-18 16:56:12', '73478955', '0', 'NKOUA00', 2, 11000, 800, 11800, 250, 'Envoyé', '2023-08-18', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-26 10:25:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `moov`
--

DROP TABLE IF EXISTS `moov`;
CREATE TABLE IF NOT EXISTS `moov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(50) NOT NULL,
  `telephone_client` varchar(15) NOT NULL,
  `montant` varchar(250) NOT NULL,
  `solde_total` double NOT NULL,
  `id_transaction` varchar(45) NOT NULL,
  `magasin` varchar(25) NOT NULL,
  `date_creation` varchar(50) NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(50) NOT NULL,
  `ordinateur_creation` varchar(50) NOT NULL,
  `ip_creation` varchar(50) NOT NULL,
  `date_modif` varchar(50) NOT NULL,
  `user_modif` varchar(30) NOT NULL,
  `navigateur_modif` varchar(50) NOT NULL,
  `ordinateur_modif` varchar(30) NOT NULL,
  `ip_modif` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `moov`
--

INSERT INTO `moov` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `solde_total`, `id_transaction`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-25', 'Dépot', '0554516932', '2000', 250000, '4563256', 'siege_abatta', '2024-01-25 16:35:14', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-25 16:35:14', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `mtn`
--

DROP TABLE IF EXISTS `mtn`;
CREATE TABLE IF NOT EXISTS `mtn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(10) NOT NULL,
  `telephone_client` varchar(250) NOT NULL,
  `montant` varchar(10) NOT NULL,
  `solde_total` double NOT NULL,
  `id_transaction` varchar(45) NOT NULL,
  `magasin` varchar(25) NOT NULL,
  `date_creation` varchar(20) NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(50) NOT NULL,
  `ordinateur_creation` varchar(50) NOT NULL,
  `ip_creation` varchar(50) NOT NULL,
  `date_modif` varchar(50) NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(50) NOT NULL,
  `ordinateur_modif` varchar(50) NOT NULL,
  `ip_modif` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `mtn`
--

INSERT INTO `mtn` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `solde_total`, `id_transaction`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-12', 'Dépot', '0554516932', '100000', 0, '0', '', '2024-01-12 09:31:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:31:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-12', 'Retrait', '05545356', '54544587', 0, '0', '', '2024-01-12 09:31:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:31:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '2024-01-15', 'Retrait', '0140258565', '96585', 9658, '896655', 'siege_abatta', '2024-01-15 14:31:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-01-18 11:48:50', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(4, '2024-01-17', 'Retrait', '0554516932', '10000000', 157856132, '10554', 'siege_abatta', '2024-01-17 23:25:05', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-31 13:25:58', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'FxlabsDesktop', '127.0.0.1'),
(5, '2024-01-20', 'Retrait', '0554516932', '150000', 2568422, '14455', 'point_relais_bingerville', '2024-01-20 19:49:34', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-20 19:49:34', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(6, '2024-02-15', 'Dépot', '147852', '96585', 235, '1236564', 'siege_abatta', '2024-02-14 12:27:55', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 12:27:55', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(7, '2024-02-14', 'Retrait', '147852', '96585', 235, '896655', 'siege_abatta', '2024-02-14 12:34:45', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 12:34:45', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `nature_depenses`
--

DROP TABLE IF EXISTS `nature_depenses`;
CREATE TABLE IF NOT EXISTS `nature_depenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(75) NOT NULL,
  `frequence` varchar(45) NOT NULL,
  `observations` varchar(250) NOT NULL,
  `annee_academique` varchar(20) NOT NULL,
  `ecole` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(70) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nom` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `nature_depenses`
--

INSERT INTO `nature_depenses` (`id`, `libelle`, `frequence`, `observations`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(4, 'frais de comptable', 'Hebdomadaire', 'Cette dépense concerne ...', '2024-2025', 'hec_cocody', '2022-09-29 06:22:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Fir', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-10-02 11:14:09', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1'),
(5, 'Achat de fourniture bureau', 'Annuelle', 'test', '2024-2025', 'hec_cocody', '2022-12-21 17:03:33', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Fir', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-09-23 01:56:07', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `operatio_money_gram`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `operatio_money_gram`;
CREATE TABLE IF NOT EXISTS `operatio_money_gram` (
`dates` date
,`nbre_operation_envoi` decimal(23,0)
,`nbre_operation_payer` decimal(23,0)
,`frais_envoi` double
,`taxe_envoi` double
,`montant_envoye` double
,`total_envoi` double
,`montant_paye` double
,`montant_payer_envoi` double
);

-- --------------------------------------------------------

--
-- Structure de la table `orange`
--

DROP TABLE IF EXISTS `orange`;
CREATE TABLE IF NOT EXISTS `orange` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(250) NOT NULL,
  `telephone_client` varchar(10) NOT NULL,
  `montant` varchar(250) NOT NULL,
  `solde_total` double NOT NULL,
  `id_transaction` varchar(45) NOT NULL,
  `magasin` varchar(25) NOT NULL,
  `date_creation` varchar(50) NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(50) NOT NULL,
  `ordinateur_creation` varchar(50) NOT NULL,
  `ip_creation` varchar(50) NOT NULL,
  `date_modif` varchar(50) NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(50) NOT NULL,
  `ordinateur_modif` varchar(50) NOT NULL,
  `ip_modif` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orange`
--

INSERT INTO `orange` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `solde_total`, `id_transaction`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(2, '2024-01-12', 'Dépot', '0555457698', '10000', 0, '0', '', '2024-01-12 09:18:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:18:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '2024-01-12', 'Retrait', '11111111', '2222222222222', 0, '0', '', '2024-01-12 12:43:28', '2024-01-12 12:43:28', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 12:43:28', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop'),
(5, '2024-01-15', 'Dépot', '0140258565', '96585', 99658, '896655', 'siege_abatta', '2024-01-15 10:48:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-01-15 10:48:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, '2024-01-17', 'Retrait', '0554516932', '250000', 18965540, '145598896', 'siege_abatta', '2024-01-17 23:20:34', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-02-01 09:10:32', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(10, '2024-02-01', 'Retrait', '0140258565', '200000', 966558, '896655', 'siege_abatta', '2024-02-01 12:18:21', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 12:18:21', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(9, '2024-02-01', 'Dépot', '0140258565', '58965', 9658, '896655', 'siege_abatta', '2024-02-01 12:17:56', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 10:02:45', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(13, '2024-02-06', 'Dépot', '0140258565', '96585', 99658, '896655', 'siege_abatta', '2024-02-06 10:03:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 10:03:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `ria`
--

DROP TABLE IF EXISTS `ria`;
CREATE TABLE IF NOT EXISTS `ria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_transfert` varchar(100) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `mode_livraison` varchar(50) DEFAULT NULL,
  `caissier` varchar(50) DEFAULT NULL,
  `agence` varchar(50) DEFAULT NULL,
  `code_agence` varchar(50) DEFAULT NULL,
  `agence_recon` varchar(50) DEFAULT NULL,
  `code_agence_recon` varchar(50) DEFAULT NULL,
  `montant_envoye` varchar(250) DEFAULT NULL,
  `devise_envoye` varchar(50) DEFAULT NULL,
  `pays_envoi` varchar(50) DEFAULT NULL,
  `pays_destination` varchar(50) DEFAULT NULL,
  `montant_paye` varchar(50) DEFAULT NULL,
  `devise_paiement` varchar(50) DEFAULT NULL,
  `montant_commission` varchar(50) DEFAULT NULL,
  `devise_commission` varchar(50) DEFAULT NULL,
  `date` varchar(150) DEFAULT NULL,
  `taux` varchar(50) DEFAULT NULL,
  `tob` varchar(50) DEFAULT NULL,
  `tthu` varchar(50) DEFAULT NULL,
  `frais` varchar(250) DEFAULT NULL,
  `actions` varchar(50) DEFAULT NULL,
  `magasin` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ria`
--

INSERT INTO `ria` (`id`, `num_transfert`, `pin`, `mode_livraison`, `caissier`, `agence`, `code_agence`, `agence_recon`, `code_agence_recon`, `montant_envoye`, `devise_envoye`, `pays_envoi`, `pays_destination`, `montant_paye`, `devise_paiement`, `montant_commission`, `devise_commission`, `date`, `taux`, `tob`, `tthu`, `frais`, `actions`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'CI1678992019', '12121877958', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-96150', 'XOF', 'Cote d Ivoire', 'France', '14658', 'EUR', '417', 'XOF', '21/08/2023 14:15', '655957', '500', '577', '2775', 'Envoi', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(2, 'IT235202232', '12131108283', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'Italy', 'Cote d Ivoire', '36075', 'XOF', '341', '0', '21/08/2023 12:53', '655957', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(3, 'FR235984332', '12134296447', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'France', 'Cote d Ivoire', '285995', 'XOF', '1194', '0', '21/08/2023 12:29', '655957', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(4, 'UK1677095519', '12138915647', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'United Kingdom', 'Cote d Ivoire', '700000', 'XOF', '2985', '0', '21/08/2023 11:59', '758685', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(5, 'FR99653232', '12139670684', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'France', 'Cote d Ivoire', '307315', 'XOF', '9805', '0', '21/08/2023 11:02', '655957', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(6, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', '0', '21/08/2023 10:35', '655957', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(7, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '0', '0', 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', '0', '21/08/2023 10:35', '655957', '0', '0', '0', 'Transfert Payé', 'siege_abatta', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 11:24:29', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role_permission`
--

INSERT INTO `role_permission` (`id`, `libelle`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(75, 'Administrateur', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2024-01-16 13:37:58', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(103, 'mm', '2023-10-10 17:42:18', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(104, 'AdministrateurAll', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(105, 'rien', '2023-10-11 20:14:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(106, 'Developpeur', '2023-10-30 18:05:02', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2024-01-16 12:01:35', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(107, 'test', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-16 12:02:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(108, 'Gestionnaire', '2024-01-16 12:51:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-01-16 15:25:40', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `role_permission_details`
--

DROP TABLE IF EXISTS `role_permission_details`;
CREATE TABLE IF NOT EXISTS `role_permission_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_permission` int NOT NULL,
  `fonction` varchar(75) NOT NULL,
  `lecture` tinyint(1) NOT NULL,
  `creation` tinyint(1) NOT NULL,
  `modification` tinyint(1) NOT NULL,
  `suppression` tinyint(1) NOT NULL,
  `duplicata` tinyint(1) NOT NULL,
  `visualisation` tinyint(1) NOT NULL,
  `exportation` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permission` (`role_permission`)
) ENGINE=MyISAM AUTO_INCREMENT=484 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role_permission_details`
--

INSERT INTO `role_permission_details` (`id`, `role_permission`, `fonction`, `lecture`, `creation`, `modification`, `suppression`, `duplicata`, `visualisation`, `exportation`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(483, 104, 'Nature de dépenses', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(482, 104, 'Mode de reglement', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(479, 104, 'Annees de gestion', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(480, 104, 'Dossier entreprise', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(481, 104, 'Type de cartes', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(477, 104, 'Reglages', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(478, 104, 'Logo et pied de page', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(463, 104, 'Ria', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(464, 104, 'Western Union', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(465, 104, 'Changes', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(466, 104, 'Fournisseurs', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(467, 104, 'Dépenses', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(468, 104, 'Moov Money', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(469, 104, 'MTN Money', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(470, 104, 'Orange Money', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(471, 104, 'Achat de cartes', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(472, 104, 'Vente de cartes', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(473, 104, 'Money Gram', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(474, 104, 'Rechargement UBA', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(476, 104, 'role_modif et permission', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(475, 104, 'Gestion utilisateurs', 1, 1, 1, 1, 1, 1, 1, '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 15:52:26', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` double NOT NULL,
  `date_transaction` date DEFAULT NULL,
  `nature` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(70) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `transaction_changes`
--

DROP TABLE IF EXISTS `transaction_changes`;
CREATE TABLE IF NOT EXISTS `transaction_changes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL DEFAULT '0000-00-00',
  `elements` varchar(50) NOT NULL DEFAULT 'N/A',
  `achats` double DEFAULT NULL,
  `taux` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `elements_1` varchar(50) NOT NULL DEFAULT 'N/A',
  `ventes` double DEFAULT NULL,
  `taux_2` double DEFAULT NULL,
  `total_3` double DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `total_cms` double DEFAULT NULL,
  `ajouter_par` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ajouter_par` (`ajouter_par`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `transaction_money_gram`
--

DROP TABLE IF EXISTS `transaction_money_gram`;
CREATE TABLE IF NOT EXISTS `transaction_money_gram` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Heure_et_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Num_Ref` varchar(100) NOT NULL DEFAULT 'N/A',
  `Identifiant_utilisateur` varchar(100) NOT NULL DEFAULT 'N/A',
  `ID_point_vente` int NOT NULL,
  `Montant` double DEFAULT NULL,
  `Frais` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `ajouter_par` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ajouter_par` (`ajouter_par`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `transaction_money_gram`
--

INSERT INTO `transaction_money_gram` (`id`, `Heure_et_date`, `Num_Ref`, `Identifiant_utilisateur`, `ID_point_vente`, `Montant`, `Frais`, `Total`, `ajouter_par`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2023-11-09 12:30:00', 'ABC123', 'user1', 1, 100.5, 10.2, 110.7, 1, '2023-11-09 12:30:00', 'user1', 'Chrome', 'PC1', '192.168.0.1', '2023-11-09 12:30:00', 'user2', 'Firefox', 'PC2', '192.168.0.2'),
(2, '2023-11-10 08:45:00', 'DEF456', 'user2', 2, 75, 8.3, 83.3, 2, '2023-11-10 08:45:00', 'user2', 'Safari', 'Laptop1', '192.168.0.3', '2023-11-10 08:45:00', 'user1', 'Edge', 'Laptop2', '192.168.0.4'),
(3, '2023-11-11 15:20:00', 'GHI789', 'user3', 3, 120.8, 12.5, 133.3, 3, '2023-11-11 15:20:00', 'user3', 'Firefox', 'PC3', '192.168.0.5', '2023-11-11 15:20:00', 'user1', 'Chrome', 'PC4', '192.168.0.6'),
(4, '2023-11-12 09:10:00', 'JKL012', 'user4', 4, 50.2, 7.8, 58, 4, '2023-11-12 09:10:00', 'user4', 'Edge', 'Laptop3', '192.168.0.7', '2023-11-12 09:10:00', 'user2', 'Safari', 'Laptop4', '192.168.0.8'),
(5, '2023-11-13 14:00:00', 'MNO345', 'user5', 5, 90, 9.2, 99.2, 5, '2023-11-13 14:00:00', 'user5', 'Chrome', 'PC5', '192.168.0.9', '2023-11-13 14:00:00', 'user3', 'Firefox', 'PC6', '192.168.0.10');

-- --------------------------------------------------------

--
-- Structure de la table `transaction_uba`
--

DROP TABLE IF EXISTS `transaction_uba`;
CREATE TABLE IF NOT EXISTS `transaction_uba` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Trans_ID` varchar(100) NOT NULL DEFAULT 'N/A',
  `Dates` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Amount` double DEFAULT NULL,
  `Fees` double DEFAULT NULL,
  `Running_Bal` double DEFAULT NULL,
  `Description` varchar(255) NOT NULL DEFAULT 'N/A',
  `Reference` varchar(255) NOT NULL DEFAULT 'N/A',
  `Account_Id` varchar(100) NOT NULL DEFAULT 'N/A',
  `Last_Name` varchar(100) NOT NULL DEFAULT 'N/A',
  `ajouter_par` varchar(150) NOT NULL,
  `magasin` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ajouter_par` (`ajouter_par`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `transaction_uba`
--

INSERT INTO `transaction_uba` (`id`, `Trans_ID`, `Dates`, `Amount`, `Fees`, `Running_Bal`, `Description`, `Reference`, `Account_Id`, `Last_Name`, `ajouter_par`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '1187719761', '2024-01-13 10:40:32', 45001, 0, 2168817289668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(2, '1187717860', '2024-01-13 10:36:09', -53000, 0, 2168367279668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 16824666 MORIBA BAMBA', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(3, '1187640367', '2024-01-13 08:50:30', 500005, 0, 2221367279668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(4, '1187636709', '2024-01-13 08:45:07', -15000, 0, 2220867274668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 17340557 guekourougo norbert kone', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(5, '1187631605', '2024-01-13 08:35:31', 9091, 0, 2235867274668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(6, '1187631601', '2024-01-13 08:35:31', 500005, 0, 2234958174668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(7, '1187629874', '2024-01-13 08:31:33', -100000, 0, 2234458169668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 17340387 GNAN ALBERT LEON', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, '1187629594', '2024-01-13 08:30:49', -40000, 0, 2334458169668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 17340430 reine kadidiatou traore epse KOUAKOU', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(9, '1187609400', '2024-01-13 08:00:33', 16364, 0, 2374458169668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(10, '1187609343', '2024-01-13 08:00:32', 500005, 0, 2372821769668, 'Commission Revenu', 'Fee Distribution to Payee', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(11, '1187608868', '2024-01-13 07:59:44', -50000, 0, 2372321764668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 17340529 MICAHLORO REUBEN LAMPTEY', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(12, '1187608590', '2024-01-13 07:59:09', -200000, 0, 2422321764668, 'Recharge de la Carte', 'Card Load by Kambire Salomon Services - CID: 16805143 ALIMAN ELEONOR TRAORE', '11808833', 'Kambire Salomon Services - Main Distribution', 'KASP KESSE', 'siege_abatta', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-06 15:51:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `transaction_wu`
--

DROP TABLE IF EXISTS `transaction_wu`;
CREATE TABLE IF NOT EXISTS `transaction_wu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Dates` date NOT NULL DEFAULT '0000-00-00',
  `Heure` time NOT NULL DEFAULT '00:00:00',
  `MTCN` varchar(100) NOT NULL DEFAULT 'N/A',
  `Expéditeur` varchar(100) NOT NULL DEFAULT 'N/A',
  `Code_Du_PaysDeDestination` varchar(10) NOT NULL DEFAULT 'N/A',
  `Code_De_LaDevise_DeDestination` varchar(10) NOT NULL DEFAULT 'N/A',
  `Nom_DuReceveur` varchar(100) NOT NULL DEFAULT 'N/A',
  `MontantEnvoyédouble` double DEFAULT NULL,
  `Montant_TotalPerçu` double DEFAULT NULL,
  `Taux_DeChange` double DEFAULT NULL,
  `Montant_PayéAttendu` double DEFAULT NULL,
  `Total_Des_Frais` double DEFAULT NULL,
  `Les_Impôts` double DEFAULT NULL,
  `ajouter_par` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ajouter_par` (`ajouter_par`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `type_carte`
--

DROP TABLE IF EXISTS `type_carte`;
CREATE TABLE IF NOT EXISTS `type_carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `duree` int NOT NULL,
  `prix_achat` double NOT NULL,
  `prix_vente_detail` int NOT NULL,
  `prix_vente_gros` int NOT NULL,
  `date_creation` varchar(50) NOT NULL,
  `user_creation` varchar(250) NOT NULL,
  `navigateur_creation` varchar(250) NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` varchar(250) NOT NULL,
  `date_modif` varchar(250) NOT NULL,
  `user_modif` varchar(250) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type_carte`
--

INSERT INTO `type_carte` (`id`, `libelle`, `duree`, `prix_achat`, `prix_vente_detail`, `prix_vente_gros`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(15, 'UBA', 325, 23, 0, 9658, '2024-02-01 10:08:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 10:53:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(14, 'DJAMO', 888, 36, 2222, 222222, '2024-02-01 10:06:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 10:06:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(12, 'VISA', 2, 36, 32, 0, '2024-02-01 09:34:34', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 09:34:34', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(13, 'MASTER-CARD', 888, 555, 2222, 222222, '2024-02-01 09:54:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-01 09:54:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `upload_mtn`
--

DROP TABLE IF EXISTS `upload_mtn`;
CREATE TABLE IF NOT EXISTS `upload_mtn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `numero_expediteur` varchar(10) NOT NULL,
  `agence` varchar(10) NOT NULL,
  `numero_recepteur` varchar(100) NOT NULL,
  `nom_recepteur` varchar(100) NOT NULL,
  `montant` varchar(10) NOT NULL,
  `frais` varchar(20) NOT NULL,
  `solde` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `devise` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `dates` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `magasin` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `upload_mtn`
--

INSERT INTO `upload_mtn` (`id`, `identifiant`, `numero_expediteur`, `agence`, `numero_recepteur`, `nom_recepteur`, `montant`, `frais`, `solde`, `devise`, `dates`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '8495957730', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-45000', '0', '290887', 'XOF', '2024-02-08 15:00:16', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(2, '8495282392', '2250545730', 'TRADE MARC', '2250544348370', 'N\'TAH ALIDA ACHA', '-25000', '0', '335887', 'XOF', '2024-02-08 13:42:39', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(3, '8495065135', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-94000', '0', '360887', 'XOF', '2024-02-08 13:17:05', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(4, '8494327118', '2250574422', 'YVES-CREPI', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '150000', '0', '454887', 'XOF', '2024-02-08 12:03:10', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(5, '8493522356', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-500', '0', '304887', 'XOF', '2024-02-08 10:45:11', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(6, '8492859163', '2250545730', 'TRADE MARC', '2250504124183', 'ISSA KOUIZON', '-2000', '0', '305387', 'XOF', '2024-02-08 09:46:03', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(7, '8492728167', '2250576332', 'FOUSENI TO', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '1000', '0', '307387', 'XOF', '2024-02-08 09:35:12', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(8, '8492498486', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-96100', '0', '306387', 'XOF', '2024-02-08 09:13:35', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(9, '8492458613', '2250545730', 'TRADE MARC', '24558404', 'CANAL', '-5000', '0', '402487', 'XOF', '2024-02-08 09:09:50', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(10, '8492018803', '2250545730', 'TRADE MARC', '2250594627189', 'SOLANGE KOUAO', '-5000', '0', '407487', 'XOF', '2024-02-08 08:24:22', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(11, '8492013734', '2250545730', 'TRADE MARC', '2250594627189', 'SOLANGE KOUAO', '-5000', '0', '412487', 'XOF', '2024-02-08 08:23:45', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(12, '8487385733', '2250545730', 'TRADE MARC', '2250544282421', 'ADJOUA AGNES KOUASSI', '-50500', '0', '417487', 'XOF', '2024-02-07 16:37:23', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(13, '8487027399', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-115000', '0', '467987', 'XOF', '2024-02-07 16:02:51', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(14, '8484220907', '2250545730', 'TRADE MARC', '2250565323311', 'TRADE MARCHAND_KAIROS_ABIDJAN -', '-400000', '0', '582987', 'XOF', '2024-02-07 11:30:40', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(15, '8483684238', '2250545730', 'TRADE MARC', '2250576753508', 'KOUAME MARIE MICHEL N\'GUESSAN', '-88100', '0', '982987', 'XOF', '2024-02-07 10:42:47', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(16, '8483614260', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-54100', '0', '1071087', 'XOF', '2024-02-07 10:36:39', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(17, '8482916450', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-500', '0', '1125187', 'XOF', '2024-02-07 09:36:53', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(18, '8482719360', '2250545730', 'TRADE MARC', '2250576565251', 'YABA NICKIE-ROSINE AKA', '-10100', '0', '1125687', 'XOF', '2024-02-07 09:19:59', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(19, '8482239072', '2250545730', 'TRADE MARC', '2250594627189', 'SOLANGE KOUAO', '-5000', '0', '1135787', 'XOF', '2024-02-07 08:35:47', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(20, '8482231742', '2250545730', 'TRADE MARC', '2250594627189', 'SOLANGE KOUAO', '-5000', '0', '1140787', 'XOF', '2024-02-07 08:35:02', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(21, '8477376264', '2250574422', 'YVES-CREPI', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '286850', '0', '1145787', 'XOF', '2024-02-06 18:12:41', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(22, '8476983816', '2250554546', 'JEAN STEVE', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '350000', '0', '858937', 'XOF', '2024-02-06 17:44:14', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(23, '8475587219', '2250565399', 'NIANGORAN ', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '40000', '0', '508937', 'XOF', '2024-02-06 15:23:59', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(24, '8475481247', '2250545730', 'TRADE MARC', '2250566449955', 'FATOUMATA COULIBALY', '-15300', '0', '468937', 'XOF', '2024-02-06 15:10:48', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(25, '8474327791', '2250545730', 'TRADE MARC', '2250556101761', 'KOUAKOU GAGNO', '-100000', '0', '484237', 'XOF', '2024-02-06 13:05:45', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(26, '8473367324', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-500', '0', '584237', 'XOF', '2024-02-06 11:34:48', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(27, '8471876407', '2250565323', 'TRADE MARC', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '400000', '0', '584737', 'XOF', '2024-02-06 09:21:19', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(28, '8471548299', '2250545730', 'TRADE MARC', '2250564681343', 'AKISSI HELENE KOUASSI', '-1010000', '0', '184737', 'XOF', '2024-02-06 08:51:23', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(29, '8471531995', '2250565323', 'TRADE MARC', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '1000000', '0', '1194737', 'XOF', '2024-02-06 08:49:48', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(30, '8471372841', '2250545730', 'TRADE MARC', '2250505711085', 'BEH EMMANUEL GBADIE', '-15000', '0', '194737', 'XOF', '2024-02-06 08:33:19', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(31, '8466259473', '2250545730', 'TRADE MARC', '2250586143312', 'BI YOUZAN WILFRIED JUNIOR DJE', '-60600', '0', '209737', 'XOF', '2024-02-05 17:33:29', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(32, '8465929252', '2250545730', 'TRADE MARC', '2250505670745', 'N\'GOLO ABDOULAYE COULIBALY', '-60000', '0', '270337', 'XOF', '2024-02-05 17:04:19', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(33, '8465554083', '2250545730', 'TRADE MARC', '2250556077000', 'AMA CORINE ELISABETH YOBOUE', '-101000', '0', '330337', 'XOF', '2024-02-05 16:27:58', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(34, '8464903579', '2250545730', 'TRADE MARC', '2250584598888', 'DRAMANE SEKONGO', '-16000', '0', '431337', 'XOF', '2024-02-05 15:16:17', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(35, '8464761411', '2250545730', 'TRADE MARC', '2250544050421', 'NASSIGUE GNOUGOH AICHA COULIBALY', '-89400', '0', '447337', 'XOF', '2024-02-05 15:00:28', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(36, '8463858324', '2250545730', 'TRADE MARC', '2250576664869', 'BAH CAROLLE AMBENOU', '-1000', '0', '536737', 'XOF', '2024-02-05 13:22:40', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(37, '8462848381', '2250545730', 'TRADE MARC', '2250505463424', 'AMADOU TAMBOURA', '-12000', '0', '537737', 'XOF', '2024-02-05 11:49:02', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(38, '8462583212', '2250545730', 'TRADE MARC', '2250586558800', 'JULES CESAR GBAH', '-6000', '0', '549737', 'XOF', '2024-02-05 11:24:28', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(39, '8462537814', '2250545730', 'TRADE MARC', '2250504124183', 'ISSA KOUIZON', '-2000', '0', '555737', 'XOF', '2024-02-05 11:20:23', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(40, '8460935269', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-300', '0', '557737', 'XOF', '2024-02-05 09:00:19', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(41, '8460617107', '2250504124', 'ISSA KOUIZ', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '20000', '0', '558037', 'XOF', '2024-02-05 08:29:38', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(42, '8460548922', '2250545730', 'TRADE MARC', '2250594627189', 'N\'GUESSAN CATHERINE KRAMO', '-5000', '0', '538037', 'XOF', '2024-02-05 08:21:38', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(43, '8460544833', '2250545730', 'TRADE MARC', '2250594627189', 'N\'GUESSAN CATHERINE KRAMO', '-5000', '0', '543037', 'XOF', '2024-02-05 08:21:11', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(44, '8460487128', '2250505223', 'YVES BOHOU', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '10000', '0', '548037', 'XOF', '2024-02-05 08:15:03', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(45, '8446662723', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-77100', '0', '538037', 'XOF', '2024-02-03 15:24:04', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(46, '8446173594', '2250545730', 'TRADE MARC', '2250506057743', 'NONGNIME SIATA COULIBALY', '-384000', '0', '615137', 'XOF', '2024-02-03 14:33:17', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(47, '8446154889', '2250554546', 'JEAN STEVE', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '942000', '0', '999137', 'XOF', '2024-02-03 14:31:56', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(48, '8445966215', '2250545730', 'TRADE MARC', '2250575443753', 'WRONG EDWIGE BADJO', '-10100', '0', '57137', 'XOF', '2024-02-03 14:11:10', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(49, '8445906036', '2250545730', 'TRADE MARC', '2250554121002', 'GUY RUFIN KOUASSI YAO', '-60500', '0', '67237', 'XOF', '2024-02-03 14:04:40', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(50, '8444804919', '2250545730', 'TRADE MARC', '2250586794985', 'AISSIATA KONE', '-30000', '0', '127737', 'XOF', '2024-02-03 12:12:40', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(51, '8444757200', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-500', '0', '157737', 'XOF', '2024-02-03 12:08:16', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(52, '8444522715', '2250545730', 'TRADE MARC', '2250586453206', 'AKISSI ROSALIE KOUAKOU', '-7500', '0', '158237', 'XOF', '2024-02-03 11:46:40', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(53, '8444237348', '2250545730', 'TRADE MARC', '2250556989710', 'BundleByPOS', '-500', '0', '165737', 'XOF', '2024-02-03 11:20:58', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(54, '8444204356', '2250545730', 'TRADE MARC', '2250503826036', 'MANGUEDAN VALENTIN AHOUO', '-400000', '0', '166237', 'XOF', '2024-02-03 11:18:05', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(55, '8444192483', '2250545730', 'TRADE MARC', '2250584598888', 'DRAMANE SEKONGO', '-23000', '0', '566237', 'XOF', '2024-02-03 11:17:02', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(56, '8443921845', '2250545730', 'TRADE MARC', '2250506632329', 'ANGE STEPHANIE ZOZORO', '-215000', '0', '589237', 'XOF', '2024-02-03 10:53:28', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(57, '8443137035', '2250545730', 'TRADE MARC', '2250506302750', 'MARIAME TRAORE', '-5150', '0', '804237', 'XOF', '2024-02-03 09:43:45', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(58, '8443065728', '2250545730', 'TRADE MARC', '2250574205042', 'THOMAS D\'AQUIN SANOU', '-2000', '0', '809387', 'XOF', '2024-02-03 09:37:32', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(59, '8437624791', '2250554546', 'JEAN STEVE', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '291300', '0', '811387', 'XOF', '2024-02-02 17:55:09', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(60, '8436936204', '2250565323', 'TRADE MARC', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '500000', '0', '520087', 'XOF', '2024-02-02 16:51:34', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(61, '8436779518', '2250545730', 'TRADE MARC', '2250504542256', 'BOUREIMA GANA', '-81000', '0', '20087', 'XOF', '2024-02-02 16:37:14', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(62, '8436758209', '2250545730', 'TRADE MARC', '2250555532227', 'SEYDOU IGUILA', '-208000', '0', '101087', 'XOF', '2024-02-02 16:35:15', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(63, '8436738002', '2250545730', 'TRADE MARC', '2250544468315', 'DALIMA CISSE', '-105000', '0', '309087', 'XOF', '2024-02-02 16:33:22', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(64, '8436437255', '2250575585', 'KOFFI PRIV', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '3000', '0', '414087', 'XOF', '2024-02-02 16:02:57', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(65, '8436164905', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-80100', '0', '411087', 'XOF', '2024-02-02 15:33:23', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(66, '8434603427', '2250545730', 'TRADE MARC', '2250574664141', 'KOUTANE GRACE SEPHORA DOBRE', '-137000', '0', '491187', 'XOF', '2024-02-02 12:47:25', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(67, '8434507094', '2250545730', 'TRADE MARC', '2250565323311', 'TRADE MARCHAND_KAIROS_ABIDJAN -', '-1000000', '0', '628187', 'XOF', '2024-02-02 12:36:20', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(68, '8433453560', '2250545730', 'TRADE MARC', '2250554896799', 'BundleByPOS', '-500', '0', '1628187', 'XOF', '2024-02-02 10:53:27', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(69, '8433028568', '2250575444', 'ELOGNE AKA', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '30000', '0', '1628687', 'XOF', '2024-02-02 10:16:44', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(70, '8431787069', '2250545730', 'TRADE MARC', '2250594627189', 'N\'GUESSAN CATHERINE KRAMO', '-5000', '0', '1598687', 'XOF', '2024-02-02 08:20:22', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(71, '8431780892', '2250545730', 'TRADE MARC', '2250594627189', 'N\'GUESSAN CATHERINE KRAMO', '-5000', '0', '1603687', 'XOF', '2024-02-02 08:19:38', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(72, '8431743920', '2250545730', 'TRADE MARC', '2250556989710', 'BundleByPOS', '-1000', '0', '1608687', 'XOF', '2024-02-02 08:15:08', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1'),
(73, '8426905735', '2250554546', 'JEAN STEVE', '2250545730994', 'TRADE MARCHAND_DRANO_KAMBIRE_BINGERVILLE -', '980000', '0', '1609687', 'XOF', '2024-02-01 17:31:36', 'siege_abatta', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1', '2024-02-14 10:57:44', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'DESKTOP-5J84HQK', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `vente_carte`
--

DROP TABLE IF EXISTS `vente_carte`;
CREATE TABLE IF NOT EXISTS `vente_carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carte` varchar(2580) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `numero_carte` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quantite` int NOT NULL,
  `prix_unitaire` float NOT NULL,
  `montant` float NOT NULL,
  `client` varchar(250) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(250) NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) NOT NULL,
  `user_modif` varchar(250) NOT NULL,
  `navigateur_modif` varchar(250) NOT NULL,
  `ordinateur_modif` varchar(250) NOT NULL,
  `ip_modif` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_carte_type_carte_fk` (`carte`(250))
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vente_carte`
--

INSERT INTO `vente_carte` (`id`, `carte`, `numero_carte`, `quantite`, `prix_unitaire`, `montant`, `client`, `telephone`, `email`, `date`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'UBA', '0000000000002', 1, 200000, 200000, 'test', '0554516932', '', '2024-01-11', '2024-01-11 11:42:56', '2024-01-11 11:42:56', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:42:56', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(2, 'ECOBANK', '0000005', 1, 0, 0, 'oui', '0554516932', '', '2024-01-11', '2024-01-11 11:46:15', '2024-01-11 11:46:15', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:46:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(3, 'Djamo', '000000003', 10000, 1000, 10000000, 'azerty', '11145221', '', '2024-01-11', '2024-01-11 11:50:16', '2024-01-11 11:50:16', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:50:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(4, 'ECOBANK', '00000115', 1, 20000, 20000, 'test', '05545155', '', '2024-01-11', '2024-01-11 11:58:21', '2024-01-11 11:58:21', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:58:21', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(5, 'UBA', '005', 2, 15000, 30000, 'test', '0554516932', '', '2024-01-11', '2024-01-11 12:57:42', '2024-01-11 12:57:42', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 12:57:42', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(6, 'UBA', '0000001', 5, 50000, 250000, 'test', '0554516932', '', '2024-01-12', '2024-01-12 14:37:27', '2024-01-12 14:37:27', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-12 14:37:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(7, 'ECOBANK', '05555555', 1, 10, 10, 'test', '055545', 'testttt', '2024-01-15', '2024-01-15 18:32:15', '2024-01-15 18:32:15', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-15 18:32:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(8, 'UBA', '2', 2, 25000, 50000, 'Yo', '0554516932', 'test@gmail.com', '2024-01-30', '2024-01-30 20:28:37', '2024-01-30 20:28:37', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-30 20:28:37', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(9, 'UBA', '5', 1, 5000, 5000, 'Coulibaly', '0554516932', 'client@gmail.com', '2024-01-31', '2024-01-31 12:54:51', '2024-01-31 12:54:51', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 12:54:51', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(10, 'UBA', '3', 1, 5000, 5000, 'Hello', '0554516732', 'test@gmail.com', '2024-01-31', '2024-01-31 12:57:39', '2024-01-31 12:57:39', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 12:57:39', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(11, 'test', '10', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(12, 'test', '11', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(13, 'test', '12', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(14, 'test', '13', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(15, 'test', '14', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(16, 'test', '15', 1, 5000, 5000, 'coul', '00001', 'coulibalyoumartrs@gmail.com', '2024-01-31', '2024-01-31 14:45:17', '2024-01-31 14:45:17', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 14:45:17', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(17, 'UBA', '19043691', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(18, 'UBA', '19043692', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(19, 'UBA', '19043693', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(20, 'UBA', '19043694', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(21, 'UBA', '19043695', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(22, 'UBA', '19043696', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(23, 'UBA', '19043697', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop'),
(24, 'UBA', '19043698', 1, 5000, 5000, 'Sekou', '0554516932', 'sekou@gmail.com', '2024-01-31', '2024-01-31 21:30:06', '2024-01-31 21:30:06', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', '0000-00-00', '127.0.0.1', '2024-01-31 21:30:06', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'FxlabsDesktop');

-- --------------------------------------------------------

--
-- Structure de la table `western_union`
--

DROP TABLE IF EXISTS `western_union`;
CREATE TABLE IF NOT EXISTS `western_union` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_pays_origine` varchar(5) NOT NULL,
  `code_devise_pays_origine` varchar(5) NOT NULL,
  `identifiant_terminal` varchar(5) NOT NULL,
  `identite_operateur` varchar(5) NOT NULL,
  `super_op_identifiant` varchar(20) DEFAULT NULL,
  `nom_utilisateur` varchar(15) NOT NULL,
  `mtn_cn` varchar(20) NOT NULL,
  `receveur` varchar(20) NOT NULL,
  `expediteur` varchar(20) NOT NULL,
  `code_pays_destination` varchar(20) NOT NULL,
  `code_devise_pays_destination` varchar(30) NOT NULL,
  `type_de_transaction` varchar(15) NOT NULL,
  `date` varchar(10) NOT NULL,
  `heure` varchar(10) NOT NULL,
  `montant_envoye` varchar(10) NOT NULL,
  `frais_de_transfert` varchar(10) NOT NULL,
  `montant_total_recueilli` varchar(10) NOT NULL,
  `taux_de_change` varchar(10) NOT NULL,
  `montant_paye_attendu` varchar(10) NOT NULL,
  `total_frais` varchar(10) DEFAULT NULL,
  `total_taxes` varchar(10) NOT NULL,
  `type_de_paiement` varchar(10) NOT NULL,
  `type_transaction` varchar(20) NOT NULL,
  `magasin` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) NOT NULL,
  `navigateur_creation` varchar(150) NOT NULL,
  `ordinateur_creation` varchar(150) NOT NULL,
  `ip_creation` varchar(25) NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) NOT NULL,
  `navigateur_modif` varchar(150) NOT NULL,
  `ordinateur_modif` varchar(150) NOT NULL,
  `ip_modif` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `western_union`
--

INSERT INTO `western_union` (`id`, `code_pays_origine`, `code_devise_pays_origine`, `identifiant_terminal`, `identite_operateur`, `super_op_identifiant`, `nom_utilisateur`, `mtn_cn`, `receveur`, `expediteur`, `code_pays_destination`, `code_devise_pays_destination`, `type_de_transaction`, `date`, `heure`, `montant_envoye`, `frais_de_transfert`, `montant_total_recueilli`, `taux_de_change`, `montant_paye_attendu`, `total_frais`, `total_taxes`, `type_de_paiement`, `type_transaction`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '6406337349', 'ESTHER OLIVE NGO MIN', 'ANDRE YVAN TCHEKE NK', 'CM', 'XAF', 'WMN', '18-08-2023', '12:27 PM', '25000', '1271', '26650', '1', '25000', '1271', '379', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '7806741891', 'NOUFOU ZERBO', 'DJAKALIA HAMED DAO', 'AE', 'AED', 'WMF', '18-08-2023', '2:35 PM', '556112', '23729', '587449', '0.0053946', '3000', '23729', '7608', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '6586722302', 'YASSINE HILMI', 'PANCRACE AKA', 'MA', 'MAD', 'WMF', '18-08-2023', '3:05 PM', '106227', '4500', '112174', '0.0155328', '1650', '4500', '1447', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(4, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '0986468276', 'SENIN HYACINTHE SEBA', 'FATIM KONE', 'TJ', 'USD', 'WMN', '18-08-2023', '3:53 PM', '100000', '5000', '106500', '0.0014626', '146.26', '5000', '1500', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(5, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '7718087961', 'HAMID CHEICK IBRAHIM', 'YALI-HAN IMANE CAMAR', 'FR', 'EUR', 'WMF', '18-08-2023', '4:47 PM', '196799', '3000', '201520', '0.0015244', '300', '3000', '1721', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(6, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '1369410290', 'ALI MOUSTAFA WASSIM', 'DJAKALIA HAMED DAO', 'LB', 'USD', 'WMF', '18-08-2023', '4:58 PM', '336135', '14831', '355653', '0.0014875', '500', '14831', '4687', 'CASH', 'envoi', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(7, 'IT', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '3085785991', 'SOMBLA PAULE EDITH T', 'KOISSI SHELLA TOTO', 'CI', 'XOF', 'PAID', '18-08-2023', '8:26 AM', '145.5', '4.5', '150', '0', '95442', '4.5', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(8, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '8745090892', 'JOCELYNE KOUAKOU ADJ', 'NOSICA PRISSY PANZZO', 'CI', 'XOF', 'PAID', '18-08-2023', '8:27 AM', '167.69', '3.9', '171.59', '0', '110000', '3.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(9, 'US', 'USD', 'A20U', 'NEL', '0', 'NELADU244835', '8393969433', 'MANGOH BAMBA', 'SOULEYMANE DOUKOURE', 'CI', 'XOF', 'PAID', '18-08-2023', '9:09 AM', '200', '4.99', '204.99', '0', '110903', '4.99', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(10, 'CA', 'CAD', 'A20U', 'NEL', '0', 'NELADU244835', '5493393749', 'KOUASSI CASIMIR KOUA', 'MARIANA BOTI LOU BOL', 'CI', 'XOF', 'PAID', '18-08-2023', '1:38 PM', '1477.5', '22.16', '1499.66', '0', '601864', '22.16', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(11, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '5972333248', 'FATOUMATA NADEGE BAM', 'FATOU BAKAYOKO', 'CI', 'XOF', 'PAID', '18-08-2023', '2:06 PM', '88.42', '1.9', '90.32', '0', '58000', '1.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(12, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '6456883517', 'N DRI AHOU BEATRICE ', 'CHRISTIAN KOUADIO JU', 'CI', 'XOF', 'PAID', '18-08-2023', '3:17 PM', '200', '3.9', '203.9', '0', '131192', '3.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(13, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '0472965097', 'METCHEM LEATICIA ESS', 'MARIE ANGE KOFFI', 'CI', 'XOF', 'PAID', '18-08-2023', '3:19 PM', '115', '3.9', '118.9', '0', '75436', '3.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(14, 'BJ', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '0477263879', 'TEYI YANN CEDRIC LAW', 'YOLANDE AKOUVI ECLOU', 'CI', 'XOF', 'PAID', '18-08-2023', '3:23 PM', '50000', '1271', '51500', '0', '50000', '1271', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(15, 'BJ', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '5763631320', 'DJEDJE BERNARD KOUDO', 'KOUDOU CESAR SANOU', 'CI', 'XOF', 'PAID', '18-08-2023', '3:27 PM', '291000', '7539', '299896', '0', '291000', '7539', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(16, 'IT', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '9016881014', 'HERMAN KATO GBAGBI', 'GOUDOHON BEDY HORTEN', 'CI', 'XOF', 'PAID', '18-08-2023', '3:46 PM', '411.61', '9', '420.61', '0', '270000', '9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(17, 'BF', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '0619579543', 'AHMED JEAN ARNAUD WI', 'ADAMA SAWADOGO', 'CI', 'XOF', 'PAID', '18-08-2023', '5:04 PM', '1000000', '10897', '1012749', '0', '1000000', '10897', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(18, 'CA', 'CAD', 'A20U', 'NEL', '0', 'NELADU244835', '4684744145', 'LOU MANSI ARIANE VAN', 'ARIELLE JEMIMA KOUA', 'CI', 'XOF', 'PAID', '18-08-2023', '5:58 PM', '100', '0', '100', '0', '43013', '0', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(19, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '1926889889', 'AKA MADELEINE  ASSOU', 'TANOH ESTEL KOFFI', 'IT', 'EUR', 'WMN', '13-01-2024', '8:29 AM', '320994', '6000', '330000', '0.0015244', '489.32', '6000', '3006', 'CASH', 'envoi', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(20, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '0265671574', 'RAMATOU ANNIELLA  GB', 'EBOU JOSEPHINE NEGAL', 'FR', 'EUR', 'WMN', '13-01-2024', '9:36 AM', '281233', '6000', '290000', '0.0015244', '428.71', '6000', '2767', 'CASH', 'envoi', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(21, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '1677467333', 'ALLAKAGNI OUATTARA', 'MOUHAMED SAMBA DIOP', 'NP', 'NPR', 'WMF', '13-01-2024', '10:48 AM', '284293', '11441', '299499', '0.1941661', '55200', '11441', '3765', 'CASH', 'envoi', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(22, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '8966251137', 'KOUASSI FRANCOIS DJO', 'KUISSON ALEXIS TCHIE', 'BJ', 'XOF', 'WMN', '13-01-2024', '10:55 AM', '100000', '2549', '103008', '1', '100000', '2549', '459', 'CASH', 'envoi', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(23, 'CI', 'XOF', 'A20U', 'NEL', '0', 'NELADU244835', '1596143630', 'MOESHA JONES NZANGA ', 'BENIAN JEAN YVES MAX', 'GB', 'GBP', 'WMN', '13-01-2024', '11:35 AM', '200000', '7627', '210200', '0.0011724', '234.48', '7627', '2573', 'CASH', 'envoi', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(24, 'CA', 'CAD', 'A20U', 'NEL', '0', 'NELADU244835', '7303202294', 'ABLEY JAURES JOHNATA', 'MAGNY MINLIN', 'CI', 'XOF', 'PAID', '13-01-2024', '8:34 AM', '33.6', '5', '38.6', '0', '15000', '5', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(25, 'US', 'USD', 'A20U', 'NEL', '0', 'NELADU244835', '5113077628', 'SOMPOHI FRANCIA MOND', 'ABOU DIOMANDE', 'CI', 'XOF', 'PAID', '13-01-2024', '8:34 AM', '200', '4.99', '204.99', '0', '110094', '4.99', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(26, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '9430459884', 'DJEBOLAUD AUBINE ROS', 'BAULYH MARC - SERGE ', 'CI', 'XOF', 'PAID', '13-01-2024', '8:58 AM', '100', '1.9', '101.9', '0', '65596', '1.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(27, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '2473255507', 'NDA ADJOUA AUDE LECT', 'KOUAKOU ADOU', 'CI', 'XOF', 'PAID', '13-01-2024', '9:10 AM', '76.6', '3.4', '80', '0', '50247', '3.4', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(28, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '1919238452', 'N DA ADJOUA AUDE LEC', 'KOUAKOU YEBOUA ADOU', 'CI', 'XOF', 'PAID', '13-01-2024', '9:14 AM', '609.8', '7', '616.8', '0', '400000', '7', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(29, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '5949438396', 'ADJA NAMBA KAMAGATE', 'TALLA FALL', 'CI', 'XOF', 'PAID', '13-01-2024', '9:43 AM', '98.1', '1.9', '100', '0', '64350', '1.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(30, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '0992401467', 'NOUESSOU BLAKY CLAUD', 'NDRI RICHARD KOUADIO', 'CI', 'XOF', 'PAID', '13-01-2024', '10:18 AM', '30', '1.9', '31.9', '0', '19679', '1.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(31, 'US', 'USD', 'A20U', 'NEL', '0', 'NELADU244835', '6386120860', 'AMOIN MARLENE DIOP', 'MARAMAN WHITE', 'CI', 'XOF', 'PAID', '13-01-2024', '10:39 AM', '300', '7', '307', '0', '161057', '7', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(32, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '8981872321', 'PAULINE AMONKAN', 'ANVO MATHIAS EDONGO', 'CI', 'XOF', 'PAID', '13-01-2024', '10:40 AM', '130', '3.9', '133.9', '0', '85275', '3.9', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(33, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '2309907170', 'CHRISTIAN TIKOMBOUO ', 'CHRISTIAN TIKOMBOUO', 'CI', 'XOF', 'PAID', '13-01-2024', '12:08 PM', '250', '1.95', '251.95', '0', '163990', '1.95', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(34, 'FR', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '4917512269', 'MARIAM TRAORE', 'IBRAHIM ALEX OUATTAR', 'CI', 'XOF', 'PAID', '13-01-2024', '12:10 PM', '71.6', '3.4', '75', '0', '46967', '3.4', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(35, 'BE', 'EUR', 'A20U', 'NEL', '0', 'NELADU244835', '8871406746', 'WILFRIED HAROLDE LUD', 'MAZO SERGE P BLE', 'CI', 'XOF', 'PAID', '13-01-2024', '12:18 PM', '630', '20', '650', '0', '413253', '20', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1'),
(36, 'AE', 'AED', 'A20U', 'NEL', '0', 'NELADU244835', '5800333842', 'KARAM KHADIJA', 'RAJAA BOUDDOUR', 'CI', 'XOF', 'PAID', '13-01-2024', '3:06 PM', '677.69', '25', '703.94', '0', '100000', '25', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1', '2024-01-31 22:01:56', 'OUMAR', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'FxlabsDesktop', '::1');

-- --------------------------------------------------------

--
-- Structure de la vue `caisse_interne_transactions`
--
DROP TABLE IF EXISTS `caisse_interne_transactions`;

DROP VIEW IF EXISTS `caisse_interne_transactions`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `caisse_interne_transactions`  AS SELECT `caisse_wu`.`date` AS `date`, `caisse_wu`.`op` AS `op`, `caisse_wu`.`type_transaction` AS `type_transaction`, `caisse_wu`.`Libelle` AS `Libelle`, `caisse_wu`.`ENTREE` AS `ENTREE`, `caisse_wu`.`SORTIE` AS `SORTIE`, `caisse_wu`.`SOLDE` AS `SOLDE` FROM `caisse_wu` union all select `caisse_ria`.`date` AS `date`,`caisse_ria`.`op` AS `op`,`caisse_ria`.`actions` AS `actions`,`caisse_ria`.`Libelle` AS `Libelle`,`caisse_ria`.`ENTREE` AS `ENTREE`,`caisse_ria`.`SORTIE` AS `SORTIE`,`caisse_ria`.`SOLDE` AS `SOLDE` from `caisse_ria` union all select `caisse_mg`.`date` AS `date`,`caisse_mg`.`op` AS `op`,`caisse_mg`.`actions` AS `actions`,`caisse_mg`.`Libelle` AS `Libelle`,`caisse_mg`.`ENTREE` AS `ENTREE`,`caisse_mg`.`SORTIE` AS `SORTIE`,`caisse_mg`.`SOLDE` AS `SOLDE` from `caisse_mg`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `caisse_mg`
--
DROP TABLE IF EXISTS `caisse_mg`;

DROP VIEW IF EXISTS `caisse_mg`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `caisse_mg`  AS SELECT `moneygram`.`dates` AS `date`, 'MG' AS `op`, `moneygram`.`type_operation` AS `actions`, concat((case when (`moneygram`.`type_operation` = 'Envoyé') then 'IN MONEY GRAM (ENVOIS) ' else 'OUT MONEY GRAM (PAIEMENT) ' end),cast(count(`moneygram`.`id`) as char charset utf8mb4)) AS `Libelle`, sum((case when (`moneygram`.`type_operation` = 'Reçu') then `moneygram`.`montant` else 0 end)) AS `ENTREE`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then `moneygram`.`montant` else 0 end)) AS `SORTIE`, (sum((case when (`moneygram`.`type_operation` = 'Reçu') then `moneygram`.`montant` else 0 end)) - sum((case when (`moneygram`.`type_operation` = 'Envoyé') then `moneygram`.`montant` else 0 end))) AS `SOLDE` FROM `moneygram` GROUP BY `moneygram`.`type_operation``type_operation`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `caisse_ria`
--
DROP TABLE IF EXISTS `caisse_ria`;

DROP VIEW IF EXISTS `caisse_ria`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `caisse_ria`  AS SELECT `ria`.`date` AS `date`, 'RIA' AS `op`, `ria`.`actions` AS `actions`, concat((case when (`ria`.`actions` = 'envoi') then 'IN RIA (ENVOIS) ' else 'OUT RIA (PAIEMENT) ' end),cast(count(`ria`.`id`) as char charset utf8mb4)) AS `Libelle`, sum(`ria`.`montant_envoye`) AS `ENTREE`, sum(`ria`.`montant_paye`) AS `SORTIE`, (sum(`ria`.`montant_envoye`) - sum(`ria`.`montant_paye`)) AS `SOLDE` FROM `ria` GROUP BY `ria`.`actions``actions`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `caisse_wu`
--
DROP TABLE IF EXISTS `caisse_wu`;

DROP VIEW IF EXISTS `caisse_wu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `caisse_wu`  AS SELECT `western_union`.`date` AS `date`, 'WU' AS `op`, `western_union`.`type_transaction` AS `type_transaction`, concat((case when (`western_union`.`type_transaction` = 'envoi') then 'IN WESTERN UNION (ENVOIS) ' else 'OUT WESTERN UNION (PAIEMENT) ' end),cast(count(`western_union`.`id`) as char charset utf8mb4)) AS `Libelle`, sum((case when (`western_union`.`type_transaction` <> 'envoi') then `western_union`.`montant_envoye` else 0 end)) AS `ENTREE`, sum((case when (`western_union`.`type_transaction` = 'envoi') then `western_union`.`montant_envoye` else 0 end)) AS `SORTIE`, (sum(`western_union`.`montant_envoye`) - sum(`western_union`.`montant_paye_attendu`)) AS `SOLDE` FROM `western_union` GROUP BY `western_union`.`type_transaction``type_transaction`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `operatio_money_gram`
--
DROP TABLE IF EXISTS `operatio_money_gram`;

DROP VIEW IF EXISTS `operatio_money_gram`;
CREATE ALGORITHM=UNDEFINED DEFINER=`KASPY`@`%` SQL SECURITY DEFINER VIEW `operatio_money_gram`  AS SELECT `moneygram`.`dates` AS `dates`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then 1 else 0 end)) AS `nbre_operation_envoi`, sum((case when (`moneygram`.`type_operation` <> 'Envoyé') then 1 else 0 end)) AS `nbre_operation_payer`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then `moneygram`.`frais` else 0 end)) AS `frais_envoi`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then `moneygram`.`taxe` else 0 end)) AS `taxe_envoi`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then `moneygram`.`montant` else 0 end)) AS `montant_envoye`, sum((case when (`moneygram`.`type_operation` = 'Envoyé') then (`moneygram`.`taxe` + `moneygram`.`montant`) else 0 end)) AS `total_envoi`, sum((case when (`moneygram`.`type_operation` <> 'Envoyé') then `moneygram`.`montant` else 0 end)) AS `montant_paye`, sum((case when (`moneygram`.`type_operation` <> 'Envoyé') then `moneygram`.`montant` else 0 end)) AS `montant_payer_envoi` FROM `moneygram` GROUP BY `moneygram`.`dates` ORDER BY `moneygram`.`id` ASC  ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_fournisseur_fk` FOREIGN KEY (`fournisseur`) REFERENCES `fournisseurs` (`raison_sociale`) ON UPDATE CASCADE,
  ADD CONSTRAINT `depenses_moderegl_fk` FOREIGN KEY (`mode_reglement`) REFERENCES `mode_reglements` (`nom`) ON UPDATE CASCADE,
  ADD CONSTRAINT `depenses_natdepens_fk` FOREIGN KEY (`nature_depense`) REFERENCES `nature_depenses` (`libelle`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
