-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 jan. 2024 à 05:09
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
  `utilisateur` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carte` varchar(205) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` date NOT NULL,
  `user_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(205) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '2026', '2022-09-15', '2022-09-10', 'hec_cocody', '2022-09-16 21:31:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Fir', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-10-30 17:56:06', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(3, '2025', '2022-09-23', '2022-09-21', 'hec_cocody', '2022-09-16 21:31:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Fir', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-10-30 17:55:58', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(4, '2024', '2023-10-10', '2023-10-27', 'hec_cocody', '2023-10-12 16:57:57', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Fir', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-23 23:17:24', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `bureaux`
--

DROP TABLE IF EXISTS `bureaux`;
CREATE TABLE IF NOT EXISTS `bureaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
  `image_emblème` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Gestion des magasins';

--
-- Déchargement des données de la table `bureaux`
--

INSERT INTO `bureaux` (`id`, `libelle`, `responsable`, `raison_sociale`, `adresse`, `sigle`, `slogan`, `tel1`, `tel2`, `fixe`, `fax`, `email`, `bp`, `site_internet`, `pays`, `ville`, `activites`, `forme_juridique`, `rccm`, `compte_contribuable`, `regime_imposition`, `centre_impôts`, `capital_social`, `compte_Bancaire`, `monnaie`, `n_agrement_1`, `n_agrement_2`, `pied_page`, `logo_etats`, `logo_reçu_inscription`, `logo_pc`, `image_emblème`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'siege_abatta', 'AndOs', 'siege_abatta', 'Angré', 'HEC', 'Nous facilitons vos transactions', '4165449489', '5444545545', '255455', '', 'email@.com', '535651651 BP ABJ 02', '', 'Angola', '', 'ecole', 'SA', '58748486498', '2464899c', 'RNI', 'yop2', 0, '', 'xof', '', '', 'hec 2022 | kaspyiis school \nnew tech | all right reserved\nby kaspyiis', 'logo.png', 'logo_1664903921.jpg', 'logo_1664905008.png', 'KASP KESSE_embleme1664905008.png', '2024', 'siege_abatta', '2022-04-17 10:05:40', '', '', '', '', '2023-12-30 13:12:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

DROP TABLE IF EXISTS `cartes`;
CREATE TABLE IF NOT EXISTS `cartes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_activation` date NOT NULL,
  `date_expiration` date NOT NULL,
  `type_carte` varchar(2580) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duree` int NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` date NOT NULL,
  `user_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_carte` (`type_carte`(250)) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id`, `customer_id`, `date_activation`, `date_expiration`, `type_carte`, `duree`, `status`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '0000001', '2024-01-11', '2024-01-12', 'UBA', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-12 14:37:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(2, '0000000000002', '2024-01-11', '2024-01-12', 'UBA', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-11 11:42:56', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(3, '000000003', '2024-01-11', '2024-01-12', 'UBA', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-11 11:50:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(4, '005', '2024-01-11', '2024-01-12', 'Djamo', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-11 12:57:42', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(5, '0000005', '2024-01-11', '2024-01-12', 'Djamo', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-11 11:46:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop'),
(6, '00000115', '2024-01-11', '2024-01-12', 'ECOBANK', 1, '1', '2024-01-11', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2024-01-11 11:58:21', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', 'FxlabsDesktop');

-- --------------------------------------------------------

--
-- Structure de la table `changes`
--

DROP TABLE IF EXISTS `changes`;
CREATE TABLE IF NOT EXISTS `changes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `taux` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client` varchar(2580) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `date_creation` date NOT NULL,
  `user_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `changes`
--

INSERT INTO `changes` (`id`, `montant1`, `taux`, `montant2`, `client`, `telephone`, `date`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(17, '500000', '0.1254', '62700', 'komenan samuel n', '104025028', '2023-12-18', '2023-12-18', 'KASP KESSE', '0000-00-00', 'HPPRO300G6I5SSD512HDD1TW10', '2012-07-00', '2023-12-18 17:27:06', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:120.0) Gecko/20100101 Firefox/120.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(18, '500000', '6500000', '3250000000000', 'komenan samuel', '104025028', '2023-12-19', '2023-12-19', 'KASP KESSE', '0000-00-00', 'HPPRO300G6I5SSD512HDD1TW10', '2012-07-00', '2023-12-19 20:38:38', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:120.0) Gecko/20100101 Firefox/120.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(19, '200', '200', '40000', 'test', '054516932', '2023-12-26', '2023-12-26', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2023-12-26 15:50:24', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(20, '5000', '1520', '7600000', 'testtt', '0554516932', '2023-12-26', '2023-12-26', 'KASP KESSE', '0000-00-00', 'FxlabsDesktop', '2012-07-00', '2023-12-26 15:51:05', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dates` datetime NOT NULL,
  `n_piece` varchar(70) NOT NULL,
  `nature_depense` varchar(75) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `fournisseur` varchar(75) NOT NULL,
  `montant` double NOT NULL,
  `mode_reglement` varchar(40) NOT NULL,
  `annee_academique` varchar(20) NOT NULL,
  `ecole` varchar(75) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `dates`, `n_piece`, `nature_depense`, `designation`, `fournisseur`, `montant`, `mode_reglement`, `annee_academique`, `ecole`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-11 00:00:00', '00000001', 'frais de comptable', 'test', 'SODECI', 50000000000, 'Wave', '2021-2022', 'hec yopougon', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2022-09-06 07:20:00', 'kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

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
(7, 'CIE', 'Abidjan', 'cie@gmail.com', '05050505', 'cie service', '2022-2023', 'hec_cocody', '2022-12-21 17:04:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-10-08 21:47:04', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'FxlabsDesktop', '127.0.0.1'),
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nom_prenom`, `users`, `password`, `type_compte`, `sex`, `adresse`, `tel1`, `tel2`, `email`, `matricule`, `date_naissance`, `n_piece`, `nationnalite`, `situation_matrimoniale`, `fonction`, `details_fonction`, `nombre_enfants`, `permis_conduire`, `photo`, `connected`, `bloqued`, `valide_compte`, `otp`, `date_connexion`, `date_modif`, `ordinateur_modif`, `navigateur_modif`, `ip_modif`) VALUES
(2, 'KESSE', 'KASP KESSE', '$2y$12$HJfDAfdiIgfYrLsTg07cYOE9IHEtRzdDsTUhNR6AU34zRU3bSpbfC', 104, 'H', '', '', '', 'kasp@gmail.com', '', '2022-09-21', '', 'ivoirienne', 'Marié', 'expert', '', '', 'ABCze', 'KASP KESSE_1663222930.png', 1, 0, 1, '', '2024-01-11 13:23:33', '2022-09-26 14:28:08', 'design.test', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '127.0.0.1'),
(4, 'KOFFI', 'KOFFI', '$2y$12$HJfDAfdiIgfYrLsTg07cYOE9IHEtRzdDsTUhNR6AU34zRU3bSpbfC', 75, 'H', '', '', '', 'koffi@gmail.com', '', '2022-09-21', '', '', '', '', '', '', '', 'user_default.jpg', 0, 0, 1, '', '2022-09-23 04:14:15', '2022-09-23 04:14:15', '', '', ''),
(6, 'Kesse', 'Kesse', '$2y$12$rw.KN1jaCoSfv8SWrdk1feECBQjMXgSexRBsYX27PJgD215h78e2q', 106, 'Homme', 'yop', '12547896', '', 'kaspsergekesse@gmail.com', '', '2023-10-02', '', '', '', 'dev', '', '', '', 'user_default.jpg', 0, 0, 1, '$2y$12$zZT', '2023-10-30 18:58:59', '2023-10-30 18:41:05', 'HPPRO300G6I5SSD512HDD1TW10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', '127.0.0.1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `date_heure` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_ref` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N/A',
  `code_aut` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N/A',
  `id_pvente` int NOT NULL,
  `montant` double DEFAULT NULL,
  `frais` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moneygram`
--

INSERT INTO `moneygram` (`id`, `date_heure`, `num_ref`, `code_aut`, `id_user`, `id_pvente`, `montant`, `frais`, `total`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '0000-00-00 00:00:00', '75472733', '0', 'NKOUA00', 2, 478967.82, 13475, 492442.82, '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '0000-00-00 00:00:00', '49109534', '0', 'NKOUA00', 2, 676370.17, 11000, 687370.17, '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '0000-00-00 00:00:00', '60164255', '0', 'NKOUA00', 2, 63345.07, 3500, 66845.07, '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(4, '0000-00-00 00:00:00', '73478955', '0', 'NKOUA00', 2, 11000, 800, 11800, '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:12', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(5, '0000-00-00 00:00:00', '87204407', '4175', 'NKOUA00', 2, -88699.93, 0, -88699.93, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(6, '0000-00-00 00:00:00', '44838763', '8211', 'NKOUA00', 2, -350071.91, 0, -350071.91, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(7, '0000-00-00 00:00:00', '85219412', '8483', 'NKOUA00', 2, -386048.08, 0, -386048.08, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(8, '0000-00-00 00:00:00', '29180582', '9005', 'NKOUA00', 2, -32141.9, 0, -32141.9, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(9, '0000-00-00 00:00:00', '86371740', '11105', 'NKOUA00', 2, -189719.25, 0, -189719.25, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(10, '0000-00-00 00:00:00', '34513476', '11154', 'NKOUA00', 2, -918339.9, 0, -918339.9, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(11, '0000-00-00 00:00:00', '55878948', '11244', 'NKOUA00', 2, -50003.61, 0, -50003.61, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(12, '0000-00-00 00:00:00', '26500054', '11271', 'NKOUA00', 2, -400187.85, 0, -400187.85, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(13, '0000-00-00 00:00:00', '70886490', '12432', 'NKOUA00', 2, -23004.41, 0, -23004.41, '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 19:14:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `moov`
--

DROP TABLE IF EXISTS `moov`;
CREATE TABLE IF NOT EXISTS `moov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_client` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moov`
--

INSERT INTO `moov` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-12', 'Dépot', '014526879451', '1111111', '2024-01-12 09:22:59', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:22:59', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-12', 'Retrait', '01444444', '80000000', '2024-01-12 09:23:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:23:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `mtn`
--

DROP TABLE IF EXISTS `mtn`;
CREATE TABLE IF NOT EXISTS `mtn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_client` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mtn`
--

INSERT INTO `mtn` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-12', 'Dépot', '0554516932', '100000', '2024-01-12 09:31:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:31:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-12', 'Retrait', '05545356', '54544587', '2024-01-12 09:31:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:31:37', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1');

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
(5, 'Achat de fourniture bureau', 'Annuelle', 'test', '2024-2025', 'hec_cocody', '2022-12-21 17:03:33', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Fir', 'HP-15eg0033nk-WFI7', '127.0.0.1', '2023-09-23 01:56:07', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'FxlabsDesktop', '127.0.0.1'),
(6, 'test', 'Journalière', '', '2024', 'siege_abatta', '2024-01-11 08:59:31', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Fir', 'FxlabsDesktop', '127.0.0.1', '2024-01-11 08:59:31', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `orange`
--

DROP TABLE IF EXISTS `orange`;
CREATE TABLE IF NOT EXISTS `orange` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_operation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_client` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orange`
--

INSERT INTO `orange` (`id`, `date`, `type_operation`, `telephone_client`, `montant`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, '2024-01-12', 'Retrait', '0554516932', '1000000', '2024-01-12 09:18:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:18:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, '2024-01-12', 'Dépot', '0555457698', '10000', '2024-01-12 09:18:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 09:18:36', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, '2024-01-12', 'Retrait', '11111111', '2222222222222', '2024-01-12 12:43:28', '2024-01-12 12:43:28', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-12 12:43:28', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0', 'FxlabsDesktop');

-- --------------------------------------------------------

--
-- Structure de la table `ria`
--

DROP TABLE IF EXISTS `ria`;
CREATE TABLE IF NOT EXISTS `ria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_transfert` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pin` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mode_livraison` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `caissier` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `agence` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `code_agence` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `agence_recon` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `code_agence_recon` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `montant_envoye` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `devise_envoye` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pays_envoi` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pays_destination` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `montant_paye` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `devise_paiement` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `montant_commission` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `devise_commission` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taux` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tob` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tthu` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `frais` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `actions` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `magasin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ria`
--

INSERT INTO `ria` (`id`, `num_transfert`, `pin`, `mode_livraison`, `caissier`, `agence`, `code_agence`, `agence_recon`, `code_agence_recon`, `montant_envoye`, `devise_envoye`, `pays_envoi`, `pays_destination`, `montant_paye`, `devise_paiement`, `montant_commission`, `devise_commission`, `date`, `taux`, `tob`, `tthu`, `frais`, `actions`, `magasin`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, 'CI1678992019', '12121877958', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-96150', 'XOF', 'Cote d Ivoire', 'France', '14658', 'EUR', '417', 'XOF', '21/08/2023 14:15', '655957', '500', '577', '2775', 'Envoi', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, 'IT235202232', '12131108283', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'Italy', 'Cote d Ivoire', '36075', 'XOF', '341', NULL, '21/08/2023 12:53', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(4, 'FR235984332', '12134296447', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '285995', 'XOF', '1194', NULL, '21/08/2023 12:29', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(5, 'UK1677095519', '12138915647', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'United Kingdom', 'Cote d Ivoire', '700000', 'XOF', '2985', NULL, '21/08/2023 11:59', '758685', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(6, 'FR99653232', '12139670684', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '307315', 'XOF', '9805', NULL, '21/08/2023 11:02', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(7, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', NULL, '21/08/2023 10:35', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(8, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(9, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', NULL, '21/08/2023 10:35', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 12:56:23', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(10, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(11, 'CI1678992019', '12121877958', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-96150', 'XOF', 'Cote d Ivoire', 'France', '14658', 'EUR', '417', 'XOF', '21/08/2023 14:15', '655957', '500', '577', '2775', 'Envoi', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(12, 'IT235202232', '12131108283', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'Italy', 'Cote d Ivoire', '36075', 'XOF', '341', NULL, '21/08/2023 12:53', '655957', NULL, NULL, NULL, 'Transfert Payé', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(13, 'FR235984332', '12134296447', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '285995', 'XOF', '1194', NULL, '21/08/2023 12:29', '655957', NULL, NULL, NULL, 'Transfert Payé', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(14, 'UK1677095519', '12138915647', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'United Kingdom', 'Cote d Ivoire', '700000', 'XOF', '2985', NULL, '21/08/2023 11:59', '758685', NULL, NULL, NULL, 'Transfert Payé', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(15, 'FR99653232', '12139670684', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '307315', 'XOF', '9805', NULL, '21/08/2023 11:02', '655957', NULL, NULL, NULL, 'Transfert Payé', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(16, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', NULL, '21/08/2023 10:35', '655957', NULL, NULL, NULL, 'Transfert Payé', 'point_relais_bingerville', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 14:25:01', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(72, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', NULL, '21/08/2023 10:35', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(71, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(70, 'FR126945332', '12131704319', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '1000000', 'XOF', '2089', NULL, '21/08/2023 10:35', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(69, 'FR99653232', '12139670684', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '307315', 'XOF', '9805', NULL, '21/08/2023 11:02', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(68, 'UK1677095519', '12138915647', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'United Kingdom', 'Cote d Ivoire', '700000', 'XOF', '2985', NULL, '21/08/2023 11:59', '758685', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(67, 'FR235984332', '12134296447', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'France', 'Cote d Ivoire', '285995', 'XOF', '1194', NULL, '21/08/2023 12:29', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(66, 'IT235202232', '12131108283', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', NULL, NULL, 'Italy', 'Cote d Ivoire', '36075', 'XOF', '341', NULL, '21/08/2023 12:53', '655957', NULL, NULL, NULL, 'Transfert Payé', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(65, 'CI1678992019', '12121877958', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-96150', 'XOF', 'Cote d Ivoire', 'France', '14658', 'EUR', '417', 'XOF', '21/08/2023 14:15', '655957', '500', '577', '2775', 'Envoi', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(64, 'CI1679047119', '12113926974', 'RG', 'KADEGE', 'Evy Et Services Remblais', 'ESR001', 'Evy Et Services Remblais', 'ESR001', '-65596', 'XOF', 'Cote d Ivoire', 'France', '100', 'EUR', '417', 'XOF', '21/08/2023 14:20', '655957', '500', '394', '2775', 'Envoi', 'siege_abatta', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-30 21:38:08', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

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
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role_permission`
--

INSERT INTO `role_permission` (`id`, `libelle`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(75, 'Administrateur', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(103, 'mm', '2023-10-10 17:42:18', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(104, 'AdministrateurAll', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(105, 'rien', '2023-10-11 20:14:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(106, 'Developpeur', '2023-10-30 18:05:02', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(107, 'test', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `role_permission_details`
--

DROP TABLE IF EXISTS `role_permission_details`;
CREATE TABLE IF NOT EXISTS `role_permission_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_permission` int NOT NULL,
  `fonction` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=1660 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role_permission_details`
--

INSERT INTO `role_permission_details` (`id`, `role_permission`, `fonction`, `lecture`, `creation`, `modification`, `suppression`, `duplicata`, `visualisation`, `exportation`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(272, 75, 'Contrat de bail', 1, 1, 1, 1, 1, 1, 1, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(273, 75, 'Enregistrement fiscal', 1, 1, 1, 1, 1, 1, 1, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(274, 75, 'Recouvrements', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(275, 75, 'Proprietaires', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(276, 75, 'Batiments', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(277, 75, 'Appartements', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(278, 75, 'Locataires', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(279, 75, 'Recouvreurs', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(280, 75, 'Type de batiment', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(281, 75, 'Type d\'appartement', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(282, 75, 'Type de locataire', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(283, 75, 'Type de piece', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(284, 75, 'Gestion utilisateurs', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(285, 75, 'role et permission', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(286, 75, 'Reglages', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(287, 75, 'Logo et pied de page', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(288, 75, 'Annees de gestion', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(289, 75, 'Dossier entreprise', 0, 0, 0, 0, 0, 0, 0, '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(832, 104, 'Recouvrements', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(833, 104, 'Proprietaires', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(834, 104, 'Batiments', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(835, 104, 'Appartements', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(836, 104, 'Locataires', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(837, 104, 'Recouvreurs', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(838, 104, 'Type de batiment', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(839, 104, 'Type d\'appartement', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(840, 104, 'Type de locataire', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(841, 104, 'Type de piece', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(842, 104, 'Gestion utilisateurs', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(843, 104, 'role et permission', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(844, 104, 'Reglages', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(845, 104, 'Logo et pied de page', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(846, 104, 'Annees de gestion', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(847, 104, 'Dossier entreprise', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1587, 105, 'Dossier entreprise', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1586, 105, 'Annees de gestion', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1585, 105, 'Logo et pied de page', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1584, 105, 'Reglages', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1583, 105, 'role_modif et permission', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1582, 105, 'Gestion utilisateurs', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1581, 105, 'Type de piece', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1580, 105, 'Type de locataire', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1579, 105, 'Type d\'appartement', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1578, 105, 'Type de batiment', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1577, 105, 'Recouvreurs', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1576, 105, 'Locataires', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1575, 105, 'Appartements', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1574, 105, 'Batiments', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1573, 105, 'Proprietaires', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1572, 105, 'Recouvrements', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1571, 105, 'Enregistrement fiscal', 0, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1570, 105, 'Contrat de bail', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1641, 106, 'Dossier entreprise', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1640, 106, 'Annees de gestion', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1639, 106, 'Logo et pied de page', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1638, 106, 'Reglages', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1637, 106, 'role_modif et permission', 0, 0, 0, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1636, 106, 'Gestion utilisateurs', 0, 0, 0, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1635, 106, 'Type de piece', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1634, 106, 'Type de locataire', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1633, 106, 'Type d\'appartement', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1632, 106, 'Type de batiment', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1631, 106, 'Recouvreurs', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1630, 106, 'Locataires', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1629, 106, 'Appartements', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1628, 106, 'Batiments', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1627, 106, 'Proprietaires', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1624, 106, 'Contrat de bail', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1625, 106, 'Enregistrement fiscal', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1626, 106, 'Recouvrements', 1, 1, 1, 0, 0, 0, 0, '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(831, 104, 'Enregistrement fiscal', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(830, 104, 'Contrat de bail', 1, 1, 1, 1, 1, 1, 1, '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1065, 103, 'Dossier entreprise', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1061, 103, 'role_modif et permission', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1062, 103, 'Reglages', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1063, 103, 'Logo et pied de page', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1064, 103, 'Annees de gestion', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1060, 103, 'Gestion utilisateurs', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1059, 103, 'Type de piece', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1058, 103, 'Type de locataire', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1056, 103, 'Type de batiment', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1057, 103, 'Type d\'appartement', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1050, 103, 'Recouvrements', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1055, 103, 'Recouvreurs', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1054, 103, 'Locataires', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1053, 103, 'Appartements', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1052, 103, 'Batiments', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1051, 103, 'Proprietaires', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1049, 103, 'Enregistrement fiscal', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1048, 103, 'Contrat de bail', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(1642, 107, 'Contrat de bail', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1643, 107, 'Enregistrement fiscal', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1644, 107, 'Recouvrements', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1645, 107, '', 0, 0, 0, 0, 0, 0, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1646, 107, 'Batiments', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1647, 107, 'Appartements', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1648, 107, 'Locataires', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1649, 107, 'Recouvreurs', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1650, 107, 'Type de batiment', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1651, 107, 'Type d\'appartement', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1652, 107, '', 0, 0, 0, 0, 0, 0, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1653, 107, '', 0, 0, 0, 0, 0, 0, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1654, 107, 'Gestion utilisateurs', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1655, 107, 'role et permission', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1656, 107, 'Reglages', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1657, 107, 'Logo et pied de page', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1658, 107, 'Annees de gestion', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(1659, 107, 'Dossier entreprise', 1, 0, 0, 0, 0, 1, 0, '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2023-12-26 14:14:19', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_carte`
--

DROP TABLE IF EXISTS `type_carte`;
CREATE TABLE IF NOT EXISTS `type_carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duree` int NOT NULL,
  `logo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_carte`
--

INSERT INTO `type_carte` (`id`, `libelle`, `duree`, `logo`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 'UBA', 4, 'image_defaut.jpg', '2024-01-11 11:27:35', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-11 11:27:35', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(2, 'Djamo', 5, 'image_defaut.jpg', '2024-01-11 11:29:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-11 11:29:17', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1'),
(3, 'ECOBANK', 2, 'image_defaut.jpg', '2024-01-11 11:29:51', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-11 11:29:51', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `vente_carte`
--

DROP TABLE IF EXISTS `vente_carte`;
CREATE TABLE IF NOT EXISTS `vente_carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `client` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carte` varchar(2580) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_carte` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix_unitaire` float NOT NULL,
  `quantite` int NOT NULL,
  `date` date NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` date NOT NULL,
  `ordinateur_creation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` date NOT NULL,
  `date_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_carte_type_carte_fk` (`carte`(250))
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vente_carte`
--

INSERT INTO `vente_carte` (`id`, `montant`, `client`, `telephone`, `carte`, `numero_carte`, `prix_unitaire`, `quantite`, `date`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(1, 200000, 'test', '0554516932', 'UBA', '0000000000002', 200000, 1, '2024-01-11', '2024-01-11 11:42:56', '2024-01-11 11:42:56', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:42:56', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(2, 0, 'oui', '0554516932', 'ECOBANK', '0000005', 0, 1, '2024-01-11', '2024-01-11 11:46:15', '2024-01-11 11:46:15', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:46:15', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(3, 10000000, 'azerty', '11145221', 'Djamo', '000000003', 1000, 10000, '2024-01-11', '2024-01-11 11:50:16', '2024-01-11 11:50:16', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:50:16', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(4, 20000, 'test', '05545155', 'ECOBANK', '00000115', 20000, 1, '2024-01-11', '2024-01-11 11:58:21', '2024-01-11 11:58:21', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 11:58:21', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(5, 30000, 'test', '0554516932', 'UBA', '005', 15000, 2, '2024-01-11', '2024-01-11 12:57:42', '2024-01-11 12:57:42', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-11 12:57:42', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop'),
(6, 250000, 'test', '0554516932', 'UBA', '0000001', 50000, 5, '2024-01-12', '2024-01-12 14:37:27', '2024-01-12 14:37:27', '0000-00-00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', '0000-00-00', '127.0.0.1', '2024-01-12 14:37:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop');

-- --------------------------------------------------------

--
-- Structure de la table `western_union`
--

DROP TABLE IF EXISTS `western_union`;
CREATE TABLE IF NOT EXISTS `western_union` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_pays_origine` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_devise_pays_origine` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant_terminal` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identite_operateur` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `super_op_identifiant` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_utilisateur` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mtn_cn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `receveur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expediteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_pays_destination` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_devise_pays_destination` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_de_transaction` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `heure` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant_envoye` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `frais_de_transfert` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant_total_recueilli` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `taux_de_change` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant_paye_attendu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_frais` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_taxes` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_de_paiement` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type_transaction` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `magasin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_creation` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_creation` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_creation` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_modif` datetime NOT NULL,
  `user_modif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `navigateur_modif` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordinateur_modif` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_modif` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(18, 'CA', 'CAD', 'A20U', 'NEL', '0', 'NELADU244835', '4684744145', 'LOU MANSI ARIANE VAN', 'ARIELLE JEMIMA KOUA', 'CI', 'XOF', 'PAID', '18-08-2023', '5:58 PM', '100', '0', '100', '0', '43013', '0', '0', 'Inconnu', 'payer', 'siege_abatta', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1', '2024-01-13 03:44:13', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'FxlabsDesktop', '127.0.0.1');

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
