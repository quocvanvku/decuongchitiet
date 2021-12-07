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

 Date: 07/12/2021 22:08:03
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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_decuongchitiet_moilienhe_clo_plo
-- ----------------------------
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (9, 1, 4, 0, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (10, 1, 5, 2, 12, 142);
INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` VALUES (11, 3, 4, 2, 12, 142);

SET FOREIGN_KEY_CHECKS = 1;
