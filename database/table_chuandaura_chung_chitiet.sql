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

 Date: 14/11/2021 22:11:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_chung_chitiet
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_chung_chitiet`;
CREATE TABLE `table_chuandaura_chung_chitiet`  (
  `id_cdr_chitiet` int NOT NULL AUTO_INCREMENT,
  `noidung_cdr_chitiet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_cdr_chung` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cdr_chitiet`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_chuandaura_chung_chitiet
-- ----------------------------
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (1, 'noi dung cdr chi tiet 1', 6);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (2, 'noi dung cdr chi tiet 2', 6);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (3, 'noi dung cdr chi tiet 3', 8);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (4, 'them pi 1', 5);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (6, 'them pi 3 sua', 5);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (8, 'them pi 4', 5);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (9, 'pi them', 8);

SET FOREIGN_KEY_CHECKS = 1;
