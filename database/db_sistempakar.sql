-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2021 pada 08.58
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistempakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_basis_pengetahuan`
--

CREATE TABLE `tb_basis_pengetahuan` (
  `id_basis_pengetahuan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_basis_pengetahuan`
--

INSERT INTO `tb_basis_pengetahuan` (`id_basis_pengetahuan`, `id_penyakit`, `id_gejala`, `mb`, `md`) VALUES
(4, 4, 8, 0.8, 0.2),
(5, 4, 9, 0.6, 0.2),
(6, 4, 10, 0.6, 0),
(7, 4, 11, 1, 0),
(8, 4, 12, 0.8, 0),
(9, 5, 13, 0.6, 0.2),
(10, 5, 14, 0.8, 0),
(11, 5, 15, 0.8, 0.2),
(12, 5, 16, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`) VALUES
(8, 'Rasa pegal di kepala'),
(9, 'Mudah capek'),
(10, 'Gampang mengantuk'),
(11, 'Pegal sampai ke pundak'),
(12, 'Kaki bengkak'),
(13, 'Nyeri sendi saat bangun tidur'),
(14, 'Rasa panas pada sendi'),
(15, 'Jempol kaki terasa nyeri'),
(16, 'Persendian susah digerakkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `hasil_penyakit` text NOT NULL,
  `hasil_gejala` text NOT NULL,
  `hasil_nilai` double NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hasil_created` int(11) NOT NULL,
  `hasil_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_penyakit`, `hasil_penyakit`, `hasil_gejala`, `hasil_nilai`, `nama`, `usia`, `jenis_kelamin`, `alamat`, `hasil_created`, `hasil_updated`) VALUES
(4, 5, '{\"5\":\"0.9826\",\"4\":\"0.8638\"}', '{\"16\":\"2\",\"15\":\"3\",\"14\":\"1\",\"13\":\"2\",\"12\":\"1\",\"11\":\"6\",\"10\":\"3\",\"9\":\"4\",\"8\":\"4\"}', 0.9826, 'Fariz Gustav', 21, 'laki-laki', 'Jl Gebang', 1618893660, NULL),
(5, 5, '{\"5\":\"0.8091\",\"4\":\"0.5509\"}', '{\"16\":\"2\",\"15\":\"5\",\"13\":\"4\",\"10\":\"2\",\"9\":\"3\",\"8\":\"5\"}', 0.8091, 'Mawar', 50, 'perempuan', 'Jl Mastrip 10', 1618893788, NULL),
(12, 5, '{\"5\":\"0.9054\"}', '{\"16\":\"2\",\"15\":\"3\",\"14\":\"4\",\"13\":\"5\",\"12\":\"6\",\"11\":\"8\"}', 0.9054, 'Siti', 44, 'perempuan', 'jl Manggar 55', 1618894415, NULL),
(13, 4, '{\"4\":\"1.0000\"}', '{\"11\":\"1\",\"10\":\"1\",\"9\":\"1\",\"8\":\"2\"}', 1, 'Kak Ros', 27, 'perempuan', 'Jl Kampung Durian Runtuh', 1618901488, NULL),
(14, 4, '{\"4\":\"1.0000\"}', '{\"16\":\"5\",\"15\":\"7\",\"14\":\"5\",\"13\":\"4\",\"12\":\"6\",\"11\":\"1\",\"10\":\"3\",\"9\":\"4\",\"8\":\"4\"}', 1, 'Atuk Dalang', 27, 'laki-laki', 'Jl Kampung Durian Runtuh 22', 1618901624, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `nama_kondisi`, `bobot`) VALUES
(1, 'Pasti Ya', 1),
(2, 'Hampir Pasti Ya', 0.8),
(3, 'Kemungkinan Besar Ya', 0.6),
(4, 'Mungkin Ya', 0.4),
(5, 'Tidak Tahu', -0.2),
(6, 'Mungkin Tidak', -0.4),
(7, 'Kemungkinan Besar Tidak', -0.6),
(8, 'Hampir Pasti Tidak', -0.8),
(9, 'Pasti Tidak', -1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `deskripsi_penyakit` text NOT NULL,
  `saran_penyakit` text NOT NULL,
  `penyakit_artikel` text DEFAULT NULL,
  `penyakit_saran_artikel` text DEFAULT NULL,
  `gambar_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `saran_penyakit`, `penyakit_artikel`, `penyakit_saran_artikel`, `gambar_penyakit`) VALUES
(4, 'Kolesterol', 'deskripsi kolesterol', 'saran kolesterol', NULL, NULL, 'a9bdc5b42c6a430f1c4fda5b96a517b6.jpg'),
(5, 'Asam Urat', 'deskripsi asam urat', 'saran asam urat', NULL, NULL, '582514e1508cc75ca9b798c00850f84a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `password`, `role`) VALUES
(1, 'nadasthing@gmail.com', 'nada hasni', '$2y$10$g21MwD97XX40bIBA.RCJKeWf3EGO3rCfMpUDqFDUjCNmpd5M2K4.O', 1),
(2, 'farizgustaf@gmail.com', 'Fariz', '$2y$10$g21MwD97XX40bIBA.RCJKeWf3EGO3rCfMpUDqFDUjCNmpd5M2K4.O', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  ADD PRIMARY KEY (`id_basis_pengetahuan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  MODIFY `id_basis_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  ADD CONSTRAINT `tb_basis_pengetahuan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_basis_pengetahuan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `tb_gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `tb_hasil_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD CONSTRAINT `tb_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
