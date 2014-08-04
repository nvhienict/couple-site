/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : couple-site-db
Target Host     : localhost:3306
Target Database : couple-site-db
Date: 2014-08-04 15:43:56
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for userbudget
-- ----------------------------
DROP TABLE IF EXISTS `userbudget`;
CREATE TABLE `userbudget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estimate` float(8,2) NOT NULL,
  `actual` float(8,2) NOT NULL,
  `pay` float(8,2) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of userbudget
-- ----------------------------
