-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 09:34 PM
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
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'sunnygkp10@gmail.com', '123456'),
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5bb5377264a67', '5bb5377292f5a'),
('5bb53772d2425', '5bb53772dc320'),
('5bb5377319cc1', '5bb5377319f38'),
('5bb5377372362', '5bb537737b70f'),
('5bb53773b0999', '5bb53773e18c8'),
('5bb5377433d12', '5bb5377433f72'),
('5bb537746303c', '5bb537747097a'),
('5bb53774a0760', '5bb53774a993a'),
('5bb53774d9678', '5bb53774e2848'),
('5bb538d0716f8', '5bb538d085113'),
('5bb538d0d0050', '5bb538d0dd742'),
('5bb538d15b471', '5bb538d15b6fc'),
('5bb538d18eb49', '5bb538d199c2c'),
('5bb538d1d29e1', '5bb538d1eed05'),
('5bb53af9edcbf', '5bb53afa14d81'),
('5bb53afa9e059', '5bb53afab3ddc'),
('5bb53afb4f610', '5bb53afb4f8a7'),
('5bb53afbb85be', '5bb53afbc7eb8'),
('5bb53afc24088', '5bb53afc39de0'),
('5bb53f3ba4b95', '5bb53f3bb8a5d'),
('5bb53f3c1f862', '5bb53f3c28e07'),
('5bb53f3c609ce', '5bb53f3c6e4a4'),
('5bb53f3cbe155', '5bb53f3cc7cc0'),
('5bb53f3d15e45', '5bb53f3d41ef3'),
('5bb6612d43efa', '5bb6612e6c284'),
('5bb6612f192ff', '5bb6612f41d9f'),
('5bb6612f8dc93', '5bb6612f9b543'),
('5bb6612ff1149', '5bb66130083d6'),
('5bb66130625da', '5bb66130731a3'),
('5bb6655fe4b49', '5bb665604b693'),
('5bb66560936f8', '5bb66560a233b'),
('5bb66560dca79', '5bb66560e8bb1'),
('5bb6656131a9b', '5bb665613f5b1'),
('5bb66561c18d8', '5bb66561d1b4f'),
('5bb669503bb79', '5bb6695050bb6'),
('5bb6695098165', '5bb66950a1779'),
('5bb66950d10b5', '5bb66950da786'),
('5bb6695136531', '5bb66951403a3'),
('5bb66951b5ce6', '5bb66951c20d3'),
('5bb68471aa0ee', '5bb68471c5e52'),
('5bb6847236032', '5bb68472683ad'),
('5bb684729a4e0', '5bb68472a3f1e'),
('5bb684731c5bc', '5bb684731c8e8'),
('5bb684734bb05', '5bb684735556a'),
('5bb686ff07dca', '5bb686ff1e681'),
('5bb686ff6760a', '5bb686ff896b2'),
('5bb686ffe5a04', '5bb686ffef115'),
('5bb687006a104', '5bb6870073b02'),
('5bb68700b0968', '5bb68700c563a'),
('5bb73fdc0d451', '5bb73fdc389fd'),
('5bb73fdc98e2b', '5bb73fdca2621'),
('5bb73fdcd1e63', '5bb73fdcdb58a'),
('5bb73fdd1edf1', '5bb73fdd28543'),
('5bb73fdd5a4b7', '5bb73fdd640be'),
('5bb740dc92329', '5bb740dcae3a0'),
('5bb740dd5b580', '5bb740dd6eefe'),
('5bb740dda6347', '5bb740ddcf789'),
('5bb740de0a5bd', '5bb740de1908a'),
('5bb740de4b790', '5bb740de54b50'),
('5bb741ddca0cb', '5bb741dde458d'),
('5bb741de35a47', '5bb741de3ede0'),
('5bb741de95caa', '5bb741dea2236'),
('5bb741df0cefe', '5bb741df1f231'),
('5bb741df742ef', '5bb741df8705a'),
('5bb74311d0803', '5bb74311dd084'),
('5bb7431234e24', '5bb743123e462'),
('5bb743126b28c', '5bb7431274836'),
('5bb74312ad605', '5bb74312b71cd'),
('5bb74312e6576', '5bb74312f0136'),
('5bfe8c98da68c', '5bfe8c98e9042'),
('5bfe8c993da4d', '5bfe8c9945eef'),
('5bfe8c99740b7', '5bfe8c9985d74'),
('5bfe8c99afb54', '5bfe8c99b7969'),
('5bfe8c99eb58e', '5bfe8c99f33be');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('5bb525e35fbd0', 'Adrian Arendain', 'adriangambearendain1234@gmail.com', 'Thesis', 'This is awesome.', '2018-10-03', '10:26:11pm'),
('5bb670517fc11', 'Accelle Bueno', 'accellebueno@gmail.com', 'Awesomeness!', 'Good Job!', '2018-10-04', '09:56:01pm'),
('5bb6722963bba', 'asd', 'asd@yahoo.com', 'asd', 'asd', '2018-10-04', '10:03:53pm'),
('5bb7bcc5ae02c', 'John Luis Talavera', 'johnbhurnconmigo@gmail.com', 'Thesis', 'meow', '2018-10-05', '09:34:29pm'),
('5bfc065b59ca3', 'val', 'asdasd@yahoo.com', 'error', 'asdassdasdasdasd', '2018-11-26', '03:42:35pm'),
('5bfd6f68e57ef', 'Ron Edward Buentipo', 'ronedwardbuentipo@yahoo.com', 'Error', 'tol may error sa ganyan', '2018-11-27', '05:23:04pm'),
('5bfe8a5e6dd3e', 'Sir Joshua', 'asd@yahoo.com', 'error', 'may error ', '2018-11-28', '01:30:22pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('johnbhurnconmigo@gmail.com', '5bb53a6c03af1', 10, 5, 5, 0, '2018-10-03 22:00:30'),
('johnbhurnconmigo@gmail.com', '5bb53eb3daa59', 10, 5, 5, 0, '2018-10-03 22:15:05'),
('accellebueno@gmail.com', '5bb664ee4195f', 7, 5, 4, 1, '2018-10-04 19:49:06'),
('accellebueno@gmail.com', '5bb53eb3daa59', 7, 5, 4, 1, '2018-10-04 19:49:28'),
('accellebueno@gmail.com', '5bb53a6c03af1', 7, 5, 4, 1, '2018-10-04 19:49:45'),
('johnluistalavera@gmail.com', '5bb664ee4195f', 4, 5, 3, 2, '2018-10-04 19:50:17'),
('johnluistalavera@gmail.com', '5bb53eb3daa59', 4, 5, 3, 2, '2018-10-04 19:51:41'),
('johnluistalavera@gmail.com', '5bb53a6c03af1', 4, 5, 3, 2, '2018-10-04 19:51:59'),
('domzluistro@gmail.com', '5bb664ee4195f', 1, 5, 2, 3, '2018-10-04 19:53:18'),
('domzluistro@gmail.com', '5bb53eb3daa59', 1, 5, 2, 3, '2018-10-04 19:53:31'),
('domzluistro@gmail.com', '5bb53a6c03af1', 4, 5, 3, 2, '2018-10-04 19:53:45'),
('johnbhurnconmigo@gmail.com', '5bb664ee4195f', 10, 5, 5, 0, '2018-10-04 19:54:27'),
('johnbhurnconmigo@gmail.com', '5bb74223cb310', 10, 5, 5, 0, '2018-10-05 19:19:21'),
('johnbhurnconmigo@gmail.com', '5bb741200183b', 10, 5, 5, 0, '2018-10-05 19:22:10'),
('johnbhurnconmigo@gmail.com', '5bb740039a337', 10, 5, 5, 0, '2018-10-05 19:22:36'),
('johnbhurnconmigo@gmail.com', '5bb73f0c11b9f', 10, 5, 5, 0, '2018-10-05 19:23:45'),
('johnbhurnconmigo@gmail.com', '5bb6869547d83', 10, 5, 5, 0, '2018-10-05 19:29:33'),
('johnbhurnconmigo@gmail.com', '5bb683dcd3fdf', 10, 5, 5, 0, '2018-10-05 19:30:02'),
('ronedwardbuentipo@yahoo.com', '5bb74223cb310', 10, 5, 5, 0, '2018-11-27 16:23:59'),
('johnbhurn@yahoo.com', '5bb74223cb310', 10, 5, 5, 0, '2018-11-27 21:01:50'),
('ronedwardbuentipo@yahoo.com', '5bb53a6c03af1', 4, 5, 3, 2, '2018-11-28 12:22:52'),
('ronedwardbuentipo@yahoo.com', '5bb664ee4195f', 1, 5, 2, 3, '2018-11-28 12:25:48'),
('admin@admin.com', '5bfe8c45ec315', -1, 5, 2, 3, '2018-11-28 12:40:14'),
('mlesterdampios@gmail.com1', '5bfe8c45ec315', -1, 5, 2, 3, '2019-03-02 10:36:52'),
('mlesterdampios1@gmail.com', 'xxx', 10, 0, 0, 0, '2019-03-07 16:12:56'),
('mlesterdampios99@gmail.com', 'xxx', 80, 0, 0, 0, '2019-03-07 15:51:55'),
('mlesterdampios80@gmail.com', 'xxx', 80, 0, 0, 0, '2019-03-07 15:52:16'),
('mlesterdampios20@gmail.com', 'xxx', 20, 0, 0, 0, '2019-03-07 15:52:54'),
('', '5bb53a6c03af1', -4, 0, 0, 4, '2019-03-09 20:19:16'),
('', '5bb740039a337', -5, 1, 0, 5, '2019-03-09 19:31:06'),
('', '5bb74223cb310', -5, 1, 0, 5, '2019-03-09 19:31:38'),
('', '5bfe8c45ec315', -5, 1, 0, 5, '2019-03-09 19:31:30'),
('', '5bb683dcd3fdf', -4, 1, 0, 4, '2019-03-09 19:31:57'),
('', '5bb73f0c11b9f', -5, 1, 0, 5, '2019-03-09 19:32:08'),
('mlesterdampios@gmail.com', '5bb53a6c03af1', 2, 4, 4, 2, '2019-03-09 19:58:47'),
('mlesterdampios@gmail.com', '5bb53eb3daa59', 4, 5, 6, 2, '2019-03-09 20:00:27'),
('lasttest@last.com', '5bb53a6c03af1', 5, 4, 6, 1, '2019-03-09 20:28:49'),
('lasttest@last.com', '5bb53eb3daa59', -2, 5, 2, 4, '2019-03-09 20:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5bb5377264a67', 'JosÃ© Protacio Rizal Mercado y Alonso Realonda', '5bb5377292f5a'),
('5bb5377264a67', 'Dr. Jose Pedro Alonso Realonda Mercado Rizal', '5bb5377292f67'),
('5bb5377264a67', 'Dr. Josito Alonso Realonda Mercado Rizal', '5bb5377292f73'),
('5bb5377264a67', 'Dr. Jose Protacio Alonso Realonda Mercado Rizal', '5bb5377292f78'),
('5bb53772d2425', 'June 19, 1861', '5bb53772dc320'),
('5bb53772d2425', 'July 19, 1861', '5bb53772dc332'),
('5bb53772d2425', 'May 19, 1861', '5bb53772dc338'),
('5bb53772d2425', 'June 18, 1961', '5bb53772dc33c'),
('5bb5377319cc1', 'Karl Ulmer', '5bb5377319f38'),
('5bb5377319cc1', 'Dr. Ferdinand Blumettritt', '5bb5377319f42'),
('5bb5377319cc1', 'Dr. Jagor  ', '5bb5377319f46'),
('5bb5377319cc1', 'Dr. Reinhold Rost', '5bb5377319f49'),
('5bb5377372362', 'Segunda Katigbak', '5bb537737b70f'),
('5bb5377372362', 'Getrude Beckett', '5bb537737b71e'),
('5bb5377372362', 'Leonor Rivera  ', '5bb537737b721'),
('5bb5377372362', 'Leonor Gonzalez', '5bb537737b724'),
('5bb53773b0999', 'Michiko San  ', '5bb53773e18b6'),
('5bb53773b0999', 'Seiko Usui', '5bb53773e18c8'),
('5bb53773b0999', 'Sai-San Han', '5bb53773e18cd'),
('5bb53773b0999', 'Karlo San', '5bb53773e18d2'),
('5bb5377433d12', 'Hudio', '5bb5377433f5e'),
('5bb5377433d12', 'Alferez  ', '5bb5377433f6c'),
('5bb5377433d12', 'Indio', '5bb5377433f72'),
('5bb5377433d12', 'Penoy', '5bb5377433f77'),
('5bb537746303c', 'Dr. Ferdinand Blumettritt', '5bb537747097a'),
('5bb537746303c', 'Dr. Jagor  ', '5bb5377470989'),
('5bb537746303c', 'Dr. Reinhold Host', '5bb537747098c'),
('5bb537746303c', 'Dr. Bech', '5bb537747098f'),
('5bb53774a0760', 'Lt. Pedro Guerrero', '5bb53774a992b'),
('5bb53774a0760', 'Lt. Jose Taviel de Andrada', '5bb53774a993a'),
('5bb53774a0760', 'Lt. Manuel de la Paz  ', '5bb53774a993d'),
('5bb53774a0760', 'Lt. Jose Paterno De Gonzalez', '5bb53774a9941'),
('5bb53774d9678', 'Do not detain me', '5bb53774e2832'),
('5bb53774d9678', 'Touch me not', '5bb53774e2848'),
('5bb53774d9678', 'Leave me alone', '5bb53774e2852'),
('5bb53774d9678', 'Do not tango with me', '5bb53774e285b'),
('5bb538d0716f8', 'JosÃ© Protacio Rizal Mercado y Alonso Realonda', '5bb538d085113'),
('5bb538d0716f8', 'Dr. Jose Pedro Alonso Realonda Mercado Rizal', '5bb538d08515e'),
('5bb538d0716f8', 'Dr. Josito Alonso Realonda Mercado Rizal', '5bb538d085164'),
('5bb538d0716f8', 'Dr. Jose Protacio Alonso Realonda Mercado Rizal', '5bb538d085169'),
('5bb538d0d0050', 'June 19, 1861', '5bb538d0dd742'),
('5bb538d0d0050', 'July 19, 1861', '5bb538d0dd754'),
('5bb538d0d0050', 'May 19, 1861', '5bb538d0dd759'),
('5bb538d0d0050', 'June 18, 1961', '5bb538d0dd75d'),
('5bb538d15b471', 'Karl Ulmer', '5bb538d15b6fc'),
('5bb538d15b471', 'Dr. Ferdinand Blumettritt', '5bb538d15b706'),
('5bb538d15b471', 'Dr. Jagor  ', '5bb538d15b70a'),
('5bb538d15b471', 'Dr. Reinhold Rost', '5bb538d15b70d'),
('5bb538d18eb49', 'Segunda Katigbak', '5bb538d199c2c'),
('5bb538d18eb49', 'Getrude Beckett', '5bb538d199c3c'),
('5bb538d18eb49', 'Leonor Rivera  ', '5bb538d199c3f'),
('5bb538d18eb49', 'Leonor Gonzalez', '5bb538d199c42'),
('5bb538d1d29e1', 'Seiko Usui', '5bb538d1eed05'),
('5bb538d1d29e1', 'Michiko San  ', '5bb538d1eed18'),
('5bb538d1d29e1', 'Sai-San Han', '5bb538d1eed1f'),
('5bb538d1d29e1', 'Karlo San', '5bb538d1eed24'),
('5bb53af9edcbf', 'JosÃ© Protacio Rizal Mercado y Alonso Realonda', '5bb53afa14d72'),
('5bb53af9edcbf', 'Dr. Jose Pedro Alonso Realonda Mercado Rizal', '5bb53afa14d81'),
('5bb53af9edcbf', 'Dr. Josito Alonso Realonda Mercado Rizal', '5bb53afa14d84'),
('5bb53af9edcbf', 'Dr. Jose Protacio Alonso Realonda Mercado Rizal', '5bb53afa14d87'),
('5bb53afa9e059', 'June 19, 1861', '5bb53afab3ddc'),
('5bb53afa9e059', 'July 19, 1861', '5bb53afab3df6'),
('5bb53afa9e059', 'May 19, 1861', '5bb53afab3e07'),
('5bb53afa9e059', 'June 18, 1961', '5bb53afab3e16'),
('5bb53afb4f610', 'Karl Ulmer', '5bb53afb4f8a7'),
('5bb53afb4f610', 'Dr. Ferdinand Blumettritt', '5bb53afb4f8b3'),
('5bb53afb4f610', 'Dr. Jagor  ', '5bb53afb4f8b9'),
('5bb53afb4f610', 'Dr. Reinhold Rost', '5bb53afb4f8bd'),
('5bb53afbb85be', 'Segunda Katigbak', '5bb53afbc7eb8'),
('5bb53afbb85be', 'Getrude Beckett', '5bb53afbc7ed3'),
('5bb53afbb85be', 'Leonor Rivera  ', '5bb53afbc7ee3'),
('5bb53afbb85be', 'Leonor Gonzalez', '5bb53afbc7eec'),
('5bb53afc24088', 'Seiko Usui', '5bb53afc39de0'),
('5bb53afc24088', 'Michiko San  ', '5bb53afc39dfa'),
('5bb53afc24088', 'Sai-San Han', '5bb53afc39e0b'),
('5bb53afc24088', 'Karlo San', '5bb53afc39e1b'),
('5bb53f3ba4b95', 'November 30, 1863', '5bb53f3bb8a5d'),
('5bb53f3ba4b95', 'November 29, 1863', '5bb53f3bb8a6c'),
('5bb53f3ba4b95', 'November 30, 1864', '5bb53f3bb8a6f'),
('5bb53f3ba4b95', 'November 28, 1863', '5bb53f3bb8a72'),
('5bb53f3c1f862', 'tuba (alcoholic drink)', '5bb53f3c28e07'),
('5bb53f3c1f862', 'Named after the Spanish explorer \"Tutuban\"', '5bb53f3c28e15'),
('5bb53f3c1f862', 'tubo (sugar cane)', '5bb53f3c28e19'),
('5bb53f3c1f862', 'Intramuros (the walled city - contains a lot of Churches)', '5bb53f3c28e1b'),
('5bb53f3c609ce', '3', '5bb53f3c6e4a4'),
('5bb53f3c609ce', '6', '5bb53f3c6e4b7'),
('5bb53f3c609ce', '5', '5bb53f3c6e4c2'),
('5bb53f3c609ce', '4', '5bb53f3c6e4c7'),
('5bb53f3cbe155', '1881', '5bb53f3cc7cc0'),
('5bb53f3cbe155', '1882', '5bb53f3cc7cd1'),
('5bb53f3cbe155', '1880', '5bb53f3cc7cd6'),
('5bb53f3cbe155', '1779', '5bb53f3cc7cda'),
('5bb53f3d15e45', 'J.M. Fleming & Company', '5bb53f3d41ef3'),
('5bb53f3d15e45', 'Carlos Fressel & Company', '5bb53f3d41f05'),
('5bb53f3d15e45', 'Manila Railway Company', '5bb53f3d41f0b'),
('5bb53f3d15e45', 'Sta. Mesa Company', '5bb53f3d41f1f'),
('5bb6612d43efa', 'March 16, 1521', '5bb6612e6c284'),
('5bb6612d43efa', 'March 17, 1523', '5bb6612e6c296'),
('5bb6612d43efa', 'March 15, 1522', '5bb6612e6c29c'),
('5bb6612d43efa', 'March 18, 1520', '5bb6612e6c2a1'),
('5bb6612f192ff', 'Prince Philip of Spain', '5bb6612f41d9f'),
('5bb6612f192ff', 'King Philip of Spain', '5bb6612f41db0'),
('5bb6612f192ff', 'Prince Filip of Spain', '5bb6612f41db5'),
('5bb6612f192ff', 'King Filip of Spain', '5bb6612f41dba'),
('5bb6612f8dc93', '7', '5bb6612f9b543'),
('5bb6612f8dc93', '8', '5bb6612f9b557'),
('5bb6612f8dc93', '6', '5bb6612f9b55c'),
('5bb6612f8dc93', '5', '5bb6612f9b561'),
('5bb6612ff1149', 'Roman Catholic', '5bb66130083d6'),
('5bb6612ff1149', 'Islam', '5bb66130083f0'),
('5bb6612ff1149', 'Judaism', '5bb66130083f7'),
('5bb6612ff1149', 'Sikhism', '5bb6613008400'),
('5bb66130625da', 'True', '5bb66130731a3'),
('5bb66130625da', 'False', '5bb66130731bb'),
('5bb66130625da', 'Maybe', '5bb66130731ca'),
('5bb66130625da', 'None of the above', '5bb66130731da'),
('5bb6655fe4b49', 'March 16, 1521', '5bb665604b693'),
('5bb6655fe4b49', 'March 17, 1523', '5bb665604b6a6'),
('5bb6655fe4b49', 'March 15, 1522', '5bb665604b6b8'),
('5bb6655fe4b49', 'March 18, 1520', '5bb665604b6be'),
('5bb66560936f8', 'Prince Philip of Spain', '5bb66560a233b'),
('5bb66560936f8', 'King Philip of Spain', '5bb66560a234a'),
('5bb66560936f8', 'Prince Filipof Spain', '5bb66560a234d'),
('5bb66560936f8', 'King Filip of Spain', '5bb66560a2350'),
('5bb66560dca79', '7', '5bb66560e8bb1'),
('5bb66560dca79', '8', '5bb66560e8bc3'),
('5bb66560dca79', '5', '5bb66560e8bc8'),
('5bb66560dca79', '6', '5bb66560e8bcc'),
('5bb6656131a9b', 'Roman Catholic', '5bb665613f5b1'),
('5bb6656131a9b', 'Islam', '5bb665613f5c4'),
('5bb6656131a9b', 'Judaism', '5bb665613f5c9'),
('5bb6656131a9b', 'Sikhism', '5bb665613f5cd'),
('5bb66561c18d8', 'True', '5bb66561d1b4f'),
('5bb66561c18d8', 'False', '5bb66561d1b66'),
('5bb66561c18d8', 'Maybe', '5bb66561d1b76'),
('5bb66561c18d8', 'None of the above', '5bb66561d1b7d'),
('5bb669503bb79', 'In Barrio Talaga, Tanauan, Batangas', '5bb6695050bb6'),
('5bb669503bb79', 'In Barrio Talaga, Nasugbu, Batangas', '5bb6695050bc9'),
('5bb669503bb79', 'In Barrio Talaga, Catalagan, Batangas', '5bb6695050bcf'),
('5bb669503bb79', 'In Barrio Talaga, Taal Basilica, Batangas', '5bb6695050bd3'),
('5bb6695098165', 'Second', '5bb66950a1779'),
('5bb6695098165', 'Third', '5bb66950a178c'),
('5bb6695098165', 'Fourth', '5bb66950a179a'),
('5bb6695098165', 'Fifth', '5bb66950a17a9'),
('5bb66950d10b5', '1895 ', '5bb66950da786'),
('5bb66950d10b5', '1895 ', '5bb66950da798'),
('5bb66950d10b5', '1897 ', '5bb66950da79e'),
('5bb66950d10b5', '1898', '5bb66950da7aa'),
('5bb6695136531', 'In September 1892', '5bb66951403a3'),
('5bb6695136531', 'In October 1893', '5bb66951403b4'),
('5bb6695136531', 'In November 1894', '5bb66951403ba'),
('5bb6695136531', 'In December 1895', '5bb66951403bf'),
('5bb66951b5ce6', 'July 23, 1864', '5bb66951c20d3'),
('5bb66951b5ce6', 'July 24, 1865', '5bb66951c20f2'),
('5bb66951b5ce6', 'July 25, 1866', '5bb66951c20f8'),
('5bb66951b5ce6', 'July 26, 1867', '5bb66951c20fd'),
('5bb68471aa0ee', 'July 23, 1864', '5bb68471c5e52'),
('5bb68471aa0ee', 'July 24, 1865', '5bb68471c5e65'),
('5bb68471aa0ee', 'July 25, 1866', '5bb68471c5e68'),
('5bb68471aa0ee', 'July 26, 1867', '5bb68471c5e6b'),
('5bb6847236032', 'In Barrio Talaga, Tanauan, Batangas', '5bb68472683ad'),
('5bb6847236032', 'In Barrio Talaga, Nasugbu, Batangas', '5bb68472683c0'),
('5bb6847236032', 'In Barrio Talaga, Catalagan, Batangas', '5bb68472683c6'),
('5bb6847236032', 'In Barrio Talaga, Taal Basilica, Batangas', '5bb68472683ca'),
('5bb684729a4e0', 'Second', '5bb68472a3f1e'),
('5bb684729a4e0', 'Third', '5bb68472a3f2f'),
('5bb684729a4e0', 'Fourth', '5bb68472a3f35'),
('5bb684729a4e0', 'Fifth', '5bb68472a3f39'),
('5bb684731c5bc', '1895 ', '5bb684731c8e8'),
('5bb684731c5bc', '1896 ', '5bb684731c8f4'),
('5bb684731c5bc', '1897 ', '5bb684731c8f9'),
('5bb684731c5bc', '1898', '5bb684731c8fd'),
('5bb684734bb05', 'In September 1892', '5bb684735556a'),
('5bb684734bb05', 'In October 1893', '5bb684735557d'),
('5bb684734bb05', 'In November 1894', '5bb6847355582'),
('5bb684734bb05', 'In December 1895', '5bb684735558e'),
('5bb686ff07dca', 'Marcelo Hilario del Pilar y GatmaitÃ¡n', '5bb686ff1e681'),
('5bb686ff07dca', 'Marcelo Hilario del Pilar y Gamacho', '5bb686ff1e692'),
('5bb686ff07dca', 'Marcelo Hilario del Pilar y Jaena', '5bb686ff1e697'),
('5bb686ff07dca', 'Marcelo Hilario del Pilar y Lopez', '5bb686ff1e69d'),
('5bb686ff6760a', 'August 30, 1850 ', '5bb686ff896b2'),
('5bb686ff6760a', 'September 1, 1851 ', '5bb686ff896c0'),
('5bb686ff6760a', 'October 2, 1852', '5bb686ff896c4'),
('5bb686ff6760a', 'November 3, 1853', '5bb686ff896c7'),
('5bb686ffe5a04', 'July 4, 1896', '5bb686ffef115'),
('5bb686ffe5a04', 'August 5, 1897', '5bb686ffef127'),
('5bb686ffe5a04', 'September 6, 1898', '5bb686ffef12c'),
('5bb686ffe5a04', 'October 7, 1899', '5bb686ffef131'),
('5bb687006a104', 'Bulakan, Bulacan. ', '5bb6870073b02'),
('5bb687006a104', 'Plaridel, Bulacan', '5bb6870073b11'),
('5bb687006a104', 'Guiguinto, Bulacan', '5bb6870073b14'),
('5bb687006a104', 'Malolos, Bulacan', '5bb6870073b17'),
('5bb68700b0968', '1869 ', '5bb68700c563a'),
('5bb68700b0968', '1868', '5bb68700c564d'),
('5bb68700b0968', '1867 ', '5bb68700c5653'),
('5bb68700b0968', '1866 ', '5bb68700c5658'),
('5bb73fdc0d451', 'Muhammad Dipatuan Kudarat', '5bb73fdc389fd'),
('5bb73fdc0d451', 'Lapu-Lapu', '5bb73fdc38a0e'),
('5bb73fdc0d451', 'Jose Rizal', '5bb73fdc38a13'),
('5bb73fdc0d451', 'Melchora Aquino', '5bb73fdc38a18'),
('5bb73fdc98e2b', 'Master', '5bb73fdca2621'),
('5bb73fdc98e2b', 'Slave', '5bb73fdca2633'),
('5bb73fdc98e2b', 'King', '5bb73fdca2638'),
('5bb73fdc98e2b', 'Brother', '5bb73fdca263c'),
('5bb73fdcd1e63', 'Kapitan Laut Buisan ', '5bb73fdcdb58a'),
('5bb73fdcd1e63', 'Santiago Bonifacio', '5bb73fdcdb598'),
('5bb73fdcd1e63', 'Carlos Aguinaldo', '5bb73fdcdb59b'),
('5bb73fdcd1e63', 'Francisco Mercado', '5bb73fdcdb59e'),
('5bb73fdd1edf1', 'Cebu', '5bb73fdd28543'),
('5bb73fdd1edf1', 'Bohol', '5bb73fdd28551'),
('5bb73fdd1edf1', 'Cavite', '5bb73fdd28555'),
('5bb73fdd1edf1', 'Manila', '5bb73fdd28558'),
('5bb73fdd5a4b7', 'Mindanao (1581)', '5bb73fdd640be'),
('5bb73fdd5a4b7', 'Manila (1660)', '5bb73fdd640cc'),
('5bb73fdd5a4b7', 'Cavite  (1790)', '5bb73fdd640cf'),
('5bb73fdd5a4b7', 'Visayas (1500', '5bb73fdd640d2'),
('5bb740dc92329', 'Juan Luna y Novicio', '5bb740dcae3a0'),
('5bb740dc92329', 'Juan Luna Conmigo', '5bb740dcae3b2'),
('5bb740dc92329', 'Juan Luna y Bueno', '5bb740dcae3b7'),
('5bb740dc92329', 'Juan Luna y Luistro', '5bb740dcae3bb'),
('5bb740dd5b580', 'October 23, 1857', '5bb740dd6eefe'),
('5bb740dd5b580', 'November 17, 1875', '5bb740dd6ef19'),
('5bb740dd5b580', 'April 27, 1857', '5bb740dd6ef2a'),
('5bb740dd5b580', 'December 25, 1857', '5bb740dd6ef3b'),
('5bb740dda6347', 'Spoliarium', '5bb740ddcf789'),
('5bb740dda6347', 'Mona Lisa', '5bb740ddcf7a5'),
('5bb740dda6347', 'Venus De Milo', '5bb740ddcf7b2'),
('5bb740dda6347', 'The Old Guitaris', '5bb740ddcf7be'),
('5bb740de0a5bd', 'Maria de la Paz Pardo de Tavera', '5bb740de1908a'),
('5bb740de0a5bd', 'Gabriela Silang', '5bb740de1909b'),
('5bb740de0a5bd', 'Melchora Aquino', '5bb740de190a1'),
('5bb740de0a5bd', 'Gloria Diaz', '5bb740de190a6'),
('5bb740de4b790', 'Antonio Luna', '5bb740de54b50'),
('5bb740de4b790', 'Bargas Luna', '5bb740de54b6a'),
('5bb740de4b790', 'Gregory Luna', '5bb740de54b7a'),
('5bb740de4b790', 'Agapito Luna', '5bb740de54b80'),
('5bb741ddca0cb', 'Elder Sora', '5bb741dde458d'),
('5bb741ddca0cb', 'Maria Sora', '5bb741dde459f'),
('5bb741ddca0cb', 'Gabriela Sora', '5bb741dde45a4'),
('5bb741ddca0cb', 'Marisel Sora', '5bb741dde45a9'),
('5bb741de35a47', 'Melchora Aquino de Ramos', '5bb741de3ede0'),
('5bb741de35a47', 'Jamaica Sotto', '5bb741de3edee'),
('5bb741de35a47', 'Gabriela Ramos', '5bb741de3edf1'),
('5bb741de35a47', 'Margaret luna', '5bb741de3edf4'),
('5bb741de95caa', 'Medical Assistance', '5bb741dea2236'),
('5bb741de95caa', 'Singing', '5bb741dea2247'),
('5bb741de95caa', 'Dancing', '5bb741dea224c'),
('5bb741de95caa', 'Painting', '5bb741dea2251'),
('5bb741df0cefe', '2 March, 1919', '5bb741df1f231'),
('5bb741df0cefe', '5 May, 1900', '5bb741df1f242'),
('5bb741df0cefe', '7 December 1580', '5bb741df1f251'),
('5bb741df0cefe', '7 December 1580', '5bb741df1f255'),
('5bb741df742ef', 'Melchora Aquino de Ramos', '5bb741df8705a'),
('5bb741df742ef', 'Melchora Aquino Banderado', '5bb741df8706b'),
('5bb741df742ef', 'Melchora Aquino Delgado', '5bb741df87070'),
('5bb741df742ef', 'Melchora Aquino Conmigo', '5bb741df87075'),
('5bb74311d0803', '28', '5bb74311dd084'),
('5bb74311d0803', '40', '5bb74311dd09e'),
('5bb74311d0803', '30', '5bb74311dd0ae'),
('5bb74311d0803', '10', '5bb74311dd0bf'),
('5bb7431234e24', 'September 20, 1763 ', '5bb743123e462'),
('5bb7431234e24', 'March, 1763 ', '5bb743123e47d'),
('5bb7431234e24', 'December 20, 1763 ', '5bb743123e48b'),
('5bb7431234e24', 'Novemberr 20, 1763', '5bb743123e490'),
('5bb743126b28c', 'Diego Silang', '5bb7431274836'),
('5bb743126b28c', 'Dejusco Silang', '5bb7431274850'),
('5bb743126b28c', 'Gregorio Silang', '5bb7431274855'),
('5bb743126b28c', 'Protacio Silang', '5bb743127485a'),
('5bb74312ad605', 'MarÃ­a Josefa Gabriela CariÃ±o de Silang', '5bb74312b71cd'),
('5bb74312ad605', 'Melchora Aquino de Ramos', '5bb74312b71dd'),
('5bb74312ad605', 'Narsisa H. del Pilar', '5bb74312b71e0'),
('5bb74312ad605', 'Jessie Mabini', '5bb74312b71e3'),
('5bb74312e6576', 'Gabriela Silang', '5bb74312f0136'),
('5bb74312e6576', 'Jose Rizal', '5bb74312f0143'),
('5bb74312e6576', 'Marcos Alvarez', '5bb74312f0146'),
('5bb74312e6576', 'None of the above', '5bb74312f014a'),
('5bfe8c98da68c', 'as', '5bfe8c98e9042'),
('5bfe8c98da68c', 'sd', '5bfe8c98e9050'),
('5bfe8c98da68c', 'fdf', '5bfe8c98e9053'),
('5bfe8c98da68c', 'qwe', '5bfe8c98e9056'),
('5bfe8c993da4d', '', '5bfe8c9945eef'),
('5bfe8c993da4d', '', '5bfe8c9945efc'),
('5bfe8c993da4d', '', '5bfe8c9945f00'),
('5bfe8c993da4d', '', '5bfe8c9945f03'),
('5bfe8c99740b7', '', '5bfe8c9985d74'),
('5bfe8c99740b7', '', '5bfe8c9985d82'),
('5bfe8c99740b7', '', '5bfe8c9985d86'),
('5bfe8c99740b7', '', '5bfe8c9985d88'),
('5bfe8c99afb54', '', '5bfe8c99b7969'),
('5bfe8c99afb54', '', '5bfe8c99b7978'),
('5bfe8c99afb54', '', '5bfe8c99b797b'),
('5bfe8c99afb54', '', '5bfe8c99b797e'),
('5bfe8c99eb58e', '', '5bfe8c99f33be'),
('5bfe8c99eb58e', '', '5bfe8c99f33d0'),
('5bfe8c99eb58e', '', '5bfe8c99f33e5'),
('5bfe8c99eb58e', '', '5bfe8c99f33ea');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5bb5362a452a0', '5bb5377264a67', 'What is the complete legal name of Dr. Jose Rizal?', 4, 1),
('5bb5362a452a0', '5bb53772d2425', 'When is the birth anniversary of Dr. Jose Rizal?', 4, 2),
('5bb5362a452a0', '5bb5377372362', 'At 16, Rizal experienced his first romance. He fell in love with which girl?', 4, 4),
('5bb5362a452a0', '5bb53773b0999', 'What is the real name of O-Sei-San?', 4, 5),
('5bb5362a452a0', '5bb537746303c', 'He was an Austrian and he became the best friend of Dr. Jose Rizal. Who was he?', 4, 7),
('5bb5362a452a0', '5bb53774a0760', 'Governor General Terrero assigned a bodyguard to Rizal. And between them, a wonderful friendship blossomed. Who was this bodyguard?', 4, 8),
('5bb5362a452a0', '5bb53774d9678', '\"Noli me tangere\" is a Latin phrase. What does it mean?', 4, 9),
('5bb53842cfe73', '5bb538d0716f8', 'What is the complete legal name of Dr. Jose Rizal?', 4, 1),
('5bb53842cfe73', '5bb538d0d0050', 'When is the birth anniversary of Dr. Jose Rizal?', 4, 2),
('5bb53842cfe73', '5bb538d18eb49', 'At 16, Rizal experienced his first romance. He fell in love with which girl?', 4, 4),
('5bb53842cfe73', '5bb538d1d29e1', 'What is the real name of O-Sei-San?', 4, 5),
('5bb53a6c03af1', '5bb53af9edcbf', 'What is the complete legal name of Dr. Jose Rizal?', 4, 1),
('5bb53a6c03af1', '5bb53afa9e059', 'When is the birth anniversary of Dr. Jose Rizal?', 4, 2),
('5bb53a6c03af1', '5bb53afbb85be', 'At 16, Rizal experienced his first romance. He fell in love with which girl?', 4, 4),
('5bb53a6c03af1', '5bb53afc24088', 'What is the real name of O-Sei-San?', 4, 5),
('5bb53eb3daa59', '5bb53f3ba4b95', 'When was Andres Bonifacio born?', 4, 1),
('5bb53eb3daa59', '5bb53f3c1f862', 'Andres Bonifacio was born in Tutuban, Tondo. Where did Tutuban get its name from?', 4, 2),
('5bb53eb3daa59', '5bb53f3c609ce', 'How many siblings did he have?', 4, 3),
('5bb53eb3daa59', '5bb53f3cbe155', 'When did his mother die?', 4, 4),
('5bb53eb3daa59', '5bb53f3d15e45', 'Under what company did he work for as a clerk and later on an agent?', 4, 5),
('5bb6607ee02bc', '5bb6612d43efa', 'When was the Philippines founded?', 4, 1),
('5bb6607ee02bc', '5bb6612f192ff', 'The Philippines was name after?', 4, 2),
('5bb6607ee02bc', '5bb6612f8dc93', 'How many siblings did Emilio Aguinaldo have?', 4, 3),
('5bb6607ee02bc', '5bb6612ff1149', 'Which religion did Emilio Aguinaldo practice?', 4, 4),
('5bb6607ee02bc', '5bb66130625da', 'Emilio Aguinaldo was elected President of the Philippines on May 24, 1899.', 4, 5),
('5bb664ee4195f', '5bb6655fe4b49', 'When was the Philippines founded?', 4, 1),
('5bb664ee4195f', '5bb66560936f8', 'The Philippines was name after?', 4, 2),
('5bb664ee4195f', '5bb66560dca79', 'How many siblings did Emilio Aguinaldo have?', 4, 3),
('5bb664ee4195f', '5bb6656131a9b', 'Which religion did Emilio Aguinaldo practice?', 4, 4),
('5bb664ee4195f', '5bb66561c18d8', 'Emilio Aguinaldo was elected President of the Philippines on May 24, 1899.', 4, 5),
('5bb668a5d9d1e', '5bb669503bb79', 'He was born', 4, 1),
('5bb668a5d9d1e', '5bb6695098165', 'He is the _____ of the eight sons of Inocencio Mabini and Dionisia Maranan', 4, 2),
('5bb668a5d9d1e', '5bb66950d10b5', 'He completed his law studies at the University of Santo Tomas and in _____ he was admitted to the bar.', 4, 3),
('5bb668a5d9d1e', '5bb6695136531', 'When did Mabini joined the Masonry and in the following year joined the revived La Liga Filipina and the Cuerpo de Compromisarios, which were formed to extend support to the Reform Movement ', 4, 4),
('5bb668a5d9d1e', '5bb66951b5ce6', 'He was born on', 4, 5),
('5bb683dcd3fdf', '5bb68471aa0ee', 'He was born on', 4, 1),
('5bb683dcd3fdf', '5bb6847236032', 'He was born at', 4, 2),
('5bb683dcd3fdf', '5bb684729a4e0', 'He is the _____ of the eight sons of Inocencio Mabini and Dionisia Maranan', 4, 3),
('5bb683dcd3fdf', '5bb684734bb05', 'When did Mabini joined the Masonry and in the following year joined the revived La Liga Filipina and the Cuerpo de Compromisarios, which were formed to extend support to the Reform Movement ', 4, 5),
('5bb6869547d83', '5bb686ff07dca', 'What is the whole name of Marcelo H. Del Pilar?', 4, 1),
('5bb6869547d83', '5bb686ff6760a', 'When did he born?', 4, 2),
('5bb6869547d83', '5bb686ffe5a04', 'When did he died?', 4, 3),
('5bb6869547d83', '5bb687006a104', 'Del Pilar was born and brought up in ', 4, 4),
('5bb6869547d83', '5bb68700b0968', 'He was suspended at the University of Santo Tomas and jailed in ____ after he and the parish priest quarrelled over exorbitant baptismal fees.\r\n', 4, 5),
('5bb73f0c11b9f', '5bb73fdc0d451', 'He successfully fought off Spanish invasions and hindered the spread of Roman Catholicism in the island of Mindanao in 1619 to 1671.', 4, 1),
('5bb73f0c11b9f', '5bb73fdc98e2b', 'The word \"Dipatuan\" is Malay in origin and means.', 4, 2),
('5bb73f0c11b9f', '5bb73fdcd1e63', 'Who is the father of Muhammad Dipatuan Kudarat?', 4, 3),
('5bb73f0c11b9f', '5bb73fdd1edf1', 'Where did Muhammad Dipatuan kudarat go when they suffer from war?', 4, 4),
('5bb73f0c11b9f', '5bb73fdd5a4b7', 'Where and When Did Muhammad Dipatuan Kudarat lived?', 4, 5),
('5bb740039a337', '5bb740dc92329', 'What is the fullname of Juan Luna?', 4, 1),
('5bb740039a337', '5bb740dd5b580', 'When did Juan Luna  born?', 4, 2),
('5bb740039a337', '5bb740dda6347', 'On what art did Juan Luna became famous?', 4, 3),
('5bb740039a337', '5bb740de0a5bd', 'The woman that Juan Luna married.', 4, 4),
('5bb740039a337', '5bb740de4b790', 'The brother of Juan Luna, and he is also known as a hero.', 4, 5),
('5bb741200183b', '5bb741ddca0cb', 'What is the stage name of Melchora Aquino?', 4, 1),
('5bb741200183b', '5bb741de35a47', 'She was the daughter of a peasant couple, Juan and Valentina Aquino.', 4, 2),
('5bb741200183b', '5bb741de95caa', 'What did Melchora contribute in the Katipunan?', 4, 3),
('5bb741200183b', '5bb741df0cefe', 'When is the last breath of Melchora  Aquino?', 4, 4),
('5bb741200183b', '5bb741df742ef', 'The real name of Melchora Aquino.', 4, 5),
('5bb74223cb310', '5bb74311d0803', 'How many descendants did Gabriela Silang have?', 4, 1),
('5bb74223cb310', '5bb7431234e24', 'When did Gabriela Silang captured?', 4, 2),
('5bb74223cb310', '5bb743126b28c', 'Who is the husband of Gabriela Silang?', 4, 3),
('5bb74223cb310', '5bb74312ad605', 'The true name of Gabriela Silang.', 4, 4),
('5bb74223cb310', '5bb74312e6576', 'The provincial hospital of Ilocos Sur was named by the famous ________ ______', 4, 5),
('5bfe8c45ec315', '5bfe8c98da68c', 'sino ang pumatay kay lapu lapu?', 4, 1),
('5bfe8c45ec315', '5bfe8c993da4d', '', 4, 2),
('5bfe8c45ec315', '5bfe8c99740b7', '', 4, 3),
('5bfe8c45ec315', '5bfe8c99afb54', '', 4, 4),
('5bfe8c45ec315', '5bfe8c99eb58e', '', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5bb53a6c03af1', 'Jose Rizal', 2, 1, 5, 5, 'Joze Rizal', '', '2018-10-03 21:53:48'),
('5bb53eb3daa59', 'Andres Bonifacio', 2, 1, 5, 5, 'Andres Bonifacio', 'Andres', '2018-10-03 22:12:03'),
('5bb664ee4195f', 'Emilio Aguinaldo', 2, 1, 5, 5, 'Emilio Aguinaldo', 'Emilio', '2018-10-04 19:07:26'),
('5bb683dcd3fdf', 'Apolinario Mabini', 2, 1, 5, 5, 'Apolinario Mabini', 'Apolinario', '2018-10-04 21:19:24'),
('5bb6869547d83', 'Marcelo H. Del Pilar', 2, 1, 5, 5, 'Marcelo H. Del Pilar', 'Marcelo', '2018-10-04 21:31:01'),
('5bb73f0c11b9f', 'Muhammad Dipatuan Kudarat', 2, 1, 5, 5, 'Muhammad Dipatuan Kudarat', 'Muhammad', '2018-10-05 10:38:04'),
('5bb740039a337', 'Juan Luna', 2, 1, 5, 5, 'Juan Luna', 'Juan', '2018-10-05 10:42:11'),
('5bb741200183b', 'Melchora Aquino', 2, 1, 5, 5, 'Melchora Aquino', 'Melchora', '2018-10-05 10:46:56'),
('5bb74223cb310', 'Gabriela Silang', 2, 1, 5, 5, 'Gabriela Silang', 'Gabriela', '2018-10-05 10:51:15'),
('5bfe8c45ec315', 'Cvsu', 1, 1, 5, 10, 'test in cvsu', 'Cvsu', '2018-11-28 12:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('johnbhurnconmigo@gmail.com', 90, '2018-10-05 19:30:02'),
('accellebueno@gmail.com', 21, '2018-10-04 19:49:46'),
('johnluistalavera@gmail.com', 12, '2018-10-04 19:51:59'),
('domzluistro@gmail.com', 6, '2018-10-04 19:53:45'),
('ronedwardbuentipo@yahoo.com', 15, '2018-11-28 12:25:48'),
('johnbhurn@yahoo.com', 10, '2018-11-27 21:01:50'),
('mlesterdampios@gmail.com1', -1, '2019-03-02 10:36:52'),
('mlesterdampios@gmail.com', 3, '2019-03-09 20:00:27'),
('mlesterdampios80@gmail.com', 80, '2019-03-07 15:52:16'),
('mlesterdampios1@gmail.com', 20, '2019-03-07 16:12:56'),
('', -53, '2019-03-09 20:19:16'),
('lasttest@last.com', 3, '2019-03-09 20:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons`
--

CREATE TABLE `tbl_lessons` (
  `id` int(11) NOT NULL,
  `lesson_title` varchar(100) DEFAULT NULL,
  `pdf_link` varchar(200) DEFAULT NULL,
  `video_link` varchar(200) DEFAULT NULL,
  `body` varchar(2000) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lessons`
--

INSERT INTO `tbl_lessons` (`id`, `lesson_title`, `pdf_link`, `video_link`, `body`, `region`, `isDeleted`) VALUES
(1, 'my cousin', 'MarkLesterDampios.pdf', 'small.mp4', '<p>eto list ng mga may pake:</p><p><ul><li>mark</li><li>lester</li><li>dampios</li></ul><p><b>Hello,</b></p><p>dear <u>mark lester.</u></p><h1><u>bla bla</u><span style=\"font-weight: normal;\">&nbsp;a<i>aa</i></span></h1><hr id=\"null\">thanks!</p>', 'right next room', 0),
(2, '1st lesson', 'MarkLesterDampios.pdf', NULL, '<p>hello world <span style=\"font-weight: normal;\">hello world</span></p><h1><span style=\"font-weight: normal;\">1st lesson</span></h1><h2><span style=\"font-weight: normal;\">sub lesson</span></h2><p><span style=\"font-weight: normal;\"><i style=\"text-decoration-line: underline;\">mark </i>lester <i style=\"\">d</i></span></p><p><span style=\"font-weight: normal;\"><i style=\"\"><strike>del</strike></i></span></p>', 'Region 6 (Western Visayas)', 0),
(3, '2nd lessons', '', 'small.mp4', '<p>tyest</p><p><u>awdawd</u></p><p><ul><li><u>awd</u></li><li><u>dadad</u></li><li><u>ddd</u></li></ul></p>', 'Region 6 (Western Visayas)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Accelle Bueno', 'M', 'CvSU Bacoor', 'accellebueno@gmail.com', 9212132123, 'ef03af7a519a6008347dbff993443733'),
('Adrian Arendain', 'M', 'CvSU Bacoor', 'adriangambearendain1234@gmail.com', 9263003879, '106da407bea60dc4115d29ceb887c752'),
('Ai', 'F', '4-2', 'ai@yahoo.com', 9264009876, 'd205ea32521df3b956706d5c1aadd741'),
('Asdasd', 'M', 'asdasd', 'asdasd@yahoo.com', 9263003879, 'a8f5f167f44f4964e6c998dee827110c'),
('Domz Luistro', 'M', 'CvSU Bacoor', 'domzluistro@gmail.com', 9434354345, '28b0a6bab68c50a34cbe7357ffbcfb3c'),
('John Burn Delgado', 'M', '4-2', 'johnbhurn@yahoo.com', 9354431268, 'b41cb62ec6767f2e41f9df7a2d161515'),
('John Bhurn Conmigo', 'M', 'CvSU Bacoor', 'johnbhurnconmigo@gmail.com', 9121231213, 'e10adc3949ba59abbe56e057f20f883e'),
('John Luis Talavera', 'M', 'CvSU Bacoor', 'johnluistalavera@gmail.com', 9343453435, 'ee4cbc815089a9533aedf0107bae210d'),
('lasttest', 'M', 'lasttest-II', 'lasttest@last.com', 0, '609e039c90cd9f7af0f7483735089053'),
('Mark Lester', 'M', 'section-1', 'mlesterdampios2@gmail.com', 9354635971, 'e10adc3949ba59abbe56e057f20f883e'),
('ml', 'M', 'section-3', 'mlesterdampios33@gmail.com', 9354635971, 'e10adc3949ba59abbe56e057f20f883e'),
('Mark', 'M', 'section-1', 'mlesterdampios@gmail.com', 9354635971, 'e10adc3949ba59abbe56e057f20f883e'),
('Mark2', 'M', 'section-1', 'mlesterdampios@gmail.com1', 1, '827ccb0eea8a706c4c34a16891f84e7b'),
('Mark Lester', 'M', 'section-1', 'mlesterdampios@gmail.com33', 9354635971, 'e10adc3949ba59abbe56e057f20f883e'),
('mark lester test', 'M', 'AAA', 'mlestertest@gmail.com', 922, 'e10adc3949ba59abbe56e057f20f883e'),
('Ron Edward', 'M', '4-2', 'ronedwardbuentipo@yahoo.com', 9091234567, '1f6d6c769347e1ca1dd56bc71da70f28'),
('User', 'M', 'cimt', 'user@user.com', 11, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
