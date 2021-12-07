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

 Date: 07/12/2021 22:07:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_baidanhgia
-- ----------------------------
DROP TABLE IF EXISTS `table_baidanhgia`;
CREATE TABLE `table_baidanhgia`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_baidanhgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_thanhphandanhgia` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_baidanhgia
-- ----------------------------
INSERT INTO `table_baidanhgia` VALUES (1, 'Điểm Danh', 1);
INSERT INTO `table_baidanhgia` VALUES (2, 'Bài tập trên lớp ', 2);
INSERT INTO `table_baidanhgia` VALUES (3, 'Báo cáo mô tả bài tập nhóm', 2);
INSERT INTO `table_baidanhgia` VALUES (4, 'Kiểm tra giữa kì', 3);
INSERT INTO `table_baidanhgia` VALUES (5, 'Thi cuối kì', 4);
INSERT INTO `table_baidanhgia` VALUES (6, 'Thực hành/Thí nghiệm', 4);

SET FOREIGN_KEY_CHECKS = 1;
