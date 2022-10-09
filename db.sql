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


-- Dumping database structure for pro_sistem_informasi_dokumentasi_adat_gis
CREATE DATABASE IF NOT EXISTS `pro_sistem_informasi_dokumentasi_adat_gis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pro_sistem_informasi_dokumentasi_adat_gis`;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_berita
CREATE TABLE IF NOT EXISTS `tb_berita` (
  `berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `berita_judul` varchar(255) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_img` text NOT NULL,
  `berita_status` enum('Y','N','D') NOT NULL DEFAULT 'D',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`berita_id`),
  KEY `FK_tb_berita_users` (`user_id`),
  CONSTRAINT `FK_tb_berita_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_berita: ~1 rows (approximately)
DELETE FROM `tb_berita`;
/*!40000 ALTER TABLE `tb_berita` DISABLE KEYS */;
INSERT INTO `tb_berita` (`berita_id`, `user_id`, `berita_judul`, `berita_isi`, `berita_img`, `berita_status`, `created_at`, `updated_at`) VALUES
	(7, 2, 'Test', '<p>Test</p>', 'YtL1lU7n35WoG7eZkZ0zBfbLPfWymX0Y4K6SnhIp.jpg', 'D', '2022-10-09 11:41:51', '2022-10-09 11:41:51');
/*!40000 ALTER TABLE `tb_berita` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kerajinan
CREATE TABLE IF NOT EXISTS `tb_kerajinan` (
  `kerajinan_id` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `kerajinan_nama` varchar(50) DEFAULT '',
  `kerajinan_img` text,
  `kerajinan_lat` varchar(50) DEFAULT NULL,
  `kerajinan_long` varchar(50) DEFAULT NULL,
  `kerajinan_ket` text,
  `kerajinan_time` datetime DEFAULT NULL,
  PRIMARY KEY (`kerajinan_id`),
  KEY `FK_tb_kerajinan_users` (`user_id`),
  CONSTRAINT `FK_tb_kerajinan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `kesenian_time` datetime DEFAULT NULL,
  PRIMARY KEY (`kesenian_id`),
  KEY `FK_tb_kesenian_users` (`user_id`),
  CONSTRAINT `FK_tb_kesenian_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_kesenian: ~0 rows (approximately)
DELETE FROM `tb_kesenian`;
/*!40000 ALTER TABLE `tb_kesenian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kesenian` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_makanan
CREATE TABLE IF NOT EXISTS `tb_makanan` (
  `makanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `makanan_nama` varchar(50) NOT NULL,
  `makanan_img` text NOT NULL,
  `makanan_lat` varchar(50) NOT NULL,
  `makanan_long` varchar(50) NOT NULL,
  `makanan_ket` text NOT NULL,
  `makanan_time` datetime NOT NULL,
  PRIMARY KEY (`makanan_id`),
  KEY `FK_tb_makanan_users` (`user_id`),
  CONSTRAINT `FK_tb_makanan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_makanan: ~0 rows (approximately)
DELETE FROM `tb_makanan`;
/*!40000 ALTER TABLE `tb_makanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_makanan` ENABLE KEYS */;

-- Dumping structure for table pro_sistem_informasi_dokumentasi_adat_gis.tb_pepatah
CREATE TABLE IF NOT EXISTS `tb_pepatah` (
  `pepatah_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `pepatah_petitih` text,
  `pepatah_terjemah` text,
  `pepatah_time` datetime DEFAULT NULL,
  PRIMARY KEY (`pepatah_id`),
  KEY `FK_tb_pepatah_users` (`user_id`),
  CONSTRAINT `FK_tb_pepatah_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_pepatah: ~0 rows (approximately)
DELETE FROM `tb_pepatah`;
/*!40000 ALTER TABLE `tb_pepatah` DISABLE KEYS */;
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
  `perhelatan_time` datetime DEFAULT NULL,
  PRIMARY KEY (`perhelatan_id`),
  KEY `FK_tb_perhelatan_users` (`user_id`),
  CONSTRAINT `FK_tb_perhelatan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pro_sistem_informasi_dokumentasi_adat_gis.tb_perhelatan: ~0 rows (approximately)
DELETE FROM `tb_perhelatan`;
/*!40000 ALTER TABLE `tb_perhelatan` DISABLE KEYS */;
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
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;