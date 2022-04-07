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

 Date: 07/04/2022 14:12:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_gionghiencuu
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_gionghiencuu`;
CREATE TABLE `table_nghiencuukhoahoc_gionghiencuu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_gv` int NULL DEFAULT NULL,
  `id_chucdanh` int NULL DEFAULT NULL,
  `id_dinhmuc` int NULL DEFAULT NULL,
  `id_namhoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_gionghiencuu
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_gionghiencuu` VALUES (1, 23, 1, 1, 5);

SET FOREIGN_KEY_CHECKS = 1;
