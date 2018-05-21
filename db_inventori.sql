-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.8-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk db_inventory
DROP DATABASE IF EXISTS `db_inventory`;
CREATE DATABASE IF NOT EXISTS `db_inventory` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_inventory`;

-- membuang struktur untuk table db_inventory.master_bulan
DROP TABLE IF EXISTS `master_bulan`;
CREATE TABLE IF NOT EXISTS `master_bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_detail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_bulan: ~12 rows (lebih kurang)
DELETE FROM `master_bulan`;
/*!40000 ALTER TABLE `master_bulan` DISABLE KEYS */;
INSERT INTO `master_bulan` (`id`, `nama`, `nama_detail`) VALUES
	(1, 'Jan', 'Januari'),
	(2, 'Feb', 'Februari'),
	(3, 'Mar', 'Maret'),
	(4, 'Apr', 'April'),
	(5, 'Mei', 'Mei'),
	(6, 'Jun', 'Juni'),
	(7, 'Jul', 'Juli'),
	(8, 'Aug', 'Agustus'),
	(9, 'Sep', 'September'),
	(10, 'Okt', 'Oktober'),
	(11, 'Nov', 'November'),
	(12, 'Des', 'Desember');
/*!40000 ALTER TABLE `master_bulan` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.master_golongan
DROP TABLE IF EXISTS `master_golongan`;
CREATE TABLE IF NOT EXISTS `master_golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `golongan` int(11) NOT NULL DEFAULT '0',
  `eselon` varchar(100) DEFAULT '0',
  `keterangan` varchar(250) DEFAULT '0',
  `gaji` int(11) DEFAULT '0',
  `bonus` int(11) DEFAULT '0',
  `cuti` int(11) DEFAULT '0',
  `oleh` varchar(200) DEFAULT '0',
  `buat` datetime NOT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_golongan: ~2 rows (lebih kurang)
DELETE FROM `master_golongan`;
/*!40000 ALTER TABLE `master_golongan` DISABLE KEYS */;
INSERT INTO `master_golongan` (`id`, `golongan`, `eselon`, `keterangan`, `gaji`, `bonus`, `cuti`, `oleh`, `buat`, `update`) VALUES
	(1, 1, 'I.A', 'Demo I', 1000000, 500000, 15, '0', '0000-00-00 00:00:00', '2018-05-14 21:51:52'),
	(11, 2, 'II A', 'Demo II', 2000000, 150000, 15, '0', '2018-05-14 13:42:04', '2018-05-14 18:42:04');
/*!40000 ALTER TABLE `master_golongan` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.master_jam_kerja
DROP TABLE IF EXISTS `master_jam_kerja`;
CREATE TABLE IF NOT EXISTS `master_jam_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_jam_kerja: ~1 rows (lebih kurang)
DELETE FROM `master_jam_kerja`;
/*!40000 ALTER TABLE `master_jam_kerja` DISABLE KEYS */;
INSERT INTO `master_jam_kerja` (`id`, `nama`, `jam_masuk`, `jam_keluar`) VALUES
	(1, 'Reguler', '08:00:00', '17:00:00');
/*!40000 ALTER TABLE `master_jam_kerja` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.master_kantor
DROP TABLE IF EXISTS `master_kantor`;
CREATE TABLE IF NOT EXISTS `master_kantor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `telp` varchar(150) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_kantor: ~1 rows (lebih kurang)
DELETE FROM `master_kantor`;
/*!40000 ALTER TABLE `master_kantor` DISABLE KEYS */;
INSERT INTO `master_kantor` (`id`, `nama`, `telp`, `photo`, `alamat`, `email`) VALUES
	(1, 'Company Demo', '( 021 ) 12345678', '648568530-20180516-192607.png', 'Jalan. Jakarta No 1', 'za.alfin@gmail.com');
/*!40000 ALTER TABLE `master_kantor` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.master_roles
DROP TABLE IF EXISTS `master_roles`;
CREATE TABLE IF NOT EXISTS `master_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_roles: ~4 rows (lebih kurang)
DELETE FROM `master_roles`;
/*!40000 ALTER TABLE `master_roles` DISABLE KEYS */;
INSERT INTO `master_roles` (`id`, `nama`) VALUES
	(1, 'Administrator'),
	(2, 'Super Admin'),
	(3, 'Admin'),
	(4, 'User');
/*!40000 ALTER TABLE `master_roles` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.master_status
DROP TABLE IF EXISTS `master_status`;
CREATE TABLE IF NOT EXISTS `master_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.master_status: ~3 rows (lebih kurang)
DELETE FROM `master_status`;
/*!40000 ALTER TABLE `master_status` DISABLE KEYS */;
INSERT INTO `master_status` (`id`, `nama`) VALUES
	(1, 'Pengajuan'),
	(2, 'Belum Di Setujui'),
	(3, 'Di Setujui'),
	(4, 'Di Tolak');
/*!40000 ALTER TABLE `master_status` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_barang
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `barang_kode` varchar(15) NOT NULL,
  `barang_nama` varchar(100) DEFAULT NULL,
  `barang_harga` double DEFAULT NULL,
  PRIMARY KEY (`barang_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_inventory.tbl_barang: ~9 rows (lebih kurang)
DELETE FROM `tbl_barang`;
/*!40000 ALTER TABLE `tbl_barang` DISABLE KEYS */;
INSERT INTO `tbl_barang` (`barang_kode`, `barang_nama`, `barang_harga`) VALUES
	('8886057883665', 'Kratindaeng Botol', 5000),
	('8992388133529', 'Oceana Sea Salt Lemonade', 5000),
	('8992761136031', 'Sprite 250ml', 8000),
	('8995227501121', 'Panther Energy Power Red', 4000),
	('8995227501916', 'Panther Energy Lava Blast', 6000),
	('A', 'A', 2222),
	('D', 'D', 0),
	('dsa', 'dsa', 0),
	('S', 'S', 0);
/*!40000 ALTER TABLE `tbl_barang` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_cuti
DROP TABLE IF EXISTS `tbl_cuti`;
CREATE TABLE IF NOT EXISTS `tbl_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dari` datetime DEFAULT NULL,
  `ke` datetime DEFAULT NULL,
  `tgl_pengajuan` datetime DEFAULT NULL,
  `tgl_approval` datetime DEFAULT NULL,
  `tgl_disetujui` datetime DEFAULT NULL,
  `buat` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `approve_ket` varchar(250) DEFAULT NULL,
  `setujui` int(11) DEFAULT NULL,
  `setujui_ket` varchar(250) DEFAULT NULL,
  `tolak` varchar(250) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_cuti_tbl_user_pegawai` (`id_pegawai`),
  KEY `FK_tbl_cuti_master_status` (`status`),
  CONSTRAINT `FK_tbl_cuti_master_status` FOREIGN KEY (`status`) REFERENCES `master_status` (`id`),
  CONSTRAINT `FK_tbl_cuti_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_cuti: ~6 rows (lebih kurang)
DELETE FROM `tbl_cuti`;
/*!40000 ALTER TABLE `tbl_cuti` DISABLE KEYS */;
INSERT INTO `tbl_cuti` (`id`, `id_pegawai`, `status`, `dari`, `ke`, `tgl_pengajuan`, `tgl_approval`, `tgl_disetujui`, `buat`, `approve`, `approve_ket`, `setujui`, `setujui_ket`, `tolak`, `keterangan`, `update`) VALUES
	(1, 3, 2, '2018-05-16 01:41:02', '2018-05-16 01:41:10', '2018-05-15 12:30:30', '2018-05-15 12:30:35', NULL, 3, 3, NULL, NULL, NULL, NULL, 'Ijin Cuti', '2018-05-15 12:31:10'),
	(5, 3, 3, '2018-05-29 21:55:08', '2018-05-29 21:55:08', '2018-05-16 21:55:08', '2018-05-16 21:55:08', '2018-05-19 23:52:36', 3, 3, NULL, 7, 'Demo Setujui 2', NULL, 'Demo', '2018-05-19 23:52:36'),
	(7, 6, 1, '2018-05-17 07:30:52', '2018-05-17 07:30:55', '2018-05-17 07:30:59', '2018-05-17 07:31:01', NULL, 6, NULL, NULL, NULL, NULL, NULL, '-', '2018-05-17 07:31:22'),
	(25, 7, 3, '2018-05-18 23:37:50', '2018-05-18 23:37:50', '2018-05-20 23:37:50', '2018-05-20 23:37:50', NULL, 7, 7, NULL, 7, NULL, NULL, 'Demo Cuti', '2018-05-20 23:41:30'),
	(26, 7, 3, '2018-05-04 23:38:36', '2018-05-04 23:38:36', '2018-05-20 23:38:36', '2018-05-20 23:38:36', NULL, 7, 7, NULL, 7, NULL, NULL, 'A', '2018-05-20 23:41:29'),
	(27, 6, 3, '2018-05-09 01:18:51', '2018-05-09 01:18:51', '2018-05-21 01:18:51', '2018-05-21 01:20:10', '2018-05-21 01:20:17', 6, 3, 'kosong', 7, '', NULL, 'Acara Keluarga', '2018-05-21 01:20:17');
/*!40000 ALTER TABLE `tbl_cuti` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_db
DROP TABLE IF EXISTS `tbl_db`;
CREATE TABLE IF NOT EXISTS `tbl_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_db_tbl_user_pegawai` (`id_pegawai`),
  CONSTRAINT `FK_tbl_db_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_db: ~0 rows (lebih kurang)
DELETE FROM `tbl_db`;
/*!40000 ALTER TABLE `tbl_db` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_db` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_gaji
DROP TABLE IF EXISTS `tbl_gaji`;
CREATE TABLE IF NOT EXISTS `tbl_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `lain` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `print` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_gaji_tbl_user_pegawai` (`id_pegawai`),
  CONSTRAINT `FK_tbl_gaji_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_gaji: ~1 rows (lebih kurang)
DELETE FROM `tbl_gaji`;
/*!40000 ALTER TABLE `tbl_gaji` DISABLE KEYS */;
INSERT INTO `tbl_gaji` (`id`, `id_pegawai`, `email`, `status`, `lain`, `keterangan`, `updated`, `print`) VALUES
	(1, 3, 'Sudah', 'Sudah', NULL, NULL, '2018-05-21 02:26:39', NULL);
/*!40000 ALTER TABLE `tbl_gaji` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_histori
DROP TABLE IF EXISTS `tbl_histori`;
CREATE TABLE IF NOT EXISTS `tbl_histori` (
  `id_pegawai` int(11) DEFAULT NULL,
  `activitas` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `dibuat` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `FK_tbl_histori_tbl_user_pegawai` (`id_pegawai`),
  CONSTRAINT `FK_tbl_histori_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_histori: ~0 rows (lebih kurang)
DELETE FROM `tbl_histori`;
/*!40000 ALTER TABLE `tbl_histori` DISABLE KEYS */;
INSERT INTO `tbl_histori` (`id_pegawai`, `activitas`, `status`, `dibuat`, `updated`) VALUES
	(3, 'Login', 'Login', NULL, '2018-05-21 02:33:59'),
	(7, 'Login', 'Login', NULL, '2018-05-21 03:11:59');
/*!40000 ALTER TABLE `tbl_histori` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_hukuman
DROP TABLE IF EXISTS `tbl_hukuman`;
CREATE TABLE IF NOT EXISTS `tbl_hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `approve_ket` varchar(250) DEFAULT NULL,
  `tolak` varchar(250) DEFAULT NULL,
  `tgl_disetujui` datetime DEFAULT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  `dibuat` int(11) DEFAULT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_hukuman_tbl_user_pegawai` (`id_pegawai`),
  KEY `FK_tbl_hukuman_master_status` (`status`),
  CONSTRAINT `FK_tbl_hukuman_master_status` FOREIGN KEY (`status`) REFERENCES `master_status` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_hukuman_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_hukuman: ~2 rows (lebih kurang)
DELETE FROM `tbl_hukuman`;
/*!40000 ALTER TABLE `tbl_hukuman` DISABLE KEYS */;
INSERT INTO `tbl_hukuman` (`id`, `id_pegawai`, `keterangan`, `cost`, `status`, `approve`, `approve_ket`, `tolak`, `tgl_disetujui`, `tgl_buat`, `dibuat`, `update`) VALUES
	(1, 3, 'Keterlambatan', 100000, 3, NULL, NULL, NULL, '2018-05-15 14:19:31', '2018-05-15 14:35:42', 3, '2018-05-17 05:58:05'),
	(3, 6, 'Uang Makan', 15200, 2, NULL, NULL, NULL, NULL, '2018-05-17 16:47:56', 3, '2018-05-17 22:05:32');
/*!40000 ALTER TABLE `tbl_hukuman` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_kehadiran
DROP TABLE IF EXISTS `tbl_kehadiran`;
CREATE TABLE IF NOT EXISTS `tbl_kehadiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `diupdate` int(11) DEFAULT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_kehadiran_tbl_user_pegawai` (`id_pegawai`),
  CONSTRAINT `FK_tbl_kehadiran_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_kehadiran: ~19 rows (lebih kurang)
DELETE FROM `tbl_kehadiran`;
/*!40000 ALTER TABLE `tbl_kehadiran` DISABLE KEYS */;
INSERT INTO `tbl_kehadiran` (`id`, `id_pegawai`, `tgl_masuk`, `tgl_keluar`, `keterangan`, `diupdate`, `update`) VALUES
	(1, 3, '2018-05-01 07:00:00', '2018-05-01 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(2, 3, '2018-05-02 07:00:00', '2018-05-02 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(3, 3, '2018-05-03 07:00:00', '2018-05-03 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(4, 3, '2018-05-04 07:00:00', '2018-05-04 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(5, 3, '2018-05-05 07:00:00', '2018-05-05 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(6, 3, '2018-05-08 07:00:00', '2018-05-08 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(7, 3, '2018-05-09 07:00:00', '2018-05-09 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(8, 3, '2018-05-10 07:00:00', '2018-05-10 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(9, 3, '2018-05-11 07:00:00', '2018-05-11 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(10, 3, '2018-05-12 07:00:00', '2018-05-12 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(11, 3, '2018-05-13 07:00:00', '2018-05-13 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(12, 3, '2018-05-14 07:00:00', '2018-05-14 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(13, 3, '2018-05-15 07:00:00', '2018-05-15 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(14, 3, '2018-04-15 07:00:00', '2018-04-15 17:01:28', 'Pekerjaan Harian', 3, '2018-05-15 15:01:58'),
	(15, 6, '2018-05-18 19:48:32', '2018-05-18 19:48:34', 'Pekerjaan Harian', 6, '2018-05-18 19:48:39'),
	(25, 3, '2018-05-18 07:00:00', '2018-05-18 17:00:00', 'Demo Change1', 3, '2018-05-21 00:34:00'),
	(28, 7, '2018-05-20 23:15:34', '2018-05-20 23:15:39', 'Pekerjaan Harian', 7, '2018-05-20 23:15:39'),
	(29, 5, '2018-05-21 07:00:00', '2018-05-21 17:00:00', 'Demo Simpan', 3, '2018-05-21 00:54:48'),
	(32, 6, '2018-05-21 01:16:20', '2018-05-21 01:17:37', 'Pekerjaan Harian', 6, '2018-05-21 01:17:37');
/*!40000 ALTER TABLE `tbl_kehadiran` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_penghargaan
DROP TABLE IF EXISTS `tbl_penghargaan`;
CREATE TABLE IF NOT EXISTS `tbl_penghargaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `approve_ket` varchar(250) DEFAULT NULL,
  `tolak` varchar(250) DEFAULT NULL,
  `tgl_disetujui` datetime DEFAULT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  `dibuat` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penghargaan_tbl_user_pegawai` (`id_pegawai`),
  KEY `FK_penghargaan_master_status` (`status`),
  CONSTRAINT `FK_penghargaan_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_penghargaan_master_status` FOREIGN KEY (`status`) REFERENCES `master_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_penghargaan: ~2 rows (lebih kurang)
DELETE FROM `tbl_penghargaan`;
/*!40000 ALTER TABLE `tbl_penghargaan` DISABLE KEYS */;
INSERT INTO `tbl_penghargaan` (`id`, `id_pegawai`, `keterangan`, `cost`, `status`, `approve`, `approve_ket`, `tolak`, `tgl_disetujui`, `tgl_buat`, `dibuat`, `updated`) VALUES
	(1, 3, 'Bonus Akhir Tahun', 500000, 3, 3, NULL, NULL, '2018-05-15 14:51:49', '2018-05-15 14:51:53', 3, '2018-05-15 14:51:59'),
	(2, 5, 'Bonus Sppd2', 200000, 2, NULL, NULL, NULL, NULL, '2018-05-17 17:52:18', 3, NULL);
/*!40000 ALTER TABLE `tbl_penghargaan` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_sppd
DROP TABLE IF EXISTS `tbl_sppd`;
CREATE TABLE IF NOT EXISTS `tbl_sppd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `kota` varchar(250) DEFAULT NULL,
  `dari` datetime DEFAULT NULL,
  `ke` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `approve_ket` varchar(250) DEFAULT NULL,
  `tolak` varchar(250) DEFAULT NULL,
  `tgl_disetujui` datetime DEFAULT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  `dibuat` int(11) DEFAULT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_sppd_tbl_user_pegawai` (`id_pegawai`),
  KEY `FK_sppd_master_status` (`status`),
  CONSTRAINT `FK_sppd_tbl_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_user_pegawai` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_sppd_master_status` FOREIGN KEY (`status`) REFERENCES `master_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_sppd: ~3 rows (lebih kurang)
DELETE FROM `tbl_sppd`;
/*!40000 ALTER TABLE `tbl_sppd` DISABLE KEYS */;
INSERT INTO `tbl_sppd` (`id`, `id_pegawai`, `keterangan`, `kota`, `dari`, `ke`, `cost`, `status`, `approve`, `approve_ket`, `tolak`, `tgl_disetujui`, `tgl_buat`, `dibuat`, `update`) VALUES
	(1, 3, 'Sppd', 'Semarang', '2018-05-18 00:32:25', '2018-05-18 00:32:26', 100000, 3, 7, NULL, NULL, '2018-05-20 21:54:20', '2018-05-18 00:32:44', 3, '2018-05-20 21:54:21'),
	(3, 5, 'SPPD', 'SPPD', '2018-05-18 01:04:20', '2018-05-18 01:04:20', 200000, 2, NULL, NULL, NULL, NULL, '2018-05-18 01:04:20', 3, '2018-05-18 01:04:20'),
	(4, 6, 'Pengerjaan Di Kota A', 'Pengerjaan A', '2018-05-30 01:19:44', '2018-05-30 01:19:44', 1000000, 2, NULL, NULL, NULL, NULL, '2018-05-18 01:19:44', 3, '2018-05-18 01:19:44');
/*!40000 ALTER TABLE `tbl_sppd` ENABLE KEYS */;

-- membuang struktur untuk table db_inventory.tbl_user_pegawai
DROP TABLE IF EXISTS `tbl_user_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_user_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles` int(11) NOT NULL DEFAULT '0',
  `username` varchar(250) DEFAULT '0',
  `nip` varchar(250) DEFAULT '0',
  `nama_lengkap` varchar(250) DEFAULT '0',
  `email` varchar(250) DEFAULT '0',
  `password` varchar(250) DEFAULT '0',
  `golongan` int(11) DEFAULT '0',
  `jam` int(11) DEFAULT '0',
  `tml` varchar(100) DEFAULT '0',
  `tl` date DEFAULT NULL,
  `bank` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `nama_bank` varchar(150) DEFAULT NULL,
  `no_bank` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_user_pegawai_master_roles` (`roles`),
  KEY `FK_tbl_user_pegawai_master_golongan` (`golongan`),
  KEY `FK_tbl_user_pegawai_master_jam_kerja` (`jam`),
  CONSTRAINT `FK_tbl_user_pegawai_master_golongan` FOREIGN KEY (`golongan`) REFERENCES `master_golongan` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_user_pegawai_master_jam_kerja` FOREIGN KEY (`jam`) REFERENCES `master_jam_kerja` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_user_pegawai_master_roles` FOREIGN KEY (`roles`) REFERENCES `master_roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_inventory.tbl_user_pegawai: ~4 rows (lebih kurang)
DELETE FROM `tbl_user_pegawai`;
/*!40000 ALTER TABLE `tbl_user_pegawai` DISABLE KEYS */;
INSERT INTO `tbl_user_pegawai` (`id`, `roles`, `username`, `nip`, `nama_lengkap`, `email`, `password`, `golongan`, `jam`, `tml`, `tl`, `bank`, `photo`, `nama_bank`, `no_bank`) VALUES
	(3, 1, 'admin', '54321', 'Administrator', 'dotaalarif@gmail.com', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 1, 1, '0', NULL, 'Admin', '1138992579-20180516-001420.jpg', 'Mandiri', '012345678'),
	(5, 3, 'demoadmin', '1234', 'demoadmin', 'dotaalarif@gmail.com', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 1, 1, '0', NULL, '', '', '', ''),
	(6, 4, 'demouser', '12345', 'demouser', 'dotaalarif@gmail.com', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 1, 1, '0', NULL, '', '', '', ''),
	(7, 2, 'demosuper', '4321', 'demosuperadmin', 'dotaalarif@gmail.com', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 11, 1, '0', NULL, '', '', '', '');
/*!40000 ALTER TABLE `tbl_user_pegawai` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
