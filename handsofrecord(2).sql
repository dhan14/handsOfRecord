-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 09:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handsofrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id_artist` int(10) NOT NULL,
  `a_namaArtist` varchar(50) NOT NULL,
  `a_userId` int(10) NOT NULL,
  `a_deskripsi` text DEFAULT NULL,
  `a_foto` varchar(255) DEFAULT NULL,
  `a_asal` varchar(100) DEFAULT NULL,
  `a_genre` varchar(50) DEFAULT NULL,
  `a_kodeProfil` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id_artist`, `a_namaArtist`, `a_userId`, `a_deskripsi`, `a_foto`, `a_asal`, `a_genre`, `a_kodeProfil`) VALUES
(1, 'Brainforest', 2, 'Beranggotakan 4 Orang', './upload/artistProfile/brainforest2.jpg', 'Bandung', 'Post Rock', 2),
(2, 'hellaOcupied', 3, 'An Hip Hop Bed Room Producer', './upload/artistProfile/HellaOccupied1.jpg', 'Bandung', 'Hip hop, Trap, Electronic', 3),
(4, 'Mooner', 8, 'Psychedelic Rock ', './upload/artistProfile/mooner1.jpg', 'Bandung', 'Psychedelic Rock ', 8),
(5, 'Cehryl', 9, 'Guitar Addict', './upload/artistProfile/cehryl1.jpg', 'Hongkong', 'Dreampop', 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(1) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'New Release'),
(2, 'Event'),
(3, 'Announcement'),
(4, 'Artist Profile');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(10) NOT NULL,
  `genre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Hip Hop');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id_music` int(10) NOT NULL,
  `m_namaTrack` varchar(50) NOT NULL,
  `m_file` varchar(255) NOT NULL,
  `m_releaseID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `release`
--

CREATE TABLE `release` (
  `id_release` int(10) NOT NULL,
  `re_namaAlbum` varchar(50) DEFAULT NULL,
  `re_namaArtis` varchar(50) DEFAULT NULL,
  `re_deskripsi` text DEFAULT NULL,
  `re_coverArt` varchar(500) DEFAULT NULL,
  `re_fileArsip` varchar(500) DEFAULT NULL,
  `re_genre` int(10) DEFAULT NULL,
  `re_artist` int(10) DEFAULT NULL,
  `re_diupload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `re_muncul` int(1) DEFAULT NULL,
  `re_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `release`
--

INSERT INTO `release` (`id_release`, `re_namaAlbum`, `re_namaArtis`, `re_deskripsi`, `re_coverArt`, `re_fileArsip`, `re_genre`, `re_artist`, `re_diupload`, `re_muncul`, `re_status`) VALUES
(101, 'White Rain(Single Track)', 'Brainforest', 'From Innersoul EP', './upload/releaseCoverArt/InnersoulBf.png', './upload/submission/Track_5_-_Brainforest_-_White_Rain.rar', 1, 1, '2021-09-10 06:47:35', 1, 2),
(103, 'Desolated', 'hellaOcupied', 'Hip Hop Track', './upload/releaseCoverArt/HellaOccupied.jpg', './upload/submission/scrcpy-win64-v1_9.zip', 1, 2, '2021-09-10 06:47:37', 1, 3),
(106, 'Innersoul 2', 'Brainforest', 'Cek', NULL, './upload/submission/Track_5_-_Brainforest_-_White_Rain2.rar', 1, 2, '2021-09-10 06:47:39', 0, 2),
(107, 'Test', 'Brainforest', 'Test Muncul Enggak di halaman web', './upload/releaseCoverArt/brainforest.jpg', './upload/submission/Track_5_-_Brainforest_-_White_Rain3.rar', 1, 2, '2021-09-10 06:52:41', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(1) NOT NULL,
  `r_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `r_name`) VALUES
(1, 'Administrator'),
(2, 'Musisi');

-- --------------------------------------------------------

--
-- Table structure for table `sub_genre`
--

CREATE TABLE `sub_genre` (
  `id_subgenre` int(10) NOT NULL,
  `sg_nama` varchar(25) NOT NULL,
  `sg_idgenre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_genre`
--

INSERT INTO `sub_genre` (`id_subgenre`, `sg_nama`, `sg_idgenre`) VALUES
(1, 'Alternative Rock', 1),
(2, 'Experimental Rock', 1),
(3, 'Psychedelic Rock', 1),
(4, 'Dream Pop', 1),
(5, 'Indie Pop', 2),
(6, 'Synth Pop', 2),
(7, 'Boom Bap', 3),
(8, 'Chill Hop', 3),
(9, 'Trap', 3),
(10, 'Glitch Hop', 3),
(11, 'Post Rock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `u_username` varchar(25) NOT NULL,
  `u_nama` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` text NOT NULL,
  `u_role` int(1) NOT NULL,
  `u_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `u_username`, `u_nama`, `u_email`, `u_pass`, `u_role`, `u_dibuat`) VALUES
(1, 'adminUser', 'Administrator', 'yaqdhan.ariana@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2021-09-08 14:10:06'),
(2, 'brainforest_', 'Brainforest', 'brainforest.bdg@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2021-09-08 14:10:40'),
(3, 'hellaOcupied', 'hellaOcupied', 'hella@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2021-09-10 04:31:46'),
(7, 'admin1', 'Administrator (Kurator)', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2021-09-08 07:37:36'),
(8, 'mooner_bdg', 'Mooner', 'mooner@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2021-09-09 02:57:35'),
(9, 'cehrylChow', 'Cehryl', 'cehryl@mail.com', '4e92596f51de6c887ce77482e5ae1652', 2, '2021-09-09 20:36:54');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `tambahEntriArtist` AFTER INSERT ON `user` FOR EACH ROW BEGIN
IF (NEW.u_role = '2')
THEN
INSERT INTO artist
(`a_namaArtist`, `a_userId`, `a_kodeProfil`)
VALUES (NEW.u_nama,NEW.id_user,NEW.id_user);
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id_artist`),
  ADD KEY `fk_user` (`a_userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`),
  ADD KEY `id_music` (`id_music`,`m_releaseID`),
  ADD KEY `m_releaseID` (`m_releaseID`);

--
-- Indexes for table `release`
--
ALTER TABLE `release`
  ADD PRIMARY KEY (`id_release`),
  ADD KEY `fk_genre` (`re_genre`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sub_genre`
--
ALTER TABLE `sub_genre`
  ADD PRIMARY KEY (`id_subgenre`),
  ADD KEY `sg_idgenre` (`sg_idgenre`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role` (`u_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `release`
--
ALTER TABLE `release`
  MODIFY `id_release` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `sub_genre`
--
ALTER TABLE `sub_genre`
  MODIFY `id_subgenre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`a_userId`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`m_releaseID`) REFERENCES `release` (`id_release`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `release`
--
ALTER TABLE `release`
  ADD CONSTRAINT `release_ibfk_1` FOREIGN KEY (`re_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `release_ibfk_2` FOREIGN KEY (`re_artist`) REFERENCES `artist` (`id_artist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_genre`
--
ALTER TABLE `sub_genre`
  ADD CONSTRAINT `sub_genre_ibfk_1` FOREIGN KEY (`sg_idgenre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`u_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
