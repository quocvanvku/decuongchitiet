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

 Date: 08/01/2022 22:53:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_loai3
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_loai3`;
CREATE TABLE `table_nghiencuukhoahoc_loai3`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tacgia` int NULL DEFAULT NULL,
  `minhchung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `hinhanhminhchung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trangthaiduyet` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  `id_hoatdong` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_loai3
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_loai3` VALUES (1, 0, 'minh chung loai 3 test', '06_11_21_59_bieudien.png', 0, 5, 15);
INSERT INTO `table_nghiencuukhoahoc_loai3` VALUES (2, 0, 'minh chung loai 3 2', 'hinh anh 3 2', 0, 5, 15);
INSERT INTO `table_nghiencuukhoahoc_loai3` VALUES (3, 0, 'minh chung loai 3 3', '', 0, 5, 17);
INSERT INTO `table_nghiencuukhoahoc_loai3` VALUES (8, 0, 'demo 6', '03_11_21_17_10-CNTT-NGUYEN THAI NGHE(81-91).pdf', 0, 5, 13);

SET FOREIGN_KEY_CHECKS = 1;
