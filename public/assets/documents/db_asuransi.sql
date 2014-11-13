-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2014 at 07:45 PM
-- Server version: 5.5.23
-- PHP Version: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_asuransi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `part_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `part_number`) VALUES
('BRG0001', 'iPhone 5', 'md1212'),
('BRG0002', 'iPad 4', 'MD002'),
('BRG0003', 'Macbook Pro 15', 'MD212');

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE IF NOT EXISTS `barang_rusak` (
`id_barang_rusak` int(11) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_store` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
`id_detail_retur` int(11) NOT NULL,
  `no_retur` varchar(7) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_sit_kirim`
--

CREATE TABLE IF NOT EXISTS `detail_sit_kirim` (
`id_detail_sit_kirim` int(11) NOT NULL,
  `no_sit_kirim` varchar(7) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_sit_order`
--

CREATE TABLE IF NOT EXISTS `detail_sit_order` (
`id_detail_sit_order` int(11) NOT NULL,
  `no_sit_order` varchar(7) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`id_info` int(11) NOT NULL,
  `tgl_info` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `posted_by` varchar(7) NOT NULL,
  `status_info` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id_info`, `tgl_info`, `judul`, `isi`, `posted_by`, `status_info`) VALUES
(1, '2014-07-17', 'Promo BCA', 'Promo Cashback tunai Rp.500.000,-', 'Adm0001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_register` date NOT NULL,
  `id_store` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_barang`
--

CREATE TABLE IF NOT EXISTS `register_barang` (
`id_registrasi` int(11) NOT NULL,
  `id_pelanggan` varchar(7) NOT NULL,
  `tgl_register` date NOT NULL,
  `tgl_expired` date NOT NULL,
  `serial_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `retur_barang`
--

CREATE TABLE IF NOT EXISTS `retur_barang` (
  `no_retur` varchar(7) NOT NULL,
  `tgl_retur` date NOT NULL,
  `id_store` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `status_retur` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sit_kirim`
--

CREATE TABLE IF NOT EXISTS `sit_kirim` (
  `no_sit_kirim` varchar(7) NOT NULL,
  `tgl_sit` date NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_store` varchar(7) NOT NULL,
  `no_sit_order` varchar(7) NOT NULL,
  `status_sit_kirim` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sit_order`
--

CREATE TABLE IF NOT EXISTS `sit_order` (
  `no_sit_order` varchar(7) NOT NULL,
  `tgl_sit_order` date NOT NULL,
  `id_store` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `status_sit_order` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id_stock` int(11) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(5) NOT NULL,
  `id_store` varchar(7) NOT NULL,
  `tgl_stock` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `kd_barang`, `qty`, `id_store`, `tgl_stock`) VALUES
(1, 'BRG0001', 10, 'GD0001', '2014-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id_store` varchar(7) NOT NULL,
  `nama_store` varchar(50) NOT NULL,
  `alamat_store` varchar(150) NOT NULL,
  `telepon_store` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id_store`, `nama_store`, `alamat_store`, `telepon_store`) VALUES
('GD0001', 'Gudang ', 'Jl.Gedong Panjang 1', '02184746453'),
('KP0001', 'Kantor Pusat', 'Jl.Gedong Panjang', '0216767272'),
('ST00002', 'Central Park Mall', 'Jl.S.Parman', '02164645454'),
('ST00003', 'Mall Kelapa Gading', 'Jl.Kelapa Gading raya', '0216743543'),
('ST00004', 'Mall Kota Kasablanka', 'Jl.Kasablanka', '0218347464');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(7) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `telepon_user` varchar(13) NOT NULL,
  `bagian` varchar(15) NOT NULL,
  `id_store` varchar(7) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `telepon_user`, `bagian`, `id_store`, `password`, `pass`) VALUES
('Adm0001', 'Indra', 'Indra@gmail.com', '081210160060', 'Admin', 'KP0001', 'e24f6e3ce19ee0728ff1c443e4ff488d', ''),
('Gdg0001', 'Hadi', 'Hadi@rocketmail.com', '02183736453', 'Gudang', 'GD0001', '76671d4b83f6e6f953ea2dfb75ded921', ''),
('USR0002', 'Nia', 'Nia@yahoo.com', '082172346728', 'Admin Store', 'ST00002', '04a481486dd84d7c8bfdfc89d38136a6', ''),
('USR0004', 'Yusuf', 'Yusuf@gmail.com', '0878632525265', 'Admin Store', 'ST00003', 'dd2eb170076a5dec97cdbbbbff9a4405', ''),
('USR0005', 'Selvii', 'selvi@gmail.com', '02134231', 'Admin Store', 'ST00002', '8e9fcb92d40727a369b875cb45d469e7', 'selff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
 ADD PRIMARY KEY (`id_barang_rusak`), ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `detail_retur`
--
ALTER TABLE `detail_retur`
 ADD PRIMARY KEY (`id_detail_retur`), ADD KEY `no_retur` (`no_retur`);

--
-- Indexes for table `detail_sit_kirim`
--
ALTER TABLE `detail_sit_kirim`
 ADD PRIMARY KEY (`id_detail_sit_kirim`);

--
-- Indexes for table `detail_sit_order`
--
ALTER TABLE `detail_sit_order`
 ADD PRIMARY KEY (`id_detail_sit_order`), ADD KEY `no_sit_order` (`no_sit_order`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`), ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `register_barang`
--
ALTER TABLE `register_barang`
 ADD PRIMARY KEY (`id_registrasi`), ADD KEY `id_pelanggan_2` (`id_pelanggan`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `retur_barang`
--
ALTER TABLE `retur_barang`
 ADD PRIMARY KEY (`no_retur`), ADD KEY `id_store` (`id_store`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sit_kirim`
--
ALTER TABLE `sit_kirim`
 ADD PRIMARY KEY (`no_sit_kirim`), ADD KEY `id_user` (`id_user`), ADD KEY `id_store` (`id_store`), ADD KEY `no_sit_order` (`no_sit_order`);

--
-- Indexes for table `sit_order`
--
ALTER TABLE `sit_order`
 ADD PRIMARY KEY (`no_sit_order`), ADD KEY `id_store` (`id_store`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id_stock`), ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`id_store`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_store` (`id_store`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
MODIFY `id_barang_rusak` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_retur`
--
ALTER TABLE `detail_retur`
MODIFY `id_detail_retur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_sit_kirim`
--
ALTER TABLE `detail_sit_kirim`
MODIFY `id_detail_sit_kirim` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_sit_order`
--
ALTER TABLE `detail_sit_order`
MODIFY `id_detail_sit_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `register_barang`
--
ALTER TABLE `register_barang`
MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
ADD CONSTRAINT `barang_rusak_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_retur`
--
ALTER TABLE `detail_retur`
ADD CONSTRAINT `detail_retur_ibfk_1` FOREIGN KEY (`no_retur`) REFERENCES `retur_barang` (`no_retur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_sit_order`
--
ALTER TABLE `detail_sit_order`
ADD CONSTRAINT `detail_sit_order_ibfk_1` FOREIGN KEY (`no_sit_order`) REFERENCES `sit_order` (`no_sit_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register_barang`
--
ALTER TABLE `register_barang`
ADD CONSTRAINT `register_barang_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur_barang`
--
ALTER TABLE `retur_barang`
ADD CONSTRAINT `retur_barang_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `retur_barang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sit_kirim`
--
ALTER TABLE `sit_kirim`
ADD CONSTRAINT `sit_kirim_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sit_kirim_ibfk_2` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sit_kirim_ibfk_3` FOREIGN KEY (`no_sit_order`) REFERENCES `sit_order` (`no_sit_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sit_order`
--
ALTER TABLE `sit_order`
ADD CONSTRAINT `sit_order_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sit_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
