-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 07:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienttb`
--

CREATE TABLE `clienttb` (
  `clientId` int(11) NOT NULL,
  `clientName` varchar(60) NOT NULL,
  `clientEmail` varchar(60) NOT NULL,
  `clientPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttb`
--

INSERT INTO `clienttb` (`clientId`, `clientName`, `clientEmail`, `clientPhone`) VALUES
(1, 'Ednaldo Pereira', 'ednaldopereira123@gmail.com', '(83) 92508-8162'),
(2, 'Dorivaldo Benegripe', 'dorivaldobenegripe2022@gmail.com', '(11) 96656-6696');

-- --------------------------------------------------------

--
-- Table structure for table `messagetb`
--

CREATE TABLE `messagetb` (
  `messageId` int(11) NOT NULL,
  `clientEmail` varchar(60) NOT NULL,
  `clientMessage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagetb`
--

INSERT INTO `messagetb` (`messageId`, `clientEmail`, `clientMessage`) VALUES
(1, 'ednaldopereira123@gmail.com', 'Poderiam adicionar mais produtos! Valeu!'),
(2, 'dorivaldobenegripe2022@gmail.com', 'Achei o lugar interessante, mas acho que vocês poderiam aumentar o número de serviços.');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `productId` int(11) NOT NULL,
  `productDesc` varchar(80) NOT NULL,
  `productName` varchar(40) NOT NULL,
  `productImg` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`productId`, `productDesc`, `productName`, `productImg`) VALUES
(1, 'Um gel que dispensa o uso de toalhas quentes antes do barbear', 'Shaving', 'Shaving.jpg'),
(2, '3 Pomadas, 1 Pó modelador, 1 Grooming e 1 Shaving', 'Kit Monster', 'Kit Monstro Barbearia.jpg'),
(3, 'Fixador capilar para penteados', 'Grooming', 'Grooming.jpg'),
(4, 'Pomada capilar/barba de 50g. Possui toque seco e efeito mate', 'Pomada', 'Pomada.jpg'),
(5, 'Deixa a barba e o cabelo hidratados com um brilho incrível', 'Condicionador', 'Condicionador.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `scheduletb`
--

CREATE TABLE `scheduletb` (
  `scheduleId` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleHour` time NOT NULL,
  `clientId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduletb`
--

INSERT INTO `scheduletb` (`scheduleId`, `scheduleDate`, `scheduleHour`, `clientId`, `serviceId`) VALUES
(1, '2022-07-14', '15:00:00', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `servicetb`
--

CREATE TABLE `servicetb` (
  `serviceId` int(11) NOT NULL,
  `serviceDesc` varchar(80) NOT NULL,
  `serviceName` varchar(40) NOT NULL,
  `serviceImg` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicetb`
--

INSERT INTO `servicetb` (`serviceId`, `serviceDesc`, `serviceName`, `serviceImg`) VALUES
(1, 'Possuímos muitas variações de cortes', 'Corte de cabelo', 'Corte de cabelo.jpg'),
(2, 'Reparação e cortes na sobrancelha', 'Sobrancelha na navalha', 'Sobrancelha na navalha.jpg'),
(3, 'Somos profissionais em aparar barba', 'Aparar Barba', 'Cortando barba.jpg'),
(4, 'Hidratamos tanto barba quanto cabelo', 'Hidratação', 'Hidratação.jpg'),
(5, 'Pintamos e estilizamos seu visual', 'Pintar cabelo/barba/sobrancelha', 'Pintando cabelo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `userId` int(11) NOT NULL,
  `userLogin` varchar(40) NOT NULL,
  `userPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`userId`, `userLogin`, `userPassword`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienttb`
--
ALTER TABLE `clienttb`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `messagetb`
--
ALTER TABLE `messagetb`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `scheduletb`
--
ALTER TABLE `scheduletb`
  ADD PRIMARY KEY (`scheduleId`);

--
-- Indexes for table `servicetb`
--
ALTER TABLE `servicetb`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienttb`
--
ALTER TABLE `clienttb`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messagetb`
--
ALTER TABLE `messagetb`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scheduletb`
--
ALTER TABLE `scheduletb`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicetb`
--
ALTER TABLE `servicetb`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
