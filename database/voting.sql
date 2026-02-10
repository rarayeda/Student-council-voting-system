-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2026 at 10:30 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_calon`
--

CREATE TABLE `data_calon` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama` varchar(65) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `suara` int(20) DEFAULT '0',
  `periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_calon`
--

INSERT INTO `data_calon` (`id`, `foto`, `nama`, `visi`, `misi`, `suara`, `periode`) VALUES
(1, 'http://localhost/www/pemiloss/img/657fa350835ee_hirotaka.jpg', 'Hirotaka Nifuji', '        Menjadi wadah bagi siswa untuk mengembangkan segala potensi yang ada sehingga terbentuk siswa yang cerdas, kreatif, dinamis, berprestasi, dan berakhlak mulia. Kemudian, diharapkan bisa menjaga nama baik sekolah menuju sekolah yang unggul di tingkat nasional.', '        Membentuk karakater pengurus yang cerdas dan solid dan Melaksanakan kegiatan yang dapat meningkatkan hubungan positif antarguruÂ danÂ siswa.', 3, '2023'),
(2, 'http://localhost/www/pemiloss/img/657fa3b05e6b5_kenma.jpg', 'Kenma Kozume', '   Bukan hanya mempertahankan prestasi di sekolah tetapi juga meningkatkan kepribadian dan kebersamaan yang lebih baik', '   Menyerap pendapat dan aspirasi dari warga sekolah, memperhatikan atau mengadakan program sosialisasi untuk meningkatkan kepribadian, meningkatkan dan mempertahankan sanksi yang berupa edukasi bagi siswa yang melanggar tata tertib, mempertahankan kerja OSIS menjadi lebih baik dari sebelumnya dan lebih bertanggung jawab.', 13, '2023'),
(3, 'http://localhost/www/pemiloss/img/657fa3c753bf2_yamada.jpg', 'Yamada Akito', '   Mendorong siswa agar mampu untuk mengasah potensinya sendiri berdasarkan kreativitas yang telah diberikan Tuhan kepadanya.', '   Mengutamakan Ketuhanan Yang Maha Esa dalam segala aspek dan Merangkul dan menjalin hubungan yang baik antar civitas akademik dalam setiap program kerja dan jugaÂ keseharian.', 4, '2023'),
(14, 'http://localhost/www/pemiloss/img/657f927400971_orang1.jpeg', 'Kualix Juah', 'Menjadi pelajar yang peduli terhadap pengembangan kualitas sumber daya manusia di bidang kerohanian, pengabdian masyarakat, pelajaran, dan perkembangan teknologi terkini.', 'Membentuk wadah belajar kelompok terpadu bagi siswa. Menyelenggarakan perlombaan yang mendidik. ', 0, '2024'),
(15, 'http://localhost/www/pemiloss/img/657f92b535282_orang1.jpeg', 'Steven Simanjuntak', 'Menjadi pelajar yang peduli terhadap pengembangan kualitas sumber daya manusia di bidang kerohanian, pengabdian masyarakat, pelajaran, dan perkembangan teknologi terkini.', 'Membentuk wadah belajar kelompok terpadu bagi siswa. Menyelenggarakan perlombaan yang mendidik. ', 0, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(65) NOT NULL,
  `nama_siswa` varchar(65) NOT NULL,
  `kelas_siswa` varchar(56) NOT NULL,
  `memilih` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nisn`, `nama_siswa`, `kelas_siswa`, `memilih`) VALUES
(1, '100R211', 'Akhmad Saputra', 'XII RPL', 1),
(2, '100R212', 'Andhika Bhayangkari', 'XII RPL', 0),
(3, '100R213', 'Fadzill Rahman Wijaya', 'XII RPL', 0),
(4, '100R214', 'Hendra Jayasa', 'XII RPL', 0),
(5, '100R215', 'Junior Ibrahim Putra', 'XII RPL', 0),
(6, '100R216', 'Leora Karinina Levani', 'XII RPL', 0),
(7, '100R217', 'Lestri Astuti', 'XII RPL', 0),
(8, '100R218', 'Lutfi Agisna', 'XII RPL', 1),
(9, '100R219', 'Muhammad Hugo Atha Farrel', 'XII RPL', 0),
(10, '100R220', 'Muhammad Juanda Rukmana', 'XII RPL', 0),
(11, '100R221', 'Muhammad Arya Firdaus', 'XII RPL', 0),
(12, '100R222', 'Muhammad Arip', 'XII RPL', 0),
(13, '100R223', 'Muhammad Fadil', 'XII RPL', 0),
(14, '100R224', 'Muhammad Rizqi Renaldy', 'XII RPL', 0),
(15, '100R225', 'Rayeda Noor Leila', 'XII RPL', 1),
(16, '100R226', 'Saidil Mifdal', 'XII RPL', 0),
(17, '100R227', 'Sopyan Adhari', 'XII RPL', 0),
(18, '100R228', 'Sri Hidayati', 'XII RPL', 0),
(205, '100F111', 'ADELIA NAZWA', 'XII FKK', 0),
(206, '100F112', 'AKHMAD AIDIL AKBAR', 'XII FKK', 0),
(207, '100F113', 'AULIA AMALIA PUTRI', 'XII FKK', 0),
(208, '100F114', 'DEWI NATASYA', 'XII FKK', 0),
(209, '100F115', 'DIMAS REFA FERDIANSYAH', 'XII FKK', 0),
(210, '100F116', 'ELSYA AZIZA', 'XII FKK', 0),
(211, '100F117', 'FIRDA NABILA ANWAR', 'XII FKK', 0),
(212, '100F118', 'IDZLAL EMELIA', 'XII FKK', 0),
(213, '100F119', 'MAULIDA SARI', 'XII FKK', 0),
(214, '100F120', 'MUHAMMAD AZRIEL DEDAT', 'XII FKK', 0),
(215, '100F121', 'MUHAMMAD BAMBANG FIRDAUS', 'XII FKK', 0),
(216, '100F122', 'MUHAMMAD FERRY ADITYO', 'XII FKK', 0),
(217, '100F123', 'MUHAMMAD RADITIA HARIZKI', 'XII FKK', 0),
(218, '100F124', 'MUHAMMAD RAFLI ISLAMI', 'XII FKK', 0),
(219, '100F125', 'MUHAMMAD RIF AT RAMADHAN', 'XII FKK', 0),
(220, '100F126', 'MUHAMMAD SYIFA APRIZAL', 'XII FKK', 0),
(221, '100F127', 'MUTHIA AMANDA', 'XII FKK', 0),
(222, '100F128', 'NABILA NOOR MUHYIDA', 'XII FKK', 0),
(223, '100F129', 'NAIFAH AZZAHRA', 'XII FKK', 0),
(224, '100F130', 'NAILY MUNA', 'XII FKK', 0),
(225, '100F131', 'NIHA QIROA NASHWA', 'XII FKK', 0),
(226, '100F132', 'NOOR FADILLAH APRILIANTI', 'XII FKK', 0),
(227, '100F133', 'NOVITA RATIH SAFITRI', 'XII FKK', 0),
(228, '100F134', 'NUR IJATIL NAZWA', 'XII FKK', 0),
(229, '100F135', 'NURUL HAFIFAH', 'XII FKK', 0),
(230, '100F136', 'RAHMAD HIDAYAT', 'XII FKK', 0),
(231, '100F137', 'RAHMANIAH', 'XII FKK', 0),
(233, '100F139', 'RENANDA LINGGA PRATIWI', 'XII FKK', 0),
(234, '100F140', 'SAILILLAH SAIRUS SAUFA', 'XII FKK', 0),
(235, '100F141', 'SALSABILA AZZAHRA', 'XII FKK', 0),
(236, '100F142', 'SELFI AMELIA', 'XII FKK', 0),
(237, '100F143', 'YOLANDA PUTRI PURNOMO', 'XII FKK', 0),
(238, '100F144', 'ZAHRA NOVARIANA T', 'XII FKK', 0),
(239, '100F145', 'AHMAD ALDI', 'XII FKK', 0),
(240, '100F146', 'AHMAD ALHAMSANI', 'XII FKK', 0),
(241, '100F147', 'AHMAD HABIBI', 'XII FKK', 0),
(242, '100F148', 'ALVIRA RAHMAH', 'XII FKK', 0),
(243, '100F149', 'AMINAH', 'XII FKK', 0),
(244, '100F150', 'ANDI SHOFIA NUR ATIQAH', 'XII FKK', 0),
(245, '100F151', 'ANI RAMADHANI', 'XII FKK', 0),
(246, '100F152', 'ANNISA RAIHANA HUMAIRO', 'XII FKK', 0),
(247, '100F153', 'AZ ZAHRA AMELIA PUTRI', 'XII FKK', 0),
(248, '100F154', 'DARYN KURNIAWAN', 'XII FKK', 0),
(249, '100F155', 'DESWINA', 'XII FKK', 0),
(250, '100F156', 'DHEA YUNI LOVA', 'XII FKK', 0),
(251, '100F157', 'DIKA AVIERLA DHIYALUTHFYANADA', 'XII FKK', 0),
(252, '100F158', 'ERNESYA DAVIUS DUMA KANO', 'XII FKK', 0),
(253, '100F159', 'FAZIRA NAJLA AZWA RIFDA', 'XII FKK', 0),
(254, '100F160', 'JULIA AZEMA HADINA', 'XII FKK', 0),
(255, '100F161', 'MAHENDRA MAULANA FATHIH', 'XII FKK', 0),
(256, '100F162', 'MARSYANDA AUGUSTINA NURZHARIFAH', 'XII FKK', 0),
(257, '100F163', 'MELDA DEWANTI', 'XII FKK', 0),
(258, '100F164', 'MOCHAMMAD RIZKY NOR ROSID', 'XII FKK', 0),
(259, '100F165', 'MUHAMAD DIVA AFRIZAL', 'XII FKK', 0),
(260, '100F166', 'MUHAMMAD ARSYADI', 'XII FKK', 0),
(261, '100F167', 'MUHAMMAD AZMI', 'XII FKK', 0),
(262, '100F168', 'NORLINA', 'XII FKK', 0),
(263, '100F169', 'NUR ALFA RAKHA', 'XII FKK', 0),
(264, '100F170', 'RADITA FATIHA', 'XII FKK', 0),
(265, '100F171', 'RINDIKA CAHYANI HARIYANTO', 'XII FKK', 0),
(266, '100F172', 'RYASHI PASKAHAYANI', 'XII FKK', 0),
(267, '100F173', 'SAHYA HITA SYAMAGATA', 'XII FKK', 0),
(268, '100F174', 'SANTIE NAYSILLA AGUSTINA', 'XII FKK', 0),
(269, '100F175', 'SERLY PRIYANTI', 'XII FKK', 0),
(270, '100F176', 'SITI NUR HALIMAH', 'XII FKK', 0),
(271, '100F177', 'SOPHIA ELIANI', 'XII FKK', 0),
(272, '100F178', 'YASYFA MAULIDA', 'XII FKK', 0),
(273, '100F179', 'YURI FEBRIANA YESYURUN', 'XII FKK', 0),
(274, '100R211', 'AKHMAD SAPUTRA', 'XII RPL', 1),
(275, '100R212', 'ANDHIKA BHAYANGKARI', 'XII RPL', 0),
(276, '100R213', 'FADZILL RAHMAN WIJAYA', 'XII RPL', 0),
(277, '100R214', 'HENDRA JAYASA', 'XII RPL', 0),
(278, '100R215', 'JUNIOR IBRAHIM PUTRA', 'XII RPL', 0),
(279, '100R216', 'LEORA KARININA LEVANI', 'XII RPL', 0),
(280, '100R217', 'LESTRI ASTUTI', 'XII RPL', 0),
(281, '100R218', 'LUTFI AGISNA', 'XII RPL', 1),
(282, '100R219', 'MUHAMMAD HUGO ATHA FARREL', 'XII RPL', 0),
(283, '100R220', 'MUHAMMAD JUANDA RUKMANA', 'XII RPL', 0),
(284, '100R221', ' MUHAMMAD ARYA FIRDAUS', 'XII RPL', 0),
(285, '100R222', ' MUHAMMAD FADIL', 'XII RPL', 0),
(286, '100R223', ' MUHAMMAD RIZQI RENALDY', 'XII RPL', 0),
(287, '100R224', 'RAYEDA NOOR LEILA', 'XII RPL', 0),
(288, '100R225', 'SAIDIL MIFDAL', 'XII RPL', 2),
(289, '100R226', 'SOPYAN ADHARI', 'XII RPL', 0),
(290, '100R228', 'SRI HIDAYATI', 'XII RPL', 0),
(291, '100K311', 'ADELIA HUMAIRA', 'XII TKKR', 0),
(292, '100K311', 'DESI NOPERIANI', 'XII TKKR', 0),
(293, '100K312', 'ERMA RUSSANAH', 'XII TKKR', 0),
(294, '100K313', 'HENNY MUTIA AUDA', 'XII TKKR', 0),
(295, '100K314', 'ISA LOVELYTA APRILYA', 'XII TKKR', 0),
(296, '100K315', 'KHAIRIAH', 'XII TKKR', 0),
(297, '100K316', 'NAZWA FITRIANI', 'XII TKKR', 0),
(298, '100K317', 'NOVA AULIA', 'XII TKKR', 0),
(299, '100K318', 'NUR BELLA ARIANTI', 'XII TKKR', 0),
(300, '100K319', 'SA DAH', 'XII TKKR', 0),
(301, '100K320', 'SALEHAH', 'XII TKKR', 0),
(302, '100K321', 'SUCI FATIHA', 'XII TKKR', 0),
(303, '100K322', 'WIDIA ASTUTI', 'XII TKKR', 0),
(304, '100K323', 'YISKA NUANSA PUTRI', 'XII TKKR', 0),
(305, 'R20015', 'gggg', 'xii rpl', 1),
(306, 'r777777', 'jjjjjjjj', 'kkkkkkkkkkk', 0),
(307, '100R300', 'raye', 'xi rpl', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_calon`
--
ALTER TABLE `data_calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_calon`
--
ALTER TABLE `data_calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
