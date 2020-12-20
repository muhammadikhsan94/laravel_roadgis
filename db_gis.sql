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

-- Dumping data for table db_gis.tbl_admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
REPLACE INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `type`) VALUES
	(1, 'Dinas Bina Marga Kota Bandar Lampung', 'dbmkota', 'de0209b6a63c0b95e8aa056f699fab15', '1'),
	(2, 'Dinas Bina Marga Provinsi Lampung', 'dbmprovinsi', '7711307784dd7b0891f01986b797b9d4', '1');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Dumping data for table db_gis.tbl_detaillapor: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_detaillapor` DISABLE KEYS */;
REPLACE INTO `tbl_detaillapor` (`id_lapor`, `disposisi`, `status`, `proses_perbaikan`) VALUES
	(5, 1, 'Pengajuan', 25),
	(6, 3, 'Pengajuan', NULL),
	(7, 2, 'Pengajuan', 50);
/*!40000 ALTER TABLE `tbl_detaillapor` ENABLE KEYS */;

-- Dumping data for table db_gis.tbl_foto: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_foto` DISABLE KEYS */;
REPLACE INTO `tbl_foto` (`id_lapor`, `foto_jalan`) VALUES
	(5, '1608475830_0.jpeg'),
	(6, '1608475935_0.jpeg'),
	(7, '1608475978_0.jpeg');
/*!40000 ALTER TABLE `tbl_foto` ENABLE KEYS */;

-- Dumping data for table db_gis.tbl_kategori: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
REPLACE INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `ikon`) VALUES
	(1, 'Jalan Rusak Ringan', 'ringan.png'),
	(2, 'Jalan Rusak Sedang', 'sedang.png'),
	(3, 'Jalan Rusak Berat', 'berat.png'),
	(4, 'Diperbaiki', 'perbaikan.png'),
	(5, 'Selesai', 'selesai.png');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;

-- Dumping data for table db_gis.tbl_lapor: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_lapor` DISABLE KEYS */;
REPLACE INTO `tbl_lapor` (`id_lapor`, `tanggal_lapor`, `nama_pelapor`, `nik`, `alamat`, `no_hp`, `nama_jalan`, `id_kategori`, `lat`, `lng`) VALUES
	(5, '2020-12-20 21:50:30', 'nama', '081389139', 'jalanin aja dulu', '01739173173', 'jalan bumi manti 2', 1, '-5.37383', '105.25117'),
	(6, '2020-12-20 21:52:15', 'af', '211', 'jlajdakd', '01739173173', 'jalan bumi manti 1', 2, '-5.36182', '105.25027'),
	(7, '2020-12-20 21:52:58', 'av', '1920131', 'adhakjbakjb ahfjkabf', '01739173173', 'jalan soemantri bojonegoro', 3, '-6.36383', '106.82205');
/*!40000 ALTER TABLE `tbl_lapor` ENABLE KEYS */;

-- Dumping data for table db_gis.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Dinas Bina Marga Provinsi Lampung', 'dbmprovinsi@gmail.com', NULL, '$2y$10$q/zlr2hc/7ovr7tto1EjTefsgzmdgwkOL84SKi.M7Ijmqozs8CLaC', NULL, NULL, NULL, '2020-12-20 06:08:24', '2020-12-20 06:08:24'),
	(2, 'Dinas Bina Marga Kota Bandar Lampung', 'dbmkota@gmail.com', NULL, '$2y$10$ZGpiDmZPyRr7xWBVKgxyfuLwaw.4ukEv.MOi9V4i49cHTTfUiCI8a', NULL, NULL, NULL, '2020-12-20 06:08:49', '2020-12-20 06:08:49'),
	(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$RmndB1ciqKICSp4G9wguuONTD0p0YE3v0plTHsZQ6g7tE6BylupfO', NULL, NULL, NULL, '2020-12-20 06:09:08', '2020-12-20 06:09:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
