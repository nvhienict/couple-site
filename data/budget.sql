/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : couple-site-db
Target Host     : localhost:3306
Target Database : couple-site-db
Date: 2014-08-04 15:44:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `range1` float(8,2) NOT NULL,
  `range2` float(8,2) NOT NULL,
  `range3` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of budget
-- ----------------------------
INSERT INTO `budget` VALUES ('1', '1', 'Áo cưới', '0.50', '0.50', '0.50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('2', '1', 'Áo dài', '0.50', '0.40', '0.40', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('3', '1', 'Phụ kiện/ đồ ngủ', '0.00', '0.10', '0.10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('4', '2', 'Ban nhạc', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('5', '3', 'Bánh cưới', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('6', '4', 'xe cộ', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('7', '5', 'Trang điểm', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('8', '7', 'Đãi khách', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('9', '8', 'Chụp ảnh', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('10', '9', 'Thiệp mời', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('11', '10', 'Trang phục chú rể', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('12', '13', 'Hoa cầm tay', '0.50', '0.50', '0.50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('13', '13', 'Hoa trang trí', '0.50', '0.50', '0.50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('14', '14', 'Ca sĩ/ MC', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('15', '15', 'Quay phim', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES ('16', '15', 'Khác', '1.00', '1.00', '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
