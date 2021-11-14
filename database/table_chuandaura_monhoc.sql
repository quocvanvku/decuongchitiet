/*
 Navicat Premium Data Transfer

 Source Server         : Mysql_DB
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : demovku

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 14/11/2021 22:11:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_monhoc
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_monhoc`;
CREATE TABLE `table_chuandaura_monhoc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `stt` int NULL DEFAULT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_chuandaura_monhoc
-- ----------------------------
INSERT INTO `table_chuandaura_monhoc` VALUES (1, 1, 'clo 1', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (2, 2, 'clo 2 sua', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (3, 3, 'clo 3', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (4, 1, 'chuan dau ra 1', 12, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (5, 2, 'chuan dau ra 2', 12, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (6, 1, 'clo 1', 3, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (7, 2, 'clo 2', 3, 142);

SET FOREIGN_KEY_CHECKS = 1;
