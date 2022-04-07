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

 Date: 07/04/2022 14:12:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_giochuan
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_giochuan`;
CREATE TABLE `table_nghiencuukhoahoc_giochuan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenChucDanh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gioNghienCuuChuan` int NULL DEFAULT NULL,
  `id_namhoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_giochuan
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_giochuan` VALUES (1, 'Giảng Viên', 600, 5);

SET FOREIGN_KEY_CHECKS = 1;
