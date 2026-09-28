-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 30 Oca 2021, 13:15:38
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `uyelik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `tekrarsifre` varchar(255) NOT NULL,
  `dogumgunu` int(11) NOT NULL,
  `dogumayi` int(11) NOT NULL,
  `dogumyili` int(11) NOT NULL,
  `kayit_tarihi` varchar(255) NOT NULL,
  `resim` text,
  `unuttum` text,
  `online` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `email`, `sifre`, `tekrarsifre`, `dogumgunu`, `dogumayi`, `dogumyili`, `kayit_tarihi`, `resim`, `unuttum`, `online`) VALUES
(70, 'MelWoveR', 'fatimazehraoktem@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 5, 12, 2004, '19-12-2020', 'profil_1.jpg', '', '30-01-2021/15:58'),
(78, 'Feyza Cücük', 'devinkl145@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 'caf1a3dfb505ffed0d024130f58c5cfa', 18, 10, 1987, '21-12-2020', '', '', '05-01-2021/15:30'),
(81, 'sa', 'fatimazehraoktem42@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'bcbe3365e6ac95ea2c0343a2395834dd', 18, 10, 1988, '04-01-2021', NULL, NULL, '04-01-2021/20:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_id` int(11) NOT NULL,
  `nerede` text NOT NULL,
  `tarih` date NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=668 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
CREATE TABLE IF NOT EXISTS `mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_id` int(11) NOT NULL,
  `alan_id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar_ic`
--

DROP TABLE IF EXISTS `mesajlar_ic`;
CREATE TABLE IF NOT EXISTS `mesajlar_ic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj_id` int(11) NOT NULL,
  `gonderen_id` int(11) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` date NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

DROP TABLE IF EXISTS `sorular`;
CREATE TABLE IF NOT EXISTS `sorular` (
  `soru_id` int(11) NOT NULL AUTO_INCREMENT,
  `soru_baslik` varchar(200) NOT NULL,
  `soru_aciklama` text NOT NULL,
  `soru_ekleyen` int(11) DEFAULT NULL,
  `soru_sef` varchar(200) NOT NULL,
  `soru_etiket` varchar(200) NOT NULL,
  `soru_durum` int(11) NOT NULL DEFAULT '1',
  `soru_hit` int(11) NOT NULL DEFAULT '0',
  `soru_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`soru_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`soru_id`, `soru_baslik`, `soru_aciklama`, `soru_ekleyen`, `soru_sef`, `soru_etiket`, `soru_durum`, `soru_hit`, `soru_tarih`) VALUES
(1, 'Müzik dinlerken sözleri mi daha etkilidir, melodisi mi?', 'Müzik dinlerken melodisi mi sizi alıp götürür, sözleri mi?', 70, '', 'Müzik, söz, melodi, soru', 1, 1, '2021-01-25 14:20:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `puan` varchar(1) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
