-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2017 pada 16.13
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `kd_obat` varchar(8) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`kd_obat`, `id`) VALUES
('O0001', 33),
('O0002', 33),
('O0001', 34),
('O0002', 34),
('O0001', 35),
('O0002', 35),
('O0003', 36),
('O0002', 36),
('O0001', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `namafoto` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_foto`, `namafoto`, `nama`) VALUES
(1, 'apotik1.jpg', 'Ruang apotik  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `password` varchar(7) NOT NULL,
  `jekel` varchar(8) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tlp` varchar(16) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `password`, `jekel`, `alamat`, `email`, `tlp`, `foto`, `level`) VALUES
(1, 'OONG JULIA FIRNANADA', '827ccb0', 'pria', 'lamoung', 'oong.julian@gma', '99079868', 'PhotoGrid_1439128949708.jpg', 'pengunjung'),
(2, 'ASMA RIRIN JUWITA', '827ccb0', 'pria', 'tangerang', 'ririn@yahoo.com', '09855441', 'PhotoGrid_1441530018145.jpg', 'pengunjung'),
(3, 'Yuda', '202cb96', 'pria', 'tangerang', 'yuda@yahoo.com', '0977565656', 'PhotoGrid_1443596604083.jpg', 'pengunjung'),
(4, 'Yansah saputra', '827ccb0', 'pria', 'tangerang', 'yansah@yahoo.com', '9907896', 'Desert.jpg', 'pengunjung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `kd_admin` varchar(12) NOT NULL,
  `nm_admin` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nm_admin`, `password`, `jekel`, `alamat`, `telp`, `level`) VALUES
('001', 'oong', '81dc9b', 'Pria', 'Lampung', '', 'admin'),
('AD00002', 'ririn', '827ccb', 'Wanita', 'tangerang', '0978687687', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_katagori`
--

CREATE TABLE IF NOT EXISTS `tbl_katagori` (
  `kd_katagori` varchar(8) NOT NULL,
  `nm_katagori` varchar(40) NOT NULL,
  PRIMARY KEY (`kd_katagori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_katagori`
--

INSERT INTO `tbl_katagori` (`kd_katagori`, `nm_katagori`) VALUES
('KD001', 'Antiseptik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsumen`
--

CREATE TABLE IF NOT EXISTS `tbl_konsumen` (
  `kd_konsumen` varchar(10) NOT NULL,
  `nm_konsumen` varchar(20) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `keluhan` varchar(40) NOT NULL,
  PRIMARY KEY (`kd_konsumen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`kd_konsumen`, `nm_konsumen`, `jekel`, `alamat`, `telp`, `keluhan`) VALUES
('K0003', 'aku', 'Wanita', 'cibdak', '0898675645', ''),
('K0002', 'rio', 'Pria', 'tangerang', '08987678', 'sakit'),
('K0001', 'Adi', 'Pria', 'jl. gatot subroto no.1', '0977775678', 'Sakit ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE IF NOT EXISTS `tbl_obat` (
  `kd_obat` varchar(8) NOT NULL,
  `nm_obat` varchar(20) NOT NULL,
  `kd_katagori` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `harga` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `nm_obat`, `kd_katagori`, `tgl`, `harga`) VALUES
('O0001', 'Salap 88', 'KD001', '2017-10-20', '5000'),
('O0002', 'Panadol', 'KD001', '2017-10-21', '2000'),
('O0003', 'bodrek', 'KD001', '2017-10-23', '1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(10) NOT NULL,
  `kd_konsumen` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `no_transaksi`, `kd_konsumen`, `tgl`, `jumlah`) VALUES
(37, 'P0005', 'K0003', '2017-10-23', '1'),
(36, 'P0004', 'K0002', '2017-10-23', '1'),
(35, 'P0003', 'K0001', '2017-10-23', '1'),
(34, 'P0002', 'K0001', '2017-10-22', '1'),
(33, 'P0001', 'K0001', '2017-10-21', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
