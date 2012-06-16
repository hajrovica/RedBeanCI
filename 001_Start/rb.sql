/*
Navicat MySQL Data Transfer

Source Server         : LC
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : rb

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2012-06-16 15:29:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bandmember`
-- ----------------------------
DROP TABLE IF EXISTS `bandmember`;
CREATE TABLE `bandmember` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bandmember
-- ----------------------------
INSERT INTO `bandmember` VALUES ('1', null);
INSERT INTO `bandmember` VALUES ('2', null);
INSERT INTO `bandmember` VALUES ('3', null);
INSERT INTO `bandmember` VALUES ('4', null);
INSERT INTO `bandmember` VALUES ('5', null);
INSERT INTO `bandmember` VALUES ('6', null);
INSERT INTO `bandmember` VALUES ('7', null);
INSERT INTO `bandmember` VALUES ('8', null);
INSERT INTO `bandmember` VALUES ('9', null);
INSERT INTO `bandmember` VALUES ('10', null);
INSERT INTO `bandmember` VALUES ('11', null);
INSERT INTO `bandmember` VALUES ('12', null);
INSERT INTO `bandmember` VALUES ('13', null);
INSERT INTO `bandmember` VALUES ('14', 'Teeest');
INSERT INTO `bandmember` VALUES ('15', 'Teeest');
INSERT INTO `bandmember` VALUES ('16', 'Teeest');
INSERT INTO `bandmember` VALUES ('17', 'Teeest');
INSERT INTO `bandmember` VALUES ('18', 'Teeest');
INSERT INTO `bandmember` VALUES ('19', 'Teeest');
INSERT INTO `bandmember` VALUES ('20', 'Teeest');
INSERT INTO `bandmember` VALUES ('21', 'Teeest');
INSERT INTO `bandmember` VALUES ('22', 'Teeest');
INSERT INTO `bandmember` VALUES ('23', 'Teeest');
INSERT INTO `bandmember` VALUES ('24', 'Teeest');
INSERT INTO `bandmember` VALUES ('25', 'Teeest');
INSERT INTO `bandmember` VALUES ('26', 'Teeest');
INSERT INTO `bandmember` VALUES ('27', 'Teeest');
INSERT INTO `bandmember` VALUES ('28', 'Teeest');
INSERT INTO `bandmember` VALUES ('29', 'Teeest');
INSERT INTO `bandmember` VALUES ('30', 'Teeest');
INSERT INTO `bandmember` VALUES ('31', 'Teeest');
INSERT INTO `bandmember` VALUES ('32', 'Teeest');
INSERT INTO `bandmember` VALUES ('33', 'Teeest');
INSERT INTO `bandmember` VALUES ('34', 'Teeest');
INSERT INTO `bandmember` VALUES ('35', 'Teeest');
INSERT INTO `bandmember` VALUES ('36', 'Teeest');
INSERT INTO `bandmember` VALUES ('37', 'Teeest');
INSERT INTO `bandmember` VALUES ('38', 'Teeest');

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_2aaef325ccb15d94752d724695adde10875911f0` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('3', 'DevPHP with Rbeans 0', 'Charles Xavier 0', null);
INSERT INTO `book` VALUES ('4', 'Book1 title', 'Author1', null);
INSERT INTO `book` VALUES ('5', 'Book2 title', 'Author2', null);
INSERT INTO `book` VALUES ('6', 'Book3 title', 'Author3', null);

-- ----------------------------
-- Table structure for `song`
-- ----------------------------
DROP TABLE IF EXISTS `song`;
CREATE TABLE `song` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `track` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of song
-- ----------------------------
INSERT INTO `song` VALUES ('1', 'bluuuh', '4');
INSERT INTO `song` VALUES ('2', 'bluuuh', '4');
INSERT INTO `song` VALUES ('3', 'bluuuh', '4');
INSERT INTO `song` VALUES ('4', 'bluuuh', '4');
INSERT INTO `song` VALUES ('5', 'bluuuh', '4');
INSERT INTO `song` VALUES ('6', 'bluuuh', '4');
INSERT INTO `song` VALUES ('7', 'bluuuh', '4');
INSERT INTO `song` VALUES ('8', 'bluuuh', '4');
INSERT INTO `song` VALUES ('9', 'bluuuh', '4');
INSERT INTO `song` VALUES ('10', 'bluuuh', '4');
INSERT INTO `song` VALUES ('11', 'bluuuh', '4');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_45b115dee6f8ab7891d9a161b856181a65617b6f` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'Name', 'Surname', 'name.surname@mail.com', 'Adress', 'Adress2');
INSERT INTO `student` VALUES ('16', null, null, null, null, null);
INSERT INTO `student` VALUES ('17', null, null, null, null, null);
INSERT INTO `student` VALUES ('18', null, null, null, null, null);
INSERT INTO `student` VALUES ('19', null, null, null, null, null);
INSERT INTO `student` VALUES ('20', null, null, null, null, null);
INSERT INTO `student` VALUES ('21', null, null, null, null, null);
INSERT INTO `student` VALUES ('22', null, null, null, null, null);
INSERT INTO `student` VALUES ('23', null, null, null, null, null);
INSERT INTO `student` VALUES ('24', null, null, null, null, null);
INSERT INTO `student` VALUES ('25', null, null, null, null, null);

-- ----------------------------
-- Table structure for `welcome`
-- ----------------------------
DROP TABLE IF EXISTS `welcome`;
CREATE TABLE `welcome` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `track` tinyint(3) unsigned DEFAULT NULL,
  `track_seconf` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of welcome
-- ----------------------------
INSERT INTO `welcome` VALUES ('1', 'bluuuh', '4', null);
INSERT INTO `welcome` VALUES ('2', 'bluuuh', '4', null);
INSERT INTO `welcome` VALUES ('3', 'bluuuh', '4', null);
INSERT INTO `welcome` VALUES ('4', null, null, '4');
INSERT INTO `welcome` VALUES ('5', 'bluuuh', '4', null);
INSERT INTO `welcome` VALUES ('7', 'bluuuh1', '5', null);
INSERT INTO `welcome` VALUES ('8', null, null, '4');
INSERT INTO `welcome` VALUES ('9', 'bluuuh1', '5', null);
INSERT INTO `welcome` VALUES ('10', null, null, '4');
INSERT INTO `welcome` VALUES ('11', 'bluuuh1', '5', '3');
INSERT INTO `welcome` VALUES ('12', 'bluuuh1', '5', null);
INSERT INTO `welcome` VALUES ('13', 'bluuuh1', '5', null);
