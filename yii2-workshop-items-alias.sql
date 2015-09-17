/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : localhost
 Source Database       : yii2-workshop-items-alias

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : utf-8

 Date: 09/17/2015 16:50:06 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `education`
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `education`
-- ----------------------------
BEGIN;
INSERT INTO `education` VALUES ('1', 'ต่ำกว่ามัธยมศึกษาตอนต้น'), ('2', 'มัธยมศึกษาตอนต้น'), ('3', 'ปวช'), ('4', 'มัธยมศึกษาตอนปลาย'), ('5', 'ปวส'), ('6', 'อนุปริญญา'), ('7', 'ปริญญาตรี'), ('8', 'ปริญญาโท'), ('9', 'ปริญญาเอก');
COMMIT;

-- ----------------------------
--  Table structure for `resume`
-- ----------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) DEFAULT NULL COMMENT 'นามสกุล',
  `education_level` int(11) DEFAULT NULL COMMENT 'การศึกษา',
  `marital_status` int(11) DEFAULT NULL COMMENT 'สถานะสมรส',
  `sex` int(11) DEFAULT NULL COMMENT 'เพศ',
  `skill` varchar(255) DEFAULT NULL COMMENT 'ทักษะ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `resume`
-- ----------------------------
BEGIN;
INSERT INTO `resume` VALUES ('1', '3', 'สาธิต', 'สีถาพล', '9', '4', '2', '1,2,3'), ('4', '1', 'ศุภชัย', 'วงศ์ชื่น', '7', '1', '1', '1,2,3,4,5,6'), ('5', '2', 'ฤทธิเนตร', 'ปิงวัง', '7', '1', '1', '1,2,3,4,5,6,8');
COMMIT;

-- ----------------------------
--  Table structure for `skill`
-- ----------------------------
DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `skill`
-- ----------------------------
BEGIN;
INSERT INTO `skill` VALUES ('1', 'PHP'), ('2', 'JQuery'), ('3', 'HTML5'), ('4', 'CSS'), ('5', 'JavaScript'), ('6', 'MySQL'), ('7', 'MongoDB'), ('8', 'AngularJs'), ('9', 'ReactJs'), ('10', 'Node.js');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
