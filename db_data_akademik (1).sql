-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2023 pada 11.23
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dosen`
--

CREATE TABLE `data_dosen` (
  `nidn` int(11) NOT NULL,
  `nama_dsn` varchar(75) NOT NULL,
  `gender` int(11) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dosen`
--

INSERT INTO `data_dosen` (`nidn`, `nama_dsn`, `gender`, `alamat`, `no_hp`, `email`) VALUES
(2183932, 'Joseph', 1, 'Jln. Raya Kemang No.12', '087861623432', 'jo12joseph@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `kode_jurusan` varchar(3) NOT NULL,
  `nama_jurusan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jurusan`
--

INSERT INTO `data_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('j02', 'Teknologi Informasio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` int(9) NOT NULL,
  `nama_mhs` varchar(40) NOT NULL,
  `kode_jurusan` char(3) NOT NULL,
  `gender` int(11) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `nama_mhs`, `kode_jurusan`, `gender`, `alamat`, `no_hp`, `email`, `password`) VALUES
(200030421, 'Selamet Junaedi', 'J01', 1, 'Jln. Gajah Mada', '081245678910', 'slametbukanwaffer@gmail.com', ''),
(200030456, 'Milani Pramesti', 'J03', 0, 'Jln. Raya Mawar Melati', '08521876349', 'milaniprmst@gmail.com', ''),
(210030455, 'Putri Karmila', 'J02', 0, 'Jln. Raya Seoul', '088423543654', 'karmilaqueen@gmail.com', ''),
(210030474, 'Marcellio ', 'J03', 1, 'Jln. Raya Kemang', '0878424356788', 'marc88@gmail.com', ''),
(220030066, 'Juan Marcellio', 'J01', 1, 'Jln. Raya Kemang No.12', '08361762542', 'juanmarcellio@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_matkul`
--

CREATE TABLE `data_matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `waktu` time NOT NULL,
  `hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_matkul`
--

INSERT INTO `data_matkul` (`id_matkul`, `nama_matkul`, `nidn`, `waktu`, `hari`) VALUES
(2, '', '122738', '04:04:00', 'Kamis'),
(3, 'Pemrograman Web', '28129', '11:27:41', 'Senin'),
(4, '', '', '00:00:00', 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `email`, `nama`, `password`) VALUES
(6, 'haechan@gmail.com', 'haechan', '$2y$10$IrLdfhiRoEd5bpevWjVN1OvoEZZJXe9B8v87TpWkPMOP1kXoiNLZ.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `data_matkul`
--
ALTER TABLE `data_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_matkul`
--
ALTER TABLE `data_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
