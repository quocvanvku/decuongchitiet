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

 Date: 08/01/2022 22:53:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_moilienhe_po_plo
-- ----------------------------
DROP TABLE IF EXISTS `table_moilienhe_po_plo`;
CREATE TABLE `table_moilienhe_po_plo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_po` int NULL DEFAULT NULL,
  `id_plo` int NULL DEFAULT NULL,
  `id_khung` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_moilienhe_po_plo
-- ----------------------------
INSERT INTO `table_moilienhe_po_plo` VALUES (2, 7, 1, 142);
INSERT INTO `table_moilienhe_po_plo` VALUES (3, 2, 2, 142);
INSERT INTO `table_moilienhe_po_plo` VALUES (6, 8, 5, 154);
INSERT INTO `table_moilienhe_po_plo` VALUES (7, 8, 7, 154);
INSERT INTO `table_moilienhe_po_plo` VALUES (8, 10, 15, 156);
INSERT INTO `table_moilienhe_po_plo` VALUES (9, 10, 18, 156);
INSERT INTO `table_moilienhe_po_plo` VALUES (10, 12, 18, 156);
INSERT INTO `table_moilienhe_po_plo` VALUES (11, 9, 5, 154);
INSERT INTO `table_moilienhe_po_plo` VALUES (13, 11, 7, 156);
INSERT INTO `table_moilienhe_po_plo` VALUES (14, 8, 15, 154);
INSERT INTO `table_moilienhe_po_plo` VALUES (15, 13, 13, 154);

SET FOREIGN_KEY_CHECKS = 1;
