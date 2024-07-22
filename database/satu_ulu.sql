-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2024 pada 10.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satu_ulu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi`
--

CREATE TABLE `administrasi` (
  `id_administrasi` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `tanggapan` text NOT NULL,
  `file_reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `administrasi`
--

INSERT INTO `administrasi` (`id_administrasi`, `rw`, `rt`, `nik`, `keterangan`, `file_path`, `tanggapan`, `file_reply`) VALUES
(4, 0, 0, '1603071701040005', 'cepat', '6689c2520e8700.51902039.pdf', 'permohonan anda kami terima & diproses!', '668ad4b155bf38.78257176.jpg'),
(22, 1, 4, '1703080506040002', 'revisi materi struktur data', '66979d02e3a251.93925330.pdf', 'baik revisi diterima', '66979d6234ebe8.46723018.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `jumlah_warga` int(11) NOT NULL,
  `islam` int(11) NOT NULL,
  `katolik` int(11) NOT NULL,
  `protestan` int(11) NOT NULL,
  `hindu` int(11) NOT NULL,
  `budha` int(11) NOT NULL,
  `khonghucu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `rw`, `rt`, `jumlah_warga`, `islam`, `katolik`, `protestan`, `hindu`, `budha`, `khonghucu`) VALUES
(1, 6, 1, 70, 15, 11, 11, 11, 11, 11),
(2, 1, 4, 55, 32, 10, 8, 0, 0, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `rw` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `agama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Khonghucu') NOT NULL,
  `telp` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `alamat`, `rw`, `rt`, `agama`, `telp`, `email`, `password`, `role`) VALUES
(6, '1603070507240001', 'Admin', 'Palembang', '2004-09-28', 'Laki-Laki', 'Jakarta', '', '', 'Islam', '08932539007', 'admin@gmail.com', '19faa1d580716a6ddeba6dbcf5f5daca', 'Lurah'),
(7, '1603072608240002', 'Pak RT', 'Bandung', '2006-08-25', 'Laki-Laki', 'Jl. Mercu Buana', '1', '4', 'Islam', '082268728285', 'ketuart@gmail.com', 'd57a6297343a014d7f50569a873cefc8', 'RT'),
(9, '1603073112050005', 'Dalmunch', 'Singapore', '2024-06-05', 'Perempuan', 'Jl. Merdeka Selatan, Jakarta', '1', '4', 'Islam', '082260008000', 'dalmunch@gmail.com', '46e6274e8ed697c8bb6c5d2fdf616df0', 'Warga'),
(10, '1608091407240008', 'Max Verstappen', 'Hasselt, Belgia', '1997-09-30', 'Laki-laki', 'Palembang', '1', '4', 'Kristen Katolik', '1244444444', 'max.verstappen@gmail.com', '$2y$10$eBZgdyu.vhOtiRT0aguHc.EgciXR7V8EjMuorPbbDfKFIHMAeCC2a', 'Warga'),
(11, '1607082103040004', 'Donald Trump', 'Washington DC', '2004-03-21', 'Laki-laki', '1600 Pennsylvania Ave NW Washington, DC 20500', '2', '1', 'Kristen Katolik', '085779317279', 'donald.trump@gmail.com', '46e6274e8ed697c8bb6c5d2fdf616df0', 'Warga'),
(14, '1703080506040002', 'Raymond Chin', 'Jakarta', '2004-06-05', 'Laki-laki', 'jakarta', '1', '4', 'Kristen Katolik', '0856283805809', 'raymond@gmail.com', 'a50b656aa7449cb514b85f5fc6be5fcb', 'Warga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bansos`
--

CREATE TABLE `bansos` (
  `id_bansos` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `jenis_bantuan` varchar(255) NOT NULL,
  `pekerjaan_penerima` varchar(255) NOT NULL,
  `status_penerima` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bansos`
--

INSERT INTO `bansos` (`id_bansos`, `nama_penerima`, `alamat_penerima`, `jenis_bantuan`, `pekerjaan_penerima`, `status_penerima`) VALUES
(2, 'Eric', 'Jl. Soekarno Hatta No. 99 Siring Agung, Kec. Ilir Bar. I, Kota Palembang, Sumatera Selatan 30138', 'Subsidi Listrik', 'Buruh Harian', 'Keluarga Tidak Mampu'),
(3, 'Jhoni Quarto', 'Bali', 'Bantuan Sosial Tunai', 'Juru Parkir', 'Anak Yatim'),
(4, 'Herlyn', 'Jl. Ki Ranggo Wirosantiko 30 Ilir, Kec. Ilir Bar. II Kota Palembang, Kota Palembang, Sumatera Selatan 30128', 'Program Keluarga Harapan', 'Tidak Bekerja', 'Lansia'),
(6, 'Sari', 'Jl. Kolonel H. Barlian No.182, Suka Bangun, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30961', 'PBIN', 'Tidak Bekerja', 'Disabilitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `keterangan`, `file_path`) VALUES
(2, 'Formulir Biodata Keluarga', '6671d7f99fbad5.66620314.pdf'),
(4, 'Formulir Pelaporan Pencatatan Sipil Wilayah NKRI', '6671de4232b924.09777338.pdf'),
(5, 'Formulir Pelaporan Pencatatan Sipil Diluar Wilayah NKRI', '6671de5a65bb15.21338283.pdf'),
(6, 'Formulir Pendaftaran Peristiwa Kependudukan', '6671de7c8e6332.56563297.pdf'),
(7, 'Formulir Pendaftaran Perpindahan Penduduk', '6671de97ded094.38974493.pdf'),
(8, 'SPTJM Kebenaran Data Kelahiran', '6671deb74c7051.94349558.pdf'),
(9, 'SPTJM Kebenaran Sebagai Pasutri', '6671ded55a5021.32290051.pdf'),
(10, 'Surat Pernyataan Perubahan Data Elemen Kependudukan', '6671df05b38ca9.15875841.pdf'),
(11, 'Surat Pernyataan Tanggung Jawab Mutlak Perkawinan', '6671df24934f19.04751001.pdf'),
(12, 'Surat Pernyataan Tidak Memiliki Dokumen Kependudukan', '6671df4132f431.76930964.pdf'),
(14, 'tes formulir', '66965fd5250de0.10688606.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
--

CREATE TABLE `kk` (
  `id_kk` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `kk_lk` int(11) NOT NULL,
  `kk_pr` int(11) NOT NULL,
  `kk_mampu` int(11) NOT NULL,
  `kk_tdkMampu` int(11) NOT NULL,
  `kk_luar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`id_kk`, `rw`, `rt`, `jumlah_kk`, `kk_lk`, `kk_pr`, `kk_mampu`, `kk_tdkMampu`, `kk_luar`) VALUES
(1, 1, 3, 32, 17, 15, 25, 7, 10),
(2, 1, 4, 14, 11, 3, 11, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_rt`
--

CREATE TABLE `kontak_rt` (
  `id_kontak` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_rt` varchar(255) NOT NULL,
  `jabatan_rt` varchar(255) NOT NULL,
  `telp_rt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak_rt`
--

INSERT INTO `kontak_rt` (`id_kontak`, `foto`, `nama_rt`, `jabatan_rt`, `telp_rt`) VALUES
(8, 'team-1.jpg', 'Candera', 'Ketua RT 1', '082289452827'),
(9, 'team-3.jpg', 'Aji', 'Ketua RT 2', '082177869814'),
(10, 'testimonials-5.jpg', 'Satria', 'Ketua RT 3', '082278316526'),
(12, 'pas_foto.jpg', 'Eldi', 'Ketua RT 18', '085779317290');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `jumlah_warga` int(11) NOT NULL,
  `tdk_sekolah_lk` int(11) NOT NULL,
  `tdk_sekolah_pr` int(11) NOT NULL,
  `sd_lk` int(11) NOT NULL,
  `sd_pr` int(11) NOT NULL,
  `smp_lk` int(11) NOT NULL,
  `smp_pr` int(11) NOT NULL,
  `sma_lk` int(11) NOT NULL,
  `sma_pr` int(11) NOT NULL,
  `smk_lk` int(11) NOT NULL,
  `smk_pr` int(11) NOT NULL,
  `perguruan_tinggi_lk` int(11) NOT NULL,
  `perguruan_tinggi_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `rw`, `rt`, `jumlah_warga`, `tdk_sekolah_lk`, `tdk_sekolah_pr`, `sd_lk`, `sd_pr`, `smp_lk`, `smp_pr`, `sma_lk`, `sma_pr`, `smk_lk`, `smk_pr`, `perguruan_tinggi_lk`, `perguruan_tinggi_pr`) VALUES
(1, 1, 4, 80, 15, 15, 10, 0, 3, 10, 5, 5, 5, 5, 0, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `waktu_lapor` datetime NOT NULL,
  `status_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik`, `isi_pengaduan`, `waktu_lapor`, `status_pengaduan`) VALUES
(8, '1603071701040005', 'semangat!', '2024-07-07 00:43:47', 0),
(9, '1603071701040005', 'lapor hari ini hari ke-2 uas', '2024-07-16 17:57:45', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_tanggal` date NOT NULL,
  `isi_pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `pengumuman_tanggal`, `isi_pengumuman`) VALUES
(12, '2024-07-03', 'selamat pagi semua'),
(14, '2024-07-05', 'say haii'),
(15, '2024-07-16', 'besok kita uas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `jumlah_rumah` int(11) NOT NULL,
  `rumah_tinggal` int(11) NOT NULL,
  `rumah_usaha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `rw`, `rt`, `jumlah_rumah`, `rumah_tinggal`, `rumah_usaha`) VALUES
(1, 1, 1, 350, 200, 150),
(2, 1, 4, 150, 120, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usia`
--

CREATE TABLE `usia` (
  `id_usia` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `total_warga` int(11) NOT NULL,
  `balita_lk` int(11) NOT NULL,
  `balita_pr` int(11) NOT NULL,
  `ud_lk` int(11) NOT NULL,
  `ud_pr` int(11) NOT NULL,
  `remaja_lk` int(11) NOT NULL,
  `remaja_pr` int(11) NOT NULL,
  `dewasa_lk` int(11) NOT NULL,
  `dewasa_pr` int(11) NOT NULL,
  `lansia_lk` int(11) NOT NULL,
  `lansia_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usia`
--

INSERT INTO `usia` (`id_usia`, `rw`, `rt`, `total_warga`, `balita_lk`, `balita_pr`, `ud_lk`, `ud_pr`, `remaja_lk`, `remaja_pr`, `dewasa_lk`, `dewasa_pr`, `lansia_lk`, `lansia_pr`) VALUES
(1, 1, 4, 50, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(2, 5, 4, 20, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `jumlah_warga` int(11) NOT NULL,
  `pria` int(11) NOT NULL,
  `wanita` int(11) NOT NULL,
  `warga_tetap` int(11) NOT NULL,
  `warga_tdkTetap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `rw`, `rt`, `jumlah_warga`, `pria`, `wanita`, `warga_tetap`, `warga_tdkTetap`) VALUES
(1, 2, 1, 17, 12, 5, 16, 1),
(2, 1, 4, 23, 14, 9, 19, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_administrasi`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id_bansos`);

--
-- Indeks untuk tabel `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `kontak_rt`
--
ALTER TABLE `kontak_rt`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indeks untuk tabel `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indeks untuk tabel `usia`
--
ALTER TABLE `usia`
  ADD PRIMARY KEY (`id_usia`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_administrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id_bansos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kk`
--
ALTER TABLE `kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak_rt`
--
ALTER TABLE `kontak_rt`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `usia`
--
ALTER TABLE `usia`
  MODIFY `id_usia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
