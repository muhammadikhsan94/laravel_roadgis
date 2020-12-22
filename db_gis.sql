-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_gis.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_gis.tbl_admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `type`) VALUES
	(1, 'Dinas Bina Marga Kota Bandar Lampung', 'dbmkota', 'de0209b6a63c0b95e8aa056f699fab15', '1'),
	(2, 'Dinas Bina Marga Provinsi Lampung', 'dbmprovinsi', '7711307784dd7b0891f01986b797b9d4', '1');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Dumping structure for table db_gis.tbl_detaillapor
CREATE TABLE IF NOT EXISTS `tbl_detaillapor` (
  `id_lapor` int(5) NOT NULL,
  `disposisi` int(5) NOT NULL,
  `status` varchar(300) DEFAULT NULL,
  `proses_perbaikan` int(3) DEFAULT NULL,
  KEY `FK1_DetailLapor` (`id_lapor`),
  KEY `disposisi` (`disposisi`),
  CONSTRAINT `FK1_DetailLapor` FOREIGN KEY (`id_lapor`) REFERENCES `tbl_lapor` (`id_lapor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_gis.tbl_detaillapor: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_detaillapor` DISABLE KEYS */;
INSERT INTO `tbl_detaillapor` (`id_lapor`, `disposisi`, `status`, `proses_perbaikan`) VALUES
	(5, 1, 'Pengajuan', 25),
	(6, 3, 'Pengajuan', NULL),
	(7, 2, 'Pengajuan', 75);
/*!40000 ALTER TABLE `tbl_detaillapor` ENABLE KEYS */;

-- Dumping structure for table db_gis.tbl_foto
CREATE TABLE IF NOT EXISTS `tbl_foto` (
  `id_lapor` int(5) NOT NULL,
  `foto_jalan` varchar(100) NOT NULL,
  KEY `FK_tbl_foto` (`id_lapor`),
  CONSTRAINT `FK_tbl_foto` FOREIGN KEY (`id_lapor`) REFERENCES `tbl_lapor` (`id_lapor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT;

-- Dumping data for table db_gis.tbl_foto: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_foto` DISABLE KEYS */;
INSERT INTO `tbl_foto` (`id_lapor`, `foto_jalan`) VALUES
	(5, '1608475830_0.jpeg'),
	(6, '1608475935_0.jpeg'),
	(7, '1608475978_0.jpeg');
/*!40000 ALTER TABLE `tbl_foto` ENABLE KEYS */;

-- Dumping structure for table db_gis.tbl_kategori
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(5) NOT NULL DEFAULT '0',
  `nama_kategori` varchar(50) NOT NULL,
  `ikon` varchar(250) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_gis.tbl_kategori: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `ikon`) VALUES
	(1, 'Jalan Rusak Ringan', 'ringan.png'),
	(2, 'Jalan Rusak Sedang', 'sedang.png'),
	(3, 'Jalan Rusak Berat', 'berat.png'),
	(4, 'Diperbaiki', 'perbaikan.png'),
	(5, 'Selesai', 'selesai.png');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;

-- Dumping structure for table db_gis.tbl_lapor
CREATE TABLE IF NOT EXISTS `tbl_lapor` (
  `id_lapor` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_pelapor` varchar(30) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `nama_jalan` varchar(100) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lapor`),
  KEY `FK_tbl_lapor_tbl_kategori` (`id_kategori`),
  CONSTRAINT `FK_tbl_lapor_tbl_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT;

-- Dumping data for table db_gis.tbl_lapor: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_lapor` DISABLE KEYS */;
INSERT INTO `tbl_lapor` (`id_lapor`, `tanggal_lapor`, `nama_pelapor`, `nik`, `alamat`, `no_hp`, `nama_jalan`, `id_kategori`, `lat`, `lng`) VALUES
	(5, '2020-12-20 21:50:30', 'nama', '081389139', 'jalanin aja dulu', '01739173173', 'jalan bumi manti 2', 1, '-5.37383', '105.25117'),
	(6, '2020-12-20 21:52:15', 'af', '211', 'jlajdakd', '01739173173', 'jalan bumi manti 1', 2, '-5.36182', '105.25027'),
	(7, '2020-12-20 21:52:58', 'av', '1920131', 'adhakjbakjb ahfjkabf', '01739173173', 'jalan soemantri bojonegoro', 3, '-6.36383', '106.82205');
/*!40000 ALTER TABLE `tbl_lapor` ENABLE KEYS */;

-- Dumping structure for table db_gis.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_gis.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Dinas Bina Marga Provinsi Lampung', 'dbmprovinsi@gmail.com', NULL, '$2y$10$q/zlr2hc/7ovr7tto1EjTefsgzmdgwkOL84SKi.M7Ijmqozs8CLaC', NULL, NULL, NULL, '2020-12-20 06:08:24', '2020-12-20 06:08:24'),
	(2, 'Dinas Bina Marga Kota Bandar Lampung', 'dbmkota@gmail.com', NULL, '$2y$10$ZGpiDmZPyRr7xWBVKgxyfuLwaw.4ukEv.MOi9V4i49cHTTfUiCI8a', NULL, NULL, NULL, '2020-12-20 06:08:49', '2020-12-20 06:08:49'),
	(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$RmndB1ciqKICSp4G9wguuONTD0p0YE3v0plTHsZQ6g7tE6BylupfO', NULL, NULL, NULL, '2020-12-20 06:09:08', '2020-12-20 06:09:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
