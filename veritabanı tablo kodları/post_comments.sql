-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Ara 2013, 11:24:19
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sosyal_veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_comments`
--

CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_body` text CHARACTER SET latin1 NOT NULL,
  `posted_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `posted_to` varchar(255) CHARACTER SET latin1 NOT NULL,
  `post_removed` tinyint(1) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_body`, `posted_by`, `posted_to`, `post_removed`, `post_id`) VALUES
(1, 'Yorumum', 'Aslan', 'drakula123', 0, 15),
(2, 'Diger yorum', 'CAnsu', 'Kartal', 0, 13),
(3, 'Naber', 'CAnsu', 'Kartal', 0, 13),
(4, 'mrb', '', 'Francis', 0, 15),
(5, 'dasdasdas', '', 'Aslan', 0, 15),
(6, 'Slm drakula', '', 'Aslan', 0, 15),
(7, 'slm drakula', 'Kartal', 'Aslan', 0, 15),
(8, 'ne diyon la', 'Kartal', 'Aslan', 0, 12),
(9, 'sdasd', 'Kartal', 'Aslan', 0, 13),
(10, 'nabÄ±yon  las', 'drakula123', 'Aslan', 0, 16),
(11, 'sad', 'drakula123', 'Aslan', 0, 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
