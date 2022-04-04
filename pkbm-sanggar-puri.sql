-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2022 pada 10.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkbm-sanggar-puri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_info` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `cover` text NOT NULL,
  `isi` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_info`, `judul`, `cover`, `isi`, `date`) VALUES
('785693102402', 'Informasi Ujian', 'Informasi Ujian.jpg', 'oke sip', '2021-11-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` varchar(50) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `mapel` text NOT NULL,
  `judul` text NOT NULL,
  `hal` int(11) NOT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `id_paket`, `mapel`, `judul`, `hal`, `pdf`) VALUES
('EM001', 1, 'Bahasa Indonesia', 'ayo', 18, 'ANALISIS COST VOLUME PROFIT SEBAGAI DASAR PERENCANAAN LABA YANG DIHARAPKAN (1).pptx'),
('EM002', 1, 'IPA', 'yuk belajar', 12, 'Data Mining P9.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(20) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `biaya_pembelajaran` int(11) NOT NULL,
  `biaya_legalisir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `biaya_pembelajaran`, `biaya_legalisir`) VALUES
(1, 'Paket A (Setara SD)', 2000000, 100000),
(2, 'Paket B (Setara SMP)', 2500000, 100000),
(3, 'Paket C (Setara SMA IPA)', 2500000, 100000),
(4, 'Paket C (Setara SMA IPS)', 2500000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `th_ujian` year(4) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_akta` varchar(50) NOT NULL,
  `kebutuhan_khusus` varchar(50) NOT NULL,
  `agama` text NOT NULL,
  `jalan` text NOT NULL,
  `rt` varchar(11) NOT NULL,
  `rw` varchar(11) NOT NULL,
  `dusun` text NOT NULL,
  `kecamatan` text NOT NULL,
  `desa` text NOT NULL,
  `kd_pos` varchar(11) NOT NULL,
  `lintang` varchar(50) NOT NULL,
  `bujur` varchar(50) NOT NULL,
  `tempat_tinggal` text NOT NULL,
  `tb` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `jarak` text NOT NULL,
  `waktu_jam` int(11) NOT NULL,
  `waktu_menit` int(11) NOT NULL,
  `transportasi` text NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `kps_pkh` varchar(11) NOT NULL,
  `kip` varchar(11) NOT NULL,
  `pip` varchar(11) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `tahun_lahir_ayah` year(4) NOT NULL,
  `pendidikan_ayah` text NOT NULL,
  `pekerjaan_ayah` text NOT NULL,
  `penghasilan_ayah` text NOT NULL,
  `kebutuhan_khusus_ayah` varchar(20) NOT NULL,
  `nama_ibu` text NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `tahun_lahir_ibu` year(4) NOT NULL,
  `pendidikan_ibu` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `penghasilan_ibu` text NOT NULL,
  `kebutuhan_khusus_ibu` varchar(11) NOT NULL,
  `wali` varchar(11) NOT NULL,
  `nama_wali` text NOT NULL,
  `nik_wali` varchar(50) NOT NULL,
  `tahun_lahir_wali` year(4) NOT NULL,
  `pendidikan_wali` text NOT NULL,
  `pekerjaan_wali` text NOT NULL,
  `penghasilan_wali` text NOT NULL,
  `kebutuhan_khusus_wali` varchar(50) NOT NULL,
  `telp_rumah` varchar(20) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tgl_input` date NOT NULL,
  `daftar_ulang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `id_paket`, `th_ujian`, `nisn`, `nis`, `kewarganegaraan`, `nik`, `no_kk`, `tempat_lahir`, `tgl_lahir`, `no_akta`, `kebutuhan_khusus`, `agama`, `jalan`, `rt`, `rw`, `dusun`, `kecamatan`, `desa`, `kd_pos`, `lintang`, `bujur`, `tempat_tinggal`, `tb`, `bb`, `jarak`, `waktu_jam`, `waktu_menit`, `transportasi`, `anak_ke`, `jml_saudara`, `kps_pkh`, `kip`, `pip`, `nama_ayah`, `nik_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `kebutuhan_khusus_ayah`, `nama_ibu`, `nik_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `kebutuhan_khusus_ibu`, `wali`, `nama_wali`, `nik_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `kebutuhan_khusus_wali`, `telp_rumah`, `tahun_masuk`, `tgl_input`, `daftar_ulang`) VALUES
(5, 'PDA2020001', 1, 2020, '', '10291919', 'KRW', '', '', 'Jakarta', '2001-07-14', '', '', 'Islam', 'Tridaya 4 Jl. Delima', '', '', '', 'Tambun Selatan', 'Tridaya Sakti', '', '', '', 'Bersama Orang Tua', 170, 60, '30', 1, 0, 'Kereta Api', 2, 1, '', '', '', 'ayah', '', 0000, '', 'karyawan', '', '', 'Ibu', '', 0000, 'S1', 'irt', '5.000.000', '', '', '', '', 0000, '', '', '', '', '', 2020, '2020-07-14', 2),
(6, 'PDA2021007', 1, 2022, '0000000000000000', '902302023', 'ID', '0000000000000000000000', '0000000000000000000', 'Jakarta', '2000-10-05', '00000000000000000000000000000', 'Tidak', 'Kristen', 'Jl. Anggur No 2', '04', '12', '', 'Tambun Selatan', 'Mangun Jaya', '17510', '', '', 'Bersama Orang Tua', 165, 50, '5', 0, 15, 'Sepeda', 2, 3, 'Tidak', 'Tidak', '', 'bin pulan', '00000', 0000, 'SMA', 'Maling', 'tergantung', 'Tidak', 'Na Ae Gyo', 'kosong', 2000, 'S1', 'Wirausaha', 'Rp5.000.000 - Rp20.000.000', 'Tidak', 'Tidak', '', '', 0000, '', '', '', '', '0000', 2021, '2021-10-05', 2),
(7, 'PDA2021008', 1, 2021, '000129201019', '8376832993', 'ID', '', '', 'Jakarta', '2001-10-20', '', '', 'Islam', 'Jl. Delima No 1', '', '', '', 'Tambun Selatan', 'Mangun Jaya', '', '', '', 'Bersama Orang Tua', 170, 60, '2', 0, 5, 'Sepeda Motor', 1, 1, 'Ya', 'Ya', 'Tidak', '', '', 0000, '', '', '', '', 'Na Ae Gyo', '', 0000, 'S1', 'Wirausaha', '5000000', '', '', '', '', 0000, '', '', '', '', '', 2021, '2021-10-05', 1),
(9, 'PDB2021010', 2, 2022, '', '', 'ID', '', '', 'Seoul', '2003-10-25', '', '', 'Islam', 'Jl. Mawar 10', '', '', '', 'Cibitung', 'Mangun Jaya', '', '', '', 'Bersama Orang Tua', 160, 50, '5', 0, 0, 'Angkutan umum/bus/pete-pete', 1, 0, '', '', '', '', '', 0000, '', '', '', '', 'Oh Yeon Hee', '', 0000, 'SMA', 'Wirausaha', '5.000.000', '', '', '', '', 0000, '', '', '', '', '', 2021, '2021-10-25', 2),
(10, 'PDCA2021011', 3, 2022, '', '', 'ID', '', '', 'Jakarta', '2000-09-21', '', '', 'Islam', 'Jl. Anggur No 2', '01', '', '', 'Tambun Selatan', 'Mangun Jaya', '', '', '', 'Bersama Orang Tua', 170, 60, '2', 0, 0, 'Sepeda Motor', 2, 1, '', '', '', '', '', 0000, '', '', '', '', 'ibu', '', 0000, 'S1', 'Wirausaha', '5.000.000', '', '', '', '', 0000, '', '', '', '', '', 2021, '2021-10-25', 2),
(15, 'PDB2021014', 2, 2022, '', '', 'ID', '', '', 'Seoul', '2002-10-20', '', '', 'Islam', 'Jl. Delima No 1', '', '', '', 'Tambun Selatan', 'Mangun Jaya', '', '', '', 'Bersama Orang Tua', 165, 50, '5', 0, 0, 'Mobil/bus antar jemput', 1, 1, '', '', '', '', '', 0000, '', '', '', '', 'Oh Yeon Hee', '', 0000, 'SMA', 'Wirausaha', '5000000', '', '', '', '', 0000, '', '', '', '', '', 2021, '2021-11-01', 2),
(22, 'PD2021018', 1, 2022, '', '', 'ID', '', '', 'Australia', '2001-07-10', '', '', 'Islam', 'Anggrek', '', '', '', 'Cibitung', 'Cibitung', '', '', '', 'Bersama Orang Tua', 0, 0, '1', 0, 0, 'Jalan Kaki', 0, 0, '', '', '', '', '', 0000, '', '', '', '', 'Ibu', '', 0000, 'SMA', 'Ibu Rumah Tangga', 'Rp2.000.000 - Rp4.999.999', '', '', '', '', 0000, '', '', '', '', '', 2021, '2021-11-15', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `status` int(11) NOT NULL,
  `token_ganti_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `jk`, `no_hp`, `level`, `foto`, `status`, `token_ganti_password`) VALUES
('ADM001', 'admin1', '$2y$10$UoZfrMd.D5Yy/GEdQm/Wdu3fXPBbbdWGn2G32VTWWonhbE60a84nu', 'Adella', 'Laki-Laki', '081323476512', 'admin', 'Andika Prasetyo.jpg', 2, ''),
('PD2021018', 'sammy@gmail.com', '$2y$10$ZOjf9qBaQtnjLaVtExxTauqXf7ffw7I0whWC2sslRnBy9Yse4m1Z6', 'Sammy', 'L', '081298374829', 'siswa', 'Sammy.jpg', 2, ''),
('PDA2020001', 'adellapr77@gmail.com', '$2y$10$ozu2ruppt5/H7WlNR2fctutg1yzLFnRmNE.ojC3jIYm6p7iXi.xXK', 'Adella Putri Riani', 'P', '08962381721', 'siswa', 'Adella Putri Riani.jpg', 2, ''),
('PDA2021007', 'andika@gmail.com', '$2y$10$XH3zG2nXnYppNGKOvC7Kb./OEoDwAOn0PDNvDy7OKZcCR7tdG5lj6', 'Andika Prasetyo', 'P', '08128437432', 'siswa', '', 2, ''),
('PDA2021008', 'seokhon@gmail.com', '$2y$10$XW75vDfvyq8Mt.haiJar3eINFOb89gvrS1w7HO11.0EIk2gqp45fm', 'Joo Seok Hon', 'L', '08962381721', 'siswa', '', 2, ''),
('PDB2021010', 'baerona@gmail.com', '$2y$10$ESr5uSLAANCDWzW0d4jBuOTxp1T2BPUx17bZm7d9psvWIvaiKer9C', 'Bae Ro Na', 'P', '08979182736', 'siswa', '', 2, ''),
('PDB2021014', 'prawira@gmail.com', '$2y$10$mzMLpo/P8noBL0taZXV/7e/adXrHu3xzvCM6fWOdSTmJu3UOPK7Dm', 'Ardhana Budi Prawiranegara', 'L', '', '', '', 2, ''),
('PDCA2021011', 'ardhana@gmail.com', '$2y$10$OuFSoTokjtvUukpjeug6POLIfBhfkYXe9JToF1ltSz9bxo2YvIELu', 'Ardhana Budi Prawiranegara', 'L', '08979182736', 'siswa', '', 2, ''),
('TPD001', 'pkbmtendik1', '$2y$10$Jj9EIianNIG94n4NbiswXeoLQHc02laJt4C6gs2MCUFXaA5OY7RyG', 'Adella', 'Perempuan', '08962381721', 'tendik', 'Adella.jpg', 2, ''),
('TPD002', 'pkbmtendik2', '$2y$10$Ra6PSBxH2G5FTMehD4vwheHZOFGgTVR8nXd516cNVnGGeKxu8Rdr.', 'Ilham', 'Laki-Laki', '08128437432', 'tendik', '', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
