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

 Date: 13/08/2021 21:14:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_chuandaura_monhoc
-- ----------------------------
DROP TABLE IF EXISTS `table_chuandaura_monhoc`;
CREATE TABLE `table_chuandaura_monhoc`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cdr_chung` int NULL DEFAULT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `id_decuong` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 497 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of table_chuandaura_monhoc
-- ----------------------------
INSERT INTO `table_chuandaura_monhoc` VALUES (107, 12, 'Hiểu được các thách thức của bảo mật thông tin và giải thích được tầm quan trọng của chúng. Sinh viên có thể nhận biết các loại tấn công cơ bản.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (108, 12, 'Liệt kê và hiểu các loại mã độc hại khác nhau.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (109, 12, 'Mô tả các loại tấn công phi kỹ thuật', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (110, 13, 'Hiểu được các khái niệm cơ bản về bảo mật mạng thông qua các thiết bị mạng, các thiết bị bảo mật mạng, kỹ thuật và thiết kế mạng.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (111, 14, 'Giải thích được các loại tấn công ứng dụng web phía server và client.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (112, 14, 'Hiểu được các loại tấn công tầng ứng dụng.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (113, 14, 'Giải thích các loại tấn công thông dụng dựa trên mạng.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (114, 21, 'Phân tích các loại tấn công trên các thiết bị không dây và giải thích các cơ chế bảo mật không dây.', 19);
INSERT INTO `table_chuandaura_monhoc` VALUES (156, 12, 'Hiểu được kiến thức tổng quan về VĐK.', 24);
INSERT INTO `table_chuandaura_monhoc` VALUES (157, 12, 'Nắm vững kiến thức cơ bản về MCS-8051 và Kit Arduino', 24);
INSERT INTO `table_chuandaura_monhoc` VALUES (158, 13, 'Áp dụng kiến thức lập trình C để giải quyết các bài toán ứng dụng', 24);
INSERT INTO `table_chuandaura_monhoc` VALUES (159, 15, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học', 24);
INSERT INTO `table_chuandaura_monhoc` VALUES (160, 17, 'Rèn luyện thái độ và trách nhiệm trong học tập', 24);
INSERT INTO `table_chuandaura_monhoc` VALUES (172, 1, 'Nắm được các khái niệm cơ bản về hệ cơ sở dữ liệu phân tán; so sánh được những ưu và hạn chế giữa cơ sở dữ liệu tập trung và cơ sở dữ liệu phân tán.', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (173, 1, 'Có kiến về các hướng thức tiếp cận và thiết kế một cơ sở dữ liệu phân tán: các phương pháp phân mãnh dữ liệu, nhân bản, điều khiển đồng thời; quản lý giao tác, kiểm soát dữ liệu ngữ nghĩa và truy vấn phân tán', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (174, 2, 'Có kiến thức về ứng dụng của CSDL phân tán trong quản lý các tổ chức doanh nghiệp', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (175, 4, 'Truy vấn và cập nhật đồng bộ dữ liệu trên các database server.', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (176, 4, 'Biết tối ưu hóa truy vấn phân tán.', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (177, 5, 'Cài đặt được cơ sở dữ liệu phân tán cho bài toán trên một hệ quản trị CSDL(SQL Server, DB2 IBM, Oracle…)', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (178, 6, 'Có kỹ năng làm việc nhóm, kỹ năng thuyết trình một đề tài.', 26);
INSERT INTO `table_chuandaura_monhoc` VALUES (179, 4, 'Hiểu các khái niệm cơ bản, lịch sử phát triển của Công nghệ phần mềm', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (180, 4, 'Hiểu được các mô hình phát triển phần mềm, cách lựa chọn mô hình phù hợp với dự án.', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (181, 4, 'Hiểu về kiểm thử & các kỹ thuật kiểm thử', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (182, 4, 'Hiểu về triển khai & bảo trì phần mềm', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (183, 5, 'Hiểu về yêu cầu và phương pháp thu thập yêu cầu', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (184, 5, 'Hiểu về các phương pháp phân tích & đặc tả yêu cầu', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (185, 5, 'Hiểu về lập trình & các phương pháp lập trình', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (186, 5, 'Hiểu về phương pháp quản lý dự án phần mềm', 27);
INSERT INTO `table_chuandaura_monhoc` VALUES (187, 4, 'Hiểu được các khái niệm, cấu trúc, cú pháp của ngôn ngữ Ruby', 28);
INSERT INTO `table_chuandaura_monhoc` VALUES (188, 4, 'Hiểu được các khái niệm, phương pháp, kỹ thuật lập trình với Ruby On Rails', 28);
INSERT INTO `table_chuandaura_monhoc` VALUES (189, 5, 'Áp dụng được các phương pháp, cấu trúc và cú pháp của Ruby cũng như Ruby On Rails để phát triển được một phần mềm thực tế.', 28);
INSERT INTO `table_chuandaura_monhoc` VALUES (190, 5, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm và kỹ năng giải quyết vấn đề.', 28);
INSERT INTO `table_chuandaura_monhoc` VALUES (191, 6, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 28);
INSERT INTO `table_chuandaura_monhoc` VALUES (192, 1, 'Hiểu được các khái niệm kiểm thử phần mềm, quy trình kiểm thử phần mềm', 29);
INSERT INTO `table_chuandaura_monhoc` VALUES (193, 1, 'Hiểu được các khái niệm, phương pháp, kỹ thuật thiết kế ca kiểm thử và lập kế hoạch kiểm thử.', 29);
INSERT INTO `table_chuandaura_monhoc` VALUES (194, 4, 'Áp dụng được các kỹ thuật thiết kế ca kiểm thử và sử dụng các công cụ kiểm thử cho một phần mềm thực tế.', 29);
INSERT INTO `table_chuandaura_monhoc` VALUES (195, 5, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm và kỹ năng giải quyết vấn đề.', 29);
INSERT INTO `table_chuandaura_monhoc` VALUES (196, 6, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 29);
INSERT INTO `table_chuandaura_monhoc` VALUES (202, 2, 'Hiểu được tiếng anh chuyên ngành cơ bản về máy tính', 31);
INSERT INTO `table_chuandaura_monhoc` VALUES (203, 4, 'Áp dụng được kiến thức vào tìm kiếm tài liệu, xây dựng bài thuyết trình bằng tiếng anh.', 31);
INSERT INTO `table_chuandaura_monhoc` VALUES (204, 5, 'Vận dụng được các kỹ năng giao tiếp bằng tiếng anh trong công nghệ thông tin với người nước ngoài, kỹ năng tư duy, làm việc nhóm', 31);
INSERT INTO `table_chuandaura_monhoc` VALUES (205, 5, 'Vận dụng kiến thức vào làm báo cáo dự án bằng tiếng anh', 31);
INSERT INTO `table_chuandaura_monhoc` VALUES (206, 1, 'Hiểu được các cấu trúc dữ liệu và giải thuật cơ bản.', 32);
INSERT INTO `table_chuandaura_monhoc` VALUES (207, 4, 'Vận dụng được kỹ năng giao tiếp, kỹ năng tư duy và giải quyết vấn đề.', 32);
INSERT INTO `table_chuandaura_monhoc` VALUES (208, 5, 'Áp dụng được các kỹ thuật thiết kế để giải quyết các bài toán tin học.', 32);
INSERT INTO `table_chuandaura_monhoc` VALUES (209, 6, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 32);
INSERT INTO `table_chuandaura_monhoc` VALUES (210, 2, 'Hiểu được ngôn ngữ HTML5, CSS, Javascript', 33);
INSERT INTO `table_chuandaura_monhoc` VALUES (211, 4, 'Sử dụng thành thạo trình để tạo lập một trang Web', 33);
INSERT INTO `table_chuandaura_monhoc` VALUES (212, 5, 'Xây dựng được ứng dụng Website tĩnh và triển khai trên môi trường trực tuyến', 33);
INSERT INTO `table_chuandaura_monhoc` VALUES (213, 2, 'Áp dụng kiến thức để xây dựng một sản phẩm phần mềm thông như giao diện window', 34);
INSERT INTO `table_chuandaura_monhoc` VALUES (214, 4, 'Áp dụng kiến thức để xây dựng một sản phẩm phần mềm liên quan đến ứng dụng lập trình mạng, lập trình servlet', 34);
INSERT INTO `table_chuandaura_monhoc` VALUES (215, 5, 'Vận dụng được các kiến thức đã học xây dựng một sản phẩm phần mềm liên quan Java Framework như Spring, Hibernate,..', 34);
INSERT INTO `table_chuandaura_monhoc` VALUES (216, 2, 'Hiểu được các khái niệm cơ bản, lý thuyết và phương pháp trong xử lý ảnh', 25);
INSERT INTO `table_chuandaura_monhoc` VALUES (217, 2, 'Vận dụng các kiến thức đã học và sử dụng thư viện, ngôn ngữ lập trình (OpenCV, Python/C++) để hiện thực các kỹ thuật trong xử lý ảnh', 25);
INSERT INTO `table_chuandaura_monhoc` VALUES (218, 4, 'Phát triển được một số ứng dụng đơn giản liên quan xử lý ảnh', 25);
INSERT INTO `table_chuandaura_monhoc` VALUES (219, 4, 'Đề xuất được các giải pháp trong đánh giá, phân tích, thiết kế các ứng dụng liên quan đến xử lý ảnh', 25);
INSERT INTO `table_chuandaura_monhoc` VALUES (220, 5, 'Phát triển kỹ năng tư duy, phản biện, làm việc nhóm, ý thức làm việc trong môi trường chuyên nghiệp', 25);
INSERT INTO `table_chuandaura_monhoc` VALUES (221, 2, 'Hiểu các khái niệm cơ bản của lập trình Android. Kiến trúc Android, vòng đời của một ứng dụng Android', 30);
INSERT INTO `table_chuandaura_monhoc` VALUES (222, 4, 'Xây dựng giao diện cho một ứng dụng Android với các thành phần cơ bản', 30);
INSERT INTO `table_chuandaura_monhoc` VALUES (223, 4, 'Lập trình với cơ sở dữ liệu SQLite, web service', 30);
INSERT INTO `table_chuandaura_monhoc` VALUES (224, 4, 'Lập trình với Service, Notification, Activity State and preferences, Maps and GPS, Using the Camera.', 30);
INSERT INTO `table_chuandaura_monhoc` VALUES (225, 4, 'Áp dụng kiến thức đã học để viết một ứng dụng Android', 30);
INSERT INTO `table_chuandaura_monhoc` VALUES (232, 12, 'Phân loại tín hiệu và hệ thống', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (233, 12, 'Mô tả lý thuyết lấy mẫu của tín hiệu theo thời gian.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (234, 12, 'Biểu diễn tín hiệu và hệ thống trên miền thời gian.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (235, 12, 'Phân tích tín hiệu và hệ thống LTI.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (236, 13, 'Biểu diễn tín hiệu và hệ thống trong miền Z', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (237, 13, 'Ứng dụng biến đổi Z trong xử lý tín hiệu số', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (238, 14, 'Biểu diễn tín hiệu và hệ thống trên miền tần số', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (239, 14, 'Diễn giải phép biến đổi Fourier rời rạc', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (240, 14, 'Ứng dụng giải thuật của phép biến đổi Fourier nhanh', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (241, 17, 'Nâng cao kỹ năng làm việc nhóm.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (242, 17, 'Phát triển kỹ năng giải quyết vấn đề.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (243, 17, 'Phát triển kỹ năng lập trình matlab.', 23);
INSERT INTO `table_chuandaura_monhoc` VALUES (255, 19, 'Nhớ được các khái niệm, thuật ngữ cơ bản của kinh tế vĩ mô.', 35);
INSERT INTO `table_chuandaura_monhoc` VALUES (256, 21, 'Hiểu được các vấn đề kinh tế vĩ mô như Hệ thống đo lường quốc gia, mô hình AD-AS, thất nghiệp và lạm phát, các chính sách kinh tế vĩ mô; Từ đó giải thích được các biến động trong nền kinh tế vĩ mô cũng như tác động của biến động trong môi trường kinh tế vĩ mô tới hoạt động doanh nghiệp.', 35);
INSERT INTO `table_chuandaura_monhoc` VALUES (257, 22, 'Vận dụng được các kiến thức đã học để giải các bài tập tình huống.', 35);
INSERT INTO `table_chuandaura_monhoc` VALUES (258, 22, 'Vận dụng được các kỹ năng giao tiếp, làm việc nhóm, kỹ năng giải quyết vấn đề.', 35);
INSERT INTO `table_chuandaura_monhoc` VALUES (281, 13, 'Mô tả mô hình và nghi thức giao tiếp trong mạng truyền số liệu.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (282, 13, 'Phân biệt được tín hiệu tương tự và tín hiệu số.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (283, 15, 'So sánh các kỹ thuật mã hóa và điều chếdữ liệu.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (284, 15, 'Xây dựng và tính toán được các yếu tố ảnh hưởng tới các dạng đường truyền khác nhau.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (285, 16, 'Mô tả được kỹ thuật phát hiện lỗi và sửa lỗi, kỹ thuật điều khiểu dòng dữ liệu và liên kết dữ liệu.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (286, 16, 'So sánh kỹ thuật truyền dữ liệu đồng bộ và bất đồng bộ.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (287, 17, 'Nâng cao kỹ năng làm việc nhóm.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (288, 17, 'Phát triển kỹ năng giải quyết vấn đề.', 36);
INSERT INTO `table_chuandaura_monhoc` VALUES (295, 15, 'Hiểu được lịch sử và cấu trúc hệ điều hành', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (296, 16, 'Phân biệt giữa tiến trình và tiểu tình. Hiểu được giao tiếp giữa các tiến trình. Liệt kê các thuật toán điều phối tiến trình.', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (297, 16, 'Phân biệt giữa kỹ thuật phân trang và phân đoạn bộ nhớ. Trình bày các thuật toán phân trang.', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (298, 16, 'Phân biệt cách thức tổ chức tập tin và thư mục trên hệ thống. Liệt kê các kỹ thuật quản lý và tối ưu hệ thống tập tin.', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (299, 17, 'Trình bày các nguyên tắc vào/ra phần cứng và phần mềm.', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (300, 17, 'Trình bày các nguyên nhân dẫn đến deadlock và cách thức ngăn chặn hoặc tránh deadlock.', 37);
INSERT INTO `table_chuandaura_monhoc` VALUES (301, 15, 'Hiểu được kiến thức tổng quan về kiến trúc máy tính', 38);
INSERT INTO `table_chuandaura_monhoc` VALUES (302, 15, 'Nắm vững kiến thức cơ bản bộ nhớ, CPU, I/O, Assembler', 38);
INSERT INTO `table_chuandaura_monhoc` VALUES (303, 16, 'Áp dụng kiến thức để giải quyết các bài toán xử lý tính toán, tối ưu hệ thống máy tính.', 38);
INSERT INTO `table_chuandaura_monhoc` VALUES (304, 17, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy logic, giao tiếp và tự học.', 38);
INSERT INTO `table_chuandaura_monhoc` VALUES (305, 17, 'Rèn luyện thái độ và trách nhiệm trong học tập.', 38);
INSERT INTO `table_chuandaura_monhoc` VALUES (324, 20, 'Nắm bắt và hiểu rõ và trình bày được những kiến thức cơ bản trong hoạt động quản trị', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (325, 21, 'Giái thích và tóm tắt được các nội dung liên quan đến hoạt động quản trị.', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (326, 22, 'Áp dụng những kiến thức đã học để xây dựng một kế hoạch cho hoạt động quản trị, thiết kế bộ máy tổ chức, lãnh đạo và kiểm tra hoạt động của tổ chức', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (327, 23, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm…', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (328, 23, 'Có ý thức, trách nhiệm trong công việc và tác phong nghề nghiệp đúng chuẩn mực, chuyên nghiệp.', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (329, 24, 'Phát triển được kỹ năng đọc, hiểu các tài liệu chuyên ngành bằng tiếng Anh', 39);
INSERT INTO `table_chuandaura_monhoc` VALUES (330, 12, 'Mô tả, nhận diện được các phần tử cơ bản, các nguyên tắc điều khiển và các phương pháp mô tả toán học của hệ thống điều khiển tự động.', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (331, 12, 'Các phương pháp để khảo sát tính ổn định của hệ thống, đánh giá chất lượng hệ thống điều khiển và thiết kế hệ thống điều khiển liên tục.', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (332, 14, 'Rèn luyện kỹ năng phân tích hệ thống, nhận diện các nguyên tắc điều khiển, các khâu động học cơ bản, mô tả toán học các hệ thống điều khiển tự động.', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (333, 15, '- Xác định được các tiêu chuẩn xét ổn định, phân tích chất lượng hệ thống và tổng hợp thiết kế hệ thống điều khiển tự động.', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (334, 17, 'Rèn luyện được tác phong làm việc tỉ mỉ, nghiêm túc, chủ động, tích cực, chăm chỉ, cẩn thận, chủ động trong học tập, hoàn thành nhiệm vụ học tập.', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (335, 17, 'Có tính trung thực và có trách nhiệm trong quá trình làm bài tập cá nhân, làm bài tập nhóm và làm bài kiểm tra. Thực hiện các nhiệm vụ được giao đúng thời gian quy định..', 20);
INSERT INTO `table_chuandaura_monhoc` VALUES (336, 12, 'Mô tả được sự giống nhau và khác nhau giữa những hệ thống phân bố chuẩn so với hệ thống di động và cảm biến', 40);
INSERT INTO `table_chuandaura_monhoc` VALUES (337, 13, 'Diễn giải những vấn đề cơ bản để cân bằng sự hạn chế về năng lượng và nhu cầu giao tiếp trên các hệ thống di động và cảm biến', 40);
INSERT INTO `table_chuandaura_monhoc` VALUES (338, 15, 'asdasdasa', 40);
INSERT INTO `table_chuandaura_monhoc` VALUES (351, 4, 'Hiểu các khái niệm cơ bản, lịch sử phát triển của Công nghệ phần mềm', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (352, 4, 'Hiểu được các mô hình phát triển phần mềm, cách lựa chọn mô hình phù hợp với dự án.', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (353, 4, 'Hiểu về kiểm thử & các kỹ thuật kiểm thử', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (354, 4, 'Hiểu về triển khai & bảo trì phần mềm', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (355, 5, 'Hiểu về yêu cầu và phương pháp thu thập yêu cầu', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (356, 5, 'Hiểu về các phương pháp phân tích & đặc tả yêu cầu', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (357, 5, 'Hiểu về lập trình & các phương pháp lập trình', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (358, 5, 'Hiểu về phương pháp quản lý dự án phần mềm', 44);
INSERT INTO `table_chuandaura_monhoc` VALUES (366, 1, 'Nắm được các khái niệm cơ bản về hệ cơ sở dữ liệu phân tán; so sánh được những ưu và hạn chế giữa cơ sở dữ liệu tập trung và cơ sở dữ liệu phân tán.', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (367, 1, 'Có kiến về các hướng thức tiếp cận và thiết kế một cơ sở dữ liệu phân tán: các phương pháp phân mãnh dữ liệu, nhân bản, điều khiển đồng thời; quản lý giao tác, kiểm soát dữ liệu ngữ nghĩa và truy vấn phân tán', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (368, 2, 'Có kiến thức về ứng dụng của CSDL phân tán trong quản lý các tổ chức doanh nghiệp', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (369, 4, 'Truy vấn và cập nhật đồng bộ dữ liệu trên các database server.', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (370, 5, 'Cài đặt được cơ sở dữ liệu phân tán cho bài toán trên một hệ quản trị CSDL(SQL Server, DB2 IBM, Oracle…)', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (371, 6, 'Có kỹ năng làm việc nhóm, kỹ năng thuyết trình một đề tài.', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (372, 6, 'Biết tối ưu hóa truy vấn phân tán.', 45);
INSERT INTO `table_chuandaura_monhoc` VALUES (377, 1, 'a', 47);
INSERT INTO `table_chuandaura_monhoc` VALUES (386, 12, 'Mô tả được sự giống nhau và khác nhau giữa những hệ thống phân bố chuẩn so với hệ thống di động và cảm biến', 17);
INSERT INTO `table_chuandaura_monhoc` VALUES (387, 13, 'Diễn giải những vấn đề cơ bản để cân bằng sự hạn chế về năng lượng và nhu cầu giao tiếp trên các hệ thống di động và cảm biến', 17);
INSERT INTO `table_chuandaura_monhoc` VALUES (388, 20, 'Nắm bắt và hiểu rõ và trình bày được những kiến thức cơ bản trong hoạt động quản trị', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (389, 21, 'Giái thích và tóm tắt được các nội dung liên quan đến hoạt động quản trị.', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (390, 22, 'Áp dụng những kiến thức đã học để xây dựng một kế hoạch cho hoạt động quản trị, thiết kế bộ máy tổ chức, lãnh đạo và kiểm tra hoạt động của tổ chức', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (391, 23, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm…', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (392, 23, 'Có ý thức, trách nhiệm trong công việc và tác phong nghề nghiệp đúng chuẩn mực, chuyên nghiệp.', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (393, 24, 'Phát triển được kỹ năng đọc, hiểu các tài liệu chuyên ngành bằng tiếng Anh', 48);
INSERT INTO `table_chuandaura_monhoc` VALUES (395, 4, 'Hiểu được các khái niệm, cấu trúc, cú pháp của ngôn ngữ Ruby', 50);
INSERT INTO `table_chuandaura_monhoc` VALUES (396, 4, 'Hiểu được các khái niệm, phương pháp, kỹ thuật lập trình với Ruby On Rails', 50);
INSERT INTO `table_chuandaura_monhoc` VALUES (397, 5, 'Áp dụng được các phương pháp, cấu trúc và cú pháp của Ruby cũng như Ruby On Rails để phát triển được một phần mềm thực tế.', 50);
INSERT INTO `table_chuandaura_monhoc` VALUES (398, 5, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm và kỹ năng giải quyết vấn đề.', 50);
INSERT INTO `table_chuandaura_monhoc` VALUES (399, 6, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 50);
INSERT INTO `table_chuandaura_monhoc` VALUES (408, 1, 'Hiểu rõ kiến trúc và nguyên lý hoạt động của các mô hình mạng thông dụng', 54);
INSERT INTO `table_chuandaura_monhoc` VALUES (409, 2, 'Sử dụng được các mô hình peer-to-peer, client/server, mô hình phân tán trong lập trình mạng', 54);
INSERT INTO `table_chuandaura_monhoc` VALUES (410, 2, 'Sử dụng được các giao thức TCP, UDP, HTTP, FTP, POP3 trong lập trình mạng để xây dựng các ứng dụng chạy trên môi trường internet', 54);
INSERT INTO `table_chuandaura_monhoc` VALUES (411, 5, 'Phân tích được nguyên lý hoạt động của các tiến trình, các giao thức trong kỹ thuật lập trình mạng', 54);
INSERT INTO `table_chuandaura_monhoc` VALUES (412, 5, 'Xây dựng được các chương trình hội thoại, trình duyệt, web server, mail server, FTP server', 54);
INSERT INTO `table_chuandaura_monhoc` VALUES (413, 1, 'Hiểu và vận dụng logic, các loại quan hệ tương đương, thứ tự, các nguyên lý và cấu hình tổ hợp cơ bản.', 55);
INSERT INTO `table_chuandaura_monhoc` VALUES (414, 4, 'Nhận dạng được các bài toán cơ bản và sử dụng phương pháp phù hợp để giải quyết.', 55);
INSERT INTO `table_chuandaura_monhoc` VALUES (415, 5, 'Ứng dụng được các kiến thức cơ bản của đồ thị để giải quyết các bài toán.', 55);
INSERT INTO `table_chuandaura_monhoc` VALUES (416, 5, 'Lập trình để giải quyết một số bài toán.', 55);
INSERT INTO `table_chuandaura_monhoc` VALUES (417, 6, 'Nghiêm túc, tự giác học tập, làm việc độc lập, làm việc theo nhóm.', 55);
INSERT INTO `table_chuandaura_monhoc` VALUES (418, 4, 'Hiểu được các định nghĩa về dữ liệu và cơ sở dữ liệu.', 56);
INSERT INTO `table_chuandaura_monhoc` VALUES (419, 4, 'Hiểu được quan hệ dữ liệu và các phép toán tương ứng.', 56);
INSERT INTO `table_chuandaura_monhoc` VALUES (420, 5, 'Vận dụng kiến thức để thực hiện các phép toán quan hệ.', 56);
INSERT INTO `table_chuandaura_monhoc` VALUES (421, 5, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp.', 56);
INSERT INTO `table_chuandaura_monhoc` VALUES (422, 6, 'Áp dụng được kiến thức đã học để truy vấn dữ liệu từ đó giải quyết các bài toán liên quan.', 56);
INSERT INTO `table_chuandaura_monhoc` VALUES (423, 2, 'Sử dụng được tiếng Anh để tìm kiếm, đọc hiểu tài liệu chuyên ngành', 57);
INSERT INTO `table_chuandaura_monhoc` VALUES (424, 2, 'Sử dụng được tiếng Anh để trình bày các vấn đề liên quan đến chuyên ngành', 57);
INSERT INTO `table_chuandaura_monhoc` VALUES (425, 5, 'Sử dụng được tiếng Anh để giao tiếp trong công việc chuyên môn', 57);
INSERT INTO `table_chuandaura_monhoc` VALUES (426, 6, 'Kỹ năng làm việc nhóm', 57);
INSERT INTO `table_chuandaura_monhoc` VALUES (427, 4, 'Hiểu được các khái niệm và đặc trưng của lập trình hướng đối tượng', 58);
INSERT INTO `table_chuandaura_monhoc` VALUES (428, 5, 'Sử dụng thành thạo ngôn ngữ lập trình Java ở mức độ cơ bản', 58);
INSERT INTO `table_chuandaura_monhoc` VALUES (429, 5, 'Áp dụng được phương pháp lập trình hướng đối tượng và ngôn ngữ lập trình Java để phát triển phần mềm.', 58);
INSERT INTO `table_chuandaura_monhoc` VALUES (430, 6, 'Rèn luyện thái độ và trách nhiệm trong học tập, làm việc độc lập hoặc theo nhóm.', 58);
INSERT INTO `table_chuandaura_monhoc` VALUES (431, 1, 'Rèn luyện thái độ nghiêm túc, tự giác và trách nhiệm trong học tập.', 59);
INSERT INTO `table_chuandaura_monhoc` VALUES (432, 2, 'Nắm vững các khái niệm về ngôn ngữ hình thức, văn phạm, ô-tô-mát, biểu chức chính quy.', 59);
INSERT INTO `table_chuandaura_monhoc` VALUES (433, 4, 'Biểu diễn được ô-tô-mát hữu hạn; xây dựng được ô-tô-mát hữu hạn, ô-tô-mát đẩy xuống đoán nhận ngôn ngữ đã cho và ngược lại.', 59);
INSERT INTO `table_chuandaura_monhoc` VALUES (434, 5, 'Xây dựng được biểu thức chính quy biểu diễn ngôn ngữ chính quy và ngược lại; xây dựng NFA và DFA tương ứng biểu thức chính quy; xây dựng NFA từ văn phạm chính quy và ngược lại; cực tiểu hóa DFA; giản lược được văn phạm phi ngữ cảnh để đưa về dạng chuẩn.', 59);
INSERT INTO `table_chuandaura_monhoc` VALUES (435, 5, 'Xây dựng được máy Turing để tính toán hàm đã cho.', 59);
INSERT INTO `table_chuandaura_monhoc` VALUES (436, 2, 'Hiểu các khái niệm cơ bản liên quan đến dự án và quản lý dự án phần mềm', 60);
INSERT INTO `table_chuandaura_monhoc` VALUES (437, 2, 'Nắm và vận dụng các kỹ thuật về chuẩn bị dự án, lập kế hoạch, phân bổ tài nguyên, kiểm soát, xử lý xung đột, điều hành và đóng dự án phần mềm.', 60);
INSERT INTO `table_chuandaura_monhoc` VALUES (438, 4, 'Hiểu các khái niệm cơ bản về phương pháp quản lý dự án theo quy trình phát triển phần mềm truyền thống (Waterfall model, Spiral Model,...), hoặc theo quy trình phát triển phần mềm Agile.', 60);
INSERT INTO `table_chuandaura_monhoc` VALUES (439, 5, 'Vận dụng các kiến thức về quản trị dự án phần mềm cho dự án theo quy trình theo Plan-Driven hoặc Agile.', 60);
INSERT INTO `table_chuandaura_monhoc` VALUES (440, 1, 'Kỹ năng làm việc nhóm', 61);
INSERT INTO `table_chuandaura_monhoc` VALUES (441, 4, 'Hiểu được các kiến thức căn bản về HCI.', 61);
INSERT INTO `table_chuandaura_monhoc` VALUES (442, 5, 'Vận dụng được các nguyên tắc và kỹ thuật trong HCI\r\nvào việc thiết kế UI/UX', 61);
INSERT INTO `table_chuandaura_monhoc` VALUES (443, 5, 'Thiết kế được phần mềm dựa trên các nguyên tắc và kỹ thuật trong HCI.', 61);
INSERT INTO `table_chuandaura_monhoc` VALUES (444, 2, 'Đánh giá được tài liệu phân tích và thiết kế hướng đối tượng một hệ thống cụ thể.', 62);
INSERT INTO `table_chuandaura_monhoc` VALUES (445, 4, 'Phân tích và thiết kế hướng đối tượng các bài toán thực tế.', 62);
INSERT INTO `table_chuandaura_monhoc` VALUES (446, 5, 'Vận dụng được các kỹ năng làm việc nhóm, kỹ năng giao tiếp, kỹ năng quản lý thời gian, kỹ năng giải quyết vấn đề.', 62);
INSERT INTO `table_chuandaura_monhoc` VALUES (447, 6, 'Hình thành thái độ học tập tích cực, đạo đức nghề nghiệp', 62);
INSERT INTO `table_chuandaura_monhoc` VALUES (448, 4, 'Lập trình thành thạo, biết khai thác các công cụ, thư viện hỗ trợ', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (449, 5, 'Hiểu, cài đặt được các thuật toán 2D', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (450, 5, 'Hiểu, xây dựng và mô phỏng được các đối tượng 3D cơ bản', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (451, 5, 'Vận dụng được các kỹ thuật đồ họa nâng cao (khử khuất, tô bóng,…)', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (452, 5, 'Vận dụng và phát triển các kỹ thuật đồ họa đã học để giải quyết các vấn đề thực tế trong cuộc sống', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (453, 6, 'Biết tìm đọc tài liệu, tự học, làm việc nhóm.', 63);
INSERT INTO `table_chuandaura_monhoc` VALUES (454, 4, 'Hiểu các khái niệm, nguyên lý cơ bản trong thị giác máy tính. Sử dụng được các công cụ, thư viện hỗ trợ', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (455, 4, 'Hiểu và vận dụng được các kỹ thuật phân đoạn ảnh; trích chọn đặc trưng', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (456, 4, 'Hiểu và vận dụng được các kỹ thuật so khớp và phân lớp ảnh', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (457, 5, 'Vận dụng hiệu quả các kỹ thuật trong thị giác máy tính, nhận dạng ảnh để giải quyết bài toán thực tế', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (458, 5, 'Xây dựng, phát triển mô hình thông minh liên quan đến nhận dạng ảnh, video, đánh giá độ chính xác mô hình', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (459, 6, 'Biết tìm đọc tài liệu, tự học, làm việc nhóm', 64);
INSERT INTO `table_chuandaura_monhoc` VALUES (460, 4, 'Hiểu và cài đặt được các thuật toán tìm kiếm sử dụng cấu trúc dữ liệu phù hợp', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (461, 4, 'Hiểu và sử dụng được các phương pháp biểu diễn và lập luận tri thức cơ bản', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (462, 4, 'Hiểu và vận dụng được một số giải thuật cơ bản để lập trình cho máy tính tự học', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (463, 5, 'Vận dụng đuợc các thuật toán tìm kiếm để giải quyết bài toán cụ thể', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (464, 5, 'Sử dụng các thuật toán, phương pháp đã học để xây dựng được ứng dụng thông minh', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (465, 6, 'Biết tìm đọc tài liệu, sử dụng các công cụ hỗ trợ,  tự học, làm việc nhóm', 65);
INSERT INTO `table_chuandaura_monhoc` VALUES (466, 2, 'Hiểu được kiến thức tổng quan về tin học', 66);
INSERT INTO `table_chuandaura_monhoc` VALUES (467, 2, 'Nắm vững kiến thức cơ bản của ngôn ngữ lập trình C++.', 66);
INSERT INTO `table_chuandaura_monhoc` VALUES (468, 4, 'Áp dụng kiến thức để giải quyết các bài toán tin học', 66);
INSERT INTO `table_chuandaura_monhoc` VALUES (469, 5, 'Rèn luyện các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học.', 66);
INSERT INTO `table_chuandaura_monhoc` VALUES (470, 5, 'Rèn luyện thái độ và trách nhiệm trong học tập.', 66);
INSERT INTO `table_chuandaura_monhoc` VALUES (471, 1, 'a', 67);
INSERT INTO `table_chuandaura_monhoc` VALUES (472, 5, 'Phân tích những quan điểm cơ bản của chủ nghĩa Mác - Lênin về sứ mệnh lịch sử của giai cấp công nhân; cơ cấu xã hội - giai cấp trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.', 68);
INSERT INTO `table_chuandaura_monhoc` VALUES (473, 6, 'Giải quyết được các vấn đề về chủ nghĩa xã hội, thời kỳ quá độ lên chủ nghĩa xã hội; các vấn đề về dân chủ xã hội chủ nghĩa và nhà nước xã hội chủ nghĩa dựa trên quan điểm của chủ nghĩa Mác - Lênin.', 68);
INSERT INTO `table_chuandaura_monhoc` VALUES (474, 38, 'Giải thích được quan điểm của chủ nghĩa Mác-Lênin về các vấn đề dân tộc, tôn giáo và gia đình trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.', 68);
INSERT INTO `table_chuandaura_monhoc` VALUES (475, 5, 'Tính được các phép toán trên ma trận, tính được định thức,  tìm được ma trận nghịch đảo. Giải được hệ phương trình tuyến tính. Tìm được trị riêng, vecto riêng. Đưa được dạng toàn phương về dạng chính tắc.', 46);
INSERT INTO `table_chuandaura_monhoc` VALUES (476, 6, 'Ứng dụng được lý thuyết toán học vào chuyên ngành, đưa các bài toán thực tế về bài toán giải được bằng toán học.', 46);
INSERT INTO `table_chuandaura_monhoc` VALUES (477, 38, 'Vận dụng được các kỹ năng giao tiếp, kỹ năng tư duy, làm việc nhóm. Phát triển thêm khả năng tư duy  như phân tích, so sánh, tổng hợp.', 46);
INSERT INTO `table_chuandaura_monhoc` VALUES (478, 5, 'Trình bày được các kiến thức cơ bản của xác suất bao gồm: không gian mẫu, các định nghĩa xác suất của biến cố, các công thức tính xác suất, biến ngẫu nhiên và một số quy luật phân phối xác suất thông dụng', 69);
INSERT INTO `table_chuandaura_monhoc` VALUES (479, 6, 'Viết được các công thức tính xác suất.', 69);
INSERT INTO `table_chuandaura_monhoc` VALUES (480, 6, 'Tính xác suất của một số bài toán xác suất cơ bản trong toán học.', 69);
INSERT INTO `table_chuandaura_monhoc` VALUES (481, 38, 'Phân biệt được các phương pháp giải các bài toán xác suất.', 69);
INSERT INTO `table_chuandaura_monhoc` VALUES (482, 5, 'Trình bày được đặc điểm, bản chất và các quy luật vận động của kinh tế thị trường; kinh tế thị trường tư bản chủ nghĩa; kinh tế thị trường định hướng xã hội chủ nghĩa và các quan hệ lợi ích kinh tế ở Việt Nam; quá trình công nghiệp hóa, hiện đại hóa và hội nhập kinh tế quốc tế của Việt Nam.', 70);
INSERT INTO `table_chuandaura_monhoc` VALUES (483, 6, 'Xây dựng được hệ thống tri thức kinh tế chính trị của môn học để giải quyết những vấn đề liên quan trong cuộc sống.', 70);
INSERT INTO `table_chuandaura_monhoc` VALUES (484, 38, 'Phân tích được quy luật vận động của các mô hình kinh tế; quan hệ lợi ích kinh tế; quá trình công nghiệp hóa và hội nhập kinh tế quốc tế trong tiến trình phát triển kinh tế - xã hội của Việt Nam.', 70);
INSERT INTO `table_chuandaura_monhoc` VALUES (485, 5, 'Trình bày được các kiến thức cơ bản về quá trình Đảng lãnh đạo cuộc đấu tranh giành chính quyền (1930-1945), lãnh đạo hai cuộc kháng chiến chống thực dân Pháp và đế quốc Mỹ xâm lược, hoàn thành giải phóng dân tộc, thống nhất đất nước (1945-1975), lãnh đạo cả nước tiến lên chủ nghĩa xã hội và tiến hành công cuộc đổi mới (1975-2018)', 71);
INSERT INTO `table_chuandaura_monhoc` VALUES (486, 6, 'Áp dụng các kinh nghiệm về sự lãnh đạo cách mạng của Đảng để giúp người học nâng cao nhận thức, niềm tin đối với Đảng và khả năng vận dụng kiến thức đã học vào thực tiễn công tác, góp phần xây dựng và bảo vệ Tổ quốc Việt Nam xã hội chủ nghĩa.', 71);
INSERT INTO `table_chuandaura_monhoc` VALUES (487, 38, 'Phân tích được những sáng tạo cơ bản của Đảng về lý luận và chỉ đạo thực tiễn cách mạng Việt Nam.', 71);
INSERT INTO `table_chuandaura_monhoc` VALUES (488, 5, 'Phân tích những vấn đề cơ bản về nhà nước và pháp luật.', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (489, 5, 'So sánh các cơ quan nhà nước trong Bộ máy Nhà nước Việt Nam.', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (490, 5, 'Phân tích các vấn đề về quy phạm pháp luật, quan hệ pháp luật, vi phạm pháp luật, thực hiện pháp luật, trách nhiệm pháp lí.', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (491, 6, 'Trình bày các vấn đề về hệ thống pháp luật, ý thức pháp luật và pháp chế.', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (492, 38, 'Đánh giá các vấn đề phòng chống tham nhũng', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (493, 38, 'Hình thành và phát triển kỹ năng tư duy logic, tự nghiên cứu; kỹ năng làm việc nhóm, thuyết trình, phản biện, có tinh thần thượng tôn pháp luật, có tinh thần trách nhiệm với công việc và với xã hội.', 72);
INSERT INTO `table_chuandaura_monhoc` VALUES (494, 5, 'Hiểu được sự hình thành và phát triển của chủ nghĩa Mác-Lênin, các nội dung cơ bản của phép biện chứng duy vật, chủ nghĩa duy vật lịch sử.', 73);
INSERT INTO `table_chuandaura_monhoc` VALUES (495, 6, 'Vận dụng được thế giới quan duy vật biện chứng vào trong quá trình nhận thức.', 73);
INSERT INTO `table_chuandaura_monhoc` VALUES (496, 38, 'Phân tích được các nội dung của chủ nghĩa duy vật biện chứng, phép biện chứng duy vật và chủ nghĩa duy vật lịch sử', 73);

SET FOREIGN_KEY_CHECKS = 1;
