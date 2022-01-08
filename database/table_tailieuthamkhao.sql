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

 Date: 08/01/2022 22:54:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_tailieuthamkhao
-- ----------------------------
DROP TABLE IF EXISTS `table_tailieuthamkhao`;
CREATE TABLE `table_tailieuthamkhao`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tentacgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `namxuatban` int NULL DEFAULT NULL,
  `tensach` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `noixuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nhaxuatban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `loaitailieu` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_tailieuthamkhao
-- ----------------------------
INSERT INTO `table_tailieuthamkhao` VALUES (84, 'a', 1, 'a', 'a', 'a', 'a', 0, 7, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (92, 'a', 1, 'a', 'a', 'a', 'a', 0, 13, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (93, 'b', 2, 'b', 'b', 'b', 'b', 1, 13, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (94, 'c', 3, 'c', 'c', 'c', 'c', 1, 13, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (95, 'Mark Allen Weiss', 2014, 'Data Structures And Algorithms Analysis in C++', 'Peason', 'Peason', 'url', 0, 15, 156);
INSERT INTO `table_tailieuthamkhao` VALUES (96, 'Jiman Hong, Nguyễn Văn Lợi, Nguyễn Phương Tâm, Ninh Khánh Chi', 2019, 'Cấu trúc dữ liệu', 'Nhà xuất bản TT&TT', 'Nhà xuất bản TT&TT', 'url', 1, 15, 156);
INSERT INTO `table_tailieuthamkhao` VALUES (97, 'ten tac gia 1', 2021, 'ten tai lieu 1', 'noi xuat ban 1', 'nha xuat ban 1', '4', 0, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (98, 'ten tac gia 2', 2021, 'ten tai lieu 2', 'noi xuat ban 2', 'nha xuat ban 2', '4', 0, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (99, 'ten tac gia 3', 2021, 'ten tai lieu 3', 'noi xuat ban 3', 'nha xuat ban 3', '4', 1, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (100, 'tai lieu 4', 4, '4', '4', '4', '4', 1, 12, 142);
INSERT INTO `table_tailieuthamkhao` VALUES (101, 'a', 1, 'a', 'a', 'a', 'a', 0, 12, 154);
INSERT INTO `table_tailieuthamkhao` VALUES (102, 'c', 3, 'c', 'c', 'c', 'c', 1, 12, 154);
INSERT INTO `table_tailieuthamkhao` VALUES (103, 'Mark Allen Weiss', 2014, 'Data Structures And Algorithms Analysis in C++', 'Peason', 'Peason', 'url', 1, 12, 154);

SET FOREIGN_KEY_CHECKS = 1;
