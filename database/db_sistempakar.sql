-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2021 pada 09.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_basis_pengetahuan`
--

INSERT INTO `tb_basis_pengetahuan` (`id_basis_pengetahuan`, `id_penyakit`, `id_gejala`, `cf_pakar`) VALUES
(17, 8, 22, 0.4),
(18, 8, 20, 0.2),
(19, 8, 21, 0.2),
(20, 8, 23, 1),
(21, 9, 20, 0.2),
(22, 9, 21, 0.2),
(23, 9, 22, 0.4),
(24, 9, 24, 1),
(25, 10, 22, 0.4),
(26, 10, 20, 0.2),
(27, 10, 25, 0.5),
(28, 10, 26, 1),
(29, 11, 21, 0.2),
(30, 11, 22, 0.4),
(31, 11, 20, 0.4),
(32, 11, 27, 0.8),
(33, 11, 28, 1),
(34, 12, 21, 0.2),
(35, 12, 22, 0.4),
(36, 12, 20, 0.4),
(37, 12, 27, 0.8),
(38, 12, 29, 1),
(39, 13, 22, 0.2),
(40, 13, 20, 0.4),
(41, 13, 27, 0.8),
(42, 13, 30, 1),
(43, 14, 22, 0.2),
(44, 14, 31, 0.6),
(45, 14, 32, 0.5),
(46, 14, 33, 1),
(47, 15, 34, 0.5),
(48, 15, 35, 0.6),
(49, 15, 36, 0.4),
(50, 15, 37, 1),
(51, 15, 38, 0.5);

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
(20, 'Wajah terasa gatal'),
(21, 'Terdapat sel kulit mati pada wajah'),
(22, 'Kulit berminyak'),
(23, 'Terdapat benjolan kecil dan sedikit menonjol serta bewarana hitam'),
(24, 'Terdapat benjolan kecil bewarna putih kecil dan tidak sakit'),
(25, 'terdapat ruam pada kulit'),
(26, 'Terdapat benjolan kecil bewarna merah'),
(27, 'Sakit ketika disentuh'),
(28, 'Terdapat benjolan kecil dan bernanah pada ujung'),
(29, 'Terdapat benjolan agak besar dan keras'),
(30, 'Terdapat benjolan besar berisi nanah'),
(31, 'Terdapat benjolan keras dan padat'),
(32, 'Terdapat lesi pada wajah'),
(33, 'Terdapat benjolan-benjolan besar berkelompok'),
(34, 'Fluktuaktif demam'),
(35, 'Nyeri sendi dengan pembengkakan'),
(36, 'Berat badan turun dan nafsu makan turun'),
(37, 'Jerawat ulserasi dan inflamasi pada pungggung dan dada'),
(38, 'Penurunan aktivitas fisik');

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
(21, 12, '{\"12\":\"1.0000\",\"10\":\"1.0000\",\"13\":\"0.9603\",\"9\":\"0.8817\",\"11\":\"0.8403\",\"14\":\"0.4848\",\"8\":\"0.4086\"}', '{\"38\":\"2\",\"37\":\"9\",\"36\":\"9\",\"35\":\"6\",\"34\":\"9\",\"33\":\"9\",\"32\":\"3\",\"31\":\"1\",\"30\":\"2\",\"29\":\"1\",\"27\":\"2\",\"26\":\"1\",\"25\":\"2\",\"24\":\"2\",\"22\":\"4\",\"21\":\"3\",\"20\":\"1\"}', 1, 'Amry Zulfa', 2, 'perempuan', 'saasd', 1622184455, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `cf_kondisi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `id_user`, `nama_kondisi`, `cf_kondisi`) VALUES
(1, 1, 'Pasti Ya', 1),
(2, 1, 'Hampir Pasti Ya', 0.8),
(3, 1, 'Kemungkinan Besar Ya', 0.6),
(4, 1, 'Mungkin Ya', 0.4),
(5, 1, 'Tidak Tahu', -0.2),
(6, 1, 'Mungkin Tidak', -0.4),
(7, 1, 'Kemungkinan Besar Tidak', -0.6),
(8, 1, 'Hampir Pasti Tidak', -0.8),
(9, 1, 'Pasti Tidak', -1);

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
(8, 'Blackhead', 'Blackhead atau komedo hitam adalah tonjolan kecil berwarna gelap yang tumbuh di pori-pori kulit.', 'a.	Campuran perasan lemon dan madu. Campurkan perasan lemon dengan takaran 1 sendok makan dan madu sebanyak 1 sendok teh. Kemudian, oleskan campuran tersebut secara merata di bagian yang terdapat komedo\r\nb.	Masker putih telur, anda bisa menggunakan putih telur. Kandungan putih telur tidak hanya mampu  menghilangkan komedo saja, tapi dapat membuat wajah lebih putih.\r\nc.	Lakukan chemical peeling. Ini adalah metode perawatan kulit dengan menggunakan bahan kimia. Perawatan ini akan mengelupas lapisan teratas kulit anda sehingga berganti dengan lapisan kulit yang lebih baru dan halus.\r\nd.	Gunakan produk yang mengandung asam salisilat. Kandungan ini memiliki kemampuan untuk membersihkan sel kulit mati dan minyak berlebih, sehingga blackhead pun jadi lebih mudah hilang.', NULL, NULL, 'e9fd069124ec38356e62788d464b6e24.jpg'),
(9, 'Whitehead', 'Komedo putih atau disebut whitehead adalah salah satu jenis jerawat yang terbentuk ketika sel-sel kulit mati, minyak, dan bakteri terperangkap di dalam pori-pori. Folikel-folikel rambut juga ikut terperangkap, sehingga disebut juga dengan komedo tertutup.', 'a.	Kompres air hangat, air hangat memiliki fungsi untuk membuka pori-pori kulit sehingga kotoran yang menumpuk pada kulit akan keluar dengan sendirinya.\r\nb.	Gunakan sabun pembersih wajah atau salep yang mengandung benzoyl peroxide. Benzoyl peroxide berfungsi mengontrol kadar minyak berlebih di dalam pori-pori. \r\nc.	Lakukan chemical peeling. Ini adalah metode perawatan kulit dengan menggunakan bahan kimia. Perawatan ini akan mengelupas lapisan teratas kulit anda sehingga berganti dengan lapisan kulit yang lebih baru dan halus.\r\nd.	Ekstraksi komedo. Metode ini bertujuan mengangkat komedo putih dengan cara mencabutnya dengan bantuan alat khusus dari dokter kulit.', NULL, NULL, '6af5e64c84c5c158c9abbaf85635cd13.jpg'),
(10, 'Papula', 'Jerawat papula adalah jerawat yang menonjol, teraba padat dan nyeri, tampak kemerahan, serta tidak mengandung nanah. Jerawat papula bukanlah kondisi yang serius.', 'a.	Menggunakan saleb jerawat yang mengandung benzoil peroksida.\r\nb.	Hindari kebiasaan memencet jerawat, kebiasaan ini justru dapat membuat jerawat semakin meradang.\r\nc.	Bersihkan wajah secara rutin dengan pruduk yang tepat agar wajah terbebas dari bakteri, kotoran, dan minyak.\r\nd.	Gunakan pelembap dan tabir surya untuk kelembapan kulit agar kulit tetap terhidrasi dan tidak kering.', NULL, NULL, '7763cfebfbcf838ef1d0b9d14f29e4d3.jpg'),
(11, 'Putsula', 'Jerawat pustula adalah jenis jerawat berupa tonjolan berisi nanah dan terasa nyeri saat disentuh. Jerawat pustula dikenal pula dengan jerawat nanah.', 'a.	Menggunakan saleb jerawat yang mengandung benzoil peroksida.\r\nb.	Tidak memencet jerawat, memencet jerawat justru membuat nanah masuk lebih dalam ke pori-pori kulit di sekitarnya, sehingga membuat jerawat semakin meradang, membesar, hingga menimbulkan bekas jerawat.\r\nc.	Rutin membersihkan wajah. Anda dianjurkan untuk membersihkan wajah dua kali sehari secara rutin, dengan sabun pembersih wajah yang tidak mengandung alkohol agar terhindar dari iritasi.\r\nd.	Gunakan pelembap dan tabir surya untuk kelembapan kulit agar kulit tetap terhidrasi dan tidak kering.\r\ne.	Jalani pola hidup. Anda dianjurkan untuk menjalani pola hidup sehat dengan konsumsi makanan sehat untuk kulit, perbanyak konsumsi air putih, menghindari asap rokok, dan mengelola stres dengan baik.\r\nf.	Berolahraga, Olahraga bisa membantu melancarkan peredaran darah. Jika peredaran darah, maka penyuplaian oksigen dan nutrisi ke dalam kulit lebih lancar.', NULL, NULL, '0db5f129b7e6ed13c87161b3592915ae.jpeg'),
(12, 'Nodul', 'Jerawat nodul adalah jenis jerawat yang muncul di bawah permukaan kulit, berukuran besar, disertai peradangan dan menimbulkan rasa nyeri.', 'a.	Menggunakan saleb jerawat yang mengandung benzoil peroksida.\r\nb.	Tidak memencet jerawat, memencet jerawat justru membuat nanah masuk lebih dalam ke pori-pori kulit di sekitarnya, sehingga membuat jerawat semakin meradang, membesar, hingga menimbulkan bekas jerawat.\r\nc.	Rutin membersihkan wajah. Anda dianjurkan untuk membersihkan wajah dua kali sehari secara rutin, dengan sabun pembersih wajah yang tidak mengandung alkohol agar terhindar dari iritasi.\r\nd.	Gunakan pelembap dan tabir surya untuk kelembapan kulit agar kulit tetap terhidrasi dan tidak kering.\r\ne.	Jalani pola hidup. Anda dianjurkan untuk menjalani pola hidup sehat dengan konsumsi makanan sehat untuk kulit, perbanyak konsumsi air putih, menghindari asap rokok, dan mengelola stres dengan baik.\r\nf.	Berolahraga, Olahraga bisa membantu melancarkan peredaran darah. Jika peredaran darah, maka penyuplaian oksigen dan nutrisi ke dalam kulit lebih lancar.', NULL, NULL, '291e738fe1a8d3f2ded15391849dcd4d.jpg'),
(13, 'Kista', 'Jerawat kista merupakan jerawat yang terbentuk dari penumpukan minyak dan sel kulit mati pada jaringan kulit yang paling dalam. penumpukan ini akan menyebabkan peradangan yang membuat benjolan besar muncul di wajah.', 'a.	Jangan memegang atau bahkan memencet jerawat. Semakin sering kamu pegang atau pencet, semakin bertambah parah infeksi atau pembengkakan jerawat.\r\nb.	Jaga area benjolan agar tetap bersih dengan mencuci kulit sekitar menggunakan sabun antibakteri.\r\nc.	Kompres benjolan dengan kain/handuk yang dicelupkan ke air hangat selama 20-30 menit 3-4 kali sehari.\r\nd.	Hindari paparan sinar matahari dan pengguanaan kosmetik bebas minyak yang berlebihan.', NULL, NULL, 'e75e0ff1beca4356c6bcaef16b8ef8c1.jpg'),
(14, 'Conglobata', 'Jerawat jenis ini merupakan bentuk jerawat yang parah dan melibatkan banyak nodul yang meradang. Benjolan pada jenis jerawat ini ini saling terhubung dengan benjolan lainnya di bawah permukaan kulit.', 'Produk obat-obatan yang dijual bebas tidak akan cukup mengatasi jerawat conglobata. Itu sebabnya penting untuk segera konsultasikan dengan dokter kulit.', NULL, NULL, '2a352a38660bddde810abd5c0bca8b63.jpg'),
(15, 'Fluminans', 'Jenis jerawat ini muncul secara mendadak dan tersebar di seluruh tubuh. Jerawat meradang ini muncul disertai gejala lain seperti demam, nyeri otot, lemas, terdapat luka atau jerawat yang mudah pecah terutama di bagian tubuh atas dan wajah.', 'Jerawat ini merupakan jenis jerawat terparah untuk saat ini. Segera konsultasikan kepada dokter, agar segera di tangani oleh dokter spesialis.', NULL, NULL, '6f14762a0f67767d145144a67549dd78.jpg');

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
  ADD PRIMARY KEY (`id_kondisi`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_basis_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Ketidakleluasaan untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD CONSTRAINT `tb_kondisi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD CONSTRAINT `tb_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
