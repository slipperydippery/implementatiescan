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
	(7, 'www.mboraad.nl', ' ', 'http://www.mboraad.nl', NULL, NULL),
	(8, 'Rijksoverheid', 'Informatie over beleid en regelgeving in Nederland omtrent arbeid en inkomen', 'https://www.rijksoverheid.nl/onderwerpen/participatiewet', NULL, NULL),
	(9, 'UWV', 'Informatie over beoordeling arbeidsvermogen en uitkeringen', 'http://www.uwv.nl/', NULL, NULL),
	(10, 'Nederlands Jeugd Instituut', 'Kennis over jeugd-, onderwijs- en opvoedingsvraagstukken', 'http://www.nji.nl/', NULL, NULL),
	(11, 'Kennisnet jeugd', 'Platform voor het delen van kennis en informatie over jeugd-, onderwijs- en opvoedingsvraagstukken', 'https://kennisnetjeugd.nl/', NULL, NULL),
	(12, 'Landelijke expertise centrum speciaal onderwijs', 'Informatie over het speciaal onderwijs. Informatie over passend onderwijs, onderwijs en zorg, onderwijskwaliteit en arbeidstoeleiding', 'https://www.lecso.nl/', NULL, NULL),
	(13, 'Kenniscentrum LVB', 'Informatie over de persoonlijke ontwikkeling, opvoedingssituatie en maatschappelijke participatie van mensen met een licht verstandelijke beperking.', 'http://www.kenniscentrumlvb.nl/', NULL, NULL),
	(14, 'Het Kenniscentrum Arbeidstoeleiding Nederland', 'Informatie omtrent arbeidstoeleiding van jongeren uit het speciaal onderwijs', 'http://www.hetkan.info/', NULL, NULL),
	(15, 'Divosa', 'Informatie over vraagstukken in het bredere sociaal domein', 'http://www.divosa.nl/', NULL, NULL),
	(16, 'Ingrado', 'Informatie over leerplicht en RMC (voortijdig schoolverlaten).', 'http://www.ingrado.nl/', NULL, NULL),
	(17, 'Landelijke clienten raad', 'Informatie over wetten en regels over werk en inkomen en clientenparticipatie', 'http://www.landelijkeclientenraad.nl', NULL, NULL),
	(18, 'MEE', 'Informatie over ondersteuning van mensen met een beperking en hun netwerk op alle leefgebieden en in alle levensfasen.', 'http://www.mee.nl/', NULL, NULL);
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
