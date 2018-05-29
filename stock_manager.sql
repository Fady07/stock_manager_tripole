-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 22 Mai 2018 à 19:17
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stock_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `bv`
--

CREATE TABLE IF NOT EXISTS `bv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(256) CHARACTER SET utf8 NOT NULL,
  `price_sell` varchar(256) CHARACTER SET utf8 NOT NULL,
  `CA` varchar(256) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bvh`
--

CREATE TABLE IF NOT EXISTS `bvh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(256) CHARACTER SET utf8 NOT NULL,
  `price_sell` varchar(256) CHARACTER SET utf8 NOT NULL,
  `CA` varchar(256) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `bvh`
--

INSERT INTO `bvh` (`id`, `code`, `name`, `amount`, `price_sell`, `CA`, `date`) VALUES
(1, '2', 'clavier multimedia', '2', '89', '178', '2018-04-01'),
(2, '44', 'haut parleur', '5', '345', '1725', '2018-04-01'),
(3, '34', 'erer', '5', '6000', '30000', '2018-04-02'),
(4, '44', 'haut parleur', '6', '300', '1800', '2018-04-02'),
(5, '2', 'clavier multimedia', '1', '89', '89', '2018-04-07'),
(6, '34', 'erer', '1', '6755', '6755', '2018-04-10'),
(7, '2', 'clavier multimedia', '1', '89', '89', '2018-04-10'),
(8, '2', 'clavier multimedia', '1', '89', '89', '2018-04-10'),
(9, '34', 'erer', '1', '6755', '6755', '2018-04-10'),
(10, '2', 'clavier multimedia', '2', '89', '178', '2018-04-10'),
(11, '44', 'haut parleur', '2', '345', '690', '2018-04-10'),
(12, '2', 'clavier multimedia', '1', '89', '89', '2018-04-21'),
(13, '2', 'clavier multimedia', '1', '89', '89', '2018-04-22'),
(14, '34', 'erer', '19', '6755', '128345', '2018-05-08'),
(15, '2', 'clavier multimedia', '1', '89', '89', '2018-05-22');

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE IF NOT EXISTS `depot` (
  `id_depot` int(11) NOT NULL AUTO_INCREMENT,
  `name_repository` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_depot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `depot`
--

INSERT INTO `depot` (`id_depot`, `name_repository`) VALUES
(1, 'informatiques');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 NOT NULL,
  `repositoy` varchar(256) CHARACTER SET utf8 NOT NULL,
  `qte_product` int(11) NOT NULL,
  `price_buy_product` float NOT NULL,
  `price_sell_product` float NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_product`, `code_product`, `name_product`, `repositoy`, `qte_product`, `price_buy_product`, `price_sell_product`) VALUES
(1, '7', 'cable', '', 0, 5655, 6755),
(2, '2', 'clavier multimedia', '', 14, 45, 89),
(3, '5', 'haut parleur', '', 28, 98, 345),
(4, '6', 'souris capsys', '', 30, 135, 0),
(5, '4', 'casque', '', 0, 0, 0),
(6, '3', 'carte graphique', '', 5, 54, 685),
(7, '1', 'arduino', 'informatiques', 546, 46, 456);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `rank`) VALUES
(1, 'fateh', 'f@teh', 0),
(2, 'sidali', 'sd@li', 0),
(3, 'yacine', '123', 1),
(4, 'yacinoo', '321', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
