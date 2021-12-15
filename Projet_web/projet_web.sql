-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2021-12-15 15:42:43
-- 服务器版本： 5.7.36
-- PHP 版本： 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `projet_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `email` varchar(32) NOT NULL,
  `motDePasse` varchar(16) NOT NULL,
  `nom` varchar(16) NOT NULL,
  `prenom` varchar(16) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `clients`
--

INSERT INTO `clients` (`email`, `motDePasse`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
('jy', '362732', '', '', '', ''),
('test1@test.fr', '12345', '', '', '', ''),
('yyy', '1111', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `etat` varchar(30) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lignescommandes`
--

DROP TABLE IF EXISTS `lignescommandes`;
CREATE TABLE IF NOT EXISTS `lignescommandes` (
  `idLigneCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idCommande` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLigneCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `catégorie` enum('téléphone','tablette','écouteurs') DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptif` varchar(60) DEFAULT NULL,
  `marque` varchar(50) NOT NULL,
  `prix` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `produits`
--

INSERT INTO `produits` (`idProduit`, `catégorie`, `nom`, `descriptif`, `marque`, `prix`, `stock`, `img`) VALUES
(1, 'téléphone', 'Galaxy A20', 'Pas très cher mais bug beaucoup', 'Samsung', 155, 12, '../eshop/img/GalaxyA20.jpg'),
(2, 'téléphone', 'Galaxy S10E', 'Il est vert', 'Samsung', 499.99, 30, '../eshop/img/GalaxyS10E.jpg'),
(3, 'téléphone', 'iPhone X', 'Cher pour peu', 'Apple', 729, 270, '../eshop/img/iphonex.jpg'),
(4, 'tablette', 'Oxygen', 'Ceci est une tablette', 'Archos', 169, 452, '../eshop/img/oxygen.jpg'),
(5, 'tablette', 'iPad Air 2', '', 'Apple', 199, 311, '../eshop/img/ipadair2.jpg'),
(6, 'écouteurs', 'airPods 2', 'cher pour peu', 'Apple', 179, 145, '../eshop/img/airpods2.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
