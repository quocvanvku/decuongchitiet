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

 Date: 08/01/2022 22:51:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_chung
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_chung`;
CREATE TABLE `table_chuandaura_chung`  (
  `id_cdr_chung` int NOT NULL AUTO_INCREMENT,
  `ten_plo` int NULL DEFAULT NULL,
  `noidung_cdr_chung` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cdr_chung`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_chuandaura_chung
-- ----------------------------
INSERT INTO `table_chuandaura_chung` VALUES (1, 1, 'day la plo 1 da', 142);
INSERT INTO `table_chuandaura_chung` VALUES (2, 2, 'day la plo 2', 142);
INSERT INTO `table_chuandaura_chung` VALUES (3, 3, 'day la plo', 142);
INSERT INTO `table_chuandaura_chung` VALUES (5, 1, 'Có khả năng áp dụng kiến thức về lĩnh vực khoa học dữ liệu và trí tuệ nhân tạo để giải quyết các bài toán phân tích dữ liệu, dự báo', 154);
INSERT INTO `table_chuandaura_chung` VALUES (6, 1, 'Có đạo đức và trách nhiệm đối với nghề nghiệp, cộng đồng', 149);
INSERT INTO `table_chuandaura_chung` VALUES (7, 2, 'Có khả năng giao tiếp và làm việc theo nhóm hiệu quả', 149);
INSERT INTO `table_chuandaura_chung` VALUES (8, 2, 'Có khả năng nghiên cứu phát triển công cụ phân tích dữ liệu và hệ thống thông minh.', 154);
INSERT INTO `table_chuandaura_chung` VALUES (11, 1, 'plo cntt 2019 1', 146);
INSERT INTO `table_chuandaura_chung` VALUES (12, 2, 'plo cntt 2019 2', 146);
INSERT INTO `table_chuandaura_chung` VALUES (13, 3, 'Có tư duy phản biện, sáng tạo, khởi nghiệp', 149);
INSERT INTO `table_chuandaura_chung` VALUES (14, 4, 'Có khả năng sử dụng tiếng Anh tốt trong lĩnh vực CNTT (đạt chuẩn tiếng Anh tương đương TOEIC 500)', 149);
INSERT INTO `table_chuandaura_chung` VALUES (15, 5, 'Có khả năng vận dụng các kiến thức về khoa học tự nhiên, khoa học xã hội, CNTT để giải quyết các vấn đề cơ bản', 149);
INSERT INTO `table_chuandaura_chung` VALUES (16, 6, 'Có khả năng thiết kế, phát triển sản phẩm CNTT cơ bản', 149);
INSERT INTO `table_chuandaura_chung` VALUES (17, 1, 'Có khả năng phân tích, áp dụng các quy trình, kỹ thuật và công cụ phát triển phần mềm', 156);
INSERT INTO `table_chuandaura_chung` VALUES (18, 2, 'Có khả năng lập kế hoạch, tổ chức và quản lý thực hiện dự án CNTT', 156);

SET FOREIGN_KEY_CHECKS = 1;
