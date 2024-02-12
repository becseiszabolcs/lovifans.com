-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 07:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovifansdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `clabel` text NOT NULL,
  `icid` int(11) NOT NULL,
  `celoz` varchar(100) NOT NULL,
  `cstat` varchar(1) NOT NULL COMMENT 'aktive, deleted, supensed',
  `cdate` datetime NOT NULL DEFAULT current_timestamp(),
  `cip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `fdate` datetime NOT NULL DEFAULT current_timestamp(),
  `fstat` varchar(1) NOT NULL COMMENT 'dependent, aktive, banned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gpconnect`
--

CREATE TABLE `gpconnect` (
  `gpid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `gmid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gname` varchar(30) NOT NULL,
  `gimg` int(11) NOT NULL,
  `gback` int(11) NOT NULL,
  `gstat` varchar(1) NOT NULL COMMENT 'deleted, aktive, suspended',
  `gdate` datetime NOT NULL DEFAULT current_timestamp(),
  `gip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `gmid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gmname` int(11) NOT NULL,
  `gmdate` int(11) NOT NULL,
  `gmstat` int(11) NOT NULL,
  `gmip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `iname` varchar(150) NOT NULL,
  `inname` varchar(50) NOT NULL,
  `istat` varchar(1) NOT NULL COMMENT 'deleted, aktive, suspended',
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `iip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imgconnect`
--

CREATE TABLE `imgconnect` (
  `icid` int(11) NOT NULL,
  `iid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ldate` datetime NOT NULL DEFAULT current_timestamp(),
  `lip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uid`, `ldate`, `lip`) VALUES
(1, 1, '2024-01-04 02:59:45', '127.0.0.1'),
(2, 1, '2024-01-05 13:23:49', '::1'),
(3, 1, '2024-01-05 17:27:00', '127.0.0.1'),
(4, 2, '2024-01-05 17:43:17', '::1'),
(5, 1, '2024-01-22 21:18:01', '127.0.0.1'),
(6, 1, '2024-01-22 22:18:57', '127.0.0.1'),
(7, 1, '2024-01-22 23:03:11', '127.0.0.1'),
(8, 1, '2024-01-23 00:33:28', '127.0.0.1'),
(9, 1, '2024-01-23 01:48:44', '127.0.0.1'),
(10, 1, '2024-01-23 01:50:41', '127.0.0.1'),
(11, 1, '2024-01-26 16:51:20', '127.0.0.1'),
(12, 1, '2024-01-26 16:57:38', '127.0.0.1'),
(13, 1, '2024-01-26 16:59:01', '127.0.0.1'),
(14, 1, '2024-01-27 12:51:38', '127.0.0.1'),
(15, 1, '2024-01-27 14:06:56', '127.0.0.1'),
(16, 1, '2024-01-28 12:03:47', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `mtoid` int(11) NOT NULL,
  `mlabel` text NOT NULL,
  `icid` int(11) DEFAULT NULL,
  `meloz` varchar(100) NOT NULL,
  `mstat` varchar(1) NOT NULL COMMENT 'aktive, deleted, suspensed',
  `mdate` datetime NOT NULL DEFAULT current_timestamp(),
  `mip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `nid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `nurl` varchar(255) NOT NULL,
  `ndate` datetime NOT NULL DEFAULT current_timestamp(),
  `nip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`nid`, `lid`, `nurl`, `ndate`, `nip`) VALUES
(1, 1, '/lovifans.com/pages/login_ir.php', '2024-01-04 02:59:45', '127.0.0.1'),
(2, 1, '/lovifans.com/pages/logout.php', '2024-01-04 02:59:55', '127.0.0.1'),
(3, 2, '/lovifans.com/pages/login_ir.php', '2024-01-05 13:23:49', '::1'),
(4, 3, '/lovifans.com/pages/login_ir.php', '2024-01-05 17:27:00', '127.0.0.1'),
(5, 3, '/lovifans.com/pages/logout.php', '2024-01-05 17:27:06', '127.0.0.1'),
(6, 4, '/lovifans.com/pages/login_ir.php', '2024-01-05 17:43:17', '::1'),
(7, 4, '/lovifans.com/pages/logout.php', '2024-01-05 17:43:47', '::1'),
(8, 5, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-22 21:18:01', '127.0.0.1'),
(9, 6, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-22 22:18:57', '127.0.0.1'),
(10, 7, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-22 23:03:11', '127.0.0.1'),
(11, 8, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-23 00:33:28', '127.0.0.1'),
(12, 9, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-23 01:48:44', '127.0.0.1'),
(13, 9, '/lovifans.com/pages/loged/logout.php', '2024-01-23 01:48:47', '127.0.0.1'),
(14, 10, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-23 01:50:41', '127.0.0.1'),
(15, 10, '/lovifans.com/pages/loged/logout.php', '2024-01-23 01:50:45', '127.0.0.1'),
(16, 11, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-26 16:51:20', '127.0.0.1'),
(17, 11, '/lovifans.com/pages/loged/logout.php', '2024-01-26 16:57:12', '127.0.0.1'),
(18, 12, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-26 16:57:38', '127.0.0.1'),
(19, 13, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-26 16:59:01', '127.0.0.1'),
(20, 14, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-27 12:51:38', '127.0.0.1'),
(21, 15, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-27 14:06:56', '127.0.0.1'),
(22, 16, '/lovifans.com/pages/unloged/login_ir.php', '2024-01-28 12:03:47', '127.0.0.1'),
(23, 16, '/lovifans.com/pages/loged/logout.php', '2024-01-28 14:28:09', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `pwid` int(11) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `ustrid` varchar(20) NOT NULL,
  `previous_pw` varchar(60) NOT NULL,
  `token` varchar(64) NOT NULL,
  `token_expires_at` datetime NOT NULL,
  `pwstat` varchar(1) NOT NULL COMMENT 'active, used',
  `pwip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pass_reset`
--

INSERT INTO `pass_reset` (`pwid`, `umail`, `ustrid`, `previous_pw`, `token`, `token_expires_at`, `pwstat`, `pwip`) VALUES
(6, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'a88a698e64085b03941f0936e1b53619fb99a53c3de83cfea6aca47142d0344c', '2024-01-04 03:15:24', 'U', '127.0.0.1'),
(7, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '509afec7a6fbf705dcd0dba840dcf1c7b086e64bb0cb59e5c5a41e22f7c2e312', '2024-01-04 03:24:30', 'U', '127.0.0.1'),
(8, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '81a8094dbb78c06e9aa4aa0dbb07885c0aa34d4dc368b3acc0730e27101cdaca', '2024-01-05 13:37:36', 'U', '127.0.0.1'),
(9, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'c428415565c376fe390e4d20d494d8dbe4dffcb8bb439f644a4f489b1e647abd', '2024-01-13 11:10:57', 'U', '127.0.0.1'),
(10, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '8ee344087cc809a9d9cfaafb8f073b6a08b273b929dde25e78de2529cc867b31', '2024-01-13 11:13:46', 'U', '127.0.0.1'),
(11, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '866400d6d288265dd7702e825404a8c2640643db5bff59446eb99ca4dbcfbb69', '2024-01-13 11:14:54', 'U', '127.0.0.1'),
(12, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '2dd44d191de2fa1818722877c4766a01229525736db44bae61c1a127b11400a9', '2024-01-13 11:16:45', 'U', '127.0.0.1'),
(13, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '43a0e8f8ee5beae00e66a69459dba112d1151bad8c2351e5a544049768faa3ed', '2024-01-13 11:17:11', 'U', '127.0.0.1'),
(14, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '0abd791c4826ba71b38c04af5b0042ba8c58a1772f804e815f5547aca8b9f905', '2024-01-14 20:08:26', 'U', '127.0.0.1'),
(15, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'c939743de6cd796df78fb9c70fe21effbb343eb7200d6e7967a4fa29761c2abd', '2024-01-14 20:09:59', 'U', '127.0.0.1'),
(16, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '1b1b78828f53837fa4fae93c841e718d70a8f87e6bebd0e4a88a022e3a48937a', '2024-01-17 18:40:39', 'U', '127.0.0.1'),
(17, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '394b530b48bfbceed48cce77b8a110926ef09280de7c415a4cec29a64a5c4e90', '2024-01-17 20:06:46', 'U', '127.0.0.1'),
(18, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '9ef267ad1b212310e38846bea285f0581448d3c77d378897cfe4225630ad5674', '2024-01-17 20:08:47', 'U', '127.0.0.1'),
(19, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '47cf2a68588e2b45adafa8b25c74ecaec36c323cb837e6df5ea9b7679027ab6f', '2024-01-18 19:55:27', 'U', '127.0.0.1'),
(20, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '64b4082c58aefbde8b928046cbb049fa3d232873605b9d29147814567d3318bc', '2024-01-22 21:05:03', 'U', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `plabel` text NOT NULL,
  `icid` int(11) DEFAULT NULL,
  `peloz` varchar(100) NOT NULL,
  `pstat` varchar(1) NOT NULL COMMENT 'deleted, aktive, suspensed',
  `pdate` datetime NOT NULL DEFAULT current_timestamp(),
  `pip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rtable` varchar(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `react` int(11) NOT NULL,
  `rdate` datetime NOT NULL DEFAULT current_timestamp(),
  `rip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `icid` int(11) DEFAULT NULL,
  `ustrid` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `upass` varchar(60) NOT NULL,
  `ustat` varchar(21) NOT NULL COMMENT '(deleted, suspensed, aktiv),\r\n(never_loged_in, lasttime, online)',
  `udate` datetime NOT NULL DEFAULT current_timestamp(),
  `ucom` text DEFAULT NULL,
  `uip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `icid`, `ustrid`, `uname`, `umail`, `upass`, `ustat`, `udate`, `ucom`, `uip`) VALUES
(1, NULL, 'AmIEBqm06lHerdvIlt9h', 'helloka', 'becsei.szabi@gmail.com', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'A, NLI', '2024-01-04 01:36:50', NULL, '127.0.0.1'),
(5, NULL, '8NSGWAVrF8J5DKHvn51u', 'kakukosmadár', 'mr.vendeg748@gmail.com', '$2y$12$IL5mGjffdleDWml11rak2.2mV6YHIR4OHJpDI0PlADVOr9d3fseqW', 'A, NLI', '2024-01-05 18:00:47', NULL, '127.0.0.1'),
(6, NULL, 'fE9m9Oy603NLQyGh15xP', 'kauk', 'mr.vendeg748@gmail.com', '$2y$12$rzll7uHm9R2EkN7qgN2Eo.DA8gf5tt/iGwdHTRq54To2o1num5LMi', 'A, NLI', '2024-01-05 18:02:09', NULL, '127.0.0.1'),
(7, NULL, '6Hs11RMF2n4QMdamKkCz', 'kakukos', 'mr.vendeg748@gmail.com', '$2y$12$GyQPbd7odhbGeopQSsRmxO736t4CIFRcJlJPqwyJkKFnppurZOHL2', 'A, NLI', '2024-01-05 18:05:00', NULL, '127.0.0.1'),
(8, NULL, 'Yuzv1GC0wlgV5m9s3oVQ', 'kukac', 'mr.vendeg748@gmail.com', '$2y$12$AGAhVER3kt4bL.5rWuWbaexoE.R2Xin38yOv8KhTiwWM723I.ZNlC', 'A, NLI', '2024-01-05 18:08:41', NULL, '127.0.0.1'),
(9, NULL, 'IDMouIORZxEQFRfYhBvs', 'kkkkkkk', 'kkkkkkkkkkkk@gmail.com', '$2y$12$R1PoT/1vH0iJTAnZyf0fbOJhXu6xDivehm26V2Ll2XUgBwEeAnooi', 'A, NLI', '2024-01-05 18:12:52', NULL, '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `gpconnect`
--
ALTER TABLE `gpconnect`
  ADD PRIMARY KEY (`gpid`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `groupmember`
--
ALTER TABLE `groupmember`
  ADD PRIMARY KEY (`gmid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `imgconnect`
--
ALTER TABLE `imgconnect`
  ADD PRIMARY KEY (`icid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`pwid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpconnect`
--
ALTER TABLE `gpconnect`
  MODIFY `gpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupmember`
--
ALTER TABLE `groupmember`
  MODIFY `gmid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imgconnect`
--
ALTER TABLE `imgconnect`
  MODIFY `icid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `pwid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
