/*
 Navicat Premium Data Transfer

 Source Server         : localhostMYSQL
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : testics2021

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 28/01/2021 15:12:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for trans_d_biodata_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `trans_d_biodata_pekerjaan`;
CREATE TABLE `trans_d_biodata_pekerjaan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_h_bio_data` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `posisi_terakhir` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '0 TIDAK ADA | 1 ADA',
  `pendapatan_terakhir` decimal(10, 2) NOT NULL,
  `tahun` year NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_d_biodata_pekerjaan
-- ----------------------------
INSERT INTO `trans_d_biodata_pekerjaan` VALUES (1, 6, 'PT. MNC Kabel Mediacom', 'IT Application Developer Pool', 3800000.00, 2020, 1, '2021-01-27 11:09:21', NULL, NULL);
INSERT INTO `trans_d_biodata_pekerjaan` VALUES (2, 7, 'Badan Pengawas Tenaga Nuklir', 'IT Web Developer', 7000000.00, 2020, 1, '2021-01-28 02:06:50', NULL, NULL);
INSERT INTO `trans_d_biodata_pekerjaan` VALUES (3, 7, 'PT. MNC Kabel Mediacom', 'IT Web Developer', 3800000.00, 2019, 1, '2021-01-28 02:06:50', NULL, NULL);

-- ----------------------------
-- Table structure for trans_d_biodata_pelatihan
-- ----------------------------
DROP TABLE IF EXISTS `trans_d_biodata_pelatihan`;
CREATE TABLE `trans_d_biodata_pelatihan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_h_bio_data` int(11) NOT NULL,
  `nama_pelatihan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sertifikat` smallint(1) NOT NULL COMMENT '0 TIDAK ADA | 1 ADA',
  `tahun_lulus` year NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_d_biodata_pelatihan
-- ----------------------------
INSERT INTO `trans_d_biodata_pelatihan` VALUES (2, 6, 'Wireless Indoor RF IT', 1, 2020, 1, '2021-01-27 11:09:21', NULL, NULL);
INSERT INTO `trans_d_biodata_pelatihan` VALUES (3, 7, 'Mantap Betul', 0, 2018, 1, '2021-01-28 02:06:50', NULL, NULL);
INSERT INTO `trans_d_biodata_pelatihan` VALUES (4, 7, 'RF IT - Wireless Indoor', 1, 2017, 1, '2021-01-28 02:06:50', NULL, NULL);

-- ----------------------------
-- Table structure for trans_d_biodata_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `trans_d_biodata_pendidikan`;
CREATE TABLE `trans_d_biodata_pendidikan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_h_bio_data` int(11) NOT NULL,
  `jenjang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_intitusi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_lulus` year NOT NULL,
  `ipk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_d_biodata_pendidikan
-- ----------------------------
INSERT INTO `trans_d_biodata_pendidikan` VALUES (5, 6, 'S1', 'STMIK Bina Insani Bekasi', 'Teknik Informatika', 2020, '3.28', 1, '2021-01-27 11:09:21', NULL, NULL);
INSERT INTO `trans_d_biodata_pendidikan` VALUES (6, 7, 'SMK', 'SMK Patriot 1 Bekasi', 'Teknik Komputer Jaringan', 2014, '0', 1, '2021-01-28 02:06:50', NULL, NULL);
INSERT INTO `trans_d_biodata_pendidikan` VALUES (7, 7, 'S1', 'STMIK Bina Insani Bekasi', 'Teknik Informatika', 2018, '3.28', 1, '2021-01-28 02:06:50', NULL, NULL);

-- ----------------------------
-- Table structure for trans_h_biodata
-- ----------------------------
DROP TABLE IF EXISTS `trans_h_biodata`;
CREATE TABLE `trans_h_biodata`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `birth_place` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `home_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cell_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `applied_position` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expected_salary` decimal(10, 2) NOT NULL,
  `skill` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_h_biodata
-- ----------------------------
INSERT INTO `trans_h_biodata` VALUES (6, 'Agus', 'Suandi', 'BEKASI', '1996-07-24', 'Testing', 'Bekasi', '082038', '192039', 'agussuandi48@gmail.com', 'Front End Engineer', 22082015.00, 'PHP, LARAVEL, JAVASCRIPT, REACT JS, IONIC 5 MOBILE, ANGULAR, NODE JS, REACT JS', 1, '2021-01-27 11:09:21', NULL, NULL);
INSERT INTO `trans_h_biodata` VALUES (7, 'Agus', 'Suandi', 'Bekasi', '1996-07-24', 'Kp. Rawa Bambu Bulak', 'Bekasi', '0821938', '1029301', 'max@gmail.com', 'Software Engineer', 22082015.00, 'PHP, Javascript, Node JS, React, Ionic Mobile Apps', 1, '2021-01-28 02:06:50', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_admin` smallint(1) NOT NULL COMMENT '0 NOT ADMIN | 1 ADMIN',
  `is_active` smallint(1) NOT NULL DEFAULT 1 COMMENT '0 INACTIVE | 1 ACTIVE',
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'agus suandi', 'agus.suandi', 'agussuandi48@gmail.com', NULL, '$2y$10$Zrkm8VO.h2NWoRfMjw64j.I2U.l1/NX0wDu3aPJJxy.lMSwjUOWqO', NULL, 1, 1, 1, '2021-01-27 16:06:10', 1, '2021-01-27 16:06:10');
INSERT INTO `users` VALUES (2, 'Agus Insert & Update', 'agus.insert', 'agusinput@gmail.com', NULL, '$2y$10$UaYDU7RRdKYq.Bw2T3CBBOZBbVdkfF1tmTJVtdE4k7gGQs7Bkc2x2', NULL, 0, 1, 1, '2021-01-27 09:36:42', 1, '2021-01-27 09:40:39');
INSERT INTO `users` VALUES (3, 'Ika Noviyanti', 'ika.noviyanti', 'ikanoviyanti@gmail.com', NULL, '$2y$10$LG63n6L/pnAC2m3pCgdbfePH1PyYxN5IwFf4rTg1wEOtVxjredcL2', NULL, 0, 1, 1, '2021-01-28 07:31:59', 3, '2021-01-28 08:10:54');

SET FOREIGN_KEY_CHECKS = 1;
