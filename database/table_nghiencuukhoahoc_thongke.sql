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

 Date: 07/12/2021 22:09:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_thongke
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_thongke`;
CREATE TABLE `table_nghiencuukhoahoc_thongke`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tacgia` int NULL DEFAULT NULL,
  `id_namhoc` int NULL DEFAULT NULL,
  `chucdanh` int NULL DEFAULT NULL,
  `chucvu` int NULL DEFAULT NULL,
  `sogio_nghiencuu` int NULL DEFAULT NULL,
  `sogio_chuyensangnamsau` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_thongke
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_thongke` VALUES (1, 0, 4, 1, 1, 0, 470);
INSERT INTO `table_nghiencuukhoahoc_thongke` VALUES (2, 0, 5, 1, 1, 0, 0);

SET FOREIGN_KEY_CHECKS = 1;
