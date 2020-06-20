-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Mai 2020 um 16:58
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
(0, 'Geometrie'),
(1, 'Terme und Gleichungen'),
(2, 'Funktionen/Analysis'),
(3, 'Vektorgeometrie'),
(4, 'Stochastik');

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
(0, 'Klasse 1-4'),
(1, 'Klasse 5-8'),
(2, 'Klasse 9, 10'),
(3, 'Klasse 11'),
(4, 'Klasse 12, 13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `exercise`
--

CREATE TABLE `exercise` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `solution` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `picture` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `exercise`:
--   `difficulty`
--       `difficulties` -> `id`
--   `subcategory`
--       `subcategories` -> `id`
--   `user_id`
--       `users` -> `id`
--   `category`
--       `categories` -> `id`
--   `difficulty`
--       `difficulties` -> `id`
--   `subcategory`
--       `subcategories` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Daten für Tabelle `exercise`
--

INSERT INTO `exercise` (`id`, `user_id`, `description`, `solution`, `title`, `created_at`, `updated_at`, `category`, `subcategory`, `difficulty`, `picture`) VALUES
(1, 3, 'Eine halbkugelförmige Schüssel hat einen Durchmesser von 18cm. Wie viel Liter fasst die Schüssel?', '1,55', 'Volumen einer Halbkugel', '2020-05-16 16:24:36', '2020-05-16 17:09:35', 0, 1, 1, ''),
(2, 3, 'Bestimme das Lösungspaar: x + y = 7, y = 2. Gibt die Lösung folgendermaßen an: (x, y)', '(5, 2)','Einfache Gleichungssystem', '2020-05-04 16:41:59', '2020-05-18 14:53:43', 1, 4, 2, ''),
(3, 3, 'Daniel ist 10 kg leichter als Stefan. Zusammen wiegen sie 90 kg. Wie viel wiegt Daniel und wie viel wiegt Stefan? Gibt die Lösung folgendermaßen an: Gewicht Daniel, Gewicht Stefan', '50, 40', 'Textaufgabe Gleichungssystem', '2020-05-16 16:23:08', '2020-05-16 17:01:05', 1, 4, 2, ''),
(4, 1, 'Ist das ein Würfelnetz?', 'Ja', 'Würfelnetze', '2020-05-16 16:27:24', '2020-05-16 16:27:24', 0, 0, 0, 'exercise/4.png'),
(5, 1, 'cos(240°)', '-0,5', 'Kosinus', '2020-05-18 17:43:43', '2020-05-18 17:43:43', 0, 2, 2, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `subcategories`:
--

--
-- Daten für Tabelle `subcategories`
--

INSERT INTO `subcategories` (`id`, `description`) VALUES
(0, 'Formen, Flächen'), -- Geometrie
(1, 'Körper'), -- Geometrie
(2, 'Sinus, Cosinus, Tangens'), -- Geometrie
(3, 'Gleichungen lösen'), -- Terme und Gleichungen
(4, 'Lineare Gleichungssysteme'); -- Terme und Gleichungen

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defaults/pp_default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONEN DER TABELLE `users`:
--

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`, `picture`) VALUES
(1, 'test@test.com', '$2y$10$Pwp4UNw4Y1mQjZULNCclHOe933Ml5PKuBjBfeDi9p1QC0ZK20X6VC', 'test', 0, 1, 1, 0, 1589789784, 1589801622, 0, ''), -- password: test
(2, 'bla@bla.com', '$2y$10$a0y9oN51EPKHzzC89sUI0u/io.nWUaLmfoMToaMV9HxD2RPydCmFW', 'bla bla', 0, 1, 1, 0, 1589791282, NULL, 0, ''), -- password: bla
(3, 'user@user.de', '$2y$10$ZWz1Po2eBvDXl60bpqlYZezlr98sjnHwrWGEP3J3MwZVw4A8mmWxW', 'User', 0, 1, 1, 0, 1589209770, 1589813450, 0, ''); -- password: sh7up#KT!

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONEN DER TABELLE `users_confirmations`:
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONEN DER TABELLE `users_remembered`:
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONEN DER TABELLE `users_resets`:
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONEN DER TABELLE `users_throttling`:
--

--
-- Daten für Tabelle `users_throttling`
--

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indizes für die Tabelle `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indizes für die Tabelle `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `FK_exercise_categories(id)` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_exercise_difficulties(id)` FOREIGN KEY (`difficulty`) REFERENCES `difficulties` (`id`),
  ADD CONSTRAINT `FK_exercise_subcategories(id)` FOREIGN KEY (`subcategory`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `FK_exercise_users(id)` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

ALTER TABLE `subcategories`
  ADD CONSTRAINT `FK_subcategories_categories(id)` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
