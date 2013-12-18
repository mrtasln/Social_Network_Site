-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Ara 2013, 11:24:11
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
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `user_posted_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES
(1, 'Bu benim Sayfam', '2013-12-14', 'Kartal', 'Kartal'),
(2, 'Naber Cansu', '2013-12-14', 'Kartal', 'Kartal'),
(3, 'Nevar', '2013-12-14', 'Kartal', 'Kartal'),
(4, 'NasÄ±lsÄ±n', '2013-12-14', 'Kartal', 'Kartal'),
(5, 'sssss', '2013-12-14', 'Kartal', 'Kartal'),
(6, 'merhaba', '2013-12-14', 'Kartal', 'CAnsu'),
(7, 'Aslan AkÄ±llÄ± Ol', '2013-12-14', 'Kartal', 'Aslan'),
(8, 'asdas\r\ndsad\r\nsad', '2013-12-14', 'Kartal', 'Aslan'),
(9, 'sad\r\nasd\r\nasd\r\nas\r\ndsa\r\nd', '2013-12-14', 'Kartal', 'Aslan'),
(10, 'sadddddddddddddddddddddddddddddddddddd\r\nsadddddddddddddddddddddddddddddddddd\r\nasdddddddddddddddddddddddddddddd', '2013-12-14', 'Kartal', 'Aslan'),
(11, 'sadasd', '2013-12-15', 'Kartal', 'Kartal'),
(12, 'sadasdas', '2013-12-15', 'Kartal', 'Kartal'),
(13, 'sadasdasd', '2013-12-15', 'Kartal', 'Kartal'),
(14, 'NasÄ±lsÄ±n CAnsu', '2013-12-15', 'Kartal', 'CAnsu'),
(15, 'slm kartal', '2013-12-15', 'drakula123', 'Kartal'),
(16, 'sadas', '2013-12-15', 'Kartal', 'drakula123'),
(17, 'sdaadsa', '2013-12-16', 'Kartal', 'Kartal'),
(18, 'sadasd', '2013-12-17', 'drakula123', 'drakula123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
