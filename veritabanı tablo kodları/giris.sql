-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Ara 2013, 15:03:00
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
-- Tablo için tablo yapısı `giris`
--

CREATE TABLE IF NOT EXISTS `giris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(30) NOT NULL,
  `sifre` varchar(30) NOT NULL,
  `yetki` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `giris`
--

INSERT INTO `giris` (`id`, `kullanici_adi`, `sifre`, `yetki`) VALUES
(1, 'ErsinUlker', '123456789', NULL),
(2, 'CAnsu', '123121', NULL),
(3, 'drakula123', '12345678', NULL),
(4, 'Kartal', '1234567', NULL),
(5, 'Aslan', '1111111', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
