/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : couple-site-db
Target Host     : localhost:3306
Target Database : couple-site-db
Date: 2014-08-04 15:48:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weddingdate` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_me` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('95', 'admin@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '1', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('96', 'admin1@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '1', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('97', 'admin2@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '1', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('98', 'admin3@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '1', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('99', 'admin4@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '2', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('100', 'admin5@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '2', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('101', 'admin6@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '2', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('102', 'admin7@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '3', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('103', 'admin8@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '3', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('104', 'admin9@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '3', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('105', 'admin10@thuna.vn', '$2y$10$X4B7b1Gj0RNlamT27zEk6uc4.NZfKk0Mi57pShypIDuNI.vCdhKUK', 'admin', 'admin', '0000-00-00', '3', '', null, '2014-07-25 03:08:48', '2014-07-25 03:08:48');
INSERT INTO `users` VALUES ('106', 'thuy@gmail.com', '$10$uPal6ovuD/155QExHqzI.uLzcMy.McvjvIQ.//YJczv/wstGVPob.', 'thuy', 'thuy', '2015-02-14', '0', '', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('107', 'thuy@thuna.vn', '$2y$10$cQ6ZyGWuk3TBqG4fsw4w.eRFNZjoxbGq9TzsDajVqN3yLN6dNkuSu', 'tran', 'thuy', '2015-04-02', '2', '', null, '2014-07-31 01:28:55', '2014-07-31 01:28:55');
INSERT INTO `users` VALUES ('108', 'thuy1@thuna.vn', '$2y$10$uPal6ovuD/155QExHqzI.uLzcMy.McvjvIQ.//YJczv/wstGVPob.', 'tran', 'thuy', '2016-09-30', '2', '', null, '2014-07-31 01:32:44', '2014-07-31 01:32:44');
INSERT INTO `users` VALUES ('109', 'thuy11i3.cit@gmail.com', '$2y$10$TWVyQEp5xZsJVwFyyPSB2OPiyaToJ442g4VTt5m/2hkj5bPWaczqC', 'tran', 'thuy', '2016-03-24', '2', '', null, '2014-07-31 01:36:28', '2014-07-31 01:36:28');
INSERT INTO `users` VALUES ('110', 'ttt@thuna.vn', '$2y$10$GODBOX88a1M/EVYf4TDbB.hks/9I318zA39DNkc2OLS6eGMQXEfay', 'tran', 'thuy', '2014-12-26', '2', '', null, '2014-07-31 01:46:08', '2014-07-31 01:46:08');
INSERT INTO `users` VALUES ('111', 'tttt@thuna.vn', '$2y$10$ec4VNZO.XcqMpP2I7hQ69.vIZEn0KgARZ5XpIONQ31xjciGKDSyde', 'tran', 'thuy', '2014-11-28', '2', '', null, '2014-07-31 01:52:53', '2014-07-31 01:52:53');
INSERT INTO `users` VALUES ('112', 'thuy2@thuna.vn', '$2y$10$P6L9qIEZwM2wHXE9XwtxHuBFlHj/gc/nv20XWsyI0YIbvc5NszQmK', 'tran', 'thuy', '2015-01-02', '2', '', null, '2014-07-31 02:08:08', '2014-07-31 02:08:08');
INSERT INTO `users` VALUES ('113', 'df@thuna.vn', '$2y$10$StsCej4XqgdK8u3tUJ6S4Oy8OmqOg6O34ECpBsdFjz3okHMM7dxRq', 'fggghhh', 'df', '2015-02-27', '2', '', null, '2014-07-31 02:30:58', '2014-07-31 02:30:58');
INSERT INTO `users` VALUES ('114', 'kimngan.kimo@gmail.com', '$2y$10$RO7K6w.BHM7rIVjI7SO8p.JrfNeogsXu4RMiTkdMbl..cGtfY1466', 'bbbb', 'ss', '2014-11-27', '2', '', null, '2014-07-31 02:34:56', '2014-07-31 02:34:56');
INSERT INTO `users` VALUES ('116', 'kimngan@gmail.com', '$2y$10$HtfXk1vZ/3bJ4L3Q0UIcJuniU.2GTko0hpfSpKtsRV.5WOXFsPHdS', 'fggghhh', 'bg', '2014-12-06', '2', '', null, '2014-07-31 02:50:07', '2014-07-31 02:50:07');
INSERT INTO `users` VALUES ('117', 'thuy4@thuna.vn', '$2y$10$iFONCQkc.CvdYUkfVlLS9ulanvJAwn/NryxZHpdy4SB8wASDwhoUa', 'tran', 'thuy', '2014-07-29', '2', '', null, '2014-07-31 03:38:00', '2014-07-31 03:38:00');
INSERT INTO `users` VALUES ('118', 'thuy5@thuna.vn', '$2y$10$Q3raNwkw5z08aqWZDy/cPuQxpcZhSRrer751Lz.6TtYa002q7IBJi', 'tran', 'thuy', '2014-10-23', '2', '', null, '2014-07-31 03:39:30', '2014-07-31 03:39:30');
INSERT INTO `users` VALUES ('119', 'thuy6@thuna.vn', '$2y$10$WEfMXFt6Va68OvoZE8j0bu32OcbNRUd2e5fRIvt1TrEHtEl2Fe3M6', 'tran', 'thuy', '2015-08-31', '2', '', null, '2014-07-31 03:41:16', '2014-07-31 03:41:16');
INSERT INTO `users` VALUES ('120', 'thuy7@thuna.vn', '$2y$10$ddBomus0zYc/bMJOXfhar.2ychGhbYBDzFimio4X0fJ63zYUfoh5K', 'tran', 'thuy', '2015-01-03', '2', '', null, '2014-07-31 04:00:15', '2014-07-31 04:00:15');
INSERT INTO `users` VALUES ('121', 'thuy8@thuna.vn', '$2y$10$PP4NzAZzIM8tO4hWP.uLhu.jOP3JuDOm6hvkYDKW/v/9jIul5SIY.', 'tran', 'thuy', '2014-12-04', '2', '', null, '2014-07-31 04:04:02', '2014-07-31 04:04:02');
INSERT INTO `users` VALUES ('122', 'thuy9@thuna.vn', '$2y$10$IXxfOZq13oLv2/0kSBBKpOqiLDCLSMPjnh/QS9sDG5jjuicQTxtNW', 'tran', 'thuy', '2015-03-25', '2', '', null, '2014-07-31 04:05:46', '2014-07-31 04:05:46');
INSERT INTO `users` VALUES ('123', 'thuy10@thuna.vn', '$2y$10$TbBxxZpOWQB7emv3dAiQEugvTJcTYbQqfMiUsHt6Dy6Qfd8tqxhd6', 'tran', 'thuy', '2015-01-01', '2', '', null, '2014-07-31 06:22:02', '2014-07-31 06:22:02');
INSERT INTO `users` VALUES ('124', 'thuy11@thuna.vn', '$2y$10$SfaT0H5zQP57gWzSpi6Un.lXQn/.uwjVrqao/mMZwQRvD.EkQ275C', 'tran', 'thuy', '2014-11-01', '2', '', null, '2014-07-31 06:38:28', '2014-07-31 06:38:28');
INSERT INTO `users` VALUES ('125', 'thuy12@thuna.vn', '$2y$10$MBWuD97u3TgdaRV9V3Y8zeub4Ty8DpTY8JeEzF1vZ2fgzRQ2m1CPC', 'tran', 'thuy', '2015-02-26', '2', '', null, '2014-07-31 06:41:45', '2014-07-31 06:41:45');
INSERT INTO `users` VALUES ('126', 'thllll@thuy.vn', '$2y$10$1lavv1gED8o/6jSLITXLQ.NOZIZz2N2qc1X7jNd3RiSKta1IBZriC', 'tran', 'thuy', '2014-11-21', '2', '', null, '2014-07-31 07:14:24', '2014-07-31 07:14:24');
INSERT INTO `users` VALUES ('127', 'thuy13@thuna.vn', '$2y$10$f9x97fPODeynDeupnIBoxOXLyUw3C4cEAlsudHfUmRMNZvSHrVpSq', 'tran', 'thuy', '2015-01-02', '2', '', null, '2014-07-31 07:18:34', '2014-07-31 07:18:34');
INSERT INTO `users` VALUES ('128', 'thuy14@thuna.vn', '$2y$10$/o0AhCm2fyaMFGro0vYj7uJvTjTcO7UdOcqi0PodzgibYQRynpM8O', 'tran', 'thuy', '2015-01-02', '2', '', null, '2014-07-31 07:22:14', '2014-07-31 07:22:14');
INSERT INTO `users` VALUES ('129', 'thuy15@thuna.vn', '$2y$10$3Dd0oxcjrLrnendUSMz9dOvdIzZkgihe8AnMofUF8D/iF3rXy9C9K', 'tran', 'thuy', '2014-10-21', '2', '', null, '2014-07-31 07:23:36', '2014-07-31 07:23:36');
