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

 Date: 08/01/2022 22:52:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_decuongchitiet_moilienhe_clo_plo
-- ----------------------------
DROP TABLE IF EXISTS `table_decuongchitiet_moilienhe_clo_plo`;
CREATE TABLE `table_decuongchitiet_moilienhe_clo_plo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_chuandaura_chung` int NULL DEFAULT NULL,
  `id_chuandaura_monhoc` int NULL DEFAULT NULL,
  `mucdo` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_decuongchitiet_moilienhe_clo_plo
-- ----------------------------
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (9, 1, 4, 0, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (10, 1, 5, 1, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (11, 3, 4, 2, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (14, 2, 5, 0, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (16, 1, 23, 0, 10, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (17, 1, 24, 0, 10, 142);

SET FOREIGN_KEY_CHECKS = 1;
