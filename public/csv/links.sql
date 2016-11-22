-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.12-0ubuntu1.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumpen data van tabel quest.links: ~7 rows (ongeveer)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`id`, `title`, `description`, `adress`, `created_at`, `updated_at`) VALUES
	(1, 'www.borisbaan.nl', 'null', 'http://www.borisbaan.nl', NULL, NULL),
	(2, 'www.lecso.nl', '(NULL)', 'http://www.lecso.nl', NULL, NULL),
	(3, 'www.vng.nl', '(NULL)', 'http://www.vng.nl', NULL, NULL),
	(4, 'www.vobc.nu', ' ', 'http://www.vobc.nu', NULL, NULL),
	(5, 'www.lcr.nl', ' ', 'http://www.lcr.nl', NULL, NULL),
	(6, 'www.bvekennis.nl', ' ', 'http://www.bvekennis.nl', NULL, NULL),
	(7, 'www.mboraad.nl', ' ', 'http://www.mboraad.nl', NULL, NULL);
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
