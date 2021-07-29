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

 Date: 29/07/2021 19:23:44
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
  `kd_supplier` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_in` int NOT NULL,
  `item_out` int NOT NULL,
  `item_cancel` int NOT NULL,
  `remark` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_log_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log_barang
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for detail_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE `detail_pembelian`  (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` double NOT NULL,
  `item` int NOT NULL,
  `total` double NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  `id_detail_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `item` int NOT NULL,
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
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '0=Tidak Aktif;1=Aktif',
  PRIMARY KEY (`id_kd_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kode_barang
-- ----------------------------
INSERT INTO `kode_barang` VALUES (1, '01.', '*', 'Sofa', '1');
INSERT INTO `kode_barang` VALUES (2, '01.', '01.', 'Sofa tamu L minimalis', '1');
INSERT INTO `kode_barang` VALUES (3, '01.', '02.', 'Sofa U minimalis living fulset meja', '1');
INSERT INTO `kode_barang` VALUES (4, '01.', '03.', 'Set sofa rotan sintesis minimalis azura', '1');
INSERT INTO `kode_barang` VALUES (5, '01.', '04.', 'Sofa louis kayu jati jepara', '1');
INSERT INTO `kode_barang` VALUES (6, '01.', '05.', 'Sofa minimalis modern L shape tosca', '1');
INSERT INTO `kode_barang` VALUES (7, '02.', '*', 'Meja', '1');
INSERT INTO `kode_barang` VALUES (8, '02.', '01.', 'Set meja makan jati minimalis 6 kursi ', '1');
INSERT INTO `kode_barang` VALUES (9, '02.', '02.', 'Set meja makan trembesi 2x1 meter solid glossy', '1');
INSERT INTO `kode_barang` VALUES (10, '02.', '03.', 'Meja kerja putih welnut ', '1');
INSERT INTO `kode_barang` VALUES (11, '02.', '04.', 'Set meja café minimalis kayu jati ', '1');
INSERT INTO `kode_barang` VALUES (12, '02.', '05.', 'Meja repsesionis minimalis modern ', '1');
INSERT INTO `kode_barang` VALUES (13, '03.', '*', 'Kursi', '1');
INSERT INTO `kode_barang` VALUES (14, '03.', '01.', 'Set kursi teras jati minimalis daun jepara', '1');
INSERT INTO `kode_barang` VALUES (15, '03.', '02.', 'Kursi tamu minimalis model box', '1');
INSERT INTO `kode_barang` VALUES (16, '03.', '03.', 'Kursi retro L minimalis', '1');
INSERT INTO `kode_barang` VALUES (17, '03.', '04.', 'Set kursi tamu jati minimalis model koin mawar', '1');
INSERT INTO `kode_barang` VALUES (18, '03.', '05.', 'Kursi duduk laci sepatu minimalis ', '1');
INSERT INTO `kode_barang` VALUES (19, '04.', '*', 'Lemari', '1');
INSERT INTO `kode_barang` VALUES (20, '04.', '01.', 'Lemari pakaian 3 pintu glossy', '1');
INSERT INTO `kode_barang` VALUES (21, '04.', '02.', 'Lemari tv bufet lemari pajangan', '1');
INSERT INTO `kode_barang` VALUES (22, '04.', '03.', 'Lemari pajangan minimalis ukir jati', '1');
INSERT INTO `kode_barang` VALUES (23, '04.', '04.', 'Lemari pakaian 4 pintu sliding', '1');
INSERT INTO `kode_barang` VALUES (24, '04.', '05.', 'Atria lemari pakaian pintu tarik', '1');
INSERT INTO `kode_barang` VALUES (25, '05.', '*', 'Kasur', '1');
INSERT INTO `kode_barang` VALUES (26, '05.', '01.', 'Kasur informa sleep 200x200 cm', '1');
INSERT INTO `kode_barang` VALUES (27, '05.', '02.', 'Kasur informa sleep 120x200 cm', '1');
INSERT INTO `kode_barang` VALUES (28, '05.', '03.', 'Kasur informa sleep 100x200 cm', '1');
INSERT INTO `kode_barang` VALUES (29, '05.', '04.', 'Kasur busa inoac (ori)', '1');
INSERT INTO `kode_barang` VALUES (30, '05.', '05.', 'Kasur spring bed inthebox 160x200 cm', '1');
INSERT INTO `kode_barang` VALUES (31, '06.', '*', 'Kitchen Set', '1');
INSERT INTO `kode_barang` VALUES (32, '06.', '01.', 'Kitchen set rak dapur lemari piring white marble', '1');
INSERT INTO `kode_barang` VALUES (33, '06.', '02.', 'Kitchen set lemari multi fungsi', '1');
INSERT INTO `kode_barang` VALUES (34, '06.', '03.', 'Kitchen set rak bawah 3 pintu', '1');
INSERT INTO `kode_barang` VALUES (35, '06.', '04.', 'Kitchen set minimalis meranti', '1');
INSERT INTO `kode_barang` VALUES (36, '06.', '05.', 'Kitchen set bawah 3 pintu modern', '1');

-- ----------------------------
-- Table structure for master_barang
-- ----------------------------
DROP TABLE IF EXISTS `master_barang`;
CREATE TABLE `master_barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kd_barang` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_jual` int NOT NULL,
  `harga_beli` int NOT NULL,
  `stok` int NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '1=b=Belum Terjual;2=Sudah Terjual',
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_barang
-- ----------------------------

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
INSERT INTO `master_login` VALUES (1, 123, 'Admin', '202cb962ac59075b964b07152d234b70', 'Rista Nursolihah', '1', '2', '2021-07-29 11:51:18', '0', '1', 'default_cewe.png');
INSERT INTO `master_login` VALUES (2, 123456, 'User', '202cb962ac59075b964b07152d234b70', 'Martin', '2', '1', '0000-00-00 00:00:00', '0', '1', 'default_cewe.png');

-- ----------------------------
-- Table structure for master_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `master_pembelian`;
CREATE TABLE `master_pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `nik_admin` int NOT NULL,
  `kd_supplier` int NOT NULL,
  `total_pembelian` double NOT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for master_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `master_penjualan`;
CREATE TABLE `master_penjualan`  (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
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
  `kd_supplier` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
  `item` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_tem`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tem_pembelian
-- ----------------------------
INSERT INTO `tem_pembelian` VALUES (5, 'BLI29072100001', '01.02.', 'Sofa U minimalis living fulset meja', 'SET', 1000000, 10, 10000000);

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
  `item` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_tem_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tem_penjualan
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
