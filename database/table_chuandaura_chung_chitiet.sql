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

 Date: 07/12/2021 22:07:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_chung_chitiet
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_chung_chitiet`;
CREATE TABLE `table_chuandaura_chung_chitiet`  (
  `id_cdr_chitiet` int NOT NULL AUTO_INCREMENT,
  `noidung_cdr_chitiet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_cdr_chung` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cdr_chitiet`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_chuandaura_chung_chitiet
-- ----------------------------
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (1, 'Trung thực đối với công việc.', 6);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (2, 'Có trách nhiệm đối với công việc và cộng đồng.', 6);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (10, 'Tuân thủ các quy định, quy trình kỹ thuật và quy tắc an toàn trong khi thực hiện công việc.', 6);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (11, 'Trình bày, thuyết trình các vấn đề  hiệu quả', 7);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (12, 'Soạn thảo văn bản, báo cáo có cấu trúc hợp lý và đúng quy định.', 7);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (13, 'Làm việc nhóm hiệu quả', 7);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (14, 'Nhận xét, đánh giá được báo cáo khoa học', 13);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (15, 'Đề xuất được giải pháp công nghệ thông tin ứng với thực tiễn', 13);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (16, 'Xây dựng được đề án khởi nghiệp', 13);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (17, 'Viết và trình bày được bằng tiếng Anh trong lĩnh vực CNTT', 14);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (18, 'Đạt chuẩn tiếng Anh tương đương TOEIC 500', 14);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (19, 'Vận dụng được các kiến thức về KHTN, CNTT để giải quyết các bài toán ứng dụng CNTT', 15);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (20, 'Vận dụng được các kiến thức về KHXH vào trong công việc thực tế', 15);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (21, 'Sử dụng thành thạo một số phương pháp, ngôn ngữ lập trình phổ biến', 16);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (22, 'Phân tích và thiết kế hệ thống hoàn chỉnh cho sản phẩm phần mềm vừa và nhỏ', 16);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (23, 'Xây dựng và quản trị được  một CSDL hoàn chỉnh cho một phần mềm ứng dụng', 16);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (24, 'Áp dụng được các quy trình, tiêu chuẩn trong quy trình phát triển phần mềm', 17);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (25, 'Thiết kế được kiến trúc các hệ thống phần mềm', 17);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (26, 'Lựa chọn được công nghệ, công cụ, thuật toán phù hợp', 17);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (27, 'Lập được kế hoạch dự án CNTT', 18);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (28, 'Tổ chức, quản lý được các dự án CNTT', 18);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (29, 'Tổng kết, đánh giá được các dự án CNTT', 18);
INSERT INTO `table_chuandaura_chung_chitiet` VALUES (32, 'PI 1', 8);

SET FOREIGN_KEY_CHECKS = 1;
