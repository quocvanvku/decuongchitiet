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

 Date: 09/10/2021 09:19:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_khoiluongkienthuc
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_khoiluongkienthuc`;
CREATE TABLE `table_khungchuongtrinh_khoiluongkienthuc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenkhoiluongkienthuc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `isKhoiluongkienthuc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_khungchuongtrinh_khoiluongkienthuc
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (1, 'Giáo dục đại cương', 0);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (2, 'Giáo dục chuyên nghiệp', 0);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (3, 'Tốt nghiệp', 0);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (4, 'Cơ sở nhóm ngành', 2);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (5, 'Cơ sở ngành', 2);
INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` VALUES (6, 'Chuyên ngành', 2);

SET FOREIGN_KEY_CHECKS = 1;
