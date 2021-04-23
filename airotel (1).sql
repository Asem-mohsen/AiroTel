-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 04:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'airotel', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `name`) VALUES
(1, 'cairo airport'),
(2, 'alex airpoet'),
(6, 'Hurgada Airport'),
(7, 'United Kingdom'),
(8, 'NewYork Airport'),
(9, 'Luxor airport'),
(10, 'asem airport'),
(11, 'nada airport'),
(12, 'mayar airport');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `image`) VALUES
(19, 'France', 'France_0.jpg'),
(21, 'USA', 'usa.jpg'),
(22, 'Lebanon', 'lebanon.jpg'),
(23, 'Spain', 'spain.jpg'),
(25, 'United Kingdom', 'UK.jpg'),
(26, 'Indonesia', 'idonesia.jpg'),
(27, 'japan', 'japan.jpg'),
(28, 'Australia', 'australia1.jpg'),
(29, 'Egypt', 'egy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `rate`) VALUES
(3, 'mayar', 'mayaroweys2000@gmail.com', 'very good'),
(5, 'asem', 'mrlonly@hoe.com', 'GREAT '),
(7, 'asem', 'mrlonely@hoe.com', 'بسم الله ماشاء الله اللهم بارك');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `countid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `image`, `countid`) VALUES
(1, 'foursession', 'download.jpg', 29),
(26, 'Malia Hotel', 'Malia.jpg', 26),
(27, 'Eka Hotel', 'eka.jpg', 22),
(28, 'Biuret Hotel', 'download.jpg', 22),
(30, 'Lorial Hotel', 'Lorial.jpg', 28),
(32, 'lazordi Hotel', 'lazordi.jpg', 19),
(33, 'Le merdian', 'Le merdian.jpg', 19),
(34, 'Hilton', 'Hilton.jpg', 29),
(35, 'Shirton', 'Shirton.jpg', 29),
(36, 'Asem Resourt', 'Asem.jpg', 23),
(37, 'Sopa Hotel', 'Sopa.jpg', 23),
(38, 'Mayar Hotel', 'Mayar.jpg', 28),
(39, 'Royal Hotel', 'Royal.jpg', 21),
(40, 'Kolian', 'Kolian.jpg', 27),
(41, 'Nepton', 'Nepton.jpg', 19),
(42, 'Losanglos Resourt', 'Losanglos.jpg', 21),
(43, 'Terialp Hotel', 'Terialp.jpg', 27),
(44, 'beyonce hotel', 'beyonce.jpg', 22),
(45, 'habel', 'Terialp.jpg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `airid` int(11) NOT NULL,
  `room` varchar(55) NOT NULL,
  `class` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `userid`, `hotelid`, `airid`, `room`, `class`) VALUES
(18, 21, 1, 8, 'Single', 'Economic'),
(21, 15, 30, 9, 'Single', 'class');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`) VALUES
(5, 'mayaar', 'mayaroweys2000@gmail.com', '246', 2147483647),
(15, 'asem', 'mrlonely@hoe.com', '1111', 1152992719),
(21, 'ahmed', 'ahmedxarafat0101@gmail.com', '123', 1013769931),
(28, 'nada', 'nada@yahoo.com', '123', 1122635523);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countid` (`countid`),
  ADD KEY `countid_2` (`countid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hotelid` (`hotelid`),
  ADD KEY `airid` (`airid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`countid`) REFERENCES `country` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`airid`) REFERENCES `airport` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`hotelid`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
