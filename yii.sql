-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 03:04 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojai`
--

CREATE TABLE `darbuotojai` (
  `id` int(11) NOT NULL,
  `vardas` varchar(30) NOT NULL,
  `pavarde` varchar(30) NOT NULL,
  `pareigos` varchar(40) NOT NULL,
  `telefonas` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `stazas` int(11) NOT NULL,
  `lygis` int(11) NOT NULL,
  `inviter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `darbuotojai`
--

INSERT INTO `darbuotojai` (`id`, `vardas`, `pavarde`, `pareigos`, `telefonas`, `email`, `stazas`, `lygis`, `inviter`) VALUES
(1, 'RootUseris', 'Rooteris', 'Inzinierius', '+37063790400', 'rooteris@aaa.com', 2, 1000, NULL),
(2, 'Petras', 'Petraitis', 'InzinieriusSpec', '+370644445', 'petriukas@petras.labas', 2, 5000, 1),
(3, 'Antanas', 'Antanaitis', 'Programuotojas', '+370644445', 'Antanaitis@one.lt', 2, 2, 1),
(4, 'Paul', 'Gasol', 'ProPlayer', '+3706444455', 'ktu@edu.lt', 2, 2000, 2),
(5, 'Mykolas', 'Jonusas', 'Mokinys', '+3706444454', 'test@test.test', 2, 2, 4),
(6, 'Linas', 'Apolskis', 'PHPDeveloper', '+37063794090', 'apolskis.linas@gmail.com', 2, 10, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `darbuotojai`
--
ALTER TABLE `darbuotojai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darbuotojai`
--
ALTER TABLE `darbuotojai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
