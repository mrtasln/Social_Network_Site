-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Ara 2013, 11:23:40
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
-- Tablo için tablo yapısı `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_liked` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_likes` int(11) NOT NULL,
  `uid` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `likes`
--

INSERT INTO `likes` (`id`, `user_liked`, `total_likes`, `uid`) VALUES
(1, 'creative', 11, 'sadsadasd'),
(2, 'Kartal', -1, ''),
(3, 'Kartal', -1, 'Kartal'),
(4, 'kartal_bjk', -1, 'kartal_bjk'),
(5, 'kartal_bjk', -1, 'ace7da213e4df538ae03ae9085cd4ebb'),
(6, 'kartal_bjk', -1, '22da95919b6b8cd94843d6c8bb458b65'),
(7, 'drakula123', -1, 'drakula123'),
(8, 'ErsinUlker', -1, 'ErsinUlker'),
(9, 'CAnsu', -1, 'CAnsu'),
(10, 'Aslan', -1, 'Aslan'),
(11, '', -1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
