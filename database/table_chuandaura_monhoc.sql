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

 Date: 08/01/2022 22:51:35
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
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_chuandaura_monhoc
-- ----------------------------
INSERT INTO `table_chuandaura_monhoc` VALUES (4, 1, 'chuan dau ra 1', 12, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (5, 2, 'chuan dau ra 2', 12, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (6, 1, 'clo 1', 3, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (7, 2, 'clo 2', 3, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (8, 1, 'clo tacn 1', 13, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (9, 2, 'clo tacn 2', 13, 146);
INSERT INTO `table_chuandaura_monhoc` VALUES (10, 1, 'clo tacn 1', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (11, 2, 'clo tacn 2', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (12, 3, 'clo tacn 3', 13, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (13, 1, 'clo 111', 12, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (14, 2, 'clo 222', 12, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (17, 1, 'clo 111', 12, 157);
INSERT INTO `table_chuandaura_monhoc` VALUES (18, 2, 'clo 222', 12, 157);
INSERT INTO `table_chuandaura_monhoc` VALUES (19, 1, 'Tr??nh b??y, gi???i th??ch ???????c c??c c???u tr??c d??? li???u v?? thu???t to??n c?? b???n.', 15, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (20, 2, 'V???n d???ng ???????c k??? n??ng giao ti???p, k??? n??ng t?? duy v?? gi???i quy???t v???n ?????', 15, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (21, 3, '??p d???ng ???????c c??c c???u tr??c d??? li???u v?? k??? thu???t thi???t k??? gi???i thu???t ????? gi???i quy???t c??c b??i to??n tin h???c', 15, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (22, 4, 'Ph??t tri???n ?? th???c l??m vi???c trong m??i tr?????ng chuy??n nghi???p', 15, 156);
INSERT INTO `table_chuandaura_monhoc` VALUES (23, 1, 'a', 10, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (24, 2, 'b', 10, 142);
INSERT INTO `table_chuandaura_monhoc` VALUES (25, 1, 'test clo 1', 12, 154);
INSERT INTO `table_chuandaura_monhoc` VALUES (26, 2, 'test clo 2', 12, 154);

SET FOREIGN_KEY_CHECKS = 1;
