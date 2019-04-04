-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2019 at 11:30 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sarpras`
--
CREATE DATABASE `sarpras` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sarpras`;

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_barang`
--

CREATE TABLE IF NOT EXISTS `sarpras_barang` (
  `id_barang` int(10) NOT NULL auto_increment,
  `nama_barang` varchar(50) NOT NULL,
  `spesifikasi` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sarpras_barang`
--

INSERT INTO `sarpras_barang` (`id_barang`, `nama_barang`, `spesifikasi`, `lokasi`, `kondisi`, `jumlah`, `sumber_dana`) VALUES
(1, 'rak buku', 'dua pintu', 'perpustakaan', 'baik', 23, 'dana bos'),
(2, 'bangku', 'bangku murid', 'kelas 12', 'baik', 100, 'dana bos'),
(3, 'meja', 'guru', 'kelas', 'baik', 12, 'dana bos'),
(5, 'laptop', 'baik', 'toboh', 'sempurna', 4, 'bos');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_barang_keluar`
--

CREATE TABLE IF NOT EXISTS `sarpras_barang_keluar` (
  `id_brg_keluar` int(20) NOT NULL auto_increment,
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_keluar` int(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_brg_keluar`),
  KEY `id_barang` (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sarpras_barang_keluar`
--


-- --------------------------------------------------------

--
-- Table structure for table `sarpras_barang_masuk`
--

CREATE TABLE IF NOT EXISTS `sarpras_barang_masuk` (
  `id_brg_masuk` int(20) NOT NULL auto_increment,
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(30) NOT NULL,
  `id_supplier` int(20) NOT NULL,
  PRIMARY KEY  (`id_brg_masuk`),
  KEY `id_barang` (`id_barang`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sarpras_barang_masuk`
--

INSERT INTO `sarpras_barang_masuk` (`id_brg_masuk`, `id_barang`, `nama_barang`, `tgl_masuk`, `jml_masuk`, `id_supplier`) VALUES
(1, 2, 'bangku', '2019-02-20', 111, 0),
(2, 1, 'rak buku', '2019-02-20', 111, 0),
(3, 1, 'rak buku', '2019-04-03', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_pinjam_barang`
--

CREATE TABLE IF NOT EXISTS `sarpras_pinjam_barang` (
  `id_pinjam` int(20) NOT NULL auto_increment,
  `peminjaman` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah_barang` int(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_pinjam`),
  KEY `id_barang` (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sarpras_pinjam_barang`
--


-- --------------------------------------------------------

--
-- Table structure for table `sarpras_stok`
--

CREATE TABLE IF NOT EXISTS `sarpras_stok` (
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jml_masuk` int(100) NOT NULL,
  `jml_keluar` int(50) NOT NULL,
  `total_barang` int(100) NOT NULL,
  KEY `id_barang` (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarpras_stok`
--


-- --------------------------------------------------------

--
-- Table structure for table `sarpras_supplier`
--

CREATE TABLE IF NOT EXISTS `sarpras_supplier` (
  `id_supplier` int(10) NOT NULL auto_increment,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` varchar(15) NOT NULL,
  `kota_supplier` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sarpras_supplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `sarpras_user`
--

CREATE TABLE IF NOT EXISTS `sarpras_user` (
  `id_user` int(8) NOT NULL auto_increment,
  `nama` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sarpras_user`
--

INSERT INTO `sarpras_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'operator', 'operator', 'operator', 'operator');
