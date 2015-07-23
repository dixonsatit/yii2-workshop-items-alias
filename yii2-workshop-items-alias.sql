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

 Date: 07/23/2015 19:56:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `resume`
-- ----------------------------
BEGIN;
INSERT INTO `resume` VALUES ('1', '3', 'สาธิต', 'สีถาพล', '7', '1', '1', 'php,angularjs,node.js,reactjs'), ('2', '2', 'บุญมา', 'สำโรง', '2', '4', '2', 'php,js,css,html5');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
