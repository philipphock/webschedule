-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Apr 2012 um 16:46
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `schedule`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schedule_appointments_1`
--

DROP TABLE IF EXISTS `schedule_appointments_1`;
CREATE TABLE IF NOT EXISTS `schedule_appointments_1` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `date` int(8) NOT NULL,
  `time` int(4) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date` (`date`,`time`,`name`),
  KEY `seen` (`seen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schedule_users`
--

DROP TABLE IF EXISTS `schedule_users`;
CREATE TABLE IF NOT EXISTS `schedule_users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pw` text COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `schedule_users`
--

INSERT INTO `schedule_users` (`id`, `user`, `pw`, `role`) VALUES
(1, 'phil', 'phil', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
