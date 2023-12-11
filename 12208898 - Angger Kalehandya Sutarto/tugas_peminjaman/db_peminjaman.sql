-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2023 pada 12.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(225) NOT NULL,
  `jenis_barang` enum('Laptop','HP','AdaptorLAN') NOT NULL,
  `no_barang` int(5) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `status` enum('Sudah Kembali','Belum Kembali') NOT NULL DEFAULT 'Belum Kembali'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id`, `nama_peminjam`, `jenis_barang`, `no_barang`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(46, 'Angger', 'Laptop', 3, '2023-10-08 16:58:00', '2023-10-11 16:58:00', 'Sudah Kembali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
