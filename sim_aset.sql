-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 14.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-asset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset`
--

CREATE TABLE `asset` (
  `id_asset` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_asset` varchar(20) NOT NULL,
  `merk` varchar(125) NOT NULL,
  `asal_usul` varchar(125) NOT NULL,
  `tgl_peroleh` varchar(15) NOT NULL,
  `harga_asset` varchar(15) NOT NULL,
  `gambar_asset` text NOT NULL,
  `jml_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asset`
--

INSERT INTO `asset` (`id_asset`, `id_lokasi`, `id_kategori`, `id_barang`, `id_user`, `kode_asset`, `merk`, `asal_usul`, `tgl_peroleh`, `harga_asset`, `gambar_asset`, `jml_asset`) VALUES
(1, 1, 1, 2, 1, 'TNH-001-XI-2022', 'Tanah Hibah e', 'H.ZAenal Arifin', '2022-11-20', '200000000', 'Screenshot_2022-06-10_190724.png', 20),
(2, 1, 2, 1, 1, 'LPTP-001-XI-2022', 'Lenovo Ideapad-330', 'Inventaris Kantor', '2022-11-08', '5000000', 'Screenshot_2022-06-27_120554.png', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_kep`
--

CREATE TABLE `asset_kep` (
  `id_asset_kep` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_kep` varchar(15) NOT NULL,
  `nama_asset_kep` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asset_kep`
--

INSERT INTO `asset_kep` (`id_asset_kep`, `id_pengajuan`, `tgl_kep`, `nama_asset_kep`) VALUES
(1, 1, '2022-11-20', 'Laptop Asus Seri-A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`) VALUES
(1, 'Laptop', 'buah'),
(2, 'Tanah', 'meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Asset Tetap'),
(2, 'Asset Sementara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_asset`
--

CREATE TABLE `lokasi_asset` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(125) NOT NULL,
  `alamat_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi_asset`
--

INSERT INTO `lokasi_asset` (`id_lokasi`, `nama_lokasi`, `alamat_lengkap`) VALUES
(1, 'Kantor', 'Jln.Pramuka No.65 Kel.Purwawinangun Kec/Kab.Kuningan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tgl_monitoring` varchar(125) NOT NULL,
  `hasil_monitoring` text NOT NULL,
  `gambar_asset_monitoring` text NOT NULL,
  `faktor_penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id_monitoring`, `id_asset`, `tgl_monitoring`, `hasil_monitoring`, `gambar_asset_monitoring`, `faktor_penyebab`) VALUES
(1, 2, '2022-11-19', '<p>Memiliki Kinerja yang menurun</p>', 'Screenshot_2022-06-27_121156.png', '<p>Butuh Penggantian RAM</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_monitoring` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengajuan` varchar(15) NOT NULL,
  `total_pengajuan` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_monitoring`, `id_user`, `tgl_pengajuan`, `total_pengajuan`, `status_pengajuan`) VALUES
(1, 1, 1, '2022-11-20', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyusutan`
--

CREATE TABLE `penyusutan` (
  `id_penyusutan` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `ket_penyusutan` text NOT NULL,
  `min_harga` varchar(15) NOT NULL,
  `status_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyusutan`
--

INSERT INTO `penyusutan` (`id_penyusutan`, `id_asset`, `ket_penyusutan`, `min_harga`, `status_asset`) VALUES
(1, 2, 'Melemahnya Kinerja Laptop', '100000', 0),
(2, 2, 'kinerja', '50000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL,
  `id_wilayah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_hp`, `alamat`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '085156727368', 'kuningan jawa barat', 'admin', 'admin', 1),
(2, 'Kepala Desa', '085876564751', 'Kuningan Jawa Barat', 'kepaladesa', 'kepaladesa', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indeks untuk tabel `asset_kep`
--
ALTER TABLE `asset_kep`
  ADD PRIMARY KEY (`id_asset_kep`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lokasi_asset`
--
ALTER TABLE `lokasi_asset`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asset`
--
ALTER TABLE `asset`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `asset_kep`
--
ALTER TABLE `asset_kep`
  MODIFY `id_asset_kep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi_asset`
--
ALTER TABLE `lokasi_asset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodam`
--

CREATE TABLE `kodam` (
  `id_kodam` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kodam` varchar(10) NOT NULL UNIQUE,
  `nama_kodam` varchar(100) NOT NULL,
  `wilayah` varchar(100),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kodam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `kodam`
--
ALTER TABLE `kodam`
  MODIFY `id_kodam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `korem`
--

CREATE TABLE `korem` (
  `id_korem` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodam` int(11) NOT NULL,
  `kode_korem` varchar(10) NOT NULL UNIQUE,
  `nama_korem` varchar(100) NOT NULL,
  `wilayah` varchar(100),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_korem`),
  CONSTRAINT `fk_korem_kodam` FOREIGN KEY (`id_kodam`) REFERENCES `kodam` (`id_kodam`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `korem`
--
ALTER TABLE `korem`
  MODIFY `id_korem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodim`
--

CREATE TABLE `kodim` (
  `id_kodim` int(11) NOT NULL AUTO_INCREMENT,
  `id_korem` int(11) NOT NULL,
  `kode_kodim` varchar(10) NOT NULL UNIQUE,
  `nama_kodim` varchar(100) NOT NULL,
  `wilayah` varchar(100),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kodim`),
  CONSTRAINT `fk_kodim_korem` FOREIGN KEY (`id_korem`) REFERENCES `korem` (`id_korem`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `kodim`
--
ALTER TABLE `kodim`
  MODIFY `id_kodim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `koramil`
--

CREATE TABLE `koramil` (
  `id_koramil` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodim` int(11) NOT NULL,
  `kode_koramil` varchar(10) NOT NULL UNIQUE,
  `nama_koramil` varchar(100) NOT NULL,
  `wilayah` varchar(100),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_koramil`),
  CONSTRAINT `fk_koramil_kodim` FOREIGN KEY (`id_kodim`) REFERENCES `kodim` (`id_kodim`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `koramil`
--
ALTER TABLE `koramil`
  MODIFY `id_koramil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `babinsa`
--

CREATE TABLE `babinsa` (
  `id_babinsa` int(11) NOT NULL AUTO_INCREMENT,
  `id_koramil` int(11) NOT NULL,
  `nrp` varchar(30) NOT NULL UNIQUE,
  `nama_babinsa` varchar(100) NOT NULL,
  `pangkat` varchar(50),
  `jabatan` varchar(100),
  `no_hp` varchar(20),
  `alamat` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_babinsa`),
  CONSTRAINT `fk_babinsa_koramil` FOREIGN KEY (`id_koramil`) REFERENCES `koramil` (`id_koramil`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `babinsa`
--
ALTER TABLE `babinsa`
  MODIFY `id_babinsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluarga_besar_tni`
--

CREATE TABLE `data_keluarga_besar_tni` (
  `id_kbt` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodim` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text,
  `alamat` text,
  `no_hp` varchar(20),
  `pekerjaan` varchar(100),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kbt`),
  CONSTRAINT `fk_kbt_kodim` FOREIGN KEY (`id_kodim`) REFERENCES `kodim` (`id_kodim`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `data_keluarga_besar_tni`
--
ALTER TABLE `data_keluarga_besar_tni`
  MODIFY `id_kbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_para_tokoh`
--

CREATE TABLE `data_para_tokoh` (
  `id_tokoh` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodim` int(11) NOT NULL,
  `nama_tokoh` varchar(100) NOT NULL,
  `kategori_tokoh` varchar(100),
  `pekerjaan` varchar(100),
  `alamat` text,
  `no_hp` varchar(20),
  `keterangan` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tokoh`),
  CONSTRAINT `fk_tokoh_kodim` FOREIGN KEY (`id_kodim`) REFERENCES `kodim` (`id_kodim`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `data_para_tokoh`
--
ALTER TABLE `data_para_tokoh`
  MODIFY `id_tokoh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_organisasi`
--

CREATE TABLE `data_organisasi` (
  `id_organisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodim` int(11) NOT NULL,
  `nama_organisasi` varchar(150) NOT NULL,
  `kelompok_organisasi` varchar(100),
  `jenis_organisasi` varchar(100),
  `ketua_organisasi` varchar(100),
  `pekerjaan` varchar(100),
  `alamat` text,
  `no_hp` varchar(20),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_organisasi`),
  CONSTRAINT `fk_organisasi_kodim` FOREIGN KEY (`id_kodim`) REFERENCES `kodim` (`id_kodim`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `data_organisasi`
--
ALTER TABLE `data_organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi_penggiat_hobi`
--

CREATE TABLE `organisasi_penggiat_hobi` (
  `id_hobi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kodim` int(11) NOT NULL,
  `nama_komunitas` varchar(150) NOT NULL,
  `jenis_hobi` varchar(100),
  `ketua_komunitas` varchar(100),
  `pekerjaan` varchar(100),
  `no_hp` varchar(20),
  `alamat` text,
  `jumlah_anggota` int,
  `keterangan` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hobi`),
  CONSTRAINT `fk_hobi_kodim` FOREIGN KEY (`id_kodim`) REFERENCES `kodim` (`id_kodim`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT untuk tabel `organisasi_penggiat_hobi`
--
ALTER TABLE `organisasi_penggiat_hobi`
  MODIFY `id_hobi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
