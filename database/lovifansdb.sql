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

INSERT INTO `fconnect` (`fcid`, `fiid`) VALUES
(6, 7);

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

INSERT INTO `files` (`fiid`, `uid`, `finame`, `finname`, `fitype`, `fistat`, `fidate`, `fiip`) VALUES
(7, 1, 'retro-gaming.jpg', '150903AmIEBqm06lHerdvIlt9h0.jpg', 'image', 'A', '2024-04-05 15:09:03', '::1');

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

INSERT INTO `friends` (`fid`, `uid`, `fuid`, `fdate`, `fstat`, `fip`) VALUES
(47, 1, 10, '2024-03-11 10:46:36', 'A', '::1'),
(48, 1, 16, '2024-03-11 12:07:42', 'A', '::1'),
(49, 1, 17, '2024-03-13 17:27:28', 'A', '::1'),
(50, 1, 18, '2024-03-13 17:27:29', 'A', '::1'),
(53, 19, 10, '2024-03-13 17:31:24', 'A', '::1'),
(54, 19, 16, '2024-03-13 17:31:25', 'A', '::1'),
(57, 1, 19, '2024-03-18 21:19:34', 'A', '::1'),
(58, 1, 20, '2024-03-22 14:57:23', 'D', '::1');

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

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uid`, `ldate`, `lip`) VALUES
(227, 1, '2024-03-09 11:11:58', '::1'),
(228, 10, '2024-03-11 11:33:00', '::1'),
(229, 10, '2024-03-11 11:46:02', '::1'),
(230, 1, '2024-03-11 11:50:57', '::1'),
(231, 1, '2024-03-11 11:53:44', '::1'),
(232, 1, '2024-03-11 11:56:52', '::1'),
(233, 1, '2024-03-11 11:59:16', '::1'),
(234, 16, '2024-03-11 12:08:29', '::1'),
(235, 1, '2024-03-11 13:30:36', '::1'),
(236, 1, '2024-03-11 13:32:11', '::1'),
(237, 1, '2024-03-11 13:54:56', '::1'),
(238, 16, '2024-03-11 14:18:17', '::1'),
(239, 1, '2024-03-11 14:29:47', '::1'),
(240, 1, '2024-03-11 14:34:49', '::1'),
(241, 10, '2024-03-11 14:38:50', '127.0.0.1'),
(242, 1, '2024-03-11 15:11:07', '::1'),
(243, 16, '2024-03-11 15:29:34', '127.0.0.1'),
(244, 10, '2024-03-11 15:30:42', '::1'),
(245, 16, '2024-03-11 15:31:49', '::1'),
(246, 10, '2024-03-11 15:34:03', '127.0.0.1'),
(247, 1, '2024-03-11 15:51:52', '::1'),
(248, 1, '2024-03-11 15:55:59', '::1'),
(249, 1, '2024-03-11 15:58:06', '::1'),
(250, 16, '2024-03-11 15:59:22', '::1'),
(251, 10, '2024-03-11 16:01:42', '::1'),
(252, 1, '2024-03-11 17:19:14', '::1'),
(253, 1, '2024-03-11 17:40:03', '::1'),
(254, 1, '2024-03-11 17:46:34', '::1'),
(255, 1, '2024-03-11 17:48:50', '::1'),
(256, 1, '2024-03-12 17:07:05', '::1'),
(257, 1, '2024-03-12 17:08:19', '::1'),
(258, 1, '2024-03-12 17:28:57', '::1'),
(259, 1, '2024-03-12 17:29:36', '::1'),
(260, 1, '2024-03-12 17:46:33', '::1'),
(261, 10, '2024-03-12 17:48:00', '::1'),
(262, 1, '2024-03-12 17:50:04', '::1'),
(263, 10, '2024-03-12 17:50:28', '::1'),
(264, 1, '2024-03-12 17:50:43', '::1'),
(265, 16, '2024-03-13 17:18:48', '::1'),
(266, 1, '2024-03-13 17:19:15', '::1'),
(267, 1, '2024-03-13 17:20:06', '::1'),
(268, 17, '2024-03-13 17:28:25', '::1'),
(269, 18, '2024-03-13 17:30:25', '::1'),
(270, 19, '2024-03-13 17:31:05', '::1'),
(271, 20, '2024-03-13 17:31:59', '::1'),
(272, 1, '2024-03-13 18:15:09', '::1'),
(273, 1, '2024-03-13 18:18:24', '::1'),
(274, 10, '2024-03-13 18:27:43', '::1'),
(275, 1, '2024-03-13 18:28:27', '::1'),
(276, 1, '2024-03-13 19:52:50', '::1'),
(277, 1, '2024-03-13 20:13:56', '::1'),
(278, 1, '2024-03-13 20:15:00', '::1'),
(279, 1, '2024-03-13 20:24:20', '::1'),
(280, 16, '2024-03-13 20:25:00', '::1'),
(281, 1, '2024-03-13 20:25:28', '::1'),
(282, 18, '2024-03-13 20:26:32', '::1'),
(283, 19, '2024-03-13 20:27:00', '::1'),
(284, 1, '2024-03-13 20:49:16', '::1'),
(285, 1, '2024-03-13 22:12:57', '::1'),
(286, 10, '2024-03-13 22:21:41', '::1'),
(287, 10, '2024-03-13 22:24:04', '::1'),
(288, 1, '2024-03-13 22:25:32', '::1'),
(289, 1, '2024-03-13 22:40:41', '::1'),
(290, 1, '2024-03-13 22:47:25', '::1'),
(291, 10, '2024-03-13 22:51:48', '::1'),
(292, 1, '2024-03-13 22:52:26', '::1'),
(293, 1, '2024-03-18 18:06:12', '::1'),
(294, 1, '2024-03-18 18:31:36', '::1'),
(295, 1, '2024-03-18 18:40:53', '::1'),
(296, 1, '2024-03-18 18:46:27', '::1'),
(297, 1, '2024-03-18 18:49:07', '::1'),
(298, 1, '2024-03-18 19:15:13', '::1'),
(299, 1, '2024-03-18 20:47:37', '::1'),
(300, 1, '2024-03-18 21:02:57', '::1'),
(301, 1, '2024-03-18 21:03:57', '::1'),
(302, 1, '2024-03-18 21:10:22', '::1'),
(303, 1, '2024-03-18 21:27:36', '::1'),
(304, 1, '2024-03-18 21:35:25', '::1'),
(305, 1, '2024-03-19 00:55:11', '::1'),
(306, 1, '2024-03-19 14:52:52', '::1'),
(307, 1, '2024-03-19 15:14:04', '::1'),
(308, 1, '2024-03-19 20:59:16', '::1'),
(309, 1, '2024-03-19 21:06:47', '::1'),
(310, 1, '2024-03-19 21:29:33', '::1'),
(311, 1, '2024-03-19 21:48:56', '::1'),
(312, 1, '2024-03-19 22:24:39', '::1'),
(313, 1, '2024-03-20 15:00:01', '::1'),
(314, 1, '2024-03-20 15:02:48', '::1'),
(315, 1, '2024-03-20 15:42:48', '::1'),
(316, 1, '2024-03-20 18:10:10', '::1'),
(317, 1, '2024-03-22 13:25:10', '::1'),
(318, 1, '2024-03-23 14:43:11', '::1'),
(319, 1, '2024-03-24 15:54:49', '::1'),
(320, 1, '2024-04-04 19:22:56', '::1'),
(321, 1, '2024-04-04 19:47:49', '::1'),
(322, 19, '2024-04-04 20:18:43', '::1'),
(323, 1, '2024-04-04 20:20:52', '::1'),
(324, 10, '2024-04-04 20:23:14', '::1'),
(325, 1, '2024-04-04 21:04:12', '::1'),
(326, 1, '2024-04-04 22:55:12', '::1'),
(327, 1, '2024-04-04 22:59:14', '::1'),
(328, 1, '2024-04-05 09:08:52', '::1'),
(329, 1, '2024-04-05 09:47:53', '::1'),
(330, 1, '2024-04-05 10:45:59', '::1'),
(331, 1, '2024-04-05 10:48:06', '::1'),
(332, 1, '2024-04-05 11:01:15', '::1'),
(333, 1, '2024-04-05 11:02:05', '::1'),
(334, 1, '2024-04-05 14:56:38', '::1'),
(335, 1, '2024-04-05 15:02:42', '::1');

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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `uid`, `ustrid`, `mtoid`, `mtostrid`, `fcid`, `mlabel`, `meloz`, `mstat`, `mdate`, `mip`) VALUES
(49, 1, 'AmIEBqm06lHerdvIlt9h', 16, 'upqiliFaNQ0RztCfNvjf', '0', 'hi', NULL, 'A', '2024-03-12 18:03:20', '::1'),
(50, 1, 'AmIEBqm06lHerdvIlt9h', 10, 'RVz9tHMIM1h3Gro1VJly', '0', 'hi', NULL, 'A', '2024-03-13 17:20:25', '::1'),
(51, 20, 'z65t4DJVD8K5Bt5OTogI', 1, 'AmIEBqm06lHerdvIlt9h', '0', 'hi', NULL, 'A', '2024-03-13 17:32:15', '::1'),
(52, 1, 'AmIEBqm06lHerdvIlt9h', 20, 'z65t4DJVD8K5Bt5OTogI', '0', 'hi', NULL, 'A', '2024-03-19 01:52:43', '::1');

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
(337, 227, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-09 11:11:58', '::1'),
(338, 228, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:33:00', '::1'),
(339, 228, '/lovifans.com/pages/loged/logout.php', '2024-03-11 11:43:09', '::1'),
(340, 229, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:46:02', '::1'),
(341, 229, '/lovifans.com/pages/loged/logout.php', '2024-03-11 11:46:09', '::1'),
(342, 230, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:50:57', '::1'),
(343, 231, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:53:44', '::1'),
(344, 232, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:56:52', '::1'),
(345, 233, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 11:59:16', '::1'),
(346, 234, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 12:08:29', '::1'),
(347, 235, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 13:30:36', '::1'),
(348, 236, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 13:32:11', '::1'),
(349, 237, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 13:54:56', '::1'),
(350, 238, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 14:18:17', '::1'),
(351, 238, '/lovifans.com/pages/loged/logout.php', '2024-03-11 14:18:24', '::1'),
(352, 239, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 14:29:47', '::1'),
(353, 240, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 14:34:49', '::1'),
(354, 241, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 14:38:50', '127.0.0.1'),
(355, 242, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:11:07', '::1'),
(356, 243, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:29:34', '127.0.0.1'),
(357, 244, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:30:42', '::1'),
(358, 244, '/lovifans.com/pages/loged/logout.php', '2024-03-11 15:31:24', '::1'),
(359, 245, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:31:49', '::1'),
(360, 243, '/lovifans.com/pages/loged/logout.php', '2024-03-11 15:33:54', '127.0.0.1'),
(361, 246, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:34:03', '127.0.0.1'),
(362, 247, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:51:52', '::1'),
(363, 248, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:55:59', '::1'),
(364, 249, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:58:06', '::1'),
(365, 245, '/lovifans.com/pages/loged/logout.php', '2024-03-11 15:58:49', '::1'),
(366, 250, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 15:59:22', '::1'),
(367, 250, '/lovifans.com/pages/loged/logout.php', '2024-03-11 16:01:33', '::1'),
(368, 251, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 16:01:42', '::1'),
(369, 252, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 17:19:14', '::1'),
(370, 253, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 17:40:03', '::1'),
(371, 254, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 17:46:34', '::1'),
(372, 255, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-11 17:48:50', '::1'),
(373, 256, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:07:05', '::1'),
(374, 256, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:07:38', '::1'),
(375, 257, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:08:19', '::1'),
(376, 257, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:28:06', '::1'),
(377, 258, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:28:57', '::1'),
(378, 258, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:29:26', '::1'),
(379, 259, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:29:36', '::1'),
(380, 260, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:46:33', '::1'),
(381, 261, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:48:00', '::1'),
(382, 261, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:48:03', '::1'),
(383, 262, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:50:04', '::1'),
(384, 262, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:50:21', '::1'),
(385, 263, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:50:28', '::1'),
(386, 263, '/lovifans.com/pages/loged/logout.php', '2024-03-12 17:50:35', '::1'),
(387, 264, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-12 17:50:43', '::1'),
(388, 265, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:18:48', '::1'),
(389, 265, '/lovifans.com/pages/loged/logout.php', '2024-03-13 17:19:04', '::1'),
(390, 266, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:19:15', '::1'),
(391, 267, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:20:06', '::1'),
(392, 268, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:28:25', '::1'),
(393, 268, '/lovifans.com/pages/loged/logout.php', '2024-03-13 17:29:13', '::1'),
(394, 269, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:30:25', '::1'),
(395, 269, '/lovifans.com/pages/loged/logout.php', '2024-03-13 17:30:43', '::1'),
(396, 270, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:31:05', '::1'),
(397, 270, '/lovifans.com/pages/loged/logout.php', '2024-03-13 17:31:38', '::1'),
(398, 271, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 17:31:59', '::1'),
(399, 271, '/lovifans.com/pages/loged/logout.php', '2024-03-13 17:41:37', '::1'),
(400, 272, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 18:15:09', '::1'),
(401, 273, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 18:18:24', '::1'),
(402, 273, '/lovifans.com/pages/loged/logout.php', '2024-03-13 18:27:37', '::1'),
(403, 274, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 18:27:43', '::1'),
(404, 274, '/lovifans.com/pages/loged/logout.php', '2024-03-13 18:28:21', '::1'),
(405, 275, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 18:28:27', '::1'),
(406, 276, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 19:52:50', '::1'),
(407, 277, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:13:56', '::1'),
(408, 278, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:15:00', '::1'),
(409, 279, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:24:20', '::1'),
(410, 279, '/lovifans.com/pages/loged/logout.php', '2024-03-13 20:24:34', '::1'),
(411, 280, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:25:00', '::1'),
(412, 278, '/lovifans.com/pages/loged/logout.php', '2024-03-13 20:25:21', '::1'),
(413, 281, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:25:28', '::1'),
(414, 280, '/lovifans.com/pages/loged/logout.php', '2024-03-13 20:25:53', '::1'),
(415, 282, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:26:32', '::1'),
(416, 282, '/lovifans.com/pages/loged/logout.php', '2024-03-13 20:26:38', '::1'),
(417, 283, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:27:00', '::1'),
(418, 283, '/lovifans.com/pages/loged/logout.php', '2024-03-13 20:27:02', '::1'),
(419, 284, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 20:49:16', '::1'),
(420, 285, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:12:57', '::1'),
(421, 286, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:21:41', '::1'),
(422, 286, '/lovifans.com/pages/loged/logout.php', '2024-03-13 22:22:35', '::1'),
(423, 287, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:24:04', '::1'),
(424, 288, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:25:32', '::1'),
(425, 287, '/lovifans.com/pages/loged/logout.php', '2024-03-13 22:25:50', '::1'),
(426, 288, '/lovifans.com/pages/loged/logout.php', '2024-03-13 22:29:06', '::1'),
(427, 289, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:40:41', '::1'),
(428, 290, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:47:25', '::1'),
(429, 290, '/lovifans.com/pages/loged/logout.php', '2024-03-13 22:50:07', '::1'),
(430, 291, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:51:48', '::1'),
(431, 292, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-13 22:52:26', '::1'),
(432, 291, '/lovifans.com/pages/loged/logout.php', '2024-03-13 22:53:08', '::1'),
(433, 293, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 18:06:12', '::1'),
(434, 294, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 18:31:36', '::1'),
(435, 295, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 18:40:53', '::1'),
(436, 296, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 18:46:27', '::1'),
(437, 297, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 18:49:07', '::1'),
(438, 298, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 19:15:13', '::1'),
(439, 299, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 20:47:37', '::1'),
(440, 300, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 21:02:57', '::1'),
(441, 301, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 21:03:57', '::1'),
(442, 302, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 21:10:22', '::1'),
(443, 302, '/lovifans.com/pages/loged/logout.php', '2024-03-18 21:27:26', '::1'),
(444, 303, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 21:27:36', '::1'),
(445, 304, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-18 21:35:25', '::1'),
(446, 304, '/lovifans.com/pages/loged/logout.php', '2024-03-19 00:54:58', '::1'),
(447, 305, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 00:55:11', '::1'),
(448, 306, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 14:52:52', '::1'),
(449, 307, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 15:14:04', '::1'),
(450, 307, '/lovifans.com/pages/loged/logout.php', '2024-03-19 19:35:56', '::1'),
(451, 308, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 20:59:16', '::1'),
(452, 309, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 21:06:47', '::1'),
(453, 310, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 21:29:33', '::1'),
(454, 310, '/lovifans.com/pages/loged/logout.php', '2024-03-19 21:42:06', '::1'),
(455, 308, '/lovifans.com/pages/loged/logout.php', '2024-03-19 21:43:19', '::1'),
(456, 311, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 21:48:56', '::1'),
(457, 312, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-19 22:24:39', '::1'),
(458, 313, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-20 15:00:01', '::1'),
(459, 313, '/lovifans.com/pages/loged/logout.php', '2024-03-20 15:02:42', '::1'),
(460, 314, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-20 15:02:48', '::1'),
(461, 315, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-20 15:42:48', '::1'),
(462, 316, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-20 18:10:10', '::1'),
(463, 317, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-22 13:25:10', '::1'),
(464, 318, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-23 14:43:11', '::1'),
(465, 319, '/lovifans.com/pages/unloged/login_ir.php', '2024-03-24 15:54:49', '::1'),
(466, 320, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 19:22:56', '::1'),
(467, 320, '/lovifans.com/pages/loged/logout.php', '2024-04-04 19:46:09', '::1'),
(468, 321, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 19:47:49', '::1'),
(469, 321, '/lovifans.com/pages/loged/logout.php', '2024-04-04 20:18:23', '::1'),
(470, 322, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 20:18:43', '::1'),
(471, 322, '/lovifans.com/pages/loged/logout.php', '2024-04-04 20:20:45', '::1'),
(472, 323, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 20:20:52', '::1'),
(473, 324, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 20:23:14', '::1'),
(474, 325, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 21:04:12', '::1'),
(475, 326, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 22:55:12', '::1'),
(476, 327, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-04 22:59:14', '::1'),
(477, 328, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 09:08:52', '::1'),
(478, 329, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 09:47:53', '::1'),
(479, 330, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 10:45:59', '::1'),
(480, 331, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 10:48:06', '::1'),
(481, 332, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 11:01:15', '::1'),
(482, 333, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 11:02:05', '::1'),
(483, 334, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 14:56:38', '::1'),
(484, 335, '/lovifans.com/pages/unloged/login_ir.php', '2024-04-05 15:02:42', '::1');

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
(23, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'e4cbf217ad37227c0499dd75c4465221fc3df3f4e0ad8178e0ac031b548dbaee', '2024-03-19 19:52:19', 'A', '::1'),
(24, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '8afcb6ca8a114f6737412812c2bec204d2862df7617417c67ac8defb33dafb01', '2024-03-19 19:53:58', 'A', '::1'),
(25, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '5c164056bb903891d4894e08cc0de3e0d37ee10203955fc92024c86e5b096671', '2024-03-19 19:55:07', 'A', '::1'),
(26, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '4e229981a4c396d3dd2c2f19160a5ef64af6ee8d3221ccaad285df9acc5a34de', '2024-03-19 19:55:24', 'A', '::1'),
(27, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'cda57ed837494dc3830bc3bd11cf2c636f9c164a8f5a15b35185c0bf4e5c5ac0', '2024-03-19 19:56:29', 'A', '::1'),
(28, 'becsei.szabi@gmail.com', 'AmIEBqm06lHerdvIlt9h', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', '551d79f435466e975988a719ef3bfcd08ec8d34fbe939e90d8df3a43c72bbc46', '2024-03-19 20:11:56', 'A', '::1');

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
(1, NULL, NULL, 'AmIEBqm06lHerdvIlt9h', 'helloka', 'becsei.szabi@gmail.com', '$2y$12$NvgseZMxT60E/Simbcgw8uw5/y0BqZPK782KDtETlhYyKVXsEKNJu', 'A,Online', '2024-01-04 01:36:50', NULL, '127.0.0.1'),
(10, NULL, NULL, 'RVz9tHMIM1h3Gro1VJly', 'teszt1', 'subject@test1.com', '$2y$12$Xh/PI.lXOXYUqA0z/Gdf5e9zIijHy8gjhNg4xswKmqxy5Vw.g8bVG', 'A,Online', '2024-02-25 10:49:25', NULL, '127.0.0.1'),
(16, NULL, NULL, 'upqiliFaNQ0RztCfNvjf', 'tesztsub2', 'teszt123@hello.com', '$2y$12$qxtsTi37W5InD1iD/TB5Cu8KgIr/Dr0F9536vvnvNjAzDpSTYFmlK', 'A,2024-03-13 20:25:53', '2024-03-08 17:06:44', NULL, '::1'),
(17, NULL, NULL, '4HlcOgtudoIqPvh36osi', 'tesztsub3', 'teszt123@hello.com', '$2y$12$1FOgkeWNxfWtkOp.MGWGY.dAK3uu4YRmVF2.HIgqW0U6DSFrn5OlW', 'A,2024-03-13 17:29:13', '2024-03-08 17:07:37', NULL, '::1'),
(18, NULL, NULL, 'm82B1ktvMC3GYg7GjIyC', 'tesztsub4', 'teszt123@hello.com', '$2y$12$SQ62CjQ/RIKgh2rrtXiIf.t/bi3ru52x/ygZfKwgSk9aXLThOFDmC', 'A,2024-03-13 20:26:38', '2024-03-08 17:08:24', NULL, '::1'),
(19, NULL, NULL, 'rWWtTJNATVXt8T63tR7w', 'tesztsub5', 'teszt123@hello.com', '$2y$12$A0/IIYJz3xH1q2bQ9H968OkGjRNOi/Vui.xlDAylqIrigiQiXihHu', 'A,2024-04-04 20:20:45', '2024-03-08 17:09:25', NULL, '::1'),
(20, NULL, NULL, 'z65t4DJVD8K5Bt5OTogI', 'tesztsub6', 'teszt123@hello.com', '$2y$12$2Y7dnbdhSqWLr3RJaxOEAOu5NsCpH7t7mR1kUs./8cDo6c4Oet0ti', 'A,2024-03-12 17:41:12', '2024-03-09 11:07:20', NULL, '::1');

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
