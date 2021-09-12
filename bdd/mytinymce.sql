-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 sep. 2021 à 19:42
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mytinymce`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articles_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_title` varchar(45) NOT NULL,
  `articles_content` longtext NOT NULL,
  `articles_valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Base de données de test pout le tinyMCE';

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articles_id`, `articles_title`, `articles_content`, `articles_valid`) VALUES
(3, 'Anousone', '<p>Anousone</p>\r\n<p>La Classe</p>\r\n<p>on continue</p>\r\n<p>Voila voila</p>', 1),
(4, 'Test test', '<p>Je fais un test</p>\r\n<p>Car je kiffe la vie</p>', 1),
(5, 'Voila Voila', '<p><em>dsqdqsdqsd</em></p>\r\n<p><span style=\"color: #b96ad9;\"><em>Qsd</em></span></p>\r\n<p><span style=\"color: #b96ad9;\"><em>Qsd</em></span></p>\r\n<p><span style=\"color: #b96ad9;\"><em>Qsd</em></span></p>\r\n<p><span style=\"color: #b96ad9;\"><em>Qsd</em></span></p>\r\n<p><span style=\"color: #b96ad9;\"><em>Qsd</em></span></p>', 1),
(6, 'Voila un nouvel article', '<p>Voila voila voila</p>\r\n<p>Voila voila</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Cool</li>\r\n<li>Trop Bien</li>\r\n<li>Pourquoi pas</li>\r\n</ul>', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
