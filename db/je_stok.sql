-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 10:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `je_stok`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(8) NOT NULL,
  `id_user` int(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `id_kabupaten` char(7) NOT NULL,
  `kode_pos` varchar(7) NOT NULL,
  `alamat_utama` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama`, `telp`, `alamat_lengkap`, `id_kabupaten`, `kode_pos`, `alamat_utama`) VALUES
(18, 1, 'Rumah Nenek', '082219348576', 'Jl Pakuniran 30', '369', '67291', '0'),
(19, 1, 'Rumah Nenek', '082219348576', 'Jl Pakuniran 30', '369', '67291', '0'),
(20, 1, 'Rumah Om Neri', '08239485737', 'Jl Pakuniran 3405', '354', '729836', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `id_detail` int(8) NOT NULL,
  `id_keranjang` int(7) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id_detail` int(8) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `jumlah` int(5) UNSIGNED NOT NULL,
  `harga` int(9) UNSIGNED NOT NULL,
  `total_harga` int(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(8) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `id_orders` int(8) NOT NULL,
  `rating` int(1) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto` int(8) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE `harga_jual` (
  `id_harga` int(8) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `id_tipe` int(1) NOT NULL,
  `harga` int(9) UNSIGNED NOT NULL,
  `min_pembelian` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` char(4) NOT NULL,
  `id_provinsi` char(2) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `kabupaten`, `type`) VALUES
('1', '21', 'Aceh Barat', ''),
('10', '21', 'Aceh Timur', ''),
('100', '19', 'Buru Selatan', ''),
('101', '30', 'Buton', ''),
('102', '30', 'Buton Utara', ''),
('103', '9', 'Ciamis', ''),
('104', '9', 'Cianjur', ''),
('105', '10', 'Cilacap', ''),
('106', '3', 'Cilegon', ''),
('107', '9', 'Cimahi', ''),
('108', '9', 'Cirebon', ''),
('109', '9', 'Cirebon', ''),
('11', '21', 'Aceh Utara', ''),
('110', '34', 'Dairi', ''),
('111', '24', 'Deiyai (Deliyai)', ''),
('112', '34', 'Deli Serdang', ''),
('113', '10', 'Demak', ''),
('114', '1', 'Denpasar', ''),
('115', '9', 'Depok', ''),
('116', '32', 'Dharmasraya', ''),
('117', '24', 'Dogiyai', ''),
('118', '22', 'Dompu', ''),
('119', '29', 'Donggala', ''),
('12', '32', 'Agam', ''),
('120', '26', 'Dumai', ''),
('121', '33', 'Empat Lawang', ''),
('122', '23', 'Ende', ''),
('123', '28', 'Enrekang', ''),
('124', '25', 'Fakfak', ''),
('125', '23', 'Flores Timur', ''),
('126', '9', 'Garut', ''),
('127', '21', 'Gayo Lues', ''),
('128', '1', 'Gianyar', ''),
('129', '7', 'Gorontalo', ''),
('13', '23', 'Alor', ''),
('130', '7', 'Gorontalo', ''),
('131', '7', 'Gorontalo Utara', ''),
('132', '28', 'Gowa', ''),
('133', '11', 'Gresik', ''),
('134', '10', 'Grobogan', ''),
('135', '5', 'Gunung Kidul', ''),
('136', '14', 'Gunung Mas', ''),
('137', '34', 'Gunungsitoli', ''),
('138', '20', 'Halmahera Barat', ''),
('139', '20', 'Halmahera Selatan', ''),
('14', '19', 'Ambon', ''),
('140', '20', 'Halmahera Tengah', ''),
('141', '20', 'Halmahera Timur', ''),
('142', '20', 'Halmahera Utara', ''),
('143', '13', 'Hulu Sungai Selatan', ''),
('144', '13', 'Hulu Sungai Tengah', ''),
('145', '13', 'Hulu Sungai Utara', ''),
('146', '34', 'Humbang Hasundutan', ''),
('147', '26', 'Indragiri Hilir', ''),
('148', '26', 'Indragiri Hulu', ''),
('149', '9', 'Indramayu', ''),
('15', '34', 'Asahan', ''),
('150', '24', 'Intan Jaya', ''),
('151', '6', 'Jakarta Barat', ''),
('152', '6', 'Jakarta Pusat', ''),
('153', '6', 'Jakarta Selatan', ''),
('154', '6', 'Jakarta Timur', ''),
('155', '6', 'Jakarta Utara', ''),
('156', '8', 'Jambi', ''),
('157', '24', 'Jayapura', ''),
('158', '24', 'Jayapura', ''),
('159', '24', 'Jayawijaya', ''),
('16', '24', 'Asmat', ''),
('160', '11', 'Jember', ''),
('161', '1', 'Jembrana', ''),
('162', '28', 'Jeneponto', ''),
('163', '10', 'Jepara', ''),
('164', '11', 'Jombang', ''),
('165', '25', 'Kaimana', ''),
('166', '26', 'Kampar', ''),
('167', '14', 'Kapuas', ''),
('168', '12', 'Kapuas Hulu', ''),
('169', '10', 'Karanganyar', ''),
('17', '1', 'Badung', ''),
('170', '1', 'Karangasem', ''),
('171', '9', 'Karawang', ''),
('172', '17', 'Karimun', ''),
('173', '34', 'Karo', ''),
('174', '14', 'Katingan', ''),
('175', '4', 'Kaur', ''),
('176', '12', 'Kayong Utara', ''),
('177', '10', 'Kebumen', ''),
('178', '11', 'Kediri', ''),
('179', '11', 'Kediri', ''),
('18', '13', 'Balangan', ''),
('180', '24', 'Keerom', ''),
('181', '10', 'Kendal', ''),
('182', '30', 'Kendari', ''),
('183', '4', 'Kepahiang', ''),
('184', '17', 'Kepulauan Anambas', ''),
('185', '19', 'Kepulauan Aru', ''),
('186', '32', 'Kepulauan Mentawai', ''),
('187', '26', 'Kepulauan Meranti', ''),
('188', '31', 'Kepulauan Sangihe', ''),
('189', '6', 'Kepulauan Seribu', ''),
('19', '15', 'Balikpapan', ''),
('190', '31', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', ''),
('191', '20', 'Kepulauan Sula', ''),
('192', '31', 'Kepulauan Talaud', ''),
('193', '24', 'Kepulauan Yapen (Yapen Waropen)', ''),
('194', '8', 'Kerinci', ''),
('195', '12', 'Ketapang', ''),
('196', '10', 'Klaten', ''),
('197', '1', 'Klungkung', ''),
('198', '30', 'Kolaka', ''),
('199', '30', 'Kolaka Utara', ''),
('2', '21', 'Aceh Barat Daya', ''),
('20', '21', 'Banda Aceh', ''),
('200', '30', 'Konawe', ''),
('201', '30', 'Konawe Selatan', ''),
('202', '30', 'Konawe Utara', ''),
('203', '13', 'Kotabaru', ''),
('204', '31', 'Kotamobagu', ''),
('205', '14', 'Kotawaringin Barat', ''),
('206', '14', 'Kotawaringin Timur', ''),
('207', '26', 'Kuantan Singingi', ''),
('208', '12', 'Kubu Raya', ''),
('209', '10', 'Kudus', ''),
('21', '18', 'Bandar Lampung', ''),
('210', '5', 'Kulon Progo', ''),
('211', '9', 'Kuningan', ''),
('212', '23', 'Kupang', ''),
('213', '23', 'Kupang', ''),
('214', '15', 'Kutai Barat', ''),
('215', '15', 'Kutai Kartanegara', ''),
('216', '15', 'Kutai Timur', ''),
('217', '34', 'Labuhan Batu', ''),
('218', '34', 'Labuhan Batu Selatan', ''),
('219', '34', 'Labuhan Batu Utara', ''),
('22', '9', 'Bandung', ''),
('220', '33', 'Lahat', ''),
('221', '14', 'Lamandau', ''),
('222', '11', 'Lamongan', ''),
('223', '18', 'Lampung Barat', ''),
('224', '18', 'Lampung Selatan', ''),
('225', '18', 'Lampung Tengah', ''),
('226', '18', 'Lampung Timur', ''),
('227', '18', 'Lampung Utara', ''),
('228', '12', 'Landak', ''),
('229', '34', 'Langkat', ''),
('23', '9', 'Bandung', ''),
('230', '21', 'Langsa', ''),
('231', '24', 'Lanny Jaya', ''),
('232', '3', 'Lebak', ''),
('233', '4', 'Lebong', ''),
('234', '23', 'Lembata', ''),
('235', '21', 'Lhokseumawe', ''),
('236', '32', 'Lima Puluh Koto/Kota', ''),
('237', '17', 'Lingga', ''),
('238', '22', 'Lombok Barat', ''),
('239', '22', 'Lombok Tengah', ''),
('24', '9', 'Bandung Barat', ''),
('240', '22', 'Lombok Timur', ''),
('241', '22', 'Lombok Utara', ''),
('242', '33', 'Lubuk Linggau', ''),
('243', '11', 'Lumajang', ''),
('244', '28', 'Luwu', ''),
('245', '28', 'Luwu Timur', ''),
('246', '28', 'Luwu Utara', ''),
('247', '11', 'Madiun', ''),
('248', '11', 'Madiun', ''),
('249', '10', 'Magelang', ''),
('25', '29', 'Banggai', ''),
('250', '10', 'Magelang', ''),
('251', '11', 'Magetan', ''),
('252', '9', 'Majalengka', ''),
('253', '27', 'Majene', ''),
('254', '28', 'Makassar', ''),
('255', '11', 'Malang', ''),
('256', '11', 'Malang', ''),
('257', '16', 'Malinau', ''),
('258', '19', 'Maluku Barat Daya', ''),
('259', '19', 'Maluku Tengah', ''),
('26', '29', 'Banggai Kepulauan', ''),
('260', '19', 'Maluku Tenggara', ''),
('261', '19', 'Maluku Tenggara Barat', ''),
('262', '27', 'Mamasa', ''),
('263', '24', 'Mamberamo Raya', ''),
('264', '24', 'Mamberamo Tengah', ''),
('265', '27', 'Mamuju', ''),
('266', '27', 'Mamuju Utara', ''),
('267', '31', 'Manado', ''),
('268', '34', 'Mandailing Natal', ''),
('269', '23', 'Manggarai', ''),
('27', '2', 'Bangka', ''),
('270', '23', 'Manggarai Barat', ''),
('271', '23', 'Manggarai Timur', ''),
('272', '25', 'Manokwari', ''),
('273', '25', 'Manokwari Selatan', ''),
('274', '24', 'Mappi', ''),
('275', '28', 'Maros', ''),
('276', '22', 'Mataram', ''),
('277', '25', 'Maybrat', ''),
('278', '34', 'Medan', ''),
('279', '12', 'Melawi', ''),
('28', '2', 'Bangka Barat', ''),
('280', '8', 'Merangin', ''),
('281', '24', 'Merauke', ''),
('282', '18', 'Mesuji', ''),
('283', '18', 'Metro', ''),
('284', '24', 'Mimika', ''),
('285', '31', 'Minahasa', ''),
('286', '31', 'Minahasa Selatan', ''),
('287', '31', 'Minahasa Tenggara', ''),
('288', '31', 'Minahasa Utara', ''),
('289', '11', 'Mojokerto', ''),
('29', '2', 'Bangka Selatan', ''),
('290', '11', 'Mojokerto', ''),
('291', '29', 'Morowali', ''),
('292', '33', 'Muara Enim', ''),
('293', '8', 'Muaro Jambi', ''),
('294', '4', 'Muko Muko', ''),
('295', '30', 'Muna', ''),
('296', '14', 'Murung Raya', ''),
('297', '33', 'Musi Banyuasin', ''),
('298', '33', 'Musi Rawas', ''),
('299', '24', 'Nabire', ''),
('3', '21', 'Aceh Besar', ''),
('30', '2', 'Bangka Tengah', ''),
('300', '21', 'Nagan Raya', ''),
('301', '23', 'Nagekeo', ''),
('302', '17', 'Natuna', ''),
('303', '24', 'Nduga', ''),
('304', '23', 'Ngada', ''),
('305', '11', 'Nganjuk', ''),
('306', '11', 'Ngawi', ''),
('307', '34', 'Nias', ''),
('308', '34', 'Nias Barat', ''),
('309', '34', 'Nias Selatan', ''),
('31', '11', 'Bangkalan', ''),
('310', '34', 'Nias Utara', ''),
('311', '16', 'Nunukan', ''),
('312', '33', 'Ogan Ilir', ''),
('313', '33', 'Ogan Komering Ilir', ''),
('314', '33', 'Ogan Komering Ulu', ''),
('315', '33', 'Ogan Komering Ulu Selatan', ''),
('316', '33', 'Ogan Komering Ulu Timur', ''),
('317', '11', 'Pacitan', ''),
('318', '32', 'Padang', ''),
('319', '34', 'Padang Lawas', ''),
('32', '1', 'Bangli', ''),
('320', '34', 'Padang Lawas Utara', ''),
('321', '32', 'Padang Panjang', ''),
('322', '32', 'Padang Pariaman', ''),
('323', '34', 'Padang Sidempuan', ''),
('324', '33', 'Pagar Alam', ''),
('325', '34', 'Pakpak Bharat', ''),
('326', '14', 'Palangka Raya', ''),
('327', '33', 'Palembang', ''),
('328', '28', 'Palopo', ''),
('329', '29', 'Palu', ''),
('33', '13', 'Banjar', ''),
('330', '11', 'Pamekasan', ''),
('331', '3', 'Pandeglang', ''),
('332', '9', 'Pangandaran', ''),
('333', '28', 'Pangkajene Kepulauan', ''),
('334', '2', 'Pangkal Pinang', ''),
('335', '24', 'Paniai', ''),
('336', '28', 'Parepare', ''),
('337', '32', 'Pariaman', ''),
('338', '29', 'Parigi Moutong', ''),
('339', '32', 'Pasaman', ''),
('34', '9', 'Banjar', ''),
('340', '32', 'Pasaman Barat', ''),
('341', '15', 'Paser', ''),
('342', '11', 'Pasuruan', ''),
('343', '11', 'Pasuruan', ''),
('344', '10', 'Pati', ''),
('345', '32', 'Payakumbuh', ''),
('346', '25', 'Pegunungan Arfak', ''),
('347', '24', 'Pegunungan Bintang', ''),
('348', '10', 'Pekalongan', ''),
('349', '10', 'Pekalongan', ''),
('35', '13', 'Banjarbaru', ''),
('350', '26', 'Pekanbaru', ''),
('351', '26', 'Pelalawan', ''),
('352', '10', 'Pemalang', ''),
('353', '34', 'Pematang Siantar', ''),
('354', '15', 'Penajam Paser Utara', ''),
('355', '18', 'Pesawaran', ''),
('356', '18', 'Pesisir Barat', ''),
('357', '32', 'Pesisir Selatan', ''),
('358', '21', 'Pidie', ''),
('359', '21', 'Pidie Jaya', ''),
('36', '13', 'Banjarmasin', ''),
('360', '28', 'Pinrang', ''),
('361', '7', 'Pohuwato', ''),
('362', '27', 'Polewali Mandar', ''),
('363', '11', 'Ponorogo', ''),
('364', '12', 'Pontianak', ''),
('365', '12', 'Pontianak', ''),
('366', '29', 'Poso', ''),
('367', '33', 'Prabumulih', ''),
('368', '18', 'Pringsewu', ''),
('369', '11', 'Probolinggo', ''),
('37', '10', 'Banjarnegara', ''),
('370', '11', 'Probolinggo', ''),
('371', '14', 'Pulang Pisau', ''),
('372', '20', 'Pulau Morotai', ''),
('373', '24', 'Puncak', ''),
('374', '24', 'Puncak Jaya', ''),
('375', '10', 'Purbalingga', ''),
('376', '9', 'Purwakarta', ''),
('377', '10', 'Purworejo', ''),
('378', '25', 'Raja Ampat', ''),
('379', '4', 'Rejang Lebong', ''),
('38', '28', 'Bantaeng', ''),
('380', '10', 'Rembang', ''),
('381', '26', 'Rokan Hilir', ''),
('382', '26', 'Rokan Hulu', ''),
('383', '23', 'Rote Ndao', ''),
('384', '21', 'Sabang', ''),
('385', '23', 'Sabu Raijua', ''),
('386', '10', 'Salatiga', ''),
('387', '15', 'Samarinda', ''),
('388', '12', 'Sambas', ''),
('389', '34', 'Samosir', ''),
('39', '5', 'Bantul', ''),
('390', '11', 'Sampang', ''),
('391', '12', 'Sanggau', ''),
('392', '24', 'Sarmi', ''),
('393', '8', 'Sarolangun', ''),
('394', '32', 'Sawah Lunto', ''),
('395', '12', 'Sekadau', ''),
('396', '28', 'Selayar (Kepulauan Selayar)', ''),
('397', '4', 'Seluma', ''),
('398', '10', 'Semarang', ''),
('399', '10', 'Semarang', ''),
('4', '21', 'Aceh Jaya', ''),
('40', '33', 'Banyuasin', ''),
('400', '19', 'Seram Bagian Barat', ''),
('401', '19', 'Seram Bagian Timur', ''),
('402', '3', 'Serang', ''),
('403', '3', 'Serang', ''),
('404', '34', 'Serdang Bedagai', ''),
('405', '14', 'Seruyan', ''),
('406', '26', 'Siak', ''),
('407', '34', 'Sibolga', ''),
('408', '28', 'Sidenreng Rappang/Rapang', ''),
('409', '11', 'Sidoarjo', ''),
('41', '10', 'Banyumas', ''),
('410', '29', 'Sigi', ''),
('411', '32', 'Sijunjung (Sawah Lunto Sijunjung)', ''),
('412', '23', 'Sikka', ''),
('413', '34', 'Simalungun', ''),
('414', '21', 'Simeulue', ''),
('415', '12', 'Singkawang', ''),
('416', '28', 'Sinjai', ''),
('417', '12', 'Sintang', ''),
('418', '11', 'Situbondo', ''),
('419', '5', 'Sleman', ''),
('42', '11', 'Banyuwangi', ''),
('420', '32', 'Solok', ''),
('421', '32', 'Solok', ''),
('422', '32', 'Solok Selatan', ''),
('423', '28', 'Soppeng', ''),
('424', '25', 'Sorong', ''),
('425', '25', 'Sorong', ''),
('426', '25', 'Sorong Selatan', ''),
('427', '10', 'Sragen', ''),
('428', '9', 'Subang', ''),
('429', '21', 'Subulussalam', ''),
('43', '13', 'Barito Kuala', ''),
('430', '9', 'Sukabumi', ''),
('431', '9', 'Sukabumi', ''),
('432', '14', 'Sukamara', ''),
('433', '10', 'Sukoharjo', ''),
('434', '23', 'Sumba Barat', ''),
('435', '23', 'Sumba Barat Daya', ''),
('436', '23', 'Sumba Tengah', ''),
('437', '23', 'Sumba Timur', ''),
('438', '22', 'Sumbawa', ''),
('439', '22', 'Sumbawa Barat', ''),
('44', '14', 'Barito Selatan', ''),
('440', '9', 'Sumedang', ''),
('441', '11', 'Sumenep', ''),
('442', '8', 'Sungaipenuh', ''),
('443', '24', 'Supiori', ''),
('444', '11', 'Surabaya', ''),
('445', '10', 'Surakarta (Solo)', ''),
('446', '13', 'Tabalong', ''),
('447', '1', 'Tabanan', ''),
('448', '28', 'Takalar', ''),
('449', '25', 'Tambrauw', ''),
('45', '14', 'Barito Timur', ''),
('450', '16', 'Tana Tidung', ''),
('451', '28', 'Tana Toraja', ''),
('452', '13', 'Tanah Bumbu', ''),
('453', '32', 'Tanah Datar', ''),
('454', '13', 'Tanah Laut', ''),
('455', '3', 'Tangerang', ''),
('456', '3', 'Tangerang', ''),
('457', '3', 'Tangerang Selatan', ''),
('458', '18', 'Tanggamus', ''),
('459', '34', 'Tanjung Balai', ''),
('46', '14', 'Barito Utara', ''),
('460', '8', 'Tanjung Jabung Barat', ''),
('461', '8', 'Tanjung Jabung Timur', ''),
('462', '17', 'Tanjung Pinang', ''),
('463', '34', 'Tapanuli Selatan', ''),
('464', '34', 'Tapanuli Tengah', ''),
('465', '34', 'Tapanuli Utara', ''),
('466', '13', 'Tapin', ''),
('467', '16', 'Tarakan', ''),
('468', '9', 'Tasikmalaya', ''),
('469', '9', 'Tasikmalaya', ''),
('47', '28', 'Barru', ''),
('470', '34', 'Tebing Tinggi', ''),
('471', '8', 'Tebo', ''),
('472', '10', 'Tegal', ''),
('473', '10', 'Tegal', ''),
('474', '25', 'Teluk Bintuni', ''),
('475', '25', 'Teluk Wondama', ''),
('476', '10', 'Temanggung', ''),
('477', '20', 'Ternate', ''),
('478', '20', 'Tidore Kepulauan', ''),
('479', '23', 'Timor Tengah Selatan', ''),
('48', '17', 'Batam', ''),
('480', '23', 'Timor Tengah Utara', ''),
('481', '34', 'Toba Samosir', ''),
('482', '29', 'Tojo Una-Una', ''),
('483', '29', 'Toli-Toli', ''),
('484', '24', 'Tolikara', ''),
('485', '31', 'Tomohon', ''),
('486', '28', 'Toraja Utara', ''),
('487', '11', 'Trenggalek', ''),
('488', '19', 'Tual', ''),
('489', '11', 'Tuban', ''),
('49', '10', 'Batang', ''),
('490', '18', 'Tulang Bawang', ''),
('491', '18', 'Tulang Bawang Barat', ''),
('492', '11', 'Tulungagung', ''),
('493', '28', 'Wajo', ''),
('494', '30', 'Wakatobi', ''),
('495', '24', 'Waropen', ''),
('496', '18', 'Way Kanan', ''),
('497', '10', 'Wonogiri', ''),
('498', '10', 'Wonosobo', ''),
('499', '24', 'Yahukimo', ''),
('5', '21', 'Aceh Selatan', ''),
('50', '8', 'Batang Hari', ''),
('500', '24', 'Yalimo', ''),
('501', '5', 'Yogyakarta', ''),
('51', '11', 'Batu', ''),
('52', '34', 'Batu Bara', ''),
('53', '30', 'Bau-Bau', ''),
('54', '9', 'Bekasi', ''),
('55', '9', 'Bekasi', ''),
('56', '2', 'Belitung', ''),
('57', '2', 'Belitung Timur', ''),
('58', '23', 'Belu', ''),
('59', '21', 'Bener Meriah', ''),
('6', '21', 'Aceh Singkil', ''),
('60', '26', 'Bengkalis', ''),
('61', '12', 'Bengkayang', ''),
('62', '4', 'Bengkulu', ''),
('63', '4', 'Bengkulu Selatan', ''),
('64', '4', 'Bengkulu Tengah', ''),
('65', '4', 'Bengkulu Utara', ''),
('66', '15', 'Berau', ''),
('67', '24', 'Biak Numfor', ''),
('68', '22', 'Bima', ''),
('69', '22', 'Bima', ''),
('7', '21', 'Aceh Tamiang', ''),
('70', '34', 'Binjai', ''),
('71', '17', 'Bintan', ''),
('72', '21', 'Bireuen', ''),
('73', '31', 'Bitung', ''),
('74', '11', 'Blitar', ''),
('75', '11', 'Blitar', ''),
('76', '10', 'Blora', ''),
('77', '7', 'Boalemo', ''),
('78', '9', 'Bogor', ''),
('79', '9', 'Bogor', ''),
('8', '21', 'Aceh Tengah', ''),
('80', '11', 'Bojonegoro', ''),
('81', '31', 'Bolaang Mongondow (Bolmong)', ''),
('82', '31', 'Bolaang Mongondow Selatan', ''),
('83', '31', 'Bolaang Mongondow Timur', ''),
('84', '31', 'Bolaang Mongondow Utara', ''),
('85', '30', 'Bombana', ''),
('86', '11', 'Bondowoso', ''),
('87', '28', 'Bone', ''),
('88', '7', 'Bone Bolango', ''),
('89', '15', 'Bontang', ''),
('9', '21', 'Aceh Tenggara', ''),
('90', '24', 'Boven Digoel', ''),
('91', '10', 'Boyolali', ''),
('92', '10', 'Brebes', ''),
('93', '32', 'Bukittinggi', ''),
('94', '1', 'Buleleng', ''),
('95', '28', 'Bulukumba', ''),
('96', '16', 'Bulungan (Bulongan)', ''),
('97', '8', 'Bungo', ''),
('98', '29', 'Buol', ''),
('99', '19', 'Buru', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `id_sub_menu` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` char(7) NOT NULL,
  `id_kabupaten` char(4) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(8) NOT NULL,
  `id_user` int(7) NOT NULL,
  `total_produk` int(5) NOT NULL,
  `total_harga` int(8) NOT NULL,
  `total_berat` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(1) NOT NULL,
  `kurir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `kurir`) VALUES
(1, 'pos'),
(2, 'tiki'),
(3, 'jne');

-- --------------------------------------------------------

--
-- Table structure for table `menu_grup`
--

CREATE TABLE `menu_grup` (
  `id_menu` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_grup`
--

INSERT INTO `menu_grup` (`id_menu`, `nama`) VALUES
(9, 'Fashions'),
(10, 'Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(9) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_tujuan_kirim` int(5) NOT NULL,
  `asal_kiriman` text NOT NULL,
  `total_produk` int(5) UNSIGNED NOT NULL,
  `total_berat` decimal(2,0) NOT NULL,
  `satuan_berat` enum('kg') NOT NULL,
  `kode_kurir` varchar(10) NOT NULL,
  `biaya_kirim` int(7) UNSIGNED NOT NULL,
  `grand_total` int(8) UNSIGNED NOT NULL,
  `id_rekening` int(1) NOT NULL,
  `upload_bukti` varchar(255) DEFAULT NULL,
  `start_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exp_bayar` datetime NOT NULL,
  `status_pesanan` int(1) NOT NULL,
  `pesan_user` text,
  `tgl_pengiriman` datetime DEFAULT NULL,
  `tgl_sampai` datetime DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `tgl_input_bayar` datetime DEFAULT NULL,
  `status_bayar` enum('terima','tolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `id_tujuan_kirim`, `asal_kiriman`, `total_produk`, `total_berat`, `satuan_berat`, `kode_kurir`, `biaya_kirim`, `grand_total`, `id_rekening`, `upload_bukti`, `start_bayar`, `exp_bayar`, `status_pesanan`, `pesan_user`, `tgl_pengiriman`, `tgl_sampai`, `no_resi`, `tgl_bayar`, `tgl_input_bayar`, `status_bayar`) VALUES
(1, '1', 1, 'lorem', 2, '5', 'kg', '1', 50000, 200000, 1, NULL, '2019-11-12 14:08:37', '2019-11-14 00:00:00', 0, 'pesan ini hanya untuk percobaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `kode_pos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(7) NOT NULL,
  `id_user` int(7) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `satuan_produk` varchar(25) NOT NULL,
  `berat` float NOT NULL,
  `satuan_berat` enum('kg') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `expired_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `nama_produk`, `stok`, `deskripsi`, `satuan_produk`, `berat`, `satuan_berat`, `foto`, `expired_date`, `created_at`) VALUES
(2, 1, 'Mie Koplo', 35, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'pcs', 0.4, 'kg', '', '2019-11-28', '2019-11-04 14:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(8) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `id_kategori` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` char(2) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
('1', 'Bali'),
('10', 'Jawa Tengah'),
('11', 'Jawa Timur'),
('12', 'Kalimantan Barat'),
('13', 'Kalimantan Selatan'),
('14', 'Kalimantan Tengah'),
('15', 'Kalimantan Timur'),
('16', 'Kalimantan Utara'),
('17', 'Kepulauan Riau'),
('18', 'Lampung'),
('19', 'Maluku'),
('2', 'Bangka Belitung'),
('20', 'Maluku Utara'),
('21', 'Nanggroe Aceh Darussalam (NAD)'),
('22', 'Nusa Tenggara Barat (NTB)'),
('23', 'Nusa Tenggara Timur (NTT)'),
('24', 'Papua'),
('25', 'Papua Barat'),
('26', 'Riau'),
('27', 'Sulawesi Barat'),
('28', 'Sulawesi Selatan'),
('29', 'Sulawesi Tengah'),
('3', 'Banten'),
('30', 'Sulawesi Tenggara'),
('31', 'Sulawesi Utara'),
('32', 'Sumatera Barat'),
('33', 'Sumatera Selatan'),
('34', 'Sumatera Utara'),
('4', 'Bengkulu'),
('5', 'DI Yogyakarta'),
('6', 'DKI Jakarta'),
('7', 'Gorontalo'),
('8', 'Jambi'),
('9', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(1) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id_status` int(1) NOT NULL,
  `status` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pesanan`
--

INSERT INTO `status_pesanan` (`id_status`, `status`, `deskripsi`) VALUES
(1, 'verifikasi order proses', 'kami masih menunggu konfirmasi pembayaran anda'),
(2, 'order sedang proses', 'pembayaran telah kami terima dan produk pesanan anda, kami siapkan untuk dikirim'),
(3, 'dalam pengiriman', 'order anda sedang dalam pengiriman ke alamat tujuan'),
(4, 'terkirim', 'pesanan telah diterima');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(2) NOT NULL,
  `id_menu` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pembeli`
--

CREATE TABLE `tipe_pembeli` (
  `id_tipe` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(7) NOT NULL,
  `id_role` int(1) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_active` enum('0','1') NOT NULL,
  `kode_email` varchar(7) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_keranjang` (`id_keranjang`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `menu_grup`
--
ALTER TABLE `menu_grup`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tujuan_kirim` (`id_tujuan_kirim`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `tipe_pembeli`
--
ALTER TABLE `tipe_pembeli`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `id_detail` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id_detail` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga_jual`
--
ALTER TABLE `harga_jual`
  MODIFY `id_harga` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_grup`
--
ALTER TABLE `menu_grup`
  MODIFY `id_menu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub_menu` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_pembeli`
--
ALTER TABLE `tipe_pembeli`
  MODIFY `id_tipe` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
