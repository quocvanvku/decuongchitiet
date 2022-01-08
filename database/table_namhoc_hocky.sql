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

 Date: 08/01/2022 22:53:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_namhoc_hocky
-- ----------------------------
DROP TABLE IF EXISTS `table_namhoc_hocky`;
CREATE TABLE `table_namhoc_hocky`  (
  `id` int NOT NULL,
  `nambatdau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namketthuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namhoc_key` int NOT NULL AUTO_INCREMENT,
  `hocky` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hienhanh` tinyint(1) NULL DEFAULT 0,
  `trangthai` tinyint(1) NOT NULL,
  `batdau` date NULL DEFAULT NULL,
  `ketthuc` date NULL DEFAULT NULL,
  `batdaunamhoc` date NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`namhoc_key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_namhoc_hocky
-- ----------------------------
INSERT INTO `table_namhoc_hocky` VALUES (1, '2017', '2018', 1, '2', 0, 0, '2017-08-05', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (2, '2018', '2019', 2, '2', 0, 0, '2018-08-05', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (3, '2019', '2020', 3, '1', 0, 0, '2018-08-05', NULL, '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `table_namhoc_hocky` VALUES (3, '2019', '2020', 4, '2', 0, 0, '2019-12-23', NULL, '2019-08-05', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `table_namhoc_hocky` VALUES (2, '2018', '2019', 5, '1', 0, 0, '2018-08-05', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (1, '2017', '2018', 6, '1', 0, 0, '2017-08-05', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (4, '2020', '2021', 7, '1', 0, 0, '2020-08-03', '0000-00-00', '2020-08-03', NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (4, '2020', '2021', 8, '2', 0, 0, '2020-08-03', NULL, '2020-08-03', NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (4, '2020', '2021', 9, '3', 0, 0, '2020-08-03', NULL, '2020-08-03', NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (5, '2021', '2022', 10, '1', 1, 0, '2021-08-02', NULL, '2021-08-02', NULL, NULL, NULL);
INSERT INTO `table_namhoc_hocky` VALUES (0, '_', '_', 11, '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
