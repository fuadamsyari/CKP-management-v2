-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2024 pada 13.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

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
  `id` int(11) NOT NULL,
  `bt` varchar(128) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bt_selected`
--

INSERT INTO `bt_selected` (`id`, `bt`, `bulan`, `tahun`) VALUES
(1, '01', 'BULAN', 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_tahun`
--

CREATE TABLE `bulan_tahun` (
  `id` int(11) NOT NULL,
  `kode_bulan` varchar(4) NOT NULL,
  `bulan` varchar(128) NOT NULL
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
  `id` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `belanja_1` int(128) NOT NULL,
  `belanja_2` int(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `bt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbon`
--

CREATE TABLE `kasbon` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kasbon` int(128) NOT NULL
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
  `id` int(11) NOT NULL,
  `po_ke` varchar(128) NOT NULL,
  `tgl_po` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_tinta`
--

CREATE TABLE `po_tinta` (
  `id` int(11) NOT NULL,
  `warna` varchar(1) NOT NULL,
  `tinta` varchar(10) NOT NULL,
  `modal` int(6) NOT NULL,
  `po_ke` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `saldo` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`, `nominal`) VALUES
(1, 'Sisa Saldo', 0),
(2, 'ATM', 18000000),
(3, 'Cash', 6200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `barang` varchar(128) NOT NULL,
  `blb` varchar(128) NOT NULL,
  `nominal_blb` int(128) NOT NULL,
  `harga_jual` int(128) NOT NULL,
  `laba` int(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `nota` int(128) NOT NULL,
  `bt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tinta`
--

CREATE TABLE `tinta` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `warna` varchar(2) NOT NULL,
  `tinta` varchar(128) NOT NULL,
  `terjual` int(128) NOT NULL,
  `modal` int(128) NOT NULL,
  `untung` int(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `bt` varchar(128) NOT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `daftar_belanja`
--
ALTER TABLE `daftar_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasbon`
--
ALTER TABLE `kasbon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `po_list`
--
ALTER TABLE `po_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po_tinta`
--
ALTER TABLE `po_tinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tinta`
--
ALTER TABLE `tinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
