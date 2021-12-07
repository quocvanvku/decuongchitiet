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

 Date: 07/12/2021 22:08:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khoa
-- ----------------------------
DROP TABLE IF EXISTS `table_khoa`;
CREATE TABLE `table_khoa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenKhoa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_truongkhoa` int NULL DEFAULT NULL,
  `id_phokhoa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_giaovu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fanpage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_khoa
-- ----------------------------
INSERT INTO `table_khoa` VALUES (1, 'Khoa Khoa học máy tính', 9, NULL, NULL, 'http://fb.com/cs.vku.udn.vn', 'http://cs.vku.udn.vn', 'cs@vku.udn.vn', '02363667199');
INSERT INTO `table_khoa` VALUES (2, 'Khoa Kỹ thuật máy tính và Điện tử', 50, NULL, NULL, 'http://fb.com/ce.vku.udn.vn', 'http://ce.vku.udn.vn', 'ce@vku.udn.vn', '02363667299');
INSERT INTO `table_khoa` VALUES (3, 'Khoa Kinh tế số và Thương mại điện tử', 107, NULL, NULL, 'http://fb.com/de.vku.udn.vn', 'http://de.vku.udn.vn', 'de@vku.udn.vn', '02363667399');

SET FOREIGN_KEY_CHECKS = 1;
