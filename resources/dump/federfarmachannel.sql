-- -------------------------------------------------------------
-- TablePlus 4.5.0(396)
--
-- https://tableplus.com/
--
-- Database: federfarmachannel
-- Generation Time: 2021-12-22 17:03:48.0990
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `guest_video`;
CREATE TABLE `guest_video` (
  `guest_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`guest_id`,`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `guest_video` (`guest_id`, `video_id`) VALUES
(1, 1),
(1, 6),
(2, 2),
(2, 4),
(3, 1),
(3, 5),
(4, 3),
(5, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 4),
(7, 6),
(8, 2),
(8, 5),
(9, 5);

INSERT INTO `guests` (`id`, `first_name`, `last_name`, `image_url`) VALUES
(1, 'Marcel', 'Karsten', 'guest-1.jpg'),
(2, 'Bartholomew', 'Marshall', 'guest-2.jpg'),
(3, 'Charmaine', 'Charissa', 'guest-3.jpg'),
(4, 'Winston', 'Dacey', 'guest-4.jpg'),
(5, 'Tyrone', 'Layton', 'guest-5.jpg'),
(6, 'Caydon', 'Lucian', 'guest-6.jpg'),
(7, 'Ceanna', 'Mattie', 'guest-7.jpg'),
(8, 'Erica', 'Meadow', 'guest-8.jpg'),
(9, 'Arturo', 'Luke', 'guest-9.jpg'),
(10, 'Kobe', 'Adrian', 'guest-10.jpg');

INSERT INTO `videos` (`id`, `title`, `video_url`, `duration`, `published_at`, `created_at`, `image_url`) VALUES
(1, 'Credito d\'imposta per telemedicina, Petrosillo: \"Ruolo-chiave farmacia da parte del Governo\"', 'https://www.youtube.com/embed/B6jv63XkiwA', '10:52:00', '2021-12-17', '2021-12-21 08:50:22', 'cover-1.jpg'),
(2, 'Patologie croniche e rare, Mandorino: \"La farmacia fondamentale nella lotta alla disuguaglianza\"', 'https://www.youtube.com/embed/gm9_oCsCh5A', '07:16:00', '2021-12-16', '2021-12-21 08:50:22', 'cover-2.jpg'),
(3, 'Covid, Petrosillo (Sunifar): \"Farmacie ancora in prima linea con il vaccino in mini hub\"', 'https://www.youtube.com/embed/XI99fxBFpGI', '05:20:00', '2021-12-06', '2021-12-21 08:50:22', 'cover-3.jpg'),
(4, 'intervento Marco Cossolo', 'https://www.youtube.com/embed/XkiPtqQkQzE', '04:11:00', '2021-12-05', '2021-12-21 08:50:22', 'cover-4.jpg'),
(5, 'Cannabis terapeutica, Tobia: \"Decisiva l’istituzione del tavolo tecnico\"', 'https://www.youtube.com/embed/hFIwPPM4K9w', '07:00:00', '2021-12-02', '2021-12-21 08:50:22', 'cover-5.jpg'),
(6, 'Progetto Mimosa, Margiotta: \"È nostro dovere informare le donne vittime di violenza\"', 'https://www.youtube.com/embed/jBGf-MXYN6E', '03:57:00', '2021-11-26', '2021-12-21 08:50:22', NULL),
(7, 'Terza dose, al via nelle farmacie palermitane. Tobia: “Ruolo fondamentale“', 'https://www.youtube.com/embed/NtkUMMvxuWA', '03:41:00', '2021-11-24', '2021-12-21 08:50:22', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;