-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sirusak.tbl_dokter
CREATE TABLE IF NOT EXISTS `tbl_dokter` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(30) NOT NULL,
  `departemen` varchar(30) NOT NULL,
  `jadwal_praktik` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_dokter: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_dokter` DISABLE KEYS */;
INSERT INTO `tbl_dokter` (`id_user`, `nama_dokter`, `departemen`, `jadwal_praktik`) VALUES
	(1001, 'Irsyad Muhammad, dr', 'Umum', 'Senin - Kamis | 08.00 - 15.00'),
	(1002, 'Pranata Audy, dr.SpB', 'Gigi', 'Senin - Kamis | 08.00 - 15.00'),
	(1003, 'Jaidi, dr.SpA', 'Anak', 'Senin - Kamis | 08.00 - 15.00'),
	(1004, 'Anugrah Pratama, dr.SpPD', 'Kandungan', 'Senin - Kamis | 08.00 - 15.00'),
	(1005, 'Dendi Abdul Rohim, H.dr.SpB', 'THT', 'Senin - Kamis | 08.00 - 15.00'),
	(1006, 'Kurniawan Aditya, dr.SpOG', 'Kandungan', 'Senin - Kamis | 08.00 - 15.00'),
	(1007, 'Arifin Muhammad, dr.SpS.Mkes', 'Syaraf', 'Senin - Kamis | 08.00 - 15.00'),
	(1008, 'Gyats Haitsam, Hj.dr.SpKK', 'Kulit dan Kelamin', 'Senin - Kamis | 08.00 - 15.00'),
	(1009, 'Dono Aditia, .dr.SpTHT', 'THT', 'Senin - Kamis | 08.00 - 15.00'),
	(1011, 'Gustian M, dr', 'Syaraf', 'Senin - Kamis | 08.00 - 15.00'),
	(1012, 'Septianti Amalia, S.PSi', 'Umum', 'Senin - Kamis | 08.00 - 15.00'),
	(1013, 'Setyaningsih D, dr.SpA', 'Anak', 'Senin - Kamis | 08.00 - 15.00'),
	(1014, 'Bayu, H.dr.SpB', 'Umum', 'Senin - Kamis | 08.00 - 15.00');
/*!40000 ALTER TABLE `tbl_dokter` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_pasien
CREATE TABLE IF NOT EXISTS `tbl_pasien` (
  `id_pasien` int(20) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `nama_pj` varchar(20) NOT NULL,
  `alamat_pj` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_pasien: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_pasien` DISABLE KEYS */;
INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_kelamin`, `pekerjaan`, `nama_pj`, `alamat_pj`, `no_telepon`) VALUES
	(1, 'Sasa', 'Sleman', 'P', 'Ibu Rumah Tangga', 'siso', 'Bantul', '081227722'),
	(2, 'Roni', 'Sleman', 'L', 'PNS', 'Ana', 'Sleman', '08122765431'),
	(3, 'Jessica Mila ', 'Sleman', 'P', 'Ibu Rumah Tangga', 'Rio', 'Yogyakarta', '09848487');
/*!40000 ALTER TABLE `tbl_pasien` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_pri
CREATE TABLE IF NOT EXISTS `tbl_pri` (
  `id_ri` int(20) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(20) NOT NULL,
  `id_tarif_ri` int(20) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date DEFAULT NULL,
  `hari_menginap` int(10) DEFAULT NULL,
  `biaya` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_ri`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_pri: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_pri` DISABLE KEYS */;
INSERT INTO `tbl_pri` (`id_ri`, `id_pasien`, `id_tarif_ri`, `keluhan`, `tanggal_checkin`, `tanggal_checkout`, `hari_menginap`, `biaya`, `bayar`) VALUES
	(1, 2, 101, 'Kecelakaan', '2019-06-25', '2019-06-26', 1, 375000, 500000),
	(2, 3, 101, 'qwdwd', '2019-07-02', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_pri` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_prj
CREATE TABLE IF NOT EXISTS `tbl_prj` (
  `no_rj` int(20) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(20) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `departemen` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text,
  `biaya` int(10) DEFAULT NULL,
  `tindakan` text,
  `resep` text,
  `harga_resep` int(12) DEFAULT NULL,
  `bayar` int(12) DEFAULT NULL,
  PRIMARY KEY (`no_rj`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `tbl_prj_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_prj: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_prj` DISABLE KEYS */;
INSERT INTO `tbl_prj` (`no_rj`, `id_dokter`, `id_pasien`, `departemen`, `tanggal`, `keluhan`, `diagnosa`, `biaya`, `tindakan`, `resep`, `harga_resep`, `bayar`) VALUES
	(1, '1001', 1, 'Umum', '2019-06-25 12:24:03', 'Sakit kepala belakang dan demam tinggi', 'Flu', 30000, 'Pemberian obat', 'obat flu', 10000, 40000),
	(2, '1001', 3, 'Umum', '2019-07-02 10:06:26', 'Muntah Berak', 'Muntaber', 25000, 'Pemberian obat jalan', 'obat muntah | 3x1obat oralit | 3x1', 60000, NULL);
/*!40000 ALTER TABLE `tbl_prj` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_resep
CREATE TABLE IF NOT EXISTS `tbl_resep` (
  `id_resep` int(9) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(8) NOT NULL,
  `id_pasien` varchar(2) NOT NULL,
  `nama_resep` varchar(50) NOT NULL,
  `rincian_resep` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_resep: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_resep` DISABLE KEYS */;
INSERT INTO `tbl_resep` (`id_resep`, `id_dokter`, `id_pasien`, `nama_resep`, `rincian_resep`, `tanggal`) VALUES
	(1, 1004, '16', 'asdasdasd ', 'asdasdasd \r\nfgdsfgsdf\r\ngsdfg\r\nsdfg\r\nsdfg\r\ndsfg\r\nsdfg\r\nsdfg\r\ndsfg\r\ndsfg', '2014-12-05 15:19:00'),
	(5, 1004, '17', 'aaaa', 'aaaaa\r\ndasdasd f\r\nas fs\r\nadfasdfasdf sadf\r\nasdf\r\nasdf\r\nasd fasdfasdf asdfasdf', '2014-12-06 01:42:33');
/*!40000 ALTER TABLE `tbl_resep` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_tagihan_ri
CREATE TABLE IF NOT EXISTS `tbl_tagihan_ri` (
  `id_tagihan_ri` int(5) NOT NULL,
  `id_pasien` int(6) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `lama_inap` int(5) NOT NULL,
  `harga_ruang` int(10) NOT NULL,
  `harga_tindakan` int(10) NOT NULL,
  `total_tagihan` int(10) NOT NULL,
  PRIMARY KEY (`id_tagihan_ri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_tagihan_ri: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_tagihan_ri` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tagihan_ri` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_tarif_ri
CREATE TABLE IF NOT EXISTS `tbl_tarif_ri` (
  `id_tarif_ri` int(20) NOT NULL AUTO_INCREMENT,
  `perawatan` varchar(20) NOT NULL,
  `pelayanan` varchar(30) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `tarif` int(10) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  PRIMARY KEY (`id_tarif_ri`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_tarif_ri: ~37 rows (approximately)
/*!40000 ALTER TABLE `tbl_tarif_ri` DISABLE KEYS */;
INSERT INTO `tbl_tarif_ri` (`id_tarif_ri`, `perawatan`, `pelayanan`, `tipe_kamar`, `tarif`, `kapasitas`) VALUES
	(101, 'Rawat Inap per hari', 'Dokter Spesials dan Umum', 'Kelas VIP', 375000, 1),
	(102, 'Rawat Inap per hari', 'Dokter Spesials dan Umum', 'Kelas I', 220000, 2),
	(103, 'Rawat Inap per hari', 'Dokter Spesials dan Umum', 'Kelas II', 153000, 3),
	(104, 'Rawat Inap per hari', 'Dokter Spesials dan Umum', 'Kelas III', 130000, 6),
	(105, 'Rawat Inap per hari', 'Dokter Umum', 'Kelas VIP', 325000, 1),
	(106, 'Rawat Inap per hari', 'Dokter Umum', 'Kelas I', 200000, 2),
	(107, 'Rawat Inap per hari', 'Dokter Umum', 'Kelas II', 147000, 3),
	(108, 'Rawat Inap per hari', 'Dokter Umum', 'Kelas III', 120000, 6),
	(109, 'Ruang ICU', 'Dokter Spesials dan Umum', '', 200000, 2),
	(110, 'Ruang ICU', 'Dokter Umum', '', 180000, 2),
	(111, 'Ruang ICU', 'Instalasi  Anestesi', 'Kelas I', 217000, 2),
	(112, 'Ruang ICU', 'Instalasi  Anestesi', 'Kelas II', 170000, 3),
	(113, 'Ruang ICU', 'Instalasi  Anestesi', 'Kelas III', 136000, 6),
	(114, 'Perinatologi', 'Dokter Spesialis dan Umum', 'Kelas VIP', 225000, 1),
	(115, 'Perinatologi', 'Dokter Spesialis dan Umum', 'Kelas I', 192000, 2),
	(116, 'Perinatologi', 'Dokter Spesialis dan Umum', 'Kelas II', 130000, 3),
	(117, 'Perinatologi', 'Dokter Spesialis dan Umum', 'Kelas III', 130000, 6),
	(118, 'Perinatologi', 'Dokter Umum', 'Kelas VIP', 200000, 1),
	(119, 'Perinatologi', 'Dokter Umum', 'Kelas I', 172000, 2),
	(120, 'Perinatologi', 'Dokter Umum', 'Kelas II', 130000, 3),
	(121, 'Perinatologi', 'Dokter Umum', 'Kelas III', 120000, 6),
	(122, 'Perinatologi', 'Gizi Rawat Inap', 'Kelas VIP', 120000, 1),
	(123, 'Perinatologi', 'Gizi Rawat Inap', 'Kelas I', 100000, 2),
	(124, 'Perinatologi', 'Gizi Rawat Inap', 'Kelas II', 70000, 3),
	(125, 'Perinatologi', 'Gizi Rawat Inap', 'Kelas III', 30000, 6),
	(126, 'Perinatologi', 'Persalinan Normal Dokter', 'Kelas VIP', 560000, 1),
	(127, 'Perinatologi', 'Persalinan Normal Dokter', 'Kelas I', 470000, 2),
	(128, 'Perinatologi', 'Persalinan Normal Dokter', 'Kelas II', 330000, 3),
	(129, 'Perinatologi', 'Persalinan Normal Dokter', 'Kelas III', 270000, 6),
	(130, 'Perinatologi', 'Persalinan Normal Bidan', 'Kelas VIP', 350000, 1),
	(131, 'Perinatologi', 'Persalinan Normal Bidan', 'Kelas I', 300000, 2),
	(132, 'Perinatologi', 'Persalinan Normal Bidan', 'Kelas II', 220000, 3),
	(133, 'Perinatologi', 'Persalinan Normal Bidan', 'Kelas III', 190000, 6),
	(134, 'Perinatologi', 'Persalinan Tidak Normal', 'Kelas VIP', 930000, 1),
	(135, 'Perinatologi', 'Persalinan Tidak Normal', 'Kelas I', 750000, 2),
	(136, 'Perinatologi', 'Persalinan Tidak Normal', 'Kelas II', 540000, 3),
	(137, 'Perinatologi', 'Persalinan Tidak Normal', 'Kelas III', 470000, 5);
/*!40000 ALTER TABLE `tbl_tarif_ri` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_tarif_rj
CREATE TABLE IF NOT EXISTS `tbl_tarif_rj` (
  `id_tarif_rj` int(3) NOT NULL AUTO_INCREMENT,
  `departemen` varchar(30) NOT NULL,
  `tarif` int(8) NOT NULL,
  PRIMARY KEY (`id_tarif_rj`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_tarif_rj: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_tarif_rj` DISABLE KEYS */;
INSERT INTO `tbl_tarif_rj` (`id_tarif_rj`, `departemen`, `tarif`) VALUES
	(5, 'Umum', 150000),
	(6, 'Gigi', 160000),
	(7, 'Anak', 180000),
	(8, 'Kandungan', 200000),
	(9, 'THT', 150000),
	(10, 'Syaraf', 180000),
	(11, 'Kulit dan Kelamin', 300000);
/*!40000 ALTER TABLE `tbl_tarif_rj` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_tindakan
CREATE TABLE IF NOT EXISTS `tbl_tindakan` (
  `id_tindakan` int(20) NOT NULL AUTO_INCREMENT,
  `id_pri` int(20) NOT NULL DEFAULT '0',
  `id_user` int(29) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `tindakan` text NOT NULL,
  `hasil` text,
  `biaya_tindakan` int(10) DEFAULT '0',
  `resep` text,
  `harga_resep` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_tindakan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_tindakan` DISABLE KEYS */;
INSERT INTO `tbl_tindakan` (`id_tindakan`, `id_pri`, `id_user`, `tanggal`, `tindakan`, `hasil`, `biaya_tindakan`, `resep`, `harga_resep`) VALUES
	(17, 1, 1001, '2019-06-25', 'Pemberian betadin untuk luka', 'Luka sudah bersih', 30000, NULL, NULL),
	(18, 1, 1004, '2019-06-25', 'Pemberian obat penghilang rasa sakit', 'Pasien masih merasa sakit di luka', 45000, NULL, NULL),
	(19, 1, 1001, '2019-06-26', 'Pemberian obat dan penutupan luka', 'Rasa sakit sudah hilang boleh rawat jalan.', 30000, NULL, NULL),
	(20, 2, 1001, '2019-07-02', 'qedsf', 'efsfs', 12344, 'jsjsksj', NULL);
/*!40000 ALTER TABLE `tbl_tindakan` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `grup` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1038 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_user: ~22 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `status`, `hak_akses`, `grup`) VALUES
	(2, 'ahmad', 'ahmad', '0', 'Departemen', 'Kandungan'),
	(3, 'dendi', 'dendi', '0', 'Front Office', ''),
	(5, 'tht', 'tht', '0', 'Departemen', 'THT'),
	(6, 'umum', 'umum', '0', 'Departemen', 'Umum'),
	(1001, 'irsyad', 'irsyad', '0', 'Dokter', 'Irsyad Muhammad, dr'),
	(1002, 'vaksi', 'vaksi', '0', 'Dokter', 'Pranata Audy, dr.SpB'),
	(1003, 'rafdi', 'rafdi', '0', 'Dokter', 'Jaidi, dr.SpA'),
	(1004, 'adit', 'adit', '0', 'Dokter', 'Anugrah Pratama, dr.SpPD'),
	(1007, 'ipin', 'ipin', '0', 'Dokter', 'Arifin Muhammad, dr.SpS.Mkes'),
	(1010, 'zeffry', 'zeffry', '0', 'Dokter', 'Zeffry Irwanto, dr.SpM'),
	(1011, 'kulitkelamin', 'kulitkelamin', '0', 'Departemen', 'Kulit dan Kelamin'),
	(1012, 'syaraf', 'syaraf', '0', 'Departemen', 'Syaraf'),
	(1013, 'gigi', 'gigi', '0', 'Departemen', 'Gigi'),
	(1014, 'anak', 'anak', '0', 'Departemen', 'Anak'),
	(1015, 'kandungan', 'kandungan', 'Aktif', 'Departemen', 'Kandungan'),
	(1016, 'kandungan', 'kandungan', 'Aktif', 'Departemen', 'Kandungan'),
	(1020, 'Lala', 'Lali', 'Aktif', 'Admin', 'Admin'),
	(1021, 'Dicky', 'dickyyulianto', 'Aktif', 'Front Office', 'FO'),
	(1022, 'lili', 'lili', 'Aktif', 'Apoteker', 'Apotek'),
	(1032, 'lolo', 'olol', 'Aktif', 'Admin', 'Admin'),
	(1033, 'kasir', 'kasir', 'Aktif', 'Kasir', 'Kasir'),
	(1034, 'Septianti', 'septi', 'Aktif', 'Dokter', 'Septianti Amalia, S.PSi'),
	(1035, 'front-office', 'front', 'Aktif', 'Front Office', 'FO'),
	(1036, 'Admin', 'admin', 'Aktif', 'Admin', 'Admin'),
	(1037, 'Apotik', 'apotik', 'Aktif', 'Apoteker', 'Apotek');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
