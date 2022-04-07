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

 Date: 07/04/2022 14:13:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_sua
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_sua`;
CREATE TABLE `table_nghiencuukhoahoc_sua`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tacgia` int NULL DEFAULT NULL,
  `id_nckh` int NULL DEFAULT NULL,
  `loai_hoatdong` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `noidung_sua` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `namhoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_sua
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_sua` VALUES (1, 23, 6, 'loai1', 'sua lan 1', 5);
INSERT INTO `table_nghiencuukhoahoc_sua` VALUES (2, 23, 6, 'loai1', 'sua lan 2', 5);

SET FOREIGN_KEY_CHECKS = 1;
