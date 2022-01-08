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

 Date: 08/01/2022 22:52:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_htdaotao
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_htdaotao`;
CREATE TABLE `table_khungchuongtrinh_htdaotao`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenHinhThuc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_khungchuongtrinh_htdaotao
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_htdaotao` VALUES (1, 'Đại học - Chính quy');

SET FOREIGN_KEY_CHECKS = 1;
