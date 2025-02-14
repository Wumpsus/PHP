-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 jun 2024 om 12:56
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekenmachine`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berekeningen`
--

CREATE TABLE `berekeningen` (
  `id` int(11) NOT NULL,
  `som` text NOT NULL,
  `nauwkeurigheid` int(11) NOT NULL,
  `antwoord` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `berekeningen`
--

INSERT INTO `berekeningen` (`id`, `som`, `nauwkeurigheid`, `antwoord`) VALUES
(90, '2+2', 0, 4),
(91, '2+3', 0, 5),
(92, '5-4', 0, 1),
(93, '4-5', 0, -1),
(94, '5/5', 0, 1),
(95, '5/2', 0, 3),
(96, '5/3', 2, 1.67),
(97, '5*2', 0, 10),
(98, '23432*234', 0, 5483090),
(99, '234098328%34', 0, 32),
(100, 'sqrt(3)', 0, 2),
(101, 'sqrt(234)', 2, 15.3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `berekeningen`
--
ALTER TABLE `berekeningen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `berekeningen`
--
ALTER TABLE `berekeningen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
