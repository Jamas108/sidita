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
-- Struktur dari tabel `spesifikasi`
--

CREATE TABLE `spesifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_spesifikasi_id` int(10) UNSIGNED NOT NULL,
  `nama_spesifikasi` varchar(100) NOT NULL,
  `deskripsi_spesifikasi` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spesifikasi`
--

INSERT INTO `spesifikasi` (`id`, `jenis_spesifikasi_id`, `nama_spesifikasi`, `deskripsi_spesifikasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Konsultasi Perencana Konstruksi', 'Konsultasi Perencana Konstruksi', NULL, NULL),
(2, 1, 'Konsultasi Pengawas Konstruksi', 'Konsultasi Pengawas Konstruksi', NULL, NULL),
(3, 2, 'Jasa Konstruksi Gedung', 'Jasa Konstruksi Gedung', NULL, NULL),
(4, 2, 'Jasa Konstruksi MEP (Mechanical, Electrical, Plumbing)', 'Jasa Konstruksi MEP (Mechanical, Electrical, Plumbing)', NULL, NULL),
(5, 3, 'Pengadaan Barang Elektronik', 'Pengadaan Barang Elektronik', NULL, NULL),
(6, 3, 'Pengadaan Barang Alat Lab', 'Pengadaan Barang Alat Lab', NULL, NULL),
(7, 3, 'Pengadaan Barang Mebelair', 'Pengadaan Barang Mebelair', NULL, NULL),
(8, 3, 'Pengadaan Barang Bahan Lab', 'Pengadaan Barang Bahan Lab', NULL, NULL),
(9, 3, 'Pengadaan Barang Bahan ATK', 'Pengadaan Barang Bahan ATK', NULL, NULL),
(10, 3, 'Pengadaan Barang Bahan Konveksi', 'Pengadaan Barang Bahan Konveksi', NULL, NULL),
(11, 4, 'Jasa Kebersihan (Cleaning Service)', 'Jasa Kebersihan (Cleaning Service)', NULL, NULL),
(12, 4, 'Jasa Keamanan (Security)', 'Jasa Keamanan (Security)', NULL, NULL),
(13, 4, 'Jasa Pengangkut Sampah', 'Jasa Pengangkut Sampah', NULL, NULL),
(14, 4, 'Jasa Langganan E-Journal', 'Jasa Langganan E-Journal', NULL, NULL),
(15, 4, 'Jasa Langganan Aplikasi', 'Jasa Langganan Aplikasi', NULL, NULL),
(16, 4, 'Jasa Telekomunikasi (Bandwith Internet)', 'Jasa Telekomunikasi (Bandwith Internet)', NULL, NULL),
(17, 4, 'Jasa Pelatihan', 'Jasa Pelatihan', NULL, NULL),
(18, 4, 'Jasa Pemeliharaan Alat Laboratorium', 'Jasa Pemeliharaan Alat Laboratorium', NULL, NULL),
(19, 4, 'Jasa Catering', 'Jasa Catering', NULL, NULL),
(20, 4, 'Jasa EO / Travel', 'Jasa EO / Travel', NULL, NULL),
(21, 4, 'Jasa Penginapan', 'Jasa Penginapan', NULL, NULL),
(22, 4, 'Jasa Pemeliharaan Alat Elektronik', 'Jasa Pemeliharaan Alat Elektronik', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spesifikasi_jenis_spesifikasi_id_foreign` (`jenis_spesifikasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `spesifikasi`
--
ALTER TABLE `spesifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD CONSTRAINT `spesifikasi_jenis_spesifikasi_id_foreign` FOREIGN KEY (`jenis_spesifikasi_id`) REFERENCES `jenis_spesifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
