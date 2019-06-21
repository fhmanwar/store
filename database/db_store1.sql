-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Apr 2019 pada 12.19
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `post` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori`, `slug_berita`, `judul`, `isi`, `post`, `gambar`, `status_berita`, `jenis_berita`, `tanggal_post`, `tanggal`) VALUES
(1, 2, 2, '12-tahun-politik-2018', 'tahun politik 2018', '<p>tahun politik jon</p>', 'admin', '434323120_144255.jpg', 'Publish', 'Berita', '0000-00-00 00:00:00', '2018-06-23 12:09:43'),
(2, 2, 2, '12-jokowi-digadang2-2-periode', 'jokowi digadang2 2 periode', '<p>jkw vs ww</p>', 'paijo', '434240222_197960.jpg', 'Publish', 'Berita', '0000-00-00 00:00:00', '2018-06-23 12:08:57'),
(3, 2, 1, '12-emas-taekwondo-ghiyatsi', 'Emas Taekwondo Ghiyatsi', '<p>Emas Taekwondo Ghiyatsi Ngudi Waluyo Cup 2017</p>', 'paijo', '434201549_229462.jpg', 'Publish', 'Berita', '0000-00-00 00:00:00', '2018-06-23 12:05:06'),
(4, 2, 1, '12-inter-capolista', 'Inter Capolista', '<p>Inter capolista</p>', 'paijo', '434239928_187212.jpg', 'Publish', 'Berita', '0000-00-00 00:00:00', '2018-06-23 12:04:02'),
(5, 2, 1, '12-city-vs-mu-2-1', 'City Vs MU 2-1', '<p>City Vs MU 2-1</p>', 'paijo', 'DXMX5463.JPG', 'Publish', 'Berita', '0000-00-00 00:00:00', '2018-06-23 12:02:15'),
(11, 2, 3, '12-karedok-jomblo', 'Karedok Jomblo', '<p>telah terjadi karma akibat sering membully orang lain dengan mengatakan jomblo</p>', NULL, '434128542_2275132.jpg', 'Publish', 'Berita', '2018-06-23 10:11:33', '2018-06-24 08:10:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `situs` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `situs`, `pesan`, `waktu`) VALUES
(2, 'najwa aulia', 'najwa@gmail.com', 'najwa.com', 'haiiii', '2017-12-08 10:49:45'),
(3, 'paijo', 'paijo@gmail.com', 'http://paijo.com', 'holllaaaaa', '2017-12-08 11:08:41'),
(9, 'asd', 'jhbhjbjhb', 'hjbjhb', 'hbjh', '2018-05-13 19:27:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `isi_galeri` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `posisi_galeri` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `isi_galeri`, `website`, `gambar`, `posisi_galeri`, `tanggal_post`, `tanggal`) VALUES
(2, 2, 'Arabica', '<p>Arabica Coffee</p>', 'https://coffeekiboshop.000webhostapp.com', 'images121.jpeg', 'Slide', '2018-07-08 02:04:44', '2018-07-08 00:46:33'),
(3, 2, 'Robusta', '<p>Robusta Coffee</p>', 'https://coffeekiboshop.000webhostapp.com', 'Bgcoffee.jpg', 'Slide', '2018-07-08 02:32:40', '2018-07-08 00:46:22'),
(4, 2, 'Espresso', '<p>Sari Kopi dengan rasa yang kuat</p>', 'https://coffeekiboshop.000webhostapp.com', 'images9.jpeg', 'Homepage', '2018-07-08 02:48:43', '2018-07-08 00:48:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tlp` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `metatext` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_map` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id_home`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `alamat`, `tlp`, `deskripsi`, `keywords`, `metatext`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `google_map`, `tanggal`) VALUES
(1, 1, 'Coffee Kibo', 'Kopi Nikmat dan Berkualitas', 'Coffeekibo@gmail.com', '', 'Pocowolo West 3th Street,', '+1 (705) 710 0093', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.796601287678!2d106.82206981477015!3d-6.420175095354896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebd4856caaa7%3A0x916d6e8dc4e74cd9!2sJl.+Romo%2C+Tirtajaya%2C+Sukmajaya%2C+Kota+Depok%2C+Jawa+Barat+16412!5e0!3m2!1sid!2sid!4v1474512157953\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-21 13:37:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(10) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori`, `slug_kategori`, `nama_kategori`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'sepak-bola', 'Football News', 'All about sport and football news', 1, '2018-06-22 21:08:28'),
(2, 'politik', 'Politik News', NULL, 2, '2018-06-24 04:09:53'),
(3, 'lain-lain', 'Lain Lain', NULL, 3, '2018-06-24 04:09:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `produk` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id`, `order_id`, `produk`, `qty`, `harga`) VALUES
(1, 1, 8, 2, '50000'),
(2, 1, 4, 1, '140000'),
(3, 1, 1, 1, '200000'),
(4, 2, 8, 10, '50000'),
(5, 2, 7, 5, '350000'),
(6, 2, 6, 3, '99000'),
(7, 4, 8, 10, '50000'),
(8, 4, 4, 5, '140000'),
(9, 4, 6, 2, '99000'),
(10, 5, 8, 10, '50000'),
(11, 5, 7, 5, '350000'),
(12, 5, 6, 2, '99000'),
(13, 6, 8, 1, '50000'),
(14, 6, 7, 1, '350000'),
(15, 6, 6, 1, '99000'),
(16, 8, 8, 1, '50000'),
(17, 8, 7, 1, '350000'),
(18, 8, 6, 1, '99000'),
(19, 9, 8, 1, '50000'),
(20, 9, 7, 1, '350000'),
(21, 9, 6, 1, '99000'),
(22, 10, 8, 1, '50000'),
(23, 10, 7, 1, '350000'),
(24, 10, 6, 1, '99000'),
(25, 11, 8, 1, '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `keterangan`, `urutan`) VALUES
(1, 'Arabica', 'Arabica', 'Publish', 1),
(2, 'Robusta', 'Robusta', 'Publish', 2),
(3, 'Espresso', 'Espresso', 'Publish', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pelanggan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `tanggal`, `pelanggan`) VALUES
(1, '2018-07-03', 1),
(2, '2018-07-03', 2),
(3, '2018-07-03', 3),
(4, '2018-07-03', 4),
(5, '2018-07-03', 5),
(6, '2018-07-03', 6),
(7, '2018-07-03', 7),
(8, '2018-07-03', 8),
(9, '2018-07-03', 9),
(10, '2018-07-03', 10),
(11, '2018-07-08', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `city` int(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `fname`, `lname`, `email`, `alamat`, `city`, `telp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'asdasd', 'asdfasf', 'ajib@gmail.com', 'asfasdfgs', 0, '12312412'),
(10, 'jomblo', 'akut', 'jomsakut@asd.com', 'qwerty', 0, '08123456789'),
(11, 'saf', 'saf', 'safdsa@gm.co', 'asfa', 0, '123123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `status_produk` varchar(30) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_user`, `slug_produk`, `nama_produk`, `deskripsi`, `harga`, `stok`, `satuan`, `status_produk`, `gambar`, `id_kategori`, `tanggal_post`, `tanggal`) VALUES
(1, 2, 'Brazilian-Robusta', 'Brazilian Robusta', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '200000', 100, 'Unit', 'Publish', 'BrazilCoff1.jpg', 1, '0000-00-00 00:00:00', '2018-06-24 08:17:27'),
(2, 2, 'Bali-Kintamanai-Arabica', 'Bali Kintamanai Arabica', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '150000', 2, 'Kwintal', 'Publish', 'BaliKintamaniArabic.jpg', 1, '0000-00-00 00:00:00', '2018-06-24 08:17:13'),
(3, 2, 'Green-Coffee', 'Green Coffee', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '145000', 60, 'Kg', 'Publish', 'Greencoff1.jpg', 1, '0000-00-00 00:00:00', '2018-06-24 08:17:01'),
(4, 2, 'Aceh-Gayo-Arabica', 'Aceh Gayo Arabica', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '140000', 30, 'Kwintal', 'Publish', 'AcehGayoArabic.jpg', 2, '0000-00-00 00:00:00', '2018-06-24 08:16:48'),
(5, 2, 'Sidikalang-Coffee-Toraja-Marinding', 'Sidikalang Coffee Toraja Marinding', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '105000', 60, 'Unit', 'Publish', 'TorajaMariningSidikalangCoffee.jpg', 2, '0000-00-00 00:00:00', '2018-06-24 08:16:38'),
(6, 2, 'Papua-Wamena-Arabica-Coffee', 'Papua Wamena Arabica Coffee', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '99000', 50, 'Unit', 'Publish', 'PapuaWamenaArabic.jpg', 2, '0000-00-00 00:00:00', '2018-06-24 08:16:27'),
(7, 2, 'Luwak-Coffee', 'Luwak Coffee', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '350000', 20, 'Unit', 'Publish', 'Luwakcoff1.jpg', 3, '0000-00-00 00:00:00', '2018-06-24 08:16:16'),
(8, 2, 'Temanggung-Robusta-Coffee', 'Temanggung Robusta Coffee', '<p>Lorem ipsum dolor sit amet, consectetur adipisi', '50000', 20, 'Unit', 'Publish', 'TemanggungRobusta1.jpg', 3, '0000-00-00 00:00:00', '2018-06-24 08:15:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `id_home` int(11) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `id_home`, `akses_level`, `gambar`, `id_admin`, `tanggal`) VALUES
(1, 'Ajib Susanto', 'ajib@gmail.com', 'ajib', '25f9e794323b453885f5181f1b624d0b', 1, 'Admin', '', 0, '2018-06-22 03:16:27'),
(5, 'jon', 'asalole@gmail.com', 'jhon', '25f9e794323b453885f5181f1b624d0b', 1, 'User', '', 0, '2018-06-22 03:16:52'),
(6, 'ajaib', 'ajaib@gmail.com', 'ajaib', '25f9e794323b453885f5181f1b624d0b', 1, 'User', '', 0, '2018-06-22 03:17:05'),
(11, 'oki dwi', 'S@gmail.com', 'mini', '25f9e794323b453885f5181f1b624d0b', 1, 'Blocked', '', 0, '2018-06-22 03:17:16'),
(12, 'fahmi', 'aha@email.com', 'fhm', '25f9e794323b453885f5181f1b624d0b', 0, 'Admin', '', 0, '2019-03-21 11:13:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
