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

 Date: 08/01/2022 22:53:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_muctieu
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_muctieu`;
CREATE TABLE `table_khungchuongtrinh_muctieu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_po` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `noidung_po` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_khung` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_khungchuongtrinh_muctieu
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (1, '1', 'Đây là PO 1', 142);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (2, '2', 'Đây là PO 2 3', 142);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (3, '3', 'Đây là PO 333333', 142);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (7, '4', 'po 4', 142);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (8, '1', 'day la po 1', 154);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (9, '2', 'PO 22222222222222', 154);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (10, '1', 'them po 1', 156);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (11, '2', 'them po 2', 156);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (12, '3', 'them po 3', 156);
INSERT INTO `table_khungchuongtrinh_muctieu` VALUES (13, '3', 'day la poooo3', 154);

SET FOREIGN_KEY_CHECKS = 1;
