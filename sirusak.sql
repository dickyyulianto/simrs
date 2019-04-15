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


-- Dumping database structure for sirusak
CREATE DATABASE IF NOT EXISTS `sirusak` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sirusak`;

-- Dumping structure for table sirusak.tbl_dokter
CREATE TABLE IF NOT EXISTS `tbl_dokter` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
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
  `id_pasien` int(6) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_pasien: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_pasien` DISABLE KEYS */;
INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_kelamin`, `no_telepon`) VALUES
	(11, 'Muhammad Ilyas Firdaus', 'alam kubur', 'P', '081264162'),
	(16, 'Raffi Ahmad', 'Jonggol', 'L', '08126252153'),
	(17, 'Kevin Julio', 'Cimahi', 'P', '08172352412'),
	(18, 'Chelsea Islan', 'Jakarta', 'P', '082416242'),
	(19, 'Raisa Ardiana', 'Sukabumi', 'P', '0212312415'),
	(20, 'Tina Toon', 'Banyuwangi', 'P', '08098999'),
	(21, 'Joshua', 'Surabaya', 'L', '08123122353'),
	(22, 'Risa Tachibana', 'Jampang', 'P', '08124124412'),
	(23, 'Sarah Ardelia', 'Bogor', 'P', '0812524124'),
	(24, 'Jessica Mila', 'Madiun', 'P', '08235141212'),
	(25, 'Ricky Harun', 'Lampung', 'L', '08235235235');
/*!40000 ALTER TABLE `tbl_pasien` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_pri
CREATE TABLE IF NOT EXISTS `tbl_pri` (
  `id_ri` int(8) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(6) NOT NULL,
  `id_ruang` int(5) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date DEFAULT NULL,
  `hari_menginap` int(11) DEFAULT NULL,
  `biaya` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_ri`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_pri: ~18 rows (approximately)
/*!40000 ALTER TABLE `tbl_pri` DISABLE KEYS */;
INSERT INTO `tbl_pri` (`id_ri`, `id_pasien`, `id_ruang`, `keluhan`, `tanggal_checkin`, `tanggal_checkout`, `hari_menginap`, `biaya`, `bayar`) VALUES
	(1, 16, 106, 'd', '2019-04-04', '2019-04-12', 8, 1600000, 3333333),
	(2, 24, 106, 'ttt', '2019-04-05', '2019-04-08', 3, 600000, 150000),
	(3, 11, 106, 'y', '2019-04-04', '2019-04-05', 1, 200000, 200000),
	(4, 25, 106, 'y', '2019-04-04', '2019-04-07', 3, 600000, 3333333),
	(5, 24, 106, 'e', '2019-04-04', '2019-04-05', 1, 200000, 3333333),
	(6, 16, 105, 'qq', '2019-04-04', '2019-04-06', 2, 650000, 3333),
	(7, 11, 107, 'e', '2019-04-03', '2019-04-09', 6, 882000, 3333),
	(8, 16, 107, 'wdwd', '2019-04-10', '2019-04-16', 6, 882000, 200000),
	(9, 19, 106, 'dsdsd', '2019-04-03', '2019-04-16', 13, 2600000, 150000),
	(10, 16, 106, 'ad', '2019-04-02', '2019-04-15', 13, 2600000, 3333),
	(11, 19, 106, 'aaa', '2019-04-08', '2019-04-17', 9, 1800000, 200000),
	(12, 22, 106, 'as', '2019-04-02', '2019-04-16', 14, 2800000, 150000),
	(13, 18, 105, 'qqqqq', '2019-04-03', '2019-04-17', 14, 4550000, 200000),
	(14, 16, 105, 'zzz', '2019-04-16', '2019-04-23', 7, 2275000, 3333333),
	(16, 18, 105, 'aaaa', '2019-04-02', '2019-04-09', 8, 2600000, 3333333),
	(17, 19, 106, 'sdsd', '2019-04-02', '2019-04-03', 1, 200000, 200000),
	(18, 22, 107, 's', '2019-04-02', '2019-04-08', 6, 882000, 3333333),
	(19, 21, 106, 'gyugyugy', '2019-04-03', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_pri` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_prj
CREATE TABLE IF NOT EXISTS `tbl_prj` (
  `no_rj` int(8) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(5) NOT NULL,
  `id_pasien` int(6) NOT NULL,
  `departemen` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `biaya` int(10) DEFAULT NULL,
  `tindakan` varchar(20) DEFAULT NULL,
  `resep` text,
  `bayar` int(12) DEFAULT NULL,
  PRIMARY KEY (`no_rj`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `tbl_prj_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_prj: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_prj` DISABLE KEYS */;
INSERT INTO `tbl_prj` (`no_rj`, `id_dokter`, `id_pasien`, `departemen`, `tanggal`, `keluhan`, `diagnosa`, `biaya`, `tindakan`, `resep`, `bayar`) VALUES
	(14, '1004', 19, 'Kandungan', '2014-12-05 03:54:46', 'Mual-mual', ' aasasfsdfsdfsdf\r\nsdf\r\nsdf\r\nasdf\r\nasdf\r\n  ', 200000, 'Rawat Inap', NULL, 200000),
	(15, '', 21, 'Syaraf', '2014-12-06 01:30:30', 'sasdfasdg', NULL, 180000, NULL, NULL, 34534535),
	(19, '1001', 24, 'Umum', '2019-03-12 09:25:56', 'sssssss', 'www ', 10000, 'wwww ', 'obat mumet | 3x1', NULL),
	(20, '1001', 24, 'Umum', '2019-03-27 13:50:40', 'mumet', 'flu', 10000, '1. kasih obat flu', '1. obat flu | 3x1', NULL);
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
  `id_tarif_ri` int(4) NOT NULL AUTO_INCREMENT,
  `perawatan` varchar(20) NOT NULL,
  `pelayanan` varchar(30) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `tarif` int(8) NOT NULL,
  `kapasitas` int(2) NOT NULL,
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
	(137, 'Perinatologi', 'Persalinan Tidak Normal', 'Kelas III', 470000, 6);
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
  `id_tindakan` int(5) NOT NULL AUTO_INCREMENT,
  `id_pri` int(5) NOT NULL DEFAULT '0',
  `id_dokter` int(5) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `tindakan` text NOT NULL,
  `hasil` text,
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_tindakan: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_tindakan` DISABLE KEYS */;
INSERT INTO `tbl_tindakan` (`id_tindakan`, `id_pri`, `id_dokter`, `tanggal`, `tindakan`, `hasil`) VALUES
	(2, 18, 1001, '2019-04-14', 'dsfsdf', 'sdfsdf'),
	(3, 18, 1001, '2019-04-12', 'weada', 'wfsefs'),
	(4, 18, 1001, '2019-04-17', 'sdgsdgs', 'sdgsdgsdgf'),
	(5, 18, 1002, '2019-04-19', 'sasad', 'asdasd'),
	(6, 17, 1010, '2019-05-03', 'sad', 'asds');
/*!40000 ALTER TABLE `tbl_tindakan` ENABLE KEYS */;

-- Dumping structure for table sirusak.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(10) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `grup` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1022 DEFAULT CHARSET=latin1;

-- Dumping data for table sirusak.tbl_user: ~18 rows (approximately)
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
	(1015, 'kandungan', 'kandungan', '0', 'Departemen', 'Kandungan'),
	(1016, 'kandungan', 'kandungan', '0', 'Departemen', 'Kandungan'),
	(1020, 'Lala', 'Lali', 'Aktif', 'Admin', 'Admin'),
	(1021, 'Dicky', 'dickyyulianto', 'Aktif', 'Front Office', 'FO');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
