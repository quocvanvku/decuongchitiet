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

 Date: 14/11/2021 22:11:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_chung
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_chung`;
CREATE TABLE `table_chuandaura_chung`  (
  `id_cdr_chung` int NOT NULL AUTO_INCREMENT,
  `ten_plo` int NULL DEFAULT NULL,
  `noidung_cdr_chung` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cdr_chung`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_chuandaura_chung
-- ----------------------------
INSERT INTO `table_chuandaura_chung` VALUES (1, 1, 'day la plo 1 da', 142);
INSERT INTO `table_chuandaura_chung` VALUES (2, 2, 'day la plo 2', 142);
INSERT INTO `table_chuandaura_chung` VALUES (3, 3, 'day la plo', 142);
INSERT INTO `table_chuandaura_chung` VALUES (4, 1, 'plo 143', 143);
INSERT INTO `table_chuandaura_chung` VALUES (5, 1, 'plo 154', 154);
INSERT INTO `table_chuandaura_chung` VALUES (6, 1, 'plo 2020 - 1', 149);
INSERT INTO `table_chuandaura_chung` VALUES (7, 2, 'plo 2020 - 2', 149);
INSERT INTO `table_chuandaura_chung` VALUES (8, 2, 'plo 154 2', 154);
INSERT INTO `table_chuandaura_chung` VALUES (10, 3, 'plo 3', 154);

SET FOREIGN_KEY_CHECKS = 1;
