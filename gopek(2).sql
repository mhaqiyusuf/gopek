-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2018 pada 18.32
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gopek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama_makanan`, `deskripsi`, `foto`, `harga`) VALUES
(1, 'Pempek Kapal Selam', 'Pempek Kapal Selam yaitu telur ayam yang dibungkus dengan adonan Pempek dan digoreng dalam minyak panas yang berbentuk seperti kapal selam atau biasa juga disebut Pempek telor besar yang terbuat dari ikan tenggiri/gabus', 'kapal-selam.png', 12000),
(2, 'Pempek Adaan', 'Pempek adaan yang terbuat dari bahan-bahan pilihan seperti ikan tenggiri sebagai bahan utamanya. Kualitas rasanya dijamin enak, jika anda berminat silahkan langsung pesan.', 'adaan.jpg', 15000),
(3, 'Tekwan', 'Tekwan adalah salah satutp kuliner yang terkenal di palembang, tekwan berbahan dasar ikan dan sagu yang kemudian dibentuk dengan ukuran kecil-kecil sedemikian rupa dan di sajikan dengan kuah. Untuk kuahnya dibuat dengan menggunakan kuah udang.', 'tekwan.jpg', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(1, 'haha', 'haha', 45, 'test@mydomain.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `bayar` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `jumlah`, `tanggal`, `status`, `bayar`) VALUES
(1, 12, 72000, '2018-01-11', 1, '0'),
(2, 30, 48000, '2018-01-11', 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_makanan`, `jumlah`) VALUES
(14, 2, 1, 4),
(18, 1, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `email`, `no_hp`, `username`, `password`, `foto`) VALUES
(12, 'Muhammad Haqi Yusuf', 'Kota Baru', 'Palembang', '14-11-1997', 'laki-laki', 'haqi@gmail.com', '081234567891', 'haqi', '6bc1f25d7f26db091a5851e221ef8e8e', 'haqi.jpg'),
(13, 'Imran Setiadi', 'Pahoman', '', '', 'laki-laki', 'imran@gmail.com', '081234567891', 'imran', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7', 'Screenshot (21).png'),
(28, 'trgf', 'etsgd', '', '', 'laki-laki', 'test@testdomain.com', '', 'haqie', 'f6c3b1f6b640ddb2fb8c1bfa7f8c25ed', 'Screenshot (6).png'),
(29, 'rger', 'erhe', '', '', 'laki-laki', 'test@mydomain.com', '', 'haqies', 'accc9105df5383111407fd5b41255e23', 'Screenshot (5).png'),
(30, 'haha', 'haha', 'haha', '', 'laki-laki', 'test@mydomain.com', '', 'haha', '4e4d6c332b6fe62a63afe56171fd3725', 'Screenshot (32).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_makanan` (`id_makanan`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
