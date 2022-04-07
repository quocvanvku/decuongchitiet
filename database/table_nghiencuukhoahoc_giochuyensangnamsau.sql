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

 Date: 07/04/2022 14:12:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_giochuyensangnamsau
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_giochuyensangnamsau`;
CREATE TABLE `table_nghiencuukhoahoc_giochuyensangnamsau`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_gv` int NULL DEFAULT NULL,
  `gioChuyenSangNamSau` int NULL DEFAULT NULL,
  `id_namhoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_giochuyensangnamsau
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_giochuyensangnamsau` VALUES (1, 23, 120, 4);
INSERT INTO `table_nghiencuukhoahoc_giochuyensangnamsau` VALUES (2, 23, 4965, 5);

SET FOREIGN_KEY_CHECKS = 1;
