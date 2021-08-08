/*
 Navicat Premium Data Transfer

 Source Server         : localhot php7
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : inventory_barang

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 08/08/2021 17:03:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log_barang
-- ----------------------------
DROP TABLE IF EXISTS `activity_log_barang`;
CREATE TABLE `activity_log_barang`  (
  `id_log_barang` int NOT NULL AUTO_INCREMENT,
  `date_log` datetime NOT NULL,
  `nik_admin` int NOT NULL,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_supplier` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty_sisa` int NOT NULL,
  `qty_gudang` int NOT NULL,
  `qty_batal` int NOT NULL,
  `remark` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_log_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log_barang
-- ----------------------------
INSERT INTO `activity_log_barang` VALUES (15, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '01.03.', 15, 0, 0, '');
INSERT INTO `activity_log_barang` VALUES (16, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '02.01.', 20, 0, 0, '');
INSERT INTO `activity_log_barang` VALUES (17, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '01.04.', 16, 0, 0, '');
INSERT INTO `activity_log_barang` VALUES (22, '2021-08-01 12:35:23', 123, 'BLI01082100001', 'SUP000002', '01.03.', 7, 0, 0, 'ini alasan nya');
INSERT INTO `activity_log_barang` VALUES (23, '2021-08-01 12:35:23', 123, 'BLI01082100001', 'SUP000002', '04.01.', 7, 0, 0, 'ini alasan nya');
INSERT INTO `activity_log_barang` VALUES (28, '2021-08-05 02:52:24', 123, 'BLI30072100001', 'SUP000001', '02.01.', 15, 5, 0, 'test masuk barang');
INSERT INTO `activity_log_barang` VALUES (38, '2021-08-07 00:52:19', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdas');
INSERT INTO `activity_log_barang` VALUES (39, '2021-08-07 00:53:58', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdasd');
INSERT INTO `activity_log_barang` VALUES (40, '2021-08-07 00:58:58', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdasd');
INSERT INTO `activity_log_barang` VALUES (41, '2021-08-07 00:59:31', 123, 'BLI30072100001', 'SUP000001', '02.01.', 8, 0, 1, 'asdasd');
INSERT INTO `activity_log_barang` VALUES (42, '2021-08-07 01:21:44', 123, 'BLI30072100001', 'SUP000001', '02.01.', 8, 0, 1, 'adfafad');
INSERT INTO `activity_log_barang` VALUES (43, '2021-08-07 01:23:06', 123, 'BLI30072100001', 'SUP000001', '02.01.', 0, 0, 8, 'kuhou');
INSERT INTO `activity_log_barang` VALUES (44, '2021-08-07 01:26:07', 123, 'BLI30072100001', 'SUP000001', '01.04.', 0, 16, 0, 'aklasjadf');
INSERT INTO `activity_log_barang` VALUES (45, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '02.03.', 50, 0, 0, 'asdasdasddasd');
INSERT INTO `activity_log_barang` VALUES (46, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '03.04.', 30, 0, 0, 'asdasdasddasd');
INSERT INTO `activity_log_barang` VALUES (47, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '06.04.', 40, 0, 0, 'asdasdasddasd');
INSERT INTO `activity_log_barang` VALUES (48, '2021-08-07 01:35:10', 123, 'BLI07082100002', 'SUP000002', '01.01.', 10, 0, 0, 'asdassfbaeb');
INSERT INTO `activity_log_barang` VALUES (49, '2021-08-07 01:38:15', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'kjhalfhalf');
INSERT INTO `activity_log_barang` VALUES (50, '2021-08-07 18:10:46', 123, 'BLI01082100001', 'SUP000002', '04.01.', 2, 0, 5, 'sdsdfa');
INSERT INTO `activity_log_barang` VALUES (51, '2021-08-07 18:15:30', 123, 'BLI01082100001', 'SUP000002', '01.03.', 2, 5, 0, 'wedasdas');
INSERT INTO `activity_log_barang` VALUES (52, '2021-08-07 18:15:50', 123, 'BLI01082100001', 'SUP000002', '01.03.', 1, 0, 1, 'asdasd');
INSERT INTO `activity_log_barang` VALUES (53, '2021-08-07 20:04:38', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'terasdafasvrwghnyjm');
INSERT INTO `activity_log_barang` VALUES (54, '2021-08-07 20:23:17', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdas');
INSERT INTO `activity_log_barang` VALUES (55, '2021-08-07 20:24:28', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdasdq');
INSERT INTO `activity_log_barang` VALUES (56, '2021-08-07 20:26:47', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'agdfadfb');
INSERT INTO `activity_log_barang` VALUES (57, '2021-08-07 20:34:15', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdqwdas');
INSERT INTO `activity_log_barang` VALUES (58, '2021-08-07 20:36:01', 123, 'BLI01082100001', 'SUP000002', '01.03.', 0, 0, 1, 'asdafwfadw');
INSERT INTO `activity_log_barang` VALUES (59, '2021-08-07 20:42:02', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 5, 0, 'qefvafda');
INSERT INTO `activity_log_barang` VALUES (60, '2021-08-07 20:42:18', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 0, 5, 'asdqwdasd');
INSERT INTO `activity_log_barang` VALUES (61, '2021-08-07 20:45:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 0, 5, 'xbadfa');
INSERT INTO `activity_log_barang` VALUES (62, '2021-08-07 20:48:06', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 5, 0, 'favawd');
INSERT INTO `activity_log_barang` VALUES (63, '2021-08-07 20:55:54', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 0, 5, 'afsdsdfg');
INSERT INTO `activity_log_barang` VALUES (64, '2021-08-07 20:57:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 5, 0, 'afaeghaer');
INSERT INTO `activity_log_barang` VALUES (65, '2021-08-07 20:59:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 6, 4, 0, 'asdqwdas');
INSERT INTO `activity_log_barang` VALUES (66, '2021-08-07 20:59:22', 123, 'BLI07082100002', 'SUP000002', '01.01.', 2, 0, 4, 'asdqw');
INSERT INTO `activity_log_barang` VALUES (67, '2021-08-07 20:59:38', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 2, 0, 'asdfaedfq');
INSERT INTO `activity_log_barang` VALUES (68, '2021-08-07 21:09:24', 123, 'BLI07082100002', 'SUP000002', '01.01.', 2, 8, 0, 'dfasdf');
INSERT INTO `activity_log_barang` VALUES (69, '2021-08-07 21:09:42', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 0, 2, 'sdqwdsd');
INSERT INTO `activity_log_barang` VALUES (70, '2021-08-07 21:49:31', 123, 'BLI07082100002', 'SUP000002', '01.01.', 8, 0, 2, 'asdasdqw');
INSERT INTO `activity_log_barang` VALUES (71, '2021-08-07 21:50:36', 123, 'BLI07082100002', 'SUP000002', '01.01.', 8, 0, 2, 'asdqeadsf');

-- ----------------------------
-- Table structure for activity_log_harga
-- ----------------------------
DROP TABLE IF EXISTS `activity_log_harga`;
CREATE TABLE `activity_log_harga`  (
  `id_log_harga` int NOT NULL AUTO_INCREMENT,
  `date_log` datetime NULL DEFAULT NULL,
  `nik_admin` int NOT NULL,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_gudang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_supplier` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_start` double NOT NULL,
  `harga_now` double NOT NULL,
  `tgl_masuk_gudang` date NOT NULL,
  `tgl_harga_naik` date NULL DEFAULT NULL,
  `tgl_harga_turun` date NOT NULL,
  PRIMARY KEY (`id_log_harga`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log_harga
-- ----------------------------
INSERT INTO `activity_log_harga` VALUES (1, '2021-08-05 02:52:24', 123, 'BLI30072100001', 'GDG05082100001', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-05', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (2, '2021-08-07 00:52:19', 123, 'BLI30072100001', 'GDG07082100001', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (3, '2021-08-07 00:53:58', 123, 'BLI30072100001', 'GDG07082100002', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (4, '2021-08-07 00:58:58', 123, 'BLI30072100001', 'GDG07082100003', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (5, '2021-08-07 01:26:07', 123, 'BLI30072100001', 'GDG07082100004', '01.04.', 'SUP000001', 1760000, 1760000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (6, '2021-08-07 18:15:30', 123, 'BLI01082100001', 'GDG07082100005', '01.03.', 'SUP000002', 5500000, 5500000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (7, '2021-08-07 20:42:02', 123, 'BLI07082100002', 'GDG07082100006', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (8, '2021-08-07 20:48:06', 123, 'BLI07082100002', 'GDG07082100007', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (9, '2021-08-07 20:57:09', 123, 'BLI07082100002', 'GDG07082100008', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (10, '2021-08-07 20:59:09', 123, 'BLI07082100002', 'GDG07082100009', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (11, '2021-08-07 20:59:38', 123, 'BLI07082100002', 'GDG07082100010', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');
INSERT INTO `activity_log_harga` VALUES (12, '2021-08-07 21:09:24', 123, 'BLI07082100002', 'GDG07082100011', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for activity_log_user
-- ----------------------------
DROP TABLE IF EXISTS `activity_log_user`;
CREATE TABLE `activity_log_user`  (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL,
  `log_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_aksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_item` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log_user
-- ----------------------------
INSERT INTO `activity_log_user` VALUES (1, '2021-07-24 03:34:03', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (2, '2021-07-24 03:35:34', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (3, '2021-07-24 03:35:46', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (4, '2021-07-24 03:36:45', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (5, '2021-07-24 03:53:37', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (6, '2021-07-24 03:53:44', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (7, '2021-07-24 03:54:53', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (8, '2021-07-24 03:55:10', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (9, '2021-07-24 03:55:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (10, '2021-07-24 03:56:56', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (11, '2021-07-24 03:57:01', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (12, '2021-07-24 03:58:42', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (13, '2021-07-24 03:58:49', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (14, '2021-07-24 03:59:59', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (15, '2021-07-24 04:00:07', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (16, '2021-07-24 04:01:11', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (17, '2021-07-24 04:02:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (18, '2021-07-24 04:02:27', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (19, '2021-07-24 04:03:15', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (20, '2021-07-24 04:03:22', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (21, '2021-07-24 15:12:23', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (22, '2021-07-24 18:58:33', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (23, '2021-07-24 21:47:15', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (24, '2021-07-24 23:34:33', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (25, '2021-07-24 23:34:39', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (26, '2021-07-25 10:40:50', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (27, '2021-07-25 10:40:57', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (28, '2021-07-25 10:41:26', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (29, '2021-07-25 10:41:32', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (30, '2021-07-25 22:46:26', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (31, '2021-07-26 02:25:05', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (32, '2021-07-26 21:16:09', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (33, '2021-07-26 22:35:41', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (34, '2021-07-28 14:24:50', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (35, '2021-07-28 23:16:31', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (36, '2021-07-29 11:51:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (37, '2021-07-30 02:55:58', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (38, '2021-07-30 13:09:19', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (39, '2021-07-30 15:08:56', 'Admin', 'Tambah Pembelian', 'Delete', 'BLI30072100001');
INSERT INTO `activity_log_user` VALUES (40, '2021-07-30 15:09:58', 'Admin', 'Tambah Pembelian', 'Delete', 'BLI30072100001');
INSERT INTO `activity_log_user` VALUES (41, '2021-07-30 17:37:53', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (42, '2021-07-31 00:09:17', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (43, '2021-07-31 00:09:22', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (44, '2021-07-31 02:15:16', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (45, '2021-07-31 20:35:58', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (46, '2021-07-31 21:57:44', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (47, '2021-08-01 00:41:18', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (48, '2021-08-01 00:41:58', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (49, '2021-08-01 00:45:05', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (50, '2021-08-01 00:45:05', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (51, '2021-08-01 00:45:15', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (52, '2021-08-01 00:53:18', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (53, '2021-08-01 00:57:10', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (54, '2021-08-01 01:10:07', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (55, '2021-08-01 01:11:17', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (56, '2021-08-01 01:16:27', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (57, '2021-08-01 01:17:51', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (58, '2021-08-01 01:19:00', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (59, '2021-08-01 01:30:37', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (60, '2021-08-01 01:32:50', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (61, '2021-08-01 01:32:52', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (62, '2021-08-01 01:35:29', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (63, '2021-08-01 01:39:27', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (64, '2021-08-01 01:41:35', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (65, '2021-08-01 01:45:02', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (66, '2021-08-01 01:57:43', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (67, '2021-08-01 02:55:36', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002');
INSERT INTO `activity_log_user` VALUES (68, '2021-08-01 05:35:04', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (69, '2021-08-01 11:50:09', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (70, '2021-08-01 12:19:56', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (71, '2021-08-01 12:24:17', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (72, '2021-08-01 22:46:51', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (73, '2021-08-02 07:22:42', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (74, '2021-08-02 07:24:32', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (75, '2021-08-02 07:24:39', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (76, '2021-08-02 20:36:09', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (77, '2021-08-02 20:36:15', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (78, '2021-08-03 12:51:58', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (79, '2021-08-03 21:28:01', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (80, '2021-08-03 21:29:04', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (81, '2021-08-04 08:08:29', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (82, '2021-08-05 19:23:41', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log_user` VALUES (83, '2021-08-06 04:28:06', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (84, '2021-08-06 17:44:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (85, '2021-08-07 00:10:38', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (86, '2021-08-07 17:46:40', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log_user` VALUES (87, '2021-08-08 10:56:20', 'Admin', 'login', 'Masuk', '');

-- ----------------------------
-- Table structure for detail_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE `detail_pembelian`  (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` double NOT NULL,
  `qty` int NOT NULL,
  `qty_sisa` int NOT NULL,
  `qty_gudang` int NOT NULL,
  `qty_batal` int NOT NULL,
  `total` double NOT NULL,
  `status_beli` enum('0','1','2','3','4','5','6') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '5=cencel dan gudang;4=cencel;3=cencel sebagian;2=gudang;1=gudang sebagaian;0=pengiriman',
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=TidakAktif;0=Aktif',
  PRIMARY KEY (`id_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian
-- ----------------------------
INSERT INTO `detail_pembelian` VALUES (12, 'BLI30072100001', '01.03.', 'SET', 1200000, 15, 15, 0, 0, 18000000, '0', '0');
INSERT INTO `detail_pembelian` VALUES (13, 'BLI30072100001', '02.01.', 'UNIT', 1120000, 20, 0, 6, 14, 0, '5', '0');
INSERT INTO `detail_pembelian` VALUES (14, 'BLI30072100001', '01.04.', 'SET', 1600000, 16, 0, 16, 0, 25600000, '2', '0');
INSERT INTO `detail_pembelian` VALUES (21, 'BLI01082100001', '01.03.', 'UNIT', 5000000, 7, 0, 5, 2, 0, '5', '0');
INSERT INTO `detail_pembelian` VALUES (22, 'BLI01082100001', '04.01.', 'SET', 4500000, 7, 2, 0, 0, 9000000, '3', '0');
INSERT INTO `detail_pembelian` VALUES (23, 'BLI07082100001', '02.03.', 'UNIT', 5000000, 50, 50, 0, 0, 250000000, '0', '0');
INSERT INTO `detail_pembelian` VALUES (24, 'BLI07082100001', '03.04.', 'SET', 3000000, 30, 30, 0, 0, 90000000, '0', '0');
INSERT INTO `detail_pembelian` VALUES (25, 'BLI07082100001', '06.04.', 'PCS', 4000000, 40, 40, 0, 0, 160000000, '0', '0');
INSERT INTO `detail_pembelian` VALUES (26, 'BLI07082100002', '01.01.', 'SET', 2000000, 10, 10, 0, 0, 20000000, '0', '0');
INSERT INTO `detail_pembelian` VALUES (27, 'BLI07082100003', '03.03.', 'SET', 2500000, 15, 15, 0, 0, 37500000, '0', '0');

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  `id_detail_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `qty` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_detail_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for kode_barang
-- ----------------------------
DROP TABLE IF EXISTS `kode_barang`;
CREATE TABLE `kode_barang`  (
  `id_kd_barang` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub_kode` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `persen_naik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `persen_turun` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '0=Tidak Aktif;1=Aktif',
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_kd_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kode_barang
-- ----------------------------
INSERT INTO `kode_barang` VALUES (1, '01.', '*', 'Sofa', '10', '5', '1', NULL);
INSERT INTO `kode_barang` VALUES (2, '01.', '01.', 'Sofa tamu L minimalis', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (3, '01.', '02.', 'Sofa U minimalis living fulset meja', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (4, '01.', '03.', 'Set sofa rotan sintesis minimalis azura', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (5, '01.', '04.', 'Sofa louis kayu jati jepara', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (6, '01.', '05.', 'Sofa minimalis modern L shape tosca', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (7, '02.', '*', 'Meja', '5', '10', '1', NULL);
INSERT INTO `kode_barang` VALUES (8, '02.', '01.', 'Set meja makan jati minimalis 6 kursi ', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (9, '02.', '02.', 'Set meja makan trembesi 2x1 meter solid glossy', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (10, '02.', '03.', 'Meja kerja putih welnut ', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (11, '02.', '04.', 'Set meja café minimalis kayu jati ', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (12, '02.', '05.', 'Meja repsesionis minimalis modern ', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (13, '03.', '*', 'Kursi', '5', '10', '1', NULL);
INSERT INTO `kode_barang` VALUES (14, '03.', '01.', 'Set kursi teras jati minimalis daun jepara', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (15, '03.', '02.', 'Kursi tamu minimalis model box', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (16, '03.', '03.', 'Kursi retro L minimalis', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (17, '03.', '04.', 'Set kursi tamu jati minimalis model koin mawar', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (18, '03.', '05.', 'Kursi duduk laci sepatu minimalis ', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (19, '04.', '*', 'Lemari', '10', '5', '1', NULL);
INSERT INTO `kode_barang` VALUES (20, '04.', '01.', 'Lemari pakaian 3 pintu glossy', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (21, '04.', '02.', 'Lemari tv bufet lemari pajangan', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (22, '04.', '03.', 'Lemari pajangan minimalis ukir jati', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (23, '04.', '04.', 'Lemari pakaian 4 pintu sliding', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (24, '04.', '05.', 'Atria lemari pakaian pintu tarik', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (25, '05.', '*', 'Kasur', '5', '10', '1', NULL);
INSERT INTO `kode_barang` VALUES (26, '05.', '01.', 'Kasur informa sleep 200x200 cm', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (27, '05.', '02.', 'Kasur informa sleep 120x200 cm', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (28, '05.', '03.', 'Kasur informa sleep 100x200 cm', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (29, '05.', '04.', 'Kasur busa inoac (ori)', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (30, '05.', '05.', 'Kasur spring bed inthebox 160x200 cm', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (31, '06.', '*', 'Kitchen Set', '10', '5', '1', NULL);
INSERT INTO `kode_barang` VALUES (32, '06.', '01.', 'Kitchen set rak dapur lemari piring white marble', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (33, '06.', '02.', 'Kitchen set lemari multi fungsi', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (34, '06.', '03.', 'Kitchen set rak bawah 3 pintu', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (35, '06.', '04.', 'Kitchen set minimalis meranti', NULL, NULL, '1', NULL);
INSERT INTO `kode_barang` VALUES (36, '06.', '05.', 'Kitchen set bawah 3 pintu modern', NULL, NULL, '1', NULL);

-- ----------------------------
-- Table structure for kode_satuan_barang
-- ----------------------------
DROP TABLE IF EXISTS `kode_satuan_barang`;
CREATE TABLE `kode_satuan_barang`  (
  `id_satuan` int NOT NULL AUTO_INCREMENT,
  `kd_satuan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  PRIMARY KEY (`id_satuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kode_satuan_barang
-- ----------------------------

-- ----------------------------
-- Table structure for master_barang
-- ----------------------------
DROP TABLE IF EXISTS `master_barang`;
CREATE TABLE `master_barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_gudang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_masuk_gudang` datetime NULL DEFAULT NULL,
  `harga_jual_start` int NOT NULL,
  `harga_jual_now` int NULL DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `qty` int NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '0=aktif;1=tidak aktif;',
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_barang
-- ----------------------------
INSERT INTO `master_barang` VALUES (3, 'BLI30072100001', 'GDG05082100001', '02.01.', '2021-08-05 02:52:24', 1176000, 1176000, 1120000, 5, '0', '2021-08-05 02:52:24');
INSERT INTO `master_barang` VALUES (4, 'BLI30072100001', 'GDG07082100001', '02.01.', '2021-08-07 00:52:19', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:52:19');
INSERT INTO `master_barang` VALUES (5, 'BLI30072100001', 'GDG07082100002', '02.01.', '2021-08-07 00:53:58', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:53:58');
INSERT INTO `master_barang` VALUES (6, 'BLI30072100001', 'GDG07082100003', '02.01.', '2021-08-07 00:58:58', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:58:58');
INSERT INTO `master_barang` VALUES (7, 'BLI30072100001', 'GDG07082100004', '01.04.', '2021-08-07 01:26:07', 1760000, 1760000, 1600000, 16, '0', '2021-08-07 01:26:07');
INSERT INTO `master_barang` VALUES (8, 'BLI01082100001', 'GDG07082100005', '01.03.', '2021-08-07 18:15:30', 5500000, 5500000, 5000000, 5, '0', '2021-08-07 18:15:30');
INSERT INTO `master_barang` VALUES (9, 'BLI07082100002', 'GDG07082100006', '01.01.', '2021-08-07 20:42:02', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:42:02');
INSERT INTO `master_barang` VALUES (10, 'BLI07082100002', 'GDG07082100007', '01.01.', '2021-08-07 20:48:06', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:48:06');
INSERT INTO `master_barang` VALUES (11, 'BLI07082100002', 'GDG07082100008', '01.01.', '2021-08-07 20:57:09', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:57:09');
INSERT INTO `master_barang` VALUES (12, 'BLI07082100002', 'GDG07082100009', '01.01.', '2021-08-07 20:59:09', 2200000, 2200000, 2000000, 4, '0', '2021-08-07 20:59:09');
INSERT INTO `master_barang` VALUES (13, 'BLI07082100002', 'GDG07082100010', '01.01.', '2021-08-07 20:59:38', 2200000, 2200000, 2000000, 2, '0', '2021-08-07 20:59:38');
INSERT INTO `master_barang` VALUES (14, 'BLI07082100002', 'GDG07082100011', '01.01.', '2021-08-07 21:09:24', 2200000, 2200000, 2000000, 8, '0', '2021-08-07 21:09:24');

-- ----------------------------
-- Table structure for master_barang_cencel
-- ----------------------------
DROP TABLE IF EXISTS `master_barang_cencel`;
CREATE TABLE `master_barang_cencel`  (
  `id_cencel` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_cencel` datetime NULL DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `qty` int NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_cencel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_barang_cencel
-- ----------------------------
INSERT INTO `master_barang_cencel` VALUES (7, 'BLI30072100001', '02.01.', '2021-08-05 03:59:01', 1120000, 5, '2021-08-05 03:59:01');
INSERT INTO `master_barang_cencel` VALUES (8, 'BLI30072100001', '02.01.', '2021-08-07 00:59:31', 1120000, 1, '2021-08-07 00:59:31');
INSERT INTO `master_barang_cencel` VALUES (9, 'BLI30072100001', '02.01.', '2021-08-07 01:21:44', 1120000, 1, '2021-08-07 01:21:44');
INSERT INTO `master_barang_cencel` VALUES (10, 'BLI30072100001', '02.01.', '2021-08-07 01:23:06', 1120000, 8, '2021-08-07 01:23:06');
INSERT INTO `master_barang_cencel` VALUES (11, 'BLI01082100001', '04.01.', '2021-08-07 18:10:46', 4500000, 5, '2021-08-07 18:10:46');
INSERT INTO `master_barang_cencel` VALUES (12, 'BLI01082100001', '01.03.', '2021-08-07 18:15:50', 5000000, 1, '2021-08-07 18:15:50');
INSERT INTO `master_barang_cencel` VALUES (13, 'BLI01082100001', '01.03.', '2021-08-07 20:36:01', 5000000, 1, '2021-08-07 20:36:01');
INSERT INTO `master_barang_cencel` VALUES (14, 'BLI07082100002', '01.01.', '2021-08-07 20:42:18', 2000000, 5, '2021-08-07 20:42:18');
INSERT INTO `master_barang_cencel` VALUES (15, 'BLI07082100002', '01.01.', '2021-08-07 20:45:09', 2000000, 5, '2021-08-07 20:45:09');
INSERT INTO `master_barang_cencel` VALUES (16, 'BLI07082100002', '01.01.', '2021-08-07 20:55:54', 2000000, 5, '2021-08-07 20:55:54');
INSERT INTO `master_barang_cencel` VALUES (17, 'BLI07082100002', '01.01.', '2021-08-07 20:59:22', 2000000, 4, '2021-08-07 20:59:22');
INSERT INTO `master_barang_cencel` VALUES (18, 'BLI07082100002', '01.01.', '2021-08-07 21:09:42', 2000000, 2, '2021-08-07 21:09:42');
INSERT INTO `master_barang_cencel` VALUES (19, 'BLI07082100002', '01.01.', '2021-08-07 21:49:31', 2000000, 2, '2021-08-07 21:49:31');
INSERT INTO `master_barang_cencel` VALUES (20, 'BLI07082100002', '01.01.', '2021-08-07 21:50:36', 2000000, 2, '2021-08-07 21:50:36');

-- ----------------------------
-- Table structure for master_login
-- ----------------------------
DROP TABLE IF EXISTS `master_login`;
CREATE TABLE `master_login`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_level` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=Admin;2=User',
  `genre` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=Laki-laki;2=Perempuan',
  `date_login` datetime NOT NULL,
  `status_login` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=Login;2=Logout',
  `user_valid` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=Valid;2=TidakValid',
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_login
-- ----------------------------
INSERT INTO `master_login` VALUES (1, 123, 'Admin', '202cb962ac59075b964b07152d234b70', 'Rista Nursolihah', '1', '2', '2021-08-08 10:56:20', '1', '1', 'default_cewe.png');
INSERT INTO `master_login` VALUES (2, 123456, 'User', '202cb962ac59075b964b07152d234b70', 'Martin', '2', '1', '0000-00-00 00:00:00', '0', '1', 'default_cewe.png');

-- ----------------------------
-- Table structure for master_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `master_pembelian`;
CREATE TABLE `master_pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `nik_admin` int NOT NULL,
  `kd_supplier` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_pembelian` int NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_pembelian
-- ----------------------------
INSERT INTO `master_pembelian` VALUES (13, 'BLI30072100001', '2021-07-30 00:00:00', 123, 'SUP000001', 43600000, '0', '2021-08-07 01:23:06');
INSERT INTO `master_pembelian` VALUES (17, 'BLI01082100001', '2021-08-01 12:35:23', 123, 'SUP000002', 9000000, '0', '2021-08-07 20:36:01');
INSERT INTO `master_pembelian` VALUES (18, 'BLI07082100001', '2021-08-07 01:30:34', 123, 'SUP000003', 500000000, '0', '2021-08-07 01:30:34');
INSERT INTO `master_pembelian` VALUES (19, 'BLI07082100002', '2021-08-07 01:35:10', 123, 'SUP000002', 4000000, '0', '2021-08-07 21:50:36');
INSERT INTO `master_pembelian` VALUES (20, 'BLI07082100003', '2021-08-07 01:38:15', 123, 'SUP000001', 37500000, '0', '2021-08-07 20:34:15');

-- ----------------------------
-- Table structure for master_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `master_penjualan`;
CREATE TABLE `master_penjualan`  (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_admin` int NOT NULL,
  `nama_pelanggan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_penjualan` double NOT NULL,
  `remark` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `kd_perusahaan` int NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pemilik` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_perusahaan`) USING BTREE,
  INDEX `kd_perusahaan`(`kd_perusahaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES (1, 'PUTRA SOURCE', 'Condong Catur, Sleman Yogyakarta', 'Rizka Dwi Saputra', 'Yogyakarta');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `kd_supplier` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_supplier` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'SUP000001', 'Toko Anjas', 'condong catur, sleman', NULL);
INSERT INTO `supplier` VALUES (2, 'SUP000002', 'TB Agus Hokya', 'Kuningan, Bandung Barat Selatan Ke Utara', NULL);
INSERT INTO `supplier` VALUES (3, 'SUP000003', 'Toko Putra', 'jl. merdeka, boyolali, jakarta selatan', NULL);

-- ----------------------------
-- Table structure for tem_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `tem_pembelian`;
CREATE TABLE `tem_pembelian`  (
  `id_tem` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `qty` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_tem`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tem_pembelian
-- ----------------------------
INSERT INTO `tem_pembelian` VALUES (61, 'BLI02082100001', '03.05.', 'Kursi duduk laci sepatu minimalis ', 'SET', 1000000, 17, 17000000);

-- ----------------------------
-- Table structure for tem_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tem_penjualan`;
CREATE TABLE `tem_penjualan`  (
  `id_tem_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `qty` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_tem_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tem_penjualan
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
