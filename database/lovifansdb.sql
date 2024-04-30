-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 03:31 PM
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
  `fcid` text NOT NULL,
  `clabel` text NOT NULL,
  `celoz` varchar(100) NOT NULL,
  `cstat` varchar(1) NOT NULL COMMENT 'aktive, deleted, supensed',
  `cdate` datetime NOT NULL DEFAULT current_timestamp(),
  `cip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fconnect`
--

CREATE TABLE `fconnect` (
  `fcid` int(11) NOT NULL,
  `fiid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fconnect`
--



-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fiid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `finame` varchar(150) NOT NULL,
  `finname` varchar(50) NOT NULL,
  `fitype` varchar(5) NOT NULL COMMENT 'image, video, audio, docs',
  `fistat` varchar(1) NOT NULL COMMENT 'deleted, aktive, suspended',
  `fidate` datetime NOT NULL DEFAULT current_timestamp(),
  `fiip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--



-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `fdate` datetime NOT NULL DEFAULT current_timestamp(),
  `fstat` varchar(1) NOT NULL COMMENT 'dependent, active, inactive, banned',
  `fip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--



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
  `fcid` int(11) NOT NULL,
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ldate` datetime NOT NULL DEFAULT current_timestamp(),
  `lip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ustrid` varchar(100) NOT NULL,
  `mtoid` int(11) NOT NULL,
  `mtostrid` varchar(100) NOT NULL,
  `fcid` text NOT NULL,
  `mlabel` text NOT NULL,
  `meloz` varchar(100) DEFAULT NULL,
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


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `plabel` text NOT NULL,
  `fcid` text DEFAULT NULL,
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
  `bicid` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`uid`, `icid`, `bicid`, `ustrid`, `uname`, `umail`, `upass`, `ustat`, `udate`, `ucom`, `uip`) VALUES
(16, NULL, NULL, 'upqiliFaNQ0RztCfNvjf', 'tesztsub1', 'teszt1@lovifans.com', '$2y$12$qxtsTi37W5InD1iD/TB5Cu8KgIr/Dr0F9536vvnvNjAzDpSTYFmlK', 'A,2024-03-13 20:25:53', '2024-03-08 17:06:44', NULL, '::1'),
(17, NULL, NULL, '4HlcOgtudoIqPvh36osi', 'tesztsub2', 'teszt2@lovifans.com', '$2y$12$1FOgkeWNxfWtkOp.MGWGY.dAK3uu4YRmVF2.HIgqW0U6DSFrn5OlW', 'A,2024-03-13 17:29:13', '2024-03-08 17:07:37', NULL, '::1'),


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
-- Indexes for table `fconnect`
--
ALTER TABLE `fconnect`
  ADD PRIMARY KEY (`fcid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fiid`);

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
-- AUTO_INCREMENT for table `fconnect`
--
ALTER TABLE `fconnect`
  MODIFY `fcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `pwid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
