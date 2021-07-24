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

 Date: 24/07/2021 04:20:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL,
  `log_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_aksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_item` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, '2021-07-24 03:34:03', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (2, '2021-07-24 03:35:34', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (3, '2021-07-24 03:35:46', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (4, '2021-07-24 03:36:45', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (5, '2021-07-24 03:53:37', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (6, '2021-07-24 03:53:44', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (7, '2021-07-24 03:54:53', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (8, '2021-07-24 03:55:10', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (9, '2021-07-24 03:55:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (10, '2021-07-24 03:56:56', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (11, '2021-07-24 03:57:01', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (12, '2021-07-24 03:58:42', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (13, '2021-07-24 03:58:49', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (14, '2021-07-24 03:59:59', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (15, '2021-07-24 04:00:07', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (16, '2021-07-24 04:01:11', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (17, '2021-07-24 04:02:18', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (18, '2021-07-24 04:02:27', 'Admin', 'logout', 'Keluar', '');
INSERT INTO `activity_log` VALUES (19, '2021-07-24 04:03:15', 'Admin', 'login', 'Masuk', '');
INSERT INTO `activity_log` VALUES (20, '2021-07-24 04:03:22', 'Admin', 'logout', 'Keluar', '');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `kd_admin` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (5, 'Putra', 'saputra2@gmail.com', 'admin', '1330353508976947169.jpg');
INSERT INTO `admin` VALUES (6, 'admin', 'admin@admin.com', 'admin', 'team1.jpg');
INSERT INTO `admin` VALUES (7, 'Mas Poetra', 'admin2@admin.com', 'admin2', '141204-201433.jpg');

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_jual` int NOT NULL,
  `harga_beli` int NOT NULL,
  `stok` int NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('BB000001', 'Barang 1', 'PCS', 200000, 180000, 50, '0');
INSERT INTO `barang` VALUES ('BB000002', 'Barang 2', 'DUS', 340000, 300000, 12, '0');
INSERT INTO `barang` VALUES ('BB000003', 'Buku 1', 'DUS', 450000, 400000, 75, '0');

-- ----------------------------
-- Table structure for barang_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `barang_pembelian`;
CREATE TABLE `barang_pembelian`  (
  `kd_barang_beli` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang_beli` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` double NOT NULL,
  `item` int NOT NULL,
  `total` double NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_barang_beli`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 109 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang_pembelian
-- ----------------------------
INSERT INTO `barang_pembelian` VALUES (106, 'PEM00001', 'Buku 1', 'DUS', 400000, 80, 32000000, '0');
INSERT INTO `barang_pembelian` VALUES (107, 'PEM00001', 'Buku 2', 'DUS', 120000, 30, 3600000, '0');

-- ----------------------------
-- Table structure for barangp_sementara
-- ----------------------------
DROP TABLE IF EXISTS `barangp_sementara`;
CREATE TABLE `barangp_sementara`  (
  `id_barangp` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barangp` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_barangp` double NOT NULL,
  `item` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_barangp`) USING BTREE,
  INDEX `kd_pembelian`(`kd_pembelian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barangp_sementara
-- ----------------------------

-- ----------------------------
-- Table structure for d_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `d_pembelian`;
CREATE TABLE `d_pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang_beli` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE,
  INDEX `kd_pembelian`(`kd_pembelian`) USING BTREE,
  INDEX `kd_pembelian_2`(`kd_pembelian`) USING BTREE,
  INDEX `kd_barang_beli`(`kd_barang_beli`) USING BTREE,
  INDEX `kd_barang_beli_2`(`kd_barang_beli`) USING BTREE,
  CONSTRAINT `d_pembelian_ibfk_3` FOREIGN KEY (`kd_pembelian`) REFERENCES `pembelian` (`kd_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `d_pembelian_ibfk_4` FOREIGN KEY (`kd_barang_beli`) REFERENCES `barang_pembelian` (`kd_barang_beli`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 162 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of d_pembelian
-- ----------------------------
INSERT INTO `d_pembelian` VALUES (159, 'PEM00001', 106, 80, 32000000);
INSERT INTO `d_pembelian` VALUES (160, 'PEM00001', 107, 30, 3600000);

-- ----------------------------
-- Table structure for d_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `d_penjualan`;
CREATE TABLE `d_penjualan`  (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE,
  INDEX `kd_penjualan`(`kd_penjualan`) USING BTREE,
  INDEX `kd_barang`(`kd_barang`) USING BTREE,
  INDEX `kd_barang_2`(`kd_barang`) USING BTREE,
  CONSTRAINT `d_penjualan_ibfk_3` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `d_penjualan_ibfk_4` FOREIGN KEY (`kd_penjualan`) REFERENCES `penjualan` (`kd_penjualan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of d_penjualan
-- ----------------------------
INSERT INTO `d_penjualan` VALUES (55, 'PEN00001', 'BB000003', 5, 2250000);

-- ----------------------------
-- Table structure for master_login
-- ----------------------------
DROP TABLE IF EXISTS `master_login`;
CREATE TABLE `master_login`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
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
INSERT INTO `master_login` VALUES (1, 'Admin', '202cb962ac59075b964b07152d234b70', 'Rista', '1', '2', '2021-07-24 04:03:15', '', '1', 'default_cewe.png');
INSERT INTO `master_login` VALUES (2, 'User', '202cb962ac59075b964b07152d234b70', 'Martin', '2', '1', '0000-00-00 00:00:00', '0', '1', 'default_cewe.png');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `kd_pembelian` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kd_admin` int NOT NULL,
  `kd_supplier` int NOT NULL,
  `total_pembelian` double NOT NULL,
  PRIMARY KEY (`kd_pembelian`) USING BTREE,
  INDEX `kd_admin`(`kd_admin`) USING BTREE,
  INDEX `kd_supplier`(`kd_supplier`) USING BTREE,
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('PEM00001', '2016-03-13', 6, 4, 35600000);

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_admin` int NOT NULL,
  `dibayar` double NOT NULL,
  `total_penjualan` double NOT NULL,
  PRIMARY KEY (`kd_penjualan`) USING BTREE,
  INDEX `kd_admin`(`kd_admin`) USING BTREE,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('PEN00001', '2016-03-13', 6, 2260000, 2250000);

-- ----------------------------
-- Table structure for penjualan_sementara
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_sementara`;
CREATE TABLE `penjualan_sementara`  (
  `id_penjualan_sementara` int NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `item` int NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_penjualan_sementara`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_sementara
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
  `kd_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'Toko Anjas', 'condong catur, sleman');
INSERT INTO `supplier` VALUES (3, 'TB Agus Hokya', 'Kuningan, Bandung Barat Selatan Ke Utara');
INSERT INTO `supplier` VALUES (4, 'Toko Putra', 'jl. merdeka, boyolali, jakarta selatan');

SET FOREIGN_KEY_CHECKS = 1;
