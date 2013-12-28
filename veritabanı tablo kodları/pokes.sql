-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Ara 2013, 11:24:03
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
-- Tablo için tablo yapısı `pokes`
--

CREATE TABLE IF NOT EXISTS `pokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_to` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `pokes`
--

INSERT INTO `pokes` (`id`, `user_from`, `user_to`) VALUES
(1, 'Kartal', 'Aslan'),
(10, 'drakula123', 'Kartal'),
(11, 'CAnsu', 'Kartal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
