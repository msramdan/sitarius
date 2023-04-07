SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: bank
#

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(150) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `bank` (`bank_id`, `nama_bank`) VALUES (1, 'BNI');
INSERT INTO `bank` (`bank_id`, `nama_bank`) VALUES (2, 'BRI');
INSERT INTO `bank` (`bank_id`, `nama_bank`) VALUES (3, 'Mandiri');


#
# TABLE STRUCTURE FOR: budget
#

DROP TABLE IF EXISTS `budget`;

CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `budget_kategori_id` int(11) NOT NULL,
  `nama_budget` varchar(255) NOT NULL,
  `nominal_budget` int(11) NOT NULL,
  PRIMARY KEY (`budget_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `budget` (`budget_id`, `budget_kategori_id`, `nama_budget`, `nominal_budget`) VALUES (1, 1, 'Sewa Gedung', 5000);
INSERT INTO `budget` (`budget_id`, `budget_kategori_id`, `nama_budget`, `nominal_budget`) VALUES (2, 2, 'Biaya Spanduk', 90000);
INSERT INTO `budget` (`budget_id`, `budget_kategori_id`, `nama_budget`, `nominal_budget`) VALUES (3, 4, 'Budget Pemateri', 10000);


#
# TABLE STRUCTURE FOR: budget_kategori
#

DROP TABLE IF EXISTS `budget_kategori`;

CREATE TABLE `budget_kategori` (
  `budget_kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`budget_kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `budget_kategori` (`budget_kategori_id`, `nama_kategori`) VALUES (1, 'Belanja Bahan');
INSERT INTO `budget_kategori` (`budget_kategori_id`, `nama_kategori`) VALUES (2, 'Belanja Jasa Profesi');
INSERT INTO `budget_kategori` (`budget_kategori_id`, `nama_kategori`) VALUES (3, 'Belanja Perjalanan Dinas Biasa');
INSERT INTO `budget_kategori` (`budget_kategori_id`, `nama_kategori`) VALUES (4, 'Belanja Perjalanan Dinas Dalam Kota');


#
# TABLE STRUCTURE FOR: history_login
#

DROP TABLE IF EXISTS `history_login`;

CREATE TABLE `history_login` (
  `history_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `user_agent` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`history_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `history_login` (`history_login_id`, `user_id`, `info`, `user_agent`, `tanggal`) VALUES (1, 4, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0 Win64 x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023-04-07 14:51:42');
INSERT INTO `history_login` (`history_login_id`, `user_id`, `info`, `user_agent`, `tanggal`) VALUES (2, 5, 'keuangan Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0 Win64 x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023-04-07 14:51:59');
INSERT INTO `history_login` (`history_login_id`, `user_id`, `info`, `user_agent`, `tanggal`) VALUES (3, 4, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0 Win64 x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023-04-07 14:58:47');


#
# TABLE STRUCTURE FOR: kantor_wilayah
#

DROP TABLE IF EXISTS `kantor_wilayah`;

CREATE TABLE `kantor_wilayah` (
  `kantor_wilayah_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kantor_wilayah` varchar(200) NOT NULL,
  PRIMARY KEY (`kantor_wilayah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `kantor_wilayah` (`kantor_wilayah_id`, `nama_kantor_wilayah`) VALUES (1, 'Sulawesi Utara');
INSERT INTO `kantor_wilayah` (`kantor_wilayah_id`, `nama_kantor_wilayah`) VALUES (2, 'Sulawesi Selatan');


#
# TABLE STRUCTURE FOR: pangkat
#

DROP TABLE IF EXISTS `pangkat`;

CREATE TABLE `pangkat` (
  `pangkat_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(200) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `ruangan` varchar(5) NOT NULL,
  PRIMARY KEY (`pangkat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `pangkat` (`pangkat_id`, `nama_pangkat`, `golongan`, `ruangan`) VALUES (1, 'Pembina Utama', 'IV', 'E');


#
# TABLE STRUCTURE FOR: pelatihan
#

DROP TABLE IF EXISTS `pelatihan`;

CREATE TABLE `pelatihan` (
  `pelatihan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelatihan` varchar(200) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `metode` varchar(200) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `jumlah_jp` int(11) NOT NULL,
  `penanggung_jawab` varchar(200) NOT NULL,
  PRIMARY KEY (`pelatihan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `pelatihan` (`pelatihan_id`, `nama_pelatihan`, `angkatan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_peserta`, `metode`, `tempat`, `jumlah_jp`, `penanggung_jawab`) VALUES (19, 'Cupidatat veniam am', 'Deleniti lorem culpa', '1996-12-07', '1988-02-27', 54, 'PJJ', 'Minim esse blanditi', 33, 'Iure ut illo reprehe');
INSERT INTO `pelatihan` (`pelatihan_id`, `nama_pelatihan`, `angkatan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_peserta`, `metode`, `tempat`, `jumlah_jp`, `penanggung_jawab`) VALUES (20, 'Pelatihan T', '1', '2023-04-06', '2023-04-08', 10, 'Klasikal', 'Sukabumi', 100, 'Muhammad Ramdan');


#
# TABLE STRUCTURE FOR: pelatihan_budget
#

DROP TABLE IF EXISTS `pelatihan_budget`;

CREATE TABLE `pelatihan_budget` (
  `pelatihan_budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelatihan_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `budget` int(11) DEFAULT NULL,
  PRIMARY KEY (`pelatihan_budget_id`),
  KEY `budget_id` (`budget_id`),
  CONSTRAINT `pelatihan_budget_ibfk_1` FOREIGN KEY (`budget_id`) REFERENCES `budget` (`budget_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `pelatihan_budget` (`pelatihan_budget_id`, `pelatihan_id`, `budget_id`, `budget`) VALUES (31, 20, 1, 5000);


#
# TABLE STRUCTURE FOR: pelatihan_pemateri
#

DROP TABLE IF EXISTS `pelatihan_pemateri`;

CREATE TABLE `pelatihan_pemateri` (
  `pelatihan_pemateri_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelatihan_id` int(11) NOT NULL,
  `pemateri_id` int(11) NOT NULL,
  `bukti_honor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pelatihan_pemateri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (22, 19, 3, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (23, 19, 2, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (24, 19, 1, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (28, 20, 5, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (29, 20, 3, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (30, 20, 2, NULL);
INSERT INTO `pelatihan_pemateri` (`pelatihan_pemateri_id`, `pelatihan_id`, `pemateri_id`, `bukti_honor`) VALUES (31, 20, 1, NULL);


#
# TABLE STRUCTURE FOR: pemateri
#

DROP TABLE IF EXISTS `pemateri`;

CREATE TABLE `pemateri` (
  `pemateri_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemateri` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`pemateri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `pemateri` (`pemateri_id`, `nama_pemateri`, `no_hp`) VALUES (1, 'Ramdan', '083874731480');
INSERT INTO `pemateri` (`pemateri_id`, `nama_pemateri`, `no_hp`) VALUES (2, 'Byan', '083874731480');
INSERT INTO `pemateri` (`pemateri_id`, `nama_pemateri`, `no_hp`) VALUES (3, 'Anisa', '083874731480');
INSERT INTO `pemateri` (`pemateri_id`, `nama_pemateri`, `no_hp`) VALUES (5, 'Rahmawati', '083874731480');


#
# TABLE STRUCTURE FOR: peserta
#

DROP TABLE IF EXISTS `peserta`;

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(150) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `pangkat` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `kantor_wilayah` int(1) NOT NULL,
  `upt` char(100) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `norek` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `qr_code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`peserta_id`),
  UNIQUE KEY `nip` (`nip`),
  UNIQUE KEY `email` (`email`),
  KEY `bank_id` (`bank_id`),
  KEY `pangkat` (`pangkat`),
  KEY `kantor_wilayah` (`kantor_wilayah`),
  CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`),
  CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`pangkat`) REFERENCES `pangkat` (`pangkat_id`),
  CONSTRAINT `peserta_ibfk_3` FOREIGN KEY (`kantor_wilayah`) REFERENCES `kantor_wilayah` (`kantor_wilayah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (7, 'File-220812-05b756ef2f.jpg', '2017310023', 'Muhammad Sultan', 'boxo@mailinator.com', 'Labore non eiusmod a', 'Tempor voluptate ea', '2000-06-08', 'Laki Laki', 1, 'Aliquid voluptas pla', 1, 'Aute nihil vero vel', 1, 'Provident placeat', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (8, 'File-220812-e0de8482b4.jpg', '8765678987', 'Endang', 'xireqewana@mailinator.com', 'Autem reiciendis ani', 'Autem eum sed ut id', '2011-03-06', 'Perempuan', 1, 'Debitis quis placeat', 1, 'Ipsa quasi aliquip', 1, 'Sit quisquam laborum', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (9, 'File-220812-139c4db3fd.jpg', '87656789', 'Markus ', 'qyzecexovi@mailinator.com', 'Aperiam repudiandae', 'Aliquam quia ut magn', '2006-01-07', 'Laki Laki', 1, 'Labore dolores ea et', 1, 'Explicabo Anim omni', 3, 'Doloremque ab ipsam', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (10, 'File-220812-489d7b00d1.jpg', '876556789', 'Joko Susanto', 'foxode@mailinator.com', 'Qui laborum Rerum i', 'Eum dolore vel ea te', '1980-07-23', 'Laki Laki', 1, 'Voluptatem Ullam ex', 1, 'Irure facilis quis e', 1, 'Est hic inventore a', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (11, 'File-220812-84fb56b21c.jpg', '458987654678', 'Muhammad byan', 'duquwy@mailinator.com', 'Qui illo dolorem in', 'Officia laborum Ame', '1980-06-03', 'Laki Laki', 1, 'Iste eu enim et est', 1, 'Ullamco iusto quaera', 2, 'Provident odio erro', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (12, 'File-220812-d3cbe1c6e1.jpg', '9846789', 'Anisa Rahmawati', 'recogaki@mailinator.com', 'Nisi fugit ipsum el', 'Eu et dolor quas lab', '1988-07-19', 'Perempuan', 1, 'In quia ut sint fugi', 2, 'Voluptas nemo earum', 1, 'Debitis quia perspic', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '');
INSERT INTO `peserta` (`peserta_id`, `photo`, `nip`, `nama_lengkap`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `jabatan`, `kantor_wilayah`, `upt`, `bank_id`, `norek`, `password`, `qr_code`) VALUES (13, 'File-220812-c4bb33d8c4.jpg', '1234', 'Muhammad Saeful Ramdan 2', 'byan@gmail.com', '083874731480', 'Bogor', '2013-03-08', 'Laki Laki', 1, 'IT', 1, 'Bogor', 1, '12345678', '648112a5c2c2f6e10627d6635fbac010884f1def', '1234_Muhammad Saeful Ramdan 2.png');


#
# TABLE STRUCTURE FOR: peserta_pelatihan
#

DROP TABLE IF EXISTS `peserta_pelatihan`;

CREATE TABLE `peserta_pelatihan` (
  `peserta_pelatihan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelatihan_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `sertifikat` varchar(200) DEFAULT NULL,
  `lembar_konfirmasi` varchar(200) DEFAULT NULL,
  `surat_tugas` varchar(200) DEFAULT NULL,
  `pas_photo` varchar(200) DEFAULT NULL,
  `surat_keterangan_dokter` varchar(200) DEFAULT NULL,
  `npwp_bpjs` varchar(200) DEFAULT NULL,
  `tiket_datang` varchar(200) DEFAULT NULL,
  `tiket_pulang` varchar(200) DEFAULT NULL,
  `trf` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`peserta_pelatihan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (25, 19, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (26, 19, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (27, 19, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (28, 19, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (29, 20, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (30, 20, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (31, 20, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (32, 20, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (33, 20, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (34, 20, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `peserta_pelatihan` (`peserta_pelatihan_id`, `pelatihan_id`, `peserta_id`, `sertifikat`, `lembar_konfirmasi`, `surat_tugas`, `pas_photo`, `surat_keterangan_dokter`, `npwp_bpjs`, `tiket_datang`, `tiket_pulang`, `trf`) VALUES (35, 20, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:pegawai',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES (4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);
INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES (5, 'keuangan', '1f931595786f2f178358d0af5fe4d75eaee46819', 2);


SET foreign_key_checks = 1;
