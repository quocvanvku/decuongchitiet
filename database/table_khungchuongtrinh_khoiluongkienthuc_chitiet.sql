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

 Date: 08/01/2022 22:53:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_khoiluongkienthuc_chitiet
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_khoiluongkienthuc_chitiet`;
CREATE TABLE `table_khungchuongtrinh_khoiluongkienthuc_chitiet`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_khoiluongkienthuc` int NULL DEFAULT NULL,
  `id_khung` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_khungchuongtrinh_khoiluongkienthuc_chitiet
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` VALUES (13, 3, 143);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` VALUES (21, 1, 142);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` VALUES (23, 6, 142);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` VALUES (24, 5, 142);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` VALUES (25, 3, 142);

SET FOREIGN_KEY_CHECKS = 1;
