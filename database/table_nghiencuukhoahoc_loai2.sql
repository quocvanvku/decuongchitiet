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

 Date: 07/12/2021 22:09:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_loai2
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_loai2`;
CREATE TABLE `table_nghiencuukhoahoc_loai2`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tacgia` int NULL DEFAULT NULL,
  `tensach` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_cactacgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `lachubien` int NULL DEFAULT NULL,
  `sochubien` int NULL DEFAULT NULL,
  `namxuatban` int NULL DEFAULT NULL,
  `nhaxuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hinhanhminhchung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trangthaiduyet` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  `id_hoatdong` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_loai2
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_loai2` VALUES (1, 0, 'ten sach 1', '1_2', 1, 3, 2021, 'nha xuat ban 1', 'hinh anh minh chung', 0, 5, 10);
INSERT INTO `table_nghiencuukhoahoc_loai2` VALUES (2, 0, 'ten sach 2', '3_4', 0, 3, 2020, 'nha xuat ban 2', 'hinh anh ', 0, 5, 12);
INSERT INTO `table_nghiencuukhoahoc_loai2` VALUES (3, 0, 'ten sach 1 2', '1_5', 1, 12, 20212, 'nha xuat ban 1 2', '06_11_21_50_bieudien.png|06_11_21_4_03_11_21_90_apple.png|06_11_21_65_03_11_21_1_br.png', 0, 5, 9);
INSERT INTO `table_nghiencuukhoahoc_loai2` VALUES (4, 0, 'ten sach 4', '', 1, 2, 2, 'nha xuat ban 4', '03_11_21_20_fruit.png', 0, 5, 9);

SET FOREIGN_KEY_CHECKS = 1;
