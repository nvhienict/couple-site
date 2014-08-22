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
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `artist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lyric` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `category`, `artist`, `genre`, `link`, `lyric`, `comment`, `created_at`, `updated_at`) VALUES
(1, '(Nice to Meet You) Anyway', 1, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A Love Idea', 1, 'Mark Knopfler', 'Traditional', '<iframe width="420" height="315" src="//www.youtube.com/embed/STlLJxLUHOg" frameborder="0" allowfullscreen></iframe>', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Drunk in Love', 1, 'Beyonce', 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4Evermore', 2, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '10 best couples wedding song 2013', 2, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Top 20 Best Romantic Love Songs', 2, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Take me to your heart', 2, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Drunk in Love', 3, 'Beyonce', 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', '', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Take me to your heart', 3, 'Beyonce', 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', '', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Wedding', 3, 'Beyonce', 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', '', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'My Love', 3, 'Beyonce', 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', '', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '4Evermore', 4, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Wedding', 4, 'Anthony David Feat. Algebra & Phonte ', 'Contemporary, Hip Hop, Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '(Nice to Meet You) Anyway', 5, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '(Nice to Meet You) Anyway', 5, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Wedding', 6, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '(Nice to Meet You) Anyway', 7, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '(Nice to Meet You) Anyway', 7, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Wedding', 8, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '(Nice to Meet You) Anyway', 8, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '(Nice to Meet You) Anyway', 9, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Wedding', 10, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '(Nice to Meet You) Anyway', 10, 'Gavin Degraw', 'Pop, Rock', '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>', 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
