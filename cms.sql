-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2023 at 04:15 PM
-- Server version: 8.0.31
-- PHP Version: 7.3.33-8+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boxes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `ips` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `phone`, `ips`) VALUES
(1, 'admin', '2fcb8e346d12ee6bb5910b3d4704c80b', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `message`, `time`) VALUES
(37, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/kittylove.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/>', '2022-05-19 00:19:35'),
(38, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/fire.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/blueheart.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/peperain.gif\'/>', '2022-05-19 00:20:20'),
(39, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/ily.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/cake.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/uwucat.png\'/> hello', '2022-05-19 00:29:40'),
(50, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/ily.png\'/>', '2022-05-25 01:56:51'),
(54, 32, 'hey bro', '2022-05-26 22:37:46'),
(55, 12, 'asdasdte', '2022-06-08 02:04:27'),
(57, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/fire.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/>', '2022-06-08 02:05:10'),
(58, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/pepewin.png\'/>', '2022-12-31 21:24:22'),
(62, 37, 'bigmessage bigmessage bigmessage bigmessage bigmessage bigme', '2022-12-31 21:24:52'),
(64, 37, '<img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/bayc.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/clover.png\'/>', '2022-12-31 21:24:57'),
(70, 37, '<img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/>  <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/>', '2022-12-31 22:08:04'),
(71, 37, '<img src=\'https://smirnoffonbahamas.vip/uploads/pinkcoffee.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pepeyes.png\'/>  <img src=\'https://smirnoffonbahamas.vip/uploads/bigshibaspin.gif\'/>', '2022-12-31 22:08:25'),
(72, 37, '07777', '2022-12-31 22:16:45'),
(73, 37, 'LFGGG', '2022-12-31 22:17:09'),
(74, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/>', '2023-01-13 18:53:42'),
(79, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/clover.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/clover.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pepelove.png\'/>', '2023-03-23 22:46:53'),
(81, 12, 'DOPE  <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/>', '2023-03-24 00:00:01'),
(84, 12, 'hey', '2023-03-24 01:54:35'),
(85, 12, 'heyyyy', '2023-03-24 02:10:41'),
(86, 12, 'YO TEST', '2023-03-24 02:16:39'),
(87, 12, 'asddsadas', '2023-03-24 02:18:44'),
(88, 37, 'heyyy', '2023-03-24 02:20:28'),
(89, 12, 'sup', '2023-03-24 02:20:47'),
(90, 37, '<img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/>', '2023-03-24 02:21:01'),
(91, 12, 'asdads', '2023-03-24 02:35:48'),
(92, 12, 'heyyy', '2023-03-24 02:40:42'),
(94, 12, 'asddsa', '2023-03-24 03:54:49'),
(95, 12, 'test', '2023-03-24 03:56:30'),
(96, 12, 'asdadsdsa', '2023-03-24 04:13:36'),
(97, 12, 'heyy', '2023-03-24 04:19:35'),
(98, 12, 'yyy', '2023-03-24 04:33:26'),
(99, 12, 'asd', '2023-03-24 04:40:02'),
(100, 12, 'asd', '2023-03-24 04:42:48'),
(103, 12, 'asddsa3', '2023-03-25 01:19:55'),
(104, 12, 'hey', '2023-03-25 01:27:47'),
(105, 12, 'asddsad', '2023-03-25 01:30:58'),
(106, 12, 'yoo sup', '2023-03-25 01:31:23'),
(107, 12, 'asddasd', '2023-03-25 01:34:32'),
(110, 12, '07777', '2023-03-25 01:56:45'),
(112, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/pepehmm.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pepehmm.png\'/>', '2023-03-25 01:58:10'),
(114, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/>', '2023-03-25 02:10:42'),
(120, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/>', '2023-03-25 02:32:21'),
(121, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/blueheart.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/blueheart.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/blueheart.gif\'/>', '2023-03-25 02:34:43'),
(124, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pogging.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/clover.png\'/>', '2023-03-25 02:45:17'),
(125, 12, 'asdsaddasx', '2023-03-25 02:49:11'),
(126, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/>', '2023-03-25 02:50:10'),
(130, 12, 'adddd', '2023-03-25 03:04:59'),
(135, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/pikachu.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/redheart.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/insane.png\'/>', '2023-03-25 03:13:36'),
(144, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/>', '2023-03-25 03:47:04'),
(145, 12, '<img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/yocigood.gif\'/>', '2023-04-04 22:07:05'),
(146, 12, 'heyyy <img src=\'https://smirnoffonbahamas.vip/uploads/insane.png\'/>', '2023-04-04 22:07:33'),
(147, 12, 'yo yyyy', '2023-04-04 22:08:47'),
(148, 12, 'ssssss', '2023-04-04 22:11:39'),
(150, 12, 'test', '2023-04-08 18:45:37'),
(151, 12, 'hi poke', '2023-04-08 18:49:31'),
(152, 12, 'test', '2023-04-08 18:52:55'),
(153, 37, 'heyy', '2023-04-08 18:54:00'),
(154, 37, 'testrace', '2023-04-08 18:54:41'),
(155, 37, 'racing', '2023-04-08 18:55:24'),
(156, 37, '<img src=\'https://smirnoffonbahamas.vip/uploads/blueheart.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/fire.gif\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/bruh.png\'/> <img src=\'https://smirnoffonbahamas.vip/uploads/catjump.gif\'/>', '2023-04-08 18:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_withdrawals`
--

CREATE TABLE `crypto_withdrawals` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `droppednft` int NOT NULL,
  `amount` float NOT NULL,
  `fee` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `method` varchar(15) NOT NULL,
  `status` int NOT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `datereq` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `crypto_withdrawals`
--

INSERT INTO `crypto_withdrawals` (`id`, `userid`, `droppednft`, `amount`, `fee`, `address`, `method`, `status`, `txid`, `datereq`) VALUES
(1, 12, 343, 10, 0, '423345656677777777777777777777777777777777777', 'eth', 1, 'asddsa54wfsddstgtxid', '2022-07-06 12:31:28'),
(2, 12, 344, 24, 0, '5443543545454545454354354354354vvvvvvvvv', 'eth', 1, '', '2022-07-06 21:31:33'),
(3, 12, 345, 257, 0, 'hhhhhhhhhhhhhhhhhhhhhhhhn797bbbbnnnnnn', 'eth', 1, '', '2022-11-22 00:02:25'),
(4, 12, 0, 39.22, 0, '0x694289432858953895395499542225624561', 'eth', 1, '', '2023-01-14 21:53:36'),
(5, 12, 333, 39.22, 3.73, '0x694289432858953895395499542225624561', 'eth', 1, '', '2023-01-14 22:54:11'),
(6, 12, 333, 39.22, 5.58, '0x694289432858953895395499542225624561', 'eth', 1, '', '2023-01-14 23:06:56'),
(7, 12, 333, 39.22, 6.7, '0x694289432858953895395499542225624861', 'eth', 1, '', '2023-01-15 00:16:50'),
(8, 12, 333, 39.22, 6.48, '0x694289432858953895395499542225624561', 'eth', 1, '', '2023-01-15 00:22:25'),
(9, 12, 333, 39.22, 5.79, '0x694289432858953895395499542225624561', 'eth', 1, '', '2023-01-15 00:25:58'),
(10, 12, 333, 39.22, 4.54, '0x694686432858953895395499542225624561', 'eth', 1, '', '2023-01-18 02:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `fingerprints`
--

CREATE TABLE `fingerprints` (
  `id` int NOT NULL,
  `fingerprint` varchar(100) NOT NULL,
  `userid` int NOT NULL,
  `caseopened` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fingerprints`
--

INSERT INTO `fingerprints` (`id`, `fingerprint`, `userid`, `caseopened`) VALUES
(2, 'DJclO1yALEn29vyvnepB', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `ip` varchar(96) NOT NULL,
  `event` text,
  `type` varchar(192) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `ip`, `event`, `type`, `data`) VALUES
(87, '37.47.96.10', 'Query error (insert into cryptowithdrawals( `userid`, `amount`, `address`, `method`, `status`, `txid`) values ( \\\"12\\\", \\\"12\\\", \\\"423345656677777777777777777777777777777777777\\\", \\\"eth\\\", \\\"1\\\", \\\"\\\", \\\"\\\" )): Column count doesn\\\'t match value count at row 1', 'SQL Error', '[]'),
(88, '37.47.96.10', 'Query error (insert into cryptowithdrawals( `userid`, `amount`, `address`, `method`, `status`, `txid`, `datereq`) values ( \\\"12\\\", \\\"10\\\", \\\"423345656677777777777777777777777777777777777\\\", \\\"eth\\\", \\\"1\\\", \\\"\\\", \\\"\\\" )): Incorrect datetime value: \\\'\\\' for column \\\'datereq\\\' at row 1', 'SQL Error', '[]'),
(89, '37.47.96.10', 'Query error (insert into cryptowithdrawals( `userid`, `amount`, `address`, `method`, `status`, `txid`, `datereq`) values ( \\\"12\\\", \\\"10\\\", \\\"423345656677777777777777777777777777777777777\\\", \\\"eth\\\", \\\"1\\\", \\\"\\\", \\\"1657110428\\\" )): Incorrect datetime value: \\\'1657110428\\\' for column \\\'datereq\\\' at row 1', 'SQL Error', '[]'),
(90, '37.47.96.10', 'Query error (insert into cryptowithdrawals( `userid`, `amount`, `address`, `method`, `status`, `txid`, `datereq`) values ( \\\"12\\\", \\\"10\\\", \\\"423345656677777777777777777777777777777777777\\\", \\\"eth\\\", \\\"1\\\", \\\"\\\", \\\"\\\" )): Incorrect datetime value: \\\'\\\' for column \\\'datereq\\\' at row 1', 'SQL Error', '[]'),
(91, '37.47.96.10', 'Query error (insert into cryptowithdrawals( `userid`, `amount`, `address`, `method`, `status`, `txid`, `datereq`) values ( \\\"12\\\", \\\"10\\\", \\\"423345656677777777777777777777777777777777777\\\", \\\"eth\\\", \\\"1\\\", \\\"\\\" )): Column count doesn\\\'t match value count at row 1', 'SQL Error', '[]'),
(92, '37.47.68.255', 'Query error (update rainlog set `amount` = 0.01 where id = ): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \\\'\\\' at line 1', 'SQL Error', '[]'),
(93, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(94, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(95, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(96, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(97, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(98, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(99, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(100, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(101, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(102, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(103, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(104, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(105, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(106, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(107, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(108, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(109, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(110, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9-dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(111, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(112, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(113, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(114, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(115, '46.246.122.59', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 18, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(116, '188.241.178.25', 'Query error (select id from opencasedroppeditems where publicid = zxsc2438asd9dsa12489cn order by id DESC limit 0, 18): Unknown column \\\'zxsc2438asd9dsa12489cn\\\' in \\\'where clause\\\'', 'SQL Error', '[]'),
(117, '188.241.178.38', '36', 'registration', '[]'),
(118, '188.241.178.4', 'Query error (insert into opencasedroppeditems( `userid`, `itemid`, `quality`, `price`, `timedrop`, `status`, `from`, `fast`, `offerid`, `botid`, `error`, `withdrawable`, `usable`, `analogid`, `name`, `image`, `network`, `mintaddress`, `publicid`) values ( \\\"12\\\", \\\"15694\\\", \\\"5\\\", \\\"100\\\", DATEADD(NOW(), INTERVAL 16 SECOND), \\\"3\\\", \\\"2\\\", \\\"0\\\", \\\"0\\\", \\\"0\\\", \\\"\\\", \\\"1\\\", \\\"1\\\", NULL, \\\"Credits $100 onsite\\\", \\\"https://i.ibb.co/8By4CgR/100b.png\\\", \\\"site\\\", NULL), NULL)): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \\\'NULL)\\\' at line 1', 'SQL Error', '[]'),
(119, '31.171.154.120', '37', 'registration', '[]'),
(120, '212.102.49.219', 'Query error (SELECT sum(`amount`) as sm, count(id) as cn, DATE_FORMAT(`timesent`, \\\'Y m d\\\') as dat FROM `crypto_withdrawals` GROUP BY dat ORDER BY dat DESC LIMIT 30): Unknown column \\\'timesent\\\' in \\\'field list\\\'', 'SQL Error', '[]'),
(121, '37.46.115.29', '38', 'registration', '[]'),
(122, '37.46.115.22', '39', 'registration', '[]'),
(123, '37.46.115.22', '40', 'registration', '[]'),
(124, '37.46.115.26', '41', 'registration', '[]'),
(125, '37.46.115.26', '42', 'registration', '[]'),
(126, '37.46.115.22', '43', 'registration', '[]'),
(127, '37.46.115.24', '44', 'registration', '[]'),
(128, '37.46.115.29', 'Query error (update opencase_droppeditems set `user_id` = \\$012\\$0, `item_id` = \\$018\\$0, `quality` = \\$05\\$0, `rarity` = \\$00\\$0, `price` = \\$039.22\\$0, `time_drop` = \\$02022-06-28 00:43:26\\$0, `status` = \\$03\\$0, `from` = \\$02\\$0, `fast` = \\$00\\$0, `offer_id` = \\$00\\$0, `bot_id` = \\$00\\$0, `error` = \\$0\\$0, `withdrawable` = \\$01\\$0, `usable` = \\$01\\$0, `analog_id` = NULL, `name` = \\$0Toothache #608\\$0, `image` = \\$0https://nftstorage.link/ipfs/QmRBk6yGYdtBYKRnp1TzH2udrbdz9h3ZqzhTX4P1JGFj1n/5645.png\\$0, `network` = \\$0sol\\$0, `mintaddress` = \\$07CSBXb6xH79q2iX9xWFxAUcw8bMmjgxvkoatYp7pjWsw\\$0, `publicid` = \\$0zxsc2438asd9dsa12489cn\\$0, `caseprice` = NULL where id = \\$0333\\$0): Column \\$0caseprice\\$0 cannot be null', 'SQL Error', '[]'),
(129, '37.46.115.29', 'Query error (update opencase_droppeditems set `user_id` = \\$012\\$0, `item_id` = \\$018\\$0, `quality` = \\$05\\$0, `rarity` = \\$00\\$0, `price` = \\$039.22\\$0, `time_drop` = \\$02022-06-28 00:43:26\\$0, `status` = \\$03\\$0, `from` = \\$02\\$0, `fast` = \\$00\\$0, `offer_id` = \\$00\\$0, `bot_id` = \\$00\\$0, `error` = \\$0\\$0, `withdrawable` = \\$01\\$0, `usable` = \\$01\\$0, `analog_id` = NULL, `name` = \\$0Toothache #608\\$0, `image` = \\$0https://nftstorage.link/ipfs/QmRBk6yGYdtBYKRnp1TzH2udrbdz9h3ZqzhTX4P1JGFj1n/5645.png\\$0, `network` = \\$0sol\\$0, `mintaddress` = \\$07CSBXb6xH79q2iX9xWFxAUcw8bMmjgxvkoatYp7pjWsw\\$0, `publicid` = \\$0zxsc2438asd9dsa12489cn\\$0, `caseprice` = NULL where id = \\$0333\\$0): Column \\$0caseprice\\$0 cannot be null', 'SQL Error', '[]'),
(130, '37.46.115.29', 'Query error (update opencase_droppeditems set `user_id` = \\$012\\$0, `item_id` = \\$06\\$0, `quality` = \\$05\\$0, `rarity` = \\$00\\$0, `price` = \\$098.05\\$0, `time_drop` = \\$02022-06-28 00:43:50\\$0, `status` = \\$03\\$0, `from` = \\$02\\$0, `fast` = \\$00\\$0, `offer_id` = \\$00\\$0, `bot_id` = \\$00\\$0, `error` = \\$0\\$0, `withdrawable` = \\$01\\$0, `usable` = \\$01\\$0, `analog_id` = NULL, `name` = \\$0Doggo #0\\$0, `image` = \\$0https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/W09cNPDYWd3APay2jjgDVtsTZw1LW12yy-qtVhI6qfM?ext=png\\$0, `network` = \\$0sol\\$0, `mintaddress` = \\$0G5vi4Ynvxhe5gxYHakcA4eh7NMFBAGFpt7GZybbbTnve\\$0, `publicid` = \\$0zxsc2438asd9dsa12489cn\\$0, `caseprice` = NULL where id = \\$0334\\$0): Column \\$0caseprice\\$0 cannot be null', 'SQL Error', '[]'),
(131, '37.46.115.29', 'Query error (update opencase_droppeditems set `user_id` = \\$012\\$0, `item_id` = \\$06\\$0, `quality` = \\$05\\$0, `rarity` = \\$00\\$0, `price` = \\$098.05\\$0, `time_drop` = \\$02022-06-28 00:43:50\\$0, `status` = \\$03\\$0, `from` = \\$02\\$0, `fast` = \\$00\\$0, `offer_id` = \\$00\\$0, `bot_id` = \\$00\\$0, `error` = \\$0\\$0, `withdrawable` = \\$01\\$0, `usable` = \\$01\\$0, `analog_id` = NULL, `name` = \\$0Doggo #0\\$0, `image` = \\$0https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/W09cNPDYWd3APay2jjgDVtsTZw1LW12yy-qtVhI6qfM?ext=png\\$0, `network` = \\$0sol\\$0, `mintaddress` = \\$0G5vi4Ynvxhe5gxYHakcA4eh7NMFBAGFpt7GZybbbTnve\\$0, `publicid` = \\$0zxsc2438asd9dsa12489cn\\$0, `caseprice` = NULL where id = \\$0334\\$0): Column \\$0caseprice\\$0 cannot be null', 'SQL Error', '[]'),
(132, '37.46.115.19', '45', 'registration', '[]'),
(133, '37.46.115.19', '46', 'registration', '[]'),
(134, '188.213.34.67', '47', 'registration', '[]'),
(135, '188.43.136.42', '48', 'registration', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int NOT NULL,
  `name` varchar(765) NOT NULL,
  `description` varchar(765) NOT NULL,
  `data` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nft_collections`
--

CREATE TABLE `nft_collections` (
  `id` int NOT NULL,
  `collection_symbol` varchar(150) NOT NULL,
  `caseid` int NOT NULL,
  `network` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nft_collections`
--

INSERT INTO `nft_collections` (`id`, `collection_symbol`, `caseid`, `network`) VALUES
(1, 'edgn', 2, 'sol');

-- --------------------------------------------------------

--
-- Table structure for table `nft_withdrawals`
--

CREATE TABLE `nft_withdrawals` (
  `id` int NOT NULL,
  `nftid` int NOT NULL,
  `network` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `userid` int NOT NULL,
  `droppedid` int NOT NULL,
  `price` float NOT NULL,
  `timesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `txid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nft_withdrawals`
--

INSERT INTO `nft_withdrawals` (`id`, `nftid`, `network`, `address`, `status`, `userid`, `droppedid`, `price`, `timesent`, `txid`) VALUES
(1, 20, 'eth', 'selladdressasdsaddsa', 1, 12, 342, 44.02, '2022-11-22 22:48:44', 'gb834bgwei8seit09230osdknfds'),
(2, 24, 'eth', 'asdsaddsaasd', 1, 12, 300, 60, '2022-12-05 22:28:29', 'asdsadas3425rsa');

-- --------------------------------------------------------

--
-- Table structure for table `nonces`
--

CREATE TABLE `nonces` (
  `id` int NOT NULL,
  `nonce` varchar(50) NOT NULL,
  `wallet` varchar(100) NOT NULL,
  `valid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nonces`
--

INSERT INTO `nonces` (`id`, `nonce`, `wallet`, `valid`) VALUES
(4, '6etWuLJqBhyS1okuug9Q', '0xad2bb978ef780cb42be0514ec608e8d1e7085cd3', 0),
(5, 'd8iljalnIsinm9oL0xLH', '0xad2bb978ef780cb42be0514ec608e8d1e7085cd3', 0),
(6, 'bstpqjRmgM6LNadtPEZw', '0xad2bb978ef780cb42be0514ec608e8d1e7085cd3', 0),
(7, '3dgUNBQTUVLLu3fMPDxx', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(8, 'cc5nyIyRtOng4a9JyK5T', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(9, '5m2Ee6hJIKkptFb8rLvu', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(10, 'OX291269vqhj0AM0fFd6', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(11, 'f59exPsU2mRwgMIhBDFl', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(12, 'EWhMQ7OfVhCNpK4qlIjY', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(13, 'odFu12oUvWe5r96WtRmM', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(14, 'RBZIX2eYqRlYU2ShtYkT', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(15, 'omRM4IV5MgQjsbE7qqy4', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(16, 'mzx2xUVs0waB4hCdwnMV', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(17, 'KZRswUvjKGMTcUb1oFLJ', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(18, 'w1VhxQwEe475fxCl3OGb', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(19, '44dt3Plwy9IYHom6cRNp', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(20, '3AlzlRoChACOFujlTYJp', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(21, 'HXVy65yYbgjQqa5g4VSy', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(22, 'Hf8BmAbDuf5YLiMF6BJd', '0x1f9f8e7e4e9f515ac01e2e33b1b470288bdd5803', 0),
(23, '8fsIxULPtCMgQKf6Sj8d', '0x37ed12743cad128baa346afcead599e358a65fd0', 1),
(24, 'S1FeuaJChVUBvqJlsnQn', '0xcd02f1fb7a36ebc5f15148de6b87d74e11887998', 0),
(25, 'N789TWxL6UjXzjXnFXT2', '0xcd02f1fb7a36ebc5f15148de6b87d74e11887998', 0),
(26, 'YIoqhH9sRKRr4gMS18DC', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(27, 'VkWcleYJvnA4C36ZSgP6', '0xbb286a4c9c75170d9abb6a00fc487771ca8bebb6', 0),
(28, 'D7OvARYk2vfwkz1pl9qc', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(29, 'P0G9McyYg5fyHsCOFhsb', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(30, 'sPg2GXxODkhMonguuDiF', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(31, 'Juz24wGgmcGPycfVsUPq', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(32, 'DdAM1b9DuJyTrELtm00l', '0x6036bc329a352501703f435e626ab5228aebe6d6', 1),
(33, 'N7C8eEX0fQyIFugU6QIQ', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(34, '3XrjZZpDOypnHZZR1B7k', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(35, 'sL6Ud5y6eYxKFvPpQWps', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(36, 'zwJQFX4kKX7VlWrqu9sd', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(37, '88f9ulf3h7z4hiUH0kKH', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(38, '009vIhzdZv1u46HMpLuv', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(39, '2wrT6r5M6yesgMXihHhr', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(40, 'nn5UqIGv6QywBkb4rpPQ', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(41, 'pOM9jxyuGybmlavfFnIo', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(42, 'jlxtBSUYcsNmaaxIpYGR', '0x7bad284902188232bfca19d023f64f6e0a2599e4', 0),
(43, 'ww3ENWXzCDlrbIlJWXH8', '0xe7670503787c016582781b3f0e572f0532f95884', 0),
(44, 'nnwbYr69NjcrZUpIHjxV', '0xe7670503787c016582781b3f0e572f0532f95884', 0),
(45, '2yQlsj9gOj8dCiNO8P21', '0xe7670503787c016582781b3f0e572f0532f95884', 0),
(46, 'b7fxVFEx91u6qn8UWeay', '0xdc7290a2eef8aeb876cc54d44635bdd0c9ae38d2', 0),
(47, 'Wf4P5ayQalboPanKh49t', '0xdc7290a2eef8aeb876cc54d44635bdd0c9ae38d2', 0),
(48, 'r4Coq5gQh9MGU8hsD8pW', '0x51ba38148dc8fef4ca8f7668f62270d2f2e094a4', 0),
(49, 'zeqqOQw6T2FrHsu0wlAX', '0x51ba38148dc8fef4ca8f7668f62270d2f2e094a4', 0),
(50, 'IxlFL2DdsYVhgJBBi5p2', '0x51ba38148dc8fef4ca8f7668f62270d2f2e094a4', 0),
(51, '3YaFViaWkaZAwoOWXRGh', '0x984b81e7f1ea739d5db1828df1421415f1156844', 0),
(52, '13VJQo3B6mZARIamBadr', '0x9a160b0a18c148f961157da2ab32efde502d4b0a', 0),
(53, 'CDuArsP7XqcAmEnh79iS', '0x9a160b0a18c148f961157da2ab32efde502d4b0a', 0),
(54, '2r9IaOYvNnl9zE8Jm8J2', '0x9a160b0a18c148f961157da2ab32efde502d4b0a', 1),
(55, 've5HtXf237gC5gcuRU3V', '0x3213e83685d329ad2bda26e65a1bea92a81f9ba7', 0),
(56, 'lRBMskddxRPo2HsMPrhf', '0x3213e83685d329ad2bda26e65a1bea92a81f9ba7', 0),
(57, 'YbfxnmtTokyKW58kvTRx', '0x3213e83685d329ad2bda26e65a1bea92a81f9ba7', 1),
(58, 'RF99jZkvkYgqmiIv8bwA', '0xf9284a7b1d9148fc9bb863cde0a50c720cc5525f', 0),
(59, '8ag7DiGwTVaHudaUBM9a', '0x96f56647d15e00a11fafe608ebe62217a9f3c460', 0),
(60, 'jKx5aUbqO6CzxytHdoqI', '0x96f56647d15e00a11fafe608ebe62217a9f3c460', 0);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_balancelog`
--

CREATE TABLE `opencase_balancelog` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `change` float NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_balancelog`
--

INSERT INTO `opencase_balancelog` (`id`, `user_id`, `change`, `comment`, `time`, `type`) VALUES
(461, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 17:33:36', 1),
(462, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 17:38:27', 1),
(463, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-06-17 17:38:49', 1),
(464, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 17:38:49', 1),
(465, 12, 3.52, 'Selling the item №295 (SolTeeth #3519)', '2022-06-17 17:46:50', 2),
(466, 12, 0.61, 'Selling the item №297 (SolTeeth #3519)', '2022-06-17 17:47:45', 2),
(467, 12, 3.5, 'Selling the item №293 (SolTeeth #3519)', '2022-06-17 18:39:23', 2),
(468, 12, 1000, 'Selling the item №289 (SolTeeth #3519)', '2022-06-17 18:39:26', 2),
(469, 12, 69.83, 'Selling the item №290 (Dark Warlocks #1749)', '2022-06-17 18:39:34', 2),
(470, 12, 240, 'Selling the item №236 (Crypto Punks #3100)', '2022-06-17 18:52:33', 2),
(471, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 22:16:07', 1),
(472, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 22:16:47', 1),
(473, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 22:46:08', 1),
(474, 12, -25, 'Opening the case №2 (moonbirds)', '2022-06-17 22:46:32', 1),
(475, 12, -863.24, 'Opening the case №2 (moonbirds)', '2022-06-23 17:22:05', 1),
(476, 12, -685.38, 'Opening the case №2 (moonbirds)', '2022-06-23 17:26:40', 1),
(477, 12, -637.83, 'Opening the case №2 (moonbirds)', '2022-06-23 17:53:45', 1),
(478, 12, -614.72, 'Opening the case №2 (moonbirds)', '2022-06-23 17:54:11', 1),
(479, 12, -609.17, 'Opening the case №2 (moonbirds)', '2022-06-23 18:11:47', 1),
(480, 12, 379.03, 'Selling the item №305 (Reckless Racoon Club #815)', '2022-06-26 21:29:26', 2),
(481, 12, 834.96, 'Selling the item №304 (Bubblegoose Baller #7085)', '2022-06-26 21:29:33', 2),
(482, 12, 69.91, 'Selling the item №291 (Blocksmith Labs #4177)', '2022-06-26 21:31:05', 2),
(483, 12, 969.08, 'Selling the item №296 (Bubblegoose Baller #7085)', '2022-06-26 21:31:07', 2),
(484, 12, -1328.78, 'Opening the case №2 (moonbirds)', '2022-06-27 22:12:45', 1),
(485, 12, -1315.21, 'Opening the case №2 (moonbirds)', '2022-06-27 22:13:14', 1),
(486, 12, -1139.5, 'Opening the case №2 (moonbirds)', '2022-06-27 22:20:56', 1),
(487, 12, -1133.43, 'Opening the case №2 (moonbirds)', '2022-06-27 22:21:23', 1),
(488, 12, 2388.02, 'Selling the item №311 (Fox #3122)', '2022-06-27 22:21:58', 2),
(489, 12, 99.5, 'Selling the item №310 (Doggo #0)', '2022-06-27 22:21:59', 2),
(490, 12, 1013.83, 'Selling the item №309 (Galactic Gecko #6338)', '2022-06-27 22:22:04', 2),
(491, 12, 236.6, 'Selling the item №308 (Alpha #1572)', '2022-06-27 22:22:05', 2),
(492, 12, 382.4, 'Selling the item №307 (Alpha #1572)', '2022-06-27 22:22:09', 2),
(493, 12, 178.15, 'Selling the item №306 (Vision Of Dan145)', '2022-06-27 22:22:10', 2),
(494, 12, 2947.38, 'Selling the item №303 (Doggo #0)', '2022-06-27 22:22:15', 2),
(495, 12, 28.54, 'Selling the item №302 (Neo Hunter #3643)', '2022-06-27 22:22:17', 2),
(496, 12, 951.04, 'Selling the item №301 (Neo Hunter #4400)', '2022-06-27 22:22:21', 2),
(497, 12, 28.83, 'Selling the item №300 (Neo Hunter #3643)', '2022-06-27 22:22:22', 2),
(498, 12, -987.82, 'Opening the case №2 (moonbirds)', '2022-06-27 22:22:34', 1),
(499, 12, -380.53, 'Opening the case №2 (moonbirds)', '2022-06-27 22:26:44', 1),
(500, 12, -380.47, 'Opening the case №2 (moonbirds)', '2022-06-27 22:27:06', 1),
(501, 12, -378.05, 'Opening the case №2 (moonbirds)', '2022-06-27 22:27:28', 1),
(502, 12, -348, 'Opening the case №2 (moonbirds)', '2022-06-27 22:30:37', 1),
(503, 12, -70.13, 'Opening the case №2 (moonbirds)', '2022-06-27 22:31:00', 1),
(504, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-06-27 22:31:21', 1),
(505, 12, -51.28, 'Opening the case №2 (moonbirds)', '2022-06-27 22:31:21', 1),
(506, 12, -51.28, 'Opening the case №2 (moonbirds)', '2022-06-27 22:31:54', 1),
(507, 12, -47.42, 'Opening the case №2 (moonbirds)', '2022-06-27 22:32:15', 1),
(508, 12, -33.43, 'Opening the case №2 (moonbirds)', '2022-06-27 22:56:50', 1),
(509, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-06-27 23:16:25', 1),
(510, 12, -23.24, 'Opening the case №2 (moonbirds)', '2022-06-27 23:16:25', 1),
(511, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-06-27 23:16:47', 1),
(512, 12, -23.24, 'Opening the case №2 (moonbirds)', '2022-06-27 23:16:47', 1),
(513, 12, -23.25, 'Opening the case №2 (moonbirds)', '2022-06-27 23:17:07', 1),
(514, 12, -23.25, 'Opening the case №2 (moonbirds)', '2022-06-27 23:32:44', 1),
(515, 12, -18.96, 'Opening the case №2 (moonbirds)', '2022-06-27 23:33:06', 1),
(516, 12, -18.96, 'Opening the case №2 (moonbirds)', '2022-06-27 23:44:54', 1),
(517, 12, -17.59, 'Opening the case №2 (moonbirds)', '2022-06-27 23:51:16', 1),
(518, 12, -17.59, 'Opening the case №2 (moonbirds)', '2022-06-27 23:52:32', 1),
(519, 12, -17.59, 'Opening the case №2 (moonbirds)', '2022-06-28 00:00:44', 1),
(520, 12, -15.2, 'Opening the case №2 (moonbirds)', '2022-06-28 00:14:36', 1),
(521, 12, -10.92, 'Opening the case №2 (moonbirds)', '2022-06-28 00:32:57', 1),
(522, 12, 79.23, 'Selling the item №332 (Neo Hunter #3643)', '2022-06-28 00:42:13', 2),
(523, 12, 71.15, 'Selling the item №331 (Neo Hunter #4400)', '2022-06-28 00:42:14', 2),
(524, 12, 39.27, 'Selling the item №330 (Toothache #608)', '2022-06-28 00:42:18', 2),
(525, 12, 70.74, 'Selling the item №329 (Neo Hunter #4400)', '2022-06-28 00:42:19', 2),
(526, 12, 70.7, 'Selling the item №328 (Neo Hunter #4400)', '2022-06-28 00:42:23', 2),
(527, 12, 99.48, 'Selling the item №326 (Neo Hunter #3643)', '2022-06-28 00:42:53', 2),
(528, 12, -1308.47, 'Opening the case №2 (moonbirds)', '2022-06-28 00:43:10', 1),
(529, 12, -1306.08, 'Opening the case №2 (moonbirds)', '2022-06-28 00:43:34', 1),
(530, 12, -1300.1, 'Opening the case №2 (moonbirds)', '2022-06-28 00:44:04', 1),
(531, 12, -1294.36, 'Opening the case №2 (moonbirds)', '2022-06-28 00:45:16', 1),
(532, 12, -697.29, 'Opening the case №2 (moonbirds)', '2022-06-28 00:45:44', 1),
(533, 12, -693.1, 'Opening the case №2 (moonbirds)', '2022-06-28 00:46:08', 1),
(534, 12, 62.64, 'Selling the item №337 (Midnight Panthers #1036)', '2022-06-28 00:46:41', 2),
(535, 12, 1004.65, 'Selling the item №338 (Galactic Gecko #6338)', '2022-06-28 00:46:44', 2),
(536, 12, 9786.9, 'Selling the item №336 (Genesis Habitat #2848)', '2022-06-28 00:46:50', 2),
(537, 12, -234.39, 'Opening the case №2 (moonbirds)', '2022-06-28 00:49:38', 1),
(538, 12, -229.62, 'Opening the case №2 (moonbirds)', '2022-06-28 00:50:03', 1),
(539, 12, 78.21, 'Selling the item №339 (Neo Hunter #3643)', '2022-06-29 01:59:53', 2),
(540, 12, 71.62, 'Selling the item №325 (Mootator #743)', '2022-06-29 02:02:01', 2),
(541, 12, 99.04, 'Selling the item №324 (Neo Hunter #3643)', '2022-06-29 16:26:34', 2),
(542, 12, -12, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:15:49', 1),
(543, 12, -10, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:25:03', 1),
(544, 12, -10, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:27:08', 1),
(545, 12, -10, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:28:33', 1),
(546, 12, -10, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:30:06', 1),
(547, 12, -10, 'Withdrawal Address423345656677777777777777777777777777777777777 (eth)', '2022-07-06 12:31:28', 1),
(548, 12, -255, 'Withdrawal Address5443543545454545454354354354354vvvvvvvvv (eth)', '2022-07-06 21:31:33', 1),
(549, 12, -257, 'Withdrawal Addresshhhhhhhhhhhhhhhhhhhhhhhhn797bbbbnnnnnn (eth)', '2022-07-12 16:06:40', 1),
(550, 12, -1674.76, 'Opening the case №2 (moonbirds)', '2022-07-15 19:17:02', 1),
(551, 12, -661.05, 'Opening the case №2 (moonbirds)', '2022-07-20 17:11:42', 1),
(552, 12, -647.63, 'Opening the case №2 (moonbirds)', '2022-07-20 18:04:13', 1),
(553, 0, 0.01, 'Rain №', '2022-07-26 19:07:25', 1),
(554, 12, 0.01, 'Rain №3', '2022-07-26 19:12:29', 1),
(555, 12, 0.08, 'Rain №5', '2022-07-26 22:10:22', 1),
(556, 12, 0.1, 'Rain №6', '2022-07-26 22:15:17', 1),
(557, 12, 0.09, 'Rain №7', '2022-07-26 22:18:20', 1),
(558, 12, 0.03, 'Rain №9', '2022-07-26 22:23:31', 1),
(559, 12, 0.06, 'Rain №10', '2022-07-26 22:28:14', 1),
(560, 12, 0.08, 'Rain №11', '2022-07-26 22:50:45', 1),
(561, 12, 0.04, 'Rain №12', '2022-07-26 23:04:50', 1),
(562, 12, -72.35, 'Opening the case №2 (moonbirds)', '2022-07-26 23:21:47', 1),
(563, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-07-26 23:21:47', 1),
(564, 12, 9183.44, 'Selling the item №343 (Okay Bear #2112)', '2022-07-26 23:22:58', 2),
(565, 12, -72.9, 'Opening the case №2 (moonbirds)', '2022-07-26 23:49:04', 1),
(566, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-07-26 23:49:04', 1),
(567, 12, -72.88, 'Opening the case №2 (moonbirds)', '2022-07-26 23:50:52', 1),
(568, 12, 100, 'Opening the case №2 (moonbirds) BalanceOnSite', '2022-07-26 23:50:52', 1),
(569, 12, -254.26, 'Opening the case №2 (Terrific Soun)', '2022-11-14 17:53:35', 1),
(570, 12, 100, 'Opening the case №2 (Terrific Soun) BalanceOnSite', '2022-11-14 17:53:35', 1),
(571, 37, 0, 'Change seed new seed:27d6c8307ccf18X (old seed:27d6c8307ccf18)', '2022-11-28 01:50:49', 1),
(572, 37, 0, 'Change seed new seed:27d6c8307ccf18X (old seed:27d6c8307ccf18X)', '2022-12-29 04:32:51', 9),
(573, 37, 0, 'Change seed new seed:27d6c8307ccf18X8 (old seed:27d6c8307ccf18X)', '2022-12-29 04:33:04', 9),
(574, 37, 0, 'Change seed new seed:27d6c8307ccf18AX8 (old seed:27d6c8307ccf18X8)', '2022-12-29 04:36:56', 9),
(575, 37, 0, 'Change seed new seed:27d6c8307ccf18AX8 (old seed:27d6c8307ccf18AX8)', '2022-12-31 20:58:37', 9),
(576, 37, 0, 'Change seed new seed:27d6c8307ccf18AX8 (old seed:27d6c8307ccf18AX8)', '2022-12-31 20:59:37', 9),
(577, 37, 0, 'Change seed new seed:27d6c8307ccf18AX8 (old seed:27d6c8307ccf18AX8)', '2022-12-31 22:07:07', 9),
(578, 37, 0, 'Change seed new seed:27d16c8307ccf18AX8 (old seed:27d6c8307ccf18AX8)', '2022-12-31 22:09:59', 9),
(579, 37, 0, 'Change seed new seed:27d16c8307ccf16AX8 (old seed:27d16c8307ccf18AX8)', '2022-12-31 23:49:22', 9),
(580, 40, 10, 'Deposit using eth', '2023-01-02 03:00:50', 0),
(581, 40, 10, 'Referral deposit from user 40 deposit id 19', '2023-01-02 03:00:50', 4),
(582, 43, 150, 'Deposit using eth deposit id 42', '2023-01-03 02:24:00', 0),
(583, 43, 150, 'Referral deposit from user 43 deposit id 42', '2023-01-03 02:24:00', 4),
(584, 37, 0, 'Change seed new seed:27d16c8307ccf16AX8 (old seed:27d16c8307ccf16AX8)', '2023-01-05 01:09:40', 9),
(585, 37, 0, 'Change seed new seed:27d16c8307ccf16AX8 (old seed:27d16c8307ccf16AX8)', '2023-01-05 01:09:46', 9),
(586, 37, 0, 'Change seed new seed:27d16c8307ccf16A8 (old seed:27d16c8307ccf16AX8)', '2023-01-12 01:31:34', 9),
(587, 37, 0, 'Change seed new seed:27d16c8301ccf16A8 (old seed:27d16c8307ccf16A8)', '2023-01-12 01:33:21', 9),
(588, 37, 0, 'Change seed new seed:27d16c8101ccf16A8 (old seed:27d16c8301ccf16A8)', '2023-01-12 01:33:42', 9),
(589, 12, 39.22, 'Selling the item dItem333 (Smyth #4045)', '2023-01-13 19:44:48', 2),
(590, 12, 39.22, 'Selling the item dItem333 (Smyth #4045)', '2023-01-13 20:17:51', 2),
(591, 12, 98.05, 'Selling the item dItem334 (Doggo #0)', '2023-01-13 20:35:19', 2),
(592, 12, 98.05, 'Selling the item dItem334 (Doggo #0)', '2023-01-13 20:35:47', 2),
(593, 12, 98.05, 'Selling the NFT for balance dItem334 (Doggo #0)', '2023-01-13 21:02:20', 2),
(594, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:12:47', 2),
(595, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:21:17', 2),
(596, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:24:31', 2),
(597, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:27:58', 2),
(598, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:30:47', 2),
(599, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:33:14', 2),
(600, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:36:05', 2),
(601, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 21:38:43', 2),
(602, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 22:27:11', 2),
(603, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 23:47:38', 2),
(604, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 23:49:02', 2),
(605, 12, 39.22, 'Selling the NFT for balance dItem333 (Smyth #4045)', '2023-01-13 23:51:48', 2),
(606, 12, 66.59, 'Selling the NFT for balance dItem335 (Okay Bear #2115)', '2023-01-13 23:55:19', 2),
(607, 12, -39.22, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624561 (eth)', '2023-01-14 21:53:36', 1),
(608, 12, -39.22, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624561 (eth)', '2023-01-14 22:54:11', 1),
(609, 12, -39.22, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624561 (eth)', '2023-01-14 23:06:56', 1),
(610, 12, 0, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624861 (eth)', '2023-01-15 00:16:50', 1),
(611, 12, 0, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624561 (eth)', '2023-01-15 00:22:25', 1),
(612, 12, 0, 'NFT dItem333 Sell for Crypto Address0x694289432858953895395499542225624561 (eth)', '2023-01-15 00:25:58', 1),
(613, 37, 0, 'Change seed new seed:27d16c8101ccf16A8 (old seed:27d16c8101ccf16A8)', '2023-01-18 01:45:09', 9),
(614, 37, 0, 'Change seed new seed:27d16c8101ccf16A8 (old seed:27d16c8101ccf16A8)', '2023-01-18 01:45:25', 9),
(615, 12, 0, 'Change seed new seed:asd52112x221220a (old seed:asd52112x221220a)', '2023-01-18 02:28:00', 9),
(616, 12, 0, 'NFT dItem333 Sell for Crypto Address0x694686432858953895395499542225624561 (eth)', '2023-01-18 02:35:13', 1),
(617, 12, 0, 'Change seed new seed:asd52112x221220a (old seed:asd52112x221220a)', '2023-01-18 04:19:58', 9),
(618, 11, 1241, 'Auto sell item №31', '2023-01-25 18:45:33', 2),
(619, 12, 240, 'Auto sell item №34', '2023-01-25 18:45:33', 2),
(620, 12, 240, 'Auto sell item №39', '2023-01-25 18:45:33', 2),
(621, 12, 240, 'Auto sell item №41', '2023-01-25 18:45:33', 2),
(622, 12, 240, 'Auto sell item №42', '2023-01-25 18:45:33', 2),
(623, 11, 240, 'Auto sell item №43', '2023-01-25 18:45:33', 2),
(624, 11, 240, 'Auto sell item №44', '2023-01-25 18:45:33', 2),
(625, 11, 240, 'Auto sell item №46', '2023-01-25 18:45:33', 2),
(626, 12, 240, 'Auto sell item №47', '2023-01-25 18:45:33', 2),
(627, 11, 240, 'Auto sell item №48', '2023-01-25 18:45:33', 2),
(628, 12, 240, 'Auto sell item №49', '2023-01-25 18:45:33', 2),
(629, 12, 240, 'Auto sell item №50', '2023-01-25 18:45:33', 2),
(630, 11, 240, 'Auto sell item №51', '2023-01-25 18:45:33', 2),
(631, 11, 240, 'Auto sell item №52', '2023-01-25 18:45:33', 2),
(632, 12, 240, 'Auto sell item №53', '2023-01-25 18:45:33', 2),
(633, 11, 230, 'Auto sell item №54', '2023-01-25 18:45:33', 2),
(634, 12, 230, 'Auto sell item №55', '2023-01-25 18:45:33', 2),
(635, 12, 240, 'Auto sell item №56', '2023-01-25 18:45:33', 2),
(636, 11, 240, 'Auto sell item №57', '2023-01-25 18:45:33', 2),
(637, 12, 240, 'Auto sell item №58', '2023-01-25 18:45:33', 2),
(638, 11, 240, 'Auto sell item №59', '2023-01-25 18:45:33', 2),
(639, 12, 240, 'Auto sell item №60', '2023-01-25 18:45:33', 2),
(640, 11, 240, 'Auto sell item №61', '2023-01-25 18:45:33', 2),
(641, 12, 240, 'Auto sell item №62', '2023-01-25 18:45:33', 2),
(642, 11, 240, 'Auto sell item №63', '2023-01-25 18:45:33', 2),
(643, 11, 240, 'Auto sell item №64', '2023-01-25 18:45:33', 2),
(644, 11, 240, 'Auto sell item №65', '2023-01-25 18:45:33', 2),
(645, 11, 240, 'Auto sell item №66', '2023-01-25 18:45:33', 2),
(646, 11, 240, 'Auto sell item №67', '2023-01-25 18:45:33', 2),
(647, 11, 240, 'Auto sell item №68', '2023-01-25 18:45:33', 2),
(648, 11, 240, 'Auto sell item №69', '2023-01-25 18:45:33', 2),
(649, 11, 240, 'Auto sell item №70', '2023-01-25 18:45:33', 2),
(650, 11, 240, 'Auto sell item №71', '2023-01-25 18:45:33', 2),
(651, 11, 240, 'Auto sell item №72', '2023-01-25 18:45:33', 2),
(652, 11, 240, 'Auto sell item №73', '2023-01-25 18:45:33', 2),
(653, 12, 240, 'Auto sell item №74', '2023-01-25 18:45:33', 2),
(654, 11, 240, 'Auto sell item №75', '2023-01-25 18:45:33', 2),
(655, 11, 240, 'Auto sell item №78', '2023-01-25 18:45:33', 2),
(656, 11, 240, 'Auto sell item №81', '2023-01-25 18:45:33', 2),
(657, 13, 240, 'Auto sell item №82', '2023-01-25 18:45:33', 2),
(658, 9, 240, 'Auto sell item №83', '2023-01-25 18:45:34', 2),
(659, 9, 240, 'Auto sell item №84', '2023-01-25 18:45:34', 2),
(660, 13, 240, 'Auto sell item №85', '2023-01-25 18:45:34', 2),
(661, 13, 240, 'Auto sell item №86', '2023-01-25 18:45:34', 2),
(662, 13, 240, 'Auto sell item №87', '2023-01-25 18:45:34', 2),
(663, 13, 240, 'Auto sell item №88', '2023-01-25 18:45:34', 2),
(664, 13, 240, 'Auto sell item №89', '2023-01-25 18:45:34', 2),
(665, 13, 240, 'Auto sell item №90', '2023-01-25 18:45:34', 2),
(666, 13, 240, 'Auto sell item №91', '2023-01-25 18:45:34', 2),
(667, 13, 240, 'Auto sell item №95', '2023-01-25 18:45:34', 2),
(668, 12, 240, 'Auto sell item №96', '2023-01-25 18:45:34', 2),
(669, 9, 240, 'Auto sell item №97', '2023-01-25 18:45:34', 2),
(670, 12, 240, 'Auto sell item №98', '2023-01-25 18:45:34', 2),
(671, 12, 240, 'Auto sell item №99', '2023-01-25 18:45:34', 2),
(672, 9, 240, 'Auto sell item №100', '2023-01-25 18:45:34', 2),
(673, 12, 240, 'Auto sell item №105', '2023-01-25 18:45:34', 2),
(674, 11, 240, 'Auto sell item №106', '2023-01-25 18:45:34', 2),
(675, 11, 240, 'Auto sell item №107', '2023-01-25 18:45:34', 2),
(676, 12, 240, 'Auto sell item №108', '2023-01-25 18:45:34', 2),
(677, 12, 240, 'Auto sell item №109', '2023-01-25 18:45:34', 2),
(678, 11, 240, 'Auto sell item №110', '2023-01-25 18:45:34', 2),
(679, 12, 240, 'Auto sell item №111', '2023-01-25 18:45:34', 2),
(680, 11, 240, 'Auto sell item №112', '2023-01-25 18:45:34', 2),
(681, 11, 240, 'Auto sell item №113', '2023-01-25 18:45:34', 2),
(682, 12, 240, 'Auto sell item №114', '2023-01-25 18:45:34', 2),
(683, 12, 240, 'Auto sell item №115', '2023-01-25 18:45:34', 2),
(684, 12, 240, 'Auto sell item №116', '2023-01-25 18:45:34', 2),
(685, 12, 240, 'Auto sell item №117', '2023-01-25 18:45:34', 2),
(686, 12, 240, 'Auto sell item №118', '2023-01-25 18:45:34', 2),
(687, 11, 240, 'Auto sell item №119', '2023-01-25 18:45:34', 2),
(688, 12, 240, 'Auto sell item №120', '2023-01-25 18:45:34', 2),
(689, 11, 240, 'Auto sell item №121', '2023-01-25 18:45:34', 2),
(690, 12, 240, 'Auto sell item №122', '2023-01-25 18:45:34', 2),
(691, 12, 240, 'Auto sell item №123', '2023-01-25 18:45:34', 2),
(692, 11, 240, 'Auto sell item №124', '2023-01-25 18:45:34', 2),
(693, 11, 240, 'Auto sell item №125', '2023-01-25 18:45:34', 2),
(694, 12, 240, 'Auto sell item №126', '2023-01-25 18:45:34', 2),
(695, 12, 240, 'Auto sell item №127', '2023-01-25 18:45:34', 2),
(696, 11, 240, 'Auto sell item №128', '2023-01-25 18:45:34', 2),
(697, 12, 240, 'Auto sell item №129', '2023-01-25 18:45:34', 2),
(698, 11, 240, 'Auto sell item №130', '2023-01-25 18:45:34', 2),
(699, 12, 240, 'Auto sell item №131', '2023-01-25 18:45:34', 2),
(700, 11, 240, 'Auto sell item №132', '2023-01-25 18:45:34', 2),
(701, 12, 240, 'Auto sell item №133', '2023-01-25 18:45:34', 2),
(702, 11, 240, 'Auto sell item №134', '2023-01-25 18:45:34', 2),
(703, 12, 240, 'Auto sell item №135', '2023-01-25 18:45:34', 2),
(704, 11, 240, 'Auto sell item №136', '2023-01-25 18:45:34', 2),
(705, 12, 240, 'Auto sell item №137', '2023-01-25 18:45:34', 2),
(706, 12, 240, 'Auto sell item №138', '2023-01-25 18:45:34', 2),
(707, 11, 240, 'Auto sell item №139', '2023-01-25 18:45:34', 2),
(708, 12, 240, 'Auto sell item №140', '2023-01-25 18:45:34', 2),
(709, 11, 240, 'Auto sell item №141', '2023-01-25 18:45:34', 2),
(710, 12, 240, 'Auto sell item №142', '2023-01-25 18:45:34', 2),
(711, 12, 240, 'Auto sell item №143', '2023-01-25 18:45:34', 2),
(712, 11, 240, 'Auto sell item №144', '2023-01-25 18:45:34', 2),
(713, 11, 240, 'Auto sell item №145', '2023-01-25 18:45:34', 2),
(714, 12, 240, 'Auto sell item №146', '2023-01-25 18:45:34', 2),
(715, 12, 240, 'Auto sell item №147', '2023-01-25 18:45:34', 2),
(716, 12, 240, 'Auto sell item №148', '2023-01-25 18:45:34', 2),
(717, 11, 240, 'Auto sell item №149', '2023-01-25 18:45:34', 2),
(718, 12, 240, 'Auto sell item №150', '2023-01-25 18:45:34', 2),
(719, 12, 240, 'Auto sell item №151', '2023-01-25 18:45:34', 2),
(720, 11, 240, 'Auto sell item №152', '2023-01-25 18:45:34', 2),
(721, 11, 240, 'Auto sell item №153', '2023-01-25 18:45:34', 2),
(722, 12, 240, 'Auto sell item №154', '2023-01-25 18:45:34', 2),
(723, 12, 240, 'Auto sell item №155', '2023-01-25 18:45:34', 2),
(724, 12, 240, 'Auto sell item №156', '2023-01-25 18:45:34', 2),
(725, 11, 240, 'Auto sell item №157', '2023-01-25 18:45:34', 2),
(726, 12, 240, 'Auto sell item №158', '2023-01-25 18:45:34', 2),
(727, 11, 240, 'Auto sell item №159', '2023-01-25 18:45:34', 2),
(728, 12, 240, 'Auto sell item №160', '2023-01-25 18:45:34', 2),
(729, 12, 240, 'Auto sell item №161', '2023-01-25 18:45:34', 2),
(730, 11, 240, 'Auto sell item №162', '2023-01-25 18:45:34', 2),
(731, 12, 240, 'Auto sell item №163', '2023-01-25 18:45:34', 2),
(732, 11, 240, 'Auto sell item №164', '2023-01-25 18:45:34', 2),
(733, 12, 240, 'Auto sell item №165', '2023-01-25 18:45:34', 2),
(734, 11, 240, 'Auto sell item №166', '2023-01-25 18:45:34', 2),
(735, 11, 240, 'Auto sell item №167', '2023-01-25 18:45:34', 2),
(736, 12, 240, 'Auto sell item №168', '2023-01-25 18:45:34', 2),
(737, 12, 240, 'Auto sell item №169', '2023-01-25 18:45:34', 2),
(738, 11, 240, 'Auto sell item №170', '2023-01-25 18:45:34', 2),
(739, 12, 240, 'Auto sell item №171', '2023-01-25 18:45:34', 2),
(740, 11, 240, 'Auto sell item №172', '2023-01-25 18:45:34', 2),
(741, 11, 240, 'Auto sell item №173', '2023-01-25 18:45:34', 2),
(742, 12, 240, 'Auto sell item №174', '2023-01-25 18:45:34', 2),
(743, 12, 240, 'Auto sell item №175', '2023-01-25 18:45:34', 2),
(744, 11, 240, 'Auto sell item №176', '2023-01-25 18:45:34', 2),
(745, 12, 240, 'Auto sell item №177', '2023-01-25 18:45:34', 2),
(746, 11, 240, 'Auto sell item №178', '2023-01-25 18:45:34', 2),
(747, 12, 240, 'Auto sell item №179', '2023-01-25 18:45:34', 2),
(748, 12, 240, 'Auto sell item №180', '2023-01-25 18:45:34', 2),
(749, 12, 240, 'Auto sell item №181', '2023-01-25 18:45:34', 2),
(750, 12, 240, 'Auto sell item №182', '2023-01-25 18:45:34', 2),
(751, 12, 240, 'Auto sell item №183', '2023-01-25 18:45:34', 2),
(752, 12, 240, 'Auto sell item №184', '2023-01-25 18:45:34', 2),
(753, 12, 240, 'Auto sell item №185', '2023-01-25 18:45:34', 2),
(754, 11, 240, 'Auto sell item №186', '2023-01-25 18:45:34', 2),
(755, 12, 240, 'Auto sell item №187', '2023-01-25 18:45:34', 2),
(756, 11, 240, 'Auto sell item №188', '2023-01-25 18:45:34', 2),
(757, 11, 240, 'Auto sell item №189', '2023-01-25 18:45:34', 2),
(758, 12, 240, 'Auto sell item №190', '2023-01-25 18:45:34', 2),
(759, 11, 240, 'Auto sell item №191', '2023-01-25 18:45:34', 2),
(760, 12, 240, 'Auto sell item №192', '2023-01-25 18:45:34', 2),
(761, 11, 240, 'Auto sell item №193', '2023-01-25 18:45:34', 2),
(762, 12, 240, 'Auto sell item №194', '2023-01-25 18:45:34', 2),
(763, 12, 240, 'Auto sell item №195', '2023-01-25 18:45:34', 2),
(764, 12, 240, 'Auto sell item №196', '2023-01-25 18:45:34', 2),
(765, 12, 240, 'Auto sell item №197', '2023-01-25 18:45:34', 2),
(766, 12, 240, 'Auto sell item №198', '2023-01-25 18:45:34', 2),
(767, 9, 240, 'Auto sell item №199', '2023-01-25 18:45:34', 2),
(768, 12, 240, 'Auto sell item №200', '2023-01-25 18:45:34', 2),
(769, 12, 240, 'Auto sell item №201', '2023-01-25 18:45:34', 2),
(770, 12, 240, 'Auto sell item №202', '2023-01-25 18:45:34', 2),
(771, 12, 240, 'Auto sell item №203', '2023-01-25 18:45:34', 2),
(772, 12, 240, 'Auto sell item №204', '2023-01-25 18:45:34', 2),
(773, 12, 240, 'Auto sell item №205', '2023-01-25 18:45:34', 2),
(774, 12, 4, 'Auto sell item №206', '2023-01-25 18:45:34', 2),
(775, 12, 35, 'Auto sell item №207', '2023-01-25 18:45:34', 2),
(776, 12, 35, 'Auto sell item №208', '2023-01-25 18:45:34', 2),
(777, 12, 4, 'Auto sell item №209', '2023-01-25 18:45:34', 2),
(778, 12, 10, 'Auto sell item №210', '2023-01-25 18:45:34', 2),
(779, 12, 4, 'Auto sell item №211', '2023-01-25 18:45:34', 2),
(780, 12, 10, 'Auto sell item №212', '2023-01-25 18:45:34', 2),
(781, 12, 100, 'Auto sell item №213', '2023-01-25 18:45:34', 2),
(782, 12, 240, 'Auto sell item №215', '2023-01-25 18:45:34', 2),
(783, 12, 240, 'Auto sell item №217', '2023-01-25 18:45:34', 2),
(784, 12, 240, 'Auto sell item №221', '2023-01-25 18:45:34', 2),
(785, 12, 240, 'Auto sell item №224', '2023-01-25 18:45:34', 2),
(786, 12, 240, 'Auto sell item №225', '2023-01-25 18:45:34', 2),
(787, 12, 240, 'Auto sell item №226', '2023-01-25 18:45:34', 2),
(788, 12, 240, 'Auto sell item №227', '2023-01-25 18:45:34', 2),
(789, 12, 240, 'Auto sell item №237', '2023-01-25 18:45:34', 2),
(790, 12, 28.83, 'Auto sell item №299', '2023-01-25 18:45:34', 2),
(791, 12, 9950.1, 'Auto sell item №312', '2023-01-25 18:45:34', 2),
(792, 12, 1.03, 'Auto sell item №313', '2023-01-25 18:45:34', 2),
(793, 12, 39.74, 'Auto sell item №314', '2023-01-25 18:45:34', 2),
(794, 12, 476.87, 'Auto sell item №315', '2023-01-25 18:45:34', 2),
(795, 12, 4557.11, 'Auto sell item №316', '2023-01-25 18:45:34', 2),
(796, 12, 309.09, 'Auto sell item №317', '2023-01-25 18:45:34', 2),
(797, 12, 63.4, 'Auto sell item №319', '2023-01-25 18:45:34', 2),
(798, 12, 71.31, 'Auto sell item №320', '2023-01-25 18:45:34', 2),
(799, 12, 99.17, 'Auto sell item №321', '2023-01-25 18:45:34', 2),
(800, 12, 70.81, 'Auto sell item №327', '2023-01-25 18:45:34', 2),
(801, 12, 70.7, 'Auto sell item №328', '2023-01-25 18:53:47', 2),
(802, 12, 66.59, 'Auto sell dItem335', '2023-01-25 19:05:56', 2),
(803, 12, 78.21, 'Auto sell dItem339', '2023-01-25 19:05:56', 2),
(804, 12, 70.39, 'Auto sell dItem340', '2023-01-25 19:05:56', 2),
(805, 12, 70.7, 'Auto sell dItem328', '2023-01-25 19:10:58', 2),
(806, 35, 9183.44, 'Auto sell dItem343', '2023-01-25 19:10:58', 2),
(807, 12, 0, 'Change seed new seed:asd52112x221220a (old seed:asd52112x221220a)', '2023-01-26 20:14:34', 9),
(808, 12, 0, 'Change seed new seed:asd52112x221220aa (old seed:asd52112x221220a)', '2023-01-27 19:30:08', 9),
(809, 12, 0, 'Change seed new seed:asd52112x22120aa (old seed:asd52112x221220aa)', '2023-01-27 22:24:11', 9),
(810, 12, 0, 'Change seed new seed:asd52112x22120aa (old seed:asd52112x22120aa)', '2023-01-27 22:24:34', 9),
(811, 12, 0, 'Change seed new seed:asd52112x22120aa (old seed:asd52112x22120aa)', '2023-03-23 17:29:17', 9),
(812, 12, 0, 'Change seed new seed:asd52112x22120aax (old seed:asd52112x22120aa)', '2023-03-23 22:21:04', 9),
(813, 12, 0, 'Change seed new seed:asd777 (old seed:asd52112x22120aax)', '2023-03-23 22:21:20', 9),
(814, 12, 0, 'Change seed new seed:testx (old seed:asd777)', '2023-03-24 00:29:50', 9),
(815, 12, 0, 'Change seed new seed:testx2 (old seed:testx)', '2023-03-24 00:30:36', 9),
(816, 12, 0, 'Change seed new seed:testx25 (old seed:testx2)', '2023-03-24 00:32:32', 9),
(817, 12, 0, 'Change seed new seed:testx255 (old seed:testx25)', '2023-03-24 00:35:57', 9),
(818, 12, 0, 'Change seed new seed:testx2555 (old seed:testx255)', '2023-03-24 00:36:12', 9),
(819, 12, 0, 'Change seed new seed:testx2555H (old seed:testx2555)', '2023-03-24 00:39:06', 9),
(820, 12, 0, 'Change seed new seed:testx2555HxX (old seed:testx2555H)', '2023-03-24 00:39:22', 9),
(821, 12, 0, 'Change seed new seed:testx2555HxAX (old seed:testx2555HxX)', '2023-03-24 00:40:48', 9),
(822, 12, 0, 'Change seed new seed:testx2555HxAX6 (old seed:testx2555HxAX)', '2023-03-24 00:41:08', 9),
(823, 12, 0, 'Change seed new seed:testx2555HxAX64 (old seed:testx2555HxAX6)', '2023-03-24 00:43:02', 9),
(824, 12, 0, 'Change seed new seed:testx2555HxAX64xx (old seed:testx2555HxAX64)', '2023-03-24 00:43:37', 9),
(825, 12, 0, 'Change seed new seed:testx2555HxAX64xx7 (old seed:testx2555HxAX64xx)', '2023-03-24 00:43:47', 9),
(826, 12, 0, 'Change seed new seed:testx2555HxAX64xx71 (old seed:testx2555HxAX64xx7)', '2023-04-05 21:45:23', 9);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_battle`
--

CREATE TABLE `opencase_battle` (
  `id` int NOT NULL,
  `creator_id` int NOT NULL,
  `participant_id` int DEFAULT NULL,
  `winner_id` int DEFAULT NULL,
  `case_id` int NOT NULL,
  `additional` text NOT NULL,
  `status` int NOT NULL,
  `price` int NOT NULL,
  `finished_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_battle`
--

INSERT INTO `opencase_battle` (`id`, `creator_id`, `participant_id`, `winner_id`, `case_id`, `additional`, `status`, `price`, `finished_at`) VALUES
(1, 1, NULL, NULL, 1, '', 3, 19, NULL),
(2, 1, NULL, NULL, 1, '', 3, 19, NULL),
(3, 1, NULL, NULL, 1, '', 3, 19, NULL),
(4, 1, NULL, NULL, 1, '', 3, 19, NULL),
(5, 11, NULL, NULL, 1, '', 3, 19, NULL),
(6, 11, NULL, NULL, 1, '', 3, 19, NULL),
(7, 11, NULL, NULL, 1, '', 3, 19, NULL),
(8, 11, NULL, NULL, 1, '', 3, 19, NULL),
(9, 11, NULL, NULL, 1, '', 3, 19, NULL),
(10, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"32\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":1241}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"33\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":1241}}]', 2, 19, '2022-04-07 21:59:43'),
(11, 12, NULL, NULL, 1, '', 3, 19, NULL),
(12, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"34\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"35\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:09:27'),
(13, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"36\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"37\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:10:12'),
(14, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"38\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"39\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:10:48'),
(15, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"40\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"41\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:12:21'),
(16, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"42\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"43\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:18:54'),
(17, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"44\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"45\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:22:13'),
(18, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"46\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"47\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:26:36'),
(19, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"48\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"49\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:27:35'),
(20, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"50\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"51\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:29:42'),
(21, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"52\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"53\",\"id\":\"3\",\"name\":\"Azuki #6969\",\"rarity\":\"industrial\",\"image\":\"https://i.imgur.com/ovQJ2dk.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:30:18'),
(22, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"54\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":230}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"55\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":230}}]', 2, 19, '2022-04-07 22:31:25'),
(23, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"56\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"57\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:32:08'),
(24, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"58\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"59\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:32:31'),
(25, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"60\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"61\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:32:53'),
(26, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"62\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"63\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-07 22:33:16'),
(27, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"74\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"75\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-08 00:48:39'),
(28, 13, 12, -1, 1, '[{\"userId\":13,\"drop\":{\"droppedItemId\":\"95\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"96\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-08 23:54:00'),
(30, 9, 12, -1, 1, '[{\"userId\":9,\"drop\":{\"droppedItemId\":\"97\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"98\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 03:06:40'),
(31, 12, 9, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"99\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":9,\"drop\":{\"droppedItemId\":\"100\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 03:07:11'),
(32, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"105\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"106\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 19:38:30'),
(34, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"107\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"108\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 19:49:21'),
(35, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"109\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"110\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 19:51:37'),
(36, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"111\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"112\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 19:57:09'),
(37, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"113\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"114\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-09 20:00:06'),
(39, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"119\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"120\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-13 01:17:51'),
(40, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"121\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"122\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-13 01:18:24'),
(42, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"123\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"124\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 00:21:05'),
(44, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"125\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"126\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 19:53:31'),
(45, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"127\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"128\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 19:59:47'),
(46, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"129\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"130\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 20:00:19'),
(49, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"132\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"133\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 20:59:28'),
(50, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"134\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"135\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 21:00:14'),
(51, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"136\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"137\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-14 21:02:36'),
(52, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"157\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"158\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 19:50:15'),
(53, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"159\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"160\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 19:57:56'),
(56, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"141\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"142\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-15 01:19:46'),
(57, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"139\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"140\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-15 00:14:15'),
(64, 11, 12, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"151\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"152\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-15 02:01:23'),
(65, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"149\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"150\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-15 02:00:18'),
(67, 12, 14, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"149\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":14,\"drop\":{\"droppedItemId\":\"150\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:15:01'),
(68, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"163\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"164\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 21:41:01'),
(69, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"165\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"166\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 21:54:01'),
(70, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"167\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"168\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:22:50'),
(71, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"169\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"170\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:35:11'),
(72, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"171\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"172\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:35:40'),
(73, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"175\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"176\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:37:11'),
(74, 11, 12, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"173\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"174\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:36:24'),
(75, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"177\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"178\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-16 22:38:16'),
(76, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"185\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"186\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-18 00:28:37'),
(77, 12, 11, -1, 1, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"187\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":11,\"drop\":{\"droppedItemId\":\"188\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-18 00:31:24'),
(78, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"189\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"190\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-18 00:32:43'),
(79, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"191\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"192\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-18 00:43:20'),
(80, 12, 11, -1, 1, '[{\"userId\":11,\"drop\":{\"droppedItemId\":\"193\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"194\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-18 00:50:43'),
(81, 12, 9, -1, 1, '[{\"userId\":9,\"drop\":{\"droppedItemId\":\"199\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}},{\"userId\":12,\"drop\":{\"droppedItemId\":\"200\",\"id\":\"2\",\"name\":\"Crypto Punks #3100\",\"rarity\":\"common\",\"image\":\"https://i.imgur.com/EAWxiUd.png\",\"price\":240}}]', 2, 19, '2022-04-20 18:41:02'),
(82, 12, NULL, NULL, 1, '', 0, 19, NULL),
(88, 12, NULL, NULL, 1, '', 0, 19, NULL),
(89, 12, 9, -1, 2, '[{\"userId\":12,\"drop\":{\"droppedItemId\":\"219\",\"id\":\"15694\",\"name\":\"Balance $100 onsite\",\"rarity\":\"restricted\",\"image\":\"https://i.ibb.co/8By4CgR/100b.png\",\"price\":100}},{\"userId\":9,\"drop\":{\"droppedItemId\":\"220\",\"id\":\"15694\",\"name\":\"Balance $100 onsite\",\"rarity\":\"restricted\",\"image\":\"https://i.ibb.co/8By4CgR/100b.png\",\"price\":100}}]', 2, 25, '2022-04-23 02:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `opencase_battle_cases`
--

CREATE TABLE `opencase_battle_cases` (
  `case_id` int NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `opencase_bot`
--

CREATE TABLE `opencase_bot` (
  `id` int NOT NULL,
  `steam_id` bigint NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shared_secret` varchar(255) NOT NULL,
  `identity_secret` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `offer_url` varchar(128) NOT NULL,
  `market_enable` tinyint(1) NOT NULL,
  `market_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `opencase_botevents`
--

CREATE TABLE `opencase_botevents` (
  `id` int NOT NULL,
  `bot_id` int NOT NULL,
  `event` int NOT NULL,
  `additional` text NOT NULL,
  `items_id` text NOT NULL,
  `status` int NOT NULL,
  `time_add` datetime NOT NULL,
  `time_start` datetime NOT NULL,
  `iteration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `opencase_case`
--

CREATE TABLE `opencase_case` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `sale` int NOT NULL,
  `category` int NOT NULL,
  `position` int NOT NULL,
  `rarity` int NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `chance` int NOT NULL,
  `key` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `open_count` int NOT NULL,
  `max_open_count` int NOT NULL,
  `time_limit` datetime DEFAULT NULL,
  `dep_for_open` int NOT NULL,
  `dep_open_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_case`
--

INSERT INTO `opencase_case` (`id`, `name`, `type`, `image`, `item_image`, `price`, `sale`, `category`, `position`, `rarity`, `enable`, `description`, `label`, `chance`, `key`, `open_count`, `max_open_count`, `time_limit`, `dep_for_open`, `dep_open_count`) VALUES
(1, 'free case', 2, '83623455d1e9873b366c77f2ce7825da.jpg', '', 0, 0, 1, 1, 0, 1, 'test case 123 testing', 'testcasee', 100, 'case1', 213, -1, NULL, 0, 1),
(2, 'Terrific Soun', 0, 'https://rollbit.com/game-images/relaxWantedDeadoraWild.webp', '', 0, 0, 1, 2, 0, 1, 'moonbirds case blah', 'moonbirds', 100, 'case2moonbirds', 139, -1, NULL, 0, 1),
(3, 'Everywhere Fire', 0, 'https://rollbit.com/game-images/pragmaticexternalSweetBonanza.webp', '', 0, 0, 1, 3, 0, 1, 'caseB', 'caseb', 100, 'caseb', 0, -1, NULL, 0, 1),
(4, 'Wand of Arab', 0, 'https://rollbit.com/game-images/rollbitplinko.webp', '', 0, 0, 1, 4, 0, 1, 'caseC', 'casec', 100, 'casec', 0, -1, NULL, 0, 1),
(5, 'Astronaut Night', 0, 'https://rollbit.com/game-images/nolimitGaelicGold.webp', '', 0, 0, 1, 5, 0, 1, 'caseD', 'cased', 100, 'cased', 0, -1, NULL, 0, 1),
(6, 'Amae Night', 0, 'https://rollbit.com/game-images/pragmaticexternalFishEye.webp', '', 0, 0, 1, 6, 0, 1, 'caseE', 'casee', 100, 'casee', 0, -1, NULL, 0, 1),
(7, 'Macana Labri', 0, 'https://rollbit.com/game-images/softswissBookOfCats.webp', '', 0, 0, 1, 7, 0, 1, 'caseF', 'casef', 100, 'casef', 0, -1, NULL, 0, 1),
(8, 'AK Dream', 0, 'https://rollbit.com/game-images/pushgaming_jamminjars.webp', '', 22.58, 0, 1, 8, 0, 1, 'caseG', 'caseg', 100, 'caseg', 0, -1, NULL, 0, 1),
(9, 'Ghost Case', 0, 'https://rollbit.com/game-images/pragmaticexternal_WildWestGold.webp', '', 0, 0, 1, 9, 0, 1, 'caseH', 'caseh', 100, 'caseh', 0, -1, NULL, 0, 1),
(10, 'Spooky Case', 0, 'https://rollbit.com/game-images/rollbit_xflip.webp', '', 0, 0, 1, 10, 0, 1, 'caseI', 'casel', 100, 'casel', 0, -1, NULL, 0, 1),
(11, 'Fire Fighter Box', 0, 'https://rollbit.com/game-images/relaxMoneyTrain3.webp', '', 0, 0, 1, 11, 0, 1, 'caseM', 'casem', 100, 'casem', 0, -1, NULL, 0, 1),
(12, 'The Forge', 0, 'https://rollbit.com/game-images/relax_DoubleRainbow.webp', '', 56.81, 0, 1, 12, 0, 1, 'caseN', 'casen', 100, 'casen', 0, -1, NULL, 0, 1),
(13, 'Safari Case', 0, 'https://rollbit.com/game-images/rollbit_xroulette.webp', '', 37.58, 0, 1, 13, 0, 1, 'caseO', 'caseo', 100, 'caseo', 0, -1, NULL, 0, 1),
(14, 'Pandora Box', 0, 'https://rollbit.com/game-images/pragmaticexternalGemsBonanza1.webp', '', 0, 0, 1, 14, 0, 1, 'caseP', 'casep', 100, 'casep', 0, -1, NULL, 0, 1),
(15, 'Forest Flip', 0, 'https://rollbit.com/game-images/pragmaticexternal_CaishensGold.webp', '', 0, 0, 1, 15, 0, 1, 'caseR', 'caser', 100, 'caser', 0, -1, NULL, 0, 1),
(16, 'Eye of the Dragon', 0, 'https://rollbit.com/game-images/rollbit_nftbox.webp', '', 8.44, 0, 1, 16, 0, 1, 'caseS', 'cases', 100, 'cases', 0, -1, NULL, 0, 1),
(17, 'tenasdknl', 0, 'https://rollbit.com/game-images/oryx_GAMBookofMadness.webp', '', 20.86, 0, 1, 17, 0, 1, 'tenasdknl', 'tenasdknl', 100, 'tenasdknl', 0, -1, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_category`
--

CREATE TABLE `opencase_category` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pos` int NOT NULL,
  `disable` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_category`
--

INSERT INTO `opencase_category` (`id`, `name`, `pos`, `disable`) VALUES
(1, 'main', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_deposite`
--

CREATE TABLE `opencase_deposite` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `sum` float NOT NULL,
  `num` varchar(20) NOT NULL,
  `from` int NOT NULL,
  `status` int NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_deposite`
--

INSERT INTO `opencase_deposite` (`id`, `user_id`, `sum`, `num`, `from`, `status`, `time_add`) VALUES
(2, 12, 155, '1', 1, 1, '2022-07-26 00:09:33'),
(3, 35, 6, '1', 1, 1, '2022-11-26 03:56:01'),
(4, 14, 5, '1', 1, 1, '2022-11-26 03:57:37'),
(5, 37, 6, '1', 1, 1, '2022-11-22 04:00:00'),
(6, 37, 8, 'btc', 1, 0, '2023-01-01 02:48:14'),
(7, 37, 28, 'btc', 1, 0, '2023-01-01 02:50:23'),
(8, 37, 28, 'btc', 1, 0, '2023-01-01 02:51:05'),
(9, 37, 28, 'btc', 1, 0, '2023-01-01 02:51:59'),
(10, 37, 15, 'btc', 1, 0, '2023-01-01 03:51:26'),
(11, 37, 25, 'ltc', 1, 0, '2023-01-01 04:01:13'),
(12, 37, 50, 'eth', 1, 0, '2023-01-01 04:04:58'),
(13, 37, 15, 'btc', 1, 0, '2023-01-01 04:22:26'),
(14, 37, 16, 'eth', 1, 0, '2023-01-01 20:30:41'),
(15, 37, 61, 'eth', 1, 0, '2023-01-02 00:14:19'),
(16, 39, 61, 'eth', 1, 0, '2023-01-02 00:19:54'),
(17, 40, 61, 'eth', 1, 0, '2023-01-02 00:21:35'),
(18, 40, 155, 'eth', 1, 1, '2023-01-02 00:28:30'),
(19, 40, 10, 'eth', 1, 1, '2023-01-02 03:00:30'),
(20, 43, 155, 'eth', 1, 0, '2023-01-03 00:26:18'),
(21, 43, 55, 'eth', 1, 0, '2023-01-03 00:43:36'),
(22, 43, 55, 'eth', 1, 0, '2023-01-03 00:44:18'),
(23, 43, 55, 'eth', 1, 0, '2023-01-03 00:46:52'),
(24, 43, 15, 'eth', 1, 0, '2023-01-03 00:48:36'),
(25, 43, 55, 'eth', 1, 0, '2023-01-03 00:56:42'),
(26, 43, 56, 'eth', 1, 0, '2023-01-03 00:57:57'),
(27, 43, 68, 'eth', 1, 0, '2023-01-03 01:00:24'),
(28, 43, 24, 'eth', 1, 0, '2023-01-03 01:03:38'),
(29, 43, 155, 'eth', 1, 0, '2023-01-03 01:34:57'),
(30, 43, 20, 'eth', 1, 0, '2023-01-03 01:36:16'),
(31, 43, 40, 'ltc', 1, 0, '2023-01-03 01:37:05'),
(32, 43, 40, 'ltc', 1, 0, '2023-01-03 01:37:13'),
(33, 43, 80, 'eth', 1, 0, '2023-01-03 01:37:25'),
(34, 43, 100, 'ltc', 1, 0, '2023-01-03 01:37:37'),
(35, 43, 24, 'eth', 1, 0, '2023-01-03 01:37:54'),
(36, 43, 44, 'eth', 1, 0, '2023-01-03 01:43:34'),
(37, 43, 40, 'eth', 1, 0, '2023-01-03 01:47:32'),
(38, 43, 24, 'eth', 1, 0, '2023-01-03 01:48:40'),
(39, 43, 26, 'eth', 1, 0, '2023-01-03 01:51:04'),
(40, 43, 20, 'eth', 1, 0, '2023-01-03 01:56:53'),
(41, 43, 30, 'eth', 1, 0, '2023-01-03 02:01:12'),
(42, 43, 150, 'eth', 1, 1, '2023-01-03 02:23:48'),
(43, 37, 55, 'eth', 1, 0, '2023-01-12 01:32:22'),
(44, 12, 155, 'eth', 1, 0, '2023-01-18 02:43:28'),
(45, 12, 55, 'btc', 1, 0, '2023-01-21 01:55:19'),
(46, 12, 55, 'ltc', 1, 0, '2023-01-21 02:42:32'),
(47, 12, 55, 'btc', 1, 0, '2023-03-23 22:24:08'),
(48, 12, 55, 'ltc', 1, 0, '2023-04-03 02:40:49'),
(49, 12, 14, 'bch', 1, 0, '2023-04-03 03:02:30'),
(50, 12, 55, 'eth', 1, 0, '2023-04-05 21:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `opencase_droppeditems`
--

CREATE TABLE `opencase_droppeditems` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `publicid` varchar(150) NOT NULL,
  `item_id` int NOT NULL,
  `quality` int NOT NULL,
  `rarity` int NOT NULL,
  `price` float NOT NULL,
  `time_drop` datetime NOT NULL,
  `status` int NOT NULL,
  `from` int NOT NULL,
  `fast` tinyint(1) NOT NULL,
  `offer_id` bigint NOT NULL,
  `bot_id` int NOT NULL,
  `withdrawable` tinyint(1) NOT NULL DEFAULT '1',
  `usable` tinyint(1) NOT NULL DEFAULT '1',
  `error` varchar(255) DEFAULT NULL,
  `analog_id` int DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `network` varchar(15) DEFAULT NULL,
  `mintaddress` varchar(255) DEFAULT NULL,
  `caseprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_droppeditems`
--

INSERT INTO `opencase_droppeditems` (`id`, `user_id`, `publicid`, `item_id`, `quality`, `rarity`, `price`, `time_drop`, `status`, `from`, `fast`, `offer_id`, `bot_id`, `withdrawable`, `usable`, `error`, `analog_id`, `name`, `image`, `network`, `mintaddress`, `caseprice`) VALUES
(1, 1, '', 6911, 5, 0, 330, '2022-02-28 00:50:58', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(2, 1, '', 6911, 5, 0, 330, '2022-02-28 00:52:31', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(3, 1, '', 519, 5, 0, 8, '2022-02-28 01:20:54', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(4, 1, '', 519, 5, 0, 8, '2022-02-28 01:21:15', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(5, 1, '', 519, 5, 0, 8, '2022-02-28 01:22:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(6, 1, '', 6911, 5, 0, 330, '2022-02-28 01:22:07', 10, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(7, 1, '', 12378, 5, 0, 413, '2022-02-28 01:23:43', 3, -1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(8, 1, '', 519, 5, 0, 8, '2022-03-08 17:12:26', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(9, 1, '', 519, 5, 0, 8, '2022-03-08 17:18:08', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(10, 1, '', 519, 5, 0, 8, '2022-03-08 17:18:37', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(11, 1, '', 519, 5, 0, 8, '2022-03-08 17:27:46', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(12, 1, '', 519, 5, 0, 8, '2022-03-08 17:28:10', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(13, 1, '', 519, 5, 0, 8, '2022-03-08 18:00:52', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(14, 1, '', 519, 5, 0, 8, '2022-03-08 18:20:44', 3, 1, 1, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(15, 1, '', 519, 5, 0, 8, '2022-03-09 00:18:24', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(16, 1, '', 519, 5, 0, 8, '2022-03-09 00:18:45', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(17, 1, '', 519, 5, 0, 8, '2022-03-09 00:18:45', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(18, 1, '', 519, 5, 0, 8, '2022-03-09 00:41:40', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(19, 1, '', 519, 5, 0, 8, '2022-03-09 14:33:54', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(20, 1, '', 519, 5, 5, 8, '2022-03-10 01:59:20', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(21, 1, '', 519, 5, 3, 8, '2022-03-10 02:23:49', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(22, 1, '', 2, 5, 1, 1241, '2022-03-10 20:56:31', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(23, 1, '', 2, 5, 2, 1241, '2022-03-10 20:56:42', 3, 1, 1, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(24, 1, '', 2, 5, 5, 1241, '2022-03-10 20:57:01', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(25, 1, '', 2, 5, 3, 1241, '2022-03-10 20:57:20', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(26, 1, '', 2, 5, 0, 1241, '2022-03-10 20:57:38', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(27, 1, '', 2, 5, 0, 1241, '2022-03-11 01:10:39', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(28, 1, '', 2, 5, 0, 1241, '2022-03-11 01:12:39', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(29, 1, '', 2, 5, 0, 1241, '2022-03-11 01:29:03', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(30, 1, '', 2, 5, 0, 1241, '2022-03-11 01:29:03', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(31, 11, '', 2, 5, 0, 1241, '2022-04-07 21:45:23', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(32, 12, '', 2, 5, 0, 1241, '2022-04-07 21:59:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(33, 11, '', 2, 5, 0, 1241, '2022-04-07 21:59:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(34, 12, '', 3, 5, 0, 240, '2022-04-07 22:09:27', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(35, 11, '', 3, 5, 0, 240, '2022-04-07 22:09:27', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(36, 11, '', 3, 5, 0, 240, '2022-04-07 22:10:12', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(37, 12, '', 3, 5, 0, 240, '2022-04-07 22:10:12', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(38, 11, '', 3, 5, 0, 240, '2022-04-07 22:10:48', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(39, 12, '', 3, 5, 0, 240, '2022-04-07 22:10:48', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(40, 11, '', 3, 5, 0, 240, '2022-04-07 22:12:21', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(41, 12, '', 3, 5, 0, 240, '2022-04-07 22:12:21', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(42, 12, '', 3, 5, 0, 240, '2022-04-07 22:18:54', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(43, 11, '', 3, 5, 0, 240, '2022-04-07 22:18:54', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(44, 11, '', 3, 5, 0, 240, '2022-04-07 22:22:13', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(45, 12, '', 3, 5, 0, 240, '2022-04-07 22:22:13', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(46, 11, '', 3, 5, 0, 240, '2022-04-07 22:26:36', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(47, 12, '', 3, 5, 0, 240, '2022-04-07 22:26:36', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(48, 11, '', 3, 5, 0, 240, '2022-04-07 22:27:35', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(49, 12, '', 3, 5, 0, 240, '2022-04-07 22:27:35', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(50, 12, '', 3, 5, 0, 240, '2022-04-07 22:29:42', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(51, 11, '', 3, 5, 0, 240, '2022-04-07 22:29:42', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(52, 11, '', 3, 5, 0, 240, '2022-04-07 22:30:18', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(53, 12, '', 3, 5, 0, 240, '2022-04-07 22:30:18', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(54, 11, '', 2, 5, 0, 230, '2022-04-07 22:31:25', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(55, 12, '', 2, 5, 0, 230, '2022-04-07 22:31:25', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(56, 12, '', 2, 5, 0, 240, '2022-04-07 22:32:08', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(57, 11, '', 2, 5, 0, 240, '2022-04-07 22:32:08', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(58, 12, '', 2, 5, 0, 240, '2022-04-07 22:32:31', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(59, 11, '', 2, 5, 0, 240, '2022-04-07 22:32:31', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(60, 12, '', 2, 5, 0, 240, '2022-04-07 22:32:53', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(61, 11, '', 2, 5, 0, 240, '2022-04-07 22:32:53', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(62, 12, '', 2, 5, 0, 240, '2022-04-07 22:33:16', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(63, 11, '', 2, 5, 0, 240, '2022-04-07 22:33:16', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(64, 11, '', 2, 5, 0, 240, '2022-04-07 22:33:37', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(65, 11, '', 2, 5, 0, 240, '2022-04-07 22:33:57', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(66, 11, '', 2, 5, 0, 240, '2022-04-07 22:34:16', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(67, 11, '', 2, 5, 0, 240, '2022-04-07 22:34:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(68, 11, '', 2, 5, 0, 240, '2022-04-07 22:34:52', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(69, 11, '', 2, 5, 0, 240, '2022-04-07 22:35:10', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(70, 11, '', 2, 5, 0, 240, '2022-04-07 22:35:29', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(71, 11, '', 2, 5, 0, 240, '2022-04-07 22:35:29', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(72, 11, '', 2, 5, 0, 240, '2022-04-07 22:35:29', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(73, 11, '', 2, 5, 0, 240, '2022-04-07 22:35:29', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(74, 12, '', 2, 5, 0, 240, '2022-04-08 00:48:39', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(75, 11, '', 2, 5, 0, 240, '2022-04-08 00:48:39', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(76, 11, '', 2, 5, 0, 240, '2022-04-08 00:50:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(77, 11, '', 2, 5, 0, 240, '2022-04-08 00:50:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(78, 11, '', 2, 5, 0, 240, '2022-04-08 00:50:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(79, 11, '', 2, 5, 0, 240, '2022-04-08 00:50:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(80, 11, '', 2, 5, 0, 240, '2022-04-08 00:50:34', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(81, 11, '', 2, 5, 0, 240, '2022-04-08 00:51:39', 3, 1, 1, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(82, 13, '', 2, 5, 0, 240, '2022-04-08 02:44:43', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(83, 9, '', 2, 5, 0, 240, '2022-04-08 16:07:10', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(84, 9, '', 2, 5, 0, 240, '2022-04-08 16:20:48', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(85, 13, '', 2, 5, 0, 240, '2022-04-08 21:39:33', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(86, 13, '', 2, 5, 0, 240, '2022-04-08 21:40:42', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(87, 13, '', 2, 5, 0, 240, '2022-04-08 21:43:46', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(88, 13, '', 2, 5, 0, 240, '2022-04-08 21:44:11', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(89, 13, '', 2, 5, 0, 240, '2022-04-08 21:48:31', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(90, 13, '', 2, 5, 0, 240, '2022-04-08 21:48:55', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(91, 13, '', 2, 5, 0, 240, '2022-04-08 21:58:27', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(92, 13, '', 2, 5, 0, 240, '2022-04-08 22:09:15', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(93, 13, '', 2, 5, 0, 240, '2022-04-08 22:09:43', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(94, 13, '', 2, 5, 0, 240, '2022-04-08 23:36:51', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(95, 13, '', 2, 5, 0, 240, '2022-04-08 23:54:00', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(96, 12, '', 2, 5, 0, 240, '2022-04-08 23:54:00', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(97, 9, '', 2, 5, 0, 240, '2022-04-09 03:06:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(98, 12, '', 2, 5, 0, 240, '2022-04-09 03:06:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(99, 12, '', 2, 5, 0, 240, '2022-04-09 03:07:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(100, 9, '', 2, 5, 0, 240, '2022-04-09 03:07:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(101, 12, '', 2, 5, 0, 240, '2022-04-09 17:13:43', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(102, 12, '', 2, 5, 0, 240, '2022-04-09 19:36:47', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(103, 12, '', 2, 5, 0, 240, '2022-04-09 19:37:14', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(104, 12, '', 2, 5, 0, 240, '2022-04-09 19:37:14', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(105, 12, '', 2, 5, 0, 240, '2022-04-09 19:38:30', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(106, 11, '', 2, 5, 0, 240, '2022-04-09 19:38:30', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(107, 11, '', 2, 5, 0, 240, '2022-04-09 19:49:21', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(108, 12, '', 2, 5, 0, 240, '2022-04-09 19:49:21', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(109, 12, '', 2, 5, 0, 240, '2022-04-09 19:51:37', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(110, 11, '', 2, 5, 0, 240, '2022-04-09 19:51:37', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(111, 12, '', 2, 5, 0, 240, '2022-04-09 19:57:09', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(112, 11, '', 2, 5, 0, 240, '2022-04-09 19:57:09', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(113, 11, '', 2, 5, 0, 240, '2022-04-09 20:00:06', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(114, 12, '', 2, 5, 0, 240, '2022-04-09 20:00:06', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(115, 12, '', 2, 5, 0, 240, '2022-04-09 20:01:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(116, 12, '', 2, 5, 0, 240, '2022-04-09 20:07:50', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(117, 12, '', 2, 5, 0, 240, '2022-04-12 18:28:01', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(118, 12, '', 2, 5, 0, 240, '2022-04-13 00:51:26', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(119, 11, '', 2, 5, 0, 240, '2022-04-13 01:17:51', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(120, 12, '', 2, 5, 0, 240, '2022-04-13 01:17:51', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(121, 11, '', 2, 5, 0, 240, '2022-04-13 01:18:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(122, 12, '', 2, 5, 0, 240, '2022-04-13 01:18:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(123, 12, '', 2, 5, 0, 240, '2022-04-14 00:21:05', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(124, 11, '', 2, 5, 0, 240, '2022-04-14 00:21:05', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(125, 11, '', 2, 5, 0, 240, '2022-04-14 19:53:31', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(126, 12, '', 2, 5, 0, 240, '2022-04-14 19:53:31', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(127, 12, '', 2, 5, 0, 240, '2022-04-14 19:59:46', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(128, 11, '', 2, 5, 0, 240, '2022-04-14 19:59:47', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(129, 12, '', 2, 5, 0, 240, '2022-04-14 20:00:19', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(130, 11, '', 2, 5, 0, 240, '2022-04-14 20:00:19', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(131, 12, '', 2, 5, 0, 240, '2022-04-14 20:01:55', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(132, 11, '', 2, 5, 0, 240, '2022-04-14 20:59:28', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(133, 12, '', 2, 5, 0, 240, '2022-04-14 20:59:28', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(134, 11, '', 2, 5, 0, 240, '2022-04-14 21:00:14', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(135, 12, '', 2, 5, 0, 240, '2022-04-14 21:00:14', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(136, 11, '', 2, 5, 0, 240, '2022-04-14 21:02:36', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(137, 12, '', 2, 5, 0, 240, '2022-04-14 21:02:36', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(138, 12, '', 2, 5, 0, 240, '2022-04-15 00:02:30', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(139, 11, '', 2, 5, 0, 240, '2022-04-15 00:14:15', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(140, 12, '', 2, 5, 0, 240, '2022-04-15 00:14:15', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(141, 11, '', 2, 5, 0, 240, '2022-04-15 01:19:46', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(142, 12, '', 2, 5, 0, 240, '2022-04-15 01:19:46', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(143, 12, '', 2, 5, 0, 240, '2022-04-15 01:20:18', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(144, 11, '', 2, 5, 0, 240, '2022-04-15 01:24:47', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(145, 11, '', 2, 5, 0, 240, '2022-04-15 01:26:10', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(146, 12, '', 2, 5, 0, 240, '2022-04-15 01:29:21', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(147, 12, '', 2, 5, 0, 240, '2022-04-15 01:57:43', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(148, 12, '', 2, 5, 0, 240, '2022-04-15 01:59:48', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(149, 11, '', 2, 5, 0, 240, '2022-04-15 02:00:18', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(150, 12, '', 2, 5, 0, 240, '2022-04-15 02:00:18', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(151, 12, '', 2, 5, 0, 240, '2022-04-15 02:01:23', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(152, 11, '', 2, 5, 0, 240, '2022-04-15 02:01:23', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(153, 11, '', 2, 5, 0, 240, '2022-04-15 02:01:26', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(154, 12, '', 2, 5, 0, 240, '2022-04-15 02:01:26', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(155, 12, '', 2, 5, 0, 240, '2022-04-15 02:01:46', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(156, 12, '', 2, 5, 0, 240, '2022-04-15 02:01:53', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(157, 11, '', 2, 5, 0, 240, '2022-04-16 19:50:15', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(158, 12, '', 2, 5, 0, 240, '2022-04-16 19:50:15', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(159, 11, '', 2, 5, 0, 240, '2022-04-16 19:57:55', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(160, 12, '', 2, 5, 0, 240, '2022-04-16 19:57:56', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(161, 12, '', 2, 5, 0, 240, '2022-04-16 20:51:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(162, 11, '', 2, 5, 0, 240, '2022-04-16 20:51:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(163, 12, '', 2, 5, 0, 240, '2022-04-16 21:41:01', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(164, 11, '', 2, 5, 0, 240, '2022-04-16 21:41:01', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(165, 12, '', 2, 5, 0, 240, '2022-04-16 21:54:01', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(166, 11, '', 2, 5, 0, 240, '2022-04-16 21:54:01', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(167, 11, '', 2, 5, 0, 240, '2022-04-16 22:22:50', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(168, 12, '', 2, 5, 0, 240, '2022-04-16 22:22:50', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(169, 12, '', 2, 5, 0, 240, '2022-04-16 22:35:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(170, 11, '', 2, 5, 0, 240, '2022-04-16 22:35:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(171, 12, '', 2, 5, 0, 240, '2022-04-16 22:35:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(172, 11, '', 2, 5, 0, 240, '2022-04-16 22:35:40', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(173, 11, '', 2, 5, 0, 240, '2022-04-16 22:36:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(174, 12, '', 2, 5, 0, 240, '2022-04-16 22:36:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(175, 12, '', 2, 5, 0, 240, '2022-04-16 22:37:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(176, 11, '', 2, 5, 0, 240, '2022-04-16 22:37:11', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(177, 12, '', 2, 5, 0, 240, '2022-04-16 22:38:16', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(178, 11, '', 2, 5, 0, 240, '2022-04-16 22:38:16', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(179, 12, '', 2, 5, 0, 240, '2022-04-17 02:07:44', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(180, 12, '', 2, 5, 0, 240, '2022-04-17 02:41:40', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(181, 12, '', 2, 5, 0, 240, '2022-04-17 02:42:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(182, 12, '', 2, 5, 0, 240, '2022-04-17 02:53:58', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(183, 12, '', 2, 5, 0, 240, '2022-04-17 02:54:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(184, 12, '', 2, 5, 0, 240, '2022-04-17 17:00:00', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(185, 12, '', 2, 5, 0, 240, '2022-04-18 00:28:37', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(186, 11, '', 2, 5, 0, 240, '2022-04-18 00:28:37', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(187, 12, '', 2, 5, 0, 240, '2022-04-18 00:31:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(188, 11, '', 2, 5, 0, 240, '2022-04-18 00:31:24', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(189, 11, '', 2, 5, 0, 240, '2022-04-18 00:32:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(190, 12, '', 2, 5, 0, 240, '2022-04-18 00:32:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(191, 11, '', 2, 5, 0, 240, '2022-04-18 00:43:20', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(192, 12, '', 2, 5, 0, 240, '2022-04-18 00:43:20', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(193, 11, '', 2, 5, 0, 240, '2022-04-18 00:50:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(194, 12, '', 2, 5, 0, 240, '2022-04-18 00:50:43', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(195, 12, '', 2, 5, 0, 240, '2022-04-18 15:35:54', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(196, 12, '', 2, 5, 0, 240, '2022-04-18 15:50:51', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(197, 12, '', 2, 5, 0, 240, '2022-04-20 18:32:28', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(198, 12, '', 2, 5, 0, 240, '2022-04-20 18:35:08', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(199, 9, '', 2, 5, 0, 240, '2022-04-20 18:41:02', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(200, 12, '', 2, 5, 0, 240, '2022-04-20 18:41:02', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(201, 12, '', 2, 5, 0, 240, '2022-04-20 22:11:02', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(202, 12, '', 2, 5, 0, 240, '2022-04-20 22:12:18', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(203, 12, '', 2, 5, 0, 240, '2022-04-20 22:16:42', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(204, 12, '', 2, 5, 0, 240, '2022-04-20 22:18:29', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(205, 12, '', 2, 5, 0, 240, '2022-04-20 22:20:48', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(206, 12, '', 4, 5, 0, 4, '2022-04-20 22:36:39', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(207, 12, '', 5, 5, 0, 35, '2022-04-20 22:37:08', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(208, 12, '', 5, 5, 0, 35, '2022-04-20 22:38:30', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(209, 12, '', 4, 5, 0, 4, '2022-04-20 22:39:44', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(210, 12, '', 6, 5, 0, 10, '2022-04-21 00:18:12', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(211, 12, '', 4, 5, 0, 4, '2022-04-21 17:24:46', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(212, 12, '', 6, 5, 0, 10, '2022-04-21 17:25:10', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(213, 12, '', 15694, 5, 0, 100, '2022-04-21 23:44:56', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(214, 12, '', 15694, 5, 0, 100, '2022-04-22 00:05:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(215, 12, '', 2, 5, 0, 240, '2022-04-22 00:07:24', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(216, 12, '', 15694, 5, 0, 100, '2022-04-22 00:17:46', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(217, 12, '', 2, 5, 0, 240, '2022-04-22 00:18:30', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(218, 12, '', 15694, 5, 0, 100, '2022-04-22 22:29:06', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(219, 12, '', 15694, 5, 0, 100, '2022-04-23 02:02:22', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(220, 9, '', 15694, 5, 0, 100, '2022-04-23 02:02:22', 3, -2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(221, 12, '', 2, 5, 0, 240, '2022-04-23 02:04:54', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(222, 12, '', 15694, 5, 0, 100, '2022-04-23 21:35:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(223, 12, '', 15694, 5, 0, 100, '2022-04-25 17:20:59', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(224, 12, '', 2, 5, 0, 240, '2022-05-06 18:21:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(225, 12, '', 2, 5, 0, 240, '2022-05-06 20:39:37', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(226, 12, '', 2, 5, 0, 240, '2022-05-07 19:07:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(227, 12, '', 2, 5, 0, 240, '2022-05-07 19:12:08', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(228, 12, '', 15694, 5, 0, 100, '2022-05-07 21:37:23', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(229, 12, '', 15694, 5, 0, 100, '2022-05-07 21:37:57', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(230, 12, '', 15694, 5, 0, 100, '2022-05-08 20:57:05', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(231, 12, '', 15694, 5, 0, 100, '2022-05-08 20:57:53', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(232, 12, '', 15694, 5, 0, 100, '2022-05-08 21:01:17', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(233, 12, '', 15694, 5, 0, 100, '2022-05-11 15:34:32', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(234, 12, '', 15694, 5, 0, 100, '2022-05-11 15:35:09', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(235, 12, '', 15694, 5, 0, 100, '2022-05-19 01:38:26', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(236, 12, '', 2, 5, 0, 240, '2022-05-22 17:15:36', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(237, 12, '', 2, 5, 0, 240, '2022-05-22 17:18:07', 3, 1, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(238, 12, '', 15694, 5, 0, 100, '2022-05-22 22:25:33', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(239, 12, '', 15694, 5, 0, 100, '2022-05-22 22:26:56', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(240, 12, '', 15694, 5, 0, 100, '2022-05-23 22:31:23', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(241, 12, '', 15694, 5, 0, 100, '2022-05-23 22:31:25', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(242, 12, '', 15694, 5, 0, 100, '2022-05-23 22:31:26', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(243, 12, '', 15694, 5, 0, 100, '2022-05-23 22:31:36', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(244, 12, '', 15694, 5, 0, 100, '2022-05-23 22:32:11', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(245, 12, '', 15694, 5, 0, 100, '2022-05-23 22:38:43', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(246, 12, '', 15694, 5, 0, 100, '2022-05-23 22:38:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(247, 12, '', 15694, 5, 0, 100, '2022-05-23 22:39:09', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(248, 12, '', 15694, 5, 0, 100, '2022-05-23 22:40:35', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(249, 12, '', 15694, 5, 0, 100, '2022-05-23 23:29:48', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(250, 12, '', 15694, 5, 0, 100, '2022-05-24 00:21:40', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(251, 12, '', 15694, 5, 0, 100, '2022-05-24 00:23:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(252, 12, '', 15694, 5, 0, 100, '2022-05-24 00:28:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(253, 12, '', 15694, 5, 0, 100, '2022-05-24 23:57:40', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(254, 12, '', 15694, 5, 0, 100, '2022-05-24 23:58:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(255, 12, '', 15694, 5, 0, 100, '2022-05-25 00:00:39', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(256, 12, '', 15694, 5, 0, 100, '2022-05-25 00:27:59', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(257, 12, '', 15694, 5, 0, 100, '2022-05-25 00:39:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(258, 12, '', 15694, 5, 0, 100, '2022-05-25 00:41:53', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(259, 12, '', 15694, 5, 0, 100, '2022-05-25 00:42:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(260, 12, '', 15694, 5, 0, 100, '2022-05-25 00:45:15', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(261, 12, '', 15694, 5, 0, 100, '2022-05-25 00:51:05', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(262, 12, '', 15694, 5, 0, 100, '2022-05-25 00:52:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(263, 12, '', 15694, 5, 0, 100, '2022-05-25 00:53:04', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(264, 12, '', 15694, 5, 0, 100, '2022-05-25 00:54:31', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(265, 12, '', 15694, 5, 0, 100, '2022-05-25 00:55:33', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(266, 12, '', 15694, 5, 0, 100, '2022-05-25 01:46:53', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(267, 12, '', 15694, 5, 0, 100, '2022-05-25 01:56:20', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(268, 12, '', 15694, 5, 0, 100, '2022-05-25 02:30:16', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(269, 12, '', 15694, 5, 0, 100, '2022-05-25 02:51:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(270, 12, '', 15694, 5, 0, 100, '2022-05-25 02:54:30', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(271, 12, '', 15694, 5, 0, 100, '2022-05-27 21:51:18', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(272, 12, '', 15694, 5, 0, 100, '2022-05-27 21:52:45', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(273, 12, '', 15694, 5, 0, 100, '2022-06-01 22:12:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(274, 12, '', 15694, 5, 0, 100, '2022-06-06 01:03:59', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(275, 12, '', 15694, 5, 0, 100, '2022-06-06 01:05:08', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(276, 12, '', 15694, 5, 0, 100, '2022-06-06 01:08:28', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(277, 12, '', 15694, 5, 0, 100, '2022-06-06 01:11:33', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(278, 12, '', 15694, 5, 0, 100, '2022-06-07 15:35:35', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(279, 12, '', 15694, 5, 0, 100, '2022-06-08 02:21:47', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(280, 12, '', 15694, 5, 0, 100, '2022-06-10 22:20:28', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(281, 12, '', 15694, 5, 0, 100, '2022-06-12 18:21:36', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(282, 12, '', 15694, 5, 0, 100, '2022-06-12 21:14:33', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(283, 12, '', 15694, 5, 0, 100, '2022-06-13 15:59:08', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(284, 12, '', 15694, 5, 0, 100, '2022-06-14 23:27:42', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(285, 12, '', 15694, 5, 0, 100, '2022-06-15 00:39:26', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(286, 12, '', 15694, 5, 0, 100, '2022-06-15 00:41:26', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(287, 12, '', 15694, 5, 0, 100, '2022-06-15 14:40:55', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(288, 12, '', 15694, 5, 0, 100, '2022-06-15 14:48:01', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(289, 12, '', 6, 5, 0, 1000, '2022-06-15 22:36:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, NULL, NULL, 0),
(290, 12, '', 4, 5, 0, 69.83, '2022-06-15 22:40:17', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Dark Warlocks #1749', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qmbe8WjDUAcyS76mUw1KixoPKMX4qT9Qr58CAjqUfvdBfW/834.png', 'sol', 'DXKg133hUvqaFQoURcJauZSE3HqX1KNtkhyCcFKmYGZC', 0),
(291, 12, '', 4, 5, 0, 69.91, '2022-06-15 22:43:06', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Dark Warlocks #1749', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qmbe8WjDUAcyS76mUw1KixoPKMX4qT9Qr58CAjqUfvdBfW/834.png', 'sol', 'DXKg133hUvqaFQoURcJauZSE3HqX1KNtkhyCcFKmYGZC', 0),
(292, 12, '', 15694, 5, 0, 100, '2022-06-15 22:43:56', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(293, 12, '', 6, 5, 0, 3.5, '2022-06-15 22:44:15', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'SolTeeth #3519', 'https://www.arweave.net/s5xRBr61sLVEQrWlpXIM4C6NbwhR2gvGlVejPK3GerQ?ext=png', 'sol', 'AtpPSKgoBWgrSToYBhhrgNnFPk2Fnz11GuBh5Yfuc5Sk', 0),
(294, 12, '', 15694, 5, 0, 100, '2022-06-15 23:30:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(295, 12, '', 6, 5, 0, 3.52, '2022-06-15 23:31:11', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'SolTeeth #3519', 'https://www.arweave.net/s5xRBr61sLVEQrWlpXIM4C6NbwhR2gvGlVejPK3GerQ?ext=png', 'sol', 'AtpPSKgoBWgrSToYBhhrgNnFPk2Fnz11GuBh5Yfuc5Sk', 0),
(296, 12, '', 5, 5, 0, 969.08, '2022-06-17 17:33:52', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Bubblegoose Baller #7085', 'https://bafybeidm5g3wbj6owz32kxl4ffze3xdcumwmrwfe22bjy7qzparqobrzmm.ipfs.nftstorage.link/7084.png?ext=png', 'sol', '4AmPc7qt64ihk7k7fxeMzuVYM38tFULrKvUmhDpAHC1s', 0),
(297, 12, '', 6, 5, 0, 0.61, '2022-06-17 17:38:43', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'SolTeeth #3519', 'https://www.arweave.net/s5xRBr61sLVEQrWlpXIM4C6NbwhR2gvGlVejPK3GerQ?ext=png', 'sol', 'AtpPSKgoBWgrSToYBhhrgNnFPk2Fnz11GuBh5Yfuc5Sk', 0),
(298, 12, '', 15694, 5, 0, 100, '2022-06-17 17:39:05', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(299, 12, '', 4, 5, 0, 28.83, '2022-06-17 22:16:23', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Dark Warlocks #1749', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qmbe8WjDUAcyS76mUw1KixoPKMX4qT9Qr58CAjqUfvdBfW/834.png', 'sol', 'DXKg133hUvqaFQoURcJauZSE3HqX1KNtkhyCcFKmYGZC', 0),
(300, 12, '', 4, 5, 0, 28.83, '2022-06-17 22:17:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Dark Warlocks #1749', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qmbe8WjDUAcyS76mUw1KixoPKMX4qT9Qr58CAjqUfvdBfW/834.png', 'sol', 'DXKg133hUvqaFQoURcJauZSE3HqX1KNtkhyCcFKmYGZC', 0),
(301, 12, '', 5, 5, 0, 951.04, '2022-06-17 22:46:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Bubblegoose Baller #7085', 'https://bafybeidm5g3wbj6owz32kxl4ffze3xdcumwmrwfe22bjy7qzparqobrzmm.ipfs.nftstorage.link/7084.png?ext=png', 'sol', '4AmPc7qt64ihk7k7fxeMzuVYM38tFULrKvUmhDpAHC1s', 0),
(302, 12, '', 4, 5, 0, 28.54, '2022-06-17 22:46:48', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Dark Warlocks #1749', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qmbe8WjDUAcyS76mUw1KixoPKMX4qT9Qr58CAjqUfvdBfW/834.png', 'sol', 'DXKg133hUvqaFQoURcJauZSE3HqX1KNtkhyCcFKmYGZC', 0),
(303, 12, '', 6, 5, 0, 2947.38, '2022-06-23 17:22:21', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Genesis Habitat #5192', 'https://arweave.net/RrYsEFRa-b5y4QsAuZTSgNUBofAIoKzlHKmxaEGE?ext=gif', 'sol', '6Dd7KTppiZQ5ebUkuMBZj3QhBSZBPTZhnMa8A6aByBAS', 0),
(304, 12, '', 5, 5, 0, 834.96, '2022-06-23 17:26:56', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Bubblegoose Baller #7085', 'https://bafybeidm5g3wbj6owz32kxl4ffze3xdcumwmrwfe22bjy7qzparqobrzmm.ipfs.nftstorage.link/7084.png?ext=png', 'sol', '4AmPc7qt64ihk7k7fxeMzuVYM38tFULrKvUmhDpAHC1s', 0),
(305, 12, '', 12, 5, 0, 379.03, '2022-06-23 17:54:01', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Reckless Racoon Club #815', 'https://bafybeiabkjr22wdouch3z7yjefsbzb54r7ogin7dmevgw3ocso5h3enbty.ipfs.nftstorage.link/815.png?ext=png', 'sol', 'ASV6tdCsnhHTTtdmYRjFpvdYvVemYT2TK62MyUvu5koX', 0),
(306, 12, '', 10, 5, 0, 178.15, '2022-06-23 17:54:27', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Sad Kittens #699', 'https://raw.githubusercontent.com/TrewisDK/SDK-assets/master/698.png', 'sol', '57tLwMsmsZ8qSMoP8CYnbjVg7P6hqCidcNNkKSxJEhC5', 0),
(307, 12, '', 20, 5, 0, 382.4, '2022-06-23 18:12:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #5166', 'https://arweave.net/BgdL22wo3m79zH3JJZ1RwLUn4RyKLBpRLtH-zRsNFk', 'sol', 'GaFVVZXaAeBdfdro8ZyPsohoJFVTBrzbiW1LVMyEKgS2', 0),
(308, 12, '', 20, 5, 0, 236.6, '2022-06-27 22:13:01', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Alpha #1572', 'https://bafybeiffle2mwugxtfxi2zob5yxkty3qxxbkjzbi23avtqwkgzewmikpq4.ipfs.nftstorage.link/1572.png?ext=png', 'sol', 'AC8C8dbgcmyuu866E3Pb4iMRD153v5Aei3sy27okt338', 0),
(309, 12, '', 16, 5, 0, 1013.83, '2022-06-27 22:13:30', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Galactic Gecko #6338', 'https://www.arweave.net/XC2ugAzZpMDlMywGBJrdl6L8NeZcyTrZX6GAlMcDI?ext=jpeg', 'sol', '6Hq491A1Zue9TrUDM625oxeHTxYsxKLHxWRMsFEcE4do', 0),
(310, 12, '', 6, 5, 0, 99.5, '2022-06-27 22:21:12', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Doggo #0', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/W09cNPDYWd3APay2jjgDVtsTZw1LW12yy-qtVhI6qfM?ext=png', 'sol', 'G5vi4Ynvxhe5gxYHakcA4eh7NMFBAGFpt7GZybbbTnve', 0),
(311, 12, '', 14, 5, 0, 2388.02, '2022-06-27 22:21:39', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Fox #3122', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/ipfs/QmPGMaoEUMA24dyDjKfmqwGpbVtrisQf9gLT3PUmNAgUAR', 'sol', 'GVEorw6G2ukrn8f7WQKMZzqWVB86cKAAcvz96cv567QC', 0),
(312, 12, '', 19, 5, 0, 9950.1, '2022-06-27 22:22:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Genesis Habitat #2848', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/RMQU5rPDuTPGvmrL36UTVljbSoRSnTs5zKMqoq1RUo?ext=gif', 'sol', 'EftqsFCS6J5u5CvGkqaiTKHxrEPV1SAJByjnSdxXNAoN', 0),
(313, 12, '', 8, 5, 0, 1.03, '2022-06-27 22:27:00', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Pig #135', 'https://nftstorage.link/ipfs/QmPhMrm5N7gV6YariixNJpVehTM69TKPcsxCXQwKJyUWtx/152.png', 'sol', '957wbtnWiUqZNcWuhK1xcdGuSENcyySVM54PpWpPBQ7E', 0),
(314, 12, '', 13, 5, 0, 39.74, '2022-06-27 22:27:22', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Minute Men1946', 'https://testlaunchmynft.mypinata.cloud/ipfs/QmbSuyJTSxrmzEyVVC597f1GS811Hu1Tn2zWYqSqsua8sS/5811.png', 'sol', '3WaPL7tXsVS5eoFeLYtbL91gVamsn4hJQyVLjNoaWit1', 0),
(315, 12, '', 17, 5, 0, 476.87, '2022-06-27 22:27:44', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Fox #4624', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/ipfs/QmQXFVk48rYe69G2CgXDvdPdbyuqarKvK5KPSr3XJemrtP', 'sol', '9VSSQLnnZNzim1np1NQ2kaDr6XcYnWRvK6AzYkmCbNFV', 0),
(316, 12, '', 11, 5, 0, 4557.11, '2022-06-27 22:30:53', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Okay Bear #5977', 'https://bafybeiattngzarm3ukxxbxfv26a7rd5kfsy5rewbpl4ctdvyk6fwh2axaq.ipfs.nftstorage.link/5976.png?ext=png', 'sol', '9tuMF5NDdYsUuVRddS6fMy5mNCDZmEFMi6NGtyQM2AUL', 0),
(317, 12, '', 12, 5, 0, 309.09, '2022-06-27 22:31:16', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'CT #1573', 'https://bafybeifm6za5aeilfkpb33otqgkorxrprcznjb2cll4t2svrztv4gtb4sm.ipfs.nftstorage.link/1573.png?ext=png', 'sol', 'DycQ8nixkAiWNT1fKC5o8scmkpvjp6m4WmP4GfF19Yam', 0),
(318, 12, '', 15694, 5, 0, 100, '2022-06-27 22:31:37', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(319, 12, '', 15, 5, 0, 63.4, '2022-06-27 22:32:10', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Midnight Panthers #1036', 'https://bafybeibvqjwqqinbwjwiscmvzysixgkqjw5423agjgbc4oeydrhuktuhpq.ipfs.nftstorage.link/1036.png?ext=png', 'sol', 'AY7ec41LBGxfpJjVeVGKw2RSgBD6ihapLGRe6WrZDNWE', 0),
(320, 12, '', 5, 5, 0, 71.31, '2022-06-27 22:32:31', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5papGFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(321, 12, '', 4, 5, 0, 99.17, '2022-06-27 22:57:06', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQPGYdKus4rDpc', 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 0),
(322, 12, '', 15694, 5, 0, 100, '2022-06-27 23:16:41', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(323, 12, '', 15694, 5, 0, 100, '2022-06-27 23:17:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.ibb.co/8By4CgR/100b.png', 'eth', NULL, 0),
(324, 12, '', 4, 5, 0, 99.04, '2022-06-27 23:17:23', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQPGYdKus4rDpc', 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 0),
(325, 12, '', 7, 5, 0, 71.62, '2022-06-27 23:33:00', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Mootator #743', 'https://gateway.pinata.cloud/ipfs/Qmacurjsc1GDPCjZPBuVUhLnnVsa1od4pBvEXRHecShVcn/moo-tator.png', 'sol', 'BhfXM19NttG8FjQ7bta9AErBHCx9UPfNKn6M8qyDC9RA', 0),
(326, 12, 'zxsc2438asd9dsa12489cn', 4, 5, 0, 99.48, '2022-06-27 23:33:22', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQPGYdKus4rDpc', 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 0),
(327, 12, 'zxsc2438asd9dsa12489cn', 5, 5, 0, 70.81, '2022-06-27 23:45:10', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5papGFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(328, 12, 'zxsc2438asd9dsa12489cn', 5, 5, 0, 70.7, '2022-06-27 23:51:32', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5papGFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(329, 12, 'zxsc2438asd9dsa12489cn', 5, 5, 0, 70.74, '2022-06-27 23:52:48', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5papGFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(330, 12, 'zxsc2438asd9dsa12489cn', 18, 5, 0, 39.27, '2022-06-28 00:01:00', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Toothache #608', 'https://nftstorage.link/ipfs/QmRBk6yGYdtBYKRnp1TzH2udrbdz9h3ZqzhTX4P1JGFj1n/5645.png', 'sol', '7CSBXb6xH79q2iX9xWFxAUcw8bMmjgxvkoatYp7pjWsw', 0),
(331, 12, 'zxsc2438asd9dsa12489cn', 5, 5, 0, 71.15, '2022-06-28 00:14:52', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5pap_GFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(332, 12, 'zxsc2438asd9dsa12489cn', 4, 5, 0, 79.23, '2022-06-28 00:33:13', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQP_GYdKus4rDpc', 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 0),
(333, 12, 'zxsc2438asd9dsa12489cn', 18, 5, 0, 39.22, '2022-06-28 00:43:26', 4, 2, 0, 0, 0, 1, 1, '', NULL, 'Toothache #608', 'https://nftstorage.link/ipfs/QmRBk6yGYdtBYKRnp1TzH2udrbdz9h3ZqzhTX4P1JGFj1n/5645.png', 'sol', '7CSBXb6xH79q2iX9xWFxAUcw8bMmjgxvkoatYp7pjWsw', 0),
(334, 12, 'zxsc2438asd9dsa12489cn', 6, 5, 0, 98.05, '2022-06-28 00:43:50', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Doggo #0', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/W09cNPDYWd3APay2jjgDVtsTZw1LW12yy-qtVhI6qfM?ext=png', 'sol', 'G5vi4Ynvxhe5gxYHakcA4eh7NMFBAGFpt7GZybbbTnve', 0),
(335, 12, 'zxsc2438asd9dsa12489cn', 7, 1, 0, 66.59, '2022-06-28 00:44:20', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Mootator #743', 'https://gateway.pinata.cloud/ipfs/Qmacurjsc1GDPCjZPBuVUhLnnVsa1od4pBvEXRHecShVcn/moo-tator.png', 'sol', 'BhfXM19NttG8FjQ7bta9AErBHCx9UPfNKn6M8qyDC9RA', 0),
(336, 12, 'zxsc2438asd9dsa12489cn', 19, 5, 0, 9786.9, '2022-06-28 00:45:32', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Genesis Habitat #2848', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/RMQU5rPDuT_PGvmrL36UTVljbSoRSnTs5zKMqoq1RUo?ext=gif', 'sol', 'EftqsFCS6J5u5CvGkqaiTKHxrEPV1SAJByjnSdxXNAoN', 0),
(337, 12, 'zxsc2438asd9dsa12489cn', 15, 5, 0, 62.64, '2022-06-28 00:46:00', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Midnight Panthers #1036', 'https://bafybeibvqjwqqinbwjwiscmvzysixgkqjw5423agjgbc4oeydrhuktuhpq.ipfs.nftstorage.link/1036.png?ext=png', 'sol', 'AY7ec41LBGxfpJjVeVGKw2RSgBD6ihapLGRe6WrZDNWE', 0),
(338, 7, 'zxsc2438asd9dsa12489cn', 16, 5, 0, 1004.65, '2022-06-28 00:46:24', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Galactic Gecko #6338', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.arweave.net/XC2ugAz_ZpMDlMywGBJ_rdl6L8NeZcyTrZX6GAlMcDI?ext=jpeg', 'sol', '6Hq491A1Zue9TrUDM625oxeHTxYsxKLHxWRMsFEcE4do', 0),
(339, 12, 'zxsc2438asd9dsa12489cn', 4, 5, 0, 78.21, '2022-06-28 00:49:54', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQP_GYdKus4rDpc', 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 0),
(340, 12, 'zxsc2438asd9dsa12489cn', 5, 5, 0, 70.39, '2022-06-28 00:50:19', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5pap_GFbtsQUyA', 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 0),
(341, 14, 'zxsc2438asd9dsa12489cn', 11, 5, 0, 710.46, '2022-07-15 19:17:18', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Primate #7763', 'https://bafybeiao6yb3qkznplmrzkofqsc6khmwni222doh374icoattin2hifw4q.ipfs.nftstorage.link/7762.png?ext=png', 'sol', '7L5uBF6HbUpMYTYvteBcpGoZyXkybUJWAzxam1K73Szv', 0),
(342, 37, 'zxsc2438asd9dsa12489cn', 15, 5, 1, 153.76, '2022-07-20 17:11:58', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Netrunner #1681', 'https://bafybeicgic77nidsbqrnfbmfif6zee6a7fal6n4m5wbrvfu4347az2i6d4.ipfs.nftstorage.link/1681.png?ext=png', 'sol', 'EaMLVkDg3CgVt1Ca437wiPuhHLjey49TUphFcMtdJ2K5', 0),
(343, 35, 'zxsc2438asd9dsa12489cn', 8, 5, 2, 9183.44, '2022-07-20 18:04:29', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Okay Bear #2112', 'https://bafybeid5o5x7pe2exojhegqlb4mcdbkwtlh2vknpsnr2gxshy2gy3wm3m4.ipfs.nftstorage.link/2111.png?ext=png', 'sol', '8BYsGL7xYEs4cFsUza3EhgpE24pVBYqHhfQzTWBaANvk', 0),
(344, 35, 'zxsc2438asd9dsa12489cn', 15694, 5, 3, 100, '2022-11-26 23:22:03', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.seadn.io/gcs/static/promocards/ArtWork%20by%20OllOOl.png?auto=format&w=1920', 'site', NULL, 8),
(345, 12, 'zxsc2438asd9dsa12489cn', 15694, 5, 4, 100, '2022-11-26 23:49:20', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.seadn.io/gcs/static/promocards/ArtWork%20by%20OllOOl.png?auto=format&w=1920', 'site', NULL, 15.6),
(346, 37, 'zxsc2438asd9dsa12489cn', 15694, 5, 5, 100, '2022-11-26 23:51:08', 3, 2, 0, 0, 0, 1, 1, '', NULL, 'Credits $100 onsite', 'https://i.seadn.io/gcs/static/promocards/ArtWork%20by%20OllOOl.png?auto=format&w=1920', 'site', NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_itemincase`
--

CREATE TABLE `opencase_itemincase` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `item_id` int NOT NULL,
  `chance` float NOT NULL,
  `count_items` int NOT NULL,
  `position` int NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `withdrawable` tinyint(1) NOT NULL DEFAULT '1',
  `usable` tinyint(1) NOT NULL DEFAULT '1',
  `pricerangelow` float NOT NULL,
  `pricerangehigh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_itemincase`
--

INSERT INTO `opencase_itemincase` (`id`, `case_id`, `item_id`, `chance`, `count_items`, `position`, `enabled`, `withdrawable`, `usable`, `pricerangelow`, `pricerangehigh`) VALUES
(13, 1, 2, 31, -1, 0, 1, 1, 1, 0, 0),
(14, 1, 1, 1, -1, 1, 1, 1, 1, 0, 0),
(15, 1, 3, 5, -1, 2, 1, 1, 1, 0, 0),
(16, 2, 6, 5, -1, 1, 1, 1, 1, 0, 0),
(17, 2, 5, 5, -1, 2, 1, 1, 1, 0, 0),
(18, 2, 4, 5, -1, 3, 1, 1, 1, 0, 0),
(19, 2, 15694, 5, -1, 4, 1, 1, 1, 0, 0),
(20, 2, 7, 5, -1, 5, 1, 1, 1, 0, 0),
(21, 2, 8, 5, -1, 6, 1, 1, 1, 0, 0),
(22, 2, 9, 5, -1, 7, 1, 1, 1, 0, 0),
(23, 2, 10, 5, -1, 8, 1, 1, 1, 0, 0),
(24, 2, 11, 5, -1, 9, 1, 1, 1, 0, 0),
(25, 2, 12, 5, -1, 9, 1, 1, 1, 0, 0),
(26, 2, 13, 5, -1, 10, 1, 1, 1, 0, 0),
(27, 2, 14, 5, -1, 11, 1, 1, 1, 0, 0),
(28, 2, 15, 5, -1, 12, 1, 1, 1, 0, 0),
(29, 2, 16, 15, -1, 13, 1, 1, 1, 0, 0),
(30, 2, 17, 5, -1, 14, 1, 1, 1, 0, 0),
(31, 2, 18, 5, -1, 15, 1, 1, 1, 0, 0),
(32, 2, 19, 5, -1, 16, 1, 1, 1, 0, 0),
(33, 2, 20, 5, -1, 17, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_items`
--

CREATE TABLE `opencase_items` (
  `id` int NOT NULL,
  `appid` int NOT NULL DEFAULT '730',
  `name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quality` int NOT NULL,
  `price` float NOT NULL,
  `network` varchar(50) DEFAULT NULL,
  `mintaddress` varchar(150) DEFAULT NULL,
  `status` int DEFAULT '1',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tranche` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_items`
--

INSERT INTO `opencase_items` (`id`, `appid`, `name`, `image`, `quality`, `price`, `network`, `mintaddress`, `status`, `date`, `tranche`) VALUES
(1, 730, 'Bored Ape Yacht Club #5160', 'https://i.imgur.com/GqVhAnE.png', 3, 2500, 'eth', NULL, 1, '2022-06-16 17:59:56', 0),
(2, 730, 'Crypto Punks #3100', 'https://i.imgur.com/EAWxiUd.png', 0, 240, 'eth', NULL, 1, '2022-06-16 17:59:56', 0),
(3, 730, 'Azuki #6969', 'https://i.imgur.com/ovQJ2dk.png', 2, 240, 'eth', NULL, 1, '2022-06-16 17:59:56', 0),
(4, 730, 'Neo Hunter #3643', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/PECHUFzFAXae8kiR6mB0-sDInvTdtQPGYdKus4rDpc', 5, 78.21, 'sol', '52YbDoSoGbXoKEgpTyXXxKccZWztV3vxRayk9zPA8TKr', 2, '2022-06-16 17:59:56', 0),
(5, 730, 'Neo Hunter #4400', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/XVoHFlQc88TVMUANLhp9d1yZMDXIS5papGFbtsQUyA', 3, 70.39, 'sol', 'GegdteKHWo1bSYdzeoCCjkaahoxF93asj2BZDy8oZL7G', 2, '2022-06-16 17:59:56', 0),
(6, 730, 'Doggo #0', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/W09cNPDYWd3APay2jjgDVtsTZw1LW12yy-qtVhI6qfM?ext=png', 4, 98.05, 'sol', 'G5vi4Ynvxhe5gxYHakcA4eh7NMFBAGFpt7GZybbbTnve', 2, '2022-06-16 17:59:56', 0),
(7, 730, 'Okay Bear #2115', 'https://bafybeid5o5x7pe2exojhegqlb4mcdbkwtlh2vknpsnr2gxshy2gy3wm3m4.ipfs.nftstorage.link/2114.png?ext=png', 0, 4685.17, 'sol', 'ZfKptYiZswfMR8rhjVr7EoxErzNMqdKsKvgJnTXjk1D', 0, '2022-06-21 18:31:12', 0),
(8, 730, 'Okay Bear #2112', 'https://bafybeid5o5x7pe2exojhegqlb4mcdbkwtlh2vknpsnr2gxshy2gy3wm3m4.ipfs.nftstorage.link/2111.png?ext=png', 2, 9211.42, 'sol', '8BYsGL7xYEs4cFsUza3EhgpE24pVBYqHhfQzTWBaANvk', 2, '2022-06-21 18:33:07', 0),
(9, 730, 'Okay Bear #2757', 'https://bafybeicifnldmpywwt43opvbwuanglybhnmalu3pi6pvajq2rj2ezqccym.ipfs.nftstorage.link/2756.png?ext=png', 3, 6912.54, 'sol', '3S9UiFeUpQLs6VdWNd5YvgYmcn756n6AhNAUCbidCedS', 0, '2022-06-21 18:33:34', 0),
(10, 730, 'Okay Bear #9385', 'https://bafybeiap346kl5hqlulkcnqrububpma5ti42tirxa56nateybmjsvl6rga.ipfs.nftstorage.link/9384.png?ext=png', 1, 4800.38, 'sol', 'J5VtHjTauVbRAEkgYh8g7XYMnyL9BGWctqB3SMRyb9U5', 0, '2022-06-21 18:34:13', 0),
(11, 730, 'Primate #7763', 'https://bafybeiao6yb3qkznplmrzkofqsc6khmwni222doh374icoattin2hifw4q.ipfs.nftstorage.link/7762.png?ext=png', 4, 710.46, 'sol', '7L5uBF6HbUpMYTYvteBcpGoZyXkybUJWAzxam1K73Szv', 2, '2022-06-21 18:34:53', 0),
(12, 730, 'Gothic Degen #3367', 'https://testlaunchmynft.mypinata.cloud/ipfs/Qme5Y77N9XdmTy6kY5YQAQ4vz29bVA2WdcoR26bkpGk9kJ/4356.png', 2, 483.88, 'sol', 'Dy5ScUTxSDS7RPdQgppdFSx83Dx7VSn3JCj26mpkAzhN', 0, '2022-06-21 18:36:02', 0),
(13, 730, 'LS: Sinister Squirrel Syn #754', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/jMFIFAq6kXE2U8fbYRYbIftHg1w3andROJwuNm37AsA?ext=png', 3, 326.3, 'sol', '7dvZpwAH5FtW6e9BxyXJwt6uYu3bdAKgJ8osBh8drtVZ', 0, '2022-06-21 18:36:02', 0),
(14, 730, 'Fox #3122', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/ipfs/QmPGMaoEUMA24dyDjKfmqwGpbVtrisQf9gLT3PUmNAgUAR', 3, 2037.35, 'sol', '7NfhPWYt84P6hDdxS4m5GUZbq5qBz1mgchfWS5nzooWK', 0, '2022-06-21 18:37:30', 0),
(15, 730, 'Netrunner #1681', 'https://bafybeicgic77nidsbqrnfbmfif6zee6a7fal6n4m5wbrvfu4347az2i6d4.ipfs.nftstorage.link/1681.png?ext=png', 1, 153.76, 'sol', 'EaMLVkDg3CgVt1Ca437wiPuhHLjey49TUphFcMtdJ2K5', 2, '2022-06-21 18:37:30', 0),
(16, 730, 'Galactic Gecko #6338', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.arweave.net/XC2ugAzZpMDlMywGBJrdl6L8NeZcyTrZX6GAlMcDI?ext=jpeg', 4, 1005.7, 'sol', '6Hq491A1Zue9TrUDM625oxeHTxYsxKLHxWRMsFEcE4do', 2, '2022-06-21 18:37:56', 0),
(17, 730, 'Fox #4624', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/ipfs/QmQXFVk48rYe69G2CgXDvdPdbyuqarKvK5KPSr3XJemrtP', 1, 407.47, 'sol', '9VSSQLnnZNzim1np1NQ2kaDr6XcYnWRvK6AzYkmCbNFV', 0, '2022-06-21 19:24:27', 0),
(18, 730, 'Smyth #4045', 'https://metadata.smyths.io/4045.png', 2, 1270.71, 'sol', 'BcnmtGvWT4KET3y54AcpqZSh1P3DQUWnHrVhF3nPr5VX', 0, '2022-06-21 19:24:27', 0),
(19, 730, 'SMB #4321', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/QvuWnaNfySdSOk6f7lTSwvoTKDx1m3TM3cTX5l2voEc', 3, 3509.82, 'sol', 'gHF4ZBdD9jtpiqgeCsM7w3xWDhLCz6GhnvDsLscBcqY', 0, '2022-06-21 19:24:27', 0),
(20, 730, 'POPHEADZ #1680', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/CYbF2Uyk9NbnW4DAGR6plj1HyPvVj3l9Tl1NGvcyQ?ext=png', 2, 47.46, 'sol', 'EVKoaDTpMtys6gRAnCSGpZvfz5hwFH8k9S3RvhkcxHPz', 0, '2022-06-21 19:24:27', 0),
(15694, 730, 'Voucher 100', 'https://i.ibb.co/8By4CgR/100b.png', 4, 100, 'site', NULL, 1, '2022-06-16 17:59:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `opencase_opencases`
--

CREATE TABLE `opencase_opencases` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `case_id` int NOT NULL,
  `item_id` int NOT NULL,
  `case_price` int NOT NULL,
  `time_open` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `opencase_opencases`
--

INSERT INTO `opencase_opencases` (`id`, `user_id`, `case_id`, `item_id`, `case_price`, `time_open`) VALUES
(1, 1, 1, 1, 19, '2022-02-28 00:50:42'),
(2, 1, 1, 2, 19, '2022-02-28 00:52:15'),
(3, 1, 1, 3, 19, '2022-02-28 01:20:38'),
(4, 1, 1, 4, 19, '2022-02-28 01:20:59'),
(5, 1, 1, 5, 19, '2022-02-28 01:21:51'),
(6, 1, 1, 6, 19, '2022-02-28 01:21:51'),
(7, 1, 1, 8, 19, '2022-03-08 17:12:10'),
(8, 1, 1, 9, 19, '2022-03-08 17:17:52'),
(9, 1, 1, 10, 19, '2022-03-08 17:18:21'),
(10, 1, 1, 11, 19, '2022-03-08 17:27:30'),
(11, 1, 1, 12, 19, '2022-03-08 17:27:54'),
(12, 1, 1, 13, 19, '2022-03-08 18:00:36'),
(13, 1, 1, 14, 19, '2022-03-08 18:20:44'),
(14, 1, 1, 15, 19, '2022-03-09 00:18:08'),
(15, 1, 1, 16, 19, '2022-03-09 00:18:29'),
(16, 1, 1, 17, 19, '2022-03-09 00:18:29'),
(17, 1, 1, 18, 19, '2022-03-09 00:41:24'),
(18, 1, 1, 19, 19, '2022-03-09 14:33:38'),
(19, 1, 1, 20, 19, '2022-03-10 01:59:04'),
(20, 1, 1, 21, 19, '2022-03-10 02:23:33'),
(21, 1, 1, 22, 19, '2022-03-10 20:56:15'),
(22, 1, 1, 23, 19, '2022-03-10 20:56:42'),
(23, 1, 1, 24, 19, '2022-03-10 20:56:45'),
(24, 1, 1, 25, 19, '2022-03-10 20:57:04'),
(25, 1, 1, 26, 19, '2022-03-10 20:57:22'),
(26, 1, 1, 27, 19, '2022-03-11 01:10:23'),
(27, 1, 1, 28, 19, '2022-03-11 01:12:23'),
(28, 1, 1, 29, 19, '2022-03-11 01:28:47'),
(29, 1, 1, 30, 19, '2022-03-11 01:28:47'),
(30, 11, 1, 31, 19, '2022-04-07 21:45:07'),
(31, 12, 1, 32, 19, '2022-04-07 21:59:28'),
(32, 11, 1, 33, 19, '2022-04-07 21:59:28'),
(33, 12, 1, 34, 19, '2022-04-07 22:09:12'),
(34, 11, 1, 35, 19, '2022-04-07 22:09:12'),
(35, 11, 1, 36, 19, '2022-04-07 22:09:57'),
(36, 12, 1, 37, 19, '2022-04-07 22:09:57'),
(37, 11, 1, 38, 19, '2022-04-07 22:10:33'),
(38, 12, 1, 39, 19, '2022-04-07 22:10:33'),
(39, 11, 1, 40, 19, '2022-04-07 22:12:06'),
(40, 12, 1, 41, 19, '2022-04-07 22:12:06'),
(41, 12, 1, 42, 19, '2022-04-07 22:18:39'),
(42, 11, 1, 43, 19, '2022-04-07 22:18:39'),
(43, 11, 1, 44, 19, '2022-04-07 22:21:58'),
(44, 12, 1, 45, 19, '2022-04-07 22:21:58'),
(45, 11, 1, 46, 19, '2022-04-07 22:26:21'),
(46, 12, 1, 47, 19, '2022-04-07 22:26:21'),
(47, 11, 1, 48, 19, '2022-04-07 22:27:20'),
(48, 12, 1, 49, 19, '2022-04-07 22:27:20'),
(49, 12, 1, 50, 19, '2022-04-07 22:29:27'),
(50, 11, 1, 51, 19, '2022-04-07 22:29:27'),
(51, 11, 1, 52, 19, '2022-04-07 22:30:03'),
(52, 12, 1, 53, 19, '2022-04-07 22:30:03'),
(53, 11, 1, 54, 19, '2022-04-07 22:31:10'),
(54, 12, 1, 55, 19, '2022-04-07 22:31:10'),
(55, 12, 1, 56, 19, '2022-04-07 22:31:53'),
(56, 11, 1, 57, 19, '2022-04-07 22:31:53'),
(57, 12, 1, 58, 19, '2022-04-07 22:32:16'),
(58, 11, 1, 59, 19, '2022-04-07 22:32:16'),
(59, 12, 1, 60, 19, '2022-04-07 22:32:38'),
(60, 11, 1, 61, 19, '2022-04-07 22:32:38'),
(61, 12, 1, 62, 19, '2022-04-07 22:33:01'),
(62, 11, 1, 63, 19, '2022-04-07 22:33:01'),
(63, 11, 1, 64, 19, '2022-04-07 22:33:21'),
(64, 11, 1, 65, 19, '2022-04-07 22:33:41'),
(65, 11, 1, 66, 19, '2022-04-07 22:34:00'),
(66, 11, 1, 67, 19, '2022-04-07 22:34:18'),
(67, 11, 1, 68, 19, '2022-04-07 22:34:36'),
(68, 11, 1, 69, 19, '2022-04-07 22:34:54'),
(69, 11, 1, 70, 19, '2022-04-07 22:35:13'),
(70, 11, 1, 71, 19, '2022-04-07 22:35:13'),
(71, 11, 1, 72, 19, '2022-04-07 22:35:13'),
(72, 11, 1, 73, 19, '2022-04-07 22:35:13'),
(73, 12, 1, 74, 19, '2022-04-08 00:48:24'),
(74, 11, 1, 75, 19, '2022-04-08 00:48:24'),
(75, 11, 1, 76, 19, '2022-04-08 00:50:18'),
(76, 11, 1, 77, 19, '2022-04-08 00:50:18'),
(77, 11, 1, 78, 19, '2022-04-08 00:50:18'),
(78, 11, 1, 79, 19, '2022-04-08 00:50:18'),
(79, 11, 1, 80, 19, '2022-04-08 00:50:18'),
(80, 11, 1, 81, 19, '2022-04-08 00:51:39'),
(81, 13, 1, 82, 19, '2022-04-08 02:44:27'),
(82, 9, 1, 83, 19, '2022-04-08 16:06:54'),
(83, 9, 1, 84, 19, '2022-04-08 16:20:32'),
(84, 13, 1, 85, 19, '2022-04-08 21:39:17'),
(85, 13, 1, 86, 19, '2022-04-08 21:40:26'),
(86, 13, 1, 87, 19, '2022-04-08 21:43:30'),
(87, 13, 1, 88, 19, '2022-04-08 21:43:55'),
(88, 13, 1, 89, 19, '2022-04-08 21:48:15'),
(89, 13, 1, 90, 19, '2022-04-08 21:48:39'),
(90, 13, 1, 91, 19, '2022-04-08 21:58:11'),
(91, 13, 1, 92, 19, '2022-04-08 22:08:59'),
(92, 13, 1, 93, 19, '2022-04-08 22:09:27'),
(93, 13, 1, 94, 19, '2022-04-08 23:36:35'),
(94, 13, 1, 95, 19, '2022-04-08 23:53:45'),
(95, 12, 1, 96, 19, '2022-04-08 23:53:45'),
(96, 9, 1, 97, 19, '2022-04-09 03:06:25'),
(97, 12, 1, 98, 19, '2022-04-09 03:06:25'),
(98, 12, 1, 99, 19, '2022-04-09 03:06:56'),
(99, 9, 1, 100, 19, '2022-04-09 03:06:56'),
(100, 12, 1, 101, 19, '2022-04-09 17:13:27'),
(101, 12, 1, 102, 19, '2022-04-09 19:36:31'),
(102, 12, 1, 103, 19, '2022-04-09 19:36:58'),
(103, 12, 1, 104, 19, '2022-04-09 19:36:58'),
(104, 12, 1, 105, 19, '2022-04-09 19:38:15'),
(105, 11, 1, 106, 19, '2022-04-09 19:38:15'),
(106, 11, 1, 107, 19, '2022-04-09 19:49:06'),
(107, 12, 1, 108, 19, '2022-04-09 19:49:06'),
(108, 12, 1, 109, 19, '2022-04-09 19:51:22'),
(109, 11, 1, 110, 19, '2022-04-09 19:51:22'),
(110, 12, 1, 111, 19, '2022-04-09 19:56:54'),
(111, 11, 1, 112, 19, '2022-04-09 19:56:54'),
(112, 11, 1, 113, 19, '2022-04-09 19:59:51'),
(113, 12, 1, 114, 19, '2022-04-09 19:59:51'),
(114, 12, 1, 115, 19, '2022-04-09 20:00:51'),
(115, 12, 1, 116, 19, '2022-04-09 20:07:34'),
(116, 12, 1, 117, 19, '2022-04-12 18:27:45'),
(117, 12, 1, 118, 19, '2022-04-13 00:51:10'),
(118, 11, 1, 119, 19, '2022-04-13 01:17:36'),
(119, 12, 1, 120, 19, '2022-04-13 01:17:36'),
(120, 11, 1, 121, 19, '2022-04-13 01:18:09'),
(121, 12, 1, 122, 19, '2022-04-13 01:18:09'),
(122, 12, 1, 123, 19, '2022-04-14 00:20:50'),
(123, 11, 1, 124, 19, '2022-04-14 00:20:50'),
(124, 11, 1, 125, 19, '2022-04-14 19:53:16'),
(125, 12, 1, 126, 19, '2022-04-14 19:53:16'),
(126, 12, 1, 127, 19, '2022-04-14 19:59:31'),
(127, 11, 1, 128, 19, '2022-04-14 19:59:32'),
(128, 12, 1, 129, 19, '2022-04-14 20:00:04'),
(129, 11, 1, 130, 19, '2022-04-14 20:00:04'),
(130, 12, 1, 131, 19, '2022-04-14 20:01:39'),
(131, 11, 1, 132, 19, '2022-04-14 20:59:13'),
(132, 12, 1, 133, 19, '2022-04-14 20:59:13'),
(133, 11, 1, 134, 19, '2022-04-14 20:59:59'),
(134, 12, 1, 135, 19, '2022-04-14 20:59:59'),
(135, 11, 1, 136, 19, '2022-04-14 21:02:21'),
(136, 12, 1, 137, 19, '2022-04-14 21:02:21'),
(137, 12, 1, 138, 19, '2022-04-15 00:02:14'),
(138, 11, 1, 139, 19, '2022-04-15 00:14:00'),
(139, 12, 1, 140, 19, '2022-04-15 00:14:00'),
(140, 11, 1, 141, 19, '2022-04-15 01:19:31'),
(141, 12, 1, 142, 19, '2022-04-15 01:19:31'),
(142, 12, 1, 143, 19, '2022-04-15 01:20:02'),
(143, 11, 1, 144, 19, '2022-04-15 01:24:31'),
(144, 11, 1, 145, 19, '2022-04-15 01:25:54'),
(145, 12, 1, 146, 19, '2022-04-15 01:29:05'),
(146, 12, 1, 147, 19, '2022-04-15 01:57:27'),
(147, 12, 1, 148, 19, '2022-04-15 01:59:32'),
(148, 11, 1, 149, 19, '2022-04-15 02:00:03'),
(149, 12, 1, 150, 19, '2022-04-15 02:00:03'),
(150, 12, 1, 151, 19, '2022-04-15 02:01:08'),
(151, 11, 1, 152, 19, '2022-04-15 02:01:08'),
(152, 11, 1, 153, 19, '2022-04-15 02:01:11'),
(153, 12, 1, 154, 19, '2022-04-15 02:01:11'),
(154, 12, 1, 155, 19, '2022-04-15 02:01:30'),
(155, 12, 1, 156, 19, '2022-04-15 02:01:37'),
(156, 11, 1, 157, 19, '2022-04-16 19:50:00'),
(157, 12, 1, 158, 19, '2022-04-16 19:50:00'),
(158, 11, 1, 159, 19, '2022-04-16 19:57:40'),
(159, 12, 1, 160, 19, '2022-04-16 19:57:41'),
(160, 12, 1, 161, 19, '2022-04-16 20:51:25'),
(161, 11, 1, 162, 19, '2022-04-16 20:51:25'),
(162, 12, 1, 163, 19, '2022-04-16 21:40:46'),
(163, 11, 1, 164, 19, '2022-04-16 21:40:46'),
(164, 12, 1, 165, 19, '2022-04-16 21:53:46'),
(165, 11, 1, 166, 19, '2022-04-16 21:53:46'),
(166, 11, 1, 167, 19, '2022-04-16 22:22:35'),
(167, 12, 1, 168, 19, '2022-04-16 22:22:35'),
(168, 12, 1, 169, 19, '2022-04-16 22:34:56'),
(169, 11, 1, 170, 19, '2022-04-16 22:34:56'),
(170, 12, 1, 171, 19, '2022-04-16 22:35:25'),
(171, 11, 1, 172, 19, '2022-04-16 22:35:25'),
(172, 11, 1, 173, 19, '2022-04-16 22:36:09'),
(173, 12, 1, 174, 19, '2022-04-16 22:36:09'),
(174, 12, 1, 175, 19, '2022-04-16 22:36:56'),
(175, 11, 1, 176, 19, '2022-04-16 22:36:56'),
(176, 12, 1, 177, 19, '2022-04-16 22:38:01'),
(177, 11, 1, 178, 19, '2022-04-16 22:38:01'),
(178, 12, 1, 179, 19, '2022-04-17 02:07:28'),
(179, 12, 1, 180, 19, '2022-04-17 02:41:24'),
(180, 12, 1, 181, 19, '2022-04-17 02:41:51'),
(181, 12, 1, 182, 19, '2022-04-17 02:53:42'),
(182, 12, 1, 183, 19, '2022-04-17 02:53:51'),
(183, 12, 1, 184, 19, '2022-04-17 16:59:44'),
(184, 12, 1, 185, 19, '2022-04-18 00:28:22'),
(185, 11, 1, 186, 19, '2022-04-18 00:28:22'),
(186, 12, 1, 187, 19, '2022-04-18 00:31:09'),
(187, 11, 1, 188, 19, '2022-04-18 00:31:09'),
(188, 11, 1, 189, 19, '2022-04-18 00:32:28'),
(189, 12, 1, 190, 19, '2022-04-18 00:32:28'),
(190, 11, 1, 191, 19, '2022-04-18 00:43:05'),
(191, 12, 1, 192, 19, '2022-04-18 00:43:05'),
(192, 11, 1, 193, 19, '2022-04-18 00:50:28'),
(193, 12, 1, 194, 19, '2022-04-18 00:50:28'),
(194, 12, 1, 195, 19, '2022-04-18 15:35:38'),
(195, 12, 1, 196, 19, '2022-04-18 15:50:35'),
(196, 12, 1, 197, 19, '2022-04-20 18:32:12'),
(197, 12, 1, 198, 19, '2022-04-20 18:34:52'),
(198, 9, 1, 199, 19, '2022-04-20 18:40:47'),
(199, 12, 1, 200, 19, '2022-04-20 18:40:47'),
(200, 12, 1, 201, 19, '2022-04-20 22:10:46'),
(201, 12, 1, 202, 19, '2022-04-20 22:12:02'),
(202, 12, 1, 203, 19, '2022-04-20 22:16:26'),
(203, 12, 1, 204, 19, '2022-04-20 22:18:13'),
(204, 12, 1, 205, 19, '2022-04-20 22:20:32'),
(205, 12, 2, 206, 25, '2022-04-20 22:36:23'),
(206, 12, 2, 207, 25, '2022-04-20 22:36:52'),
(207, 12, 2, 208, 25, '2022-04-20 22:38:14'),
(208, 12, 2, 209, 25, '2022-04-20 22:39:28'),
(209, 12, 2, 210, 25, '2022-04-21 00:17:56'),
(210, 12, 2, 211, 25, '2022-04-21 17:24:30'),
(211, 12, 2, 212, 25, '2022-04-21 17:24:54'),
(212, 12, 2, 213, 25, '2022-04-21 23:44:40'),
(213, 12, 2, 214, 25, '2022-04-22 00:05:08'),
(214, 12, 1, 215, 20, '2022-04-22 00:07:08'),
(215, 12, 2, 216, 25, '2022-04-22 00:17:30'),
(216, 12, 1, 217, 20, '2022-04-22 00:18:14'),
(217, 12, 2, 218, 25, '2022-04-22 22:28:50'),
(218, 12, 2, 219, 25, '2022-04-23 02:02:07'),
(219, 9, 2, 220, 25, '2022-04-23 02:02:07'),
(220, 12, 1, 221, 20, '2022-04-23 02:04:38'),
(221, 12, 2, 222, 25, '2022-04-23 21:35:34'),
(222, 12, 2, 223, 25, '2022-04-25 17:20:43'),
(227, 12, 2, 228, 25, '2022-05-07 21:37:07'),
(228, 12, 2, 229, 25, '2022-05-07 21:37:41'),
(229, 12, 2, 230, 25, '2022-05-08 20:56:49'),
(230, 12, 2, 231, 25, '2022-05-08 20:57:37'),
(231, 12, 2, 232, 25, '2022-05-08 21:01:01'),
(232, 12, 2, 233, 25, '2022-05-11 15:34:16'),
(233, 12, 2, 234, 25, '2022-05-11 15:34:53'),
(234, 12, 2, 235, 25, '2022-05-19 01:38:10'),
(237, 12, 2, 238, 25, '2022-05-22 22:25:17'),
(238, 12, 2, 239, 25, '2022-05-22 22:26:40'),
(239, 12, 2, 240, 25, '2022-05-23 22:31:07'),
(240, 12, 2, 241, 25, '2022-05-23 22:31:09'),
(241, 12, 2, 242, 25, '2022-05-23 22:31:10'),
(242, 12, 2, 243, 25, '2022-05-23 22:31:20'),
(243, 12, 2, 244, 25, '2022-05-23 22:31:55'),
(244, 12, 2, 245, 25, '2022-05-23 22:38:27'),
(245, 12, 2, 246, 25, '2022-05-23 22:38:34'),
(246, 12, 2, 247, 25, '2022-05-23 22:38:53'),
(247, 12, 2, 248, 25, '2022-05-23 22:40:19'),
(248, 12, 2, 249, 25, '2022-05-23 23:29:32'),
(249, 12, 2, 250, 25, '2022-05-24 00:21:24'),
(250, 12, 2, 251, 25, '2022-05-24 00:22:47'),
(251, 12, 2, 252, 25, '2022-05-24 00:27:47'),
(252, 12, 2, 253, 25, '2022-05-24 23:57:24'),
(253, 12, 2, 254, 25, '2022-05-24 23:57:47'),
(254, 12, 2, 255, 25, '2022-05-25 00:00:23'),
(255, 12, 2, 256, 25, '2022-05-25 00:27:43'),
(256, 12, 2, 257, 25, '2022-05-25 00:39:08'),
(257, 12, 2, 258, 25, '2022-05-25 00:41:37'),
(258, 12, 2, 259, 25, '2022-05-25 00:42:34'),
(259, 12, 2, 260, 25, '2022-05-25 00:44:59'),
(260, 12, 2, 261, 25, '2022-05-25 00:50:49'),
(261, 12, 2, 262, 25, '2022-05-25 00:52:08'),
(262, 12, 2, 263, 25, '2022-05-25 00:52:48'),
(263, 12, 2, 264, 25, '2022-05-25 00:54:15'),
(264, 12, 2, 265, 25, '2022-05-25 00:55:17'),
(265, 12, 2, 266, 25, '2022-05-25 01:46:37'),
(266, 12, 2, 267, 25, '2022-05-25 01:56:04'),
(267, 12, 2, 268, 25, '2022-05-25 02:30:00'),
(268, 12, 2, 269, 25, '2022-05-25 02:51:34'),
(269, 12, 2, 270, 25, '2022-05-25 02:54:14'),
(270, 12, 2, 271, 25, '2022-05-27 21:51:02'),
(271, 12, 2, 272, 25, '2022-05-27 21:52:29'),
(272, 12, 2, 273, 25, '2022-06-01 22:12:08'),
(273, 12, 2, 274, 25, '2022-06-06 01:03:43'),
(274, 12, 2, 275, 25, '2022-06-06 01:04:52'),
(275, 12, 2, 276, 25, '2022-06-06 01:08:12'),
(276, 12, 2, 277, 25, '2022-06-06 01:11:17'),
(277, 12, 2, 278, 25, '2022-06-07 15:35:19'),
(278, 12, 2, 279, 25, '2022-06-08 02:21:31'),
(279, 12, 2, 280, 25, '2022-06-10 22:20:12'),
(280, 12, 2, 281, 25, '2022-06-12 18:21:20'),
(281, 12, 2, 282, 25, '2022-06-12 21:14:17'),
(282, 12, 2, 283, 25, '2022-06-13 15:58:52'),
(283, 12, 2, 284, 25, '2022-06-14 23:27:26'),
(284, 12, 2, 285, 25, '2022-06-15 00:39:10'),
(285, 12, 2, 286, 25, '2022-06-15 00:41:10'),
(286, 12, 2, 287, 25, '2022-06-15 14:40:39'),
(287, 12, 2, 288, 25, '2022-06-15 14:47:45'),
(288, 12, 2, 74, 25, '2022-06-15 17:21:44'),
(289, 12, 2, 75, 25, '2022-06-15 17:22:05'),
(290, 12, 2, 76, 25, '2022-06-15 17:22:27'),
(291, 12, 2, 77, 25, '2022-06-15 17:27:22'),
(292, 12, 2, 78, 25, '2022-06-15 17:27:49'),
(293, 12, 2, 79, 25, '2022-06-15 17:30:37'),
(294, 12, 2, 80, 25, '2022-06-15 17:31:07'),
(295, 12, 2, 81, 25, '2022-06-15 17:31:30'),
(296, 12, 2, 82, 25, '2022-06-15 17:32:55'),
(297, 12, 2, 83, 25, '2022-06-15 22:18:19'),
(298, 12, 2, 84, 25, '2022-06-15 22:19:40'),
(299, 12, 2, 85, 25, '2022-06-15 22:20:08'),
(300, 12, 2, 86, 25, '2022-06-15 22:21:47'),
(301, 12, 2, 289, 25, '2022-06-15 22:35:47'),
(302, 12, 2, 290, 25, '2022-06-15 22:40:01'),
(303, 12, 2, 291, 25, '2022-06-15 22:42:50'),
(304, 12, 2, 292, 25, '2022-06-15 22:43:40'),
(305, 12, 2, 293, 25, '2022-06-15 22:43:59'),
(306, 12, 2, 294, 25, '2022-06-15 23:30:34'),
(307, 12, 2, 295, 25, '2022-06-15 23:30:55'),
(308, 12, 2, 296, 25, '2022-06-17 17:33:36'),
(309, 12, 2, 297, 25, '2022-06-17 17:38:27'),
(310, 12, 2, 298, 25, '2022-06-17 17:38:49'),
(311, 12, 2, 299, 25, '2022-06-17 22:16:07'),
(312, 12, 2, 300, 25, '2022-06-17 22:16:47'),
(313, 12, 2, 301, 25, '2022-06-17 22:46:08'),
(314, 12, 2, 302, 25, '2022-06-17 22:46:32'),
(315, 12, 2, 303, 863, '2022-06-23 17:22:05'),
(316, 12, 2, 304, 685, '2022-06-23 17:26:40'),
(317, 12, 2, 305, 638, '2022-06-23 17:53:45'),
(318, 12, 2, 306, 615, '2022-06-23 17:54:11'),
(319, 12, 2, 307, 609, '2022-06-23 18:11:47'),
(320, 12, 2, 308, 1329, '2022-06-27 22:12:45'),
(321, 12, 2, 309, 1315, '2022-06-27 22:13:14'),
(322, 12, 2, 310, 1140, '2022-06-27 22:20:56'),
(323, 12, 2, 311, 1133, '2022-06-27 22:21:23'),
(324, 12, 2, 312, 988, '2022-06-27 22:22:34'),
(325, 12, 2, 313, 381, '2022-06-27 22:26:44'),
(326, 12, 2, 314, 380, '2022-06-27 22:27:06'),
(327, 12, 2, 315, 378, '2022-06-27 22:27:28'),
(328, 12, 2, 316, 348, '2022-06-27 22:30:37'),
(329, 12, 2, 317, 70, '2022-06-27 22:31:00'),
(330, 12, 2, 318, 51, '2022-06-27 22:31:21'),
(331, 12, 2, 319, 51, '2022-06-27 22:31:54'),
(332, 12, 2, 320, 47, '2022-06-27 22:32:15'),
(333, 12, 2, 321, 33, '2022-06-27 22:56:50'),
(334, 12, 2, 322, 23, '2022-06-27 23:16:25'),
(335, 12, 2, 323, 23, '2022-06-27 23:16:47'),
(336, 12, 2, 324, 23, '2022-06-27 23:17:07'),
(337, 12, 2, 325, 23, '2022-06-27 23:32:44'),
(338, 12, 2, 326, 19, '2022-06-27 23:33:06'),
(339, 12, 2, 327, 19, '2022-06-27 23:44:54'),
(340, 12, 2, 328, 18, '2022-06-27 23:51:16'),
(341, 12, 2, 329, 18, '2022-06-27 23:52:32'),
(342, 12, 2, 330, 18, '2022-06-28 00:00:44'),
(343, 12, 2, 331, 15, '2022-06-28 00:14:36'),
(344, 12, 2, 332, 11, '2022-06-28 00:32:57'),
(345, 12, 2, 333, 1308, '2022-06-28 00:43:10'),
(346, 12, 2, 334, 1306, '2022-06-28 00:43:34'),
(347, 12, 2, 335, 1300, '2022-06-28 00:44:04'),
(348, 12, 2, 336, 1294, '2022-06-28 00:45:16'),
(349, 12, 2, 337, 697, '2022-06-28 00:45:44'),
(350, 12, 2, 338, 693, '2022-06-28 00:46:08'),
(351, 12, 2, 339, 234, '2022-06-28 00:49:38'),
(352, 12, 2, 340, 230, '2022-06-28 00:50:03'),
(353, 12, 2, 341, 1675, '2022-07-15 19:17:02'),
(354, 12, 2, 342, 661, '2022-07-20 17:11:42'),
(355, 12, 2, 343, 648, '2022-07-20 18:04:13'),
(356, 12, 2, 344, 72, '2022-07-26 23:21:47'),
(357, 12, 2, 345, 73, '2022-07-26 23:49:04'),
(358, 12, 2, 346, 73, '2022-07-26 23:50:52'),
(359, 12, 2, 118, 254, '2022-11-14 17:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `resetkey` varchar(250) NOT NULL,
  `expdate` datetime NOT NULL,
  `used` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `email`, `resetkey`, `expdate`, `used`) VALUES
(11, 'arriba777a@gmail.com', '9d6c65f521b25183f3fdb1dbd9092a81', '2022-07-22 19:39:01', 0),
(12, 'arriba777a@gmail.com', '443aaa04128a51db94d85d9bc58c8d75', '2022-11-14 17:43:07', 0),
(13, 'arriba777a@gmail.com', '215d7a2f0d02586d50acadde6dff3a89', '2022-11-14 17:54:38', 1),
(14, 'arriba777a@gmail.com', '0aaa3f9a4c89eb110ad3521e3049b609', '2023-01-26 21:28:05', 0),
(15, 'arriba777a@gmail.com', '2888c0b05a8a8bb9a1556de4d919e347', '2023-01-26 21:36:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int NOT NULL,
  `name` varchar(765) NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `enable`) VALUES
(1, 'apitheme.php', 1),
(2, 'disablepage.php', 1),
(4, 'modebattlesolo.php', 1),
(6, 'online.php', 1),
(7, 'opencase.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int NOT NULL,
  `code` varchar(64) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `value` int NOT NULL,
  `count` int NOT NULL,
  `use` int NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `case_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `promo_use`
--

CREATE TABLE `promo_use` (
  `id` int NOT NULL,
  `promo_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rain`
--

CREATE TABLE `rain` (
  `id` int NOT NULL,
  `amount` double NOT NULL,
  `status` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rain`
--

INSERT INTO `rain` (`id`, `amount`, `status`, `date`) VALUES
(1, 20, 0, '2022-07-26 17:30:08'),
(2, 12, 0, '2022-07-26 17:31:23'),
(3, 15, 0, '2022-07-26 17:34:44'),
(4, 15, 0, '2022-07-26 19:17:15'),
(5, 13, 0, '2022-07-26 22:10:10'),
(6, 15, 0, '2022-07-26 22:15:01'),
(7, 15, 0, '2022-07-26 22:17:56'),
(8, 20, 0, '2022-07-26 22:23:13'),
(9, 15, 0, '2022-07-26 22:23:22'),
(10, 10, 0, '2022-07-26 22:28:04'),
(11, 13, 0, '2022-07-26 22:50:26'),
(12, 10, 0, '2022-07-26 23:04:40'),
(13, 16, 0, '2023-01-25 20:06:03'),
(14, 12, 0, '2023-01-25 21:20:36'),
(15, 16, 0, '2023-01-25 23:10:36'),
(16, 12, 0, '2023-01-26 00:02:36'),
(17, 12, 0, '2023-01-26 01:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `rainlog`
--

CREATE TABLE `rainlog` (
  `id` int NOT NULL,
  `rainid` int NOT NULL,
  `userid` int NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rainlog`
--

INSERT INTO `rainlog` (`id`, `rainid`, `userid`, `amount`) VALUES
(1, 3, 12, 0.01),
(2, 5, 12, 0.08),
(3, 6, 12, 0.1),
(4, 7, 12, 0.09),
(5, 9, 12, 0.03),
(6, 10, 12, 0.06),
(7, 11, 12, 0.08),
(8, 12, 12, 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `referral_user`
--

CREATE TABLE `referral_user` (
  `id` int NOT NULL,
  `referrer_id` int NOT NULL,
  `referral_id` int NOT NULL,
  `profit` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `referral_user`
--

INSERT INTO `referral_user` (`id`, `referrer_id`, `referral_id`, `profit`) VALUES
(1, 12, 14, 0),
(2, 14, 12, 0),
(3, 12, 13, 0),
(4, 37, 40, 0),
(5, 37, 43, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting`, `value`, `comment`, `type`) VALUES
('admin_email', '', 'Site administrator email', 'text'),
('admin_in_page', '20', 'Number of items on page in the admin area', 'int'),
('api_scretkey', 'nva090324u0238yAk012489axva', 'Secret key for working with the api', 'text'),
('cms_version', '0.8', 'Current CMS version', 'float'),
('cookies_life_time', '604800', 'Cookie lifetime (in seconds)', 'int'),
('current_template_folder', 'mystery', 'Standard template folder', 'text'),
('deposite_freekassa_enable', '0', 'Enable Freekassa payment method', 'bool'),
('deposite_freekassa_merchant_id', '', 'Merchant ID freekassa', 'text'),
('deposite_freekassa_secret_1', '', 'Frekassa secret 1', 'text'),
('deposite_freekassa_secret_2', '', 'Frekassa secret 2', 'text'),
('deposite_interkassa_enable', '0', 'Interkassa enabled', 'bool'),
('deposite_interkassa_merchant_id', '', 'Interkassa merchant ID', 'text'),
('deposite_interkassa_secret', '', 'Interkassa secret', 'text'),
('deposite_qiwi_enable', '0', 'Deposit qiwi enabled', 'bool'),
('deposite_qiwi_merchant_id', '', 'Qiwi merchant ID', 'text'),
('deposite_qiwi_secret', '', 'Qiwi secret', 'text'),
('deposite_unitpay_enable', '0', 'Unitpay enabled', 'bool'),
('deposite_unitpay_merchant_id', '', 'Unitpay merchant ID', 'text'),
('deposite_unitpay_secret', '', 'Unitpay secret', 'text'),
('disabledsite', '0', 'Disabled website', 'bool'),
('disablepage', 'index.php', 'Site disabled page', 'text'),
('disabletext', 'maintenance test', 'Text on the shutdown page', 'text'),
('lang', 'default', 'CMS language', 'text'),
('online_time_before_reset', '180', 'Time (seconds) that the user is considered to be online', 'int'),
('opencase_announcement', '', 'Announcement on website', 'text'),
('opencase_auto_sell', '1', 'Auto-selling items over time', 'int'),
('opencase_auto_sell_time', '10080', 'Time after which items will be automatically sold (in minutes)', 'int'),
('opencase_chance', '100', 'Percentage of user ROI', 'int'),
('opencase_count_battles', '57', 'Count of total battles', 'int'),
('opencase_count_contracts', '0', 'Count of total contracts', 'int'),
('opencase_count_open_case', '259', 'Count open cases', 'int'),
('opencase_count_upgrades', '1', 'Count of upgrades', 'int'),
('opencase_count_users', '37', 'Count of users', 'int'),
('opencase_deposit_check_day', '1', 'Number of days for which deposits to open free cases are counted', 'int'),
('opencase_drop_only_have', '0', 'The drops of items that are available', 'int'),
('opencase_enablebattle', '1', 'enable battles', 'int'),
('opencase_enablecases', '1', 'enable opening cases', 'int'),
('opencase_enablechat', '1', 'chat enabled', 'int'),
('opencase_enablewithdrawcrypt', '1', 'Enable or disable crypto withdrawals', 'int'),
('opencase_enablewithdrawnft', '1', 'enable withdrawing nfts', 'int'),
('opencase_eur_cost', '80', 'Euro exchange rate in rubles', 'float'),
('opencase_freeopen', '0', 'Free opening of the 6th case', 'int'),
('opencase_gameid', '730', 'Game ID', 'int'),
('opencase_global_sale', '0', 'Additional discount on all cases', 'int'),
('opencase_price_parser_key', '0', 'The key to take the price when upgrading', 'int'),
('opencase_regbalance', '0', 'Starting balance at registration', 'float'),
('opencase_usd_cost', '70', 'Dollar rate in rubles', 'float'),
('opencase_withdraw_type', '0', 'Item withdraw type', 'int'),
('promo_active_code', '0', 'Active promo code', 'int'),
('ref_referral_mintime_from_create', '30', 'The minimum number of days from the date of registration in, to receive a referral fee', 'int'),
('ref_referral_min_lvl', '1', 'Минимальный уровень Steam для получения реферального вознаграждения', 'int'),
('ref_referral_rewards', '5', 'Reward for a new user who came through a referral link', 'int'),
('ref_referrer_rewards', '0', 'Referral fee for attracting a new user', 'int'),
('ref_referrer_rewards_from_deposite', '5', 'Rewards from deposit for referrals', 'int'),
('site_name', 'SmirnoffOnBahamas', 'Website name', 'text'),
('site_url', 'smirnoffonbahamas.vip', 'Website url', 'text'),
('steamauth_apiKey', '88277B77209CBA7C1BD2146915D831F4', 'Steam web api key', 'text'),
('steamauth_loginDomen', 'smirnoffonbahamas.vip', 'Steam login domain', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(192) NOT NULL,
  `email` varchar(384) NOT NULL,
  `password` varchar(96) NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_via` varchar(50) NOT NULL,
  `confirmed_email` tinyint(1) NOT NULL DEFAULT '0',
  `emailconfirmkey` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `publicid` varchar(150) NOT NULL,
  `web3` varchar(100) DEFAULT NULL,
  `firstrain` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `banned`, `time_reg`, `login_via`, `confirmed_email`, `emailconfirmkey`, `publicid`, `web3`, `firstrain`) VALUES
(1, 'laaaaaaaaaaaaaaaa', '', '', 0, '2022-11-11 02:10:06', 'steam', 0, '', '', NULL, 0),
(3, 'usernanmerme', '', '', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(4, 'usernanmermexa', 'testemailxx@lol.com', 'apsdasddas', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(5, 'usernanmermexaa', 'testemailxxa@lol.com', 'e7fd7a0efd3462ce67fa4147aa46c2a2', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(6, 'usernanmermexaxaxa', 'testemailxxaxaxa@lol.com', 'e7fd7a0efd3462ce67fa4147aa46c2a2', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(7, 'sdfsdfcscxz', 'asdadsdxz@gmail.com', '2d8f5a821229bc9786182aa82b20044d', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(8, 'testkonta', 'testkontta@gmail.com', '6f8ba70965381ea8caf1d24ec07a664f', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(9, 'testkonxta', 'testkonttxa@gmail.com', '1ee0b27278827867107067e957945f6a', 0, '2022-11-11 02:10:06', 'site', 0, '', '5c37dcedas554-8xc2a63464x32a', NULL, 0),
(10, 'nasdnadsnads', 'nasdnasdn@gmail.com', '4f186b94a887a3171e97b9ffc44ff21d', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(11, 'testacc', 'tesatasd@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2022-11-11 02:10:06', 'site', 0, '', '', NULL, 0),
(12, 'sssssa', 'arriba777a@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2022-11-04 03:51:26', 'site', 1, '55c77a8b9225e365941a54d2e70f818b', 'zxsc2438asd9dsa12489cn', '', 1),
(13, 'testasdsaxcv', 'asdadscxzc@gmail.com', '1ee0b27278827867107067e957945f6a', 0, '2022-11-11 02:10:06', 'site', 0, '', '6c277dced39554-88c6f63464e7bb', '', 0),
(14, 'alliever', 'van2@gmail.com', '5b304b546df8c9e114754f73a864f723', 0, '2022-11-11 02:10:06', 'site', 0, '', '2eb7b107638bae-5388cc8fb5e7aa', NULL, 0),
(23, 'Hello2Site', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', '39fb18718d983f-4b59494e2541bb', '0xf4f972f08173907f735c852125c9859a7ba8afd6', 0),
(26, 'asdasasr', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', 'c749545b7912f7-8c8f2c79e05412', '0x1f9f8e7e4e9f515ac01e2e33b1b470288bdd5803', 0),
(27, '0x6036', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', 'd69b020643bd52-18dc3a257a902d', '0x6036bc329a352501703f435e626ab5228aebe6d6', 0),
(28, 'test', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', '0b25ff90231f39-b4800e60dbdc8a', 'tasd', 0),
(29, 'test', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', 'a5846cd705ce5c-473017710d4466', 'tasd', 0),
(30, 'test', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', '89968e0744bcfb-611c3ed7d0b87e', 'tasd', 0),
(31, 'hiiiguys', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', '3f4c6e14c79535-c5108f7664bad8', '0xe7670503787c016582781b3f0e572f0532f95884', 0),
(32, 'heysucces', '', '', 0, '2022-11-11 02:10:06', 'metamask', 0, '', 'a6721c7098d2f4-e31fd916b84f4f', '0xdc7290a2eef8aeb876cc54d44635bdd0c9ae38d2', 0),
(35, 'asdasiz', 'asdasiz5@gmail.com', '2e6a67938b106346c74ef942f526a455', 0, '2022-11-11 02:10:06', 'site', 0, '', '6a6f82c8d80961-bda23d1207055f', '', 0),
(36, '0x51ba', '', '', 0, '2022-11-12 00:00:14', 'metamask', 0, '', '719fd94bfafb3943fa4bbadc30af', '0x51ba38148dc8fef4ca8f7668f62270d2f2e094a4', 0),
(37, 'newacclol', 'newacclol@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2022-11-27 20:27:13', 'site', 0, '', '2e86314a5d49a5adcb17cb9d7b02', '', 0),
(38, 'bitchtest', 'bitchtest@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2022-12-30 21:04:52', 'site', 0, '', '5c07824b01a0e60b351cb71dcf73', '', 0),
(39, '0x984b', '', '', 0, '2023-01-02 00:19:30', 'metamask', 0, '', 'bb367094c2cc11c4a6bc9fccb629', '0x984b81e7f1ea739d5db1828df1421415f1156844', 0),
(40, '0x9a16', '', '', 0, '2023-01-02 00:21:22', 'metamask', 0, '', '4c68bd5861cde6d46cda5256731c', '0x9a160b0a18c148f961157da2ab32efde502d4b0a', 0),
(41, '0x3213', '', '', 0, '2023-01-02 03:11:03', 'metamask', 0, '', '0c7a827ceaf0a0d1172da5c36392', '0x3213e83685d329ad2bda26e65a1bea92a81f9ba7', 0),
(42, '0xf928', '', '', 0, '2023-01-02 03:21:51', 'metamask', 0, '', '3ce9238dfbd0313fa70d1dc92c33', '0xf9284a7b1d9148fc9bb863cde0a50c720cc5525f', 0),
(43, 'hiboysss', '', '', 0, '2023-01-02 23:58:37', 'metamask', 0, '', '36b8f9e620a52d683a91eaa62d28', '0x96f56647d15e00a11fafe608ebe62217a9f3c460', 0),
(44, 'newuser2', 'newuser2@gmail.com', '91342c8b590715a227357350dec64eb7', 0, '2023-01-12 01:34:41', 'site', 0, '', '00dec1ab25aed7163120525d85ba', '', 0),
(45, 'newuseryo', 'asdasdddd@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2023-01-25 22:47:22', 'site', 0, '79d0386107f69ac2ded85120867e6112', '5adfa4d446b3a96959e7b9b61af8', '', 0),
(46, 'newuserxxa', 'newuserxxa@gmail.com', '91342c8b590715a227357350dec64eb7', 0, '2023-01-25 23:42:28', 'site', 0, '55c77a7b9225e365941a54d2e70f816b', 'cbdfc3c81d37c50e0a3091339831', '', 0),
(47, 'thatsnewacctest', 'thatsnewacctest@gmail.com', 'b645938d8359fc713657750fa2378ad4', 0, '2023-01-31 00:49:41', 'site', 0, '602bc69b2246095ad1429ca643bd730c', '0e2cdd485f328e9c438355047bb5', '', 0),
(48, 'TrustedSeven', 'castaneda.chistian0215@gmail.com', 'daad9974b7e280d24097787ca6c5d963', 0, '2023-04-25 00:07:50', 'site', 0, '35115ce15a0d4c4e2ce111c87c1413e0', '735f23f346c8b75963fd4b99ad94', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_field_id` int NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `user_id`, `user_field_id`, `value`) VALUES
(1, 1, 1, '76561198022680911'),
(2, 1, 2, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/60/605ef6ed2f582cfeeaaa0cc43a4be08090947364_full.jpg'),
(3, 1, 3, '1269081429'),
(4, 1, 4, '13827'),
(5, 1, 5, ''),
(6, 1, 6, '100'),
(7, 1, 7, '0'),
(8, 1, 8, '0'),
(9, 1, 9, '0'),
(10, 1, 10, ''),
(11, 1, 11, '0'),
(12, 1, 12, '0'),
(13, 1, 13, '0'),
(14, 2, 1, '5484583458'),
(15, 2, 2, ''),
(16, 2, 3, '1231323123123'),
(17, 2, 4, '0'),
(18, 2, 5, ''),
(19, 2, 6, '100'),
(20, 2, 7, '0'),
(21, 2, 8, '0'),
(22, 2, 9, '0'),
(23, 2, 10, ''),
(24, 2, 11, '0'),
(25, 2, 12, '0'),
(26, 2, 13, '0'),
(27, 3, 1, '5484583458'),
(28, 3, 2, ''),
(29, 3, 3, '1231323123123'),
(30, 3, 4, '0'),
(31, 3, 5, ''),
(32, 3, 6, '100'),
(33, 3, 7, '0'),
(34, 3, 8, '0'),
(35, 3, 9, '0'),
(36, 3, 10, ''),
(37, 3, 11, '0'),
(38, 3, 12, '0'),
(39, 3, 13, '0'),
(40, 4, 1, 'NoSteamID'),
(41, 4, 2, 'https://i.imgur.com/sp8e9KH.png'),
(42, 4, 3, '1647102593'),
(43, 4, 4, '0'),
(44, 4, 5, ''),
(45, 4, 6, '100'),
(46, 4, 7, '0'),
(47, 4, 8, '0'),
(48, 4, 9, '0'),
(49, 4, 10, ''),
(50, 4, 11, '0'),
(51, 4, 12, '0'),
(52, 4, 13, '0'),
(53, 5, 1, 'NoSteamID'),
(54, 5, 2, 'https://i.imgur.com/sp8e9KH.png'),
(55, 5, 3, '1647107645'),
(56, 5, 4, '0'),
(57, 5, 5, ''),
(58, 5, 6, '100'),
(59, 5, 7, '0'),
(60, 5, 8, '0'),
(61, 5, 9, '0'),
(62, 5, 10, ''),
(63, 5, 11, '0'),
(64, 5, 12, '0'),
(65, 5, 13, '0'),
(66, 6, 1, 'NoSteamID'),
(67, 6, 2, 'https://i.imgur.com/sp8e9KH.png'),
(68, 6, 3, '1647128988'),
(69, 6, 4, '0'),
(70, 6, 5, ''),
(71, 6, 6, '100'),
(72, 6, 7, '0'),
(73, 6, 8, '0'),
(74, 6, 9, '0'),
(75, 6, 10, ''),
(76, 6, 11, '0'),
(77, 6, 12, '0'),
(78, 6, 13, '0'),
(79, 7, 1, 'NoSteamID'),
(80, 7, 2, 'https://i.imgur.com/sp8e9KH.png'),
(81, 7, 3, '1647548637'),
(82, 7, 4, '0'),
(83, 7, 5, ''),
(84, 7, 6, '100'),
(85, 7, 7, '0'),
(86, 7, 8, '0'),
(87, 7, 9, '0'),
(88, 7, 10, ''),
(89, 7, 11, '0'),
(90, 7, 12, '0'),
(91, 7, 13, '0'),
(92, 8, 1, 'NoSteamID'),
(93, 8, 2, 'https://i.imgur.com/sp8e9KH.png'),
(94, 8, 3, '1647548991'),
(95, 8, 4, '0'),
(96, 8, 5, ''),
(97, 8, 6, '100'),
(98, 8, 7, '0'),
(99, 8, 8, '0'),
(100, 8, 9, '0'),
(101, 8, 10, ''),
(102, 8, 11, '0'),
(103, 8, 12, '0'),
(104, 8, 13, '0'),
(105, 9, 1, 'NoSteamID'),
(106, 9, 2, 'https://i.imgur.com/sp8e9KH.png'),
(107, 9, 3, '1647549211'),
(108, 9, 4, '3580'),
(109, 9, 5, ''),
(110, 9, 6, '100'),
(111, 9, 7, '0'),
(112, 9, 8, '0'),
(113, 9, 9, '0'),
(114, 9, 10, ''),
(115, 9, 11, '0'),
(116, 9, 12, '0'),
(117, 9, 13, '0'),
(118, 10, 1, 'NoSteamID'),
(119, 10, 2, 'https://i.imgur.com/sp8e9KH.png'),
(120, 10, 3, '1647549962'),
(121, 10, 4, '0'),
(122, 10, 5, ''),
(123, 10, 6, '100'),
(124, 10, 7, '0'),
(125, 10, 8, '0'),
(126, 10, 9, '0'),
(127, 10, 10, ''),
(128, 10, 11, '0'),
(129, 10, 12, '0'),
(130, 10, 13, '0'),
(131, 11, 1, 'NoSteamID'),
(132, 11, 2, 'https://i.imgur.com/sp8e9KH.png'),
(133, 11, 3, '1647876836'),
(134, 11, 4, '18069'),
(135, 11, 5, ''),
(136, 11, 6, '100'),
(137, 11, 7, '0'),
(138, 11, 8, '0'),
(139, 11, 9, '0'),
(140, 11, 10, ''),
(141, 11, 11, '0'),
(142, 11, 12, '0'),
(143, 11, 13, '0'),
(144, 1, 14, ''),
(145, 1, 15, ''),
(146, 11, 14, '0x02502502502505200520520520520555555555555'),
(147, 11, 15, '0x02502502502505200520520520520555555555555'),
(148, 12, 1, 'NoSteamID'),
(149, 12, 2, 'https://smirnoffonbahamas.vip/uploads/e0219d5eb87ab8be1a46dc88.jpg'),
(150, 12, 3, '1649368708'),
(151, 12, 4, '54537.8'),
(152, 12, 5, ''),
(153, 12, 6, '100'),
(154, 12, 7, '0'),
(155, 12, 8, '0'),
(156, 12, 9, '0'),
(157, 12, 10, ''),
(158, 12, 11, '0'),
(159, 12, 12, '0'),
(160, 12, 13, '0'),
(161, 12, 14, 'asddasdxxxxxxxxxxasdsdasdasasd42xxxx'),
(162, 12, 15, '0x858269296812949585672958672957185725'),
(163, 9, 14, ''),
(164, 9, 15, ''),
(165, 4, 14, ''),
(166, 4, 15, ''),
(167, 13, 1, 'NoSteamID'),
(168, 13, 2, 'https://i.imgur.com/sp8e9KH.png'),
(169, 13, 3, '1649385024'),
(170, 13, 4, '3276'),
(171, 13, 5, ''),
(172, 13, 6, '100'),
(173, 13, 7, '0'),
(174, 13, 8, '0'),
(175, 13, 9, '0'),
(176, 13, 10, ''),
(177, 13, 11, '0'),
(178, 13, 12, '0'),
(179, 13, 13, '0'),
(180, 13, 14, 'DNFnreeQSAD'),
(181, 13, 15, '0x83294839243'),
(182, 14, 1, 'NoSteamID'),
(183, 14, 2, 'https://i.imgur.com/sp8e9KH.png'),
(184, 14, 3, '1649432147'),
(185, 14, 4, '0'),
(186, 14, 5, ''),
(187, 14, 6, '100'),
(188, 14, 7, '0'),
(189, 14, 8, '0'),
(190, 14, 9, '0'),
(191, 14, 10, ''),
(192, 14, 11, '0'),
(193, 14, 12, '0'),
(194, 14, 13, '0'),
(195, 14, 14, ''),
(196, 14, 15, ''),
(197, 12, 16, '2269025'),
(198, 11, 16, '0'),
(200, 12, 17, '0'),
(201, 11, 17, '0'),
(202, 14, 16, '0'),
(203, 14, 17, '0'),
(204, 13, 16, '0'),
(205, 13, 17, '0'),
(206, 10, 14, ''),
(207, 10, 15, ''),
(208, 10, 16, '0'),
(209, 10, 17, '0'),
(210, 9, 16, '0'),
(211, 9, 17, '0'),
(212, 8, 14, ''),
(213, 8, 15, ''),
(214, 8, 16, '0'),
(215, 8, 17, '0'),
(216, 7, 14, ''),
(217, 7, 15, ''),
(218, 7, 16, '0'),
(219, 7, 17, '0'),
(220, 6, 14, ''),
(221, 6, 15, ''),
(222, 6, 16, '0'),
(223, 6, 17, '0'),
(224, 5, 14, ''),
(225, 5, 15, ''),
(226, 5, 16, '0'),
(227, 5, 17, '0'),
(228, 4, 16, '0'),
(229, 4, 17, '0'),
(230, 3, 14, ''),
(231, 3, 15, ''),
(232, 3, 16, '0'),
(233, 3, 17, '0'),
(234, 1, 16, '0'),
(235, 1, 17, '0'),
(236, 12, 18, '1'),
(237, 11, 18, '0'),
(238, 14, 18, '0'),
(239, 13, 18, '0'),
(240, 9, 18, '0'),
(241, 12, 19, 'testnx'),
(242, 9, 19, 'SITE'),
(243, 11, 19, 'NFT'),
(244, 14, 19, 'BOX'),
(245, 13, 19, 'FREE'),
(246, 15, 1, ''),
(247, 15, 2, 'https://i.imgur.com/sp8e9KH.png'),
(248, 15, 3, '1651769126'),
(249, 15, 4, '0'),
(250, 15, 5, ''),
(251, 15, 6, '100'),
(252, 15, 7, '0'),
(253, 15, 8, '0'),
(254, 15, 9, '0'),
(255, 15, 10, ''),
(256, 15, 11, '0'),
(257, 15, 12, '0'),
(258, 15, 13, '0'),
(259, 15, 14, ''),
(260, 15, 15, ''),
(261, 15, 16, '0'),
(262, 15, 17, '0'),
(263, 15, 18, '0'),
(264, 15, 19, ''),
(265, 16, 1, ''),
(266, 16, 2, 'https://i.imgur.com/sp8e9KH.png'),
(267, 16, 3, '1651769192'),
(268, 16, 4, '0'),
(269, 16, 5, ''),
(270, 16, 6, '100'),
(271, 16, 7, '0'),
(272, 16, 8, '0'),
(273, 16, 9, '0'),
(274, 16, 10, ''),
(275, 16, 11, '0'),
(276, 16, 12, '0'),
(277, 16, 13, '0'),
(278, 16, 14, ''),
(279, 16, 15, ''),
(280, 16, 16, '0'),
(281, 16, 17, '0'),
(282, 16, 18, '0'),
(283, 16, 19, ''),
(284, 17, 1, ''),
(285, 17, 2, 'https://i.imgur.com/sp8e9KH.png'),
(286, 17, 3, '1651769587'),
(287, 17, 4, '0'),
(288, 17, 5, ''),
(289, 17, 6, '100'),
(290, 17, 7, '0'),
(291, 17, 8, '0'),
(292, 17, 9, '0'),
(293, 17, 10, ''),
(294, 17, 11, '0'),
(295, 17, 12, '0'),
(296, 17, 13, '0'),
(297, 17, 14, ''),
(298, 17, 15, ''),
(299, 17, 16, '0'),
(300, 17, 17, '0'),
(301, 17, 18, '0'),
(302, 17, 19, ''),
(303, 18, 1, ''),
(304, 18, 2, 'https://i.imgur.com/sp8e9KH.png'),
(305, 18, 3, '1651771465'),
(306, 18, 4, '0'),
(307, 18, 5, ''),
(308, 18, 6, '100'),
(309, 18, 7, '0'),
(310, 18, 8, '0'),
(311, 18, 9, '0'),
(312, 18, 10, ''),
(313, 18, 11, '0'),
(314, 18, 12, '0'),
(315, 18, 13, '0'),
(316, 18, 14, ''),
(317, 18, 15, ''),
(318, 18, 16, '0'),
(319, 18, 17, '0'),
(320, 18, 18, '0'),
(321, 18, 19, ''),
(322, 19, 1, ''),
(323, 19, 2, 'https://i.imgur.com/sp8e9KH.png'),
(324, 19, 3, '1651773285'),
(325, 19, 4, '0'),
(326, 19, 5, ''),
(327, 19, 6, '100'),
(328, 19, 7, '0'),
(329, 19, 8, '0'),
(330, 19, 9, '0'),
(331, 19, 10, ''),
(332, 19, 11, '0'),
(333, 19, 12, '0'),
(334, 19, 13, '0'),
(335, 19, 14, ''),
(336, 19, 15, ''),
(337, 19, 16, '0'),
(338, 19, 17, '0'),
(339, 19, 18, '0'),
(340, 19, 19, ''),
(341, 20, 1, ''),
(342, 20, 2, 'https://i.imgur.com/sp8e9KH.png'),
(343, 20, 3, '1651773489'),
(344, 20, 4, '0'),
(345, 20, 5, ''),
(346, 20, 6, '100'),
(347, 20, 7, '0'),
(348, 20, 8, '0'),
(349, 20, 9, '0'),
(350, 20, 10, ''),
(351, 20, 11, '0'),
(352, 20, 12, '0'),
(353, 20, 13, '0'),
(354, 20, 14, ''),
(355, 20, 15, ''),
(356, 20, 16, '0'),
(357, 20, 17, '0'),
(358, 20, 18, '0'),
(359, 20, 19, ''),
(360, 21, 1, ''),
(361, 21, 2, 'https://i.imgur.com/sp8e9KH.png'),
(362, 21, 3, '1651773827'),
(363, 21, 4, '0'),
(364, 21, 5, ''),
(365, 21, 6, '100'),
(366, 21, 7, '0'),
(367, 21, 8, '0'),
(368, 21, 9, '0'),
(369, 21, 10, ''),
(370, 21, 11, '0'),
(371, 21, 12, '0'),
(372, 21, 13, '0'),
(373, 21, 14, ''),
(374, 21, 15, ''),
(375, 21, 16, '0'),
(376, 21, 17, '0'),
(377, 21, 18, '0'),
(378, 21, 19, ''),
(379, 22, 1, ''),
(380, 22, 2, 'https://i.imgur.com/sp8e9KH.png'),
(381, 22, 3, '1651774620'),
(382, 22, 4, '0'),
(383, 22, 5, ''),
(384, 22, 6, '100'),
(385, 22, 7, '0'),
(386, 22, 8, '0'),
(387, 22, 9, '0'),
(388, 22, 10, ''),
(389, 22, 11, '0'),
(390, 22, 12, '0'),
(391, 22, 13, '0'),
(392, 22, 14, ''),
(393, 22, 15, ''),
(394, 22, 16, '0'),
(395, 22, 17, '0'),
(396, 22, 18, '0'),
(397, 22, 19, ''),
(398, 23, 1, ''),
(399, 23, 2, 'https://i.imgur.com/sp8e9KH.png'),
(400, 23, 3, '1651774862'),
(401, 23, 4, '0'),
(402, 23, 5, ''),
(403, 23, 6, '100'),
(404, 23, 7, '0'),
(405, 23, 8, '0'),
(406, 23, 9, '0'),
(407, 23, 10, ''),
(408, 23, 11, '0'),
(409, 23, 12, '0'),
(410, 23, 13, '0'),
(411, 23, 14, ''),
(412, 23, 15, ''),
(413, 23, 16, '0'),
(414, 23, 17, '0'),
(415, 23, 18, '0'),
(416, 23, 19, ''),
(417, 24, 1, ''),
(418, 24, 2, 'https://lh3.googleusercontent.com/a/AATXAJzSm2-3preexEFyv10whNrogqEcB0Ow9EpwmtXg=s96-c'),
(419, 24, 3, '1651856155'),
(420, 24, 4, '0'),
(421, 24, 5, ''),
(422, 24, 6, '100'),
(423, 24, 7, '0'),
(424, 24, 8, '0'),
(425, 24, 9, '0'),
(426, 24, 10, ''),
(427, 24, 11, '0'),
(428, 24, 12, '0'),
(429, 24, 13, '0'),
(430, 24, 14, ''),
(431, 24, 15, ''),
(432, 24, 16, '0'),
(433, 24, 17, '0'),
(434, 24, 18, '0'),
(435, 24, 19, ''),
(436, 25, 1, ''),
(437, 25, 2, 'https://lh3.googleusercontent.com/a/AATXAJzSm2-3preexEFyv10whNrogqEcB0Ow9EpwmtXg=s96-c'),
(438, 25, 3, '1651858567'),
(439, 25, 4, '0'),
(440, 25, 5, ''),
(441, 25, 6, '100'),
(442, 25, 7, '0'),
(443, 25, 8, '0'),
(444, 25, 9, '0'),
(445, 25, 10, ''),
(446, 25, 11, '0'),
(447, 25, 12, '0'),
(448, 25, 13, '0'),
(449, 25, 14, ''),
(450, 25, 15, ''),
(451, 25, 16, '0'),
(452, 25, 17, '0'),
(453, 25, 18, '0'),
(454, 25, 19, ''),
(455, 12, 20, 'FREE'),
(456, 9, 20, ''),
(457, 11, 20, ''),
(458, 14, 20, ''),
(459, 13, 20, 'BOX'),
(460, 26, 1, ''),
(461, 26, 2, 'https://i.imgur.com/sp8e9KH.png'),
(462, 26, 3, '1652130494'),
(463, 26, 4, '0'),
(464, 26, 5, ''),
(465, 26, 6, '100'),
(466, 26, 7, '0'),
(467, 26, 8, '0'),
(468, 26, 9, '0'),
(469, 26, 10, ''),
(470, 26, 11, '0'),
(471, 26, 12, '0'),
(472, 26, 13, '0'),
(473, 26, 14, ''),
(474, 26, 15, ''),
(475, 26, 16, '0'),
(476, 26, 17, '0'),
(477, 26, 18, '0'),
(478, 26, 19, ''),
(479, 26, 20, ''),
(480, 1, 18, '0'),
(481, 1, 19, ''),
(482, 1, 20, ''),
(483, 12, 21, 'testx2555HxAX64xx71'),
(484, 9, 21, ''),
(485, 14, 21, ''),
(486, 13, 21, ''),
(487, 27, 1, ''),
(488, 27, 2, 'https://i.imgur.com/sp8e9KH.png'),
(489, 27, 3, '1653594956'),
(490, 27, 4, '0'),
(491, 27, 5, ''),
(492, 27, 6, '100'),
(493, 27, 7, '0'),
(494, 27, 8, '0'),
(495, 27, 9, '0'),
(496, 27, 10, ''),
(497, 27, 11, '0'),
(498, 27, 12, '0'),
(499, 27, 13, '0'),
(500, 27, 14, ''),
(501, 27, 15, ''),
(502, 27, 16, '0'),
(503, 27, 17, '0'),
(504, 27, 18, '0'),
(505, 27, 19, ''),
(506, 27, 20, ''),
(507, 27, 21, 'a0b39451514b18'),
(508, 28, 1, ''),
(509, 28, 2, 'https://i.imgur.com/sp8e9KH.png'),
(510, 28, 3, '1653598242'),
(511, 28, 4, '0'),
(512, 28, 5, ''),
(513, 28, 6, '100'),
(514, 28, 7, '0'),
(515, 28, 8, '0'),
(516, 28, 9, '0'),
(517, 28, 10, ''),
(518, 28, 11, '0'),
(519, 28, 12, '0'),
(520, 28, 13, '0'),
(521, 28, 14, ''),
(522, 28, 15, ''),
(523, 28, 16, '0'),
(524, 28, 17, '0'),
(525, 28, 18, '0'),
(526, 28, 19, ''),
(527, 28, 20, ''),
(528, 28, 21, '5741e98982abdd'),
(529, 29, 1, ''),
(530, 29, 2, 'https://i.imgur.com/sp8e9KH.png'),
(531, 29, 3, '1653598307'),
(532, 29, 4, '0'),
(533, 29, 5, ''),
(534, 29, 6, '100'),
(535, 29, 7, '0'),
(536, 29, 8, '0'),
(537, 29, 9, '0'),
(538, 29, 10, ''),
(539, 29, 11, '0'),
(540, 29, 12, '0'),
(541, 29, 13, '0'),
(542, 29, 14, ''),
(543, 29, 15, ''),
(544, 29, 16, '0'),
(545, 29, 17, '0'),
(546, 29, 18, '0'),
(547, 29, 19, ''),
(548, 29, 20, ''),
(549, 29, 21, 'bfeb9725debd82'),
(550, 30, 1, ''),
(551, 30, 2, 'https://i.imgur.com/sp8e9KH.png'),
(552, 30, 3, '1653602501'),
(553, 30, 4, '0'),
(554, 30, 5, ''),
(555, 30, 6, '100'),
(556, 30, 7, '0'),
(557, 30, 8, '0'),
(558, 30, 9, '0'),
(559, 30, 10, ''),
(560, 30, 11, '0'),
(561, 30, 12, '0'),
(562, 30, 13, '0'),
(563, 30, 14, ''),
(564, 30, 15, ''),
(565, 30, 16, '0'),
(566, 30, 17, '0'),
(567, 30, 18, '0'),
(568, 30, 19, ''),
(569, 30, 20, ''),
(570, 30, 21, 'bf4f8fdee37cc6'),
(571, 31, 1, ''),
(572, 31, 2, 'https://i.imgur.com/sp8e9KH.png'),
(573, 31, 3, '1653602639'),
(574, 31, 4, '0'),
(575, 31, 5, ''),
(576, 31, 6, '100'),
(577, 31, 7, '0'),
(578, 31, 8, '0'),
(579, 31, 9, '0'),
(580, 31, 10, ''),
(581, 31, 11, '0'),
(582, 31, 12, '0'),
(583, 31, 13, '0'),
(584, 31, 14, ''),
(585, 31, 15, ''),
(586, 31, 16, '0'),
(587, 31, 17, '0'),
(588, 31, 18, '0'),
(589, 31, 19, ''),
(590, 31, 20, ''),
(591, 31, 21, 'b37d81fef9f996'),
(592, 32, 1, ''),
(593, 32, 2, 'https://i.imgur.com/sp8e9KH.png'),
(594, 32, 3, '1653604656'),
(595, 32, 4, '0'),
(596, 32, 5, ''),
(597, 32, 6, '100'),
(598, 32, 7, '0'),
(599, 32, 8, '0'),
(600, 32, 9, '0'),
(601, 32, 10, ''),
(602, 32, 11, '0'),
(603, 32, 12, '0'),
(604, 32, 13, '0'),
(605, 32, 14, ''),
(606, 32, 15, ''),
(607, 32, 16, '0'),
(608, 32, 17, '0'),
(609, 32, 18, '0'),
(610, 32, 19, ''),
(611, 32, 20, ''),
(612, 32, 21, '22b862b7c75f27'),
(613, 33, 1, ''),
(614, 33, 2, 'https://lh3.googleusercontent.com/a/AATXAJzp2nLnRrZE564RdRy2FzNgbEvj289pYOgl4CIK=s96-c'),
(615, 33, 3, '1653605205'),
(616, 33, 4, '0'),
(617, 33, 5, ''),
(618, 33, 6, '100'),
(619, 33, 7, '0'),
(620, 33, 8, '0'),
(621, 33, 9, '0'),
(622, 33, 10, ''),
(623, 33, 11, '0'),
(624, 33, 12, '0'),
(625, 33, 13, '0'),
(626, 33, 14, ''),
(627, 33, 15, ''),
(628, 33, 16, '0'),
(629, 33, 17, '0'),
(630, 33, 18, '0'),
(631, 33, 19, ''),
(632, 33, 20, ''),
(633, 33, 21, '36b86d3e0f789d'),
(634, 34, 1, ''),
(635, 34, 2, 'https://lh3.googleusercontent.com/a/AATXAJzSm2-3preexEFyv10whNrogqEcB0Ow9EpwmtXg=s96-c'),
(636, 34, 3, '1653605222'),
(637, 34, 4, '0'),
(638, 34, 5, ''),
(639, 34, 6, '100'),
(640, 34, 7, '0'),
(641, 34, 8, '0'),
(642, 34, 9, '0'),
(643, 34, 10, ''),
(644, 34, 11, '0'),
(645, 34, 12, '0'),
(646, 34, 13, '0'),
(647, 34, 14, ''),
(648, 34, 15, ''),
(649, 34, 16, '0'),
(650, 34, 17, '0'),
(651, 34, 18, '0'),
(652, 34, 19, ''),
(653, 34, 20, ''),
(654, 34, 21, '437a4418e60e70'),
(655, 1, 21, ''),
(656, 35, 1, 'NoSteamID'),
(657, 35, 2, 'https://api.multiavatar.com/asdasiz.png'),
(658, 35, 3, '1654898597'),
(659, 35, 4, '9183.44'),
(660, 35, 5, ''),
(661, 35, 6, '100'),
(662, 35, 7, '0'),
(663, 35, 8, '0'),
(664, 35, 9, '0'),
(665, 35, 10, ''),
(666, 35, 11, '0'),
(667, 35, 12, '0'),
(668, 35, 13, '0'),
(669, 35, 14, ''),
(670, 35, 15, ''),
(671, 35, 16, '0'),
(672, 35, 17, '0'),
(673, 35, 18, '0'),
(674, 35, 19, ''),
(675, 35, 20, ''),
(676, 35, 21, '873810fbf98bc8z1'),
(677, 11, 21, ''),
(679, 10, 19, 'CASE'),
(681, 8, 19, 'ADMIN'),
(682, 7, 19, 'COINS'),
(683, 6, 19, 'CODE'),
(684, 5, 19, 'AFFILIATE'),
(685, 36, 1, ''),
(686, 36, 2, 'https://api.multiavatar.com/0x51ba.png'),
(687, 36, 3, '1668211214'),
(688, 36, 4, '0'),
(689, 36, 5, ''),
(690, 36, 6, '100'),
(691, 36, 7, '0'),
(692, 36, 8, '0'),
(693, 36, 9, '0'),
(694, 36, 10, ''),
(695, 36, 11, '0'),
(696, 36, 12, '0'),
(697, 36, 13, '0'),
(698, 36, 14, ''),
(699, 36, 15, ''),
(700, 36, 16, '0'),
(701, 36, 17, '0'),
(702, 36, 18, '0'),
(703, 36, 19, ''),
(704, 36, 20, ''),
(705, 36, 21, '250e834cc71917'),
(706, 26, 21, ''),
(707, 23, 20, ''),
(708, 23, 21, ''),
(709, 10, 18, '0'),
(710, 10, 20, ''),
(711, 10, 21, ''),
(712, 8, 18, '0'),
(713, 8, 20, ''),
(714, 8, 21, ''),
(715, 7, 18, '0'),
(716, 7, 20, ''),
(717, 7, 21, ''),
(718, 6, 18, '0'),
(719, 6, 20, ''),
(720, 6, 21, ''),
(721, 5, 18, '0'),
(722, 5, 20, ''),
(723, 5, 21, ''),
(724, 37, 1, 'NoSteamID'),
(725, 37, 2, 'https://smirnoffonbahamas.vip/uploads/125debea09e0ed87187b6aa9.jpg'),
(726, 37, 3, '1669580833'),
(727, 37, 4, '3.2'),
(728, 37, 5, ''),
(729, 37, 6, '100'),
(730, 37, 7, '0'),
(731, 37, 8, '0'),
(732, 37, 9, '0'),
(733, 37, 10, ''),
(734, 37, 11, '0'),
(735, 37, 12, '0'),
(736, 37, 13, '0'),
(737, 37, 14, ''),
(738, 37, 15, '0x884289632858953895395499542225624161'),
(739, 37, 16, '5500'),
(740, 37, 17, '0'),
(741, 37, 18, '1'),
(742, 37, 19, 'asdadsdsadx'),
(743, 37, 20, ''),
(744, 37, 21, '27d16c8101ccf16A8'),
(745, 38, 1, 'NoSteamID'),
(746, 38, 2, 'https://api.multiavatar.com/bitchtest.png'),
(747, 38, 3, '1672434292'),
(748, 38, 4, '0'),
(749, 38, 5, ''),
(750, 38, 6, '100'),
(751, 38, 7, '0'),
(752, 38, 8, '0'),
(753, 38, 9, '0'),
(754, 38, 10, ''),
(755, 38, 11, '0'),
(756, 38, 12, '0'),
(757, 38, 13, '0'),
(758, 38, 14, ''),
(759, 38, 15, ''),
(760, 38, 16, '0'),
(761, 38, 17, '0'),
(762, 38, 18, '0'),
(763, 38, 19, 'goodcode'),
(764, 38, 20, ''),
(765, 38, 21, '1dbe3d9946c88d'),
(766, 39, 1, ''),
(767, 39, 2, 'https://api.multiavatar.com/0x984b.png'),
(768, 39, 3, '1672618770'),
(769, 39, 4, '0'),
(770, 39, 5, ''),
(771, 39, 6, '100'),
(772, 39, 7, '0'),
(773, 39, 8, '0'),
(774, 39, 9, '0'),
(775, 39, 10, ''),
(776, 39, 11, '0'),
(777, 39, 12, '0'),
(778, 39, 13, '0'),
(779, 39, 14, ''),
(780, 39, 15, ''),
(781, 39, 16, '0'),
(782, 39, 17, '0'),
(783, 39, 18, '0'),
(784, 39, 19, 'b1350a2d662f2015'),
(785, 39, 20, ''),
(786, 39, 21, 'fd339385da8345'),
(787, 40, 1, ''),
(788, 40, 2, 'https://api.multiavatar.com/0x9a16.png'),
(789, 40, 3, '1672618882'),
(790, 40, 4, '10'),
(791, 40, 5, ''),
(792, 40, 6, '100'),
(793, 40, 7, '0'),
(794, 40, 8, '0'),
(795, 40, 9, '0'),
(796, 40, 10, ''),
(797, 40, 11, '0'),
(798, 40, 12, '0'),
(799, 40, 13, '0'),
(800, 40, 14, ''),
(801, 40, 15, ''),
(802, 40, 16, '0'),
(803, 40, 17, '0'),
(804, 40, 18, '0'),
(805, 40, 19, 'd788e7be77d3a6fa'),
(806, 40, 20, 'asdadsdsad'),
(807, 40, 21, 'ac0826c54ed301'),
(808, 41, 1, ''),
(809, 41, 2, 'https://api.multiavatar.com/0x3213.png'),
(810, 41, 3, '1672629063'),
(811, 41, 4, '0'),
(812, 41, 5, ''),
(813, 41, 6, '100'),
(814, 41, 7, '0'),
(815, 41, 8, '0'),
(816, 41, 9, '0'),
(817, 41, 10, ''),
(818, 41, 11, '0'),
(819, 41, 12, '0'),
(820, 41, 13, '0'),
(821, 41, 14, ''),
(822, 41, 15, ''),
(823, 41, 16, '0'),
(824, 41, 17, '0'),
(825, 41, 18, '0'),
(826, 41, 19, '4a0f135e6615a6e0'),
(827, 41, 20, ''),
(828, 41, 21, 'bc1ef76cc903dc'),
(829, 42, 1, ''),
(830, 42, 2, 'https://api.multiavatar.com/0xf928.png'),
(831, 42, 3, '1672629711'),
(832, 42, 4, '0'),
(833, 42, 5, ''),
(834, 42, 6, '100'),
(835, 42, 7, '0'),
(836, 42, 8, '0'),
(837, 42, 9, '0'),
(838, 42, 10, ''),
(839, 42, 11, '0'),
(840, 42, 12, '0'),
(841, 42, 13, '0'),
(842, 42, 14, ''),
(843, 42, 15, ''),
(844, 42, 16, '0'),
(845, 42, 17, '0'),
(846, 42, 18, '0'),
(847, 42, 19, '63edfa98b847fcd0'),
(848, 42, 20, ''),
(849, 42, 21, '1b84153520eee0'),
(850, 43, 1, ''),
(851, 43, 2, 'https://api.multiavatar.com/0x96f5.png'),
(852, 43, 3, '1672703917'),
(853, 43, 4, '150'),
(854, 43, 5, ''),
(855, 43, 6, '100'),
(856, 43, 7, '0'),
(857, 43, 8, '0'),
(858, 43, 9, '0'),
(859, 43, 10, ''),
(860, 43, 11, '0'),
(861, 43, 12, '0'),
(862, 43, 13, '0'),
(863, 43, 14, ''),
(864, 43, 15, ''),
(865, 43, 16, '0'),
(866, 43, 17, '0'),
(867, 43, 18, '0'),
(868, 43, 19, '24639df653dcde67'),
(869, 43, 20, 'asdadsdsad'),
(870, 43, 21, '43b0ca3b7c4711'),
(871, 44, 1, 'NoSteamID'),
(872, 44, 2, 'https://api.multiavatar.com/newuser2.png'),
(873, 44, 3, '1673487282'),
(874, 44, 4, '0'),
(875, 44, 5, ''),
(876, 44, 6, '100'),
(877, 44, 7, '0'),
(878, 44, 8, '0'),
(879, 44, 9, '0'),
(880, 44, 10, ''),
(881, 44, 11, '0'),
(882, 44, 12, '0'),
(883, 44, 13, '0'),
(884, 44, 14, ''),
(885, 44, 15, ''),
(886, 44, 16, '0'),
(887, 44, 17, '0'),
(888, 44, 18, '0'),
(889, 44, 19, 'a6cacef8aab9c6cb'),
(890, 44, 20, ''),
(891, 44, 21, '733816e132c7a0'),
(892, 12, 22, '0'),
(893, 37, 22, '0'),
(894, 32, 22, '0'),
(895, 35, 22, '0'),
(896, 14, 22, '0'),
(897, 7, 22, '0'),
(898, 13, 22, '0'),
(899, 11, 22, '0'),
(900, 9, 22, '0'),
(901, 45, 1, 'NoSteamID'),
(902, 45, 2, 'https://api.multiavatar.com/newuseryo.png'),
(903, 45, 3, '1674686842'),
(904, 45, 4, '0'),
(905, 45, 5, ''),
(906, 45, 6, '100'),
(907, 45, 7, '0'),
(908, 45, 8, '0'),
(909, 45, 9, '0'),
(910, 45, 10, ''),
(911, 45, 11, '0'),
(912, 45, 12, '0'),
(913, 45, 13, '0'),
(914, 45, 14, ''),
(915, 45, 15, ''),
(916, 45, 16, '0'),
(917, 45, 17, '0'),
(918, 45, 18, '0'),
(919, 45, 19, 'b1883988195328ca'),
(920, 45, 20, ''),
(921, 45, 21, 'ec6331ef277732'),
(922, 45, 22, '0'),
(923, 46, 1, 'NoSteamID'),
(924, 46, 2, 'https://api.multiavatar.com/newuserxxa.png'),
(925, 46, 3, '1674690148'),
(926, 46, 4, '0'),
(927, 46, 5, ''),
(928, 46, 6, '100'),
(929, 46, 7, '0'),
(930, 46, 8, '0'),
(931, 46, 9, '0'),
(932, 46, 10, ''),
(933, 46, 11, '0'),
(934, 46, 12, '0'),
(935, 46, 13, '0'),
(936, 46, 14, ''),
(937, 46, 15, ''),
(938, 46, 16, '0'),
(939, 46, 17, '0'),
(940, 46, 18, '0'),
(941, 46, 19, 'ef5025a0e2ca7126'),
(942, 46, 20, ''),
(943, 46, 21, '91727fcff87286'),
(944, 46, 22, '0'),
(945, 1, 22, '0'),
(946, 47, 1, 'NoSteamID'),
(947, 47, 2, 'https://api.multiavatar.com/thatsnewacctest.png'),
(948, 47, 3, '1675126181'),
(949, 47, 4, '0'),
(950, 47, 5, ''),
(951, 47, 6, '100'),
(952, 47, 7, '0'),
(953, 47, 8, '0'),
(954, 47, 9, '0'),
(955, 47, 10, ''),
(956, 47, 11, '0'),
(957, 47, 12, '0'),
(958, 47, 13, '0'),
(959, 47, 14, ''),
(960, 47, 15, ''),
(961, 47, 16, '0'),
(962, 47, 17, '0'),
(963, 47, 18, '0'),
(964, 47, 19, 'c5b259c76f630782'),
(965, 47, 20, ''),
(966, 47, 21, '66833bc22c05b4'),
(967, 47, 22, '0'),
(968, 48, 1, 'NoSteamID'),
(969, 48, 2, 'https://api.multiavatar.com/TrustedSeven.png'),
(970, 48, 3, '1682381270'),
(971, 48, 4, '0'),
(972, 48, 5, ''),
(973, 48, 6, '100'),
(974, 48, 7, '0'),
(975, 48, 8, '0'),
(976, 48, 9, '0'),
(977, 48, 10, ''),
(978, 48, 11, '0'),
(979, 48, 12, '0'),
(980, 48, 13, '0'),
(981, 48, 14, ''),
(982, 48, 15, ''),
(983, 48, 16, '0'),
(984, 48, 17, '0'),
(985, 48, 18, '0'),
(986, 48, 19, 'f4cc223a9a9af676'),
(987, 48, 20, ''),
(988, 48, 21, '605c67259944b2'),
(989, 48, 22, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_fields`
--

CREATE TABLE `user_fields` (
  `id` int NOT NULL,
  `key` varchar(96) NOT NULL,
  `type` varchar(48) NOT NULL,
  `default` varchar(768) NOT NULL,
  `description` varchar(768) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_fields`
--

INSERT INTO `user_fields` (`id`, `key`, `type`, `default`, `description`) VALUES
(1, 'steam_id', 'string', '', 'User steam id'),
(2, 'image', 'string', '', 'Profile image'),
(3, 'timecreated', 'int', '0', 'Timestamp account created'),
(4, 'balance', 'float', '0', 'User balance'),
(5, 'trade_link', 'string', '', 'Steam trade link'),
(6, 'chance', 'int', '100', 'Chance of opening a case'),
(7, 'withdraw_disabled', 'bool', '0', 'Disabled withdraw'),
(8, 'deposite_disabled', 'bool', '0', 'Deposit disabled'),
(9, 'status', 'int', '0', 'User status'),
(10, 'deposite_promo', 'string', '', 'Promo code entered in the deposit form'),
(11, 'top_disabled', 'bool', '0', 'Hide in the leaderboard'),
(12, 'use_self_profit', 'bool', '0', 'Use personal profit'),
(13, 'self_profit', 'int', '0', 'Personal profit for the user'),
(14, 'solana_wallet', 'string', '', 'Solana wallet address'),
(15, 'eth_wallet', 'string', '', 'Ethereum wallet address'),
(16, 'exp', 'int', '0', 'Experience'),
(17, 'chat_ban', 'int', '0', 'Ban on chat'),
(18, 'is_mod', 'int', '0', 'Is moderator'),
(19, 'own_ref_code', 'string', '', 'Own referral code'),
(20, 'used_ref_code', 'string', '', 'Referral code used by this user'),
(21, 'seed', 'string', '', 'Provably fair seed'),
(22, 'avatar_ban', 'int', '0', 'Ban on uploading avatar');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `ip` varchar(45) NOT NULL,
  `event` varchar(384) NOT NULL,
  `type` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE `webpage` (
  `namepage` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_page` varchar(255) NOT NULL,
  `meta_des` text NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tpl` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`namepage`, `title`, `title_page`, `meta_des`, `meta_key`, `content`, `tpl`, `url`, `time_add`) VALUES
('index', 'OpenCase', 'OpenCase', '', '', '', 'index.php', '/', '2022-02-28 00:26:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_withdrawals`
--
ALTER TABLE `crypto_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fingerprints`
--
ALTER TABLE `fingerprints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nft_collections`
--
ALTER TABLE `nft_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nft_withdrawals`
--
ALTER TABLE `nft_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonces`
--
ALTER TABLE `nonces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opencase_balancelog`
--
ALTER TABLE `opencase_balancelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`type`);

--
-- Indexes for table `opencase_battle`
--
ALTER TABLE `opencase_battle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `opencase_battle_cases`
--
ALTER TABLE `opencase_battle_cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `opencase_bot`
--
ALTER TABLE `opencase_bot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opencase_botevents`
--
ALTER TABLE `opencase_botevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opencase_case`
--
ALTER TABLE `opencase_case`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`),
  ADD KEY `category` (`category`),
  ADD KEY `enable` (`enable`);

--
-- Indexes for table `opencase_category`
--
ALTER TABLE `opencase_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opencase_deposite`
--
ALTER TABLE `opencase_deposite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `opencase_droppeditems`
--
ALTER TABLE `opencase_droppeditems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`),
  ADD KEY `bot_id` (`bot_id`),
  ADD KEY `fast` (`fast`);

--
-- Indexes for table `opencase_itemincase`
--
ALTER TABLE `opencase_itemincase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opencase_items`
--
ALTER TABLE `opencase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quality` (`quality`),
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `opencase_opencases`
--
ALTER TABLE `opencase_opencases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`case_id`,`item_id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `enable` (`enable`);

--
-- Indexes for table `promo_use`
--
ALTER TABLE `promo_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_id` (`promo_id`,`user_id`);

--
-- Indexes for table `rain`
--
ALTER TABLE `rain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rainlog`
--
ALTER TABLE `rainlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_user`
--
ALTER TABLE `referral_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrer_id` (`referrer_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banned` (`banned`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_field_index` (`user_id`,`user_field_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_fields_id` (`user_field_id`);

--
-- Indexes for table `user_fields`
--
ALTER TABLE `user_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`namepage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `crypto_withdrawals`
--
ALTER TABLE `crypto_withdrawals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fingerprints`
--
ALTER TABLE `fingerprints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nft_collections`
--
ALTER TABLE `nft_collections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nft_withdrawals`
--
ALTER TABLE `nft_withdrawals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nonces`
--
ALTER TABLE `nonces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `opencase_balancelog`
--
ALTER TABLE `opencase_balancelog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

--
-- AUTO_INCREMENT for table `opencase_battle`
--
ALTER TABLE `opencase_battle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `opencase_bot`
--
ALTER TABLE `opencase_bot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opencase_botevents`
--
ALTER TABLE `opencase_botevents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opencase_case`
--
ALTER TABLE `opencase_case`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `opencase_category`
--
ALTER TABLE `opencase_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opencase_deposite`
--
ALTER TABLE `opencase_deposite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `opencase_droppeditems`
--
ALTER TABLE `opencase_droppeditems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `opencase_itemincase`
--
ALTER TABLE `opencase_itemincase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `opencase_items`
--
ALTER TABLE `opencase_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15696;

--
-- AUTO_INCREMENT for table `opencase_opencases`
--
ALTER TABLE `opencase_opencases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo_use`
--
ALTER TABLE `promo_use`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rain`
--
ALTER TABLE `rain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rainlog`
--
ALTER TABLE `rainlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referral_user`
--
ALTER TABLE `referral_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;

--
-- AUTO_INCREMENT for table `user_fields`
--
ALTER TABLE `user_fields`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
