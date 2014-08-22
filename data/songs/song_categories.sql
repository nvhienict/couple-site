-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2014 at 10:46 AM
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
-- Table structure for table `song_categories`
--

CREATE TABLE IF NOT EXISTS `song_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `song_categories`
--

INSERT INTO `song_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mở đầu', 'Chơi trước khi bắt đầu của nghi lễ.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Đoàn rước', 'Chơi trong khi khách đang ngồi và đoàn rước tiến vào.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nghi thức', 'Thắp nến và các bài nhạc liên tục được chuyển đổi.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Kết thúc', 'Chơi trong khi khách quan trọng rời đi sau nghi lễ.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Khai tiệc', 'Dạo khúc nhạc nhẹ để chuẩn bị khai tiệc.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Phát biểu', 'Chia sẻ một ca khúc đặc biệt về người phát biểu.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Cắt bánh', 'Có thể chơi nhạc lộn xộn để tạo không khí tươi vui.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Vào tiệc', 'Có thể chơi nhạc sinh động hơn 1 chút.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Chúc mừng', 'Chơi nhạc sâu lắng để những lời chúc thêm ý nghĩa.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Cuối tiệc', 'Lưu lại và phát những bài hát tốt nhất trong buổi tiệc.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
