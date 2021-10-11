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

 Date: 11/10/2021 18:07:13
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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_decuongchitiet_moilienhe_clo_plo
-- ----------------------------
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (11, 1, 2, 1, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (12, 2, 2, 1, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (13, 5, 3, 1, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (14, 38, 1, 1, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (16, 2, 2, 2, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (19, 1, 2, 2, 7, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (20, 1, 1, 0, 13, 146);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (21, 6, 3, 2, 13, 146);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (22, 6, 2, 1, 13, 146);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (23, 38, 1, 0, 13, 146);

SET FOREIGN_KEY_CHECKS = 1;
