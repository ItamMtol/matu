-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 09:40 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosma`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klientki`
--

CREATE TABLE `klientki` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `imie` varchar(500) DEFAULT NULL,
  `nazwisko` varchar(500) DEFAULT NULL,
  `login` varchar(500) NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `klientki`
--

INSERT INTO `klientki` (`id`, `email`, `imie`, `nazwisko`, `login`, `haslo`) VALUES
(1, 'ularere@rere.com', 'Ula', 'Klarna', 'ulakrula', 'a3UMQh5IkUGHM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kosmetyczki`
--

CREATE TABLE `kosmetyczki` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `specjalizacja` varchar(500) DEFAULT NULL,
  `imie` varchar(500) DEFAULT NULL,
  `nazwisko` varchar(500) DEFAULT NULL,
  `login` varchar(500) NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kosmetyczki`
--

INSERT INTO `kosmetyczki` (`id`, `email`, `specjalizacja`, `imie`, `nazwisko`, `login`, `haslo`) VALUES
(1, 'agorska@example.com', 'Paznokcie', 'Aneta', 'Górska', 'agórska', 'a3cZ36lIQ0m46'),
(2, 'emaciejewska@example.com', 'Pielęgnacja', 'Elżbieta', 'Maciejewska', 'emaciejewska', 'a3cZ36lIQ0m46'),
(3, 'kkisiel@example.com', 'Fryzjerstwo', 'Kamil', 'Kisiel', 'kkisiel', 'a3cZ36lIQ0m46'),
(4, 'kkisiel1@example.com', 'Pielęgnacja', 'Kamila', 'Kisiel', 'kkisiel1', 'a3cZ36lIQ0m46'),
(5, 'kkisiel2@example.com', 'Paznokcie', 'Karola', 'Kisiel', 'kkisiel2', 'a3cZ36lIQ0m46'),
(6, 'skaramba@example.com', 'Paznokcie', 'Stanisław', 'Karamba', 'skaramba', 'a3cZ36lIQ0m46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty`
--

CREATE TABLE `wizyty` (
  `id` int(11) NOT NULL,
  `id_zabiegu` int(11) DEFAULT NULL,
  `czas` datetime DEFAULT NULL,
  `id_kosmetyczki` int(11) DEFAULT NULL,
  `id_klienta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wizyty`
--

INSERT INTO `wizyty` (`id`, `id_zabiegu`, `czas`, `id_kosmetyczki`, `id_klienta`) VALUES
(1, 5, '2024-04-15 14:00:00', 5, 1),
(6, 1, '2024-04-19 14:28:00', 1, 1),
(7, 18, '2024-04-27 14:37:00', 6, 1),
(8, 1, '2024-04-16 10:14:00', 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zabiegi`
--

CREATE TABLE `zabiegi` (
  `id` int(11) NOT NULL,
  `nazwa_zabiegu` varchar(500) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `Specjalizacja` varchar(500) NOT NULL,
  `trwanie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zabiegi`
--

INSERT INTO `zabiegi` (`id`, `nazwa_zabiegu`, `opis`, `Specjalizacja`, `trwanie`) VALUES
(1, 'Manicure standardowy', 'Standardowy manicure obejmuje przycinanie i pielęgnację skórek oraz pomalowanie paznokci lakierem.', 'Paznokcie', 45),
(2, 'Manicure hybrydowy', 'Manicure hybrydowy to połączenie klasycznego manicure z użyciem lakieru hybrydowego, który utwardza się w lampie UV lub LED.', 'Paznokcie', 60),
(3, 'Manicure z ozdobami', 'Manicure z dodatkowymi ozdobami na paznokciach, takimi jak naklejki, kryształki itp.', 'Paznokcie', 90),
(4, 'Pedicure standardowy', 'Standardowy pedicure obejmuje kąpiel stóp, przycinanie paznokci, usuwanie zrogowaceń i nałożenie kremu.', 'Paznokcie', 60),
(5, 'Pedicure hybrydowy', 'Pedicure hybrydowy to połączenie klasycznego pedicure z użyciem lakieru hybrydowego, który utwardza się w lampie UV lub LED.', 'Paznokcie', 75),
(6, 'Pedicure z zabiegami pielęgnacyjnymi', 'Pedicure z dodatkowymi zabiegami pielęgnacyjnymi, takimi jak usuwanie odcisków, zrogowaceń, maska nawilżająca itp.', 'Paznokcie', 90),
(7, 'Zabieg na twarz klasyczny', 'Klasyczny zabieg na twarz obejmuje oczyszczanie, tonizowanie, peeling, masaż i maskę.', 'Pielęgnacja', 75),
(8, 'Zabiegi na twarz nawilżające, oczyszczające, przeciwstarzeniowe', 'Zabiegi na twarz dostosowane do potrzeb skóry klienta, takie jak nawilżające, oczyszczające, przeciwstarzeniowe itp.', 'Pielęgnacja', 90),
(9, 'Depilacja woskiem', 'Depilacja woskiem różnych obszarów ciała, takich jak nogi, bikini, pachy itp.', 'Pielęgnacja', 60),
(10, 'Depilacja laserowa', 'Depilacja laserowa różnych obszarów ciała, takich jak nogi, bikini, pachy itp.', 'Pielęgnacja', 60),
(11, 'Masaż relaksacyjny', 'Masaż relaksacyjny całego ciała, który pomaga odprężyć się i zrelaksować.', 'Pielęgnacja', 60),
(12, 'Masaż sportowy lub głęboko relaksacyjny', 'Intensywny masaż dla osób aktywnych fizycznie lub dla tych, którzy potrzebują głębokiego rozluźnienia mięśni.', 'Pielęgnacja', 90),
(13, 'Strzyżenie', 'Strzyżenie włosów z dopasowaniem do indywidualnych preferencji klienta.', 'Fryzjerstwo', 60),
(14, 'Koloryzacja lub farbowanie', 'Koloryzacja lub farbowanie włosów w wybranym kolorze.', 'Fryzjerstwo', 180),
(15, 'Trwała ondulacja lub prostowanie', 'Trwała ondulacja lub prostowanie włosów, aby uzyskać pożądany efekt.', 'Fryzjerstwo', 180),
(16, 'Pakiet relaksacyjny', 'Pakiet relaksacyjny obejmuje manicure, pedicure oraz masaż całego ciała.', 'Pakiety', 150),
(17, 'Pakiet zabiegów na twarz', 'Pakiet zabiegów na twarz obejmuje zabiegi oczyszczające i nawilżające.', 'Pakiety', 120),
(18, 'Pakiet wiosenny', 'Pakiet wiosenny obejmuje strzyżenie, koloryzację oraz manicure.', 'Pakiety', 180);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klientki`
--
ALTER TABLE `klientki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kosmetyczki`
--
ALTER TABLE `kosmetyczki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kosmetyczki` (`id_kosmetyczki`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_zabiegu` (`id_zabiegu`);

--
-- Indeksy dla tabeli `zabiegi`
--
ALTER TABLE `zabiegi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klientki`
--
ALTER TABLE `klientki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kosmetyczki`
--
ALTER TABLE `kosmetyczki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wizyty`
--
ALTER TABLE `wizyty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zabiegi`
--
ALTER TABLE `zabiegi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wizyty`
--
ALTER TABLE `wizyty`
  ADD CONSTRAINT `wizyty_ibfk_1` FOREIGN KEY (`id_kosmetyczki`) REFERENCES `kosmetyczki` (`id`),
  ADD CONSTRAINT `wizyty_ibfk_2` FOREIGN KEY (`id_klienta`) REFERENCES `klientki` (`id`),
  ADD CONSTRAINT `wizyty_ibfk_3` FOREIGN KEY (`id_zabiegu`) REFERENCES `zabiegi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
