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

 Date: 15/08/2021 12:52:21
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
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_khungchuongtrinh_hocphan
-- ----------------------------
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (14, 1, 1, 145, 51, 3, '9', '8', '2', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (18, 5, 6, 146, 81, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (19, 19, 6, 146, 105, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (20, 14, 6, 146, 96, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (21, 20, 6, 146, 106, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (22, 4, 6, 146, 79, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (23, 5, 1, 146, 12, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (24, 9, 2, 146, 22, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (25, 3, 3, 146, 37, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (26, 2, 1, 146, 3, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (27, 4, 4, 146, 49, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (28, 4, 1, 146, 10, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (29, 4, 2, 146, 24, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (30, 7, 1, 146, 7, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (31, 1, 6, 146, 1, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (32, 6, 4, 146, 55, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (33, 3, 6, 146, 63, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (34, 3, 1, 146, 13, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (35, 7, 2, 146, 23, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (36, 7, 3, 146, 39, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (37, 5, 2, 146, 15, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (38, 1, 1, 146, 6, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (39, 1, 2, 146, 21, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (40, 8, 2, 146, 19, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (41, 6, 1, 146, 9, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (42, 1, 4, 146, 46, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (43, 2, 3, 146, 30, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (44, 2, 4, 146, 47, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (45, 2, 5, 146, 65, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (46, 7, 6, 146, 86, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (47, 9, 3, 146, 35, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (48, 4, 3, 146, 36, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (49, 3, 4, 146, 54, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (50, 8, 3, 146, 34, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (51, 11, 6, 146, 90, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (52, 2, 2, 146, 16, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (53, 4, 5, 146, 67, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (54, 3, 2, 146, 17, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (55, 1, 3, 146, 32, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (56, 7, 4, 146, 48, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (57, 3, 5, 146, 66, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (58, 8, 6, 146, 87, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (59, 2, 6, 146, 53, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (60, 6, 3, 146, 31, NULL, NULL, '6_122', NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (61, 8, 4, 146, 51, NULL, '6_35', '3_6_69', '7', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (62, 6, 2, 146, 20, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (63, 12, 6, 146, 91, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (64, 1, 5, 146, 64, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (65, 8, 5, 146, 71, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (66, 13, 6, 146, 92, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (67, 5, 3, 146, 38, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (68, 1, 1, 142, 7, 1, '11_4', '8_8_4', '45', b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (70, 5, 4, 146, 52, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (71, 9, 6, 146, 88, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (72, 15, 6, 146, 97, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (73, 21, 6, 146, 110, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (74, 16, 6, 146, 98, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (75, 23, 6, 146, 116, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (76, 6, 5, 146, 69, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (77, 17, 6, 146, 99, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (78, 22, 6, 146, 114, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (79, 24, 6, 146, 115, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (80, 6, 6, 146, 85, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (81, 5, 5, 146, 68, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (82, 10, 6, 146, 89, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (83, 18, 6, 146, 100, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (92, 7, 5, 146, 70, NULL, NULL, NULL, NULL, b'1', NULL, NULL);
INSERT INTO `table_khungchuongtrinh_hocphan` VALUES (93, 1, 6, 142, 6, NULL, NULL, NULL, NULL, b'1', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
