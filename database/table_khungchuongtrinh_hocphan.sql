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

 Date: 13/08/2021 21:17:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_khungchuongtrinh_hocphan
-- ----------------------------
DROP TABLE IF EXISTS `table_khungchuongtrinh_hocphan`;
CREATE TABLE `table_khungchuongtrinh_hocphan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `stt` int NULL DEFAULT NULL,
  `hocky` int NULL DEFAULT NULL,
  `id_khung` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `id_hocphan_thaythe` int NULL DEFAULT NULL,
  `tienquyet` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hoctruoc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `songhanh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tuchon` bit(1) NULL DEFAULT NULL,
  `da_chuyennganh` int NULL DEFAULT NULL,
  `da_totnghiep` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of table_khungchuongtrinh_hocphan
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (14, 1, 1, 145, 51, 3, '9', '8', '2', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (18, 1, 8, 146, 81, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (19, 2, 8, 146, 105, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (20, 3, 8, 146, 96, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (21, 4, 8, 146, 106, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (22, 5, 8, 146, 79, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (23, 6, 1, 146, 12, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (24, 7, 2, 146, 22, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (25, 8, 3, 146, 37, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (26, 9, 1, 146, 3, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (27, 10, 1, 146, 49, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (28, 11, 1, 146, 10, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (29, 12, 2, 146, 24, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (30, 13, 1, 146, 7, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (31, 14, 1, 146, 1, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (32, 15, 3, 146, 55, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (33, 16, 1, 146, 63, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (34, 17, 1, 146, 13, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (35, 18, 1, 146, 23, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (36, 19, 2, 146, 39, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (37, 20, 1, 146, 15, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (38, 21, 1, 146, 6, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (39, 22, 1, 146, 21, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (40, 23, 1, 146, 19, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (41, 24, 1, 146, 9, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (42, 25, 3, 146, 46, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (43, 26, 1, 146, 30, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (44, 27, 1, 146, 47, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (45, 28, 1, 146, 65, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (46, 29, 1, 146, 86, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (47, 30, 1, 146, 35, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (48, 31, 1, 146, 36, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (49, 32, 1, 146, 54, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (50, 33, 1, 146, 34, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (51, 34, 1, 146, 90, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (52, 35, 1, 146, 16, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (53, 36, 1, 146, 67, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (54, 37, 1, 146, 17, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (55, 38, 1, 146, 32, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (56, 39, 1, 146, 48, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (57, 40, 1, 146, 66, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (58, 41, 1, 146, 87, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (59, 42, 1, 146, 53, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (60, 43, 1, 146, 31, NULL, NULL, '6_122', NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (61, 44, 1, 146, 51, NULL, '6_35', '3_6_69', '7', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (62, 45, 1, 146, 20, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (63, 46, 1, 146, 91, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (64, 47, 1, 146, 64, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (65, 48, 1, 146, 71, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (66, 49, 1, 146, 92, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (67, 50, 1, 146, 38, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (68, 1, 1, 142, 7, 1, '11_4', '8_8_4', '45', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (69, 2, 1, 142, 51, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (70, 51, 1, 146, 52, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (71, 52, 1, 146, 88, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (72, 53, 1, 146, 97, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (73, 54, 1, 146, 110, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (74, 55, 1, 146, 98, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (75, 56, 1, 146, 116, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (76, 57, 1, 146, 69, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (77, 58, 1, 146, 99, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (78, 59, 1, 146, 114, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (79, 60, 1, 146, 115, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (80, 61, 1, 146, 85, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (81, 62, 1, 146, 68, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (82, 63, 1, 146, 89, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (83, 64, 1, 146, 100, NULL, NULL, NULL, NULL, b'1', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
