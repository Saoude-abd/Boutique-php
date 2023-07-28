-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 juin 2023 à 15:42
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
-- Base de données : `boutique-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `categorie` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `couleur` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `taille` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` enum('m','f','mixte') COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `sexe`, `photo`, `prix`, `stock`) VALUES
(18, '123456', 'Pull', 'pull', 'aezyikjdgeij    ', 'bleu', 'M', 'm', 'http://localhost/php/boutique-php//photo/123456_pull- bleu_homme-1.jpg', 15, 34),
(26, '754h 65', 'tshirt', 'tshirt', ' tshirt femme', 'blanc', 'S', 'f', 'http://localhost/php/boutique-php//photo/754h 65_41RNe28M2qL._AC_UL400_.jpg', 14, 3),
(27, '67gp', 'pantalon', 'pantalon', ' femme-pantalon pyla vert  ', 'vert', 'M', 'f', 'http://localhost/php/boutique-php//photo/67gp_shopping.jpg', 22, 12),
(28, '12p- 5', 'pantalon', 'pantalon ', ' homme-pantalon insturie metallique ', 'noir', 'L', 'm', 'http://localhost/php/boutique-php//photo/12p- 5_pantalon-insturie-metallique.jpg', 49, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
