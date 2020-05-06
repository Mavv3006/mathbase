-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mai 2020 um 08:30
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mathbase_mathbase`
--
DROP DATABASE IF EXISTS `mathbase_mathbase`;
CREATE DATABASE IF NOT EXISTS `mathbase_mathbase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mathbase_mathbase`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `categories`:
--

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `description`) VALUES
(0, 'Kategorie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `difficulties`:
--

--
-- Daten für Tabelle `difficulties`
--

INSERT INTO `difficulties` (`id`, `description`) VALUES
(0, 'Schwierigkeit');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `solution` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `difficulty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `exercise`:
--   `category`
--       `categories` -> `id`
--   `subcategory`
--       `subcategories` -> `id`
--   `difficulty`
--       `difficulties` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Daten für Tabelle `exercise`
--

INSERT INTO `exercise` (`id`, `user_id`, `description`, `solution`, `title`, `created_at`, `updated_at`, `category`, `subcategory`, `difficulty`) VALUES
(1, 1, 'test description', 'test solution', 'test title', '2020-05-04 16:41:59', '2020-05-05 21:16:55', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `subcategories`:
--

--
-- Daten für Tabelle `subcategories`
--

INSERT INTO `subcategories` (`id`, `description`) VALUES
(0, 'Unterkategorie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `users`:
--

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`) VALUES
(1, 'UserName', 'user@user.de', 'sh7up#KT!', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`),
  ADD KEY `difficulty` (`difficulty`);

--
-- Indizes für die Tabelle `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `foreignKey_categories(id)` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `foreignKey_subcategories(id)` FOREIGN KEY (`subcategory`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `foreignKey_difficulties(id)` FOREIGN KEY (`difficulty`) REFERENCES `difficulties` (`id`),
  ADD CONSTRAINT `foreignKey_users(id)` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
