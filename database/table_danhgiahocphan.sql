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

 Date: 08/01/2022 22:51:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_danhgiahocphan
-- ----------------------------
DROP TABLE IF EXISTS `table_danhgiahocphan`;
CREATE TABLE `table_danhgiahocphan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `phuongphapdanhgia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `trongsobaidanhgia` int NULL DEFAULT NULL,
  `cdr_hocphan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_baidanhgia` int NULL DEFAULT NULL,
  `id_baidanhgia_parent` int NULL DEFAULT NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 569 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_danhgiahocphan
-- ----------------------------
INSERT INTO `table_danhgiahocphan` VALUES (221, 'Kiểm tra chuyên cần', 100, '6', 5, 1, 114, 146);
INSERT INTO `table_danhgiahocphan` VALUES (222, 'Chấm bài kiểm tra', 100, '6', 6, 2, 114, 146);
INSERT INTO `table_danhgiahocphan` VALUES (223, 'Viết', 100, '1_2_3_4_7', 8, 3, 114, 146);
INSERT INTO `table_danhgiahocphan` VALUES (224, 'Vấn đáp', 50, '1_2_3_4_5_6_7', 9, 4, 114, 146);
INSERT INTO `table_danhgiahocphan` VALUES (225, 'Bài tập nhóm', 50, '1_2_3_4_5_6_7', 10, 4, 114, 146);
INSERT INTO `table_danhgiahocphan` VALUES (226, 'Điểm danh', 100, '5', 5, 1, 47, 146);
INSERT INTO `table_danhgiahocphan` VALUES (227, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 47, 146);
INSERT INTO `table_danhgiahocphan` VALUES (228, 'Tự luận', 100, '1_2_3', 8, 3, 47, 146);
INSERT INTO `table_danhgiahocphan` VALUES (229, 'Bài tập lớn', 100, '1_2_3_4_5', 9, 4, 47, 146);
INSERT INTO `table_danhgiahocphan` VALUES (238, 'Điểm danh', 100, '1', 5, 1, 51, 146);
INSERT INTO `table_danhgiahocphan` VALUES (239, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 51, 146);
INSERT INTO `table_danhgiahocphan` VALUES (240, 'Bài thực hành', 100, '1_2', 8, 3, 51, 146);
INSERT INTO `table_danhgiahocphan` VALUES (241, 'Cuốn báo cáo và trình bày tại lớp', 100, '1_2_3_4_5', 9, 4, 51, 146);
INSERT INTO `table_danhgiahocphan` VALUES (250, 'Trình bày tại lớp/Trắc nghiệm', 30, '1_2_6', 6, 2, 112, 146);
INSERT INTO `table_danhgiahocphan` VALUES (251, 'Cuốn báo cáo và trình bày tại lớp', 70, '1_2_3', 7, 2, 112, 146);
INSERT INTO `table_danhgiahocphan` VALUES (252, 'Tự luận', 100, '1_2_3', 8, 3, 112, 146);
INSERT INTO `table_danhgiahocphan` VALUES (253, 'Bài tập lớn', 100, '1_2_3_4', 9, 4, 112, 146);
INSERT INTO `table_danhgiahocphan` VALUES (278, 'diem danh', 100, '1_2_12', 5, 1, 92, 146);
INSERT INTO `table_danhgiahocphan` VALUES (279, 'bai tap', 100, '1', 6, 2, 92, 146);
INSERT INTO `table_danhgiahocphan` VALUES (280, 'giua ki', 100, '1', 8, 3, 92, 146);
INSERT INTO `table_danhgiahocphan` VALUES (281, 'cuoi ki', 100, '1', 9, 4, 92, 146);
INSERT INTO `table_danhgiahocphan` VALUES (333, 'Điểm danh.', 100, '1_2_4', 5, 1, 95, 146);
INSERT INTO `table_danhgiahocphan` VALUES (334, 'Bai tap', 100, '', 6, 2, 95, 146);
INSERT INTO `table_danhgiahocphan` VALUES (335, 'Trắc nghiệm và tự luận', 100, '1_2_3', 8, 3, 95, 146);
INSERT INTO `table_danhgiahocphan` VALUES (336, 'a', 100, '1', 10, 4, 95, 146);
INSERT INTO `table_danhgiahocphan` VALUES (343, 'a', 100, '1', 5, 1, 4, 146);
INSERT INTO `table_danhgiahocphan` VALUES (344, 'b', 100, '1', 6, 2, 4, 146);
INSERT INTO `table_danhgiahocphan` VALUES (345, 'c', 100, '1', 8, 3, 4, 146);
INSERT INTO `table_danhgiahocphan` VALUES (346, 'd', 100, '1', 9, 4, 4, 146);
INSERT INTO `table_danhgiahocphan` VALUES (353, 'Dựa vào % vắng học trên hệ thống điểm danh', 100, '1_2_3_4_5', 5, 1, 85, 146);
INSERT INTO `table_danhgiahocphan` VALUES (354, 'Thực hành', 100, '1_2_3_4_5_6_7_8', 6, 2, 85, 146);
INSERT INTO `table_danhgiahocphan` VALUES (355, 'Trắc nghiệm', 100, '1_2_3_4_5', 8, 3, 85, 146);
INSERT INTO `table_danhgiahocphan` VALUES (356, 'Báo cáo đồ án môn học', 100, '1_2_3_4_5_6_7_8', 9, 4, 85, 146);
INSERT INTO `table_danhgiahocphan` VALUES (359, 'a', 100, '1', 5, 1, 52, 146);
INSERT INTO `table_danhgiahocphan` VALUES (360, 'n', 100, '1', 6, 2, 52, 146);
INSERT INTO `table_danhgiahocphan` VALUES (369, 'a', 100, '1', 5, 1, 21, 146);
INSERT INTO `table_danhgiahocphan` VALUES (370, 'b', 100, '1', 6, 2, 21, 146);
INSERT INTO `table_danhgiahocphan` VALUES (371, 'c', 100, '1', 8, 3, 21, 146);
INSERT INTO `table_danhgiahocphan` VALUES (372, 'd', 100, '1_6', 9, 4, 21, 146);
INSERT INTO `table_danhgiahocphan` VALUES (399, 'Điểm danh', 100, '1_2', 5, 1, 111, 146);
INSERT INTO `table_danhgiahocphan` VALUES (400, 'Trình bày tại lớp/Trắc nghiệm', 30, '1', 6, 2, 111, 146);
INSERT INTO `table_danhgiahocphan` VALUES (401, 'Tự luận', 100, '1', 8, 3, 111, 146);
INSERT INTO `table_danhgiahocphan` VALUES (402, 'Tự luận', 50, '1_2', 9, 4, 111, 146);
INSERT INTO `table_danhgiahocphan` VALUES (407, 'a', 100, '1', 5, 1, 15, 146);
INSERT INTO `table_danhgiahocphan` VALUES (408, 'b', 100, '1', 6, 2, 15, 146);
INSERT INTO `table_danhgiahocphan` VALUES (409, 'c', 100, '1', 8, 3, 15, 146);
INSERT INTO `table_danhgiahocphan` VALUES (410, 'd', 100, '1_2_3_4', 9, 4, 15, 146);
INSERT INTO `table_danhgiahocphan` VALUES (415, 'Điểm danh', 100, '5', 5, 1, 47, 147);
INSERT INTO `table_danhgiahocphan` VALUES (416, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 47, 147);
INSERT INTO `table_danhgiahocphan` VALUES (417, 'Tự luận', 100, '1_2_3', 8, 3, 47, 147);
INSERT INTO `table_danhgiahocphan` VALUES (418, 'Bài tập lớn', 100, '1_2_3_4_5', 9, 4, 47, 147);
INSERT INTO `table_danhgiahocphan` VALUES (419, 'Điểm danh 1', 100, '1_5', 5, 1, 54, 146);
INSERT INTO `table_danhgiahocphan` VALUES (420, 'Thực hành 1', 100, '1_5', 6, 2, 54, 146);
INSERT INTO `table_danhgiahocphan` VALUES (421, 'Thực hành 1', 100, '1_5', 8, 3, 54, 146);
INSERT INTO `table_danhgiahocphan` VALUES (422, 'Đồ án 1', 100, '1_5', 9, 4, 54, 146);
INSERT INTO `table_danhgiahocphan` VALUES (431, 'Chuyên cần', 100, '1', 5, 1, 68, 146);
INSERT INTO `table_danhgiahocphan` VALUES (432, 'Bài tập ngắn trên lớp', 50, '1', 6, 2, 68, 146);
INSERT INTO `table_danhgiahocphan` VALUES (433, 'Bài tập về nhà cá nhân/nhóm', 50, '1', 7, 2, 68, 146);
INSERT INTO `table_danhgiahocphan` VALUES (434, 'Thi trên máy', 100, '', 8, 3, 68, 146);
INSERT INTO `table_danhgiahocphan` VALUES (435, 'Thi vấn đáp trên đồ án', 100, '', 9, 4, 68, 146);
INSERT INTO `table_danhgiahocphan` VALUES (436, 'Giảng viên điểm danh người học tham gia học trên lớp.', 100, '5', 5, 1, 39, 146);
INSERT INTO `table_danhgiahocphan` VALUES (437, 'Giảng viên chấm bài tập giao về nhà (nộp trên hệ thống elearning).', 100, '1_2_3_4_5', 6, 2, 39, 146);
INSERT INTO `table_danhgiahocphan` VALUES (438, 'Giảng viên tổ chức cho người học làm bài kiểm tra (hình thức tự luận/vấn đáp/trắc nhiệm) tại lớp và chấm điểm.', 100, '1_4_5', 8, 3, 39, 146);
INSERT INTO `table_danhgiahocphan` VALUES (439, 'Nhà trường tổ chức cho người học thi chung (hình thức tự luận/trắc nghiệm);\r\nKhoa tổ chức chấm thi chung', 100, '2_3_4_5', 9, 4, 39, 146);
INSERT INTO `table_danhgiahocphan` VALUES (440, 'Đi học đầy đủ. Không được vắng không quá 20% tiết học.', 100, '3_4', 5, 1, 6, 146);
INSERT INTO `table_danhgiahocphan` VALUES (441, 'Làm đúng và nộp bài đầy đủ bài tập', 50, '1_2_3_4_5', 6, 2, 6, 146);
INSERT INTO `table_danhgiahocphan` VALUES (442, 'Làm đúng và nộp bài đầy đủ bài tập', 50, '1_2_3_4_5', 7, 2, 6, 146);
INSERT INTO `table_danhgiahocphan` VALUES (443, 'Đáp ứng yêu cầu của đáp án', 100, '1_2_3_4_5', 8, 3, 6, 146);
INSERT INTO `table_danhgiahocphan` VALUES (444, 'Đáp ứng yêu cầu của đáp án', 100, '3_4', 9, 4, 6, 146);
INSERT INTO `table_danhgiahocphan` VALUES (445, 'chuyen can', 100, '', 5, 1, 13, 146);
INSERT INTO `table_danhgiahocphan` VALUES (446, 'GV xác định các tình huống làm việc trong thực tiễn, giao bài tập lớn (dự án) cho các nhóm SV từ đầu HP', 100, '1_2', 6, 2, 13, 146);
INSERT INTO `table_danhgiahocphan` VALUES (447, 'Thực hành', 100, '1_2_3_4', 8, 3, 13, 146);
INSERT INTO `table_danhgiahocphan` VALUES (448, 'Thuyết trình', 100, '1_2_3_4', 9, 4, 13, 146);
INSERT INTO `table_danhgiahocphan` VALUES (449, 'Điểm danh', 100, '4', 5, 1, 9, 146);
INSERT INTO `table_danhgiahocphan` VALUES (450, 'Bài tập thực hành.', 100, '1_2_3', 6, 2, 9, 146);
INSERT INTO `table_danhgiahocphan` VALUES (451, 'Thi trên máy, GV dạy tự tổ chức.', 100, '1_2_3', 8, 3, 9, 146);
INSERT INTO `table_danhgiahocphan` VALUES (452, 'Thi vấn đáp trên bài tập lớn.', 100, '1_2_3', 9, 4, 9, 146);
INSERT INTO `table_danhgiahocphan` VALUES (453, 'Chuyên cần', 100, '1', 5, 1, 64, 146);
INSERT INTO `table_danhgiahocphan` VALUES (454, 'làm Bài tập', 100, '1_2_3_4_5', 6, 2, 64, 146);
INSERT INTO `table_danhgiahocphan` VALUES (455, 'Kiểm tra giữa kỳ', 100, '1_2_3_5', 8, 3, 64, 146);
INSERT INTO `table_danhgiahocphan` VALUES (456, 'Thi cuối kỳ', 100, '2_3_4_5', 9, 4, 64, 146);
INSERT INTO `table_danhgiahocphan` VALUES (457, 'Đánh giá chuyên cần', 100, '', 5, 1, 69, 146);
INSERT INTO `table_danhgiahocphan` VALUES (458, 'Đánh giá Bài tập (Bài tập cá nhân, trên lớp)', 100, '', 6, 2, 69, 146);
INSERT INTO `table_danhgiahocphan` VALUES (459, 'Đánh giá bài thi giữa kỳ (Trắc nghiệm hoặc tự luận)', 100, '', 8, 3, 69, 146);
INSERT INTO `table_danhgiahocphan` VALUES (460, 'Chấm báo cáo và vấn đáp', 100, '', 9, 4, 69, 146);
INSERT INTO `table_danhgiahocphan` VALUES (461, 'Điểm danh', 100, '1', 5, 1, 99, 146);
INSERT INTO `table_danhgiahocphan` VALUES (462, 'Bài tập lớn (bài tập thực hành)', 100, '1_2_3_4', 6, 2, 99, 146);
INSERT INTO `table_danhgiahocphan` VALUES (463, 'Thi trên máy(thực hành)', 100, '1_2_3_4', 8, 3, 99, 146);
INSERT INTO `table_danhgiahocphan` VALUES (464, 'Thi vấn đáp trên đồ án', 100, '1_2_3_4', 9, 4, 99, 146);
INSERT INTO `table_danhgiahocphan` VALUES (465, 'Có ý thức tham gia học tập đầy đủ, hoàn thành đúng hạn các yêu cầu của giảng viên và tích cực phát biểu ý kiến', 100, '4', 5, 1, 36, 146);
INSERT INTO `table_danhgiahocphan` VALUES (466, 'Thành phần đánh giá: GV đánh giá quá trình (2 đ), chấm báo cáo theo nhóm (3 đ), phần trình bày của từng SV (3 đ), câu hỏi (2 đ).', 100, '1_2_3_4', 6, 2, 36, 146);
INSERT INTO `table_danhgiahocphan` VALUES (467, 'GV cho 1 bài toán  yêu cầu SV xây dựng BĐ ca sử dụng, BĐ lớp, thời gian 90 phút', 100, '1_2', 8, 3, 36, 146);
INSERT INTO `table_danhgiahocphan` VALUES (468, '40 câu bằng tiếng Anh, thời gian 50 phút', 100, '1_2', 9, 4, 36, 146);
INSERT INTO `table_danhgiahocphan` VALUES (469, 'Điểm danh', 100, '6', 5, 1, 67, 146);
INSERT INTO `table_danhgiahocphan` VALUES (470, 'Kết quả các bài thực hành', 50, '1_2_3_4', 6, 2, 67, 146);
INSERT INTO `table_danhgiahocphan` VALUES (471, 'Sản phẩm phần mềm và thuyết trình', 50, '1_5', 7, 2, 67, 146);
INSERT INTO `table_danhgiahocphan` VALUES (472, 'Tự luận/vấn đáp', 100, '', 8, 3, 67, 146);
INSERT INTO `table_danhgiahocphan` VALUES (473, 'Tự luận', 100, '', 9, 4, 67, 146);
INSERT INTO `table_danhgiahocphan` VALUES (474, 'Điểm danh', 100, '6', 5, 1, 100, 146);
INSERT INTO `table_danhgiahocphan` VALUES (475, 'Kết quả các bài thực hành', 100, '1_2_3_4', 6, 2, 100, 146);
INSERT INTO `table_danhgiahocphan` VALUES (476, 'Kết quả \r\nbài tự luận', 100, '2_3_4_5', 8, 3, 100, 146);
INSERT INTO `table_danhgiahocphan` VALUES (477, 'Sản phẩm phần mềm và thuyết trình', 100, '2_3_4_5', 9, 4, 100, 146);
INSERT INTO `table_danhgiahocphan` VALUES (478, 'Điểm danh', 100, '6', 5, 1, 71, 146);
INSERT INTO `table_danhgiahocphan` VALUES (479, 'Sản phẩm phần mềm và thuyết trình', 100, '2_5', 6, 2, 71, 146);
INSERT INTO `table_danhgiahocphan` VALUES (480, 'Kết quả bài thực hành', 100, '2_3_4_5', 8, 3, 71, 146);
INSERT INTO `table_danhgiahocphan` VALUES (481, 'Kết quả bài tự luận', 100, '2_3_4_5', 9, 4, 71, 146);
INSERT INTO `table_danhgiahocphan` VALUES (482, 'Điểm danh sinh viên', 100, '5', 5, 1, 3, 146);
INSERT INTO `table_danhgiahocphan` VALUES (483, 'Giảng viên chấm bài tập được giao về nhà cho sinh viên (nộp trên hệ elearning). Giảng viên chọn 05 bài để chấm, mỗi bài 2 điểm.', 100, '1_2_3_4_5', 6, 2, 3, 146);
INSERT INTO `table_danhgiahocphan` VALUES (484, 'Giảng viên tổ chức cho sinh viên kiểm tra thực hành tại lớp. Đề kiểm tra bao gồm các phần nhập xuất, câu lệnh điều kiện, câu lệnh lặp.', 100, '1_2_3_4_5', 8, 3, 3, 146);
INSERT INTO `table_danhgiahocphan` VALUES (485, 'Sinh viên thi lập trình trên máy tính, tổ chức thi chung theo kế hoạch của nhà trường, thực hiện chấm bài thi tự động.', 100, '1_2_3_4_5', 9, 4, 3, 146);
INSERT INTO `table_danhgiahocphan` VALUES (490, 'Điểm danh', 100, '1_2_3_4_5', 5, 1, 91, 146);
INSERT INTO `table_danhgiahocphan` VALUES (491, 'Bài thực hành', 100, '1_2_5', 6, 2, 91, 146);
INSERT INTO `table_danhgiahocphan` VALUES (492, 'Xây dựng ứng dụng', 100, '1_2_3_4_5', 8, 3, 91, 146);
INSERT INTO `table_danhgiahocphan` VALUES (493, 'Tự luận', 100, '1_2_3_4_5', 9, 4, 91, 146);
INSERT INTO `table_danhgiahocphan` VALUES (494, 'Điểm danh', 100, '', 5, 1, 106, 146);
INSERT INTO `table_danhgiahocphan` VALUES (495, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 106, 146);
INSERT INTO `table_danhgiahocphan` VALUES (496, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2_3', 9, 4, 106, 146);
INSERT INTO `table_danhgiahocphan` VALUES (497, 'Điểm danh', 100, '', 5, 1, 7, 146);
INSERT INTO `table_danhgiahocphan` VALUES (498, 'Tự luận', 100, '1_3', 8, 3, 7, 146);
INSERT INTO `table_danhgiahocphan` VALUES (499, 'Tự luận', 100, '1_2_3', 9, 4, 7, 146);
INSERT INTO `table_danhgiahocphan` VALUES (500, 'Điểm danh, kiểm tra bài cũ, bài tập trên lớp', 100, '', 5, 1, 55, 146);
INSERT INTO `table_danhgiahocphan` VALUES (501, 'Kiểm tra tự luận 50 phút trên lớp', 100, '1_2_3_4', 8, 3, 55, 146);
INSERT INTO `table_danhgiahocphan` VALUES (502, 'Kiểm tra tự luận 60 phút trong phòng thi.', 100, '1_2_3_4', 9, 4, 55, 146);
INSERT INTO `table_danhgiahocphan` VALUES (503, 'Điểm danh', 100, '', 5, 1, 105, 146);
INSERT INTO `table_danhgiahocphan` VALUES (504, 'Nộp và chấm bài trực tiếp hoặc qua hệ thống Elearning', 100, '1_2_3', 8, 3, 105, 146);
INSERT INTO `table_danhgiahocphan` VALUES (505, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 105, 146);
INSERT INTO `table_danhgiahocphan` VALUES (506, 'Điểm danh', 100, '', 5, 1, 79, 146);
INSERT INTO `table_danhgiahocphan` VALUES (507, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 79, 146);
INSERT INTO `table_danhgiahocphan` VALUES (508, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 79, 146);
INSERT INTO `table_danhgiahocphan` VALUES (509, 'Điểm danh', 100, '', 5, 1, 1, 146);
INSERT INTO `table_danhgiahocphan` VALUES (510, 'Bài tập, thuyết trình nhóm tại lớp', 100, '1_2_3_4_5', 6, 2, 1, 146);
INSERT INTO `table_danhgiahocphan` VALUES (511, 'Bài thi tự luận hoặc trắc nghiệm trên hệ thống Elearning', 100, '1_2_3_6', 8, 3, 1, 146);
INSERT INTO `table_danhgiahocphan` VALUES (512, 'Bài thi tự luận cuối kỳ', 100, '1_2_3_4_5_6', 9, 4, 1, 146);
INSERT INTO `table_danhgiahocphan` VALUES (513, 'Điểm danh', 100, '', 5, 1, 81, 146);
INSERT INTO `table_danhgiahocphan` VALUES (514, 'Bài tập', 100, '', 6, 2, 81, 146);
INSERT INTO `table_danhgiahocphan` VALUES (515, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 81, 146);
INSERT INTO `table_danhgiahocphan` VALUES (516, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 81, 146);
INSERT INTO `table_danhgiahocphan` VALUES (517, 'Chuyên cần', 100, '', 5, 1, 12, 146);
INSERT INTO `table_danhgiahocphan` VALUES (518, 'Bài kiểm tra giữa kỳ (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp) hoặc Nói)', 100, '1_2_3_4', 8, 3, 12, 146);
INSERT INTO `table_danhgiahocphan` VALUES (519, 'Bài thi cuối kỳ  (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp))', 100, '1_2_3_4', 9, 4, 12, 146);
INSERT INTO `table_danhgiahocphan` VALUES (525, 'Chuyên cần', 100, '1', 5, 1, 31, 146);
INSERT INTO `table_danhgiahocphan` VALUES (526, 'Bài tập lớn', 100, '1_2_3', 6, 2, 31, 146);
INSERT INTO `table_danhgiahocphan` VALUES (527, 'Thi trên máy', 100, '1_2_3', 8, 3, 31, 146);
INSERT INTO `table_danhgiahocphan` VALUES (528, 'Thi vấn đáp trên đồ án', 100, '1_2_3', 9, 4, 31, 146);
INSERT INTO `table_danhgiahocphan` VALUES (532, 'Chuyên cần', 100, '', 5, 1, 12, 156);
INSERT INTO `table_danhgiahocphan` VALUES (533, 'Bài kiểm tra giữa kỳ (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp) hoặc Nói)', 100, '1_2_3_4', 8, 3, 12, 156);
INSERT INTO `table_danhgiahocphan` VALUES (534, 'Bài thi cuối kỳ  (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp))', 100, '1_2_3_4', 9, 4, 12, 156);
INSERT INTO `table_danhgiahocphan` VALUES (539, 'ab', 100, '1', 5, 1, 12, 142);
INSERT INTO `table_danhgiahocphan` VALUES (540, 'bc', 100, '1', 6, 2, 12, 142);
INSERT INTO `table_danhgiahocphan` VALUES (541, 'cd', 100, '2', 8, 3, 12, 142);
INSERT INTO `table_danhgiahocphan` VALUES (542, 'de', 100, '1', 9, 4, 12, 142);
INSERT INTO `table_danhgiahocphan` VALUES (553, 'a', 100, '1', 5, 1, 3, 142);
INSERT INTO `table_danhgiahocphan` VALUES (554, 'b', 100, '1_2', 6, 2, 3, 142);
INSERT INTO `table_danhgiahocphan` VALUES (555, 'c', 100, '1_2', 8, 3, 3, 142);
INSERT INTO `table_danhgiahocphan` VALUES (556, 'de', 100, '1_2', 9, 4, 3, 142);
INSERT INTO `table_danhgiahocphan` VALUES (561, 'chuyen can', 100, '1', 5, 1, 13, 142);
INSERT INTO `table_danhgiahocphan` VALUES (562, 'GV xác định các tình huống làm việc trong thực tiễn, giao bài tập lớn (dự án) cho các nhóm SV từ đầu HP', 100, '1_2', 6, 2, 13, 142);
INSERT INTO `table_danhgiahocphan` VALUES (563, 'Thực hành', 100, '1_2_3', 8, 3, 13, 142);
INSERT INTO `table_danhgiahocphan` VALUES (564, 'Thuyết trình', 100, '1_2_3', 9, 4, 13, 142);
INSERT INTO `table_danhgiahocphan` VALUES (565, 'Điểm danh', 100, '4', 5, 1, 15, 156);
INSERT INTO `table_danhgiahocphan` VALUES (566, 'Chấm điểm bài TH', 100, '1_2_3_4', 6, 2, 15, 156);
INSERT INTO `table_danhgiahocphan` VALUES (567, 'Bài thi tự luận', 100, '1_3', 8, 3, 15, 156);
INSERT INTO `table_danhgiahocphan` VALUES (568, 'Bài thi trắc nghiệm', 100, '1_3', 9, 4, 15, 156);

SET FOREIGN_KEY_CHECKS = 1;
