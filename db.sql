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

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kerajinan: ~1 rows (approximately)
DELETE FROM `tb_kerajinan`;
/*!40000 ALTER TABLE `tb_kerajinan` DISABLE KEYS */;
INSERT INTO `tb_kerajinan` (`kerajinan_id`, `user_id`, `kerajinan_nama`, `kerajinan_img`, `kerajinan_lat`, `kerajinan_long`, `kerajinan_ket`, `kerajinan_time`) VALUES
	(1, 2, 'Kerajinan', '60Vvc1jEP5yEfE2UC7xrMAP2jdbxMgS3CUUqdkxi.jpg', '-0.819827', '101.230774', '<p>Test</p>', NULL);
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

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kesenian: ~2 rows (approximately)
DELETE FROM `tb_kesenian`;
/*!40000 ALTER TABLE `tb_kesenian` DISABLE KEYS */;
INSERT INTO `tb_kesenian` (`kesenian_id`, `user_id`, `kesenian_nama`, `kesenian_img`, `kesenian_lat`, `kesenian_long`, `kesenian_ket`, `kesenian_time`) VALUES
	(1, 2, 'Kesenian2', 'ONx5lrfJkYOI2jnjG5sDQ0GcPrUGAxgyby8X2DbW.jpg', '-0.039825', '100.307922', '<p>Test</p>', NULL),
	(2, 2, 'Tempor minima volupt', 'Z7syi988mSDiBzxx2gF8GB5T2bWCZR0ZJ4olxq0o.jpg', '-0.2925097156744374', '101.07147216796875', '<p>Test</p>', '2022-10-10 10:46:25');
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
INSERT INTO `tb_makanan` (`makanan_id`, `user_id`, `makanan_nama`, `makanan_img`, `makanan_lat`, `makanan_long`, `makanan_ket`, `makanan_time`) VALUES
	(5, 2, 'Rendang Jawi', 'hKSmclPcQb65jcMvBX3jOHxyrXlEpbmmLbvjwxMI.jpg', '-0.3694127237714054', '100.62652587890625', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nam quis iure corporis iste ipsum laboriosam, molestias perferendis, voluptas vel eum magni repellendus dolore. Unde eius officia alias culpa consectetur.', '2022-10-10 10:38:36');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_pepatah: ~3 rows (approximately)
DELETE FROM `tb_pepatah`;
/*!40000 ALTER TABLE `tb_pepatah` DISABLE KEYS */;
INSERT INTO `tb_pepatah` (`pepatah_id`, `user_id`, `pepatah_petitih`, `pepatah_terjemah`, `pepatah_time`) VALUES
	(1, 2, 'Etek etek jua lamang', 'Bara ciek bg', '2022-10-10 14:52:05'),
	(2, 50, 'Etek etek jua lamang', 'Etek etek jua lamang', '2022-10-10 15:28:16'),
	(3, 2, 'Test', 'test', '2022-10-10 17:05:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_perhelatan: ~1 rows (approximately)
DELETE FROM `tb_perhelatan`;
/*!40000 ALTER TABLE `tb_perhelatan` DISABLE KEYS */;
INSERT INTO `tb_perhelatan` (`perhelatan_id`, `user_id`, `perhelatan_nama`, `perhelatan_img`, `perhelatan_lat`, `perhelatan_long`, `perhelatan_ket`, `perhelatan_time`) VALUES
	(1, 2, 'Aspernatur repellend1', 'XaR2X3EjcDkhJB2euxpDL5EnXK84FT8c34sKuMZM.jpg', '-0.4243430444625734', '100.74737548828126', '<p>Test1</p>', '2022-10-10 10:51:03');
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
	(1, 'Dr. Gwen Ziemann Jr.', 'powlowski.lionel', 'celestine11@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(2, 'Margot Grady II', 'egova', 'pfeeney@example.com', '$2a$12$48bGJgRMuEFp6F4XRYaA/./SYH3LJNQX94a90hRzNuVWMsdoS30iW', 'admin'),
	(3, 'Yasmine Bode', 'nicolas.hillard', 'randi43@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(4, 'Sebastian Reilly', 'arden.jenkins', 'jeffrey81@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(5, 'Davonte Hickle V', 'elnora.olson', 'raynor.darion@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(6, 'Miss Matilda Langworth', 'pjacobson', 'guido.stanton@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(7, 'Madalyn Rutherford', 'mbarrows', 'vnikolaus@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(8, 'Roberto Simonis', 'gia.daniel', 'moore.sonya@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(9, 'Marcel Macejkovic', 'nya.mitchell', 'gerard08@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(10, 'Hertha Boyle', 'kub.cullen', 'shemar32@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(11, 'Prof. Krystal Becker', 'brycen24', 'zieme.nikko@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(12, 'Dorothea Pouros', 'guadalupe.barton', 'graham.grant@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(13, 'Frieda Dooley', 'morgan93', 'vidal.gorczany@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(14, 'Winifred Effertz', 'rhagenes', 'cummerata.allison@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(15, 'Joshua Mann', 'wunsch.winnifred', 'timmothy59@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(16, 'Selmer Schoen', 'rashad82', 'bhahn@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(17, 'Martine Stokes', 'veum.abel', 'jdoyle@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(18, 'Koby Durgan', 'dale.haley', 'wtromp@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(19, 'Abbie Lehner', 'mgraham', 'jmann@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(20, 'Shana Hammes', 'oral.hauck', 'eunice.kihn@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(21, 'Dr. Olin Hilpert', 'rolfson.aliza', 'destini56@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(22, 'Meta Denesik', 'rebekah73', 'howe.dolly@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(23, 'Retta Langosh', 'julianne96', 'trever22@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(24, 'Marquis Osinski II', 'tatyana.batz', 'benedict52@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(25, 'Prudence Roob IV', 'rashawn78', 'lind.lenna@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(26, 'Prof. Hassie Flatley II', 'justen05', 'pbatz@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(27, 'Marquis Boehm', 'wiegand.grayson', 'senger.celine@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(28, 'Wendy Kuvalis PhD', 'bpollich', 'veronica93@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(29, 'Fred Daugherty', 'tyshawn94', 'jwindler@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(30, 'Eli Nicolas', 'qortiz', 'dale.batz@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(31, 'Toney Nicolas', 'thaddeus.kautzer', 'pdamore@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(32, 'Lonzo Russel', 'uwisozk', 'fschumm@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(33, 'Renee Adams', 'rau.alfonso', 'bashirian.ocie@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(34, 'Ms. Trudie Franecki', 'khalvorson', 'rosamond29@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(35, 'Mayra Ullrich', 'white.alex', 'justice13@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(36, 'Nat Hamill', 'wyman.camilla', 'ysanford@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(37, 'Gianni Beatty Jr.', 'sauer.terrance', 'hane.esteban@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(38, 'Lorenz Botsford', 'rogahn.antoinette', 'lori49@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(39, 'Rubie Rosenbaum', 'jeramy.reilly', 'izabella.mohr@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(40, 'Lamont Hudson', 'gkeeling', 'trycia.gibson@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(41, 'Reilly Johns', 'abreitenberg', 'vonrueden.deshaun@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(42, 'Retta Hammes', 'crippin', 'white.kraig@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(43, 'Karlie Deckow', 'keira62', 'lee36@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(44, 'Tressie Goodwin Sr.', 'emonahan', 'otis06@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(45, 'Sylvester Schroeder', 'reichel.brendon', 'antwon84@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(46, 'Dakota Hansen', 'emard.linwood', 'qmedhurst@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(47, 'Prof. Milford Bechtelar II', 'juwan.stracke', 'jfisher@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(48, 'Okey Ledner', 'strosin.issac', 'hoeger.kennedi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(49, 'Evie Von', 'bahringer.juanita', 'vstrosin@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(50, 'Ansley Kreiger', 'berge.elvis', 'madison.funk@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(51, 'Roxane Dare', 'helene90', 'tessie11@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(52, 'Yoshiko Rogahn', 'will.dino', 'breanna.olson@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(53, 'Joe Huels', 'bogisich.sadye', 'heaney.amos@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(54, 'Ona Cronin', 'bherzog', 'norris76@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(55, 'Ayana Adams', 'jailyn27', 'bahringer.ethan@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(56, 'Olaf Walsh', 'maxine.crona', 'bernhard.brooke@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(57, 'Jarrod Bashirian', 'iherman', 'iva.boyle@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(58, 'Willis Von', 'dallin.ernser', 'cummerata.olin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(59, 'Dr. Sim Shanahan', 'dhirthe', 'ivory76@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(60, 'Hans Thiel', 'cdaniel', 'fkertzmann@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(61, 'Florida Turcotte Sr.', 'danny65', 'kiley75@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(62, 'Andrew Turcotte', 'nolan.thaddeus', 'rarmstrong@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(63, 'Elyse Monahan', 'werdman', 'francisco.kovacek@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(64, 'Buford Sauer', 'kaylee.goodwin', 'jefferey.effertz@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(65, 'Isaiah Reichel IV', 'pgrant', 'acrist@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(66, 'Samir Schuster', 'fermin57', 'murazik.brad@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(67, 'Mr. Dave Grimes IV', 'jess08', 'wehner.kristin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(68, 'Cristina Kuhic', 'adrain73', 'simeon.crist@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(69, 'Hassie Lakin', 'roy53', 'athena.champlin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(70, 'Prof. Emanuel Klocko DVM', 'nasir.graham', 'bortiz@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(71, 'Ms. Lessie Ferry III', 'abernathy.nettie', 'kyler89@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(72, 'Evelyn Kilback', 'sanford.wilfredo', 'silas.ortiz@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(73, 'Mr. Orrin Fahey', 'mitchell53', 'uroob@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(74, 'Mariana Dooley', 'christine.sporer', 'dibbert.julien@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(75, 'Etha Rath', 'sanford.novella', 'ojacobi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(76, 'Mrs. Verda Brown IV', 'cwilderman', 'oreilly.stefan@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(77, 'Dale Konopelski PhD', 'hansen.matt', 'micaela32@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(78, 'Thora Tromp', 'smcglynn', 'rupert.stoltenberg@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(79, 'Melisa McLaughlin V', 'hilma63', 'schamberger.summer@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(80, 'Mr. Fermin Goodwin', 'lessie.fahey', 'cwhite@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(81, 'Cicero Runte', 'genoveva.keeling', 'darius51@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(82, 'Dana Steuber', 'rylee.raynor', 'tommie98@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(83, 'Darron Abernathy', 'kayleigh.friesen', 'jeff.aufderhar@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(84, 'Cicero Robel', 'estrella.schumm', 'wilkinson.lenora@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(85, 'Linnea Jacobi', 'feest.misael', 'dale.boyer@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(86, 'Baby Jast', 'jacobson.georgianna', 'qbauch@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(87, 'Isai Bayer', 'pdonnelly', 'guido.champlin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(88, 'Suzanne Padberg DDS', 'nella15', 'dorthy.collins@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(89, 'Merlin Stroman', 'alta99', 'fay.cordia@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(90, 'Prof. Jerry Schultz', 'casper.reuben', 'ashly.gaylord@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(91, 'Kristofer Schinner', 'ohudson', 'antwan61@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(92, 'Dr. Roberto Wolf', 'ybernhard', 'istamm@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(93, 'Cullen Konopelski', 'rudy.nienow', 'savanna.wuckert@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(94, 'Jerome Bayer', 'kevin16', 'mclaughlin.chandler@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(95, 'Prof. Carlie Collier', 'diego.wolf', 'linwood38@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(96, 'Devan Mayert', 'kennith.mayer', 'romaine25@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(97, 'Adam Keebler', 'marques.mitchell', 'vstehr@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(98, 'Parker Funk', 'larkin.rodger', 'heidenreich.filomena@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan'),
	(99, 'Cruz Corkery', 'durgan.hugh', 'xbeer@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
	(100, 'Prof. Lonnie Maggio V', 'pbreitenberg', 'lora.pacocha@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
