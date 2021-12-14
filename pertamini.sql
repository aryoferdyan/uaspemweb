-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2021 pada 11.07
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `karyawan` ()  NO SQL
BEGIN

SELECT karyawan.nik AS "NIK", karyawan.nma AS "Nama", jabatan.nma AS "Jabatan", devisi.nma AS "Devisi",
        CASE karyawan.sex
        WHEN '0' THEN 'Perempuan'
        ELSE 'Laki-laki'
        END AS 'Gender'
FROM karyawan, jabatan, devisi
WHERE karyawan.jab = jabatan.jab AND karyawan.dev = devisi.dev
GROUP by karyawan.nik;

END$$

DELIMITER ;

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
  `status` tinyint(1) NOT NULL,
  `validasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_karyawan`, `tanggal1`, `tanggal2`, `id_jenis`, `status`, `validasi`) VALUES
(1, 99, '2021-12-12', '2021-12-14', 2, 1, 1);

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
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_presensi` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(103, 'Andik Fermansyah', 1, 'Jl. Kenangan Mantan 44', 'Jakarta', '1994-02-02', 1, 5000000, '4');

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
  `id_presensi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_keluar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_karyawan`, `tanggal`, `waktu_masuk`, `waktu_keluar`) VALUES
(4, 99, '2021-12-11 07:27:21', '2021-12-11 07:27:21', '2021-12-11 07:27:21'),
(6, 99, '2021-12-11 07:29:58', '2021-12-11 07:29:58', '2021-12-11 07:31:57');

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
(53, 1, 15),
(54, 1, 12),
(55, 1, 11),
(56, 1, 13),
(57, 1, 19),
(58, 1, 20),
(60, 3, 14),
(61, 3, 13),
(62, 3, 12),
(63, 3, 19);

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
(17, 'Daftar Cuti', 'hrdcuti', 'fa', 15, 'y'),
(19, 'USER', 'presensi', 'fa fa-user', 0, 'y'),
(20, 'ADMIN', 'menu', 'fa fa-server', 0, 'y');

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
  `is_aktif` enum('y','n') NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`, `id_karyawan`) VALUES
(1, 'Hafid Surya Pradana', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'IMG_5474.jpg', 1, 'y', 1),
(99, 'Ferdyan Aryo Noviyanto', 'aryoferdyan@gmail.com', '$2y$04$9RQ6ktJdmvcHI2ppQSZRoe5vN7zH2SY6IZ8y3amHywF93YQrO4yr2', 'atomix_user31.png', 1, 'y', 99),
(101, 'Konto Legowo', 'legowo@gmail.com', '$2y$04$9RQ6ktJdmvcHI2ppQSZRoe5vN7zH2SY6IZ8y3amHywF93YQrO4yr2', '', 3, 'y', 101),
(102, 'Adit Rahman Saleh', 'adit@pertamini.com', '$2y$04$HBXkJgTE3GlulMfYQHDF.eTJnmDSh3NyaPyH.ATi2HpPo40od1V5q', '', 3, 'y', 0);

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
(3, 'User');

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
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cuti_jenis`
--
ALTER TABLE `cuti_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `karyawan_jabatan`
--
ALTER TABLE `karyawan_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
