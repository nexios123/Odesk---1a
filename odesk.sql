-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 17. mar 2016 ob 11.44
-- Različica strežnika: 10.1.10-MariaDB
-- Različica PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `odesk`
--

-- --------------------------------------------------------

--
-- Struktura tabele `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `short` varchar(10) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `countries`
--

INSERT INTO `countries` (`id`, `title`, `short`) VALUES
(1, 'SLOVENIJA', 'SVN'),
(11, 'Italija', 'ITA'),
(10, 'Avstrija', 'AVT'),
(9, 'Hrvaška', 'HRV'),
(8, 'Hrvaška', 'HRV');

-- --------------------------------------------------------

--
-- Struktura tabele `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_slovenian_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`) VALUES
(2, 'ererter', 'tertetr'),
(4, 'Php', 'Programiranje'),
(5, 'CSS', ''),
(6, 'HTML 5', ''),
(7, 'JavaScript', '');

-- --------------------------------------------------------

--
-- Struktura tabele `skills_users`
--

CREATE TABLE `skills_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `skills_users`
--

INSERT INTO `skills_users` (`id`, `user_id`, `skill_id`, `rank`) VALUES
(4, 2, 5, 0),
(3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `sporocila`
--

CREATE TABLE `sporocila` (
  `id` int(11) NOT NULL,
  `prejemnik` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `posiljatelj` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zadeva` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sporocilo` text NOT NULL,
  `soprejemniki` varchar(255) DEFAULT NULL,
  `prebrano` tinyint(1) NOT NULL DEFAULT '0',
  `datoteka` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tukaj bodo sporočila';

--
-- Odloži podatke za tabelo `sporocila`
--

INSERT INTO `sporocila` (`id`, `prejemnik`, `posiljatelj`, `zadeva`, `sporocilo`, `soprejemniki`, `prebrano`, `datoteka`) VALUES
(1, 'sdfgsd', '', 'gsdsd', 'gsdsdsdg', NULL, 0, ''),
(2, 'sdgsdgsdgsd', 'urban.kocnik@gmail.com', 'gsdsdgsdgsd', 'urban', NULL, 0, ''),
(6, 'kr neki', 'urban.kocnik@gmail.com', 'sgsdfgds', 'sgdsdsdg', NULL, 0, ''),
(8, 'urban.kocnik@gmail.com', 'urban.kocnik@gmail.com', 'sgd', 'tzi', NULL, 1, ''),
(9, 'urban.kocnik@gmail.com', 'urban.kocnik@gmail.com', 'jjgfj', 'jjjjsdf', NULL, 1, ''),
(10, 'urban.kocnik@gmail.com', 'urban.kocnik@gmail.com', 'gs', 'dggdfhdf', NULL, 1, '20150226054748224Koala.jpg');

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `date_birth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text COLLATE utf8_slovenian_ci,
  `avatar` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `hashcode` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `country_id`, `first_name`, `last_name`, `email`, `pass`, `date_birth`, `description`, `avatar`, `hashcode`, `active`) VALUES
(1, 1, 'Islam', 'Mušić', 'islam.music@gmail.com', '7f667781432ac3c11c9c281c4ecb1a11690b729f', '2015-02-12 17:43:36', NULL, NULL, '', 0),
(2, 10, 'Islam', 'Mušić', 'islam@scv.si', 'c27d05b6a544f7329442c4580963ba85abb93874', '2015-02-26 17:48:21', 'Tole ', 'slike/20150226063119602Penguins.jpg', '', 0),
(3, 1, 'urban', 'kočnik', 'urban.kocnik@gmail.com', 'f7721bd98b7b5b240973673691db815ed2ec962f', '2016-03-16 14:30:21', NULL, NULL, '', 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `skills_users`
--
ALTER TABLE `skills_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indeksi tabele `sporocila`
--
ALTER TABLE `sporocila`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT tabele `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT tabele `skills_users`
--
ALTER TABLE `skills_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabele `sporocila`
--
ALTER TABLE `sporocila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
