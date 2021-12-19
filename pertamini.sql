-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2021 pada 09.12
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamini`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal1` date NOT NULL,
  `tanggal2` date NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `validasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_karyawan`, `tanggal1`, `tanggal2`, `id_jenis`, `validasi`) VALUES
(1, 99, '2021-12-12', '2021-12-14', 2, 1),
(2, 99, '2021-12-23', '2021-12-11', 3, 1),
(3, 99, '2021-12-07', '2021-12-17', 1, 1),
(4, 99, '2021-12-23', '2021-12-24', 2, 0),
(5, 99, '2021-12-22', '2021-12-24', 1, 0),
(6, 99, '2021-12-20', '2021-12-19', 1, 0),
(7, 99, '2021-12-25', '2021-12-25', 1, 0),
(10, 99, '2021-12-19', '2021-12-20', 1, 0),
(11, 100, '2021-12-21', '2021-12-22', 3, 2),
(12, 99, '2021-12-23', '2021-12-25', 1, 0),
(17, 99, '2021-12-29', '2021-12-31', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti_jenis`
--

CREATE TABLE `cuti_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti_jenis`
--

INSERT INTO `cuti_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Tahunan'),
(2, 'Melahirkan'),
(3, 'Menikah'),
(4, 'Keagamaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti_valid`
--

CREATE TABLE `cuti_valid` (
  `validasi` tinyint(1) NOT NULL,
  `pernyataan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti_valid`
--

INSERT INTO `cuti_valid` (`validasi`, `pernyataan`) VALUES
(0, 'Ditolak'),
(1, 'Disetujui'),
(2, 'Belum disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_presensi` varchar(25) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_presensi`, `isi`) VALUES
(1, '99-2021-12-19', 'Melanjutkan projek kemaren'),
(2, '100-2021-12-19', 'Membuat data laporan bulanan, bulan Juli'),
(3, '100-2021-12-19', 'Mengisi galon kosong'),
(4, '105-2021-12-19', '8 Jam nggak ngapa-ngapain'),
(5, '99-2021-12-19', 'nggak mgapa-ngapain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sex` int(2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `salary` int(20) NOT NULL,
  `id_devisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `sex`, `address`, `place`, `date`, `id_jabatan`, `salary`, `id_devisi`) VALUES
(1, 'Hafid Surya Pradana', 1, 'Jl. Lentera 44 Kab. Mentawai', 'Jakarta', '1997-06-24', 4, 5000000, '4'),
(99, 'Ferdyan Aryo Noviyanto', 1, 'Jl Nangka Surakarta', 'Klaten', '2021-12-03', 2, 2300000, '4'),
(100, 'Adit Rahman Saleh', 1, 'Rengasdengklok', 'Solo', '2000-12-14', 1, 9250000, '4'),
(101, 'Konto Legowo', 1, 'Jl. Kenangan Mantan 44', 'Jakarta', '1995-02-04', 4, 5000000, '2'),
(102, 'Dita Kerang', 0, 'Jl. Koral No.1', 'Jakarta', '2001-07-04', 4, 5000000, '3'),
(103, 'Andik Fermansyah', 1, 'Jl. Kenangan Mantan 44', 'Jakarta', '1994-02-02', 1, 5000000, '4'),
(104, 'Amanda Manganopo', 0, 'Jl. Kabuto No 212, Jakarta Barat', 'Jakarta', '1994-08-23', 2, 5000000, '6'),
(105, 'Ahmad Sobari', 1, 'Jl. Kenangan Mantan 44', 'Jakarta', '1977-12-03', 4, 12000000, '4'),
(106, 'Zulfikli Sukur', 1, 'Jl. Kenangan Mantan 44', 'Jakarta', '1988-11-04', 1, 2010000, '7'),
(107, 'Rita Sugiyarti', 0, 'Jl. Kenangan Mantan 44', 'Jakarta', '1970-09-12', 4, 12000000, '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_devisi`
--

CREATE TABLE `karyawan_devisi` (
  `id_devisi` varchar(11) NOT NULL,
  `devisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan_devisi`
--

INSERT INTO `karyawan_devisi` (`id_devisi`, `devisi`) VALUES
('1', 'Accounting'),
('2', 'Finance'),
('3', 'Human Research Departement'),
('4', 'Information Technology'),
('5', 'Marketing'),
('6', 'Purchasing'),
('7', 'Produksi'),
('8', 'Utility');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_jabatan`
--

CREATE TABLE `karyawan_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tunjangan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan_jabatan`
--

INSERT INTO `karyawan_jabatan` (`id_jabatan`, `jabatan`, `tunjangan`) VALUES
(1, 'Operator', 200000),
(2, 'Supervisor', 500000),
(3, 'Manager', 2000000),
(4, 'Vice', 3500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` char(25) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_karyawan`, `tanggal`, `waktu_masuk`, `waktu_keluar`) VALUES
('100-2021-12-17', 100, '2021-12-17', '17:07:00', '17:07:09'),
('100-2021-12-19', 100, '2021-12-19', '10:13:02', '10:13:04'),
('101-2021-12-19', 101, '2021-12-19', '13:16:49', '13:16:51'),
('102-2021-12-19', 102, '2021-12-19', '15:01:48', '15:01:51'),
('103-2021-12-14', 103, '2021-12-14', '08:00:00', '17:00:00'),
('103-2021-12-15', 103, '2021-12-15', '08:00:00', '17:00:00'),
('103-2021-12-16', 103, '2021-12-16', '08:00:00', '17:00:00'),
('103-2021-12-17', 103, '2021-12-17', '08:00:00', '17:00:00'),
('104-2021-12-19', 104, '2021-12-19', '08:00:00', '17:00:00'),
('105-2021-12-13', 105, '2021-12-13', '08:00:00', '17:00:00'),
('105-2021-12-19', 105, '2021-12-19', '13:15:23', '13:15:25'),
('99-2021-12-17', 99, '2021-12-17', '15:44:54', '16:51:32'),
('99-2021-12-18', 99, '2021-12-18', '22:00:14', '22:00:17'),
('99-2021-12-19', 99, '2021-12-19', '09:19:56', '09:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
(29, 2, 2),
(30, 1, 2),
(31, 1, 10),
(33, 1, 14),
(34, 1, 16),
(35, 1, 17),
(36, 1, 18),
(39, 0, 3),
(40, 0, 9),
(41, 0, 10),
(51, 0, 1),
(52, 0, 15),
(54, 1, 12),
(55, 1, 11),
(56, 1, 13),
(57, 1, 19),
(58, 1, 20),
(60, 3, 14),
(61, 3, 13),
(62, 3, 12),
(63, 3, 19),
(64, 1, 15),
(65, 4, 10),
(66, 4, 11),
(67, 4, 12),
(68, 4, 13),
(69, 4, 14),
(70, 4, 15),
(71, 4, 16),
(72, 4, 17),
(73, 4, 19),
(78, 4, 24),
(79, 1, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Menu Management', 'kelolamenu', 'fa', 20, 'y'),
(2, 'User Management', 'user', 'fa', 20, 'y'),
(3, 'User Level', 'userlevel', 'fa', 20, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'DAFTAR KARYAWAN', 'karyawan', 'fa fa-book-open', 15, 'y'),
(11, 'Cuti', 'cuti', 'fa', 19, 'y'),
(12, 'Presensi', 'presensi', 'fa fa-fingerprint', 19, 'y'),
(13, 'Jurnal harian', 'jurnal', 'fa fa-boo', 19, 'y'),
(14, 'Gaji', 'gaji', 'fa', 15, 'y'),
(15, 'HRD', 'hrd', 'fa fa-users', 0, 'y'),
(16, 'Infografis', 'infografis', 'fa fa-chart', 15, 'y'),
(17, 'Daftar Cuti', 'cuti_hrd', 'fa', 15, 'y'),
(19, 'USER', 'presensi', 'fa fa-user', 0, 'y'),
(20, 'ADMIN', 'menu', 'fa fa-server', 0, 'y'),
(21, 'lain-lain', 'lain', 'fa', 20, 'y'),
(22, 'DEVISI', 'devisi', 'fa', 20, 'y'),
(24, 'Daftar presensi', 'Presensi_hrd', 'fa', 15, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'hafid', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'IMG_5474.jpg', 1, 'y'),
(99, 'ferdyan', 'aryoferdyan@gmail.com', '$2y$04$9RQ6ktJdmvcHI2ppQSZRoe5vN7zH2SY6IZ8y3amHywF93YQrO4yr2', 'atomix_user31.png', 1, 'y'),
(100, 'adit', 'adit@pertamini.com', '$2y$04$YjlpJsVCxVc0yNuADszPVOlie80axMoDeCRikG.uZOsZNaMSi2DYi', 'atomix_user31.png', 4, 'y'),
(101, 'lgw', 'legowo@pertamini.com', '$2y$04$bedcXFujzIvoDKJ7l1B61e9NtQKavlzVv0j0lgIcssvtJ2IloaXn2', 'atomix_user31.png', 3, 'y'),
(102, 'ditaa', 'dita@pertamini.com', '$2y$04$WZexHA4JYLeRn232K6vcCeL118FybTuPYiMyS8WN6P5WL059MA.4e', 'atomix_user31.png', 3, 'y'),
(103, 'andik', 'andik@pertamini.com', '$2y$04$At9/XTFi/ZD6A1zCR0zPTelrFvW6WbbC4TRusla88/7frQK0mxwG6', 'atomix_user31.png', 3, 'y'),
(104, 'amanda', 'amandamanganopo@pertamini.com', '$2y$04$1vCL8lmTvsifpuyj/pS0j.U7HZjjFfHsuvBPmsIzbd3ID70Vu6aqi', 'atomix_user31.png', 3, 'y'),
(105, 'ahmad', 'ahmadsobari@pertamini.com', '$2y$04$TbLfx0UpAczfKdOMBbH.V.IkioRxIO8DeIz6DZkbtgezEozj2bkpm', 'atomix_user31.png', 3, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'User'),
(4, 'HRD');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `cuti_jenis`
--
ALTER TABLE `cuti_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `cuti_valid`
--
ALTER TABLE `cuti_valid`
  ADD PRIMARY KEY (`validasi`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `karyawan_devisi`
--
ALTER TABLE `karyawan_devisi`
  ADD PRIMARY KEY (`id_devisi`);

--
-- Indeks untuk tabel `karyawan_jabatan`
--
ALTER TABLE `karyawan_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `cuti_jenis`
--
ALTER TABLE `cuti_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `karyawan_jabatan`
--
ALTER TABLE `karyawan_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
