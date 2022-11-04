-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pro_sistem_informasi_dokumentasi_adat_gis
CREATE DATABASE IF NOT EXISTS `pro_sistem_informasi_dokumentasi_adat_gis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pro_sistem_informasi_dokumentasi_adat_gis`;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_berita
CREATE TABLE IF NOT EXISTS `tb_berita` (
  `berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `berita_judul` varchar(255) DEFAULT NULL,
  `berita_isi` text,
  `berita_img` text,
  `berita_status` enum('Y','N','D') NOT NULL DEFAULT 'D',
  `berita_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`berita_id`),
  KEY `FK_tb_berita_users` (`user_id`),
  CONSTRAINT `FK_tb_berita_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_berita: ~3 rows (approximately)
DELETE FROM `tb_berita`;
/*!40000 ALTER TABLE `tb_berita` DISABLE KEYS */;
INSERT INTO `tb_berita` (`berita_id`, `user_id`, `berita_judul`, `berita_isi`, `berita_img`, `berita_status`, `berita_time`) VALUES
	(7, 2, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla placeat quis doloribus nesciunt cumque exercitationem, eveniet harum sed necessitatibus similique autem laudantium. Vel delectus officiis inventore praesentium, veritatis cum quo.</p>', 'itculwVXlA2Vb8K8iC94g9aeKhWBA19lr1S9L2lb.jpg', 'Y', '2022-10-09 11:41:51'),
	(10, 2, 'Porro exercitationem', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique consequuntur beatae blanditiis ratione laborum tenetur sequi repudiandae deleniti, itaque reiciendis architecto animi at, voluptatum vero nobis ad illo eos voluptates.</p>', '5D2rq0WpP1tmqhb2A5Y9dyvWoKNn4T9VU9nkbzJF.jpg', 'Y', '2022-10-10 11:53:01'),
	(11, 2, 'Repellendus Dolor e', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique consequuntur beatae blanditiis ratione laborum tenetur sequi repudiandae deleniti, itaque reiciendis architecto animi at, voluptatum vero nobis ad illo eos voluptates.</p>', 'MSRvNrvVpfk3zsHiEEagl60rOVznknF1NZNf7uwE.jpg', 'Y', '2022-10-10 11:53:14');
/*!40000 ALTER TABLE `tb_berita` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kerajinan
CREATE TABLE IF NOT EXISTS `tb_kerajinan` (
  `kerajinan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `kerajinan_nama` varchar(50) DEFAULT NULL,
  `kerajinan_img` text,
  `kerajinan_lat` varchar(50) DEFAULT NULL,
  `kerajinan_long` varchar(50) DEFAULT NULL,
  `kerajinan_ket` text,
  `kerajinan_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kerajinan_id`),
  KEY `FK_tb_kerajinan_users` (`user_id`),
  CONSTRAINT `FK_tb_kerajinan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kerajinan: ~0 rows (approximately)
DELETE FROM `tb_kerajinan`;
/*!40000 ALTER TABLE `tb_kerajinan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kerajinan` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kesenian
CREATE TABLE IF NOT EXISTS `tb_kesenian` (
  `kesenian_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `kesenian_nama` varchar(50) DEFAULT NULL,
  `kesenian_img` text,
  `kesenian_lat` varchar(50) DEFAULT NULL,
  `kesenian_long` varchar(50) DEFAULT NULL,
  `kesenian_ket` text,
  `kesenian_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kesenian_id`),
  KEY `FK_tb_kesenian_users` (`user_id`),
  CONSTRAINT `FK_tb_kesenian_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kesenian: ~0 rows (approximately)
DELETE FROM `tb_kesenian`;
/*!40000 ALTER TABLE `tb_kesenian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kesenian` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_makanan
CREATE TABLE IF NOT EXISTS `tb_makanan` (
  `makanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `makanan_nama` varchar(50) NOT NULL,
  `makanan_img` text,
  `makanan_lat` varchar(50) DEFAULT NULL,
  `makanan_long` varchar(50) DEFAULT NULL,
  `makanan_ket` text,
  `makanan_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`makanan_id`),
  KEY `FK_tb_makanan_users` (`user_id`),
  CONSTRAINT `FK_tb_makanan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_makanan: ~1 rows (approximately)
DELETE FROM `tb_makanan`;
/*!40000 ALTER TABLE `tb_makanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_makanan` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_pepatah
CREATE TABLE IF NOT EXISTS `tb_pepatah` (
  `pepatah_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `pepatah_petitih` text,
  `pepatah_terjemah` text,
  `pepatah_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pepatah_id`),
  KEY `FK_tb_pepatah_users` (`user_id`),
  CONSTRAINT `FK_tb_pepatah_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_pepatah: ~3 rows (approximately)
DELETE FROM `tb_pepatah`;
/*!40000 ALTER TABLE `tb_pepatah` DISABLE KEYS */;
INSERT INTO `tb_pepatah` (`pepatah_id`, `user_id`, `pepatah_petitih`, `pepatah_terjemah`, `pepatah_time`) VALUES
	(1, 2, 'Alat baulah jo bapatuik makanan banang siku-siku, kato nan bana tak baturuik ingiran bathin nan baliku', 'Artinya adalah seseorang yang tidak mau dibawa ke jalan yang benar menandakan bahwa mentalnya sudah rusak. Peribahasa ini menggambarkan jika seseorang yang tak mau diberi nasihat dan tak mau memperbaiki diri, maka ia tak lebih dari orang yang sudah rusak mentalnya.', '2022-10-10 14:52:05'),
	(2, 2, 'Adat biaso kito pakai, limbago nan samo dituang, nan elok samo dipakai nan buruak samo dibuang', 'Peribahasa di atas menjelaskan kepada kita untuk senantiasa memelihara sikap perilaku yang baik kepada diri sendiri, maupun sesama. Dan juga, mengupayakan untuk membuang kebiasaan-kebiasaan yang buruk.', '2022-10-10 15:28:16'),
	(3, 2, 'Alat baulah jo bapatuik makanan banang siku-siku, kato nan bana tak baturuik ingiran bathin nan baliku', 'Salah satu ciri-ciri rusaknya mental seseorang adalah, dia enggan ketika ada orang yang mengajaknya tentang kebaikan. Seakan-akan hati dan pikirannya telah diracuni oleh keburukan-keburukan.', '2022-10-10 17:05:08'),
	(4, 2, 'Anak-anak kato manggaduah, sabab manuruik sakandak hati, kabuki tarang hujanlah taduah, nan hilang patuik dicari.', 'Hidup memang takkan luput dari masalah, dia selalu datang silih berganti. Meskipun begitu, kesedihan tidak boleh berlarut-larut yang akhirnya menghalang kebahagiaan yang akan datang. Ayo bangkit, jemput kesejahteraan hidupmu', '2022-10-13 17:26:36');
/*!40000 ALTER TABLE `tb_pepatah` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_perhelatan
CREATE TABLE IF NOT EXISTS `tb_perhelatan` (
  `perhelatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `perhelatan_nama` varchar(50) DEFAULT NULL,
  `perhelatan_img` text,
  `perhelatan_lat` varchar(50) DEFAULT NULL,
  `perhelatan_long` varchar(50) DEFAULT NULL,
  `perhelatan_ket` text,
  `perhelatan_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`perhelatan_id`),
  KEY `FK_tb_perhelatan_users` (`user_id`),
  CONSTRAINT `FK_tb_perhelatan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_perhelatan: ~0 rows (approximately)
DELETE FROM `tb_perhelatan`;
/*!40000 ALTER TABLE `tb_perhelatan` DISABLE KEYS */;
INSERT INTO `tb_perhelatan` (`perhelatan_id`, `user_id`, `perhelatan_nama`, `perhelatan_img`, `perhelatan_lat`, `perhelatan_long`, `perhelatan_ket`, `perhelatan_time`) VALUES
	(2, 2, 'Tabuik', 'ca3LN3sAs0BwbAwP8uwUnX7M8ndoxT3eulj9BL9W.jpg', '-0.6660311422152353', '100.11566162109375', '<p><i>Tabuik&nbsp;</i>atau&nbsp;<i>Tabot&nbsp;</i>merupakan salah satu tradisi tahunan yang biasa dilakukan oleh masyarakat Pariaman, Sumatera Barat. Perayaan ini telah dilakukan sejak puluhan tahun yang lalu, yang diperkirakan sudah ada sejak abad ke-19 Masehi.</p><p>Perayaan Tabuik merupakan peringatan hari wafatnya seorang cucu Nabi Muhammad SAW, Husein bin Ali bin Abi Thalib, pada tanggal 10 Muharram. Dalam catatan sejarah, Husein beserta keluarganya wafat di hari itu pada <a href="https://id.wikipedia.org/wiki/Pertempuran_Karbala#:~:text=Pertempuran%20Karbala%20terjadi%20pada%20tanggal,yang%20sekarang%20terletak%20di%20Irak.">peristiwa Karbala</a>.</p>', '2022-10-13 17:38:49'),
	(3, 2, 'Turun Mandi', 'jeMeFVOoxqYq00GJTRhb9evjyJy3hZqD5ElBfob1.jpg', '0.33370783008163724', '101.09893798828126', '<p>Upacara&nbsp;<i>Turun Mandi&nbsp;</i>merupakan salah satu ritual adat yang diwariskan secara turun temurun oleh leluhur masyarakat Minangkabau. Suku Minangkabau merupakan salah satu suku yang sangat menjunjung tinggi warisan leluhur mereka, sehingga upacara ini menjadi salah satu budaya yang masih bertahan hingga kini.</p><p>Turun Mandi adalah upacara yang dimaksudkan sebagai ungkapan rasa syukur kepada Sang Pencipta atas kelahiran seorang bayi. Selain itu, upacara ini juga memperkenalkan kepada masyarakat bahwa telah muncul keturunan baru dari sebuah keluarga.</p>', '2022-10-13 17:40:19');
/*!40000 ALTER TABLE `tb_perhelatan` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.users: ~100 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`) VALUES
	(2, 'Margot Grady II', 'egova', 'pfeeney@example.com', '$2a$12$48bGJgRMuEFp6F4XRYaA/./SYH3LJNQX94a90hRzNuVWMsdoS30iW', 'admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
