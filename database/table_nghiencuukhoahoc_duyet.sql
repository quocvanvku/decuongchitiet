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

 Date: 07/04/2022 14:12:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_duyet
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_duyet`;
CREATE TABLE `table_nghiencuukhoahoc_duyet`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tacgia` int NULL DEFAULT NULL,
  `id_nckh` int NULL DEFAULT NULL,
  `loai_hoatdong` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tinhtrangduyet` int NULL DEFAULT NULL,
  `ngayguiduyet` int NULL DEFAULT NULL,
  `ngayduyet` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_duyet
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (11, 23, 5, 'loai1', 1, 1647475200, 1648166400, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (12, 23, 6, 'loai1', 2, 1647475200, 1648166400, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (13, 23, 7, 'loai1', 0, 1647475200, 1648166400, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (14, 23, 1, 'loai2', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (15, 23, 2, 'loai2', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (16, 23, 3, 'loai2', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (17, 23, 4, 'loai2', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (18, 23, 1, 'loai3', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (19, 23, 2, 'loai3', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (20, 23, 3, 'loai3', 0, 1647475200, NULL, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (21, 21, 8, 'loai3', 1, 1647475200, 1647993600, 5);
INSERT INTO `table_nghiencuukhoahoc_duyet` VALUES (22, 21, 8, 'loai1', 1, 1647475200, 1647993600, 5);

SET FOREIGN_KEY_CHECKS = 1;
