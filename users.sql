-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2014 at 03:42 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `couple-site-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weddingdate` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_me` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=106 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `weddingdate`, `role_id`, `remember_me`, `created_at`, `updated_at`) VALUES
(95, 'admin@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 1, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(96, 'admin1@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 1, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(97, 'admin2@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 1, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(98, 'admin3@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 1, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(99, 'admin4@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 2, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(100, 'admin5@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 2, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(101, 'admin6@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 2, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(102, 'admin7@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 3, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(103, 'admin8@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 3, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(104, 'admin9@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 3, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48'),
(105, 'admin10@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', 3, '', '2014-07-24 20:08:48', '2014-07-24 20:08:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
