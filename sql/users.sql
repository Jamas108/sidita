-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Okt 2024 pada 09.43
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_awal_penyedia` varchar(100) DEFAULT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `nama_akhir_penyedia` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_awal_penyedia`, `nama_penyedia`, `nama_akhir_penyedia`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 'test', 'test', 'test', 'test@gmail.com', '$2y$10$ePioleB2Q4lY9zJpDjzcTO96xoH/N0Y3mvZio8ktX1k4s3oE90/TC', 1, '2024-10-15 00:59:35', NULL),
(3, '', 'superadmin', '', 'superadmin@gmail.com', '$2y$10$V6zc13fPGPkyqbeasoSapef2GkUtSzNuBZkv.UNvgecZkv4yJ.bCm', 1, '2024-10-15 01:02:52', NULL),
(5, '', 'operator', '', 'operator@gmail.com', '$2y$10$RCrzMpykIWmnrxHzJ4Hck.9C/GzyzHurZdxl84dUgAD5o/0liGYPS', 2, '2024-10-15 07:31:08', NULL),
(6, '', 'ppk', '', 'ppk@gmail.com', '$2y$10$ggp2.V8sVRV1G1paRNyXWegFWOvfmo.qIvU905fTSaUZr5qxV/0/a', 3, '2024-10-15 07:34:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
