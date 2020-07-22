-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2019 pada 06.25
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `password`, `alamat`, `id_kecamatan`, `id_kelurahan`, `nohp`, `foto`) VALUES
(5, 'Manda Rahman', 'manda@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Jl Armada 001 No 001 Rt 001 Rw 001', 2, 3, '2234234', 'IMG-20190213-WA0016.jpg'),
(6, 'Marwan Ssss', 'marwan@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ttttt', 1, 2, '454545', 'ci_combo_.jpg'),
(7, 'Kurnia', 'kurnia@gmail.com', '3d54697cdaf14cdd4efdad7201d5a91d', 'alamat', 1, 2, '24234', 'Kurnia.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(80) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `harga_item`) VALUES
(1, 'Bed Cover', 25000),
(2, 'Baju Gaun', 20000),
(3, 'Jas', 20000),
(4, 'Selimut', 10000),
(5, 'Ambal 2x3', 45000),
(6, 'Ambal 3x4', 65000),
(7, 'Ambal 4x6', 85000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(80) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `harga`) VALUES
(1, 'Kiloan', 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Kategori 1'),
(2, 'Kategori 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Ilir Barat I'),
(2, 'Ilir Barat II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(1, 2, 'Kel. 32 Ilir'),
(2, 1, 'Kel. Demang Lebar Daun'),
(3, 2, 'Kel. 30 Ilir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(80) NOT NULL,
  `harga` int(11) NOT NULL,
  `lama_proses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `lama_proses`) VALUES
(1, 'Paket Biasa', 7000, 72),
(2, 'Paket Exspress', 10000, 1),
(3, 'Paket Kilat', 9000, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `status_pesanan` enum('Masuk','Diproses','Selesai') NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_customer`, `id_jenis`, `id_paket`, `jumlah`, `total_harga`, `tgl_masuk`, `status_pesanan`, `tgl_keluar`, `longitude`, `latitude`) VALUES
(34, 7, 1, 2, 3, 31000, '2019-04-11 21:54:20', 'Selesai', '2019-04-14 21:54:20', '', ''),
(36, 6, 1, 3, 2, 23000, '2019-04-11 21:55:13', 'Diproses', '2019-04-13 21:55:13', '', ''),
(37, 5, 1, 1, 0, 7000, '2019-04-14 19:50:25', 'Diproses', '2019-04-17 19:50:25', '', ''),
(38, 5, 1, 2, 3, 31000, '2019-04-19 15:59:06', 'Masuk', '2019-04-19 16:59:06', '', ''),
(39, 7, 1, 1, 2, 21000, '2019-05-18 13:44:19', 'Selesai', '2019-05-21 13:44:19', '', ''),
(40, 7, 1, 1, 3, 28000, '2019-05-18 13:45:25', 'Diproses', '1970-01-01 07:00:00', '', ''),
(41, 6, 1, 2, 4, 38000, '2019-05-18 13:49:36', 'Diproses', '2019-05-18 14:49:36', '', ''),
(42, 7, 1, 1, 4, 35000, '2019-05-18 13:52:57', 'Selesai', '2019-05-21 13:52:57', '', ''),
(43, 7, 1, 1, 3, 28000, '2019-07-09 11:02:59', 'Masuk', '2019-07-12 11:02:59', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_satuan`
--

CREATE TABLE `pesan_satuan` (
  `id_pesan_satuan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `status_pesanan` enum('Masuk','Diproses','Selesai') NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_satuan`
--

INSERT INTO `pesan_satuan` (`id_pesan_satuan`, `id_customer`, `id_item`, `id_paket`, `jumlah_item`, `total_harga`, `tgl_masuk`, `status_pesanan`, `tgl_keluar`, `longitude`, `latitude`) VALUES
(238, 5, 5, 2, 3, 145000, '2019-04-19 14:27:20', 'Masuk', '2019-04-19 15:27:20', '', ''),
(239, 5, 6, 2, 3, 205000, '2019-04-19 14:27:20', 'Masuk', '2019-04-19 15:27:20', '', ''),
(240, 5, 5, 1, 3, 142000, '2019-04-19 16:01:16', 'Masuk', '2019-04-22 16:01:16', '', ''),
(241, 5, 6, 1, 2, 137000, '2019-04-19 16:01:16', 'Masuk', '2019-04-22 16:01:16', '', ''),
(242, 5, 7, 1, 5, 432000, '2019-04-19 16:01:16', 'Masuk', '2019-04-22 16:01:16', '', ''),
(243, 7, 5, 1, 4, 187000, '2019-04-19 16:01:42', 'Masuk', '2019-04-22 16:01:42', '', ''),
(244, 7, 7, 1, 0, 7000, '2019-04-19 16:01:42', 'Masuk', '2019-04-22 16:01:42', '', ''),
(245, 7, 2, 1, 6, 127000, '2019-04-19 16:01:42', 'Masuk', '2019-04-22 16:01:42', '', ''),
(246, 7, 5, 1, 4, 187000, '2019-04-19 16:02:09', 'Masuk', '2019-04-22 16:02:09', '', ''),
(247, 7, 7, 1, 0, 7000, '2019-04-19 16:02:09', 'Masuk', '2019-04-22 16:02:09', '', ''),
(248, 7, 5, 1, 1, 52000, '2019-05-18 14:54:21', 'Masuk', '2019-05-21 14:54:21', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email_petugas` varchar(150) NOT NULL,
  `pass_petugas` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `level_petugas` enum('Pencuci','Kurir') NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `email_petugas`, `pass_petugas`, `alamat`, `nohp`, `level_petugas`, `foto`) VALUES
(1, 'Budi Do', 'budi@gmail.com', '9c5fa085ce256c7c598f6710584ab25d', '', '', 'Kurir', ''),
(2, 'Mawar Wastari', '', '', '', '', 'Pencuci', ''),
(3, 'Andre Arianto', '', '', '232sdsf', '232', 'Pencuci', '1.jpg'),
(4, 'dd', '', '', 'dsdfsd', '234234', 'Kurir', ''),
(5, 'gg', '', '', 'rgdter', '435345', 'Kurir', 'gg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('Administrator','Owner') NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`) VALUES
(2, 'owner', '5be057accb25758101fa5eadbbd79503', 'Owner', 'M. Wahid Alqorni'),
(4, 'maman', '1c41bdf79a89ac2eb9ba646b540325d5', 'Administrator', 'Maman'),
(5, 'adminkuu', '0bd3ec17f7232e27d7d23e820eb09c6e', 'Administrator', 'M. Wahid Alqorni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pesan_satuan`
--
ALTER TABLE `pesan_satuan`
  ADD PRIMARY KEY (`id_pesan_satuan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `pesan_satuan`
--
ALTER TABLE `pesan_satuan`
  MODIFY `id_pesan_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
