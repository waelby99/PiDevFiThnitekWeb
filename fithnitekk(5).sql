-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 01:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fithnitekk`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `num` int(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`id`, `nom`, `lieu`, `num`, `email`) VALUES
(2, 'Bh Assurance', 'Tunis', 96859155, 'waelbeenyoussef<àesprit.t'),
(3, 'Ami', 'Sokra', 71452896, 'rtrttrtt@yuy');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `commenraire` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `id_offrecov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bien`
--

CREATE TABLE `bien` (
  `id` int(11) NOT NULL,
  `lieud` varchar(50) NOT NULL,
  `lieua` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `num` varchar(12) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bien`
--

INSERT INTO `bien` (`id`, `lieud`, `lieua`, `dated`, `num`, `idUser`) VALUES
(4, 'fevze', 'y-gt\"rfety', '2023-05-18', '12121212', 55),
(5, 'Ariana', 'Ariana', '2023-05-25', '25262321', 55);

-- --------------------------------------------------------

--
-- Table structure for table `demandecovoiturage`
--

CREATE TABLE `demandecovoiturage` (
  `id` int(11) NOT NULL,
  `dateReservation` datetime NOT NULL,
  `nbPlace` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `offre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandecovoiturage`
--

INSERT INTO `demandecovoiturage` (`id`, `dateReservation`, `nbPlace`, `user_id`, `offre_id`) VALUES
(1, '2023-05-04 22:02:18', 5, 55, 3),
(2, '2023-05-12 22:36:52', 3, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `datefin` date DEFAULT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `nbparticipants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `lieu`, `date`, `datefin`, `titre`, `description`, `nbparticipants`) VALUES
(3, 'La Marsa', '2023-04-02', '2023-05-26', 'Mariage', 'Mariage entre X et YY', 15),
(4, 'nfgdhgn', '2022-11-01', '2023-04-27', 'AhmedMohsen', 'Ahmed moshen ahmed', 14),
(6, 'La Marsa', '1918-07-13', '2023-04-12', 'Mariage', 'Mariage entre X et Y', 4),
(7, 'La Marsa', '2023-02-02', '2023-04-27', 'Fete', 'Miaw', 6),
(20, 'likg;,s', '2023-02-01', '2023-04-27', 'Yasmine', 'El hammamet', 5),
(21, ',bklbkls,k', '2023-03-04', '2023-04-11', 'fbdbdb', 'gfbd', 8),
(37, 'aaaa', '2023-03-11', '2023-04-25', 'aaaa', '***er is welcome', 0),
(48, 'keeji', '2023-04-04', '2023-04-27', 'Qjnvinvri', 'dcdcezrfregzre', 0),
(49, 'Tunis', '2023-04-17', '2023-05-04', 'Aaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 10),
(50, 'bbbbb', '2023-04-26', '2023-04-24', 'Bbbbbbbbb', 'dfk,blgfkb,lk,blk,blkf,glk,dbslks', 19);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `dateDAssurance` date NOT NULL,
  `datePAssurance` date NOT NULL,
  `dateDVidange` date NOT NULL,
  `restekilometre` int(11) NOT NULL,
  `idVoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id_maintenance`, `matricule`, `dateDAssurance`, `datePAssurance`, `dateDVidange`, `restekilometre`, `idVoi`) VALUES
(24, '235689', '2022-03-02', '2023-03-02', '2023-03-01', 7415, 3);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:29:\\\"A new sponsor has been added.\\\";i:1;s:5:\\\"utf-8\\\";i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:29:\\\"waelbenyoussef19991@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:25:\\\"benyoussef.wael@esprit.tn\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:17:\\\"New sponsor added\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-28 04:46:01', '2023-04-28 04:46:01', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:29:\\\"A new sponsor has been added.\\\";i:1;s:5:\\\"utf-8\\\";i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:29:\\\"waelbenyoussef19991@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:25:\\\"benyoussef.wael@esprit.tn\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:17:\\\"New sponsor added\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-28 04:48:16', '2023-04-28 04:48:16', NULL),
(3, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;N;i:1;N;i:2;s:42:\\\"<p>Un nouveau sponsor a été ajouté.</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:29:\\\"waelbenyoussef19991@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:29:\\\"waelbenyoussef19991@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:23:\\\"Nouveau sponsor ajouté\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-28 06:42:37', '2023-04-28 06:42:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offrecovoiturage`
--

CREATE TABLE `offrecovoiturage` (
  `id` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `dateD` date NOT NULL,
  `lieuD` varchar(50) NOT NULL,
  `lieuA` varchar(50) NOT NULL,
  `dispo` varchar(20) NOT NULL,
  `nbPlace` int(20) NOT NULL,
  `numTel` int(12) NOT NULL,
  `distance` double NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offrecovoiturage`
--

INSERT INTO `offrecovoiturage` (`id`, `matricule`, `marque`, `dateD`, `lieuD`, `lieuA`, `dispo`, `nbPlace`, `numTel`, `distance`, `idUser`) VALUES
(3, '87485', 'mercedes', '2024-02-01', 'Ben Arous', 'Kairouan', 'non', 3, 454512, 1111, 55),
(4, '154TN7854', 'Peugeot', '2023-05-12', 'Aaaa', 'aaa', '1', 3, 96859155, 4521, 55);

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(30) NOT NULL,
  `question` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sondage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `type`, `sondage_id`) VALUES
(0, 'zezezezezeez ?', 'Text', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `intitule` varchar(25) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `idUser` int(11) NOT NULL,
  `image` varchar(2550) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id`, `intitule`, `contenu`, `idUser`, `image`, `date`) VALUES
(1, 'Aaaaaaa', 'wdxfdxdfxfdxfdxfdwfd', 55, 'images/attachments/covoiturage (1).jpg', '2023-05-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `relation1`
--

CREATE TABLE `relation1` (
  `id_relation` int(11) NOT NULL,
  `id_sponsor` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relation1`
--

INSERT INTO `relation1` (`id_relation`, `id_sponsor`, `id_evenement`) VALUES
(1, 1, 3),
(2, 1, 4),
(4, 1, 6),
(5, 1, 7),
(8, 2, 7),
(14, 2, 4),
(16, 12, 3),
(22, 2, 6),
(23, 12, 20),
(27, 15, 21),
(29, 2, 20),
(30, 2, 3),
(32, 1, 49),
(33, 1, 20),
(34, 1, 50),
(35, 30, 50),
(36, 30, 50),
(37, 30, 50),
(38, 30, 50),
(39, 32, 50),
(40, 1, 50),
(41, 30, 50),
(42, 27, 50),
(43, 27, 50),
(44, 27, 50),
(45, 1, 6),
(46, 32, 7),
(47, 30, 7),
(48, 27, 7),
(49, 30, 49);

-- --------------------------------------------------------

--
-- Table structure for table `réponses`
--

CREATE TABLE `réponses` (
  `réponses_id` int(11) NOT NULL,
  `réponse` varchar(50) NOT NULL,
  `Question_id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sondage`
--

CREATE TABLE `sondage` (
  `sondage_id` int(11) NOT NULL,
  `sujet` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sondage`
--

INSERT INTO `sondage` (`sondage_id`, `sujet`, `categorie`, `image`) VALUES
(1, 'Aaaaa', 'Bbb', 'frzfz');

-- --------------------------------------------------------

--
-- Table structure for table `sponsoring`
--

CREATE TABLE `sponsoring` (
  `id` int(11) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `montant` float NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `dateSignature` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsoring`
--

INSERT INTO `sponsoring` (`id`, `sponsor`, `montant`, `adresse`, `dateSignature`, `email`) VALUES
(1, 'Esprit', 7878, 'La goulette', '1968-01-01', 'waelbenyoussef@gmail.com'),
(2, 'Carrefour', 3, 'La marsa', '1970-01-01', 'benyoussef.wael@esprit.tn'),
(7, 'AbdouINC', 55, 'vfdvsfv', '2023-01-30', 'abdelwehedsouid@gmail.com'),
(10, 'nignlzjern', 4444, 'gieh', '2023-02-01', 'waelbenyoussef19991@gmail.com'),
(12, 'Molka', 150, 'Arienz soghra', '2023-02-27', 'molka.frikha@esprit.tn'),
(15, 'iytfvdzubhanji', 878787, 'aztfddeyt', '2023-01-31', 'jazzar.aziz@esprit.tn'),
(16, 'pppp', 845, 'La sokra', '2023-02-02', 'benyoussef.wae@esprit.tn'),
(25, 'aaaaaaaa', 455, 'dfvsdfv', '2023-03-04', 'aaa@aaa.Aa'),
(27, 'Baank', 8000, '6° Rue de la lavande', '2023-03-11', 'wael.benyoussef@gmail.com'),
(29, 'Esprit', 7878, 'azeert', '2023-04-13', 'huzce@agyg.com'),
(30, 'Facebook', 784, 'Usa, Merry Ville', '2023-04-20', 'facebook@facebook.fr'),
(31, 'Zdvzkel', 444, 'azeerty', '2023-04-24', 'Aaa@aa.aaa'),
(32, 'WaelInc', 451, 'wael le bg', '2023-04-26', 'wael@wael.Wael'),
(35, 'Wael', 55, 'azert', '2023-04-28', 'benyoussef.wael@esprit.tn'),
(36, 'Aaaa', 44, 'Aaaaa', '2023-04-28', 'waelbenyoussef19991@gmail.com'),
(37, 'Aaaaa', 55, 'Aaaaaaaa', '2023-04-28', 'benyoussef.wael@esprit.tn'),
(38, 'Aaaaa', 55, 'Aaaaaaaa', '2023-04-28', 'benyoussef.wael@esprit.tn'),
(39, 'Aaaaa', 55, 'Aaaaaaaa', '2023-04-28', 'benyoussef.wael@esprit.tn'),
(40, 'Twitter', 142, 'Usa,Washingthpm', '2023-04-28', 'benyoussef.wael@esprit.tn'),
(41, 'Abdouch', 458, 'Tunis', '2023-04-29', 'abdelwehedsouid@gmail.com'),
(42, 'Abdouch', 458, 'Tunis', '2023-04-29', 'abdelwehedsouid@gmail.com'),
(43, 'Abdouch', 458, 'Tunis', '2023-04-29', 'abdelwehedsouid@gmail.com'),
(44, 'Abdouch', 458, 'Tunis', '2023-04-29', 'abdelwehedsouid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext NOT NULL,
  `age` int(50) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `roles`, `age`, `reset_token`) VALUES
(54, 'admin', 'admin', 'admin@admin', '$2y$13$G1DQ3SdMbaLkyC6jiQ0pf.pln.6KQ2Ymv6ja29QfUMbCZsxm/wWOi', '[\"ROLE_ADMIN\"]', 0, ''),
(55, 'wael', 'wael', 'waelbenyoussef19991@gmail.Com', '$2y$13$bfeVwAPdhGvZleVbxtfVg.7oaKtW7rCZJsQsdjvOUXLchZqEDEvVm', '[\"ROLE_USER\"]', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `puissance` int(11) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `dateAssurance` date NOT NULL,
  `dateDVidange` date NOT NULL,
  `color` varchar(255) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idagence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `matricule`, `puissance`, `kilometrage`, `nbplaces`, `dateAssurance`, `dateDVidange`, `color`, `marque`, `idUser`, `idagence`) VALUES
(3, '124tn7894', 12, 2555, 3, '2023-05-01', '2023-05-02', 'blue', 'Mercedes', 55, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avis_user` (`idUser`),
  ADD KEY `fk_avis_offre` (`id_offrecov`);

--
-- Indexes for table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_bien` (`idUser`);

--
-- Indexes for table `demandecovoiturage`
--
ALTER TABLE `demandecovoiturage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_demande` (`user_id`),
  ADD KEY `fk_offre_demande` (`offre_id`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `offrecovoiturage`
--
ALTER TABLE `offrecovoiturage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_offre` (`idUser`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usr_event` (`id_event`),
  ADD KEY `fk_event_usr` (`id_usr`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_questions_sondage` (`sondage_id`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_reclamation` (`idUser`);

--
-- Indexes for table `relation1`
--
ALTER TABLE `relation1`
  ADD PRIMARY KEY (`id_relation`),
  ADD KEY `fk_evenement_sponsor1` (`id_evenement`),
  ADD KEY `evenement_fk_sponsonring2` (`id_sponsor`);

--
-- Indexes for table `réponses`
--
ALTER TABLE `réponses`
  ADD PRIMARY KEY (`réponses_id`),
  ADD KEY `fk_réponse_quest` (`Question_id`),
  ADD KEY `fk_rep_user` (`iduser`);

--
-- Indexes for table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`sondage_id`);

--
-- Indexes for table `sponsoring`
--
ALTER TABLE `sponsoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_verfication_user` (`idUser`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `fk_voitire` (`idagence`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bien`
--
ALTER TABLE `bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `demandecovoiturage`
--
ALTER TABLE `demandecovoiturage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offrecovoiturage`
--
ALTER TABLE `offrecovoiturage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relation1`
--
ALTER TABLE `relation1`
  MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `réponses`
--
ALTER TABLE `réponses`
  MODIFY `réponses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsoring`
--
ALTER TABLE `sponsoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_offre` FOREIGN KEY (`id_offrecov`) REFERENCES `offrecovoiturage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_avis_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `fk_user_bien` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demandecovoiturage`
--
ALTER TABLE `demandecovoiturage`
  ADD CONSTRAINT `fk_offre_demande` FOREIGN KEY (`offre_id`) REFERENCES `offrecovoiturage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_demande` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offrecovoiturage`
--
ALTER TABLE `offrecovoiturage`
  ADD CONSTRAINT `fk_user_offre` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `fk_event_usr` FOREIGN KEY (`id_usr`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usr_event` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_sondage` FOREIGN KEY (`sondage_id`) REFERENCES `sondage` (`sondage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_user_reclamation` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relation1`
--
ALTER TABLE `relation1`
  ADD CONSTRAINT `evenement_fk_sponsonring2` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_evenement_sponsor1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `réponses`
--
ALTER TABLE `réponses`
  ADD CONSTRAINT `fk_rep_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_réponse_quest` FOREIGN KEY (`Question_id`) REFERENCES `questions` (`Question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `fk_verfication_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voitire` FOREIGN KEY (`idagence`) REFERENCES `agence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
