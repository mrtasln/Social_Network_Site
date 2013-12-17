-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Ara 2013, 11:24:26
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
-- Tablo için tablo yapısı `pvt_messages`
--

CREATE TABLE IF NOT EXISTS `pvt_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_to` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg_body` text CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `opened` varchar(255) CHARACTER SET latin1 NOT NULL,
  `deleted` varchar(5) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `pvt_messages`
--

INSERT INTO `pvt_messages` (`id`, `user_from`, `user_to`, `msg_title`, `msg_body`, `date`, `opened`, `deleted`) VALUES
(2, 'drakula123', 'CAnsu', 'a', 'Merhaba,NasÄ±lsÄ±n?', '2013-12-06', 'evet', 'evet'),
(3, 'drakula123', 'CAnsu', 'b', 'asd', '2013-12-06', 'evet', 'evet'),
(4, 'CAnsu', 'Kartal', 'Merhaaba', 'Slm Kartal , NasÄ±lsÄ±n?', '2013-12-10', 'evet', 'hayir'),
(5, 'CAnsu', 'Kartal', 'Slm', 'Sana Birsey Sormak Ä°stiyorum', '2013-12-10', 'evet', 'hayir'),
(6, 'drakula123', 'Aslan', 'slm', 'dsadasdaz', '2013-12-12', 'evet', 'hayir'),
(7, 'drakula123', 'Kartal', 'AkÄ±llÄ± ol', 'Naber \r\nnasÄ±l gidiyor', '2013-12-14', 'evet', 'hayir'),
(8, 'Kartal', 'CAnsu', 'sor', 'Tamam sor hadi', '2013-12-14', 'evet', 'hayir'),
(9, 'Aslan', 'Kartal', 'sda', 'Gondermek Istedigin Mesaji Girinizsadasdasd', '2013-12-14', 'hayir', 'hayir'),
(10, 'CAnsu', 'Kartal', 'sad', 'Gondermek Istedigin Mesaji Girinizasdsa', '2013-12-17', 'hayir', 'hayir');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
