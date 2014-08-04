/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : couple-site-db
Target Host     : localhost:3306
Target Database : couple-site-db
Date: 2014-08-04 15:44:15
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for budgetrange
-- ----------------------------
DROP TABLE IF EXISTS `budgetrange`;
CREATE TABLE `budgetrange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of budgetrange
-- ----------------------------
INSERT INTO `budgetrange` VALUES ('1', '0', '150', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budgetrange` VALUES ('2', '150', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budgetrange` VALUES ('3', '300', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
