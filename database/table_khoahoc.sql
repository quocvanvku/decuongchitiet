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

 Date: 04/09/2021 22:57:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khoahoc
-- ----------------------------
DROP TABLE IF EXISTS `table_khoahoc`;
CREATE TABLE `table_khoahoc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `khoahoc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trangthai` tinyint(1) NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_khoa` int NULL DEFAULT NULL,
  `tenkhoa` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nambatdau` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namketthuc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_khoahoc
-- ----------------------------
INSERT INTO `table_khoahoc` VALUES (1, '2017-2021', NULL, NULL, NULL, NULL, 1, 'K17', '2017', '2021');
INSERT INTO `table_khoahoc` VALUES (2, '2017-2022', NULL, NULL, NULL, NULL, 1, 'K17', '2017', '2022');
INSERT INTO `table_khoahoc` VALUES (3, '2018-2022', NULL, NULL, NULL, NULL, 2, 'K18', '2018', '2022');
INSERT INTO `table_khoahoc` VALUES (4, '2018-2023', NULL, NULL, NULL, NULL, 2, 'K18', '2018', '2023');
INSERT INTO `table_khoahoc` VALUES (5, '2019-2023', NULL, NULL, NULL, NULL, 3, 'K19', '2019', '2023');
INSERT INTO `table_khoahoc` VALUES (6, '2019-2024', NULL, NULL, NULL, NULL, 3, 'K19', '2019', '2024');
INSERT INTO `table_khoahoc` VALUES (7, '2020-2024', NULL, NULL, NULL, NULL, 4, 'K20', '2020', '2024');
INSERT INTO `table_khoahoc` VALUES (8, '2020-2025', NULL, NULL, NULL, NULL, 4, 'K20', '2020', '2025');

SET FOREIGN_KEY_CHECKS = 1;
