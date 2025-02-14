-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 02:18 AM
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
-- Database: `ziekmeldingen`
--

-- --------------------------------------------------------

--
-- Table structure for table `ziekmeldingen`
--

CREATE TABLE `ziekmeldingen` (
  `id` int(11) NOT NULL,
  `docent` varchar(255) NOT NULL,
  `reden` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ziekmeldingen`
--

INSERT INTO `ziekmeldingen` (`id`, `docent`, `reden`, `datum`) VALUES
(1, 'Dhr. Wigmans', 'Te laat', '27-01-2024'),
(2, 'Dhr. Davelaar', 'In elkaar geslagen', '25-04-2024'),
(3, 'Dhr. Van Helden', 'Kon ChatGPT niet meer in', '26-02-2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ziekmeldingen`
--
ALTER TABLE `ziekmeldingen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ziekmeldingen`
--
ALTER TABLE `ziekmeldingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
