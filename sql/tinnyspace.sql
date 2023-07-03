-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2022 at 04:10 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinnyspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

DROP TABLE IF EXISTS `loginadmin`;
CREATE TABLE IF NOT EXISTS `loginadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `username`, `email`, `password`) VALUES
(1, 'daniel', 'bongenxin@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'root', 'root@root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `price` int(100) NOT NULL,
  `img` longblob NOT NULL,
  `category` varchar(26) NOT NULL DEFAULT 'livingroom',
  `posted` date DEFAULT NULL,
  `extension` varchar(26) NOT NULL DEFAULT 'jpg',
  `quantity` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `img`, `category`, `posted`, `extension`, `quantity`) VALUES
(36, 'Sofa', 267, 0x696d6167652d36323462616634306563333465302e35383038383236322e6a7067, 'Livingroom', '2022-04-05', 'jpg', 1),
(37, 'black sofa', 777, 0x696d6167652d36323462623232616534666163322e36393833323039302e6a7067, 'Livingroom', '2022-04-05', 'jpg', 2),
(39, 'Modern table', 2222, 0x696d6167652d36323462623762656232666565302e32393237313738332e6a7067, 'Livingroom', '2022-04-05', 'jpg', 1),
(40, 'B Bed', 762, 0x696d6167652d36323464323138336434316563362e39313237353738302e6a7067, 'Bedroom', '2022-04-06', 'jpg', 2),
(41, 'Grey Bed', 1239, 0x696d6167652d36323464386331333639396636392e37323530313136312e6a7067, 'Bedroom', '2022-04-06', 'jpg', 12),
(42, 'Wooden bed', 678, 0x696d6167652d36323464386332623438353730372e32353937373630332e6a7067, 'Bedroom', '2022-04-06', 'jpg', 6),
(43, 'Bathroom cabinets', 888, 0x696d6167652d36323464386336303863326135382e35343838343234332e6a7067, 'Bathroom', '2022-04-06', 'jpg', 6),
(44, 'Cool cabinets', 900, 0x696d6167652d36323464386338303736613765322e35303634333332382e6a7067, 'Bathroom', '2022-04-06', 'jpg', 3),
(45, 'Bathub', 567, 0x696d6167652d36323464386339356630353464362e32313630313034342e6a7067, 'Bathroom', '2022-04-06', 'jpg', 22),
(46, 'Modern table set', 999, 0x696d6167652d36323464386362323231646366372e30363339303739362e6a7067, 'Diningroom', '2022-04-06', 'jpg', 6),
(47, 'Wooden table set', 888, 0x696d6167652d36323464386363373036393035372e35303638363338322e6a7067, 'Diningroom', '2022-04-06', 'jpg', 5),
(48, 'Natural table set', 999, 0x696d6167652d36323464386366313139653865302e38343933393331342e706e67, 'Diningroom', '2022-04-06', 'png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contactNo` int(10) NOT NULL DEFAULT '0',
  `address` varchar(200) NOT NULL DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contactNo`, `address`) VALUES
(2, 'daniell761', 'bongenxin@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28', 0, 'None'),
(6, 'halo', 'dsf@fg', '33b1eac210971fb02a3b90afce9dbff758be794d', 0, 'None'),
(7, 'Test', 'test@test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 'None');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
