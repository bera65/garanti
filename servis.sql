-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ara 2016, 07:54:20
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `servis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id_ayar` int(3) NOT NULL,
  `veri` varchar(128) CHARACTER SET utf8 NOT NULL,
  `deger` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id_ayar`, `veri`, `deger`) VALUES
(1, 'Tema', 'default'),
(2, 'SiteAd', 'Servis & Garanti Takip'),
(3, 'DuzgunUrl', '1'),
(4, 'Dizin', '/garanti/'),
(5, 'smtpEmail', 'kullanici@siteniz.com'),
(6, 'smtpAdres', 'smtp.siteniz.com'),
(7, 'smtpSifre', 'sifre'),
(8, 'smtpPort', 'smtpport');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id_kategori` int(4) NOT NULL,
  `kategori_adi` varchar(128) CHARACTER SET utf8 NOT NULL,
  `kategori_seo` varchar(128) CHARACTER SET utf8 NOT NULL,
  `eklenme_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grub` int(4) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id_kategori`, `kategori_adi`, `kategori_seo`, `eklenme_tarihi`, `grub`, `aktif`) VALUES
(1, 'Bilgisayarlar', 'bilgisayarlar', '2016-12-27 14:06:36', 1, 1),
(2, 'OEM Ürünleri', 'oem-urunleri', '2016-12-27 14:04:08', 1, 1),
(3, 'Adaptör / Batarya', 'adaptor-batarya', '2016-12-27 14:16:49', 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id_kullanici` int(4) NOT NULL,
  `kullanici_adi` varchar(32) CHARACTER SET utf8 NOT NULL,
  `sifre` varchar(32) CHARACTER SET utf8 NOT NULL,
  `sonsifredegisikligi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anahtar` varchar(32) CHARACTER SET utf8 NOT NULL,
  `eposta` varchar(128) CHARACTER SET utf8 NOT NULL,
  `kayit_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` int(1) NOT NULL DEFAULT '0',
  `resim` int(1) NOT NULL DEFAULT '0',
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id_kullanici`, `kullanici_adi`, `sifre`, `sonsifredegisikligi`, `anahtar`, `eposta`, `kayit_tarihi`, `admin`, `resim`, `aktif`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-12-28 09:23:17', 'ebccc1bd1e453234a6f2cdae40defb85', 'olume_0kala@hotmail.com', '2016-12-26 10:14:04', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id_musteri` int(11) NOT NULL,
  `musteri_ad` varchar(128) CHARACTER SET utf8 NOT NULL,
  `adres` varchar(320) CHARACTER SET utf8 DEFAULT NULL,
  `telefon` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `eposta` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `aciklama` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `resim` int(1) NOT NULL DEFAULT '0',
  `kayit_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id_musteri`, `musteri_ad`, `adres`, `telefon`, `eposta`, `aciklama`, `resim`, `kayit_tarihi`, `aktif`) VALUES
(1, 'RAMAZAN BENEK', 'M.FEVZİ ÇAKMAK CAD CANER İŞ MERKEZİ NO:106 VAN', '0544 841 21 71', 'bera_ramazan@hotmail.com', 'SIK SIK ÜRÜN ALAN BİR MÜŞTERİ', 1, '2016-12-28 10:30:14', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id_urun` int(11) NOT NULL,
  `id_musteri` int(11) NOT NULL,
  `satis_tarihi` datetime NOT NULL,
  `garanti_bitis` date NOT NULL,
  `urun_aciklama` text,
  `id_kategori` int(4) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id_urun`, `id_musteri`, `satis_tarihi`, `garanti_bitis`, `urun_aciklama`, `id_kategori`, `aktif`) VALUES
(1, 1, '2016-12-28 00:00:00', '2018-12-28', 'ÜRÜN ORJİNAL KUTUSU YOK', 1, 1),
(2, 1, '2016-12-28 00:00:00', '2017-06-28', '', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_detay`
--

CREATE TABLE `urun_detay` (
  `id_urun_detay` int(11) NOT NULL,
  `id_urun` int(11) NOT NULL,
  `urun_adi` varchar(256) CHARACTER SET utf8 NOT NULL,
  `urun_sn` varchar(128) CHARACTER SET utf8 NOT NULL,
  `duzenlenme_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `urun_detay`
--

INSERT INTO `urun_detay` (`id_urun_detay`, `id_urun`, `urun_adi`, `urun_sn`, `duzenlenme_tarihi`, `aktif`) VALUES
(1, 1, 'LENOVO V370 I5 4GB RAM 120GB SSD HDD', 'AX7650056HB1', '2016-12-28 10:30:14', 1),
(2, 2, 'LENOVO ORJİNAL ADAPTÖR', '345678987654567887654', '2016-12-28 10:44:22', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id_ayar`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id_kullanici`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id_musteri`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id_urun`);

--
-- Tablo için indeksler `urun_detay`
--
ALTER TABLE `urun_detay`
  ADD PRIMARY KEY (`id_urun_detay`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id_ayar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id_kategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id_kullanici` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id_musteri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id_urun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Tablo için AUTO_INCREMENT değeri `urun_detay`
--
ALTER TABLE `urun_detay`
  MODIFY `id_urun_detay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
