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

 Date: 07/12/2021 22:09:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_nganh
-- ----------------------------
DROP TABLE IF EXISTS `table_nganh`;
CREATE TABLE `table_nganh`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `manganh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennganh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_chuyennganh` int NULL DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_it` int NULL DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_nganh
-- ----------------------------
INSERT INTO `table_nganh` VALUES (1, '7480201', 'Công nghệ Thông tin', 0, '', 1, 0, NULL, NULL, '2019-10-15 11:08:55');
INSERT INTO `table_nganh` VALUES (2, '7340101', 'Quản trị kinh doanh', 0, '', 3, 0, NULL, NULL, '2019-10-15 11:08:56');
INSERT INTO `table_nganh` VALUES (3, '7480108', 'Công nghệ kỹ thuật máy tính', 0, '', 2, 0, NULL, NULL, '2019-10-15 11:08:56');
INSERT INTO `table_nganh` VALUES (4, '7480201DS', 'Chuyên ngành Khoa học dữ liệu vào Trí tuệ nhân tạo', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (5, '7340101DA', 'Chuyên ngành Thiết Kế mỹ thuật số', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (6, '7340101EL', 'Chuyên ngành Logistic & Chuỗi cung ứng số', 2, '', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (7, '7340101ET', 'Chuyên ngành quản trị dịch vụ và lữ hành số', 2, '', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (8, '', 'Chuyên ngành Kỹ thuật phần mềm', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (9, '', 'Chuyên ngành An toàn thông tin và Mạng máy tính', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (10, '', 'Chuyên ngành IoT- Robotics', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (11, '', 'Chuyên ngành Truyền thông đa phương tiện', 1, '', 1, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (12, '', 'Chuyên ngành Digital marketing', 2, '', 3, 0, NULL, NULL, NULL);
INSERT INTO `table_nganh` VALUES (13, '', 'Chuyên ngành Thương mại điện tử', 2, '', 3, 0, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
