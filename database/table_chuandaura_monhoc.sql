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

 Date: 09/10/2021 09:18:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_monhoc
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_monhoc`;
CREATE TABLE `table_chuandaura_monhoc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `stt` int NULL DEFAULT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `id_hocphan` int NULL DEFAULT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1248 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_chuandaura_monhoc
-- ----------------------------
INSERT INTO `table_chuandaura_monhoc` VALUES (107, 1, 'Hiểu được các thách thức của bảo mật thông tin và giải thích được tầm quan trọng của chúng. Sinh viên có thể nhận biết các loại tấn công cơ bản.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (108, 2, 'Liệt kê và hiểu các loại mã độc hại khác nhau.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (109, 3, 'Mô tả các loại tấn công phi kỹ thuật', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (110, 3, 'Hiểu được các khái niệm cơ bản về bảo mật mạng thông qua các thiết bị mạng, các thiết bị bảo mật mạng, kỹ thuật và thiết kế mạng.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (111, 4, 'Giải thích được các loại tấn công ứng dụng web phía server và client.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (112, 5, 'Hiểu được các loại tấn công tầng ứng dụng.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (113, 6, 'Giải thích các loại tấn công thông dụng dựa trên mạng.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (114, 7, 'Phân tích các loại tấn công trên các thiết bị không dây và giải thích các cơ chế bảo mật không dây.', 85, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (156, 1, 'Hiểu được kiến thức tổng quan về VĐK.', 54, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (157, 2, 'Nắm vững kiến thức cơ bản về MCS-8051 và Kit Arduino', 54, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (158, 3, 'Áp dụng kiến thức lập trình C để giải quyết các bài toán ứng dụng', 54, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (159, 4, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học', 54, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (160, 5, 'Rèn luyện thái độ và trách nhiệm trong học tập', 54, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (172, 1, 'Nắm được các khái niệm cơ bản về hệ cơ sở dữ liệu phân tán; so sánh được những ưu và hạn chế giữa cơ sở dữ liệu tập trung và cơ sở dữ liệu phân tán.', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (173, 2, 'Có kiến về các hướng thức tiếp cận và thiết kế một cơ sở dữ liệu phân tán: các phương pháp phân mãnh dữ liệu, nhân bản, điều khiển đồng thời; quản lý giao tác, kiểm soát dữ liệu ngữ nghĩa và truy vấn phân tán', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (174, 3, 'Có kiến thức về ứng dụng của CSDL phân tán trong quản lý các tổ chức doanh nghiệp', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (175, 4, 'Truy vấn và cập nhật đồng bộ dữ liệu trên các database server.', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (176, 5, 'Biết tối ưu hóa truy vấn phân tán.', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (177, 6, 'Cài đặt được cơ sở dữ liệu phân tán cho bài toán trên một hệ quản trị CSDL(SQL Server, DB2 IBM, Oracle…)', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (178, 7, 'Có kỹ năng làm việc nhóm, kỹ năng thuyết trình một đề tài.', 114, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (179, 1, 'Hiểu các khái niệm cơ bản, lịch sử phát triển của Công nghệ phần mềm', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (180, 2, 'Hiểu được các mô hình phát triển phần mềm, cách lựa chọn mô hình phù hợp với dự án.', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (181, 3, 'Hiểu về kiểm thử & các kỹ thuật kiểm thử', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (182, 4, 'Hiểu về triển khai & bảo trì phần mềm', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (183, 5, 'Hiểu về yêu cầu và phương pháp thu thập yêu cầu', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (184, 6, 'Hiểu về các phương pháp phân tích & đặc tả yêu cầu', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (185, 7, 'Hiểu về lập trình & các phương pháp lập trình', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (186, 8, 'Hiểu về phương pháp quản lý dự án phần mềm', 46, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (187, 1, 'Hiểu được các khái niệm, cấu trúc, cú pháp của ngôn ngữ Ruby', 47, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (188, 2, 'Hiểu được các khái niệm, phương pháp, kỹ thuật lập trình với Ruby On Rails', 47, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (189, 3, 'Áp dụng được các phương pháp, cấu trúc và cú pháp của Ruby cũng như Ruby On Rails để phát triển được một phần mềm thực tế.', 47, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (190, 4, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm và kỹ năng giải quyết vấn đề.', 47, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (191, 5, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 47, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (202, 1, 'Hiểu được tiếng anh chuyên ngành cơ bản về máy tính', 52, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (203, 2, 'Áp dụng được kiến thức vào tìm kiếm tài liệu, xây dựng bài thuyết trình bằng tiếng anh.', 52, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (204, 3, 'Vận dụng được các kỹ năng giao tiếp bằng tiếng anh trong công nghệ thông tin với người nước ngoài, kỹ năng tư duy, làm việc nhóm', 52, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (205, 4, 'Vận dụng kiến thức vào làm báo cáo dự án bằng tiếng anh', 52, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (206, 1, 'Hiểu được các cấu trúc dữ liệu và giải thuật cơ bản.', 15, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (207, 2, 'Vận dụng được kỹ năng giao tiếp, kỹ năng tư duy và giải quyết vấn đề.', 15, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (208, 3, 'Áp dụng được các kỹ thuật thiết kế để giải quyết các bài toán tin học.', 15, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (209, 4, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 15, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (210, 1, 'Hiểu được ngôn ngữ HTML5, CSS, Javascript', 16, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (211, 2, 'Sử dụng thành thạo trình để tạo lập một trang Web', 16, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (212, 3, 'Xây dựng được ứng dụng Website tĩnh và triển khai trên môi trường trực tuyến', 16, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (213, NULL, 'Áp dụng kiến thức để xây dựng một sản phẩm phần mềm thông như giao diện window', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (214, NULL, 'Áp dụng kiến thức để xây dựng một sản phẩm phần mềm liên quan đến ứng dụng lập trình mạng, lập trình servlet', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (215, NULL, 'Vận dụng được các kiến thức đã học xây dựng một sản phẩm phần mềm liên quan Java Framework như Spring, Hibernate,..', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (216, NULL, 'Hiểu được các khái niệm cơ bản, lý thuyết và phương pháp trong xử lý ảnh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (217, NULL, 'Vận dụng các kiến thức đã học và sử dụng thư viện, ngôn ngữ lập trình (OpenCV, Python/C++) để hiện thực các kỹ thuật trong xử lý ảnh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (218, NULL, 'Phát triển được một số ứng dụng đơn giản liên quan xử lý ảnh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (219, NULL, 'Đề xuất được các giải pháp trong đánh giá, phân tích, thiết kế các ứng dụng liên quan đến xử lý ảnh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (220, NULL, 'Phát triển kỹ năng tư duy, phản biện, làm việc nhóm, ý thức làm việc trong môi trường chuyên nghiệp', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (221, NULL, 'Hiểu các khái niệm cơ bản của lập trình Android. Kiến trúc Android, vòng đời của một ứng dụng Android', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (222, NULL, 'Xây dựng giao diện cho một ứng dụng Android với các thành phần cơ bản', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (223, NULL, 'Lập trình với cơ sở dữ liệu SQLite, web service', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (224, NULL, 'Lập trình với Service, Notification, Activity State and preferences, Maps and GPS, Using the Camera.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (225, NULL, 'Áp dụng kiến thức đã học để viết một ứng dụng Android', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (232, NULL, 'Phân loại tín hiệu và hệ thống', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (233, NULL, 'Mô tả lý thuyết lấy mẫu của tín hiệu theo thời gian.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (234, NULL, 'Biểu diễn tín hiệu và hệ thống trên miền thời gian.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (235, NULL, 'Phân tích tín hiệu và hệ thống LTI.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (236, NULL, 'Biểu diễn tín hiệu và hệ thống trong miền Z', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (237, NULL, 'Ứng dụng biến đổi Z trong xử lý tín hiệu số', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (238, NULL, 'Biểu diễn tín hiệu và hệ thống trên miền tần số', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (239, NULL, 'Diễn giải phép biến đổi Fourier rời rạc', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (240, NULL, 'Ứng dụng giải thuật của phép biến đổi Fourier nhanh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (241, NULL, 'Nâng cao kỹ năng làm việc nhóm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (242, NULL, 'Phát triển kỹ năng giải quyết vấn đề.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (243, NULL, 'Phát triển kỹ năng lập trình matlab.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (255, NULL, 'Nhớ được các khái niệm, thuật ngữ cơ bản của kinh tế vĩ mô.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (256, NULL, 'Hiểu được các vấn đề kinh tế vĩ mô như Hệ thống đo lường quốc gia, mô hình AD-AS, thất nghiệp và lạm phát, các chính sách kinh tế vĩ mô; Từ đó giải thích được các biến động trong nền kinh tế vĩ mô cũng như tác động của biến động trong môi trường kinh tế vĩ mô tới hoạt động doanh nghiệp.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (257, NULL, 'Vận dụng được các kiến thức đã học để giải các bài tập tình huống.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (258, NULL, 'Vận dụng được các kỹ năng giao tiếp, làm việc nhóm, kỹ năng giải quyết vấn đề.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (281, NULL, 'Mô tả mô hình và nghi thức giao tiếp trong mạng truyền số liệu.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (282, NULL, 'Phân biệt được tín hiệu tương tự và tín hiệu số.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (283, NULL, 'So sánh các kỹ thuật mã hóa và điều chếdữ liệu.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (284, NULL, 'Xây dựng và tính toán được các yếu tố ảnh hưởng tới các dạng đường truyền khác nhau.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (285, NULL, 'Mô tả được kỹ thuật phát hiện lỗi và sửa lỗi, kỹ thuật điều khiểu dòng dữ liệu và liên kết dữ liệu.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (286, NULL, 'So sánh kỹ thuật truyền dữ liệu đồng bộ và bất đồng bộ.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (287, NULL, 'Nâng cao kỹ năng làm việc nhóm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (288, NULL, 'Phát triển kỹ năng giải quyết vấn đề.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (295, NULL, 'Hiểu được lịch sử và cấu trúc hệ điều hành', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (296, NULL, 'Phân biệt giữa tiến trình và tiểu tình. Hiểu được giao tiếp giữa các tiến trình. Liệt kê các thuật toán điều phối tiến trình.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (297, NULL, 'Phân biệt giữa kỹ thuật phân trang và phân đoạn bộ nhớ. Trình bày các thuật toán phân trang.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (298, NULL, 'Phân biệt cách thức tổ chức tập tin và thư mục trên hệ thống. Liệt kê các kỹ thuật quản lý và tối ưu hệ thống tập tin.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (299, NULL, 'Trình bày các nguyên tắc vào/ra phần cứng và phần mềm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (300, NULL, 'Trình bày các nguyên nhân dẫn đến deadlock và cách thức ngăn chặn hoặc tránh deadlock.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (301, NULL, 'Hiểu được kiến thức tổng quan về kiến trúc máy tính', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (302, NULL, 'Nắm vững kiến thức cơ bản bộ nhớ, CPU, I/O, Assembler', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (303, NULL, 'Áp dụng kiến thức để giải quyết các bài toán xử lý tính toán, tối ưu hệ thống máy tính.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (304, NULL, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy logic, giao tiếp và tự học.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (305, NULL, 'Rèn luyện thái độ và trách nhiệm trong học tập.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (324, NULL, 'Nắm bắt và hiểu rõ và trình bày được những kiến thức cơ bản trong hoạt động quản trị', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (325, NULL, 'Giái thích và tóm tắt được các nội dung liên quan đến hoạt động quản trị.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (326, NULL, 'Áp dụng những kiến thức đã học để xây dựng một kế hoạch cho hoạt động quản trị, thiết kế bộ máy tổ chức, lãnh đạo và kiểm tra hoạt động của tổ chức', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (327, NULL, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm…', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (328, NULL, 'Có ý thức, trách nhiệm trong công việc và tác phong nghề nghiệp đúng chuẩn mực, chuyên nghiệp.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (329, NULL, 'Phát triển được kỹ năng đọc, hiểu các tài liệu chuyên ngành bằng tiếng Anh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (330, NULL, 'Mô tả, nhận diện được các phần tử cơ bản, các nguyên tắc điều khiển và các phương pháp mô tả toán học của hệ thống điều khiển tự động.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (331, NULL, 'Các phương pháp để khảo sát tính ổn định của hệ thống, đánh giá chất lượng hệ thống điều khiển và thiết kế hệ thống điều khiển liên tục.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (332, NULL, 'Rèn luyện kỹ năng phân tích hệ thống, nhận diện các nguyên tắc điều khiển, các khâu động học cơ bản, mô tả toán học các hệ thống điều khiển tự động.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (333, NULL, '- Xác định được các tiêu chuẩn xét ổn định, phân tích chất lượng hệ thống và tổng hợp thiết kế hệ thống điều khiển tự động.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (334, NULL, 'Rèn luyện được tác phong làm việc tỉ mỉ, nghiêm túc, chủ động, tích cực, chăm chỉ, cẩn thận, chủ động trong học tập, hoàn thành nhiệm vụ học tập.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (335, NULL, 'Có tính trung thực và có trách nhiệm trong quá trình làm bài tập cá nhân, làm bài tập nhóm và làm bài kiểm tra. Thực hiện các nhiệm vụ được giao đúng thời gian quy định..', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (386, NULL, 'Mô tả được sự giống nhau và khác nhau giữa những hệ thống phân bố chuẩn so với hệ thống di động và cảm biến', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (387, NULL, 'Diễn giải những vấn đề cơ bản để cân bằng sự hạn chế về năng lượng và nhu cầu giao tiếp trên các hệ thống di động và cảm biến', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (395, NULL, 'Hiểu được các khái niệm, cấu trúc, cú pháp của ngôn ngữ Ruby', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (396, NULL, 'Hiểu được các khái niệm, phương pháp, kỹ thuật lập trình với Ruby On Rails', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (397, NULL, 'Áp dụng được các phương pháp, cấu trúc và cú pháp của Ruby cũng như Ruby On Rails để phát triển được một phần mềm thực tế.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (398, NULL, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm và kỹ năng giải quyết vấn đề.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (399, NULL, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (408, NULL, 'Hiểu rõ kiến trúc và nguyên lý hoạt động của các mô hình mạng thông dụng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (409, NULL, 'Sử dụng được các mô hình peer-to-peer, client/server, mô hình phân tán trong lập trình mạng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (410, NULL, 'Sử dụng được các giao thức TCP, UDP, HTTP, FTP, POP3 trong lập trình mạng để xây dựng các ứng dụng chạy trên môi trường internet', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (411, NULL, 'Phân tích được nguyên lý hoạt động của các tiến trình, các giao thức trong kỹ thuật lập trình mạng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (412, NULL, 'Xây dựng được các chương trình hội thoại, trình duyệt, web server, mail server, FTP server', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (413, NULL, 'Hiểu và vận dụng logic, các loại quan hệ tương đương, thứ tự, các nguyên lý và cấu hình tổ hợp cơ bản.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (414, NULL, 'Nhận dạng được các bài toán cơ bản và sử dụng phương pháp phù hợp để giải quyết.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (415, NULL, 'Ứng dụng được các kiến thức cơ bản của đồ thị để giải quyết các bài toán.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (416, NULL, 'Lập trình để giải quyết một số bài toán.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (417, NULL, 'Nghiêm túc, tự giác học tập, làm việc độc lập, làm việc theo nhóm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (418, NULL, 'Hiểu được các định nghĩa về dữ liệu và cơ sở dữ liệu.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (419, NULL, 'Hiểu được quan hệ dữ liệu và các phép toán tương ứng.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (420, NULL, 'Vận dụng kiến thức để thực hiện các phép toán quan hệ.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (421, NULL, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (422, NULL, 'Áp dụng được kiến thức đã học để truy vấn dữ liệu từ đó giải quyết các bài toán liên quan.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (423, NULL, 'Sử dụng được tiếng Anh để tìm kiếm, đọc hiểu tài liệu chuyên ngành', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (424, NULL, 'Sử dụng được tiếng Anh để trình bày các vấn đề liên quan đến chuyên ngành', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (425, NULL, 'Sử dụng được tiếng Anh để giao tiếp trong công việc chuyên môn', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (426, NULL, 'Kỹ năng làm việc nhóm', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (427, NULL, 'Hiểu được các khái niệm và đặc trưng của lập trình hướng đối tượng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (428, NULL, 'Sử dụng thành thạo ngôn ngữ lập trình Java ở mức độ cơ bản', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (429, NULL, 'Áp dụng được phương pháp lập trình hướng đối tượng và ngôn ngữ lập trình Java để phát triển phần mềm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (430, NULL, 'Rèn luyện thái độ và trách nhiệm trong học tập, làm việc độc lập hoặc theo nhóm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (431, NULL, 'Rèn luyện thái độ nghiêm túc, tự giác và trách nhiệm trong học tập.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (432, NULL, 'Nắm vững các khái niệm về ngôn ngữ hình thức, văn phạm, ô-tô-mát, biểu chức chính quy.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (433, NULL, 'Biểu diễn được ô-tô-mát hữu hạn; xây dựng được ô-tô-mát hữu hạn, ô-tô-mát đẩy xuống đoán nhận ngôn ngữ đã cho và ngược lại.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (434, NULL, 'Xây dựng được biểu thức chính quy biểu diễn ngôn ngữ chính quy và ngược lại; xây dựng NFA và DFA tương ứng biểu thức chính quy; xây dựng NFA từ văn phạm chính quy và ngược lại; cực tiểu hóa DFA; giản lược được văn phạm phi ngữ cảnh để đưa về dạng chuẩn.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (435, NULL, 'Xây dựng được máy Turing để tính toán hàm đã cho.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (436, NULL, 'Hiểu các khái niệm cơ bản liên quan đến dự án và quản lý dự án phần mềm', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (437, NULL, 'Nắm và vận dụng các kỹ thuật về chuẩn bị dự án, lập kế hoạch, phân bổ tài nguyên, kiểm soát, xử lý xung đột, điều hành và đóng dự án phần mềm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (438, NULL, 'Hiểu các khái niệm cơ bản về phương pháp quản lý dự án theo quy trình phát triển phần mềm truyền thống (Waterfall model, Spiral Model,...), hoặc theo quy trình phát triển phần mềm Agile.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (439, NULL, 'Vận dụng các kiến thức về quản trị dự án phần mềm cho dự án theo quy trình theo Plan-Driven hoặc Agile.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (440, NULL, 'Kỹ năng làm việc nhóm', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (441, NULL, 'Hiểu được các kiến thức căn bản về HCI.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (442, NULL, 'Vận dụng được các nguyên tắc và kỹ thuật trong HCI\r\nvào việc thiết kế UI/UX', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (443, NULL, 'Thiết kế được phần mềm dựa trên các nguyên tắc và kỹ thuật trong HCI.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (444, NULL, 'Đánh giá được tài liệu phân tích và thiết kế hướng đối tượng một hệ thống cụ thể.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (445, NULL, 'Phân tích và thiết kế hướng đối tượng các bài toán thực tế.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (446, NULL, 'Vận dụng được các kỹ năng làm việc nhóm, kỹ năng giao tiếp, kỹ năng quản lý thời gian, kỹ năng giải quyết vấn đề.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (447, NULL, 'Hình thành thái độ học tập tích cực, đạo đức nghề nghiệp', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (448, NULL, 'Lập trình thành thạo, biết khai thác các công cụ, thư viện hỗ trợ', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (449, NULL, 'Hiểu, cài đặt được các thuật toán 2D', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (450, NULL, 'Hiểu, xây dựng và mô phỏng được các đối tượng 3D cơ bản', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (451, NULL, 'Vận dụng được các kỹ thuật đồ họa nâng cao (khử khuất, tô bóng,…)', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (452, NULL, 'Vận dụng và phát triển các kỹ thuật đồ họa đã học để giải quyết các vấn đề thực tế trong cuộc sống', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (453, NULL, 'Biết tìm đọc tài liệu, tự học, làm việc nhóm.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (454, NULL, 'Hiểu các khái niệm, nguyên lý cơ bản trong thị giác máy tính. Sử dụng được các công cụ, thư viện hỗ trợ', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (455, NULL, 'Hiểu và vận dụng được các kỹ thuật phân đoạn ảnh; trích chọn đặc trưng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (456, NULL, 'Hiểu và vận dụng được các kỹ thuật so khớp và phân lớp ảnh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (457, NULL, 'Vận dụng hiệu quả các kỹ thuật trong thị giác máy tính, nhận dạng ảnh để giải quyết bài toán thực tế', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (458, NULL, 'Xây dựng, phát triển mô hình thông minh liên quan đến nhận dạng ảnh, video, đánh giá độ chính xác mô hình', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (459, NULL, 'Biết tìm đọc tài liệu, tự học, làm việc nhóm', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (460, NULL, 'Hiểu và cài đặt được các thuật toán tìm kiếm sử dụng cấu trúc dữ liệu phù hợp', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (461, NULL, 'Hiểu và sử dụng được các phương pháp biểu diễn và lập luận tri thức cơ bản', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (462, NULL, 'Hiểu và vận dụng được một số giải thuật cơ bản để lập trình cho máy tính tự học', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (463, NULL, 'Vận dụng đuợc các thuật toán tìm kiếm để giải quyết bài toán cụ thể', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (464, NULL, 'Sử dụng các thuật toán, phương pháp đã học để xây dựng được ứng dụng thông minh', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (465, NULL, 'Biết tìm đọc tài liệu, sử dụng các công cụ hỗ trợ,  tự học, làm việc nhóm', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (466, NULL, 'Hiểu được kiến thức tổng quan về tin học', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (467, NULL, 'Nắm vững kiến thức cơ bản của ngôn ngữ lập trình C++.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (468, NULL, 'Áp dụng kiến thức để giải quyết các bài toán tin học', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (469, NULL, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (470, NULL, 'Rèn luyện thái độ và trách nhiệm trong học tập.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (472, NULL, 'Phân tích những quan điểm cơ bản của chủ nghĩa Mác - Lênin về sứ mệnh lịch sử của giai cấp công nhân; cơ cấu xã hội - giai cấp trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (473, NULL, 'Giải quyết được các vấn đề về chủ nghĩa xã hội, thời kỳ quá độ lên chủ nghĩa xã hội; các vấn đề về dân chủ xã hội chủ nghĩa và nhà nước xã hội chủ nghĩa dựa trên quan điểm của chủ nghĩa Mác - Lênin.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (474, NULL, 'Giải thích được quan điểm của chủ nghĩa Mác-Lênin về các vấn đề dân tộc, tôn giáo và gia đình trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (475, NULL, 'Tính được các phép toán trên ma trận, tính được định thức,  tìm được ma trận nghịch đảo. Giải được hệ phương trình tuyến tính. Tìm được trị riêng, vecto riêng. Đưa được dạng toàn phương về dạng chính tắc.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (476, NULL, 'Ứng dụng được lý thuyết toán học vào chuyên ngành, đưa các bài toán thực tế về bài toán giải được bằng toán học.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (477, NULL, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm. Phát triển thêm khả năng tư duy  như phân tích, so sánh, tổng hợp.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (478, NULL, 'Trình bày được các kiến thức cơ bản của xác suất bao gồm: không gian mẫu, các định nghĩa xác suất của biến cố, các công thức tính xác suất, biến ngẫu nhiên và một số quy luật phân phối xác suất thông dụng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (479, NULL, 'Viết được các công thức tính xác suất.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (480, NULL, 'Tính xác suất của một số bài toán xác suất cơ bản trong toán học.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (481, NULL, 'Phân biệt được các phương pháp giải các bài toán xác suất.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (482, NULL, 'Trình bày được đặc điểm, bản chất và các quy luật vận động của kinh tế thị trường; kinh tế thị trường tư bản chủ nghĩa; kinh tế thị trường định hướng xã hội chủ nghĩa và các quan hệ lợi ích kinh tế ở Việt Nam; quá trình công nghiệp hóa, hiện đại hóa và hội nhập kinh tế quốc tế của Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (483, NULL, 'Xây dựng được hệ thống tri thức kinh tế chính trị của môn học để giải quyết những vấn đề liên quan trong cuộc sống.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (484, NULL, 'Phân tích được quy luật vận động của các mô hình kinh tế; quan hệ lợi ích kinh tế; quá trình công nghiệp hóa và hội nhập kinh tế quốc tế trong tiến trình phát triển kinh tế - xã hội của Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (485, NULL, 'Trình bày được các kiến thức cơ bản về quá trình Đảng lãnh đạo cuộc đấu tranh giành chính quyền (1930-1945), lãnh đạo hai cuộc kháng chiến chống thực dân Pháp và đế quốc Mỹ xâm lược, hoàn thành giải phóng dân tộc, thống nhất đất nước (1945-1975), lãnh đạo cả nước tiến lên chủ nghĩa xã hội và tiến hành công cuộc đổi mới (1975-2018)', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (486, NULL, 'Áp dụng các kinh nghiệm về sự lãnh đạo cách mạng của Đảng để giúp người học nâng cao nhận thức, niềm tin đối với Đảng và khả năng vận dụng kiến thức đã học vào thực tiễn công tác, góp phần xây dựng và bảo vệ Tổ quốc Việt Nam xã hội chủ nghĩa.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (487, NULL, 'Phân tích được những sáng tạo cơ bản của Đảng về lý luận và chỉ đạo thực tiễn cách mạng Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (488, NULL, 'Phân tích những vấn đề cơ bản về nhà nước và pháp luật.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (489, NULL, 'So sánh các cơ quan nhà nước trong Bộ máy Nhà nước Việt Nam.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (490, NULL, 'Phân tích các vấn đề về quy phạm pháp luật, quan hệ pháp luật, vi phạm pháp luật, thực hiện pháp luật, trách nhiệm pháp lí.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (491, NULL, 'Trình bày các vấn đề về hệ thống pháp luật, ý thức pháp luật và pháp chế.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (492, NULL, 'Đánh giá các vấn đề phòng chống tham nhũng', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (493, NULL, 'Hình thành và phát triển kỹ năng tư duy logic, tự nghiên cứu; kỹ năng làm việc nhóm, thuyết trình, phản biện, có tinh thần thượng tôn pháp luật, có tinh thần trách nhiệm với công việc và với xã hội.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (494, NULL, 'Hiểu được sự hình thành và phát triển của chủ nghĩa Mác-Lênin, các nội dung cơ bản của phép biện chứng duy vật, chủ nghĩa duy vật lịch sử.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (495, NULL, 'Vận dụng được thế giới quan duy vật biện chứng vào trong quá trình nhận thức.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (496, NULL, 'Phân tích được các nội dung của chủ nghĩa duy vật biện chứng, phép biện chứng duy vật và chủ nghĩa duy vật lịch sử', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (497, NULL, 'Nghe và hiểu những cụm từ và những từ liên quan đến lĩnh vực cá nhân được sử dụng thường xuyên (ví dụ: thông tin rất cơ bản về cá nhân và gia đình, khu vực địa phương, các quốc gia, các loại thực phẩm); nắm được ý chính trong các tin nhắn và thông báo ngắn, đơn giản, rõ ràng.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (498, NULL, 'Đọc được những đoạn văn rất ngắn và đơn giản; tìm được thông tin cụ thể và có thể dự đoán được trong những mẩu tin hàng ngày như tin quảng cáo, thực đơn và thời gian biểu; hiểu được thư tín cá nhân viết ngắn gọn, đơn giản.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (499, NULL, 'Giao tiếp được về những công việc đơn giản hàng ngày, trao đổi thông tin trực tiếp và đơn giản về các chủ đề thuộc như ẩm thực, nhà hàng, địa điểm, quốc gia, danh nhân và hoạt động quen thuộc; trao đổi rất ngắn gọn về những vấn đề xã hội, mặc dù bản thân chưa thể hiểu đầy đủ để tự mình có thể duy trì cuộc nói chuyện.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (500, NULL, 'Viết được những ghi chú và tin nhắn đơn giản và ngắn; viết một bức thư cá nhân rất đơn giản, ví dụ như thư cảm ơn ai đó về việc gì.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (506, NULL, 'Nắm vững được cách lập trình Server Side.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (507, NULL, 'Vận dụng kiến thức đã học vào việc lập trình website động, thiết kế tương tác và cơ sở dữ liệu.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (508, NULL, 'Sử dụng thuần thục Framework, mã nguồn mở phát triển ứng dụng Website động.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (513, NULL, 'Nghe và hiểu những cụm từ và những từ liên quan đến lĩnh vực cá nhân được sử dụng thường xuyên (ví dụ: thông tin rất cơ bản về cá nhân và gia đình, khu vực địa phương, các quốc gia, các loại thực phẩm); nắm được ý chính trong các tin nhắn và thông báo ngắn, đơn giản, rõ ràng.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (514, NULL, 'Đọc được những đoạn văn rất ngắn và đơn giản; tìm được thông tin cụ thể và có thể dự đoán được trong những mẩu tin hàng ngày như tin quảng cáo, thực đơn và thời gian biểu; hiểu được thư tín cá nhân viết ngắn gọn, đơn giản.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (515, NULL, 'Giao tiếp được về những công việc đơn giản hàng ngày, trao đổi thông tin trực tiếp và đơn giản về các chủ đề thuộc như ẩm thực, nhà hàng, địa điểm, quốc gia, danh nhân và hoạt động quen thuộc; trao đổi rất ngắn gọn về những vấn đề xã hội, mặc dù bản thân chưa thể hiểu đầy đủ để tự mình có thể duy trì cuộc nói chuyện.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (516, NULL, 'Viết được những ghi chú và tin nhắn đơn giản và ngắn; viết một bức thư cá nhân rất đơn giản, ví dụ như thư cảm ơn ai đó về việc gì.', NULL, NULL);
INSERT INTO `table_chuandaura_monhoc` VALUES (536, 1, 'noi dung clo 1', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (537, 2, 'noi dung clo 2', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (549, 3, 'noi dung clo 3', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (550, 4, 'noi dung clo 4', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (551, 5, 'noi dung clo 5', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (552, 6, 'noi dung clo 6', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (553, 7, 'noi dung clo 7', 7, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (556, 1, 'a', 12, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (1229, 1, 'noi dung 11', 13, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (1230, 2, 'noi dung 22', 13, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (1231, 3, 'noi dung 33', 13, 146);

SET FOREIGN_KEY_CHECKS = 1;
