-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 05:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vliegendpaard`
--
CREATE DATABASE IF NOT EXISTS `vliegendpaard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vliegendpaard`;

-- --------------------------------------------------------

--
-- Table structure for table `aanbiedingen`
--

CREATE TABLE `aanbiedingen` (
  `ID` int(255) NOT NULL,
  `Aanbiedings_type` varchar(45) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aanbiedingen`
--

INSERT INTO `aanbiedingen` (`ID`, `Aanbiedings_type`, `Prijs`) VALUES
(1, 'broodjeHamburgerdsfsfd', '1.55'),
(2, 'mis', '0.00'),
(3, 'Shotjeee', '1.00'),
(4, 'Shotjeeee', '1.50'),
(5, 'Shotjeeeee', '1.00'),
(6, 'Shotjeeeeee', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `Evenement_id` int(255) NOT NULL,
  `Evenement_naam` varchar(45) NOT NULL,
  `Evenement_type` varchar(45) NOT NULL,
  `Max_aantal_mensen` int(4) NOT NULL,
  `Evenement_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`Evenement_id`, `Evenement_naam`, `Evenement_type`, `Max_aantal_mensen`, `Evenement_datum`) VALUES
(1, 'Bierpong donderdag', 'Bierpong', 30, '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `inschrijving_evenement`
--

CREATE TABLE `inschrijving_evenement` (
  `ID` int(255) NOT NULL,
  `Evenement_naam` varchar(45) NOT NULL,
  `Minimum_leeftijd` date NOT NULL,
  `Entree_prijs` int(6) NOT NULL,
  `Evenement_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inschrijving_evenement`
--

INSERT INTO `inschrijving_evenement` (`ID`, `Evenement_naam`, `Minimum_leeftijd`, `Entree_prijs`, `Evenement_datum`) VALUES
(1, 'Bierpong donderdag', '2000-12-18', 5, '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` int(255) NOT NULL,
  `u_ID` int(255) NOT NULL,
  `a_ID` int(255) NOT NULL,
  `aanbieding` varchar(45) NOT NULL,
  `hoeveelheid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `u_ID`, `a_ID`, `aanbieding`, `hoeveelheid`) VALUES
(74, 8, 1, 'Shotje', 1),
(80, 8, 5, 'Shotjeeeee', 1),
(84, 8, 4, 'Shotjeeee', 1),
(86, 8, 2, 'Shotjee', 1),
(87, 8, 6, 'Shotjeeeeee', 3),
(88, 8, 3, 'Shotjeee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `page_id`, `name`, `content`, `rating`, `submit_date`) VALUES
(15, 1, 'Marten', 'Werkt perfect!!!', 5, '2021-03-22 20:20:06'),
(16, 1, 'Test', 'yess', 4, '2021-03-22 20:20:21'),
(17, 1, 'Collin', 'Erg mooi, maar kan toch beter.', 4, '2021-03-24 16:59:59'),
(18, 1, 'Jarno', 'Niet mooi!', 1, '2021-03-24 17:02:18'),
(19, 1, 'Collin', 'Testje', 1, '2021-03-24 17:02:34'),
(20, 1, 'testje', 'nog een keer', 4, '2021-03-24 17:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `rollen`
--

CREATE TABLE `rollen` (
  `ID` int(255) NOT NULL,
  `rol` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rollen`
--

INSERT INTO `rollen` (`ID`, `rol`) VALUES
(1, 'Beheerder'),
(2, 'Gast'),
(3, 'Stagiair'),
(4, 'Medewerker');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `Voornaam` varchar(35) NOT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `School` varchar(30) NOT NULL,
  `Telefoonnummer` varchar(12) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `wachtwoord` longtext NOT NULL,
  `rol` varchar(35) NOT NULL,
  `Date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Voornaam`, `Achternaam`, `Email`, `School`, `Telefoonnummer`, `Geboortedatum`, `wachtwoord`, `rol`, `Date_time`) VALUES
(1, 'test', 'achtertest', 'test@test.test', 'Windesheim', '0612345678', '1999-12-18', 'test123', 'Stagiar', '2020-12-29 16:41:13'),
(2, 'balzaka', 'achteruserasdadsad', 'user@user.user', 'Nog2', '061234567812', '2020-12-03', 'user123', 'Beheerder', '2020-12-29 16:41:13'),
(3, 'aa', 'ba', 'a@a.nla', 'Windesheima', '12312122', '2021-01-13', '$2y$10$Dqgiiqw/jet3x.UnlGTq4.ozgsOhEx36X.k2OQ', 'Stagiair', '2021-01-03 19:16:20'),
(4, 'ee', 'ee', 'ee@ee.ee', 'Nog1', '123', '1999-12-28', '$2y$10$jBgIBPu8sVMtJCnaeAmLEuYwYb9iHxjl7JFZVNFe8wxD2a1FLAXf2', 'Stagiar', '2021-01-03 20:19:44'),
(5, 'b', 'b', 'b@b.b', 'Windesheim', '123', '2021-01-20', '$2y$10$Dk0hnw3mQAFPZ1IevYS2TeayoMQkYJkUOypT7jQ6Yb0bv4RB6qPWK', 'Gast', '2021-01-03 20:59:28'),
(6, 'aa', 'aa', 'aa@aa.aa', 'Windesheim', '123', '2021-01-02', '$2y$10$C0qvnFWLZvi5Q1wBBmU1F.TIMcKYc6V6JjWAzj1sv4x25c3zfGyVe', 'Gast', '2018-12-31 13:05:21'),
(7, 'ee', 'ee', 'ee@ee.ee', 'Windesheim', '123', '2021-01-01', '$2y$10$nS9p9yOBEdLOVsO35BuzBOxZvNr6VwU91xiD4MeBPnOCM7O7poweC', 'Stagiar', '2018-12-31 13:05:21'),
(8, 'Collin', 'lambers', 'col.lamb@gmail.com', 'Windesheim', '0612312312', '2021-01-04', '$2y$10$pSo6TATyEHcOLXdNHQYB1uiUKmqaSbijacHQCMzhJpZq/7lPp32p.', 'Beheerder', '2021-03-13 11:52:09'),
(9, 'a', 'a', 'a@a.aa', 'Windesheim', '0612312323', '2021-01-11', '$2y$10$tS5.Al1lb5MQ96BsVlEAW..doY6mzPUK/Yk.9Ri80hlGzpe7YV/q6', 'Gast', '2021-01-18 13:36:52'),
(10, 'test', 'test1', 'test.test1@gmail.com', 'Windesheim', '0612341234', '1995-01-04', '$2y$10$QjZOPmOIaZ3n.z0GiBrfLOVzbUGw7dB2.LeRwC22r22N4snd9NUly', 'Gast', '2018-12-31 13:05:21'),
(11, 'bb', 'bb', 'bb@bb.bb', 'Stenden', '0611', '2021-03-10', '$2y$10$ubXV.LAGz7z7SoIUFs.f0uMq5T3Augh96eeTej9OFowNIgkkn3y0q', 'Gast', '2021-03-13 13:11:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanbiedingen`
--
ALTER TABLE `aanbiedingen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`Evenement_id`);

--
-- Indexes for table `inschrijving_evenement`
--
ALTER TABLE `inschrijving_evenement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanbiedingen`
--
ALTER TABLE `aanbiedingen`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `Evenement_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inschrijving_evenement`
--
ALTER TABLE `inschrijving_evenement`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rollen`
--
ALTER TABLE `rollen`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
