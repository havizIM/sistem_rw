-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mei 2019 pada 21.12
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `NIK` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','Protestan','Katholik','Budha','Hindu','Lainnya') NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin','Janda','Duda') NOT NULL,
  `status_keluarga` enum('Kepala Keluarga','Istri','Anak','') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA','','') NOT NULL,
  `no_paspor` varchar(16) DEFAULT NULL,
  `no_kitap` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `no_kk` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`NIK`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `status_keluarga`, `kewarganegaraan`, `no_paspor`, `no_kitap`, `nama_ayah`, `nama_ibu`, `no_kk`) VALUES
('1231231231231231', 'yogi dwi aryadi', 'Laki-laki', 'jakarta', '1995-07-20', 'Islam', 'smk', 'karyawan', 'Kawin', 'Kepala Keluarga', 'WNI', '0', '0', 'ridwan', 'sri', '1234567890098765'),
('1234567890123456', 'Rafy', 'Laki-laki', 'Jakarta', '1996-08-18', 'Islam', 'SMA', 'Karyawan', 'Kawin', 'Kepala Keluarga', 'WNI', '0', '0', 'Komar', 'Siti', '1234567890987654'),
('1234567890123457', 'belia', 'Perempuan', 'tangerang', '1997-10-27', 'Islam', 'smk', 'ibu rumah tangga', 'Kawin', 'Istri', 'WNI', '0', '0', 'asep', 'rohanah', '1234567890098765'),
('1234567890654321', 'Farrisa', 'Perempuan', 'Jepara', '1998-09-15', 'Islam', 'SMK', 'Ibu Rumah Tangga', 'Kawin', 'Istri', 'WNI', '0', '0', 'Hanafi', 'Dewi', '1234567890987654'),
('1376098246871386', 'Dian Ratna Sari', 'Perempuan', 'Jakarta', '1995-11-27', 'Islam', 'SMK', 'Karyawan', 'Kawin', 'Istri', 'WNI', '0', '0', 'Sudji', 'Sri Jueni', '0987654321234566'),
('1378613753719571', 'Haviz Indra Maulana', 'Laki-laki', 'Jakarta', '1992-10-10', 'Islam', 'SMA', 'Karyawan', 'Kawin', 'Kepala Keluarga', 'WNI', '0', '0', 'Hanafi', 'Indrawati', '0987654321234566');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `no_dokumen` varchar(24) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no_pengajuan` varchar(13) NOT NULL,
  `diambil_oleh` varchar(50) NOT NULL,
  `tgl_pengambilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `tgl_kk` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kotamadya` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `rtrw` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `tgl_kk`, `alamat`, `kode_pos`, `provinsi`, `kotamadya`, `kecamatan`, `kelurahan`, `rtrw`) VALUES
('0987654321234566', '2019-05-20', 'Jl. Semeru 2 Raya No. 14f', '14440', 'DKI Jakarta', 'Jakarta Barat', 'Grogol Petamburan', 'Grogol', '006/010'),
('1234567890098765', '2019-05-08', 'jl.semeru raya no.48', '11450', 'DKI Jakarta', 'Jakarta Barat', 'Grogol Petamburan', 'Grogol', '006/010'),
('1234567890987654', '2019-05-17', 'jl.semeru raya no.24', '11450', 'DKI Jakarta', 'Jakarta Barat', 'Grogol Petamburan', 'Grogol', '006/010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelengkap`
--

CREATE TABLE `pelengkap` (
  `no_pengajuan` varchar(13) NOT NULL,
  `foto_dokumen` text NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `no_pengajuan` varchar(13) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `nama_pengajuan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA','','') NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Budha','Hindu','Lainnya') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `status_pengajuan` enum('Proses','Menunggu','Selesai','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `level` enum('Warga','RT','RW','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `password`, `no_kk`, `level`) VALUES
('haviz_im@outlook.com', 'haviz6142', '0987654321234566', 'Warga'),
('rafyagustian18@gmail.com', 'rafi123', '1234567890987654', 'RW'),
('yogidwiaryadi@gmail.com', 'yogi123', '1234567890098765', 'RT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`no_dokumen`),
  ADD KEY `no_pengajuan` (`no_pengajuan`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `pelengkap`
--
ALTER TABLE `pelengkap`
  ADD KEY `no_pengajuan` (`no_pengajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`no_pengajuan`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`no_pengajuan`) REFERENCES `pengajuan` (`no_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelengkap`
--
ALTER TABLE `pelengkap`
  ADD CONSTRAINT `pelengkap_ibfk_1` FOREIGN KEY (`no_pengajuan`) REFERENCES `pengajuan` (`no_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
