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

 Date: 07/12/2021 22:09:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_loai4
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_loai4`;
CREATE TABLE `table_nghiencuukhoahoc_loai4`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `giatrihopdong` int NULL DEFAULT NULL,
  `minhchung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `hinhanhminhchung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trangthaiduyet` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  `id_hoatdong` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_loai4
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
