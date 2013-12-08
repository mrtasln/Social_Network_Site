-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Ara 2013, 15:03:28
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
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `isim` varchar(20) NOT NULL,
  `soyisim` varchar(20) NOT NULL,
  `kullanici_adi` varchar(20) NOT NULL,
  `email1` varchar(20) NOT NULL,
  `sifre1` int(11) NOT NULL,
  `biyografi` text NOT NULL,
  `profil_resmi` varchar(40) NOT NULL,
  `arkadas_dizisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`isim`, `soyisim`, `kullanici_adi`, `email1`, `sifre1`, `biyografi`, `profil_resmi`, `arkadas_dizisi`) VALUES
('Ersin', 'Ulker', 'drakula', 'sadas', 123456789, '', '', ''),
('Cansu', 'Cansu', 'CAnsu', 'asdd', 1111111, '', 'N4ZCLsdeWYfkrJy/images.jpg', ''),
('Ersi', 'Ulker', 'drakula123', 'sadas', 12345678, '1232131', 'VLGIR1EtosAxaz3/images1.jpg', 'Kartal,Aslan'),
('Hasan', 'Huseyin', 'Kartal', 'eeeees', 1234567, '', '', ',drakula123'),
('ali', 'veli', 'Aslan', 'sasd', 1111111, '', '', ',drakula123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
