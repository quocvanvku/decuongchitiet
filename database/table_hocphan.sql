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

 Date: 14/11/2021 22:12:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_hocphan
-- ----------------------------
DROP TABLE IF EXISTS `table_hocphan`;
CREATE TABLE `table_hocphan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mahocphan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhocphan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soTC` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 316 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_hocphan
-- ----------------------------
INSERT INTO `table_hocphan` VALUES (1, 'PLDC', 'Pháp luật đại cương', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (2, 'NMKD', 'Nhập môn kinh doanh', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (3, 'THDC', 'Tin học đại cương', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (4, 'QTH', 'Quản trị học', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (5, 'DA1', 'Đề án 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (6, 'CSDL', 'Cơ sở dữ liệu', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (7, 'DS', 'Đại số', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (8, 'GDTC1', 'Giáo dục thể chất 1', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (9, 'JAVACB', 'Lập trình hướng đối tượng và Java cơ bản', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (10, 'NMN&KNM', 'Nhập môn ngành và kỹ năng mềm', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (11, 'TADB', 'Tiếng Anh dự bị', 5, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (12, 'TA1', 'Tiếng Anh 1', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (13, 'TACN', 'Tiếng Anh chuyên ngành 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (14, 'THDCKT', 'Tin học đại cương (BA)', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (15, 'CTDL & GT', 'Cấu trúc dữ liệu và giải thuật', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (16, 'WEB', 'Công nghệ Web', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (17, 'DACS1', 'Đồ án cơ sở 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (18, 'GDTC2', 'Giáo dục thể chất 2', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (19, 'KTMT', 'Kiến trúc máy tính', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (20, 'JAVANC', 'Lập trình Java nâng cao', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (21, 'NLHDH', 'Nguyên lý hệ điều hành', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (22, 'TA2', 'Tiếng Anh 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (23, 'TACN2', 'Tiếng Anh chuyên ngành 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (24, 'VL', 'Vật lý', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (25, 'GTTKD', 'Giao tiếp kinh doanh', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (26, 'KTH', 'Kinh tế học', 4, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (27, 'LKD', 'Luật kinh doanh', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (28, 'MARCB', 'Marketing căn bản', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (29, 'DA2', 'Đề án 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (30, 'CD1', 'Chuyên đề 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (31, 'WEBNC', 'Công nghệ web nâng cao', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (32, 'DACS2', 'Đồ án cơ sở 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (33, 'GDTC3', 'Giáo dục thể chất 3', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (34, 'HTS', 'Hệ thống số', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (35, 'MMT', 'Mạng máy tính', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (36, 'PT&TKHT', 'Phân tích và thiết kế hệ thống', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (37, 'TA3', 'Tiếng Anh 3', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (38, 'TACN&TH1', 'Tiếng Anh chuyên ngành & thực hành 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (39, 'TRR', 'Toán rời rạc', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (40, 'DA3', 'Đề án 3', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (41, 'HVTC', 'Hành vi tổ chức', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (42, 'KTDHUD', 'Kỹ thuật đồ họa ứng dụng', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (43, 'TACN3', 'Tiếng Anh chuyên ngành 3', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (44, 'NMTMDT', 'Nhập môn thương mại điện tử', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (45, 'QTNNL', 'Quản trị nguồn nhân lực', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (46, 'CNPM', 'Công nghệ phần mềm', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (47, 'CĐ2', 'Chuyên đề 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (48, 'ĐACS3', 'Đồ án cơ sở 3', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (49, 'GT', 'Giải tích', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (50, 'GDTC4', 'Giáo dục thể chất 4', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (51, 'LTDĐ', 'Lập trình di động', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (52, 'TACN&TH', 'Tiếng Anh chuyên ngành & thực hành 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (53, 'TTDN', 'Thực tập doanh nghiệp', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (54, 'VĐK', 'Vi điều khiển', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (55, 'XSTK', 'Xác suất thống kê', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (56, 'ĐĐTKD', 'Đạo đức trong kinh doanh', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (57, 'ĐA4', 'Đề án 4', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (58, 'MĐT', 'Marketing điện tử ', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (59, 'QTBH', 'Quản trị bán hàng ', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (60, 'QCXTBH', 'Quảng cáo xúc tiến bán hàng (MCI) ', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (61, 'TACN4', 'Tiếng Anh chuyên ngành 4 ', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (62, 'TKWS', 'Thiết kế website KT', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (63, 'GDQP', 'Giáo dục quốc phòng', 0, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (64, 'ANNHT', 'Automat và Ngôn ngữ hình thức', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (65, 'CĐ3', 'Chuyên đề 3 (IT)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (66, 'ĐACS4', 'Đồ án cơ sở 4 IT', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (67, 'ĐHMT', 'Đồ họa máy tính', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (68, 'LTM', 'Lập trình mạng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (69, 'QLDA', 'Quản lý dự án', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (70, 'QTM', 'Quản trị mạng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (71, 'TTNT', 'Trí tuệ nhân tạo', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (72, 'ĐA5', 'Đề án 5', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (73, 'HTTTQL', 'Hệ thống thông tin quản lý', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (74, 'KTDN', 'Kế toán doanh nghiệp', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (75, 'QTCCU', 'Quản trị chuỗi cung ứng', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (76, 'QTTC', 'Quản trị tài chính', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (77, 'TUDTKT', 'Toán ứng dụng trong kinh tế', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (79, 'LSĐCSVN', 'Lịch sử Đảng Cộng sản Việt Nam', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (80, 'TTĐT', 'Thanh toán điện tử', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (81, 'MACLENIN', 'Triết học Mac - Lênin', 3, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (82, 'PPNC', 'Phương pháp nghiên cứu khoa học', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (83, 'CLKDĐT', 'Chiến lược kinh doanh điện tử', 3, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (84, 'ĐA6', 'Đề án 6', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (85, 'BM&ATHTTT', 'Bảo mật và An toàn hệ thống thông tin', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (86, 'CĐ4', 'Chuyên đề 4', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (87, 'ĐACS5', 'Đồ án cơ sở 5', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (88, 'KTPM', 'Kiểm thử phần mềm', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (89, 'KTTSL', 'Kỹ thuật truyền số liệu', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (90, 'TBD', 'Trình biên dịch', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (91, 'XLA', 'Xử lý ảnh', 2, 0, NULL, '2019-12-20 09:23:59', '2019-12-20 09:23:59');
INSERT INTO `table_hocphan` VALUES (92, 'XLTHS', 'Xử lý tín hiệu số', 2, 0, NULL, '2019-12-20 09:24:00', '2019-12-20 09:24:00');
INSERT INTO `table_hocphan` VALUES (93, 'TKKD', 'Thống kê kinh doanh', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (94, 'KTVM', 'Kinh tế vi mô', 2, 0, NULL, '2019-12-26 11:17:43', '2019-12-26 11:17:43');
INSERT INTO `table_hocphan` VALUES (95, 'KTVXM', 'Kinh tế vĩ mô', 2, 0, NULL, '2019-12-26 11:21:57', '2019-12-26 11:21:57');
INSERT INTO `table_hocphan` VALUES (96, 'TTHCM', 'Tư tưởng Hồ Chí Minh', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (97, 'CĐ5', 'Chuyên đề 5 (IT)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (98, 'ĐACN1_IT', 'Đồ án chuyên ngành 1 (IT)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (99, 'TTNM', 'Tương tác người - máy', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (100, 'TGMT', 'Thị giác máy tính', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (101, 'HTN', 'Hệ thống nhúng', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (102, 'ĐA7', 'Đề án 7', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (103, 'QTQTĐM', 'Quản trị quá trình đổi mới sáng tạo', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (104, 'QTTNTMĐT', 'Quản trị tác nghiệp thương mại điện tử', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (105, 'KTCT', 'Kinh tế chính trị Mác - Lênin', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (106, 'CNXHKH', 'Chủ nghĩa xã hội khoa học', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (107, 'HVNTD', 'Hành vi người tiêu dùng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (108, 'ĐHMT', 'Đồ hoạ máy tính', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (109, 'TACN1_BA', 'Tiếng Anh chuyên ngành 1 (BA)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (110, 'CĐ6', 'Chuyên đề 6', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (111, 'HTDĐ_CB', 'Hệ thống di động và cảm biến', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (112, 'LTDKTĐ', 'Lý thuyết điều khiển tự động', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (114, 'HCSDLPT', 'Hệ cơ sở dữ liệu phân tán', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (115, 'TMĐT', 'Thương mại điện tử', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (116, 'ĐACN2', 'Đồ án chuyên ngành 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (118, 'KLTN_BA', 'Khóa luận tốt nghiệp (BA)', 10, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (119, '', 'Đồ họa 2D (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (120, '', 'Lập trình hướng đối tượng (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (121, '', 'Lập trình trực quan (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (122, '', 'Lập trình web (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (123, '', 'Pháp luật (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (124, '', 'Tiếng Anh chuyên ngành (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (125, '', 'Lập trình vi điều khiển (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (126, '', 'Thiết kế đồ họa và xử lý ảnh (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (127, '', 'Lập trình Mobile Application (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (128, '', 'Dự án Web Back-End (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (129, '', 'Chính trị (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (130, '', 'Lập trình Java (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (131, '', 'Quảng cáo (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (132, '', 'Định giá sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (133, '', 'Nghiệp vụ bán sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (134, '', 'Nghiệp vụ marketing du lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (135, '', 'Quản lý chất lượng dịch vụ (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (136, '', 'Truyền thông marketing tích hợp (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (137, '', 'Nghiệp vụ bán hàng (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (138, '', 'Khởi tạo doanh nghiệp (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (139, '', 'Marketing dịch vụ (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (140, '', 'Quản trị thương hiệu (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (141, '', 'Hành vi khách hàng (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (142, '', 'Thực hành biên phiên dịch 1 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (143, '', 'Thực hành biên phiên dịch 2 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (144, '', 'Tiếng Anh lữ hành (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (145, '', 'Đất nước và văn hoá các nước nói tiếng Anh (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (146, '', 'Tuyến điểm du lịch Viêt Nam (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (147, '', 'Thiết kế bộ lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (148, '', 'Thiết kế minh họa (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (149, '', 'Thiết kế Poster quảng cáo (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (150, '', 'Đồ họa động (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (151, '', 'Lịch sử design (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (152, '', 'Lịch sử Mỹ thuật Việt Nam và thế giới (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (153, '', 'Viết 4 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (154, '', 'Nghe 4 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (155, '', 'Nói 4 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (156, '', 'Đọc 4 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (157, '', 'Tiếng Hàn du lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (158, '', 'Tiếng Hàn văn phòng (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (159, '', 'Thiết kế ấn phẩm báo chí (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (160, '', 'Thiết kế hoạt hình 2 chiều (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (161, '', 'Thiết kế nhân vật 3 chiều (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (162, '', 'Thiết kế hình hiệu (TV intro) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (163, '', 'Truyền thông đại chúng (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (164, '', 'Khóa luận tốt nghiệp (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (165, '', 'Công nghệ phần mềm (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (166, '', 'Sinh hoạt lớp', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (167, '', 'Mượn phòng hoc', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (168, 'TACN_KT', 'Tiếng Anh chuyên ngành 2 (BA)', 2, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (169, 'TTTN_IT', 'Thực tập tốt nghiệp IT', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (170, 'ĐATN_IT', 'Đồ án tốt nghiệp IT', 10, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (171, 'ĐATN_CE', 'Đồ án tốt nghiệp CE', 10, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (172, 'TTTN_CE', 'Thực tập tốt nghiệp CE', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (173, 'ĐACN1_CE', 'Đồ án chuyên ngành 1 (CE)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (174, 'XLNNTN', 'Xử lý ngôn ngữ tự nhiên', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (176, 'ELC301\r\n', 'Cấu kiện điện tử', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (177, 'AGD301\r\n', 'Thiết kế đồ họa động và hoạt hình', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (178, 'CAL101_1', 'Giải tích 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (179, 'UTM055\r\n', 'Khởi nghiệp và đổi mới sáng tạo', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (180, 'GDTC_3_BDN', 'GDTC 3 (Bóng đá Nam)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (181, 'GDTC_3_BRN', 'GDTC 3 (Bóng rổ Nam)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (182, 'GDTC_3_BRNU', 'GDTC 3 (Bóng rổ Nữ)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (183, 'GDTC_3_BCN', 'GDTC 3 (Bóng chuyền Nam)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (184, 'GDTC_3_BCNU', 'GDTC 3 (Bóng chuyền Nữ)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (185, 'GDTC_3_CL', 'GDTC 3 (Cầu lông)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (186, 'TACN_BA', 'Tiếng Anh chuyên ngành 3 (BA)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (187, 'PPNCKHTKT', 'Phương pháp nghiên cứu khoa học trong kinh tế', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (188, 'CNLTW', 'Công nghệ và lập trình web', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (189, 'PPNCKHTKT', 'Phương pháp NCKH trong kinh doanh', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (190, 'QTQHKH', 'Quản trị quan hệ khách hàng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (191, 'DACS2_CE', 'Đồ án cơ sở 2 (CE)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (193, 'CD_CE', 'Chuyên đề 3 (CE)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (194, 'ĐA3_20', 'Đề án 3 (K20)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (195, 'CKDT_20', 'Cấu kiện điện tử K20', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (196, 'LTHDT', 'Lập trình hướng đối tượng', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (197, 'GDTC_1DK', 'GDTC 1 (Điền kinh)', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (198, 'NLKT', 'Nguyên lý kế toán', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (199, 'CD5_CE', 'Chuyên đề 5 (CE)', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (200, 'CSDL_K21', 'Cơ sở dữ liệu (K21)', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (201, '', 'Tiếp thị kỹ thuật số (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (202, '', 'Chuyên đề Công nghệ thông tin (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (203, '', 'Kiểm thử phần mềm (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (204, '', 'Lập trình di động (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (205, '', 'Chuyên đề Lập trình máy tính (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (206, '', 'Thiết kế bộ nhận diện thương hiệu (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (207, '', 'Thiết kế giao diện website (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (208, '', 'Thiết kế hoạt hình 3 chiều (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (209, '', 'Biên tập phim kỹ thuật số (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (210, '', 'Quản trị khủng hoảng truyền thông (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (211, '', 'Tiếng Anh chuyên ngành 2 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (212, '', 'Tiếng Anh chuyên ngành 2 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (213, '', 'Xúc tiến quảng bá điểm đến du lịch (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (214, '', 'Thực hành biên phiên dịch 3 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (215, '', 'Thực hành biên phiên dịch 4 (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (216, '', 'Tiếng anh nâng cao (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (217, '', 'Thực hành dịch viết (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (218, '', 'Thực hành dịch viết (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (219, '', 'Thực hành dịch nói (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (220, '', 'Thực hành dịch nói (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (221, '', 'Tiếng Hàn nâng cao (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (222, '', 'Tiếng Hàn nâng cao (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (223, '', 'Đồ án tốt nghiệp (CNTT) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (224, '', 'Đồ án tốt nghiệp (CNTT (UDPM)) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (225, '', 'Đồ án tốt nghiệp (LTMT) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (226, '', 'Đồ án tốt nghiệp (TKĐH) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (227, '', 'Đồ án tốt nghiệp (TTĐPT) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (228, '', 'Đồ án tốt nghiệp (Marketing) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (229, '', 'Đồ án tốt nghiệp (Marketing DL) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (230, '', 'Thực tập tốt nghiệp (CNTT (UDPM)) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (231, '', 'Thực tập tốt nghiệp (LTMT) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (232, '', 'Thực tập tốt nghiệp (TKĐH) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (233, '', 'Thực tập tốt nghiệp (TTĐPT) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (234, '', 'Thực tập tốt nghiệp (Marketing) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (235, '', 'Thực tập tốt nghiệp (Marketing DL) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (236, '', 'Thực tập tốt nghiệp (PD TADL) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (237, '', 'Thực tập tốt nghiệp (Tiếng HQ) (*)', 0, 2, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (238, 'ĐACS4', 'Đồ án cơ sở 4 CE', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (239, 'MMT20', 'Mạng máy tính', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (240, 'NMN_KNM', 'Nhập môn ngành và kỹ năng mềm BA', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (244, '', 'Giải tích 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (245, '', 'Linux và phần mềm nguồn mở', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (246, '', 'Lập trình hệ thống', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (247, '', 'Học máy', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (248, '', 'Phân tích và thiết kế giải thuật', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (249, '', 'Tự chọn 1', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (250, '', 'Chương trình dịch', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (251, '', 'Điện toán đám mây', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (252, '', 'Phát triển ứng dụng di động đa nền tảng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (253, '', 'Đảm bảo chất lượng và kiểm thử phần mềm', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (254, '', 'Tự chọn 2', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (255, '', 'Quản trị dự án phần mềm', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (256, '', 'Kiến trúc và thiết kế phần mềm', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (257, '', 'Đồ án chuyên ngành 3', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (258, '', 'Tự chọn 3', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (259, '', 'Thiết kế web', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (260, '', 'Lập trình Python', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (261, '', 'Nhập môn khoa học dữ liệu', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (262, '', 'Khai phá dữ liệu ', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (263, '', 'Phân tích dữ liệu', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (264, '', 'Học sâu', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (265, '', 'Trực quan hóa dữ liệu', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (267, '', 'Chuyển mạch và định tuyến', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (268, '', 'Thiết kế và xây dựng hệ thống mạng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (269, '', 'Giám sát hệ thống mạng', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (270, '', 'Mật mã học', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (271, '', 'An toàn ứng dụng Web và CSDL', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (272, '', 'Phân tích mã độc', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (274, '', 'Kỹ thuật mạch điện tử', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (275, '', 'Kiến trúc và giao thức IoT', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (276, '', 'Thiết kế mạch với sự trợ giúp của máy tính', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (277, '', 'Kỹ thuật Robot', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (278, '', 'Robot di động', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (279, '', 'Hệ thống thực tế ảo', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (280, '', 'Hình họa', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (281, '', 'Cơ sở tạo hình', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (282, '', 'Kỹ thuật chụp ảnh và quay phim', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (283, '', 'Kịch bản truyền thông', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (284, '', 'Lập trình web nâng cao', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (285, '', 'Nghệ thuật chữ', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (286, '', 'Thiết kế nhân vật 2 chiều', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (287, '', 'Xử lý ảnh cơ bản', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (288, '', 'Lập trình Game', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (289, '', 'Biên tập phim kỹ thuật số', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (290, '', 'Lập trình game nâng cao', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (291, '', 'Nguyên lý thiết kế đồ họa', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (292, '', 'Thiết kế Logo', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (293, '', 'Đồ họa 3D', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (294, '', 'Thiết kế bộ ấn phẩm văn phòng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (296, '', 'Kinh doanh quốc tế', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (297, '', 'Digital Marketing', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (298, '', 'Mobile Commerce', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (299, '', 'Facebook Commerce', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (300, '', 'Khởi sự kinh doanh', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (302, '', 'An toàn và bảo mật trong TMĐT', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (303, '', 'Hoạch định nguồn lực doanh nghiệp', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (304, '', 'Nghiên cứu marketing', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (305, '', 'Marketing truyền thông xã hội', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (306, '', 'Marketing công cụ tìm kiếm', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (307, '', 'Marketing nội dung', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (308, '', 'Quảng cáo hiển thị và video', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (309, '', 'Phân tích marketing số', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (310, '', 'Điện tử ứng dụng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (311, '', 'Lập trình hệ thống nhúng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (312, '', 'Hệ điều hành nhúng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (313, '', 'Thiết kế VLSI', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (314, '', 'Lập trình Python cho hệ thống nhúng', 2, 0, NULL, NULL, NULL);
INSERT INTO `table_hocphan` VALUES (315, '', 'Thiết kế FPGA/ASIC với Verilog', 2, 0, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
