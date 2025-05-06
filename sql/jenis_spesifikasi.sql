-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Okt 2024 pada 10.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_spesifikasi`
--

CREATE TABLE `jenis_spesifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_spesifikasi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_spesifikasi`
--

INSERT INTO `jenis_spesifikasi` (`id`, `jenis_spesifikasi`, `deskripsi`) VALUES
(1, 'Konsultansi', 'Jenis Spesifikasi Konsultansi'),
(2, 'Jasa Konstruksi', 'Jenis Spesifikasi Jasa Konstruksi'),
(3, 'Pengadaan Barang', 'Jenis Spesifikasi Pengadaan Barang'),
(4, 'Jasa Lain', 'Jenis Spesifikasi Jasa Lain');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_spesifikasi`
--
ALTER TABLE `jenis_spesifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_spesifikasi`
--
ALTER TABLE `jenis_spesifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
