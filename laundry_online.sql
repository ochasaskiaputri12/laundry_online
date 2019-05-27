-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2017 pada 06.20
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

CREATE DATABASE laundry_online;

USE laundry_online;
-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `tanggal_update_stok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `stok`, `tanggal_update_stok`) VALUES
(1, 'B0001', 'jeans', '20', '2017-11-05'),
(2, 'B0002', 'Baju putih', '4', '2017-11-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laundry`
--

CREATE TABLE `jenis_laundry` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_laundry`
--

INSERT INTO `jenis_laundry` (`id`, `kode`, `nama`) VALUES
(1, 'JL0001', 'Cuci-kering'),
(2, 'JL0002', 'cuci - kering- setrika'),
(3, 'JL0003', 'Setrika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `telp`, `gender`) VALUES
(1, 'KR0001', 'Dea Amalia Putri ', 'kepanjen ', '085945443', 'P'),
(2, 'KR0002', 'Achmad Bima Sakti Nugroho', 'Kromengan ', '08675444', 'L'),
(3, 'KR0003', 'Nuzud Nur Jamilah', 'PanggungRejo', '0586696', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `kode`, `nama`, `alamat`) VALUES
(1, 'K0001', 'Arifasiwi Milanda Putri', 'Cokolio Kepanjen'),
(2, 'K0002', 'Khamilatul Zahro ', 'Kedungpedaringan'),
(3, 'K0003', 'Lailatul Fitriyah', 'Bululawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `karyawan_id`) VALUES
(1, 'dea', '96991368fec63c8a1bfc48a70010f84a', 'user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_barang`
--

CREATE TABLE `pemakaian_barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian_barang`
--

INSERT INTO `pemakaian_barang` (`id`, `kode`, `jumlah`, `barang_id`, `karyawan_id`) VALUES
(6, 'PB0001', '3', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total` varchar(20) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nomer`, `tanggal`, `total`, `karyawan_id`, `supplier_id`) VALUES
(3, 'NO0001', '2017-11-04', '300.000', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian`
--

CREATE TABLE `rincian` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL,
  `tarif_nama` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jenis_laundry_id` int(11) NOT NULL,
  `jenis_laundry_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian`
--

INSERT INTO `rincian` (`id`, `jumlah`, `tarif_id`, `tarif_nama`, `tarif`, `jenis_laundry_id`, `jenis_laundry_nama`) VALUES
(1, 1, 1, '', 0, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `id` int(11) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`id`, `nomer`, `jumlah`, `barang_id`, `pembelian_id`) VALUES
(1, 'N0004', '200000', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_transaksi`
--

CREATE TABLE `rincian_transaksi` (
  `id` int(11) NOT NULL,
  `karyawan_id` varchar(50) NOT NULL,
  `konsumen_id` varchar(50) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `jenis_laundry_id` varchar(20) NOT NULL,
  `tarif_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian_transaksi`
--

INSERT INTO `rincian_transaksi` (`id`, `karyawan_id`, `konsumen_id`, `jumlah`, `transaksi_id`, `barang_id`, `jenis_laundry_id`, `tarif_id`) VALUES
(2, '1', '3', '9', 1, '3', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Chayang Phygiken Master Andika', 'Talangagung', '08988787'),
(2, 'Fany Faiturrohman', 'Kedungpedaringan', '0898799'),
(3, 'salsa sandra', 'Pagak', '08999799'),
(4, 'cintya', 'mergosingo', '068999000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jenis_laundry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `nama`, `harga`, `jenis_laundry_id`) VALUES
(1, 'jeans', '2000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nomer` varchar(30) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `diskon` varchar(30) NOT NULL,
  `konsumen_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nomer`, `tanggal_transaksi`, `tanggal_ambil`, `diskon`, `konsumen_id`, `karyawan_id`) VALUES
(1, '1', '2017-11-03', '2017-11-05', '50%', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `barang_id` (`barang_id`,`karyawan_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`,`supplier_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`,`pembelian_id`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`,`tarif_id`),
  ADD KEY `tarif_id` (`tarif_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_laundry_id` (`jenis_laundry_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
