-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 07:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ones`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date_con` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date_con`) VALUES
(101, 'Ronaldo2€', 'Admin245', 'Hallo', '2020-03-05 08:33:24'),
(102, 'Admin123$', 'Admin245', 'Cool', '2020-03-05 08:33:32'),
(103, 'Admin123$', 'Admin245', 'Hallo', '2020-03-05 08:44:51'),
(104, 'Admin123$', 'Admin245', 'What', '2020-03-05 08:44:59'),
(105, 'Ronaldo2€', 'Admin245', 'Hi', '2020-03-05 08:45:29'),
(106, 'Ronaldo2€', 'Admin245', 'Hallo', '2020-03-05 08:45:43'),
(107, 'Admin123$', 'Admin245', 'Hola', '2020-03-05 08:45:50'),
(108, 'Admin123$', 'Admin245', 'asdasd', '2020-03-05 15:11:14'),
(109, 'Ronaldo2€', 'Admin245', 'da', '2020-03-05 15:11:19'),
(110, 'Ronaldo2€', 'Admin245', 'asdasd', '2020-03-05 15:32:48'),
(111, 'Admin245', 'Admin123$', 'Hi', '2020-03-05 17:08:28'),
(112, 'Ronaldo2€', 'Admin123$', 'HI', '2020-03-05 17:08:41'),
(113, 'Admin245', 'Admin123$', 'asd', '2020-03-05 17:08:47'),
(114, 'Admin245', 'Admin123$', 'As', '2020-03-05 17:30:50'),
(115, 'Ronaldo2€', 'Admin123$', 'sf', '2020-03-05 17:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `numberpost` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `numberpost`, `image`) VALUES
(178, 'Hallo', 'Admin245', 'none', '2020-03-04 23:41:45', 2, ''),
(179, 'Hallo', 'Admin245', 'none', '2020-03-04 23:50:31', 4, ''),
(180, '<br><iframe width=\'520\' height=\'340\' src=\'https://www.youtube.com/embed/QhBnZ6NPOY0\'></iframe><br>', 'Admin245', 'none', '2020-03-04 23:52:48', 4, ''),
(181, 'Best Video', 'Admin245', 'none', '2020-03-04 23:53:29', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `klasse` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL,
  `checked` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `klasse`, `date`, `token`, `checked`) VALUES
(29, 'Admin123', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'sacas@dcask.com', '5AHITN', '2020-02-06 19:14:51', '', 'yes'),
(30, 'Admin245', 'd8648d685d312fbac211faff6ba627b1', 'admin2@admin2.com', '1AHIT', '2020-02-07 17:31:52', '', 'yes'),
(38, 'Admin123$', 'ca762676c74f1b27011e944093b7e929', 'dfdCoools@co.com', '1AHIF', '2020-02-06 19:15:40', '', 'yes'),
(81, 'Testitel123$', '2173bb2d9edd929fb8f002f388bc11bf', 'asdunjc@ncicoa.com', '2AHEL', '2020-02-14 10:01:24', '1ab8379a1b41063ec4b3752968cf03cc504960d45828c4d4f53f12e9c447c6b11609434f4449986737d53c1a8f0ea6764dd73ee69e41426914008c52e9bb843c', 'yes'),
(82, 'Messi123$', 'a55b7bd05085d9972f4bbd8bded29df9', 'kevin.joseph@studierende.htl-donaustadt.at', '4AHEL', '2020-02-07 17:28:35', 'b15319c02ef6ca5ceb1143c01e3b72342197a07d42e1ab190534baf800a2de53e6f9556143c7fa18b612cab2749cbcb05f4b6556dd21aba4c37a030cf0443238', 'yes'),
(83, 'Ronaldo2€', 'da7cb9ae6d8758b6cf7323481b614728', 'kevin.joseph@studierende.htl-donaustadt.at', '5AHITN', '2020-02-07 17:28:43', 'd2293dc0531a387f2835fcbda5bdbf2e8e4e64411ebc7f97973ecc976d96a122a368d5fc2897cd663472eef4c569a1069d4c31a16048ec971a73d10bd7efd08f', 'yes'),
(84, 'TrumpU$4ever', '378082f01a53e5e0d096bcfe386fbaa2', 'kevin.joseph@studierende.htl-donaustadt.at', '3AHET', '2020-02-07 17:29:45', 'ae445d45cb4de8b5968f01ddc2af7ec7f62b2d49a54a92145458069b7183fd582fb6b5e9eb4fec4010fc95ab99566c8ad8d9e5c5a9f1f2fefecd38d01a74e418', 'yes'),
(85, 'USTrump123$', '6821804e4060058e15ffea1f006d7b1f', 'kevin.joseph@studierende.htl-donaustadt.at', '2AHET', '2020-02-12 10:04:29', '2b8935a64d869952765fc705625f8e5f1ea69d69b164aab19384dd552ff20b21c53f2c6e9808657f0a789ca7cd2ed76490fc59dc0d6fe1db428502cb9d897b07', 'no'),
(92, 'ben1150', '03bd1b6ea0887524fa631907c9be45cb', 'ben-daniel.Royong@studierende.htl-donaustadt.at', '5AHITN', '2020-02-14 12:05:40', '5177b87aa8f9e591d3e1f7336ca3304ab99bdc71bc010e76654856c2fa98192ea45118f4f2c923d6d32350593d7991e8bdfbe8228ca4e598339cc43bb3a8b8c5', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
