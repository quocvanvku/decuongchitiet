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

 Date: 07/04/2022 14:13:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_loai1
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_loai1`;
CREATE TABLE `table_nghiencuukhoahoc_loai1`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenbaibao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_tacgia` int NULL DEFAULT NULL,
  `id_cactacgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `namxuatban` int NULL DEFAULT NULL,
  `tentapchi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `chiso_issn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `loai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `coquanxuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `thuoctrang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hinhanhminhchung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `trangthaiduyet` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  `id_hoatdong` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_loai1
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_loai1` VALUES (5, 'bai bao 1', 23, '1_60_5', 2021, 'tap chi 1', 'chi so issn', 'loai 1', 'co quan 1', 'trang 1', '02_11_21_48_apple2.jpg|02_11_21_92_apple.png', 2, 5, 3);
INSERT INTO `table_nghiencuukhoahoc_loai1` VALUES (6, 'bai bao 2 sua 1 2', 23, '1_2', 2020, 'tap chi 2 sua', 'chi so issn 2 sua', 'loai 2 sua', 'co quan 2 sua', 'trang 2 sua', '06_11_21_56_04_11_21_86_04_11_21_31_02_11_21_51_brick.png', 3, 5, 1);
INSERT INTO `table_nghiencuukhoahoc_loai1` VALUES (7, 'bai bao 3', 23, '5', 3, 'tap chi 3', 'chi so 3', 'loai 3', 'co quan 3', 'trang 3', '02_11_21_73_co2.png', 1, 5, 1);
INSERT INTO `table_nghiencuukhoahoc_loai1` VALUES (8, 'b1', 21, '20_2', 1, 'b1', 'b1', 'b1', 'b1', 'b1', '02_11_21_45_apple.png', 2, 5, 1);

SET FOREIGN_KEY_CHECKS = 1;
