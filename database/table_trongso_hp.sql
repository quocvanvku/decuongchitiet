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

 Date: 09/10/2021 09:20:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for table_trongso_hp
-- ----------------------------
DROP TABLE IF EXISTS `table_trongso_hp`;
CREATE TABLE `table_trongso_hp`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_hp` int NOT NULL,
  `id_trongso` int NOT NULL,
  `trongso` double(11, 2) NULL DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `khungchuongtrinh` int NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6367 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_trongso_hp
-- ----------------------------
INSERT INTO `table_trongso_hp` VALUES (6030, 114, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6031, 114, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6032, 114, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6033, 114, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6034, 47, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6035, 47, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6036, 47, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6037, 47, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6046, 51, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6047, 51, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6048, 51, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6049, 51, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6058, 112, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6059, 112, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6060, 112, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6099, 92, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6100, 92, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6101, 92, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6102, 92, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6155, 95, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6156, 95, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6157, 95, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6158, 95, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6163, 4, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6164, 4, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6165, 4, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6166, 4, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6167, 85, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6168, 85, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6169, 85, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6170, 85, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6175, 52, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6176, 52, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6177, 52, 3, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6178, 52, 4, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6191, 21, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6192, 21, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6193, 21, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6194, 21, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6223, 111, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6224, 111, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6225, 111, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6226, 111, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6231, 15, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6232, 15, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6233, 15, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6234, 15, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6239, 47, 1, 0.10, 0, 147, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6240, 47, 2, 0.10, 0, 147, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6241, 47, 3, 0.20, 0, 147, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6242, 47, 4, 0.60, 0, 147, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6243, 54, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6244, 54, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6245, 54, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6246, 54, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6255, 68, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6256, 68, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6257, 68, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6258, 68, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6259, 39, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6260, 39, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6261, 39, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6262, 39, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6263, 6, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6264, 6, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6265, 6, 3, 0.30, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6266, 6, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6267, 13, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6268, 13, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6269, 13, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6270, 13, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6271, 9, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6272, 9, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6273, 9, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6274, 9, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6275, 64, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6276, 64, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6277, 64, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6278, 64, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6279, 69, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6280, 69, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6281, 69, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6282, 69, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6283, 99, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6284, 99, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6285, 99, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6286, 99, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6287, 36, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6288, 36, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6289, 36, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6290, 36, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6291, 67, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6292, 67, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6293, 67, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6294, 67, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6295, 100, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6296, 100, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6297, 100, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6298, 100, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6299, 71, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6300, 71, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6301, 71, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6302, 71, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6303, 3, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6304, 3, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6305, 3, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6306, 3, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6311, 91, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6312, 91, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6313, 91, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6314, 91, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6315, 106, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6316, 106, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6317, 106, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6318, 106, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6319, 7, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6320, 7, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6321, 7, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6322, 7, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6323, 55, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6324, 55, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6325, 55, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6326, 55, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6327, 105, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6328, 105, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6329, 105, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6330, 105, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6331, 79, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6332, 79, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6333, 79, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6334, 79, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6335, 1, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6336, 1, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6337, 1, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6338, 1, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6339, 81, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6340, 81, 2, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6341, 81, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6342, 81, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6343, 12, 1, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6344, 12, 2, 0.00, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6345, 12, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6346, 12, 4, 0.60, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6351, 31, 1, 0.10, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6352, 31, 2, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6353, 31, 3, 0.20, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6354, 31, 4, 0.50, 0, 146, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6359, 12, 1, 0.20, 0, 156, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6360, 12, 2, 0.00, 0, 156, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6361, 12, 3, 0.20, 0, 156, NULL, NULL, NULL);
INSERT INTO `table_trongso_hp` VALUES (6362, 12, 4, 0.60, 0, 156, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
