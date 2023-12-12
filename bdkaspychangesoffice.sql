-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 nov. 2023 à 19:43
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
(1, 'hec_cocody', 'AndOs', 'hec_cocody', 'Angré', 'HEC', 'Former pour la vie', '4165449489', '5444545545', '255455', '', 'email@.com', '535651651 BP ABJ 02', '', 'Angola', '', 'ecole', 'SA', '58748486498', '2464899c', 'RNI', 'yop2', 0, '', 'xof', '', '', 'hec 2022 | kaspyiis school \nnew tech | all right reserved\nby kaspyiis', 'logo.png', 'logo_1664903921.jpg', 'logo_1664905008.png', 'KASP KESSE_embleme1664905008.png', '2022-2023', 'hec_cocody', '2022-04-17 10:05:40', '', '', '', '', '2022-10-08 10:48:53', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 'design.test', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerid` int NOT NULL,
  `type_carte` int NOT NULL,
  `date_activation` date NOT NULL,
  `date_expiration` date NOT NULL,
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
  KEY `type_carte` (`type_carte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(2, 'KESSE', 'KASP KESSE', '$2y$12$HJfDAfdiIgfYrLsTg07cYOE9IHEtRzdDsTUhNR6AU34zRU3bSpbfC', 104, 'H', '', '', '', 'kasp@gmail.com', '', '2022-09-21', '', 'ivoirienne', 'Marié', 'expert', '', '', 'ABCze', 'KASP KESSE_1663222930.png', 1, 0, 1, '', '2023-11-09 18:18:09', '2022-09-26 14:28:08', 'design.test', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', '127.0.0.1'),
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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role_permission`
--

INSERT INTO `role_permission` (`id`, `libelle`, `date_creation`, `user_creation`, `navigateur_creation`, `ordinateur_creation`, `ip_creation`, `date_modif`, `user_modif`, `navigateur_modif`, `ordinateur_modif`, `ip_modif`) VALUES
(75, 'Administrateur', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-02 18:38:41', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(103, 'mm', '2023-10-10 17:42:18', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(104, 'AdministrateurAll', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-10 23:34:20', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(105, 'rien', '2023-10-11 20:14:43', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 17:18:11', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1'),
(106, 'Developpeur', '2023-10-30 18:05:02', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-30 18:49:07', 'Kesse', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1');

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
) ENGINE=MyISAM AUTO_INCREMENT=1642 DEFAULT CHARSET=utf8mb3;

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
(1048, 103, 'Contrat de bail', 1, 0, 0, 0, 0, 0, 0, '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1', '2023-10-13 16:41:27', 'KASP KESSE', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', 'HPPRO300G6I5SSD512HDD1TW10', '127.0.0.1');

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
  `libelle` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `durée` varchar(100) DEFAULT NULL,
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
