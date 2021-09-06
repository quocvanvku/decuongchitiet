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

 Date: 04/09/2021 22:58:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_trinhdo
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_trinhdo`;
CREATE TABLE `table_khungchuongtrinh_trinhdo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `trinhdo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_khungchuongtrinh_trinhdo
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_trinhdo` VALUES (1, 'Kỹ sư');
INSERT INTO `table_khungchuongtrinh_trinhdo` VALUES (2, 'Cử nhân');

SET FOREIGN_KEY_CHECKS = 1;
