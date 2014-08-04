/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : couple-site-db
Target Host     : localhost:3306
Target Database : couple-site-db
Date: 2014-08-04 15:44:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `range1` float DEFAULT NULL,
  `range2` float DEFAULT NULL,
  `range3` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Áo cưới cô dâu', '<p>Thời trang c&ocirc; d&acirc;u, những v&aacute;y cưới được sử dụng</p>\r\n', '0.08', '0.08', '0.08', '0000-00-00 00:00:00', '2014-07-28 03:23:08');
INSERT INTO `categories` VALUES ('2', 'Ban nhạc', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.02', '0.02', '0.03', '0000-00-00 00:00:00', '2014-07-23 06:37:41');
INSERT INTO `categories` VALUES ('3', 'Bánh cưới', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0', '0.01', '0.01', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('4', 'Dịch vụ vận chuyển', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0', '0', '0.02', '0000-00-00 00:00:00', '2014-07-22 08:36:48');
INSERT INTO `categories` VALUES ('5', 'Trang điểm', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.04', '0.03', '0.03', '0000-00-00 00:00:00', '2014-07-23 10:15:23');
INSERT INTO `categories` VALUES ('6', 'Wedding Planner', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('7', 'Nhà hàng tiệc cưới', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.58', '0.52', '0.48', '0000-00-00 00:00:00', '2014-07-22 08:19:12');
INSERT INTO `categories` VALUES ('8', 'Chụp ảnh', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.08', '0.1', '0.07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('9', 'Thiệp cưới', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.02', '0.02', '0.02', '0000-00-00 00:00:00', '2014-07-22 03:05:25');
INSERT INTO `categories` VALUES ('10', 'Trang phục chú rể', '<p>Chuẩn bị những trang sức như v&ograve;ng tay, b&ocirc;ng tai, nhẫn cưới...</p>\r\n', '0.02', '0.02', '0.02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('13', 'Hoa và trang trí', '<p>nhapapa k,jdbjsdjvd fhldifhoahf ksksdjdjfu ựccnccmcmmc</p>\r\n', '0.1', '0.1', '0.12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('14', 'Ca sĩ/MC', null, '0', '0.02', '0.02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('15', 'Quay phim', null, '0.06', '0.08', '0.08', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('16', 'Khác', null, '0', '0', '0.02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
