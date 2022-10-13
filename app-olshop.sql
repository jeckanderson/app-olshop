-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2022 pada 03.38
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'Handphone', '2022-09-20 19:26:14', '2022-09-20 19:26:14'),
(2, 'Pakaian Pria', '2022-09-20 19:26:25', '2022-09-20 19:26:25'),
(3, 'Pakaian Wanita', '2022-09-20 19:26:36', '2022-09-20 19:26:36'),
(4, 'Pakaian Anak', '2022-09-20 19:26:50', '2022-09-20 19:26:50'),
(5, 'Laptop', '2022-09-20 19:27:02', '2022-09-20 19:27:02'),
(6, 'Pulsa', '2022-09-20 19:27:12', '2022-09-20 19:27:12'),
(7, 'Kain Tenun', '2022-09-20 19:27:23', '2022-09-20 19:27:23'),
(8, 'Tas Wanita', '2022-09-20 19:34:08', '2022-09-20 19:34:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_products`
--

CREATE TABLE `image_products` (
  `id_produk_img` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `produk_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_20_084045_create_products_table', 1),
(6, '2022_07_20_110120_create_pembelians_table', 1),
(7, '2022_07_20_144402_create_pembelian_produks_table', 1),
(8, '2022_07_30_095039_create_ongkirs_table', 1),
(9, '2022_08_19_174216_create_pembayarans_table', 1),
(10, '2022_08_24_094731_create_categories_table', 1),
(11, '2022_08_25_154239_create_image_products_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkirs`
--

CREATE TABLE `ongkirs` (
  `id_ongkir` bigint(20) UNSIGNED NOT NULL,
  `nama_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id_pembayaran`, `id_pembelian`, `name`, `bank`, `jumlah`, `tanggal`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'User', 'Mandiri', 68000, '2022-09-21', 'bayar-img/9Ir8eHfBxBOfKFNWN1LDuc9aMjtymUklmKgyrfXZ.webp', '2022-09-20 19:53:58', '2022-09-20 19:53:58'),
(2, 5, 'pelanggan2', 'BNI', 40000, '2022-09-22', 'bayar-img/RgfPxYI7XsoCKEFUJ9FDKhOesvrMxSJrtHtgKWYY.png', '2022-09-22 00:23:02', '2022-09-22 00:23:02'),
(3, 6, 'Jeck Anderson', 'Mandiri', 40000, '2022-09-22', 'bayar-img/TXddk3CccXyA7Rx5HTsvI7cnI2Yh611GX97KOkO1.png', '2022-09-22 06:02:00', '2022-09-22 06:02:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum ada',
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekspedisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id_pembelian`, `user_id`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `totalberat`, `provinsi`, `kabupaten`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-09-21', 68000, 'Kalimantan', 'barang dikirim', 'BCF143245', 400, 'Kalimantan Barat', 'Singkawang', 'Kota', '79117', 'jne', 'OKE', 44000, '7-8', '2022-09-20 19:39:02', '2022-09-20 20:25:36'),
(2, 2, '2022-09-22', 43000, 'Bali', 'pending', 'belum ada', 200, 'Bali', 'Jembrana', 'Kabupaten', '82251', 'pos', 'Pos Reguler', 31000, '5 HARI', '2022-09-21 18:04:05', '2022-09-21 18:04:05'),
(3, 2, '2022-09-22', 56000, 'Bangka Belitung', 'pending', 'belum ada', 200, 'Bangka Belitung', 'Bangka Tengah', 'Kabupaten', '33613', 'tiki', 'ECO', 44000, '4', '2022-09-21 23:07:50', '2022-09-21 23:07:50'),
(4, 2, '2022-09-22', 41000, 'Lumajang', 'pending', 'belum ada', 400, 'Jawa Timur', 'Lumajang', 'Kabupaten', '67319', 'jne', 'OKE', 17000, '7-8', '2022-09-22 00:13:37', '2022-09-22 00:13:37'),
(5, 3, '2022-09-22', 40000, 'Kediri', 'sudah kirim pembayaran', 'belum ada', 400, 'Jawa Timur', 'Kediri', 'Kota', '64125', 'jne', 'REG', 16000, '3-4', '2022-09-22 00:22:05', '2022-09-22 00:23:02'),
(6, 4, '2022-09-22', 40000, 'Surabaya', 'barang dikirim', 'BCF143245', 400, 'Jawa Timur', 'Surabaya', 'Kota', '60119', 'jne', 'REG', 16000, '2-3', '2022-09-22 03:56:09', '2022-09-22 06:29:51'),
(7, 4, '2022-09-22', 21000, 'Semarang', 'pending', 'belum ada', 200, 'Jawa Tengah', 'Semarang', 'Kota', '50135', 'jne', 'OKE', 9000, '4-5', '2022-09-22 06:22:43', '2022-09-22 06:22:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produks`
--

CREATE TABLE `pembelian_produks` (
  `id_pembelian_product` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_produks`
--

INSERT INTO `pembelian_produks` (`id_pembelian_product`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 200, 12000, '2022-09-20 19:39:02', '2022-09-20 19:39:02'),
(2, 1, 2, 1, 'Johnwin - Slim Fit - Kaos Casual Active - Johnwin XII - Putih - Putih', 12000, 200, 200, 12000, '2022-09-20 19:39:02', '2022-09-20 19:39:02'),
(3, 2, 1, 1, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 200, 12000, '2022-09-21 18:04:05', '2022-09-21 18:04:05'),
(4, 3, 1, 1, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 200, 12000, '2022-09-21 23:07:51', '2022-09-21 23:07:51'),
(5, 4, 1, 2, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 400, 24000, '2022-09-22 00:13:37', '2022-09-22 00:13:37'),
(6, 5, 2, 2, 'Johnwin - Slim Fit - Kaos Casual Active - Johnwin XII - Putih - Putih', 12000, 200, 400, 24000, '2022-09-22 00:22:05', '2022-09-22 00:22:05'),
(7, 6, 2, 1, 'Johnwin - Slim Fit - Kaos Casual Active - Johnwin XII - Putih - Putih', 12000, 200, 200, 12000, '2022-09-22 03:56:10', '2022-09-22 03:56:10'),
(8, 6, 1, 1, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 200, 12000, '2022-09-22 03:56:10', '2022-09-22 03:56:10'),
(9, 7, 2, 1, 'Johnwin - Slim Fit - Kaos Casual Active - Johnwin XII - Putih - Putih', 12000, 200, 200, 12000, '2022-09-22 06:22:44', '2022-09-22 06:22:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_produk`, `id_category`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `created_at`, `updated_at`) VALUES
(1, 2, 'Slim Fit - Casual Active - Inspire - Hitam - ATS.622.M330.33.CSS - S', 12000, 200, 'produk-img/OFtjaw4EDR6B7GFKaajZpsTDeIdfmY0tfas79oNB.webp', '<div>Rp103.000 diskon 69% Harga sebelum diskon Rp327.600 Kondisi: Baru Berat Satuan: 350 g&nbsp; &nbsp; &nbsp;Kategori: Kaos Pria&nbsp; &nbsp; &nbsp;Etalase: Kaos Casual Lengan Pendek&nbsp; Kaos casual active dari Johnwin dengan warna dasar hitam. Menampilkan motif sablon putih. Terbuat dari bahan katun berkualitas. Ref : ATS.622.M330.33.C S/S&nbsp; \"Untuk syarat komplain barang cacat , kurang qty / salah produk, harap melakukan perekaman video saat pembukaan paket. Jika tidak ada rekaman video maka dianggap tidak ada bukti dan bukan tanggung jawab seller.\"&nbsp; Beli di aplikasi, makin banyak promo! Scan QR-nya untuk lihat barang ini di aplikasi Tokopedia. Bebas ongkir, lho~ Ada masalah dengan produk ini? ULASAN PEMBELI</div>', -1, '2022-09-20 19:31:22', '2022-09-22 03:56:10'),
(2, 2, 'Johnwin - Slim Fit - Kaos Casual Active - Johnwin XII - Putih - Putih', 12000, 200, 'produk-img/Ma02Hpm7orRJ7d52XPwC10HgqbajCsYefqZVtMIA.webp', '<div>Kaos casual active dari Johnwin dengan warna dasar putih. Menampilkan motif sablon dengan model long line. Menggunakan fitting slim fit. Terbuat dari bahan katun berkualitas. Ref : ATS.622.M227.32.C S/S<br><br>Tersedia dalam 4 ukuran : Small, Medium, Large, dan Xtra Large<br><br>Ukuran S<br>Panjang : 66 cm<br>Lingkar Dada : 98 cm<br>Lebar Bahu : 41 cm<br><br>Ukuran M<br>Panjang : 68 cm<br>Lingkar Dada : 102 cm<br>Lebar Bahu : 43 cm<br><br>Ukuran L<br>Panjang : 70 cm<br>Lingkar Dada : 106 cm<br>Lebar Bahu : 45 cm<br><br>Ukuran XL<br>Panjang : 72 cm<br>Lingkar Dada : 110 cm<br>Lebar Bahu : 47 cm<br><br>\"Untuk syarat komplain barang cacat , kurang qty / salah produk, harap melakukan perekaman video saat pembukaan paket. Jika tidak ada rekaman video maka dianggap tidak ada bukti dan bukan tanggung jawab seller.\"</div>', 0, '2022-09-20 19:33:01', '2022-09-22 06:22:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telepon`, `password`, `alamat_user`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'jeckrissen@gmail.com', '085200738097', '$2y$10$BMIMi6PPzuiR4YouugwQgus.0Bq9QcdXAAsJR59IkDAunMxAB49JC', 'Gondokusuman', 1, NULL, '2022-09-20 19:09:06', '2022-09-20 19:09:06'),
(2, 'User', 'user@gmail.com', '082200738097', '$2y$10$FVS7wQsxS1Iy/bpmNHTSROKUl0i9ts7rSg8vAwpgRH8K4DY108n0y', 'Gondokusuman', 0, NULL, '2022-09-20 19:09:06', '2022-09-20 19:09:06'),
(3, 'pelanggan1', 'pelanggan1@gmail.com', '098765123432', '$2y$10$JxcvDYc7IZPNMiYffYkxx.ho/OqTevsEDl80Y1p0NojNi3N1LrMWa', 'Semarang', 0, NULL, '2022-09-22 00:15:59', '2022-09-22 00:15:59'),
(4, 'Jeck Anderson', 'pel2@gmail.com', '098765123413', '$2y$10$WsRSbqkrRihHfWv4Il8F4Or6A9LaX3/QdrLR6jqJKkNRHgg1HHnCa', 'Papringan', 0, NULL, '2022-09-22 02:52:57', '2022-09-22 02:52:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `categories_name_category_unique` (`name_category`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id_produk_img`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongkirs`
--
ALTER TABLE `ongkirs`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produks`
--
ALTER TABLE `pembelian_produks`
  ADD PRIMARY KEY (`id_pembelian_product`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_telepon_unique` (`telepon`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id_produk_img` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ongkirs`
--
ALTER TABLE `ongkirs`
  MODIFY `id_ongkir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produks`
--
ALTER TABLE `pembelian_produks`
  MODIFY `id_pembelian_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
