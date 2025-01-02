-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jan 2025 pada 13.06
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ckp-management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bt_selected`
--

CREATE TABLE `bt_selected` (
  `id` int NOT NULL,
  `bt` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `bulan` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bt_selected`
--

INSERT INTO `bt_selected` (`id`, `bt`, `bulan`, `tahun`) VALUES
(1, '01', 'BULAN', 2025);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_tahun`
--

CREATE TABLE `bulan_tahun` (
  `id` int NOT NULL,
  `kode_bulan` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `bulan` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bulan_tahun`
--

INSERT INTO `bulan_tahun` (`id`, `kode_bulan`, `bulan`) VALUES
(1, '01', 'januari'),
(2, '02', 'februari'),
(5, '03', 'maret'),
(6, '04', 'april'),
(7, '05', 'mei'),
(8, '06', 'juni'),
(9, '07', 'juli'),
(10, '08', 'agustus'),
(11, '09', 'september'),
(12, '10', 'oktober'),
(13, '11', 'november'),
(14, '12', 'desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_belanja`
--

CREATE TABLE `daftar_belanja` (
  `id` int NOT NULL,
  `tanggal` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `belanja_1` int NOT NULL,
  `belanja_2` int NOT NULL,
  `ket` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `bt` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbon`
--

CREATE TABLE `kasbon` (
  `id` int NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `kasbon` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasbon`
--

INSERT INTO `kasbon` (`id`, `nama`, `kasbon`) VALUES
(1, 'Employe A', 0),
(2, 'Employe B', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_list`
--

CREATE TABLE `po_list` (
  `id` int NOT NULL,
  `po_ke` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_po` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_tinta`
--

CREATE TABLE `po_tinta` (
  `id` int NOT NULL,
  `warna` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `tinta` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `modal` int NOT NULL,
  `po_ke` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id` int NOT NULL,
  `saldo` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`, `nominal`) VALUES
(1, 'Sisa Saldo', 0),
(2, 'BRI', 0),
(3, 'BPD', 0),
(4, 'Cash', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `tanggal` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `customer` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `barang` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `blb` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal_blb` int NOT NULL,
  `harga_jual` int NOT NULL,
  `laba` int NOT NULL,
  `ket` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nota` int NOT NULL,
  `bt` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tinta`
--

CREATE TABLE `tinta` (
  `id` int NOT NULL,
  `tanggal` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `warna` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `tinta` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `terjual` int NOT NULL,
  `modal` int NOT NULL,
  `untung` int NOT NULL,
  `customer` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `bt` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bt_selected`
--
ALTER TABLE `bt_selected`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_belanja`
--
ALTER TABLE `daftar_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasbon`
--
ALTER TABLE `kasbon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_list`
--
ALTER TABLE `po_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_tinta`
--
ALTER TABLE `po_tinta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tinta`
--
ALTER TABLE `tinta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bt_selected`
--
ALTER TABLE `bt_selected`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `daftar_belanja`
--
ALTER TABLE `daftar_belanja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasbon`
--
ALTER TABLE `kasbon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `po_list`
--
ALTER TABLE `po_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po_tinta`
--
ALTER TABLE `po_tinta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tinta`
--
ALTER TABLE `tinta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
