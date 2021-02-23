-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2021 at 03:35 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skooleo`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `email`, `username`, `password`) VALUES
(4, 'dami@skooleo.com', 'dami', '$2y$10$Ws9CS2/jLbfAroZvpVn2VebJRWQbVIEDISXQWYJByhTDRPoQ0AyFy'),
(5, '', '', '$2y$10$AtixJOrmHwBU4O.I6jJBY.IVAW0kQVW2TGZDYh/IyKA8zdP0mE9lq'),
(7, 'Dare@alade', 'dare', '$2y$10$z.qzHNUNzF801S3OSsS.Fubjg9PYROytkL8X1v6mSifVxkK66ti32'),
(10, 'sammyb@yahoo.com', 'sammy', '$2y$10$Liy0sS57J/JUMjrWqV7fsOAkayDmMBlkJs6RiUju3itf5gVPcg9Ji'),
(11, 'tobimax@gmail.com', 'tobi', '$2y$10$j1E6/s/ZrEW30zCOzwGQGOpxG4h.tPr/Bp9BL5F87uWlt0qnrTcBq');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `description`, `content`, `view_count`, `created_at`) VALUES
(7, 7, 'Hello', 'Huvf', 'Garhj', 2, '2021-02-23 14:06:22'),
(8, 7, 'Yello', 'Gary', 'Whitey', 2, '2021-02-23 14:07:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
