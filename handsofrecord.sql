-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 07:08 PM
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
  `a_userId` int(10) DEFAULT NULL,
  `a_deskripsi` text NOT NULL,
  `a_foto` varchar(255) NOT NULL,
  `a_asal` varchar(100) NOT NULL,
  `a_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id_artist`, `a_namaArtist`, `a_userId`, `a_deskripsi`, `a_foto`, `a_asal`, `a_genre`) VALUES
(1, 'Brainforest', 2, 'Dibentuk tahun 2018 beranggotakan 4 orang:\r\nDhan(Gitar),Roemi(Bass),Mahendra(Gitar),Andi(Drum).', 'upload/artistProfile/brainforest.jpg', 'Bandung', 'Post Rock');

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `n_judul` varchar(128) NOT NULL,
  `n_category` int(11) NOT NULL,
  `n_userID` int(11) NOT NULL,
  `n_slug` varchar(128) NOT NULL,
  `n_body` text NOT NULL,
  `n_image` varchar(255) NOT NULL,
  `n_createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `n_editedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `n_judul`, `n_category`, `n_userID`, `n_slug`, `n_body`, `n_image`, `n_createdAt`, `n_editedAt`) VALUES
(1, 'Brainforest merilis album untuk pertama kalinya', 1, 1, 'brainforest-rilis-album', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et molestie eros. Maecenas dignissim, erat at faucibus finibus, nunc nibh finibus lacus, sed gravida leo urna at erat. Proin et efficitur dolor, eget interdum enim. Cras nec ante quis tellus gravida ornare. Duis arcu lacus, elementum quis iaculis id, mattis ut turpis. Pellentesque id dignissim dolor. Curabitur finibus facilisis pulvinar. Nullam urna arcu, malesuada a purus a, pharetra pulvinar lacus. Curabitur quis ornare felis, ut ultrices nulla.</p>\r\n\r\n<p>Fusce placerat aliquam erat, et sagittis diam accumsan vitae. In elementum vel augue sit amet bibendum. Nulla cursus elit metus. Ut auctor nisl quis bibendum tincidunt. Integer gravida nisi id urna rhoncus, nec tristique magna efficitur. Mauris non blandit ipsum, ut tempus purus. Praesent rhoncus gravida aliquam. Nulla finibus mi id fermentum fringilla. Morbi volutpat, massa eget sodales tempus, est risus elementum leo, pulvinar fermentum diam nibh a mi. Phasellus porttitor vitae mauris non elementum. Sed ut lacinia sapien. Proin a metus ullamcorper lectus ultricies euismod. Donec vitae turpis eros. Morbi at imperdiet ligula. Mauris sed rutrum lectus. Phasellus eget nulla congue, dictum dolor ac, dapibus justo.</p>\r\n', 'upload/releaseCoverArt/InnersoulBf.png', '2021-09-03 06:55:26', '2021-09-03 06:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `release`
--

CREATE TABLE `release` (
  `id_release` int(10) NOT NULL,
  `re_namaAlbum` varchar(50) NOT NULL,
  `re_deskripsi` text NOT NULL,
  `re_coverArt` varchar(100) NOT NULL,
  `re_fileArsip` varchar(500) NOT NULL,
  `re_genre` int(10) NOT NULL,
  `re_artist` int(10) NOT NULL,
  `re_diupload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `release`
--

INSERT INTO `release` (`id_release`, `re_namaAlbum`, `re_deskripsi`, `re_coverArt`, `re_fileArsip`, `re_genre`, `re_artist`, `re_diupload`) VALUES
(1, 'White Rain(Single)', 'Single', 'upload/releaseCoverArt/InnersoulBf.png', 'upload/fileArsip/Track 5 - Brainforest - White Rain.mp3', 1, 1, '2021-08-28 02:43:17');

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
(1, 'adminUser', 'Administrator', 'yaqdhan.ariana@gmail.com', '$2y$10$I.nMSWqf9hO2JMTpopmjH.DPqjahwH6hlRHHoytfGe07cmCbZcKGm', 1, '2021-08-28 00:09:22'),
(2, 'brainforest_', 'Brainforest', 'brainforest.bdg@gmail.com', '$2y$10$mXLn5/UbVRtaWIyE8UR9Kudy2dVHI1g0rTCLanwnu1Kja97OMqC26', 2, '2021-08-28 00:09:22');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `n_category` (`n_category`),
  ADD KEY `n_userID` (`n_userID`);

--
-- Indexes for table `release`
--
ALTER TABLE `release`
  ADD PRIMARY KEY (`id_release`),
  ADD KEY `fk_genre` (`re_genre`),
  ADD KEY `fk_artist` (`re_artist`);

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
  MODIFY `id_artist` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_music` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `release`
--
ALTER TABLE `release`
  MODIFY `id_release` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_genre`
--
ALTER TABLE `sub_genre`
  MODIFY `id_subgenre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`n_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`n_userID`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
