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

 Date: 08/01/2022 22:51:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_decuongchitiet_moilienhe_clo_pi
-- ----------------------------
DROP TABLE IF EXISTS `table_decuongchitiet_moilienhe_clo_pi`;
CREATE TABLE `table_decuongchitiet_moilienhe_clo_pi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_chuandaura_chung_chitiet` int NULL DEFAULT NULL,
  `id_chuandaura_monhoc` int NULL DEFAULT NULL,
  `mucdo` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_decuongchitiet_moilienhe_clo_pi
-- ----------------------------
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (7, 10, 22, 0, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (8, 15, 20, 0, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (9, 17, 19, 0, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (10, 17, 22, 2, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (11, 19, 19, 0, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (12, 19, 21, 0, 15, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (13, 2, 13, 2, 12, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (14, 2, 14, 1, 12, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (15, 23, 14, 0, 12, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (17, 18, 14, 1, 12, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (18, 1, 14, 1, 12, 156);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (19, 2, 26, 1, 12, 154);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (20, 2, 25, 0, 12, 154);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (21, 32, 26, 2, 12, 154);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (22, 23, 26, 1, 12, 154);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (23, 23, 25, 2, 12, 154);
INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` VALUES (24, 21, 25, 0, 12, 154);

SET FOREIGN_KEY_CHECKS = 1;
