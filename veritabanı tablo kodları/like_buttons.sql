-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Ara 2013, 11:13:37
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
-- Tablo için tablo yapısı `like_buttons`
--

CREATE TABLE IF NOT EXISTS `like_buttons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET latin1 NOT NULL,
  `page_url` text CHARACTER SET latin1 NOT NULL,
  `date_added` date NOT NULL,
  `uid` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Tablo döküm verisi `like_buttons`
--

INSERT INTO `like_buttons` (`id`, `username`, `page_url`, `date_added`, `uid`) VALUES
(3, 'Kartal', 'http://www.google.com', '2013-12-16', '4e6edbdd7c55f24413ec610df7ebb593'),
(4, 'Kartal', 'http://asdasda', '2013-12-16', 'cf4fce542e04e49e3170ed8cdf593598'),
(5, 'Kartal', 'http://www.google.com', '2013-12-16', '7b1b0982f2435485c5971896fb895599'),
(6, 'Kartal', 'http://http://www.google.com', '2013-12-16', 'f398f88bb70b5c1ecbf628c680327f21'),
(7, 'Kartal', 'http://sdads', '2013-12-16', '9cb7003026c9f5d283707e081c9470d7'),
(9, 'Kartal', 'http://localhost:81/SocialNet/Kartal', '2013-12-16', 'Kartal'),
(10, 'kartal_bjk', 'http://localhost:81/SocialNet/kartal_bjk', '2013-12-16', 'kartal_bjk'),
(11, 'kartal_bjk', 'http://sdadsad', '2013-12-16', 'ace7da213e4df538ae03ae9085cd4ebb'),
(12, 'kartal_bjk', 'http://www.youtube.com', '2013-12-16', '22da95919b6b8cd94843d6c8bb458b65'),
(13, 'drakula123', 'http://localhost:81/SocialNet/drakula123', '2013-12-16', 'drakula123'),
(14, 'ErsinUlker', 'http://localhost:81/SocialNet/ErsinUlker', '2013-12-16', 'ErsinUlker'),
(15, 'CAnsu', 'http://localhost:81/SocialNet/CAnsu', '2013-12-16', 'CAnsu'),
(16, 'Aslan', 'http://localhost:81/SocialNet/Aslan', '2013-12-16', 'Aslan'),
(17, '', 'http://localhost:81/SocialNet/', '2013-12-16', ''),
(18, '1903bjk', 'http://localhost:81/SocialNet/1903bjk', '2013-12-18', '1903bjk'),
(19, 'mustafa satan', 'http://localhost:81/SocialNet/mustafa satan', '2013-12-19', 'mustafa satan'),
(20, 'kartal_bjk', 'http://localhost:81/SocialNet/profile.php?u=kartal_bjk', '2013-12-19', '510efdbc6e994a12541962ce7ba47b10'),
(21, 'kanarya', 'http://localhost:81/SocialNet/kanarya', '2013-12-21', 'kanarya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
