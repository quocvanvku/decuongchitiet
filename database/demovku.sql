-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 04:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demovku`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_baidanhgia`
--

CREATE TABLE `table_baidanhgia` (
  `id` int(11) NOT NULL,
  `ten_baidanhgia` varchar(255) DEFAULT NULL,
  `id_thanhphandanhgia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_baidanhgia`
--

INSERT INTO `table_baidanhgia` (`id`, `ten_baidanhgia`, `id_thanhphandanhgia`) VALUES
(1, 'Điểm Danh', 1),
(2, 'Bài tập trên lớp ', 2),
(3, 'Báo cáo mô tả bài tập nhóm', 2),
(4, 'Kiểm tra giữa kì', 3),
(5, 'Thi cuối kì', 4),
(6, 'Thực hành/Thí nghiệm', 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_chuandaura_chung`
--

CREATE TABLE `table_chuandaura_chung` (
  `id_cdr_chung` int(11) NOT NULL,
  `ten_plo` int(11) DEFAULT NULL,
  `noidung_cdr_chung` varchar(255) DEFAULT NULL,
  `id_khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_chuandaura_chung`
--

INSERT INTO `table_chuandaura_chung` (`id_cdr_chung`, `ten_plo`, `noidung_cdr_chung`, `id_khungchuongtrinh`) VALUES
(1, 1, 'day la plo 1 da', 142),
(2, 2, 'day la plo 2', 142),
(3, 3, 'day la plo', 142),
(4, 1, 'plo 143', 143),
(5, 1, 'Có khả năng áp dụng kiến thức về lĩnh vực khoa học dữ liệu và trí tuệ nhân tạo để giải quyết các bài toán phân tích dữ liệu, dự báo', 154),
(6, 1, 'Có đạo đức và trách nhiệm đối với nghề nghiệp, cộng đồng', 149),
(7, 2, 'Có khả năng giao tiếp và làm việc theo nhóm hiệu quả', 149),
(8, 2, 'Có khả năng nghiên cứu phát triển công cụ phân tích dữ liệu và hệ thống thông minh.', 154),
(11, 1, 'plo cntt 2019 1', 146),
(12, 2, 'plo cntt 2019 2', 146),
(13, 3, 'Có tư duy phản biện, sáng tạo, khởi nghiệp', 149),
(14, 4, 'Có khả năng sử dụng tiếng Anh tốt trong lĩnh vực CNTT (đạt chuẩn tiếng Anh tương đương TOEIC 500)', 149),
(15, 5, 'Có khả năng vận dụng các kiến thức về khoa học tự nhiên, khoa học xã hội, CNTT để giải quyết các vấn đề cơ bản', 149),
(16, 6, 'Có khả năng thiết kế, phát triển sản phẩm CNTT cơ bản', 149),
(17, 1, 'Có khả năng phân tích, áp dụng các quy trình, kỹ thuật và công cụ phát triển phần mềm', 156),
(18, 2, 'Có khả năng lập kế hoạch, tổ chức và quản lý thực hiện dự án CNTT', 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_chuandaura_chung_chitiet`
--

CREATE TABLE `table_chuandaura_chung_chitiet` (
  `id_cdr_chitiet` int(11) NOT NULL,
  `noidung_cdr_chitiet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cdr_chung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_chuandaura_chung_chitiet`
--

INSERT INTO `table_chuandaura_chung_chitiet` (`id_cdr_chitiet`, `noidung_cdr_chitiet`, `id_cdr_chung`) VALUES
(1, 'Trung thực đối với công việc.', 6),
(2, 'Có trách nhiệm đối với công việc và cộng đồng.', 6),
(10, 'Tuân thủ các quy định, quy trình kỹ thuật và quy tắc an toàn trong khi thực hiện công việc.', 6),
(11, 'Trình bày, thuyết trình các vấn đề  hiệu quả', 7),
(12, 'Soạn thảo văn bản, báo cáo có cấu trúc hợp lý và đúng quy định.', 7),
(13, 'Làm việc nhóm hiệu quả', 7),
(14, 'Nhận xét, đánh giá được báo cáo khoa học', 13),
(15, 'Đề xuất được giải pháp công nghệ thông tin ứng với thực tiễn', 13),
(16, 'Xây dựng được đề án khởi nghiệp', 13),
(17, 'Viết và trình bày được bằng tiếng Anh trong lĩnh vực CNTT', 14),
(18, 'Đạt chuẩn tiếng Anh tương đương TOEIC 500', 14),
(19, 'Vận dụng được các kiến thức về KHTN, CNTT để giải quyết các bài toán ứng dụng CNTT', 15),
(20, 'Vận dụng được các kiến thức về KHXH vào trong công việc thực tế', 15),
(21, 'Sử dụng thành thạo một số phương pháp, ngôn ngữ lập trình phổ biến', 16),
(22, 'Phân tích và thiết kế hệ thống hoàn chỉnh cho sản phẩm phần mềm vừa và nhỏ', 16),
(23, 'Xây dựng và quản trị được  một CSDL hoàn chỉnh cho một phần mềm ứng dụng', 16),
(24, 'Áp dụng được các quy trình, tiêu chuẩn trong quy trình phát triển phần mềm', 17),
(25, 'Thiết kế được kiến trúc các hệ thống phần mềm', 17),
(26, 'Lựa chọn được công nghệ, công cụ, thuật toán phù hợp', 17),
(27, 'Lập được kế hoạch dự án CNTT', 18),
(28, 'Tổ chức, quản lý được các dự án CNTT', 18),
(29, 'Tổng kết, đánh giá được các dự án CNTT', 18),
(32, 'PI 1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `table_chuandaura_monhoc`
--

CREATE TABLE `table_chuandaura_monhoc` (
  `id` int(11) NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci,
  `id_hocphan` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_chuandaura_monhoc`
--

INSERT INTO `table_chuandaura_monhoc` (`id`, `stt`, `noi_dung`, `id_hocphan`, `khungchuongtrinh`) VALUES
(4, 1, 'chuan dau ra 1', 12, 142),
(5, 2, 'chuan dau ra 2', 12, 142),
(6, 1, 'clo 1', 3, 142),
(7, 2, 'clo 2', 3, 142),
(8, 1, 'clo tacn 1', 13, 146),
(9, 2, 'clo tacn 2', 13, 146),
(10, 1, 'clo tacn 1', 13, 142),
(11, 2, 'clo tacn 2', 13, 142),
(12, 3, 'clo tacn 3', 13, 142),
(13, 1, 'clo 111', 12, 156),
(14, 2, 'clo 222', 12, 156),
(17, 1, 'clo 111', 12, 157),
(18, 2, 'clo 222', 12, 157),
(19, 1, 'Trình bày, giải thích được các cấu trúc dữ liệu và thuật toán cơ bản.', 15, 156),
(20, 2, 'Vận dụng được kỹ năng giao tiếp, kỹ năng tư duy và giải quyết vấn đề', 15, 156),
(21, 3, 'Áp dụng được các cấu trúc dữ liệu và kỹ thuật thiết kế giải thuật để giải quyết các bài toán tin học', 15, 156),
(22, 4, 'Phát triển ý thức làm việc trong môi trường chuyên nghiệp', 15, 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_danhgiahocphan`
--

CREATE TABLE `table_danhgiahocphan` (
  `id` int(11) NOT NULL,
  `phuongphapdanhgia` varchar(255) DEFAULT NULL,
  `trongsobaidanhgia` int(11) DEFAULT NULL,
  `cdr_hocphan` varchar(255) DEFAULT NULL,
  `id_baidanhgia` int(11) DEFAULT NULL,
  `id_baidanhgia_parent` int(11) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_danhgiahocphan`
--

INSERT INTO `table_danhgiahocphan` (`id`, `phuongphapdanhgia`, `trongsobaidanhgia`, `cdr_hocphan`, `id_baidanhgia`, `id_baidanhgia_parent`, `id_hocphan`, `khungchuongtrinh`) VALUES
(221, 'Kiểm tra chuyên cần', 100, '6', 5, 1, 114, 146),
(222, 'Chấm bài kiểm tra', 100, '6', 6, 2, 114, 146),
(223, 'Viết', 100, '1_2_3_4_7', 8, 3, 114, 146),
(224, 'Vấn đáp', 50, '1_2_3_4_5_6_7', 9, 4, 114, 146),
(225, 'Bài tập nhóm', 50, '1_2_3_4_5_6_7', 10, 4, 114, 146),
(226, 'Điểm danh', 100, '5', 5, 1, 47, 146),
(227, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 47, 146),
(228, 'Tự luận', 100, '1_2_3', 8, 3, 47, 146),
(229, 'Bài tập lớn', 100, '1_2_3_4_5', 9, 4, 47, 146),
(238, 'Điểm danh', 100, '1', 5, 1, 51, 146),
(239, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 51, 146),
(240, 'Bài thực hành', 100, '1_2', 8, 3, 51, 146),
(241, 'Cuốn báo cáo và trình bày tại lớp', 100, '1_2_3_4_5', 9, 4, 51, 146),
(250, 'Trình bày tại lớp/Trắc nghiệm', 30, '1_2_6', 6, 2, 112, 146),
(251, 'Cuốn báo cáo và trình bày tại lớp', 70, '1_2_3', 7, 2, 112, 146),
(252, 'Tự luận', 100, '1_2_3', 8, 3, 112, 146),
(253, 'Bài tập lớn', 100, '1_2_3_4', 9, 4, 112, 146),
(278, 'diem danh', 100, '1_2_12', 5, 1, 92, 146),
(279, 'bai tap', 100, '1', 6, 2, 92, 146),
(280, 'giua ki', 100, '1', 8, 3, 92, 146),
(281, 'cuoi ki', 100, '1', 9, 4, 92, 146),
(333, 'Điểm danh.', 100, '1_2_4', 5, 1, 95, 146),
(334, 'Bai tap', 100, '', 6, 2, 95, 146),
(335, 'Trắc nghiệm và tự luận', 100, '1_2_3', 8, 3, 95, 146),
(336, 'a', 100, '1', 10, 4, 95, 146),
(343, 'a', 100, '1', 5, 1, 4, 146),
(344, 'b', 100, '1', 6, 2, 4, 146),
(345, 'c', 100, '1', 8, 3, 4, 146),
(346, 'd', 100, '1', 9, 4, 4, 146),
(353, 'Dựa vào % vắng học trên hệ thống điểm danh', 100, '1_2_3_4_5', 5, 1, 85, 146),
(354, 'Thực hành', 100, '1_2_3_4_5_6_7_8', 6, 2, 85, 146),
(355, 'Trắc nghiệm', 100, '1_2_3_4_5', 8, 3, 85, 146),
(356, 'Báo cáo đồ án môn học', 100, '1_2_3_4_5_6_7_8', 9, 4, 85, 146),
(359, 'a', 100, '1', 5, 1, 52, 146),
(360, 'n', 100, '1', 6, 2, 52, 146),
(369, 'a', 100, '1', 5, 1, 21, 146),
(370, 'b', 100, '1', 6, 2, 21, 146),
(371, 'c', 100, '1', 8, 3, 21, 146),
(372, 'd', 100, '1_6', 9, 4, 21, 146),
(399, 'Điểm danh', 100, '1_2', 5, 1, 111, 146),
(400, 'Trình bày tại lớp/Trắc nghiệm', 30, '1', 6, 2, 111, 146),
(401, 'Tự luận', 100, '1', 8, 3, 111, 146),
(402, 'Tự luận', 50, '1_2', 9, 4, 111, 146),
(407, 'a', 100, '1', 5, 1, 15, 146),
(408, 'b', 100, '1', 6, 2, 15, 146),
(409, 'c', 100, '1', 8, 3, 15, 146),
(410, 'd', 100, '1_2_3_4', 9, 4, 15, 146),
(415, 'Điểm danh', 100, '5', 5, 1, 47, 147),
(416, 'Trình bày tại lớp', 100, '1_2_3_4', 6, 2, 47, 147),
(417, 'Tự luận', 100, '1_2_3', 8, 3, 47, 147),
(418, 'Bài tập lớn', 100, '1_2_3_4_5', 9, 4, 47, 147),
(419, 'Điểm danh 1', 100, '1_5', 5, 1, 54, 146),
(420, 'Thực hành 1', 100, '1_5', 6, 2, 54, 146),
(421, 'Thực hành 1', 100, '1_5', 8, 3, 54, 146),
(422, 'Đồ án 1', 100, '1_5', 9, 4, 54, 146),
(431, 'Chuyên cần', 100, '1', 5, 1, 68, 146),
(432, 'Bài tập ngắn trên lớp', 50, '1', 6, 2, 68, 146),
(433, 'Bài tập về nhà cá nhân/nhóm', 50, '1', 7, 2, 68, 146),
(434, 'Thi trên máy', 100, '', 8, 3, 68, 146),
(435, 'Thi vấn đáp trên đồ án', 100, '', 9, 4, 68, 146),
(436, 'Giảng viên điểm danh người học tham gia học trên lớp.', 100, '5', 5, 1, 39, 146),
(437, 'Giảng viên chấm bài tập giao về nhà (nộp trên hệ thống elearning).', 100, '1_2_3_4_5', 6, 2, 39, 146),
(438, 'Giảng viên tổ chức cho người học làm bài kiểm tra (hình thức tự luận/vấn đáp/trắc nhiệm) tại lớp và chấm điểm.', 100, '1_4_5', 8, 3, 39, 146),
(439, 'Nhà trường tổ chức cho người học thi chung (hình thức tự luận/trắc nghiệm);\r\nKhoa tổ chức chấm thi chung', 100, '2_3_4_5', 9, 4, 39, 146),
(440, 'Đi học đầy đủ. Không được vắng không quá 20% tiết học.', 100, '3_4', 5, 1, 6, 146),
(441, 'Làm đúng và nộp bài đầy đủ bài tập', 50, '1_2_3_4_5', 6, 2, 6, 146),
(442, 'Làm đúng và nộp bài đầy đủ bài tập', 50, '1_2_3_4_5', 7, 2, 6, 146),
(443, 'Đáp ứng yêu cầu của đáp án', 100, '1_2_3_4_5', 8, 3, 6, 146),
(444, 'Đáp ứng yêu cầu của đáp án', 100, '3_4', 9, 4, 6, 146),
(445, 'chuyen can', 100, '', 5, 1, 13, 146),
(446, 'GV xác định các tình huống làm việc trong thực tiễn, giao bài tập lớn (dự án) cho các nhóm SV từ đầu HP', 100, '1_2', 6, 2, 13, 146),
(447, 'Thực hành', 100, '1_2_3_4', 8, 3, 13, 146),
(448, 'Thuyết trình', 100, '1_2_3_4', 9, 4, 13, 146),
(449, 'Điểm danh', 100, '4', 5, 1, 9, 146),
(450, 'Bài tập thực hành.', 100, '1_2_3', 6, 2, 9, 146),
(451, 'Thi trên máy, GV dạy tự tổ chức.', 100, '1_2_3', 8, 3, 9, 146),
(452, 'Thi vấn đáp trên bài tập lớn.', 100, '1_2_3', 9, 4, 9, 146),
(453, 'Chuyên cần', 100, '1', 5, 1, 64, 146),
(454, 'làm Bài tập', 100, '1_2_3_4_5', 6, 2, 64, 146),
(455, 'Kiểm tra giữa kỳ', 100, '1_2_3_5', 8, 3, 64, 146),
(456, 'Thi cuối kỳ', 100, '2_3_4_5', 9, 4, 64, 146),
(457, 'Đánh giá chuyên cần', 100, '', 5, 1, 69, 146),
(458, 'Đánh giá Bài tập (Bài tập cá nhân, trên lớp)', 100, '', 6, 2, 69, 146),
(459, 'Đánh giá bài thi giữa kỳ (Trắc nghiệm hoặc tự luận)', 100, '', 8, 3, 69, 146),
(460, 'Chấm báo cáo và vấn đáp', 100, '', 9, 4, 69, 146),
(461, 'Điểm danh', 100, '1', 5, 1, 99, 146),
(462, 'Bài tập lớn (bài tập thực hành)', 100, '1_2_3_4', 6, 2, 99, 146),
(463, 'Thi trên máy(thực hành)', 100, '1_2_3_4', 8, 3, 99, 146),
(464, 'Thi vấn đáp trên đồ án', 100, '1_2_3_4', 9, 4, 99, 146),
(465, 'Có ý thức tham gia học tập đầy đủ, hoàn thành đúng hạn các yêu cầu của giảng viên và tích cực phát biểu ý kiến', 100, '4', 5, 1, 36, 146),
(466, 'Thành phần đánh giá: GV đánh giá quá trình (2 đ), chấm báo cáo theo nhóm (3 đ), phần trình bày của từng SV (3 đ), câu hỏi (2 đ).', 100, '1_2_3_4', 6, 2, 36, 146),
(467, 'GV cho 1 bài toán  yêu cầu SV xây dựng BĐ ca sử dụng, BĐ lớp, thời gian 90 phút', 100, '1_2', 8, 3, 36, 146),
(468, '40 câu bằng tiếng Anh, thời gian 50 phút', 100, '1_2', 9, 4, 36, 146),
(469, 'Điểm danh', 100, '6', 5, 1, 67, 146),
(470, 'Kết quả các bài thực hành', 50, '1_2_3_4', 6, 2, 67, 146),
(471, 'Sản phẩm phần mềm và thuyết trình', 50, '1_5', 7, 2, 67, 146),
(472, 'Tự luận/vấn đáp', 100, '', 8, 3, 67, 146),
(473, 'Tự luận', 100, '', 9, 4, 67, 146),
(474, 'Điểm danh', 100, '6', 5, 1, 100, 146),
(475, 'Kết quả các bài thực hành', 100, '1_2_3_4', 6, 2, 100, 146),
(476, 'Kết quả \r\nbài tự luận', 100, '2_3_4_5', 8, 3, 100, 146),
(477, 'Sản phẩm phần mềm và thuyết trình', 100, '2_3_4_5', 9, 4, 100, 146),
(478, 'Điểm danh', 100, '6', 5, 1, 71, 146),
(479, 'Sản phẩm phần mềm và thuyết trình', 100, '2_5', 6, 2, 71, 146),
(480, 'Kết quả bài thực hành', 100, '2_3_4_5', 8, 3, 71, 146),
(481, 'Kết quả bài tự luận', 100, '2_3_4_5', 9, 4, 71, 146),
(482, 'Điểm danh sinh viên', 100, '5', 5, 1, 3, 146),
(483, 'Giảng viên chấm bài tập được giao về nhà cho sinh viên (nộp trên hệ elearning). Giảng viên chọn 05 bài để chấm, mỗi bài 2 điểm.', 100, '1_2_3_4_5', 6, 2, 3, 146),
(484, 'Giảng viên tổ chức cho sinh viên kiểm tra thực hành tại lớp. Đề kiểm tra bao gồm các phần nhập xuất, câu lệnh điều kiện, câu lệnh lặp.', 100, '1_2_3_4_5', 8, 3, 3, 146),
(485, 'Sinh viên thi lập trình trên máy tính, tổ chức thi chung theo kế hoạch của nhà trường, thực hiện chấm bài thi tự động.', 100, '1_2_3_4_5', 9, 4, 3, 146),
(490, 'Điểm danh', 100, '1_2_3_4_5', 5, 1, 91, 146),
(491, 'Bài thực hành', 100, '1_2_5', 6, 2, 91, 146),
(492, 'Xây dựng ứng dụng', 100, '1_2_3_4_5', 8, 3, 91, 146),
(493, 'Tự luận', 100, '1_2_3_4_5', 9, 4, 91, 146),
(494, 'Điểm danh', 100, '', 5, 1, 106, 146),
(495, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 106, 146),
(496, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2_3', 9, 4, 106, 146),
(497, 'Điểm danh', 100, '', 5, 1, 7, 146),
(498, 'Tự luận', 100, '1_3', 8, 3, 7, 146),
(499, 'Tự luận', 100, '1_2_3', 9, 4, 7, 146),
(500, 'Điểm danh, kiểm tra bài cũ, bài tập trên lớp', 100, '', 5, 1, 55, 146),
(501, 'Kiểm tra tự luận 50 phút trên lớp', 100, '1_2_3_4', 8, 3, 55, 146),
(502, 'Kiểm tra tự luận 60 phút trong phòng thi.', 100, '1_2_3_4', 9, 4, 55, 146),
(503, 'Điểm danh', 100, '', 5, 1, 105, 146),
(504, 'Nộp và chấm bài trực tiếp hoặc qua hệ thống Elearning', 100, '1_2_3', 8, 3, 105, 146),
(505, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 105, 146),
(506, 'Điểm danh', 100, '', 5, 1, 79, 146),
(507, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 79, 146),
(508, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 79, 146),
(509, 'Điểm danh', 100, '', 5, 1, 1, 146),
(510, 'Bài tập, thuyết trình nhóm tại lớp', 100, '1_2_3_4_5', 6, 2, 1, 146),
(511, 'Bài thi tự luận hoặc trắc nghiệm trên hệ thống Elearning', 100, '1_2_3_6', 8, 3, 1, 146),
(512, 'Bài thi tự luận cuối kỳ', 100, '1_2_3_4_5_6', 9, 4, 1, 146),
(513, 'Điểm danh', 100, '', 5, 1, 81, 146),
(514, 'Bài tập', 100, '', 6, 2, 81, 146),
(515, 'Nộp và chấm bài qua hệ thống Elearning', 100, '1_2', 8, 3, 81, 146),
(516, 'Theo kế hoạch của nhà trường', 100, '1_2_3', 9, 4, 81, 146),
(517, 'Chuyên cần', 100, '', 5, 1, 12, 146),
(518, 'Bài kiểm tra giữa kỳ (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp) hoặc Nói)', 100, '1_2_3_4', 8, 3, 12, 146),
(519, 'Bài thi cuối kỳ  (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp))', 100, '1_2_3_4', 9, 4, 12, 146),
(525, 'Chuyên cần', 100, '1', 5, 1, 31, 146),
(526, 'Bài tập lớn', 100, '1_2_3', 6, 2, 31, 146),
(527, 'Thi trên máy', 100, '1_2_3', 8, 3, 31, 146),
(528, 'Thi vấn đáp trên đồ án', 100, '1_2_3', 9, 4, 31, 146),
(532, 'Chuyên cần', 100, '', 5, 1, 12, 156),
(533, 'Bài kiểm tra giữa kỳ (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp) hoặc Nói)', 100, '1_2_3_4', 8, 3, 12, 156),
(534, 'Bài thi cuối kỳ  (Trắc nghiệm + Tự luận (Nghe – Đọc – Viết – Chức năng giao tiếp))', 100, '1_2_3_4', 9, 4, 12, 156),
(539, 'ab', 100, '1', 5, 1, 12, 142),
(540, 'bc', 100, '1', 6, 2, 12, 142),
(541, 'cd', 100, '2', 8, 3, 12, 142),
(542, 'de', 100, '1', 9, 4, 12, 142),
(553, 'a', 100, '1', 5, 1, 3, 142),
(554, 'b', 100, '1_2', 6, 2, 3, 142),
(555, 'c', 100, '1_2', 8, 3, 3, 142),
(556, 'de', 100, '1_2', 9, 4, 3, 142),
(561, 'chuyen can', 100, '1', 5, 1, 13, 142),
(562, 'GV xác định các tình huống làm việc trong thực tiễn, giao bài tập lớn (dự án) cho các nhóm SV từ đầu HP', 100, '1_2', 6, 2, 13, 142),
(563, 'Thực hành', 100, '1_2_3', 8, 3, 13, 142),
(564, 'Thuyết trình', 100, '1_2_3', 9, 4, 13, 142),
(565, 'Điểm danh', 100, '4', 5, 1, 15, 156),
(566, 'Chấm điểm bài TH', 100, '1_2_3_4', 6, 2, 15, 156),
(567, 'Bài thi tự luận', 100, '1_3', 8, 3, 15, 156),
(568, 'Bài thi trắc nghiệm', 100, '1_3', 9, 4, 15, 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_decuongchitiet`
--

CREATE TABLE `table_decuongchitiet` (
  `id_decuong` int(11) NOT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `phanbo_lythuyet` int(11) DEFAULT NULL,
  `phanbo_baitap` int(11) DEFAULT NULL,
  `phanbo_thuchanh` int(11) DEFAULT NULL,
  `phanbo_tuhoc` int(11) DEFAULT NULL,
  `giangvienphutrach_id` int(11) DEFAULT NULL,
  `gv_daycung` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khoaphutrach` int(11) DEFAULT NULL,
  `id_nganh` int(11) DEFAULT NULL,
  `loaihocphan` int(11) DEFAULT NULL,
  `khoikienthuc` int(11) DEFAULT NULL,
  `mota_tomtat` text COLLATE utf8_unicode_ci,
  `muctieu_kienthuc` text COLLATE utf8_unicode_ci,
  `muctieu_kynang` text COLLATE utf8_unicode_ci,
  `muctieu_thaido` text COLLATE utf8_unicode_ci,
  `nhiemvu` text COLLATE utf8_unicode_ci,
  `tailieuthamkhao_giaotrinh` text COLLATE utf8_unicode_ci,
  `tailieuthamkhao_sach` text COLLATE utf8_unicode_ci,
  `ngaypheduyet` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_decuongchitiet`
--

INSERT INTO `table_decuongchitiet` (`id_decuong`, `id_hocphan`, `phanbo_lythuyet`, `phanbo_baitap`, `phanbo_thuchanh`, `phanbo_tuhoc`, `giangvienphutrach_id`, `gv_daycung`, `khoaphutrach`, `id_nganh`, `loaihocphan`, `khoikienthuc`, `mota_tomtat`, `muctieu_kienthuc`, `muctieu_kynang`, `muctieu_thaido`, `nhiemvu`, `tailieuthamkhao_giaotrinh`, `tailieuthamkhao_sach`, `ngaypheduyet`, `khungchuongtrinh`) VALUES
(17, 111, 30, 10, 30, 90, 123, '148_110_1', 2, 3, 1, 4, 'Học phần giới thiệu những kiến thức cơ bản về mạng di động, hệ thống cảm biến và sự kết hợp của chúng. Học phần giúp sinh viên hiểu và nâng cao kỹ năng phân tích những vấn đề ràng buộc về năng lượng và tính di động trong việc thiết kế các hệ thống cảm biến di động.', 'Cở sở hạ tầng mạng di động\r\nKiến trúc hệ thống cảm biến\r\nMạng cảm biến không dây\r\nHệ thống cảm biến trên các thiết bị di động\r\nLập trình ứng dụng và mô phỏng trên các hệ thống cảm biến trên các thiết bị di động và mạng cảm biến không dây', 'Rèn luyện cho sinh viên kỹ năng tự nghiên cứu, kỹ năng làm việc nhóm thông qua các hoạt động và bài thực hành', 'Giúp sinh viên hình thành thái độ học tập tích cực, có đạo đức nghề nghiệp, tự chủ, tự chịu trách nhiệm trong giải quyết các vấn đề liên quan', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'D. Agrawal and Q. Zeng, Introduction to wireless and mobile systems, Cengage Learning, ISBN-10: 1-4390-6205-6, 2011.\r\nWaltenegus Dargie, Christian Poellabauer, Fundamentals of Wireless Sensor Networks: Theory and Practice, John Wiley & Sons Ltd, ISBN: 978-0-470-99765-9, 2010.', 'Pradeeka Seneviratne, Beginning LoRa Radio Networks with Arduino: Build Long Range,\r\nLow Power Wireless IoT Networks, Apress Media LLC, ISBN-13 (pbk): 978-1-4842-4356-5, 2019.\r\nPradeeka Seneviratne, Beginning LoRa Radio Networks with Arduino: Build Long Range,\r\nLow Power Wireless IoT Networks, Apress Media LLC, ISBN-13 (pbk): 978-1-4842-4356-5, 2019.', 1606262400, 146),
(19, 85, 22, 0, 16, 0, 115, '74_75_150', 2, 3, 1, 4, 'Học phần này thuộc khối kiến thức chuyên ngành của các ngành: Kỹ thuật máy tính và điện tử, khoa học máy tính. Sinh viên nắm được các khái niệm cơ bản về bảo mật và an toàn hệ thống thông tin, các loại mã độc hại, các loại tấn công, các thuật mã hóa và điều khiển truy cập. Sinh viên được thực hành để phòng chống các loại mã độc, các loại tấn công trên mạng, tăng cường bảo mật mạng LAN và WLAN.', 'Hiểu được các thách thức của bảo mật thông tin và giải thích được tầm quan trọng của chúng. Sinh viên có thể nhận biết các loại tấn công cơ bản.\r\nLiệt kê và hiểu các loại mã độc hại khác nhau.\r\nMô tả các loại tấn công phi kỹ thuật.\r\nGiải thích được các loại tấn công ứng dụng web phía server và client.\r\nHiểu được các loại tấn công tầng ứng dụng.\r\nGiải thích các loại tấn công thông dụng dựa trên mạng.\r\nPhân tích các loại tấn công trên các thiết bị không dây và giải thích các cơ chế bảo mật không dây.', 'Cài đặt, cấu hình và sử dụng phần mềm diệt virus cơ bản\r\nSử dụng Microsoft’s encrypting file system (EFS).\r\nSử dụng Discretionary Access Control để chia sẻ file trên Windows', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các công việc.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nTham gia tất cả bài đánh giá của học phần.', 'C. P. (2009). Security in computing. 5th Edition. Pearson Education.', 'Cryptography and Network Security, 4th Edition, William Stallings', 1615420800, 146),
(20, 112, 30, 15, 0, 90, 132, '133_188', 2, 3, 1, 4, 'Học phần lý thuyết điều khiển tự động là học phần bắt buộc, thuộc phần kiến thức chuyên ngành của chương trình đào tạo đại học ngành Công nghệ Kỹ thuật máy tính và điện tử. Học phần trang bị cho sinh viên những kiến thức cơ bản về: các thành phần của một hệ thống điều khiển tự động tuyến tính liên tục, các phương pháp xây dựng mô hình toán học của hệ thống điều khiển tự động bao gồm: hàm truyền đạt, phương trình trạng thái, các phương pháp khảo sát ổn định của hệ thống điều khiển tự động, các chỉ tiêu đánh giá chất lượng của hệ thống điều khiển và các phương pháp thiết kế hệ thống điều khiển tự động sao cho hệ ổn định và đạt được các chỉ tiêu chất lượng đề ra.', 'Mô tả, nhận diện được các phần tử cơ bản, các nguyên tắc điều khiển và các phương pháp mô tả toán học của hệ thống điều khiển tự động. Hệ thống điều khiển tự động; cấu trúc, đầu vào - đầu ra của hệ thống điều khiển; \r\nCách xây dựng hàm truyền đạt, phương trình trạng thái; \r\nCác đặc tính động học của hệ thống; \r\nCác phương pháp để khảo sát tính ổn định của hệ thống, đánh giá chất lượng hệ thống điều khiển và thiết kế hệ thống điều khiển liên tục;\r\nNguyên lý và phương pháp để đọc hiểu, áp dụng để giải quyết các bài toán về tự động; các thông số, cách thiết kế và xét tính ổn định hệ thống tự động phù hợp với yêu cầu.', 'Rèn luyện kỹ năng phân tích hệ thống, nhận diện các nguyên tắc điều khiển, các khâu động học cơ bản. Mô tả toán học các hệ thống điều khiển tự động. Trên cơ sở đó, xác định được các tiêu chuẩn xét ổn định, phân tích chất lượng hệ thống và tổng hợp thiết kế hệ thống điều khiển tự động.', 'Rèn luyện được tác phong làm việc tỉ mỉ, nghiêm túc, chủ động, tích cực, chăm chỉ, cẩn thận. Có thái độ tích cực, chủ động trong học tập, hoàn thành nhiệm vụ học tập (dự lớp, làm bài tập, trình bày kết quả, trao đổi hợp tác nhóm, lớp) và Có tính trung thực và có trách nhiệm trong quá trình làm bài tập cá nhân, làm bài tập nhóm và làm bài kiểm tra. Thực hiện các nhiệm vụ được giao đúng thời gian quy định.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Nguyễn Thị Phương Hà (chủ biên) – Huỳnh Thái Hoàng, Lý thuyết điều khiển tự động, NXB Đại học Quốc gia TP HCM, Năm 2005.\r\nNguyễn Thị Phương Hà, Bài tập điều khiển tự động, NXB Đại học Quốc gia TP HCM, Năm 2005.', 'Benjamin C. Kuo, Automatic Control Systems, Prentice-Hall International Editions, Seventh Edition 1995.\r\nStanley M. Shinners, Modern Control System Theory and Design, John-Wiley and Sons 1992.\r\nNguyễn Văn Hòa, Cở sở lý thuyết điều khiển tự động, NXB KHKT, Năm 2000.\r\n] Nguyễn Thương Ngô, Lý thuyết điều khiển tự động thông thường và hiện đại (cuốn 1-4), NXB KHKT Hà Nội, Năm 2009.', 1615420800, 146),
(23, 92, 20, 10, 0, 90, 148, '164_30_110', 2, 3, 1, 3, 'Môn học nhằm cung cấp những kiến thức tổng quát về xử lý số tín hiệu ở cấp độ cơ bản và ứng dụng cho việc giải tích xử lý tín hiệu. Những khái niệm về các hệ thống rời rạc bao gồm phương trình sai phân (vi phân), biến đổi Z, tích chập, ổn định, biến đổi Fourier rời rạc, biến đổi Fourier nhanh được giới thiệu như là những khái niệm căn bản về xử lý tín hiệu. Thiết kế mạch lọc có đáp ứng xung hữu hạn (FIR) và vô hạn (IIR) được giới thiệu như là phần ứng dụng của việc xử lý tín hiệu trong các hệ thống tuyến tính bất biến theo thời gian (LTI).', 'Hiểu được khái niệm về tín hiệu, nguyên lý xử lý tín hiệu số.\r\nMô tả được đặc tính và công dụng của phép biến đổ Z.\r\nPhân tích được tín hiệu và hệ thống trên miền tần số.', 'Vận dụng được các phương pháp phân tích và xử lý tín hiệu số.\r\nGiải quyết được các bài toán xử lý tín hiệu trong hệ thống tuyến tính bất biến theo thời gian. \r\nNâng cao khả năng lập trình xử lý tín hiệu bằng ngôn ngữ Matlab.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Giáo trình “nhập môn xử lý tín hiệu số”, Nguyễn Lâm Đông, NXB khoa học kỹ thuật', 'S J.Orfanidis,”Introduction to Signal Processing”, Prentice –Hall Publisher 1996, ISBN 0-13-209172-0\r\nMaurice Bellanger,”Digital Processing of Signal: Theory and Practice”, John Wiley & Son Ltd 1989, ISBN 0471 921017\r\nGiáo trình “nhập môn xử lý tín hiệu số”, PGS. TS Nguyễn Quốc Trung, NXB giáo dục. \r\nBài tập “xử lý tín hiệu số” TS Hồ Văn Sung, NXB Khoa học và kỹ thuật.', 1615420800, 146),
(24, 54, 30, 0, 30, 90, 50, '164_133', 2, 3, 1, 3, 'Đề cập đến các vấn đề căn bản liên quan đến vi điều khiển họ MCS-51 và kit Arduino; cấu trúc hoạt động của họ vi điều khiển MCS-51, Kit Arduino; cách thức tổ chức phần cứng, tập lệnh cùng với các hoạt động đặc trưng. Đi sâu vào thiết kế ứng dụng và một số giải thuật điều khiển, các ví dụ lập trình sử dụng ngôn ngữ lập trình C cho vi điều khiển.', 'Vẽ được sơ đồ khối, các khối chức năng, và sơ đồ mạch trong các ứng dụng cụ thể sử dụng Vi điều khiển 8051;\r\nNắm được cấu trúc kit Arduino, đặc tính và chức năng các thành phần trên kit;\r\nViết được các chương trình cơ bản, điều khiển các khối chức năng của vi điều khiển: khối vào ra, thao tác các thanh ghi, bộ định thời, ngắt, v.v cho 8051 và kit Arduino trên ngôn ngữ lập trình phần cứng như Assemnly, C.', 'Rèn luyện cho sinh viên các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học;\r\nThiết kế được các mạch điều khiển đơn giản;\r\nVận dụng được lý thuyết vi điều khiển vào điều khiển tự động. Xây dựng các mạch thực tế, viết chương trình phần mềm điều khiển theo yêu cầu bài toán đề ra;\r\nSử dụng thành thạo các phần mềm thiết kế, mô phỏng mạch như Protues, Keil.', 'Có ý thức tự mở rộng kiến thức môn học qua việc tìm hiểu các tài liệu về các mô đun mở rộng phần cứng;\r\nCó ý thức nâng cao khả năng kiến thức, tìm tài liệu mới về ngành nghề của mình, cập nhật thông tin;\r\nGiúp sinh viên phát triển được thái độ tốt, có ý thức chủ động, trách nhiệm và tôn trọng lẫn nhau trong học tập.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự tìm hiểu và thực hiện các yêu cầu do giảng viên giao;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'I. Scott Mackenzie, Raphael C, -W, The 8051 Microcontroller, Prentice Hall, Fourth edition.\r\nJames A. Langbridge, Arduino sketches – Tools and techniques for programming , Wiley', 'Tống Văn On, Hoàng Đức Hải, “Họ vi điều khiển 8051”, 2001.\r\nNguyễn Tăng Cường, “Cấu trúc và lập trình họ VĐK 8051”, 2003', 1615420800, 146),
(25, 91, 23, 0, 15, 0, 134, '83_133', 1, 1, 1, 4, 'Học phần nhằm cung cấp cho sinh viên kiến thức cơ bản về xử lý ảnh, giúp sinh viên rèn luyện và sử dụng thành thạo các thư viện và công cụ trong xử lý ảnh (OpenCV, Python/C++).  Dựa trên kiến thức và kỹ năng được cung cấp, sinh viên có thể tự phát triển các ứng dụng cơ bản liên quan đến xử lý ảnh như: biểu diễn ảnh trong máy tính, các phép biến đổi ảnh, các bộ lọc ảnh, nâng cấp và phân đoạn ảnh, trích xuất đặc trưng ảnh,...', 'Hiểu được các khái niệm cơ bản, các mô hình toán học và phương pháp trong xử lý ảnh.\r\nHiểu được chức năng các thư viện OpenCV, ngôn ngữ lập trình (Python/C++)  hỗ trợ để hiện thực các thuật toán trong xử lý ảnh.\r\nPhát triển và áp dụng các kỹ thuật xử lý ảnh để giải quyết các vấn đề thực tế.', 'Phát triển được các kỹ năng làm việc nhóm, kỹ năng giao tiếp, kỹ năng tư duy và giải quyết vấn đề\r\nKỹ năng sử dụng thư viện và ngôn ngữ lập trình (OpenCV, Python/C++) để cài đặt các chương trình xử lý ảnh trên máy tính.', 'Phát triển được tính chuyên nghiệp trong môi trường công việc. Có tinh thần hợp tác, hỗ trợ, chia sẻ và tôn trọng lẫn nhau.', 'Tham gia ít nhất 80% số tiết học của lớp học phần\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp', 'Digital Image Processing, 4  Edition,  Rafael C. Gonzalez and Richard E. Woods, Pearson Education, 2018.', 'Image Processing and Acquisition using Python, Chandrajit Bajaj and Guillermo Sapiro, CRC Press, Taylor & Francis Group, 2013\r\nSlides bài giảng', 1618876800, 146),
(26, 114, 30, 0, 30, 90, 85, '', 1, 1, 1, 3, 'Môn học này trang bị cho sinh viên các kiến thức cơ bản về hệ cơ sở dữ liệu phân tán, kiến trúc và ứng dụng vào thực tế đối với các doanh nghiệp lớn hiện nay. Nội dung cụ thể cung cấp: các phương pháp phân mảnh dữ liệu và điều kiện kiểm tra tính đúng đắn trong phân mảnh; Tiếp cận cách thiết kế hệ CSDL phân tán và ứng dụng các thuật toán trong thiết kế; Biến đổi truy vấn toàn cục thành truy vấn phân mảnh và tối ưu hóa truy vấn dữ liệu phân tán; Các nguyên lý quản lý giao dịch, kiểm soát dữ liệu ngữ nghĩa và điều khiển đồng thời trong phân tán. Ngoài ra, cung cấp các bài tập phân mảnh dữ liệu, phân tích, thiết kế ứng dụng cơ sở dữ liệu phân tán và cài đặt trên hệ quản lý cơ sở dữ liệu phân tán như: SQL Server, Oracle, DB2, PostgresSQL. Cuối cùng, một đồ án môn học làm việc theo nhóm từ 2-3 sinh viên thực hiện dựa trên nghiệp vụ thực tế', 'Nắm được các khái niệm cơ bản về hệ cơ sở dữ liệu phân tán; so sánh được những ưu và hạn chế giữa cơ sở dữ liệu tập trung và cơ sở dữ liệu phân tán.\r\nCó kiến về các hướng thức tiếp cận và thiết kế một hệ cơ sở dữ liệu phân tán: các phương pháp phân mãnh dữ liệu, nhân bản, điều khiển đồng thời; quản lý giao tác, kiểm soát dữ liệu ngữ nghĩa và truy vấn phân tán\r\nCó kiến thức về ứng dụng của hệ CSDL phân tán trong quản lý các tổ chức doanh nghiệp', 'Truy vấn và cập nhật đồng bộ dữ liệu trên các database server\r\nBiết tối ưu hóa truy vấn phân tán\r\nCài đặt được cơ sở dữ liệu phân tán cho bài toán trên một hệ quản trị CSDL(SQL Server, DB2 IBM, Oracle…)\r\nCó kỹ năng làm việc nhóm, kỹ năng thuyết trình một đề tài.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các công việc.\r\nTôn trọng quyền tác giả, sử dụng phần mềm hợp pháp\r\nChuẩn bị bài trước khi đến lớp. Đi học đầy đủ. Tham gia tích cực trong giờ học.\r\nLàm tất cả các bài tập lý thuyết và thực hành. Tham gia tích cực vào nhóm làm đồ án môn học.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự nghiên cứu các vấn đề do giảng viên giao ở nhà hoặc thư viện;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nTham gia tất cả các bài đánh giá của học phần.', 'Principples of Distributed Database Systems, M.Tamer Ozsu and Patrick Valduries, New York Dordrecht Heidelberg London: Springer, 2020.', 'Principples of Distributed Database Systems, M.Tamer Ozsu and Patrick Valduries, New York Dordrecht Heidelberg London: Springer, 2020.', 1619049600, 146),
(27, 46, 30, 0, 0, 60, 28, '137_136', 1, 1, 1, 3, 'Nhập môn Công Nghệ Phần Mềm là môn học nhằm giúp cho sinh viên có kiến thức cơ bản nhất trong lĩnh vực công nghệ phần mềm. Qua môn học này sinh viên có cái nhìn khái quát về qui trình phát triển phần mềm, hiểu biết và thực hiện các giai đoạn trong qui trình trên một phần mềm cụ thể dựa trên những phương pháp, kỹ thuật trong quá trình thu thập yêu cầu, phân tích, thiết kế và cài đặt, viết sưu liệu đã được minh họa cụ thể trong giáo trình.', 'Trang bị cho sinh viên các kiến thức cơ bản về công nghệ phần mềm.\r\nCung cấp kiến thức nền tảng trong về các quy trình phát triển phần mềm.\r\nCác kỹ thuật công cụ đặc tả, phân tích, thiết kế phần mềm,...', 'Giúp sinh viên nắm được kiến thức về qui trình phát triển phần mềm, các kỹ thuật quản lý, phát triển dự án….', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các vấn đề liên quan đến công nghệ phần mềm', 'Dự lớp không thấp hơn 80% số tiết lên lớp qui định của học phần;\r\nLàm và nộp các bài tập cá nhân/ nhóm theo qui định của học phần;\r\nTự nghiên cứu các vấn đề do giảng viên giao ở nhà hoặc thư viện;\r\nThảo luận nhóm theo chủ đề;\r\nThực hiện bài tập theo nhóm;\r\nTham dự kiểm tra giữa kỳ và thi kết thúc học phần.', 'Ian Sommerville, Software Engineering, 7th edition, Pearson Education, 2004.', 'Stephen R. Schach, Classical and Object-Oriented Software Engineering, NXB IRWIN, 1996.\r\nRonald Leach, Introduction to Software Engineering, CRC Press, 1999.\r\nG. Booch, J. Rumbaugh, I. Jacobson, The Unified Modeling Language User Guide, Addision-Wesley, 1999.\r\nCraig Larman, Applying UML and Patterns: An Introduction to Object-Oriented Analysis and Design and Iterative Development, Third Edition, Addision-Wesley, 2004.\r\nGlenford J. Myers, The art of software testing, Wiley, 2004.\r\nBoris Beizer, Software Testing Techniques, Second Edition.', 1619049600, 146),
(28, 47, 30, 0, 0, 90, 84, '222', 1, 1, 1, 4, 'Học phần nhằm cung cấp cho sinh viên kiến thức cơ bản về ngôn ngữ lập trình Ruby,  và web framework mã nguồn mỡ Ruby On Rails. Học phần giúp sinh viên có thể ứng dụng ngôn ngữ lập trình hướng đối tượng Ruby để xây dựng, phát triển các ứng dụng, đặc biệt là các ứng dụng web, dựa trên Ruby On Rails. Chuyên đề Ruby On Rails thuộc khối kiến thức chuyên ngành của ngành CNTT và được giảng dạy cho các sinh viên thuộc ngành CNTT.', 'Trang bị cho sinh viên những kiến thức nền tảng và những ký năng cần thiết để có thể lập trình với ngôn ngữ lập trình hướng đối tượng Ruby trên nền tảng Ruby On Rails. Trên cơ sở đó, giúp sinh viên có thể sử dụng các cấu trúc và cú pháp của ngôn ngữ lập trình Ruby để xây dựng và phát triển các ứng dụng.', 'Rèn luyện cho sinh viên (lập luận phân tích và giải quyết vấn đề, tư duy hệ thống) và kỹ năng giao tiếp (làm việc nhóm, ngoại ngữ) để tìm hiểu tài liệu và thực hiện phát triển phần mềm bằng ngôn ngữ lập trình Ruby; cùng với kỹ năng nghề nghiệp trong môi trường doanh nghiệp và xã hội trong quá trình phân tích và phát triển ứng dụng phần mềm.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết....', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Michael Hartl, Ruby On Rails Tutorial, Sixth Edition.', 'Sam Ruby, Dave Thomas, David Heinemeier Hanson Agile Web Development with Rails 5, 2017.', 1619049600, 146),
(30, 51, 60, 0, 30, 120, 178, '137_23_173_110', 1, 1, 1, 3, 'Cung cấp cho sinh viên kiến thức về lập trình cho các thiết bị chạy hệ điều hành Android. Kết thúc môn học, sinh viên có thể thiết kế và phát triển các ứng dụng di động trên hệ điều hành Android. Phát triển cho sinh viên khả năng thiết kế, lập trình và triển khai các ứng dụng di động hiện tại và các ứng dụng di động mới sau này.', 'Hiểu các khái niệm cơ bản của lập trình Android. Kiến trúc Android, vòng đời của một ứng dụng Android\r\nXây dựng giao diện cho một ứng dụng Android với các thành phần cơ bản\r\nLập trình với cơ sở dữ liệu SQLite, web service\r\nLập trình với Service, Notification, Activity State and Preferences, Maps and GPS, Using the Camera.', 'Áp dụng kiến thức đã học để viết một ứng dụng Android\r\nPhát triển kỹ năng tự học, giao tiếp, làm việc nhóm', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các vấn đề liên quan đến công nghệ di động.', 'Dự lớp không thấp hơn 80% số tiết lên lớp qui định của học phần;\r\nLàm và nộp các bài tập cá nhân/ nhóm theo qui định của học phần;\r\nTự nghiên cứu các vấn đề do giảng viên giao ở nhà hoặc thư viện;', NULL, 'Google, (2018), “Android Developer Fundamentals v2-2018”', 1619308800, 146),
(31, 52, 30, 0, 0, 0, 18, '64_150_1_174', 1, 1, 1, 3, 'Học phần tiếng anh chuyên ngành bao gồm các bài đọc liên quan về lĩnh vực công nghệ thông tin phù hợp với giai đoạn đầu học chuyên ngành của sinh viên công nghệ thông tin và hướng dẫn thực tập cách thực hiện bài báo cáo tiếng Anh trên powerpoint, khả năng đọc bài báo tiếng anh chuyên ngành, làm báo cáo dự án bằng tiếng anh.', 'Nắm bắt được các các từ vựng chuyên ngành công nghệ thông tin\r\nÁp dụng kiến thức về ngữ pháp, từ vựng và sử dụng công cụ từ điển để đọc tài liệu tiếng Anh\r\nÁp dụng ngữ pháp và từ vựng để viết các ý tưởng liên quan đến công nghệ bằng tiếng Anh', 'Vận dụng tất cả kiến thức đã học để làm báo cáo một dự án công nghệ thông tin bằng tiếng Anh \r\nVận dụng kỹ năng tự luyện tập để nghe và trả lời các câu hỏi bằng tiếng Anh', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết....', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Tiếng Anh: Oxford English for Computing, Keith Boeckner – P.Charles Brown,', 'Oxford English for Information Technology, Eric H. Glendining, John McEwan\r\nComputer Science, Trica Walker.', 1619308800, 146),
(32, 15, 30, 0, 30, 60, 9, '66_169', 1, 1, 1, 4, 'Học phần nhằm cung cấp cho sinh viên kiến thức cơ bản về các cấu trúc dữ liệu, như danh sách, ngăn xếp, hàng đợi, cây, đồ thị... Ngoài ra, học phần cung cấp một số giải thuật, như: Đệ quy, sắp xếp... và các giải thuật xử lý trên các cấu trúc dữ liệu. Học phần giúp sinh viên có thể áp dụng giải quyết các bài toán tin học trong thực tế.  Học phần Cấu trúc dữ liệu và giải thuật thuộc khối kiến thức cơ sở của ngành CNTT.', 'Trang bị cho sinh viên những khái niệm cơ bản liên quan đến cấu trúc dữ liệu và giải thuật, khả năng thiết kế các cấu trúc dữ liệu và giải thuật để giải quyết các bài toán tin học.', 'Rèn luyện cho sinh viên các kỹ năng tư duy, kỹ năng giao tiếp và kỹ năng giải quyết vấn đề.', 'Giúp sinh viên phát triển được tính chuyên nghiệp trong môi trường công việc và trong phát triển phần mềm, có ý thức chủ động, sáng tạo và trách nhiệm trong các hoạt động nghề nghiệp', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của giảng viên;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Reema Thareja, Data Structures Using C - Second Edition, Oxford University Press, 2014.', 'Đỗ Xuân Lôi, Cấu trúc dữ liệu và giải thuật, In lần thứ 9, NXB Đại học quốc gia Hà Nội, 2006.\r\nTrần Hạnh Nhi, Dương Anh Đức, Giáo trình Cấu trúc dữ liệu và giải thuật, NXB Đại học quốc gia TPHCM, 2010.\r\nMark Allen Weiss, Data Structures and Algorithm Analysis in C++, 4th Edition, Pearson Education, 2014', 1619308800, 146),
(33, 16, 30, 30, 30, 120, 28, '172_20_18', 1, 1, 1, 3, 'Môn học ”Công nghệ Web” giới thiệu cho người học những kiến thức cơ bản về Internet, cách tạo một Website đơn giản, cung cấp kiến thức nền tảng trong việc thiết kế Website tĩnh với công nghệ HTML5, CSS3, Javascript tạo tiền đề cho việc phát triển và lập trình Web động.', 'Hiểu được nguyên tắc thiết kế được một website tĩnh cho cá nhân hay tổ chức và biết cách quản lý và xuất bản website lên internet, mục đích của website cần thiết kế và chiến lược thiết kế.\r\nThành thạo với ngôn ngữ HTML, định dạng trang Web dùng CSS, lập trình javascript để tạo các trang web.\r\nPhát triển với công nghệ HTML5 và CSS3, triển khai website với jQuery công nghệ mới, thiết kế web cơ bản máy tính và trên di động.', 'Giúp sinh viên thiết kế được một Website tĩnh, và biết tìm kiếm, sử dụng những công cụ có sẵn hỗ trợ cho việc thiết kế Website, biết cách quản lý và xuất bản Website lên Internet', 'Sinh viên có thái độ, động cơ học tập rõ ràng, chú ý nghe giảng trên lớp tích cực nghiên cứu tài liệu, làm thực hành ở nhà và tham gia thảo luận nhóm.\r\nXác định phương pháp học tập hiệu quả và có khoa học, có tinh thần và ý thức học tập cao.\r\nSinh viên đam mê và thích thú với thiết kế, kết quả là ứng dụng website thực tế.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo quy định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Aptech Computer Education, HTML5 - NextGen Web – International, 2013.\r\nDan Cederholm, CSS3 For Web Designers. Nhà xuất bản Happy Cog. Số trang 120.\r\nJeremy Osborn và AGI Creative Team, 2012, Adobe Dreamweaver CS6 Digital Classroom. Nhà xuất bản Wiley. Số trang 496.\r\nJoe Fawcett, Danny Ayers, Liam R. E. Quin, 2012, Beginning XML. Nhà xuất bản Wrox. Số trang 864.', 'NEU - EDUTOP, 2006, Tổng quan về Internet\r\nSteve Suehring, 2013, JavaScript Step by Step. Nhà xuất bản Microsoft Press. Số trang 482.\r\nW3schools, 2003, HTML. http://w3schools.com/html/\r\nWallpearl, 2008, Simple CSS. Nhà xuất bản WallPerl. Số trang 65.', 1619308800, 146),
(34, 20, 22, 30, 18, 60, 8, '1_10_156', 1, 1, 1, 3, 'Học phần Java nâng cao bao gồm kiến thức lập trình ngôn ngữ Java ở mức độ nâng cao phù hợp với giai đoạn đầu học chuyên ngành của sinh viên công nghệ thông tin và hướng dẫn thực tập cách xây dựng chương trình máy tính, khả năng đọc mã nguồn của chương trình khác, …', 'Nắm bắt được các đặc điểm của ngôn ngữ lập trình Java\r\nNắm bắt được cách xây dựng, lập trình và sữa lỗi một chương trình Java\r\nÁp dụng kiến thức để đọc và hiểu mã nguồn của một chương trình có sẵn', 'Nắm bắt được các đặc điểm của ngôn ngữ lập trình Java\r\nNắm bắt được cách xây dựng, lập trình và sữa lỗi một chương trình Java\r\nÁp dụng kiến thức để đọc và hiểu mã nguồn của một chương trình có sẵn', 'Chuẩn hóa kỹ thuật, sinh viên thông qua nắm các kỹ thuật cơ bản để tự tiếp cận xây dựng các ứng dụng web/mạng/desktop thực tế, giải quyết bài toán thực tế', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia đầy đủ các bài tập theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Tài liệu slide do giảng viên Trường Đại học Công nghệ Thông tin và Truyền thông Việt - Hàn soạn giảng.\r\nBài tập Lập Trình Java- Huỳnh Công Pháp\r\nEckel, B., 2013. Thinking in JAVA. Prentice Hall Professional.\r\nRedko, A., 2017. Advance JAVA. Java Code Geek.', 'Core Java I và Core Java II: phiên bản in lần thứ 10\r\nJava Murach\r\nHorstmann, C.S. and Cornell, G., 2002. Core Java 2: Volume I, Fundamentals. Pearson Education.\r\nDeitel, H.M., Deitel, P.J. and Santry, S.E., 2001. Advanced Java 2 platform How to program. Prentice Hall PTR.', 1619308800, 146),
(35, 95, 30, 0, 0, 0, 39, '99_42_88', 3, 2, 1, 2, 'Học phần Kinh tế vĩ mô là học phần bắt buộc nằm trong khối kiến thức chung của chương trình giảng dạy ngành Quản trị kinh doanh. Nội dung học phần nhằm nghiên cứu nền kinh tế một cách tổng thể, bao gồm việc mô tả, đo lường và phân tích các biến số kinh tế vĩ mô như tổng sản phẩm quốc dân, tổng sản phẩm quốc nội, giá cả và lạm phát, việc làm và thất nghiệp và tỷ giá hối đoái...Bên cạnh đó, học phần Kinh tế vĩ mô còn giúp cho sinh viên hiểu được cách thức vận hành của một nền kinh tế nói chung và cách thức ứng xử của các thành viên trong nền kinh tế, đặc biệt là các chính sách kinh tế vĩ mô của chính phủ trong các bối cảnh nhất định.', 'Trang bị cho sinh viên những kiến thức chuyên môn trong lĩnh vực kinh tế vĩ mô. Sinh viên học xong học phần này sẽ có khả năng giải thích, phân tích và giải quyết các vấn đề liên quan đến kinh tế vĩ mô nói chung trong nền kinh tế; có thể phân tích và đưa ra những khuyến nghị ở mức độ cơ bản đối với việc thực thi chính sách tài khóa và chính sách tiền tệ trong các tình huống cụ thể.', 'Rèn luyện cho sinh viên kỹ năng cá nhân, kỹ năng giao tiếp thiết yếu cùng với kỹ năng làm việc nhóm,  thảo luận và phản biện.', 'Giúp sinh viên hình thành thái độ học tập tích cực, nghiêm túc.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo quy định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Bộ GD& ĐT, Kinh tế học vĩ mô, Nhà xuất bản giáo dục, 2017.\r\nBài giảng Kinh tế Vĩ mô (lưu hành nội bộ)', 'Đại học Kinh tế quốc dân, Hướng dẫn thực hành Kinh tế vĩ mô, NXB thống kê, 2002.\r\nĐại học Kinh tế TP. HCM, Bài tập, trắc nghiệm Kinh tế vĩ mô, NXB thống kê, 2007\r\nDavid Begg, Kinh tế học vĩ mô, NXB thống kê, 2010.\r\nTS.Trần Thị Lan Hương, Giáo trình Kinh tế học đại cương, Nhà xuất bản giáo dục Việt Nam, 2012.\r\nKinh tế vĩ mô, NXB Hồng Đức, N. Gregory Mankiw Macroeconomics, 2020.', 1626480000, 146),
(36, 89, 20, 10, 0, 60, 133, '132', 2, 3, 2, 4, 'Học phần cung cấp cho sinh viên kiến thức nền tảng về truyền dữ liệu qua mạng máy tính. Nội dung chính của học phần bao gồm: các khái niệm cơ bản liên quan, các thành phần cơ bản của hệ thống truyền dữ liệu; mô hình phần lớp và hoạt động của mạng truyền số liệu; cơ sở truyền số liệu số; các phương pháp mã hóa xử lý dữ liệu trước khi truyền; môi trường truyền; các giao thức đảm bảo truyền dẫn tin cậy; và các giao thức thuộc lớp liên kết dữ liệu.', 'Hiểu được quá trình truyền dữ liệu qua liên kết truyền thông.\r\nTính được các thông số truyền của tín hiệu tương tự, tín hiệu số.\r\nXác định được các định dạng mã hóa tín hiệu.\r\nPhân biệt được cơ chế truyền đồng bộ và bất đồng bộ.\r\nTìm được mã phát hiện lỗi (mã khối, mã khối tuyến tính, mã vòng).\r\nHiểu cơ chế sửa lỗi và tìm lỗi trong dữ liệu nhận được.\r\nPhân loại các kỹ thuật ghép kênh.', 'Rèn luyện cho sinh viên kỹ năng cá nhân, kỹ năng giao tiếp thiết yếu cùng với kỹ năng thực hành thực tế.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Giáo trình “kỹ thuật truyền số liệu”  Nguyễn Việt Hùng, 2013\r\nData and Computer Communication (9th Edition) – William Stalling, Pearson Education\r\nInternational, 2007.', 'Nguyễn Hồng Sơn, Kỹ thuật Truyền Số liệu, NXB Văn hóa-Thông tin\r\nComputer Networks (4th edition) – Andrew S. Tanenbaum, Prentice Hall, 2003.\r\nĐinh Công Đoan, Bài giảng KT truyền số liệu, ĐH. SPKT Tp. HCM, 2008.', 1626566400, 146),
(37, 21, 23, 15, 0, 90, 74, '85_75_148_63_115_139', 2, 3, 1, 3, 'Học phần nhằm cung cấp cho sinh viên các khái niệm cơ bản về hệ điều hành, tổ chức máy tính, cấu trúc hệ điều hành, quản lý tiến trình, quản lý định thời CPU, quản lý bộ nhớ, quản lý vào/ra và quản lý tập tin.', 'Liệt kê được các vai trò chính của hệ điều hành;\r\nNêu được các khái niệm chính về hệ điều hành;\r\nCơ chế hoạt động của hệ điều hành;\r\nNhững vấn đề chính của hệ điều hành.', 'Sử dụng các lệnh cơ bản trên Linux;\r\nSử dụng shell và lập trình C trên Linux;\r\nMô phỏng hoạt động của hệ điều hành thông qua các bài tập mô phỏng.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các công việc.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự nghiên cứu các vấn đề do giảng viên giao ở nhà hoặc thư viện;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nTham gia tất cả các bài đánh giá của học phần.', 'Andrew S. Tanenbaum  (Author), Modern Operating Systems, 4nd Edition, 2015.\r\nAnn Mclver McHoes and Ida M. Flynn, Understanding operating systems, 2008.', NULL, 1626566400, 146),
(38, 19, 22, 0, 15, 60, 138, '50_75_85_132_164_148_30_139', 2, 3, 1, 3, 'Nội dung của học phần tập trung vào việc tìm hiểu cấu trúc, nguyên lý hoạt động của các thành phần chính cấu thành nên máy tính như: CPU, RAM, thiết bị nhập xuất,... Cách thức xử lý và thực thi một chương trình xảy ra trong máy tính. Tập lệnh và ngôn ngữ lập trình Assembly.', 'Cung cấp cho sinh viên các khái niệm tổng quan về kiến trúc và tổ chức máy tính; Các thành phần chính của máy tính và kiến trúc các hệ thống bus; Các khái niệm, kiến trúc của bộ nhớ chính, bộ nhớ cache và các thiết bị lưu trữ dữ liệu; Tập lệnh và các phương thức truy cập dữ liệu trong bộ nhớ, ngôn ngữ Assembly; Tổ chức và các chức năng của bộ vi xử lý CPU.', 'Rèn luyện cho sinh viên các kỹ năng giải quyết vấn đề, tư duy logic, giao tiếp và tự học.', 'Giúp sinh viên phát triển được thái độ tốt, có ý thức chủ động, trách nhiệm và tôn trọng lẫn nhau trong học tập.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự tìm hiểu và thực hiện các yêu cầu do giảng viên giao;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'William Stallings, Computer Organization and Architecture. Prentice Hall, Tenth edition (March 11, 2016).\r\nVõ Đức Khánh, Giáo trình Kiến trúc máy tính, Nxb Đại học Quốc gia TPHCM, 9/2007.', 'Nguyễn Đình Việt, Kiến trúc máy tính, NXB ĐHQGHN, 3/2007.\r\nMIPS Assembly Language Programming. Prentice-Hal,  Robert Britton, 5/2002', 1626566400, 146),
(39, 4, 30, 15, 0, 60, 193, '54_192_48', 3, 2, 1, 3, 'Quản trị học là một môn khoa học nghiên cứu các vấn đề chi phối đến tính hiệu quả của lao động tập thể trong một tổ chức. Môn học này trang bị cho sinh viên một cách nhìn có hệ thống về các vấn đề quản trị trong một tổ chức. Sinh viên có thể biết được nguồn gốc của hoạt động quản trị cũng như các cách tiếp cận khác nhau của các trường phái quản trị. Bên cạnh đó sinh viên có thể nhận diện được các chức năng cơ bản của hoạt động quản trị như hoạch định, tổ chức, lãnh đạo và kiểm tra. Sinh viên sẽ biết được có những yếu tố nào của môi trường bên trong và bên ngoài tác động đến tổ chức. Ngoài ra môn học còn cung cấp những nguyên lý và kỹ thuật cần được thực hiện khi con người kết hợp với nhau nhằm đạt hiệu quả cao.\r\nMôn học này là học phần bắt buộc thuộc khối kiến thức ngành quản trị kinh doanh. Môn học này cung cấp kiến thức nền tảng để học các môn chuyên ngành Quản trị kinh doanh như quản trị chiến lược, quản trị nguồn nhân lực, quản trị tài chính…và định hướng cho người học khi ra trường có thể đảm nhận được một số công việc sau:\r\n-Lập kế hoạch cho công việc;\r\n-	Tổ chức thực hiện công việc;\r\n-	Lãnh đạo một nhóm hoặc một tổ chức;\r\n-	Kiểm tra tình thình thực hiện công việc;\r\n-	Phân tích các yếu tố của môi trường tác động đến tổ chức;\r\n-	Nhận diện các cơ hội, đe dọa, điểm mạnh và điểm yếu của tổ chức.', 'Trình bày được các khái niệm về tổ chức, quản trị và nhà quản trị.\r\nBiết được những kĩ năng và năng lực cần thiết của nhà quản trị.\r\nNhận diện được các quan điểm quản trị khác nhau và phân biệt giữa chúng.\r\nNhận diện được các yếu tố của môi trường quản trị tác động đến tổ chức và biết cách ứng phó với sự thay đổi của môi trường.\r\nLập một kế hoạch kinh doanh cho tổ chức.\r\nThiết kế được cơ cấu tổ chức cho doanh nghiệp\r\nBiết cách làm việc cùng với những thành viên khác trong tổ chức.\r\nXây dựng được những tiêu chuẩn cho công tác kiểm tra của tổ chức.', 'Rèn luyện các kĩ năng quản trị như: kĩ năng chuyên môn, kĩ năng giao tiếp, kỹ năng thuyết phục, kỹ năng đàm phán, kỹ năng làm việc nhóm và kĩ năng thuyết trình. Những kỹ năng này được hình thành thông qua việc xử lí các tình huống cho trước trên lớp, các bài tập nhóm và các bài thuyết trình trước lớp.\r\nVận dụng các kĩ năng học được để áp dụng vào trong cuộc sống, học tập và làm việc một cách hiệu quả hơn\r\nNhận thức được tầm quan trọng của quản trị và vai trò của nhà quản trị trong tổ chức.\r\nTự đánh giá được những điểm mạnh và điểm yếu của bản thân, khám phá khả năng quản trị của mình.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các vấn đề trong cuộc sống.\r\nCó thái độ tích cực trong việc giải quyết các tình huống trong môi trường học tập nói riêng và trong cuộc sống nói chung.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Quản Trị Học (Bài giảng nội bộ), Huỳnh Bá Thúy Diệu, Trường Đại học Công nghệ Thông tin và Truyền Thông Việt- Hàn, 2020.', 'Quản trị học, TS. Nguyễn Xuân Điền, Nhà xuất bản Tài chính, 2014.\r\nQuản trị học, TS. Nguyễn Hùng Phong, Nhà xuất bản Kinh tế Thành phố Hồ Chí Minh, 2016\r\nQuản trị học, TS Phạm Thế Trí, Nhà xuất bản Đại học Quốc gia Thành phố Hồ Chí Minh, 2016.\r\nPrinciple of management, Mason Carpenter, Talya Bauer, Berrin Erdogan, Flat World Knowledge, January 16, 2013, Ebook < https://freecomputerbooks.com/Principles-of-Management.html>', 1626566400, 146),
(46, 7, 23, 15, 0, 60, 166, '0_167_205', 1, 1, 1, 1, 'Môn học trang bị cho sinh viên các kiến thức về đại số tuyến tính: Ma trận, định thức, giải hệ phương trình tuyến tính, không gian vectơ, ánh xạ tuyến tính, trị riêng, vecto riêng, dạng toàn phương.', 'Hiểu được các khái niệm cơ bản về ma trận, định thức, các phép toán trên ma trận và trên định thức, ma trận nghịch đảo; các phương pháp giải hệ phương trình tuyến tính (phương pháp Gauss, phương pháp Cramer), hiểu được các khái niệm về không gian vec tơ, ánh xạ tuyến tính, dạng toàn phương.\r\nCó khả năng tính toán các phép toán trên ma trận, định thức, các phép biến đổi, giải được hệ phương trình tuyến tính, tìm được trị riêng và vectơ riêng, đưa dạng toàn phương về dạng chính tắc...', 'Trên cơ sở nội dung kiến thức được trang bị, một mặt sinh viên có đủ kiến thức cơ bản để học các học phần cơ sở ngành và chuyên ngành; mặt khác hình thành và phát triển thêm các phẩm chất tư duy như logic, khái quát hóa, trừu tượng hóa. \r\nCó kỹ năng phân tích được bài toán thực tế, đưa về các đại lượng toán và giải quyết bài toán\r\nSinh viên có khả năng ứng dụng trong việc giải quyết một bài toán trong thực tế.', 'Có lòng ham thích học toán.\r\nHình thành tính chuyên cần, cẩn thận cho sinh viên.\r\nCủng cố và phát triển thêm khả năng tư duy  như phân tích, so sánh, tổng hợp…\r\nGiúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự tin, tự chịu trách nhiệm trong giải quyết vấn đề.', NULL, 'Toán học cao cấp,tập 1- Đại số và   Hình học giải tích', 'Bài tập Toán học cao cấp,tập 1- Đại số và Hình học giải tích,\r\nĐại số tuyến tính\r\nBài tập Đại số tuyến tính', 1628812800, 146),
(50, 47, 30, 0, 0, 90, 84, '222', 1, 1, 1, 4, 'Học phần nhằm cung cấp cho sinh viên kiến thức cơ bản về ngôn ngữ lập trình Ruby,  và web framework mã nguồn mỡ Ruby On Rails. Học phần giúp sinh viên có thể ứng dụng ngôn ngữ lập trình hướng đối tượng Ruby để xây dựng, phát triển các ứng dụng, đặc biệt là các ứng dụng web, dựa trên Ruby On Rails. Chuyên đề Ruby On Rails thuộc khối kiến thức chuyên ngành của ngành CNTT và được giảng dạy cho các sinh viên thuộc ngành CNTT.', 'Trang bị cho sinh viên những kiến thức nền tảng và những ký năng cần thiết để có thể lập trình với ngôn ngữ lập trình hướng đối tượng Ruby trên nền tảng Ruby On Rails. Trên cơ sở đó, giúp sinh viên có thể sử dụng các cấu trúc và cú pháp của ngôn ngữ lập trình Ruby để xây dựng và phát triển các ứng dụng.', 'Rèn luyện cho sinh viên (lập luận phân tích và giải quyết vấn đề, tư duy hệ thống) và kỹ năng giao tiếp (làm việc nhóm, ngoại ngữ) để tìm hiểu tài liệu và thực hiện phát triển phần mềm bằng ngôn ngữ lập trình Ruby; cùng với kỹ năng nghề nghiệp trong môi trường doanh nghiệp và xã hội trong quá trình phân tích và phát triển ứng dụng phần mềm.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết....', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTham gia các hoạt động làm việc nhóm theo qui định của lớp học phần;\r\nTự tìm hiểu các vấn đề do giảng viên giao để thực hiện ngoài giờ học trên lớp;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'Michael Hartl, Ruby On Rails Tutorial, Sixth Edition.', 'Sam Ruby, Dave Thomas, David Heinemeier Hanson Agile Web Development with Rails 5, 2017.', 1628121600, 147),
(54, 68, 45, 0, 15, 0, 8, '23_135_126', 1, 1, 1, 1, 'Học phần gồm các nội dung chính như sau: Giới thiệu khái quát các kiến trúc và mô hình mạng, mô hình OSI, mô hình TCP/IP, mô hình Client-Server,…. Các giao thức phổ biến trong lập trình mạng như: TCP, UDP, HTTP, FTP, POP3,…. Các kỹ thuật lập trình Multicasst, RMI, SOA. Xây dựng các ứng dụng như: web server, mail server, FTP server,…', 'Có kiến thức nền tảng về các kỹ thuật lập trình mạng cơ bản và nâng cao để phát triển các ứng dụng, các dịch vụ chạy trên mạng và mạng Internet. \r\nBiết sử dụng các mô hình mạng để phát triển các ứng dụng mạng như: Peer-to-Peer, Client-Server, mô hình phân tán,… \r\nBiết sử dụng các giao thức trong lập trình mạng như: TCP, UDP, HTTP, MSTP, POP3,…Người học hiểu rỏ hơn nguyên lý hoạt động của các giao thức trên.', 'Có kỹ năng lập trình mạng, lập trình đa tuyến, lập trình phân tán. Kỹ năng xây dựng các ứng dụng mạng và đóng gói, xây dựng các dịch vụ mạng phổ biến trên Internet.\r\nCó kỹ năng làm việc độc lập, làm việc nhóm, kỹ năng thuyết trình, kỹ năng đọc tài liệu chuyên ngành tiếng nước ngoài ….', 'Nhận thức được các chuẩn mực và văn hóa trong môi trường lập trình mạng để có thể tham gia phát triển các dự án phần mềm chuyên nghiệp. Định hướng được vị trí việc làm thông qua việc hoàn thành các đồ án của môn học.', NULL, 'Tài liệu do giảng viên Trường Đại học Công nghệ Thông tin và Truyền thông Việt - Hàn soạn giảng\r\nAdvanced Network Programming - Principles and Techniques-1', NULL, 1628553600, 146),
(55, 39, 30, 0, 0, 60, 21, '9_157_140_174_137', 1, 1, 1, 3, 'Học phần cung cấp các kiến thức cơ bản về Toán rời rạc, cơ sở của lĩnh vực công nghệ thông tin. Học phần giới thiệu các nội dung về logic, quan hệ, các bài toán cơ bản với phương pháp giải quyết dựa trên các nguyên lý và cấu hình tổ hợp cơ bản, lý thuyết đồ thị với các khái niệm và một số bài toán cơ bản kèm theo các thuật toán để giải quyết. Qua đó, người học được trang bị các kiến thức nền tảng hỗ trợ lập trình để giải quyết một số bài toán cơ bản và có nền tảng để tiếp tục tìm hiểu những kiến thức liên quan khác trong lĩnh vực này.', 'Cung cấp người học kiến thức về logic, quan hệ, các nguyên lý và cấu hình tổ hợp cơ bản, các bài toán cơ bản và lý thuyết đồ thị với các khái niệm kèm theo các thuật toán để giải quyết;\r\nNgười học có thể hoàn thành các bài tập lập trình để giải quyết một số bài toán cơ bản trong lĩnh vực công nghệ thông tin.', 'Người học biết tư duy một cách hệ thống về bài toán cơ bản để giải quyết trong thực tế;\r\nNgười học được rèn luyện các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học.', 'Giúp người học phát triển được thái độ tốt, có ý thức chủ động, trách nhiệm và tôn trọng lẫn nhau trong học tập.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự tìm hiểu và thực hiện các yêu cầu do giảng viên giao;\r\nHoàn thành tất cả nội dung đánh giá của học phần.', 'Discrete mathematics and its applications\r\nSlides bài giảng', 'Discrete Mathematics - Springer\r\nDiscrete Mathematics - University of Northern Colorado', 1628553600, 146),
(56, 6, 30, 0, 0, 30, 1, '171_27_169_162_170', 1, 1, 3, 3, 'Học phần Cơ sở dữ liệu thuộc khối kiến thức cơ sở ngành của ngành CNTT và được giảng dạy ngay từ kỳ đầu tiên của chương trình', 'Trang bị cho sinh viên những kiến thức bậc cao liên quan đến cơ sở dữ liệu và hệ quản trị cơ sở dữ liệu.', 'Rèn luyện cho sinh viên các kỹ năng tư duy, kỹ năng giao tiếp và kỹ năng giải quyết vấn đề sử dụng dữ liệu và cở sở dữ liệu.', 'Giúp sinh viên phát triển được tính chuyên nghiệp trong môi trường công việc và trong phát triển phần mềm, có ý thức chủ động, sáng tạo và trách nhiệm trong các hoạt động nghề nghiệp', NULL, 'Database system concepts (7th edition)', 'Giáo trình Cơ sở dữ liệu', 1628553600, 146),
(57, 13, 15, 0, 30, 0, 18, '64', 1, 1, 2, 2, 'Học phần tiếng Anh chuyên ngành bao gồm các bài đọc liên quan về lĩnh vực công nghệ thông tin phù hợp với giai đoạn đầu học chuyên ngành của sinh viên công nghệ thông tin và hướng dẫn thực tập cách thực hiện bài báo cáo tiếng Anh trên powerpoint, khả năng đọc bài báo tiếng Anh chuyên ngành,…', 'Nắm bắt được các các kiến thức tiếng Anh chuyên ngành công nghệ thông tin về máy vi tính và các thiết bị ngoại vi\r\nÁp dụng kiến thức tiếng Anh chuyên ngành để đọc tài liệu tiếng Anh\r\nVận dụng tất cả kiến thức đã học để trình bày một chủ đề công nghệ thông tin bằng tiếng Anh', 'Vận dụng kỹ năng tự luyện tập để nghe và trả lời các câu hỏi bằng tiếng Anh\r\nTrình bày các vấn đề liên quan đến chuyên ngành bằng tiếng Anh', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết....', 'SV tham dự >=80% số buổi của HP. Nếu nghỉ >20% số buổi sẽ không được dự thi kết thúc HP.', 'English for Information Technology, second condition', 'English for Computing', 1628640000, 146),
(58, 9, 30, 0, 15, 60, 8, '', 1, 1, 1, 3, 'Học phần Lập trình hướng đối tượng và Java cơ bản nhằm trang bị cho sinh viên kiến thức về phương pháp lập trình hướng đối tượng và ngôn ngữ lập trình Java để phân tích, thiết kế và xây dựng các chương trình theo phương pháp hướng đối tượng. Ngoài ra, học phần cũng trang bị cho sinh viên các kỹ thuật lập trình Java cơ bản gồm: lập trình giao diện, lập trình đồ họa, lập trình truy xuất hệ thống tệp tin, lập trình kết nối cơ sở dữ liệu …', 'Nắm được khái niệm và phương pháp lập trình hướng đối tượng\r\nNắm bắt được các kỹ thuật lập trình java\r\nÁp dụng các phương pháp lập trình hướng đối tượng và kỹ thuật lập trình java để giải quyết các bài toán cụ thể\r\nPhát triển các dự án phần mềm bằng phương pháp lập trình hướng đối tượng và ngôn ngữ lập trình Java', 'Rèn luyện cho sinh viên kỹ năng phân tích vấn đề (bài toán), lập trình hướng đối tượng bằng Java và kỹ năng làm việc nhóm.', 'Giúp sinh viên hình thành thái độ học tập tích cực, nghiêm túc và hứng thú trong học tập\r\nHình thành cho sinh viên đạo đức nghề nghiệp, chuẩn mục trong công việc', 'Sinh viên phải tôn trọng giảng viên và sinh viên khác.\r\nSinh viên phải thực hiện quy định liêm chính học thuật của Nhà trường.\r\nSinh viên phải chấp hành các quy định, nội quy của Nhà trường.', 'Bài giảng lập trình hướng đối tượng\r\nBài tập Lập Trình Java', 'Thinking in JAVA\r\nAdvance JAVA\r\nJava Programming\r\nCore Java 2: Volume I, Fundamentals', 1628640000, 146),
(59, 64, 22, 15, 0, 60, 21, '27_82', 1, 1, 1, 3, 'Mô tả', 'Trang bị cho người học các khái niệm cơ bản về ngôn ngữ hình thức, văn phạm và ô-tô-mát; ô-tô-mát hữu hạn, ô-tô-mát đẩy xuống; biểu thức chính quy, ngôn ngữ chính quy, văn phạm phi ngữ cảnh; máy Turing. Người học ứng dụng các kiến thức lĩnh hội được để hoàn thành các bài tập liên quan.', 'Rèn luyện cho người học các kỹ năng giải quyết vấn đề, tư duy và tự học.', 'Giúp người học hình thành thái độ nghiêm túc, tự giác trong học tập; trách nhiệm, hoàn thành tốt và đúng hạn nhiệm vụ được giao; tự trọng, trung thực trong thi cử, đánh giá.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự tìm hiểu và thực hiện các yêu cầu do giảng viên giao;\r\nHoàn thành tất cả nội dung đánh giá của học phần.', 'Giáo trình ngôn ngữ hình thức\r\nSlides bài giảng\r\nIntroduction to Automata Theory, Languages, and Computations', 'Lý thuyết Ngôn ngữ hình thức và Ôtômat', 1628640000, 146),
(60, 69, 30, 0, 0, 60, 84, '137_136_93', 1, 1, 1, 4, 'Môn học được thiết kế bởi 15 bài học, bao phủ các chủ đề của quản trị dự án từ khởi tạo dự án, lập kế hoạch, lịch trình, quản lý rủi ro, và quản lý con người. Thêm vào đó môn học còn làm giới thiệu về các quy trình theo hướng truyền thống (Plan – Driven) và theo hướng hiện đại (Agile) để tiếp cận và quản lý dự án phần mềm', 'Lập được kế hoạch cho một dự án bằng việc sử dụng các kỹ thuật khác nhau.\r\nSử dụng nhiều kỹ thuật để dự toán lịch trình và công việc. \r\nHiểu và áp dụng được các công việc của một quản trị dự án phần mềm đối với tầng bước trong các qui trình phát triển phần mềm. \r\nGiám sát lịch trình, ngân sách và tiến độ dự án phần mềm theo các quy trình cụ thể.\r\nXây dựng và phân tích các báo cáo tình trạng dự án.\r\nXác định dữ liệu lịch sử cần nắm bắt khi đóng dự án.\r\nThực hiện quản lý cơ bản một dự án nhỏ theo quy trình phát triển phần mềm Truyền thống và Agile', 'Kỹ năng quản lý công việc cá nhân, công việc nhóm.\r\nKỹ năng quản lý dự án.\r\nKỹ năng làm việc nhóm.\r\nKỹ năng báo cáo và thuyết trình', 'Thái độ tốt, thấy được tầm quan trọng của việc quản lý trong quá trình phát triển phần mềm', NULL, 'Introduction to Software Project Management\r\nAgile Project Management with Kanban', NULL, 1628640000, 146),
(61, 99, 30, 0, 15, 60, 172, '126_125', 1, 1, 2, 4, NULL, 'Sinh viên có thể xác định được và tóm tắt lại được các kiến thức cơ bản về tương tác người máy, quy trình và các nguyên tắc chính trong thiết kế giao tiếp người dùng.\r\nThực hiện xây dựng được một số giao diện người dùng cụ thể.', 'Sinh viên có khả năng phân tích, đưa ra giao diện đồ họa phù hợp trong các tình huống thực tế.\r\nSinh viên có khả năng sử dụng một số công cụ hỗ trợ thiết kế giao diện đồ họa.', 'Rèn luyện thái độ học tập nghiêm túc, tỉ mỉ, tính kỷ luật cao.\r\nSinh viên đam mê và thích thú với thiết kế, kết quả là sản phẩm ứng dụng thực tế.', NULL, 'Tương tác người máy', 'Interaction Design: Beyond Human Computer\r\nInteraction, 3rd Edition\r\nHuman-Computer Interaction\r\nBài giảng Tương tác người-máy', 1628640000, 146);
INSERT INTO `table_decuongchitiet` (`id_decuong`, `id_hocphan`, `phanbo_lythuyet`, `phanbo_baitap`, `phanbo_thuchanh`, `phanbo_tuhoc`, `giangvienphutrach_id`, `gv_daycung`, `khoaphutrach`, `id_nganh`, `loaihocphan`, `khoikienthuc`, `mota_tomtat`, `muctieu_kienthuc`, `muctieu_kynang`, `muctieu_thaido`, `nhiemvu`, `tailieuthamkhao_giaotrinh`, `tailieuthamkhao_sach`, `ngaypheduyet`, `khungchuongtrinh`) VALUES
(62, 36, 30, 15, 0, 60, 162, '66_84_137_136_190_170', 1, 1, 1, 3, 'Học phần Phân tích và thiết kế hệ thống nhằm cung cấp cho sinh viên kiến thức cơ bản về các hoạt động phân tích và thiết kế phần mềm hướng đối tượng. Học phần giúp sinh viên có thể áp dụng phân tích và thiết kế các hệ thống phần mềm thực tế.', 'Có kiến thức nền tảng về phát triển hướng đối tượng và ngôn ngữ mô hình hóa hợp nhất.', 'Áp dụng được ngôn ngữ mô hình hóa hợp nhất vào hoạt động phân tích và thiết kế hướng đối tượng các bài toán thực tế.\r\nĐánh giá được tài liệu phân tích và thiết kế hướng đối tượng một hệ thống cụ thể.\r\nCó kỹ năng làm việc nhóm, kỹ năng giao tiếp, kỹ năng quản lý thời gian, kỹ năng giải quyết vấn đề.', 'Hình thành thái độ học tập tích cực, đạo đức nghề nghiệp.', NULL, 'Applying UML and Patterns: An Introduction to Object-Oriented Analysis and Design and Iterative Development, Third Edition', 'System Analysis and Design – An Object oriented approach with UML, 5th Edition\r\nThe Unified modeling language reference manual, Second Edition\r\nObject - Oriented Analysis – Understanding system development with UML 2.0, First Edition\r\nBài giảng PT&TK hướng đối tượng\r\nGiáo trình Phân tích, thiết kế hướng đối tượng\r\nPhát triển hướng đối tượng với UML 2.0 và C++', 1628640000, 146),
(63, 67, 23, 0, 15, 120, 83, '9_134', 1, 1, 1, 3, 'Môn học cung cấp các kiến thức nền tảng liên quan đến lĩnh vực Đồ họa máy tính, bao gồm: các quy trình biểu diễn đối tượng; các mô hình màu; các thuật toán vẽ đường, tô màu, xén hình 2D; các phép biến đổi 2D, 3D; kỹ thuật vẽ các đường và mặt cong 3D; các thuật toán khử khuất, tô bóng 3D. Môn học sử dụng các công cụ và thư viện lập trình đồ họa OpenGL nhằm phát triển các ứng dụng đồ họa', 'Cung cấp cho sinh viên những kiến thức nền tảng trong lập trình đồ họa như: Các kiến thức cơ bản, khái niệm trong đồ họa máy tính, hệ tọa độ, hệ màu, phần cứng đồ họa,…; Các kiến thức, các thuật toán trong không gian 2D như vẽ đường, xén hình, tô màu, các phép biến đổi 2D, 3D...; Phép chiếu, mô hình biểu diễn vật thể, quan sát vật thể...trong không gian 3D; Các thuật toán khử khuất, tô bóng,..', 'Nâng cao kỹ năng lập trình và khai thác thư viện mở\r\nVận dụng các kỹ thuật, thuật toán và lập trình để giải quyết các vấn đề trong lĩnh vực đồ họa như: biểu diễn đối tượng 2D, biểu diễn và mô phỏng đối tượng 3D, xây dựng game,…\r\nKỹ năng tự học, làm việc độc lập, làm việc theo nhóm.', 'Nghiêm túc, tự giác trong học tập \r\nTrách nhiệm, hoàn thành tốt và đúng thời hạn nhiệm vụ được giao \r\nTự trọng, trung thực trong thi cử, đánh giá.', 'Sinh viên phải tham gia ít nhất 80% thời gian trên lớp', 'Computer Graphics with OpenGL', 'Interactive Computer Graphics: A top-down approach with shader-based OpenGL\r\nThe OpenGL Programming Guide', 1628640000, 146),
(64, 100, 30, 0, 30, 120, 83, '134', 1, 1, 1, 4, 'Học phần nhằm cung cấp sinh viên các kiến thức cơ bản về lĩnh vực Thị giác máy tính. Sinh viên được trang bị các kiến thức lý thuyết và sử dụng các thư viện, công cụ trong thị giác máy tính (Python, OpenCV, Google Colab, TensorFlow,…) để lập trình giải quyết các bài toán: phân đoạn ảnh; trích chọn đặc trưng, so khớp và nhận dạng ảnh; phát hiện, phân tách và theo dõi chuyển động của đối tượng,…', 'Hiểu được các khái niệm cơ bản, lý thuyết và phương pháp trong lĩnh vực Thị giác máy tính.\r\nSử  dụng thành thạo các thư viện, công cụ hỗ trợ để hiện thực các thuật toán trong Thị giác máy tính.\r\nPhát triển và áp dụng các kỹ thuật Thị giác máy tính để giải quyết các vấn đề thực tế.', 'Nâng cao kỹ năng lập trình và khai thác thư viện mở\r\nVận dụng các kiến thức, phương pháp, kỹ thuật trong Thị giác máy tính vào thực tiễn và nghiên cứu khoa học\r\nPhát triển được các kỹ năng tự học, làm việc độc lập, làm việc nhóm.', 'Nghiêm túc, tự giác trong học tập \r\nTrách nhiệm, hoàn thành tốt và đúng hạn nhiệm vụ được giao \r\nTự trọng, trung thực trong thi cử, đánh giá', 'Sinh viên phải tham gia ít nhất 80% thời gian trên lớp.', 'Computer Vision: Algorithms and Applications', 'Computer Vision: A Modern Approach', 1628640000, 146),
(65, 71, 23, 0, 15, 120, 83, '140_141', 1, 1, 1, 3, 'Môn học cung cấp các kiến thức nền tảng trong lĩnh vực trí tuệ nhân tạo, bao gồm: các phương pháp giải quyết vấn để sử dụng các giải thuật tìm kiếm cơ bản, tìm kiếm có kinh nghiệm, tìm kiếm thỏa mãn ràng buộc, tìm kiếm đối kháng trong trò choi; các phương pháp biểu diễn tri thức và lập luận tự động, lập luận không chắc chắn; một số khái niệm và kỹ thuật cơ bản về học máy. Từ đó, nguời học có cái nhìn tổng quát về trí tuệ nhân tạo, bước đầu áp dụng kiến thức đạt được, khai thác một số công cụ để xây dựng các hệ thống thông minh', 'Cung cấp cho sinh viên các kiến thức nền tảng về nhập môn Trí tuệ nhân tạo: các phương pháp biểu diễn và giải quyết vấn đề, các phương pháp tìm kiếm lời giải, biểu diễn tri thức, các thuật toán suy diễn tự động, các phương pháp lập luận không cắc chắn, khái niệm và một vài kỹ thuật về học máy, về mạng neuron,…', 'Phân tích, thiết kế, giải quyết bài toán theo tiếp cận trí tuệ nhân tạo \r\nVận dụng các giải thuật tìm kiếm lời giải, các phương pháp biểu diễn tri thức, các kỹ thuật học máy vào lĩnh vực cụ thể \r\nLập trình trí tuệ nhân tạo\r\nKỹ năng tự học, làm việc độc lập, làm việc theo nhóm.', 'Nghiêm túc, tự giác trong học tập \r\nTrách nhiệm, hoàn thành tốt và đúng hạn nhiệm vụ được giao \r\nTự trọng, trung thực trong thi cử, đánh giá', 'Sinh viên phải tham gia ít nhất 80% thời gian trên lớp.', 'Artificial Intelligence: A Modern Approach', NULL, 1628640000, 146),
(66, 3, 30, 0, 30, 60, 66, '177_84_175_176_157_22_100_79_139_147_138_65', 1, 1, 1, 2, 'Nội dung của học phần tập trung vào việc tìm hiểu các kiến thức cơ bản của Tin học và ngôn ngữ lập trình C++, thông qua đó người học hiểu rõ các khái niệm cơ bản về hệ thống máy tính, giải thuật và lập trình trên máy tính. Môn học cũng cung cấp các cấu trúc rẽ nhánh, cấu trúc lặp hay kỹ thuật đệ quy để thiết kế một số giải thuật cơ bản; và các cách tổ chức dữ liệu của một chương trình thông qua các kiểu dữ liệu đơn giản và phức tạp, như: mảng 1 chiều, mảng 2 chiều, chuỗi kí tự, kiểu cấu trúc,...', 'Trang bị cho sinh viên những khái niệm cơ bản trong tin học; các khái niệm về giải thuật và lập trình; phương pháp lập trình có cấu trúc và ngôn ngữ lập trình C++, gồm cấu trúc chương trình C++, kiểu dữ liệu cơ bản và kiểu dữ liệu có cấu trúc, cấu trúc điều khiển, xây dựng hàm…', 'Rèn luyện cho sinh viên các kỹ năng giải quyết vấn đề, tư duy, giao tiếp và tự học', 'Giúp sinh viên phát triển được thái độ tốt, có ý thức chủ động, trách nhiệm và tôn trọng lẫn nhau trong học tập.', 'Tham gia ít nhất 80% số tiết học của lớp học phần;\r\nTự tìm hiểu và thực hiện các yêu cầu do giảng viên giao;\r\nHoàn thành tất cả bài đánh giá của học phần.', 'In Starting Out with C++: From Control Structures through Objects', 'Beginning C++', 1628640000, 146),
(68, 106, 21, 9, 0, 60, 204, '119_131', 1, 1, 1, 2, 'Nội dung của môn học gồm 7 chương: Chương 1 trình bày những vấn đề cơ bản có tính nhập môn của Chủ nghĩa xã hội khoa học (Quá trình hình thành, phát triển của Chủ nghĩa xã hội khoa học); từ chương 2 đến chương 7 trình bày những nội dung cơ bản của Chủ nghĩa xã hội khoa học theo mục tiêu môn học.', 'Cung cấp kiến thức cơ bản của chủ nghĩa Mác - Lênin về sứ mệnh lịch sử của giai cấp công nhân; cơ cấu xã hội - giai cấp trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.\r\nCung cấp kiến thức cơ bản của chủ nghĩa Mác - Lênin về chủ nghĩa xã hội, thời kỳ quá độ lên chủ nghĩa xã hội; các vấn đề về dân chủ xã hội chủ nghĩa và nhà nước xã hội chủ nghĩa; các vấn đề dân tộc, tôn giáo và gia đình trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam.', 'Trau dồi và rèn luyện cách thức thuyết trình, phân tích các chủ đề liên quan đến lý luận chính trị thuộc lĩnh vực kinh tế-xã hội.', 'Giúp người học hoàn thiện kiến thức lý luận chính trị liên quan đến lĩnh vực kinh tế-xã hội, để từ đó giúp sinh viên sống và học tập có trách nhiệm với bản thân và cộng đồng.', NULL, 'Giáo trình Chủ nghĩa xã hội khoa học (thí điểm)', 'Luật Hôn nhân và Gia đình\r\nGia đình học\r\nVăn kiện Đại hội Đại biểu toàn quốc lần thứ XII, tr.128\r\nChiến lược phát triển gia đình Việt Nam đến năm 2020, tầm nhìn 2030\r\nGia đình và biến đổi gia đình ở Việt Nam', 1628812800, 146),
(69, 55, 30, 0, 0, 60, 167, '166_205', 1, 1, 1, 1, 'Trên cơ sở mục tiêu của học phần, nội dung của học phần được phân thành 4 chương, cụ thể như sau:\r\nChương 1: Biến cố và xác suất (10 tiết)\r\nChương 2: Biến ngẫu nhiên và các luật phân phối xác suất (10 tiết)\r\nChương 3: Lý thuyết chọn mẫu (4 tiết)\r\nChương 4: Lý thuyết ước lượng và kiểm định (6 tiết)', 'Về xác suất:\r\nMột số quy tắc và công thức tính xác suất như quy tắc cộng, quy tắc nhân, công thức xác suất có điều kiện, công thức xác suất đầy đủ, công thức Bayes và công thức Bernoulli.\r\nBiến ngẫu nhiên và các luật phân phối xác suất thông dụng: hàm phân phối và luật phân phối xác suất của biến ngẫu nhiên, các tham số đặc trưng cơ bản của biến ngẫu nhiên, các luật phân phối xác suất như: phân phối đơn giản, phân phối nhị thức, phân phối Poisson, phân phối chuẩn.\r\nVề thống kê:\r\nLý thuyết chọn mẫu: các phương pháp chọn mẫu và các cách biểu diễn mẫu, đặc biệt là các tham số đặc trưng của mẫu.\r\nLý thuyết ước lượng và kiểm định: các phương pháp, tiêu chuẩn ước lượng, khoảng ước lượng đối xứng, kiểm định giá trị trung bình, phương sai.', 'Rèn luyện cho sinh viên kỹ năng cá nhân, kỹ năng giao tiếp thiết yếu cùng với kỹ năng thực hành thực tế về thu thập, phân tích, xử lý số liệu điều tra. Đặc biệt là kĩ năng phân tích các hiện tượng xã hội theo quan điểm ngẫu nhiên, nhìn sự việc dưới tính tương đối, sẵn sàng đương đầu với khó khăn và chấp nhận rủi ro.', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết các vấn đề trong thực tiễn.', NULL, 'Giáo trình Xác suất thống kê', 'Xác suất  thống kê\r\nLý thuyết xác suất và thống kê toán học\r\nXác suất  thống kê\r\nBài tập xác suất\r\nBài tập thống kê', 1628812800, 146),
(70, 105, 24, 6, 0, 60, 131, '130_204', 1, 1, 1, 2, 'Nội dung chương trình gồm 6 chương: Trong đó, chương 1 bàn về đối tượng, phương pháp nghiên cứu và chức năng của kinh tế chính trị Mác - Lênin. Từ chương 2 đến chương 6 trình bày nội dung cốt lõi của kinh tế chính trị Mác - Lênin theo mục tiêu của môn học. Cụ thể các vấn đề như: Hàng hóa, thị trường và vai trò của các chủ thể trong nền kinh tế thị trường; Sản xuất giá trị thặng dư trong nền kinh tế thị trường; Cạnh tranh và độc quyền trong nền kinh tế thị trường; Kinh tế thị trường định hướng xã hội chủ nghĩa và các quan hệ lợi ích kinh tế ở Việt Nam; Công nghiệp hóa, hiện đại hóa và hội nhập kinh tế quốc tế của Việt Nam.', 'Trang bị cho sinh viên những tri thức cơ bản, cốt lõi của Kinh tế chính trị Mác - Lênin trong bối cảnh phát triển kinh tế của đất nước và thế giới ngày nay. Đảm bảo tính cơ bản, hệ thống, khoa học, cập nhật tri thức mới, gắn với thực tiễn, tính sáng tạo, kỹ năng, tư duy, phẩm chất người học, tính liên thông, khắc phục trùng lắp, tăng cường tích hợp và giảm tải, lược bớt những nội dung không còn phù hợp hoặc những nội dung mang tính kinh viện đối với sinh viên các trường không chuyên lý luận.', 'Hình thành tư duy, kỹ năng phân tích, đánh giá và nhận diện bản chất của các quan hệ lợi ích kinh tế trong phát triển kinh tế - xã hội của đất nước và góp phần giúp sinh viên xây dựng trách nhiệm xã hội phù hợp trong vị trí việc làm và cuộc sống sau khi ra trường.', 'Sinh viên có thái độ tích cực trong việc học tập, tiếp thu nội dung bài học và và vận dụng vào trong thực tiễn. Góp phần xây dựng lập trường, ý thức hệ tư tưởng Mác - Lênin đối với sinh viên.', NULL, 'Giáo trình Kinh tế chính trị - Mác Lênin (thí điểm)', 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin\r\nCuộc cách mạng công nghiệp lần thứ ba', 1628812800, 146),
(71, 79, 21, 9, 0, 60, 120, '130', 1, 1, 1, 2, 'Chương 1: Đảng Cộng sản Việt Nam ra đời và lãnh đạo đấu tranh giành chính quyền (1930 – 1945).\r\nChương 2: Lãnh đạo hai cuộc kháng chiến, hoàn thành giải phóng dân tộc, thống nhất đất nước (1945 – 1975).\r\nChương 3: Lãnh đạo cả nước quá độ đi lên chủ nghĩa xã hội và tiến hành công cuộc đổi mới đất nước (1975 – 2018).', 'Cung cấp những tri thức có tính hệ thống, cơ bản về sự ra đời của Đảng cộng Sản Việt Nam (1920-1930), sự lãnh đạo của Đảng đối với cách mạng Việt Nam trong thời kỳ đấu tranh giành chính quyền (1930-1945), trong hai cuộc kháng chiến chống thực dân Pháp và đế quốc Mỹ xâm lược (1945-1975), trong sự nghiệp xây dựng, bảo vệ Tổ quốc thời kỳ cả nước quá độ lên CNXH, tiến hành công cuộc đổi mới.', 'Trang bị phương pháp tư duy khoa học về lịch sử, kỹ năng lựa chọn tài liệu nghiên cứu, học tập môn học và khả năng vận dụng nhận thức lịch sử vào công tác thực tiễn, phê phán quan niệm sai trái về lịch sử của Đảng.', 'Thông qua các sự kiện lịch sử và các kinh nghiệm về sự lãnh đạo của Đảng để xây dựng ý thức tôn trọng sự thật khách quan nâng cao lòng tự hào dân tộc.', NULL, 'Giáo trình Lịch sử Đảng Cộng sản Việt Nam (thí điểm)', 'Giáo trình Lịch sử Đảng Cộng sản Việt Nam\r\nhttps://www.tapchicongsan.org.vn/', 1628812800, 146),
(72, 1, 21, 9, 0, 30, 121, '', 1, 1, 1, 2, 'Học phần Pháp luật đại cương được thiết kế nhằm cung cấp cho người học những kiến thức cơ bản nhất về Nhà nước và Pháp luật. Nội dung cơ bản của học phần bao gồm: Những vấn đề chung về nhà nước và pháp luật như: Bộ máy nhà nước, quy phạm pháp luật và quan hệ pháp luật, vi phạm pháp luật, trách nhiệm pháp lý… Ngoài ra, học phần cũng cung cấp cho người học một số kiến thức cơ bản về pháp luật phòng, chống tham nhũng', 'Hiểu rõ những vấn đề cơ bản về nhà nước nói chung và Nhà nước CHXHCN Việt Nam nói riêng bao gồm: sự ra đời và bản chất của nhà nước; kiểu, hình thức, chức năng, nguyên tắc tổ chức và hoạt động của bộ máy nhà nước;\r\nHiểu rõ những vấn đề cơ bản về pháp luật nói chung và pháp luật CHXHCN Việt Nam nói riêng bao gồm: nguồn gốc và bản chất của pháp luật; kiểu, hình thức của pháp luật; ý thức pháp luật và pháp chế XHCN;\r\nNắm được cơ cấu một quy phạm pháp luật; hiểu rõ về quan hệ pháp luật XHCN; hình thức và hệ thống pháp luật XHCN; các hành vi vi phạm pháp luật và trách nhiệm pháp lý được Nhà nước đặt ra đối với hành vi vi phạm pháp luật.\r\nNắm được quy định pháp luật liên quan đến phòng chống tham nhũng', 'Phát triển kỹ năng giải quyết tình huống pháp lý cụ thể.\r\nPhát triển kỹ năng tư duy logic, tự nghiên cứu, kỳ năng làm việc nhóm, thuyết trình, phản biện.', 'Sinh viên có tinh thần thượng tôn pháp luật, có tinh thần, trách nhiệm với công việc và với xã hội.\r\nCó hành vi xử sự đúng mực trong ứng xử giao tiếp hàng ngày. \r\nBiết đấu tranh chống lại những hành vi tham nhũng, tiêu cực trong cuộc sống thường ngày.', NULL, 'Giáo trình Pháp luật đại cương', 'Giáo trình Lý luận chung về Nhà nước và pháp luật.\r\nGiáo trình Giáo trình Nhà nước và pháp luật đại cương\r\nTài liệu giảng dạy PL về phòng chống tham nhũng dành cho sinh viên Đại học, cao đẳng không chuyên ngành Luật\r\nLuật Hiến pháp 2013.\r\nLuật Phòng chống tham nhũng năm 2018\r\nBộ luật Dân sự năm 2015\r\nBộ luật Hình sự năm 2015, sửa đổi bổ sung năm 2017\r\nLuật ban hành văn bản quy phạm pháp luật năm 2015, sửa đổi, bổ sung năm 2020.', 1628812800, 146),
(73, 81, 33, 12, 0, 90, 119, '118', 1, 1, 1, 2, 'Chương 1 trình bày những nét khái quát nhất về triết học, triết học Mác – Lênin, và vai trò của triết học Mác – Lênin trong đời sống xã hội. \r\nChương 2 trình bày những nội dung cơ bản của chủ nghĩa duy vật biện chứng, gồm vấn đề vật chất và ý thức; phép biện chứng duy vật; lý luận nhận thức của chủ nghĩa duy vật biện chứng.\r\nChương 3 trình bày những nội dung cơ bản của chủ nghĩa duy vật lịch sử, gồm vấn đề hình thái kinh tế - xã hội; giai cấp và dân tộc; nhà nước và cách mạng xã hội; ý thức xã hội; triết học về con người.', 'Cung cấp những hiểu biết có tính căn bản, hệ thống về triết học Mác-Lênin.', 'Xây dựng được thế giới quan duy vật và phương pháp luận biện chứng duy vật làm nền tảng lý luận cho việc nhận thức các vấn đề, nội dung của các môn học khác.', 'Nhận thức được thực chất giá trị, bản chất khoa học, cách mạng của triết học Mác – Lênin.', NULL, 'Giáo trình Triết học Mác – Lênin (thí điểm)', 'Giáo trình Triết học Mác - Lênin\r\nGiáo trình Triết học Mác – Lênin (tái bản, có sửa chữa, bổ sung)', 1628812800, 146),
(74, 12, 45, 0, 0, 0, 153, '57', 1, 1, 1, 2, 'Học phần này được thiết kế tích hợp giữa 4 kỹ năng Nghe, Nói, Đọc, và Viết cùng với các điểm ngữ pháp. Nội dung học phần được trình bày trong 3 unit; mỗi unit gồm 7 bài học.', 'Trang bị cho sinh viên vốn từ vựng về các địa điểm ở nông thôn và thành thị; các đặc điểm địa lý ở các quốc gia; tên quốc gia và tính từ chỉ quốc tịch; phương tiện đi lại; thực phẩm.\r\nTrang bị cho sinh viên lượng kiến thức liên quan đến các cấu trúc của thì quá khứ đơn, các từ chỉ số lượng, các loại danh từ, mạo từ, ...', 'Giúp sinh viên có thể nghe và hiểu những cụm từ và những từ liên quan đến lĩnh vực cá nhân được sử dụng thường xuyên (ví dụ: thông tin rất cơ bản về cá nhân và gia đình, khu vực địa phương, các quốc gia, các loại thực phẩm); nắm được ý chính trong các tin nhắn và thông báo ngắn, đơn giản, rõ ràng.\r\nGiúp sinh viên có thể đọc được những đoạn văn rất ngắn và đơn giản; tìm được thông tin cụ thể và có thể dự đoán được trong những mẩu tin hàng ngày như tin quảng cáo, thực đơn và thời gian biểu; hiểu được thư tín cá nhân viết ngắn gọn, đơn giản.\r\nGiúp sinh viên có thể giao tiếp được về những công việc đơn giản hàng ngày, trao đổi thông tin trực tiếp và đơn giản về các chủ đề thuộc như ẩm thực, nhà hàng, địa điểm, quốc gia, danh nhân và hoạt động quen; trao đổi rất ngắn gọn về những vấn đề xã hội, mặc dù bản thân chưa thể hiểu đầy đủ để tự mình có thể duy trì cuộc nói chuyện.\r\nGiúp sinh viên có thể viết được những ghi chú và tin nhắn đơn giản và ngắn; viết một bức thư cá nhân rất đơn giản ví dụ như thư cảm ơn ai đó về việc gì.', 'Biết tự chủ và có trách nhiệm đối với cá nhân ; có thái độ hợp tác, thân thiện với các bạn; có tính thần học hỏi, cần cù, sáng tạo.', NULL, 'Solutions, Elementary Student’s Book & Workbook', 'Key English Test', 1628812800, 146),
(76, 31, 30, 30, 30, 90, 20, '172_23_146_147_176', 1, 1, 1, 3, NULL, 'Trình bày kiến trúc của một ứng dụng web, công nghệ Server, DNS, Website tĩnh và Website động…\r\nNắm vững các nguyên tắc thiết kế và lập trình một Website động.\r\nVận dụng ngôn ngữ lập trình PHP và Hệ quản trị cơ sở dữ liệu MySQL.\r\nSử dụng một số Framework phổ biến với Ngôn ngữ lập trình PHP.', 'Sinh viên có thể sử dụng Ngôn ngữ lập trình PHP và Hệ quản trị cơ sở dữ liệu MySQL để xây dựng Website động có tính ứng dụng cao, giao diện thân thiện, có sự tương tác với người dùng, xử lý thông tin và truy xuất dữ liệu… \r\nSinh viên có thể nghiên cứu và sử dụng một số Framework, mã nguồn mở phổ biến để lập trình Website động.\r\nSinh viên có thể quản lý và xuất bản Website lên Internet.', 'Sinh viên có thái độ, động cơ học tập rõ ràng, chú ý nghe giảng trên lớp, tích cực nghiên cứu tài liệu, làm thực hành ở nhà và tham gia thảo luận nhóm.\r\nSinh viên xác định được phương pháp học tập hiệu quả và có khoa học, có tinh thần và ý thức học tập cao.\r\nSinh viên đam mê và thích thú với việc lập trình.', NULL, 'Murach\'s PHP and MySQL, 3rd', 'Learning PHP. \r\nJavaScript Step by Step', 1628985600, 146),
(78, 12, 45, 0, 0, 0, 153, '57', 1, 1, 1, 2, 'Học phần này được thiết kế tích hợp giữa 4 kỹ năng Nghe, Nói, Đọc, và Viết cùng với các điểm ngữ pháp. Nội dung học phần được trình bày trong 3 unit; mỗi unit gồm 7 bài học.', 'Trang bị cho sinh viên vốn từ vựng về các địa điểm ở nông thôn và thành thị; các đặc điểm địa lý ở các quốc gia; tên quốc gia và tính từ chỉ quốc tịch; phương tiện đi lại; thực phẩm.\r\nTrang bị cho sinh viên lượng kiến thức liên quan đến các cấu trúc của thì quá khứ đơn, các từ chỉ số lượng, các loại danh từ, mạo từ, ...', 'Giúp sinh viên có thể nghe và hiểu những cụm từ và những từ liên quan đến lĩnh vực cá nhân được sử dụng thường xuyên (ví dụ: thông tin rất cơ bản về cá nhân và gia đình, khu vực địa phương, các quốc gia, các loại thực phẩm); nắm được ý chính trong các tin nhắn và thông báo ngắn, đơn giản, rõ ràng.\r\nGiúp sinh viên có thể đọc được những đoạn văn rất ngắn và đơn giản; tìm được thông tin cụ thể và có thể dự đoán được trong những mẩu tin hàng ngày như tin quảng cáo, thực đơn và thời gian biểu; hiểu được thư tín cá nhân viết ngắn gọn, đơn giản.\r\nGiúp sinh viên có thể giao tiếp được về những công việc đơn giản hàng ngày, trao đổi thông tin trực tiếp và đơn giản về các chủ đề thuộc như ẩm thực, nhà hàng, địa điểm, quốc gia, danh nhân và hoạt động quen; trao đổi rất ngắn gọn về những vấn đề xã hội, mặc dù bản thân chưa thể hiểu đầy đủ để tự mình có thể duy trì cuộc nói chuyện.\r\nGiúp sinh viên có thể viết được những ghi chú và tin nhắn đơn giản và ngắn; viết một bức thư cá nhân rất đơn giản ví dụ như thư cảm ơn ai đó về việc gì.', 'Biết tự chủ và có trách nhiệm đối với cá nhân ; có thái độ hợp tác, thân thiện với các bạn; có tính thần học hỏi, cần cù, sáng tạo.', NULL, 'Solutions, Elementary Student’s Book & Workbook', 'Key English Test', 1629763200, 156),
(82, 12, 1, 1, 1, 1, 1, '', 1, 1, 1, 1, '1', '1', '1', '1', '1', NULL, NULL, 1632268800, 142),
(83, 3, 2, 2, 2, 2, 1, '5', 2, 1, 1, 1, 'a', 'a', 'a', 'a', 'a', NULL, NULL, 1632268800, 142),
(85, 7, 2, 2, 2, 2, 23, '3_8', 1, 1, 1, 2, 'n', 'n', 'n', 'n', 'a', NULL, NULL, 1636243200, 142),
(86, 12, 3, 3, 3, 3, 18, '2_4_25', 1, 1, 1, 1, 'm', 'm', 'm', 'm', 'm', NULL, NULL, 1636243200, 154),
(87, 13, 15, 0, 30, 0, 18, '64_23_2', 1, NULL, 2, 2, 'Học phần tiếng Anh chuyên ngành bao gồm các bài đọc liên quan về lĩnh vực công nghệ thông tin phù hợp với giai đoạn đầu học chuyên ngành của sinh viên công nghệ thông tin và hướng dẫn thực tập cách thực hiện bài báo cáo tiếng Anh trên powerpoint, khả năng đọc bài báo tiếng Anh chuyên ngành,…', 'Nắm bắt được các các kiến thức tiếng Anh chuyên ngành công nghệ thông tin về máy vi tính và các thiết bị ngoại vi\r\nÁp dụng kiến thức tiếng Anh chuyên ngành để đọc tài liệu tiếng Anh\r\nVận dụng tất cả kiến thức đã học để trình bày một chủ đề công nghệ thông tin bằng tiếng Anh', 'Vận dụng kỹ năng tự luyện tập để nghe và trả lời các câu hỏi bằng tiếng Anh\r\nTrình bày các vấn đề liên quan đến chuyên ngành bằng tiếng Anh', 'Giúp sinh viên hình thành thái độ học tập tích cực, đạo đức nghề nghiệp và sự tự chủ, tự chịu trách nhiệm trong giải quyết....', 'SV tham dự >=80% số buổi của HP. Nếu nghỉ >20% số buổi sẽ không được dự thi kết thúc HP.', NULL, NULL, 1637280000, 142),
(88, 15, 60, 0, 30, 0, 66, '169_83_135_21_168_146', 1, NULL, 1, 3, 'Học phần Cấu trúc dữ liệu thuộc khối kiens thức cơ sở ngành bắt buộc. Học phần bao gồm các nội dung về các cấu trúc dữ liệu và một số giải thuậtcơ bản trong CNTT. Học phần giúp sinh viên có thể áp dụng giải quyết các bài toán tin học trong thực tế.  Học phần Cấu trúc dữ liệu và giải thuật thuộc khối kiến thức cơ sở của ngành CNTT.', 'Học phần nhằm cung cấp cho sinh viên kiến thức cơ bản về các cấu trúc dữ liệu, như danh sách, ngăn xếp, hàng đợi, cây, đồ thị... Ngoài ra, học phần cung cấp một số giải thuật, như: Đệ quy, sắp xếp... và các giải thuật xử lý trên các cấu trúc dữ liệu', NULL, NULL, NULL, NULL, NULL, 1637452800, 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_decuongchitiet_moilienhe_clo_pi`
--

CREATE TABLE `table_decuongchitiet_moilienhe_clo_pi` (
  `id` int(11) NOT NULL,
  `id_chuandaura_chung_chitiet` int(11) DEFAULT NULL,
  `id_chuandaura_monhoc` int(11) DEFAULT NULL,
  `mucdo` int(11) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_decuongchitiet_moilienhe_clo_pi`
--

INSERT INTO `table_decuongchitiet_moilienhe_clo_pi` (`id`, `id_chuandaura_chung_chitiet`, `id_chuandaura_monhoc`, `mucdo`, `id_hocphan`, `khungchuongtrinh`) VALUES
(7, 10, 22, 0, 15, 156),
(8, 15, 20, 0, 15, 156),
(9, 17, 19, 0, 15, 156),
(10, 17, 22, 2, 15, 156),
(11, 19, 19, 0, 15, 156),
(12, 19, 21, 0, 15, 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_decuongchitiet_moilienhe_clo_plo`
--

CREATE TABLE `table_decuongchitiet_moilienhe_clo_plo` (
  `id` int(11) NOT NULL,
  `id_chuandaura_chung` int(11) DEFAULT NULL,
  `id_chuandaura_monhoc` int(11) DEFAULT NULL,
  `mucdo` int(11) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_decuongchitiet_moilienhe_clo_plo`
--

INSERT INTO `table_decuongchitiet_moilienhe_clo_plo` (`id`, `id_chuandaura_chung`, `id_chuandaura_monhoc`, `mucdo`, `id_hocphan`, `khungchuongtrinh`) VALUES
(9, 1, 4, 0, 12, 142),
(10, 1, 5, 2, 12, 142),
(11, 3, 4, 2, 12, 142);

-- --------------------------------------------------------

--
-- Table structure for table `table_giangvien`
--

CREATE TABLE `table_giangvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_gv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hodem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donvi_id` int(11) DEFAULT NULL,
  `is_gv` tinyint(4) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucdanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_giangvien`
--

INSERT INTO `table_giangvien` (`id`, `ma_gv`, `hodem`, `ten`, `donvi_id`, `is_gv`, `username`, `password`, `ngaysinh`, `phone`, `chucdanh`, `email`, `website`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Lê Văn ', 'Minh', 1, 1, 'lvminh', '', '0000-00-00 00:00:00', '0983830604', 'TS', 'lvminh@vku.udn.vn', NULL, NULL, NULL, NULL),
(2, '', 'Văn Đỗ Cẩm', 'Vân', 1, 1, 'vdcvan', '', '0000-00-00 00:00:00', '', 'ThS', 'vdcvan@vku.udn.vn', NULL, NULL, NULL, NULL),
(3, '', 'Trần Thị ', 'Kiều', 1, 1, 'ttkieu', '', '0000-00-00 00:00:00', '', 'ThS', 'ttkieu@vku.udn.vn', NULL, NULL, NULL, NULL),
(4, '', 'Lê Hải ', 'Trung', 1, 1, 'lhtrung', '', '0000-00-00 00:00:00', '', 'TS', '‎trungybvnvr@yahoo.com', NULL, NULL, NULL, NULL),
(5, '', 'Ngô Thị Bích ', 'Thủy', 1, 1, 'ntbthuy', '', '0000-00-00 00:00:00', '', 'ThS', 'bichthuydhdnsp@gmail.com', NULL, NULL, NULL, NULL),
(6, '', 'Khoa ', 'CNTT&TT', 1, NULL, '', '', '0000-00-00 00:00:00', '', 'Khoa', '', NULL, NULL, NULL, NULL),
(7, '', 'Khoa ', 'GDTC', 1, NULL, '', '', '0000-00-00 00:00:00', '', 'Khoa', '', NULL, NULL, NULL, NULL),
(8, '', 'Huỳnh Công ', 'Pháp', 1, 1, 'hcphap', '', '0000-00-00 00:00:00', '', 'PGS.TS', 'hcphap@vku.udn.vn', NULL, NULL, NULL, NULL),
(9, '', 'Nguyễn Đức', 'Hiển', 1, 1, 'ndhien', '', '0000-00-00 00:00:00', '0905734949', 'TS', 'ndhien@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:10:27'),
(10, '', 'Hà Thị Minh ', 'Phương', 1, 1, 'htmphuong', '', '0000-00-00 00:00:00', '0987710719', 'ThS', 'htmphuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(11, '', 'Trần Lương ', 'Nguyệt', 1, 1, 'tlnguyet', '', '0000-00-00 00:00:00', '', 'ThS', 'tlnguyet@vku.udn.vn', NULL, NULL, NULL, NULL),
(12, '', 'Đậu Ngọc ', 'Luận', 1, 1, 'dnluan', '', '0000-00-00 00:00:00', '', 'GV', '', NULL, NULL, NULL, NULL),
(13, '', 'Đoàn Gia ', 'Dũng', 1, 1, 'dgdung', '', '0000-00-00 00:00:00', '', 'TS', '', NULL, NULL, NULL, NULL),
(14, '', 'Tôn Nữ Xuân', 'Phương', 1, 1, 'tnxphuong', '', '0000-00-00 00:00:00', '0988877468', 'ThS', 'phuonganhaitay@gmail.com', NULL, NULL, NULL, '2020-06-08 07:12:11'),
(15, '', 'Trần Hữu Ngô ', 'Duy', 1, 1, 'thnduy', '', '0000-00-00 00:00:00', '', 'ThS', 'thnduy@gmail.com', NULL, NULL, NULL, NULL),
(16, '', 'Lê Xuân Việt', 'Hương', 1, 1, 'lxvhuong', '', '0000-00-00 00:00:00', '_', 'ThS', 'huongle280970@gmail.com', '', NULL, NULL, '2020-11-13 09:48:01'),
(17, '', 'Trần Thị Túy', 'Phượng', 1, 1, 'tttphuong', '', '0000-00-00 00:00:00', '_', 'ThS', 'tuyphuong2009@gmail.com', NULL, NULL, NULL, '2020-11-13 09:50:20'),
(18, '', 'Võ Hùng ', 'Cường', 1, 1, 'vhcuong', '', '0000-00-00 00:00:00', '0905672025', 'ThS', 'vhcuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(19, '', 'Nguyễn Thị Diệu ', 'Thanh', 1, 1, 'ntdthanh', '', '0000-00-00 00:00:00', '', 'ThS', 'dieuthanhvn1@gmail.com', NULL, NULL, NULL, NULL),
(20, '', 'Nguyễn Văn ', 'Bình', 1, 1, 'nvbinh', '', '0000-00-00 00:00:00', '0905551136', 'ThS', 'nvbinh@vku.udn.vn', NULL, NULL, NULL, NULL),
(21, '', 'Trần Đình ', 'Sơn', 1, 1, 'tdson', '', '0000-00-00 00:00:00', '0903591955', 'ThS', 'tdson@vku.udn.vn', NULL, NULL, NULL, NULL),
(22, '', 'Đinh Thị Mỹ ', 'Hạnh', 1, 1, 'dtmhanh', '', '0000-00-00 00:00:00', '0906755553', 'ThS', 'myhanh01t1@gmail.com', NULL, NULL, NULL, NULL),
(23, '', 'Nguyễn Anh', 'Tuấn', 3, 1, 'natuan', '', '0000-00-00 00:00:00', '0935.727727', 'ThS', 'natuan@vku.udn.vn', NULL, NULL, NULL, '2020-12-11 02:57:22'),
(24, '', 'Lê Minh ', 'Thái', 1, 1, 'lmthai', '', '0000-00-00 00:00:00', '', 'TS', '', NULL, NULL, NULL, NULL),
(25, '', 'Huỳnh Thị Kim', 'Hà', 1, 1, 'htkha', '', '0000-00-00 00:00:00', '0905100328', 'ThS', 'htkha2017@gmail.com', NULL, NULL, NULL, NULL),
(26, '', 'Phạm Anh', 'Phương', 1, 1, 'paphuong', '', '0000-00-00 00:00:00', '', 'TS', 'paphuong.spdn@gmail.com', NULL, NULL, NULL, NULL),
(27, '', 'Dương Thị Mai', 'Nga', 1, 1, 'dtmnga', '', '0000-00-00 00:00:00', '0935020683', 'ThS', 'dtmnga@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:18:54'),
(28, '', 'Huỳnh Ngọc', 'Thọ', 1, 1, 'hntho', '', '0000-00-00 00:00:00', '0982191459', 'TS', 'hntho@vku.udn.vn', NULL, NULL, NULL, NULL),
(29, '', 'Hồ Viết', 'Việt', 1, 1, 'hvviet', '', '0000-00-00 00:00:00', '0913443343', 'TS', 'hoviet.viet@gmail.com', NULL, NULL, NULL, NULL),
(30, '', 'Phan Thị Quỳnh', 'Hương', 1, 1, 'ptqhuong', '', '0000-00-00 00:00:00', '0988159624', 'ThS', 'ptqhuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(31, '', 'Mai', 'Lam', 1, 1, 'mlam', '', '0000-00-00 00:00:00', '', 'ThS', 'mlam@vku.udn.vn', NULL, NULL, NULL, NULL),
(32, '', 'Cao Xuân', 'Tuấn', 12, 1, 'cxtuan', '', '0000-00-00 00:00:00', '1', 'TS', 'cxtuan@cit.udn.vn', NULL, NULL, NULL, '2020-08-13 15:47:08'),
(33, '', 'Phạm Thị Thanh', 'Mai', 1, 1, 'pttmai', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(34, '', 'Huỳnh Thị Thanh', 'Vân', 1, 1, 'httvan', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(35, '', 'Lương Văn', 'Thọ', 1, 1, 'lvtho', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(36, '', 'Dương Ngọc', 'Pháp', 1, 1, 'dnphap', '', '0000-00-00 00:00:00', '', 'ThS', 'dnphap@vku.udn.vn', NULL, NULL, NULL, NULL),
(37, '', 'Đặng Thị Thanh', 'Minh', 1, 1, 'dttminh', '', '0000-00-00 00:00:00', '0973605603', 'ThS', 'dttminh@vku.udn.vn', NULL, NULL, NULL, NULL),
(38, '', 'Nguyễn Thị Khánh', 'My', 1, 1, 'ntkmy', '', '0000-00-00 00:00:00', '0935721555', 'ThS', 'ntkmy@vku.udn.vn', NULL, NULL, NULL, NULL),
(39, '', 'Đào Thị Thu', 'Hường', 1, 1, 'dtthuong', '', '0000-00-00 00:00:00', '0941309305', 'ThS', 'dtthuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(40, '', 'Đoàn Thị Hoài', 'Thanh', 1, 1, 'dththanh', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(41, '', 'Nguyễn Thanh', 'Liêm', 1, 1, 'ntliem', '', '0000-00-00 00:00:00', '', 'PGS.TS.', '', NULL, NULL, NULL, NULL),
(42, '', 'Vũ Thu', 'Hà', 1, 1, 'vtha', '', '0000-00-00 00:00:00', '0917981101', 'ThS', 'vtha@vku.udn.vn', NULL, NULL, NULL, NULL),
(43, '', 'Nguyễn Tiến', 'Nam', 1, 1, 'ntnam', '', '0000-00-00 00:00:00', '0905698198', 'TS', 'nguyentiennam01011960@gmail.com', NULL, NULL, NULL, '2019-10-07 08:21:41'),
(45, '', 'Lê Thị', 'Nhi', 1, 1, 'ltnhi', '', '0000-00-00 00:00:00', '0934057126', 'ThS', 'ltnhi27march@gmail.com', NULL, NULL, NULL, NULL),
(47, '', 'Trương Thị Ánh', 'Tuyết', 1, 1, 'ttatuyet', '', '0000-00-00 00:00:00', '_', 'ThS', 'myanhtuyet@gmail.com', NULL, NULL, NULL, '2020-11-13 09:49:34'),
(48, '', 'Nguyễn Lê Lộc', 'Tiên', 1, 1, 'nlltien', '', '0000-00-00 00:00:00', '', 'ThS', 'nlltien@vku.udn.vn', NULL, NULL, NULL, NULL),
(50, '', 'Nguyễn Vũ Anh', 'Quang', 3, 1, 'nvaquang', '', '0000-00-00 00:00:00', '0914113974', 'TS', 'nvaquang@vku.udn.vn', NULL, NULL, NULL, '2020-11-10 02:37:22'),
(51, '', 'Nguyễn Thế Xuân', 'Ly', 1, 1, 'ntxly', '', '0000-00-00 00:00:00', '', 'ThS', 'nguyenthexuanly@gmail.com', NULL, NULL, NULL, NULL),
(52, '', 'Võ Trung', 'Hùng', 1, 1, 'vthung', '', '0000-00-00 00:00:00', '', 'PGS.TS.', '', NULL, NULL, NULL, NULL),
(53, '', 'Nguyễn Thị Hoa', 'Huệ', 1, 1, 'nthhue', '', '0000-00-00 00:00:00', '', 'TS', 'huenth@gmail.com', NULL, NULL, NULL, NULL),
(54, '', 'Lê Hà Như', 'Thảo', 1, 1, 'lhnthao', '', '0000-00-00 00:00:00', '0905127138', 'ThS', 'lhnthao@vku.udn.vn', NULL, NULL, NULL, NULL),
(55, '', 'Đinh Nguyễn Khánh', 'Phương', 1, 1, 'dnkphuong', '', '0000-00-00 00:00:00', '0905288186', 'ThS', 'dnkphuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(56, '', 'Phan Quang Như', 'Anh', 1, 1, 'pqnanh', '', '0000-00-00 00:00:00', '', 'ThS', 'nhuanh83@gmail.com', NULL, NULL, NULL, NULL),
(57, '', 'Nguyễn Thị', 'Tuyết', 1, 1, 'nttuyet', '', '0000-00-00 00:00:00', '0905772661', 'ThS', 'nttuyet@vku.udn.vn', NULL, NULL, NULL, NULL),
(58, '', 'Trần Thị', 'Hiền', 1, 1, 'tthien', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(59, '', 'Trương Hoàng Tú', 'Nhi', 1, 1, 'thtnhi', '', '0000-00-00 00:00:00', '0905502488', 'ThS', 'thtnhi@vku.udn.vn', NULL, NULL, NULL, NULL),
(60, '', 'Bùi Trần', 'Huân', 1, 1, 'bthuan', '', '0000-00-00 00:00:00', '0905295989', 'ThS', 'bthuan@vku.udn.vn', NULL, NULL, NULL, NULL),
(61, '', 'Nguyễn Văn', 'Chức', 1, 1, 'nvchuc', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(62, '', 'Lâm Tùng', 'Giang', 1, 1, 'ltgiang', '', '0000-00-00 00:00:00', '', 'TS', '', NULL, NULL, NULL, NULL),
(63, '', 'Trần Thu', 'Thủy', 1, 1, 'ttthuy', '', '0000-00-00 00:00:00', '0905888069', 'ThS', 'ttthuy@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:19:12'),
(64, '', 'Phan Trọng', 'Thanh', 1, 1, 'ptthanh', '', '0000-00-00 00:00:00', '0905665758', 'ThS', 'ptthanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(65, '', 'Lê Song', 'Toàn', 1, 1, 'lstoan', '', '0000-00-00 00:00:00', '0906148477', 'ThS', 'lstoan@vku.udn.vn', NULL, NULL, NULL, '2020-08-30 14:41:22'),
(66, '', 'Nguyễn Thanh', 'Bình', 3, 1, 'ntbinh', '', '0000-00-00 00:00:00', '0914747974', 'PGS.TS', 'ntbinh@vku.udn.vn', NULL, NULL, NULL, '2020-09-02 14:57:17'),
(68, '', 'Trần Lê Nhật', 'Quang', 1, 1, 'tlnquang', '', '0000-00-00 00:00:00', '', 'GV', '', NULL, NULL, NULL, NULL),
(69, '', 'Trần Thế', 'Vũ', 1, 1, 'ttvu', '', '0000-00-00 00:00:00', '', 'TS', 'anhvaut@gmail.com', NULL, NULL, NULL, NULL),
(70, '', 'Lê Thị Hải', 'Yến', 1, 1, 'lthyen', '', '0000-00-00 00:00:00', '11', 'ThS', 'haiyennn1111@gmail.com', NULL, NULL, NULL, '2020-11-13 09:48:43'),
(72, '', 'Trần Danh', 'Nhân', 1, 1, 'tdnhan', '', '0000-00-00 00:00:00', '', 'ThS', 'nhan.trandanh@gmail.com', NULL, NULL, NULL, NULL),
(73, '', 'Trần Thị Vi', 'Vân', 1, 1, 'ttvvan', '', '0000-00-00 00:00:00', '', 'CN', '', NULL, NULL, NULL, NULL),
(74, '', 'Đặng Quang', 'Hiển', 1, 1, 'dqhien', '', '0000-00-00 00:00:00', '09', 'TS', 'dqhien@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:09:40'),
(75, '', 'Hoàng Hữu', 'Đức', 1, 1, 'hhduc', '', '0000-00-00 00:00:00', '0914 008899', 'TS', 'hhduc@vku.udn.vn', NULL, NULL, NULL, '2020-08-13 16:34:39'),
(76, '', 'Lê Thị Phương', 'Thảo', 1, 1, 'ltpthao', '', '0000-00-00 00:00:00', '', 'ThS', 'lethaospdn@gmail.com', NULL, NULL, NULL, NULL),
(77, '', 'Nguyễn Linh', 'Giang', 1, 1, 'nlgiang', '', '0000-00-00 00:00:00', '0983835046', 'ThS', 'nlgiang@vku.udn.vn', NULL, NULL, NULL, NULL),
(78, '', 'Nguyễn Thị Hồng', 'Phượng', 1, 1, 'nthphuong', '', '0000-00-00 00:00:00', '', 'ThS', 'phuonguyenlaw@gmail.com ', NULL, NULL, NULL, NULL),
(79, '', 'Nguyễn Xuân', 'Pha', 1, 1, 'nxpha', '', '0000-00-00 00:00:00', '0917981177', 'ThS', 'nxpha@vku.udn.vn', NULL, NULL, NULL, NULL),
(80, '', 'Tran Dinh', 'Tuan', 1, 1, 'tdtuan', '', '0000-00-00 00:00:00', '', 'ThS', 'tdtuan@vku.udn.vn', NULL, NULL, NULL, NULL),
(82, '', 'Nguyễn Thị Minh', 'Hỷ', 1, 1, 'ntmhy', '', '0000-00-00 00:00:00', '', 'ThS', 'minhy81199@gmail.com', NULL, NULL, NULL, NULL),
(83, '', 'Lê Thị Thu', 'Nga', 1, 1, 'lttnga', '', '0000-00-00 00:00:00', '0942191079', 'TS', 'lttnga@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:17:47'),
(84, '', 'Nguyễn Quang', 'Vũ', 1, 1, 'nqvu', '', '0000-00-00 00:00:00', '0901982982', 'TS', 'nqvu@vku.udn.vn', NULL, NULL, NULL, '2020-05-04 00:50:18'),
(85, '', 'Nguyễn Hà Huy', 'Cường', 1, 1, 'nhhcuong', '', '0000-00-00 00:00:00', '0935019929', 'TS', 'nhhcuong@vku.udn.vn', NULL, NULL, NULL, '2020-03-18 03:14:54'),
(87, '', 'Trần Thảo', 'An', 1, 1, 'ttan', '', '0000-00-00 00:00:00', '_', 'TS', 'ttan@vku.udn.vn', NULL, NULL, NULL, '2020-05-06 03:16:03'),
(88, '', 'Vũ Thị Tuyết', 'Mai', 1, 1, 'vttmai', '', '0000-00-00 00:00:00', '0917781643', 'ThS', 'vttmai@vku.udn.vn', NULL, NULL, NULL, '2020-10-23 06:52:27'),
(89, '', 'Trần Thị', 'Hải', 1, 1, 'tthai', '', '0000-00-00 00:00:00', '', 'TS', 'tranhai.bm@gmail.com', NULL, NULL, NULL, NULL),
(92, '', 'Đoàn Xuân', 'Trang', 1, 1, 'dxtrang', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(93, '', 'Trịnh Công', 'Duy', 1, 1, 'tcduy', '', '0000-00-00 00:00:00', '', 'TS', 'congduy@gmail.com', NULL, NULL, NULL, NULL),
(94, '', 'Phan Thanh', 'Tao', 1, 1, 'pttao', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(95, '', 'Trần Thị Quỳnh', 'Châu', 1, 1, 'ttqchau', '', '0000-00-00 00:00:00', '0905722057', 'ThS', 'tranquynhchau9991@gmail.com', NULL, NULL, NULL, '2020-11-11 01:51:44'),
(96, '', 'Nguyễn Thị Kim', 'Ngọc', 1, 1, 'ntkngoc', '', '0000-00-00 00:00:00', '0357898989', 'ThS', 'ntkngoc@vku.udn.vn', NULL, '', '0000-00-00 00:00:00', '2019-11-07 04:58:07'),
(97, '', 'Nguyễn Thị Thanh', 'Nhàn', 1, 1, 'nttnhan', '', '0000-00-00 00:00:00', '0367289854', 'ThS', 'nttnhan@vku.udn.vn', NULL, '', '0000-00-00 00:00:00', '2019-10-28 01:18:59'),
(98, '', 'Nguyễn Thị Thu', 'Ngân', 1, 1, 'nttngan', '', '0000-00-00 00:00:00', '0905603504', 'ThS', 'nttngan@vku.udn.vn', NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '', 'Trần Thị Mỹ', 'Châu', 1, 1, 'ttmchau', '', '0000-00-00 00:00:00', '0915856119', 'ThS', 'ttmchau@vku.udn.vn', NULL, '', '0000-00-00 00:00:00', '2020-03-18 03:14:34'),
(100, '', 'Nguyễn Lê Tùng', 'Khánh', 1, 1, 'nltkhanh', '', '0000-00-00 00:00:00', '0905410416', 'ThS', 'nltkhanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(101, '', 'Đặng', 'Vinh', 1, 1, 'dvinh', '', '0000-00-00 00:00:00', '0905954688', 'TS', 'dangvinh71@gmail.com', NULL, NULL, '2019-11-19 04:12:12', '2020-12-17 02:15:18'),
(102, '', 'Nguyễn Thị Thùy', 'Linh', 1, 1, 'nttlinh', '', '0000-00-00 00:00:00', '', '', 'nttlinh@vku.udn.vn', NULL, NULL, NULL, NULL),
(103, '', 'Trương Quốc', 'Tuấn', 1, 1, 'tqtuan', '', '0000-00-00 00:00:00', '0913111576', 'DN', 'tuan.truongquoc@gmail.com', NULL, NULL, '2019-12-20 02:38:52', '2020-05-08 07:00:18'),
(104, '', 'Huỳnh Hữu', 'Hưng', 1, 1, 'hhhung', '', '0000-00-00 00:00:00', '1', 'TS', 'hhuuhung@gmail.com', NULL, NULL, NULL, '2020-08-14 04:54:57'),
(105, '', 'Phạm Công', 'Thắng', 2, 1, 'pcthang', '', '0000-00-00 00:00:00', '0905983126', 'TS', 'pacotha@gmail.com', NULL, NULL, NULL, '2020-08-28 16:41:13'),
(106, '', 'Lê Thị Mỹ', 'Hạnh', 1, 1, 'ltmhanh', '', '0000-00-00 00:00:00', '0911292955', 'TS', 'ltmhanh@vku.udn.vn', NULL, NULL, NULL, '2020-05-06 03:15:11'),
(107, '', 'Lê Phước Cửu', 'Long', 1, 1, 'lpclong', '', '0000-00-00 00:00:00', '0905150200', 'TS', 'lpclong@vku.udn.vn', NULL, NULL, NULL, '2020-04-18 00:05:44'),
(108, '', 'Bùi Thị Minh', 'Thu', 1, 1, 'btmthu', '', '0000-00-00 00:00:00', '0914180006', 'TS', 'thubtmgv@gmail.com', NULL, NULL, NULL, '2019-12-27 06:12:05'),
(109, '', 'Bùi Thị Thanh', 'Thanh', 1, 1, 'bttthanh', '', '0000-00-00 00:00:00', '0961055111', 'TS', 'thanhthanh037@gmail.com', NULL, NULL, NULL, '2019-12-25 01:05:50'),
(110, '', 'Tổ', 'Đào tạo', 1, 1, 'todaotao', '', '0000-00-00 00:00:00', '', 'ThS', '', NULL, NULL, NULL, NULL),
(111, '', 'Nguyễn Thị Hải', 'Yến', 1, 1, 'nthyen', '', '0000-00-00 00:00:00', '0984630996', 'ThS', 'hyensp@gmail.com', NULL, NULL, NULL, '2020-01-13 00:55:31'),
(112, '', 'Nguyễn Thị', 'Thân', 1, 1, 'ntthan', '', '0000-00-00 00:00:00', '', '', 'ntthan@vku.udn.vn', NULL, NULL, NULL, NULL),
(113, '', 'Phan Thị Thu', 'Huyền', 1, 1, 'ptthuyen', '', '0000-00-00 00:00:00', '', '', 'ptthuyen@vku.udn.vn', NULL, NULL, NULL, NULL),
(114, '', 'Nguyễn Ngọc Như', 'Trang', 1, 1, 'nnntrang', '', '0000-00-00 00:00:00', '09', 'CN', 'nnntrang@vku.udn.vn', NULL, NULL, '2020-04-22 04:11:25', '2020-04-22 04:11:25'),
(115, '', 'Phạm Hồ Trọng', 'Nguyên', 1, 1, 'phtnguyen', '', '0000-00-00 00:00:00', '_', 'ThS', 'phtnguyen@vku.udn.vn', NULL, NULL, '2020-05-09 07:03:49', '2020-05-09 07:03:49'),
(116, '', 'Ngô Minh', 'Thành', 1, 1, 'nmthanh', '', '0000-00-00 00:00:00', '', 'CN', 'nmthanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(117, '', 'Ngô Thị Sơn', 'Lâm', 1, 1, 'ntslam', '', '0000-00-00 00:00:00', '', 'CV', 'ntslam@vku.udn.vn', NULL, NULL, NULL, NULL),
(118, '', 'Dương Thị', 'Phượng', 3, 1, 'dtphuong', '', '0000-00-00 00:00:00', '1', 'TS', 'dtphuong@vku.udn.vn', NULL, NULL, '2020-08-01 09:36:04', '2020-08-01 09:36:04'),
(119, '', 'Trần Văn', 'Thái', 1, 1, 'tvthai', '', '0000-00-00 00:00:00', '0941 749618', 'ThS', 'tvthai@vku.udn.vn', NULL, NULL, '2020-08-01 09:38:58', '2020-08-11 15:33:31'),
(120, '', 'Trần Hoàng', 'Hạnh', 1, 1, 'tvthai', '', '0000-00-00 00:00:00', '0935160285', 'ThS', 'thhanh@vku.udn.vn', NULL, NULL, '2020-08-01 09:44:48', '2020-08-06 08:25:09'),
(121, '', 'Nguyễn Thị Phương', 'Thảo', 1, 1, 'ntpthao', '', '0000-00-00 00:00:00', '1', 'ThS', 'ntpthao@vku.udn.vn', NULL, NULL, '2020-08-01 09:45:26', '2020-08-01 09:45:26'),
(122, '', 'Nguyễn', 'Thanh', 3, 1, 'thanhn', '', '0000-00-00 00:00:00', '0914014179', 'TS', 'thanhn@vku.udn.vn', NULL, NULL, '2020-08-01 09:46:12', '2020-09-25 07:02:38'),
(123, '', 'Trần Thế', 'Sơn', 3, 1, 'ttson', '', '0000-00-00 00:00:00', '1', 'TS', 'ttson@vku.udn.vn', NULL, NULL, '2020-08-01 09:48:45', '2020-08-01 09:48:45'),
(124, '', 'K.', 'Khoa học máy tính', 3, 1, 'kkhmt', '', '0000-00-00 00:00:00', '1', 'Khoa', 'khmt@vku.udn.vn', NULL, NULL, '2020-08-01 09:50:39', '2020-08-01 09:50:39'),
(125, '', 'Đặng Hoài', 'Phương', 2, 1, 'dhphuong', '', '0000-00-00 00:00:00', '1', 'TS', 'danghoaiphuongdn@gmail.com', NULL, NULL, '2020-08-01 10:06:29', '2020-08-01 10:06:29'),
(126, '', 'Lê Thành', 'Công', 3, 1, 'ltcong', '', '0000-00-00 00:00:00', '1', 'ThS', 'ltcong@vku.udn.vn', NULL, NULL, '2020-08-01 10:07:31', '2020-08-01 10:07:31'),
(127, '', 'K.', 'Kinh tế số & TMĐT', 3, 1, 'kts', '', '0000-00-00 00:00:00', '1', 'Khoa', 'kts@vku.udn.vn', NULL, NULL, '2020-08-01 10:09:46', '2020-08-01 10:09:46'),
(128, '', 'Trương Thị', 'Viên', 3, 1, 'ttvien', '', '0000-00-00 00:00:00', '1', 'ThS', 'ttvien@vku.udn.vn', NULL, NULL, '2020-08-01 10:10:37', '2020-08-01 10:10:37'),
(129, '', 'Lê Thị Minh', 'Đức', 3, 1, 'ltmduc', '', '0000-00-00 00:00:00', '1', 'TS', 'ltmduc@vku.udn.vn', NULL, NULL, '2020-08-01 10:17:51', '2020-08-01 10:17:51'),
(130, '', 'Nguyễn Thị', 'Mai', 3, 1, 'ltmduc', '', '0000-00-00 00:00:00', '1', 'ThS', 'ntmai@vku.udn.vn', NULL, NULL, '2020-08-01 10:23:06', '2020-08-01 10:23:06'),
(131, '', 'Lương Xuân', 'Thành', 3, 1, 'lxthanh', '', '0000-00-00 00:00:00', '1', 'ThS', 'lxthanh@vku.udn.vn', NULL, NULL, '2020-08-01 10:25:14', '2020-08-01 10:25:14'),
(132, '', 'Dương Hữu', 'Ái', 3, 1, 'dhai', '', '0000-00-00 00:00:00', '1', 'TS', 'dhai@vku.udn.vn', NULL, NULL, '2020-08-01 10:39:12', '2020-08-01 10:39:12'),
(133, '', 'Trần Thị Trà', 'Vinh', 3, 1, 'tttvinh', '', '0000-00-00 00:00:00', '1', 'ThS', 'tttvinh@vku.udn.vn', NULL, NULL, '2020-08-01 10:39:54', '2020-08-01 10:39:54'),
(134, '', 'Phạm Nguyễn Minh', 'Nhựt', 3, 1, 'pnmnhut', '', '0000-00-00 00:00:00', '1', 'TS', 'pnmnhut@vku.udn.vn', NULL, NULL, '2020-08-01 10:40:39', '2020-08-01 10:40:39'),
(135, '', 'Nguyễn Thanh', 'Cẩm', 3, 1, 'ntcam', '', '0000-00-00 00:00:00', '079.5586.272', 'ThS', 'ntcam@vku.udn.vn', NULL, NULL, '2020-08-01 10:41:37', '2020-08-06 09:58:10'),
(136, '', 'Võ Văn', 'Lường', 3, 1, 'vvluong', '', '0000-00-00 00:00:00', '0905511676', 'ThS', 'vvluong@vku.udn.vn', NULL, NULL, '2020-08-01 10:42:16', '2021-01-11 10:37:33'),
(137, '', 'Nguyễn Thanh', 'Tuấn', 3, 1, 'nttuan', '', '0000-00-00 00:00:00', '1', 'ThS', 'nttuan@vku.udn.vn', NULL, NULL, '2020-08-01 10:42:44', '2020-08-01 10:42:44'),
(138, '', 'Lê Tự', 'Thanh', 3, 1, 'ltthanh', '', '0000-00-00 00:00:00', '1', 'ThS', 'ltthanh@vku.udn.vn', NULL, NULL, '2020-08-01 10:43:27', '2020-08-01 10:45:13'),
(139, '', 'Lê Kim', 'Trọng', 3, 1, 'lktrong', '', '0000-00-00 00:00:00', '1', 'ThS', 'lktrong@vku.udn.vn', NULL, NULL, '2020-08-01 10:51:12', '2020-08-01 10:51:57'),
(140, '', 'Lê', 'Tân', 3, 1, 'ltan', '', '0000-00-00 00:00:00', '1', 'TS', 'ltan@vku.udn.vn', NULL, NULL, '2020-08-01 10:52:16', '2020-08-01 10:52:16'),
(141, '', 'Nguyễn Đỗ Công', 'Pháp', 3, 1, 'ndcphap', '', '0000-00-00 00:00:00', '1', 'ThS', 'ndcphap@vku.udn.vn', NULL, NULL, '2020-08-01 10:52:58', '2020-08-01 10:52:58'),
(142, '', 'Nguyễn Lê Ngọc', 'Trâm', 3, 1, 'nlntram', '', '0000-00-00 00:00:00', '1', 'ThS', 'nlntram@vku.udn.vn', NULL, NULL, '2020-08-01 10:53:39', '2020-08-01 10:53:39'),
(143, '', 'Văn Hùng', 'Trọng', 3, 1, 'vhtrong', '', '0000-00-00 00:00:00', '1', 'TS', 'vhtrong@vku.udn.vn', NULL, NULL, '2020-08-01 10:54:23', '2020-08-01 10:54:23'),
(144, '', 'Ngô Hải', 'Quỳnh', 3, 1, 'nhquynh', '', '0000-00-00 00:00:00', '1', 'TS', 'nhquynh@vku.udn.vn', NULL, NULL, '2020-08-01 10:55:19', '2020-08-01 10:55:19'),
(145, '', 'Nguyễn Thị Kiều', 'Trang', 3, 1, 'ntktrang', '', '0000-00-00 00:00:00', '1', 'TS', 'ntktrang@vku.udn.vn', NULL, NULL, '2020-08-01 10:55:56', '2020-08-01 10:55:56'),
(146, '', 'Ngô Lê', 'Quân', 3, 1, 'nlquan', '', '0000-00-00 00:00:00', '0905710048', 'ThS', 'nlquan@vku.udn.vn', NULL, NULL, '2020-08-01 10:56:31', '2020-08-12 14:07:57'),
(147, '', 'Võ Ngọc', 'Đạt', 3, 1, 'vndat', '', '0000-00-00 00:00:00', '1', 'ThS', 'vndat@vku.udn.vn', NULL, NULL, '2020-08-01 10:57:22', '2020-08-01 10:57:22'),
(148, '', 'Vương Công', 'Đạt', 3, 1, 'vcdat', '', '0000-00-00 00:00:00', '0905536553', 'TS', 'vcdat@vku.udn.vn', NULL, NULL, '2020-08-01 10:58:48', '2020-11-04 16:54:58'),
(150, '', 'Ninh Khánh', 'Chi', 3, 1, 'nkchi', '', '0000-00-00 00:00:00', '0984229980', 'ThS', 'nkchi@vku.udn.vn', NULL, NULL, '2020-08-01 11:01:16', '2020-08-31 02:44:30'),
(151, '', 'Hồ Phan', 'Hiếu', 12, 1, 'hphieu', '', '0000-00-00 00:00:00', '1', 'TS', 'hophanhieu@gmail.com', NULL, NULL, '2020-08-01 11:02:01', '2020-08-13 15:48:46'),
(152, '', 'Nguyễn Thị', 'Hạnh', 3, 1, 'hanhnt', '', '0000-00-00 00:00:00', '+84905688551', 'ThS', 'hanhnt@vku.udn.vn', NULL, NULL, '2020-08-01 11:11:03', '2020-10-18 14:49:00'),
(153, '', 'Võ Thị Thanh', 'Ngà', 3, 1, 'vttnga', '', '0000-00-00 00:00:00', '1', 'ThS', 'vttnga@vku.udn.vn', NULL, NULL, '2020-08-01 11:12:09', '2020-08-01 11:12:09'),
(154, '', 'Lê Thị Kim', 'Tuyến', 3, 1, 'ltktuyen', '', '0000-00-00 00:00:00', '1', 'ThS', 'ltktuyen@vku.udn.vn', NULL, NULL, '2020-08-01 11:12:40', '2020-08-01 11:12:40'),
(155, '', 'Phạm Trần Mộc', 'Miêng', 3, 1, 'ptmmieng', '', '0000-00-00 00:00:00', '1', 'ThS', 'ptmmieng@vku.udn.vn', NULL, NULL, '2020-08-01 11:13:15', '2020-08-01 11:13:15'),
(156, '', 'Lý Quỳnh', 'Trân', 3, 1, 'lqtran', '', '0000-00-00 00:00:00', '1', 'TS', 'lqtran@vku.udn.vn', NULL, NULL, '2020-08-01 11:13:55', '2020-08-01 11:13:55'),
(157, '', 'Đặng Thị Kim', 'Ngân', 3, 1, 'dtkngan', '', '0000-00-00 00:00:00', '0931646818', 'Th.S', 'dtkngan@vku.udn.vn', NULL, NULL, '2020-08-01 11:14:27', '2020-08-28 02:37:58'),
(158, '', 'Trần Ngọc Phương', 'Thảo', 3, 1, 'tnpthao', '', '0000-00-00 00:00:00', '1', 'ThS', 'tnpthao@vku.udn.vn', NULL, NULL, '2020-08-01 11:15:04', '2020-08-01 11:15:04'),
(159, '', 'Lê Thị Thanh', 'Vân', 3, 1, 'lttvan', '', '0000-00-00 00:00:00', '0905519529', 'ThS', 'lttvan@vku.udn.vn', NULL, NULL, '2020-08-01 11:15:37', '2021-01-15 06:39:23'),
(160, '', 'Võ Thành', 'Thiên', 3, 1, 'vtthien', '', '0000-00-00 00:00:00', '1', 'ThS', 'vtthien@vku.udn.vn', NULL, NULL, '2020-08-01 11:16:10', '2020-08-01 11:16:10'),
(161, '', 'K.', 'Kỹ thuật máy tính & điện tử', 3, 1, 'ktmt', '', '0000-00-00 00:00:00', '1', 'Khoa', 'ktmt@vku.udn.vn', NULL, NULL, NULL, NULL),
(162, '', 'Lế Viết', 'Trương', 3, 1, 'lvtruong', '', '0000-00-00 00:00:00', '0905129921', 'ThS', 'lvtruong@vku.udn.vn', NULL, NULL, '2020-08-14 04:30:17', '2020-08-14 04:30:17'),
(163, '', 'Trần Thị Thúy', 'Ngọc', 3, 1, 'tttngoc', '', '0000-00-00 00:00:00', '', 'ThS', 'tttngoc@vku.udn.vn', NULL, NULL, NULL, NULL),
(164, '', 'Phan Thị Lan', 'Anh', 1, 1, 'ptlanh', '', '0000-00-00 00:00:00', '0', 'TS', 'ptlanh@vku.udn.vn', NULL, NULL, '2020-09-27 01:53:00', '2020-09-27 01:53:00'),
(165, '', 'Phan Đăng Thiếu', 'Hiệp', 3, 1, 'pdthiep', '', '0000-00-00 00:00:00', '0', 'ThS', 'pdthiep@vku.udn.vn', NULL, NULL, '2020-09-27 02:25:42', '2020-09-27 02:25:42'),
(166, '', 'Nguyễn Quốc', 'Thịnh', 3, 1, 'nqthinh', '', '0000-00-00 00:00:00', '0', 'ThS', 'nqthinh@vku.udn.vn', NULL, NULL, '2020-09-28 08:46:46', '2020-09-28 08:46:46'),
(167, '', 'Trần Thị Bích', 'Hòa', 3, 1, 'ttbhoa', '', '0000-00-00 00:00:00', '0', 'ThS', 'ttbhoa@vku.udn.vn', NULL, NULL, '2020-09-29 01:34:22', '2020-09-29 01:34:22'),
(168, '', 'Nguyễn Phương', 'Tâm', 3, 1, 'nptam', '', '0000-00-00 00:00:00', '0', 'ThS', 'nptam@vku.udn.vn', NULL, NULL, '2020-09-29 01:34:50', '2020-09-29 01:34:50'),
(169, '', 'Hồ Văn', 'Phi', 3, 1, 'hvphi', '', '0000-00-00 00:00:00', '0', 'TS', 'hvphi@vku.udn.vn', NULL, NULL, '2020-09-29 01:35:15', '2020-09-29 01:35:15'),
(170, '', 'Lê Thị Bích', 'Tra', 3, 1, 'ltbtra', '', '0000-00-00 00:00:00', '0', 'ThS', 'ltbtra@vku.udn.vn', NULL, NULL, '2020-09-29 01:35:45', '2020-09-29 01:35:45'),
(171, '', 'Nguyễn Văn', 'Lợi', 3, 1, 'nvloi', '', '0000-00-00 00:00:00', '0', 'TS', 'nvloi@vku.udn.vn', NULL, NULL, '2020-09-29 01:36:20', '2020-09-29 01:36:20'),
(172, '', 'Trần Văn', 'Đại', 3, 1, 'tvdai', '', '0000-00-00 00:00:00', '0', 'TS', 'tvdai@vku.udn.vn', NULL, NULL, '2020-09-29 01:36:53', '2020-09-29 01:36:53'),
(173, '', 'Võ Hoàng Phương', 'Dung', 3, 1, 'vhpdung', '', '0000-00-00 00:00:00', '0', 'ThS', 'vhpdung@vku.udn.vn', NULL, NULL, '2020-09-29 01:37:20', '2020-09-29 01:37:20'),
(174, '', 'Nguyễn Sĩ', 'Thìn', 3, 1, 'nsthin', '', '0000-00-00 00:00:00', '0906561584', 'TS', 'nsthin@vku.udn.vn', NULL, NULL, '2020-09-29 01:37:38', '2020-10-16 01:56:36'),
(175, '', 'Đỗ Công', 'Đức', 3, 1, 'dcduc', '', '0000-00-00 00:00:00', '0', 'ThS', 'dcduc@vku.udn.vn', NULL, NULL, '2020-09-29 01:38:12', '2020-09-29 01:38:12'),
(176, '', 'Lương Khánh', 'Tý', 3, 1, 'lkty', '', '0000-00-00 00:00:00', '0', 'ThS', 'lkty@vku.udn.vn', NULL, NULL, '2020-09-29 01:38:36', '2020-09-29 01:38:36'),
(177, '', 'Trịnh Thị Ngọc', 'Linh', 3, 1, 'ttnlinh', '', '0000-00-00 00:00:00', '0', 'ThS', 'ttnlinh@vku.udn.vn', NULL, NULL, '2020-09-29 01:39:04', '2020-09-29 01:39:04'),
(178, '', 'Nguyễn Hoàng', 'Hải', 3, 1, 'nhhai', '', '0000-00-00 00:00:00', '0', 'TS', 'nhhai@vku.udn.vn', NULL, NULL, '2020-09-29 01:41:37', '2020-09-29 01:41:37'),
(179, '', 'Nguyễn Ngọc', 'Huy', 3, 1, 'nnhuy', '', '0000-00-00 00:00:00', '0', 'ThS', 'nnhuy@vku.udn.vn', NULL, NULL, '2020-09-29 01:42:24', '2020-09-29 01:42:24'),
(180, '', 'Nguyễn Trọng', 'Minh', 3, 1, 'ntminh', '', '0000-00-00 00:00:00', '0', 'ThS', 'ntminh@vku.udn.vn', NULL, NULL, '2020-09-29 01:42:41', '2020-09-29 01:42:41'),
(181, '', 'Nguyễn Văn', 'Thắng', 3, 1, 'nvthang', '', '0000-00-00 00:00:00', '0', 'ThS', 'nvthang@vku.udn.vn', NULL, NULL, '2020-09-29 01:43:24', '2020-09-29 01:43:24'),
(182, '', 'Nguyễn Thị Như', 'Quỳnh', 3, 1, 'ntnquynh', '', '0000-00-00 00:00:00', '0', 'ThS', 'ntnquynh@vku.udn.vn', NULL, NULL, '2020-09-29 01:44:24', '2020-09-29 01:44:24'),
(183, '', 'Nguyễn Viết', 'Đức', 3, 1, 'nvduc', '', '0000-00-00 00:00:00', '0', 'ThS', 'nvduc@vku.udn.vn', NULL, NULL, '2020-09-29 01:44:24', '2020-09-29 01:44:24'),
(184, '', 'Vũ Thị Quỳnh', 'Anh', 3, 1, 'vtqanh', '', '0000-00-00 00:00:00', '', 'ThS', 'vtqanh@vku.udn.vn', NULL, NULL, '2020-09-29 01:44:24', '2020-09-29 01:44:24'),
(185, '', 'Lê Thị Hải', 'Vân', 3, 1, 'lthvan', '', '0000-00-00 00:00:00', '', 'ThS', 'lthvan@vku.udn.vn', NULL, NULL, NULL, NULL),
(186, '', 'Trần Thiện', 'Vũ', 3, 1, 'ttvu', '', '0000-00-00 00:00:00', '', 'TS', 'ttvu@vku.udn.vn', NULL, NULL, NULL, NULL),
(187, '', 'Trần Văn', 'Thành', 3, 1, 'tvthanh', '', '0000-00-00 00:00:00', '', 'ThS', 'tvthanh@gmail.com', NULL, NULL, NULL, NULL),
(188, '', 'Nguyễn Thị Huyền', 'Trang', 3, 1, 'trangnth', '', '0000-00-00 00:00:00', '0', 'ThS', 'trangnth@vku.udn.vn', NULL, NULL, NULL, '2021-01-20 09:04:24'),
(189, '', 'Trần Uyên', 'Trang', 3, 1, 'tutrang', '', '0000-00-00 00:00:00', '', 'ThS', 'tutrang@vku.udn.vn', NULL, NULL, NULL, NULL),
(190, '', 'Nguyễn Ngọc Huyền', 'Trân', 3, 1, 'nnhtran', '', '0000-00-00 00:00:00', '', 'ThS', 'nnhtran@vku.udn.vn', NULL, NULL, NULL, NULL),
(191, '', 'Lê Mai', 'Anh', 3, 1, 'lmanh', '', '0000-00-00 00:00:00', '_', 'TS', 'lmanhmos@gmail.com', NULL, NULL, NULL, '2020-11-13 09:49:11'),
(192, '', 'Nguyễn Thị Kim', 'Ánh', 3, 1, 'ntkanh', '', '0000-00-00 00:00:00', '', 'ThS', 'ntkanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(193, '', 'Huỳnh Bá Thúy', 'Diệu', 3, 1, 'hbtdieu', '', '0000-00-00 00:00:00', '', 'ThS', 'hbtdieu@vku.udn.vn', NULL, NULL, NULL, NULL),
(195, '', 'Nguyễn Thanh', 'Hoài', 3, 1, 'nthoai', '', '0000-00-00 00:00:00', '', 'TS', 'nthoai@vku.udn.vn', NULL, NULL, NULL, NULL),
(196, '', 'Trần Phạm Huyền', 'Trang', 3, 1, 'tphtrang', '', '0000-00-00 00:00:00', '', 'ThS', 'tphtrang@vku.udn.vn', NULL, NULL, NULL, NULL),
(197, '', 'Ngô Thị Hiền', 'Trang', 3, 1, 'nthtrang', '', '0000-00-00 00:00:00', '09095889918', 'ThS', 'nthtrang@vku.udn.vn', NULL, NULL, NULL, '2020-11-05 06:55:13'),
(198, '', 'Lê Thị', 'Bình', 3, 1, 'ltbinh', '', '0000-00-00 00:00:00', '', 'ThS', 'ltbinh@vku.udn.vn', NULL, NULL, NULL, NULL),
(199, '', 'Trần Thị Hạ', 'Quyên', 3, 1, 'tthquyen', '', '0000-00-00 00:00:00', '', 'ThS', 'tthquyen@vku.udn.vn', NULL, NULL, NULL, NULL),
(200, '', 'Nguyễn Trọng Công', 'Thành', 3, 1, 'ntcthanh', '', '0000-00-00 00:00:00', '', 'ThS', 'ntcthanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(201, '', 'Thái Thị', 'Hồng', 3, 1, 'tthong', '', '0000-00-00 00:00:00', '', 'ThS', 'tthong@vku.udn.vn', NULL, NULL, NULL, NULL),
(202, '', 'NTS', 'Lâm', 3, 1, 'ntslam', '', '0000-00-00 00:00:00', '', 'ThS', 'ntslam@vku.udn.vn', NULL, NULL, NULL, NULL),
(203, '', 'P', 'Đào tạo', 3, 1, 'daotao', '', '0000-00-00 00:00:00', '', 'Phòng', 'daotao@vku.udn.vn', NULL, NULL, NULL, NULL),
(204, '', 'Nguyễn Thị Mỹ', 'Hạnh', 3, 1, 'ntmhanh', '', '0000-00-00 00:00:00', '', 'ThS', 'ntmhanh@vku.udn.vn', NULL, NULL, NULL, NULL),
(205, '', 'Hồ Thị Hồng', 'Liên', 3, 1, 'hthlien', '', '0000-00-00 00:00:00', '', 'ThS', 'hthlien@vku.udn.vn', NULL, NULL, NULL, NULL),
(206, '', 'Vũ Đình', 'Chinh', 3, 1, 'vdchinh', '', '0000-00-00 00:00:00', '0947246898', 'TS', 'chinh.vudinhhueuni@gmail.com', NULL, NULL, NULL, '2021-01-21 08:36:16'),
(207, '', 'Trần Thị Hương', 'Xuân', 3, 1, 'tthxuan', '', '0000-00-00 00:00:00', '', 'ThS', 'huongxuansp@gmail.com', NULL, NULL, NULL, NULL),
(208, '', 'Nguyễn Thị Minh', 'Ngọc', 3, 1, 'ntmngoc', '', '0000-00-00 00:00:00', '', 'ThS', 'minhngoc.dn55@gmail.com', NULL, NULL, NULL, NULL),
(209, '', 'Lê Văn Thanh', 'Sơn', 3, 1, 'lvtson', '', '0000-00-00 00:00:00', '', 'ThS', 'sonlethanh1968@gmail.com', NULL, NULL, NULL, NULL),
(210, '', 'Hoàng Đình', 'Triển', 3, 1, 'hdtrien', '', '0000-00-00 00:00:00', '', 'ThS', 'hoangtrien@gmail.com', NULL, NULL, NULL, NULL),
(211, '', 'Nguyễn Thị Khánh\r\n', 'Hà', 3, 1, 'ntkha', '', '0000-00-00 00:00:00', '', 'ThS', 'ntkha@vku.udn.vn', NULL, NULL, NULL, NULL),
(212, '', 'Nguyễn Thị', 'Mai', 3, 1, 'ntmai', '', '0000-00-00 00:00:00', '', 'ThS', 'ntmai@vku.udn.vn', NULL, NULL, NULL, NULL),
(213, '', 'Trần Thị Nam', 'Trân', 3, 1, 'ttntran', '', '0000-00-00 00:00:00', '', 'ThS', 'ttntran@vku.udn.vn', NULL, NULL, NULL, NULL),
(214, '', 'Nguyễn Hà', 'Phương', 3, 1, 'nhphuong', '', '0000-00-00 00:00:00', '', 'ThS', 'nhphuong@vku.udn.vn', NULL, NULL, NULL, NULL),
(215, '', 'Nguyễn Lê Thảo', 'Hạnh', 3, 1, 'nlthanh', '', '0000-00-00 00:00:00', '', 'ThS', 'thaohanhnguyenle@gmail.com', NULL, NULL, NULL, NULL),
(216, '', 'Nguyễn Thị Thanh', 'Trúc', 3, 1, 'ntttruc', '', '0000-00-00 00:00:00', '', 'ThS', 'nttkhuc@vku.udn.vn', NULL, NULL, NULL, NULL),
(217, '', 'Phan Thị Hồng', 'Việt', 3, 1, 'pthviet', '', '0000-00-00 00:00:00', '', 'ThS', 'pthviet@vku.udn.vn', NULL, NULL, NULL, NULL),
(218, '', 'Vũ Thu', 'Huyền', 3, 1, 'vthuyen', '', '0000-00-00 00:00:00', '', 'ThS', 'vthuyen@vku.udn.vn', NULL, NULL, NULL, NULL),
(219, '', 'Hoàng Thị', 'Trang', 3, 1, 'httrang', '', '0000-00-00 00:00:00', '', 'ThS', 'httrang@vku.udn.vn', NULL, NULL, NULL, NULL),
(220, '', 'Phạm Thị Lệ', 'Diễm', 3, 1, 'ptldiem', '', '0000-00-00 00:00:00', '', 'CN', 'eunhedt@gmail.com', NULL, NULL, NULL, NULL),
(221, '', 'Bùi Thị Kim', 'Ngân', 3, 1, 'btkngan', '', '0000-00-00 00:00:00', '', 'CN', 'kina307@gmail.com', NULL, NULL, NULL, NULL),
(222, '', 'Văn Ngọc', 'Dương', 3, 1, 'vnduong', '', '0000-00-00 00:00:00', '', 'KS', 'vnduongit@gmail.com', NULL, NULL, NULL, NULL),
(223, '', 'Chuyên viên ', 'Đào tạo', 1, 1, 'todaotao', '', '0000-00-00 00:00:00', '', 'ThS', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_hocphan`
--

CREATE TABLE `table_hocphan` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahocphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhocphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soTC` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_hocphan`
--

INSERT INTO `table_hocphan` (`id`, `mahocphan`, `tenhocphan`, `soTC`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PLDC', 'Pháp luật đại cương', 2, 0, NULL, NULL, NULL),
(2, 'NMKD', 'Nhập môn kinh doanh', 3, 0, NULL, NULL, NULL),
(3, 'THDC', 'Tin học đại cương', 3, 0, NULL, NULL, NULL),
(4, 'QTH', 'Quản trị học', 3, 0, NULL, NULL, NULL),
(5, 'DA1', 'Đề án 1', 2, 0, NULL, NULL, NULL),
(6, 'CSDL', 'Cơ sở dữ liệu', 2, 0, NULL, NULL, NULL),
(7, 'DS', 'Đại số', 2, 0, NULL, NULL, NULL),
(8, 'GDTC1', 'Giáo dục thể chất 1', 1, 0, NULL, NULL, NULL),
(9, 'JAVACB', 'Lập trình hướng đối tượng và Java cơ bản', 3, 0, NULL, NULL, NULL),
(10, 'NMN&KNM', 'Nhập môn ngành và kỹ năng mềm', 2, 0, NULL, NULL, NULL),
(11, 'TADB', 'Tiếng Anh dự bị', 5, 0, NULL, NULL, NULL),
(12, 'TA1', 'Tiếng Anh 1', 3, 0, NULL, NULL, NULL),
(13, 'TACN', 'Tiếng Anh chuyên ngành 1', 2, 0, NULL, NULL, NULL),
(14, 'THDCKT', 'Tin học đại cương (BA)', 3, 0, NULL, NULL, NULL),
(15, 'CTDL & GT', 'Cấu trúc dữ liệu và giải thuật', 3, 0, NULL, NULL, NULL),
(16, 'WEB', 'Công nghệ Web', 3, 0, NULL, NULL, NULL),
(17, 'DACS1', 'Đồ án cơ sở 1', 2, 0, NULL, NULL, NULL),
(18, 'GDTC2', 'Giáo dục thể chất 2', 1, 0, NULL, NULL, NULL),
(19, 'KTMT', 'Kiến trúc máy tính', 2, 0, NULL, NULL, NULL),
(20, 'JAVANC', 'Lập trình Java nâng cao', 2, 0, NULL, NULL, NULL),
(21, 'NLHDH', 'Nguyên lý hệ điều hành', 2, 0, NULL, NULL, NULL),
(22, 'TA2', 'Tiếng Anh 2', 2, 0, NULL, NULL, NULL),
(23, 'TACN2', 'Tiếng Anh chuyên ngành 2', 2, 0, NULL, NULL, NULL),
(24, 'VL', 'Vật lý', 2, 0, NULL, NULL, NULL),
(25, 'GTTKD', 'Giao tiếp kinh doanh', 3, 0, NULL, NULL, NULL),
(26, 'KTH', 'Kinh tế học', 4, 0, NULL, NULL, NULL),
(27, 'LKD', 'Luật kinh doanh', 3, 0, NULL, NULL, NULL),
(28, 'MARCB', 'Marketing căn bản', 3, 0, NULL, NULL, NULL),
(29, 'DA2', 'Đề án 2', 2, 0, NULL, NULL, NULL),
(30, 'CD1', 'Chuyên đề 1', 2, 0, NULL, NULL, NULL),
(31, 'WEBNC', 'Công nghệ web nâng cao', 3, 0, NULL, NULL, NULL),
(32, 'DACS2', 'Đồ án cơ sở 2', 2, 0, NULL, NULL, NULL),
(33, 'GDTC3', 'Giáo dục thể chất 3', 1, 0, NULL, NULL, NULL),
(34, 'HTS', 'Hệ thống số', 2, 0, NULL, NULL, NULL),
(35, 'MMT', 'Mạng máy tính', 2, 0, NULL, NULL, NULL),
(36, 'PT&TKHT', 'Phân tích và thiết kế hệ thống', 2, 0, NULL, NULL, NULL),
(37, 'TA3', 'Tiếng Anh 3', 2, 0, NULL, NULL, NULL),
(38, 'TACN&TH1', 'Tiếng Anh chuyên ngành & thực hành 1', 2, 0, NULL, NULL, NULL),
(39, 'TRR', 'Toán rời rạc', 2, 0, NULL, NULL, NULL),
(40, 'DA3', 'Đề án 3', 2, 0, NULL, NULL, NULL),
(41, 'HVTC', 'Hành vi tổ chức', 3, 0, NULL, NULL, NULL),
(42, 'KTDHUD', 'Kỹ thuật đồ họa ứng dụng', 3, 0, NULL, NULL, NULL),
(43, 'TACN3', 'Tiếng Anh chuyên ngành 3', 2, 0, NULL, NULL, NULL),
(44, 'NMTMDT', 'Nhập môn thương mại điện tử', 3, 0, NULL, NULL, NULL),
(45, 'QTNNL', 'Quản trị nguồn nhân lực', 3, 0, NULL, NULL, NULL),
(46, 'CNPM', 'Công nghệ phần mềm', 2, 0, NULL, NULL, NULL),
(47, 'CĐ2', 'Chuyên đề 2', 2, 0, NULL, NULL, NULL),
(48, 'ĐACS3', 'Đồ án cơ sở 3', 2, 0, NULL, NULL, NULL),
(49, 'GT', 'Giải tích', 2, 0, NULL, NULL, NULL),
(50, 'GDTC4', 'Giáo dục thể chất 4', 1, 0, NULL, NULL, NULL),
(51, 'LTDĐ', 'Lập trình di động', 3, 0, NULL, NULL, NULL),
(52, 'TACN&TH', 'Tiếng Anh chuyên ngành & thực hành 2', 2, 0, NULL, NULL, NULL),
(53, 'TTDN', 'Thực tập doanh nghiệp', 1, 0, NULL, NULL, NULL),
(54, 'VĐK', 'Vi điều khiển', 3, 0, NULL, NULL, NULL),
(55, 'XSTK', 'Xác suất thống kê', 2, 0, NULL, NULL, NULL),
(56, 'ĐĐTKD', 'Đạo đức trong kinh doanh', 2, 0, NULL, NULL, NULL),
(57, 'ĐA4', 'Đề án 4', 2, 0, NULL, NULL, NULL),
(58, 'MĐT', 'Marketing điện tử ', 3, 0, NULL, NULL, NULL),
(59, 'QTBH', 'Quản trị bán hàng ', 3, 0, NULL, NULL, NULL),
(60, 'QCXTBH', 'Quảng cáo xúc tiến bán hàng (MCI) ', 3, 0, NULL, NULL, NULL),
(61, 'TACN4', 'Tiếng Anh chuyên ngành 4 ', 2, 0, NULL, NULL, NULL),
(62, 'TKWS', 'Thiết kế website KT', 2, 0, NULL, NULL, NULL),
(63, 'GDQP', 'Giáo dục quốc phòng', 0, 0, NULL, NULL, NULL),
(64, 'ANNHT', 'Automat và Ngôn ngữ hình thức', 2, 0, NULL, NULL, NULL),
(65, 'CĐ3', 'Chuyên đề 3 (IT)', 2, 0, NULL, NULL, NULL),
(66, 'ĐACS4', 'Đồ án cơ sở 4 IT', 2, 0, NULL, NULL, NULL),
(67, 'ĐHMT', 'Đồ họa máy tính', 2, 0, NULL, NULL, NULL),
(68, 'LTM', 'Lập trình mạng', 2, 0, NULL, NULL, NULL),
(69, 'QLDA', 'Quản lý dự án', 2, 0, NULL, NULL, NULL),
(70, 'QTM', 'Quản trị mạng', 2, 0, NULL, NULL, NULL),
(71, 'TTNT', 'Trí tuệ nhân tạo', 2, 0, NULL, NULL, NULL),
(72, 'ĐA5', 'Đề án 5', 2, 0, NULL, NULL, NULL),
(73, 'HTTTQL', 'Hệ thống thông tin quản lý', 2, 0, NULL, NULL, NULL),
(74, 'KTDN', 'Kế toán doanh nghiệp', 2, 0, NULL, NULL, NULL),
(75, 'QTCCU', 'Quản trị chuỗi cung ứng', 3, 0, NULL, NULL, NULL),
(76, 'QTTC', 'Quản trị tài chính', 3, 0, NULL, NULL, NULL),
(77, 'TUDTKT', 'Toán ứng dụng trong kinh tế', 2, 0, NULL, NULL, NULL),
(79, 'LSĐCSVN', 'Lịch sử Đảng Cộng sản Việt Nam', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(80, 'TTĐT', 'Thanh toán điện tử', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(81, 'MACLENIN', 'Triết học Mac - Lênin', 3, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(82, 'PPNC', 'Phương pháp nghiên cứu khoa học', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(83, 'CLKDĐT', 'Chiến lược kinh doanh điện tử', 3, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(84, 'ĐA6', 'Đề án 6', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(85, 'BM&ATHTTT', 'Bảo mật và An toàn hệ thống thông tin', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(86, 'CĐ4', 'Chuyên đề 4', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(87, 'ĐACS5', 'Đồ án cơ sở 5', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(88, 'KTPM', 'Kiểm thử phần mềm', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(89, 'KTTSL', 'Kỹ thuật truyền số liệu', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(90, 'TBD', 'Trình biên dịch', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(91, 'XLA', 'Xử lý ảnh', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(92, 'XLTHS', 'Xử lý tín hiệu số', 2, 0, NULL, '2019-12-20 02:24:00', '2019-12-20 02:24:00'),
(93, 'TKKD', 'Thống kê kinh doanh', 2, 0, NULL, NULL, NULL),
(94, 'KTVM', 'Kinh tế vi mô', 2, 0, NULL, '2019-12-26 04:17:43', '2019-12-26 04:17:43'),
(95, 'KTVXM', 'Kinh tế vĩ mô', 2, 0, NULL, '2019-12-26 04:21:57', '2019-12-26 04:21:57'),
(96, 'TTHCM', 'Tư tưởng Hồ Chí Minh', 2, 0, NULL, NULL, NULL),
(97, 'CĐ5', 'Chuyên đề 5 (IT)', 2, 0, NULL, NULL, NULL),
(98, 'ĐACN1_IT', 'Đồ án chuyên ngành 1 (IT)', 2, 0, NULL, NULL, NULL),
(99, 'TTNM', 'Tương tác người - máy', 3, 0, NULL, NULL, NULL),
(100, 'TGMT', 'Thị giác máy tính', 3, 0, NULL, NULL, NULL),
(101, 'HTN', 'Hệ thống nhúng', 3, 0, NULL, NULL, NULL),
(102, 'ĐA7', 'Đề án 7', 2, 0, NULL, NULL, NULL),
(103, 'QTQTĐM', 'Quản trị quá trình đổi mới sáng tạo', 2, 0, NULL, NULL, NULL),
(104, 'QTTNTMĐT', 'Quản trị tác nghiệp thương mại điện tử', 3, 0, NULL, NULL, NULL),
(105, 'KTCT', 'Kinh tế chính trị Mác - Lênin', 2, 0, NULL, NULL, NULL),
(106, 'CNXHKH', 'Chủ nghĩa xã hội khoa học', 2, 0, NULL, NULL, NULL),
(107, 'HVNTD', 'Hành vi người tiêu dùng', 2, 0, NULL, NULL, NULL),
(108, 'ĐHMT', 'Đồ hoạ máy tính', 2, 0, NULL, NULL, NULL),
(109, 'TACN1_BA', 'Tiếng Anh chuyên ngành 1 (BA)', 2, 0, NULL, NULL, NULL),
(110, 'CĐ6', 'Chuyên đề 6', 2, 0, NULL, NULL, NULL),
(111, 'HTDĐ_CB', 'Hệ thống di động và cảm biến', 3, 0, NULL, NULL, NULL),
(112, 'LTDKTĐ', 'Lý thuyết điều khiển tự động', 3, 0, NULL, NULL, NULL),
(114, 'HCSDLPT', 'Hệ cơ sở dữ liệu phân tán', 3, 0, NULL, NULL, NULL),
(115, 'TMĐT', 'Thương mại điện tử', 3, 0, NULL, NULL, NULL),
(116, 'ĐACN2', 'Đồ án chuyên ngành 2', 2, 0, NULL, NULL, NULL),
(118, 'KLTN_BA', 'Khóa luận tốt nghiệp (BA)', 10, 0, NULL, NULL, NULL),
(119, '', 'Đồ họa 2D (*)', 0, 2, NULL, NULL, NULL),
(120, '', 'Lập trình hướng đối tượng (*)', 0, 2, NULL, NULL, NULL),
(121, '', 'Lập trình trực quan (*)', 0, 2, NULL, NULL, NULL),
(122, '', 'Lập trình web (*)', 0, 2, NULL, NULL, NULL),
(123, '', 'Pháp luật (*)', 0, 2, NULL, NULL, NULL),
(124, '', 'Tiếng Anh chuyên ngành (*)', 0, 2, NULL, NULL, NULL),
(125, '', 'Lập trình vi điều khiển (*)', 0, 2, NULL, NULL, NULL),
(126, '', 'Thiết kế đồ họa và xử lý ảnh (*)', 0, 2, NULL, NULL, NULL),
(127, '', 'Lập trình Mobile Application (*)', 0, 2, NULL, NULL, NULL),
(128, '', 'Dự án Web Back-End (*)', 0, 2, NULL, NULL, NULL),
(129, '', 'Chính trị (*)', 0, 2, NULL, NULL, NULL),
(130, '', 'Lập trình Java (*)', 0, 2, NULL, NULL, NULL),
(131, '', 'Quảng cáo (*)', 0, 2, NULL, NULL, NULL),
(132, '', 'Định giá sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL),
(133, '', 'Nghiệp vụ bán sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL),
(134, '', 'Nghiệp vụ marketing du lịch (*)', 0, 2, NULL, NULL, NULL),
(135, '', 'Quản lý chất lượng dịch vụ (*)', 0, 2, NULL, NULL, NULL),
(136, '', 'Truyền thông marketing tích hợp (*)', 0, 2, NULL, NULL, NULL),
(137, '', 'Nghiệp vụ bán hàng (*)', 0, 2, NULL, NULL, NULL),
(138, '', 'Khởi tạo doanh nghiệp (*)', 0, 2, NULL, NULL, NULL),
(139, '', 'Marketing dịch vụ (*)', 0, 2, NULL, NULL, NULL),
(140, '', 'Quản trị thương hiệu (*)', 0, 2, NULL, NULL, NULL),
(141, '', 'Hành vi khách hàng (*)', 0, 2, NULL, NULL, NULL),
(142, '', 'Thực hành biên phiên dịch 1 (*)', 0, 2, NULL, NULL, NULL),
(143, '', 'Thực hành biên phiên dịch 2 (*)', 0, 2, NULL, NULL, NULL),
(144, '', 'Tiếng Anh lữ hành (*)', 0, 2, NULL, NULL, NULL),
(145, '', 'Đất nước và văn hoá các nước nói tiếng Anh (*)', 0, 2, NULL, NULL, NULL),
(146, '', 'Tuyến điểm du lịch Viêt Nam (*)', 0, 2, NULL, NULL, NULL),
(147, '', 'Thiết kế bộ lịch (*)', 0, 2, NULL, NULL, NULL),
(148, '', 'Thiết kế minh họa (*)', 0, 2, NULL, NULL, NULL),
(149, '', 'Thiết kế Poster quảng cáo (*)', 0, 2, NULL, NULL, NULL),
(150, '', 'Đồ họa động (*)', 0, 2, NULL, NULL, NULL),
(151, '', 'Lịch sử design (*)', 0, 2, NULL, NULL, NULL),
(152, '', 'Lịch sử Mỹ thuật Việt Nam và thế giới (*)', 0, 2, NULL, NULL, NULL),
(153, '', 'Viết 4 (*)', 0, 2, NULL, NULL, NULL),
(154, '', 'Nghe 4 (*)', 0, 2, NULL, NULL, NULL),
(155, '', 'Nói 4 (*)', 0, 2, NULL, NULL, NULL),
(156, '', 'Đọc 4 (*)', 0, 2, NULL, NULL, NULL),
(157, '', 'Tiếng Hàn du lịch (*)', 0, 2, NULL, NULL, NULL),
(158, '', 'Tiếng Hàn văn phòng (*)', 0, 2, NULL, NULL, NULL),
(159, '', 'Thiết kế ấn phẩm báo chí (*)', 0, 2, NULL, NULL, NULL),
(160, '', 'Thiết kế hoạt hình 2 chiều (*)', 0, 2, NULL, NULL, NULL),
(161, '', 'Thiết kế nhân vật 3 chiều (*)', 0, 2, NULL, NULL, NULL),
(162, '', 'Thiết kế hình hiệu (TV intro) (*)', 0, 2, NULL, NULL, NULL),
(163, '', 'Truyền thông đại chúng (*)', 0, 2, NULL, NULL, NULL),
(164, '', 'Khóa luận tốt nghiệp (*)', 0, 2, NULL, NULL, NULL),
(165, '', 'Công nghệ phần mềm (*)', 0, 2, NULL, NULL, NULL),
(166, '', 'Sinh hoạt lớp', 0, 2, NULL, NULL, NULL),
(167, '', 'Mượn phòng hoc', 0, 2, NULL, NULL, NULL),
(168, 'TACN_KT', 'Tiếng Anh chuyên ngành 2 (BA)', 2, 2, NULL, NULL, NULL),
(169, 'TTTN_IT', 'Thực tập tốt nghiệp IT', 3, 0, NULL, NULL, NULL),
(170, 'ĐATN_IT', 'Đồ án tốt nghiệp IT', 10, 0, NULL, NULL, NULL),
(171, 'ĐATN_CE', 'Đồ án tốt nghiệp CE', 10, 0, NULL, NULL, NULL),
(172, 'TTTN_CE', 'Thực tập tốt nghiệp CE', 3, 0, NULL, NULL, NULL),
(173, 'ĐACN1_CE', 'Đồ án chuyên ngành 1 (CE)', 2, 0, NULL, NULL, NULL),
(174, 'XLNNTN', 'Xử lý ngôn ngữ tự nhiên', 3, 0, NULL, NULL, NULL),
(176, 'ELC301\r\n', 'Cấu kiện điện tử', 3, 0, NULL, NULL, NULL),
(177, 'AGD301\r\n', 'Thiết kế đồ họa động và hoạt hình', 3, 0, NULL, NULL, NULL),
(178, 'CAL101_1', 'Giải tích 1', 2, 0, NULL, NULL, NULL),
(179, 'UTM055\r\n', 'Khởi nghiệp và đổi mới sáng tạo', 2, 0, NULL, NULL, NULL),
(180, 'GDTC_3_BDN', 'GDTC 3 (Bóng đá Nam)', 1, 0, NULL, NULL, NULL),
(181, 'GDTC_3_BRN', 'GDTC 3 (Bóng rổ Nam)', 1, 0, NULL, NULL, NULL),
(182, 'GDTC_3_BRNU', 'GDTC 3 (Bóng rổ Nữ)', 1, 0, NULL, NULL, NULL),
(183, 'GDTC_3_BCN', 'GDTC 3 (Bóng chuyền Nam)', 1, 0, NULL, NULL, NULL),
(184, 'GDTC_3_BCNU', 'GDTC 3 (Bóng chuyền Nữ)', 1, 0, NULL, NULL, NULL),
(185, 'GDTC_3_CL', 'GDTC 3 (Cầu lông)', 1, 0, NULL, NULL, NULL),
(186, 'TACN_BA', 'Tiếng Anh chuyên ngành 3 (BA)', 2, 0, NULL, NULL, NULL),
(187, 'PPNCKHTKT', 'Phương pháp nghiên cứu khoa học trong kinh tế', 2, 0, NULL, NULL, NULL),
(188, 'CNLTW', 'Công nghệ và lập trình web', 3, 0, NULL, NULL, NULL),
(189, 'PPNCKHTKT', 'Phương pháp NCKH trong kinh doanh', 2, 0, NULL, NULL, NULL),
(190, 'QTQHKH', 'Quản trị quan hệ khách hàng', 2, 0, NULL, NULL, NULL),
(191, 'DACS2_CE', 'Đồ án cơ sở 2 (CE)', 1, 0, NULL, NULL, NULL),
(193, 'CD_CE', 'Chuyên đề 3 (CE)', 2, 0, NULL, NULL, NULL),
(194, 'ĐA3_20', 'Đề án 3 (K20)', 1, 0, NULL, NULL, NULL),
(195, 'CKDT_20', 'Cấu kiện điện tử K20', 2, 0, NULL, NULL, NULL),
(196, 'LTHDT', 'Lập trình hướng đối tượng', 3, 0, NULL, NULL, NULL),
(197, 'GDTC_1DK', 'GDTC 1 (Điền kinh)', 1, 0, NULL, NULL, NULL),
(198, 'NLKT', 'Nguyên lý kế toán', 3, 0, NULL, NULL, NULL),
(199, 'CD5_CE', 'Chuyên đề 5 (CE)', 2, 0, NULL, NULL, NULL),
(200, 'CSDL_K21', 'Cơ sở dữ liệu (K21)', 3, 0, NULL, NULL, NULL),
(201, '', 'Tiếp thị kỹ thuật số (*)', 0, 2, NULL, NULL, NULL),
(202, '', 'Chuyên đề Công nghệ thông tin (*)', 0, 2, NULL, NULL, NULL),
(203, '', 'Kiểm thử phần mềm (*)', 0, 2, NULL, NULL, NULL),
(204, '', 'Lập trình di động (*)', 0, 2, NULL, NULL, NULL),
(205, '', 'Chuyên đề Lập trình máy tính (*)', 0, 2, NULL, NULL, NULL),
(206, '', 'Thiết kế bộ nhận diện thương hiệu (*)', 0, 2, NULL, NULL, NULL),
(207, '', 'Thiết kế giao diện website (*)', 0, 2, NULL, NULL, NULL),
(208, '', 'Thiết kế hoạt hình 3 chiều (*)', 0, 2, NULL, NULL, NULL),
(209, '', 'Biên tập phim kỹ thuật số (*)', 0, 2, NULL, NULL, NULL),
(210, '', 'Quản trị khủng hoảng truyền thông (*)', 0, 2, NULL, NULL, NULL),
(211, '', 'Tiếng Anh chuyên ngành 2 (*)', 0, 2, NULL, NULL, NULL),
(212, '', 'Tiếng Anh chuyên ngành 2 (*)', 0, 2, NULL, NULL, NULL),
(213, '', 'Xúc tiến quảng bá điểm đến du lịch (*)', 0, 2, NULL, NULL, NULL),
(214, '', 'Thực hành biên phiên dịch 3 (*)', 0, 2, NULL, NULL, NULL),
(215, '', 'Thực hành biên phiên dịch 4 (*)', 0, 2, NULL, NULL, NULL),
(216, '', 'Tiếng anh nâng cao (*)', 0, 2, NULL, NULL, NULL),
(217, '', 'Thực hành dịch viết (*)', 0, 2, NULL, NULL, NULL),
(218, '', 'Thực hành dịch viết (*)', 0, 2, NULL, NULL, NULL),
(219, '', 'Thực hành dịch nói (*)', 0, 2, NULL, NULL, NULL),
(220, '', 'Thực hành dịch nói (*)', 0, 2, NULL, NULL, NULL),
(221, '', 'Tiếng Hàn nâng cao (*)', 0, 2, NULL, NULL, NULL),
(222, '', 'Tiếng Hàn nâng cao (*)', 0, 2, NULL, NULL, NULL),
(223, '', 'Đồ án tốt nghiệp (CNTT) (*)', 0, 2, NULL, NULL, NULL),
(224, '', 'Đồ án tốt nghiệp (CNTT (UDPM)) (*)', 0, 2, NULL, NULL, NULL),
(225, '', 'Đồ án tốt nghiệp (LTMT) (*)', 0, 2, NULL, NULL, NULL),
(226, '', 'Đồ án tốt nghiệp (TKĐH) (*)', 0, 2, NULL, NULL, NULL),
(227, '', 'Đồ án tốt nghiệp (TTĐPT) (*)', 0, 2, NULL, NULL, NULL),
(228, '', 'Đồ án tốt nghiệp (Marketing) (*)', 0, 2, NULL, NULL, NULL),
(229, '', 'Đồ án tốt nghiệp (Marketing DL) (*)', 0, 2, NULL, NULL, NULL),
(230, '', 'Thực tập tốt nghiệp (CNTT (UDPM)) (*)', 0, 2, NULL, NULL, NULL),
(231, '', 'Thực tập tốt nghiệp (LTMT) (*)', 0, 2, NULL, NULL, NULL),
(232, '', 'Thực tập tốt nghiệp (TKĐH) (*)', 0, 2, NULL, NULL, NULL),
(233, '', 'Thực tập tốt nghiệp (TTĐPT) (*)', 0, 2, NULL, NULL, NULL),
(234, '', 'Thực tập tốt nghiệp (Marketing) (*)', 0, 2, NULL, NULL, NULL),
(235, '', 'Thực tập tốt nghiệp (Marketing DL) (*)', 0, 2, NULL, NULL, NULL),
(236, '', 'Thực tập tốt nghiệp (PD TADL) (*)', 0, 2, NULL, NULL, NULL),
(237, '', 'Thực tập tốt nghiệp (Tiếng HQ) (*)', 0, 2, NULL, NULL, NULL),
(238, 'ĐACS4', 'Đồ án cơ sở 4 CE', 2, 0, NULL, NULL, NULL),
(239, 'MMT20', 'Mạng máy tính', 3, 0, NULL, NULL, NULL),
(240, 'NMN_KNM', 'Nhập môn ngành và kỹ năng mềm BA', 2, 0, NULL, NULL, NULL),
(244, '', 'Giải tích 2', 2, 0, NULL, NULL, NULL),
(245, '', 'Linux và phần mềm nguồn mở', 2, 0, NULL, NULL, NULL),
(246, '', 'Lập trình hệ thống', 2, 0, NULL, NULL, NULL),
(247, '', 'Học máy', 3, 0, NULL, NULL, NULL),
(248, '', 'Phân tích và thiết kế giải thuật', 2, 0, NULL, NULL, NULL),
(249, '', 'Tự chọn 1', 2, 0, NULL, NULL, NULL),
(250, '', 'Chương trình dịch', 2, 0, NULL, NULL, NULL),
(251, '', 'Điện toán đám mây', 2, 0, NULL, NULL, NULL),
(252, '', 'Phát triển ứng dụng di động đa nền tảng', 2, 0, NULL, NULL, NULL),
(253, '', 'Đảm bảo chất lượng và kiểm thử phần mềm', 3, 0, NULL, NULL, NULL),
(254, '', 'Tự chọn 2', 2, 0, NULL, NULL, NULL),
(255, '', 'Quản trị dự án phần mềm', 2, 0, NULL, NULL, NULL),
(256, '', 'Kiến trúc và thiết kế phần mềm', 2, 0, NULL, NULL, NULL),
(257, '', 'Đồ án chuyên ngành 3', 1, 0, NULL, NULL, NULL),
(258, '', 'Tự chọn 3', 2, 0, NULL, NULL, NULL),
(259, '', 'Thiết kế web', 3, 0, NULL, NULL, NULL),
(260, '', 'Lập trình Python', 3, 0, NULL, NULL, NULL),
(261, '', 'Nhập môn khoa học dữ liệu', 3, 0, NULL, NULL, NULL),
(262, '', 'Khai phá dữ liệu ', 2, 0, NULL, NULL, NULL),
(263, '', 'Phân tích dữ liệu', 3, 0, NULL, NULL, NULL),
(264, '', 'Học sâu', 3, 0, NULL, NULL, NULL),
(265, '', 'Trực quan hóa dữ liệu', 2, 0, NULL, NULL, NULL),
(267, '', 'Chuyển mạch và định tuyến', 3, 0, NULL, NULL, NULL),
(268, '', 'Thiết kế và xây dựng hệ thống mạng', 2, 0, NULL, NULL, NULL),
(269, '', 'Giám sát hệ thống mạng', 3, 0, NULL, NULL, NULL),
(270, '', 'Mật mã học', 3, 0, NULL, NULL, NULL),
(271, '', 'An toàn ứng dụng Web và CSDL', 2, 0, NULL, NULL, NULL),
(272, '', 'Phân tích mã độc', 2, 0, NULL, NULL, NULL),
(274, '', 'Kỹ thuật mạch điện tử', 3, 0, NULL, NULL, NULL),
(275, '', 'Kiến trúc và giao thức IoT', 2, 0, NULL, NULL, NULL),
(276, '', 'Thiết kế mạch với sự trợ giúp của máy tính', 2, 0, NULL, NULL, NULL),
(277, '', 'Kỹ thuật Robot', 2, 0, NULL, NULL, NULL),
(278, '', 'Robot di động', 2, 0, NULL, NULL, NULL),
(279, '', 'Hệ thống thực tế ảo', 2, 0, NULL, NULL, NULL),
(280, '', 'Hình họa', 2, 0, NULL, NULL, NULL),
(281, '', 'Cơ sở tạo hình', 2, 0, NULL, NULL, NULL),
(282, '', 'Kỹ thuật chụp ảnh và quay phim', 2, 0, NULL, NULL, NULL),
(283, '', 'Kịch bản truyền thông', 2, 0, NULL, NULL, NULL),
(284, '', 'Lập trình web nâng cao', 3, 0, NULL, NULL, NULL),
(285, '', 'Nghệ thuật chữ', 2, 0, NULL, NULL, NULL),
(286, '', 'Thiết kế nhân vật 2 chiều', 2, 0, NULL, NULL, NULL),
(287, '', 'Xử lý ảnh cơ bản', 2, 0, NULL, NULL, NULL),
(288, '', 'Lập trình Game', 2, 0, NULL, NULL, NULL),
(289, '', 'Biên tập phim kỹ thuật số', 2, 0, NULL, NULL, NULL),
(290, '', 'Lập trình game nâng cao', 2, 0, NULL, NULL, NULL),
(291, '', 'Nguyên lý thiết kế đồ họa', 2, 0, NULL, NULL, NULL),
(292, '', 'Thiết kế Logo', 3, 0, NULL, NULL, NULL),
(293, '', 'Đồ họa 3D', 2, 0, NULL, NULL, NULL),
(294, '', 'Thiết kế bộ ấn phẩm văn phòng', 2, 0, NULL, NULL, NULL),
(296, '', 'Kinh doanh quốc tế', 3, 0, NULL, NULL, NULL),
(297, '', 'Digital Marketing', 2, 0, NULL, NULL, NULL),
(298, '', 'Mobile Commerce', 2, 0, NULL, NULL, NULL),
(299, '', 'Facebook Commerce', 2, 0, NULL, NULL, NULL),
(300, '', 'Khởi sự kinh doanh', 3, 0, NULL, NULL, NULL),
(302, '', 'An toàn và bảo mật trong TMĐT', 2, 0, NULL, NULL, NULL),
(303, '', 'Hoạch định nguồn lực doanh nghiệp', 2, 0, NULL, NULL, NULL),
(304, '', 'Nghiên cứu marketing', 3, 0, NULL, NULL, NULL),
(305, '', 'Marketing truyền thông xã hội', 2, 0, NULL, NULL, NULL),
(306, '', 'Marketing công cụ tìm kiếm', 2, 0, NULL, NULL, NULL),
(307, '', 'Marketing nội dung', 2, 0, NULL, NULL, NULL),
(308, '', 'Quảng cáo hiển thị và video', 2, 0, NULL, NULL, NULL),
(309, '', 'Phân tích marketing số', 2, 0, NULL, NULL, NULL),
(310, '', 'Điện tử ứng dụng', 2, 0, NULL, NULL, NULL),
(311, '', 'Lập trình hệ thống nhúng', 2, 0, NULL, NULL, NULL),
(312, '', 'Hệ điều hành nhúng', 2, 0, NULL, NULL, NULL),
(313, '', 'Thiết kế VLSI', 2, 0, NULL, NULL, NULL),
(314, '', 'Lập trình Python cho hệ thống nhúng', 2, 0, NULL, NULL, NULL),
(315, '', 'Thiết kế FPGA/ASIC với Verilog', 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_hocphan_cu`
--

CREATE TABLE `table_hocphan_cu` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahocphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhocphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soTC` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_hocphan_cu`
--

INSERT INTO `table_hocphan_cu` (`id`, `mahocphan`, `tenhocphan`, `soTC`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PLDC', 'Pháp luật đại cương', 2, 0, NULL, NULL, NULL),
(2, 'NMKD', 'Nhập môn kinh doanh', 3, 0, NULL, NULL, NULL),
(3, 'THDC', 'Tin học đại cương', 3, 0, NULL, NULL, NULL),
(4, 'QTH', 'Quản trị học', 3, 0, NULL, NULL, NULL),
(5, 'DA1', 'Đề án 1', 2, 0, NULL, NULL, NULL),
(6, 'CSDL', 'Cơ sở dữ liệu', 2, 0, NULL, NULL, NULL),
(7, 'DS', 'Đại số', 2, 0, NULL, NULL, NULL),
(8, 'GDTC1', 'Giáo dục thể chất 1', 1, 0, NULL, NULL, NULL),
(9, 'JAVACB', 'Lập trình hướng đối tượng và Java cơ bản', 3, 0, NULL, NULL, NULL),
(10, 'NMN&KNM', 'Nhập môn ngành và kỹ năng mềm', 2, 0, NULL, NULL, NULL),
(11, 'TADB', 'Tiếng Anh dự bị', 5, 0, NULL, NULL, NULL),
(12, 'TA1', 'Tiếng Anh 1', 3, 0, NULL, NULL, NULL),
(13, 'TACN', 'Tiếng Anh chuyên ngành 1', 2, 0, NULL, NULL, NULL),
(14, 'THDCKT', 'Tin học đại cương-KT', 3, 0, NULL, NULL, NULL),
(15, 'CTDL & GT', 'Cấu trúc dữ liệu và giải thuật', 3, 0, NULL, NULL, NULL),
(16, 'WEB', 'Công nghệ Web', 3, 0, NULL, NULL, NULL),
(17, 'DACS1', 'Đồ án cơ sở 1', 2, 0, NULL, NULL, NULL),
(18, 'GDTC2', 'Giáo dục thể chất 2', 1, 0, NULL, NULL, NULL),
(19, 'KTMT', 'Kiến trúc máy tính', 2, 0, NULL, NULL, NULL),
(20, 'JAVANC', 'Lập trình Java nâng cao', 2, 0, NULL, NULL, NULL),
(21, 'NLHDH', 'Nguyên lý hệ điều hành', 2, 0, NULL, NULL, NULL),
(22, 'TA2', 'Tiếng Anh 2', 2, 0, NULL, NULL, NULL),
(23, 'TACN2', 'Tiếng Anh chuyên ngành 2', 2, 0, NULL, NULL, NULL),
(24, 'VL', 'Vật lý', 2, 0, NULL, NULL, NULL),
(25, 'GTTKD', 'Giao tiếp trong kinh doanh', 3, 0, NULL, NULL, NULL),
(26, 'KTH', 'Kinh tế học', 4, 0, NULL, NULL, NULL),
(27, 'LKD', 'Luật kinh doanh', 3, 0, NULL, NULL, NULL),
(28, 'MARCB', 'Marketing căn bản', 3, 0, NULL, NULL, NULL),
(29, 'DA2', 'Đề án 2', 2, 0, NULL, NULL, NULL),
(30, 'CD1', 'Chuyên đề 1', 2, 0, NULL, NULL, NULL),
(31, 'WEBNC', 'Công nghệ web nâng cao', 3, 0, NULL, NULL, NULL),
(32, 'DACS2', 'Đồ án cơ sở 2', 2, 0, NULL, NULL, NULL),
(33, 'GDTC3', 'Giáo dục thể chất 3', 1, 0, NULL, NULL, NULL),
(34, 'HTS', 'Hệ thống số', 2, 0, NULL, NULL, NULL),
(35, 'MMT', 'Mạng máy tính', 2, 0, NULL, NULL, NULL),
(36, 'PT&TKHT', 'Phân tích và thiết kế hệ thống', 2, 0, NULL, NULL, NULL),
(37, 'TA3', 'Tiếng Anh 3', 2, 0, NULL, NULL, NULL),
(38, 'TACN&TH1', 'Tiếng Anh chuyên ngành & thực hành 1', 2, 0, NULL, NULL, NULL),
(39, 'TRR', 'Toán rời rạc', 2, 0, NULL, NULL, NULL),
(40, 'DA3', 'Đề án 3', 2, 0, NULL, NULL, NULL),
(41, 'HVTC', 'Hành vi tổ chức', 3, 0, NULL, NULL, NULL),
(42, 'KTDHUD', 'Kỹ thuật đồ họa ứng dụng', 3, 0, NULL, NULL, NULL),
(43, 'TACN3', 'Tiếng Anh chuyên ngành 3', 2, 0, NULL, NULL, NULL),
(44, 'NMTMDT', 'Nhập môn thương mại điện tử', 3, 0, NULL, NULL, NULL),
(45, 'QTNNL', 'Quản trị nguồn nhân lực', 3, 0, NULL, NULL, NULL),
(46, 'CNPM', 'Công nghệ phần mềm', 2, 0, NULL, NULL, NULL),
(47, 'CĐ2', 'Chuyên đề 2', 2, 0, NULL, NULL, NULL),
(48, 'ĐACS3', 'Đồ án cơ sở 3', 2, 0, NULL, NULL, NULL),
(49, 'GT', 'Giải tích', 2, 0, NULL, NULL, NULL),
(50, 'GDTC4', 'Giáo dục thể chất 4', 1, 0, NULL, NULL, NULL),
(51, 'LTDĐ', 'Lập trình di động', 3, 0, NULL, NULL, NULL),
(52, 'TACN&TH', 'Tiếng Anh chuyên ngành & thực hành 2', 2, 0, NULL, NULL, NULL),
(53, 'TTDN', 'Thực tập doanh nghiệp', 1, 0, NULL, NULL, NULL),
(54, 'VĐK', 'Vi điều khiển', 3, 0, NULL, NULL, NULL),
(55, 'XSTK', 'Xác suất thống kê', 2, 0, NULL, NULL, NULL),
(56, 'ĐĐTKD', 'Đạo đức trong kinh doanh', 2, 0, NULL, NULL, NULL),
(57, 'ĐA4', 'Đề án 4', 2, 0, NULL, NULL, NULL),
(58, 'MĐT', 'Marketing điện tử ', 3, 0, NULL, NULL, NULL),
(59, 'QTBH', 'Quản trị bán hàng ', 3, 0, NULL, NULL, NULL),
(60, 'QCXTBH', 'Quảng cáo xúc tiến bán hàng (MCI) ', 3, 0, NULL, NULL, NULL),
(61, 'TACN4', 'Tiếng Anh chuyên ngành 4 ', 2, 0, NULL, NULL, NULL),
(62, 'TKWS', 'Thiết kế website KT', 2, 0, NULL, NULL, NULL),
(63, 'GDQP', 'Giáo dục quốc phòng', 0, 0, NULL, NULL, NULL),
(64, 'ANNHT', 'Automat và Ngôn ngữ hình thức', 2, 0, NULL, NULL, NULL),
(65, 'CĐ3', 'Chuyên đề 3', 2, 0, NULL, NULL, NULL),
(66, 'ĐACS4', 'Đồ án cơ sở 4', 2, 0, NULL, NULL, NULL),
(67, 'ĐHMT', 'Đồ họa máy tính', 2, 0, NULL, NULL, NULL),
(68, 'LTM', 'Lập trình mạng', 2, 0, NULL, NULL, NULL),
(69, 'QLDA', 'Quản lý dự án', 2, 0, NULL, NULL, NULL),
(70, 'QTM', 'Quản trị mạng', 2, 0, NULL, NULL, NULL),
(71, 'TTNT', 'Trí tuệ nhân tạo', 2, 0, NULL, NULL, NULL),
(72, 'ĐA5', 'Đề án 5', 2, 0, NULL, NULL, NULL),
(73, 'HTTTQL', 'Hệ thống thông tin quản lý', 2, 0, NULL, NULL, NULL),
(74, 'KTDN', 'Kế toán doanh nghiệp', 2, 0, NULL, NULL, NULL),
(75, 'QTCCU', 'Quản trị chuỗi cung ứng', 3, 0, NULL, NULL, NULL),
(76, 'QTTC', 'Quản trị tài chính', 3, 0, NULL, NULL, NULL),
(77, 'TUDTKT', 'Toán ứng dụng trong kinh tế', 2, 0, NULL, NULL, NULL),
(79, 'LSĐCSVN', 'Lịch sử Đảng Cộng sản Việt Nam', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(80, 'TTĐT', 'Thanh toán điện tử', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(81, 'MACLENIN', 'Triết học Mac - Lênin', 3, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(82, 'PPNC', 'Phương pháp nghiên cứu khoa học', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(83, 'CLKDĐT', 'Chiến lược kinh doanh điện tử', 3, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(84, 'ĐA6', 'Đề án 6', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(85, 'BM&ATHTTT', 'Bảo mật và An toàn hệ thống thông tin', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(86, 'CĐ4', 'Chuyên đề 4', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(87, 'ĐACS5', 'Đồ án cơ sở 5', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(88, 'KTPM', 'Kiểm thử phần mềm', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(89, 'KTTSL', 'Kỹ thuật truyền số liệu', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(90, 'TBD', 'Trình biên dịch', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(91, 'XLA', 'Xử lý ảnh', 2, 0, NULL, '2019-12-20 02:23:59', '2019-12-20 02:23:59'),
(92, 'XLTHS', 'Xử lý tín hiệu số', 2, 0, NULL, '2019-12-20 02:24:00', '2019-12-20 02:24:00'),
(93, 'TKKD', 'Thống kê kinh doanh', 2, 0, NULL, NULL, NULL),
(94, 'KTVM', 'Kinh tế vi mô', 2, 0, NULL, '2019-12-26 04:17:43', '2019-12-26 04:17:43'),
(95, 'KTVXM', 'Kinh tế vĩ mô', 2, 0, NULL, '2019-12-26 04:21:57', '2019-12-26 04:21:57'),
(96, 'TTHCM', 'Tư tưởng Hồ Chí Minh', 2, 0, NULL, NULL, NULL),
(97, 'CĐ5', 'Chuyên đề 5', 2, 0, NULL, NULL, NULL),
(98, 'ĐACN1', 'Đồ án chuyên ngành 1', 2, 0, NULL, NULL, NULL),
(99, 'TTNM', 'Tương tác người - máy', 3, 0, NULL, NULL, NULL),
(100, 'TGMT', 'Thị giác máy tính', 3, 0, NULL, NULL, NULL),
(101, 'HTN', 'Hệ thống nhúng', 3, 0, NULL, NULL, NULL),
(102, 'ĐA7', 'Đề án 7', 2, 0, NULL, NULL, NULL),
(103, 'QTQTĐM', 'Quản trị quá trình đổi mới, sáng tạo', 2, 0, NULL, NULL, NULL),
(104, 'QTTNTMĐT', 'Quản trị tác nghiệp thương mại điện tử', 3, 0, NULL, NULL, NULL),
(105, 'KTCT', 'Kinh tế chính trị Mác - Lênin', 2, 0, NULL, NULL, NULL),
(106, 'CNXHKH', 'Chủ nghĩa xã hội khoa học', 2, 0, NULL, NULL, NULL),
(107, 'HVNTD', 'Hành vi người tiêu dùng', 2, 0, NULL, NULL, NULL),
(108, 'ĐHMT', 'Đồ hoạ máy tính', 2, 0, NULL, NULL, NULL),
(109, 'TACN1_KT', 'Tiếng Anh chuyên ngành 1 (KT)', 2, 0, NULL, NULL, NULL),
(110, 'CĐ6', 'Chuyên đề 6', 2, 0, NULL, NULL, NULL),
(111, 'HTDĐ_CB', 'Hệ thống di động và cảm biến', 3, 0, NULL, NULL, NULL),
(112, 'LTDKTĐ', 'Lý thuyết điều khiển tự động', 3, 0, NULL, NULL, NULL),
(114, 'HCSDLPT', 'Hệ cơ sở dữ liệu phân tán', 3, 0, NULL, NULL, NULL),
(115, 'TMĐT', 'Thương mại điện tử', 3, 0, NULL, NULL, NULL),
(116, 'ĐACN2', 'Đồ án chuyên ngành 2', 2, 0, NULL, NULL, NULL),
(118, 'KLTN_BA', 'Khóa luận tốt nghiệp (BA)', 10, 0, NULL, NULL, NULL),
(119, '', 'Đồ họa 2D (*)', 0, 2, NULL, NULL, NULL),
(120, '', 'Lập trình hướng đối tượng (*)', 0, 2, NULL, NULL, NULL),
(121, '', 'Lập trình trực quan (*)', 0, 2, NULL, NULL, NULL),
(122, '', 'Lập trình web (*)', 0, 2, NULL, NULL, NULL),
(123, '', 'Pháp luật (*)', 0, 2, NULL, NULL, NULL),
(124, '', 'Tiếng Anh chuyên ngành (*)', 0, 2, NULL, NULL, NULL),
(125, '', 'Lập trình vi điều khiển (*)', 0, 2, NULL, NULL, NULL),
(126, '', 'Thiết kế đồ họa và xử lý ảnh (*)', 0, 2, NULL, NULL, NULL),
(127, '', 'Lập trình Mobile Application (*)', 0, 2, NULL, NULL, NULL),
(128, '', 'Dự án Web Back-End (*)', 0, 2, NULL, NULL, NULL),
(129, '', 'Chính trị (*)', 0, 2, NULL, NULL, NULL),
(130, '', 'Lập trình Java (*)', 0, 2, NULL, NULL, NULL),
(131, '', 'Quảng cáo (*)', 0, 2, NULL, NULL, NULL),
(132, '', 'Định giá sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL),
(133, '', 'Nghiệp vụ bán sản phẩm du lịch (*)', 0, 2, NULL, NULL, NULL),
(134, '', 'Nghiệp vụ marketing du lịch (*)', 0, 2, NULL, NULL, NULL),
(135, '', 'Quản lý chất lượng dịch vụ (*)', 0, 2, NULL, NULL, NULL),
(136, '', 'Truyền thông marketing tích hợp (*)', 0, 2, NULL, NULL, NULL),
(137, '', 'Nghiệp vụ bán hàng (*)', 0, 2, NULL, NULL, NULL),
(138, '', 'Khởi tạo doanh nghiệp (*)', 0, 2, NULL, NULL, NULL),
(139, '', 'Marketing dịch vụ (*)', 0, 2, NULL, NULL, NULL),
(140, '', 'Quản trị thương hiệu (*)', 0, 2, NULL, NULL, NULL),
(141, '', 'Hành vi khách hàng (*)', 0, 2, NULL, NULL, NULL),
(142, '', 'Thực hành biên phiên dịch 1 (*)', 0, 2, NULL, NULL, NULL),
(143, '', 'Thực hành biên phiên dịch 2 (*)', 0, 2, NULL, NULL, NULL),
(144, '', 'Tiếng Anh lữ hành (*)', 0, 2, NULL, NULL, NULL),
(145, '', 'Đất nước và văn hoá các nước nói tiếng Anh (*)', 0, 2, NULL, NULL, NULL),
(146, '', 'Tuyến điểm du lịch Viêt Nam (*)', 0, 2, NULL, NULL, NULL),
(147, '', 'Thiết kế bộ lịch (*)', 0, 2, NULL, NULL, NULL),
(148, '', 'Thiết kế minh họa (*)', 0, 2, NULL, NULL, NULL),
(149, '', 'Thiết kế Poster quảng cáo (*)', 0, 2, NULL, NULL, NULL),
(150, '', 'Đồ họa động (*)', 0, 2, NULL, NULL, NULL),
(151, '', 'Lịch sử design (*)', 0, 2, NULL, NULL, NULL),
(152, '', 'Lịch sử Mỹ thuật Việt Nam và thế giới (*)', 0, 2, NULL, NULL, NULL),
(153, '', 'Viết 4 (*)', 0, 2, NULL, NULL, NULL),
(154, '', 'Nghe 4 (*)', 0, 2, NULL, NULL, NULL),
(155, '', 'Nói 4 (*)', 0, 2, NULL, NULL, NULL),
(156, '', 'Đọc 4 (*)', 0, 2, NULL, NULL, NULL),
(157, '', 'Tiếng Hàn du lịch (*)', 0, 2, NULL, NULL, NULL),
(158, '', 'Tiếng Hàn văn phòng (*)', 0, 2, NULL, NULL, NULL),
(159, '', 'Thiết kế ấn phẩm báo chí (*)', 0, 2, NULL, NULL, NULL),
(160, '', 'Thiết kế hoạt hình 2 chiều (*)', 0, 2, NULL, NULL, NULL),
(161, '', 'Thiết kế nhân vật 3 chiều (*)', 0, 2, NULL, NULL, NULL),
(162, '', 'Thiết kế hình hiệu (TV intro) (*)', 0, 2, NULL, NULL, NULL),
(163, '', 'Truyền thông đại chúng (*)', 0, 2, NULL, NULL, NULL),
(164, '', 'Khóa luận tốt nghiệp (*)', 0, 2, NULL, NULL, NULL),
(165, '', 'Công nghệ phần mềm (*)', 0, 2, NULL, NULL, NULL),
(166, '', 'Sinh hoạt lớp', 0, 2, NULL, NULL, NULL),
(167, '', 'Seminar cấp Khoa', 0, 2, NULL, NULL, NULL),
(168, 'TACN_KT', 'Tiếng Anh chuyên ngành 2 (KT)', 2, 2, NULL, NULL, NULL),
(169, 'GT1', 'Giải tích 1', 2, 0, NULL, NULL, NULL),
(170, '', 'Khởi nghiệp và đổi mới sáng tạo', 2, 0, NULL, NULL, NULL),
(171, '', 'Công nghệ và lập trình web', 3, 0, NULL, NULL, NULL),
(172, 'GT2', 'Giải tích 2', 2, 0, NULL, NULL, NULL),
(173, '', 'Linux và phần mềm nguồn mở', 2, 0, NULL, NULL, NULL),
(174, '', 'Lập trình hệ thống', 2, 0, NULL, NULL, NULL),
(175, '', 'Học máy', 3, 0, NULL, NULL, NULL),
(176, '', 'Phân tích và thiết kế giải thuật', 2, 0, NULL, NULL, NULL),
(177, '', 'Tự chọn 1', 2, 0, NULL, NULL, NULL),
(178, '', 'Chương trình dịch', 2, 0, NULL, NULL, NULL),
(179, '', 'Điện toán đám mây', 2, 0, NULL, NULL, NULL),
(180, '', 'Phát triển ứng dụng di động đa nền tảng', 2, 0, NULL, NULL, NULL),
(181, '', 'Đảm bảo chất lượng và kiểm thử phần mềm', 3, 0, NULL, NULL, NULL),
(182, '', 'Tự chọn 2', 2, 0, NULL, NULL, NULL),
(183, '', 'Quản trị dự án phần mềm', 2, 0, NULL, NULL, NULL),
(184, '', 'Kiến trúc và thiết kế phần mềm', 2, 0, NULL, NULL, NULL),
(185, '', 'Đồ án chuyên ngành 3', 1, 0, NULL, NULL, NULL),
(186, '', 'Tự chọn 3', 2, 0, NULL, NULL, NULL),
(187, '', 'Thiết kế web', 3, 0, NULL, NULL, NULL),
(188, '', 'Lập trình Python', 3, 0, NULL, NULL, NULL),
(189, '', 'Nhập môn khoa học dữ liệu', 3, 0, NULL, NULL, NULL),
(190, '', 'Khai phá dữ liệu ', 2, 0, NULL, NULL, NULL),
(191, '', 'Phân tích dữ liệu', 3, 0, NULL, NULL, NULL),
(192, '', 'Học sâu', 3, 0, NULL, NULL, NULL),
(193, '', 'Trực quan hóa dữ liệu', 2, 0, NULL, NULL, NULL),
(194, '', 'Xử lý ngôn ngữ tự nhiên', 2, 0, NULL, NULL, NULL),
(195, '', 'Chuyển mạch và định tuyến', 3, 0, NULL, NULL, NULL),
(196, '', 'Thiết kế và xây dựng hệ thống mạng', 2, 0, NULL, NULL, NULL),
(197, '', 'Giám sát hệ thống mạng', 3, 0, NULL, NULL, NULL),
(198, '', 'Mật mã học', 3, 0, NULL, NULL, NULL),
(199, '', 'An toàn ứng dụng Web và CSDL', 2, 0, NULL, NULL, NULL),
(200, '', 'Phân tích mã độc', 2, 0, NULL, NULL, NULL),
(201, '', 'Cấu kiện điện tử', 2, 0, NULL, NULL, NULL),
(202, '', 'Kỹ thuật mạch điện tử', 3, 0, NULL, NULL, NULL),
(203, '', 'Kiến trúc và giao thức IoT', 2, 0, NULL, NULL, NULL),
(204, '', 'Thiết kế mạch với sự trợ giúp của máy tính', 2, 0, NULL, NULL, NULL),
(205, '', 'Kỹ thuật Robot', 2, 0, NULL, NULL, NULL),
(206, '', 'Robot di động', 2, 0, NULL, NULL, NULL),
(207, '', 'Hệ thống thực tế ảo', 2, 0, NULL, NULL, NULL),
(208, '', 'Hình họa', 2, 0, NULL, NULL, NULL),
(209, '', 'Cơ sở tạo hình', 2, 0, NULL, NULL, NULL),
(210, '', 'Kỹ thuật chụp ảnh và quay phim', 2, 0, NULL, NULL, NULL),
(211, '', 'Kịch bản truyền thông', 2, 0, NULL, NULL, NULL),
(212, '', 'Lập trình web nâng cao', 3, 0, NULL, NULL, NULL),
(213, '', 'Nghệ thuật chữ', 2, 0, NULL, NULL, NULL),
(214, '', 'Thiết kế nhân vật 2 chiều', 2, 0, NULL, NULL, NULL),
(215, '', 'Xử lý ảnh cơ bản', 2, 0, NULL, NULL, NULL),
(216, '', 'Lập trình Game', 2, 0, NULL, NULL, NULL),
(217, '', 'Biên tập phim kỹ thuật số', 2, 0, NULL, NULL, NULL),
(218, '', 'Lập trình game nâng cao', 2, 0, NULL, NULL, NULL),
(219, '', 'Nguyên lý thiết kế đồ họa', 2, 0, NULL, NULL, NULL),
(220, '', 'Thiết kế Logo', 3, 0, NULL, NULL, NULL),
(221, '', 'Đồ họa 3D', 2, 0, NULL, NULL, NULL),
(222, '', 'Thiết kế bộ ấn phẩm văn phòng', 2, 0, NULL, NULL, NULL),
(223, '', 'Nguyên lý kế toán', 3, 0, NULL, NULL, NULL),
(224, '', 'Kinh doanh quốc tế', 3, 0, NULL, NULL, NULL),
(225, '', 'Digital Marketing', 2, 0, NULL, NULL, NULL),
(226, '', 'Mobile Commerce', 2, 0, NULL, NULL, NULL),
(227, '', 'Facebook Commerce', 2, 0, NULL, NULL, NULL),
(228, '', 'Khởi sự kinh doanh', 3, 0, NULL, NULL, NULL),
(229, '', 'Quản trị quan hệ khách hàng', 2, 0, NULL, NULL, NULL),
(230, '', 'An toàn và bảo mật trong TMĐT', 2, 0, NULL, NULL, NULL),
(231, '', 'Hoạch định nguồn lực doanh nghiệp', 2, 0, NULL, NULL, NULL),
(232, '', 'Nghiên cứu marketing', 3, 0, NULL, NULL, NULL),
(233, '', 'Marketing truyền thông xã hội', 2, 0, NULL, NULL, NULL),
(234, '', 'Marketing công cụ tìm kiếm', 2, 0, NULL, NULL, NULL),
(235, '', 'Marketing nội dung', 2, 0, NULL, NULL, NULL),
(236, '', 'Quảng cáo hiển thị và video', 2, 0, NULL, NULL, NULL),
(237, '', 'Phân tích marketing số', 2, 0, NULL, NULL, NULL),
(238, '', 'Điện tử ứng dụng', 2, 0, NULL, NULL, NULL),
(239, '', 'Lập trình hệ thống nhúng', 2, 0, NULL, NULL, NULL),
(240, '', 'Hệ điều hành nhúng', 2, 0, NULL, NULL, NULL),
(241, '', 'Thiết kế VLSI', 2, 0, NULL, NULL, NULL),
(242, '', 'Lập trình Python cho hệ thống nhúng', 2, 0, NULL, NULL, NULL),
(243, '', 'Thiết kế FPGA/ASIC với Verilog', 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_kehoachgiangday`
--

CREATE TABLE `table_kehoachgiangday` (
  `id` int(11) NOT NULL,
  `buoi` int(11) DEFAULT NULL,
  `noidung` text,
  `hoatdongdayhoc` text,
  `baidanhgia` varchar(255) DEFAULT NULL,
  `cdrhocphan` varchar(255) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `thuochocphan` varchar(255) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_kehoachgiangday`
--

INSERT INTO `table_kehoachgiangday` (`id`, `buoi`, `noidung`, `hoatdongdayhoc`, `baidanhgia`, `cdrhocphan`, `id_hocphan`, `thuochocphan`, `khungchuongtrinh`) VALUES
(267, 1, 'a', 'a', 'A1.1', '1_4', 52, '0', 146),
(268, 2, 'c', 'c', 'A1.1', '2', 52, '0', 146),
(269, 3, 'b', 'b', 'A2.1', '2', 52, '0', 146),
(270, 4, 'd', 'd', 'A1.1', '1', 52, '0', 146),
(271, 1, 'q', 'q', 'A2.1', '2', 52, '1', 146),
(272, 2, 'w', 'w', 'A2.1', '2', 52, '1', 146),
(273, 3, 'e', 'e', 'A2.1', '2', 52, '1', 146),
(280, 1, '1. Giới thiệu tổng quan_a. Giới thiệu về bảo mật_b. Các rủi ro_c. Lỗ hổng', 'Phương pháp giảng dạy:_-Giảng giải_-Chất vấn_Phương pháp học tập_-Quan sát và lắng nghe_-Hỏi và trả lời câu hỏi', 'A1.1_A2.1', '1', 85, '0', 146),
(281, 2, '2. Xác thực, kiểm soát truy cập_a. Xác thực_b. Kiểm soát truy cập_c. Các giao thức mã hóa_d. Hạ tầng khóa công khai', 'Phương pháp giảng dạy:_-Giảng giải_-Chất vấn_Phương pháp học tập_-Quan sát và lắng nghe_-Hỏi và trả lời câu hỏi', 'A1.1_A2.1', '1_7_8', 85, '0', 146),
(282, 3, '3. Bảo mật web_a. Tấn công trình duyệt_b. Khai thác dữ liệu người dùng và website_c. Tấn công email', 'Phương pháp giảng dạy:_-Giảng giải_-Chất vấn_Phương pháp học tập_-Quan sát và lắng nghe_-Hỏi và trả lời câu hỏi', 'A1.1_A2.1', '3_4_7', 85, '0', 146),
(283, 1, 'Bài 1: Sử dụng lệnh trên Linux', 'Thực hành với một số lệnh căn bản trong Linux', 'A2.1', '3_4_7', 85, '1', 146),
(284, 2, 'Bài 2: Sử dụng các công cụ cơ bản trong Metasploit', 'Áp dụng các lệnh đã học ở bài 1 và thực hành thêm 1 số lệnh đặc thù của Metasploit để sử dụng các công cụ cơ bản', 'A2.1', '3_4_7', 85, '1', 146),
(285, 3, 'Bài 3: Thăm dò và thu thập thông tin đối tượng', 'Sử dụng Nmap, Metasploit, Kali và Wireshark để thu thập thông tin về mục tiêu', 'A2.1', '1_3_4_7_8', 85, '1', 146),
(286, 1, 'Chương 1. Phần tử và hệ thống điều khiển tự động_1.1 Khái niệm điều khiển_1.2 Các nguyên tắc điều khiển_1.3 Phân loại điều khiển_1.4 Một số ví dụ về các hệ thống điều khiển', 'Đặt vấn đề_Thuyết trình__Lắng nghe_Làm bài tập', 'A1.1_A1.2', '1_2', 112, '0', 146),
(287, 2, 'Chương 2. Mô tả toán học hệ thống điều khiển liên tục_2.1 Khái niệm về mô hình toán học_2.2 Hàm truyền_2.3 Hàm truyền của hệ thống tự động_2.4 Phương trình trạng thái', 'Đặt vấn đề_Thuyết trình_Phát vấn__Lắng nghe_Làm bài tập', 'A1.1_A1.2', '1_2_3', 112, '0', 146),
(288, 3, 'Chương 3. Khảo sát tính ổn định của hệ thống_3.1 Khái niệm ổn định_3.2 Tiêu chuẩn ổn định đại số_3.3 Phương pháp quỹ đạo nghiệm số (QĐNS)_3.4 Tiêu chuẩn ổn định tần số', 'Đặt vấn đề_Thuyết trình__Lắng nghe_Làm bài tập', 'A1.1_A1.2', '1_2_3_6', 112, '0', 146),
(289, 1, 'noi dung buoi 1', 'buoi 1', 'A1.1', '1', 92, '0', 146),
(290, 2, 'noi dung buoi 2', 'buoi 2', 'A1.1_A2.1', '1_2_5', 92, '0', 146),
(306, 1, 'Chương 1. Tổng quan về xử lý ảnh_1.1	Khái niệm về ảnh số - xử lý ảnh_1.2	Lịch sử của xử lý ảnh_1.3	Ứng dụng xử lý ảnh số_1.4	Các bước cơ bản trong xử lý ảnh_1.5	Các thành phần trong hệ thống xử lý ảnh', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe và trao đổi_Tự học: Đọc trước bài giảng', 'A1.1_A2.1', '1_5', 91, '0', 146),
(307, 2, 'Chương 2. Cơ sở xử lý ảnh._2.1	Hệ thống thị giác của con người_2.2	Ánh sáng và quan phổ điện từ_2.3	Cảm biến và thu nhận ảnh_2.4  Số hóa ảnh - độ phân giải_2.5  Quan hệ cơ bản giữa các pixel_2.6 Một số công cụ toán học trong xử lý ảnh số', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe và trao đổi, làm bài tập_Tự học: Đọc trước bài giảng', 'A1.1_A2.1', '1_2_5', 91, '0', 146),
(308, 1, 'TH 1. Cài đặt OpenCV_- Cấu hình OpenCV_- Viết chương trình cơ bản sử dụng OpenCV và Python/C++_- Đọc và hiển thị ảnh_- Nộp bài trên hệ thống elearing', 'Dạy: Trình bày bài thực hành_Học ở lớp: Thực hành trên máy tính_Tự học: làm bài tập', 'A1.1_A2.1', '2_5', 91, '1', 146),
(309, 2, 'TH 2. Biến đổi cường độ điểm ảnh và Histogram_- Thay đổi độ sáng ảnh_- Thay đổi độ tương phản ảnh_- Tạo ảnh âm bản._- Biến đổi ảnh bằng hàm_-Biến đổi ảnh bằng hàm mũ(Gamma)_- Tính histogram của 1 ảnh_- Cân bằng histogram', 'Dạy: Trình bày bài bài thực hành_Học ở lớp: Thực hành trên máy tính_Tự học: làm bài tập', 'A1.1_A2.1', '2_3_4_5', 91, '1', 146),
(310, 1, 'Giới thiệu học phần_Chương 1. Tổng quan về hệ CSDL phân tán_1.1. Xử lý phân tán và hệ thống xử lý phân tán_1.1.1. Xử lý phân tán_1.1.2. Hệ thống phân tán 1.2. Hệ CSDL phân tán là gì 1.3. Sự cần thiết của hệ CSDL phân tán_1.4. Các đặc điểm của CSDL phân tán so với CSDL tập trung_1.5. Các mô hình cơ sở dữ liệu Client/Server_1.6. Mô hình cơ sở dữ liệu Server/Server_1.7. Mô hình tham chiếu CSDL phân tán_1.7.1. Lược đồ toàn cục 1.7.2. Lược đồ phân mảnh 1.7.3. Lược đồ cấp phát 1.7.4. Lược đồ ánh xạ cục bộ', 'Dạy:_- Giảng viên giới thiệu đến sinh viên mục tiêu môn học; vị trí và vai trò của môn học trong chương trình đào tạo của ngành; chuẩn đầu ra môn học, các hình thức kiểm tra đánh giá và trọng số của các bài đánh giá, nội dung học phần theo chương._- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_- Nghe giảng._- Trả lời các câu hỏi của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm._- Thảo luận: Chia nhóm thảo luận về các đặc trưng mạng máy tính_Học ở nhà:_- Ôn lại lý thuyết', 'A1.1', '1', 114, '0', 146),
(311, 2, 'Chương 1. Tổng quan về CSDL phân tán_1.8. Cấu trúc logic của CSDL phân tán._1.9. Lợi ích phân tán dữ liệu trên mạng_1.10. Hệ quản trị CSDL quan hệ_1.11. Tổng quan về hệ quản trị CSDL phân tán_1.11.1. Giới thiệu_1.11.2. Hệ quản trị CSDL phân tán thuần nhất_1.11.3. Hệ quản trị CSDL phân tán không thuần nhất 1.12. Mô hình kiến trúc hệ quản trị CSDL phân tán 1.13. Kiến trúc hệ quản trị CSDL phân tán', 'Dạy:_- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi/ bài tập cho sinh viên suy nghĩ và trả lời._Học ở lớp:_- Nghe giảng._- Suy nghĩ, thảo luận và trả lời các câu hỏi/ bài tập của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm liên quan đến nội dung bài học._Học ở nhà:_- Ôn lại lý thuyết._- Làm bài tập về nhà', 'A1.1', '1_2_3_4_7', 114, '0', 146),
(312, 3, 'Chương 2. Thiết kế hệ CSDL phân tán_2.1. Các vấn đề về phân mảnh dữ liệu_2.1.1. Lý do phân mảnh 2.1.2. Các kiểu phân mảnh 2.1.3. Mức độ phân mảnh 2.1.4. Các quy tắc phân mảnh_2.1.5. Các kiểu cấp phát 2.1.6. Các yêu cầu thông tin 2.2. Phương pháp phân mảnh ngang_2.2.1. Khái niệm_2.2.2. Thông tin cần thiết của phân mảnh ngang_2.2.3. Phân mảnh ngang nguyên thủy_2.2.4. Tính đầy đủ và tính cực tiểu của vị từ đơn giản 2.2.5. Thuật toán xác định phân mảnh ngang nguyên thủy', 'Dạy:_- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi/ bài tập cho sinh viên suy nghĩ và trả lời._Học ở lớp:_- Nghe giảng._- Suy nghĩ, thảo luận và trả lời các câu hỏi/ bài tập của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm liên quan đến nội dung bài học._Học ở nhà:_- Ôn lại lý thuyết._- Làm bài tập về nhà', 'A1.1', '1_2_3_4', 114, '0', 146),
(313, 1, 'Hướng dẫn cài đặt SQL Server phân tán', '- Giới thiệu về các hệ quản trị CSDL dùng trên phân tán và phiên bản dành cho database server._- Hướng dẫn cài đặt cấu hình kết nối từ các database server trong mạng LAN_- Hướng dẫn sinh viên thực hiện', 'A1.1', '2', 114, '1', 146),
(314, 2, 'BÀI THỰC HÀNH 1 (tt)', '- Giới thiệu LinkServer_- Hướng dẫn kết nối Link server_từ Access, SQL Server, Excel_- Theo dõi sinh viên làm bài', 'A1.1', '1', 114, '1', 146),
(315, 3, 'BÀI THỰC HÀNH 2:_Thiết kế phân tán Bài tập tình huống 1', '- Hướng dẫn thiết kế phân tán_- Hướng dẫn thực thi phân tán_trên mạng LAN_- Theo dõi sinh viên làm bài', 'A2.1', '6', 114, '1', 146),
(321, 1, 'Chương 1. Get Started_Build Your First App', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A1.1', '1', 51, '0', 146),
(322, 2, 'Activities', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A2.1', '2', 51, '0', 146),
(323, 3, 'Testing, Debugging, and Using Support Libraries', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A3.1', '3', 51, '0', 146),
(324, 4, 'Chương 2 - User Experience_User Interaction', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A4.1', '4', 51, '0', 146),
(325, 5, 'Delightful User Experience', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A1.1', '5', 51, '0', 146),
(326, 6, 'Testing your UI', 'Dạy lý thuyết_Trình bày bài giảng trên lớp_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập', 'A2.1', '1', 51, '0', 146),
(327, 7, 'Chương 3 - Working in the Background_Background Tasks', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A3.1', '2', 51, '0', 146),
(328, 8, 'Triggering, Scheduling, and Optimizing Background Tasks', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A4.1', '3', 51, '0', 146),
(329, 9, 'Chương 4 - All About Data_Preferences and Settings', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A1.1', '4', 51, '0', 146),
(330, 10, 'Storing Data Using SQLite', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A2.1', '5', 51, '0', 146),
(331, 11, 'Sharing Data with Content Providers', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A3.1', '1', 51, '0', 146),
(332, 12, 'Loading Data Using Loaders', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A4.1', '2', 51, '0', 146),
(333, 13, 'Using Loaders', 'Dạy: Trình bày bài giảng_Học ở lớp: Nghe, trao đổi, thực hành và làm bài tập_Học ở nhà: Đọc trước bài giảng, thực hành và làm bài tập về nhà', 'A1.1', '1', 51, '0', 146),
(334, 1, 'Chương 1: Khái quát về kinh tế vĩ mô_1.1. Một số khái niệm cơ bản_1.2. Mục tiêu và công cụ trong kinh tế vĩ mô', 'Phương pháp giảng dạy:_+	Thuyết giảng_+	Trình chiếu Powerpoint_+	Thảo luận, trao đổi_+  Giao bài tập_Phương pháp học tập_+ Chuẩn bị giáo trình, tài liệu_+ Thảo luận,  làm bài tập', 'A1.1', '1_2', 95, '0', 146),
(335, 2, 'Chương 2. Đo lường các chỉ tiêu kinh tế quốc gia_2.1. Tổng sản phẩm quốc dân - Thước đo thành tựu kinh tế của một quốc gia_2.1.1. Các quan điểm sản xuất và hệ thống tài khoản quốc gia SNA_2.1.2. Tổng sản phẩm quốc dân và tổng sản phẩm quốc nội._2.1.3. Ý nghĩa của các chỉ tiêu GNP và GDP trong phân tích kinh tế vĩ mô', 'Phương pháp giảng dạy:_+	Thuyết giảng_+	Trình chiếu Powerpoint_+	Thảo luận, trao đổi_+   Giao bài tập và đề tài thảo luận._Phương pháp học tập_+ Chuẩn bị giáo trình, tài liệu_+ Thảo luận và trả lời câu hỏi_+ Làm bài tập', 'A1.1', '1_2_3', 95, '0', 146),
(336, 3, 'Chương 2. Đo lường các chỉ tiêu kinh tế quốc gia_2.2.  Phương pháp xác định GDP và mối quan hệ giữa các chỉ tiêu._2.2.1. Phương pháp xác định GDP._2.2.2. Mối quan hệ giữa các chỉ tiêu', 'Phương pháp giảng dạy:_+	Thuyết giảng_+	Trình chiếu Powerpoint_+   Giao bài tập và đề tài thảo luận._Phương pháp học tập_+ Chuẩn bị giáo trình, tài liệu_+ Thảo luận và trả lời câu hỏi', 'A1.1', '1_2_3', 95, '0', 146),
(337, 4, 'Chương 3. Mô hình tổng cung – tổng cầu_3.1. Tổng cầu_3.1.1. Khái niệm tổng cầu và đường tổng cầu_3.1.2. Các yếu tố làm dịch chuyển đường tổng cầu_3.2. Tổng cung_3.2.1. Khái niệm tổng cung và đường tổng cung', 'Phương pháp giảng dạy:_+	Thuyết giảng_+	Trình chiếu Powerpoint_+  Giao bài tập_Phương pháp học tập_+ Chuẩn bị giáo trình, tài liệu_+ Làm bài tập', 'A1.1', '1_2_3', 95, '0', 146),
(338, 5, 'Chương 3. Mô hình tổng cung – tổng cầu_3.2. Tổng cung (tt)_3.2.2. Các yếu tố làm dịch chuyển đường tổng cung_3.3. Cân bằng trong ngắn hạn của nền kinh tế_3.4. Nguyên nhân gây ra biến động kinh tế ngắn hạn', 'Phương pháp giảng dạy:_+	Thuyết giảng_+	Trình chiếu Powerpoint_+  Giao bài tập_Phương pháp học tập_+ Chuẩn bị giáo trình, tài liệu_+ Làm bài tập (cá nhân)', 'A1.1', '1_2_3', 95, '0', 146),
(376, 1, 'Chương 1. Giới thiệu về hệ thống di động và tính toán di động_1.1. Giới thiệu_1.2. Mô hình tính toán di động_1.3. Mạng không dây và mạng di động_1.3.1 Hệ thống vệ tinh_1.3.2 Mạng Ad-hoc._1.3.3 Mạng cảm biến_1.3.4 Mạng WPAN, WLAN, WMAN', 'Giảng dạy lý thuyết;_Phát vấn;_Hỏi/đáp;_Làm bài tập', 'A1.1_A2.1_A4.1', '1', 111, '0', 146),
(377, 2, 'Chương 2. Giao thức truy cập trên thiết bị di động và không dây_2.1. Môi trường truyền không dây_2.2. Giới thiệu Ethernet MAC_2.3. Giao thức IEEE 802.11_2.5. Bluetooth and Zigbee (IEEE 802.15.4)_2.6. Lora và Mạng Lorawan_2.7. Mạng di động GSM, 2G, 3G, LTE-4G, 5G', 'Giảng dạy lý thuyết;_Phát vấn;_Hỏi/đáp;_Làm bài tập', 'A1.1_A2.1', '1_2', 111, '0', 146),
(378, 3, 'a', 'b', 'A1.1', '1', 111, '0', 146),
(379, 1, 'Bài thực hành 1: Lập trình điều khiển cảm biến trên Arduino và Raspberry', 'GV Hướng dẫn mẫu;_SV tự thực hiện', '', '', 111, '1', 146),
(380, 2, 'Bài thực hành 2:_Thực hành Lora và LoraWan', 'GV Hướng dẫn mẫu;_SV tự thực hiện', '', '', 111, '1', 146),
(381, 3, 'abc', 'abc', 'A1.1', '1', 111, '1', 146),
(382, 4, 'Bài thực hành 3:_Thực hành Mạng cảm biến Zigbee', 'GV Hướng dẫn mẫu;_SV tự thực hiện', '', '', 111, '1', 146),
(383, 5, 'b', 'b', 'A1.1', '1', 111, '1', 146),
(386, 1, 'Chương 1: Basic Ruby_1.	Syntax_2.	Array and Hashes_3.	Loop_4.	Blocks and Iterators_5.	Class, Object and Mudules_6.	Exceptions_7.	Exercises', 'Phương pháp giảng dạy:_- Giảng viên giới thiệu đến sinh viên mục tiêu môn học; vị trí và vai trò của môn học trong chương trình đào tạo của ngành; chuẩn đầu ra môn học, các hình thức kiểm tra đánh giá và trọng số của các bài đánh giá, nội dung học phần theo chương._- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Phương pháp học tập_- Nghe giảng._- Trả lời các câu hỏi của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm._- Thảo luận: Chia nhóm thảo luận các vấn đề về ưu điểm và nhược điểm của các ngôn ngữ lập trình hướng đối tượng thông dụng hiện nay; Tại sao nên sử dụng ngôn ngữ lập trình Ruby và Ruby On Rails?', 'A1.1', '1_2', 47, '0', 147),
(387, 2, 'Chương 2: Basic Ruby On Rails_1.	Introduction_2.	Setup_3.	Active Records_4.	Migrations_5.	Controller_6.	Routers_7.	Views_8.	Layouts_9.	Scaffolding_10.	Exercises', 'Phương pháp giảng dạy:_- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Phương pháp học tập_- Nghe giảng._- Suy nghĩ, thảo luận và trả lời các câu hỏi của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm liên quan đến nội dung bài học._- Thảo luận về hiệu quả của việc sử dụng Ruby On Rails', 'A1.1', '1', 47, '0', 147),
(388, 3, 'Kiểm tra giữa kỳ', 'Kiểm tra giữa kỳ', 'A3.1', '1_2_3', 47, '0', 147),
(389, 1, 'a', 'b', 'A1.1', '1', 4, '0', 146),
(390, 2, 'b', 'b', 'A1.1', '1', 4, '0', 146),
(391, 1, 'b', 'b', 'A2.1', '2', 4, '1', 146),
(720, 1, 'Bài 1.Giới thiệu', NULL, NULL, NULL, 100, '0', 146),
(721, 2, 'Bài 2. Xử lý ảnh', NULL, NULL, NULL, 100, '0', 146),
(722, 3, 'Bài 3. Phát hiện đặc trưng ', NULL, NULL, NULL, 100, '0', 146),
(723, 4, 'Bài 4. Phân đoạn ảnh', NULL, NULL, NULL, 100, '0', 146),
(724, 5, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 100, '0', 146),
(725, 6, 'Bài 5. Cấu trúc chuyển động ', NULL, NULL, NULL, 100, '0', 146),
(726, 7, 'Bài 6. Nhiếp ảnh điện toán ', NULL, NULL, NULL, 100, '0', 146),
(727, 8, 'Bài 7. Nhận dạng', NULL, NULL, NULL, 100, '0', 146),
(728, 9, 'Báo cáo và thuyết trình bài tập nhóm', NULL, NULL, NULL, 100, '0', 146),
(729, 10, 'Thi kết thúc học phần', NULL, NULL, NULL, 100, '0', 146),
(730, 1, 'Giới thiệu học phần. Chương 1. Tổng quan về tương tác người máy', NULL, NULL, NULL, 99, '0', 146),
(731, 2, 'Chương 2. Tâm lý người dùng và giao diện phần mềm. 2.1. Tầm quan trọng của người dung. 2.2. Các thói quen của người dùng', NULL, NULL, NULL, 99, '0', 146),
(732, 3, 'Chương 2. Tâm lý người dùng và giao diện phần mềm. 2.2 Tâm lý người dung. 2.3 Bài tập', NULL, NULL, NULL, 99, '0', 146),
(733, 4, 'Chương 3. Tổ chức nội dung giao diện. 3.1 Kiến trúc thông tin. 3.2 Cấu trúc vật lý', NULL, NULL, NULL, 99, '0', 146),
(734, 5, 'Chương 3. Tổ chức nội dung giao diện. 3.3 Các mẫu thiết kế. 3.4 Bài tập', NULL, NULL, NULL, 99, '0', 146),
(735, 6, 'Chương 4. Định hướng trong giao diện. 4.1 Khái niệm và chi phí định hướng trong giao diện', NULL, NULL, NULL, 99, '0', 146),
(736, 7, 'Chương 4. Định hướng trong giao diện. 4.2 Các mô hình định hướng. 4.3 Bài tập', NULL, NULL, NULL, 99, '0', 146),
(737, 8, 'Chương 5. Bố cục giao diện. 5.1 Khái niệm bố cục giao diện. 5.2 Các thành phần cơ bản', NULL, NULL, NULL, 99, '0', 146),
(738, 9, 'Chương 5. Bố cục giao diện. 5.3 Các mẫu thiết kế. 5.4 Bài tập', NULL, NULL, NULL, 99, '0', 146),
(739, 10, 'Chương 6. Các tác vụ giao diện. 6.1 Khái niệm tác vụ trên giao diện. 6.2 Các mẫu thiết kế.', NULL, NULL, NULL, 99, '0', 146),
(740, 11, 'Chương 6. Các tác vụ giao diện. 6.2 Các mẫu thiết kế. 6.3 Bài tập.', NULL, NULL, NULL, 99, '0', 146),
(741, 12, 'Chương 7. Đồ họa thông tin giao diện. 7.1 Đồ họa thông tin giao diện. 7.2 Vấn đề của đồ họa thông tin giao diện. 7.3 Các mẫu thiết kế', NULL, NULL, NULL, 99, '0', 146),
(742, 13, 'Chương 7. Đồ họa thông tin giao diện. 7.3 Các mẫu thiết kế. 7.4 Bài tập', NULL, NULL, NULL, 99, '0', 146),
(743, 14, 'Chương 8. Giao diện thu thập dữ liệu người dung. 8.1 Quy tắc thiết kế. 8.2 Các mẫu thiết kế.', NULL, NULL, NULL, 99, '0', 146),
(744, 15, 'Chương 8. Giao diện thu thập dữ liệu người dung. 8.2 Các mẫu thiết kế. 8.3 Bài tập. Ôn tập', NULL, NULL, NULL, 99, '0', 146),
(745, 1, 'Chương 1. Tổng quan về phân tích dữ liệu', NULL, NULL, NULL, 97, '0', 146),
(746, 2, 'Chương 2. Ngôn ngữ R', NULL, NULL, NULL, 97, '0', 146),
(747, 3, 'Chương 2. Ngôn ngữ R (tiếp theo)', NULL, NULL, NULL, 97, '0', 146),
(748, 4, 'Chương 3. Phân tích dữ liệu bằng R. 3.1. Phân tích thống kê mô tả', NULL, NULL, NULL, 97, '0', 146),
(749, 5, '3.2. Phân tích hồi quy tuyến tính', NULL, NULL, NULL, 97, '0', 146),
(750, 6, '3.3. Phân tích phương sai', NULL, NULL, NULL, 97, '0', 146),
(751, 7, '3.4. Phân tích hồi qui logistic ', NULL, NULL, NULL, 97, '0', 146),
(752, 8, '3.5. Phân tích dữ liệu Text (Text analysis)', NULL, NULL, NULL, 97, '0', 146),
(753, 1, 'Bài 1. Tổng quan về đồ họa', NULL, NULL, NULL, 108, '0', 146),
(754, 2, 'Bài 2. Lập trình đồ họa với OpenGL', NULL, NULL, NULL, 108, '0', 146),
(755, 3, 'Bài 3. Kỹ thuật đồ họa 2D', NULL, NULL, NULL, 108, '0', 146),
(756, 5, 'Bài 4. Kỹ thuật đồ họa 3D', NULL, NULL, NULL, 108, '0', 146),
(757, 7, 'Bài 5. Biểu diễn đường và mặt cong', NULL, NULL, NULL, 108, '0', 146),
(758, 8, 'Bài 6. Các kỹ thuật nâng cao', NULL, NULL, NULL, 108, '0', 146),
(759, 9, 'Bài 7. Hoạt hình ', NULL, NULL, NULL, 108, '0', 146),
(760, 10, 'Bài 8. Thực tại ảo', NULL, NULL, NULL, 108, '0', 146),
(788, 1, 'Chương 1. Tổng quan về hệ thống nhúng', NULL, NULL, NULL, 101, '0', 146),
(789, 2, 'Chương 2. Các thành phần của hệ thống nhúng', NULL, NULL, NULL, 101, '0', 146),
(790, 3, 'Chương 3. Nền tảng phần cứng thông dụng', NULL, NULL, NULL, 101, '0', 146),
(791, 4, 'Chương 4. Lập trình hệ thống nhúng', NULL, NULL, NULL, 101, '0', 146),
(792, 5, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 101, '0', 146),
(793, 6, 'Chương 5. Hệ điều hành thời gian thực', NULL, NULL, NULL, 101, '0', 146),
(794, 7, 'Chương 6. Lý thuyết thiết kế hệ thống nhúng', NULL, NULL, NULL, 101, '0', 146),
(795, 8, 'Chương 7. Ví dụ về hệ thống nhúng', NULL, NULL, NULL, 101, '0', 146),
(796, 1, 'Chương 1. Các hệ thống số và mã', NULL, NULL, NULL, 34, '0', 146),
(797, 2, 'Chương 2. Đại số Boole và các cổng luận lý', NULL, NULL, NULL, 34, '0', 146),
(798, 3, 'Chương 3. Mạch tổ hợp', NULL, NULL, NULL, 34, '0', 146),
(799, 4, 'Chương 4. Flip-Flop và mạch tuần tự', NULL, NULL, NULL, 34, '0', 146),
(800, 5, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 34, '0', 146),
(801, 6, 'Chương 5. Các phép toán và mạch', NULL, NULL, NULL, 34, '0', 146),
(802, 7, 'Chương 6. Bộ đếm và thanh ghi', NULL, NULL, NULL, 34, '0', 146),
(803, 8, 'Chương 7. Thiết kế mạch tổ hợp sử dụng vi mạch MSI', NULL, NULL, NULL, 34, '0', 146),
(804, 9, 'Ôn tập', NULL, NULL, NULL, 34, '0', 146),
(805, 1, 'PHẦN 1: Tổng quan về thiết kế đồ họa Vector. Bài 1. Tìm hiểu về không gian làm việc', NULL, NULL, NULL, 42, '0', 146),
(806, 2, 'Bài 2. Các công cụ tạo hình cơ bản, phức tạp và phương pháp hiệu chỉnh. Bài 3. Màu sắc trong Illustrator', NULL, NULL, NULL, 42, '0', 146),
(807, 3, 'Bài 4. Công cụ xử lý văn bản', NULL, NULL, NULL, 42, '0', 146),
(808, 4, 'Bài 5. Quản lý đối tượng trong Illustrator ', NULL, NULL, NULL, 42, '0', 146),
(809, 5, 'Bài 6. Cách sử dụng các nét bút', NULL, NULL, NULL, 42, '0', 146),
(810, 6, 'Bài 7. Kết hợp các hình cơ bản - Kỹ thuật tạo mặt nạ cho đối tượng', NULL, NULL, NULL, 42, '0', 146),
(811, 7, 'Bài 8. Hiệu ứng trong Illustrator. Kiểm tra giữa kỳ', NULL, NULL, NULL, 42, '0', 146),
(812, 8, 'PHẦN 2: Tổng quan về thiết kế video. Bài 1. Tổng quan về hình hiệu- motions graphic. Bài 2. Tổng quan phần mềm thiết kế chuyển động hình ảnh và văn bản After effects', NULL, NULL, NULL, 42, '0', 146),
(813, 9, 'Bài 3. Kịch bản (storyboard)', NULL, NULL, NULL, 42, '0', 146),
(814, 10, 'Bài 4. Quản lý- biên tập dữ liệu', NULL, NULL, NULL, 42, '0', 146),
(815, 11, 'Bài 5: Làm việc với hình ảnh và Vector', NULL, NULL, NULL, 42, '0', 146),
(816, 12, 'Bài 6: Tín hiệu văn bản', NULL, NULL, NULL, 42, '0', 146),
(817, 13, 'Bài 7: Kỹ xảo âm thanh', NULL, NULL, NULL, 42, '0', 146),
(818, 14, 'Bài 8: Hiệu ứng nâng cao', NULL, NULL, NULL, 42, '0', 146),
(819, 15, 'Thi cuối kỳ', NULL, NULL, NULL, 42, '0', 146),
(820, 1, 'Giới thiệu học phần.', NULL, NULL, NULL, 35, '0', 146),
(821, 2, 'Chương 1. Mở đầu', NULL, NULL, NULL, 35, '0', 146),
(822, 3, 'Chương 2. Tầng vật lý', NULL, NULL, NULL, 35, '0', 146),
(823, 4, 'Chương 3. Mạng cục bộ LAN', NULL, NULL, NULL, 35, '0', 146),
(824, 5, 'Chương 4. Tầng mạng (Network/ Internet Layer)', NULL, NULL, NULL, 35, '0', 146),
(825, 6, 'Chương 4. Tầng mạng (Network/ internet layer) (tiếp tục)', NULL, NULL, NULL, 35, '0', 146),
(826, 7, 'Bài tập nhóm: Thiết kế cơ sở hạ tầng LAN cơ bản', NULL, NULL, NULL, 35, '0', 146),
(827, 8, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 35, '0', 146),
(828, 9, 'Chương 5. Tầng giao vận', NULL, NULL, NULL, 35, '0', 146),
(829, 10, 'Chương 6. Họ giao thức TCP/IP', NULL, NULL, NULL, 35, '0', 146),
(830, 11, 'Chương 6. Họ giao thức TCP/IP (tiếp tục)', NULL, NULL, NULL, 35, '0', 146),
(831, 12, 'Chương 7. Tầng ứng dụng', NULL, NULL, NULL, 35, '0', 146),
(832, 13, 'Chương 7. Tầng ứng dụng (tiếp tục)', NULL, NULL, NULL, 35, '0', 146),
(833, 14, 'Bài tập nhóm: Triển khai các dịch vụ trên liên mạng', NULL, NULL, NULL, 35, '0', 146),
(834, 15, 'Trình bày bài tập nhóm', NULL, NULL, NULL, 35, '0', 146),
(835, 1, 'Chương 1: CÁC KHÁI NIỆM CƠ BẢN VỀ QUẢN TRỊ MẠNG', NULL, NULL, NULL, 70, '0', 146),
(836, 2, 'Chương 1: CÁC KHÁI NIỆM CƠ BẢN VỀ QUẢN TRỊ MẠNG (tt)', NULL, NULL, NULL, 70, '0', 146),
(837, 3, 'Chương 1: CÁC KHÁI NIỆM CƠ BẢN VỀ QUẢN TRỊ MẠNG (tt)', NULL, NULL, NULL, 70, '0', 146),
(838, 4, 'Chương 1: CÁC KHÁI NIỆM CƠ BẢN VỀ QUẢN TRỊ MẠNG (tt)', NULL, NULL, NULL, 70, '0', 146),
(839, 5, 'Chương 2: QUẢN TRỊ MẠNG VỚI WINDOWS SERVER ', NULL, NULL, NULL, 70, '0', 146),
(840, 6, 'Chương 2: QUẢN TRỊ MẠNG VỚI WINDOWS SERVER (tt)', NULL, NULL, NULL, 70, '0', 146),
(841, 7, 'Chương 2: QUẢN TRỊ MẠNG VỚI WINDOWS SERVER (tt)', NULL, NULL, NULL, 70, '0', 146),
(842, 8, 'Chương 3: MỘT SỐ DỊCH VỤ CƠ BẢN TRÊN SERVER', NULL, NULL, NULL, 70, '0', 146),
(843, 9, 'Chương 3: MỘT SỐ DỊCH VỤ CƠ BẢN TRÊN SERVER (tt)', NULL, NULL, NULL, 70, '0', 146),
(844, 10, 'Chương 3: MỘT SỐ DỊCH VỤ CƠ BẢN TRÊN SERVER (tt)', NULL, NULL, NULL, 70, '0', 146),
(845, 11, 'Chương 3: MỘT SỐ DỊCH VỤ CƠ BẢN TRÊN SERVER (tt)', NULL, NULL, NULL, 70, '0', 146),
(846, 12, 'Chương 4: BỘ ĐỊNH TUYẾN', NULL, NULL, NULL, 70, '0', 146),
(847, 13, 'Chương 5. DỊCH VỤ TRUY CẬP TỪ XA', NULL, NULL, NULL, 70, '0', 146),
(848, 14, 'Chương 5. DỊCH VỤ TRUY CẬP TỪ XA (tt)', NULL, NULL, NULL, 70, '0', 146),
(849, 15, 'Chương 6. BẢO MẬT HỆ THỐNG MẠNG ', NULL, NULL, NULL, 70, '0', 146),
(850, 1, 'Unit 1. Working in the IT industry', NULL, NULL, NULL, 38, '0', 146),
(851, 2, 'Unit 1. Working in the IT industry (continued)', NULL, NULL, NULL, 38, '0', 146),
(852, 3, 'Unit 2. Computer systems  ', NULL, NULL, NULL, 38, '0', 146),
(853, 4, 'Unit 2. Computer systems (continued)', NULL, NULL, NULL, 38, '0', 146),
(854, 5, 'Unit 3. Websites', NULL, NULL, NULL, 38, '0', 146),
(855, 6, 'Unit 3. Websites (continued)', NULL, NULL, NULL, 38, '0', 146),
(856, 7, 'Unit 4. Databases', NULL, NULL, NULL, 38, '0', 146),
(857, 8, 'Unit 4. Databases (continued)', NULL, NULL, NULL, 38, '0', 146),
(858, 9, 'Unit 5. E-commerce', NULL, NULL, NULL, 38, '0', 146),
(859, 10, 'Unit 5. E-commerce (continued)', NULL, NULL, NULL, 38, '0', 146),
(860, 11, 'Unit 6. Network systems', NULL, NULL, NULL, 38, '0', 146),
(861, 12, 'Unit 6. Network systems (continued)', NULL, NULL, NULL, 38, '0', 146),
(862, 13, 'Unit 7. IT support', NULL, NULL, NULL, 38, '0', 146),
(863, 14, 'Unit 7. IT support (continued)', NULL, NULL, NULL, 38, '0', 146),
(864, 15, 'Unit 8. IT Security and safety', NULL, NULL, NULL, 38, '0', 146),
(904, 1, 'Chương 1: Những vấn đề chung về giao tiếp trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(905, 2, 'Phong cách giao tiếp. Một số rào cản trong giao tiếp kinh doanh. Một số nguyên tắc giao tiếp trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(906, 3, 'Chương 2. Ấn tượng ban đầu trong giao tiếp', NULL, NULL, NULL, 25, '0', 146),
(907, 4, 'Quá trình hình thành ấn tượng ban đầu', NULL, NULL, NULL, 25, '0', 146),
(908, 5, 'Chương 3. Các kỹ năng giao tiếp chủ yếu trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(909, 6, 'Kỹ năng giới thiệu và tự giới thiệu', NULL, NULL, NULL, 25, '0', 146),
(910, 7, 'Kỹ năng giao tiếp qua điện thoại', NULL, NULL, NULL, 25, '0', 146),
(911, 8, 'Kỹ năng viết trong kinh doanh. Kiểm tra giữa kỳ', NULL, NULL, NULL, 25, '0', 146),
(912, 9, 'Kỹ năng viết tin. Kỹ năng viết báo cáo', NULL, NULL, NULL, 25, '0', 146),
(913, 10, 'Chương 4. Kỹ năng đàm phán trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(914, 11, 'Quy trình đàm phán trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(915, 12, 'Kỹ năng làm chủ buổi đàm phán', NULL, NULL, NULL, 25, '0', 146),
(916, 13, 'Chương 5. Giao tiếp ứng dụng trong kinh doanh', NULL, NULL, NULL, 25, '0', 146),
(917, 14, 'Kỹ năng giao tiếp trong các bữa tiệc', NULL, NULL, NULL, 25, '0', 146),
(918, 15, 'Kỹ năng đón tiếp và chăm sóc khách hàng trong sự kiện', NULL, NULL, NULL, 25, '0', 146),
(919, 1, 'Giới thiệu tổng quan môn học. Chương 1: Những vấn đề cơ bản về hành vi người tiêu dùng', NULL, NULL, NULL, 107, '0', 146),
(920, 2, 'Chương 2: Các yếu tố tâm lý tác động đến hành vi người tiêu dùng. Động cơ người tiêu dùng', NULL, NULL, NULL, 107, '0', 146),
(921, 3, 'Động cơ, khả năng và cơ hội. ', NULL, NULL, NULL, 107, '0', 146),
(922, 4, 'Nhận thức. Khái niệm về nhận thức. Tiến trình nhận thức', NULL, NULL, NULL, 107, '0', 146),
(923, 5, 'Kiến thức và trí nhớ. ', NULL, NULL, NULL, 107, '0', 146),
(924, 6, 'Thái độ. ', NULL, NULL, NULL, 107, '0', 146),
(925, 7, 'Chương 3: Tiến trình ra quyết định. Các loại tiến trình ra quyết định. Tiến trình ra quyết định', NULL, NULL, NULL, 107, '0', 146),
(926, 8, 'Tìm kiếm thông tin. Tiến trình đánh giá và ra quyết định. Tiến trình sau quyết định', NULL, NULL, NULL, 107, '0', 146),
(927, 9, 'Chương 4: Các yếu tố cá nhân ảnh hưởng đến hành vi người tiêu dùng', NULL, NULL, NULL, 107, '0', 146),
(928, 10, 'Chương 5: Các yếu tố văn hóa, xã hội ảnh hưởng đến hành vi người tiêu dùng', NULL, NULL, NULL, 107, '0', 146),
(929, 11, 'Chương 6: Hành vi người tiêu dùng online', NULL, NULL, NULL, 107, '0', 146),
(930, 1, 'Chương 1. Tổng quan về kinh tế học. 1.1 Định nghĩa. 1.2 Các mô hình kinh tế', NULL, NULL, NULL, 94, '0', 146),
(931, 2, 'Chương 1. Tổng quan về kinh tế học. 1.3 Lý thuyết lựa chọn kinh tế. 1.4 Đường giới hạn khả năng sản xuất (PPF)', NULL, NULL, NULL, 94, '0', 146),
(932, 3, 'Chương 2: Cung, cầu và độ co giãn. 2.1 Cầu. 2.2 Cung', NULL, NULL, NULL, 94, '0', 146),
(933, 4, 'Chương 2: Cung, cầu và độ co giãn. 2.3 Cân bằng thị trường. 2.4 Sự can thiệp của Chính phủ vào thị trường', NULL, NULL, NULL, 94, '0', 146),
(934, 5, 'Chương 2: Cung, cầu và độ co giãn. 2.5 Độ co giãn', NULL, NULL, NULL, 94, '0', 146),
(935, 6, 'Bài tập Chương 2', NULL, NULL, NULL, 94, '0', 146),
(936, 7, 'Chương 3: Lý thuyết hành vi người tiêu dung. 3.1 Lý thuyết hữu ích. 3.2 Lý thuyết đẳng ích', NULL, NULL, NULL, 94, '0', 146),
(937, 8, 'Chương 3: Lý thuyết hành vi người tiêu dung. 3.3 Đường ngân sách. 3.4 Sự lựa chọn tối ưu của người tiêu dung', NULL, NULL, NULL, 94, '0', 146),
(938, 9, 'Bài tập Chương 3', NULL, NULL, NULL, 94, '0', 146),
(939, 10, 'Thi giữa kỳ', NULL, NULL, NULL, 94, '0', 146),
(940, 11, 'Chương 4: Lý thuyết hành vi người sản xuất. 4.1 Lý thuyết sản xuất', NULL, NULL, NULL, 94, '0', 146),
(941, 12, 'Chương 4: Lý thuyết hành vi người sản xuất. 4.2 Lý thuyết chi phí. 4.3 Quyết định sản xuất trong ngắn hạn', NULL, NULL, NULL, 94, '0', 146),
(942, 13, 'Bài tập Chương 4', NULL, NULL, NULL, 94, '0', 146),
(943, 14, 'Chương 5: Cạnh tranh và độc quyền. 5.1 Thị trường cạnh tranh hoàn hảo. 5.2 Thị trường độc quyền', NULL, NULL, NULL, 94, '0', 146),
(944, 15, 'Bài tập Chương 5', NULL, NULL, NULL, 94, '0', 146),
(945, 1, 'Chapter 1. The foundation of Business', NULL, NULL, NULL, 2, '0', 146),
(946, 2, 'Chapter 1. The foundation of Business (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(947, 3, 'Chapter 2. Business Ethics and Social Responsibility', NULL, NULL, NULL, 2, '0', 146),
(948, 4, 'Chapter 2. Business Ethics and Social Responsibility (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(949, 5, 'Chapter 3. Business in a Global Environment', NULL, NULL, NULL, 2, '0', 146),
(950, 6, 'Chapter 3. Business in a Global Environment (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(951, 7, 'Mid-term Test', NULL, NULL, NULL, 2, '0', 146),
(952, 8, 'Chapter 4: The Challenges of Starting a Business', NULL, NULL, NULL, 2, '0', 146),
(953, 9, 'Chapter 4: The Challenges of Starting a Business (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(954, 10, 'Chapter 5 Selecting a form of Business Ownership', NULL, NULL, NULL, 2, '0', 146),
(955, 11, 'Chapter 6 Managing for Business Success ', NULL, NULL, NULL, 2, '0', 146),
(956, 12, 'Chapter 7 Product Design and Development', NULL, NULL, NULL, 2, '0', 146),
(957, 13, 'Chapter 7 Product Design and Development (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(958, 14, 'Chapter 8 Managing Information and Technology', NULL, NULL, NULL, 2, '0', 146),
(959, 15, 'Chapter 8 Managing Information and Technology (cont’d)', NULL, NULL, NULL, 2, '0', 146),
(960, 1, 'Unit 1 – Management', NULL, NULL, NULL, 109, '0', 146),
(961, 2, 'Unit 1 – Management (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(962, 3, 'Unit 2 – Company Structure', NULL, NULL, NULL, 109, '0', 146),
(963, 4, 'Unit 2 – Company Structure (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(964, 5, 'Unit 3 – Work and motivation ', NULL, NULL, NULL, 109, '0', 146),
(965, 6, 'Unit 3 – Work and motivation (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(966, 7, 'Unit 4 – Recruitment ', NULL, NULL, NULL, 109, '0', 146),
(967, 8, 'Unit 4 – Recruitment (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(968, 9, 'Unit 5 – Managing across cultures ', NULL, NULL, NULL, 109, '0', 146),
(969, 10, 'Unit 5 – Managing across cultures (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(970, 11, 'Unit 6 – Women in business', NULL, NULL, NULL, 109, '0', 146),
(971, 12, 'Unit 6 – Women in business (Con’t)', NULL, NULL, NULL, 109, '0', 146),
(972, 1, 'Chương 1. Tổng quan về máy tính', NULL, NULL, NULL, 14, '0', 146),
(973, 2, 'Chương 2. Hệ điều hành Windows', NULL, NULL, NULL, 14, '0', 146),
(974, 3, 'Chương 3. Mạng máy tính và internet', NULL, NULL, NULL, 14, '0', 146),
(975, 4, 'Chương 4. Sử dụng Microsoft Word', NULL, NULL, NULL, 14, '0', 146),
(976, 5, 'Chương 4. Sử dụng Microsoft Word (tt)', NULL, NULL, NULL, 14, '0', 146),
(977, 6, 'Chương 4. Sử dụng Microsoft Word (tt)', NULL, NULL, NULL, 14, '0', 146),
(978, 7, 'Chương 4. Sử dụng Microsoft Word (tt)', NULL, NULL, NULL, 14, '0', 146),
(979, 8, 'Chương 4. Sử dụng Microsoft Word (tt)', NULL, NULL, NULL, 14, '0', 146),
(980, 9, 'Chương 5. Sử dụng Microsoft PowerPoint', NULL, NULL, NULL, 14, '0', 146),
(981, 10, 'Chương 6. Sử dụng Microsoft Excel', NULL, NULL, NULL, 14, '0', 146),
(982, 11, 'Chương 6. Sử dụng Microsoft Excel (tt)', NULL, NULL, NULL, 14, '0', 146),
(983, 12, 'Chương 6. Sử dụng Microsoft Excel (tt) ', NULL, NULL, NULL, 14, '0', 146),
(984, 13, 'Chương 6. Sử dụng Microsoft Excel (tt)', NULL, NULL, NULL, 14, '0', 146),
(985, 14, 'Chương 6. Sử dụng Microsoft Excel (tt) ', NULL, NULL, NULL, 14, '0', 146),
(986, 15, 'Ôn tập', NULL, NULL, NULL, 14, '0', 146),
(1000, 1, 'Bài 1. Tổng quan về quản lý dự án phần mềm', NULL, NULL, NULL, 69, '0', 146),
(1001, 2, 'Bài 2. Các Khái niệm, Thuật ngữ và Định nghĩa', NULL, NULL, NULL, 69, '0', 146),
(1002, 3, 'Bài 3. Người quản lý dự án', NULL, NULL, NULL, 69, '0', 146),
(1003, 4, 'Bài 4. Xem xét dự án như một bức tranh tổng thể', NULL, NULL, NULL, 69, '0', 146),
(1004, 5, 'Bài 5. Quy trình phát triển phần mềm', NULL, NULL, NULL, 69, '0', 146),
(1005, 6, 'Bài 6. Ước lượng phần mềm', NULL, NULL, NULL, 69, '0', 146),
(1006, 7, 'Bài 7. Các kỹ thuật ước lượng dự án ( 4 giờ)', NULL, NULL, NULL, 69, '0', 146),
(1007, 8, 'Thi giữa kỳ', NULL, NULL, NULL, 69, '0', 146),
(1008, 9, 'Bài 10: Tạo lịch trình và chi phí', NULL, NULL, NULL, 69, '0', 146),
(1009, 10, 'Bài 11. Quản lý thay đổi', NULL, NULL, NULL, 69, '0', 146),
(1010, 11, 'Bài 12. Quản lý rủi ro', NULL, NULL, NULL, 69, '0', 146),
(1011, 12, 'Bài 13. Đo lường phần mềm (4 giờ)', NULL, NULL, NULL, 69, '0', 146),
(1012, 13, 'Bài 14: Quản lý con người', NULL, NULL, NULL, 69, '0', 146),
(1013, 14, 'Bài 15. Giám sát và báo cáo dự án', NULL, NULL, NULL, 69, '0', 146),
(1037, 1, 'CHƯƠNG 1: TỔNG QUAN VỀ HÀNH VI TỔ CHỨC', NULL, NULL, NULL, 41, '0', 146),
(1038, 2, 'CHƯƠNG 2: CƠ SỞ CỦA HÀNH VI CÁ NHÂN', NULL, NULL, NULL, 41, '0', 146),
(1039, 3, 'CHƯƠNG 3. TẠO ĐỘNG LỰC CHO CÁ NHÂN TRONG TỔ CHỨC', NULL, NULL, NULL, 41, '0', 146),
(1040, 4, 'CHƯƠNG 4: CƠ SỞ HÀNH VI NHÓM', NULL, NULL, NULL, 41, '0', 146),
(1041, 5, 'CHƯƠNG 5: GIAO TIẾP TRONG NHÓM', NULL, NULL, NULL, 41, '0', 146),
(1042, 6, 'CHƯƠNG 6: LÃNH ĐẠO, QUYỀN LỰC VÀ CƠ CẤU TỔ CHỨC TRONG DOANH NGHIỆP', NULL, NULL, NULL, 41, '0', 146),
(1043, 7, 'CHƯƠNG 7: VĂN HÓA TỔ CHỨC, SỰ ĐỔI MỚI VÀ PHÁT TRIỂN', NULL, NULL, NULL, 41, '0', 146),
(1044, 1, 'CHƯƠNG 1: TỔNG QUAN VỀ TMĐT', NULL, NULL, NULL, 44, '0', 146),
(1045, 2, 'CHƯƠNG 1: TỔNG QUAN VỀ TMĐT (tt)', NULL, NULL, NULL, 44, '0', 146),
(1046, 3, 'CHƯƠNG 1: TỔNG QUAN VỀ TMĐT (tt)', NULL, NULL, NULL, 44, '0', 146),
(1047, 4, 'CHƯƠNG 2: CƠ SỞ HẠ TẦNG TRONG THƯƠNG MẠI ĐIỆN TỬ', NULL, NULL, NULL, 44, '0', 146),
(1048, 5, 'CHƯƠNG 2: CƠ SỞ HẠ TẦNG TRONG THƯƠNG MẠI ĐIỆN TỬ (tt)', NULL, NULL, NULL, 44, '0', 146),
(1049, 6, 'CHƯƠNG 2: CƠ SỞ HẠ TẦNG TRONG THƯƠNG MẠI ĐIỆN TỬ (tt)', NULL, NULL, NULL, 44, '0', 146),
(1050, 7, 'CHƯƠNG 3: CÁC MÔ HÌNH GIAO DỊCH THƯƠNG MẠI ĐIỆN TỬ', NULL, NULL, NULL, 44, '0', 146),
(1051, 8, 'CHƯƠNG 3: CÁC MÔ HÌNH GIAO DỊCH THƯƠNG MẠI ĐIỆN TỬ (tt)', NULL, NULL, NULL, 44, '0', 146),
(1052, 9, 'CHƯƠNG 4: THANH TOÁN TRONG TMĐT ', NULL, NULL, NULL, 44, '0', 146),
(1053, 10, 'CHƯƠNG 4: THANH TOÁN TRONG TMĐT (tt)', NULL, NULL, NULL, 44, '0', 146),
(1054, 11, 'CHƯƠNG 5: MARKETING TRONG TMĐT', NULL, NULL, NULL, 44, '0', 146),
(1055, 12, 'CHƯƠNG 6: MARKETING TRONG TMĐT (tt)', NULL, NULL, NULL, 44, '0', 146),
(1056, 13, 'CHƯƠNG 7: MARKETING ĐIỆN TỬ', NULL, NULL, NULL, 44, '0', 146),
(1057, 14, 'CHƯƠNG 8: AN NINH TRONG TMĐT', NULL, NULL, NULL, 44, '0', 146),
(1058, 15, 'CHƯƠNG 8: AN NINH TRONG TMĐT (tt)', NULL, NULL, NULL, 44, '0', 146),
(1059, 1, 'CHƯƠNG 1: KHÁI QUÁT VỀ QUẢN TRỊ NGUỒN NHÂN LỰC', NULL, NULL, NULL, 45, '0', 146),
(1060, 2, 'CHƯƠNG 2: PHÂN TÍCH VÀ THIẾT KẾ CÔNG VIỆC', NULL, NULL, NULL, 45, '0', 146),
(1061, 3, 'CHƯƠNG 3: KẾ HOẠCH HOÁ NGUỒN NHÂN LỰC', NULL, NULL, NULL, 45, '0', 146),
(1062, 4, 'CHƯƠNG 4: THU HÚT VÀ TUYỂN DỤNG NHÂN LỰC', NULL, NULL, NULL, 45, '0', 146),
(1063, 5, 'CHƯƠNG 5: ĐÀO TẠO VÀ PHÁT TRIỂN NGUỒN NHÂN LỰC', NULL, NULL, NULL, 45, '0', 146),
(1064, 6, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 45, '0', 146),
(1065, 7, 'CHƯƠNG 6: TẠO ĐỘNG LỰC LÀM VIỆC CHO NGƯỜI LAO ĐỘNG', NULL, NULL, NULL, 45, '0', 146),
(1066, 8, 'CHƯƠNG 7: ĐÁNH GIÁ & TRẢ CÔNG LAO ĐỘNG', NULL, NULL, NULL, 45, '0', 146),
(1067, 9, 'CHƯƠNG 8: AN TOÀN LAO ĐỘNG', NULL, NULL, NULL, 45, '0', 146),
(1068, 10, 'Ôn tập', NULL, NULL, NULL, 45, '0', 146),
(1077, 6, 'Bài 4. Kỹ thuật đồ họa 3D (tt)', NULL, NULL, NULL, 108, '0', 146),
(1078, 4, 'Bài 3. Kỹ thuật đồ họa 2D (tt)', NULL, NULL, NULL, 108, '0', 146),
(1109, 1, 'CHƯƠNG 1: TRIẾT HỌC VÀ VAI TRÒ CỦA TRIẾT HỌC TRONG ĐỜI SỐNG XÃ HỘI', NULL, NULL, NULL, 81, '0', 146),
(1110, 2, '1.1. Triết học và vấn đề cơ bản của triết học._1.2. Triết học Mác - Lênin và vai trò của triết học Mác – Lênin trong đời sống xã hội', NULL, NULL, NULL, 81, '0', 146),
(1111, 3, 'Vai trò của triết học Mác - Lênin trong đời sống xã hội và trong sự nghiệp đổi mới ở Việt Nam hiện nay', NULL, NULL, NULL, 81, '0', 146),
(1112, 4, 'CHƯƠNG 2: CHỦ NGHĨA DUY VẬT BIỆN CHỨNG._2.1. Vật chất và ý thức', NULL, NULL, NULL, 81, '0', 146),
(1113, 5, '2.1. Vật chất và ý thức (tt)', NULL, NULL, NULL, 81, '0', 146),
(1114, 6, '2.2. Phép biện chứng duy vật', NULL, NULL, NULL, 81, '0', 146),
(1115, 7, 'Nội dung của phép biện chứng duy vật', NULL, NULL, NULL, 81, '0', 146),
(1116, 8, '2.3. Lý luận nhận thức', NULL, NULL, NULL, 81, '0', 146),
(1117, 9, 'Bài KT giữa kỳ', NULL, NULL, NULL, 81, '0', 146),
(1118, 10, 'CHƯƠNG 3: CHỦ NGHĨA DUY VẬT LỊCH SỬ', NULL, NULL, NULL, 81, '0', 146),
(1119, 11, '3.1. Học thuyết hình thái kinh tế - xã hội', NULL, NULL, NULL, 81, '0', 146),
(1120, 12, '3.2. Giai cấp và dân tộc', NULL, NULL, NULL, 81, '0', 146),
(1121, 13, '3.3. Nhà nước và cách mạng xã hội', NULL, NULL, NULL, 81, '0', 146),
(1122, 14, '3.4. Ý thức xã hội', NULL, NULL, NULL, 81, '0', 146),
(1123, 15, '3.5. Triết học về con người', NULL, NULL, NULL, 81, '0', 146),
(1124, 1, 'CHƯƠNG 1: ĐỔI TƯỢNG, PHƯƠNG PHÁP NGHIÊN CỨU VÀ CHỨC NĂNG CỦA KINH TỂ CHÍNH TRỊ MÁC – LÊNIN.', NULL, NULL, NULL, 105, '0', 146),
(1125, 2, 'CHƯƠNG 2: HÀNG HÓA, THỊ TRƯỜNG VÀ VAI TRÒ CỦA CÁC CHỦ THỂTHAM GIA THỊ TRƯỜNG._2.1. Lý luận của C. Mác về sản xuất hàng hóa và hàng hóa', NULL, NULL, NULL, 105, '0', 146),
(1126, 3, '2.2. Thị trường và vai trò của các chủ thể tham gia thị trường', NULL, NULL, NULL, 105, '0', 146),
(1127, 4, '2.3. Vai trò của một số chủ thể tham gia thị trường._CHƯƠNG 3: GIÁ TRỊ THẶNG DƯ TRONG NỀN KINH TẾ THỊ TRƯỜNG._3.1. Lý luận của C.Mác về giá trị thặng dư.', NULL, NULL, NULL, 105, '0', 146),
(1128, 5, '3.2. Tích lũy tư bản', NULL, NULL, NULL, 105, '0', 146),
(1129, 6, '3.3. Các hình thức biểu hiện của giá trị thặng dư trong nền kinh tế thị trường', NULL, NULL, NULL, 105, '0', 146),
(1130, 7, 'CHƯƠNG 4: CẠNH TRANH VÀ ĐỘC QUYỀNTRONG NỀN KINH TẾ THỊ TRƯỜNG._4.1. Cạnh tranh ở cấp độ độc quyền trong nền kinh tê thị trường', NULL, NULL, NULL, 105, '0', 146),
(1131, 8, '4.2. Lý luận của V.I.Lênin về đặc điểm kinh tế của độc quyền và độc quyền nhà nước trong nền kinh tế thị trường tư bản chủ nghĩa', NULL, NULL, NULL, 105, '0', 146),
(1132, 9, '4.3. Biểu hiện mới của độc quyền, độc quyền nhà nước trong điều kiện ngày nay; vai trò lịch sử của chủ nghĩa tư bản', NULL, NULL, NULL, 105, '0', 146),
(1133, 10, 'CHƯƠNG 5: KINH TẾ THỊ TRƯỜNG ĐỊNH HƯỚNG XÃ HỘI CHỦ NGHĨA VÀ CÁC QUAN HỆ LỢI ÍCH KINH TẾ Ở VIỆT NAM._5.1. Kinh tế thị trường định hướng xã hội chủ nghĩa ở Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1134, 11, '5.2. Hoàn thiện thế chế kinh tế thị trường định hướng xã hội chủ nghĩa ở Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1135, 12, '5.3. Các quan hệ lợi ích kinh tế ở Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1136, 13, 'CHƯƠNG 6: CÔNG NGHIỆP HÓA, HIỆN ĐẠI HÓA VÀ HỘI NHẬP KINH TẾ QUỐC TẾ CỦA VIỆT NAM._6.1. Công nghiệp hóa, hiện đại hóa ở Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1137, 14, '6.2. Hội nhập kinh tế quốc tế của Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1138, 15, 'Tác động của hội nhập kinh tế quốc tế đến phát triển của Việt Nam. Phương hướng nâng cao hiệu quả hội nhập kinh tế quốc tế trong phát triển của Việt Nam', NULL, NULL, NULL, 105, '0', 146),
(1139, 1, 'CHƯƠNG 1: KHÁI NIỆM, ĐỐI TƯỢNG, PHƯƠNG PHÁP NGHIÊN CỨU VÀ Ý NGHĨA HỌC TẬP MÔN TƯ TƯỞNG HỒ CHÍ MINH._CHƯƠNG 2: CƠ SỞ, QUÁ TRÌNH HÌNH THÀNH VÀ PHÁT TRIỂN TƯ TƯỞNG HỒ CHÍ MINH._2.1. Cơ sở hình thành Tư tưởng Hồ Chí Minh', NULL, NULL, NULL, 96, '0', 146),
(1140, 2, '2.2. Quá trình hình thành và phát triển Tư tưởng Hồ Chí Minh', NULL, NULL, NULL, 96, '0', 146),
(1141, 3, '2.3. Giá trị của Tư tưởng Hồ Chí Minh', NULL, NULL, NULL, 96, '0', 146),
(1142, 4, 'CHƯƠNG 3: TƯ TƯỞNG HỒ CHÍ MINH VỀ ĐỘC LẬP DÂN TỘC VÀ CHỦ NGHĨA XÃ HỘI._3.1. Tư tưởng Hồ Chí Minh về độc lập dân tộc._3.2. Tư tưởng Hồ Chí Minh về chủ nghĩa xã hội và xây dựng chủ nghĩa xã hội ở Việt Nam.', NULL, NULL, NULL, 96, '0', 146),
(1143, 5, '3.3. Tư tưởng Hồ Chí Minh về mối quan hệ giữa độc lập dân tộc và chủ nghĩa xã hội', NULL, NULL, NULL, 96, '0', 146),
(1144, 6, '3.4. Vận dụng Tư tưởng Hồ Chí Minh về độc lập dân tộc gắn liền với chủ nghĩa xã hội trong sự nghiệp cách mạng Việt Nam giai đoạn hiện nay.', NULL, NULL, NULL, 96, '0', 146),
(1145, 7, 'CHƯƠNG 4: TƯTƯỞNG HỒ CHÍ MINH VỀ ĐẢNG CỘNG SẢN VIỆT NAM VÀ NHÀ NƯỚC CỦA NHÂN DÂN,DO NHÂN DÂN, VÌ NHÂN DÂN._4.1. Tư tưởng Hồ Chí Minh về Đảng Cộng sản Việt Nam', NULL, NULL, NULL, 96, '0', 146),
(1146, 8, '4.2. Tư tưởng Hồ Chí Minh về Nhà nước Việt Nam._4.3. Vận dụng Tư tưởng Hồ Chí Minh vào công tác xây dựng Đảng và xây dựng nhà nước', NULL, NULL, NULL, 96, '0', 146),
(1147, 9, 'CHƯƠNG 5: TƯ TƯỞNG HỒ CHÍ MINH VỀ ĐẠI ĐOÀN KẾT DÂN TỘC VÀ ĐOÀN KẾT QUỐC TẾ._5.1. Tư tưởng Hồ Chí Minh về đại đoàn kết toàn dân tộc.', NULL, NULL, NULL, 96, '0', 146),
(1148, 10, '5.2. Tư tưởng Hồ Chí Minh về đoàn kết quốc tế', NULL, NULL, NULL, 96, '0', 146),
(1149, 11, '5.3. Vận dụng Tư tưởng Hồ Chí Minh về đại đoàn kết toàn dân tộc và đoàn kết quốc tế trong giai đoạn hiện nay', NULL, NULL, NULL, 96, '0', 146),
(1150, 12, 'CHƯƠNG 6: TƯ TƯỞNG HỒ CHÍ MINH VỀ VĂN HOÁ, ĐẠO ĐỨC, CON NGƯỜI._6.1.Tư tưởng Hồ Chí Minh về văn hoá.', NULL, NULL, NULL, 96, '0', 146),
(1151, 13, '6.2. Tư tưởng Hồ Chí Minh về đạo đức', NULL, NULL, NULL, 96, '0', 146),
(1152, 14, '6.3. Tư tưởng Hồ Chí Minh về con người', NULL, NULL, NULL, 96, '0', 146),
(1153, 15, '6.4. Xây dựng văn hóa, đạo đức, con người Việt Nam hiện nay theo Tư tưởng Hồ Chí Minh', NULL, NULL, NULL, 96, '0', 146),
(1154, 1, 'CHƯƠNG 1. NHẬP MÔN CHỦ NGHĨA XÃ HỘI KHOA HỌC', NULL, NULL, NULL, 106, '0', 146),
(1155, 2, 'CHƯƠNG 2. SỨ MỆNH LỊCH SỬ CỦA GIAI CẤP CÔNG NHÂN._2.1. Quan điểm cơ bản của chủ nghĩa Mác - Lênin về giai cấp công nhân và sứ mệnh lịch sử thế giới của giai cấp công nhân', NULL, NULL, NULL, 106, '0', 146),
(1156, 3, '2.2. Giai cấp công nhân và thực hiện sứ mệnh lịch sử của giai cấp công nhân hiện nay._2.3. Sứ mệnh lịch sử của giai cấp công nhân Việt Nam', NULL, NULL, NULL, 106, '0', 146),
(1157, 4, 'CHƯƠNG 3. CHỦ NGHĨA XÃ HỘI VÀ THỜI KỲ QUÁ ĐỘ LÊN CHỦ NGHĨA XÃ HỘI. 3.1. Chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1158, 5, '3.2. Thời kỳ quá độ lên chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1159, 6, '3.3. Quá độ lên chủ nghĩa xã hội ở Việt Nam', NULL, NULL, NULL, 106, '0', 146),
(1160, 7, 'CHƯƠNG 4. DÂN CHỦ XÃ HỘI CHỦ NGHĨA VÀ NHÀ NƯỚC XÃ HỘI CHỦ NGHĨA._4.1. Dân chủ và dân chủ xã hội chủ nghĩa._4.2. Nhà nước xã hội chủ nghĩa', NULL, NULL, NULL, 106, '0', 146),
(1161, 8, '4.3. Dân chủ xã hội chủ nghĩa và xây dựng nhà nước pháp quyền xã hội chủ nghĩa ở Việt Nam', NULL, NULL, NULL, 106, '0', 146),
(1162, 9, 'CHƯƠNG 5. CƠ CẤU XÃ HỘI – GIAI CẤP VÀ LIÊN MINH GIAI CẤP, TẦNG LỚP TRONG THỜI KỲ QUÁ ĐỘ LÊN CHỦ NGHĨA XÃ HỘI._5.1. Cơ cấu xã hội - giai cấp trong thời kỳ quá độ lên chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1163, 10, '5.2. Liên minh giai cấp, tầng lớp trong thời kỳ quá độ lên chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1164, 11, '5.3. Cơ cấu xã hội - giai cấp và liên minh giai cấp, tầng lớp trong thời kỳ quá độ lên chủ nghĩa xã hội ở Việt Nam', NULL, NULL, NULL, 106, '0', 146),
(1165, 12, 'CHƯƠNG 6. VẤN ĐỀ DÂN TỘC VÀ TÔN GIÁO TRONG THỜI KỲ QUÁ ĐỘ LÊN CHỦ NGHĨA XÃ HỘI._6.1. Dân tộc trong thời kỳ quá độ lên chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1166, 13, '6.2. Tôn giáo trong thời kỳ quá độ lên CNXH', NULL, NULL, NULL, 106, '0', 146),
(1167, 14, '6.3. Quan hệ giữa dân tộc và tôn giáo ở Việt Nam._CHƯƠNG 7.  VẤN ĐỀ GIA ĐÌNH TRONG THỜI KỲ QUÁ ĐỘ LÊN CHỦ NGHĨA XÃ HỘI._7.1. Khái niệm, vị trí và chức năng của gia đình', NULL, NULL, NULL, 106, '0', 146),
(1168, 15, '7.2. Cơ sở xây dựng gia đình trong thời kỳ quá độ lên chủ nghĩa xã hội._7.3. Xây dựng gia đình Việt Nam trong thời kỳ quá độ lên chủ nghĩa xã hội', NULL, NULL, NULL, 106, '0', 146),
(1169, 1, 'CHƯƠNG 1: ĐẢNG CỘNG SẢN VIỆT NAM RA ĐỜI VÀ LÃNH ĐẠO ĐẤU TRANH GIÀNH CHÍNH QUYỀN (1930 - 1945).', NULL, NULL, NULL, 79, '0', 146),
(1170, 2, '1.1. Đảng Cộng sản Việt Nam ra đời và Cương lĩnh chính trị đầu tiên của Đảng Hội nghị thành lập Đảng Công sản Việt Nam và Cương lĩnh chính trị đầu tiên của Đảng. Ý nghĩa lịch sử của việc thành Đảng Cộng sản Việt Nam', NULL, NULL, NULL, 79, '0', 146),
(1171, 3, 'Hội nghị thành lập Đảng Công sản Việt Nam và Cương lĩnh chính trị đầu tiên của Đảng. Ý nghĩa lịch sử của việc thành Đảng Cộng sản Việt Nam', NULL, NULL, NULL, 79, '0', 146),
(1172, 4, '1.2. Lãnh đạo đấu tranh giành chính quyền (1930–1945)', NULL, NULL, NULL, 79, '0', 146),
(1173, 5, 'Phong trào dân chủ 1936-1939', NULL, NULL, NULL, 79, '0', 146),
(1174, 6, 'Phong trào giải phóng dân tộc 1939-1945', NULL, NULL, NULL, 79, '0', 146),
(1175, 7, 'Tính chất, ý nghĩa và kinh nghiệm của Cách mạng Tháng Tám năm 1945', NULL, NULL, NULL, 79, '0', 146),
(1176, 8, 'CHƯƠNG 2: ĐẢNG LÃNH ĐẠO HAI CUỘC KHÁNG CHIẾN HOÀN THÀNH GIẢI PHÓNG DÂN TỘC, THỐNG NHẤT ĐẤT NƯỚC, (1945 – 1975)._2.1. Lãnh đạo xây dựng, bảo vệ chính quyền cách mạng và kháng chiến chống thực dân Pháp xâm lược (1945-1954)', NULL, NULL, NULL, 79, '0', 146),
(1177, 9, '2.1.2. Đường lối kháng chiến toàn quốc chống thực dân Pháp xâm lược và quá trình tổ chức thực hiện từ năm 1946 đến năm 1950', NULL, NULL, NULL, 79, '0', 146),
(1178, 10, '2.1.3. Đẩy mạnh cuộc kháng chiến chống thực dân Pháp xâm lược và can thiệp Mỹ  đến thắng lợi từ  năm 1951 đến 1954', NULL, NULL, NULL, 79, '0', 146),
(1179, 11, '2.1.4. Ý nghĩa lịch sử và kinh nghiệm lãnh đạo của Đảng trong kháng chiến chống Pháp và can thiệp Mỹ', NULL, NULL, NULL, 79, '0', 146),
(1180, 12, '2.2. Lãnh đạo xây dựng chủ nghĩa xã hội ở miền Bắc và kháng chiến chống đế quốc Mỹ xâm lược, giải phóng miền Nam, thống nhất đất nước (1954-1975)._2.2.1. Lãnh đạo cách mạng hai miền giai đoạn 1954 - 1965', NULL, NULL, NULL, 79, '0', 146),
(1181, 13, '2.2.2. Lãnh đạo cách mạng cả nước giai đoạn 1965 - 1975._2.2.3. Ý nghĩa và kinh nghiệm lãnh đạo của Đảng thời kỳ 1954-1975', NULL, NULL, NULL, 79, '0', 146),
(1182, 14, 'CHƯƠNG 3:  ĐẢNG LÃNH ĐẠO CẢ NƯỚC QUÁ ĐỘ LÊN CNXH VÀ TIẾN HÀNH CÔNG CUỘC ĐỔI MỚI(1975 - 2018)._3.1. Lãnh đạo xây dựng chủ nghĩa xã hội và bảo vệ Tổ quốc (1975-1986)', NULL, NULL, NULL, 79, '0', 146),
(1183, 15, '3.2. Lãnh đạo công cuộc đổi mới, đẩy mạnh công nghiệp hóa, hiện đại hóa và hội nhập quốc tế (1986-2018)', NULL, NULL, NULL, 79, '0', 146),
(1184, 16, 'Tiếp tục công cuộc đổi mới, đẩy mạnh công nghiệp hóa, hiện đại hóa và hội nhập quốc tế (1996-2018). Thành tựu, kinh nghiệm của công cuộc đổi mới', NULL, NULL, NULL, 79, '0', 146),
(1200, 1, 'UNIT 9: JOURNEYS._9.1. Vocabulary and listening: Transport', NULL, NULL, NULL, 22, '0', 146),
(1201, 2, '9.2. Grammar: Present perfect: Affirmative', NULL, NULL, NULL, 22, '0', 146),
(1202, 3, '9.3.Culture: People on the move', NULL, NULL, NULL, 22, '0', 146),
(1203, 4, '9.4. Grammar: Present perfect: negative and interrogative', NULL, NULL, NULL, 22, '0', 146),
(1204, 5, '9.5. Reading: Alone on the water._9.6. Everyday English: Buying a train ticket', NULL, NULL, NULL, 22, '0', 146),
(1205, 6, '9.7. Writing: An e-mail. * Practice test', NULL, NULL, NULL, 22, '0', 146),
(1206, 7, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 22, '0', 146),
(1207, 8, 'Unit 10: JUST THE JOB_10.1.Vocabulary and listening: Jobs and work', NULL, NULL, NULL, 22, '0', 146),
(1208, 9, '10.2.Gramm ar: going to', NULL, NULL, NULL, 22, '0', 146),
(1209, 10, '10.3. Culture: Jobs for teenagers', NULL, NULL, NULL, 22, '0', 146),
(1210, 11, '10.4. Grammar: Will', NULL, NULL, NULL, 22, '0', 146),
(1211, 12, '10.5. Reading : A year abroad', NULL, NULL, NULL, 22, '0', 146),
(1212, 13, '10.6. Everyday English: Giving advice', NULL, NULL, NULL, 22, '0', 146),
(1213, 14, '10.7. Writing: An application letter.', NULL, NULL, NULL, 22, '0', 146),
(1214, 15, 'Revision', NULL, NULL, NULL, 22, '0', 146),
(1215, 1, 'UNIT 1. THE REAL YOU', NULL, NULL, NULL, 37, '0', 146),
(1216, 2, '1.1.Vocabulary and Listening: Personalities', NULL, NULL, NULL, 37, '0', 146),
(1217, 3, '1.2.Grammar: Present simple and continuous', NULL, NULL, NULL, 37, '0', 146),
(1218, 4, '1.3.Culture: Free time', NULL, NULL, NULL, 37, '0', 146),
(1219, 5, '1.4. Grammar: Verb patterns', NULL, NULL, NULL, 37, '0', 146),
(1220, 6, '1.5. Reading: Appearances', NULL, NULL, NULL, 37, '0', 146),
(1221, 7, '1.6. Everyday English: Giving opinions', NULL, NULL, NULL, 37, '0', 146),
(1222, 8, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 37, '0', 146),
(1223, 9, '1.7. Writing: A personal profile * Practice test', NULL, NULL, NULL, 37, '0', 146),
(1224, 10, 'UNIT 2: WINNING AND LOSING._2.1. Vocabulary and Listening: A question of Sports', NULL, NULL, NULL, 37, '0', 146),
(1225, 11, '2.2. Grammar: Past simple._2.3. Culture: On the river', NULL, NULL, NULL, 37, '0', 146),
(1226, 12, '2.4. Grammar: Past Continuous._2.5.Reading: Surf’s up', NULL, NULL, NULL, 37, '0', 146),
(1227, 13, '2.6.Everyday English: Talking about the past', NULL, NULL, NULL, 37, '0', 146),
(1228, 14, '2.7. Writing: A magazine article', NULL, NULL, NULL, 37, '0', 146);
INSERT INTO `table_kehoachgiangday` (`id`, `buoi`, `noidung`, `hoatdongdayhoc`, `baidanhgia`, `cdrhocphan`, `id_hocphan`, `thuochocphan`, `khungchuongtrinh`) VALUES
(1229, 15, 'Revision', NULL, NULL, NULL, 37, '0', 146),
(1230, 1, 'Chương 1.  TẬP HỢP - ÁNH XẠ VÀ   SỐ PHỨC._1.1. Tập hợp._1.2. Ánh xạ', NULL, NULL, NULL, 49, '0', 146),
(1231, 2, '1.3. Số phức', NULL, NULL, NULL, 49, '0', 146),
(1232, 3, 'Chương 2: HÀM SỐ MỘT BIẾN SỐ - GIỚI HẠN VÀ LIÊN TỤC - ĐẠO HÀM VÀ VI PHÂN._2.1. Các khái niệm cơ bản về hàm số một biến số._2.2. Giới hạn của dãy số', NULL, NULL, NULL, 49, '0', 146),
(1233, 4, '2.3. Giới hạn của hàm số._2.4. Vô cùng bé và vô cùng lớn._2.5.  Hàm số liên tục', NULL, NULL, NULL, 49, '0', 146),
(1234, 5, '2.6. Đạo hàm._2.7. Vi phân', NULL, NULL, NULL, 49, '0', 146),
(1235, 6, '2.8. Các định lý về hàm khả vi._Bài tập chương 2', NULL, NULL, NULL, 49, '0', 146),
(1236, 7, 'Chương 3: PHÉP TÍNH TÍCH PHÂN CỦA HÀM SỐ MỘT BIẾN SỐ._3.1. Tích phân bất định._3.2. Tích phân xác định._3.3. Một số ứng dụng hình học của tích phân xác định', NULL, NULL, NULL, 49, '0', 146),
(1237, 8, '3.4. Tích phân suy rộng._Bài tập chương 3', NULL, NULL, NULL, 49, '0', 146),
(1238, 9, 'Chương 4: CHUỖI._4.1. Đại cương về chuỗi._4.2. Chuỗi số dương', NULL, NULL, NULL, 49, '0', 146),
(1239, 10, '4.3. Chuỗi có số hạng với dấu bất kỳ', NULL, NULL, NULL, 49, '0', 146),
(1240, 11, '4.4. Chuỗi lũy thừa._Bài tập chương 4', NULL, NULL, NULL, 49, '0', 146),
(1241, 12, 'Chương 5: HÀM SỐ HAI BIẾN._5.1.. Khái niệm mở đầu', NULL, NULL, NULL, 49, '0', 146),
(1242, 13, '5.2. Đạo hàm riêng. Vi phân toàn phần', NULL, NULL, NULL, 49, '0', 146),
(1243, 14, '5.3. Cực trị hàm hai biến', NULL, NULL, NULL, 49, '0', 146),
(1244, 15, 'Bài tập chương 5', NULL, NULL, NULL, 49, '0', 146),
(1245, 1, 'Chương 1: MA TRẬN - ĐỊNH THỨC._1.1. Khái niệm mở đầu về ma trận', NULL, NULL, NULL, 7, '0', 146),
(1246, 2, '1.2. Định thức', NULL, NULL, NULL, 7, '0', 146),
(1247, 3, '1.3. Hạng của ma trận.', NULL, NULL, NULL, 7, '0', 146),
(1248, 4, '1.4. Ma trận nghịch đảo', NULL, NULL, NULL, 7, '0', 146),
(1249, 5, 'Chương 2: HỆ PHƯƠNG TRÌNH TUYẾN TÍNH._2.1. Hệ phương trình tuyến tính', NULL, NULL, NULL, 7, '0', 146),
(1250, 6, '2.2. Các phương pháp giải hệ phương trình tuyến tính', NULL, NULL, NULL, 7, '0', 146),
(1251, 7, 'Chương 3: KHÔNG GIAN VECTƠ._3.1. Khái niệm về không gian vectơ.', NULL, NULL, NULL, 7, '0', 146),
(1252, 8, '3.2. Không gian con. Hệ sinh', NULL, NULL, NULL, 7, '0', 146),
(1253, 9, '3.3. Hạng của một họ vectơ', NULL, NULL, NULL, 7, '0', 146),
(1254, 10, '3.4. Bài toán đổi cơ sở', NULL, NULL, NULL, 7, '0', 146),
(1255, 11, '3.5. Ánh xạ tuyến tính', NULL, NULL, NULL, 7, '0', 146),
(1256, 12, 'Bài tập chương 3', NULL, NULL, NULL, 7, '0', 146),
(1257, 13, 'Chương 4: DẠNG TOÀN PHƯƠNG._4.1. Định nghĩa._4.2. Hạng của dạng toàn phương._4.3. Dạng toàn phương chính tắc', NULL, NULL, NULL, 7, '0', 146),
(1258, 14, '4.4. Đưa dạng toàn phương về chính tắc', NULL, NULL, NULL, 7, '0', 146),
(1259, 15, '4.5. Phân loại dạng toàn phương', NULL, NULL, NULL, 7, '0', 146),
(1260, 1, 'CHƯƠNG 1. NHỮNG VẤN ĐỀ CƠ BẢN VỀ NHÀ NƯỚC VÀ PHÁP LUẬT._1.1. Những vấn đề cơ bản về Nhà nước', NULL, NULL, NULL, 1, '0', 146),
(1261, 2, '1.2. Những vấn đề cơ bản về pháp luật._1.2.1. Nguồn gốc, bản chất, khái niệm và đặc trưng cơ bản của pháp luật', NULL, NULL, NULL, 1, '0', 146),
(1262, 3, '1.2.1. Nguồn gốc, bản chất, khái niệm và đặc trưng cơ bản của pháp luật (tt)._1.2.2. Kiểu và hình thức pháp luật.', NULL, NULL, NULL, 1, '0', 146),
(1263, 4, 'CHƯƠNG 2: BỘ MÁY NHÀ NƯỚC CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM._2.1. Các nguyên tắc tổ chức và hoạt động của bộ máy nhà nước CHXHCN Việt Nam._2.2. Hệ thống cơ quan trong bộ máy nhà nước Cộng hòa xã hội chủ nghĩa Việt Nam.', NULL, NULL, NULL, 1, '0', 146),
(1264, 5, '2.2.2. Hệ thống cơ quan hành chính nhà nước._2.2.3. Hệ thống cơ quan xét xử._2.2.4. Hệ thống cơ quan kiểm sát._2.2.5. Chủ tịch nước.', NULL, NULL, NULL, 1, '0', 146),
(1265, 6, 'CHƯƠNG 3. QUY PHẠM PHÁP LUẬT VÀ QUAN HỆ PHÁP LUẬT._3.1. Quy phạm pháp luật', NULL, NULL, NULL, 1, '0', 146),
(1266, 7, '3.2. Hệ thống các văn bản quy phạm pháp luật của nước Cộng hòa xã hội chủ nghĩa Việt Nam.', NULL, NULL, NULL, 1, '0', 146),
(1267, 8, '3.3. Quan hệ pháp luật', NULL, NULL, NULL, 1, '0', 146),
(1268, 9, 'CHƯƠNG 4: THỰC HIỆN PHÁP LUẬT, VI PHẠM PHÁP LUẬT VÀ TRÁCH NHIỆM PHÁP LÝ._4.1. Thực hiện pháp luật', NULL, NULL, NULL, 1, '0', 146),
(1269, 10, '4.2. Vi phạm pháp luật', NULL, NULL, NULL, 1, '0', 146),
(1270, 11, '4.3. Trách nhiệm pháp lý.', NULL, NULL, NULL, 1, '0', 146),
(1271, 12, 'CHƯƠNG 5: HỆ THỐNG PHÁP LUẬT, Ý THỨC PHÁP LUẬT, PHÁP CHẾ XÃ HỘI CHỦ NGHĨA._5.1. Hệ thống pháp luật._5.2. Ý thức pháp luật.', NULL, NULL, NULL, 1, '0', 146),
(1272, 13, '5.3. Pháp chế XHCN', NULL, NULL, NULL, 1, '0', 146),
(1273, 14, 'CHƯƠNG 6. PHÁP LUẬT VỀ PHÒNG CHỐNG THAM NHŨNG._6.1. Khái niệm, đặc điểm và các hành vi tham nhũng._6.2. Nguyên nhân và hậu quả tham nhũng', NULL, NULL, NULL, 1, '0', 146),
(1274, 15, '6.3. Tầm quan trọng của công tác phòng, chống tham nhũng._6.4. Trách nhiệm phòng chống tham nhũng.', NULL, NULL, NULL, 1, '0', 146),
(1275, 1, 'CHƯƠNG 1: BIẾN CỐ VÀ XÁC SUẤT._1.1. Nhắc lại về đại số tổ hợp._1.2. Phép thử và biến cố', NULL, NULL, NULL, 55, '0', 146),
(1276, 2, '1.3. Xác suất của biến cố', NULL, NULL, NULL, 55, '0', 146),
(1277, 3, '1.4.Các công thức về xác suất', NULL, NULL, NULL, 55, '0', 146),
(1278, 4, 'Bài tập và thảo luận', NULL, NULL, NULL, 55, '0', 146),
(1279, 5, 'Bài tập và thảo luận', NULL, NULL, NULL, 55, '0', 146),
(1280, 6, 'CHƯƠNG 2: BIẾN NGẪU NHIÊN VÀ CÁC LUẬT PHÂN PHỐI XÁC SUẤT._2.1. Biến ngẫu nhiên._2.2. Hàm phân phối xác suất của biến ngẫu nhiên', NULL, NULL, NULL, 55, '0', 146),
(1281, 7, '2.3.Luật phân phối xác suất._2.4. Các tham số đặc trưng của biến ngẫu nhiên', NULL, NULL, NULL, 55, '0', 146),
(1282, 8, '2.5.Các luật phân phối xác suất thông dụng', NULL, NULL, NULL, 55, '0', 146),
(1283, 9, 'Bài tập và thảo luận', NULL, NULL, NULL, 55, '0', 146),
(1284, 10, 'Kiểm tra giữa kì', NULL, NULL, NULL, 55, '0', 146),
(1285, 11, 'CHƯƠNG 3: LÝ THUYẾT CHỌN MẪU._3.1. Lý thuyết chọn mẫu._3.2. Các phương pháp sắp xếp dấu hiệu thống kê', NULL, NULL, NULL, 55, '0', 146),
(1286, 12, '3.3. Hàm phân phối thực nghiệm._3.4. Các tham số đặc trưng của mẫu', NULL, NULL, NULL, 55, '0', 146),
(1287, 13, 'CHƯƠNG 4. LÍ THUYẾT ƯỚC LƯỢNG VÀ KIỂM ĐỊNH._4.1. Mở đầu._4.2. Các tiêu chuẩn ước lượng.', NULL, NULL, NULL, 55, '0', 146),
(1288, 14, '4.3. Khoảng ước lượng đối xứng._4.4. Kiểm định giá trị trung bình.', NULL, NULL, NULL, 55, '0', 146),
(1289, 15, 'Bài tập và thảo luận', NULL, NULL, NULL, 55, '0', 146),
(1290, 1, 'CHƯƠNG 1. TỔNG QUAN VỀ KTMT_1.1. Các khái niệm cơ bản_1.1.1. Kiến trúc và tổ chức_1.1.2. Cấu trúc và chức năng_1.1.3. Lịch sử phát triển_1.2. Nguyên lý Von Neuman_1.3. Phân loại kiến trúc_1.4.	Hiệu năng và luật Moore_1.5.	Một số kiến trúc máy tính hiện đại_1.5.1. Kiến trúc x86 và x86-64_1.5.2. Kiến trúc UltraSparc', NULL, NULL, NULL, 19, '0', 146),
(1291, 2, 'CHƯƠNG 2. CHỨC NĂNG MÁY TÍNH VÀ HỆ THỐNG BUS_2.1.	Các thành phần chính của máy tính_2.1.1. CPU_2.1.2. Bộ nhớ_2.1.3. Thiết bị vào/ra_2.1.4. Hệ thống Bus_2.2. Chức năng của máy tính_2.2.1. Nạp và thực thi lệnh_2.2.2. Khái niệm ngắt_2.2.3. Lược đồ trạng thái chu trình lệnh_2.2.4. Chức năng vào/ra_2.3. Hệ thống Bus_2.3.1. Mô hình liên kết thành phần trong máy tính_2.3.2. Các kiểu truyền thông trong hệ thống liên kết_2.3.3. Lược đồ liên kết bus_2.3.4. Các đặc điểm của Bus', NULL, NULL, NULL, 19, '0', 146),
(1292, 3, 'CHƯƠNG 3. HỆ THỐNG BỘ NHỚ_3.1. Khái niệm và các đặc điểm của bộ nhớ_3.2. Phân cấp bộ nhớ_3.3. Bộ nhớ chính_3.3.1. Tổ chức_3.3.2. DRAM & SRAM_3.3.3. Một số kiểu ROM_3.3.4. DRAM hiệu năng cao SDRAM, DDR-SDRAM, Cache DRAM, …_3.3.5. Tổ chức bộ nhớ lớn', NULL, NULL, NULL, 19, '0', 146),
(1293, 1, 'Bài thực hành 1:_Sử dụng phần mềm CPU-Z kiểm tra chi tiết các thành phần: CPU, RAM, DISK,... của máy tính', NULL, NULL, NULL, 19, '1', 146),
(1294, 2, 'Bài thực hành 2:_Assembly: Viết chương trình nhập vào các số nguyên dương và cộng dồn đến khi nào gặp một số âm thì kết thúc. Rồi in ra kết quả (Không cộng dồn số âm cuối vào).', NULL, NULL, NULL, 19, '1', 146),
(1295, 3, 'Bài thực hành 3:_Kiểm tra cách máy tính thực hiện 1 chương trình (Sử dụng chương trình nguồn Assembly trong bài thực hành 2)._- Sử dụng phần mềm CPUSim xem cách CPU xử lý một chương trình._Các thông số mặc định của CPU và Main memory._+ CPU: Gồm các thanh ghi với số bít tương ứng_+ Xem kết quả và nhận xét', NULL, NULL, NULL, 19, '1', 146),
(1296, 1, 'Chương 1: Basic Ruby_1.	Syntax_2.	Array and Hashes_3.	Loop_4.	Blocks and Iterators_5.	Class, Object and Mudules_6.	Exceptions_7.	Exercises', NULL, NULL, NULL, 47, '0', 146),
(1297, 2, 'Chương 2: Basic Ruby On Rails_1.	Introduction_2.	Setup_3.	Active Records_4.	Migrations_5.	Controller_6.	Routers_7.	Views_8.	Layouts_9.	Scaffolding_10.	Exercises', NULL, NULL, NULL, 47, '0', 146),
(1298, 3, 'Kiểm tra giữa kỳ', NULL, NULL, NULL, 47, '0', 146),
(1299, 1, '1. Tổng quan về Robot._1.1 Sơ lược về quá trình phát triển._1.2 Các khái niệm về Robot._1.3 Phân loại Robot', NULL, NULL, NULL, 65, '0', 146),
(1300, 2, '1. Tổng quan về Robot._1.4 Ứng dụng của Robot._1.5 Một số Robot cơ bản', NULL, NULL, NULL, 65, '0', 146),
(1301, 3, '2. Giới thiệu về xe tự hành._2.1 Các khái niệm cơ bản._2.2 Thế nào là dò đường', NULL, NULL, NULL, 65, '0', 146),
(1302, 4, '2. Giới thiệu về xe tự hành._2.3 Dò đường dựa trên mô hình', NULL, NULL, NULL, 65, '0', 146),
(1303, 5, '3. Thiết kế và thực hiện robot tự hành dò vạch (black line)', NULL, NULL, NULL, 65, '0', 146),
(1304, 6, '4. Thiết kế và thực hiện robot tự hành sử dụng cảm biến hồng ngoại hoặc cảm biến siêu âm để tránh vật thể.', NULL, NULL, NULL, 65, '0', 146),
(1305, 7, '5. Mở rộng thiết kế với điều khiển trên Android app, iOS app hoặc web apps qua bluetooth hoặc wifi module.', NULL, NULL, NULL, 65, '0', 146),
(1306, 8, 'Thiết kế và thực hiện robot tự hành với SLAM, Navigation with ROS', NULL, NULL, NULL, 65, '0', 146),
(1307, 9, 'Thiết kế và thực hiện robot tự hành với Raspi Camera', NULL, NULL, NULL, 65, '0', 146),
(1308, 10, 'Mô phỏng navigation with LIDAR sensor trên Gazebo', NULL, NULL, NULL, 65, '0', 146),
(1321, 1, 'Chương 1: Kiến thức tổng quan_1.1 Vi xử lý_1.2 Vi điều khiển_1.3 Hệ thống nhúng_1.4 Các hệ thống số dùng trong máy tính và các loại mã_1.5 Bộ nhớ', NULL, NULL, NULL, 54, '0', 146),
(1322, 2, 'Chương 1. Khái niệm_chung_1.1. Kiến trúc mạng_1.2. Lập trình mạng_1.3. Các loại mạng_1.4. Hệ điều hành_1.5. Tập giao thức', NULL, NULL, NULL, 54, '0', 146),
(1323, 3, 'Chương 2: Kiến trúc VĐK 8051_2.1 Giới thiệu về VĐK 8051_2.2 Sơ đồ khối và chân_2.3 Tổ chức bộ nhớ_2.4 Thanh ghi chức năng đặc biệt_2.5 Dao động và hoạt động reset', NULL, NULL, NULL, 54, '0', 146),
(1324, 4, 'Chương 3: Lập trình C cho 8051_3.1 Giới thiệu_3.2 Lập trình C cho vi điều khiển_3.3 Lập trình I/O_3.4 Lập trình hoạt động logic_3.5 Lập trình bộ định thời/ bộ đếm_3.6 Lập trình truyền thông nối tiếp_3.7 Lập trình ngắt', NULL, NULL, NULL, 54, '0', 146),
(1325, 5, 'Thi giữa kỳ', NULL, NULL, NULL, 54, '0', 146),
(1326, 6, 'Chương 4. Arduino_4.1 Giới thiệu_4.1.1 Giới thiệu arduino_4.1.2 Cấu tạo board arduino_4.2 Lập trình với arduino_4.2.1 Cài đặt phần mền lập trình_4.2.2 Lập trình cơ bản_4.3 Các hàm của arduino_4.3.1 Hàm I/O_4.3.2 Hàm thời giam_4.3.3 Hàm toán học_4.3.4 Hàm lượng giác_4.3.5 Hàm ngắt_4.4 Truyền thông nối tiếp_4.5 Ethernet_4.6 Wifi_4.7 Động cơ Servo_4.8 Động cơ bước_4.9 GSM', NULL, NULL, NULL, 54, '0', 146),
(1327, 7, 'Chương 5: Các hệ vi điều khiển tiên tiến_5.1 Vi điều khiển AVR_5.2 Vi điều khiển PIC_5.3 Kiến trúc ARM', NULL, NULL, NULL, 54, '0', 146),
(1360, 1, 'UNIT 6: OUT AND ABOUT._6.1. Vocabulary and Listening: In Town', 'a', '', '', 12, '0', 146),
(1361, 2, '6.2. Grammar: Past Simple – BE and CAN._6.3. Culture: Tourist information', 'a', '', '', 12, '0', 146),
(1362, 3, '6.4. Grammar: Past Simple:Negative and Interrogative._6.5. Reading: Out on the Town', 'a', '', '', 12, '0', 146),
(1363, 4, '6.6. Everyday English: On the Phone', 'a', '', '', 12, '0', 146),
(1364, 5, '6.7. Writing: A Message', 'a', '', '', 12, '0', 146),
(1365, 6, 'UNIT 7: WORLD FAMOUS._7.1. Vocabulary and Listening: On the Map._7.2. Grammar: Past Simple (Irregular Verbs)', 'a', '', '', 12, '0', 146),
(1366, 7, '7.3. Culture: An American Hero', 'a', '', '', 12, '0', 146),
(1367, 8, '7.4. Grammar: Past Simple - Negative and Interrogative._7.5. Reading: Inventions', 'a', '', '', 12, '0', 146),
(1368, 9, '7.6. Everyday English: Talking about Your Weekend', 'a', '', '', 12, '0', 146),
(1369, 10, '7.7. Writing: An E-mail Message. Kiểm tra giữa kỳ', 'a', '', '', 12, '0', 146),
(1370, 11, 'Unit 8: ON THE MENU._8.1. Vocabulary and Listening: Breakfast._8.2. Grammar: Some and Any, How Much and How Many', 'a', '', '', 12, '0', 146),
(1371, 12, '8.3. Culture: Traditional Dishes', 'a', '', '', 12, '0', 146),
(1372, 13, '8.4. Grammar: Articles. 8.5. Reading: Healthy Eating', 'a', '', '', 12, '0', 146),
(1373, 14, '8.6. Everyday English: In a Cafe', 'a', '', '', 12, '0', 146),
(1374, 15, '8.7. Writing: A Formal Letter. Revision', 'a', '', '', 12, '0', 146),
(1380, 1, 'Chương 1. Khái niệm chung_1.1. Kiến trúc mạng_1.2. Lập trình mạng_1.3. Các loại mạng_1.4. Hệ điều hành_1.5. Tập giao thức', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1381, 2, 'Chương 2. Các mô hình mạng_2.1. Mô hình truyền thông_trong kiến trúc mạng_2.2. Các giao thức_2.3. Mô hình TCP/IP', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1382, 3, 'Chương 3. Các mô hình ứng dụng mạng_3.1. Mô hình client server_3.2. Mô hình ứng dụng_P2P_3.3. Mô hình phân tán', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1383, 4, 'Chương 4. Lập trình với giao thức TCP_4.1. Giao thức TCP/IP_4.2. Lập trình Socket', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1384, 5, 'Kiểm tra giữa kỳ', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1385, 6, 'Chương 5. Lập trình với giao thức UDP', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1386, 7, 'Chương 6. Lập trình multicast', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1387, 8, 'Chương 7. Giao thức HTTP_7.1. Tổng quan_7.2. Cơ chế hoạt động_7.3. Web Server', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1388, 9, 'Chương 8. Gọi hàm và thủ tục từ xa_8.1. Lập trình RPC_8.2. Lập trình RMI_8.3. Lập trình CORBA', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1389, 10, 'Chương 9. Kiến trúc hướng dịch vụ SOA', 'Giảng theo slide, thuyết trình, pháp vấn', '', '', 68, '0', 146),
(1390, 1, 'Bài thực hành 1: Tìm hiểu các mô hình mạng', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1391, 2, 'Bài thực hành 2: SV lập thành một nhóm để thảo luận cách xây dựng ứng dụng client/server nào đó mà GV yêu cầu', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1392, 3, 'Bài thực hành 3: Thực hành TCP Socket', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1393, 4, 'Bài thực hành 4: Thực hành UDP Socket', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1394, 5, 'Bài thực hành 5: Thực hành Multicast', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1395, 6, 'Bài thực hành 6: Thực hành HTTP', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1396, 7, 'Bài thực hành 7: Gọi hàm và thủ tục từ xa', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1397, 8, 'Bài thực hành 8: Lập trình bảo mật', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1398, 9, 'Bài thực hành 9: Kiến trúc hướng dịch vụ SOA', 'Hướng dẫn ví dụ trực tiếp trên lớp, Hoàn thành và nộp trên elearning.', '', '', 68, '1', 146),
(1399, 10, 'Bài thực hành 10: Trình bày bài tập lớn', 'Hoàn thành và nộp trên elearning', '', '', 68, '1', 146),
(1400, 1, 'Giới thiệu học phần._Chương 1. Giới thiệu_1.1. Giới thiệu cơ sở dữ liêu_1.2. Giới thiệu mục đích của cơ sở dữ liệu_1.3. Giới thiệu các góc nhìn trong lĩnh vực cơ sở dữ liệu', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1401, 2, 'Chương 2. Giới thiệu mô hình quan hệ_2.1. Cấu trúc của cơ sở dữ liệu quan hệ_2.2. Mô hình dữ liệu', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1402, 3, 'Chương 2: Giới thiệu mô hình quan hệ (tiếp theo)_2.3. Khoá trong quan hệ dữ liệu_2.4. Các biểu đồ', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1403, 4, 'Chương 2: Giới thiệu mô hình quan hệ (tiếp theo)_2.5. Ngôn ngữ truy vấn quan hệ dữ liệu_2.6. Đại số quan hệ', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1404, 5, 'Chương 3: Thiết kế dữ liệu bằng mô hình thực thể kết hợp_3.1. Tổng quan về quá trình thiết kế dữ liệu_3.2. Mô hình thực thể kết hợp_3.3. Những thuộc tính phức hợp', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1405, 6, 'Chương 3: Thiết kế dữ liệu bằng mô hình thực thể kết hợp (tiếp theo)_3.4. Lượng hoá tỉ lệ của các cặp quan hệ (Mapping cardinalities)_3.5. Khoá chính', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1406, 7, 'Chương 4: Thiết kế cơ sở dữ liệu quan hệ_4.1 Những đặc tính của một mô hình quan hệ_4.2 Giới thiệu phụ thuộc hàm_4.3 Các dạng chuẩn_4.4 Lý thuyết về phụ thuộc hàm', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1407, 8, 'Chương 4: Thiết kế cơ sở dữ liệu quan hệ (tiếp theo)_4.5. Thuật toán phân rã dữ liệu sử dụng phụ thuộc hàm_4.6. Phân rã dữ liệu sử dụng phục thuộc đa trị', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1408, 9, 'Chương 4: Thiết kế cơ sở dữ liệu quan hệ (tiếp theo)_4.7. Các dạng chuẩn khác_4.8. Miền đơn trị và dạng chuẩn một', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1409, 10, 'Chương 5: Giới thiệu truy vấn dữ liệu_5.1. Tổng quan về ngôn ngữ truy vấn cấu trúc_5.2. Khái niệm về dữ liệu SQL_5.3. Kiến trúc cơ bản của câu truy vấn SQL', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1410, 11, 'Chương 5: Giới thiệu truy vấn dữ liệu (tiếp theo)_5.4. Những toán tử cơ bản_5.5. Những toán tử tập hợp_5.6. Giá trị rỗng', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1411, 12, 'Chương 5: Giới thiệu truy vấn dữ liệu (tiếp theo)_5.7. Những hàm tổng hợp dữ liệu_5.8. Những câu truy vấn lồng nhau', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1412, 13, 'Chương 6: Làm việc với truy vấn dữ liệu_6.1. Truy vấn kết hợp các bảng_6.2. Các khung nhìn (view) đối với dữ liệu', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1413, 14, 'Chương 7: Truy vấn dữ liệu nâng cao_7.1. Truy vấn dữ liệu từ ngôn ngữ lập trình_7.2. Hàm và thủ tục', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1414, 15, 'Chương 7: Truy vấn dữ liệu nâng cao (tiếp theo)_7.3. Trigger_7.4. Truy vấn đệ quy', 'Dạy:_Giảng bài kết hợp trình chiếu slide bài giảng._Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_Nghe giảng._Trả lời các câu hỏi của giảng viên đưa ra._Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_Ôn lại lý thuyết', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '0', 146),
(1415, 1, 'Bài 1: Mô hình quan hệ', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1416, 2, 'Bài 2: Mô hình quan hệ (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1417, 3, 'Bài 3: Mô hình quan hệ (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1418, 4, 'Bài 4: Mô hình thực thể kết hợp', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1419, 5, 'Bài 5: Mô hình thực thể kết hợp (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1420, 6, 'Bài 6: Mô hình thực thể kết hợp (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1421, 7, 'Bài 7: Mô hình thực thể kết hợp (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1422, 8, 'Bài 8: Thiết kế cơ sở dữ liệu quan hệ', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1423, 9, 'Bài 9: Thiết kế cơ sở dữ liệu quan hệ (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1424, 10, 'Bài 10: Thiết kế cơ sở dữ liệu quan hệ (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1425, 11, 'Bài 11: Truy vấn dữ liệu', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1426, 12, 'Bài 12: Truy vấn dữ liệu (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1427, 13, 'Bài 13: Truy vấn dữ liệu (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1428, 14, 'Bài 14: Truy vấn dữ liệu (tiếp theo)_Bài 15: Truy vấn dữ liệu (tiếp theo)', 'Dạy: Hướng dẫ sinh viên làm bài thực hành_Học: Thực hiện các bài thực hành', 'A1.1_A2.1_A3.1', '1_2_3_4_5', 6, '1', 146),
(1429, 1, 'Chương 1. Đại số mệnh đề_1.1.	Mệnh đề và các phép toán logic cơ bản_1.1.1.	Mệnh đề_1.1.2.	Các phép toán logic cơ bản_1.2.	Công thức và biến đổi tương đương_1.2.1.	Công thức tương đương_1.2.2.	Hệ thức tương đương cơ bản_1.2.3.	Biến đổi tương đương_1.3.	Một số phép toán logic mở rộng_1.3.1.	Suy ra_1.3.2.	Tương đương_1.3.3.	Một số tính chất_1.4.	Phương pháp suy diễn', 'Trình bày bài giảng, trình chiếu slide;_Đặt câu hỏi cho sinh viên suy nghĩ và trả lời.', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1430, 2, 'Bài tập: Chương 1', 'Giao và hướng dẫn giải bài tập về nhà', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1431, 3, 'Chương 2. Tập hợp-Quan hệ_2.1.	Tập hợp_2.1.1.	Khái niệm_2.1.2.	Các phép toán tập hợp_2.1.3.	Một số tính chất_2.2.	 Quan hệ_2.2.1.	Định nghĩa và tính chất_2.2.2.	Quan hệ tương đương_2.2.3.	Quan hệ thứ tự', 'Trình bày bài giảng, trình chiếu slide;_Đặt câu hỏi cho sinh viên suy nghĩ và trả lời.', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1432, 4, 'Bài tập: Chương 2', 'Giao và hướng dẫn giải bài tập về nhà', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1433, 5, 'Chương 3. Các nguyên lý và cấu hình tổ hợp cơ bản_3.1.	Các nguyên lý cơ bản_3.1.1.	Nguyên lý cộng_3.1.2.	Nguyên lý nhân_3.1.3.	Nguyên lý tồn tại_3.2.	Các cấu hình tổ hợp cơ bản_3.2.1.	Cấu hình không lặp_3.2.2.	Cấu hình lặp', 'Trình bày bài giảng, trình chiếu slide;_Đặt câu hỏi cho sinh viên suy nghĩ và trả lời.', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1434, 6, 'Bài tập: Chương 3', 'Giao và hướng dẫn giải bài tập về nhà', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1435, 7, 'Kiểm tra giữa kỳ', 'Giảng viên tổ chức cho người học làm bài kiểm tra (hình thức tự luận/vấn đáp/trắc nhiệm) tại lớp và chấm điểm.', 'A3.1', '1_4_5', 39, '0', 146),
(1436, 8, 'Chương 4. Một số bài toán cơ bản_4.1.	Bài toán đếm_4.1.1.	Giới thiệu_4.1.2.	Phương pháp giải_4.1.3.	Giải công thức truy hồi tuyến tính_4.2.	Bài toán tồn tại_4.2.1.	Giới thiệu_4.2.2.	Phương pháp giải_4.3.	Bài toán liệt kê_4.3.1.	Giới thiệu_4.3.2.	Phương pháp giải_4.4.	Bài toàn tối ưu_4.4.1.	Giới thiệu_4.4.2.	Phương pháp giải', 'Trình bày bài giảng, trình chiếu slide;_Đặt câu hỏi cho sinh viên suy nghĩ và trả lời.', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1437, 9, 'Bài tập: Chương 4', 'Giao và hướng dẫn giải bài tập về nhà', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1438, 10, 'Chương 5. Lý thuyết đồ thị_5.1.	 Các khái niệm và định nghĩa_5.1.1.	Đồ thị vô hướng_5.1.2.	Đồ thị có hướng_5.1.3.	Đồ thị có trọng số_5.2.	 Biểu diễn đồ thị trong máy tính điện tử_5.2.1.	Ma trận kề_5.2.2.	Ma trận trọng số_5.2.3.	Danh sách cạnh_5.2.4.	Danh sách kề_5.3.	 Một số thuật toán tìm kiếm trên đồ thị_5.3.1.	Tìm kiếm theo chiều rộng_5.3.2.	Tìm kiếm theo chiều sâu_5.3.3.	Tìm kiếm đường đi_5.3.4.	Kiểm tra tính liên thông_5.4.	 Đồ thị Euler và đồ thị Hamilton_5.4.1.	Đồ thị Euler_5.4.2.	Đồ thị Hamilton_5.5.	 Bài toán tìm cây khung cực tiểu_5.5.1.	Cây và cây khung_5.5.2.	Bài toán_5.5.3.	Phương pháp giải_5.6.	 Bài toán tìm đường đi ngắn nhất_5.6.1.	Bài toán_5.6.2.	Phương pháp giải', 'Trình bày bài giảng, trình chiếu slide;_Đặt câu hỏi cho sinh viên suy nghĩ và trả lời.', 'A1.1_A2.1', '1_4_5', 39, '0', 146),
(1439, 11, 'Bài tập: Chương 5', 'Giao và hướng dẫn giải bài tập về nhà', 'A2.1_A3.1', '3_4_5', 39, '0', 146),
(1440, 12, 'Thi cuối kỳ', 'Nhà trường tổ chức cho người học thi chung (hình thức tự luận/trắc nghiệm);_Khoa tổ chức chấm thi chung.', 'A3.1', '2_3_4_5', 39, '0', 146),
(1441, 1, 'Computer applications_1/MATCH THE PICTURE_2/LISTENING_3/READING', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1442, 2, 'Computer applications_4/LANGUAGE WORK: THE PRESENT SIMPLE PASSIVE_5/Other applications', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1443, 3, 'Computer essentials_1/WARM-UP_2/READING_3/READ AND GUESS', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1444, 4, 'Computer essentials_4/GET READY FOR LISTENING_5/LISTENING_6/ LANGUAGE WORK: COMPOUND ADJECTIVES', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1445, 5, 'Inside the system_1/WARM-UP_2/READING_3/LANGUAGE WORK: RELATIVE CLAUSES', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1446, 6, 'Inside the system_4/LISTENING_5/ YOUR IDEAL COMPUTER SYSTEM', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1447, 7, 'Bits And Bytes_1/WARM-UP_2/Word building', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1448, 8, 'Bits And Bytes_3/Bits for pictures', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1449, 9, 'Buying A Computer_1/Before you listen_2/Listening_3/Role play_4/Read and talk', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1450, 10, 'Type and click!_1/Interacting with your computer_2/Listening_3/Language work_4/About the keyboard_5/Reading', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1451, 11, 'Capture Your Favourite Image_1/The eyes of your computer_2/Listening_3/Facts and opinions_4/Language work: Comparatives and superlatives_5/Word building', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1452, 12, 'Viewing The Output_1/Warm-up_2/Reading_3/Listening_4/Language work: Instructions and advice', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1453, 13, 'Choosing A Printer_1/Reading_2/Discourse cohesion_3/Listening_4/Language work: Revision of comparison', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Choosing A Printer_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1454, 14, 'I/O Devices For The Disabled_1/Adaptive technology_2/Reading', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về I/O Devices For The Disabled', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1455, 15, 'I/O Devices For The Disabled_3/Language work: Noun phrases_4/Listening', 'Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 146),
(1456, 16, 'Thi cuối kỳ', '', 'A4.1', '1_2_3_4', 13, '0', 146),
(1457, 1, 'Phần 1 – Lập trình hướng đối tượng sử dụng ngôn ngữ Java__Chương 1: Làm quen với Java và môi trường lập trình Eclipse', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1458, 2, 'Chương 2- Ngôn ngữ Java: Các thành phần cơ bản và lệnh điều khiển_2.1. Các kiểu dữ liệu cơ bản_2.2. Khai báo biến_2.3. Các phép toán (số học, so sánh, gán, logic)_2.4. Các câu lệnh điều khiển', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1459, 3, 'Chương 3- Ngôn ngữ Java: Phương thức, mảng và tham chiếu_3.1. Tạo Phương thức_3.2. Gọi phương thức_3.3. Truyền tham số cho phương thức_3.4. Khai báo mảng_3.5. Truy cập mảng', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1460, 4, 'Chương 4 – Nguyên lý lập trình hướng đối tượng_4.1. Trừu tượng hóa dữ liệu (Abstraction):_- Class, Object và method_4.2. Đóng gói dữ liệu (Encapsulation)_- Acess modifier keywords_- public_- private_-protected_- default_4.2. Kế thừa (Inheritance):_- Class và sub-class_- Interface_- Abstract class_4.3. Đa hình (Polymorphism)_- overloading_- overring_- operator overloading (C++))', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1461, 5, 'Thi giữa kỳ', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1462, 6, 'Phần 2: Áp dụng ngôn ngữ Java_Chương 5 - Xử lý biệt lệ (Exception handling)_5.1. Định nghĩa_5.2. Các kiểu ngoại lên_5.3. Xử lý ngoại lệ', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1463, 7, 'Chương 6 - Lập trình giao diện với AWT, Swing và JavaFX (GUI programming)_6.1. Giới thiệu AWT_6.2. Các thành phần trong AWT_6.3. Giới thiệu Swing_6.4. Các thành phần trong Swing_6.5. Giới thiệu JavaFX_6.6. Các thành phần trong JavaFX_6.7. Xử lý sự kiện', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1464, 8, 'Chương 7. Lập trình kết nối cơ sở dữ liệu_7.1 Giới thiệu JDBC_7.2 Các bước truy cậy CSDL_7.3 Các lớp truy cập và xử lý dữ liệu_7.4. Ứng dụng GUI có kết nối CSDL.', 'Trình bày bài giảng Slide. Đặt câu hỏi cho sinh viên suy nghĩ và trả lời', 'A1.1_A2.1_A3.1', '1_2_4', 9, '0', 146),
(1465, 9, 'Thi cuối kỳ', 'Làm bài tập lớn', 'A1.1_A2.1_A3.1_A4.1', '1_2_3_4', 9, '0', 146),
(1466, 1, 'Chương 1. Mở đầu_1.1.	Khái niệm về ngôn ngữ_1.1.1.	Bảng chữ_1.1.2.	Xâu và các phép toán xử lý xâu_1.1.3.	Ngôn ngữ và các phép toán trên ngôn ngữ_1.2.	Khái niệm về văn phạm_1.2.1.	Các định nghĩa_1.2.2.	Phân cấp văn phạm của Chomsky_1.3.	Khái niệm về ô-tô-mát_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1467, 2, 'Chương 2. Ô-tô-mát hữu hạn_2.1.	 Ô-tô-mát hữu hạn đơn định (DFA)_2.1.1.	Mô tả_2.1.2.	Định nghĩa_2.1.3.	Hoạt động đoán nhận xâu của DFA_2.1.4.	Các biểu diễn khác của DFA_2.1.5.	Hàm dịch chuyển mở rộng_2.1.6.	Ngôn ngữ được đoán nhận bởi DFA_2.2.	 Ô-tô-mát hữu hạn không đơn định (NFA)_2.2.1.	Định nghĩa_2.2.2.	Hoạt động đoán nhận xâu của NFA_2.2.3.	Các biểu diễn khác của NFA_2.2.4.	Hàm dịch chuyển mở rộng_2.2.5.	Ngôn ngữ được đoán nhận bởi NFA_2.3.	Sự tương đương giữa DFA và NFA_2.4.	Ứng dụng của ô-tô-mát hữu hạn_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1468, 3, 'Chương 3. Biểu thức chính quy và Văn phạm chính quy_3.1. Biểu thức chính quy_3.1.1.	Định nghĩa_3.1.2.	Thứ tự ưu tiên của phép toán trong biểu thức chính quy_3.1.3.	Các tính chất đại số của biểu thức chính quy_3.1.4.	Ngôn ngữ được biểu diễn bởi biểu thức chính quy_3.2.	 Ngôn ngữ chính quy_3.2.1.	Xây dựng NFA từ biểu thức chính quy_3.2.2.	Tính chất đóng của ngôn ngữ chính quy_3.3.	Văn phạm chính quy_3.3.1.	Định nghĩa_3.3.2.	Xây dựng NFA từ văn phạm tuyến tính phải_3.3.3.	Xây dựng văn phạm chính quy từ NFA_3.4.	 Cực tiểu hóa DFA_3.4.1.	Trạng thái tương đương_3.4.2.	Sự tương đương của các DFA_3.4.3.	Thuật toán cực tiểu hóa DFA_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1469, 4, 'Kiểm tra giữa kỳ', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1470, 5, 'Chương 4. Văn phạm phi ngữ cảnh_4.1.	 Văn phạm phi ngữ cảnh_4.1.1.	Các định nghĩa_4.1.2.	Suy dẫn trái, suy dẫn phải_4.1.3.	Cây suy dẫn (cây cú pháp)_4.2.	 Sự nhập nhằng trong văn phạm phi ngữ cảnh_4.2.1.	Khái niệm văn phạm nhập nhằng_4.2.2.	Loại bỏ sự nhập nhằng trong văn phạm_4.3.	 Giản lược văn phạm phi nhữ cảnh_4.3.1.	Loại bỏ luật sinh-_4.3.2.	Loại bỏ luật sinh đơn vị_4.3.3.	Loại bỏ các ký hiệu vô ích_4.4.	 Dạng chuẩn của văn phạm phi ngữ cảnh_4.4.1.	Định nghĩa_4.4.2.	Biến đổi văn phạm phi ngữ cảnh đưa về dạng chuẩn_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1471, 6, 'Chương 5. Ô-tô-mát đẩy xuống_5.1.	 Ô-tô-mát đẩy xuống (PDA)_5.1.1.	Mô tả_5.1.2.	Định nghĩa_5.1.3.	Biểu diễn PDA bằng biểu đồ dịch chuyển_5.1.4.	Cấu hình của PDA_5.2.	 Ngôn ngữ được đoán nhận bởi PDA_5.2.1.	Chuyển PDA từ đoán nhận bởi ngăn xếp rỗng sang đoán nhận bởi trạng thái kết thúc_5.2.2.	Chuyển PDA từ đoán nhận bởi trạng thái kết thúc sang đoán nhận bởi ngăn xếp rỗng_5.3.	 Ô-tô-mát đẩy xuống đơn định_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1472, 7, 'Chương 6. Máy Turing_6.1.	 Máy Turing_6.1.1.	Mô tả_6.1.2.	Định nghĩa_6.1.3.	Biểu diễn máy Turing bằng biểu đồ dịch chuyển_6.1.4.	Cấu hình của máy Turing_6.1.5.	Ngôn ngữ được đoán nhận bởi máy Turing_6.2.	 Tính toán bằng máy Turing_6.3.	 Một số vấn đề khác_Bài tập', '- Trình bày bài giảng, trình chiếu slide;_- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời;_- Giao và hướng dẫn giải bài tập tại lớp, bài tập về nhà.', 'A1.1_A2.1', '2_5', 64, '0', 146),
(1473, 8, 'Thi cuối kỳ', '- Nhà trường tổ chức cho người học thi chung (hình thức tự luận/trắc nghiệm);_- Khoa tổ chức chấm thi chung.', 'A3.1', '1_2_3_4_5', 64, '0', 146),
(1474, 1, 'Chương 1._Get started fast with PHP & MySQL_Introduction to web development with PHP_How to use PHP with a Mysql database', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1475, 2, 'Chương 1._Get started fast with PHP & MySQL_How to use the MVC patern to organize your code', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1476, 3, 'Chương 2._Master PHP Programming_How to work with form data_How to code control statements_How to work with string  and numbers', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1477, 4, 'Chương 2._Master PHP Programming_How to work with dates_How to work with arrays', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1478, 5, 'Chương 2._Master PHP Programming_How to work with cookie_How to work with session', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1479, 6, 'Chương 2._Master PHP Programming_How to work with functions', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1480, 7, 'Chương 2._Master PHP Programming_How to work with objects_How to work with regular expression, handle exception', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1481, 8, 'Chương 3._Master MySQL Programming_How to design a database', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1482, 9, 'Chương 3._Master MySQL Programming_How to using SQL to create a MySQL database_Kiểm tra giữa kỳ', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1483, 10, 'Chương 3._Master MySQL Programming_How to using SQL to work with a MySQL database', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1484, 11, 'Chương 3._Master MySQL Programming_A database-driven website', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1485, 12, 'Chương 4._Master the advanced skills for building websites_How to create secure websites', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1486, 13, 'Chương 4._Master the advanced skills for building websites_How to send email and access other websites_How to work with files, uploads and images', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1487, 14, 'Chương 4._Master the advanced skills for building websites_Laravel Framework_NodeJS_Open source PHP', 'Dạy:_Giảng theo slide, hướng dẫn ví dụ thực hành trực tiếp trên lớp._Học:_Nghe giảng nắm bắt cách thức làm việc với  để gửi email, files, images trong PHP', 'A1.1_A2.1', '1_2', 31, '0', 146),
(1488, 15, 'Hướng dẫn đồ án môn học', 'Phương pháp:_Đăng ký đề tài_Bổ túc kiến thức_Hướng dẫn làm đề tài cuối kỳ', '', '1_2_3', 31, '0', 146),
(1489, 16, 'Thi cuối kỳ', '', 'A4.1', '1_2_3', 31, '0', 146),
(1490, 1, 'Bài thực hành 1:_-Cài đặt Web server, Database server._-Cài đặt các Tools._-Thử nghiệm xây dựng Website đầu tiên bằng PHP.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1491, 2, 'Bài thực hành 2:_Thực hành ngôn ngữ PHP: câu lệnh có cấu trúc (cơ bản).', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1492, 3, 'Bài thực hành 3:_Thực hành ngôn ngữ PHP: câu lệnh có cấu trúc (nâng cao).', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1493, 4, 'Bài thực hành 4:_Thực hành ngôn ngữ PHP: Lập trình với cookie và session.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1494, 5, 'Bài thực hành 5:_Thực hành ngôn ngữ PHP: Lập trình Hàm.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1495, 6, 'Bài thực hành 6:_Làm việc với string, array, date, object…_Xử lý ngoại lệ', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1496, 7, 'Bài thực hành 7:_Thiết kế cơ sở dữ liệu bằng MySQL.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1497, 8, 'Bài thực hành 8:_Sử dụng câu lệnh SQL để tạo cơ sở dữ liệu MySQL.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1498, 9, 'Bài thực hành 9:_Sử dụng câu lệnh SQL để tương tác với cơ sở dữ liệu MySQL (thêm, sửa, xoa, truy vấn dữ liệu).', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1499, 10, 'Bài thực hành 10:_Lập trình PHP kết nối và tương tác với cơ sở dữ liệu mySQL (phần 1).', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1500, 11, 'Bài thực hành 11:_Lập trình PHP kết nối và tương tác với cơ sở dữ liệu mySQL (phần 2).', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1501, 12, 'Bài thực hành 12:_Bảo mật Website.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1502, 13, 'Bài thực hành 13:_Xây dựng Website đơn giản bằng Laravel: Các kỹ năng nâng cao về PHP: làm việc với file, image, email…', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '1_2', 31, '1', 146),
(1503, 14, 'Bài thực hành 14:_Xây dựng Website đơn giản bằng Laravel.', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '3', 31, '1', 146),
(1504, 15, 'Bài thực hành 15:_Xây dựng Website bằng Laravel', 'Hoàn thành và chấm bài thực hành trên lớp.', 'A2.1', '3', 31, '1', 146),
(1505, 1, 'Giới thiệu học phần._Chương 1. Giới thiệu về phát triển hướng đối tượng_1.1. Phát triển hướng chức năng và hướng đối tượng_1.2. Các khái niệm cơ bản về hệ thống hướng đối tượng', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1', 36, '0', 146),
(1506, 2, 'Chương 2. Tổng quan về ngôn ngữ mô hình hóa hợp nhất_2.1. Một số phương pháp mô hình hóa trước UML_2.2. Lịch sử phát triển UML_2.3. Sơ lược về UML_Chương 3. UML và quy trình phát triển phần mềm_3.1. Các hoạt động phát triển phần mềm_3.2. Quy trình phát triển phần mềm_3.3. UML và quy trình phát triển phần mềm', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1', 36, '0', 146),
(1507, 3, 'Chương 4. Mô hình hóa yêu cầu_4.1. Yêu cầu hệ thống_4.2. Xây dựng biểu đồ ca sử dụng', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2', 36, '0', 146),
(1508, 4, 'Chương 4. Mô hình hóa yêu cầu (tiếp)_4.2. Xây dựng biểu đồ ca sử dụng_Bài tập nhóm: Mô hình hóa yêu cầu_- GV cho SV đăng ký và duyệt danh sách các dự án từ Tuần 4._- Chia nhóm tối đa 4 sinh viên_- Mỗi nhóm chọn một bài toán_- Đặc tả yêu cầu bài toán', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1509, 5, 'Bài tập nhóm: Mô hình hóa yêu cầu_- Xây dựng biểu đồ ca sử dụng', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2', 36, '0', 146),
(1510, 6, 'Bài tập nhóm: Mô hình hóa yêu cầu_- Xây dựng biểu đồ ca sử dụng (tt)', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2', 36, '0', 146),
(1511, 7, 'Chương 5. Mô hình hóa cấu trúc tĩnh_5.1. Lớp và các quan hệ giữa các lớp_5.2. Xây dựng biểu đồ lớp', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1512, 8, 'Chương 5. Mô hình hóa cấu trúc tĩnh (tiếp)_5.2. Xây dựng biểu đồ lớp (tt)_5.3. Xây dựng biểu đồ đối tượng', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1513, 9, 'Đánh giá giữa kỳ_Kiểm tra tiến độ bài tập nhóm', '', '', '1_2', 36, '0', 146),
(1514, 10, 'Bài tập nhóm: Biểu đồ lớp mức phân tích_- Nhóm thảo luận về yêu cầu để xây dựng biểu đồ lớp phân tích', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2', 36, '0', 146),
(1515, 11, 'Chương 6. Mô hình hóa hành vi (tiếp)_6.1. Biểu đồ hoạt động_6.2. Biểu đồ trạng thái', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1516, 12, 'Chương 6. Mô hình hóa hành vi_6.2. Biểu đồ trạng thái_6.3. Biểu đồ tương tác_6.3.1 Biểu đồ tuần tự_6.3.2 Biểu đồ giao tiếp_Bài tập nhóm: Biểu đồ hoạt động, Biểu đồ trạng thái, Biểu đồ tương tác', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1517, 13, 'Chương 7. Mô hình hóa kiến trúc_7.1. Biểu đồ gói_7.2. Biểu đồ thành phần_7.3. Biểu đồ triển khai_Bài tập nhóm:_- Xây dựng biểu đồ lớp thiết kế_- Xây dựng biểu đồ gói_- Xây dựng biểu đồ thành phần_- Xây dựng biểu đồ triển khai', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1518, 14, 'Chương 8. Các nguyên tắc thiết kế GRASP_8.1. Giới thiệu_8.2. Các nguyên tắc thiết kế GRASP Chương 9. Các mẫu thiết kế', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1519, 15, 'Chương 9. Các mẫu thiết kế (tiếp)_Chương 10. Cài đặt_10.1. Nhắc lại lập trình hướng đối tượng_10.2. Từ thiết kế đến mã nguồn_Chương 11. Ứng dụng_11.1. Yêu cầu_11.2. Các bước phân tích và thiết kế', 'GV sử dụng tài liệu, máy tính và projector để hướng dẫn', '', '1_2_3_4', 36, '0', 146),
(1520, 1, 'Chương 1.Tổng quan về đồ họa_1.1. Đồ họa máy tính, lịch sử phát triển và ứng dụng._1.2.Các kỹ thuật đồ hoạ_1.2.1.Kỹ thuật đồ họa vector_1.2.2.Kỹ thuật đồ hoạ điểm_1.3.Thành phần chính trong ứng dụng đồ họa_1.3.1.Đối tượng_1.3.2. Camera_1.3.3.Nguồn sáng_1.4.Các hệ màu_1.4.1.Hệ màu thêm RGB_1.4.2.Mô hình màu bù CMY_1.4.3.Mô hình HSV_1.4.4.Mô hình HSL', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146);
INSERT INTO `table_kehoachgiangday` (`id`, `buoi`, `noidung`, `hoatdongdayhoc`, `baidanhgia`, `cdrhocphan`, `id_hocphan`, `thuochocphan`, `khungchuongtrinh`) VALUES
(1521, 2, 'Chương 1.Tổng quan về đồ họa (tt)_1.5.Phần cứng đồ họa_1.6. Hệ tọa độ và chuyển đổi hệ tọa độ, chuẩn đồ họa_1.7. Lập trình đồ họa với OpenGL', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1522, 3, 'Chương 2. Kỹ thuật đồ họa 2D_2.1.Vẽ các đối tượng đồ họa cơ sở_2.1.1. Thuật toán Bresenham_2.1.2.Thuật toán  Midpoint', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1523, 4, 'Chương 2. Kỹ thuật đồ họa 2D (tt)_2.2.Xén hình_2.2.1.Thuật toán Cohen-Sutherland_2.2.2. Thuật toán chia nhị phân_2.3.Tô màu_2.3.1.Thuật toán đường biên_2.3.2.Thuật toán dòng quét', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1524, 5, 'Chương 2. Kỹ thuật đồ họa 2D (tt)_3.4.Vẽ chữ và dựng Font_3.5.Đồ họa với hình học Fractal_3.6.Các phép biến đổi 2D', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1525, 6, 'Thi giữa kỳ', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1526, 7, 'Chương 3. Kỹ thuật đồ họa 3D_3.1. Các phép biến đổi 3D_4.2. Mô hình 3D_4.2.1.Mô hình khung dây_4.2.2.Mô hình mặt đa giác', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1527, 8, 'Chương 3. Kỹ thuật đồ họa 3D (tt)_3.3.Phép chiếu_3.3.1.Chiếu song song_3.3.2.Chiếu phối cảnh_3.4.Quan sát đối tượng 3D_3.5.Mô hình phân cấp đối tượng', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1528, 9, 'Chương 4. Biểu diễn đường và mặt cong_4.1.Biểu diễn các mặt có quy tắc_4.2.Biểu diễn đường cong, mặt cong Bezier_4.3.Biểu diễn đường cong, mặt cong B-spline', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1529, 10, 'Chương 5. Các kỹ thuật nâng cao_5.1.Khử đường, mặt khuất_5.1.1.Thuật toán Back-face_5.1.2.Thuật toán Deep buffer_5.1.3.Thuật toán Deep sorting', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1530, 11, 'Chương 5. Các kỹ thuật nâng cao (tt)_5.2.Chiếu sáng và tô bóng_5.2.1.Tô bóng hằng Lambert_5.2.2.Tô bóng nội suy Gouraud_5.2.3.Tô bóng nội suy Phong_Ôn tập', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1_A2.1_A2.2', '1_2_6', 67, '0', 146),
(1531, 1, 'Bài thực hành Lab 01', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1532, 2, 'Bài thực hành Lab 02', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1533, 3, 'Bài thực hành Lab 03', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1534, 4, 'Bài thực hành Lab 04', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1535, 5, 'Bài thực hành Lab 05', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1536, 6, 'Bài thực hành Lab 06', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1537, 7, 'Bài thực hành Lab 07', 'Làm bài thực hành', 'A2.1', '1_5', 67, '1', 146),
(1538, 1, 'Chương 1. Giới thiệu về TTNT_1.1.	Giới thiệu về TTNT_-	Khái niệm_-	Nền tảng của TTNT_-	Lịch sử và các thành tựu quan trọng_1.2.	Ứng dụng của TTNT_-	Hệ chuyên gia._-	Chatbot_-	Thị giác máy tính_-	Robtics_-	Xử lý ngôn ngữ tự nhiên', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1539, 2, 'Chương 1. Giới thiệu về TTNT  (tt)_1.1.	Tác tử thông minh_-	Tác tử và Môi truờng_-	Các kiểu môi trường_-	Các kiểu tác tử', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1540, 3, 'Chương 2. Giải quyết vấn đề_2.1.Giới thiệu_-	Các tác tử giải quyết vấn đề_-	Một số ví dụ_2.2. Tìm kiếm không có thông tin (Uninformed search):_-	Giải thuật tìm kiếm theo chiều rộng (Breadth First Search) ._-	Giải thuật tìm kiếm theo độ sâu_(Depth First Search)._-	Giải thuật tìm kiếm theo độ sâu lặp (Depth Deepening Search)', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1541, 4, 'Bài thực hành Lab 01', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1542, 5, 'Chương 2. Giải quyết vấn đề (tt)_2.3. Tìm kiếm có thông tin          (Heuristic /Informed search)_-	Hàm Heuristic_-	Tìm kiếm với chi phí cực tiểu (Uniform-Cost Search)_-	Giải thuật tìm kiếm tham lam_(Greedy Search)_-	Giải thuật tìm kiếm A*_(A* Search).', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1543, 6, 'Bài thực hành Lab 02', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1544, 7, 'Chương 2. Giải quyết vấn đề (tt)_2.4.Tìm kiếm thỏa mãn ràng buôc_-	Các kiểu bài toán thỏa mãn ràng buộc_-	Giải thuật tìm kiếm kiểm thử_-	Giải thuật tìm kiếm quay lui_-	Giải thuật tìm kiếm vét cạn', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1545, 8, 'Bài thực hành Lab 03', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1546, 9, 'Chương 2. Giải quyết vấn đề (tt)_2.5.Tìm kiếm đối kháng trong trò chơi_-	Cây trò chơi_-	Giải thuật Minimax_-	Minimax với độ sâu hạn chế_-	Minimax với cắt tỉa alpha-beta_2.6. Genetic Algorithms', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1547, 10, 'Bài thực hành Lab 04', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1548, 11, 'Chương 3. Biểu diễn và xử lý tri thức_3.1 Giới thiệu._3.2 Phân loại tri thức_3.3 Phương pháp biểu diễn tri thức._-	Biểu diễn tri thức dùng Logic mệnh dề._-	Biểu diễn tri thức dùng  Logic vị từ._-	Biểu diễn tri thức dùng luật dẫn xuất._-	Biểu diễn tri thức dùng  mạng ngữ nghĩa._3.4. Xử lý tri thức tất định bằng phương pháp suy diễn logic_-	Lập luận với tri thức tất định_-	Thuật toán suy diễn tiến._-	Thuật toán suy diễn lùi.', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1549, 12, 'Chương 3. Biểu diễn và xử lý tri thức (tt)_3.5.Xử lý tri thức bất định (không chắc chắn) bằng phương pháp suy diễn logic_-	Lập luận với tri thức không chắc chắn_-	Xử lý tri thức không chắc chắn dùng xác suất thống kê_Lý thuyết xác suất_Quy tắc Bayes', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1550, 13, 'Bài thực hành Lab 05', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1551, 14, 'Thi giữa kỳ', '', 'A1.1', '', 71, '0', 146),
(1552, 15, 'Chương 4. Học máy_4.1. Giới thiệu, phân loại học máy_4.2.Học giám sát_- Hồi quy:_Hồi quy tuyến tính', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1553, 16, 'Bài thực hành Lab 06', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1554, 17, 'Chương 4. Học máy (tt)_4.3.Học không giám sát K-NN_4.4.Giới thiệu mạng Neuron nhân tạo', 'Thuyết giảng, giải quyết vấn đề, thảo luận', 'A1.1', '1_3_4', 71, '0', 146),
(1555, 18, 'Bài thực hành Lab 07', 'Làm bài thực hành', 'A1.1', '4_5_6', 71, '0', 146),
(1574, 1, 'Giới thiệu về môn học_Chapter 1: Introduction to Computers and Programming_1.1 Why Program?_1.2 Computer Systems: Hardware and Software_1.3 Programs and Programming Languages_1.4 What is a Program Made of?_1.5 Input, Processing, and Output_1.6. The Programming Process', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1575, 2, 'Chapter 1: Introduction to Computers and Programming_1.7 Procedural and Object-Oriented Programming_1.8 Number Systems_1.9 Algorithm_Bài tập chương 1', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1576, 3, 'Chapter 2: Introduction to C++_2.1 The Part of a C++ Program_2.2 The cout Object_2.3 The #include Directive_2.4 Variables and Literals_2.5 Identifiers_2.6 Integer Data Types_2.7 The char Data Type_2.8 The C++ string Class_2.9 Floating-Point Data Types_2.10 The bool Data Type_2.11 Determining the Size of a Data Type_2.12 Variable Assignments and Initialization_2.13 Scope_2.14 Arithmetic Operators_2.15 Comments_2.16 Named Constants_2.17 Programming Style_2.18 Standard and Prestandard C++', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1577, 4, 'Chapter 3: Expressions and Interactivity_3.1 The cin Object_3.2 Mathematical Expressions_3.3 When You Mix Apples and Oranges: Type Conversion_3.4 Overflow and Underflow_3.5 Type Casting_3.6 Multiple Assignment and Combined Assignment_3.7 Formatting Output_3.8 Working with Characters and string Objects_3.9 More Mathematical Library Functions_3.10 Hand Tracing a Program_3.11A Case Study', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1578, 5, 'Chapter 4: Making Decisions_4.1 Relational Operators_4.2 The if Statement_4.3 Expanding the if Statement_4.4 The if/else Statement_4.5 Nested if Statements_4.6 The if/else if Statement_4.7 Flags_4.8 Logical Operators_4.9 Checking Numeric Ranges with Logical Operators 189_4.10 Menus_4.11 Focus on Software Engineering: Validating User Input_4.12 Comparing Characters and Strings_4.13 The Conditional Operator_4.14 The switch Statement_4.15 More About Blocks and Variable Scope', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1579, 6, 'Chapter 5: Loops and Files_5.1 The Increment and Decrement Operators_5.2 Introduction to Loops: The while Loop_5.3 Using the while Loop for Input Validation_5.4 Counters_5.5 The do-while Loop_5.6 The for Loop_5.7 Keeping a Running Total_5.8 Sentinels_5.9 Focus on Software Engineering: Deciding Which Loop to Use_5.10 Nested Loops_5.11 Using Files for Data Storage_5.12 Breaking and Continuing a Loop', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1580, 8, 'Chapter 6: Functions_6.1 Focus on Software Engineering: Modular Programming_6.2 Defining and Calling Functions_6.3 Function Prototypes_6.4 Sending Data into a Function_6.5 Passing Data by Value_6.6 Focus on Software Engineering: Using Functions in a Menu-Driven Program', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1581, 9, 'Chapter 6: Functions_6.7 The return Statement_6.8 Returning a Value from a Function_6.9 Returning a Boolean Value_6.10 Local and Global Variables_6.11 Static Local Variables_6.12 Default Arguments_6.13 Using Reference Variables, Pointers as Function Parameters_6.14 Overloading Functions_6.15 The exit() Function_6.16 Stubs and Drivers', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1582, 10, 'Chapter 7: Arrays_7.1 Arrays Hold Multiple Values_7.2 Accessing Array Elements_7.3 No Bounds Checking in C++_7.4 Array Initialization_7.5 Processing Array Contents_7.6 Using Parallel Arrays_7.7 Arrays as Function Arguments', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1583, 11, 'Chapter 7: Arrays_7.8 Two-Dimensional Arrays_7.9 Arrays with Three or More Dimensions_7.10 Introduction to the STL vector_7.11. C-Strings_Ôn tập', 'Thuyết giảng_Giải thích cụ thể_Câu hỏi gợi mở', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '0', 146),
(1584, 7, 'Kiểm tra giữa kỳ', '', 'A2.1', '2_3_4', 3, '0', 146),
(1585, 1, 'Bài thực hành Chương 2', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1586, 2, 'Bài thực hành Chương 3', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1587, 3, 'Bài thực hành Chương 4', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1588, 4, 'Bài thực hành Chương 5', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1589, 5, 'Bài thực hành Chương 5 (tt)_Bài thực hành Chương 6', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1590, 6, 'Bài thực hành Chương 6_Bài thực hành tổng hợp', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1591, 7, 'Bài thực hành Chương 7', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1592, 8, 'Bài thực hành Chương 7_Bài thực hành tổng hợp', 'Thực hành_Làm bài tập ở nhà', 'A1.1_A2.1_A3.1_A4.1', '2_3_4_5', 3, '1', 146),
(1608, 1, 'UNIT 6: OUT AND ABOUT._6.1. Vocabulary and Listening: In Town', 'a', '', '', 12, '0', 156),
(1609, 2, '6.2. Grammar: Past Simple – BE and CAN._6.3. Culture: Tourist information', 'a', '', '', 12, '0', 156),
(1610, 3, '6.4. Grammar: Past Simple:Negative and Interrogative._6.5. Reading: Out on the Town', 'a', '', '', 12, '0', 156),
(1611, 4, '6.6. Everyday English: On the Phone', 'a', '', '', 12, '0', 156),
(1612, 5, '6.7. Writing: A Message', 'a', '', '', 12, '0', 156),
(1613, 6, 'UNIT 7: WORLD FAMOUS._7.1. Vocabulary and Listening: On the Map._7.2. Grammar: Past Simple (Irregular Verbs)', 'a', '', '', 12, '0', 156),
(1614, 7, '7.3. Culture: An American Hero', 'a', '', '', 12, '0', 156),
(1615, 8, '7.4. Grammar: Past Simple - Negative and Interrogative._7.5. Reading: Inventions', 'a', '', '', 12, '0', 156),
(1616, 9, '7.6. Everyday English: Talking about Your Weekend', 'a', '', '', 12, '0', 156),
(1617, 10, '7.7. Writing: An E-mail Message. Kiểm tra giữa kỳ', 'a', '', '', 12, '0', 156),
(1618, 11, 'Unit 8: ON THE MENU._8.1. Vocabulary and Listening: Breakfast._8.2. Grammar: Some and Any, How Much and How Many', 'a', '', '', 12, '0', 156),
(1619, 12, '8.3. Culture: Traditional Dishes', 'a', '', '', 12, '0', 156),
(1620, 13, '8.4. Grammar: Articles. 8.5. Reading: Healthy Eating', 'a', '', '', 12, '0', 156),
(1621, 14, '8.6. Everyday English: In a Cafe', 'a', '', '', 12, '0', 156),
(1622, 15, '8.7. Writing: A Formal Letter. Revision', 'a', '', '', 12, '0', 156),
(1626, 1, 'ke hoach 1', 'hoat dong 1', 'A1.1_A2.1_A3.1', '1', 12, '0', 142),
(1627, 2, 'ke hoach 2', 'hoat dong 2', 'A4.1', '2', 12, '0', 142),
(1628, 3, 'ke hoach 5', 'ke hoach 6', 'A1.1', '1', 12, '0', 142),
(1629, 1, 'ke hoach 3', 'hoat dong 3', 'A1.1_A2.1_A3.1_A4.1', '1_2', 12, '1', 142),
(1630, 2, 'ke hoach 6', 'ke hoach 6', 'A2.1', '2', 12, '1', 142),
(1636, 1, 'a', 'a', 'A1.1_A2.1_A3.1_A4.1', '1', 3, '0', 142),
(1637, 2, 'b', 'b', 'A1.1_A2.1_A3.1_A4.1', '2', 3, '0', 142),
(1638, 1, 'c', 'c', 'A1.1_A2.1_A3.1_A4.1', '1_2', 3, '1', 142),
(1639, 2, 'e', 'e', 'A1.1_A2.1_A3.1_A4.1', '1_2', 3, '1', 142),
(1640, 1, 'Computer applications_1/MATCH THE PICTURE_2/LISTENING_3/READING', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1641, 2, 'Computer applications_4/LANGUAGE WORK: THE PRESENT SIMPLE PASSIVE_5/Other applications', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1642, 3, 'Computer essentials_1/WARM-UP_2/READING_3/READ AND GUESS', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1643, 4, 'Computer essentials_4/GET READY FOR LISTENING_5/LISTENING_6/ LANGUAGE WORK: COMPOUND ADJECTIVES', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1644, 5, 'Inside the system_1/WARM-UP_2/READING_3/LANGUAGE WORK: RELATIVE CLAUSES', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1645, 6, 'Inside the system_4/LISTENING_5/ YOUR IDEAL COMPUTER SYSTEM', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1646, 7, 'Bits And Bytes_1/WARM-UP_2/Word building', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1647, 8, 'Bits And Bytes_3/Bits for pictures', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1648, 9, 'Buying A Computer_1/Before you listen_2/Listening_3/Role play_4/Read and talk', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1649, 10, 'Type and click!_1/Interacting with your computer_2/Listening_3/Language work_4/About the keyboard_5/Reading', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1650, 11, 'Capture Your Favourite Image_1/The eyes of your computer_2/Listening_3/Facts and opinions_4/Language work: Comparatives and superlatives_5/Word building', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1651, 12, 'Viewing The Output_1/Warm-up_2/Reading_3/Listening_4/Language work: Instructions and advice', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Viewing The Output_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1652, 13, 'Choosing A Printer_1/Reading_2/Discourse cohesion_3/Listening_4/Language work: Revision of comparison', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về Choosing A Printer_Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1653, 14, 'I/O Devices For The Disabled_1/Adaptive technology_2/Reading', 'Giới thiệu về từ vựng, cách xây dựng, thiết kế Video để giới thiệu về I/O Devices For The Disabled', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1654, 15, 'I/O Devices For The Disabled_3/Language work: Noun phrases_4/Listening', 'Hướng dẫn thiết kế bài báo cáo, góp ý chỉnh sửa lỗi phát âm trong thuyết trình.', 'A1.1_A2.1', '1_2_3', 13, '0', 142),
(1655, 16, 'Thi cuối kỳ', '', 'A4.1', '1_2_3_4', 13, '0', 142),
(1656, 1, 'Chương 0. Giới thiệu môn học và ôn tập ngôn ngữ C++_1. Giới thiệu học phần_2. Ôn tập ngôn ngữ C++_- Con trỏ_- Hàm_- Đệ quy', 'Dạy:_- Giảng viên giới thiệu đến sinh viên mục tiêu môn học; vị trí và vai trò của môn học trong chương trình đào tạo của ngành; chuẩn đầu ra môn học, các hình thức kiểm tra đánh giá và trọng số của các bài đánh giá, nội dung học phần theo chương._- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_- Nghe giảng._- Trả lời các câu hỏi của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_- Ôn lại lý thuyết', 'A1.1', '4', 15, '0', 156),
(1657, 2, 'Chương 1. Phân tích thuật toán_1.1. Cấu trúc dữ liệu và giải thuật_1.2. Phân tích thuật toán', 'Dạy:_- Giảng bài kết hợp trình chiếu slide bài giảng._- Đặt câu hỏi cho sinh viên suy nghĩ và trả lời._Học ở lớp:_- Nghe giảng._- Trả lời các câu hỏi của giảng viên đưa ra._- Đặt câu hỏi các vấn đề quan tâm._Học ở nhà:_- Ôn lại lý thuyết._- Đọc thêm tài liệu, tìm hiểu nội dung bài mới.', 'A1.1_A2.1_A3.1_A4.1', '1_2_3_4', 15, '0', 156),
(1658, 1, 'Hàm, Con trỏ, Đệ quy', '', 'A1.1', '1_2_3_4', 15, '1', 156),
(1659, 2, 'Mảng và Danh sách liên kết', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1660, 3, 'Ngăn xếp và Hàng đợi', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1661, 4, 'Sắp xếp và tìm kiếm', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1662, 5, 'Thi giữa kỳ', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1663, 6, 'Cây', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1664, 7, 'Heap và Đồ thị', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156),
(1665, 8, 'Bảng băm', '', 'A1.1_A2.1', '1_2_3_4', 15, '1', 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_khoa`
--

CREATE TABLE `table_khoa` (
  `id` int(11) NOT NULL,
  `tenKhoa` varchar(255) DEFAULT NULL,
  `id_truongkhoa` int(11) DEFAULT NULL,
  `id_phokhoa` varchar(255) DEFAULT NULL,
  `id_giaovu` varchar(255) DEFAULT NULL,
  `fanpage` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khoa`
--

INSERT INTO `table_khoa` (`id`, `tenKhoa`, `id_truongkhoa`, `id_phokhoa`, `id_giaovu`, `fanpage`, `website`, `email`, `phone`) VALUES
(1, 'Khoa Khoa học máy tính', 9, NULL, NULL, 'http://fb.com/cs.vku.udn.vn', 'http://cs.vku.udn.vn', 'cs@vku.udn.vn', '02363667199'),
(2, 'Khoa Kỹ thuật máy tính và Điện tử', 50, NULL, NULL, 'http://fb.com/ce.vku.udn.vn', 'http://ce.vku.udn.vn', 'ce@vku.udn.vn', '02363667299'),
(3, 'Khoa Kinh tế số và Thương mại điện tử', 107, NULL, NULL, 'http://fb.com/de.vku.udn.vn', 'http://de.vku.udn.vn', 'de@vku.udn.vn', '02363667399');

-- --------------------------------------------------------

--
-- Table structure for table `table_khoahoc`
--

CREATE TABLE `table_khoahoc` (
  `id` int(11) NOT NULL,
  `khoahoc` varchar(255) DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_khoa` int(11) DEFAULT NULL,
  `tenkhoa` varchar(11) DEFAULT NULL,
  `nambatdau` varchar(255) DEFAULT NULL,
  `namketthuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khoahoc`
--

INSERT INTO `table_khoahoc` (`id`, `khoahoc`, `trangthai`, `remember_token`, `created_at`, `updated_at`, `id_khoa`, `tenkhoa`, `nambatdau`, `namketthuc`) VALUES
(1, '2017-2021', NULL, NULL, NULL, NULL, 1, 'K17', '2017', '2021'),
(2, '2017-2022', NULL, NULL, NULL, NULL, 1, 'K17', '2017', '2022'),
(3, '2018-2022', NULL, NULL, NULL, NULL, 2, 'K18', '2018', '2022'),
(4, '2018-2023', NULL, NULL, NULL, NULL, 2, 'K18', '2018', '2023'),
(5, '2019-2023', NULL, NULL, NULL, NULL, 3, 'K19', '2019', '2023'),
(6, '2019-2024', NULL, NULL, NULL, NULL, 3, 'K19', '2019', '2024'),
(7, '2020-2024', NULL, NULL, NULL, NULL, 4, 'K20', '2020', '2024'),
(8, '2020-2025', NULL, NULL, NULL, NULL, 4, 'K20', '2020', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh`
--

CREATE TABLE `table_khungchuongtrinh` (
  `id` int(11) NOT NULL,
  `tenkhungchuongtrinh` varchar(510) DEFAULT NULL,
  `id_khoa` int(11) DEFAULT NULL,
  `id_nganh` int(11) DEFAULT NULL,
  `id_trinhdo` int(11) DEFAULT NULL,
  `id_htdaotao` int(11) DEFAULT NULL,
  `id_khoahoc` int(11) DEFAULT NULL,
  `isKhungnangcao` int(11) DEFAULT NULL,
  `soTCTCbatbuoc` int(11) DEFAULT NULL,
  `sotctoithieu` int(11) DEFAULT NULL,
  `khungchung` int(11) DEFAULT NULL,
  `thoigian` float(11,0) DEFAULT NULL,
  `id_namapdung` int(11) DEFAULT NULL,
  `id_namketthuc_apdung` int(11) DEFAULT NULL,
  `apdung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khungchuongtrinh`
--

INSERT INTO `table_khungchuongtrinh` (`id`, `tenkhungchuongtrinh`, `id_khoa`, `id_nganh`, `id_trinhdo`, `id_htdaotao`, `id_khoahoc`, `isKhungnangcao`, `soTCTCbatbuoc`, `sotctoithieu`, `khungchung`, `thoigian`, `id_namapdung`, `id_namketthuc_apdung`, `apdung`) VALUES
(142, 'CTĐT Công nghệ Kỹ thuật máy tính 2019', 2, 3, 2, 1, 6, 0, 154, 154, NULL, 4, 3, NULL, NULL),
(143, 'CTĐT Công nghệ Kỹ thuật máy tính 2018', 2, 3, 2, 1, 4, 0, 154, 154, NULL, 4, 2, NULL, NULL),
(144, 'CTĐT Công nghệ Kỹ thuật máy tính 2017', 2, 3, 2, 1, 2, 0, 154, 154, NULL, 4, 1, NULL, NULL),
(145, 'CTĐT Công nghệ Kỹ thuật máy tính 2020', 2, 3, 2, 1, 8, 0, 154, 154, NULL, 4, 4, NULL, NULL),
(146, 'CTĐT Công nghệ Thông tin 2019', 1, 1, 2, 1, 6, 0, 154, 154, NULL, 4, 3, NULL, NULL),
(147, 'CTĐT Công nghệ Thông tin 2018', 1, 1, 2, 1, 4, 0, 154, 154, NULL, 4, 2, NULL, NULL),
(148, 'CTĐT Công nghệ Thông tin 2017', 1, 1, 2, 1, 2, 0, 154, 154, NULL, 4, 1, NULL, NULL),
(149, 'CTĐT Công nghệ Thông tin 2020', 1, 1, 2, 1, 8, 0, 154, 154, NULL, 4, 4, NULL, NULL),
(150, 'CTĐT Quản trị kinh doanh 2017', 3, 2, 1, 1, 1, 0, 124, 124, NULL, 4, 1, NULL, NULL),
(151, 'CTĐT Quản trị kinh doanh 2018', 3, 2, 1, 1, 3, 0, 124, 124, NULL, 4, 2, NULL, NULL),
(152, 'CTĐT Quản trị kinh doanh 2019', 3, 2, 1, 1, 5, 0, 124, 124, NULL, 4, 3, NULL, NULL),
(153, 'CTĐT Quản trị kinh doanh 2020', 3, 2, 1, 1, 7, 0, 124, 124, NULL, 4, 4, NULL, NULL),
(154, 'CTĐT Chuyên ngành Khoa học dữ liệu vào Trí tuệ nhân tạo 2020', 1, 4, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(155, 'CTĐT Chuyên ngành Thiết Kế mỹ thuật số 2020', 1, 5, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(156, 'CTĐT Chuyên ngành Kỹ thuật phần mềm 2020', 1, 8, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(157, 'CTĐT Chuyên ngành An toàn thông tin và Mạng máy tính 2020', 1, 9, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(158, 'CTĐT Chuyên ngành IoT- Robotics 2020', 1, 10, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(159, 'CTĐT Chuyên ngành Truyền thông đa phương tiện 2020', 1, 11, 2, 1, 8, 149, NULL, NULL, NULL, 4, 4, NULL, NULL),
(160, 'CTĐT Quản trị Thương mại điện tử 2020', 3, 13, 1, 1, 7, 153, NULL, NULL, NULL, 4, 4, NULL, NULL),
(161, 'CTĐT Chuyên ngành Digital marketing 2020', 3, 12, 1, 1, 7, 153, NULL, NULL, NULL, 4, 4, NULL, NULL),
(162, 'CTĐT Chuyên ngành Cử nhân toàn cầu (Global BA) 2020', 3, 2, 1, 1, 7, 153, NULL, NULL, NULL, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh_hocphan`
--

CREATE TABLE `table_khungchuongtrinh_hocphan` (
  `id` int(11) NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `hocky` int(11) DEFAULT NULL,
  `id_khung` int(11) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `id_hocphan_thaythe` varchar(255) DEFAULT NULL,
  `tienquyet` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hoctruoc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `songhanh` varchar(255) DEFAULT NULL,
  `tuongduong` varchar(255) DEFAULT NULL,
  `hocghep` varchar(255) DEFAULT NULL,
  `tuchon` bit(1) DEFAULT NULL,
  `da_chuyennganh` int(11) DEFAULT NULL,
  `da_totnghiep` int(11) DEFAULT NULL,
  `khoikienthuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khungchuongtrinh_hocphan`
--

INSERT INTO `table_khungchuongtrinh_hocphan` (`id`, `stt`, `hocky`, `id_khung`, `id_hocphan`, `id_hocphan_thaythe`, `tienquyet`, `hoctruoc`, `songhanh`, `tuongduong`, `hocghep`, `tuchon`, `da_chuyennganh`, `da_totnghiep`, `khoikienthuc`) VALUES
(23, 5, 1, 146, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(24, 9, 2, 146, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(25, 3, 3, 146, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(26, 2, 1, 146, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(27, 4, 4, 146, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(28, 4, 1, 146, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(29, 4, 2, 146, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(30, 7, 1, 146, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(32, 6, 4, 146, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(34, 3, 1, 146, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(35, 7, 2, 146, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(36, 7, 3, 146, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(37, 5, 2, 146, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(38, 1, 1, 146, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(39, 1, 2, 146, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(40, 8, 2, 146, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(41, 6, 1, 146, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(42, 1, 4, 146, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(43, 2, 3, 146, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(44, 2, 4, 146, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(45, 2, 5, 146, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(47, 9, 3, 146, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(48, 4, 3, 146, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(49, 3, 4, 146, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(50, 8, 3, 146, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(52, 2, 2, 146, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(53, 4, 5, 146, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(54, 3, 2, 146, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(55, 1, 3, 146, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(56, 7, 4, 146, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(57, 3, 5, 146, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(60, 6, 3, 146, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(61, 8, 4, 146, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(62, 6, 2, 146, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(64, 1, 5, 146, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(65, 8, 5, 146, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(67, 5, 3, 146, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(70, 5, 4, 146, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(76, 6, 5, 146, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(81, 5, 5, 146, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(92, 7, 5, 146, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(144, 1, 1, 150, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(145, 2, 1, 150, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(146, 3, 1, 150, 2, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(147, 4, 1, 150, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(148, 5, 1, 150, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(149, 6, 1, 150, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(151, 7, 1, 150, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(152, 1, 2, 150, 25, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(153, 2, 2, 150, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(154, 3, 2, 150, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(155, 4, 2, 150, 26, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(156, 5, 2, 150, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(157, 6, 2, 150, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(158, 7, 2, 150, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(159, 1, 3, 150, 45, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(160, 2, 3, 150, 41, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(161, 3, 3, 150, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(162, 4, 3, 150, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(163, 5, 3, 150, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(164, 6, 3, 150, 44, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(165, 7, 3, 150, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(166, 1, 4, 150, 62, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(167, 2, 4, 150, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(168, 1, 5, 150, 76, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(169, 2, 5, 150, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(170, 3, 5, 150, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(171, 4, 5, 150, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(172, 5, 5, 150, 74, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(173, 6, 5, 150, 75, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(174, 1, 6, 150, 83, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(175, 2, 6, 150, 82, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(176, 3, 6, 150, 80, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(177, 4, 6, 150, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(178, 5, 6, 150, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(179, 6, 6, 150, 84, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(180, 1, 7, 150, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(181, 2, 7, 150, 102, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(182, 3, 7, 150, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(183, 4, 7, 150, 103, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(184, 5, 7, 150, 104, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(185, 6, 7, 150, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(186, 7, 7, 150, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(187, 1, 1, 156, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(188, 2, 1, 156, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(189, 3, 1, 156, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(190, 4, 1, 156, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(191, 5, 1, 156, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(192, 6, 1, 156, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(193, 7, 1, 156, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(194, 1, 2, 156, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(195, 2, 2, 156, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(196, 3, 2, 156, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(197, 4, 2, 156, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(198, 5, 2, 156, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(199, 6, 2, 156, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(200, 7, 2, 156, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(201, 8, 2, 156, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(202, 9, 2, 156, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(203, 1, 3, 156, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(204, 1, 1, 154, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(205, 2, 3, 156, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(206, 3, 3, 156, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(207, 4, 3, 156, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(208, 5, 3, 156, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(209, 6, 3, 156, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(210, 7, 3, 156, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(211, 8, 3, 156, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(212, 1, 4, 156, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(213, 2, 4, 156, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(214, 3, 4, 156, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(215, 4, 4, 156, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(216, 5, 4, 156, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(217, 6, 4, 156, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(218, 7, 4, 156, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(219, 8, 4, 156, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(220, 1, 5, 156, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(221, 2, 5, 156, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(222, 3, 5, 156, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(223, 4, 5, 156, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(224, 5, 5, 156, 245, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(225, 6, 5, 156, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(226, 7, 5, 156, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(227, 8, 5, 156, 246, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(228, 1, 6, 156, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(229, 2, 6, 156, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(230, 3, 6, 156, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(231, 4, 6, 156, 247, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(232, 5, 6, 156, 248, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(233, 6, 6, 156, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(234, 7, 6, 156, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(235, 8, 6, 156, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(236, 1, 7, 156, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(237, 2, 7, 156, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(238, 3, 7, 156, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(239, 4, 7, 156, 251, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(240, 5, 7, 156, 252, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(241, 6, 7, 156, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(242, 7, 7, 156, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(243, 8, 7, 156, 253, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(245, 9, 7, 156, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(246, 1, 8, 156, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(247, 2, 8, 156, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(248, 3, 8, 156, 255, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(249, 4, 8, 156, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(250, 5, 8, 156, 256, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(251, 6, 8, 156, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(252, 7, 8, 156, 85, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(253, 8, 8, 156, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(254, 2, 1, 154, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(255, 3, 1, 154, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(256, 4, 1, 154, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(257, 5, 1, 154, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(258, 6, 1, 154, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(259, 7, 1, 154, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(260, 1, 2, 154, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(261, 2, 2, 154, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(262, 3, 2, 154, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(263, 4, 2, 154, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(264, 6, 2, 154, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(265, 5, 2, 154, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(266, 7, 2, 154, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(267, 8, 2, 154, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(268, 9, 2, 154, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(269, 1, 3, 154, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(270, 2, 3, 154, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(271, 3, 3, 154, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(272, 4, 3, 154, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(273, 5, 3, 154, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(274, 6, 3, 154, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(275, 7, 3, 154, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(276, 8, 3, 154, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(277, 1, 4, 154, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(278, 2, 4, 154, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(279, 3, 4, 154, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(280, 4, 4, 154, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(281, 5, 4, 154, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(282, 6, 4, 154, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(283, 7, 4, 154, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(284, 8, 4, 154, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(285, 1, 5, 154, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(286, 2, 5, 154, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(287, 3, 5, 154, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(288, 4, 5, 154, 260, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(289, 5, 5, 154, 261, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(290, 6, 5, 154, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(291, 7, 5, 154, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(292, 1, 6, 154, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(293, 2, 6, 154, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(294, 3, 6, 154, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(295, 4, 6, 154, 262, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(296, 5, 6, 154, 247, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(297, 6, 6, 154, 100, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(298, 7, 6, 154, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(299, 8, 6, 154, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(300, 1, 7, 154, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(301, 2, 7, 154, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(302, 3, 7, 154, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(303, 4, 7, 154, 263, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(304, 5, 7, 154, 264, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(305, 6, 7, 154, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(306, 7, 7, 154, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(307, 8, 7, 154, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(308, 1, 8, 154, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(309, 2, 8, 154, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(310, 3, 8, 154, 265, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(311, 4, 8, 154, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(312, 5, 8, 154, 174, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(313, 6, 8, 154, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(314, 7, 8, 154, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(315, 8, 8, 154, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(316, 1, 1, 157, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(317, 2, 1, 157, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(318, 3, 1, 157, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(319, 4, 1, 157, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(320, 5, 1, 157, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(321, 6, 1, 157, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(323, 7, 1, 157, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(324, 1, 2, 157, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(325, 2, 2, 157, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(326, 3, 2, 157, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(327, 4, 2, 157, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(328, 5, 2, 157, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(329, 6, 2, 157, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(330, 7, 2, 157, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(331, 8, 2, 157, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(332, 9, 2, 157, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(333, 1, 3, 157, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(334, 2, 3, 157, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(335, 3, 3, 157, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(336, 4, 3, 157, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(337, 5, 3, 157, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(338, 6, 3, 157, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(339, 7, 3, 157, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(340, 8, 3, 157, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(341, 1, 4, 157, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(342, 2, 4, 157, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(343, 3, 4, 157, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(344, 4, 4, 157, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(345, 5, 4, 157, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(346, 6, 4, 157, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(347, 7, 4, 157, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(348, 8, 4, 157, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(349, 1, 5, 157, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(350, 2, 5, 157, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(351, 3, 5, 157, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(352, 4, 5, 157, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(353, 5, 5, 157, 245, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(354, 6, 5, 157, 267, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(355, 7, 5, 157, 268, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(356, 8, 5, 157, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(357, 1, 6, 157, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(358, 2, 6, 157, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(359, 3, 6, 157, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(360, 4, 6, 157, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(361, 5, 6, 157, 269, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(362, 6, 6, 157, 85, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(363, 7, 6, 157, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(364, 8, 6, 157, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(365, 1, 7, 157, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(366, 2, 7, 157, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(367, 3, 7, 157, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(368, 4, 7, 157, 260, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(369, 5, 7, 157, 270, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(370, 6, 7, 157, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(371, 7, 7, 157, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(372, 8, 7, 157, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(373, 1, 8, 157, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(374, 2, 8, 157, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(375, 3, 8, 157, 271, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(376, 4, 8, 157, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(377, 5, 8, 157, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(378, 6, 8, 157, 272, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(379, 7, 8, 157, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(380, 8, 8, 157, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(381, 1, 1, 158, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(382, 2, 1, 158, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(383, 3, 1, 158, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(384, 4, 1, 158, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(385, 5, 1, 158, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(386, 6, 1, 158, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(387, 7, 1, 158, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(388, 1, 2, 158, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(389, 2, 2, 158, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(390, 3, 2, 158, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(391, 4, 2, 158, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(392, 5, 2, 158, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(393, 6, 2, 158, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(394, 7, 2, 158, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(395, 8, 2, 158, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(396, 9, 2, 158, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(397, 1, 3, 158, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(398, 2, 3, 158, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(399, 3, 3, 158, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(400, 4, 3, 158, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(401, 5, 3, 158, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(402, 6, 3, 158, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(403, 7, 3, 158, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(404, 8, 3, 158, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(405, 1, 4, 158, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(406, 2, 4, 158, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(407, 3, 4, 158, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(408, 4, 4, 158, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(409, 5, 4, 158, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(410, 6, 4, 158, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(411, 7, 4, 158, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(412, 8, 4, 158, 195, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(413, 1, 5, 158, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(414, 2, 5, 158, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(415, 3, 5, 158, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(416, 4, 5, 158, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(417, 5, 5, 158, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(418, 6, 5, 158, 274, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(419, 7, 5, 158, 275, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(420, 8, 5, 158, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(421, 1, 6, 158, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(422, 2, 6, 158, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(423, 3, 6, 158, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(424, 4, 6, 158, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(425, 5, 6, 158, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(426, 6, 6, 158, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(427, 7, 6, 158, 100, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(428, 8, 6, 158, 276, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(429, 1, 7, 158, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(430, 2, 7, 158, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(431, 3, 7, 158, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(432, 4, 7, 158, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(433, 5, 7, 158, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(434, 6, 7, 158, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(435, 7, 7, 158, 277, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(436, 8, 7, 158, 101, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(437, 9, 7, 158, 92, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(438, 1, 8, 158, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(439, 2, 8, 158, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(440, 3, 8, 158, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(441, 4, 8, 158, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(442, 5, 8, 158, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(443, 6, 8, 158, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(444, 7, 8, 158, 278, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(445, 8, 8, 158, 279, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(446, 1, 1, 159, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(447, 2, 1, 159, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(448, 3, 1, 159, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(449, 4, 1, 159, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(450, 5, 1, 159, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(451, 6, 1, 159, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(452, 7, 1, 159, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(453, 1, 2, 159, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(454, 2, 2, 159, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(455, 3, 2, 159, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(456, 4, 2, 159, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(457, 5, 2, 159, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(458, 6, 2, 159, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(459, 7, 2, 159, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(460, 8, 2, 159, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(461, 9, 2, 159, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(462, 1, 3, 159, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(463, 2, 3, 159, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(464, 3, 3, 159, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(465, 4, 3, 159, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(466, 5, 3, 159, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(467, 6, 3, 159, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(468, 7, 3, 159, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(469, 8, 3, 159, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(470, 1, 4, 159, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(471, 2, 4, 159, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(472, 3, 4, 159, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(473, 4, 4, 159, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(474, 5, 4, 159, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(475, 6, 4, 159, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(476, 7, 4, 159, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(477, 8, 4, 159, 280, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(478, 9, 4, 159, 281, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(479, 1, 5, 159, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(480, 2, 5, 159, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(481, 3, 5, 159, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(482, 4, 5, 159, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(483, 5, 5, 159, 282, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(484, 6, 5, 159, 283, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(485, 7, 5, 159, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(486, 8, 5, 159, 284, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(487, 1, 6, 159, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(488, 2, 6, 159, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(489, 3, 6, 159, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(490, 4, 6, 159, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(491, 5, 6, 159, 285, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(492, 6, 6, 159, 286, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(493, 7, 6, 159, 287, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(494, 8, 6, 159, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(495, 1, 7, 159, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(496, 2, 7, 159, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(497, 3, 7, 159, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(498, 4, 7, 159, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(499, 5, 7, 159, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(500, 6, 7, 159, 161, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(501, 7, 7, 159, 288, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(502, 8, 7, 159, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(503, 9, 7, 159, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(504, 1, 8, 159, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(505, 2, 8, 159, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(506, 3, 8, 159, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(507, 4, 8, 159, 289, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(508, 5, 8, 159, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(509, 6, 8, 159, 162, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(510, 7, 8, 159, 290, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(511, 8, 8, 159, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(512, 1, 1, 155, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(513, 2, 1, 155, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(514, 3, 1, 155, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(515, 4, 1, 155, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(516, 5, 1, 155, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(517, 6, 1, 155, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(518, 7, 1, 155, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(519, 1, 2, 155, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(520, 2, 2, 155, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(521, 3, 2, 155, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(522, 4, 2, 155, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(523, 5, 2, 155, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(524, 6, 2, 155, 259, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(525, 7, 2, 155, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(526, 8, 2, 155, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(527, 9, 2, 155, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(528, 1, 3, 155, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(529, 2, 3, 155, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(530, 3, 3, 155, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(531, 4, 3, 155, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(532, 5, 3, 155, 188, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(533, 6, 3, 155, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(534, 7, 3, 155, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(535, 8, 3, 155, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(536, 1, 4, 155, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(537, 2, 4, 155, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(538, 3, 4, 155, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(539, 4, 4, 155, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(540, 5, 4, 155, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(541, 6, 4, 155, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(542, 7, 4, 155, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(543, 8, 4, 155, 280, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(544, 9, 4, 155, 281, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(545, 1, 5, 155, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(546, 2, 5, 155, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(547, 3, 5, 155, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(548, 4, 5, 155, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(549, 5, 5, 155, 282, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(550, 6, 5, 155, 119, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(551, 7, 5, 155, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(552, 8, 5, 155, 152, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(553, 1, 6, 155, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(554, 2, 6, 155, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(555, 3, 6, 155, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(556, 4, 6, 155, 291, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(557, 5, 6, 155, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(558, 6, 6, 155, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(559, 7, 6, 155, 285, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(560, 8, 6, 155, 287, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(561, 1, 7, 155, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(562, 2, 7, 155, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(563, 3, 7, 155, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(564, 4, 7, 155, 148, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(565, 5, 7, 155, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(566, 6, 7, 155, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(567, 7, 7, 155, 292, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(568, 8, 7, 155, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(569, 9, 7, 155, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(570, 1, 8, 155, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(571, 2, 8, 155, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(572, 3, 8, 155, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(573, 4, 8, 155, 293, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(574, 5, 8, 155, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(575, 6, 8, 155, 149, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(576, 7, 8, 155, 294, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(577, 8, 8, 155, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(578, 1, 1, 160, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(579, 2, 1, 160, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(580, 3, 1, 160, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(581, 4, 1, 160, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(582, 5, 1, 160, 94, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(583, 6, 1, 160, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(584, 1, 2, 160, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(585, 2, 2, 160, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(586, 3, 2, 160, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(587, 4, 2, 160, 95, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(588, 5, 2, 160, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(589, 6, 2, 160, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(590, 7, 2, 160, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(591, 8, 2, 160, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(592, 1, 3, 160, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(593, 2, 3, 160, 198, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(594, 3, 3, 160, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(595, 4, 3, 160, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(596, 5, 3, 160, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(597, 6, 3, 160, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(598, 7, 3, 160, 189, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(599, 8, 3, 160, 115, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(600, 1, 4, 160, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(601, 2, 4, 160, 296, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(602, 3, 4, 160, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(603, 4, 4, 160, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(604, 5, 4, 160, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(605, 6, 4, 160, 297, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(606, 7, 4, 160, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(607, 8, 4, 160, 107, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(608, 9, 4, 160, 136, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(609, 10, 4, 160, 59, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(610, 11, 4, 160, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(611, 1, 5, 160, 75, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(612, 2, 5, 160, 62, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(613, 3, 5, 160, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(614, 4, 5, 160, 80, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(615, 5, 5, 160, 83, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(616, 6, 5, 160, 298, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(617, 7, 5, 160, 299, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(618, 8, 5, 160, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(619, 1, 6, 160, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(620, 2, 6, 160, 56, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(621, 3, 6, 160, 300, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(622, 4, 6, 160, 190, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(623, 5, 6, 160, 302, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(624, 6, 6, 160, 104, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(625, 7, 6, 160, 140, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(626, 8, 6, 160, 303, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(627, 9, 6, 160, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(628, 1, 7, 160, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(629, 2, 7, 160, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(630, 1, 1, 161, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(631, 2, 1, 161, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(632, 3, 1, 161, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(633, 4, 1, 161, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(634, 5, 1, 161, 94, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(635, 6, 1, 161, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(636, 1, 2, 161, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(637, 2, 2, 161, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(638, 3, 2, 161, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(639, 4, 2, 161, 95, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(640, 5, 2, 161, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(641, 6, 2, 161, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(642, 7, 2, 161, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(643, 8, 2, 161, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(644, 1, 3, 161, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(645, 2, 3, 161, 198, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(646, 3, 3, 161, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(647, 4, 3, 161, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(648, 5, 3, 161, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(649, 6, 3, 161, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(651, 7, 3, 161, 189, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(652, 8, 3, 161, 115, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(653, 1, 4, 161, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(654, 2, 4, 161, 296, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(655, 3, 4, 161, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(656, 4, 4, 161, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(657, 5, 4, 161, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(658, 6, 4, 161, 297, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(659, 7, 4, 161, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(660, 8, 4, 161, 107, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(661, 9, 4, 161, 136, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(662, 1, 5, 161, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(663, 2, 5, 161, 76, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(664, 3, 5, 161, 45, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(665, 4, 5, 161, 140, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(666, 5, 5, 161, 304, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(667, 6, 5, 161, 305, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(668, 7, 5, 161, 306, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(669, 8, 5, 161, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(670, 1, 6, 161, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(671, 2, 6, 161, 56, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(672, 3, 6, 161, 300, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(673, 4, 6, 161, 307, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(674, 5, 6, 161, 308, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(675, 6, 6, 161, 309, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(676, 7, 6, 161, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(677, 8, 6, 161, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(678, 1, 7, 161, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(679, 2, 7, 161, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(680, 3, 7, 161, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(681, 1, 1, 162, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(682, 2, 1, 162, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(683, 3, 1, 162, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(684, 4, 1, 162, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(685, 5, 1, 162, 94, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(686, 6, 1, 162, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(687, 1, 2, 162, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(688, 2, 2, 162, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(689, 3, 2, 162, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(690, 4, 2, 162, 95, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(691, 5, 2, 162, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(692, 6, 2, 162, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(693, 7, 2, 162, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(694, 8, 2, 162, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(695, 1, 3, 162, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(696, 2, 3, 162, 198, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(697, 3, 3, 162, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(698, 4, 3, 162, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(699, 5, 3, 162, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(700, 6, 3, 162, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(701, 7, 3, 162, 189, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(702, 8, 3, 162, 115, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(703, 1, 4, 162, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(704, 2, 4, 162, 296, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(705, 3, 4, 162, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(706, 4, 4, 162, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(707, 5, 4, 162, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(708, 6, 4, 162, 297, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(709, 7, 4, 162, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(710, 8, 4, 162, 107, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(711, 9, 4, 162, 136, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(712, 1, 5, 162, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(713, 2, 5, 162, 76, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(714, 3, 5, 162, 45, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(715, 4, 5, 162, 140, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(716, 5, 5, 162, 304, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(717, 6, 5, 162, 305, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(718, 7, 5, 162, 306, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(719, 8, 5, 162, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(720, 1, 6, 162, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(721, 2, 6, 162, 56, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(722, 3, 6, 162, 300, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(723, 4, 6, 162, 307, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(724, 5, 6, 162, 308, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(725, 6, 6, 162, 309, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(726, 7, 6, 162, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(727, 8, 6, 162, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(728, 1, 7, 162, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(729, 2, 7, 162, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(730, 3, 7, 162, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(773, 1, 1, 152, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(774, 2, 1, 152, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(775, 3, 1, 152, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(776, 4, 1, 152, 2, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(777, 5, 1, 152, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(778, 6, 1, 152, 94, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(779, 7, 1, 152, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(780, 1, 2, 152, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(781, 2, 2, 152, 95, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(782, 3, 2, 152, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(783, 4, 2, 152, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(784, 5, 2, 152, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(785, 6, 2, 152, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(786, 7, 2, 152, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(787, 1, 3, 152, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(788, 2, 3, 152, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(789, 3, 3, 152, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(790, 4, 3, 152, 45, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(791, 5, 3, 152, 44, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(792, 6, 3, 152, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5);
INSERT INTO `table_khungchuongtrinh_hocphan` (`id`, `stt`, `hocky`, `id_khung`, `id_hocphan`, `id_hocphan_thaythe`, `tienquyet`, `hoctruoc`, `songhanh`, `tuongduong`, `hocghep`, `tuchon`, `da_chuyennganh`, `da_totnghiep`, `khoikienthuc`) VALUES
(793, 1, 4, 152, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(794, 2, 4, 152, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(795, 3, 4, 152, 59, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(796, 4, 4, 152, 58, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(797, 5, 4, 152, 60, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(798, 6, 4, 152, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(799, 7, 4, 152, 62, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(800, 1, 5, 152, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(801, 2, 5, 152, 74, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(802, 3, 5, 152, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(803, 4, 5, 152, 76, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(804, 5, 5, 152, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(805, 6, 5, 152, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(806, 7, 5, 152, 25, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(807, 1, 6, 152, 84, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(808, 2, 6, 152, 104, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(809, 3, 6, 152, 83, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(810, 4, 6, 152, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(811, 5, 6, 152, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(812, 1, 7, 152, 102, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(813, 2, 7, 152, 56, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(814, 3, 7, 152, 82, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(815, 4, 7, 152, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(816, 5, 7, 152, 103, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(817, 6, 7, 152, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(818, 1, 6, 146, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(819, 2, 6, 146, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(820, 3, 6, 146, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(821, 4, 6, 146, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(822, 1, 7, 146, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(823, 2, 7, 146, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(824, 3, 7, 146, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(825, 4, 7, 146, 97, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(826, 5, 7, 146, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(827, 1, 8, 146, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(828, 2, 8, 146, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(829, 3, 8, 146, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(830, 4, 8, 146, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(831, 1, 9, 146, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(832, 1, 1, 147, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(833, 2, 1, 147, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(834, 3, 1, 147, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(835, 4, 1, 147, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(836, 5, 1, 147, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(837, 6, 1, 147, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(838, 7, 1, 147, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(839, 1, 2, 147, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(840, 2, 2, 147, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(841, 3, 2, 147, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(842, 4, 2, 147, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(843, 5, 2, 147, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(844, 6, 2, 147, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(845, 7, 2, 147, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(846, 8, 2, 147, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(847, 9, 2, 147, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(848, 1, 3, 147, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(849, 2, 3, 147, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(850, 3, 3, 147, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(851, 4, 3, 147, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(852, 5, 3, 147, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(853, 6, 3, 147, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(854, 7, 3, 147, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(855, 8, 3, 147, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(856, 9, 3, 147, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(857, 1, 4, 147, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(858, 2, 4, 147, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(859, 3, 4, 147, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(860, 4, 4, 147, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(861, 5, 4, 147, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(862, 6, 4, 147, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(863, 7, 4, 147, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(864, 8, 4, 147, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(865, 1, 5, 147, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(866, 2, 5, 147, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(867, 3, 5, 147, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(868, 4, 5, 147, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(869, 5, 5, 147, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(870, 6, 5, 147, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(871, 7, 5, 147, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(872, 8, 5, 147, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(873, 1, 6, 147, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(874, 2, 6, 147, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(875, 3, 6, 147, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(876, 4, 6, 147, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(877, 1, 7, 147, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(878, 2, 7, 147, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(879, 3, 7, 147, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(880, 4, 7, 147, 97, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(881, 5, 7, 147, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(882, 1, 8, 147, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(883, 2, 8, 147, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(884, 3, 8, 147, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(885, 4, 8, 147, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(886, 1, 9, 147, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(887, 1, 1, 148, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(888, 2, 1, 148, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(889, 3, 1, 148, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(890, 4, 1, 148, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(891, 5, 1, 148, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(892, 6, 1, 148, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(893, 7, 1, 148, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(894, 1, 2, 148, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(895, 2, 2, 148, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(896, 3, 2, 148, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(897, 4, 2, 148, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(898, 5, 2, 148, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(899, 6, 2, 148, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(900, 7, 2, 148, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(901, 8, 2, 148, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(902, 9, 2, 148, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(903, 1, 3, 148, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(904, 2, 3, 148, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(905, 3, 3, 148, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(906, 4, 3, 148, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(907, 5, 3, 148, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(908, 6, 3, 148, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(909, 7, 3, 148, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(910, 8, 3, 148, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(911, 9, 3, 148, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(912, 1, 4, 148, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(913, 2, 4, 148, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(914, 3, 4, 148, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(915, 4, 4, 148, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(916, 5, 4, 148, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(917, 6, 4, 148, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(918, 7, 4, 148, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(919, 8, 4, 148, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(920, 1, 5, 148, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(921, 2, 5, 148, 65, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(922, 3, 5, 148, 66, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(923, 4, 5, 148, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(924, 5, 5, 148, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(925, 6, 5, 148, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(926, 7, 5, 148, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(927, 8, 5, 148, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(928, 1, 6, 148, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(929, 2, 6, 148, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(930, 3, 6, 148, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(931, 4, 6, 148, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(932, 1, 7, 148, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(933, 2, 7, 148, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(934, 3, 7, 148, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(935, 4, 7, 148, 97, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(936, 5, 7, 148, 98, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(937, 1, 8, 148, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(938, 2, 8, 148, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(939, 3, 8, 148, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(940, 4, 8, 148, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(942, 1, 1, 142, 12, '1_4', '1_11_59_3', '1_9', '1_59', '1_11', '22_59_2', b'1', NULL, NULL, 1),
(943, 2, 1, 142, 3, '22', '22_19_21_17', '17_6', '15', '9_24', '9', b'1', NULL, NULL, 1),
(944, 4, 1, 142, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(945, 3, 1, 142, 10, NULL, '12', NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(946, 5, 1, 142, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(947, 6, 1, 142, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(948, 7, 1, 142, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(949, 1, 2, 142, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(950, 2, 2, 142, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(951, 3, 2, 142, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(952, 4, 2, 142, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(953, 5, 2, 142, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(954, 6, 2, 142, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(955, 7, 2, 142, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(956, 8, 2, 142, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(957, 9, 2, 142, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(958, 1, 3, 142, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(959, 2, 3, 142, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(960, 3, 3, 142, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(961, 4, 3, 142, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(962, 5, 3, 142, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(963, 6, 3, 142, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(964, 7, 3, 142, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(965, 8, 3, 142, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(966, 9, 3, 142, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(967, 1, 4, 142, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(968, 2, 4, 142, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(969, 3, 4, 142, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(970, 4, 4, 142, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(971, 5, 4, 142, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(972, 6, 4, 142, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(973, 7, 4, 142, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(974, 8, 4, 142, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(975, 9, 4, 142, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(976, 1, 5, 142, 193, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(977, 2, 5, 142, 238, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(978, 3, 5, 142, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(979, 4, 5, 142, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(980, 5, 5, 142, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(981, 6, 5, 142, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(982, 7, 5, 142, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(983, 8, 5, 142, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(984, 1, 6, 142, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(985, 2, 6, 142, 92, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(986, 3, 6, 142, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(987, 4, 6, 142, 85, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(988, 5, 6, 142, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(989, 6, 6, 142, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(990, 7, 6, 142, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(991, 8, 6, 142, 91, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(992, 1, 7, 142, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(993, 2, 7, 142, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(994, 3, 7, 142, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(995, 4, 7, 142, 101, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(996, 5, 7, 142, 199, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(997, 6, 7, 142, 173, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(998, 7, 7, 142, 99, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(999, 1, 8, 142, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1000, 2, 8, 142, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1001, 3, 8, 142, 111, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1002, 4, 8, 142, 112, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1003, 5, 8, 142, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1004, 6, 8, 142, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1005, 1, 9, 142, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1006, 1, 1, 143, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1007, 2, 1, 143, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1008, 3, 1, 143, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1009, 4, 1, 143, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1010, 5, 1, 143, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1011, 6, 1, 143, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1012, 7, 1, 143, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1013, 1, 2, 143, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1014, 2, 2, 143, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1015, 3, 2, 143, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1016, 4, 2, 143, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1017, 5, 2, 143, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1018, 6, 2, 143, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1019, 7, 2, 143, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1020, 8, 2, 143, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1021, 9, 2, 143, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1022, 1, 3, 143, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1023, 2, 3, 143, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1024, 3, 3, 143, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1025, 4, 3, 143, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1026, 5, 3, 143, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1027, 6, 3, 143, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1028, 7, 3, 143, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1029, 8, 3, 143, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1030, 9, 3, 143, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1031, 1, 4, 143, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1032, 2, 4, 143, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1033, 3, 4, 143, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1034, 4, 4, 143, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1035, 5, 4, 143, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1036, 6, 4, 143, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1037, 7, 4, 143, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1038, 8, 4, 143, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1039, 9, 4, 143, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1040, 1, 5, 143, 193, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1041, 2, 5, 143, 238, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1042, 3, 5, 143, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1043, 4, 5, 143, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1044, 5, 5, 143, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1045, 6, 5, 143, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1046, 7, 5, 143, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1047, 8, 5, 143, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1048, 1, 6, 143, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1049, 2, 6, 143, 92, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1050, 3, 6, 143, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1051, 4, 6, 143, 85, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1052, 5, 6, 143, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1053, 6, 6, 143, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1054, 7, 6, 143, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1055, 8, 6, 143, 91, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1056, 1, 7, 143, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1057, 2, 7, 143, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1058, 3, 7, 143, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1059, 4, 7, 143, 101, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1060, 5, 7, 143, 199, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1061, 6, 7, 143, 173, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1062, 7, 7, 143, 99, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1063, 1, 8, 143, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1064, 2, 8, 143, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1065, 3, 8, 143, 111, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1066, 4, 8, 143, 112, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1067, 5, 8, 143, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1068, 6, 8, 143, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1070, 1, 9, 143, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1071, 1, 1, 144, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1072, 2, 1, 144, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1073, 3, 1, 144, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1074, 4, 1, 144, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1075, 5, 1, 144, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1076, 6, 1, 144, 6, '200', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1077, 7, 1, 144, 9, '196', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1078, 1, 2, 144, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1079, 2, 2, 144, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1080, 3, 2, 144, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1081, 4, 2, 144, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1082, 5, 2, 144, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1083, 6, 2, 144, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1084, 7, 2, 144, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1085, 8, 2, 144, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1086, 9, 2, 144, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1087, 1, 3, 144, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1088, 2, 3, 144, 39, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1089, 3, 3, 144, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1090, 4, 3, 144, 35, '239', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1091, 5, 3, 144, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1092, 6, 3, 144, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1093, 7, 3, 144, 31, '188', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1094, 8, 3, 144, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1095, 9, 3, 144, 38, '43', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1096, 1, 4, 144, 49, '178', NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1097, 2, 4, 144, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1098, 3, 4, 144, 46, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1099, 4, 4, 144, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1100, 5, 4, 144, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1101, 6, 4, 144, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1102, 7, 4, 144, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1103, 8, 4, 144, 52, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1104, 9, 4, 144, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1105, 1, 5, 144, 193, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1106, 2, 5, 144, 238, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1107, 3, 5, 144, 71, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1108, 4, 5, 144, 67, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1109, 5, 5, 144, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1110, 6, 5, 144, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1111, 7, 5, 144, 70, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1112, 8, 5, 144, 69, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1113, 1, 6, 144, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1114, 2, 6, 144, 92, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1115, 3, 6, 144, 87, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1116, 4, 6, 144, 85, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1117, 5, 6, 144, 88, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1118, 6, 6, 144, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1119, 7, 6, 144, 90, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1120, 8, 6, 144, 91, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1121, 1, 7, 144, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1122, 2, 7, 144, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1123, 3, 7, 144, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1124, 4, 7, 144, 101, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1125, 5, 7, 144, 199, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1126, 6, 7, 144, 173, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1127, 7, 7, 144, 99, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1128, 1, 8, 144, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1129, 2, 8, 144, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1130, 3, 8, 144, 111, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1131, 4, 8, 144, 112, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1132, 5, 8, 144, 110, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1133, 6, 8, 144, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1134, 1, 9, 144, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1135, 1, 1, 145, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1136, 2, 1, 145, 10, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1137, 3, 1, 145, 7, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1138, 4, 1, 145, 3, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1139, 5, 1, 145, 6, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1140, 6, 1, 145, 9, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1141, 7, 1, 145, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1142, 1, 2, 145, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1143, 2, 2, 145, 24, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1144, 3, 2, 145, 20, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1145, 4, 2, 145, 15, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1146, 5, 2, 145, 16, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1147, 6, 2, 145, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1148, 7, 2, 145, 17, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1149, 8, 2, 145, 21, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1150, 9, 2, 145, 19, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1151, 1, 3, 145, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1152, 2, 3, 145, 178, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1153, 3, 3, 145, 179, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1154, 4, 3, 145, 35, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1155, 5, 3, 145, 36, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1156, 6, 3, 145, 32, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1157, 7, 3, 145, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1158, 8, 3, 145, 195, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1159, 1, 4, 145, 244, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1160, 2, 4, 145, 55, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1161, 3, 4, 145, 54, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1162, 4, 4, 145, 51, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1163, 5, 4, 145, 48, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1164, 6, 4, 145, 53, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1165, 7, 4, 145, 61, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1166, 8, 4, 145, 274, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1167, 1, 5, 145, 68, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1168, 2, 5, 145, 310, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1169, 3, 5, 145, 238, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1170, 4, 5, 145, 275, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1171, 5, 5, 145, 30, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1172, 6, 5, 145, 34, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1173, 7, 5, 145, 276, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1174, 8, 5, 145, 89, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1175, 9, 5, 145, 311, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1176, 1, 6, 145, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1177, 2, 6, 145, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1178, 3, 6, 145, 64, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1179, 4, 6, 145, 47, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1181, 5, 6, 145, 173, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1182, 6, 6, 145, 100, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1183, 7, 6, 145, 92, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1184, 8, 6, 145, 312, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1185, 1, 7, 145, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1186, 2, 7, 145, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1187, 3, 7, 145, 250, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1188, 4, 7, 145, 193, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1189, 5, 7, 145, 116, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1190, 6, 7, 145, 249, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1191, 7, 7, 145, 313, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1192, 8, 7, 145, 314, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1193, 1, 8, 145, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1194, 2, 8, 145, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1195, 3, 8, 145, 86, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1196, 4, 8, 145, 257, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1197, 5, 8, 145, 254, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1198, 6, 8, 145, 258, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1199, 7, 8, 145, 111, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1200, 8, 8, 145, 315, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1201, 9, 8, 145, 101, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1202, 1, 9, 154, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1203, 2, 9, 154, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1204, 1, 9, 155, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1205, 2, 9, 155, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1206, 1, 9, 156, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1207, 2, 9, 156, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1208, 1, 9, 157, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1209, 2, 9, 157, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1210, 1, 9, 158, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1211, 2, 9, 158, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1212, 1, 9, 159, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1213, 2, 9, 159, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1216, 2, 9, 146, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1217, 3, 9, 146, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1218, 1, 9, 148, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1219, 2, 9, 148, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1220, 2, 9, 147, 169, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1221, 3, 9, 147, 170, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1222, 2, 9, 142, 172, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1223, 3, 9, 142, 171, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1224, 2, 9, 143, 172, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1225, 3, 9, 143, 171, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1226, 2, 9, 144, 172, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1227, 3, 9, 144, 171, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1228, 1, 9, 145, 172, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1229, 2, 9, 145, 171, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 3),
(1230, 1, 1, 151, 14, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1231, 2, 1, 151, 1, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1232, 3, 1, 151, 2, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1233, 4, 1, 151, 4, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1234, 5, 1, 151, 12, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1235, 6, 1, 151, 13, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1236, 7, 1, 151, 5, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1237, 1, 2, 151, 25, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1238, 2, 2, 151, 28, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1239, 3, 2, 151, 27, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1240, 4, 2, 151, 26, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1241, 5, 2, 151, 23, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1242, 6, 2, 151, 22, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1243, 7, 2, 151, 29, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1244, 1, 3, 151, 45, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1245, 2, 3, 151, 41, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1246, 3, 3, 151, 42, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1247, 4, 3, 151, 43, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1248, 5, 3, 151, 37, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1249, 6, 3, 151, 44, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1250, 7, 3, 151, 40, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1251, 1, 4, 151, 62, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1252, 2, 4, 151, 57, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1253, 1, 5, 151, 76, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1254, 2, 5, 151, 77, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1255, 3, 5, 151, 72, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1256, 4, 5, 151, 73, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1257, 5, 5, 151, 74, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1258, 6, 5, 151, 75, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1259, 1, 6, 151, 83, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1260, 2, 6, 151, 82, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1261, 3, 6, 151, 80, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1262, 4, 6, 151, 81, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1263, 5, 6, 151, 79, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1264, 6, 6, 151, 84, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1265, 1, 7, 151, 106, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1266, 2, 7, 151, 102, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1267, 3, 7, 151, 93, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 5),
(1268, 4, 7, 151, 103, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1269, 5, 7, 151, 104, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 6),
(1270, 6, 7, 151, 105, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1),
(1271, 7, 7, 151, 96, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh_htdaotao`
--

CREATE TABLE `table_khungchuongtrinh_htdaotao` (
  `id` int(11) NOT NULL,
  `tenHinhThuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khungchuongtrinh_htdaotao`
--

INSERT INTO `table_khungchuongtrinh_htdaotao` (`id`, `tenHinhThuc`) VALUES
(1, 'Đại học - Chính quy');

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh_khoiluongkienthuc`
--

CREATE TABLE `table_khungchuongtrinh_khoiluongkienthuc` (
  `id` int(11) NOT NULL,
  `tenkhoiluongkienthuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isKhoiluongkienthuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_khungchuongtrinh_khoiluongkienthuc`
--

INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc` (`id`, `tenkhoiluongkienthuc`, `isKhoiluongkienthuc`) VALUES
(1, 'Giáo dục đại cương', 0),
(2, 'Giáo dục chuyên nghiệp', 0),
(3, 'Tốt nghiệp', 0),
(4, 'Cơ sở nhóm ngành', 2),
(5, 'Cơ sở ngành', 2),
(6, 'Chuyên ngành', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
--

CREATE TABLE `table_khungchuongtrinh_khoiluongkienthuc_chitiet` (
  `id` int(11) NOT NULL,
  `id_khoiluongkienthuc` int(11) DEFAULT NULL,
  `id_khung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
--

INSERT INTO `table_khungchuongtrinh_khoiluongkienthuc_chitiet` (`id`, `id_khoiluongkienthuc`, `id_khung`) VALUES
(13, 3, 143),
(21, 1, 142),
(23, 6, 142),
(24, 5, 142),
(25, 3, 142);

-- --------------------------------------------------------

--
-- Table structure for table `table_khungchuongtrinh_trinhdo`
--

CREATE TABLE `table_khungchuongtrinh_trinhdo` (
  `id` int(11) NOT NULL,
  `trinhdo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_khungchuongtrinh_trinhdo`
--

INSERT INTO `table_khungchuongtrinh_trinhdo` (`id`, `trinhdo`) VALUES
(1, 'Kỹ sư'),
(2, 'Cử nhân');

-- --------------------------------------------------------

--
-- Table structure for table `table_namhoc_hocky`
--

CREATE TABLE `table_namhoc_hocky` (
  `id` int(11) NOT NULL,
  `nambatdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namketthuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namhoc_key` int(11) NOT NULL,
  `hocky` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hienhanh` tinyint(1) DEFAULT '0',
  `trangthai` tinyint(1) NOT NULL,
  `batdau` date DEFAULT NULL,
  `ketthuc` date DEFAULT NULL,
  `batdaunamhoc` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_namhoc_hocky`
--

INSERT INTO `table_namhoc_hocky` (`id`, `nambatdau`, `namketthuc`, `namhoc_key`, `hocky`, `hienhanh`, `trangthai`, `batdau`, `ketthuc`, `batdaunamhoc`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2017', '2018', 1, '2', 0, 0, '2017-08-05', NULL, NULL, NULL, NULL, NULL),
(2, '2018', '2019', 2, '2', 0, 0, '2018-08-05', NULL, NULL, NULL, NULL, NULL),
(3, '2019', '2020', 3, '1', 0, 0, '2018-08-05', NULL, '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '2019', '2020', 4, '2', 0, 0, '2019-12-23', NULL, '2019-08-05', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2018', '2019', 5, '1', 0, 0, '2018-08-05', NULL, NULL, NULL, NULL, NULL),
(1, '2017', '2018', 6, '1', 0, 0, '2017-08-05', NULL, NULL, NULL, NULL, NULL),
(4, '2020', '2021', 7, '1', 0, 0, '2020-08-03', '0000-00-00', '2020-08-03', NULL, NULL, NULL),
(4, '2020', '2021', 8, '2', 0, 0, '2020-08-03', NULL, '2020-08-03', NULL, NULL, NULL),
(4, '2020', '2021', 9, '3', 0, 0, '2020-08-03', NULL, '2020-08-03', NULL, NULL, NULL),
(5, '2021', '2022', 10, '1', 1, 0, '2021-08-02', NULL, '2021-08-02', NULL, NULL, NULL),
(0, '_', '_', 11, '1', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_nganh`
--

CREATE TABLE `table_nganh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manganh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennganh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_chuyennganh` int(11) DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_it` int(11) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_nganh`
--

INSERT INTO `table_nganh` (`id`, `manganh`, `tennganh`, `id_chuyennganh`, `mota`, `khoa_it`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '7480201', 'Công nghệ Thông tin', 0, '', 1, 0, NULL, NULL, '2019-10-15 04:08:55'),
(2, '7340101', 'Quản trị kinh doanh', 0, '', 3, 0, NULL, NULL, '2019-10-15 04:08:56'),
(3, '7480108', 'Công nghệ kỹ thuật máy tính', 0, '', 2, 0, NULL, NULL, '2019-10-15 04:08:56'),
(4, '7480201DS', 'Chuyên ngành Khoa học dữ liệu vào Trí tuệ nhân tạo', 1, '', 1, 0, NULL, NULL, NULL),
(5, '7340101DA', 'Chuyên ngành Thiết Kế mỹ thuật số', 1, '', 1, 0, NULL, NULL, NULL),
(6, '7340101EL', 'Chuyên ngành Logistic & Chuỗi cung ứng số', 2, '', 3, 0, NULL, NULL, NULL),
(7, '7340101ET', 'Chuyên ngành quản trị dịch vụ và lữ hành số', 2, '', 3, 0, NULL, NULL, NULL),
(8, '', 'Chuyên ngành Kỹ thuật phần mềm', 1, '', 1, 0, NULL, NULL, NULL),
(9, '', 'Chuyên ngành An toàn thông tin và Mạng máy tính', 1, '', 1, 0, NULL, NULL, NULL),
(10, '', 'Chuyên ngành IoT- Robotics', 1, '', 1, 0, NULL, NULL, NULL),
(11, '', 'Chuyên ngành Truyền thông đa phương tiện', 1, '', 1, 0, NULL, NULL, NULL),
(12, '', 'Chuyên ngành Digital marketing', 2, '', 3, 0, NULL, NULL, NULL),
(13, '', 'Chuyên ngành Thương mại điện tử', 2, '', 3, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_hoatdong`
--

CREATE TABLE `table_nghiencuukhoahoc_hoatdong` (
  `id` int(11) NOT NULL,
  `tenhoatdongnghiencuu` text COLLATE utf8_unicode_ci,
  `loai_hoatdong` int(11) DEFAULT NULL,
  `namhoc` int(11) DEFAULT NULL,
  `diemcongtrinh` float DEFAULT NULL,
  `giokhoahoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_nghiencuukhoahoc_hoatdong`
--

INSERT INTO `table_nghiencuukhoahoc_hoatdong` (`id`, `tenhoatdongnghiencuu`, `loai_hoatdong`, `namhoc`, `diemcongtrinh`, `giokhoahoc`) VALUES
(1, 'Tạp chí thuộc danh mục SCI và địa chỉ tác giả thể hiện tên đơn vị thuộc ĐHĐN', 1, 5, 2, 600),
(2, 'Tạp chí thuộc danh mục SCI', 1, 5, 2, 600),
(3, 'Tạp chí thuộc danh mục ISI/Scopus và địa chỉ tác giả thể hiện tên đơn vị thuộc ĐHĐN', 1, 5, 1.5, 600),
(4, 'Tạp chí thuộc danh mục ISI/Scopus ', 1, 5, 1.5, 600),
(5, 'Tạp chí quốc tế, Kỷ yếu hội nghị/hội thảo quốc tế/quốc gia có chỉ số ISSN/ISBN', 1, 5, 1, 600),
(6, 'Tạp chí, kỷ yếu thuộc danh mục HĐ chức danh GS nhà nước', 1, 5, 0, 600),
(7, 'Tạp chí, kỷ yếu trong nước (cấp trường trở lên) có chỉ số ISSN', 1, 5, 0.25, 600),
(8, 'Tạp chí khoa học khác (không có chỉ số ISSN)', 1, 5, 0.125, 600),
(9, 'Sách chuyên khảo', 2, 5, 2, 600),
(10, 'Giáo trình', 2, 5, 1.5, 600),
(11, 'Sách tham khảo/hướng dẫn', 2, 5, 1, 600),
(12, 'Sách tái bản có chỉnh sửa', 2, 5, 0.5, 600),
(13, 'Chủ nhiệm chương trình cấp Nhà nước', 3, 5, 1.5, 600),
(14, 'Phó chủ nhiệm/thư ký chương trình cấp NN', 3, 5, 0.5, 600),
(15, 'Chủ nhiệm chương trình cấp bộ', 3, 5, 1, 600),
(16, 'Phó chủ nhiệm/thư ký chương trình cấp bộ', 3, 5, 0.5, 600),
(17, 'Chủ nhiệm Đề tài cấp Nhà nước', 3, 5, 1, 600),
(18, 'Chủ nhiệm Đề tài cấp Bộ, tỉnh/thành phố trực thuộc trung ương', 3, 5, 0.5, 600),
(19, 'Chủ nhiệm Đề tài cấp ĐHĐN', 3, 5, 0.5, 600),
(20, 'Chủ nhiệm Đề tài cấp cơ sở (Trường)', 3, 5, 0.25, 600),
(21, 'Bằng phát minh, sáng chế', 3, 5, 1, 600),
(22, 'Hướng dẫn chính NCS', 3, 5, 0.667, 600),
(23, 'Hướng dẫn phụ NCS', 3, 5, 0.333, 600),
(24, 'Sáng kiến  ', 3, 5, 0, 600),
(25, 'Thành tích khác', 3, 5, 0, 600),
(26, 'abcd', 3, 5, 123, 234),
(27, 'b', 2, 4, 2, 2),
(28, 'c', 2, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_loai1`
--

CREATE TABLE `table_nghiencuukhoahoc_loai1` (
  `id` int(11) NOT NULL,
  `tenbaibao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tacgia` int(11) DEFAULT NULL,
  `id_cactacgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namxuatban` int(11) DEFAULT NULL,
  `tentapchi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiso_issn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coquanxuatban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoctrang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanhminhchung` text COLLATE utf8_unicode_ci,
  `trangthaiduyet` int(11) DEFAULT NULL,
  `namhoc` int(11) DEFAULT NULL,
  `id_hoatdong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_nghiencuukhoahoc_loai1`
--

INSERT INTO `table_nghiencuukhoahoc_loai1` (`id`, `tenbaibao`, `id_tacgia`, `id_cactacgia`, `namxuatban`, `tentapchi`, `chiso_issn`, `loai`, `coquanxuatban`, `thuoctrang`, `hinhanhminhchung`, `trangthaiduyet`, `namhoc`, `id_hoatdong`) VALUES
(5, 'bai bao 1', 0, '1_60_5', 2021, 'tap chi 1', 'chi so issn', 'loai 1', 'co quan 1', 'trang 1', '02_11_21_48_apple2.jpg|02_11_21_92_apple.png', 0, 5, 3),
(6, 'bai bao 2 sua 1 2', 0, '1_2', 2020, 'tap chi 2 sua', 'chi so issn 2 sua', 'loai 2 sua', 'co quan 2 sua', 'trang 2 sua', '06_11_21_56_04_11_21_86_04_11_21_31_02_11_21_51_brick.png', 0, 5, 1),
(7, 'bai bao 3', 0, '5', 3, 'tap chi 3', 'chi so 3', 'loai 3', 'co quan 3', 'trang 3', '02_11_21_73_co2.png', 0, 5, 1),
(8, 'b1', 0, '20_2', 1, 'b1', 'b1', 'b1', 'b1', 'b1', '02_11_21_45_apple.png', 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_loai2`
--

CREATE TABLE `table_nghiencuukhoahoc_loai2` (
  `id` int(11) NOT NULL,
  `id_tacgia` int(11) DEFAULT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cactacgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lachubien` int(11) DEFAULT NULL,
  `sochubien` int(11) DEFAULT NULL,
  `namxuatban` int(11) DEFAULT NULL,
  `nhaxuatban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanhminhchung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthaiduyet` int(11) DEFAULT NULL,
  `namhoc` int(11) DEFAULT NULL,
  `id_hoatdong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_nghiencuukhoahoc_loai2`
--

INSERT INTO `table_nghiencuukhoahoc_loai2` (`id`, `id_tacgia`, `tensach`, `id_cactacgia`, `lachubien`, `sochubien`, `namxuatban`, `nhaxuatban`, `hinhanhminhchung`, `trangthaiduyet`, `namhoc`, `id_hoatdong`) VALUES
(1, 0, 'ten sach 1', '1_2', 1, 3, 2021, 'nha xuat ban 1', 'hinh anh minh chung', 0, 5, 10),
(2, 0, 'ten sach 2', '3_4', 0, 3, 2020, 'nha xuat ban 2', 'hinh anh ', 0, 5, 12),
(3, 0, 'ten sach 1 2', '1_5', 1, 12, 20212, 'nha xuat ban 1 2', '06_11_21_50_bieudien.png|06_11_21_4_03_11_21_90_apple.png|06_11_21_65_03_11_21_1_br.png', 0, 5, 9),
(4, 0, 'ten sach 4', '', 1, 2, 2, 'nha xuat ban 4', '03_11_21_20_fruit.png', 0, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_loai3`
--

CREATE TABLE `table_nghiencuukhoahoc_loai3` (
  `id` int(11) NOT NULL,
  `id_tacgia` int(11) DEFAULT NULL,
  `minhchung` text COLLATE utf8_unicode_ci,
  `hinhanhminhchung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthaiduyet` int(11) DEFAULT NULL,
  `namhoc` int(11) DEFAULT NULL,
  `id_hoatdong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_nghiencuukhoahoc_loai3`
--

INSERT INTO `table_nghiencuukhoahoc_loai3` (`id`, `id_tacgia`, `minhchung`, `hinhanhminhchung`, `trangthaiduyet`, `namhoc`, `id_hoatdong`) VALUES
(1, 0, 'minh chung loai 3 test', '06_11_21_59_bieudien.png', 0, 5, 15),
(2, 0, 'minh chung loai 3 2', 'hinh anh 3 2', 0, 5, 15),
(3, 0, 'minh chung loai 3 3', '', 0, 5, 17),
(8, 0, 'demo 6', '03_11_21_17_10-CNTT-NGUYEN THAI NGHE(81-91).pdf', 0, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_loai4`
--

CREATE TABLE `table_nghiencuukhoahoc_loai4` (
  `id` int(11) NOT NULL,
  `giatrihopdong` int(11) DEFAULT NULL,
  `minhchung` text COLLATE utf8_unicode_ci,
  `hinhanhminhchung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthaiduyet` int(11) DEFAULT NULL,
  `namhoc` int(11) DEFAULT NULL,
  `id_hoatdong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_nghiencuukhoahoc_thongke`
--

CREATE TABLE `table_nghiencuukhoahoc_thongke` (
  `id` int(11) NOT NULL,
  `id_tacgia` int(11) DEFAULT NULL,
  `id_namhoc` int(11) DEFAULT NULL,
  `chucdanh` int(11) DEFAULT NULL,
  `chucvu` int(11) DEFAULT NULL,
  `sogio_nghiencuu` int(11) DEFAULT NULL,
  `sogio_chuyensangnamsau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_nghiencuukhoahoc_thongke`
--

INSERT INTO `table_nghiencuukhoahoc_thongke` (`id`, `id_tacgia`, `id_namhoc`, `chucdanh`, `chucvu`, `sogio_nghiencuu`, `sogio_chuyensangnamsau`) VALUES
(1, 0, 4, 1, 1, 0, 470),
(2, 0, 5, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_tailieuthamkhao`
--

CREATE TABLE `table_tailieuthamkhao` (
  `id` int(11) NOT NULL,
  `tentacgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namxuatban` int(11) DEFAULT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noixuatban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhaxuatban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaitailieu` int(11) DEFAULT NULL,
  `id_hocphan` int(11) DEFAULT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_tailieuthamkhao`
--

INSERT INTO `table_tailieuthamkhao` (`id`, `tentacgia`, `namxuatban`, `tensach`, `noixuatban`, `nhaxuatban`, `url`, `loaitailieu`, `id_hocphan`, `khungchuongtrinh`) VALUES
(80, 'ten tac gia 1', 2021, 'ten tai lieu 1', 'noi xuat ban 1', 'nha xuat ban 1', '4', 0, 12, 142),
(81, 'ten tac gia 2', 2021, 'ten tai lieu 2', 'noi xuat ban 2', 'nha xuat ban 2', '4', 0, 12, 142),
(82, 'ten tac gia 3', 2021, 'ten tai lieu 3', 'noi xuat ban 3', 'nha xuat ban 3', '4', 1, 12, 142),
(83, 'tai lieu 4', 4, '4', '4', '4', '4', 1, 12, 142),
(84, 'a', 1, 'a', 'a', 'a', 'a', 0, 7, 142),
(85, 'c', 3, 'c', 'c', 'c', 'c', 1, 12, 154),
(92, 'a', 1, 'a', 'a', 'a', 'a', 0, 13, 142),
(93, 'b', 2, 'b', 'b', 'b', 'b', 1, 13, 142),
(94, 'c', 3, 'c', 'c', 'c', 'c', 1, 13, 142),
(95, 'Mark Allen Weiss', 2014, 'Data Structures And Algorithms Analysis in C++', 'Peason', 'Peason', 'url', 0, 15, 156),
(96, 'Jiman Hong, Nguyễn Văn Lợi, Nguyễn Phương Tâm, Ninh Khánh Chi', 2019, 'Cấu trúc dữ liệu', 'Nhà xuất bản TT&TT', 'Nhà xuất bản TT&TT', 'url', 1, 15, 156);

-- --------------------------------------------------------

--
-- Table structure for table `table_thanhphandanhgia`
--

CREATE TABLE `table_thanhphandanhgia` (
  `id` int(11) NOT NULL,
  `ten_thanhphandanhgia` varchar(255) DEFAULT NULL,
  `id_baidanhgia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_thanhphandanhgia`
--

INSERT INTO `table_thanhphandanhgia` (`id`, `ten_thanhphandanhgia`, `id_baidanhgia`) VALUES
(1, 'Đánh giá quá trình', 0),
(2, 'Đánh giá bài tập', 0),
(3, 'Đánh giá giữa kì', 0),
(4, 'Đánh giá cuối kì', 0),
(5, 'Điểm danh', 1),
(6, 'Bài tập trên lớp ', 2),
(7, 'Báo cáo mô tả bài tập nhóm', 2),
(8, 'Kiểm tra giữa kì ', 3),
(9, 'Thi cuối kì', 4),
(10, 'Thực hành/Thí nghiệm', 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_trongso_hp`
--

CREATE TABLE `table_trongso_hp` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hp` int(11) NOT NULL,
  `id_trongso` int(11) NOT NULL,
  `trongso` double(11,2) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `khungchuongtrinh` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `table_trongso_hp`
--

INSERT INTO `table_trongso_hp` (`id`, `id_hp`, `id_trongso`, `trongso`, `trangthai`, `khungchuongtrinh`, `remember_token`, `created_at`, `updated_at`) VALUES
(6030, 114, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6031, 114, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6032, 114, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6033, 114, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6034, 47, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6035, 47, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6036, 47, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6037, 47, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6046, 51, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6047, 51, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6048, 51, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6049, 51, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6058, 112, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6059, 112, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6060, 112, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6099, 92, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6100, 92, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6101, 92, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6102, 92, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6155, 95, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6156, 95, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6157, 95, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6158, 95, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6163, 4, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6164, 4, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6165, 4, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6166, 4, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6167, 85, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6168, 85, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6169, 85, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6170, 85, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6175, 52, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6176, 52, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6177, 52, 3, 0.00, 0, 146, NULL, NULL, NULL),
(6178, 52, 4, 0.00, 0, 146, NULL, NULL, NULL),
(6191, 21, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6192, 21, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6193, 21, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6194, 21, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6223, 111, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6224, 111, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6225, 111, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6226, 111, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6231, 15, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6232, 15, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6233, 15, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6234, 15, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6239, 47, 1, 0.10, 0, 147, NULL, NULL, NULL),
(6240, 47, 2, 0.10, 0, 147, NULL, NULL, NULL),
(6241, 47, 3, 0.20, 0, 147, NULL, NULL, NULL),
(6242, 47, 4, 0.60, 0, 147, NULL, NULL, NULL),
(6243, 54, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6244, 54, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6245, 54, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6246, 54, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6255, 68, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6256, 68, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6257, 68, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6258, 68, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6259, 39, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6260, 39, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6261, 39, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6262, 39, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6263, 6, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6264, 6, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6265, 6, 3, 0.30, 0, 146, NULL, NULL, NULL),
(6266, 6, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6267, 13, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6268, 13, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6269, 13, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6270, 13, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6271, 9, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6272, 9, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6273, 9, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6274, 9, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6275, 64, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6276, 64, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6277, 64, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6278, 64, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6279, 69, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6280, 69, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6281, 69, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6282, 69, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6283, 99, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6284, 99, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6285, 99, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6286, 99, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6287, 36, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6288, 36, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6289, 36, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6290, 36, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6291, 67, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6292, 67, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6293, 67, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6294, 67, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6295, 100, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6296, 100, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6297, 100, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6298, 100, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6299, 71, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6300, 71, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6301, 71, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6302, 71, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6303, 3, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6304, 3, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6305, 3, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6306, 3, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6311, 91, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6312, 91, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6313, 91, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6314, 91, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6315, 106, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6316, 106, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6317, 106, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6318, 106, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6319, 7, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6320, 7, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6321, 7, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6322, 7, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6323, 55, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6324, 55, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6325, 55, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6326, 55, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6327, 105, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6328, 105, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6329, 105, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6330, 105, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6331, 79, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6332, 79, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6333, 79, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6334, 79, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6335, 1, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6336, 1, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6337, 1, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6338, 1, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6339, 81, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6340, 81, 2, 0.10, 0, 146, NULL, NULL, NULL),
(6341, 81, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6342, 81, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6343, 12, 1, 0.20, 0, 146, NULL, NULL, NULL),
(6344, 12, 2, 0.00, 0, 146, NULL, NULL, NULL),
(6345, 12, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6346, 12, 4, 0.60, 0, 146, NULL, NULL, NULL),
(6351, 31, 1, 0.10, 0, 146, NULL, NULL, NULL),
(6352, 31, 2, 0.20, 0, 146, NULL, NULL, NULL),
(6353, 31, 3, 0.20, 0, 146, NULL, NULL, NULL),
(6354, 31, 4, 0.50, 0, 146, NULL, NULL, NULL),
(6359, 12, 1, 0.20, 0, 156, NULL, NULL, NULL),
(6360, 12, 2, 0.00, 0, 156, NULL, NULL, NULL),
(6361, 12, 3, 0.20, 0, 156, NULL, NULL, NULL),
(6362, 12, 4, 0.60, 0, 156, NULL, NULL, NULL),
(6367, 12, 1, 0.10, 0, 142, NULL, NULL, NULL),
(6368, 12, 2, 0.20, 0, 142, NULL, NULL, NULL),
(6369, 12, 3, 0.20, 0, 142, NULL, NULL, NULL),
(6370, 12, 4, 0.50, 0, 142, NULL, NULL, NULL),
(6387, 7, 1, 0.00, 0, 142, NULL, NULL, NULL),
(6388, 7, 2, 0.00, 0, 142, NULL, NULL, NULL),
(6389, 7, 3, 0.00, 0, 142, NULL, NULL, NULL),
(6390, 7, 4, 0.00, 0, 142, NULL, NULL, NULL),
(6395, 3, 1, 0.10, 0, 142, NULL, NULL, NULL),
(6396, 3, 2, 0.20, 0, 142, NULL, NULL, NULL),
(6397, 3, 3, 0.20, 0, 142, NULL, NULL, NULL),
(6398, 3, 4, 0.50, 0, 142, NULL, NULL, NULL),
(6403, 13, 1, 0.10, 0, 142, NULL, NULL, NULL),
(6404, 13, 2, 0.20, 0, 142, NULL, NULL, NULL),
(6405, 13, 3, 0.20, 0, 142, NULL, NULL, NULL),
(6406, 13, 4, 0.50, 0, 142, NULL, NULL, NULL),
(6407, 15, 1, 0.10, 0, 156, NULL, NULL, NULL),
(6408, 15, 2, 0.20, 0, 156, NULL, NULL, NULL),
(6409, 15, 3, 0.20, 0, 156, NULL, NULL, NULL),
(6410, 15, 4, 0.50, 0, 156, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_baidanhgia`
--
ALTER TABLE `table_baidanhgia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_chuandaura_chung`
--
ALTER TABLE `table_chuandaura_chung`
  ADD PRIMARY KEY (`id_cdr_chung`) USING BTREE;

--
-- Indexes for table `table_chuandaura_chung_chitiet`
--
ALTER TABLE `table_chuandaura_chung_chitiet`
  ADD PRIMARY KEY (`id_cdr_chitiet`);

--
-- Indexes for table `table_chuandaura_monhoc`
--
ALTER TABLE `table_chuandaura_monhoc`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_danhgiahocphan`
--
ALTER TABLE `table_danhgiahocphan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_decuongchitiet`
--
ALTER TABLE `table_decuongchitiet`
  ADD PRIMARY KEY (`id_decuong`) USING BTREE;

--
-- Indexes for table `table_decuongchitiet_moilienhe_clo_pi`
--
ALTER TABLE `table_decuongchitiet_moilienhe_clo_pi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_decuongchitiet_moilienhe_clo_plo`
--
ALTER TABLE `table_decuongchitiet_moilienhe_clo_plo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_giangvien`
--
ALTER TABLE `table_giangvien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_hocphan`
--
ALTER TABLE `table_hocphan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_hocphan_cu`
--
ALTER TABLE `table_hocphan_cu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_kehoachgiangday`
--
ALTER TABLE `table_kehoachgiangday`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_khoa`
--
ALTER TABLE `table_khoa`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_khoahoc`
--
ALTER TABLE `table_khoahoc`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_khungchuongtrinh_hocphan`
--
ALTER TABLE `table_khungchuongtrinh_hocphan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_khungchuongtrinh_htdaotao`
--
ALTER TABLE `table_khungchuongtrinh_htdaotao`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_khungchuongtrinh_khoiluongkienthuc`
--
ALTER TABLE `table_khungchuongtrinh_khoiluongkienthuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
--
ALTER TABLE `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_khungchuongtrinh_trinhdo`
--
ALTER TABLE `table_khungchuongtrinh_trinhdo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_namhoc_hocky`
--
ALTER TABLE `table_namhoc_hocky`
  ADD PRIMARY KEY (`namhoc_key`) USING BTREE;

--
-- Indexes for table `table_nganh`
--
ALTER TABLE `table_nganh`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_nghiencuukhoahoc_hoatdong`
--
ALTER TABLE `table_nghiencuukhoahoc_hoatdong`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_nghiencuukhoahoc_loai1`
--
ALTER TABLE `table_nghiencuukhoahoc_loai1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nghiencuukhoahoc_loai2`
--
ALTER TABLE `table_nghiencuukhoahoc_loai2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nghiencuukhoahoc_loai3`
--
ALTER TABLE `table_nghiencuukhoahoc_loai3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nghiencuukhoahoc_loai4`
--
ALTER TABLE `table_nghiencuukhoahoc_loai4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nghiencuukhoahoc_thongke`
--
ALTER TABLE `table_nghiencuukhoahoc_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_tailieuthamkhao`
--
ALTER TABLE `table_tailieuthamkhao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_thanhphandanhgia`
--
ALTER TABLE `table_thanhphandanhgia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `table_trongso_hp`
--
ALTER TABLE `table_trongso_hp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_baidanhgia`
--
ALTER TABLE `table_baidanhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_chuandaura_chung`
--
ALTER TABLE `table_chuandaura_chung`
  MODIFY `id_cdr_chung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table_chuandaura_chung_chitiet`
--
ALTER TABLE `table_chuandaura_chung_chitiet`
  MODIFY `id_cdr_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `table_chuandaura_monhoc`
--
ALTER TABLE `table_chuandaura_monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_danhgiahocphan`
--
ALTER TABLE `table_danhgiahocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `table_decuongchitiet`
--
ALTER TABLE `table_decuongchitiet`
  MODIFY `id_decuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `table_decuongchitiet_moilienhe_clo_pi`
--
ALTER TABLE `table_decuongchitiet_moilienhe_clo_pi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_decuongchitiet_moilienhe_clo_plo`
--
ALTER TABLE `table_decuongchitiet_moilienhe_clo_plo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_giangvien`
--
ALTER TABLE `table_giangvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `table_hocphan`
--
ALTER TABLE `table_hocphan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `table_hocphan_cu`
--
ALTER TABLE `table_hocphan_cu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `table_kehoachgiangday`
--
ALTER TABLE `table_kehoachgiangday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1666;

--
-- AUTO_INCREMENT for table `table_khoa`
--
ALTER TABLE `table_khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_khoahoc`
--
ALTER TABLE `table_khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_khungchuongtrinh_hocphan`
--
ALTER TABLE `table_khungchuongtrinh_hocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1272;

--
-- AUTO_INCREMENT for table `table_khungchuongtrinh_htdaotao`
--
ALTER TABLE `table_khungchuongtrinh_htdaotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_khungchuongtrinh_khoiluongkienthuc`
--
ALTER TABLE `table_khungchuongtrinh_khoiluongkienthuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
--
ALTER TABLE `table_khungchuongtrinh_khoiluongkienthuc_chitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `table_khungchuongtrinh_trinhdo`
--
ALTER TABLE `table_khungchuongtrinh_trinhdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_namhoc_hocky`
--
ALTER TABLE `table_namhoc_hocky`
  MODIFY `namhoc_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_nganh`
--
ALTER TABLE `table_nganh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_hoatdong`
--
ALTER TABLE `table_nghiencuukhoahoc_hoatdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_loai1`
--
ALTER TABLE `table_nghiencuukhoahoc_loai1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_loai2`
--
ALTER TABLE `table_nghiencuukhoahoc_loai2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_loai3`
--
ALTER TABLE `table_nghiencuukhoahoc_loai3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_loai4`
--
ALTER TABLE `table_nghiencuukhoahoc_loai4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_nghiencuukhoahoc_thongke`
--
ALTER TABLE `table_nghiencuukhoahoc_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_tailieuthamkhao`
--
ALTER TABLE `table_tailieuthamkhao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `table_thanhphandanhgia`
--
ALTER TABLE `table_thanhphandanhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_trongso_hp`
--
ALTER TABLE `table_trongso_hp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6411;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
