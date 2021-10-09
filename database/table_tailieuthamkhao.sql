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

 Date: 09/10/2021 09:20:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_tailieuthamkhao
-- ----------------------------
DROP TABLE IF EXISTS `table_tailieuthamkhao`;
CREATE TABLE `table_tailieuthamkhao`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tentacgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `namxuatban` int NULL DEFAULT NULL,
  `tensach` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `noixuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nhaxuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `loaitailieu` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_tailieuthamkhao
-- ----------------------------
INSERT INTO `table_tailieuthamkhao` VALUES (77, 'ten tac gia 1', 2021, 'ten tai lieu 1', 'noi xuat ban 1', 'nha xuat ban 1', NULL, 0, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (78, 'ten tac gia 2', 2021, 'ten tai lieu 2', 'noi xuat ban 2', 'nha xuat ban 2', NULL, 0, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (79, 'ten tac gia 3', 2021, 'ten tai lieu 3', 'noi xuat ban 3', 'nha xuat ban 3', NULL, 1, 12, 142);

SET FOREIGN_KEY_CHECKS = 1;
