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

 Date: 07/04/2022 14:13:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nghiencuukhoahoc_hoatdong
-- ----------------------------
DROP TABLE IF EXISTS `table_nghiencuukhoahoc_hoatdong`;
CREATE TABLE `table_nghiencuukhoahoc_hoatdong`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenhoatdongnghiencuu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `loai_hoatdong` int NULL DEFAULT NULL,
  `namhoc` int NULL DEFAULT NULL,
  `diemcongtrinh` float NULL DEFAULT NULL,
  `giokhoahoc` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_nghiencuukhoahoc_hoatdong
-- ----------------------------
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (1, 'Tạp chí thuộc danh mục SCI và địa chỉ tác giả thể hiện tên đơn vị thuộc ĐHĐN', 1, 5, 2, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (2, 'Tạp chí thuộc danh mục SCI', 1, 5, 2, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (3, 'Tạp chí thuộc danh mục ISI/Scopus và địa chỉ tác giả thể hiện tên đơn vị thuộc ĐHĐN', 1, 5, 1.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (4, 'Tạp chí thuộc danh mục ISI/Scopus ', 1, 5, 1.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (5, 'Tạp chí quốc tế, Kỷ yếu hội nghị/hội thảo quốc tế/quốc gia có chỉ số ISSN/ISBN', 1, 5, 1, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (6, 'Tạp chí, kỷ yếu thuộc danh mục HĐ chức danh GS nhà nước', 1, 5, 0, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (7, 'Tạp chí, kỷ yếu trong nước (cấp trường trở lên) có chỉ số ISSN', 1, 5, 0.25, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (8, 'Tạp chí khoa học khác (không có chỉ số ISSN)', 1, 5, 0.125, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (9, 'Sách chuyên khảo', 2, 5, 2, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (10, 'Giáo trình', 2, 5, 1.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (11, 'Sách tham khảo/hướng dẫn', 2, 5, 1, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (12, 'Sách tái bản có chỉnh sửa', 2, 5, 0.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (13, 'Chủ nhiệm chương trình cấp Nhà nước', 3, 5, 1.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (14, 'Phó chủ nhiệm/thư ký chương trình cấp NN', 3, 5, 0.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (15, 'Chủ nhiệm chương trình cấp bộ', 3, 5, 1, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (16, 'Phó chủ nhiệm/thư ký chương trình cấp bộ', 3, 5, 0.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (17, 'Chủ nhiệm Đề tài cấp Nhà nước', 3, 5, 1, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (18, 'Chủ nhiệm Đề tài cấp Bộ, tỉnh/thành phố trực thuộc trung ương', 3, 5, 0.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (19, 'Chủ nhiệm Đề tài cấp ĐHĐN', 3, 5, 0.5, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (20, 'Chủ nhiệm Đề tài cấp cơ sở (Trường)', 3, 5, 0.25, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (21, 'Bằng phát minh, sáng chế', 3, 5, 1, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (22, 'Hướng dẫn chính NCS', 3, 5, 0.667, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (23, 'Hướng dẫn phụ NCS', 3, 5, 0.333, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (24, 'Sáng kiến  ', 3, 5, 0, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (25, 'Thành tích khác', 3, 5, 0, 600);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (26, 'abcd', 3, 5, 123, 234);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (27, 'b', 2, 4, 2, 2);
INSERT INTO `table_nghiencuukhoahoc_hoatdong` VALUES (28, 'c', 2, 5, 3, 3);

SET FOREIGN_KEY_CHECKS = 1;
