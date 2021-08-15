/*
 Navicat Premium Data Transfer

 Source Server         : Mysql_DB
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : demovku

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 13/08/2021 21:17:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh`;
CREATE TABLE `table_khungchuongtrinh`  (
  `id` int NOT NULL,
  `tenkhungchuongtrinh` varchar(510) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_khoa` int NULL DEFAULT NULL,
  `id_nganh` int NULL DEFAULT NULL,
  `id_trinhdo` int NULL DEFAULT NULL,
  `id_htdaotao` int NULL DEFAULT NULL,
  `id_khoahoc` int NULL DEFAULT NULL,
  `isKhungnangcao` int NULL DEFAULT NULL,
  `soTCTCbatbuoc` int NULL DEFAULT NULL,
  `sotctoithieu` int NULL DEFAULT NULL,
  `khungchung` int NULL DEFAULT NULL,
  `thoigian` float(11, 0) NULL DEFAULT NULL,
  `id_namapdung` int NULL DEFAULT NULL,
  `id_namketthuc_apdung` int NULL DEFAULT NULL,
  `apdung` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of table_khungchuongtrinh
-- ----------------------------
INSERT INTO `table_khungchuongtrinh` VALUES (142, 'CTĐT Công nghệ Kỹ thuật máy tính 2019', 2, 3, 2, 1, 6, NULL, 154, 154, NULL, 4, 3, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (143, 'CTĐT Công nghệ Kỹ thuật máy tính 2018', 2, 3, 2, 1, 4, NULL, 154, 154, NULL, 4, 2, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (144, 'CTĐT Công nghệ Kỹ thuật máy tính 2017', 2, 3, 2, 1, 2, NULL, 154, 154, NULL, 4, 1, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (145, 'CTĐT Công nghệ Kỹ thuật máy tính 2020', 2, 3, 2, 1, 8, NULL, 154, 154, NULL, 4, 4, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (146, 'CTĐT Công nghệ Thông tin 2019', 1, 1, 2, 1, 6, NULL, 154, 154, NULL, 4, 3, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (147, 'CTĐT Công nghệ Thông tin 2018', 1, 1, 2, 1, 4, NULL, 154, 154, NULL, 4, 2, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (148, 'CTĐT Công nghệ Thông tin 2017', 1, 1, 2, 1, 2, NULL, 154, 154, NULL, 4, 1, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (149, 'CTĐT Công nghệ Thông tin 2020', 1, 1, 2, 1, 8, NULL, 154, 154, NULL, 4, 4, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (150, 'CTĐT Quản trị kinh doanh 2017', 3, 2, 1, 1, 1, NULL, 124, 124, NULL, 4, 1, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (151, 'CTĐT Quản trị kinh doanh 2018', 3, 2, 1, 1, 3, NULL, 124, 124, NULL, 4, 2, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (152, 'CTĐT Quản trị kinh doanh 2019', 3, 2, 1, 1, 5, NULL, 124, 124, NULL, 4, 3, NULL, NULL);
INSERT INTO `table_khungchuongtrinh` VALUES (153, 'CTĐT Quản trị kinh doanh 2020', 3, 2, 1, 1, 7, NULL, 124, 124, NULL, 4, 4, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
